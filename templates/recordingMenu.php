<link rel="stylesheet" href="/css/recordingMenu.scss">
<div class="btn5 btn-two pushmenu pushmenu2">
    <span>Онлайн запись</span>
</div>

<nav class="sidebar">
    <div class="text d-flex p-2">
        <a href="#tel-modal" class="h3">Записаться онлайн</a>
        <div id="nav-icon3" class="pushmenu opened">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/recordings/new.view.php'; ?>

</nav>


<script>
    $('.btnn').click(function () {
        $(".block_with_text").fadeToggle(500, "linear");
    });
</script>


<div class="hidden-overley"></div>
<div id="toTop">&#9650;</div>
<script src="/js/up.js"></script>
<script src="/js/recordingMenu.js"></script>