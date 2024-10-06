@extends('admin.layouts.master')

@section('title', 'Users')

@section('content')
<div id="vcPageInner" class="page-inner">
    <div id="vcPageContent" class="pageContent">
        <div class="row">
            <div class="col-md-9">
                <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
                    <tbody>
                        <tr><th>Name</th><td>{{ $user->name }}</td></tr>
                        <tr><th>Email</th><td>{{ $user->email }}</td></tr>
                        <tr><th>Email Verified At</th><td>{{ $user->Email_verified_at??'Not Verified' }}</td></tr>
                        <tr><th>Gender</th><td>{{ $user->gender=='m'?'Male':'Female' }}</td></tr>
                        <tr><th>Created At</th><td>{{ $user->created_at }}</td></tr>
                        <tr><th>Updated At</th><td>{{ $user->updated_at }}</td></tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-3">
                @if(isset($user->picture))
                <img src="{{ $user->picture->upload.$user->picture->url }}" width="100%">
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