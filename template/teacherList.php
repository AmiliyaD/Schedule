<?php
session_start();
require "adminClasses/secure.php";
require "../BaseMapClass/TeacherMap.php";
require "../BaseMapClass/Helper.php";
$size = 1;
if (isset($_GET['page'])) {
  $page = $_GET['page'];
}
else {
  $page = 1;
}

$teacher = new TeacherMap;
$get = $teacher->allTeachers($page * $size - $size, $size);

$count = $teacher->count();

require 'head.php' ?>

<?php if($_SESSION['roleName'] == 'Администратор'): ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper ">
  <!-- Content Header (Page header) -->
  <div class="content-header ">
    <div class="container-fluid bg-white pt-2 pl-2 pr-2 pb-2">
      <div class="row mb-2 ">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Список преподоваталей</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item "><a href="index.php">Домой</a></li>
            <li class="breadcrumb-item" ><a href="list-teacher.php">Преподаватели</a></li>

            <!--  -->
          </ol>


        </div><!-- /.col -->
      </div><!-- /.row -->
      <div class="row md-2">
        <div class="col-md-6">


      

          <a href="teacherAdd.php" class='btn btn-success'>Добавить нового</a>


          </div>
      </div>
<div class="row md-2">
<div class="col-md-6">
  
<?php require "sessionFlash.php" ?>

</div>

</div>
      <div class="row md-2 mt-5">
      <div class="col-md-12 border">
      <table class="table">
  <thead>
    <tr>
    
      <th scope="col">Ф.И.О</th>
      <th scope="col">Пол</th>
      <th scope="col">Дата рождения</th>
      <th scope="col">Отделение</th>
      <th scope="col">Роль</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($get as $item): ?>
    <tr>
    <td><a href="profile-teacher.php?id=<?=$item[0] ?>"><?=$item['lastname'] ?> <?=$item['firstname'] ?></a> </td>
    <td><?=$item['genderName'] ?></td>
    <td><?=$item['birthday']?></td>
    <td><?=$item['otdelName']?></td>
    <td><?=$item['name'] ?></td>
  </tr>
  <?php endforeach; ?>
   
    
  </tbody>
</table>
<div class="box-body ">
<?php Helper::paginator($count, $page, $size); ?>
</div>

      </div>
      </div>
    </div><!-- /.container-fluid -->
  </div>
  <?php endif; ?>
</div>

<?php require "footer.php" ?>