<?php
session_start();
require 'head.php';
$gruppa = new GruppaMap;
$get = $gruppa->arrGruppas();
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Список групп</h1>
          </div><!-- /.col -->
        
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Домой</a></li>
            <li class="mr-2 breadcrumb-item"><a href="studentList.php">Группы</a></li>
          
            </ol>

            
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="row md-2">
        <div class="col-md-6">
        <?php if($_SESSION['roleName'] == 'Администратор'): ?>
        
          
            <a href="gruppaAdd.php" class='btn btn-success'>Добавить нового</a>
           
            <?php endif; ?></div></div>

<div class="row md-2 mt-5">
<div class="col-md-12">
<?php if ($_SESSION['message']): ?>
<b> <?=$_SESSION['message'] ?></b>

<?php unset($_SESSION['message']) ?>
<?php endif; ?>
<table class="table">
  <thead>
    <tr>
    
      <th scope="col">Название</th>
      <th scope="col">Специальность</th>
      <th scope="col">Дата образования</th>
      <th scope="col">Дата окончания</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($get as $item): ?>

    <tr>
    <td><a href="gruppa-profile.php?id=<?=$item[0] ?>"> <?=$item['gruppaName'] ?> </a></td>
    <td><?=$item['specialName'] ?></td>
    <td><?=$item['date_begin']?></td>
    <td><?=$item['date_end'] ?></td>

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