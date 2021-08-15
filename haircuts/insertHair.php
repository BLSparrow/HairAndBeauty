<?php

use APP\Models\Validator;

session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

if (isset($_POST['submit'])) {
    $data['title'] = Validator::preProcessing($_POST['title']);
    $data['price'] = Validator::preProcessing($_POST['price']);
    $data['image'] = Validator::preProcessing($_POST['image']);
    $data['service_id'] = Validator::preProcessing($_POST['service_id']);

    [$error, $fileName] = loadImg($maxFileSize, $validFileTypes, $uploadPath, 'image');

    if (empty($error)) {
        $_SESSION['msg'] = 'Файл успешно создан';
        $_SESSION['alert'] = 'alert-success';
        $data['image'] = $fileName;
        $dataHair->addHair($data);
        header('Location:/haircuts');
    } else {
        $_SESSION['msg'] = $error;
        $_SESSION['alert'] = 'alert-danger';
        header('Location: /haircuts/new.php');
    }

}