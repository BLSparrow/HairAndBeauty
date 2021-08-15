<?php include $_SERVER['DOCUMENT_ROOT'] . '/templates/navbar.admin.php'; ?>
<link rel="stylesheet" href="/css/formAdmin.scss">
<div class="cardsAnk">
    <div class="card2">
        <div class="row">
            <h2>Добавить менеджера</h2><br>
            <form class="card-form" action="register.php" method="post">

                <div>
                    <div style="display: none">
                        <label for="id">Номер пользователя</label>
                        <input type="text" id="id" name="id" value="<?= $_SESSION['id'] ?>">
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label for="login">Login</label>
                        <input type="text" id="login" name="login" value="<?= $_SESSION['login'] ?? '' ?>">
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" value="<?= $_SESSION['password'] ?? '' ?>">
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label for="role">Role</label>
                        <input type="text" id="role" name="role" value="<?= $_SESSION['role'] ?? '' ?>Manager">
                    </div>
                </div>


                <div class="col">
                    <input type="submit" name="submit" value="Зарегистрироваться">
                </div>

            </form>
        </div>
    </div>
</div>