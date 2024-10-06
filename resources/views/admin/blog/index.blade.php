@extends('admin.layouts.master')

@section('title', 'Blogs')

@section('content')
<div id="vcPageInner" class="page-inner">
    <div id="vcPageContent" class="pageContent">
        <!--<div id="count">0</div>-->
        @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif
        <div style="text-align: right;margin-bottom: 10px;">
            <a href="{{ route('blog.withtrash') }}" class="btn-sm btn-primary">All</a>
            <a href="{{ route('blog.index') }}" class="btn-sm btn-primary">Blogs</a>
            <a href="{{ route('blog.trash') }}" class="btn-sm btn-primary">Trash</a>
            <a href="{{ route('blog.create') }}" class="btn-sm btn-primary">Create</a>
        </div>
        <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Department</th>
                    <th>Category</th>
                    <th>Date</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                @if($blogs)
                @foreach($blogs as $blog)
                <tr>
                    <td>{{ $blog->title }}</td>
                    <td>{{ $blog->department->title }}</td>
                    <td>{{ isset($blog->category)?$blog->category->title:null }}</td>
                    <td>{{ $blog->date }}</td>
                    <td>
                        @if(empty($blog->deleted_at))
                        <a href="{{ url($blog->department->slug, ['blog', $blog->slug]) }}" target="_blank"><i class="icofont-eye"></i></a>
                        |
                        <a href="{{ route('blog.edit', $blog->id) }}"><i class="icofont-edit"></i></a>
                        |
                        <a href="{{ route('blog.destroy', $blog->id) }}"
                           onclick="event.preventDefault();
                                        document.getElementById('delete-form-{{ $blog->id }}').submit();">
                            {!! __('<i class="icofont-trash"></i>') !!}
                        </a>
                        <div class="delete-item">
                            {{ Form::open(['url' => route('blog.destroy', $blog->id), 'id' => 'delete-form-'.$blog->id,  'style' => 'display: none;']) }}
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <!--<button type="submit" href="{{-- route('blog.destroy', $blog->id) --}}"><i class="icofont-trash"></i></button>-->
                            {{ Form::close()}}
                        </div>
                        @else
                        <a href="{{ route('blog.restore', $blog->id) }}"><i class="icofont-upload"> restore</i></a>
                        <a onclick="return confirm('Are you sure want to permanetly delete this item?')" href="{{ route('blog.delete', $blog->id) }}"><i class="icofont-trash"> delete</i></a>
                        @endif
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <th>Title</th>
                    <th>Department</th>
                    <th>Category</th>
                    <th>Date</th>
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
        order: [[ 3, 'desc' ]]
    } );
} );
</script>
@endpush