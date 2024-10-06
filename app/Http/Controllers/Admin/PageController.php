<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\PageCreate;
use App\Http\Requests\PageUpdate;
use App\Models\Image;
use App\Models\Page;

class PageController extends Controller
{
    protected $page;

    public function __construct(Page $page) {
        $this->page = $page;
    }

    public function index() {
        $breadcrumb = breadcrumb(['pages']);
        $status = $this->status;
        $pages = $this->page->all();
        return view('admin.page.index', compact('pages', 'breadcrumb', 'status'));
    }

    public function trash() {
        $breadcrumb = breadcrumb([route('page.index') => 'pages', 'trash']);
        $status = $this->status;
        $pages = $this->page->onlyTrashed()->get();
        return view('admin.page.index', compact('pages', 'breadcrumb', 'status'));
    }

    public function withTrash() {
        $breadcrumb = breadcrumb([route('page.index') => 'pages', 'all']);
        $status = $this->status;
        $pages = $this->page->withTrashed()->get();
        return view('admin.page.index', compact('pages', 'breadcrumb', 'status'));
    }
    
    public function restore($id) {
        $this->page->where('id', $id)->restore();
        return redirect()->back()->with('success', 'Successfully Restored.');
    }
    
    public function delete($id) {
        $page = $this->page->withTrashed()->findOrFail($id);
        $this->deleteImage($page);
        $page->forceDelete();
        return redirect()->back()->with('success', 'Permanently Deleted.');
    }

    public function create() {
        $breadcrumb = breadcrumb([route('page.index') => 'pages', 'create']);
        return view('admin.page.form', compact('breadcrumb'));
    }

    public function store(PageCreate $request) {
        $page = $this->page->create($request->all());
        $this->upload($page);
        $page->seo()->create(request('seo'));
        return redirect()->back()->with('success', 'Successfully Created.');
    }

    public function show(Page $page) {
        $breadcrumb = breadcrumb([route('page.index') => 'pages', 'show']);
        return view('admin.page.show', compact('page', 'breadcrumb'));
    }

    public function edit(Page $page) {
        $breadcrumb = breadcrumb([route('page.index') => 'pages', 'edit']);
        return view('admin.page.form', compact('page', 'breadcrumb'));
    }

    public function update(PageUpdate $request, Page $page) {
        $page->update($request->all());
        $this->upload($page);
        if($page->seo()->update(request('seo')) == false)
            $page->seo()->create(request('seo'));
        return redirect()->back()->with('success', 'Successfully Updated.');
    }

    public function destroy(Page $page) {
        $page->delete();
        return redirect()->route('page.index')->with('success', 'Successfully Deleted.');
    }
    
}
