<?php
include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

$id = $_GET['id'] ?? 1;

$service = $dataService->getOneService($id);

include $_SERVER['DOCUMENT_ROOT'] . '/services/show.view.php';