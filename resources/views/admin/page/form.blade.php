@extends('admin.layouts.master')

@section('title', 'Page')

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
        
        @if(isset($page))
        {{ Form::model($page, ['method'=>'put', 'url' => route('page.update', $page->id), 'id' => 'form', 'files' => true]) }}
        @else
        {{ Form::open(['url' => route('page.store'), 'id' => 'form', 'files' => true]) }}
        @endif
        <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Page</div>
                <div class="card-body">
                    <div class="box-body row">
                        <div class="form-group col-md-12">
                            <label>Title <span class="astrick">*</span></label>
                            {{ Form::text('title', null, ['id' => 'title', 'class' => 'form-control', 'onkeyup' => !isset($page)?'generateURL(this);':'']) }}
                            {!! $errors->first('title', '<label class="error">:message</label>') !!}
                        </div>
                        <div class="form-group col-md-12">
                            <label>Slug <span class="astrick">*</span></label>
                            {{ Form::text('slug', null, ['id' => 'slug', 'class' => 'form-control', 'readonly' => isset($page)?true:false]) }}
                            {!! $errors->first('slug', '<label class="error">:message</label>') !!}
                        </div>
                        <div class="form-group col-md-12">
                            <label>SubTitle</label>
                            {{ Form::text('sub_title', null, ['class' => 'form-control']) }}
                            {!! $errors->first('sub_title', '<label class="error">:message</label>') !!}
                        </div>
                        <div class="form-group col-md-12">
                            <label>Description</label>
                            {{ Form::textarea('description', null, ['class' => 'form-control ckeditor', 'rows' => 2]) }}
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
                    <div id="image-wrapper">
                        @if((!empty($page->picture) && file_exists($page->picture->thumb.$page->picture['url'])))
                        <img src="{{ $page->picture->thumb.$page->picture['url'] }}" width="120"/>
                        <a href="{{ route('image.delete', $page->picture->id) }}" onclick="return confirm('Are you sure to delete?')" ><i class="fa fa-close"></i></a>
                        @else
                        <div class="form-group">
                            <label>Image</label>
                            {{ Form::file('image', ['class' => 'form-controls', 'onchange' => 'readURL(this);']) }}
                            <span style="font-size: 11px">Type: jpeg, png, jpg, gif, svg <br> Width: 500px to 800px, Height: 250px to 400px</span>
                            {!! $errors->first('image', '<label class="error">:message</label>') !!}
                        </div>
                        <div class="form-group">
                            <img id="form-image" src="#" alt="" width="120"/>
                        </div>
                        @endif
                    </div>
                    {{ Form::submit(isset($page) ? 'Update' : 'Create', array('class'=>'btn btn-primary')) }}
                    <a href="{{ route('page.index') }}" class="btn btn-light">Back</a>
                </div>
            </div>
        </div>
        </div>
    </div>
    
        {{ Form::close() }}
</div>
@stop

@push('script')

@endpush

