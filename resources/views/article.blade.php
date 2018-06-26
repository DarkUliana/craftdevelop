@include('partials.head')

@include('partials.header')
<!-- BEGIN content -->
<section class="blog">
    <div class="container container--small">
        <h1 class="page-title">
            <span class="page-title__text">{{ $paper->translate($localization)->title }}</span>
            <span class="page-title__bg">Article</span>
        </h1>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb__item">
                    <a class="breadcrumb__link" href="{{ url('/') }}">Main</a>
                </li>
                <li class="breadcrumb__item">
                    <a class="breadcrumb__link" href="{{ url('/blog') }}">Blog</a>
                </li>
                <li class="breadcrumb__item">
                    <a class="breadcrumb__link" href="{{ url('article/' . $paper->id) }}">{{ $paper->translate($localization)->title }}</a>
                </li>
            </ul>
        </nav>
        <div class="art-item">
            <div class="art-item__img">
                <img src="{{ asset('img/blog/' . $paper->image) }}" alt="Article"></div>
            <div class="art-item__info">
                <span class="tag tag--lg tag--active">{{ $paper->tag->name }}</span>
                <span class="date">{{ $paper->date }}</span>
                <span class="view">{{ $paper->views }}</span>
            </div>
            <div class="art-item__body">
                {!! $paper->text !!}
                <div class="slider">
                    <div class="slider-for">
                        @foreach($paper->albumImages() as $image)
                            <div class="slider__item">
                                <img src="{{ asset('img/blog/' . $image->image) }}" alt="{{ $image->image }}">
                            </div>
                        @endforeach
                    </div>
                    <div class="slider-nav">
                        @foreach($paper->albumImages() as $preview)
                            <div class="slider-nav__item">
                                <img src="{{ asset('img/blog/' . $preview->image) }}" alt="{{ $preview->image }}">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="related-posts">
        <div class="container">
            <h2 class="related-posts__title">Read also</h2>
            <div class="related-posts__wrap">
                @foreach($related as $item)
                <div class="related-posts__item">
                    <article class="article article--related">
                        <div class="article__img">
                            <a class="article__link" href="{{ url('article/' . $item->id) }}"
                               style="background-image: url('{{ asset('img/blog/previews/' . $item->image) }}')"> </a>
                        </div>
                        <div class="article__content">
                            <div class="article__content-item">
                                <strong class="tag tag--active">{{ $item->tag->name }}</strong>
                            </div>
                            <div class="article__content-item">
                                <h2 class="article__title">{{ $item->translate($localization)->title }}</h2>
                            </div>
                            <div class="article__content-item">
                                <p class="article__text">{{ $item->translate($localization)->preview }}</p>
                            </div>
                            <div class="article__content-item row">
                                <a class="btn btn--transition btn--light" href="{{ url('article/' . $item->id) }}">Read Article</a>
                            </div>
                        </div>
                    </article>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- END content -->
@include('partials.footer')
@include('partials.scripts')