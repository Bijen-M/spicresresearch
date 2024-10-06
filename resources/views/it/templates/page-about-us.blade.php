@extends('it.layouts.master')

@section('title', $page->title)

@section('content')
<section id="vcInnerContent" class="innerContentBox">
    <div class="container">
        <div class="aboutBox">
            <h2 class="aboutTextTitle">{{ $history->title }}</h2>

            <div class="row">
                <div class="col* col-md-12 col-lg-7 aboutInfostext">
                    {!! $history->description !!}
                </div>

                @if($history->picture)

                <div class="col* col-md-12 col-lg-5 aboutImg">

                    <figure>

                        <img src="{{ $history->picture->upload.$history->picture->url }}" alt="{{ $history->title }}">

                    </figure>

                </div>

                @endif
            </div>
        </div>
    </div>

    <div class="whyChooseBox">
        <div class="container">
            <h2 class="aboutTextTitle">Why Choose Us ?</h2>
            <div class="row">
                @foreach($whyChooseUs as $wcu)
                <div class="col* col-md-6 col-lg-4 whyChooseList">
                    <div class="whyChooseCols">
                        <h5>{{ $wcu->title }}</h5>
                        <p>{!! $wcu->description !!}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @if($teams)
    <div class="aboutTeamCols">
        <div class="container">
            <h2 class="aboutTextTitle">Meet Our Team</h2>
            <div id="Teamcarousel" class="aboutTeamBox owl-carousel owl-theme">
                @foreach($teams as $team)
                <div class="item">
                    <div class="teamList">
                        <div class="teamBoxWrap">
                            <img src="{{ optional($team->picture)->upload.optional($team->picture)->url }}" alt="{{ $team->name }}">
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
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif
</section>
@endsection