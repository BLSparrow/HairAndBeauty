<?php include $_SERVER['DOCUMENT_ROOT'] . '/templates/navbar.admin.php'; ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="/jquery.maskedinput-master/src/jquery.maskedinput.js" type="text/javascript"></script>
<script type="text/javascript">
    jQuery(function ($) {
        $("#telephone").mask("+7 (999) 999-9999");
        $("#email").mask({
            mask: "*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]@*{1,20}[.*{2,6}][.*{1,2}]",
            greedy: false,
            clearMaskOnLostFocus: false,
            onBeforeWrite: function (event, buffer, caretPos, opts) {
                buffer.forEach(function(item, i, buffer) {
                    if (item == '@') {
                        buffer[i+1] = 'g';
                        buffer[i+2] = 'm';
                        buffer[i+3] = 'a';
                        buffer[i+4] = 'i';
                        buffer[i+5] = 'l';
                        buffer[i+6] = '.';
                        buffer[i+7] = 'c';
                        buffer[i+8] = 'o';
                        buffer[i+9] = 'm';
                        buffer.length = i+10;
                    }
                });
            }
        });
    });
</script>
<link rel="stylesheet" href="/css/formAdmin.scss">
<div class="cardsAnk">
    <div class="card2">
        <div class="row">

            <h2>Добавить мастера</h2>

            <form action="insertMaster.php" method="post" enctype="multipart/form-data">

                <div class="col">
                    <div class="form-group">
                        <label for="name">Имя мастера</label>
                        <input type="text" id="name" name="name">
                    </div>
                </div>


                <div class="col">
                    <div class="form-group">
                        <label class="bold" for="about_me">О себе</label>
                        <input type="text" class="t" name="about_me" id="about_me">
                    </div>
                </div>


                <div class="col">
                    <div class="form-group">
                        <label for="telephone">Телефон</label>
                        <input type="tel" name="telephone" id="telephone">
                    </div>
                </div>


                <div class="col">
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email">
                    </div>
                </div>


                <div class="col">
                    <div class="form-group">
                        <label class="bold" for="image">Выберите файл-изображение</label>
                        <input class="subscribe" type="file" name="image" id="image">
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