<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index() {
        $pages = \App\Models\Page::count();
        $blogs = \App\Models\Blog::count();
        $portfolios = \App\Models\Portfolio::count();
        $subscribers = \App\Models\Subscribe::count(); 
        $breadcrumb = breadcrumb();
        return view('admin.dashboard.index', compact('breadcrumb', 'pages', 'blogs', 'portfolios', 'subscribers'));
    }
}
