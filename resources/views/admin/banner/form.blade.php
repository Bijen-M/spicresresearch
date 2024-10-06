@extends('admin.layouts.master')



@section('title', 'Banner')



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

        

        @if(isset($banner))

        {{ Form::model($banner, ['method'=>'put', 'url' => route('banner.update', $banner->id), 'id' => 'form', 'files' => true]) }}

        @else

        {{ Form::open(['url' => route('banner.store'), 'id' => 'form', 'files' => true]) }}

        @endif

        <div class="row">

            <div class="col-md-8">

                <div class="card">

                    <div class="card-header">Banner</div>

                    <div class="card-body">



                        <div class="box-body row">

                            <div class="form-group col-md-12">

                                <label>Title</label>

                                {{ Form::text('title', null, ['class' => 'form-control']) }}

                                {!! $errors->first('title', '<label class="error">:message</label>') !!}

                            </div>



                            <div class="form-group col-md-12">

                                <label>Description:</label>

                                {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => 2]) }}

                            </div>

                            

                            <div class="form-group col-md-8">

                                <label>Link</label>

                                {{ Form::text('url', null, ['class' => 'form-control']) }}

                                {!! $errors->first('url', '<label class="error">:message</label>') !!}

                            </div>

                            <div class="form-group col-md-4">

                                <label>Link Text</label>

                                {{ Form::text('url_text', null, ['class' => 'form-control']) }}

                                {!! $errors->first('url_text', '<label class="error">:message</label>') !!}

                            </div>

                        </div>



                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="card">

                    <div class="card-header">Action</div>

                    <div class="card-body">

                        <div class="box-body">

                            <div id="image-wrapper" class="form-group">

                            @if(!empty($banner->picture) && file_exists($banner->picture->thumb.$banner->picture['url']))

                            <img src="{{ $banner->picture->thumb.$banner->picture['url'] }}" width="120"/>

                            <a href="{{ route('image.delete', $banner->picture->id) }}" onclick="return confirm('Are you sure to delete?')" ><i class="fa fa-close"></i></a>

                            @else

                            <div class="form-group">

                                <label>Image <span class="astrick">*</span></label>

                                {{ Form::file('image', ['class' => 'form-controls', 'onchange' => 'readURL(this);', 'required']) }}

                                <span style="font-size: 11px">Type: jpeg, png, jpg, svg <br> Width: 1000px to 1800px, Height: 800px to 1600px</span>
                                {!! $errors->first('image', '<label class="error">:message</label>') !!}

                            </div>

                            <div class="form-group">

                                <img id="form-image" src="#" alt="" width="120"/>

                            </div>

                            @endif

                            </div>

                            

                            <div class="form-group">

                                <label>Departments</label>

                                {{ Form::select('department_id', $departments, !isset($banner) ? session('department_id') : null, ['class' => 'form-control', 'placeholder' => '- - - Select - - -']) }}

                                {!! $errors->first('department_id', '<label class="error">:message</label>') !!}

                            </div>

                            <?php /* <div class="form-group">

                                <label>status:</label>

                                {{ Form::select('status', [

                                    1 => 'Active',

                                    0 => 'Inactive'

                                ], null, ['class' => 'form-control']) }}

                            </div> */ ?>

                            {{ Form::submit(isset($banner) ? 'Update' : 'Create', array('class'=>'btn btn-primary')) }}

                        </div>

                    </div>

                </div>

            </div>

        </div>



        {{ Form::close() }}

    </div>

</div>

@stop



@push('script')

    

@endpush



