<link rel="stylesheet" href="/css/comments.css">
<div>
    <form class="form" action="/comments/insertComm.php" method="post" enctype="multipart/form-data">
        <h2>Оставьте отзыв</h2><br>
        <div class="nameComment">
            <label style="display: none" for="name">Ваше имя</label><br>
            <input placeholder="Имя" type="text" id="name" name="name">
        </div>
        <div class="textComment">
            <label style="display: none" for="text">Отзыв</label><br>
            <textarea placeholder="Ваш отзыв" name="text" id="text" rows="3"></textarea>
        </div>
        <br>

        <button class="btn5 btn-one" style=" border: none; outline: none; background: none; color: #f4f4f4; font-size: 20px" type="submit" name="submit">Отправить</button>
    </form>
</div>