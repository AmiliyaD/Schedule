<?php
require_once "secure.php";
require_once "_formUser.php";
require_once "../BaseMapClass/OtdelMap.php";
require_once "../BaseMapClass/Helper.php";
require_once "../BaseMapClass/GruppaMap.php";
$gruppaClass = new GruppaMap;
$gruppas = $gruppaClass->arrGruppas();

$id = 0;
if (isset($_GET['id'])) {
    $id = Helper::clearInt($_GET['id']);
}
$otdelClass  = new OtdelMap;
$otdel = $otdelClass->otdel();
?>
<!-- ДОП.ПАРАМЕТРЫ -->

<div class="form-group">
    <label for="">Роль</label>
    <select class="form-control" name="role_id">
        <?=Helper::printSelectOptions($user->role_id, $userMap->arrRoles(), 'name') ?>
    </select>
</div>

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

<div class="form-group">
    <label for="">Отделение</label>
    <select class="form-control" name="otdel_id">
        <?=Helper::printSelectOptions($teacher->otdel_id, (new OtdelMap())->otdel(), 'otdelName') ?>

    </select>

</div>

<!-- ПАРАМЕТРЫ ДЛЯ СТУДЕНТА -->

<!-- номер зачетки -->
<div class="form-group">
    <label for="">Номер зачетки</label>
    <input type="text" name="num_zach" class='form-control'>

</div>

<!-- номер группы -->
<div class="form-group">
    <label for="">Группа</label>
    <select class="form-control" name="gruppa_id">
        <?=Helper::printSelectOptions($user->role_id, $gruppas, 'gruppaName') ?>
    </select>

</div>
<!-- кнопка -->
<div class="form-group">
    <button type="submit" name="saveStudent" class="btn btn-primary">Сохранить</button>
</div>