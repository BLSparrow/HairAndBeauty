<?php
include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

$masters = $dataMaster->getAllMasters();
$customers = $dataCustomer->getAllCustomers();


if (isset($_GET['searchButton'])) {
    $id = $_GET['filterMaster_id'];
    $customers = $dataCustomer->getCustomersForMasters($id);
    if(!$customers) {
        $customer = $dataCustomer->getAllCustomers();
        $_SESSION['msg'] = 'Таких клиентов нет!';
        $_SESSION['alert'] = 'alert-danger';
        $_SESSION['danger'] = 'dangerOn';
    }else{
        $_SESSION['msg'] = 'Вот ваши клиенты!!!';
        $_SESSION['alert'] = 'alert-success';
        $_SESSION['danger'] = 'dangerOff';
    }
}

include $_SERVER['DOCUMENT_ROOT'] . '/customers/customers.view.php';