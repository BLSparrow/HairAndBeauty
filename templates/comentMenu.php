<link rel="stylesheet" href="/css/comentMenu.scss">
<div class="pushmenu1 pushmenu3">
    <button class="pulse-button"><i class="fas fa-comment-alt"></i></button>
</div>

<nav class="sidebar1">
    <div class="text d-flex p-2">
        <a href="#tel-modal" class="h3">Отзывы</a>
        <div id="nav-icon3" class="pushmenu1 opened">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>


    <div>
        <a class="btn5 btn-one btnn" style="left: 33%; top: 20px;" href="#">Оставить отзыв</a><br>
        <a class="btn5 btn-one btnn1" style="left: 38%; display: none" href="#">Закрыть</a><br>
        <div class="block_with_text" style="display: none">
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/comments/new.view.php'; ?>
        </div>
        <br><br>

        <?php foreach ($comments as $comment): ?>
            <div class="comment">
                <h4><?= $comment->name ?></h4>
                <p><?= $comment->text ?></p>
            </div>
        <?php endforeach; ?>
    </div>


</nav>


<script>
    $('.btnn').click(function () {
        $(".block_with_text").fadeToggle(500, "linear");
        $(".btnn1").fadeToggle(500, "linear");
        $(".btnn").fadeToggle(500, "linear");
    });
    $('.btnn1').click(function () {
        $(".block_with_text").fadeToggle(500, "linear");
        $(".btnn1").fadeToggle(500, "linear");
        $(".btnn").fadeToggle(500, "linear");
    });
</script>


<div class="hidden-overley"></div>
<div id="toTop">&#9650;</div>
<script src="/js/up.js"></script>
<script src="/js/comentMenu.js"></script>