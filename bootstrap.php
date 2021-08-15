<?php
session_start();

use App\BD\Connect;
use App\Models\Auth;
use App\Models\Validator;
use APP\Models\Haircuts;
use APP\Models\Masters;
use APP\Models\Services;
use APP\Models\Posts;
use APP\Models\Comments;
use APP\Models\Recordings;
use APP\Models\Customers;
use APP\Models\Timetables;

include $_SERVER['DOCUMENT_ROOT'] . '/BD/config.php';
include $_SERVER['DOCUMENT_ROOT'] . '/BD/Connect.php';
include $_SERVER['DOCUMENT_ROOT'] . '/BD/functions.php';
include $_SERVER['DOCUMENT_ROOT'] . '/APP/Models/Auth.php';
include $_SERVER['DOCUMENT_ROOT'] . '/APP/Models/Validator.php';
include $_SERVER['DOCUMENT_ROOT'] . '/APP/Models/ShowData.php';
include $_SERVER['DOCUMENT_ROOT'] . '/APP/Models/Haircuts.php';
include $_SERVER['DOCUMENT_ROOT'] . '/APP/Models/Masters.php';
include $_SERVER['DOCUMENT_ROOT'] . '/APP/Models/Services.php';
include $_SERVER['DOCUMENT_ROOT'] . '/APP/Models/Posts.php';
include $_SERVER['DOCUMENT_ROOT'] . '/APP/Models/Comments.php';
include $_SERVER['DOCUMENT_ROOT'] . '/APP/Models/Recordings.php';
include $_SERVER['DOCUMENT_ROOT'] . '/APP/Models/Customers.php';
include $_SERVER['DOCUMENT_ROOT'] . '/APP/Models/Timetables.php';


$user = isset($_SESSION['auth']) && $_SESSION['auth'] ? json_decode($_SESSION['user']) : false;
$dataAuth = new Auth(Connect::make(CONN));
$dataHair = new Haircuts(Connect::make(CONN));
$dataMaster = new Masters(Connect::make(CONN));
$dataService = new Services(Connect::make(CONN));
$dataPost = new Posts(Connect::make(CONN));
$dataCom = new Comments(Connect::make(CONN));
$dataRecord = new Recordings(Connect::make(CONN));
$dataCustomer = new Customers(Connect::make(CONN));
$dataTimetables = new Timetables(Connect::make(CONN));
$dataValid = new Validator;

$haircuts = $dataHair->getAllHaircuts();
$dates = $dataMaster->getAllMasters();
$services = $dataService->getAllServices();
$posts = $dataPost->getAllPosts();
$masters=$dataMaster->getAllMasters();
$masters1=$dataMaster->getAllMasters();
$comments = $dataCom->getAllComments();
$commentsV = $dataCom->getAllCommentsV();
$recordings = $dataRecord->getAllRecordings();
$customers = $dataCustomer->getAllCustomers();
$times = $dataTimetables->getAllTimes();
$timesTable = $dataTimetables->getAllTimetables();