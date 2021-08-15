<?php
include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

$posts = $dataPost->getAllPosts();

include $_SERVER['DOCUMENT_ROOT'] . '/posts/posts.view.php';