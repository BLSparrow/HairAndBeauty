<?php

use APP\Models\Validator;

session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

if (isset($_POST['submit'])) {
    $data['title'] = Validator::preProcessing($_POST['title']);
    $data['image1'] = Validator::preProcessing($_POST['image1']);
    $data['image2'] = Validator::preProcessing($_POST['image2']);
    $data['description'] = Validator::preProcessing($_POST['description']);
    $data['count_like'] = Validator::preProcessing($_POST['count_like']);

    [$error, $fileName1] = loadImg($maxFileSize, $validFileTypes, $uploadPath, 'image1');
    [$error, $fileName2] = loadImg($maxFileSize, $validFileTypes, $uploadPath, 'image2');

    if (empty($error)) {
        $_SESSION['msg'] = 'Файл успешно создан';
        $_SESSION['alert'] = 'alert-success';
        $data['image1'] = $fileName1;
        $data['image2'] = $fileName2;
        $dataPost->addPost($data);
        header('Location:/posts');
    } else {
        $_SESSION['msg'] = $error;
        $_SESSION['alert'] = 'alert-danger';
        header('Location: /posts/new.php');
    }

}