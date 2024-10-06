@extends('admin.layouts.master')



@section('title', 'Service')



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

        

        @if(isset($service))

        {{ Form::model($service, ['method'=>'put', 'url' => route('service.update', $service->id), 'id' => 'form', 'files' => true]) }}

        @else

        {{ Form::open(['url' => route('service.store'), 'id' => 'form', 'files' => true]) }}

        @endif

        <div class="row">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header">Service</div>

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

                        @if((!empty($service->picture) && file_exists($service->picture->thumb.$service->picture['url'])))

                        <img src="{{ $service->picture->thumb.$service->picture['url'] }}" width="120"/>

                        <a href="{{ route('image.delete', $service->picture->id) }}" onclick="return confirm('Are you sure to delete?')" ><i class="fa fa-close"></i></a>

                        @else

                        <div class="form-group">

                            <label>Image</label>

                            {{ Form::file('image', ['class' => 'form-controls', 'onchange' => 'readURL(this);']) }}
                            <span style="font-size: 11px">Type: jpeg, png, jpg <br> Width: 700px to 1000px, Height: 500px to 800px</span>
                            {!! $errors->first('image', '<label class="error">:message</label>') !!}

                        </div>

                        <div class="form-group">

                            <img id="form-image" src="#" alt="" width="120"/>

                        </div>

                        @endif

                    </div>

                    

                    <div class="form-group">

                        <label>Icon Name ( <a href="https://icofont.com/icons" target="_blank" title="This link help you find the icon name for service.">www.icofont.com</a> )</label>

                        {{ Form::text('icon', null, ['class' => 'form-control', 'placeholder' => 'i.e. addons']) }}

                    </div>

                    <div class="form-group">

                        <label>Departments <span class="astrick">*</span></label>

                        {{ Form::select('department_id', $departments, null, ['class' => 'form-control', 'placeholder' => '- - - Select - - -']) }}

                        {!! $errors->first('department_id', '<label class="error">:message</label>') !!}

                    </div>

                    <?php /* <div class="form-group">

                        <label>Status </label>

                        {{ Form::select('status', [

                            1 => 'Active',

                            0 => 'Inactive'

                        ], null, ['class' => 'form-control']) }}

                    </div> */ ?>

                    {{ Form::submit(isset($service) ? 'Update' : 'Create', array('class'=>'btn btn-primary')) }}

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



