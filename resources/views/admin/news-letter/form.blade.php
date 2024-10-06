@extends('admin.layouts.master')



@section('title', 'News Letter')



@section('content')

@if (session('success'))

<div class="alert alert-success" role="alert">

    {{ session('success') }}

</div>

@endif

<div class="container">

    <div class="justify-content-center">

        @include('admin.partials._sidebar')

        @if (session('error'))

        <div class="alert alert-danger" role="alert">

            {{ session('error') }}

        </div>

        @endif



        @if(isset($newsLetter))

        {{ Form::model($newsLetter, ['method'=>'put', 'url' => route('news-letter.update', $newsLetter->id), 'id' => 'form', 'files' => true]) }}

        @else

        {{ Form::open(['url' => route('news-letter.store'), 'id' => 'form', 'files' => true]) }}

        @endif

        <div class="row">

            <div class="col-md-8">

                <div class="card">

                    <div class="card-header">News Letter</div>

                    <div class="card-body">

                        <div class="box-body row">

                            <div class="form-group col-md-12">

                                <label>Title <span class="astrick">*</span></label>

                                {{ Form::text('title', null, ['id' => 'title', 'class' => 'form-control', 'onkeyup' => 'generateURL(this);']) }}

                                {!! $errors->first('title', '<label class="error">:message</label>') !!}

                            </div>



                            <div class="form-group col-md-12">

                                <label>Description</label>

                                {{ Form::textarea('description', null, ['class' => 'form-control ckeditor', 'rows' => 2]) }}

                                {!! $errors->first('description', '<label class="error">:message</label>') !!}

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

                            @if(isset($newsLetter) && $newsLetter->picture && sizeof($newsLetter->picture))

                            @foreach($newsLetter->picture as $picture)

                            @if(file_exists($picture->thumb.$picture['url']))

                            <img src="{{ $picture->thumb.$picture['url'] }}" height="120"/>

                            <a href="{{ route('image.delete', $picture->id) }}" onclick="return confirm('Are you sure to delete?')" ><i class="fa fa-close"></i></a>

                            @endif

                            @endforeach

                            @endif

                            <div class="form-group">

                                <label>Attachments</label>

                                {{ Form::file('image[]', ['class' => 'form-controls', 'onchange' => 'readURL(this);', 'multiple']) }}
                                {!! $errors->first('image.*', '<label class="error">:message</label>') !!}

                            </div>

                        </div>                        



                        {{ Form::submit(isset($newsLetter) ? 'Update' : 'Create', array('class'=>'btn btn-primary')) }}

                        {{ Form::submit('Send', array('class'=>'btn btn-light', 'name' => 'send')) }}

                    </div>

                </div>

            </div>

        </div>

    </div>



    {{ Form::close() }}

</div>

@stop



@push('style')

@endpush

@push('script')

@endpush



