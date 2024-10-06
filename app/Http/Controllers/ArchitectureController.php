<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Department;
use App\Models\Page;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Tag;
use App\Models\Team;
use App\Models\Testimonial;
use App\Models\WhyChooseUs;
use Carbon\Carbon;

class ArchitectureController extends Controller {

    protected $page;
    protected $team;
    protected $banner;
    protected $service;
    protected $testimonial;
    protected $portfolio;
    protected $blog;
    protected $category;
    protected $tag;
    protected $whyChooseUs;
    
    public function __construct(Page $page, Team $team, Banner $banner, Service $service, Testimonial $testimonial, Portfolio $portfolio, Blog $blog, Category $category, Tag $tag, WhyChooseUs $whyChooseUs) {
        $this->page = $page;
        $this->team = $team;
        $this->banner = $banner;
        $this->service = $service;
        $this->testimonial = $testimonial;
        $this->portfolio = $portfolio;
        $this->blog = $blog;
        $this->category = $category;
        $this->tag = $tag;
        $this->whyChooseUs = $whyChooseUs;
    }

    public function index() {
        $data['breadcrumb'] = breadcrumb();
        $data['banners'] = $this->banner->alls();
        $data['home'] = $home = $this->page->whereslug('architecture-engineering')->first();
        if($home){
            $data['seo'] = $home->seo;
            $data['mimage'] = $home->picture ? $home->picture->upload.$home->picture->url : null;
        }
        $data['whyChooseUs'] = $this->whyChooseUs;
        return view('architecture.templates.home', $data);
    }
    
    public function aboutUs() {
        $page = $this->page->whereSlug('about-us')->first();
        if ($page) {
            $seo = $page->seo;
            $mimage = $page->picture ? $page->picture->upload.$page->picture->url : null;
            $whyChooseUs = $this->whyChooseUs->alls();
            $testimonials = $this->testimonial->alls();
            $teams = $this->team->alls();
            $breadcrumb = breadcrumb([$page->title]);
            return view()->first(['architecture.templates.page-about-us', 'architecture.templates.page'], compact('breadcrumb', 'page', 'seo', 'teams', 'testimonials', 'whyChooseUs', 'mimage'));
        }
        return abort(404);
    }
    
    public function page($slug) {
        $page = $this->page->whereSlug($slug)->first();
        if ($page) {
            $seo = $page->seo;
            $mimage = $page->picture ? $page->picture->upload.$page->picture->url : null;
            $breadcrumb = breadcrumb([$page->title]);
            return view()->first(['architecture.templates.page-'.$slug, 'architecture.templates.page'], compact('breadcrumb', 'page', 'seo', 'mimage'));
        }
        return abort(404);
    }
    
    public function services() {
        $data['services'] = $this->service->alls();
        $data['breadcrumb'] = breadcrumb(['services']);
        $data['service'] = $service = $this->page->whereSlug('services')->first();
        if($service) {
            $data['seo'] = $service->seo;
            $data['mimage'] = $service->picture ? $service->picture->upload.$service->picture->url : null;
        }
        return view('architecture.templates.services', $data);
    }
    
    public function serviceDetails($slug) {
        $data['service'] = $service = $this->service->whereSlug($slug)->first();
        if ($service) {
            $data['seo'] = $service->seo;
            $data['mimage'] = $service->picture ? $service->picture->upload.$service->picture->url : null;
            $data['services'] = $this->service->where('id', '!=', $service->id)->limit(5)->alls();
            $data['breadcrumb'] = breadcrumb([route('architecture.services') => 'services', $service->title]);
            return view('architecture.templates.service', $data);
        }
        return abort(404);
        
    }
    
    public function portfolios() {
        $data['portfolios'] = $this->portfolio->alls();
        $data['breadcrumb'] = breadcrumb(['portfolios']);
        $data['portfolio'] = $portfolio = $this->page->whereSlug('portfolios')->first();
        if($portfolio) {
            $data['seo'] = $portfolio->seo;
            $data['mimage'] = $portfolio->picture ? $portfolio->picture->upload.$portfolio->picture->url : null;
        }
        return view('architecture.templates.portfolios', $data);
    }
    
    public function portfolioDetails($slug) {
        $data['portfolio'] = $portfolio = $this->portfolio->whereSlug($slug)->first();
        if ($portfolio) {
            $data['seo'] = $portfolio->seo;
            $data['mimage'] = sizeof($portfolio->picture) ? $portfolio->picture[0]->upload.$portfolio->picture[0]->url : null;
            $data['portfolios'] = $this->portfolio->where('id', '!=', $portfolio->id)->limit(5)->alls();
            $data['breadcrumb'] = breadcrumb([route('architecture.portfolios') => 'portfolios', $portfolio->title]);
            return view('architecture.templates.portfolio', $data);
        }
        return abort(404);
        
    }
    
    public function blogs() {
        $blogs = $this->blog->alls();
        $categories = $this->category->all();
        $tags = $this->tag->all();
        $breadcrumb = breadcrumb(['blogs']);
        $blog = $this->page->whereSlug('blogs')->first();
        if($blog) {
            $seo = $blog->seo;
            $mimage = $blog->picture ? $blog->picture->upload.$blog->picture->url : null;
        }
        return view('architecture.templates.blogs', compact('breadcrumb', 'blogs', 'categories', 'tags', 'seo', 'mimage'));
    }
    
    public function blogDetails($slug) {
        $this->blog->limit = 5;
        $blog = $this->blog->whereSlug($slug)->first();
        if ($blog) {
            $seo = $blog->seo;
            $mimage = $blog->picture ? $blog->picture->upload.$blog->picture->url : null;
            $blogs = $this->blog->where('id', '!=', $blog->id)->limits();
            $carbon = new Carbon();
            $breadcrumb = breadcrumb([route('architecture.blogs') => 'blogs', $blog->title]);
            return view('architecture.templates.blog', compact('breadcrumb', 'blog', 'blogs', 'seo', 'carbon', 'mimage'));
        }
        return abort(404);
        
    }
    
    public function blogsSearch() {
        $this->blog->number = 15;
        $blogs = $this->blog->where('title', 'like', '%'.request('q').'%')->alls();
        if ($blogs) {
            $carbon = new Carbon();
            $breadcrumb = breadcrumb([route('architecture.blogs') => 'blogs', 'Search']);
            return view('architecture.templates.blogs-search', compact('breadcrumb', 'blog', 'blogs', 'seo', 'carbon'));
        }
        return abort(404);
        
    }
    
    public function blogsByCategory($slug) {
        $category = $this->category->whereSlug($slug)->first();
        $blogs = $this->blog->whereCategoryId($category->id)->alls();
        $categories = $this->category->all();
        $tags = $this->tag->all();
        $breadcrumb = breadcrumb([route('architecture.blogs') => 'blogs', $category->title]);
        return view('architecture.templates.blogs', compact('breadcrumb', 'blogs', 'categories', 'tags', 'seo'));
    }
    
    public function blogsByTag($slug) {
        $tag = $this->tag->whereSlug($slug)->first();
        $departId = Department::whereSlug(request()->segment(1))->first()->id;
        $blogs = $tag->blogs()->where('department_id', $departId)->paginate($this->blog->number);
        $categories = $this->category->all();
        $tags = $this->tag->all();
        $breadcrumb = breadcrumb([route('architecture.blogs') => 'blogs', $tag->title]);
        return view('architecture.templates.blogs', compact('breadcrumb', 'blogs', 'categories', 'tags', 'seo'));
    }

}
