@extends('admin.layouts.master')



@section('title', 'Image')



@section('content')

<div class="container">

    <div class="row justify-content-center">

        @include('admin.partials._sidebar')

        <div class="col-md-12">

            <div class="card">

                <div class="card-header">Add Product</div>



                <div class="card-body">

                    @if (session('status'))

                    <div class="alert alert-success" role="alert">

                        {{ session('status') }}

                    </div>

                    @endif



                    @if(isset($image))

                    {{ Form::model($image, ['method'=>'put', 'url' => route('image.update', $image->id), 'id' => 'form']) }}

                    @else

                    {{ Form::open(['url' => route('image.store'), 'id' => 'form']) }}

                    @endif

                    <div class="box-body row">

                        <div class="form-group col-md-6">

                            <label>Name</label>

                            {{ Form::text('name', null, ['class' => 'form-control']) }}

                            {!! $errors->first('name', '<i class="text-red">:message</i>') !!}

                        </div>

                        <div class="form-group col-md-6">

                            <label>Email</label>

                            {{ Form::text('email', null, ['class' => 'form-control']) }}

                            {!! $errors->first('email', '<i class="text-red">:message</i>') !!}

                        </div>

                        <div class="form-group col-md-12">

                            <label>Address</label>

                            {{ Form::text('address', null, ['class' => 'form-control']) }}

                            {!! $errors->first('address', '<i class="text-red">:message</i>') !!}

                        </div>

                        <div class="form-group col-md-6">

                            <label>Contact No 1</label>

                            {{ Form::text('contact_no_1', null, ['class' => 'form-control']) }}

                            {!! $errors->first('contact_no_1', '<i class="text-red">:message</i>') !!}

                        </div>

                        <div class="form-group col-md-6">

                            <label>Contact No 2</label>

                            {{ Form::text('contact_no_2', null, ['class' => 'form-control']) }}

                            {!! $errors->first('contact_no_2', '<i class="text-red">:message</i>') !!}

                        </div>



                        <div class="form-group col-md-12">

                            <label>Description:</label>

                            {{ Form::textarea('description', null, ['class' => 'form-control ckeditor', 'rows' => 2]) }}

                        </div>

                        <div class="form-group col-md-2">

                            <label>Branch:</label>

                            {{ Form::select('main', [

                                0 => 'No',

                                1 => 'Yes'

                            ], null, ['class' => 'form-control', 'rows' => 2]) }}

                        </div>

                    <div class="box-footer col-md-12">

                        <a class="btn btn-danger" href="{{ route('image.index') }}"><< Back</a>

                        {{ Form::submit(isset($image) ? 'Update' : 'Create', array('class'=>'btn btn-primary')) }}

                    </div>

                    </div>

                    {{ Form::close() }}





                </div>

            </div>

        </div>

    </div>

</div>

@stop



@section('scripts')

@stop



