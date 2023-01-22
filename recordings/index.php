<?php
include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

$recordings = $dataRecord->getAllRecordings();
$masters = $dataMaster->getAllMasters();



if (isset($_GET['searchButton'])) {
    $id = $_GET['filterMaster_id'];
    $recordings = $dataRecord->getRecordingsForMasters($id);
    if(!$recordings) {
        $recordings = $dataRecord->getAllRecordings();
        $_SESSION['msg'] = 'Таких записей нет!';
        $_SESSION['alert'] = 'alert-danger';
        $_SESSION['danger'] = 'dangerOn';
    }else{
        $_SESSION['msg'] = 'Вот ваши записи!!!';
        $_SESSION['alert'] = 'alert-success';
        $_SESSION['danger'] = 'dangerOff';
    }
}

include $_SERVER['DOCUMENT_ROOT'] . '/recordings/recordings.view.php';