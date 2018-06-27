@include('partials.head')
<div class="page">
@include('partials.header')
<!-- BEGIN content -->
    <section class="roadmap">
        <div class="container">
            <h1 class="page-title">
                <span class="page-title__text">Roadmap</span>
                <span class="page-title__bg">Roadmap</span>
            </h1>
            <div class="tags">
                @foreach($tags as $tag)
                    <a href="{{ url('roadmap/'.$tag->name) }}" class="tags__item">
                        <span class="tag {{ $active==$tag->name?'tag--active':'' }}">{{ $tag->name }}</span>
                    </a>
                @endforeach
            </div>
            <div id="roadmap" class="roadmap">
                <div class="progress-bar__btns">
                    <button class="btn btn--transition prev">
                        <i class="icon"></i>
                    </button>
                    <button class="btn btn--transition next">
                        <i class="icon"></i>
                    </button>
                </div>
                <div class="progress-bar">
                    <div id="filters" class="progress-bar__row">
                        @include('partials.points')
                    </div>
                </div>
            </div>
            <div class="grid">
                <div class="grid-sizer"></div>
                <div class="gutter-sizer"></div>
                @include('partials.cards')
            </div>
        </div>
    </section>
    <!-- END content -->
    @include('partials.footer')
</div>
@include('partials.scripts')