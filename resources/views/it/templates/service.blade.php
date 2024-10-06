@extends('it.layouts.master')

@section('content')
<section id="vcInnerContent" class="innerContentBox">
    <div class="SingleBoxDetail">
        <div class="container">
            <div class="row">
                <div class="col* col-md-8 col-lg-8 sideLeft">
                    <div class="singleOptBox">
                        @if($service->picture)
                        <figure>
                            <img src="{{ $service->picture->upload.$service->picture->url }}" alt="{{ $service->title }}">
                        </figure>
                        @endif
                        <div class="singleOptBoxInfos">
                            <h3>{{ $service->title }}</h3>
                            {!! $service->description !!}
                        </div>
                    </div>
                </div>

                <div class="col* col-md-4 col-lg-4 sideRight">

                    <div class="sideBars">
                        <h4 class="sideTitleBar">Latest Services</h4>
                        <ul>
                            @foreach($services as $service)
                            <li>
                                <div class="sideBarInfos">
                                    <a href="{{ route('it.service.details', $service->slug) }}">
                                        <h5>{{ $service->title }}</h5>
                                    </a>
                                        <p>{!! words($service->description, 15) !!}</p>
                                </div>
                            </li>
                            @endforeach

                        </ul>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>
@endsection