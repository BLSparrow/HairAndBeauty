<?php
include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

$times = $dataTimetables->getAllTimetables();

include $_SERVER['DOCUMENT_ROOT'] . '/timetables/timetables.view.php';