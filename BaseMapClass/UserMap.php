<?php
require_once 'BaseMap.php';

class UserMap extends BaseMap {

// фукнция 1. АВТОРИЗАЦИЯ ПОЛЬЗОВАТЕЛЯ
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


// функция 2. FIND BY ID
public function findById($id)
{
    $id = null;
    if ($id) {
        $res = $this->db->query("SELECT * FROM user WHERE id = $id");
        $user = $res->fetchObject("User");
        if ($user) {
            return $user;
        }
    }


}
// функция 3. все гендеры
public function arrGenders()
{
    $res = $this->db->query("SELECT * FROM gender")->fetchAll(PDO::FETCH_ASSOC);
    return $res;
}
// функция 4. все роли
public function arrRoles()
{
    $res = $this->db->query("SELECT * FROM role")->fetchAll(PDO::FETCH_ASSOC);
    return $res;
}
// сохранить
public function save(User $user)
{
    if (!$this->existsLogin($user->login)) {
        if ($user->user_id == 0) {
            return $this->insert($user);
        }
        else {
            return $this->update($user);
        }
     
    }

    
}

private function insert(User $user) {
    $lastname = $this->db->quote($user->lastname);
$firstname = $this->db->quote($user->firstname);
$patronymic = $this->db->quote($user->patronymic);
$login = $this->db->quote($user->login);
$pass = $this->db->quote($user->pass);
$birthday = $this->db->quote($user->birthday);

if ($this->db->exec("INSERT INTO user(lastname,
firstname, patronymic, login, pass, gender_id, birthday,
role_id, active)"
. " VALUES($lastname, $firstname, $patronymic, $login,
$pass, $user->gender_id, $birthday, $user->role_id,
$user->active)") == 1) {

    // ID
$user->user_id = $this->db->lastInsertId();
return true;
}
return false;
}

private function update(User $user) {
    $lastname = $this->db->quote($user->lastname);
$firstname = $this->db->quote($user->firstname);
$patronymic = $this->db->quote($user->patronymic);
$login = $this->db->quote($user->login);
$pass = $this->db->quote($user->pass);
$birthday = $this->db->quote($user->birthday);
if ( $this->db->exec("UPDATE user SET lastname =
$lastname, firstname = $firstname, patronymic =
$patronymic,"
. " login = $login, pass = $pass, gender_id = $user-
>gender_id, birthday = $birthday, role_id = $user-
>role_id, active = $user->active "
. "WHERE user_id = ".$user->user_id) == 1) {
return true;
}
return false;
}


private function existsLogin($login) {
    $login = $this->db->quote($login);
$res = $this->db->query("SELECT user_id FROM user WHERE login = $login");
if ($res->fetchColumn() > 0) {
return true;
}
return false;
}
}