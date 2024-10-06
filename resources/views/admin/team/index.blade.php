@extends('admin.layouts.master')

@section('title', 'Teams')

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
            <a href="{{ route('team.withtrash') }}" class="btn-sm btn-primary">All</a>
            <a href="{{ route('team.index') }}" class="btn-sm btn-primary">Teams</a>
            <a href="{{ route('team.trash') }}" class="btn-sm btn-primary">Trash</a>
            <a href="{{ route('team.create') }}" class="btn-sm btn-primary">Create</a>
        </div>
        <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Department</th>
                    <th>Create At</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                @if($teams)
                @foreach($teams as $team)
                <tr>
                    <td>
                        @if((!empty($team->picture) && file_exists($team->picture->thumb.$team->picture['url'])))
                        <img src="{{ $team->picture->thumb.$team->picture['url'] }}" height="50"/>
                        @endif
                    </td>
                    <td>{{ $team->name }}</td>
                    <td>{{ $team->position }}</td>
                    <td>{{ $team->department->title }}</td>
                    <td>{{ $team->created_at }}</td>
                    <?php /* <td>{!! $status[$team->status] !!}</td> */ ?>
                    <td>
                        @if(empty($team->deleted_at))
                        <a href="{{ route('team.show', $team->id) }}"><i class="icofont-eye"></i></a>
                        |
                        <a href="{{ route('team.edit', $team->id) }}"><i class="icofont-edit"></i></a>
                        |
                        <a href="{{ route('team.destroy', $team->id) }}"
                           onclick="event.preventDefault();
                                        document.getElementById('delete-form-{{ $team->id }}').submit();">
                            {!! __('<i class="icofont-trash"></i>') !!}
                        </a>
                        <div class="delete-item">
                            {{ Form::open(['url' => route('team.destroy', $team->id), 'id' => 'delete-form-'.$team->id,  'style' => 'display: none;']) }}
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <!--<button type="submit" href="{{-- route('team.destroy', $team->id) --}}"><i class="icofont-trash"></i></button>-->
                            {{ Form::close()}}
                        </div>
                        @else
                        <a href="{{ route('team.restore', $team->id) }}"><i class="icofont-upload"> restore</i></a>
                        <a onclick="return confirm('Are you sure want to permanetly delete this item?')" href="{{ route('team.delete', $team->id) }}"><i class="icofont-trash"> delete</i></a>
                        @endif
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Position</th>
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
//    (function team() {
//        $.ajax({
//            url: "{{-- route('team.count') --}}",
//            success: function (data) {
//                $('#count').html(data);
//            },
//            complete: function () {
//                setTimeout(team, 5000);
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