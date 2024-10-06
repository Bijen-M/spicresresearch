@extends('admin.layouts.master')

@section('title', 'Portfolios')

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
            <a href="{{ route('portfolio.withtrash') }}" class="btn-sm btn-primary">All</a>
            <a href="{{ route('portfolio.index') }}" class="btn-sm btn-primary">Portfolios</a>
            <a href="{{ route('portfolio.trash') }}" class="btn-sm btn-primary">Trash</a>
            <a href="{{ route('portfolio.create') }}" class="btn-sm btn-primary">Create</a>
        </div>
        <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Department</th>
                    <th>Created At</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                @if($portfolios)
                @foreach($portfolios as $portfolio)
                <tr>
                    <td>{{ $portfolio->title }}</td>
                    <td>{{ $portfolio->department->title }}</td>
                    <td>{{ $portfolio->created_at }}</td>
                    <td>
                        @if(empty($portfolio->deleted_at))
                        <a href="{{ url($portfolio->department->slug, ['portfolio', $portfolio->slug]) }}" target="_blank"><i class="icofont-eye"></i></a>
                        |
                        <a href="{{ route('portfolio.edit', $portfolio->id) }}"><i class="icofont-edit"></i></a>
                        |
                        <a href="{{ route('portfolio.destroy', $portfolio->id) }}"
                           onclick="event.preventDefault();
                                        document.getElementById('delete-form-{{ $portfolio->id }}').submit();">
                            {!! __('<i class="icofont-trash"></i>') !!}
                        </a>
                        <div class="delete-item">
                            {{ Form::open(['url' => route('portfolio.destroy', $portfolio->id), 'id' => 'delete-form-'.$portfolio->id,  'style' => 'display: none;']) }}
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <!--<button type="submit" href="{{-- route('portfolio.destroy', $portfolio->id) --}}"><i class="icofont-trash"></i></button>-->
                            {{ Form::close()}}
                        </div>
                        @else
                        <a href="{{ route('portfolio.restore', $portfolio->id) }}"><i class="icofont-upload"> restore</i></a>
                        <a onclick="return confirm('Are you sure want to permanetly delete this item?')" href="{{ route('portfolio.delete', $portfolio->id) }}"><i class="icofont-trash"> delete</i></a>
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
                    <th>Created At</th>
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