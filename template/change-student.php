<?php
session_start();

require 'head.php'; 
$gruppaClass = new GruppaMap;
$gruppas = $gruppaClass->arrGruppas();

$otdelClass  = new OtdelMap;
$otdel = $otdelClass->otdel();

$get = new StudentMap;
$findProfile = $get->findProfileById($_GET['id'])
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Изменить студента</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item "><a href="index.php">Домой</a></li>
            <li class="breadcrumb-item "><a href="classroomList.php">Аудитории</a></li>
            <li class="breadcrumb-item "><a href="classroomAdd.php">Изменить аудиторию</a></li>
            </ol>

            
          </div>
        </div><!-- /.row -->
        <div class="row md-2">
        <div class="col-md-6">
        <?php if($_SESSION['roleName'] == 'Администратор'): ?>
        
        
        <form action="adminClasses/save-special.php" method="post">
        
<div class="form-group">
    <label for="">Роль</label>
    <select class="form-control" name="role_id">
    
    </select>
</div>

<div class="form-group">
    <label>Заблокировать</label>
    <div class="radio">
        <label>
            <input type="radio" name="active" value="1" <?=($user->active)?'checked':'';?>> Нет
        </label> &nbsp;
        <label>
            <input type="radio" name="active" value="0" <?=(!$user->active)?'checked':'';?>> Да
        </label>
    </div>
</div>

<div class="form-group">
    <label for="">Отделение</label>
    <select class="form-control" name="otdel_id">
        <?=Helper::printSelectOptions($teacher->otdel_id, (new OtdelMap())->otdel(), 'otdelName') ?>

    </select>

</div>

<!-- ПАРАМЕТРЫ ДЛЯ СТУДЕНТА -->

<!-- номер зачетки -->
<div class="form-group">
    <label for="">Номер зачетки</label>
    <input type="text" name="num_zach" class='form-control' value="<?=$findProfile['num_zach']?>">

</div>

<!-- номер группы -->
<div class="form-group">
    <label for="">Группа</label>
    <select class="form-control" name="gruppa_id">
        <?=Helper::printSelectOptions($user->role_id, $gruppas, 'gruppaName') ?>
    </select>

</div>
<!-- кнопка -->
<div class="form-group">
    <button type="submit" name="saveStudent" class="btn btn-primary">Сохранить</button>
</div>
        </form>
           
            <?php endif; ?>
            
            </div>
            
            </div>
      </div><!-- /.container-fluid -->
    </div>
    
  </div>

<?php require "footer.php" ?>