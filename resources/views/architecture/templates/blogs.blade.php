@extends('architecture.layouts.master')

@section('title', 'Blogs')

@section('content')
<section id="vcInnerContent" class="innerContentBox">
    <div class="blogListingBox">
        <div class="container">
            <div class="row">
                <div class="col* col-md-12 col-lg-8 sideLeft">

                    <div class="row">
                        @foreach($blogs as $blog)
                            <div class="col* col-md-6 col-lg-6 smBlogList">
                                <div class="smBlogBox">
                                    @if($blog->picture)
                                    <div class="mainBlogFig">
                                        <a href="{{ route('architecture.blog.details', $blog->slug) }}">
                                            <figure>
                                                <img src="{{ $blog->picture->upload.$blog->picture->url }}" alt="{{ $blog->title }}">
                                            </figure>
                                        </a>
                                    </div>
                                    @endif
                                    <div class="smBlogBoxBg">

                                        <div class="topBlogTitle">
                                            @if($blog->category)
                                            <a href="{{ route('architecture.blogs.category', $blog->category->slug) }}">
                                                <span class="blogTitleTag">{{ $blog->category->title }}</span>
                                            </a>
                                            @endif
                                            <div class="blogMainTitle">
                                                <h2>
                                                    <a href="{{ route('architecture.blog.details', $blog->slug) }}">{{ $blog->title }}</a>
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
                                                        <a href="{{ route('architecture.blogs.tag', $tag->slug) }}">
                                                            <span>#{{ $tag-> title }}</span>
                                                        </a>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            @endif
                                            <p>{!! words($blog->description) !!}</p>
                                            <a href="{{ route('architecture.blog.details', $blog->slug) }}" class="readMore"><span>Read More</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="btmPagination">
                        <nav>
                            {!! $blogs->links() !!}
                        </nav>
                    </div>


                </div>

                <div class="col* col-md-12 col-lg-4 sideRight">
                    <div class="sideBars">
                        <h4 class="sideTitleBar">Search</h4>
                        {{ Form::open(['url' => route('architecture.blogs.search'), 'method' => 'GET']) }}
                            <div class="sideBarSearch">
                                <input type="text" name="q" class="form-control" placeholder="Search">
                                <button class="icofont-ui-search"></button>
                            </div>
                        {{ Form::close() }}
                    </div>

                    <div class="sideBars">
                        <h4 class="sideTitleBar">Categories</h4>
                        <ul>
                            @foreach($categories as $category)
                            <li>
                                <div class="sideBarInfos">
                                    <a href="{{ route('architecture.blogs.category', $category->slug) }}">
                                        <h5>{{ $category->title }}</h5>
                                    </a>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    
                    <div class="sideBars">
                        <h4 class="sideTitleBar">Tags</h4>
                        <ul>
                            @foreach($tags as $tag)
                            <li>
                                <div class="sideBarInfos">
                                    <a href="{{ route('architecture.blogs.tag', $tag->slug) }}">
                                        <h5>#{{ $tag->title }}</h5>
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