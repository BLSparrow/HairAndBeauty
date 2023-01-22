<?php $file = file("../count.txt");
$count = implode("", $file);
$count++;
$myFile = fopen("../count.txt", "w");
fputs($myFile, $count);
fclose($myFile); ?>
<link media="screen" href="/twentytwenty/demo/styles/demo.css" type="text/css" rel="stylesheet"/>
<link rel="stylesheet" href="/twentytwenty/demo2.css?v=2">
<link href="/twentytwenty/css/twentytwenty.css" rel="stylesheet" type="text/css"/>
<link href="/twentytwenty/css/foundation.css" rel="stylesheet" type="text/css"/>
<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<!------------------------------------------------------------------------------------------------>
<style>
    .commentAndLike {
        margin-top: 25px;
        display: flex;
        align-content: center;
    }

    .commentAndLike > div {
        margin-left: 10px;
    }

    .like {
        cursor: pointer;
    }
</style>
<section class="fon fon_blog">
    <div class="info">
        <div class="info">
            <h3>Наш БЛОГ</h3><br>
            <p>Тут вы можете ознакомиться с работами наших мастеров,<br> а также оценить их и оставить свой комментарий
            </p>
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

<section class="sectionBlog">
    <div class="row">
        <div class="column">
            <?php foreach ($posts as $post): ?>
                <div class="card">
                    <div class="twentytwenty-container">
                        <img src="/img/<?= $post->image1 ?>" alt="img">
                        <img src="/img/<?= $post->image2 ?>" alt="img">
                    </div>


                    <div class="card-content">
                        <div class="commentAndLike">


                            <div>
                                <a class="btnnnn" href="javascript://">
                                    <i class="fa fa-comments-o"></i> <span><?= $post->comments_count ?></span>
                                </a>
                            </div>

                            <div class="like" data-id="<?php print $post->id ?>"><i class="iconLike fas fa-heart"></i>
                                <span class="counter"><?php print $post->count_like ?></span></div>


                            <div class="eye"><i class="far fa-eye"></i> <span><?= $count ?></span></div>


                        </div>


                        <h2><?= $post->title ?></h2>
                        <p><?= $post->description ?></p>
                    </div>
                    <div class="comments_for_post" style="display: none">
                        <?php $commentsPost = $dataPost->getAllCommentsPostId($post->id);
                        if ($post->id): ?>
                            <?php foreach ($commentsPost as $comment): ?>
                                <div class="comment">
                                    <h4><?= $comment->name ?></h4>
                                    <p><?= $comment->text ?></p>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <a style="margin-left: 30%" class="btn5 btn-two btnnn" href="javascript://">Оставить отзыв</a>
                    </div>
                    <div class="block_with_text" style="display: none">

                        <form class="form" action="/posts/insertCommentPost.php" method="post"
                              enctype="multipart/form-data">
                            <h2>Оставьте отзыв</h2>

                            <div style="display: none">
                                <label for="post_id"></label>
                                <input type="number" id="post_id" name="post_id" value="<?= $post->id ?>">
                            </div>

                            <div class="nameComment">
                                <label style="display: none" for="name">Ваше имя</label><br>
                                <input placeholder="Имя" type="text" id="name" name="name">
                            </div>
                            <div class="textComment">
                                <label style="display: none" for="text">Отзыв</label><br>
                                <textarea placeholder="Ваш отзыв" name="text" id="text" rows="3"></textarea>
                            </div>
                            <br>
                            <button onclick="alert('Ваш отзыв отправлен на обработку')" style=" border: none; outline: none; background: none; color: #CD9A7B; font-size: 20px; padding: 10px"
                                    class="btn6 btn-two" type="submit" name="submit">Отправить
                            </button>
                        </form>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</section>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="/twentytwenty/js/jquery.event.move.js"></script>
<script src="/twentytwenty/js/jquery.twentytwenty.js"></script>
<script>

    $('.btnnn').click(function () {
        $(".block_with_text").fadeToggle(500, "linear");
    });
    $('.btnnnn').click(function () {
        $(".comments_for_post").fadeToggle(500, "linear");
    });

    $(window).load(function () {
        $(".twentytwenty-container").twentytwenty({default_offset_pct: 0.7});
    });

    $(document).ready(function () {
        $('.iconLike').css('color', '#676B65');
        $(".like").bind("click", function () {
            var link = $(this);
            var id = link.data('id');
            $.ajax({
                url: "/posts/like.php",
                type: "POST",
                data: {id: id}, // Передаем ID нашей статьи
                dataType: "json",
                success: function (result) {
                    if (!result.error) { //если на сервере не произойло ошибки то обновляем количество лайков на странице
                        link.addClass('active').css('color', 'red'); // помечаем лайк как "понравившийся"
                        $('.counter', link).html(result.count);
                    } else {
                        alert(result.message);
                    }
                }
            });
        });
    });
</script>