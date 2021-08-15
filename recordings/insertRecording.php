<?php

use APP\Models\Validator;

session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

if (isset($_POST['submit'])) {

    $dataC['name'] = Validator::preProcessing($_POST['name']);
    $dataC['telephone'] = Validator::preProcessing($_POST['telephone']);
    $dataC['id_master'] = Validator::preProcessing($_POST['id_master']);

    $dataR['id_master'] = Validator::preProcessing($_POST['id_master']);
    $dataR['id_hair'] = Validator::preProcessing($_POST['id_hair']);
    $dataR['id_customer'] = Validator::preProcessing($_POST['id_customer']);
    $dataR['id_time'] = Validator::preProcessing($_POST['id_time']);
    $dataR['date_reg'] = Validator::preProcessing($_POST['date_reg']);

    if (empty($error)) {
        $_SESSION['msg'] = 'Файл успешно создан';
        $_SESSION['alert'] = 'alert-success';
        $id_customer = $dataCustomer->addCustomer($dataC);
        $dataRecord->addRecording($id_customer, $dataR);
        header('Location:/index.php');
    } else {
        $_SESSION['msg'] = $error;
        $_SESSION['alert'] = 'alert-danger';
        header('Location: /recordings/new.php');
    }
}