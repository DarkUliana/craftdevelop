<header class="main-header">
    <div class="container">
        <div class="row jc-space-between ai-center">
            <div class="main-header__logo">
                <a href="{{ env('APP_URL') }}"><img width="145" height="50" class="logo__img" src="{{ asset('img/logo.png') }}"
                     alt="CraftDevelopment"></a></div>
            <nav class="main-nav">
                <ul class="nav-links">
                    <li class="nav-item">
                        <a href="{{ url('/') }}">{{ $keys['one_point_menu']->translate($locale)->name }}</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('blog') }}">{{ $keys['two_point_menu']->translate($locale)->name }}</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('roadmap') }}">{{ $keys['three_point_menu']->translate($locale)->name }}</a>
                    </li>
                </ul>
                <ul class="social-links">
                    <li class="nav-item">
                        <a class="btn btn--transition-simple" href="https://www.facebook.com/CraftDevelop/?fref=ts">Facebook</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn--transition-simple" href="https://twitter.com/CraftDevelop?lang=uk">Twitter</a>
                    </li>
                    -
                    <li class="nav-item">
                        <a class="btn btn--transition-simple" href="https://www.instagram.com/craftdevelopment/">Instagram</a>
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