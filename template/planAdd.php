<?php
session_start();


require 'head.php';
$get = new TeacherMap;
$findProfile = $get->findProfileById($_GET['id']);
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Добвать новый план: <?=$findProfile['firstname'] ?> <?=$findProfile['lastname'] ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item "><a href="index.php">Домой</a></li>
            <li class="breadcrumb-item "><a href="specialList.php">Специальности</a></li>
            <li class="breadcrumb-item "><a href="specialAdd.php">Добавить новую</a></li>
            </ol>

            
          </div>
        </div><!-- /.row -->
        <div class="row md-2">
        <div class="col-md-6">
        <?php if ($_SESSION['message']): ?>
<b> <?=$_SESSION['message'] ?></b>

<?php unset($_SESSION['message']) ?>
<?php endif; ?>

        <?php if($_SESSION['roleName'] == 'Администратор'): ?>
        
        
        <form action="adminClasses/save-plan.php" method="post">
        
        <?php require "adminClasses/add-plan.php" ?>
     
        </form>
           
            <?php endif; ?></div></div>
      </div><!-- /.container-fluid -->
    </div>
    
  </div>

<?php require "footer.php" ?>