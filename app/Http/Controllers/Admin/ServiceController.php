<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\ServiceCreate;
use App\Http\Requests\ServiceUpdate;
use App\Models\Service;

class ServiceController extends Controller
{
    protected $service;

    public function __construct(Service $service) {
        $this->service = $service;
    }

    public function index() {
        $breadcrumb = breadcrumb(['services']);
        $status = $this->status;
        $services = $this->service->all();
        return view('admin.service.index', compact('services', 'breadcrumb', 'status'));
    }

    public function trash() {
        $breadcrumb = breadcrumb([route('service.index') => 'services', 'trash']);
        $status = $this->status;
        $services = $this->service->onlyTrashed()->get();
        return view('admin.service.index', compact('services', 'breadcrumb', 'status'));
    }

    public function withTrash() {
        $breadcrumb = breadcrumb([route('service.index') => 'services', 'all']);
        $status = $this->status;
        $services = $this->service->withTrashed()->get();
        return view('admin.service.index', compact('services', 'breadcrumb', 'status'));
    }
    
    public function restore($id) {
        $this->service->where('id', $id)->restore();
        return redirect()->back()->with('success', 'Successfully Restored.');
    }
    
    public function delete($id) {
        $service = $this->service->withTrashed()->findOrFail($id);
        $this->deleteImage($service);
        $service->forceDelete();
        return redirect()->back()->with('success', 'Permanently Deleted.');
    }

    public function create() {
        $breadcrumb = breadcrumb([route('service.index') => 'services', 'create']);
        return view('admin.service.form', compact('breadcrumb'));
    }

    public function store(ServiceCreate $request) {
        $service = $this->service->create($request->all());
        $this->upload($service);
        $service->seo()->create(request('seo'));
        return redirect()->route('service.index')->with('success', 'Successfully Created.');
    }

    public function show(Service $service) {
        $breadcrumb = breadcrumb([route('service.index') => 'services', 'show']);
        return view('admin.service.show', compact('service', 'breadcrumb'));
    }

    public function edit(Service $service) {
        $breadcrumb = breadcrumb([route('service.index') => 'services', 'edit']);
        return view('admin.service.form', compact('service', 'breadcrumb'));
    }

    public function update(ServiceUpdate $request, Service $service) {
        $service->update($request->all());
        $this->upload($service);
        $service->seo()->update(request('seo'));
        return redirect()->route('service.index')->with('success', 'Successfully Updated.');
    }

    public function destroy(Service $service) {
        $service->delete();
        return redirect()->route('service.index')->with('success', 'Successfully Deleted.');
    }
}
