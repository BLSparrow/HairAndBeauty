<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

$error = "";


if (isset($_POST["delete"])) {

    $id = $_POST['id'];
    $commentPost = $dataPost->getOneCommentPost($id);
    $commentPostV = $dataPost->getOneCommentPostV($id);

    if (empty($error)) {

        $_SESSION["msg"] = "Файл успешно удалён";
        $_SESSION['alert'] = 'alert-success';
        $dataPost->deleteCommentPost($id);
        $dataPost->deleteCommentPostV($id);
        header("Location: /posts/indexCommentPost.php");

    } else {

        $_SESSION["msg"] = $error;
        $_SESSION['alert'] = 'alert-danger';
        header("Location: /posts/commentsPost.view.php");
    }

}