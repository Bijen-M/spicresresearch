@extends('admin.layouts.master')

@section('title', 'Menus')

@section('content')
<div id="vcMenuInner" class="menu-inner">
    <div id="vcMenuContent" class="menuContent">
        @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif
        <div style="text-align: right;margin-bottom: 10px;">
            <a href="{{ route('menu.withtrash') }}" class="btn-sm btn-primary">All</a>
            <a href="{{ route('menu.index') }}" class="btn-sm btn-primary">Menus</a>
            <a href="{{ route('menu.trash') }}" class="btn-sm btn-primary">Trash</a>
            <a href="{{ route('menu.create') }}" class="btn-sm btn-primary">Create</a>
        </div>
        <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Type</th>
                    <th>Department</th>
                    <th>children</th>
                    <th>Create At</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                @if($menus)
                @foreach($menus as $menu)
                <tr>
                    <?php /* <td>
                        @if((!empty($menu->picture) && file_exists($menu->picture->thumb.$menu->picture['url'])))
                        <img src="{{ $menu->picture->thumb.$menu->picture['url'] }}" height="50"/>
                        @endif
                    </td> */ ?>
                    <td>{!! $menu->title !!}</td>
                    <td>{{ $menu->slug }}</td>
                    <td>{{ $menu->type }}</td>
                    <td>{{ $menu->department->title }}</td>
                    <td><a href="{{ route('menu.children', $menu->id) }}">{{ $menu->children->count() }}</a></td>
                    <td>{{ $menu->created_at }}</td>
                    <td>
                        @if(empty($menu->deleted_at))
                        <a href="{{ route('menu.edit', $menu->id) }}"><i class="icofont-edit"></i></a>
                        @if(auth()->user()->is_dev || $menu->is_dev == auth()->user()->is_dev)
                        |
                        <a href="#" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $menu->id }}').submit();">
                            {!! __('<i class="icofont-trash"></i>') !!}
                        </a>
                        <div class="delete-item">
                            {{ Form::open(['url' => route('menu.destroy', $menu->id), 'id' => 'delete-form-'.$menu->id,  'style' => 'display: none;']) }}
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            {{ Form::close()}}
                        </div>
                        @endif
                        @else
                        <a href="{{ route('menu.restore', $menu->id) }}"><i class="icofont-upload"> restore</i></a>
                        <a onclick="return confirm('Are you sure want to permanetly delete this item?')" href="{{ route('menu.delete', $menu->id) }}"><i class="icofont-trash"> delete</i></a>
                        @endif
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Type</th>
                    <th>Department</th>
                    <th>children</th>
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
        order: [[ 5, 'desc' ]]
    } );
} );
</script>
@endpush