<?php include $_SERVER['DOCUMENT_ROOT'] . '/templates/navbar.admin.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php'; ?>
<link rel="stylesheet" href="/css/formAdmin.scss">

<div class="cardsAnk">
    <div  class="card2">
        <div  class="row">

        <h2>Добавить Пост</h2>

        <form action="insertPost.php" method="post" enctype="multipart/form-data">


            <div class="col" style="display: none">
                <div class="form-group">
                    <label for="count_like">Лайк</label>
                    <input type="text"  name="count_like" id="count_like" value="0">
                </div></div>


            <div class="col">
            <div class="form-group">
                <label  for="title">Название поста</label>
                <input type="text" id="title" name="title">
            </div></div>



            <div class="col">
            <div class="form-group">
                <label for="description">Описание</label>
                <input type="text"  name="description" id="description">
            </div></div>


            <div class="col">
            <div class="form-group">
                <label for="image1">*Выберите файл-изображение (до) №1</label>
                <input type="file" name="image1" id="image1">
            </div></div>
            <br><br><br>
            <img src="" alt="" id="loadImage1" style="width: 100px;">



            <div class="col">
            <div class="form-group">
                <label for="image2">Выберите файл-изображение (после) №2</label>
                <input  type="file" name="image2" id="image2">
            </div></div>
            <br><br><br>
            <img src="" alt="" id="loadImage2" style="width: 100px;">



            <div class="col">
            <input type="submit" name="submit" value="Добавить">
            </div>


        </form>
    </div>
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