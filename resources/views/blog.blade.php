@include('partials.head')

@include('partials.header')
<!-- BEGIN content -->
<section class="blog">
    <div class="container">
        <h1 class="page-title">
            <span class="page-title__text">Craft Devblog</span>
            <span class="page-title__bg">Devblog</span>
        </h1>
        <div class="tags">
            @foreach($tags as $tag)
                <div class="tags__item">
                    <span class="tag {{ $loop->first?'tag--active':'' }}">{{ $tag->name }}</span>
                </div>
            @endforeach
        </div>
        <div class="blog-layout">
            @foreach($papers as $paper)
                <article class="article">
                    <div class="article__img">
                        <a class="article__link" href="{{ url('article/' . $paper->id) }}"
                           style="background-image: url({{ asset('img/blog/previews/' . $paper->image) }})"> </a>
                    </div>
                    <div class="article__content">
                        <div class="article__content-item">
                            <strong class="tag tag--active">{{ $paper->tag->name }}</strong>
                        </div>
                        <div class="article__content-item">
                            <h2 class="article__title">{{ $paper->translate($locale)->title }}</h2>
                        </div>
                        <div class="article__content-item">{{ $paper->translate($locale)->text_preview }}</div>
                        <div class="article__content-item row">
                            <a class="btn btn--transition btn--light" href="#">Read Article</a>
                            <div class="article__info">
                                <span class="date">{{ $paper->date }}</span>
                                <span class="view">{{ $paper->views }}</span>
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach
            <button class="blog-layout__btn btn btn--transition-simple" type="button">Show More</button>
        </div>
    </div>
</section>
<!-- END content -->
@include('partials.footer')
@include('partials.scripts')