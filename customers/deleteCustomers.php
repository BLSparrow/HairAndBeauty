<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

$error = "";


if (isset($_POST["delete"])) {

    $id = $_POST['id'];
    $customer = $dataCustomer->getOneCustomer($id);
    $error = "";

    if (empty($error)) {

        $_SESSION["msg"] = "Файл успешно удалён";
        $_SESSION['alert'] = 'alert-success';
        $dataCustomer->deleteCustomer($id);
        header("Location: /customers");

    } else {

        $_SESSION["msg"] = $error;
        $_SESSION['alert'] = 'alert-danger';
        header("Location: /customers/customers.view.php");
    }

}