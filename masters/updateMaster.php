<?php
session_start();

use App\Models\Validator;

include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

if (isset($_POST['submitUpdate'])) {

    unset($_SESSION['errors']);

    $data['name'] = Validator::preProcessing($_POST['name']);
    $data['about_me'] = Validator::preProcessing($_POST['about_me']);
    $data['telephone'] = Validator::preProcessing($_POST['telephone']);
    $data['email'] = Validator::preProcessing($_POST['email']);
    $data['id'] = $_POST['id'];

    $master = $dataMaster->getOneMaster($data['id']);

    [$errorLoad, $fileName] = loadImg($maxFileSize, $validFileTypes, $uploadPath, 'image');

    if ($_FILES['image']['error'] == UPLOAD_ERR_NO_FILE) {
        $fileName = $master->image;
        $errorLoad = '';
    } else {
        deleteImg('../img/' . $master->image);
    }

    if (empty($errorLoad)) {
        $data['image'] = $fileName;

        $dataMaster->updateMaster($data);

        header('Location: /masters/index.php');
    } else {
        $_SESSION['errors']['update'] = $errorLoad;

        header('Location: /masters/edit.php?id=' . $data['id']);
    }
}