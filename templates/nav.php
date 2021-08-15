<?php include $_SERVER["DOCUMENT_ROOT"] . "/templates/recordingMenu.php";
include $_SERVER["DOCUMENT_ROOT"] . "/templates/comentMenu.php"; ?>
<link rel="stylesheet" href="/css/scrollDown.scss">
<link rel="stylesheet" href="/css/style.css">
<script src="/js/modernizr.js"></script>
<section class="generalNav">


    <div class="address">
        <div>
            <a href="/index.php#address"><p><i class="fas fa-map-marker-alt"></i><span> Челябинск</span></p>
                <p><span>Тел: +7 (908) 055-21-77</span></p></a>
        </div>
    </div>


    <div class="navbar">
        <div class="logo">
            <a href="/index.php" class="logo__link">
                <img class="logo__image" src="/startIMG/logo.png" alt="YOGA" class="logo">
            </a>
        </div>
        <ul class="links">
            <li><a href="/index.php#aboutUs">О главном</a></li>
            <li><a href="/templates/map.php">Мы</a></li>
            <li><a href="/index.php#price">Прайс</a></li>
            <div class="logo2">
                <a href="/index.php" class="logo__link">
                    <img src="/startIMG/logo.png" alt="img" class="logo2">
                </a>
            </div>
            <li><a href="/templates/masters.php">Наши мастера</a></li>
            <li><a href="/templates/services.php">Услуги</a></li>
            <li><a href="/templates/blog.php">Блог</a></li>
        </ul>
    </div>
    <!---------------------------------------->
    <div class="mobile">
        <nav>
            <ul class="cd-primary-nav">
                <li>
                    <a href="/index.php">
                        <img src="/startIMG/logo.png" alt="img" class="logo3">
                    </a>
                </li>
                <li><a href="/index.php#aboutUs">О главном</a></li>
                <li><a href="/templates/map.php">Мы</a></li>
                <li><a href="/index.php#price">Прайс</a></li>

                <li><a href="/templates/masters.php">Наши мастера</a></li>
                <li><a href="/templates/services.php">Услуги</a></li>
                <li><a href="/templates/blog.php">Блог</a></li>
                <li>
                    <div class="btn5 btn-one btnMobile pushmenu">
                        <span>Подобрать стрижку</span>
                    </div>
                </li>
            </ul>
        </nav>

        <div class="cd-overlay-nav">
            <span></span>
        </div> <!-- cd-overlay-nav -->

        <div class="cd-overlay-content">
            <span></span>
        </div> <!-- cd-overlay-content -->

        <a href="#0" class="cd-nav-trigger">Menu<span class="cd-icon"></span></a>
    </div>

    <!-------------------------------------------------------------->
    <script src="/js/jquery-2.1.1.js"></script>
    <script src="/js/velocity.min.js"></script>
    <script src="/js/main.js"></script> <!-- Resource jQuery -->
</section>