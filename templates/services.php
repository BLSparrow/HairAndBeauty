<?php include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php"; ?>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/templates/header.view.php"; ?>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/templates/nav.php"; ?>
    <link rel="stylesheet" href="/css/services.css">

    <section class="fon">
        <div class="info">
            <div class="info">
                <h3>Наши услуги</h3><br>
                <p>Не знаете чего хотите?<br>Посмотрите на предлагаемые нами услуги!</p>
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

    <div class="post-wrap">
        <?php foreach ($services as $service): ?>
            <div class="post-item">
                <div class="post-item-wrap">
                    <img src="/img/<?= $service->image ?>" alt="img">
                    <div class="line">
                        <a href="/haircuts/sortHair.php?id=<?= $service->id ?>" class="post-link">
                            <span><?= $service->title ?></span>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>


<?php include $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.view.php'; ?>