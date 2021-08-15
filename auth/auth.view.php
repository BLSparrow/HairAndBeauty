<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<link rel="stylesheet" href="/css/auth.css">
<link rel="stylesheet" href="/css/homePage.css">

<div id="login-button">
    <img src="/startIMG/logo.png" alt="img">
</div>

<div class="main">
    <div id="container">
        <h1>Авторизация</h1>
        <span class="close-btn">
    <img src="https://cdn4.iconfinder.com/data/icons/miu/22/circle_close_delete_-128.png" alt="img">
  </span>

        <form action="../auth/login.php" method="post" style="padding: 10px">
            <label for="login"></label>
            <input type="text" name="login" placeholder="Имя" id="login" value="<?= $_SESSION['login'] ?? '' ?>">

            <label for="password"></label>
            <input type="password" name="password" placeholder="Пароль" id="password"
                   value="<?= $_SESSION['password'] ?? '' ?>">
            <button style=" margin-left: 35%; border: none; outline: none; background: none; color: #f4f4f4; font-size: 20px"
                    class="btn5 btn-one" type="submit" name="submit">Войти
            </button>

            <div id="remember-container">
                <input type="checkbox" id="checkbox-2-1" class="checkbox" checked="checked"/>
                <span id="remember">Запомнить меня</span>
            </div>
        </form>
    </div>
</div>

<script>
    $('#login-button').click(function () {
        $('#login-button').fadeOut("slow", function () {
            $("#container").fadeIn();
            TweenMax.from("#container", .4, {scale: 0, ease: Sine.easeInOut});
            TweenMax.to("#container", .4, {scale: 1, ease: Sine.easeInOut});
        });
    });

    $(".close-btn").click(function () {
        TweenMax.from("#container", .4, {scale: 1, ease: Sine.easeInOut});
        TweenMax.to("#container", .4, {left: "0px", scale: 0, ease: Sine.easeInOut});
        $("#container, #forgotten-container").fadeOut(800, function () {
            $("#login-button").fadeIn(800);
        });
    });
</script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/gsap/1.16.1/TweenMax.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
