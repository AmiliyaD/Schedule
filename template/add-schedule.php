<?php
session_start();

require_once "../BaseMapClass/Helper.php";
require_once "../BaseMapClass/SpecialMap.php";
require 'head.php';
$get = new OtdelMap;
$findProfile = $get->findOtdelById($_GET['id']);

$getTeacher = new TeacherMap;
$findProfile = $getTeacher->findProfileByUserId($_GET['id']);



?>  
 <?php if($_SESSION['roleName'] == 'Администратор'): ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Добавить расписание. Преподаватель: <?=$findProfile['firstname'] ?>     <?=$findProfile['lastname'] ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item "><a href="index.php">Домой</a></li>
            <li class="breadcrumb-item "><a href="gruppaList.php">Группы</a></li>
            <li class="breadcrumb-item "><a href="gruppaAdd.php">Добавить новую</a></li>
            </ol>

            
          </div>
        </div><!-- /.row -->
        <div class="row md-2">
        <div class="col-md-6">
     
        
<?php require "adminClasses/add-schedule.php" ?>
           
            <?php endif; ?>
            
            </div>
            
            </div>
      </div><!-- /.container-fluid -->
    </div>
    
  </div>

<?php require "footer.php" ?>