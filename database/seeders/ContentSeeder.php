<?php

namespace Database\Seeders;

use App\Models\Faq;
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
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        require_once __DIR__.'/content/_helpers.php';
        $dir = __DIR__.'/content';

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
                    'author_name' => ['en' => 'WAFA Editorial Team', 'ar' => 'فريق التحرير في وفاء'],
                    'published_at' => now()->subDays($days)->setTime(9, 0),
                    'is_published' => true,
                    'seo' => ['title' => $p['title'], 'description' => $p['excerpt'], 'index' => true, 'follow' => true, 'twitter_card' => 'summary_large_image'],
                ]);
            }

            foreach (require $dir.'/redirects.php' as [$from, $to, $note]) {
                Redirect::query()->updateOrCreate(['from_path' => Redirect::normalize($from)], ['to_url' => $to, 'status_code' => 301, 'is_active' => true, 'note' => $note]);
            }
        });

        Content::bust();
    }
}
