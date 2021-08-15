<?php
include $_SERVER['DOCUMENT_ROOT'] . '/BD/config.php';
include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

$day = date("Y-m-d H:i:s");
$query = $dataPost->deleteDateIp($day);

/** Получаем наш ID статьи из запроса */
$id = intval($_POST['id']);
$count = 0;
$message = '';
$error = true;
$ip = $_SERVER['REMOTE_ADDR'];


$r = $dataPost->inspectionIP($id,$ip); // проверяем юзера на IP
$date_resp = date("Y-m-d",time()+ 1*24*60*60); // запоминаем завтрашнююю дату


$data['post_id'] = $id;
$data['ip'] = $ip;
$data['date_resp'] =$date_resp;




/** Если нам передали ID то обновляем */
if ($r==0) {
    /** Обновляем количество лайков в статье */
    $query = $dataPost->updateLike($id);
    $query = $dataPost->addUserIP($data);

    /** Выбираем количество лайков в статье */
    $query = $dataPost->getLikeForPost($id);

    $count = isset($query['count_like']) ? $query['count_like'] : 0;


    $error = false;
} else {
    /** Если ID пуст - возвращаем ошибку */

    $error = true;
    $message = 'Вы уже оценили этот пост!';
}

/** Возвращаем ответ скрипту */

// Формируем масив данных для отправки
$out = array(
    'error' => $error,
    'message' => $message,
    'count' => $count,
);

// Устанавливаем заголовок ответа в формате json
header('Content-Type: text/json; charset=utf-8');

// Кодируем данные в формат json и отправляем
echo json_encode($out);