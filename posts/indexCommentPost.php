<?php
include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

$commentPostsV = $dataPost->getAllCommentsPostV();
$commentPosts = $dataPost->getAllCommentsPost();

include $_SERVER['DOCUMENT_ROOT'] . '/posts/commentsPost.view.php';