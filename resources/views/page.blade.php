@include('partials.head')

<div class="page front-page">
    <div class="bg bg--1"></div>
    <div class="bg bg--2"></div>
    <div class="bg bg--3"></div>
    <div class="bg bg--4"></div>
    <div class="bg bg--5"></div>
    <div class="bg bg--6"></div>

@include('partials.header')
<!-- BEGIN content -->
    <main class="main-content">
        <div class="container">
            <div class="app">
                <div class="app__header">
                    <a class="btn btn--secondary btn--block btn--lg btn--dark"
                       href="https://play.google.com/store/apps/details?id=com.CraftDevelop.StayAlive">{{ $keys['main_button1']->translate($locale)->name }}</a>
                    <a class="btn btn--primary btn--block btn--lg btn--dark" href="{{ url('blog') }}">{{ $keys['main_button2']->translate($locale)->name }}</a>
                </div>
                <div class="app__body">
                    <span class="app__text">{{ $keys['main_text']->translate($locale)->name }}</span>
                </div>
                <div class="app__footer">
                    <div>
                    {{--<a href="#">--}}
                        <img style="filter: brightness(.3); -webkit-filter: brightness(.3);"
                             src="{{ asset('img/apple.png') }}" alt="AppleStore">
                    {{--</a>--}}
                    </div>
                    <a href="https://play.google.com/store/apps/details?id=com.CraftDevelop.StayAlive">
                        <img src="{{ asset('img/google.png') }}" alt="GoogleStore">
                    </a>
                </div>
            </div>
        </div>
    </main>
    <!-- END content -->
    @include('partials.footer')
</div>
@include('partials.scripts')