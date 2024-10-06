<header class="mainHeader">
    <!-- Mobile Header -->
    <div class="wsmobileheader">
        <a id="wsnavtoggle" class="wsanimated-arrow"><span></span></a>
        <a href="{{ route('home') }}">
            <span class="smllogo"><img src="it/images/logo.svg" width="80" alt=""/></span>
        </a>
    </div>
    <!-- Mobile Header -->
    <div class="wsmainfull">
        <div class="wsmainwp">
            <div class="desktoplogo">
                <a href="{{ route('home') }}">
                    <img src="it/images/logo-white.png" alt="">
                </a>
                <a href="{{ route('home') }}" class="colorLogo">
                    <img src="it/images/logo.svg" alt="">
                </a>
            </div>
            <nav class="wsmenu">
                {!! Helper::navs(1, 'wsmenu-list') !!}
<!--                <ul class="wsmenu-list">
                    <li aria-haspopup="true">
                        <a href="{{ route('it.home') }}" class="active">Home</a>
                    </li>
                    <li aria-haspopup="true">
                        <a href="{{ route('it.page', 'about-us') }}">About Us <span class="wsarrow"></span> </a>
                    </li>
                    <li aria-haspopup="true">
                        <a href="{{ route('it.services') }}">Services <span class="wsarrow"></span> </a>
                        <ul class="sub-menu">
                            <li aria-haspopup="true">
                                <a href="#"><i class="fa fa-angle-right"></i>Web Designing and Development</a>
                            </li>
                            <li aria-haspopup="true">
                                <a href="#"><i class="fa fa-angle-right"></i>Domain Registrations & Hosting</a>
                            </li>   
                            <li aria-haspopup="true">
                                <a href="#"><i class="fa fa-angle-right"></i>Search Engine Optimization</a>
                            </li>   
                            <li aria-haspopup="true">
                                <a href="#"><i class="fa fa-angle-right"></i>E-Commerce & Payment Gateway Integration</a>
                            </li>   
                            <li aria-haspopup="true">
                                <a href="#"><i class="fa fa-angle-right"></i>Integrated Business Promotions</a>
                            </li>  
                            <li aria-haspopup="true">
                                <a href="#"><i class="fa fa-angle-right"></i>Web and Mobile applications</a>
                            </li>  
                            <li aria-haspopup="true">
                                <a href="#"><i class="fa fa-angle-right"></i>Graphic designing services</a>
                            </li>                  
                        </ul>
                    </li>
                    <li aria-haspopup="true">
                        <a href="{{ route('it.portfolios') }}" class="">Portfolio</a>
                    </li>
                    <li aria-haspopup="true">
                        <a href="{{ route('it.blogs') }}" class="">Blog</a>
                    </li>
                    <li aria-haspopup="true">
                        <a href="contact.html" class="">Contact Us</a>
                    </li>
                    <div class="clearfix"></div>
                </ul>-->
            </nav>
            <div class="clearfix"></div>
        </div>
    </div>
</header>