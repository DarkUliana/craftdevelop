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
                <a class="btn btn--transition btn--light" href="{{ url('article/' . $paper->id) }}">Read Article</a>
                <div class="article__info">
                    <span class="date">{{ $paper->date }}</span>
                    <span class="view">{{ $paper->views }}</span>
                </div>
            </div>
        </div>
    </article>
@endforeach