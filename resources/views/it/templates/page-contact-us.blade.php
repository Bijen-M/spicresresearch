@extends('it.layouts.master')

@section('title', $page->title)

@section('content')
<section id="vcInnerContent" class="innerContentBox">
    <div class="container">
        <div class="topFooter">
            <div class="row">
                <div class="col* col-md-12 col-lg-7 contactLeft">
                    <h1 class="titleHead">Get in Touch</h1>
                    {!! $page->description !!}
                    
                    <div class="contactDetailsBox">
                        <ul>
                            @if(isset($settings) && $settings->address)
                            <li>
                                <div class="fotContactIcon">
                                    <i class="icofont-ui-map"></i>
                                </div>

                                <div class="fotContactInfos">
                                    <span>find us</span>
                                    <p>{{ $settings->address }}</p>
                                </div>
                            </li>
                            @endif
                            @if(isset($settings) && $settings->contact_no)
                            <li>
                                <div class="fotContactIcon">
                                    <i class="icofont-headphone-alt-1"></i>
                                </div>

                                <div class="fotContactInfos">
                                    <span>call us</span>
                                    <p>{{ $settings->contact_no }}</p>
                                </div>
                            </li>
                            @endif
                            @if(isset($settings) && $settings->email)
                            <li>
                                <div class="fotContactIcon">
                                    <i class="icofont-envelope-open"></i>
                                </div>

                                <div class="fotContactInfos">
                                    <span>mail us</span>
                                    <p><a href="mailto:{{ $settings->email }}">{{ $settings->email }}</a></p>
                                </div>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col* col-md-12 col-lg-5 contactRight">
                    <div class="contactForm">
                        <h1 class="titleHead">Leave us Message</h1>
                        @if(session()->has('success'))
                        <div class="alert alert-success" >
                            <span>{{ session()->get('success') }}</span>
                        </div>
                        @endif
                        @if(session()->has('error'))
                        <div class="alert alert-danger" >
                            <span>{{ session()->get('error') }}</span>
                        </div>
                        @endif
                        {{ Form::open(['url' => route('send.mail')]) }}
                        <div class="row">
                            <div class="col* col-md-12 col-lg-6 contactList">
                                <div class="form-group">
                                    {{ Form::text('name', null, ['required', 'class' => 'form-control', 'placeholder' => 'Full Name']) }}
                                    {!! $errors->first('name', '<label class="error text-danger">:message</label>') !!}
                                </div>
                            </div>

                            <div class="col* col-md-12 col-lg-6 contactList">
                                <div class="form-group">
                                    {{ Form::text('email_id', null, ['required', 'class' => 'form-control', 'placeholder' => 'Email']) }}
                                    {!! $errors->first('email_id', '<label class="error text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col* col-md-12 col-lg-12 contactList">
                                <div class="form-group">
                                    {{ Form::text('subject', null, ['required', 'class' => 'form-control', 'placeholder' => 'Subject']) }}
                                    {!! $errors->first('subject', '<label class="error text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col* col-md-12 col-lg-12 contactList">
                                <div class="form-group">
                                    {{ Form::textarea('message', null, ['required', 'class' => 'form-control', 'placeholder' => 'Message', 'rows' => 5]) }}
                                    {!! $errors->first('message', '<label class="error text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>

                        <div class="submitBtns">
                            <input type="submit" value="Send" name="" class="btn">
                        </div>

                        {{ Form::close() }}
                        
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="companyMap">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3533.106813572247!2d85.3255165144843!3d27.683093382801943!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19b897a2551f%3A0x5a534a43f3c61d3d!2sSpices+Research+and+Consulting+Pvt.+Ltd.!5e0!3m2!1sen!2snp!4v1547651143382"  frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
</section>
@endsection