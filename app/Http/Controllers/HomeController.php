<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Support\Schema;
use App\Support\Seo;

class HomeController extends Controller
{
    public function show()
    {
        $page = Page::query()->where('key', 'home')->firstOrFail();
        $seo = Seo::forModel($page, t(setting('general.site_name')) ?: 'WAFA', t(setting('seo.default_description')), fn ($l) => lroute('home', [], $l));
        $seo->addSchema(Schema::organization())->addSchema(Schema::website());

        return view('pages.home', compact('page', 'seo'));
    }
}
