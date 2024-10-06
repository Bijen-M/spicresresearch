@if($portfolio)
<div class="col* col-md-6 col-lg-4 projectList">
    <div class="projectItem">
        <div class="productImg">
            @if(count($portfolio->picture))
            <figure>
                <img src="{{ $portfolio->picture ? $portfolio->picture[0]->upload.$portfolio->picture[0]->url : 'architecture/images/img4.jpg' }}" alt="{{ $portfolio->title }}" />
            </figure>
            @endif
        </div>
        <div class="productContent">
            <h2>{{ $portfolio->title }}</h2>
            <p>{!! words($portfolio->description) !!}</p>
            <div class="readlink">
                <a href="{{ route('architecture.portfolio.details', $portfolio->slug) }}">Read More</a>
            </div>
        </div>
    </div>
</div>
@endif