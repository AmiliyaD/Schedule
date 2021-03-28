<?php 
require_once "../BaseMapClass/TeacherMap.php";
require_once "../BaseMapClass/UserMap.php";
require_once "../BaseMapClass/SpecialMap.php";
require_once "../BaseMapClass/StudentMap.php";
require_once "../BaseMapClass/ClassroomMap.php";
require_once "../BaseMapClass/GruppaMap.php";
require_once "../BaseMapClass/OtdelMap.php";
require_once "../BaseMapClass/SubjectMap.php";
?>
<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Расписание занятий колледжа</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
  </script>
  <link rel="stylesheet" href="css/alt/style.css">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->

  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->

    <nav class="main-header navbar navbar-expand navbar-info navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav ">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        

        <!-- выпадающий список -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
            data-bs-toggle="dropdown" aria-expanded="false"> Здравствуйте, 
            <?=$_SESSION['UserFirstName'] ?> <?=$_SESSION['UserLastName'] ?>
          </a>
          <!-- меню в списке -->
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li > 
              <p><b> <?=$_SESSION['roleName'] ?></b></p></li>
            <li class="nav-item d-none d-sm-inline-block">
              <form method="POST" action="adminClasses/secure.php">

                <button type="submit" class="btn btn-
                light " name="out">Профиль</button>

              </form>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
              <form method="POST" action="adminClasses/secure.php">

                <button type="submit" class="btn btn-light
                 " name="out">Выход</button>

              </form>
            </li>
          </ul>
        </li>

      </ul>


    </nav>



    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index.php" class="brand-link">
        <img src="img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
          style="opacity: .8">
        <span class="brand-text font-weight-light">Главная</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->


        <?php require 'menu.php' ?>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>