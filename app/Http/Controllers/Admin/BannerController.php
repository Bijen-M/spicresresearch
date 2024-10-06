<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BannerCreate;
use App\Http\Requests\BannerUpdate;
use App\Models\Banner;

class BannerController extends Controller {

    protected $banner;

    public function __construct(Banner $banner) {
        $this->banner = $banner;
    }

    public function index() {
        $breadcrumb = breadcrumb(['banners']);
        $status = $this->status;
        $banners = $this->banner->with('department')->get();
        return view('admin.banner.index', compact('banners', 'breadcrumb', 'status'));
    }

    public function trash() {
        $breadcrumb = breadcrumb([route('banner.index') => 'banners', 'trash']);
        $status = $this->status;
        $banners = $this->banner->with('department')->onlyTrashed()->get();
        return view('admin.banner.index', compact('banners', 'breadcrumb', 'status'));
    }

    public function withTrash() {
        $breadcrumb = breadcrumb([route('banner.index') => 'banners', 'all']);
        $status = $this->status;
        $banners = $this->banner->with('department')->withTrashed()->get();
        return view('admin.banner.index', compact('banners', 'breadcrumb', 'status'));
    }
    
    public function restore($id) {
        $this->banner->where('id', $id)->restore();
        return redirect()->back()->with('success', 'Successfully Restored.');
    }
    
    public function delete($id) {
        $banner = $this->banner->withTrashed()->findOrFail($id);
        $this->deleteImage($banner);
        $banner->forceDelete();
        return redirect()->back()->with('success', 'Permanently Deleted.');
    }

    public function create() {
        $breadcrumb = breadcrumb([route('banner.index') => 'banners', 'create']);
        return view('admin.banner.form', compact('breadcrumb'));
    }

    public function store(BannerCreate $request) {
        $banner = $this->banner->create($request->all());
        $this->upload($banner);
        return redirect()->route('banner.create')->with('success', 'Successfully Created.');
    }

    public function show(Banner $banner) {
        $breadcrumb = breadcrumb([route('banner.index') => 'banners', 'show']);
        return view('admin.banner.show', compact('banner', 'breadcrumb'));
    }

    public function edit(Banner $banner) {
        $breadcrumb = breadcrumb([route('banner.index') => 'banners', 'edit']);
        return view('admin.banner.form', compact('banner', 'breadcrumb'));
    }

    public function update(BannerUpdate $request, Banner $banner) {
        $banner->update($request->all());
        $this->upload($banner);
        return redirect()->route('banner.edit', $banner->id)->with('success', 'Successfully Updated.');
    }

    public function destroy(Banner $banner) {
        $banner->delete();
        return redirect()->route('banner.index')->with('success', 'Successfully Deleted.');
    }
    
//    public function bannerCount(Banner $banner) {
//        return $banner->count();
//        return redirect()->route('banner.index')->with('success', 'Successfully Deleted.');
//    }
    

}
