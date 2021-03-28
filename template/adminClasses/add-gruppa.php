<?php
require "secure.php";
require_once "../BaseMapClass/Helper.php";
require_once "../BaseMapClass/SpecialMap.php";
?>

<div class="form-group">
<label>Название</label>
<input type="text" class="form-control"
name="GruppaName" required="required" value="<?=$gruppa->name;?>">
</div>

<div class="form-group">
<label>Дата образования</label>
<input type="date" class="form-control"
name="date_begin" required="required" value="<?=$gruppa->date_begin;?>">
</div>

<div class="form-group">
<label>Дата окончания</label>
<input type="date" class="form-control"
name="date_end" required="required" value="<?=$gruppa->date_end;?>">
</div>

<div class="form-group">
<label>Специальность</label>
<select class="form-control" name="special_id">
<?= Helper::printSelectOptions($gruppa->special_id, (new SpecialMap())->arrSpecials(), 'specialName');?>
</select>
</div>


<div class="form-group">
<button type="submit" name="saveGruppa"
class="btn btn-primary">Сохранить</button>
</div>
<input type="hidden" name="gruppa_id"
value="<?=$id;?>"/>