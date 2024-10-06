@extends('admin.layouts.master')

@section('title', 'News Letters')

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
            <a href="{{ route('news-letter.withtrash') }}" class="btn-sm btn-primary">All</a>
            <a href="{{ route('news-letter.index') }}" class="btn-sm btn-primary">News Letters</a>
            <a href="{{ route('news-letter.trash') }}" class="btn-sm btn-primary">Trash</a>
            <a href="{{ route('news-letter.create') }}" class="btn-sm btn-primary">Create</a>
        </div>
        <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                @if($newsLetters)
                @foreach($newsLetters as $newsLetter)
                <tr>
                    <td>{{ $newsLetter->title }}</td>
                    <td>{{ $newsLetter->created_at }}</td>
                    <td>{{ $newsLetter->updated_at }}</td>
                    <td>
                        @if(empty($newsLetter->deleted_at))
                        <a href="{{ route('news-letter.edit', $newsLetter->id) }}"><i class="icofont-edit"></i></a>
                        |
                        <a href="{{ route('news-letter.destroy', $newsLetter->id) }}"
                           onclick="event.preventDefault();
                                        document.getElementById('delete-form-{{ $newsLetter->id }}').submit();">
                            {!! __('<i class="icofont-trash"></i>') !!}
                        </a>
                        <div class="delete-item">
                            {{ Form::open(['url' => route('news-letter.destroy', $newsLetter->id), 'id' => 'delete-form-'.$newsLetter->id,  'style' => 'display: none;']) }}
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <!--<button type="submit" href="{{-- route('news-letter.destroy', $newsLetter->id) --}}"><i class="icofont-trash"></i></button>-->
                            {{ Form::close()}}
                        </div>
                        @else
                        <a href="{{ route('news-letter.restore', $newsLetter->id) }}"><i class="icofont-upload"> restore</i></a>
                        <a onclick="return confirm('Are you sure want to permanetly delete this item?')" href="{{ route('news-letter.delete', $newsLetter->id) }}"><i class="icofont-trash"> delete</i></a>
                        @endif
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <th>Title</th>
                    <th>Created At</th>
                    <th>Updated At</th>
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