<?php

namespace App\Http\Controllers;

use App\Models\Page;

class ResearchController extends Controller {

    protected $page;

    public function __construct(Page $page) {
        $this->page = $page;
    }

    public function index() {
        $page = $this->page->whereSlug('research-management')->first();
        if ($page) {
            $seo = $page->seo;
            $mimage = $page->picture ? $page->picture->upload.$page->picture->url : null;
            $breadcrumb = breadcrumb([$page->title]);
            return view('research.templates.page', compact('breadcrumb', 'page', 'seo', 'mimage'));
        }
        return abort(404);
    }

}
