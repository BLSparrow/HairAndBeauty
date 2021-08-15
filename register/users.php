<?php
include $_SERVER['DOCUMENT_ROOT'].'/bootstrap.php';

$users = $dataAuth->getAllUsers();

include $_SERVER['DOCUMENT_ROOT'].'/register/users.view.php';