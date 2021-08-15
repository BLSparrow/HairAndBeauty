<?php include $_SERVER['DOCUMENT_ROOT'] . '/templates/navbar.admin.php'; ?>
<link rel="stylesheet" href="/css/formAdmin.scss">
<div class="cardsAnk">
    <div class="card2">
        <div class="row">

            <h2>Добавить категорию</h2>

            <form action="insertService.php" method="post" enctype="multipart/form-data">


                <div class="col">
                    <div class="form-group">
                        <label for="title">Название категории</label>
                        <input type="text" id="title" name="title">
                    </div>
                </div>


                <div class="col">
                    <div class="form-group">
                        <label for="image">Выберите файл-изображение</label>
                        <input type="file" name="image" id="image">
                    </div>
                </div>


                <br><br><br>
                <img src="" alt="" id="loadImage" style="width: 100px;">


                <div class="col">
                    <input type="submit" name="submit" value="Добавить">
                </div>

            </form>
        </div>
    </div>
</div>

<script>
    let loadImage = document.querySelector("#loadImage"),
        image = document.querySelector("#image");

    image.addEventListener("change", function (e) {
        loadImage.src = URL.createObjectURL(e.target.files[0]);
        loadImage.style.display = 'block';
        loadImage.onload = function () {
            URL.revokeObjectURL(e.target.src)
        }
    });
</script>