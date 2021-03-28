<?php
session_start();
require "secure.php";


require_once "../../BaseMapClass/Helper.php";
require_once "../../classes/User.php";
require_once "../../classes/Teacher.php";
require_once "../../classes/Student.php";
require_once "../../BaseMapClass/TeacherMap.php";
require_once "../../BaseMapClass/StudentMap.php";
require_once "../../BaseMapClass/UserMap.php";

// СОХРАНЯЕМ ПОЛЬЗОВАТЕЛЯ
if (isset($_POST['user_id'])) {

    $user = new User;
    $user->lastname = Helper::clearString($_POST['lastname']);
    $user->firstname = Helper::clearString($_POST['firstname']);
    $user->user_id= Helper::clearInt($_POST['user_id']);
    $user->firstname = Helper::clearString($_POST['firstname']);
    $user->patronymic = Helper::clearString($_POST['patronymic']);
    $user->birthday = Helper::clearString($_POST['birthday']);
    $user->login = Helper::clearString($_POST['login']);
    $user->pass = Helper::clearString($_POST['password']);
    $user->gender_id =
    Helper::clearInt($_POST['gender_id']);
    $user->role_id = Helper::clearInt($_POST['role_id']);
    $user->active = Helper::clearInt($_POST['active']);

    $map = new UserMap;
    $getMap= $map->save($user);

    // ЕСЛИ ЕСТЬ saveStudent
   if (isset($_POST['saveStudent'])) {
       $student = new Student;
       $student->num_zach = Helper::clearString($_POST['num_zach']);
       $student->user_id = $user->user_id;
       $student->gruppa_id = $_POST['gruppa_id'];
       
       if ((new StudentMap())->insert($student)) {
        $_SESSION['message'] = "Студент успешно добавлен";
        header("Location: ../studentList.php");
       }
       else {
           echo "nooo";
       }
   }
    // ЕСЛИ ЕСТЬ saveTeacher
if (isset($_POST['saveTeacher'])) {
    $teacher = new Teacher;
    $teacher->otdel_id = Helper::clearInt($_POST['otdel_id']);
    $teacher->user_id = $user->user_id;
  
    // добавляем нового преподавателя
    if( (new TeacherMap())->insert($teacher) ) {
        $_SESSION['message'] = "Преподаватель успешно добавлен!";
        header("Location: ../teacherList.php");
    }
    else {
        echo "не добавлен";
   
        
    }
}

echo "случилась какая-то фигня";
}