<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\CategoryCreate;
use App\Http\Requests\CategoryUpdate;
use App\Models\Category;

class CategoryController extends Controller
{
    protected $category;

    public function __construct(Category $category) {
        $this->category = $category;
    }

    public function index() {
        $breadcrumb = breadcrumb(['categories']);
        $status = $this->status;
        $categories = $this->category->all();
        return view('admin.category.index', compact('categories', 'breadcrumb', 'status'));
    }

    public function trash() {
        $breadcrumb = breadcrumb([route('category.index') => 'categories', 'trash']);
        $status = $this->status;
        $categories = $this->category->onlyTrashed()->get();
        return view('admin.category.index', compact('categories', 'breadcrumb', 'status'));
    }

    public function withTrash() {
        $breadcrumb = breadcrumb([route('category.index') => 'categories', 'all']);
        $status = $this->status;
        $categories = $this->category->withTrashed()->get();
        return view('admin.category.index', compact('categories', 'breadcrumb', 'status'));
    }
    
    public function restore($id) {
        $this->category->where('id', $id)->restore();
        return redirect()->back()->with('success', 'Successfully Restored.');
    }
    
    public function delete($id) {
        $category = $this->category->withTrashed()->findOrFail($id);
        $category->image->delete();
        $category->forceDelete();
        return redirect()->back()->with('success', 'Permanently Deleted.');
    }

    public function create() {
        $breadcrumb = breadcrumb([route('category.index') => 'categories', 'create']);
        return view('admin.category.form', compact('breadcrumb'));
    }

    public function store(CategoryCreate $request) {
        $category = $this->category->create($request->all());
        $category->seo()->create(request('seo'));
        return redirect()->route('category.index')->with('success', 'Successfully Created.');
    }

    public function show(Category $category) {
        $breadcrumb = breadcrumb([route('category.index') => 'categories', 'show']);
        return view('admin.category.show', compact('category', 'breadcrumb'));
    }

    public function edit(Category $category) {
        $breadcrumb = breadcrumb([route('category.index') => 'categories', 'edit']);
        return view('admin.category.form', compact('category', 'breadcrumb'));
    }

    public function update(CategoryUpdate $request, Category $category) {
        $category->update($request->all());
        $this->upload($category);
        $category->seo()->update(request('seo'));
        return redirect()->route('category.index')->with('success', 'Successfully Updated.');
    }

    public function destroy(Category $category) {
        $category->delete();
        return redirect()->route('category.index')->with('success', 'Successfully Deleted.');
    }
    
}
