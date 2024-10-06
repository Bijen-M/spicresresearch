@extends('admin.layouts.master')

@section('title', 'Images')

@section('content')
<div id="vcPageInner" class="page-inner">
    <div id="vcPageContent" class="pageContent">
        @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif
        <div style="text-align: right;margin-bottom: 10px;">
            <a href="{{ route('image.withtrash') }}" class="btn-sm btn-primary">All</a>
            <a href="{{ route('image.index') }}" class="btn-sm btn-primary">Images</a>
            <a href="{{ route('image.trash') }}" class="btn-sm btn-primary">Trash</a>
            <a href="{{ route('image.create') }}" class="btn-sm btn-primary">Create</a>
        </div>
        <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th style="width: 100px">action</th>
                </tr>
            </thead>
            <tbody>
                @if($images)
                @foreach($images as $image)
                <tr>
                    <td>{{ $image->name }}</td>
                    <td>{{ $image->email }}</td>
                    <td>{{ $image->status }}</td>
                    <td>
                        @if(empty($image->deleted_at))
                            <a href="{{ route('image.show', $image->id) }}"><i class="icofont-eye"></i></a>
                            |
                            <a href="{{ route('image.edit', $image->id) }}"><i class="icofont-edit"></i></a>
                            |
                            <a href="{{ route('image.destroy', $image->id) }}"
                                onclick="event.preventDefault();
                                              document.getElementById('delete-form').submit();">
                                 {!! __('<i class="icofont-trash"></i>') !!}
                             </a>
                            <div class="delete-item">
                            {{ Form::open(['url' => route('image.destroy', $image->id), 'id' => 'delete-form',  'style' => 'display: none;']) }}
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <!--<button type="submit" href="{{-- route('image.destroy', $image->id) --}}"><i class="icofont-trash"></i></button>-->
                            {{ Form::close()}}
                            </div>
                        @else
                            <a href="{{ route('image.restore', $image->id) }}"><i class="icofont-upload"> restore</i></a>
                            <a onclick="return confirm('Are you sure want to permanetly delete this item?')" href="{{ route('image.delete', $image->id) }}"><i class="icofont-trash"> delete</i></a>
                        @endif
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
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
@endpush