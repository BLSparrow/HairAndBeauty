<?php session_start();
$user = isset($_SESSION['auth']) && $_SESSION['auth'] ? json_decode($_SESSION['user']) : false;
if ($user->role != "Admin") {
    $_SESSION['danger'] = 'bl';
} else {
    $_SESSION['danger'] = 'bl2';
}
?>

<style>
    .bl{
        display: none;
    }
    .bl2{
        display: block;
    }
</style>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
<link rel="stylesheet" href="/css/navbarAdmin.scss">

<div class="container">
    <div class="card">
        <div class="header">
            <h3>Hair & Beauty Salon (<?= $user->login ?>)</h3>
        </div>
        <div class="body">
            <ul>
                <li class="<?= $_SESSION['danger'] ?? '' ?>"><i class="fas fa-user-cog icon"></i><a
                            href="/register/users.php">Менеджеры</a>
                    <ul>
                        <li><i class="fas fa-pencil-alt icon"></i><a href="/register/register.view.php">Добавить</a>
                        </li>
                        <li><i class="fas fa-paper-plane icon"></i><a href="/register/users.php">Просмотреть</a>
                        </li>
                    </ul>
                </li>
                <li class="<?= $_SESSION['danger'] ?? '' ?>"><i class="fas fa-cut icon"></i><a href="/haircuts/index.php">Стрижки и услуги</a>
                    <ul>
                        <li><i class="fas fa-pencil-alt icon"></i><a href="/haircuts/new.php">Добавить</a></li>
                        <li><i class="fas fa-paper-plane icon"></i><a href="/haircuts/index.php">Просмотреть</a>
                        </li>
                    </ul>
                </li>
                <li class="<?= $_SESSION['danger'] ?? '' ?>"><i class="fas fa-user-tie icon"></i><a href="/masters/index.php">Мастера</a>
                    <ul>
                        <li><i class="fas fa-pencil-alt icon"></i><a href="/masters/new.php">Добавить</a></li>
                        <li><i class="fas fa-paper-plane icon"></i><a href="/masters/index.php">Просмотреть</a></li>
                    </ul>
                </li>
                <li class="<?= $_SESSION['danger'] ?? '' ?>"><i class="fas fa-table icon"></i><a href="/services/index.php">Категории</a>
                    <ul>
                        <li><i class="fas fa-pencil-alt icon"></i><a href="/services/new.php">Добавить</a></li>
                        <li><i class="fas fa-paper-plane icon"></i><a href="/services/index.php">Просмотреть</a>
                        </li>
                    </ul>
                </li>
                <li><i class="fas fa-table icon"></i><a href="/timetables/index.php">Рабочий граф.</a>
                    <ul>
                        <li><i class="fas fa-pencil-alt icon"></i><a href="/timetables/new.php">Добавить</a></li>
                        <li><i class="fas fa-paper-plane icon"></i><a href="/timetables/index.php">Просмотреть</a>
                        </li>
                    </ul>
                </li>
                <li><i class="fab fa-instagram icon"></i><a href="/posts/index.php">Посты</a>
                    <ul>
                        <li><i class="fas fa-pencil-alt icon"></i><a href="/posts/new.php">Добавить</a></li>
                        <li><i class="fas fa-paper-plane icon"></i><a href="/posts/index.php">Просмотреть</a></li>
                    </ul>
                </li>
                <li><i class="fas fa-comments icon"></i><a href="/comments/index.php">Комментарии</a>
                <li><i class="fas fa-comments icon"></i><a href="/posts/indexCommentPost.php">Комментарии к постам</a>
                <li><i class="fas fa-comments icon"></i><a href="/recordings/index.php">Записи</a></li>
                <li><i class="fas fa-user-cog icon"></i><a href="/customers/index.php">Клиенты</a>
                <li style="margin-top: 100%"><i class="fas fa-sign-out-alt"></i><a href="/index.php">Выход</a></li>
            </ul>
        </div>
    </div>
</div>