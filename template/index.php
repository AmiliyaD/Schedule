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

          <a href="teacherList.php" class="nav-link nav-grups">Список преподавателей </a>
          <div class="w-100"></div>
          <a href="studentList.php" class="nav-link nav-grups">Список студентов </a>
<div class="w-100"></div>
          <b class="color-white">Справочники</b></li>
          <a href="gruppaList.php" class="nav-link nav-grups">Список групп</a>
          <a href="otdelList.php" class="nav-link nav-grups">Список отделов</a>
          <a href="specialList.php" class="nav-link nav-grups">Список специальностей</a>
          <a href="subjectList.php" class="nav-link nav-grups">Список предметов</a>
          <a href="classroomList.php" class="nav-link nav-grups">Список аудиторий</a>
          <?php endif; ?>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </div>

</div>

<?php require "footer.php" ?>