<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\ImageCreate;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ImageController extends Controller {

    protected $image;

    public function __construct(Image $image) {
        $this->image = $image;
    }

    public function index() {
        $breadcrumb = breadcrumb(['images']);
        $images = $this->image->all();
        return view('admin.image.index', compact('images', 'breadcrumb'));
    }

    public function trash() {
        $breadcrumb = breadcrumb([route('image.index') => 'images', 'trash']);
        $images = $this->image->onlyTrashed()->get();
        return view('admin.image.index', compact('images', 'breadcrumb'));
    }

    public function withTrash() {
        $breadcrumb = breadcrumb([route('image.index') => 'images', 'all']);
        $images = $this->image->withTrashed()->get();
        return view('admin.image.index', compact('images', 'breadcrumb'));
    }
    
    public function restore($id) {
        $this->image->where('id', $id)->restore();
        return redirect()->route('image.index')->with('success', 'Successfully Restored.');
    }
    
    public function delete($id) {
        $image = $this->image->findOrFail($id);
        File::delete($image->thumb.$image->url, $image->upload.$image->url);
        $image->forceDelete();
        return redirect()->back()->with('success', 'Permanently Deleted.');
    }

    public function create() {
        $breadcrumb = breadcrumb([route('image.index') => 'images', 'create']);
        return view('admin.image.form', compact('breadcrumb'));
    }

    public function store(ImageCreate $request) {
        $this->image->create($request->all());
        return redirect()->route('image.index')->with('success', 'Successfully Created.');
    }

    public function show(Image $image) {
        $breadcrumb = breadcrumb([route('image.index') => 'images', 'show']);
        return view('admin.image.show', compact('image', 'breadcrumb'));
    }

    public function edit(Image $image) {
        $breadcrumb = breadcrumb([route('image.index') => 'images', 'edit']);
        return view('admin.image.form', compact('image', 'breadcrumb'));
    }

    public function update(Request $request, Image $image) {
        $image->update($request->all());
        return redirect()->route('image.index')->with('success', 'Successfully Updated.');
    }

    public function destroy(Image $image) {
        $image->delete();
        return redirect()->route('image.index')->with('success', 'Successfully Deleted.');
    }

}
