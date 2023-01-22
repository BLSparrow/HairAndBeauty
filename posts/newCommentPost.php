<?php
include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
$id = $_GET['id'] ?? 1;
$commentsPost = $dataPost->getAllCommentsPostId($id);
$post=$dataPost->getOnePost($id);
include $_SERVER['DOCUMENT_ROOT'] . '/posts/newCommentPost.view.php';