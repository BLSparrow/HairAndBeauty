<?php include $_SERVER["DOCUMENT_ROOT"] . "/templates/header.view.php"; ?>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/templates/nav.php"; ?>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    .portfolio-wrap {
        background: url("/startIMG/fonPost.jpg");
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-position: center center;
        background-size: cover;
        background-clip: border-box;
        margin: 0 auto;
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
    }
    .portfolio-item {
        padding: 10px;
        margin: 35px;
    }
    .portfolio-item a {
        display: block;
        text-decoration: none;
        color: white;
    }
    .portfolio-item-wrap {
        position: relative;
        overflow: hidden;
        text-align: center;
        box-shadow: 0 0 5px rgba(0, 0, 0, .2);
        background: black;
        color: white;
    }
    .portfolio-item img {
        display: block;
        width: 100%;
        opacity: .75;
        transition: .5s ease-in-out;
    }
    .portfolio-item-inner {
        position: absolute;
        top: 45%;
        left: 7%;
        right: 7%;
        bottom: 45%;
        border: 1px solid white;
        border-width: 0 1px 1px;
        transition: .4s ease-in-out;
    }
    .portfolio-heading {
        overflow: hidden;
        transform: translateY(-50%);
    }
    .portfolio-heading h3 {
        font-family: 'Pattaya', sans-serif;
        font-weight: normal;
        display: table;
        margin: 0 auto;
        padding: 0 10px;
        position: relative;
    }
    .portfolio-heading h3:before, .portfolio-heading h3:after {
        content: "";
        position: absolute;
        top: 50%;
        width: 50px;
        height: 1px;
        background: white;
    }
    .portfolio-heading h3:before {
        left: -50px;
    }
    .portfolio-heading h3:after {
        right: -50px;
    }
    .portfolio-item-inner ul {
        position: absolute;
        top: 50%;
        width: 100%;
        transform: translateY(-50%);
        padding: 0 20px;
        opacity: 0;
        list-style: none;
        font-family: 'Raleway', sans-serif;
        transition: .4s ease-in-out;
    }
    .portfolio-item-inner li {
        position: relative;
        font-size: 30px;
        padding: 10px 0;
        margin-bottom: 4px;
    }
    .portfolio-item-inner li:after {
        content: "";
        position: absolute;
        left: 50%;
        margin-left: -2px;
        bottom: -4px;
        width: 4px;
        height: 4px;
        border-radius: 50%;
        background: white;
        box-shadow: 10px 0 0 white, -10px 0 0 white;
    }
    .portfolio-item-inner li:last-child:after {
        content: none;
    }
    .portfolio-item:hover img {
        opacity: 0.45;
        transform: scale(1.1);
    }
    .portfolio-item:hover .portfolio-item-inner {
        top: 7%;
        bottom: 7%;
    }
    .portfolio-item:hover ul {
        opacity: 1;
        transition-delay: .5s;
    }
    @media (min-width: 530px) {
        .portfolio-item {
            flex-basis: 50%;
            flex-shrink: 0;
        }
    }
    @media (min-width: 768px) {
        .portfolio-item {
            flex-basis: 33.333333333%;
        }
    }
</style>
    <section class="fon fon_hair">
        <div class="info">
            <div class="info">
                <h3></h3><br>
                <p>Тут вы можете ознакомиться с ценами и примерным видом услуг</p>
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
    <div class="portfolio-wrap">
        <?php foreach ($haircuts as $hair): ?>
            <div class="portfolio-item">
                <div class="portfolio-item-wrap">
                        <img src="/img/<?= $hair->image ?>" alt="img">
                        <div class="portfolio-item-inner">
                            <div class="portfolio-heading">
                                <h3><?= $hair->title ?></h3>
                            </div>
                            <ul>
                                <li><?= $hair->price ?>&#8381;</li>
                            </ul>
                        </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>


<?php include $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.view.php'; ?>