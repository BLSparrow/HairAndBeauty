<?php include $_SERVER['DOCUMENT_ROOT'] . '/templates/navbar.admin.php'; ?>
<link rel="stylesheet" href="/css/formAdmin.scss">
<div class="cardsAnk">
    <div class="card2">
        <div class="row">


            <h2>Изменить пост</h2>
            <form action="updatePost.php" method="post" enctype="multipart/form-data">


                <div style="display: none">
                    <label class="bold" for="id">Пост</label><br>
                    <input class="t" type="text" id="id" name="id" value="<?= $post->id ?>">
                </div>


                <div class="col">
                    <div class="form-group">
                        <label for="title">Название поста</label>
                        <input type="text" id="title" name="title" value="<?= $post->title ?>">
                    </div>
                </div>


                <div class="col">
                    <div class="form-group">
                        <label for="description">Описание</label>
                        <input type="text" name="description" id="description" value="<?= $post->description ?>">
                    </div>
                </div>


                <div class="col">
                    <div class="form-group">
                        <label class="bold" for="image1">*Выберите файл-изображение №1</label>
                        <input class="subscribe" type="file" name="image1" id="image1">
                    </div>
                </div>
                <br><br><br>
                <img src="../img/<?= $post->image1 ?>" alt="img" id="loadImage1" style="width: 100px; display: block;">


                <div class="col">
                    <div class="form-group">
                        <label class="bold" for="image2">Выберите файл-изображение №2</label>
                        <input class="subscribe" type="file" name="image2" id="image2">
                    </div>
                </div>
                <br><br><br>
                <img src="../img/<?= $post->image2 ?>" alt="img" id="loadImage2" style="width: 100px; display: block;">


                <input type="submit" name="submitUpdate" value="Редактировать">


            </form>
        </div>
    </div>

    <script>
        let loadImage1 = document.querySelector("#loadImage1"),
            loadImage2 = document.querySelector("#loadImage2"),
            image1 = document.querySelector("#image1"),
            image2 = document.querySelector("#image2")

        image1.addEventListener("change", function (e) {
            loadImage1.src = URL.createObjectURL(e.target.files[0]);
            loadImage1.style.display = 'block';
            loadImage1.onload = function () {
                URL.revokeObjectURL(e.target.src)
            }
        });

        image2.addEventListener("change", function (e) {
            loadImage2.src = URL.createObjectURL(e.target.files[0]);
            loadImage2.style.display = 'block';
            loadImage2.onload = function () {
                URL.revokeObjectURL(e.target.src)
            }
        });
    </script>