@extends('admin.layouts.master')

@section('title', 'Why Choose Us')

@section('content')
<div id="vcPageInner" class="why-choose-us-inner">
    <div id="vcPageContent" class="why-choose-usContent">
        @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif
        <div style="text-align: right;margin-bottom: 10px;">
            <a href="{{ route('why-choose-us.withtrash') }}" class="btn-sm btn-primary">All</a>
            <a href="{{ route('why-choose-us.index') }}" class="btn-sm btn-primary">Why Choose Us</a>
            <a href="{{ route('why-choose-us.trash') }}" class="btn-sm btn-primary">Trash</a>
            <a href="{{ route('why-choose-us.create') }}" class="btn-sm btn-primary">Create</a>
        </div>
        <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <!--<th>Image</th>-->
                    <th>Title</th>
                    <th>Description</th>
                    <th>Department</th>
                    <th>Create At</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                @if($whyChooseUs)
                @foreach($whyChooseUs as $wcu)
                <tr>
                    <?php /* <td>
                        @if((!empty($wcu->picture) && file_exists($wcu->picture->thumb.$wcu->picture['url'])))
                        <img src="{{ $wcu->picture->thumb.$wcu->picture['url'] }}" height="50"/>
                        @endif
                    </td> */ ?>
                    <td>{!! $wcu->title !!}</td>
                    <td>{!! $wcu->description !!}</td>
                    <td>{{ $wcu->department->title }}</td>
                    <td>{{ $wcu->created_at }}</td>
                    <td>
                        @if(empty($wcu->deleted_at))
                        <a href="{{ route('why-choose-us.show', $wcu->id) }}"><i class="icofont-eye"></i></a>
                        |
                        <a href="{{ route('why-choose-us.edit', $wcu->id) }}"><i class="icofont-edit"></i></a>
                        |
                        <a href="#" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $wcu->id }}').submit();">
                            {!! __('<i class="icofont-trash"></i>') !!}
                        </a>
                        <div class="delete-item">
                            {{ Form::open(['url' => route('why-choose-us.destroy', $wcu->id), 'id' => 'delete-form-'.$wcu->id,  'style' => 'display: none;']) }}
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            {{ Form::close()}}
                        </div>
                        @else
                        <a href="{{ route('why-choose-us.restore', $wcu->id) }}"><i class="icofont-upload"> restore</i></a>
                        <a onclick="return confirm('Are you sure want to permanetly delete this item?')" href="{{ route('why-choose-us.delete', $wcu->id) }}"><i class="icofont-trash"> delete</i></a>
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
                    <th>Description</th>
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