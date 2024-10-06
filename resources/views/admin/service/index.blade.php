@extends('admin.layouts.master')

@section('title', 'Services')

@section('content')
<div id="vcServiceInner" class="service-inner">
    <div id="vcServiceContent" class="serviceContent">
        @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif
        <div style="text-align: right;margin-bottom: 10px;">
            <a href="{{ route('service.withtrash') }}" class="btn-sm btn-primary">All</a>
            <a href="{{ route('service.index') }}" class="btn-sm btn-primary">Services</a>
            <a href="{{ route('service.trash') }}" class="btn-sm btn-primary">Trash</a>
            <a href="{{ route('service.create') }}" class="btn-sm btn-primary">Create</a>
            
        </div>
        <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <!--<th>Image</th>-->
                    <th>Title</th>
                    <th>Department</th>
                    <th>Create At</th>
                    <th style="width: 100px">action</th>
                </tr>
            </thead>
            <tbody>
                @if($services)
                @foreach($services as $service)
                
                <tr>
                    <?php /* <td>
                        @if((!empty($service->picture) && file_exists($service->picture->thumb.$service->picture['url'])))
                        <img src="{{ $service->picture->thumb.$service->picture['url'] }}" height="50"/>
                        @endif
                    </td> */ ?>
                    <td>{{ $service->title }}</td>
                    <td>{{ $service->department->title }}</td>
                    <td>{{ $service->created_at }}</td>
                    <td>
                        @if(empty($service->deleted_at))
                        <a href="{{ url($service->department->slug, ['service', $service->slug]) }}" target="_blank"><i class="icofont-eye"></i></a>
                        |
                        <a href="{{ route('service.edit', $service->id) }}"><i class="icofont-edit"></i></a>
                        |
                        <a href="#" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $service->id }}').submit();">
                            {!! __('<i class="icofont-trash"></i>') !!}
                        </a>
                        <div class="delete-item">
                            {{ Form::open(['url' => route('service.destroy', $service->id), 'id' => 'delete-form-'.$service->id,  'style' => 'display: none;']) }}
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            {{ Form::close()}}
                        </div>
                        @else
                        <a href="{{ route('service.restore', $service->id) }}"><i class="icofont-upload"> restore</i></a>
                        <a onclick="return confirm('Are you sure want to permanetly delete this item?')" href="{{ route('service.delete', $service->id) }}"><i class="icofont-trash"> delete</i></a>
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
                    <th>Department</th>
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