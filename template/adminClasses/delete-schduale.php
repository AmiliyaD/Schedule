<?php 
require_once "incSave.php";
session_start();
if(isset($_GET['id'])) {
    $delete = new ScheduleMap;
    $deletePlan = $delete->deleteScheduale($_GET['id']);
    if ($deletePlan) {
        $user_id = $_GET['user_id'];
        $_SESSION['message'] = 'Пункт из расписания успешно удален';
        header("Location: ../index.php");
    }
}