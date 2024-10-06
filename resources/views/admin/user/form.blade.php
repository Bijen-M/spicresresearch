@extends('admin.layouts.master')



@section('title', 'User')



@section('content')

<div class="container">

    <div class="row justify-content-center">

        @include('admin.partials._sidebar')

        <div class="col-md-8">

            <div class="card">

                <div class="card-header">Add User</div>



                <div class="card-body">

                    @if (session('status'))

                    <div class="alert alert-success" role="alert">

                        {{ session('status') }}

                    </div>

                    @endif



                    @if(isset($user))

                    {{ Form::model($user, ['method'=>'put', 'url' => route('user.update', $user->id), 'id' => 'form']) }}

                    @else

                    {{ Form::open(['url' => route('user.store'), 'id' => 'form']) }}

                    @endif

                    <div class="box-body">

                        <div class="row">

                            <div class="form-group col-md-8">

                                <label>Name <span class="astrick">*</span></label>

                                {{ Form::text('name', null, ['class' => 'form-control']) }}

                                {!! $errors->first('name', '<label class="error">:message</label>') !!}

                            </div>

                            <div class="form-group col-md-8">

                                <label>Email <span class="astrick">*</span></label>

                                {{ Form::text('email', null, ['class' => 'form-control']) }}

                                {!! $errors->first('email', '<label class="error">:message</label>') !!}

                            </div>

                        </div>

                        <div class="row">

                            <div class="form-group col-md-4">

                                <label>Gender</label>

                                {{ Form::select('gender',[

                                'm' => 'Male',

                                'f' => 'Female',

                            ], null, ['class' => 'form-control']) }}

                                {!! $errors->first('gender', '<label class="error">:message</label>') !!}

                            </div>


                        </div>

                        @if(!isset($user))

                        <div class="row">

                            <div class="form-group col-md-8">

                                <label>Password <span class="astrick">*</span></label>

                                {{ Form::password('password', ['class' => 'form-control']) }}

                                {!! $errors->first('password', '<label class="error">:message</label>') !!}

                            </div>

                        </div>

                        <div class="row">

                            <div class="form-group col-md-8">

                                <label>Confirm Password <span class="astrick">*</span></label>

                                {{ Form::password('password_confirmation', ['class' => 'form-control']) }}

                                {!! $errors->first('password_confirmation', '<label class="error">:message</label>') !!}

                            </div>

                        </div>

                        @endif

                        <div class="row">

                            <div class="box-footer col-md-12">

                                <a class="btn btn-danger" href="{{ route('user.index') }}"><< Back</a>

                                {{ Form::submit(isset($user) ? 'Update' : 'Create', array('class'=>'btn btn-primary')) }}

                            </div>

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



