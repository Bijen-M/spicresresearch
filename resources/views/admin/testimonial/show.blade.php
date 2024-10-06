@extends('admin.layouts.master')

@section('title', 'Testimonials')

@section('content')
<div id="vcPageInner" class="page-inner">
    <div id="vcPageContent" class="pageContent">
        <div class="row">
            <div class="col-md-9">
                <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
                    <tbody>
                        <tr><th>Description</th><td>{!! $testimonial->description !!}</td></tr>
                        <tr><th>Department</th><td>{{ $testimonial->department->title }}</td></tr>
                        <tr><th>By</th><td>{{ $testimonial->by }}</td></tr>
                        <tr><th>Company</th><td>{{ $testimonial->company }}</td></tr>
                        <tr><th>Designation</th><td>{{ $testimonial->designation }}</td></tr>
                        <tr><th>Created At</th><td>{{ $testimonial->created_at }}</td></tr>
                        <tr><th>Updated At</th><td>{{ $testimonial->updated_at }}</td></tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-3">
                @if(isset($testimonial->picture))
                <img src="{{ $testimonial->picture->upload.$testimonial->picture->url }}" width="100%">
                @endif
            </div>
        </div>
    </div>
</div>

@endsection

@section('style')
@endsection
@section('script')
@endsection