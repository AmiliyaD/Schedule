<?php
session_start();


require 'head.php';

$get = new SpecialMap;
$findProfile = $get->findSpeicalById($_GET['id']);

?>

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid bg-white pt-2 pl-2 pr-2 pb-2">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Просмотр специальности</h1>
          </div><!-- /.col -->
        
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Домой</a></li>
              <li class="breadcrumb-item "><a href="otdelList.php">Специальности</a></li>
              <li class="breadcrumb-item "><a href="otdel-profile.php">Просмотр специальности</a></li>
            </ol>

            
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="row md-2">
        <div class="col-md-6">
     
        
        <?php if($_SESSION['roleName'] == 'Администратор'): ?>
      <form action="change-special.php?id=<?=$_GET['id'] ?>" method="post">
      <button class="btn btn-success">Изменить</button>
      </form>
           
            <?php endif; ?></div>
            
            </div>

            <div class="row prepod-info mt-5">
            <div class="col-md-6">
            <ul class="nav flex-column">
  <li class="nav-item">
   <b> <p  class="nav-link">Название</p></b>
  </li>
  <li class="nav-item">
   <b> <p  class="nav-link">Отделение</p></b>
  </li>
  <li class="nav-item">
   <b> <p  class="nav-link">Заблокирован</p></b>
  </li>


</ul>
            </div>
            <div class="col-md-6">
            
            <ul class="nav flex-column">
  <li class="nav-item">
<p  class="nav-link"><?=$findProfile['specialName'] ?> </p>
  </li>
  <li class="nav-item">
<p  class="nav-link"><?=$findProfile['otdelName'] ?> </p>
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