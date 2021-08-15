<?php
session_start();

use App\Models\Validator;

include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

if (isset($_POST['submitUpdate'])) {

    unset($_SESSION['errors']);

    $data['title'] = Validator::preProcessing($_POST['title']);
    $data['price'] = Validator::preProcessing($_POST['price']);
    $data['service_id'] = Validator::preProcessing($_POST['service_id']);
    $data['id'] = $_POST['id'];

    $hair = $dataHair->getOneHair($data['id']);

    [$errorLoad, $fileName] = loadImg($maxFileSize, $validFileTypes, $uploadPath, 'image');

    if ($_FILES['image']['error'] == UPLOAD_ERR_NO_FILE) {
        $fileName = $hair->image;
        $errorLoad = '';
    } else {
        deleteImg('../img/' . $hair->image);
    }

    if (empty($errorLoad)) {
        $data['image'] = $fileName;

        $dataHair->updateHair($data);

        header('Location: /haircuts/index.php');
    } else {
        $_SESSION['errors']['update'] = $errorLoad;

        header('Location: /haircuts/edit.php?id=' . $data['id']);
    }
}