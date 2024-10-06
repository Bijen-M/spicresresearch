<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\TagCreate;
use App\Http\Requests\TagUpdate;
use App\Models\Tag;

class TagController extends Controller
{
    protected $tag;

    public function __construct(Tag $tag) {
        $this->tag = $tag;
    }

    public function index() {
        $breadcrumb = breadcrumb(['tags']);
        $status = $this->status;
        $tags = $this->tag->all();
        return view('admin.tag.index', compact('tags', 'breadcrumb', 'status'));
    }

    public function trash() {
        $breadcrumb = breadcrumb([route('tag.index') => 'tags', 'trash']);
        $status = $this->status;
        $tags = $this->tag->onlyTrashed()->get();
        return view('admin.tag.index', compact('tags', 'breadcrumb', 'status'));
    }

    public function withTrash() {
        $breadcrumb = breadcrumb([route('tag.index') => 'tags', 'all']);
        $status = $this->status;
        $tags = $this->tag->withTrashed()->get();
        return view('admin.tag.index', compact('tags', 'breadcrumb', 'status'));
    }
    
    public function restore($id) {
        $this->tag->where('id', $id)->restore();
        return redirect()->back()->with('success', 'Successfully Restored.');
    }
    
    public function delete($id) {
        $tag = $this->tag->withTrashed()->findOrFail($id);
        $tag->image->delete();
        $tag->forceDelete();
        return redirect()->back()->with('success', 'Permanently Deleted.');
    }

    public function create() {
        $breadcrumb = breadcrumb([route('tag.index') => 'tags', 'create']);
        return view('admin.tag.form', compact('breadcrumb'));
    }

    public function store(TagCreate $request) {
        $tag = $this->tag->create($request->all());
        $tag->seo()->create(request('seo'));
        return redirect()->route('tag.index')->with('success', 'Successfully Created.');
    }

    public function show(Tag $tag) {
        $breadcrumb = breadcrumb([route('tag.index') => 'tags', 'show']);
        return view('admin.tag.show', compact('tag', 'breadcrumb'));
    }

    public function edit(Tag $tag) {
        $breadcrumb = breadcrumb([route('tag.index') => 'tags', 'edit']);
        return view('admin.tag.form', compact('tag', 'breadcrumb'));
    }

    public function update(TagUpdate $request, Tag $tag) {
        $tag->update($request->all());
        $this->upload($tag);
        $tag->seo()->update(request('seo'));
        return redirect()->route('tag.index')->with('success', 'Successfully Updated.');
    }

    public function destroy(Tag $tag) {
        $tag->delete();
        return redirect()->route('tag.index')->with('success', 'Successfully Deleted.');
    }
    
}
