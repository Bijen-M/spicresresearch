@extends('admin.layouts.master')

@section('title', 'Banners')

@section('content')
<div id="vcPageInner" class="service-inner">
    <div id="vcPageContent" class="serviceContent">
        <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
            <tbody>
                @if($service)
                @foreach($service->getOriginal() as $key => $value)
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

@push('style')
@endpush
@push('script')
@endpush