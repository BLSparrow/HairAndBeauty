<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

$error = "";


if (isset($_POST["delete"])) {

    $id = $_POST['id'];
    $comment = $dataCom->getOneComment($id);
    $commentV = $dataCom->getOneCommentV($id);

    if (empty($error)) {

        $_SESSION["msg"] = "Файл успешно удалён";
        $_SESSION['alert'] = 'alert-success';
        $dataCom->deleteComment($id);
        $dataCom->deleteCommentV($id);
        header("Location: /comments");

    } else {

        $_SESSION["msg"] = $error;
        $_SESSION['alert'] = 'alert-danger';
        header("Location: /comments/comments.view.php");
    }

}