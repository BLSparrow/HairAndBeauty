<?php
session_start();

include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

$id = $_GET['id'] ?? 1;
$customer = $dataCustomer->getOneCustomer($id);

include $_SERVER['DOCUMENT_ROOT'] . '/customers/edit.view.php';