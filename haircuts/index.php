<?php
include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

$haircuts = $dataHair->getAllHaircuts();

include $_SERVER['DOCUMENT_ROOT'] . '/haircuts/haircuts.view.php';