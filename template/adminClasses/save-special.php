<?php 
session_start();
require "secure.php";
require_once "../../BaseMapClass/GruppaMap.php";
require_once "../../BaseMapClass/OtdelMap.php";
require_once "../../BaseMapClass/Helper.php";
require_once "../../classes/Gruppa.php";
require_once "../../classes/Subject.php";
require_once "../../classes/Classroom.php";
require_once "../../BaseMapClass/ClassroomMap.php";
require_once "../../BaseMapClass/SubjectMap.php";
require_once "../../BaseMapClass/SpecialMap.php";
require_once "../../classes/Special.php";


// Добавить аудиторию
if(isset($_POST['saveClassroom'])) {
    $classroom = new Classroom;
    $classroom->className = $_POST['class_name'];
    $classroom->active = $_POST['active'];
    $insertClass = new ClassroomMap;
    $insClass = $insertClass->insert($classroom);
    if ($insClass) {
        $_SESSION['message'] = "Новая аудитория добавлена";
        header("Location: ../classroomList.php");
    }
    var_dump($insClass);
}

// добавить предмет
if(isset($_POST['saveSubject'])) {
    $subject = new Subject;
    $subject->subjectName = $_POST['subject_name'];
    $subject->otdel_id = $_POST['otdel_id'];
    $subject->hours = $_POST['hours'];
    $subject->active = $_POST['active'];

    $insertSub = new SubjectMap;
    $insert = $insertSub->insert($subject);
   if ($insert) {
 
        $_SESSION['message'] = "Новый предмет добавлен";
        header("Location: ../subjectList.php");
    
       
   }
}
// Добавить специальности
if (isset($_POST['saveSpecial'])) {
    $special = new Special;
    $special->otdelName = $_POST['otdel_name'];
    $special->otdel_id = $_POST['special_id'];
    $special->active = $_POST['active'];
    $in = new SpecialMap;
    $inser = $in->insert($special);
   if ($inser) {
    $_SESSION['message'] = "Новая специальность добавлена";
    header("Location: ../specialList.php");

   }
    }