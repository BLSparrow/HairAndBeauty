<?php
session_start();

use App\Models\Validator;

include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

if (isset($_POST['submitUpdate'])) {

    unset($_SESSION['errors']);

    $data['name'] = Validator::preProcessing($_POST['name']);
    $data['telephone'] = Validator::preProcessing($_POST['telephone']);
    $data['id_master'] = Validator::preProcessing($_POST['id_master']);
    $data['id'] = $_POST['id'];

    $customer = $dataCustomer->getOneCustomer($data['id']);


    if ($_FILES['image']['error'] == UPLOAD_ERR_NO_FILE) {
        $errorLoad = '';
    }

    if (empty($errorLoad)) {

        $dataCustomer->updateCustomer($data);

        header('Location: /customers/index.php');
    } else {
        $_SESSION['errors']['update'] = $errorLoad;

        header('Location: /customers/edit.php?id=' . $data['id']);
    }
}