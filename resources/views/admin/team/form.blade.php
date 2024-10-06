@extends('admin.layouts.master')



@section('title', 'Team')



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

        

        @if(isset($team))

        {{ Form::model($team, ['method'=>'put', 'url' => route('team.update', $team->id), 'id' => 'form', 'files' => true]) }}

        @else

        {{ Form::open(['url' => route('team.store'), 'id' => 'form', 'files' => true]) }}

        @endif

        <div class="row">

            <div class="col-md-8">

                <div class="card">

                    <div class="card-header">Team</div>

                    <div class="card-body">



                        <div class="box-body">

                            <div class="form-group">

                                <label>Name <span class="astrick">*</span></label>

                                {{ Form::text('name', null, ['class' => 'form-control']) }}

                                {!! $errors->first('name', '<label class="error">:message</label>') !!}

                            </div>

                            <div class="form-group">

                                <label>Position <span class="astrick">*</span></label>

                                {{ Form::text('position', null, ['class' => 'form-control']) }}

                                {!! $errors->first('position', '<label class="error">:message</label>') !!}

                            </div>

                            <div class="form-group">

                                <label>Facebook</label>

                                {{ Form::text('facebook', null, ['class' => 'form-control']) }}

                                {!! $errors->first('facebook', '<label class="error">:message</label>') !!}

                            </div>

                            <div class="form-group">

                                <label>Google</label>

                                {{ Form::text('google', null, ['class' => 'form-control']) }}

                                {!! $errors->first('google', '<label class="error">:message</label>') !!}

                            </div>

                            <div class="form-group">

                                <label>Twitter</label>

                                {{ Form::text('twitter', null, ['class' => 'form-control']) }}

                                {!! $errors->first('twitter', '<label class="error">:message</label>') !!}

                            </div>

                            <div class="form-group">

                                <label>Instagram</label>

                                {{ Form::text('instagram', null, ['class' => 'form-control']) }}

                                {!! $errors->first('instagram', '<label class="error">:message</label>') !!}

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

                            @if(!empty($team->picture) && file_exists($team->picture->thumb.$team->picture['url']))

                            <img src="{{ $team->picture->thumb.$team->picture['url'] }}" width="120"/>

                            <a href="{{ route('image.delete', $team->picture->id) }}" onclick="return confirm('Are you sure to delete?')" ><i class="fa fa-close"></i></a>

                            @else

                            <div class="form-group">

                                <label>Image <span class="astrick">*</span></label>

                                {{ Form::file('image', ['class' => 'form-controls', 'onchange' => 'readURL(this);', 'required']) }}
                                <span style="font-size: 11px">Type: jpeg, png, jpg <br> Width: 300px to 500px, Height: 300px to 500px (1:1)</span>
                                {!! $errors->first('image', '<label class="error">:message</label>') !!}

                            </div>

                            <div class="form-group">

                                <img id="form-image" src="#" alt="" width="120"/>

                            </div>

                            @endif

                            </div>

                            

                            <div class="form-group">

                                <label>Departments <span class="astrick">*</span></label>

                                {{ Form::select('department_id', $departments, !isset($team) ? session('department_id') : null, ['class' => 'form-control', 'placeholder' => '- - - Select - - -']) }}

                                {!! $errors->first('department_id', '<label class="error">:message</label>') !!}

                            </div>

                            <?php /* <div class="form-group">

                                <label>status:</label>

                                {{ Form::select('status', [

                                    1 => 'Active',

                                    0 => 'Inactive'

                                ], null, ['class' => 'form-control']) }}

                            </div> */ ?>

                            {{ Form::submit(isset($team) ? 'Update' : 'Create', array('class'=>'btn btn-primary')) }}

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



