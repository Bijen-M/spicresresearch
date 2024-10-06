@extends('it.layouts.master')

@section('content')
<section id="vcInnerContent" class="innerContentBox">
    <div class="serviceListing">
        <div class="container">
            <div class="row">
                @foreach($services as $service)
                <div class="col* col-md-6 col-lg-4 serviceListCols">
                    <div class="serviceOutBox">
                        <span class="icofont icofont-{{ $service->icon }}"></span>
                        <h2>{{ $service->title }}</h2>
                        <p>{!! words($service->description) !!}</p>
                        <!--<a href="{{ route('it.service.details', $service->slug) }}" class="readMore">read more</a>-->
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</section>
@endsection