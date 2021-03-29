<?php
session_start();
require 'head.php';
$gruppa = new LessonPlanMap;
$get = $gruppa->arrPlans();

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Расписание преподавателей</h1>
          </div><!-- /.col -->
        
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Домой</a></li>

            </ol>

            
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="row md-2">
        <div class="col-md-6">
        <?php if($_SESSION['roleName'] == 'Администратор'): ?>
        
          

           
            <?php endif; ?></div></div>

<div class="row md-2 mt-5">
<div class="col-md-12">
<?php require "sessionFlash.php" ?>
<table class="table">
  <thead>
    <tr>
    
      <th scope="col">Ф.И.О. преподавателя</th>
      <th scope="col">Отделение</th>
      <th scope="col">Количество пунктов в плане</th>
      <th scope="col">Общее количество часов</th>
      <th scope="col"></th>
  
    </tr>
  </thead>
  <tbody>
  <?php foreach($get as $item): ?>

    <tr>
    <td><a href="add-schedule.php?id=<?=$item->user_id ?>"> <?=$item->fio ?> </a></td>
    <td><a> <?=$item->otdel ?> </a></td>
    <td><a> <?=$item->sum_hours ?> </a></td>
    <td><a> <?=$item->count_plan ?> </a></td>
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