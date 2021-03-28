<?php
require_once "../BaseMapClass/UserMap.php";
require_once "../BaseMapClass/Helper.php";
$userMap = new UserMap();
$user = $userMap->findById($id); 
?>

<!-- ОСНОВНЫЕ ПАРАМЕТРЫ ДЛЯ ДОБАВЛЕНИЯ НОВЫХ ПОЛЬЗОВАТЕЛЕЙ -->

<!-- Фамилия -->
<div class="form-group">
<label for="">Фамилия</label>
<input type="text" class="form-control" name="lastname" value="<?=$user->lastname ?>">
</div>

<!-- Имя -->
<div class="form-group">
<label for="">Имя</label>
<input type="text" class="form-control" name="firstname" value="<?=$user->firstname ?>">
</div>

<!-- Отчество -->
<div class="form-group">
<label for="">Отчество</label>
<input type="text" class="form-control" name="patronymic" value="<?=$user->patronymic ?>">
</div>

<!-- Пол -->
<div class="form-group">
<label for="">Пол</label>
<select class="form-control" name="gender_id">
<?= Helper::printSelectOptions($user->gender_id, $userMap->arrGenders(), 'genderName') ?>
</select>
</div>

<!-- Дата рождения -->
<div class="form-group">
<label for="">Дата рождения</label>
<input type="date" class="form-control"
name="birthday" value="<?=$user->birthday;?>">
</div>

<!-- Логин -->
<div class="form-group">
<label for="">Логин</label>
<input type="text" class="form-control" name="login"
required="required" value="<?=$user->login;?>">
</div>

<!-- Пароль -->
<div class="form-group">
<label for="">Пароль</label>
<input type="password" class="form-control"
name="password" required="required">
</div>

<input type="hidden" name="user_id" value="<?=$id;?>"/>