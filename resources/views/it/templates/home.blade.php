@extends('it.layouts.master')

@section('content')
<section id="vcService" class="ourService sectionTop">
    <div class="container">
        <div class="row">

            <div class="col* col-md-12 col-lg-6 serviceText">
                @if(isset($service))
                <span class="toptext">{{ $service->sub_title }}</span>
                <h1 class="titleHead">{{ $service->title }}</h1>
                {!! $service->description !!}
                @endif
            </div>
            @foreach($services as $service)
            <div class="col* col-md-6 col-lg-3 serviceListTop">
                <!--<a href="{{ route('it.service.details', $service->slug) }}"> -->
                <a href="javascript:void(0)">
                    <div class="serviceIcon">
                        <span class="icofont-{{ $service->icon }}"></span>
                        <h5>{{ $service->title }}</h5>
                    </div>
                    <div class="serviceOverlay">
                        <span class="icofont-{{ $service->icon }}"></span>
                        <h5>{{ $service->title }}</h5>
                        <p>{!! words($service->description) !!}</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>

    </div>
</section>

<section id="vcAboutUs" class="aboutCol">
    <div class="container">
        <div class="row">
            <div class="col* col-md-12 col-lg-{{ $websites->picture?6:12 }} contentColumn">
                <div class="innerColumn">
                    <span class="toptext">{{ $websites->sub_title }}</span>
                    <h1 class="titleHead">{{ $websites->title }}</h1>
                    <div class="text">
                        <p>{!! words($websites->description, 60) !!}</p>
                    </div>
                    <div class="linkBox">
                        <a href="{{ route('it.page', $websites->slug) }}" class="mainBtn btnStyle">Read More</a>
                        <a href="#" class="mainBtn callBtn"><i class="icon la la-phone"></i> {{ $settings->contact_no }}</a>
                    </div>
                </div>
            </div>
            @if($websites->picture)
            <div class="col* col-md-12 col-lg-6 videoColumn">
                <div class="innerColumn">
                    <figure class="image"><img src="{{ $websites->picture->upload.$websites->picture->url }}" alt="{{ $websites->title }}"></figure>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
@if(count($testimonials))
<section id="vcTestimonial" class="clientReview sectionTop">
    <div class="reviewBox" style="background: url(it/images/testi.jpg);background-size: cover;background-repeat: no-repeat;background-attachment: fixed;background-position: 50%;">
        <div class="overlay"></div>
        <div class="container">
            <div class="reviewtext boxText">
                <span class="toptext">Testimonial</span>
                <h1 class="titleHead">What Our Clients Say?</h1>

                <div id="Clientcarousel" class="owl-carousel owl-theme">
                    @foreach($testimonials as $testimonial)
                    <div class="item">
                        <div class="testiCols">
                            <i class="la la-quote-left testimonialQuotes" aria-hidden="true"></i>

                            {!! $testimonial->description !!}

                            <div class="clientInfos">
                                <figure>
                                    <img src="{{ $testimonial->picture ? $testimonial->picture->upload.$testimonial->picture->url : 'it/images/test.jpg' }}" alt="title">
                                </figure>

                                <div class="clientDetails">
                                    <h4>{{ $testimonial->by }}</h4>
                                    <span class="officeClient">{{ $testimonial->designation }}</span>
                                    <span class="postClient">{{ $testimonial->company }}</span>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<section id="vcPortfolio" class="ourWork sectionTop">
    <div class="container">
        <div class="boxText">
            <span class="toptext">{{ $work->sub_title }}</span>
            <h1 class="titleHead">{{ $work->title }}</h1>
            <p>{!! words($work->description, 30) !!}</p>
        </div>

        <div class="portfolioMain-wrapper sectionPortfolio">
            <div class="PortfolioMainWrap">

                <div class="buttonGroup filterWork">
                    <a class="button is-checked" data-filter="*">All</a>
                    <a class="button " data-filter=".web">Branding</a>
                    <a class="button" data-filter=".web-application">Mobile</a>
                    <a class="button" data-filter=".design">Ux</a>
                </div>
                @if($portfolios)
                <div class="PortfolioContent">
                    <div class="row">
                        <div class="portfolioListBox">
                            @foreach($portfolios as $portfolio)
                            @include('it.partials._portfolio')
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>


    </div>
</section>

<section id="vcgetTouch" class="getTouch sectionTop">
    <div id="particles"></div>
    <div class="container">
        <div class="text-center callCols">
            <h2>Ready to get started? Contact us!</h2>
            <p>We design, implement and host wide range of software and web related services enabling you to automate many of your business processes</p>
            <div class="linkBox">
                <a href="tel:{{ $settings->contact_no }}" class="mainBtn callBtn"><i class="icon la la-phone"></i>{{ $settings->contact_no }}</a>
            </div>
        </div>
    </div>
</section>

<section id="vcTeam" class="ourTeam sectionTop">
    <div class="container">
        <div class="boxText">
            <span class="toptext">{{ $member->sub_title }}</span>
            <h1 class="titleHead">{{ $member->title }}</h1>
            <p>{!! words($member->description, 30) !!}</p>
        </div>
        <div class="teamBox">
            <div class="row no-gutters">
                @foreach($teams as $team)
                <div class="col* col-md-6 col-lg-3 teamList">
                    <div class="teamBoxWrap">
                        <img src="{{ $team->picture ? $team->picture->upload.$team->picture->url : 'it/images/team1.jpg' }}" alt="{{ $team->name }}" />
                        <div class="teamContent">
                            <h3 class="teamProfile">
                                <a href="#">{{ $team->name }}</a>
                                <small>{{ $team->position }}</small>
                            </h3>
                            <ul class="socialLink">
                                @if($team->facebook)<li><a href="{{ $team->facebook }}" class="la la-facebook" target="_blank"></a></li>@endif
                                @if($team->google)<li><a href="{{ $team->google }}" class="la la-google" target="_blank"></a></li>@endif
                                @if($team->twitter)<li><a href="{{ $team->twitter }}" class="la la-twitter" target="_blank"></a></li>@endif
                                @if($team->instagram)<li><a href="{{ $team->instagram }}" class="la la-instagram" target="_blank"></a></li>@endif
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection