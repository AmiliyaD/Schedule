<?php
session_start();

require_once "../BaseMapClass/Helper.php";
require_once "../BaseMapClass/SpecialMap.php";
require 'head.php';
$get = new GruppaMap;
$findProfile = $get->findGruppaById($_GET['id']); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Изменить группу</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="index.php">Домой</a></li>
                        <li class="breadcrumb-item "><a href="gruppaList.php">Группы</a></li>
                        <li class="breadcrumb-item "><a href="gruppaAdd.php">Добавить новую</a></li>
                    </ol>


                </div>
            </div><!-- /.row -->
            <div class="row md-2">
                <div class="col-md-6">
                    <?php if($_SESSION['roleName'] == 'Администратор'): ?>


                    <form action="adminClasses/save-gruppa.php" method="post">


                        <div class="form-group">
                            <label>Название</label>
                            <input type="text" class="form-control" name="GruppaName" required="required"
                                value="<?=$findProfile['gruppaName'] ?>">
                        </div>

                        <div class="form-group">
                            <label>Дата образования</label>
                            <input type="date" class="form-control" name="date_begin" required="required"
                                value="<?=$findProfile['date_begin']?>">
                        </div>

                        <div class="form-group">
                            <label>Дата окончания</label>
                            <input type="date" class="form-control" name="date_end" required="required"
                                value="<?=$findProfile['date_end']?>">
                        </div>

                        <div class="form-group">
                            <label>Специальность</label>
                            <select class="form-control" name="special_id">
                                <?= Helper::printSelectOptions($gruppa->special_id, (new SpecialMap())->arrSpecials(), 'specialName');?>
                            </select>
                        </div>


                        <div class="form-group">
                            <button type="submit" name="saveGruppa" class="btn btn-primary">Сохранить</button>
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