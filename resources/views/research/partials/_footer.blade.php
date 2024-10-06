<footer>
    <div class="footerBg" style="background: url(it/images/footer-bg.jpg);background-repeat: no-repeat;background-size: cover;">
        <div class="fotOverlay"></div>
        <div class="footerContent">
            <div class="container">
                <div class="row">
                    <div class="col* col-md-6 col-lg-4 footerMenu">
                        <figure>
                            <img src="it/images/logo-white.png" alt="title">
                        </figure>
                        @if(isset($settings) && $settings->home_summary)
                        <p>{!! $settings->home_summary !!}</p>
                        @endif
                       @if(isset($settings))
                        <div class="socialIcon">
                            <h4>Follow Us</h4>
                            <ul>
                                @if($settings->facebook)
                                <li>
                                    <a href="{{ $settings->facebook }}" target="_blank"><i class="icofont icofont-facebook facebook-cl"></i></a>
                                </li>
                                @endif
                                @if($settings->twitter)
                                <li>
                                    <a href="{{ $settings->twitter }}" target="_blank"><i class="icofont icofont-twitter twitter-cl"></i></a>
                                </li>
@endif
                                @if($settings->google_plus)
                                <li>
                                    <a href="#" target="_blank"><i class="icofont icofont-google-plus google-cl"></i></a>
                                </li>
                                @endif
                            </ul>
                        </div>
                        @endif
                    </div>

                    <div class="col* col-md-6 col-lg-2 footerMenu">
                        <h4>Quick Links</h4>
                        <div class="quickList">
                            {!! Helper::navs(4, 'wsmenu-list') !!}
                        </div>
                    </div>

                    <div class="col* col-md-6 col-lg-3 footerMenu">
                        <h4>Mail Us</h4>
                        <div class="subsCol">
                            <p>Get Business news, tip and solutions to your problems from our experts.</p>
                            @if (session('success-subscribe'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success-subscribe') }}
                            </div>
                            @endif
                            @if (session('error-subscribe'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error-subscribe') }}
                            </div>
                            @endif
                            {{ Form::open(['url' => route('subscribe.email')]) }}
                                <div class="form-group">
                                    {{ Form::text('email', null, ['required', 'class' => 'form-control', 'placeholder' => 'Email Address', 'onfocus']) }}
                                    {!! $errors->first('email', '<label class="error">:message</label>') !!}
                                </div>
                                <div class="submitBtn">
                                    <input type="submit" value="Subscribe Now" name="" class="btn" >
                                </div>

                            {{ Form::close() }}
                        </div>
                    </div>

                    <div class="col* col-md-6 col-lg-3 footerMenu">
                        <h4>get in touch</h4>
                        <div class="fotContactInfos">
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

                </div>
            </div>
        </div>
    </div>

    <div class="btmFooter">
        <div class="container">
            <p>© Spices Research & Consultancy Pvt.Ltd All Right Reserved 2019.</p>
        </div>
    </div>
</footer>