<?php include $_SERVER['DOCUMENT_ROOT'] . '/templates/navbar.admin.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php'; ?>
<link rel="stylesheet" href="/css/formAdmin.scss">
<div class="cardsAnk">
    <div class="card2">
        <div class="row">


            <h2>Добавить услугу</h2>
            <form action="insertHair.php" method="post" enctype="multipart/form-data">

                <div class="col">
                    <div class="form-group">
                        <label for="title">Название услуги</label>
                        <input type="text" id="title" name="title">
                    </div>
                </div>


                <div class="col">
                    <div class="form-group">
                        <label for="price">Цена</label>
                        <input type="number" name="price" id="price">
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label for="service_id">Наименование услуги</label>
                        <select name="service_id" id="service_id">
                            <option value="" disabled selected>Выберите услугу</option>
                            <?php foreach ($services as $service): ?>
                                <option value="<?= $service->id ?>"><?= $service->title ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>


                <div class="col">
                    <div class="form-group">
                        <label for="image">Выберите файл-изображение</label>
                        <input type="file" name="image" id="image" >
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