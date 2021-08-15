<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

$error = "";


if (isset($_POST["verification"])) {

    $id = $_POST['id'];
    $commentPost = $dataPost->getOneCommentPostV($id);

    if (empty($error)) {

        $_SESSION["msg"] = "Файл успешно опублекован";
        $_SESSION['alert'] = 'alert-success';
        $dataPost->commentsPostVerification($id);
        header("Location: /posts/indexCommentPost.php");

    } else {

        $_SESSION["msg"] = $error;
        $_SESSION['alert'] = 'alert-danger';
        header("Location: /posts/commentsPost.view.php");
    }

}