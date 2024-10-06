@if(isset($banners))
<section id="vcBanner" class="slider">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            @foreach($banners as $banner)
            @if($banner->picture && file_exists($banner->picture->upload.$banner->picture->url))
            <div class="swiper-slide">
                <div class="slide-inner bg-image" style="background: url({{ $banner->picture->upload.$banner->picture->url }});">
                    <div class="overlay"></div>
                    <div class="container">
                        <div class="middleContent">
                            <div class="bannerHead" data-swiper-parallax="400">
                                <h2 >{{ $banner->title }}</h2>
                            </div>

                            <div class="bannerInfos" data-swiper-parallax="500">
                                <p >{{ $banner->description }}</p>
                            </div>

                            <div class="clearfix"></div>
                            @if($banner->url)
                            <div class="linkBanner" data-swiper-parallax="400">
                                <a href="{{ $banner->url }}" >{{ $banner->url_text }}<span></span></a> 
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="fog-low">
                        <img src="it/images/fog-low.png" alt="">
                    </div>
                    <div class="fog-low right">
                        <img src="it/images/fog-low.png" alt="">
                    </div>
                    <div class="moving-clouds" style="background-image: url('it/images/clouds.png'); "></div>
                </div>  
            </div>
            @endif
            @endforeach
        </div>
    </div>
</section>
@endif