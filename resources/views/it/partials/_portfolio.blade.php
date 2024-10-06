@if($portfolio)
<div class="PortfolioItem web">
    <a href="{{ route('it.portfolio.details', $portfolio->slug) }}">
        <div class="PortfolioCaption">
            @if(count($portfolio->picture))
            <figure>
                <img src="{{ $portfolio->picture ? $portfolio->picture[0]->upload.$portfolio->picture[0]->url : 'it/images/pf.jpg' }}" alt="Image Title" />
            </figure>
            @endif
            <div class="overlay">
                <div class="PortfolioInfoContent">
                    <h4>{{ $portfolio->title }}</h4>
                    <p>{!! words($portfolio->description) !!}</p>
                </div>
            </div>
        </div>
    </a>
</div>
@endif