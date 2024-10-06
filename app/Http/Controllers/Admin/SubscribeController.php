<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Subscribe as Subscribe2;
use App\Models\Subscribe;

class SubscribeController extends Controller
{
    protected $subscribe;

    public function __construct(Subscribe $subscribe) {
        $this->subscribe = $subscribe;
    }

    public function index() {
        $breadcrumb = breadcrumb(['subscribes']);
        $subscribes = $this->subscribe->all();
        return view('admin.subscribe.index', compact('subscribes', 'breadcrumb', 'status'));
    }

    public function trash() {
        $breadcrumb = breadcrumb([route('subscribe.index') => 'subscribes', 'trash']);
        $subscribes = $this->subscribe->onlyTrashed()->get();
        return view('admin.subscribe.index', compact('subscribes', 'breadcrumb', 'status'));
    }

    public function withTrash() {
        $breadcrumb = breadcrumb([route('subscribe.index') => 'subscribes', 'all']);
        $subscribes = $this->subscribe->withTrashed()->get();
        return view('admin.subscribe.index', compact('subscribes', 'breadcrumb', 'status'));
    }
    
    public function restore($id) {
        $this->subscribe->where('id', $id)->restore();
        return redirect()->back()->with('success', 'Successfully Restored.');
    }
    
    public function delete($id) {
        $subscribe = $this->subscribe->withTrashed()->findOrFail($id);
        $subscribe->forceDelete();
        return redirect()->back()->with('success', 'Permanently Deleted.');
    }

    public function create() {
        $breadcrumb = breadcrumb([route('subscribe.index') => 'subscribes', 'create']);
        return view('admin.subscribe.form', compact('breadcrumb'));
    }

    public function store(Subscribe2 $request) {
        $subscribe = $this->subscribe->create($request->all());
        return redirect()->back()->with('success', 'Successfully Created.');
    }

    public function show(Subscribe $subscribe) {
        $breadcrumb = breadcrumb([route('subscribe.index') => 'subscribes', 'show']);
        return view('admin.subscribe.show', compact('subscribe', 'breadcrumb'));
    }

    public function edit(Subscribe $subscribe) {
        $breadcrumb = breadcrumb([route('subscribe.index') => 'subscribes', 'edit']);
        return view('admin.subscribe.form', compact('subscribe', 'breadcrumb'));
    }

    public function update(Subscribe2 $request, Subscribe $subscribe) {
        $subscribe->update($request->all());
        return redirect()->back()->with('success', 'Successfully Updated.');
    }

    public function destroy(Subscribe $subscribe) {
        $subscribe->delete();
        return redirect()->back()->with('success', 'Successfully Deleted.');
    }
    
}
