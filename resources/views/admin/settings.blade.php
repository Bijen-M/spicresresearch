@extends('admin.layouts.master')

@section('title', 'Change Password')

@section('content')
<div class="mainBlockPage">
    <div class="card">
        <div class="card-body">
            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                {!! session()->get('success') !!}
            </div>            
            @elseif(session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                {!! session()->get('error') !!}
            </div>
            @endif
            <div class="stdAccountSetting">
                {{ Form::open(['files' => true]) }}
                    <div class="row">
                        <div class="col* col-md-12 col-lg-12 topSearchForm">
                            <div class="form-group">
                                <label class="formTitle">Website Name</label>
                                {{ Form::text('website_name', $settings['website_name'], ['class' => 'form-control', 'autofocus']) }}
                                {!! $errors->first('website_name', '<label class="error">:message</label>') !!}
                            </div>
                        </div>
                        <div class="col* col-md-12 col-lg-12 topSearchForm">
                            <div class="form-group">
                                <label class="formTitle">Home Title</label>
                                {{ Form::text('home_title', $settings['home_title'], ['class' => 'form-control', 'autofocus']) }}
                                {!! $errors->first('home_title', '<label class="error">:message</label>') !!}
                            </div>
                        </div>
                        <div class="col* col-md-12 col-lg-12 topSearchForm">
                            <div class="form-group">
                                <label class="formTitle">Home Summary</label>
                                {{ Form::textarea('home_summary', $settings['home_summary'], ['class' => 'form-control', 'autofocus', 'rows' => 3]) }}
                                {!! $errors->first('home_summary', '<label class="error">:message</label>') !!}
                            </div>
                        </div>
                        <div class="col* col-md-4 col-lg-4 topSearchForm">
                            <div class="form-group">
                                <label class="formTitle">Address</label>
                                {{ Form::text('address', $settings['address'], ['class' => 'form-control', 'autofocus']) }}
                                {!! $errors->first('address', '<label class="error">:message</label>') !!}
                            </div>
                        </div>
                        <div class="col* col-md-4 col-lg-4 topSearchForm">
                            <div class="form-group">
                                <label class="formTitle">Contact No</label>
                                {{ Form::text('contact_no', $settings['contact_no'], ['class' => 'form-control', 'autofocus']) }}
                                {!! $errors->first('contact_no', '<label class="error">:message</label>') !!}
                            </div>
                        </div>
                        <div class="col* col-md-4 col-lg-4 topSearchForm">
                            <div class="form-group">
                                <label class="formTitle">Email</label>
                                {{ Form::text('email', $settings['email'], ['class' => 'form-control', 'autofocus']) }}
                                {!! $errors->first('email', '<label class="error">:message</label>') !!}
                            </div>
                        </div>
                        <div class="col* col-md-4 col-lg-4 topSearchForm">
                            <div class="form-group">
                                <label class="formTitle">facebook</label>
                                {{ Form::text('facebook', $settings['facebook'], ['class' => 'form-control', 'autofocus']) }}
                                {!! $errors->first('facebook', '<label class="error">:message</label>') !!}
                            </div>
                        </div>
                        <div class="col* col-md-4 col-lg-4 topSearchForm">
                            <div class="form-group">
                                <label class="formTitle">twitter</label>
                                {{ Form::text('twitter', $settings['twitter'], ['class' => 'form-control', 'autofocus']) }}
                                {!! $errors->first('twitter', '<label class="error">:message</label>') !!}
                            </div>
                        </div>
                        <div class="col* col-md-4 col-lg-4 topSearchForm">
                            <div class="form-group">
                                <label class="formTitle">google plus</label>
                                {{ Form::text('google_plus', $settings['google_plus'], ['class' => 'form-control', 'autofocus']) }}
                                {!! $errors->first('google_plus', '<label class="error">:message</label>') !!}
                            </div>
                        </div>
                        <div class="col* col-md-8 col-lg-8 topSearchForm">
                            @if(!empty($settings->picture) && file_exists($settings->picture->thumb.$settings->picture['url']))
                            <div class="form-group">
                                <label class="formTitle">Default Image</label><br>
                            
                            <img src="{{ $settings->picture->thumb.$settings->picture['url'] }}" height="120"/>

                            <a href="{{ route('image.delete', $settings->picture->id) }}" onclick="return confirm('Are you sure to delete?')" ><i class="fa fa-close"></i></a>
                            </div>
                            @else

                            <div class="form-group">

                                <label class="formTitle">Default Image</label>

                                {{ Form::file('image', ['class' => 'form-controls', 'onchange' => 'readURL(this);']) }}

                                <span style="font-size: 11px">Type: jpeg, png, jpg</span>
                                {!! $errors->first('image', '<label class="error">:message</label>') !!}

                            </div>

                            <div class="form-group">

                                <img id="form-image" src="#" alt="" height="120"/>

                            </div>

                            @endif
                        </div>
                        <div class="col* col-md-12 col-lg-12 topSearchForm">
                            <div class="form-group">
                                {{ Form::submit('Submit', ['class' => 'btn submitBox']) }}
                            </div>
                        </div>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endsection
