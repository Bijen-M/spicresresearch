@extends('admin.layouts.master')

@section('title', 'Banners')

@section('content')
<div id="vcPortfolioInner" class="portfolio-inner">
    <div id="vcPortfolioContent" class="portfolioContent">
        <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
            <tbody>
                @if($portfolio)
                @foreach($portfolio->getOriginal() as $key => $value)
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