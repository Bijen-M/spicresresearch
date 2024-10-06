@extends('it.layouts.master')

@section('title', $page->title)

@section('content')
<section id="vcInnerContent" class="innerContentBox">
    <div class="container">
        <div class="aboutBox">
            <h2 class="aboutTextTitle">{{ $page->title }}</h2>
            <div class="row">
                <div class="col* col-md-12 col-lg-{{$page->picture?7:12}} aboutInfostext">
                    {!! $page->description !!}
                </div>
                @if($page->picture)
                <div class="col* col-md-12 col-lg-5 aboutImg">
                    <figure>
                        <img src="{{ $page->picture->upload.$page->picture->url }}" alt="{{ $page->title }}">
                    </figure>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection