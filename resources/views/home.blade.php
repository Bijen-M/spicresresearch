@extends('layouts.master')

@section('content')
<div class="slider">
    <section class="sliderImgBox background">
        <div class="logoContainer">
            <a href="{{ route('home') }}" title="Spices Logo">
                {{-- <img src="home/images/logo.svg" alt="title"> --}}
                <img src="home/images/logomain.png" alt="Spices Research & Consultancy Pvt Ltd">
            </a>
        </div>

        <div class="owl-carousel headerSlider">
            @foreach($banners as $banner)
            @if($banner->picture && file_exists($banner->picture->upload.$banner->picture->url))
            <div class="mainSlider">
                <div class="sliderImg" style="background-image: url({{ $banner->picture->upload.$banner->picture->url }});background-position: 90% 50%;background-size: cover;">
                    <div class="overlay"></div>
                    <div class="sliderContent">
                        @if($banner->url)<a href="{{ $banner->url }}" title="{{ $banner->url }}" class="serviceLink">{{ $banner->url_text }}</a>@endif
                        <h2 class="sliderTitle">{{ $banner->title }}</h2>
                        <p>{{ $banner->description }}</p>

                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </section>

    <section class="slideRightContent">

        <section class="mainMenuBar">

            <div class="navbar">
                <div class="menuIcon">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>

            <div class="navbar-menu">
                <ul>
                    <li>
                        <a href="#" title="Home" data-link=".homeCol">Home</a>
                    </li>
                    <li>
                        <a href="#" title="About" data-link=".aboutCol">About</a>
                    </li>

                    <li>
                        <a href="#" title="Contact" data-link=".contactCol">Contact</a>
                    </li>

                </ul>
            </div>
        </section>

        <main>
            <section id="vcHome" class="homeCol sectionGap">
                <div class="container-fluid">
                    <h1 class="mainTitle">{!! $settings->home_title !!}</h1>

                    <p>{!! $settings->home_summary !!}</p>

                    <div class="companyServices">
                        <h3>our service domains</h3>
                        <ol>
                            @foreach($departments as $department)
                            <li>
                                <a href="{{ url($department->slug) }}" title="{{ $department->title }}">
                                    <div class="serviceOuterBg">
                                        <div class="serviceIcon">
                                            <i class="icofont-{{ $department->icon }}"></i>
                                        </div>
                                        {{ $department->title }}
                                    </div>
                                </a>
                            </li>
                            @endforeach
                            <div class="clearfix"></div>
                        </ol>
                    </div>

                </div>
            </section>

         

            <section id="vcContactUs" class="contactCol sectionGap">
                <div class="container-fluid">
                    <h1 class="mainTitle">Contact Us</h1>
                  
                    <div class="footer-details">
                        <div class="row">
                            <div class="col* col-md-12 col-lg-12 footerDetailsLeft">
                                <ul class="companyInfosContact" data-wow-duration="3s" data-wow-delay="0s">
                                    @if(isset($settings) && $settings->contact_no)
                                    <li>
                                        <div class="footer-ic">
                                            <i class="icofont icofont-ui-dial-phone"></i>
                                        </div>
                                        <div class="footer-ic-info">
                                            <p><label>Call Us </label></p>
                                            <span>{{ $settings->contact_no }}</span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </li>
                                    @endif
                                    @if(isset($settings) && $settings->address)
                                    <li>
                                        <div class="footer-ic">
                                            <i class="icofont icofont-map"></i>
                                        </div>
                                        <div class="footer-ic-info">
                                            <p><label>Find Us </label></p>
                                            <span>{{ $settings->address }}</span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </li>
                                    @endif
                                    @if(isset($settings) && $settings->email)
                                    <li>
                                        <div class="footer-ic">
                                            <i class="icofont icofont-envelope-open"></i>
                                        </div>
                                        <div class="footer-ic-info">
                                            <p><label>Email Us </label></p>
                                            <span>{{ $settings->email }}</span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </li>
                                    @endif
                                </ul>
                            </div>

                            <div class="col* col-md-12 col-lg-12 footerDetailsRight">
                                @if(session()->has('success'))
                                <div class="alert alert-success" >
                                    <span>{{ session()->get('success') }}</span>
                                </div>
                                @endif
                                @if(session()->has('error'))
                                <div class="alert alert-danger" >
                                    <span>{{ session()->get('error') }}</span>
                                </div>
                                @endif
                                
                            
                            </div>

                        </div>
                    </div>
                </div>
            </section>




        </main>
    </section>

</div>
@endsection
