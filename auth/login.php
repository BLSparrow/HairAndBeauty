<?php
use APP\Models\Validator;
include $_SERVER['DOCUMENT_ROOT'].'/bootstrap.php';

if(isset($_POST['submit'])){
    $login = Validator::preProcessing($_POST['login']);
    $password = Validator::preProcessing($_POST['password']);
    $user = $dataAuth->auth($login,$password);

    if($user){
        $_SESSION['user'] = json_encode($user, JSON_UNESCAPED_UNICODE);
        $_SESSION['auth'] = true;
        header('Location: /admin/index.view.php');
    }
    else{
        $_SESSION['errors']['auth'] = 'Неправильно введён логин или пароль!';
        $_SESSION['login'] = $login;
        $_SESSION['password'] = $password;
        header('Location: /auth');
    }
}