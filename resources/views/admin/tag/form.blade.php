@extends('admin.layouts.master')



@section('title', 'Tag')



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

        

        @if(isset($tag))

        {{ Form::model($tag, ['method'=>'put', 'url' => route('tag.update', $tag->id), 'id' => 'form', 'files' => true]) }}

        @else

        {{ Form::open(['url' => route('tag.store'), 'id' => 'form', 'files' => true]) }}

        @endif

        <div class="row">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header">Tag</div>

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

                    <?php /* <div class="form-group">

                        <label>Status </label>

                        {{ Form::select('status', [

                            1 => 'Active',

                            0 => 'Inactive'

                        ], null, ['class' => 'form-control']) }}

                    </div> */ ?>

                    {{ Form::submit(isset($tag) ? 'Update' : 'Create', array('class'=>'btn btn-primary')) }}

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



