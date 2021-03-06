<?php
session_start();
require 'head.php';
$subject = new SubjectMap;
$get = $subject->arrSubject();
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Список предметов</h1>
          </div><!-- /.col -->
        
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Домой</a></li>
            <li class="mr-2 breadcrumb-item"><a href="subjectList.php">Предметы</a></li>
          
            </ol>

            
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="row md-2">
        <div class="col-md-6">
        <?php if($_SESSION['roleName'] == 'Администратор'): ?>
        
          
            <a href="subjectAdd.php" class='btn btn-success'>Добавить нового</a>
           
            <?php endif; ?></div></div>

<div class="row md-2 mt-5">
<div class="col-md-12">
<?php require "sessionFlash.php" ?>
<table class="table">
  <thead>
    <tr>
    
      <th scope="col">Название</th>
      <th scope="col">Отделение</th>
      <th scope="col">Часы</th>
      <th scope="col">Заблокирован</th>
  
    </tr>
  </thead>
  <tbody>
  <?php foreach($get as $item): ?>

    <tr>
    <td><a href="subject-profile.php?id=<?=$item[0] ?>"> <?=$item['subjectName'] ?> </a></td>
    <td> <?=$item['otdelName'] ?> </td>
    <td> <?=$item['hours'] ?> </td>
    <td><?php if($item['active'] == 1): ?>

   <p> Нет </p>

  <?php endif; ?>
  <?php if($item['active'] == 0): ?>

   <p> Да </p>

  <?php endif; ?></td>
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