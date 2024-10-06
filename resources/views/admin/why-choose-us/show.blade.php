@extends('admin.layouts.master')

@section('title', 'Why Choose Us')

@section('content')
<div id="vcPageInner" class="page-inner">
    <div id="vcPageContent" class="pageContent">
        <div class="row">
            <div class="col-md-12">
                <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
                    <tbody>
                        <tr><th>Department</th><td>{{ $whyChooseUs->department->title }}</td></tr>
                        <tr><th>Title</th><td>{!! $whyChooseUs->title !!}</td></tr>
                        <tr><th>description</th><td>{{ $whyChooseUs->description }}</td></tr>
                        <tr><th>Created At</th><td>{{ $whyChooseUs->created_at }}</td></tr>
                        <tr><th>Updated At</th><td>{{ $whyChooseUs->updated_at }}</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('style')
@endsection
@section('script')
@endsection