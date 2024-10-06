@if(isset($banners))



<section class="fullscreenBannertext-center">

    <div id="slider" class="sl-slider-wrapper">

        <div class="sl-slider">

            

            @foreach($banners as $banner)

            @if($banner->picture && file_exists($banner->picture->upload.$banner->picture->url))

            <div class="sl-slide sl-trans-elems" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">

                <div class="sl-slide-inner" data-bg-img="" data-overlay="6" style="background: url({{ $banner->picture->upload.$banner->picture->url }});background-size: cover;background-position: center;">

                    <div class="align-center">

                        <div class="container">

                            <div class="bannerAutoBox">

                                <div class="box-shadow bannerOverlay bannerSlideMid" data-bg-color="rgba(255,255,255,0.030)">

                                    <div class="sliderHeadTitle animated8">

                                        <h1>{{ $banner->title }}</h1>

                                    </div>

                                    <div class="sliderHeadInfos lead animated5">

                                        <p>{{ $banner->description }}</p>

                                    </div>

                                    @if($banner->url)

                                    <div class="linkBanner" data-swiper-parallax="400">

                                        <a href="{{ $banner->url }}" >{{ $banner->url_text }}<span></span></a> 

                                    </div>

                                    @endif

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            @endif

            @endforeach

        </div>

        <!-- /sl-slider -->

        <nav id="nav-arrows" class="nav-arrows"> <span class="nav-arrow-prev">Previous</span>

            <span class="nav-arrow-next">Next</span>

        </nav>

        <nav id="nav-dots" class="nav-dots">

            @foreach($banners as $key => $banner)

            @if($banner->picture && file_exists($banner->picture->upload.$banner->picture->url))

            <span class="{{ $key++==0 ? 'nav-dot-current' : null }}"></span>

            @endif

            @endforeach

        </nav>

    </div>

    <!-- /slider-wrapper -->

</section>




@endif