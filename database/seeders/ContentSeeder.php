<?php

namespace Database\Seeders;

use App\Models\Engagement;
use App\Models\Faq;
use App\Models\Media;
use App\Models\Menu;
use App\Models\Page;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\ProgramCategory;
use App\Models\Redirect;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Setting;
use App\Models\TrainingProgram;
use App\Support\Content;
use App\Support\MediaProcessor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ContentSeeder extends Seeder
{
    /** @var array<string, int> Media ids of the imported verified assets, by key (see M()). */
    public static array $media = [];

    /**
     * Verified WAFA imagery only: the founder portrait and genuine corporate
     * engagement photos (the official logo and favicon ship in public/images/brand).
     */
    protected const ASSETS = [
        'founder' => ['founder-wafaa-hashem.png', ['en' => 'Dr. Wafaa Hashem, founder of WAFA', 'ar' => 'الدكتورة وفاء هاشم، مؤسِّسة WAFA'], '50% 30%'],
        'eng-1' => ['engagement/engagement-3.26.40-PM-2-1.jpg', ['en' => 'Participants of a WAFA corporate team engagement session gathered around the activity table', 'ar' => 'المشاركون في جلسة تفاعل مؤسسي من WAFA حول طاولة النشاط'], '50% 40%'],
        'eng-2' => ['engagement/engagement-3.26.40-PM-3.jpg', ['en' => 'Team members taking part in a structured participation game with coloured cards', 'ar' => 'أعضاء فريق يشاركون في لعبة تفاعلية منظّمة باستخدام بطاقات ملوّنة'], '50% 45%'],
        'eng-3' => ['engagement/engagement-3.26.40-PM-7.jpg', ['en' => 'A participant completing a time-based card challenge', 'ar' => 'أحد المشاركين يؤدي تحديًا بالبطاقات محددًا بوقت'], '50% 40%'],
        'eng-4' => ['engagement/engagement-3.26.40-PM.jpg', ['en' => 'Participants cheering during a team challenge', 'ar' => 'مشاركون يتفاعلون بحماس خلال تحدٍّ جماعي'], '50% 40%'],
        'eng-5' => ['engagement/engagement-3.26.41-PM-6.jpg', ['en' => 'Group photo at the close of the engagement session', 'ar' => 'صورة جماعية في ختام جلسة التفاعل'], '50% 50%'],
        'eng-6' => ['engagement/engagement-3.26.41-PM-7-2.jpg', ['en' => 'Team members celebrating after completing a challenge', 'ar' => 'أعضاء الفريق يحتفلون بعد إنجاز أحد التحديات'], '50% 40%'],
    ];

    public function run(): void
    {
        require_once __DIR__.'/content/_helpers.php';
        $dir = __DIR__.'/content';
        $this->importAssets();

        DB::transaction(function () use ($dir) {
            foreach (require $dir.'/settings.php' as $group => $value) {
                Setting::put($group, $value);
            }

            foreach (require $dir.'/menus.php' as $location => $menu) {
                Menu::query()->updateOrCreate(['location' => $location], $menu);
            }

            $categories = [];
            foreach (require $dir.'/categories.php' as $cat) {
                $categories[$cat['key']] = ServiceCategory::query()->updateOrCreate(['key' => $cat['key']], $cat + ['is_published' => true]);
            }

            foreach (['medical', 'life', 'auto', 'property', 'hr', 'od', 'training', 'business_coaching', 'executive_coaching'] as $file) {
                $data = require $dir.'/services/'.$file.'.php';
                $faqs = $data['faqs'] ?? [];
                $category = $categories[$data['category']];
                unset($data['faqs'], $data['category']);
                $service = Service::query()->updateOrCreate(
                    ['service_category_id' => $category->id, 'slug' => $data['slug']],
                    $data + ['is_published' => true]
                );
                foreach ($faqs as $i => [$q, $a]) {
                    Faq::query()->create(['service_id' => $service->id, 'topic' => $data['family'], 'question' => $q, 'answer' => $a, 'sort' => $i + 1]);
                }
            }

            foreach (require $dir.'/faqs.php' as $topic => $faqs) {
                foreach ($faqs as $i => [$q, $a]) {
                    Faq::query()->create([
                        'topic' => $topic === 'home' ? 'general' : $topic,
                        'question' => $q, 'answer' => $a,
                        'show_on_home' => $topic === 'home',
                        'sort' => $i + 1,
                    ]);
                }
            }

            $home = require $dir.'/home.php';
            Page::query()->updateOrCreate(['key' => 'home'], [
                'slug' => 'home', 'template' => 'home', 'title' => $home['title'], 'sections' => $home['sections'],
                'seo' => $home['seo'], 'is_published' => true, 'sort' => 1,
            ]);
            foreach (require $dir.'/pages.php' as $page) {
                Page::query()->updateOrCreate(['key' => $page['key']], $page + ['is_published' => true]);
            }

            $programs = require $dir.'/programs.php';
            $pcats = [];
            foreach ($programs['categories'] as $i => $c) {
                $pcats[$c['slug']] = ProgramCategory::query()->updateOrCreate(['slug' => $c['slug']], $c + ['sort' => $i + 1]);
            }
            foreach ($programs['programs'] as $p) {
                $cat = $pcats[$p['category']] ?? null;
                unset($p['category']);
                $p['registration_status'] = 'on_request';
                TrainingProgram::query()->updateOrCreate(['slug' => $p['slug']], $p + [
                    'program_category_id' => $cat?->id, 'is_published' => true,
                    'seo' => ['title' => $p['title'], 'description' => $p['summary'], 'index' => true, 'follow' => true],
                ]);
            }

            $posts = require $dir.'/posts.php';
            $postCats = [];
            foreach ($posts['categories'] as $i => $c) {
                $postCats[$c['slug']] = PostCategory::query()->updateOrCreate(['slug' => $c['slug']], $c + ['sort' => $i + 1]);
            }
            foreach ($posts['posts'] as $p) {
                $cat = $postCats[$p['category']] ?? null;
                $days = $p['days_ago'] ?? 1;
                unset($p['category'], $p['days_ago']);
                Post::query()->updateOrCreate(['slug' => $p['slug']], $p + [
                    'post_category_id' => $cat?->id,
                    'author_name' => ['en' => 'WAFA Editorial Team', 'ar' => 'فريق التحرير في WAFA'],
                    'published_at' => now()->subDays($days)->setTime(9, 0),
                    'is_published' => true,
                    'seo' => ['title' => $p['title'], 'description' => $p['excerpt'], 'index' => true, 'follow' => true, 'twitter_card' => 'summary_large_image'],
                ]);
            }

            foreach (require $dir.'/engagements.php' as $e) {
                Engagement::query()->updateOrCreate(['slug' => $e['slug']], $e);
            }

            foreach (require $dir.'/redirects.php' as [$from, $to, $code, $note]) {
                Redirect::query()->updateOrCreate(['from_path' => Redirect::normalize($from)], ['to_url' => $to, 'status_code' => $code, 'is_active' => true, 'note' => $note]);
            }
        });

        Content::bust();
    }

    /** Copies the verified images into the media library (idempotent) and records their ids. */
    protected function importAssets(): void
    {
        $disk = Storage::disk('media');
        foreach (static::ASSETS as $key => [$file, $alt, $focal]) {
            $source = __DIR__.'/assets/'.$file;
            if (! is_file($source)) {
                continue;
            }
            $path = 'wafa/'.basename($file);
            $media = Media::query()->where('path', $path)->first();
            if (! $media) {
                $disk->put($path, file_get_contents($source));
                $media = MediaProcessor::register($path, basename($file), [
                    'alt' => $alt, 'title' => $alt['en'], 'focal_point' => $focal, 'folder' => str_starts_with($key, 'eng') ? 'engagements' : 'about',
                ]);
            }
            static::$media[$key] = $media->id;
        }
    }
}
