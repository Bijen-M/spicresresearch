@extends('it.layouts.master')

@section('title', 'Blogs')

@section('content')
<section id="vcInnerContent" class="innerContentBox">
    <div class="blogListingBox">
        <div class="container">
            <div class="row">
                <div class="col* col-md-12 col-lg-12 sideLeft">
                    <div class="row">
                        @foreach($blogs as $blog)
                        <div class="col* col-md-6 col-lg-4 smBlogList">
                            <div class="smBlogBox">
                                @if($blog->picture)
                                <div class="mainBlogFig">
                                    <a href="{{ route('it.blog.details', $blog->slug) }}">
                                        <figure>
                                            <img src="{{ $blog->picture->upload.$blog->picture->url }}" alt="{{ $blog->title }}">
                                        </figure>
                                    </a>
                                </div>
                                @endif
                                <div class="smBlogBoxBg">

                                    <div class="topBlogTitle">
                                        @if($blog->category)
                                        <a href="{{ route('it.blogs.category', $blog->category->slug) }}">
                                            <span class="blogTitleTag">{{ $blog->category->title }}</span>
                                        </a>
                                        @endif
                                        <div class="blogMainTitle">
                                            <h2>
                                                <a href="{{ route('it.blog.details', $blog->slug) }}">{{ $blog->title }}</a>
                                            </h2>
                                        </div>
                                    </div>

                                    <div class="blogAuthor">
                                        <a >
                                            <figure>
                                                <img src="it/images/test.jpg" alt="">
                                            </figure>
                                            {!! $blog->by ? '<span>By: '.$blog->by.'</span>' : null !!}
                                        </a>
                                    </div>

                                    <div class="smBlogDetail">
                                        @if(sizeof($blog->tags))
                                        <div class="blogTags">
                                            <ul>
                                                @foreach($blog->tags as $tag)
                                                <li>
                                                    <a href="{{ route('it.blogs.tag', $tag->slug) }}">
                                                        <span>#{{ $tag-> title }}</span>
                                                    </a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif
                                        <p>{!! words($blog->description) !!}</p>
                                        <a href="{{ route('it.blog.details', $blog->slug) }}" class="readMore"><span>Read More</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="btmPagination">
                        <nav>
                            {!! $blogs->appends(['q' => request('q')])->links() !!}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection