@extends('architecture.layouts.master')

@section('title', 'Services')

@section('content')
<section id="vcInnerCols" class="innerContent">
    <div class="serviceBlocksContent">
        <div class="container">
            <div class="row">
                @forelse($services as $service)
                <div class="col* col-md-6 col-lg-4 serviceListing">
                    <!--<a href="{{ route('architecture.service.details', $service->slug) }}">-->
                    <a href="javascript:void(0)">
                        <div class="serviceOutBox">
                            <figure>
                                <img src="{{ $service->picture ? $service->picture->upload.$service->picture->url : 'images/img1.jpg' }}" alt="">
                            </figure>
                            <div class="serviceContentBox">
                                <h2>{{ $service->title }}</h2>
                                <p>{!! words($service->description) !!}</p>
                            </div>
                        </div>
                    </a>
                </div>
                @empty
                <div class="col* col-md-12 col-lg-12 serviceListing">
                    <p>No Service found.</p>
                </div>
                @endforelse

            </div>
        </div>
    </div>
</section>
@endsection