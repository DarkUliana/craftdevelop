<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CraftDevelopment</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:url"                content="http://craftdevelop.com"/>
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="Craft Development" />
    <meta property="og:description"        content="Lets Craft Future Together" />
    <meta property="og:image"              content="http://craftdevelop.com/img/logo.png" />
    <!--	<link rel="shortcut icon" href="/img/favicon.png" type="image/png">-->

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('img/favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('img/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,700&amp;subset=cyrillic,cyrillic-ext,greek-ext,latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window,document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '207671509745531');
        fbq('track', 'PageView');
    </script>
    <noscript>
        <img height="1" width="1"
             src="https://www.facebook.com/tr?id=207671509745531&ev=PageView&noscript=1"/>
    </noscript>
    <!-- End Facebook Pixel Code -->
    <!-- Global Site Tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-96326393-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments)};
        gtag('js', new Date());

        gtag('config', 'UA-96326393-2');
    </script>
</head>

<body>
<header class="main-header">
    <div class="main-header__top">
        <div class="container">
            <div class="main-header__top-inner">
                <div class="main-header__logo">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('img/newlogo.png') }}" alt="CraftDevelopment">
                    </a>
                </div>
                <nav class="main-nav" id="nav">
                    <ul class="main-nav__list">
                        <li class="main-nav__list-item"><a href="{{ url('/') }}">Main</a></li>
                        <!-- 							<li class="main-nav__list-item"><a href="projects.html">Projects</a></li>
                         -->							<li class="main-nav__list-item"><a href="{{ url('/blog') }}">DevBlog</a></li>
                        <li class="social__content">
                            <a href="https://www.facebook.com/CraftDevelop/?fref=ts">Facebook</a>
                            <a href="https://twitter.com/CraftDevelop?lang=uk">Twitter</a>
                            <a href="https://www.instagram.com/craftdevelopment/">Instagram</a>
                        </li>
                    </ul>
                    <!--<div class="lang-mobile">
                        <a class="active-lang" href="#">RU</a>
                        <a href="#">UA</a>
                    </div>-->
                </nav>
                <!--<div class="select-wrap">
                    <button type="button" class="btn--lang-dropdown" id="btn--lang">RU <i class="carret"> </i></button>
                    <div class="select-content lang" id="lang-dropdown">
                        <a class="active-lang" href="#">RU</a>
                        <a href="#">UA</a>
                    </div>
                </div>-->
                <div class="main-nav__toogle" id="toogle-btn">
                    <span class="main-nav__toogle-item"></span>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="content" id="particles-js">
    <div class="bg bg-1"></div>
    <div class="bg bg-2"></div>
    <div class="bg bg-3"></div>
    <div class="bg bg-4"></div>
    <div class="bg bg-5"></div>
    <div class="bg bg-6"></div>
    <div class="container main-screen">
        <!-- <p class="content__text">Sign Up<br> <span class="content__text--regular">For Closed Alpha Testing!</span></p> -->
        <div class="content__links">
            <a class="btn content__links-item content__links-item--sign" href="https://docs.google.com/forms/d/e/1FAIpQLSf-Q8vDA_2AOmVZvmqsM3wFZWb7X6462oLOX2LPMXfRhShHSw/viewform">Register for closed alpha-testing</a>
            <a class="btn content__links-item" href="blog.php">Developers Blog</a>
        </div>
        <h1 class="content__title">
            Soon on...
            <!-- <span class="orange-text"></span> -->
        </h1>
        <div class="content__stores">
            <a class="content__link" href="#"><img width="200"  src="{{ asset('img/apple.png') }}" alt="Apple Store"></a>
            <a class="content__link" href="#"><img width="200"  src="{{ asset('img/google.png') }}" alt="Google Play"></a>
        </div>



    </div>

    <!-- <a href="blog.php" class="content__work-text" id="toPortfolio">DevBlog</a> -->
</div>





<footer class="footer">
    <div class="container">
        <div class="footer--small">

            <div class="contacts__content">
                <span>Skype:</span>
                <strong>craftdevelop</strong>
            </div>
            <div class="contacts__content">
                <span>Viber/WhatsApp:</span>
                <strong>+380679709343</strong>
            </div>
            <div class="contacts__content">
                <span>E-mail:</span>
                <strong>info.craftdevelop@gmail.com</strong>
            </div>

        </div>
        <div class="footer__copyright">
            <span class="orange-text">Craft Development</span> All rights reserved.
            <a href="privacypolicy.html">Privacy policy</a>
        </div>
    </div>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- <script src="js/particles.js"></script> -->
<script src="{{ asset('js/jquery-parallax.js') }}"></script>
<script src="{{ asset('js/TweenMax.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script>
    $(document.body).addClass('full-screen');
    $( document ).mousemove( function( e ) {
        $( '.bg-1' ).parallax( -15, e );
        $( '.bg-2' ).parallax( 20 , e );
        $( '.bg-3' ).parallax( -30, e );
        $( '.bg-4' ).parallax( -30 , e );
        $( '.bg-5' ).parallax( -15 , e );
        $( '.bg-6' ).parallax( -40 , e );
    });
    // particlesJS.load('particles-js', 'assets/particles.json', function() {
    //   console.log('callback - particles.js config loaded');
    // });

</script>
</body>
</html>