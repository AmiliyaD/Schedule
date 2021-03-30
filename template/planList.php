<?php
session_start();
require 'head.php';

$plan = new LessonPlanMap;
$getsel = $plan->arrPlan($_GET['id']);

$get = new TeacherMap;
$findProfile = $get->findProfileByUserId($_GET['id']);

?>
  <?php if($_SESSION['roleName'] == 'Администратор'): ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">План преподавателя: <?=$findProfile['firstname'] ?>  <?=$findProfile['lastname'] ?></h1>
          </div><!-- /.col -->
        
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Домой</a></li>
            <li class="mr-2 breadcrumb-item"><a href="teacherList.php">Преподаватели</a></li>
          
            </ol>

            
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="row md-2">
        <div class="col-md-6">
      
        
          

           
            <?php endif; ?></div></div>

<div class="row md-2 mt-5">
<div class="col-md-12">
<?php require "sessionFlash.php" ?>
<table class="table">
  <thead>
    <tr>
    <th scope="col">#</th>
      <th scope="col">Группа</th>
      <th scope="col">Предмет</th>
  <th scope='col'>Количество часов</th>
  <th scope='col'>Удалить</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($getsel as $item): ?>

    <tr>
    <td><a > <?=$item['id'] ?> </a></td>
    <td><a > <?=$item['gruppaName'] ?> </a></td>
    <td><a > <?=$item['subjectName'] ?> </a></td>
    <td><a > <?=$item['hours'] ?> </a></td>
    <td><a href="adminclasses/delete-plan.php?id=<?=$item[0] ?>&user_id=<?=$item['user_id'] ?>">Удалить </a></td>
    
  </tr>
  
<?php endforeach; ?>
   
    
  </tbody>
</table>
</div>
</div>

      </div><!-- /.container-fluid -->
    </div>
    
  </div>

<?php require "footer.php" ?>