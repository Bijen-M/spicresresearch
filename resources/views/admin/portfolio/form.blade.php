@extends('admin.layouts.master')



@section('title', 'Portfolio')



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



        @if(isset($portfolio))

        {{ Form::model($portfolio, ['method'=>'put', 'url' => route('portfolio.update', $portfolio->id), 'id' => 'form', 'files' => true]) }}

        @else

        {{ Form::open(['url' => route('portfolio.store'), 'id' => 'form', 'files' => true]) }}

        @endif

        <div class="row">

            <div class="col-md-8">

                <div class="card">

                    <div class="card-header">Portfolio</div>

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

                        <div id="image-wrapper" class="form-group">

                            @if(isset($portfolio) && sizeof($portfolio->picture))
                            
                            @foreach($portfolio->picture as $picture)

                            @if(file_exists($picture->thumb.$picture['url']))

                            <img src="{{ $picture->thumb.$picture['url'] }}" height="120"/>

                            <a href="{{ route('image.delete', $picture->id) }}" onclick="return confirm('Are you sure to delete?')" ><i class="fa fa-close"></i></a>

                            @endif

                            @endforeach

                            @endif

                            <div class="form-group">

                                <label>Image {!! !isset($portfolio) ? '<span class="astrick">*</span>' : null !!}</label>

                                {{ Form::file('image[]', ['class' => 'form-controls', 'onchange' => 'readURL(this);', 'multiple']) }}
                                <span style="font-size: 11px">Type: jpeg, png, jpg <br> Width: 700px to 1000px, Height: 500px to 800px</span>
                                {!! $errors->first('image', '<label class="error">:message</label>') !!}
                                {!! $errors->first('image.*', '<label class="error">:message</label>') !!}

                            </div>

<!--                            <div class="form-group">

                                <img id="form-image" src="#" alt="" height="120"/>

                            </div>-->

                        </div>



                        <div class="form-group">

                            <label>Departments <span class="astrick">*</span></label>
                            {{ Form::hidden('department_id') }}
                            {{ Form::select('department_id', $departments, null, ['id' => 'department', 'class' => 'form-control', 'placeholder' => '- - - Select - - -', isset($portfolio) ? 'disabled' : null]) }}

                            {!! $errors->first('department_id', '<label class="error">:message</label>') !!}

                        </div>

                        

                        <div class="form-group">

                            <label>Client </label>

                            {{ Form::text('client', null, ['class' => 'form-control']) }}

                        </div>

                        <div class="form-group">

                            <label>Status </label>

                            {{ Form::select('status', [
                                'complete' => 'Complete',
                                'incomplete' => 'Incomplete',
                            ], null, ['class' => 'form-control']) }}

                        </div>

                        

                        <div id="it-depart" style="display:none;">

                            <div class="form-group">

                                <label>Category </label>

                                {{ Form::text('category', null, ['class' => 'form-control']) }}

                            </div>

                            <div class="form-group">

                                <label>Technology </label>

                                {{ Form::text('technology', null, ['class' => 'form-control']) }}

                            </div>

                            <div class="form-group">

                                <label>URL </label>

                                {{ Form::text('url', null, ['class' => 'form-control']) }}

                            </div>

                        </div>

                        <div id="architec-depart" style="display:none;">

                            <div class="form-group">

                                <label>Year </label>

                                {{ Form::text('year', null, ['class' => 'form-control']) }}

                            </div>

                            <div class="form-group">

                                <label>Location </label>

                                {{ Form::text('location', null, ['class' => 'form-control']) }}

                            </div>

                            <div class="form-group">

                                <label>Type </label>

                                {{ Form::text('type', null, ['class' => 'form-control']) }}

                            </div>

                        </div>

                        



                        {{ Form::submit(isset($portfolio) ? 'Update' : 'Create', array('class'=>'btn btn-primary')) }}

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

    var depart = $('#department').val();

    if(depart == 1){

        $('select[name="status"]').parent('div').show().attr('disabled', false);

        $('input[name="client"]').parent('div').show().attr('disabled', false);

        $('#it-depart').show(function(){

            $('#it-depart input').attr('disabled', false);

        });

        $('#architec-depart').hide(function(){

            $('#architec-depart input').attr('disabled', true);

        });

    } else if (depart == 2) {

        $('select[name="status"]').parent('div').show().attr('disabled', false);

        $('input[name="client"]').parent('div').show().attr('disabled', false);

        $('#it-depart').hide(function(){

            $('#it-depart input').attr('disabled', true);

        }).attr('disabled', true);

        $('#architec-depart').show(function(){

            $('#architec-depart input').attr('disabled', false);

        });

    } else {

        $('select[name="status"]').parent('div').hide().attr('disabled', true);

        $('input[name="client"]').parent('div').hide().attr('disabled', true);

        $('#it-depart').hide(function(){

            $('#it-depart input').attr('disabled', true);

        }).attr('disabled', true);

        $('#architec-depart').hide(function(){

            $('#architec-depart input').attr('disabled', true);

        });

    }

    $('#department').on('change', function(){

        var depart = $('#department').val();

        if(depart == 1){

            $('select[name="status"]').parent('div').show().attr('disabled', false);

            $('input[name="client"]').parent('div').show().attr('disabled', false);

            $('#it-depart').show(function(){

                $('#it-depart input').attr('disabled', false);

            });

            $('#architec-depart').hide(function(){

                $('#architec-depart input').attr('disabled', true);

            });

        } else if (depart == 2) {

            $('select[name="status"]').parent('div').show().attr('disabled', false);

            $('input[name="client"]').parent('div').show().attr('disabled', false);

            $('#it-depart').hide(function(){

                $('#it-depart input').attr('disabled', true);

            }).attr('disabled', true);

            $('#architec-depart').show(function(){

                $('#architec-depart input').attr('disabled', false);

            });

        } else {

            $('select[name="status"]').parent('div').hide().attr('disabled', true);

            $('input[name="client"]').parent('div').hide().attr('disabled', true);

            $('#it-depart').hide(function(){

                $('#it-depart input').attr('disabled', true);

            }).attr('disabled', true);

            $('#architec-depart').hide(function(){

                $('#architec-depart input').attr('disabled', true);

            });

        }

    });

    

</script>



@endpush



