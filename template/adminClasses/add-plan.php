<?php
require_once 'secure.php';
require_once "../BaseMapClass/Helper.php";
$id = 0;
if (isset($_GET['id'])) {
$id = Helper::clearInt($_GET['id']);
}
if ((new TeacherMap())->findById($id)) {
$teacher = (new UserMap())->findById($id);
} 
$header = 'Добавить пункт в план : '.$teacher->fio;

?>

<div class="box-body">
  
    <form action="save-plan.php" method="POST">
        <div class="form-group">
            <label>Группа</label>
            <select class="form-control" name="gruppa_id">
                <?= Helper::printSelectOptions(0, (new
GruppaMap())->arrGruppas(), 'gruppaName');?>
            </select>
        </div>
        <div class="form-group">
            <label>Предмет</label>
            <select class="form-control" name="subject_id">
                <?= Helper::printSelectOptions(0, (new
SubjectMap())->arrSubject(), 'subjectName');?>
            </select>
        </div>
        <input type="hidden" name="user_id" value="<?=$id;?>" />
        <div class="form-group">
            <button type="submit" name="savePlan" class="btn btn-primary">Сохранить</button>
        </div>
    </form>
</div>