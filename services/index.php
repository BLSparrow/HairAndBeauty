<?php
include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

$services = $dataService->getAllServices();

include $_SERVER['DOCUMENT_ROOT'] . '/services/services.view.php';