@extends('architecture.layouts.master')

@section('title', $portfolio->title)

@section('content')
<section id="vcInnerCols" class="innerContent">
    <div class="projectSingleCols">
        <div class="container">

            <div class="row">
                @if(count($portfolio->picture))
                <div class="col* col-md-6 col-lg-6 projectSingleImg">
                    <div id="Projectcarousel" class="owl-carousel owl-theme">
                        
                        @foreach($portfolio->picture as $image)
                        @if(file_exists($image->upload.$image->url))
                        <div class="item">
                            <figure>
                                <img src="{{ $image->upload.$image->url }}" alt="{{ $portfolio->title }}">
                            </figure>
                        </div>
                        @endif
                        @endforeach


                    </div>
                </div>
                @endif
                

                <div class="col* col-md-6 col-lg-6 projectSingleInfos">

                    <div class="projectSingleDesc">
                        <h2>{{ $portfolio->title }}</h2>
                        {!! $portfolio->description !!}
                    </div>

                    <div class="projectSingleDetails">
                        <ul>
                            @if($portfolio->client)
                            <li>
                                <h4>Client :</h4>
                                <span>{{ $portfolio->client }}</span>
                            </li>
                            @endif
                            @if($portfolio->status)
                            <li>
                                <h4>Status :</h4>
                                <span>{{ $portfolio->status }}</span>
                            </li>
                            @endif
                            @if($portfolio->year)
                            <li>
                                <h4>Year :</h4>
                                <span>{{ $portfolio->year }}</span>
                            </li>
                            @endif
                            @if($portfolio->location)
                            <li>
                                <h4>Location :</h4>
                                <span>{{ $portfolio->location }}</span>
                            </li>
                            @endif
                            @if($portfolio->type)
                            <li>
                                <h4>Type :</h4> <span>{{ $portfolio->type }}</span>
                                <div class="clearfix"></div>
                            </li>
                            @endif

                        </ul>
                    </div>
                </div>
            </div>
            @if(sizeof($portfolios))
            <div class="relatedProject">
                <h1 class="titleHead">Realted Project</h1>
                <div id="relatedProjectcarousel" class="owl-carousel owl-theme">
                    @foreach($portfolios as $portfolio)
                    <div class="item">
                        <div class="projectItem">
                            <div class="productImg">
                                @if(count($portfolio->picture))
                                <figure>
                                    <img src="{{ $portfolio->picture ? $portfolio->picture[0]->upload.$portfolio->picture[0]->url : 'it/images/pf.jpg' }}" alt="Image Title" />
                                </figure>
                                @endif
                            </div>
                            <div class="productContent">
                                <h2>{{ $portfolio->title }}</h2>
                                <p>{!! words($portfolio->description) !!}</p>
                                <div class="readlink">
                                    <a href="{{ route('architecture.portfolio.details', $portfolio->slug) }}">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
@endsection