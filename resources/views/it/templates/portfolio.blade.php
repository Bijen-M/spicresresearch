@extends('it.layouts.master')

@section('title', $portfolio->title)

@section('content')
<section id="vcInnerContent" class="innerContentBox">
    <div class="projectDetailCols">
        <div class="container">


            <div class="projectDetailInfos">
                <div class="row">

                    <div class="col* col-md-8 col-lg-8 projectDetailInfosLeft">

                        <h3 class="projectDetailTitle">About Project</h3>
                        
                        @if(count($portfolio->picture))
                        <div class="projectDetailSlider">
                            <div id="Projectcarousel" class="owl-carousel owl-theme">
                                @foreach($portfolio->picture as $image)
                                @if(file_exists($image->upload.$image->url))
                                <div class="item">
                                    <figure>
                                        <a href="{{ $image->upload.$image->url }}" data-fancybox="gallery" data-caption="{{ $portfolio->title }}">
                                            <img src="{{ $image->upload.$image->url }}" alt="title">
                                        </a>
                                    </figure>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                        @endif
                        {!! $portfolio->description !!}
                    </div>

                    <div class="col* col-md-4 col-lg-4 projectDetailInfosRight">
                        <h3 class="projectDetailTitle">Project Information</h3>
                        <div class="sideBg">

                            <ul>
                                @if($portfolio->category)
                                <li>
                                    <label>Category :</label>
                                    <span>{{ $portfolio->category }}</span>
                                </li>
                                @endif
                                @if($portfolio->status)
                                <li>
                                    <label>Status :</label>
                                    <span>{{ $portfolio->status }}</span>
                                </li>
                                @endif
                                @if($portfolio->client)
                                <li>
                                    <label>Client :</label>
                                    <span>{{ $portfolio->client }}</span>
                                </li>
                                @endif
                                @if($portfolio->technology)
                                <li>
                                    <label>Technology :</label>
                                    <span>{{ $portfolio->technology }}</span>
                                </li>
                                @endif
                                @if($portfolio->url)
                                <li>
                                    <label>URL :</label>
                                    <span><a href="{{ $portfolio->url }}"> {{ $portfolio->url }} </a></span>
                                </li>
                                @endif
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="relatedProject">
                <h1 class="titleHead">Realted Project</h1>
                <div id="relatedProject-carousel" class="owl-carousel owl-theme">
                    @foreach($portfolios as $portfolio)
                    <div class="item">
                        <div class="PortfolioMainWrap">
                            <div class="PortfolioContent">
                                <div class="portfolioListBox">
                                    <div class="PortfolioItem web">
                                        <a href="{{ route('it.portfolio.details', $portfolio->slug) }}">
                                            <div class="PortfolioCaption">
                                                @if(count($portfolio->picture))
                                                <figure>
                                                    <img src="{{ $portfolio->picture ? $portfolio->picture[0]->upload.$portfolio->picture[0]->url : 'it/images/pf.jpg' }}" alt="Image Title" />
                                                </figure>
                                                @endif
                                                <div class="overlay">
                                                    <div class="PortfolioInfoContent">
                                                        <h4>{{ $portfolio->title }}</h4>
                                                        <p>{!! words($portfolio->description) !!}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
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
@endsection

@push('style')
<link rel="stylesheet" type="text/css" href="it/css/jquery.fancybox.min.css">
@endpush
@push('script')
<script src="it/js/jquery.fancybox.min.js"></script>
@endpush