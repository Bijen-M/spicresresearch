@extends('admin.layouts.master')



@section('title', 'Testimonial')



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



        @if(isset($testimonial))

        {{ Form::model($testimonial, ['method'=>'put', 'url' => route('testimonial.update', $testimonial->id), 'id' => 'form', 'files' => true]) }}

        @else

        {{ Form::open(['url' => route('testimonial.store'), 'id' => 'form', 'files' => true]) }}

        @endif

        <div class="row">

            <div class="col-md-8">

                <div class="card">

                    <div class="card-header">Testimonial</div>

                    <div class="card-body">

                        <div class="box-body row">

                            <div class="form-group col-md-12">

                                <label>Description</label>

                                {{ Form::textarea('description', null, ['class' => 'form-control ckeditor', 'rows' => 2]) }}

                                {!! $errors->first('description', '<label class="error">:message</label>') !!}

                            </div>

                            <div class="form-group col-md-12">

                                <label>By (name) </label>

                                {{ Form::text('by', null, ['class' => 'form-control']) }}

                                {!! $errors->first('by', '<label class="error">:message</label>') !!}

                            </div>

                            <div class="form-group col-md-12">

                                <label>company </label>

                                {{ Form::text('company', null, ['class' => 'form-control']) }}

                                {!! $errors->first('company', '<label class="error">:message</label>') !!}

                            </div>

                            <div class="form-group col-md-12">

                                <label>designation </label>

                                {{ Form::text('designation', null, ['class' => 'form-control']) }}

                                {!! $errors->first('designation', '<label class="error">:message</label>') !!}

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="card">

                    <div class="card-header">Action</div>

                    <div class="card-body">

                        <div id="image-wrapper" class="form-group">

                            @if(!empty($testimonial->picture) && file_exists($testimonial->picture->thumb.$testimonial->picture['url']))

                            <img src="{{ $testimonial->picture->thumb.$testimonial->picture['url'] }}" height="120"/>

                            <a href="{{ route('image.delete', $testimonial->picture->id) }}" onclick="return confirm('Are you sure to delete?')" ><i class="fa fa-close"></i></a>

                            @else

                            <div class="form-group">

                                <label>Image </label>

                                {{ Form::file('image', ['class' => 'form-controls', 'onchange' => 'readURL(this);']) }}
                                <span style="font-size: 11px">Minimum Dimension: 100 x 100</span>, 
                                <span style="font-size: 11px">Ratio: 1:1</span>
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



                        {{ Form::submit(isset($testimonial) ? 'Update' : 'Create', array('class'=>'btn btn-primary')) }}

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



