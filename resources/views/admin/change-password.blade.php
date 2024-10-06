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
                {{ Form::open() }}
                    <div class="row">
                        <div class="col* col-md-4 col-lg-4 topSearchForm">
                            <div class="form-group">
                                <label class="formTitle">Old Password <span class="astrick">*</span> :</label>
                                {{ Form::password('old_password', ['class' => 'form-control', 'placeholder' => 'Old Password', 'autofocus']) }}
                                {!! $errors->first('old_password', '<label class="error">:message</label>') !!}
                            </div>
                        </div>
                        <div class="col* col-md-4 col-lg-4 topSearchForm">
                            <div class="form-group">
                                <label class="formTitle">New Password <span class="astrick">*</span> :</label>
                                {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'New Password', 'autofocus']) }}
                                {!! $errors->first('password', '<label class="error">:message</label>') !!}
                            </div>
                        </div>
                        <div class="col* col-md-4 col-lg-4 topSearchForm">
                            <div class="form-group">
                                <label class="formTitle">Retype Password <span class="astrick">*</span> :</label>
                                {{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Retype Password', 'autofocus']) }}
                                {!! $errors->first('password_confirmation', '<label class="error">:message</label>') !!}
                            </div>
                        </div>
                        <div class="col* col-md-2 col-lg-2 topSearchForm">
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
