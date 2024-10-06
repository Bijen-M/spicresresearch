@extends('admin.layouts.master')

@section('title', 'Banners')

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
            <a href="{{ route('banner.withtrash') }}" class="btn-sm btn-primary">All</a>
            <a href="{{ route('banner.index') }}" class="btn-sm btn-primary">Banners</a>
            <a href="{{ route('banner.trash') }}" class="btn-sm btn-primary">Trash</a>
            <a href="{{ route('banner.create') }}" class="btn-sm btn-primary">Create</a>
        </div>
        <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Department</th>
                    <th>Create At</th>
                    <!--<th>Status</th>-->
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                @if($banners)
                @foreach($banners as $banner)
                <tr>
                    <td>
                        @if((!empty($banner->picture) && file_exists($banner->picture->thumb.$banner->picture['url'])))
                        <img src="{{ $banner->picture->thumb.$banner->picture['url'] }}" height="50"/>
                        @endif
                    </td>
                    <td>{{ $banner->title }}</td>
                    <td>{{ $banner->department?$banner->department->title:null }}</td>
                    <td>{{ $banner->created_at }}</td>
                    <?php /* <td>{!! $status[$banner->status] !!}</td> */ ?>
                    <td>
                        @if(empty($banner->deleted_at))
                        <a href="{{ route('banner.show', $banner->id) }}"><i class="icofont-eye"></i></a>
                        |
                        <a href="{{ route('banner.edit', $banner->id) }}"><i class="icofont-edit"></i></a>
                        |
                        <a href="{{ route('banner.destroy', $banner->id) }}"
                           onclick="event.preventDefault();
                                        document.getElementById('delete-form-{{ $banner->id }}').submit();">
                            {!! __('<i class="icofont-trash"></i>') !!}
                        </a>
                        <div class="delete-item">
                            {{ Form::open(['url' => route('banner.destroy', $banner->id), 'id' => 'delete-form-'.$banner->id,  'style' => 'display: none;']) }}
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <!--<button type="submit" href="{{-- route('banner.destroy', $banner->id) --}}"><i class="icofont-trash"></i></button>-->
                            {{ Form::close()}}
                        </div>
                        @else
                        <a href="{{ route('banner.restore', $banner->id) }}"><i class="icofont-upload"> restore</i></a>
                        <a onclick="return confirm('Are you sure want to permanetly delete this item?')" href="{{ route('banner.delete', $banner->id) }}"><i class="icofont-trash"> delete</i></a>
                        @endif
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Department</th>
                    <th>Create At</th>
                    <!--<th>Status</th>-->
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
//    (function banner() {
//        $.ajax({
//            url: "{{-- route('banner.count') --}}",
//            success: function (data) {
//                $('#count').html(data);
//            },
//            complete: function () {
//                setTimeout(banner, 5000);
//            }
//        });
//    })();
</script>
<script>
$(document).ready(function() {
    $('#dataTable').DataTable( {
        order: [[ 3, 'desc' ]]
    } );
} );
</script>
@endpush