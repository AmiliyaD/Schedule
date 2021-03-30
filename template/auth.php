<?php
require "../BaseMapClass/UserMap.php";
require "../BaseMapClass/Helper.php";


session_start();
$message = "Заполните все поля!";
if($_SESSION['role'] != NULL) {
    header("Location: index.php");
    exit;
}
if (empty($_POST['login']) ||  empty($_POST['password'])) {
   $_SESSION['message'] = $message;
    header("Location: login.php");
    exit;
}

else if ($_POST['login'] && $_POST['password']) {
    $login = Helper::clearString($_POST['login']);
    $password = Helper::clearString($_POST['password']);
  
    
    $newUs = new UserMap;
    $return = $newUs->auth($login, $password);

    // // если пароль и логин верные
    if ($return ==  "неверный пароль" || $return=="неверно все") {
        $message = "Неверный логин или пароль";
        $_SESSION['message'] = $message;
        header("Location: login.php");
        exit();
    }
    if ($return != "ничего нет") {
        $_SESSION['id'] = $return->id;
        $_SESSION['user_id'] = $return->user_id;
        $_SESSION['role'] = $return->sys_name;
        $_SESSION['roleName'] = $return->name;
        $_SESSION['UserLastName'] = $return->lastname;
        $_SESSION['UserFirstName'] = $return->firstname;

        header("Location: index.php");
        exit;
     }
   
}
require_once 'login.php';

