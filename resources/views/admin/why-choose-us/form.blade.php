@extends('admin.layouts.master')



@section('title', 'Why Choose Us')



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

        

        @if(isset($whyChooseUs))

        {{ Form::model($whyChooseUs, ['method'=>'put', 'url' => route('why-choose-us.update', $whyChooseUs->id), 'id' => 'form', 'files' => true]) }}

        @else

        {{ Form::open(['url' => route('why-choose-us.store'), 'id' => 'form', 'files' => true]) }}

        @endif

        <div class="row">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header">Why Choose Us</div>

                <div class="card-body">

                    <div class="box-body row">

                        <div class="form-group col-md-12">

                            <label>Title <span class="astrick">*</span></label>

                            {{ Form::text('title', null, ['id' => 'title', 'class' => 'form-control', 'onkeyup' => 'generateURL(this);']) }}

                            {!! $errors->first('title', '<label class="error">:message</label>') !!}

                        </div>

                        

                        <div class="form-group col-md-12">

                            <label>Description</label>

                            {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => 5]) }}

                        </div>

                    </div>



                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card">

                <div class="card-header">Action</div>

                <div class="card-body">

                    <div class="form-group">

                        <label>Departments <span class="astrick">*</span></label>

                        {{ Form::select('department_id', $departments, null, ['class' => 'form-control', 'placeholder' => '- - - Select - - -']) }}

                        {!! $errors->first('department_id', '<label class="error">:message</label>') !!}

                    </div>

                    {{ Form::submit(isset($whyChooseUs) ? 'Update' : 'Create', array('class'=>'btn btn-primary')) }}

                    <a href="{{ route('why-choose-us.index') }}" class="btn btn-light">Back</a>

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



