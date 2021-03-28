<?php
session_start();


require 'head.php' ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Главная</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item "><a href="index.php">Домой</a></li>
            <li class="breadcrumb-item "><a href="studentList.php">Студенты</a></li>
            <li class="breadcrumb-item "><a href="studentAdd.php">Добавить нового</a></li>
            </ol>

            
          </div>
        </div><!-- /.row -->
        <div class="row md-2">
        <div class="col-md-6">
        <?php if($_SESSION['roleName'] == 'Администратор'): ?>
        
        
        <form action="adminClasses/save-user.php" method="post">
        
        <?php require "adminClasses/add-student.php" ?>
     
        </form>
           
            <?php endif; ?></div></div>
      </div><!-- /.container-fluid -->
    </div>
    
  </div>

<?php require "footer.php" ?>