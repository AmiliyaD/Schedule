<?php
$a = new LessonPlanMap;
$b = $a->arrPlan($_GET['id']);
var_dump($b);
?>

<form action="adminClasses/save-schedule.php" method="POST">
    <div class="form-group">
        <label>Группа и предмет</label>
        <select class="form-control" name="lesson_plan_id">
            <?= Helper::printSelectOptionsForSchedule(0, (new LessonPlanMap())->arrPlan($_GET['id']), 'gruppaName', 'subjectName');?>
        </select>
    </div>
    <div class="form-group">
        <label>Пара</label>
        <select class="form-control" name="lesson_num_id">
            <?= Helper::printSelectOptions(0,(new LessonPlanMap())->arrLessonNums(), 'LessonNumName');?>
        </select>
    </div>
    <div class="form-group">
        <label>Аудитория</label>
        <select class="form-control" name="classroom_id">
            <?= Helper::printSelectOptions(0, (new ClassroomMap())->arrClassroom(), 'classroomName');?>
        </select>
    </div>
    <input type="hidden" name="day_id" value="<?=$idDay;?>" />
    <input type="hidden" name="user_id" value="<?=$findProfile['id'];?>" />
    <div class="form-group">
        <button type="submit" name="saveSchedule" class="btn btn-primary">Сохранить</button>
    </div>
</form>
</div>