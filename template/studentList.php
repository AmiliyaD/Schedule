<?php
session_start();


require 'head.php';

$student = new StudentMap;
$get = $student->allStudents();


?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Список студентов</h1>
          </div><!-- /.col -->
        
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Домой</a></li>
          
            </ol>

            
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="row md-2">
        <div class="col-md-6">
        <?php if($_SESSION['roleName'] == 'Администратор'): ?>
        
          
            <a href="studentAdd.php" class='btn btn-success'>Добавить нового</a>
           
            <?php endif; ?></div></div>

<div class="row md-2 mt-5">
<div class="col-md-12">

<table class="table">
  <thead>
    <tr>
    
      <th scope="col">Ф.И.О</th>
      <th scope="col">Пол</th>
      <th scope="col">Дата рождения</th>
      <th scope="col">Специальность</th>
      <th scope="col">Группа</th>
      <th scope="col">Роль</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($get as $item): ?>

    <tr>
    <td><a href="profile-student.php?id=<?=$item['student_id'] ?>"> <?=$item['firstname'] ?>  <?=$item['lastname'] ?></a></td>
    <td><?=$item['genderName'] ?></td>
    <td><?=$item['birthday']?></td>
    <td><?=$item['specialName'] ?></td>
    <td><?=$item['gruppaName'] ?></td>
    <td><?=$item['name'] ?></td>
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