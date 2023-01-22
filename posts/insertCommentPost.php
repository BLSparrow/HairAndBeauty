<?php

use APP\Models\Validator;

session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

if (isset($_POST['submit'])) {
    $data['name'] = Validator::preProcessing($_POST['name']);
    $data['text'] = Validator::preProcessing($_POST['text']);
    $data['post_id'] = Validator::preProcessing($_POST['post_id']);

    if (empty($error)) {
        $_SESSION['msg'] = 'Файл успешно создан';
        $_SESSION['alert'] = 'alert-success';
        $dataPost->addCommentPost($data);
        header('Location:/templates/blog.php');
    } else {
        $_SESSION['msg'] = $error;
        $_SESSION['alert'] = 'alert-danger';
        header('Location: /posts/newCommentPost.php');
    }

}