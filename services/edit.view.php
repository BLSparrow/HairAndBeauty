<?php include $_SERVER['DOCUMENT_ROOT'] . '/templates/navbar.admin.php'; ?>
<link rel="stylesheet" href="/css/formAdmin.scss">
<div class="cardsAnk">
    <div class="card2">
        <div class="row">


        <h2>Изменить категорию</h2>

        <form action="updateService.php" method="post" enctype="multipart/form-data">


            <div style="display: none">
                <label class="bold" for="id">Категория</label><br>
                <input class="t" type="text" id="id" name="id" value="<?= $service->id ?>">
            </div>



            <div class="col">
            <div class="form-group">
                <label for="title">Название услуги</label>
                <input type="text" id="title" name="title" value="<?= $service->title ?>">
            </div></div>

            <div class="col">
            <div class="form-group">
                <label for="image">Выберите файл-изображение</label>
                <input type="file" name="image" id="image">
            </div></div>
            <br><br><br>
            <img src="../img/<?= $service->image ?>" alt="img" id="loadImage" style="width: 100px; display: block;">



            <input type="submit" name="submitUpdate" value="Редактировать">



        </form>
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