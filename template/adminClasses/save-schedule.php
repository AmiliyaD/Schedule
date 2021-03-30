<?php
require_once 'secure.php';
require_once "incSave.php";



if (isset($_POST['lesson_plan_id'])) {
$schedule = new Schedule();
$schedule->lesson_plan_id = Helper::clearInt($_POST['lesson_plan_id']);
$schedule->day_id = Helper::clearInt($_POST['day_id']);
$schedule->lesson_num_id = Helper::clearInt($_POST['lesson_num_id']);
$schedule->classroom_id = Helper::clearInt($_POST['classroom_id']);
$userId = Helper::clearInt($_POST['user_id']);


$scheduleMap = new ScheduleMap();
if ($schedule->validate()) {
if ($scheduleMap->insert($schedule)) {

header("Location: ../list-schedule.php?idUser=$userId");
} 

else {
print('Не удалось сохранит расписание.');
header('Location: add-schedule.php?idUser='.$userId.'&idDay='.$schedule->day_id);
}
} else {
print('Такое расписание для преподавателя или группы уже существует.');
var_dump($scheduleMap);
header('Location: add-
schedule.php?idUser='.$userId.'&idDay='.$schedule->day_id);
}
} else {
header('Location: 404.php');
}