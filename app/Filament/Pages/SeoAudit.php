<?php

namespace App\Filament\Pages;

use App\Filament\Resources\Pages\PageResource;
use App\Filament\Resources\Posts\PostResource;
use App\Filament\Resources\ServiceCategories\ServiceCategoryResource;
use App\Filament\Resources\Services\ServiceResource;
use App\Filament\Resources\TrainingPrograms\TrainingProgramResource;
use App\Models\Media;
use App\Models\Page as PageModel;
use App\Models\Post;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\TrainingProgram;
use App\Support\SeoAudit as Audit;
use BackedEnum;
use Filament\Pages\Page;
use UnitEnum;

class SeoAudit extends Page
{
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-clipboard-document-check';

    protected static string|UnitEnum|null $navigationGroup = 'Site';

    protected static ?string $navigationLabel = 'SEO checks';

    protected static ?string $title = 'SEO checks';

    protected static ?int $navigationSort = 2;

    protected string $view = 'filament.pages.seo-audit';

    protected function getViewData(): array
    {
        $rows = [];
        $add = function ($items, string $type, string $resource, array $images) use (&$rows) {
            foreach ($items as $item) {
                $issues = Audit::check($item, 'title', $images);
                $rows[] = [
                    'type' => $type,
                    'title' => str_replace('*', '', t($item->title, 'en')),
                    'edit' => $resource::getUrl('edit', ['record' => $item]),
                    'issues' => $issues,
                    'published' => (bool) ($item->is_published ?? true),
                ];
            }
        };
        $add(PageModel::query()->orderBy('sort')->get(), 'Page', PageResource::class, ['hero_image_id']);
        $add(ServiceCategory::query()->orderBy('sort')->get(), 'Category', ServiceCategoryResource::class, ['image_id']);
        $add(Service::query()->orderBy('sort')->get(), 'Service', ServiceResource::class, ['hero_image_id', 'secondary_image_id', 'card_image_id']);
        $add(TrainingProgram::query()->orderBy('sort')->get(), 'Program', TrainingProgramResource::class, ['image_id']);
        $add(Post::query()->latest('published_at')->get(), 'Article', PostResource::class, ['image_id']);

        $missingAlt = Media::query()->where('mime', 'like', 'image/%')->get()
            ->filter(fn ($m) => blank($m->alt['en'] ?? null) || blank($m->alt['ar'] ?? null))->count();

        usort($rows, fn ($a, $b) => count($b['issues']) <=> count($a['issues']));

        return ['rows' => $rows, 'missingAlt' => $missingAlt];
    }
}
