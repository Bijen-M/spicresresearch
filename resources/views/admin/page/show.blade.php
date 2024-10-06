@extends('admin.layouts.master')

@section('title', 'Page')

@section('content')
<div id="vcPageInner" class="page-inner">
    <div id="vcPageContent" class="pageContent">
        <div class="row">
            <div class="col-md-8">
                <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
                    <tbody>
                        <tr><th>Title</th><td>{{ $page->title }}</td></tr>
                        <tr><th>Slug</th><td>{{ $page->slug }}</td></tr>
                        <tr><th>Sub Title</th><td>{{ $page->sub_title }}</td></tr>
                        <tr><th>Description</th><td>{!! $page->description !!}</td></tr>
                        <tr><th>Created At</th><td>{{ $page->created_at }}</td></tr>
                        <tr><th>Updated At</th><td>{{ $page->updated_at }}</td></tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-4">
                @if(isset($page->picture))
                <img src="{{ $page->picture->upload.$page->picture->url }}" width="100%">
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