<?php
namespace APP\Models;


class Validator
{
    //Предварительная обработка введённого текста
    public static function preProcessing($data)
    {
        return htmlspecialchars(trim($data));
    }

    //Проверка введённого значения на длину
    public static function validLength($name, $data, $field, $minLength = 3, $maxLength = 50)
    {
        if (mb_strlen($data) < $minLength) {
            $_SESSION['errors'][$field] = "В поле '$name' должно быть указано не менее $minLength симв.\n";
            return false;
        }

        if (mb_strlen($data) > $maxLength) {
            $_SESSION['errors'][$field] = "В поле '$name' должно быть указано не более $maxLength симв.\n";
            return false;
        }
        unset($_SESSION['errors'][$field]);
        return true;
    }

    //Проверка на электронный адрес
    public static function validEmail($name, $data, $field)
    {
        if (!filter_var($data, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['errors'][$field] = "В поле '$name' должен быть указан электронный адрес";
            return false;
        }
        unset($_SESSION['errors'][$field]);
        return true;
    }

}