<header class="mainHeader">
    <!-- Mobile Header -->
    <div class="wsmobileheader">
        <a id="wsnavtoggle" class="wsanimated-arrow"><span></span></a>
        <a href="{{ route('home') }}">
            <span class="smllogo"><img src="architecture/images/logo.svg" width="80" alt=""/></span>
        </a>
    </div>
    <!-- Mobile Header -->
    <div class="wsmainfull">
        <div class="wsmainwp">
            <div class="desktoplogo">
                <a href="{{ route('home') }}">
                    <img src="architecture/images/logo-white.png" alt="">
                </a>
                <a href="{{ route('home') }}" class="colorLogo">
                    <img src="architecture/images/logo.svg" alt="">
                </a>
            </div>
            <nav class="wsmenu">
                {!! Helper::navs(3, 'wsmenu-list') !!}
            </nav>
            <div class="clearfix"></div>
        </div>
    </div>
</header>