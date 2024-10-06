@extends('architecture.layouts.master')

@section('title', $page->title)

@section('content')
<section id="vcInnerCols" class="innerContent">
    <div class="aboutBox">

        <div class="whyChoose-Box">
            <div class="container">
                <h2 class="aboutSingleTitle">Why Choose Us ?</h2>
                <div class="row">
                    @foreach($whyChooseUs as $wcu)
                    <div class="col* col-md-6 col-lg-6 whyChooseList">
                        <div class="whyChooseCols">
                            <h5>{{ $wcu->title }}</h5>
                            <p>{!! $wcu->description !!}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @if(count($testimonials))
        <div class="clientReviews">
            <div id="particles"></div>
            <div class="clientbgBox">
                <div class="container">
                    <h2 class="aboutSingleTitle">Client Review</h2>

                    <div id="clientSlider" class="owl-carousel owl-theme">
                        @foreach($testimonials as $testimonial)
                        <div class="item">
                            <div class="testimonial">
                                <div class="description">
                                    {!! $testimonial->description !!}
                                </div>
                                <div class="testimonialPic">
                                    <img src="{{ $testimonial->picture ? $testimonial->picture->upload.$testimonial->picture->url : 'architecture/images/test.jpg' }}" alt="">
                                </div>
                                <div class="testimonialReview">
                                    <h3 class="testimonialTitle">{{ $testimonial->by }}</h3>
                                    <span>{{ $testimonial->designation }}</span>
                                    <span class="postClient">{{ $testimonial->company }}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif



        @if(sizeof($teams))
        <div class="temaMemberBox">
            <div class="container">
                <h2 class="aboutSingleTitle">Team Member</h2>
                <div class="row">
                    @foreach($teams as $team)
                    <div class="col* col-md-3 col-lg-3 teamListBox">
                        <div class="ourTeam">
                            <img src="{{ $team->picture ? $team->picture->upload.$team->picture->url : 'architecture/images/team-3.jpg' }}" alt="{{ $team->name }}">
                            <div class="teamContent">
                                <h3>{{ $team->name }}</h3>
                                <span class="post">{{ $team->position }}</span>
                            </div>
                            <ul class="social">
                                @if($team->facebook)<li><a href="{{ $team->facebook }}" class="la la-facebook" target="_blank"></a></li>@endif
                                @if($team->google)<li><a href="{{ $team->google }}" class="la la-google" target="_blank"></a></li>@endif
                                @if($team->twitter)<li><a href="{{ $team->twitter }}" class="la la-twitter" target="_blank"></a></li>@endif
                                @if($team->instagram)<li><a href="{{ $team->instagram }}" class="la la-instagram" target="_blank"></a></li>@endif
                            </ul>
                            <div class="icon la la-plus"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
@endsection