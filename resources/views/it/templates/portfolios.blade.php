@extends('it.layouts.master')

@section('content')
<section id="vcInnerContent" class="innerContentBox">
    <div class="projectListingBox ourWork">
        <div class="container">
            <div class="portfolioMain-wrapper sectionPortfolio">
                <div class="PortfolioMainWrap">

                    <div class="buttonGroup filterWork">
                        <a class="button is-checked" data-filter="*">All</a>
                        <a class="button " data-filter=".web">Branding</a>
                        <a class="button" data-filter=".web-application">Mobile</a>
                        <a class="button" data-filter=".design">Ux</a>
                    </div>

                    <div class="PortfolioContent">
                        <div class="row">
                            <div class="portfolioListBox">
                                @foreach($portfolios as $portfolio)
                                @include('it.partials._portfolio')
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection