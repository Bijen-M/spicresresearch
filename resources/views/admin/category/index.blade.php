@extends('admin.layouts.master')

@section('title', 'Categories')

@section('content')
<div id="vcCategoryInner" class="category-inner">
    <div id="vcCategoryContent" class="categoryContent">
        @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif
        <div style="text-align: right;margin-bottom: 10px;">
            <a href="{{ route('category.withtrash') }}" class="btn-sm btn-primary">All</a>
            <a href="{{ route('category.index') }}" class="btn-sm btn-primary">Categories</a>
            <a href="{{ route('category.trash') }}" class="btn-sm btn-primary">Trash</a>
            <a href="{{ route('category.create') }}" class="btn-sm btn-primary">Create</a>
        </div>
        <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Create At</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                @if($categories)
                @foreach($categories as $category)
                <tr>
                    <td>{{ $category->title }}</td>
                    <td>{{ $category->slug }}</td>
                    <td>{{ $category->created_at }}</td>
                    <td>
                        @if(empty($category->deleted_at))
                        <a href="{{ route('category.edit', $category->id) }}"><i class="icofont-edit"></i></a>
                        |
                        <a href="#" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $category->id }}').submit();">
                            {!! __('<i class="icofont-trash"></i>') !!}
                        </a>
                        <div class="delete-item">
                            {{ Form::open(['url' => route('category.destroy', $category->id), 'id' => 'delete-form-'.$category->id,  'style' => 'display: none;']) }}
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            {{ Form::close()}}
                        </div>
                        @else
                        <a href="{{ route('category.restore', $category->id) }}"><i class="icofont-upload"> restore</i></a>
                        <a onclick="return confirm('Are you sure want to permanetly delete this item?')" href="{{ route('category.delete', $category->id) }}"><i class="icofont-trash"> delete</i></a>
                        @endif
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <!--<th>Image</th>-->
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Create At</th>
                    <th>action</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

@endsection

@push('style')
@endpush
@push('script')
<script>
$(document).ready(function() {
    $('#dataTable').DataTable( {
        order: [[ 2, 'desc' ]]
    } );
} );
</script>
@endpush