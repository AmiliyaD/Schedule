<?php
require "adminClasses/secure.php";
require "head.php";
$get = new TeacherMap;
$findProfile = $get->findProfileByUserId($_GET['idUser']);

$days = new ScheduleMap;
$daysSchedules = $days->findByTeacherId($_GET['idUser']);


?>
<?php if($_SESSION['roleName'] == 'Администратор' || $_SESSION['roleName'] == 'Преподаватель'): ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid bg-white pt-2 pl-2 pr-2 pb-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Расписание преподавателя: <?=$findProfile['firstname'] ?>  <?=$findProfile['lastname'] ?></h1>
                </div><!-- /.col -->

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Домой</a></li>
                        <li class="breadcrumb-item "><a href="otdelList.php">Группы</a></li>
                        <li class="breadcrumb-item "><a href="otdel-profile.php">Просмотр отдела</a></li>
                    </ol>


                </div><!-- /.col -->
            </div><!-- /.row -->
            <div class="row md-2">
                <div class="col-md-12">
                    <table class="table table-bordered table-hover">

                        <?php foreach ($daysSchedules as $day) : ?>
                        <tr>
                            <th colspan="4">
                                <h4 class="center-block">
                                    <?=$day['dayName'];?>

                                    <a href="add-schedule.php?id=<?=$_GET['idUser'];?>&idDay=<?=$day['dayId'];?>">add<i class="fa fa-plus"></i></a>
                                </h4>
                            </th>
                        </tr>

                        <?php if ($day['gruppa']): ?>
                        <?php foreach ($day['gruppa'] as $gruppa) : ?>
                        <tr>
                            <th colspan="4"><?=$gruppa['gruppaName'];?></th>
                        </tr>

                        <?php foreach ($gruppa['schedule'] as $schedule ) : ?>
                        <tr>
                            <td><?=$schedule['lesson_num'];?></td>
                            <td><?=$schedule['subject'];?></td>
                            <td><?=$schedule['classroom'];?></td>

                            <td><a href="adminClasses/delete-schduale.php?id=<?=$schedule['id'];?>&idTeacher=<?=$id;?>">dd<i class="fa fa-trash"></i></a></td>
                        </tr>

                        <?php endforeach;?>
                        <?php endforeach;?>

                        <?php else: ?>
                        <tr>

                          
                            <td colspan="4">Отутствует расписание на этот день</td>
                        </tr>
                        <?php endif; ?>
                        <?php endforeach;?>
                    </table>
                    <?php endif; ?>



                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>

</div>

<?php require "footer.php"; ?>