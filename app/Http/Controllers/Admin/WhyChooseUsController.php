<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\WhyChooseUsCreate;
use App\Http\Requests\WhyChooseUsUpdate;
use App\Models\WhyChooseUs;

class WhyChooseUsController extends Controller
{
    protected $whyChooseUs;

    public function __construct(WhyChooseUs $whyChooseUs) {
        $this->whyChooseUs = $whyChooseUs;
    }

    public function index() {
        $breadcrumb = breadcrumb(['Why Choose Us']);
        $whyChooseUs = $this->whyChooseUs->with('department')->get();
        return view('admin.why-choose-us.index', compact('whyChooseUs', 'breadcrumb'));
    }

    public function trash() {
        $breadcrumb = breadcrumb([route('why-choose-us.index') => 'Why Choose Us', 'trash']);
        $whyChooseUs = $this->whyChooseUs->with('department')->onlyTrashed()->get();
        return view('admin.why-choose-us.index', compact('whyChooseUs', 'breadcrumb'));
    }

    public function withTrash() {
        $breadcrumb = breadcrumb([route('why-choose-us.index') => 'Why Choose Us', 'all']);
        $whyChooseUs = $this->whyChooseUs->with('department')->withTrashed()->get();
        return view('admin.why-choose-us.index', compact('whyChooseUs', 'breadcrumb'));
    }
    
    public function restore($id) {
        $this->whyChooseUs->where('id', $id)->restore();
        return redirect()->back()->with('success', 'Successfully Restored.');
    }
    
    public function delete($id) {
        $whyChooseUs = $this->whyChooseUs->withTrashed()->findOrFail($id);
        $whyChooseUs->forceDelete();
        return redirect()->back()->with('success', 'Permanently Deleted.');
    }

    public function create() {
        $breadcrumb = breadcrumb([route('why-choose-us.index') => 'Why Choose Us', 'create']);
        return view('admin.why-choose-us.form', compact('breadcrumb'));
    }

    public function store(WhyChooseUsCreate $request) {
        $this->whyChooseUs->create($request->all());
        return redirect()->back()->with('success', 'Successfully Created.');
    }

    public function show(WhyChooseUs $whyChooseUs) {
        $breadcrumb = breadcrumb([route('why-choose-us.index') => 'Why Choose Us', 'show']);
        return view('admin.why-choose-us.show', compact('whyChooseUs', 'breadcrumb'));
    }

    public function edit(WhyChooseUs $whyChooseUs) {
        $breadcrumb = breadcrumb([route('why-choose-us.index') => 'Why Choose Us', 'edit']);
        return view('admin.why-choose-us.form', compact('whyChooseUs', 'breadcrumb'));
    }

    public function update(WhyChooseUsUpdate $request, WhyChooseUs $whyChooseUs) {
        $whyChooseUs->update($request->all());
        return redirect()->back()->with('success', 'Successfully Updated.');
    }

    public function destroy(WhyChooseUs $whyChooseUs) {
        $whyChooseUs->delete();
        return redirect()->route('why-choose-us.index')->with('success', 'Successfully Deleted.');
    }
    
}
