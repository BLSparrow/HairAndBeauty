<?php
session_start();

use App\Models\Validator;

include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

if (isset($_POST['submitUpdate'])) {

    unset($_SESSION['errors']);

    $data['title'] = Validator::preProcessing($_POST['title']);
    $data['description'] = Validator::preProcessing($_POST['description']);
    $data['id'] = $_POST['id'];

    $post = $dataPost->getOnePost($data['id']);

    [$errorLoad, $fileName1] = loadImg($maxFileSize, $validFileTypes, $uploadPath, 'image1');
    [$errorLoad, $fileName2] = loadImg($maxFileSize, $validFileTypes, $uploadPath, 'image2');

    if ($_FILES['image']['error'] == UPLOAD_ERR_NO_FILE) {
        $fileName1 = $post->image1;
        $fileName2 = $post->image2;
        $errorLoad = '';
    } else {
        deleteImg('../img/' . $post->image1);
        deleteImg('../img/' . $post->image2);
    }

    if (empty($errorLoad)) {
        $data['image1'] = $fileName1;
        $data['image2'] = $fileName2;

        $dataPost->updatePost($data);

        header('Location: /posts/index.php');
    } else {
        $_SESSION['errors']['update'] = $errorLoad;

        header('Location: /posts/edit.php?id=' . $data['id']);
    }
}