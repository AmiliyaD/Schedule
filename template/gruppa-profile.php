<?php
session_start();


require 'head.php';

$get = new GruppaMap;
$findProfile = $get->findGruppaById($_GET['id']);

?>
   <?php if($_SESSION['roleName'] == 'Администратор'): ?>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid bg-white pt-2 pl-2 pr-2 pb-2">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Просмотр группы</h1>
          </div><!-- /.col -->
        
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Домой</a></li>
              <li class="breadcrumb-item "><a href="gruppaList.php">Группы</a></li>
              
              <li class="breadcrumb-item "><a href="gruppa-profile.php">Просмотр группы</a></li>
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
   <b> <p  class="nav-link">Название</p></b>
  </li>
  <li class="nav-item">
   <b> <p  class="nav-link">Специальность</p></b>
  </li>
  <li class="nav-item">
   <b> <p  class="nav-link">Дата начала</p></b>
  </li>
  <li class="nav-item">
   <b> <p  class="nav-link">Дата завершения</p></b>
  </li>

</ul>
            </div>
            <div class="col-md-6">
            
            <ul class="nav flex-column">
  <li class="nav-item">
<p  class="nav-link"><?=$findProfile['gruppaName'] ?> </p>
  </li>
  <li class="nav-item">
    <p  class="nav-link"><?=$findProfile['specialName'] ?></p>
  </li>
  <li class="nav-item">
   <p  class="nav-link"><?=$findProfile['date_begin']?></p>
  </li>
  <li class="nav-item">
   <p  class="nav-link"><?=$findProfile['date_end'] ?></p>
  </li>


</ul>
            </div>
            </div>
      </div><!-- /.container-fluid -->
    </div>
    
  </div>

<?php require "footer.php" ?>