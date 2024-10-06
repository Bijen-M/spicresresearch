@extends('admin.layouts.master')

@section('title', 'Tags')

@section('content')
<div id="vcTagInner" class="tag-inner">
    <div id="vcTagContent" class="tagContent">
        @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif
        <div style="text-align: right;margin-bottom: 10px;">
            <a href="{{ route('tag.withtrash') }}" class="btn-sm btn-primary">All</a>
            <a href="{{ route('tag.index') }}" class="btn-sm btn-primary">Tags</a>
            <a href="{{ route('tag.trash') }}" class="btn-sm btn-primary">Trash</a>
            <a href="{{ route('tag.create') }}" class="btn-sm btn-primary">Create</a>
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
                @if($tags)
                @foreach($tags as $tag)
                <tr>
                    <td>{{ $tag->title }}</td>
                    <td>{{ $tag->slug }}</td>
                    <td>{{ $tag->created_at }}</td>
                    <td>
                        @if(empty($tag->deleted_at))
                        <a href="{{ route('tag.edit', $tag->id) }}"><i class="icofont-edit"></i></a>
                        |
                        <a href="#" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $tag->id }}').submit();">
                            {!! __('<i class="icofont-trash"></i>') !!}
                        </a>
                        <div class="delete-item">
                            {{ Form::open(['url' => route('tag.destroy', $tag->id), 'id' => 'delete-form-'.$tag->id,  'style' => 'display: none;']) }}
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            {{ Form::close()}}
                        </div>
                        @else
                        <a href="{{ route('tag.restore', $tag->id) }}"><i class="icofont-upload"> restore</i></a>
                        <a onclick="return confirm('Are you sure want to permanetly delete this item?')" href="{{ route('tag.delete', $tag->id) }}"><i class="icofont-trash"> delete</i></a>
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