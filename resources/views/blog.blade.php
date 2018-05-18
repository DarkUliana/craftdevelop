<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CraftDevelopment</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:url" content="http://craftdevelop.com"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title" content="Craft Development"/>
    <meta property="og:description" content="Lets Craft Future Together"/>
    <meta property="og:image" content="http://craftdevelop.com/img/logo.png"/>
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}" type="image/png">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,700&amp;subset=cyrillic,cyrillic-ext,greek-ext,latin-ext"
          rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <!-- Facebook Pixel Code -->
    <script>
        !function (f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function () {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
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

        function gtag() {
            dataLayer.push(arguments)
        };
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
                        <img src="img/newlogo.png" alt="CraftDevelopment">
                    </a>
                </div>
                <nav class="main-nav" id="nav">
                    <ul class="main-nav__list">
                        <li class="main-nav__list-item"><a href="{{ url('/') }}">Main</a></li>
                        <!-- 							<li class="main-nav__list-item"><a href="projects.html">Projects</a></li>
                         -->
                        <li class="main-nav__list-item"><a href="{{ url('/blog') }}">DevBlog</a></li>
                        <li class="social__content">
                            <a href="https://www.facebook.com/CraftDevelop/?fref=ts">Facebook</a>
                            <a href="https://twitter.com/CraftDevelop?lang=uk">Twitter</a>
                            <a href="https://www.instagram.com/craftdevelopment/">Instagram</a>
                        </li>
                    </ul>
                    <!-- <div class="lang-mobile">
                        <a class="active-lang" href="#">RU</a>
                        <a href="#">UA</a>
                    </div> -->
                </nav>
                <!-- <div class="select-wrap">
                    <button type="button" class="btn--lang-dropdown" id="btn--lang">RU <i class="carret"> </i></button>
                    <div class="select-content lang" id="lang-dropdown">
                        <a class="active-lang" href="#">RU</a>
                        <a href="#">UA</a>
                    </div>
                </div> -->
                <div class="main-nav__toogle" id="toogle-btn">
                    <span class="main-nav__toogle-item"></span>
                </div>
            </div>
        </div>
    </div>
</header>

<section class="blog">
    <div class="container">
        <h3 class="section-title blog-title">CRAFT DEVBLOG</h3>
        //TAGS
        <!-- <div class="blog-tags">
            <a class="blog-tags__link" href="#">all articles</a>
            <a class="blog-tags__link blog-tags__link--active" href="#">stay alive: survival</a>
            <a class="blog-tags__link" href="#">it's love</a>
        </div> -->
        <div id="articles">
        <?php
        $blog = '';

        $strSQL = "SELECT `ID`, `title_eng`, `address`, `preview_picture`, `main_tag`, `other_tags`, `main_picture`,
                    `article_preview_eng`, `article_preview_rus`, `publication_date`, `number_of_views`, `number_of_comments` FROM `articles` ORDER BY `ID` DESC LIMIT 3";

        $result = $connection->query($strSQL);


        if ($result->num_rows > 0) {
            if ($result->num_rows == 5)
                $show_button_more = true;
            while ($row = $result->fetch_assoc()) {
                $article_preview = '';
                $article_title = '';


                $publication_date_string = date("d.m.Y", strtotime($row['publication_date']));

                $article = "<article class=\"blog__article\">
                <a class=\"blog__article-img\" href=\"article.php?article_address=" . $row['address'] . "\">
                	<div class=\"img-descr\" style=\"display: none\">
                		<span class=\"img-descr__title\">" . $row['title_eng'] . "</span>
                		<span class=\"img-descr__text img-descr__text--eng\">" . $row['article_preview_eng'] . "</span>
                		<span class=\"img-descr__line\"></span>
                		<span class=\"img-descr__text img-descr__text--rus\">" . $row['article_preview_rus'] . "</span>
                	</div>
                	<img src=\"img/blog/previews/" . $row['preview_picture'] . "\"  alt=\"\" width=\"500\" style=\"\" >
                	<img class=\"blog__article-img-mobile\" src=\"img/blog/" . $row['main_picture'] . "\"  alt=\"\" width=\"500\" style=\"\" >
                </a>
                <div class=\"blog__article-content\">
                	<strong class=\"blog__article-tag\">" . $row['main_tag'] . "</strong>
                	<h5 class=\"blog__article-title\">" . $row['title_eng'] . "</h5>
                	<p class=\"blog__article-text line-clamp\">" . $row['article_preview_eng'] . "</p>
                	<p class=\"blog__article-text line-clamp\">" . $row['article_preview_rus'] . "</p>
                	<div class=\"blog__item-inner\">
                		<a href=\"article.php?article_address=" . $row['address'] . "\" class=\"btn btn--article\"><span>read article</span></a>
                		<div class=\"blog__article-info\">
                			<span class=\"blog__article-date\">
                				<object data=\"img/date.svg\" type=\"image/svg+xml\"></object>
                				" . $publication_date_string . "
                			</span>
                			<span class=\"blog__article-veis\">
                				<object data=\"img/veiws.svg\" type=\"image/svg+xml\"></object>
                				" . $row['number_of_views'] . "
                			</span>
                			<!-- <span class=\"blog__article-commnet\">
                			<object data=\"img/comment.svg\" type=\"image/svg+xml\"></object>
                			1
                		</span> -->
                	</div>
                </div>
              </div>
            </article>";


                $blog = $blog . $article;
            }

            echo $blog;
        }
        ?>
        <!--		      <article class="blog__article">-->
            <!--		        <div class="blog__article-img">-->
            <!--		            <a href="article.php">-->
            <!--		                <img src="img/blog_img.jpg" width="270" height="288" alt="">-->
            <!--		            </a>-->
            <!--		        </div>-->
            <!--		        <div class="blog__article-content">-->
            <!--		            <strong class="blog__article-tag">design</strong>-->
            <!--		            <h5 class="blog__article-title">Community Update 3</h5>-->
            <!--		            <p class="blog__article-text">You can make your decisions 100% more dramatic with the paintable Spinner Wheel, climb around your base with the new new Netting, or cosy up on the remade bed. We've optimised the fire fight lag, the Airfield will be getting tunnels, and more</p>-->
            <!--		            <div class="blog__item-inner">-->
            <!--		                <a href="article.php" class="btn btn--article"><span>read article</span></a>-->
            <!--		                <div class="blog__article-info">-->
            <!--		                   <span class="blog__article-date">-->
            <!--		                      <object data="img/date.svg" type="image/svg+xml"></object>-->
            <!--		                      24.05.2017-->
            <!--		                  </span>-->
            <!--		                  <span class="blog__article-veis">-->
            <!--		                   <object data="img/veiws.svg" type="image/svg+xml"></object>         -->
            <!--		                   35-->
            <!--		               </span>-->
            <!--		                <span class="blog__article-commnet">-->
            <!--		                   <object data="img/comment.svg" type="image/svg+xml"></object>-->
            <!--		                   1-->
            <!--		               </span> -->
            <!--		           </div>-->
            <!--		       </div>            -->
            <!--		   </div>-->
            <!--		</article>-->
        </div>
        <?php if ($number_of_products > 3) echo "<a class=\"btn btn--link btn--blog\" id=\"show_more\" href=\"#\">Show More</a>";?>

    </div>
</section>


<footer class="footer">
    <div class="container">
        <div class="footer--small">

            <div class="contacts__content">
                <span>Skype:</span>
                <strong>craftdevelop</strong>
            </div>
            <div class="contacts__content">
                <span>Viber/WhatsApp:</span>
                <strong>+38 (067) 970-93-43</strong>
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
<script src="js/main.js"></script>
<script type="text/javascript">
    var num = 3; //чтобы знать с какой записи вытаскивать данные
    var articlesHeight = $("#articles").height();
    // console.log(articlesHeight);
    $(function () {
        $("#show_more").click(function (event) {
            event.preventDefault();
            $.ajax({
                url: "php/get_more_works_blog.php",
                type: "GET",
                data: {"num": num},
                cache: false,
                success: function (server_response) {
                    var response = JSON.parse(server_response);
                    var articlesHeightNew = $('#articles').height();
                    if (response['content'] === '0') {
                        $('body,html').animate({
                            scrollTop: 0
                        }, 500);
                    }
                    else {
                        $("#articles").append(response['content']);
                        num = num + 3;

                        $('body,html').animate({
                            // scrollTop: 300 + 943 * (num / 3 - 1)
                            scrollTop: $("#articles").offset().top + articlesHeight + articlesHeightNew - articlesHeight
                        }, 600);
                        if (num >= <?php echo $number_of_products; ?>)
                            $("#show_more").text("To the top");

                    }
                }
            });
        });
    });
</script>
</body>
<?php $connection->close(); ?>
</html>