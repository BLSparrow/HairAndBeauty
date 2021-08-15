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

    .fon {
        margin-top: -175px;
    }
</style>
<section class="fon">
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
                                <a href="/posts/newCommentPost.php?id=<?= $post->id ?>">
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


                </div>
            <?php endforeach; ?>
        </div>
    </div>


</section>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="/twentytwenty/js/jquery.event.move.js"></script>
<script src="/twentytwenty/js/jquery.twentytwenty.js"></script>
<script>
    $(window).load(function () {
        $(".twentytwenty-container").twentytwenty({default_offset_pct: 0.7});
    });


    $(document).ready(function () {
        $('.iconLike').css('color', '#a1a19c');
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