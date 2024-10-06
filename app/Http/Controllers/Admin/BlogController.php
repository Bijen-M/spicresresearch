<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\BlogCreate;
use App\Http\Requests\BlogUpdate;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;

class BlogController extends Controller
{
    protected $blog;
    protected $category;
    protected $tag;

    public function __construct(Blog $blog, Category $category, Tag $tag) {
        $this->blog = $blog;
        $this->category = $category;
        $this->tag = $tag;
    }
    
    public function index() {
        $breadcrumb = breadcrumb(['blogs']);
        $blogs = $this->blog->with('department', 'category')->get();
        return view('admin.blog.index', compact('blogs', 'breadcrumb'));
    }

    public function trash() {
        $breadcrumb = breadcrumb([route('blog.index') => 'blogs', 'trash']);
        $status = $this->status;
        $blogs = $this->blog->with('department', 'category')->onlyTrashed()->get();
        return view('admin.blog.index', compact('blogs', 'breadcrumb', 'status'));
    }

    public function withTrash() {
        $breadcrumb = breadcrumb([route('blog.index') => 'blogs', 'all']);
        $status = $this->status;
        $blogs = $this->blog->with('department', 'category')->withTrashed()->get();
        return view('admin.blog.index', compact('blogs', 'breadcrumb', 'status'));
    }
    
    public function restore($id) {
        $this->blog->where('id', $id)->restore();
        return redirect()->back()->with('success', 'Successfully Restored.');
    }
    
    public function delete($id) {
        $blog = $this->blog->withTrashed()->findOrFail($id);
        $this->deleteImage($blog);
        $blog->forceDelete();
        return redirect()->back()->with('success', 'Permanently Deleted.');
    }

    public function create() {
        $breadcrumb = breadcrumb([route('blog.index') => 'blogs', 'create']);
        $categories = $this->category->pluck('title', 'id');
        $tags = $this->tag->pluck('title', 'id');
//        dd($categories);
        return view('admin.blog.form', compact('breadcrumb', 'categories', 'tags'));
    }

    public function store(BlogCreate $request) {
        $blog = $this->blog->create($request->all());
        $this->upload($blog);
        $blog->seo()->create(request('seo'));
        $blog->tags()->sync(request('tags'));
        return redirect()->route('blog.index')->with('success', 'Successfully Created.');
    }

    public function show(Blog $blog) {
        $breadcrumb = breadcrumb([route('blog.index') => 'blogs', 'show']);
        return view('admin.blog.show', compact('blog', 'breadcrumb'));
    }

    public function edit(Blog $blog) {
        $breadcrumb = breadcrumb([route('blog.index') => 'blogs', 'edit']);
        $categories = $this->category->pluck('title', 'id');
        $tags = $this->tag->pluck('title', 'id');
        return view('admin.blog.form', compact('blog', 'breadcrumb','categories', 'tags'));
    }

    public function update(BlogUpdate $request, Blog $blog) {
        $blog->update($request->all());
        $this->upload($blog);
        if($blog->seo()->update(request('seo')) == false)
            $blog->seo()->create(request('seo'));
        $blog->tags()->sync(request('tags'));
        return redirect()->route('blog.index')->with('success', 'Successfully Updated.');
    }

    public function destroy(Blog $blog) {
        $blog->delete();
        return redirect()->route('blog.index')->with('success', 'Successfully Deleted.');
    }
    
}
