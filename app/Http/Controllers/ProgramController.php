<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\ProgramCategory;
use App\Models\TrainingProgram;
use App\Support\Schema;
use App\Support\Seo;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index(Request $request)
    {
        $page = Page::query()->where('key', 'programs')->first();
        $categories = ProgramCategory::query()->orderBy('sort')->get();
        $active = $categories->firstWhere('slug', (string) $request->query('category'));
        $mode = array_key_exists((string) $request->query('format'), TrainingProgram::DELIVERY_MODES) ? $request->query('format') : null;

        $programs = TrainingProgram::query()->where('is_published', true)->with(['category', 'image'])
            ->when($active, fn ($q) => $q->where('program_category_id', $active->id))
            ->when($mode, fn ($q) => $q->where('delivery_mode', $mode))
            ->orderByDesc('is_featured')->orderBy('sort')->get();

        $title = $page ? t($page->title) : __('site.training_programs');
        $seo = $page ? Seo::forModel($page, $title, t($page->intro), fn ($l) => lroute('programs.index', [], $l))
            : Seo::make($title)->withAlternates(fn ($l) => lroute('programs.index', [], $l));
        if ($active || $mode) {
            $seo->index = false; // filtered views are not separate landing pages
        }
        $seo->crumbs([[__('site.home'), lroute('home')], [$title, lroute('programs.index')]]);
        $seo->addSchema(Schema::breadcrumbs($seo->breadcrumbs));

        return view('programs.index', compact('page', 'programs', 'categories', 'active', 'mode', 'seo'));
    }

    public function show(TrainingProgram $program)
    {
        abort_unless($program->is_published, 404);
        $program->load(['category', 'image']);
        $seo = Seo::forModel($program, t($program->title), t($program->summary), fn ($l) => $program->url($l));
        $seo->crumbs([
            [__('site.home'), lroute('home')],
            [__('site.training_programs'), lroute('programs.index')],
            [t($program->title), $program->url()],
        ]);
        if ($program->image) {
            $seo->ogImage ??= $program->image->url(1200);
        }
        $seo->addSchema(Schema::course($program))->addSchema(Schema::breadcrumbs($seo->breadcrumbs));
        $faqs = collect($program->faqs ?? [])->map(fn ($f) => ['q' => t($f['q'] ?? null), 'a' => t($f['a'] ?? null)])->filter(fn ($f) => $f['q'] !== '');
        if ($faqs->isNotEmpty()) {
            $seo->addSchema(Schema::faq($faqs->all()));
        }
        $related = TrainingProgram::query()->where('is_published', true)->whereKeyNot($program->id)
            ->when($program->program_category_id, fn ($q) => $q->orderByRaw('program_category_id = ? desc', [$program->program_category_id]))
            ->with(['category', 'image'])->orderBy('sort')->limit(3)->get();

        return view('programs.show', compact('program', 'seo', 'faqs', 'related'));
    }
}
