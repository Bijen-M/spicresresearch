@extends('admin.layouts.master')

@section('title', 'Banner')

@section('content')
<div id="vcPageInner" class="page-inner">
    <div id="vcPageContent" class="pageContent">
        <div class="row">
            <div class="col-md-6">
                @if(isset($banner->picture))
                <img src="{{ $banner->picture->upload.$banner->picture->url }}" width="100%">
                @endif
            </div>
            <div class="col-md-6">
                <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
                    <tbody>
                        <tr><th>Department</th><td>{{ $banner->department?$banner->department->title:null }}</td></tr>
                        <tr><th>Title</th><td>{{ $banner->title }}</td></tr>
                            <tr><th>Description</th><td>{{ $banner->description }}</td></tr>
                        <tr><th>Url</th><td>{{ $banner->url }}</td></tr>
                        <tr><th>Url Text</th><td>{{ $banner->url_text }}</td></tr>
                        <tr><th>Created At</th><td>{{ $banner->created_at }}</td></tr>
                        <tr><th>Updated At</th><td>{{ $banner->updated_at }}</td></tr>
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