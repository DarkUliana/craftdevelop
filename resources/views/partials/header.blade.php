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
                    <button class="btn btn--dark dropdown__toggle" type="button"> Eng</button>
                    <div class="dropdown__menu">
                        <a class="dropdown__item dropdown__item--disabled" href="#">Eng</a>
                        <a class="dropdown__item" href="#">Rus</a>
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