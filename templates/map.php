<?php
include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
include $_SERVER["DOCUMENT_ROOT"] . "/templates/header.view.php";
include $_SERVER["DOCUMENT_ROOT"] . "/templates/nav.php"; ?>
    <link rel="stylesheet" href="/css/map.css">
    <section class="fon fon_map">
        <div class="info">
            <div class="info">
                <h3>Наше расположение</h3>
                <p>Не можете нас найти?<br>Посмотрите на карту!</p>
            </div>
        </div>
        <button type="button" class="scroll_down" id="scroll_down"></button>


        <script type="application/javascript">
            (function () {
                'use strict';

                var btnScrollDown = document.querySelector('#scroll_down');

                function scrollDown() {
                    var windowCoords = document.documentElement.clientHeight;
                    (function scroll() {
                        if (window.pageYOffset < windowCoords) {
                            window.scrollBy(0, 10);
                            setTimeout(scroll, 0);
                        }
                        if (window.pageYOffset > windowCoords) {
                            window.scrollTo(0, windowCoords);
                        }
                    })();
                }

                btnScrollDown.addEventListener('click', scrollDown);
            })();
        </script>
    </section>
    <section class="MAP1">

        <div class="map">
            <div class="wrp">
                <div class="map-box">
                    <h2>Наши контакты</h2>
                    <p><i class="fas fa-map-marker-alt"></i> г. Челябинск, Гагарина 56/2</p>
                    <p><i class="fas fa-mobile-alt"></i> <a href="tel:+7 (908) 055-21-77">+7 (908) 055-21-77</a></p>
                    <p><i class="fab fa-vk"></i> <a
                                href="https://vk.com/public188118590">https://vk.com/public188118590</a></p>
                    <p>
                    <div class="image__wrapper"><img src="/startIMG/внешняя.jpg" class="minimized"
                                                     alt="клик для увеличения" title="клик для увеличения"></div>
                    </p>
                </div>
            </div>
            <div id="map">
                <script type="text/javascript" charset="utf-8" async
                        src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A091b717f084acd3ec42581e3e579e384808bc82d220d983e1cc21973706a47f0&amp;width=100%&amp;height=100vh&amp;lang=ru_UA&amp;scroll=false"></script>
            </div>
        </div>

        <script>
            $(function () {
                $('.minimized').click(function (event) {
                    var i_path = $(this).attr('src');
                    $('body').append('<div id="overlay"></div><div id="magnify"><img src="' + i_path + '"><div id="close-popup"><i></i></div></div>');
                    $('#magnify').css({
                        left: ($(document).width() - $('#magnify').outerWidth()) / 2,
                        // top: ($(document).height() - $('#magnify').outerHeight())/2 upd: 24.10.2016
                        top: ($(window).height() - $('#magnify').outerHeight()) / 2
                    });
                    $('#overlay, #magnify').fadeIn('fast');
                });

                $('body').on('click', '#close-popup, #overlay', function (event) {
                    event.preventDefault();

                    $('#overlay, #magnify').fadeOut('fast', function () {
                        $('#close-popup, #magnify, #overlay').remove();
                    });
                });
            });
        </script>

    </section>


<?php include $_SERVER["DOCUMENT_ROOT"] . "/templates/footer.view.php"; ?>