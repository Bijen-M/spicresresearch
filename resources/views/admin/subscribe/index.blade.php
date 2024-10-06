@extends('admin.layouts.master')

@section('title', 'Subscribes')

@section('content')
<div id="vcSubscribeInner" class="subscribe-inner">
    <div id="vcSubscribeContent" class="subscribeContent">
        @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif
        <div style="text-align: right;margin-bottom: 10px;">
            <a href="{{ route('subscribe.withtrash') }}" class="btn-sm btn-primary">All</a>
            <a href="{{ route('subscribe.index') }}" class="btn-sm btn-primary">Subscribes</a>
            <a href="{{ route('subscribe.trash') }}" class="btn-sm btn-primary">Trash</a>
            <a href="{{ route('subscribe.create') }}" class="btn-sm btn-primary">Create</a>
        </div>
        <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Email Id</th>
                    <th>Create At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if($subscribes)
                @foreach($subscribes as $subscribe)
                <tr>
                    <td>{{ $subscribe->email }}</td>
                    <td>{{ $subscribe->created_at }}</td>
                    <td>
                        @if(empty($subscribe->deleted_at))
                        <a href="#" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $subscribe->id }}').submit();" title="move to trash">
                            {!! __('<i class="icofont-trash"></i>') !!}
                        </a>
                        <div class="delete-item">
                            {{ Form::open(['url' => route('subscribe.destroy', $subscribe->id), 'id' => 'delete-form-'.$subscribe->id,  'style' => 'display: none;']) }}
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            {{ Form::close()}}
                        </div>
                        @else
                        <a href="{{ route('subscribe.restore', $subscribe->id) }}"><i class="icofont-upload"> restore</i></a>
                        <a onclick="return confirm('Are you sure want to permanetly delete this item?')" href="{{ route('subscribe.delete', $subscribe->id) }}"><i class="icofont-trash"> delete</i></a>
                        @endif
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <th>Email Id</th>
                    <th>Create At</th>
                    <th>Action</th>
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