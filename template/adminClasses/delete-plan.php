<?php 
require_once "incSave.php";
session_start();
if(isset($_GET['id'])) {
    $delete = new LessonPlanMap;
    $deletePlan = $delete->delete($_GET['id']);
    if ($deletePlan) {
        $user_id = $_GET['user_id'];
        $_SESSION['message'] = 'План успешно удален';
        header("Location: ../planList.php?id=$user_id");
    }
}