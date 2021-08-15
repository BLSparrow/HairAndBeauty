<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

$error = "";


if (isset($_POST["verification"])) {

    $id = $_POST['id'];
    $comment = $dataCom->getOneCommentV($id);

    if (empty($error)) {

        $_SESSION["msg"] = "Файл успешно опублекован";
        $_SESSION['alert'] = 'alert-success';
        $dataCom->commentsVerification($id);
        header("Location: /comments");

    } else {

        $_SESSION["msg"] = $error;
        $_SESSION['alert'] = 'alert-danger';
        header("Location: /comments/comments.view.php");
    }

}