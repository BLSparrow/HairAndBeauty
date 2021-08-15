<?php

use APP\Models\Validator;

session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

if (isset($_POST['submit'])) {
    $data['name'] = Validator::preProcessing($_POST['name']);
    $data['about_me'] = Validator::preProcessing($_POST['about_me']);
    $data['image'] = Validator::preProcessing($_POST['image']);
    $data['telephone'] = Validator::preProcessing($_POST['telephone']);
    $data['email'] = Validator::preProcessing($_POST['email']);


    [$error, $fileName] = loadImg($maxFileSize, $validFileTypes, $uploadPath, 'image');

    if (empty($error)) {
        $_SESSION['msg'] = 'Файл успешно создан';
        $_SESSION['alert'] = 'alert-success';
        $data['image'] = $fileName;
        $dataMaster->addMaster($data);
        header('Location:/masters');
    } else {
        $_SESSION['msg'] = $error;
        $_SESSION['alert'] = 'alert-danger';
        header('Location: /masters/new.php');
    }

}