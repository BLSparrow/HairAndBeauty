<?php include $_SERVER['DOCUMENT_ROOT'] . '/templates/navbar.admin.php'; ?>
<link rel="stylesheet" href="/css/formAdmin.scss">
<div class="cardsAnk">
    <div class="card2">
        <div class="row">


            <h2>Редактировать информацию о мастере</h2>

            <form action="updateMaster.php" method="post" enctype="multipart/form-data">

                <div style="display: none">
                    <label class="bold" for="id">id</label><br>
                    <input class="t" type="text" id="id" name="id" value="<?= $master->id ?>">
                </div>


                <div class="col">
                    <div class="form-group">
                        <label for="name">Имя</label>
                        <input type="text" id="name" name="name" value="<?= $master->name ?>">
                    </div>
                </div>


                <div class="col">
                    <div class="form-group">
                        <label for="about_me">О себе</label>
                        <input type="text" name="about_me" id="about_me" value="<?= $master->about_me ?>">
                    </div>
                </div>


                <div class="col">
                    <div class="form-group">
                        <label for="telephone">Телефон</label>
                        <input type="tel" name="telephone" id="telephone" required value="<?= $master->telephone ?>">
                    </div>
                </div>


                <div class="col">
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email" required value="<?= $master->email ?>">
                    </div>
                </div>


                <div class="col">
                    <div class="form-group">
                        <label for="image">Выберите файл-изображение</label>
                        <br>
                        <input type="file" name="image" id="image">
                    </div>
                </div>
                <br> <br> <br>
                <img src="../img/<?= $master->image ?>" alt="img" id="loadImage" style="width: 100px; display: block;">


                <input type="submit" name="submitUpdate" value="Редактировать">


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