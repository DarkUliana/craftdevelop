<header class="main-header">
    <div class="container">
        <div class="row jc-space-between ai-center">
            <div class="main-header__logo">
                <img width="145" height="50" class="logo__img" src="{{ asset('img/logo.png') }}"
                     alt="CraftDevelopment"></div>
            <nav class="main-nav">
                <ul class="nav-links">
                    <li class="nav-item">
                        <a href="{{ url('/') }}">Main</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('blog') }}">DevBlog</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('roadmap') }}">Roadmap</a>
                    </li>
                </ul>
                <ul class="social-links">
                    <li class="nav-item">
                        <a class="btn btn--transition-simple" href="#">Facebook</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn--transition-simple" href="#">Twitter</a>
                    </li>
                    -
                    <li class="nav-item">
                        <a class="btn btn--transition-simple" href="#">Instagram</a>
                    </li>
                </ul>
                <div class="dropdown main-nav__dropdown">
                    <button class="btn btn--dark dropdown__toggle" type="button">{{ $languages[$locale] }}</button>
                    <div class="dropdown__menu">
                        @foreach($languages as $key => $language)
                            <a class="dropdown__item {{ $key==$locale?'dropdown__item--disabled':'' }}" href="{{ url('setlocale/'.$key) }}">{{ $language }}</a>
                        @endforeach
                    </div>
                </div>
            </nav>
            <button type="button" class="toggler">
                <span class="toggler__item"></span>
                <span class="toggler__item"></span>
                <span class="toggler__item"></span>
            </button>
        </div>
    </div>
</header>