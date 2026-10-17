<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceCategory;
use App\Support\Content;
use App\Support\Schema;
use App\Support\Seo;

class ServiceController extends Controller
{
    public function show(string $category, string $service)
    {
        $cat = ServiceCategory::query()->where('slug', $category)->where('is_published', true)->firstOrFail();
        $service = Service::query()->where('service_category_id', $cat->id)->where('slug', $service)->where('is_published', true)
            ->with(['category', 'heroImage', 'secondaryImage'])->firstOrFail();

        $seo = Seo::forModel($service, t($service->title), t($service->summary), fn ($l) => $service->url($l));
        $seo->crumbs([
            [__('site.home'), lroute('home')],
            [t($cat->title), $cat->url()],
            [$service->navLabel(), $service->url()],
        ]);
        $seo->addSchema(Schema::service($service))->addSchema(Schema::breadcrumbs($seo->breadcrumbs));
        $faqs = Content::faqsForService($service->id);
        if ($faqs->isNotEmpty() && ($node = Schema::faq($faqs))) {
            $seo->addSchema($node);
        }

        return view('services.show', compact('service', 'seo', 'faqs'));
    }
}
