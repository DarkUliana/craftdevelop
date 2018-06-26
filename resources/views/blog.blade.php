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

            @include('partials.papers')

            <button class="blog-layout__btn btn btn--transition-simple" type="button">Show More</button>
        </div>
    </div>
</section>
<!-- END content -->
@include('partials.footer')
@include('partials.scripts')