@extends('admin.layouts.master')



@section('title', 'Subscribe')



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



        @if(isset($subscribe))

        {{ Form::model($subscribe, ['method'=>'put', 'url' => route('subscribe.update', $subscribe->id), 'id' => 'form', 'files' => true]) }}

        @else

        {{ Form::open(['url' => route('subscribe.store'), 'id' => 'form', 'files' => true]) }}

        @endif

        <div class="row">

            <div class="col-md-8">

                <div class="card">

                    <div class="card-header">Subscribe</div>

                    <div class="card-body">

                        <div class="box-body row">

                            <div class="form-group col-md-12">

                                <label>Email <span class="astrick">*</span></label>

                                {{ Form::email('email', null, ['id' => 'email', 'class' => 'form-control']) }}

                                {!! $errors->first('email', '<label class="error">:message</label>') !!}

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="card">

                    <div class="card-header">Action</div>

                    <div class="card-body">

                        {{ Form::submit(isset($subscribe) ? 'Update' : 'Create', array('class'=>'btn btn-primary')) }}

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



