<?php
require "secure.php";
require_once "../BaseMapClass/Helper.php";
require_once "../BaseMapClass/OtdelMap.php";
?>
<div class="form-group">
    <label for="">Название аудиторий</label>
<input type="text" class="form-control" name="class_name">

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
<button type="submit" name="saveClassroom"
class="btn btn-primary">Сохранить</button>
</div>
<input type="hidden" name="gruppa_id"
value="<?=$id;?>"/>