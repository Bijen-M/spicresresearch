@extends('architecture.layouts.master')

@section('title', $blog->title)

@section('content')
<section id="vcInnerContent" class="innerContentBox">
    <div class="SingleBoxDetail">
        <div class="container">
            <div class="row">
                <div class="col* col-md-8 col-lg-8 sideLeft">
                    <div class="singleOptBox">
                        @if($blog->picture && file_exists($blog->picture->upload.$blog->picture->url))
                        <figure>
                            <img src="{{ $blog->picture->upload.$blog->picture->url }}" alt="{{ $blog->title }}">
                        </figure>
                        @endif
                        <div class="singleOptBoxInfos">
                            <span class="postDate">{{ $carbon->parse($blog->date)->format('F d, Y') }} ( {{ $carbon->parse($blog->date)->diffForHumans() }} )</span>
                            <h3>{{ $blog->title }}</h3>

                            @if($blog->by)
                            <div class="blogAuthor">
                                <a >
                                    <figure>
                                        <img src="architecture/images/avatar.png" alt="{{ $blog->by }}">
                                    </figure>
                                    <span>By: {{ $blog->by }}</span>
                                </a>
                            </div>
                            @endif

                            {!! $blog->description !!}
                            @if(sizeof($blog->tags))
                            <div class="blogTags">
                                <ul>
                                    @foreach($blog->tags as $tag)
                                    <li>
                                        <a href="{{ route('architecture.blogs.tag', $tag->slug) }}">
                                            <span>#{{ $tag-> title }}</span>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col* col-md-4 col-lg-4 sideRight">

                    <div class="sideBars">
                        <h4 class="sideTitleBar">Latest From Blog</h4>
                        <ul>
                            @foreach($blogs as $blog)
                            <li>
                                <div class="sideBarInfos">
                                    <a href="{{ route('architecture.blog.details', $blog->slug) }}">
                                        <span>{{ $carbon->parse($blog->date)->format('dS F, Y') }} </span>
                                        <h5>{{ $blog->title }}</h5>
                                    </a>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>
@endsection