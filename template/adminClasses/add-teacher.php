<?php 
require_once "secure.php";
require_once "_formUser.php";
require_once "../BaseMapClass/OtdelMap.php";
require_once "../BaseMapClass/Helper.php";
$id = 0;
if (isset($_GET['id'])) {
    $id = Helper::clearInt($_GET['id']);
}
$otdelClass  = new OtdelMap;
$otdel = $otdelClass->otdel();

?>

<!-- ПАРАМЕТРЫ ДЛЯ ПРЕПОДАВАТЕЛЯ -->

<!-- роль -->
<div class="form-group">
    <label for="">Роль</label>
    <select class="form-control" name="role_id">
        <?=Helper::printSelectOptions($user->role_id, $userMap->arrRoles(), 'name') ?>
    </select>
</div>

<!-- блокировка -->
<div class="form-group">
    <label>Заблокировать</label>
    <div class="radio">
        <label>
            <input type="radio" name="active" value="1" <?=($user->active)?'checked':'';?>> Нет
        </label> &nbsp;
        <label>
            <input type="radio" name="active" value="0" <?=(!$user->active)?'checked':'';?>> Да
        </label>
    </div>
</div>

<!-- отделение -->
<div class="form-group">
    <label for="">Отделение</label>
    <select class="form-control" name="otdel_id">
        <?=Helper::printSelectOptions($teacher->otdel_id, (new OtdelMap())->otdel(), 'otdelName') ?>

    </select>
</div>


  <!-- кнопка -->
<div class="form-group">
        <button type="submit" name="saveTeacher" class="btn btn-primary">Сохранить</button>
    </div>