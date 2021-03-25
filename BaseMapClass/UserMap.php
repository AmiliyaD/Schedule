<?php
require '../basics/BaseMap.php';

class UserMap extends BaseMap {

// АВТОРИЗАЦИЯ ПОЛЬЗОВАТЕЛЯ
public function auth($login, $password)
{
    $login = $this->db->quote($login);
    // выводим пользователя по логину
    $res = $this->db->query("SELECT * FROM user INNER JOIN role ON user.role_id = role.id WHERE user.login = $login AND user.active = 1");
    $user = $res->fetch(PDO::FETCH_OBJ);
    // если пользователь нашелся
    if($user) {
        if ($password == $user->pass) {
            return $user;
        }
        else {
            return "неверный пароль";
        }
    }
    else {
        return "неверно все";
    }
}  

}