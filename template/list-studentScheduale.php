<?php
include_once "adminClasses/secure.php";
require_once "head.php";
$get = new StudentMap;
$findProfile = $get->findProfileByUserId($_GET['idUser']);

$days = new ScheduleMap;
$daysSchedules = $days->getStudentScheduale($_GET['idUser']);



?>
<?php if($_SESSION['roleName'] == 'Администратор'): ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid bg-white pt-2 pl-2 pr-2 pb-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Расписание студента: <?=$findProfile['firstname'] ?>  <?=$findProfile['lastname'] ?></h1>
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
                          <?php foreach($daysSchedules as $days): ?>
                            <tr>
                            <th colspan="4">
                                <h4 class="center-block">
                                    <?=$days['dayName']?>
                                    <a href="add-schedule.php?id=<?=$_SESSION['user_id'];?>&idDay=<?=$day['dayId'];?>">add<i class="fa fa-plus"></i></a>
                                </h4>
                            </th>
                        </tr>
                        <tr>
                            <th colspan="4"><?=$days['gruppaName'];?></th>
                        </tr>

                        <tr>
                            <td><?=$days['LessonNumName'];?></td>
                            <td><?=$days['subjectName'];?></td>
                            <td><?=$days['classroomName'];?></td>

                            <td><a href="adminClasses/delete-schduale.php?id=<?=$days['id'];?>&idTeacher=<?=$id;?>">dd<i class="fa fa-trash"></i></a></td>
                        </tr>
                          <?php endforeach; ?>
                    
                    </table>
                    <?php endif; ?>



                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>

</div>

<?php require "footer.php"; ?>