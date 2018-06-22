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
                   href="https://docs.google.com/forms/d/e/1FAIpQLSf-Q8vDA_2AOmVZvmqsM3wFZWb7X6462oLOX2LPMXfRhShHSw/viewform">Register
                    for closed alpha-testing</a>
                <a class="btn btn--primary btn--block btn--lg btn--dark" href="{{ url('blog') }}">Developers Blog</a>
            </div>
            <div class="app__body">
                <span class="app__text">Soon on...</span>
            </div>
            <div class="app__footer">
                <a href="#">
                    <img src="{{ asset('img/apple.png') }}" alt="AppleStore"> </a>
                <a href="#">
                    <img src="{{ asset('img/google.png') }}" alt="GoogleStore"> </a>
            </div>
        </div>
    </div>
</main>
<!-- END content -->
@include('partials.footer')
</div>
@include('partials.scripts')