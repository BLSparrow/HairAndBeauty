<link rel="stylesheet" href="/css/comments.css">
<link rel="stylesheet" href="/css/comentMenu.scss">
<link rel="stylesheet" href="/css/homePage.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

<link media="screen" href="/twentytwenty/demo/styles/demo.css" type="text/css" rel="stylesheet"/>
<link rel="stylesheet" href="/twentytwenty/demo2.css?v=2">
<link href="/twentytwenty/css/twentytwenty.css" rel="stylesheet" type="text/css"/>
<link href="/twentytwenty/css/foundation.css" rel="stylesheet" type="text/css"/>
<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>

<div class="globalCommentPost">
    <section style="width: 60%;" class="sectionBlog">
        <div class="row" style="width: 70%;">
            <div class="column">
                <?php if ($post): ?>
                    <div class="card">
                        <div class="twentytwenty-container">
                            <img src="/img/<?= $post->image1 ?>" alt="img">
                            <img src="/img/<?= $post->image2 ?>" alt="img">
                        </div>


                        <div class="card-content">
                            <h2><?= $post->title ?></h2>
                            <p><?= $post->description ?></p>
                        </div>

                    </div>
                <?php else: ?>
                    <div style="color: red">Запрашиваемый ресурс не гайден...</div>
                <?php endif; ?>
            </div>
        </div>


    </section>


    <div style="width: 50%;">
        <div>
            <br>
            <a class="btn5 btn-one btnn" href="#">Оставить отзыв</a>
            <div class="block_with_text" style="display: none;">
                <br><br>

                <form class="form" action="/posts/insertCommentPost.php" method="post" enctype="multipart/form-data">
                    <h2>Оставьте отзыв</h2>

                    <div style="display: none">
                        <label for="post_id"></label>
                        <input type="number" id="post_id" name="post_id" value="<?= $_GET['id'] ?>">
                    </div>

                    <div class="nameComment">
                        <label style="display: none" for="name">Ваше имя</label><br>
                        <input class="t" placeholder="Имя" type="text" id="name" name="name">
                    </div>
                    <div class="textComment">
                        <label style="display: none" for="text">Отзыв</label><br>
                        <textarea class="t" placeholder="Ваш отзыв" name="text" id="text" rows="3"></textarea>
                    </div>
                    <br>
                    <button style=" border: none; outline: none; background: none; color: #f4f4f4; font-size: 20px" class="btn5 btn-one" type="submit" name="submit">Отправить</button>
                </form>

            </div>
            <br><br>
            <?php if ($_GET['id']): ?>
                <?php foreach ($commentsPost as $comment): ?>
                    <div class="comment">
                        <h4><?= $comment->name ?></h4>
                        <p><?= $comment->text ?></p>
                    </div>
                <?php endforeach; ?>

            <?php endif; ?>
        </div>
    </div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="/twentytwenty/js/jquery.event.move.js"></script>
<script src="/twentytwenty/js/jquery.twentytwenty.js"></script>
<script>
    $(window).load(function () {
        $(".twentytwenty-container").twentytwenty({default_offset_pct: 0.7});
    });
</script>
<script>
    $('.btnn').click(function () {
        $(".block_with_text").fadeToggle(500, "linear");
    });
</script>