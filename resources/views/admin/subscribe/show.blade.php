@extends('admin.layouts.master')

@section('title', 'Subscribe')

@section('content')
<div id="vcPageInner" class="category-inner">
    <div id="vcPageContent" class="categoryContent">
        <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
            <tbody>
                @if($subscribe)
                @foreach($subscribe->getOriginal() as $key => $value)
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