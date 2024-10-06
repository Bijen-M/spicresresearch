@extends('admin.layouts.master')

@section('title', 'Pages')

@section('content')
<div id="vcPageInner" class="page-inner">
    <div id="vcPageContent" class="pageContent">
        @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif
        <div style="text-align: right;margin-bottom: 10px;">
            <a href="{{ route('page.withtrash') }}" class="btn-sm btn-primary">All</a>
            <a href="{{ route('page.index') }}" class="btn-sm btn-primary">Pages</a>
            <a href="{{ route('page.trash') }}" class="btn-sm btn-primary">Trash</a>
            <a href="{{ route('page.create') }}" class="btn-sm btn-primary">Create</a>
        </div>
        <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <!--<th>Image</th>-->
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Subtitle</th>
                    <th>Create At</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                @if($pages)
                @foreach($pages as $page)
                <tr>
                    <?php /* <td>
                        @if((!empty($page->picture) && file_exists($page->picture->thumb.$page->picture['url'])))
                        <img src="{{ $page->picture->thumb.$page->picture['url'] }}" height="50"/>
                        @endif
                    </td> */ ?>
                    <td>{!! $page->title !!}</td>
                    <td>{{ $page->slug }}</td>
                    <td>{{ $page->sub_title }}</td>
                    <td>{{ $page->created_at }}</td>
                    <td>
                        @if(empty($page->deleted_at))
                        <a href="{{ route('page.show', $page->id) }}"><i class="icofont-eye"></i></a>
                        |
                        <a href="{{ route('page.edit', $page->id) }}"><i class="icofont-edit"></i></a>
                        @if(auth()->user()->is_dev || $page->is_dev == auth()->user()->is_dev)
                        |
                        <a href="#" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $page->id }}').submit();">
                            {!! __('<i class="icofont-trash"></i>') !!}
                        </a>
                        <div class="delete-item">
                            {{ Form::open(['url' => route('page.destroy', $page->id), 'id' => 'delete-form-'.$page->id,  'style' => 'display: none;']) }}
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            {{ Form::close()}}
                        </div>
                        @endif
                        @else
                        <a href="{{ route('page.restore', $page->id) }}"><i class="icofont-upload"> restore</i></a>
                        <a onclick="return confirm('Are you sure want to permanetly delete this item?')" href="{{ route('page.delete', $page->id) }}"><i class="icofont-trash"> delete</i></a>
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
                    <th>Subtitle</th>
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
        order: [[ 3, 'desc' ]]
    } );
} );
</script>
@endpush