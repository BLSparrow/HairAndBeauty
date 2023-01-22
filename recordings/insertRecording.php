<?php
use APP\Models\Validator;

session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
include $_SERVER['DOCUMENT_ROOT'] . '/phpmailer/PHPMailerAutoload.php';

if (isset($_POST['submit'])) {

    $dataC['name'] = Validator::preProcessing($_POST['name']);
    $dataC['telephone'] = Validator::preProcessing($_POST['telephone']);

    $dataR['master_id'] = Validator::preProcessing($_POST['master_id']);
    var_dump($_POST['master_id']);
    $dataR['email'] = Validator::preProcessing($_POST['email']);
    $email = $_POST['email'];
    $dataR['id_hair'] = Validator::preProcessing($_POST['id_hair']);
    $dataR['id_customer'] = Validator::preProcessing($_POST['id_customer']);
    $dataR['time_tables_id'] = Validator::preProcessing($_POST['time_tables_id']);

    if (empty($error)) {
        $_SESSION['msg'] = 'Файл успешно создан';
        $_SESSION['alert'] = 'alert-success';
        $id_customer = $dataCustomer->addCustomer($dataC);
        $dataRecord->addRecording($id_customer, $dataR);


//        $records = $dataRecord->getEmail(24);
//        $mail = new PHPMailer;
//        $mail->CharSet = 'utf-8';
//
//        $mail->isSMTP();                                      // Set mailer to use SMTP
//        $mail->Host = 'smtp.mail.ru';
//        $mail->SMTPAuth = true;                               // Enable SMTP authentication
//        $mail->Username = 'hair.beauty.salon@mail.ru'; // Ваш логин от почты с которой будут отправляться письма
//        $mail->Password = 'iRARyRtpo81%'; // Ваш пароль от почты с которой будут отправляться письма
//        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
//        $mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров
//
//        $mail->setFrom('hair.beauty.salon@mail.ru'); // от кого будет уходить письмо?
//        $mail->addAddress($email);     // Кому будет уходить письмо
//        $mail->isHTML(true);
//
//        $mail->Subject = 'Здравствуйте '.$records->nameMasters.', у вас новая запись!';
//
//        $mail->Body    = 'К вам записался(ась) ' . $_POST['name'] . ' на ' . date("d.m.Y", strtotime($records->date)) . ' в ' . substr($records->time, 0, -3) . '.<br>Услуга: ' . $records->title . '<br>Цена: ' . $records->price . 'руб.<br>Его(её) номер телефона: ' . $records->telephone . '.';
//        $mail->AltBody = '';
//
//        if($mail->send()){
//            echo 'Письмо успешно отправлено!';
//        }else{
//            echo 'Что-то пошло не так!';
//        }


        header('Location:/index.php?id=' . $id_customer);
    } else {
        $_SESSION['msg'] = $error;
        $_SESSION['alert'] = 'alert-danger';
        header('Location: /recordings/new.php');
    }
}