<?php 
require_once "incSave.php";
session_start();
if(isset($_GET['id'])) {
    $delete = new LessonPlanMap;
    $deleteSchedule = $delete->deleteIfLessonPlanId($_GET['id']);
    $deletePlan = $delete->delete($_GET['id']);
    if ($deletePlan && $deleteSchedule) {
        $user_id = $_GET['user_id'];
        $_SESSION['message'] = 'План успешно удален';
        header("Location: ../planList.php?id=$user_id");
    }
}