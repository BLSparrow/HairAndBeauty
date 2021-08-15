<?php
session_start();

use App\Models\Validator;

include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

if (isset($_POST['submitUpdate'])) {

    unset($_SESSION['errors']);

    $data['title'] = Validator::preProcessing($_POST['title']);
    $data['id'] = $_POST['id'];

    $service = $dataService->getOneService($data['id']);

    [$errorLoad, $fileName] = loadImg($maxFileSize, $validFileTypes, $uploadPath, 'image');

    if ($_FILES['image']['error'] == UPLOAD_ERR_NO_FILE) {
        $fileName = $service->image;
        $errorLoad = '';
    } else {
        deleteImg('../img/' . $service->image);
    }

    if (empty($errorLoad)) {
        $data['image'] = $fileName;

        $dataService->updateService($data);

        header('Location: /services/index.php');
    } else {
        $_SESSION['errors']['update'] = $errorLoad;

        header('Location: /services/edit.php?id=' . $data['id']);
    }
}