@extends('admin.layouts.master')



@section('title', 'Blog')



@section('content')

@if (session('success'))

<div class="alert alert-success" role="alert">

    {{ session('success') }}

</div>

@endif

<div class="container">

    <div class="justify-content-center">

        @include('admin.partials._sidebar')

        @if (session('status'))

        <div class="alert alert-success" role="alert">

            {{ session('status') }}

        </div>

        @endif



        @if(isset($blog))

        {{ Form::model($blog, ['method'=>'put', 'url' => route('blog.update', $blog->id), 'id' => 'form', 'files' => true]) }}

        @else

        {{ Form::open(['url' => route('blog.store'), 'id' => 'form', 'files' => true]) }}

        @endif

        <div class="row">

            <div class="col-md-8">

                <div class="card">

                    <div class="card-header">Blog</div>

                    <div class="card-body">

                        <div class="box-body row">

                            <div class="form-group col-md-12">

                                <label>Title <span class="astrick">*</span></label>

                                {{ Form::text('title', null, ['id' => 'title', 'class' => 'form-control', 'onkeyup' => 'generateURL(this);']) }}

                                {!! $errors->first('title', '<label class="error">:message</label>') !!}

                            </div>

                            <div class="form-group col-md-12">

                                <label>Slug <span class="astrick">*</span></label>

                                {{ Form::text('slug', null, ['id' => 'slug', 'class' => 'form-control']) }}

                                {!! $errors->first('slug', '<label class="error">:message</label>') !!}

                            </div>



                            <div class="form-group col-md-12">

                                <label>Description</label>

                                {{ Form::textarea('description', null, ['class' => 'form-control ckeditor', 'rows' => 2]) }}

                            </div>

                            <div class="form-group col-md-12">

                                <label>By </label>

                                {{ Form::text('by', null, ['class' => 'form-control']) }}

                                {!! $errors->first('by', '<label class="error">:message</label>') !!}

                            </div>

                        </div>

                    </div>

                </div>

                <div class="card">

                    <div class="card-header">SEO</div>

                    <div class="card-body">

                        <div class="form-group">

                            <label>Meta Title</label>

                            {{ Form::text('seo[title]', null, ['id' => 'meta-title', 'class' => 'form-control']) }}

                        </div>

                        <div class="form-group">

                            <label>Meta Keys</label>

                            {{ Form::text('seo[keys]', null, ['class' => 'form-control']) }}

                        </div>

                        <div class="form-group">

                            <label>Meta Description</label>

                            {{ Form::textarea('seo[description]', null, ['class' => 'form-control', 'rows' => 3]) }}

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="card">

                    <div class="card-header">Action</div>

                    <div class="card-body">

                        <div class="form-group">

                            <label>Published Date <span class="astrick">*</span> </label>

                            {{ Form::date('date', null, ['class' => 'form-control']) }}

                            {!! $errors->first('date', '<label class="error">:message</label>') !!}

                        </div>

                        <div id="image-wrapper" class="form-group">

                            @if(!empty($blog->picture) && file_exists($blog->picture->thumb.$blog->picture['url']))

                            <img src="{{ $blog->picture->thumb.$blog->picture['url'] }}" height="120"/>

                            <a href="{{ route('image.delete', $blog->picture->id) }}" onclick="return confirm('Are you sure to delete?')" ><i class="fa fa-close"></i></a>

                            @else

                            <div class="form-group">

                                <label>Image</label>

                                {{ Form::file('image', ['class' => 'form-controls', 'onchange' => 'readURL(this);']) }}

                                <span style="font-size: 11px">Type: jpeg, png, jpg <br> Width: 700px to 1000px, Height: 500px to 800px</span>
                                {!! $errors->first('image', '<label class="error">:message</label>') !!}

                            </div>

                            <div class="form-group">

                                <img id="form-image" src="#" alt="" height="120"/>

                            </div>

                            @endif

                        </div>



                        <div class="form-group">

                            <label>Departments <span class="astrick">*</span></label>

                            {{ Form::select('department_id', $departments, null, ['class' => 'form-control', 'placeholder' => '- - - Select - - -']) }}

                            {!! $errors->first('department_id', '<label class="error">:message</label>') !!}

                        </div>

                        <div class="form-group">

                            <label>Category <span class="astrick">*</span></label>

                            {{ Form::select('category_id', $categories, null, ['class' => 'form-control', 'placeholder' => '- - - Select - - -']) }}

                            {!! $errors->first('category_id', '<label class="error">:message</label>') !!}

                        </div>

                        <div class="form-group">

                            <label>Tags </label>

                            {{ Form::select('tags[]', $tags, null, ['id' => 'multiple','class' => 'form-control select2', 'multiple']) }}

                            {!! $errors->first('tags', '<label class="error">:message</label>') !!}

                        </div>



                        {{ Form::submit(isset($blog) ? 'Update' : 'Create', array('class'=>'btn btn-primary')) }}

                    </div>

                </div>

            </div>

        </div>

    </div>



    {{ Form::close() }}

</div>

@stop



@push('style')

<link rel="stylesheet" type="text/css" href="backend/css/customform.css">

@endpush

@push('script')

<script src="backend/js/jqueryUi/select2.full.min.js"></script>

<script type="text/javascript">

                                $('#multiple').select2({

                                    theme: "bootstrap"

                                });

                                $('#select2').select2({

                                    theme: "bootstrap"

                                });

</script>



@endpush



