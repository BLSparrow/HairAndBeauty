<?php
include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

$id = $_GET['id'] ?? 1;

$post = $dataPost->getOnePost($id);

include $_SERVER['DOCUMENT_ROOT'] . '/posts/show.view.php';