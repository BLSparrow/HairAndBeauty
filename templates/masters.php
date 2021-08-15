<?php include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
include $_SERVER["DOCUMENT_ROOT"] . "/templates/header.view.php";
include $_SERVER["DOCUMENT_ROOT"] . "/templates/nav.php"; ?>
    <section class="fon">
        <div class="info">
            <div class="info">
                <h3>Наше мастера</h3><br>
                <p>Тут вы можете ознакомиться с нашими мастерами<br>и их профессиональными особенностями</p>
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
<?php include $_SERVER['DOCUMENT_ROOT'] . '/modern-slide-in/index.php';
include $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.view.php';