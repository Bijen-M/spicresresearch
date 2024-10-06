@extends('admin.layouts.master')

@section('title', 'Dashborad')

@section('content')
<div id="vcPageInner" class="page-inner">
    <div class="topHomeBar">
        <div class="row">
            <div class="col* col-md-6 col-lg-6 col-xl-3 topHomeCol">
                <div class="topHomeBox color1">
                    <div class="homeBoxNo">
                        <span class="numberCount">{{ $pages }}</span>
                        <h3 class="homeBoxTitle">Pages</h3>
                    </div>

                    <div class="homeBoxIcon">
                        <i class="icofont-newspaper"></i>
                    </div>

                </div>
            </div>

            <div class="col* col-md-6 col-lg-6 col-xl-3 topHomeCol">
                <div class="topHomeBox color2">
                    <div class="homeBoxNo">
                        <span class="numberCount">{{ $blogs }}</span>
                        <h3 class="homeBoxTitle">Blogs</h3>
                    </div>

                    <div class="homeBoxIcon">
                        <i class="icofont-blogger"></i>
                    </div>

                </div>
            </div>

            <div class="col* col-md-6 col-lg-6 col-xl-3 topHomeCol">
                <div class="topHomeBox color3">
                    <div class="homeBoxNo">
                        <span class="numberCount">{{ $portfolios }}</span>
                        <h3 class="homeBoxTitle">Portfolios</h3>
                    </div>

                    <div class="homeBoxIcon">
                        <i class="icofont-tasks-alt"></i>
                    </div>

                </div>
            </div>

            <div class="col* col-md-6 col-lg-6 col-xl-3 topHomeCol">
                <div class="topHomeBox color4">
                    <div class="homeBoxNo">
                        <span class="numberCount">{{ $subscribers }}</span>
                        <h3 class="homeBoxTitle">Subscribers</h3>
                    </div>

                    <div class="homeBoxIcon">
                        <i class="icofont-email"></i>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection