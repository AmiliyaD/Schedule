<?php
session_start();


require 'head.php';

$get = new StudentMap;
$findProfile = $get->findProfileById($_GET['id']);

?>
   <?php if($_SESSION['roleName'] == 'Администратор'): ?>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid bg-white pt-2 pl-2 pr-2 pb-2">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Профиль </h1>
          </div><!-- /.col -->
        
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Домой</a></li>
              <li class="breadcrumb-item "><a href="studentList.php">Студенты</a></li>
              <li class="breadcrumb-item "><a href="profile-teacher.php">Профиль студента</a></li>
            </ol>

            
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="row md-2">
        <div class="col-md-6">
     
        
        
      <form action="">
      <button class="btn btn-success">Изменить</button>
      </form>
           
            <?php endif; ?></div>
            
            </div>

            <div class="row prepod-info">
            <div class="col-md-6">
            <ul class="nav flex-column">
  <li class="nav-item">
   <b> <p  class="nav-link">Ф.И.О</p></b>
  </li>
  <li class="nav-item">
   <b> <p  class="nav-link">Пол</p></b>
  </li>
  <li class="nav-item">
   <b> <p  class="nav-link">Дата рождения</p></b>
  </li>
  <li class="nav-item">
   <b> <p  class="nav-link">Логин</p></b>
  </li>
  <li class="nav-item">
   <b> <p  class="nav-link">Роль</p></b>
  </li>
  <li class="nav-item">
   <b> <p  class="nav-link">Специальность</p></b>
  </li>
  <li class="nav-item">
   <b> <p  class="nav-link">Группа</p></b>
  </li>
  <li class="nav-item">
   <b> <p  class="nav-link">Заблокирован</p></b>
  </li>
</ul>
            </div>
            <div class="col-md-6">
            
            <ul class="nav flex-column">
  <li class="nav-item">
<p  class="nav-link"><?=$findProfile['firstname'] ?> <?=$findProfile['lastname'] ?> <?=$findProfile['patronymic'] ?></p>
  </li>
  <li class="nav-item">
    <p  class="nav-link"><?=$findProfile['genderName'] ?></p>
  </li>
  <li class="nav-item">
   <p  class="nav-link"><?=$findProfile['birthday']?></p>
  </li>
  <li class="nav-item">
   <p  class="nav-link"><?=$findProfile['login'] ?></p>
  </li>
  <li class="nav-item">
   <p  class="nav-link"><?=$findProfile['name']?></p>
  </li>
  <li class="nav-item">
    <p  class="nav-link"><?=$findProfile['specialName'] ?></p>
  </li>
  <li class="nav-item">
    <p  class="nav-link"><?=$findProfile['gruppaName'] ?></p>
  </li>
  <?php if($findProfile['active'] == 1): ?>
  <li class="nav-item">
   <p  class="nav-link"> Нет </p>
  </li>
  <?php endif; ?>
  <?php if($findProfile['active'] == 0): ?>
  <li class="nav-item">
   <p  class="nav-link"> Да </p>
  </li>
  <?php endif; ?>
</ul>
            </div>
            </div>
      </div><!-- /.container-fluid -->
    </div>
    
  </div>

<?php require "footer.php" ?>