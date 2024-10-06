@extends('architecture.layouts.master')

@section('content')
<section id="vcInnerCols" class="innerContent">
    <div class="projectListingBox">
        <div class="container">
            <div class="row">
                @foreach($portfolios as $portfolio)
                @include('architecture.partials._portfolio')
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection