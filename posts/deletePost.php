<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

$error1 = "";
$error2 = "";


if (isset($_POST["delete"])) {

    $id = $_POST['id'];
    $post = $dataPost->getOnePost($id);
    $error1 = deleteImg('../IMG/' . $post->image1);
    $error2 = deleteImg('../IMG/' . $post->image2);

    if (empty($error)) {

        $_SESSION["msg"] = "Файл успешно удалён";
        $_SESSION['alert'] = 'alert-success';
        $dataPost->deletePost($id);
        header("Location: /posts");

    } else {

        $_SESSION["msg"] = $error;
        $_SESSION['alert'] = 'alert-danger';
        header("Location: /posts/posts.view.php");
    }

}