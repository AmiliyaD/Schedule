 <!-- Sidebar Menu -->
 <nav class="mt-2">

 
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
 <?php if($_SESSION['roleName'] == 'Администратор'): ?>
               <li><a href="list-teacher-schedule.php"  class="nav-link nav-grups">Расписание преподавателей</a></li>
               <?php endif; ?>
               <li class="mt-2"><b class="text-light ">Пользователи</b></li>
               <li> <a href="studentList.php" class="nav-link nav-students">Студенты</a> </li>
               <li> <a href="teacherList.php" class="nav-link nav-prepods">Преподаватели</a> </li>
               <li class="mt-4"><b class="text-light ">Справочники</b></li>
               <li><a href="gruppaList.php"  class="nav-link nav-grups">Группы</a></li>
               <li><a href="otdelList.php"  class="nav-link nav-grups">Отделы</a></li>
               <li><a href="specialList.php"  class="nav-link nav-grups">Специальности</a></li>
               <li><a href="subjectList.php"  class="nav-link nav-grups">Предметы</a></li>
               <li><a href="classroomList.php"  class="nav-link nav-grups">Аудитории</a></li>
           
        </ul>
      </nav>