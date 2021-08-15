<?php
include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

$commentsV = $dataCom->getAllCommentsV();
$comments = $dataCom->getAllComments();

include $_SERVER['DOCUMENT_ROOT'] . '/comments/comments.view.php';