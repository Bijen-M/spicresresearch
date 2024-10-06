@extends('admin.layouts.master')

@section('title', 'Teams')

@section('content')
<div id="vcPageInner" class="page-inner">
    <div id="vcPageContent" class="pageContent">
        <div class="row">
            <div class="col-md-9">
                <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
                    <tbody>
                        <tr><th>Department</th><td>{{ $team->department->title }}</td></tr>
                        <tr><th>Name</th><td>{!! $team->name !!}</td></tr>
                        <tr><th>Position</th><td>{{ $team->position }}</td></tr>
                        <tr><th>Facebook</th><td>{{ $team->facebook }}</td></tr>
                        <tr><th>Google</th><td>{{ $team->google }}</td></tr>
                        <tr><th>Twitter</th><td>{{ $team->twitter }}</td></tr>
                        <tr><th>Instagram</th><td>{{ $team->instagram }}</td></tr>
                        <tr><th>Created At</th><td>{{ $team->created_at }}</td></tr>
                        <tr><th>Updated At</th><td>{{ $team->updated_at }}</td></tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-3">
                @if(isset($team->picture))
                <img src="{{ $team->picture->upload.$team->picture->url }}" width="100%">
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