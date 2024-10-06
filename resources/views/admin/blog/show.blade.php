@extends('admin.layouts.master')

@section('title', 'Banners')

@section('content')
<div id="vcBlogInner" class="blog-inner">
    <div id="vcBlogContent" class="blogContent">
        <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
            <tbody>
                @if($blog)
                @foreach($blog->getOriginal() as $key => $value)
                <tr>
                    <th>{{ ucfirst($key) }}</th>
                    <td>{{ $value }}</td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>

@endsection

@section('style')
@endsection
@section('script')
@endsection