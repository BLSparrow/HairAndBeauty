<?php

use APP\Models\Validator;

session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

if (isset($_POST['submit'])) {
    $error = [];
    $data['master_id'] = Validator::preProcessing($_POST['master_id']);
    $data['date'] = Validator::preProcessing($_POST['date']);
    $time_id = $_POST['time_id'];

    if ($_POST['master_id'] == '') $errors[] = 'Вы не выбрали мастера!';
    if ($_POST['date'] == '') $errors[] = 'Вы не выбрали дату!';
    if ($_POST['time_id'] == '') $errors[] = 'Вы не выбрали время!';

    if (empty($error)) {
        $_SESSION['msg'] = 'Файл успешно создан';
        $_SESSION['alert'] = 'alert-success';
        $dataTimetables->addTimetable($time_id, $data);
        header('Location:/timetables');
    } else {
        $_SESSION['msg'] = $error;
        $_SESSION['alert'] = 'alert-danger';
        header('Location: /timetables/new.php');
    }

}