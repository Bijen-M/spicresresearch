<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\TestimonialCreate;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller {

    protected $testimonial;

    public function __construct(Testimonial $testimonial) {
        $this->testimonial = $testimonial;
    }

    public function index() {
        $breadcrumb = breadcrumb(['testimonials']);
        $testimonials = $this->testimonial->all();
        return view('admin.testimonial.index', compact('testimonials', 'breadcrumb'));
    }

    public function trash() {
        $breadcrumb = breadcrumb([route('testimonial.index') => 'testimonials', 'trash']);
        $testimonials = $this->testimonial->onlyTrashed()->get();
        return view('admin.testimonial.index', compact('testimonials', 'breadcrumb'));
    }

    public function withTrash() {
        $breadcrumb = breadcrumb([route('testimonial.index') => 'testimonials', 'all']);
        $testimonials = $this->testimonial->withTrashed()->get();
        return view('admin.testimonial.index', compact('testimonials', 'breadcrumb'));
    }
    
    public function restore($id) {
        $this->testimonial->where('id', $id)->restore();
        return redirect()->route('testimonial.index')->with('success', 'Successfully Restored.');
    }
    
    public function delete($id) {
        $this->testimonial->where('id', $id)->forceDelete();
        return redirect()->back()->with('success', 'Permanently Deleted.');
    }

    public function create() {
        $breadcrumb = breadcrumb([route('testimonial.index') => 'testimonials', 'create']);
        return view('admin.testimonial.form', compact('breadcrumb'));
    }

    public function store(TestimonialCreate $request) {
        $testimonial = $this->testimonial->create($request->all());
        $this->upload($testimonial);
        return redirect()->back()->with('success', 'Successfully Created.');
    }

    public function show(Testimonial $testimonial) {
        $breadcrumb = breadcrumb([route('testimonial.index') => 'testimonials', 'show']);
        return view('admin.testimonial.show', compact('testimonial', 'breadcrumb'));
    }

    public function edit(Testimonial $testimonial) {
        $breadcrumb = breadcrumb([route('testimonial.index') => 'testimonials', 'edit']);
        return view('admin.testimonial.form', compact('testimonial', 'breadcrumb'));
    }

    public function update(Request $request, Testimonial $testimonial) {
        $testimonial->update($request->all());
        $this->upload($testimonial);
        return redirect()->back()->with('success', 'Successfully Updated.');
    }

    public function destroy(Testimonial $testimonial) {
        $testimonial->delete();
        return redirect()->back()->with('success', 'Successfully Deleted.');
    }

}
