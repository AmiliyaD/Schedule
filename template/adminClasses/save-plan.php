<?php
require_once 'secure.php';
require_once "incSave.php";


$plan = new LessonPlan();

$plan->user_id = Helper::clearInt($_POST['user_id']);

$plan->gruppa_id =Helper::clearInt($_POST['gruppa_id']);

$plan->subject_id =Helper::clearInt($_POST['subject_id']);

$planMap = new LessonPlanMap();

if ($planMap->insert($plan)) {

header('Location: ../planList.php?id='.$plan->user_id);
} 

else {
     header('Location: 404.php');
}



