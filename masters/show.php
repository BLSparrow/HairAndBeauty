<?php
include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

$id = $_GET['id'] ?? 1;

$master = $dataMaster->getOneMaster($id);

include $_SERVER['DOCUMENT_ROOT'] . '/masters/show.view.php';