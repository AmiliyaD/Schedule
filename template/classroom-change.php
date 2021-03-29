<?php
session_start();

require 'head.php'; 
$get = new ClassroomMap;
$findProfile = $get->findClassById($_GET['id']);


?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Изменить аудиторию</h1>
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
                            <label for="">Название аудиторий</label>
                            <input type="text" class="form-control" name="class_name"
                                value="<?=$findProfile['classroomName']?>">

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
                            <button type="submit" name="saveClassroom" class="btn btn-primary">Сохранить</button>
                        </div>
                        <input type="hidden" name="gruppa_id" value="<?=$id;?>" />

                    </form>

                    <?php endif; ?>

                </div>

            </div>
        </div><!-- /.container-fluid -->
    </div>

</div>

<?php require "footer.php" ?>