@extends('admin.layouts.master')

@section('title', 'Images')

@section('content')
<div id="vcPageInner" class="page-inner">
    <div id="vcPageContent" class="pageContent">
        {{-- dd($image->getOriginal()) --}}
        <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
            <tbody>
                @if($image)
                @foreach($image->getOriginal() as $key => $value)
                <tr>
                    <th>{{ ucfirst($key) }}</th>
                    <td>{{ $value }}</td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>

@endsection

@section('style')
@endsection
@section('script')
@endsection