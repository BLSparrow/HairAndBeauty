<?php
session_start();

include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

$id = $_GET['id'] ?? 1;
$hair = $dataHair->getOneHair($id);

include $_SERVER['DOCUMENT_ROOT'] . '/haircuts/edit.view.php';