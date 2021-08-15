<?php
include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

if (isset($_GET['id'])) {
    $haircuts = $dataHair->getHaircutsForService($_GET['id']);
    if (!$haircuts) {
        $_SESSION['msg'] = '';
        $_SESSION['alert'] = 'alert-danger';
        $haircuts = $dataHair->getAllHaircutsWithService();
    } else {
        $_SESSION['msg'] = '';
        $_SESSION['alert'] = 'alert-success';
    }
}

include $_SERVER['DOCUMENT_ROOT'] . '/templates/haircuts.php';