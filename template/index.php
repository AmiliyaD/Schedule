<?php
session_start();

  
require 'head.php';
$messageHead = 'Главная ';

if (Helper::can('Студент') || Helper::can('Преподаватель')) {
  $messageHead = 'Здравствуйте, '.$_SESSION['UserFirstName']."  ".$_SESSION['UserLastName'].". Ваше расписание: ";
}

 ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2 mt-3">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"><?=$messageHead ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Домой</a></li>

          </ol>


        </div><!-- /.col -->
      </div><!-- /.row -->
      <div class="row md-2 mt-5">
        <div class="col-md-12">

          <?php if(Helper::can('Администратор')): ?>
            <?php
            
            $get = new TeacherMap;
            $findProfile = $get->findProfileByUserId($_SESSION['user_id']);

            $days = new ScheduleMap;
            $daysSchedules = $days->findByTeacherId($_SESSION['user_id']);
         
            
            ?>
            
          <?php  require "sessionFlash.php" ?>
          <table class="table table-bordered table-hover">

            <?php foreach ($daysSchedules as $day) : ?>
            <tr>
              <th colspan="4">
                <h4 class="center-block">
                  <?=$day['dayName'];?>

                  <a href="add-schedule.php?id=<?=$_SESSION['user_id'];?>&idDay=<?=$day['dayId'];?>">add<i
                      class="fa fa-plus"></i></a>
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

              <td><a href="adminClasses/delete-schduale.php?id=<?=$schedule['id'];?>&idTeacher=<?=$id;?>">dd<i
                    class="fa fa-trash"></i></a></td>
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




<!-- СТУДЕНТ -->
          <?php if(Helper::can('Студент')): ?>
          <?php
   
          $get = new StudentMap;
          $findProfile = $get->findProfileByUserId($_SESSION['user_id']);

        $days = new ScheduleMap;
          $daysSchedules = $days->findByStudentId($_SESSION['user_id']);
      ?>


          <?php  require "sessionFlash.php" ?>
          <h4 class="center-block">
              Ваша группа:     <?=$daysSchedules['gruppa'];?>
                </h4>
          <table class="table table-bordered table-hover">

            <?php foreach ($daysSchedules['studentSchedule'] as $day): ?>
      
            <tr>
              <th colspan="4">
                <h4 class="center-block">
                  <?=$day['dayName'];?>

                </h4>
              </th>
            </tr>

            <?php if ($day['schedule']): ?>
            
            <?php foreach ($day['schedule'] as $schedule ) : ?>
            <tr>
              <td><?=$schedule['lesson_num'];?></td>
              <td><?=$schedule['subject'];?></td>
              <td><?=$schedule['classroom'];?></td>

             
            </tr>

            <?php endforeach;?>
          

            <?php else: ?>
            
            <tr>
              <td colspan="4">Отутствует расписание на этот день</td>
            </tr>



            <?php endif; ?>
            <?php endforeach;?>
          </table>
          <?php endif; ?>

<!-- Преподаватель -->

          <?php if(Helper::can('Преподаватель')): ?>
          <?php
            
            $get = new TeacherMap;
            $findProfile = $get->findProfileByUserId($_SESSION['user_id']);

            $days = new ScheduleMap;
            $daysSchedules = $days->findByTeacherId($_SESSION['user_id']);
     ?>
          <?php  require "sessionFlash.php" ?>
          <table class="table table-bordered table-hover">

            <?php foreach ($daysSchedules as $day) : ?>
            <tr>
              <th colspan="4">
                <h4 class="center-block">
                  <?=$day['dayName'];?>

                  <a href="add-schedule.php?id=<?=$_SESSION['user_id'];?>&idDay=<?=$day['dayId'];?>">add<i
                      class="fa fa-plus"></i></a>
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

              <td><a href="adminClasses/delete-schduale.php?id=<?=$schedule['id'];?>&idTeacher=<?=$id;?>">dd<i
                    class="fa fa-trash"></i></a></td>
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

<?php require "footer.php" ?>