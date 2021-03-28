-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 28, 2021 at 10:47 AM
-- Server version: 10.4.12-MariaDB-log
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schedule`
--

-- --------------------------------------------------------

--
-- Table structure for table `classroom`
--

CREATE TABLE `classroom` (
  `id` int(11) NOT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `day`
--

CREATE TABLE `day` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `day`
--

INSERT INTO `day` (`id`, `name`) VALUES
(1, 'Понедельник'),
(2, 'Вторник'),
(3, 'Среда'),
(4, 'Четверг'),
(5, 'Пятница'),
(6, 'Суббота'),
(7, 'Воскресенье ');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `id` int(11) NOT NULL,
  `genderName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `genderName`) VALUES
(1, 'Мужской'),
(2, 'Женский');

-- --------------------------------------------------------

--
-- Table structure for table `gruppa`
--

CREATE TABLE `gruppa` (
  `id` int(11) NOT NULL,
  `special_id` int(11) NOT NULL,
  `gruppaName` varchar(59) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_begin` date NOT NULL,
  `date_end` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gruppa`
--

INSERT INTO `gruppa` (`id`, `special_id`, `gruppaName`, `date_begin`, `date_end`) VALUES
(1, 5, 'П-16-24', '2016-10-08', NULL),
(2, 1, 'П-23-13', '2021-03-11', '2021-03-01');

-- --------------------------------------------------------

--
-- Table structure for table `lesson_num`
--

CREATE TABLE `lesson_num` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_lesson` time(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lesson_num`
--

INSERT INTO `lesson_num` (`id`, `name`, `time_lesson`) VALUES
(1, '1 пара', '08:30:00.000000'),
(2, '2 пара', '10:10:00.000000'),
(3, '3 пара', '12:20:00.000000'),
(4, '4 пара', '14:00:00.000000'),
(5, '5 пара', '15:40:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `lesson_plan`
--

CREATE TABLE `lesson_plan` (
  `id` int(11) NOT NULL,
  `gruppa_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `otdel`
--

CREATE TABLE `otdel` (
  `id` int(11) NOT NULL,
  `otdelName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `otdel`
--

INSERT INTO `otdel` (`id`, `otdelName`, `active`) VALUES
(1, 'Программирование', 1),
(2, 'Общеобразовательные дисциплины', 1),
(3, 'Строительство', 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `sys_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `sys_name`, `name`, `active`) VALUES
(1, 'admin', 'Администратор', 1),
(2, 'manager', 'Менеджер', 1),
(3, 'teacher', 'Преподаватель', 1),
(4, 'student', 'Студент', 1);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `lesson_plan_id` int(11) NOT NULL,
  `day_id` int(11) NOT NULL,
  `lesson_num_id` int(11) NOT NULL,
  `classroom_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `special`
--

CREATE TABLE `special` (
  `id` int(11) NOT NULL,
  `specialName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `otdel_id` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `special`
--

INSERT INTO `special` (`id`, `specialName`, `otdel_id`, `active`) VALUES
(1, 'Информационные системы', 1, 1),
(2, 'Нефтегазовое дело', 2, 1),
(3, 'Строительство и эксплуатация  зданий и сооружений', 3, 1),
(4, 'Электроснабжение', 3, 1),
(5, 'Вычислительная техника и программное обеспечение', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `gruppa_id` int(11) NOT NULL,
  `num_zach` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `user_id`, `gruppa_id`, `num_zach`) VALUES
(1, 2, 1, 'ggdrher'),
(2, 24, 2, 'dfdfgdfg');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `otdel_id` int(11) NOT NULL,
  `hours` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `otdel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `user_id`, `otdel_id`) VALUES
(4, 1, 2),
(5, 3, 1),
(11, 1, 2),
(14, 13, 2),
(16, 14, 1),
(17, 15, 1),
(29, 1, 2),
(30, 1, 1),
(31, 1, 2),
(32, 1, 2),
(33, 1, 1),
(34, 1, 1),
(35, 1, 1),
(36, 1, 3),
(37, 1, 3),
(38, 1, 1),
(39, 1, 1),
(43, 19, 1),
(45, 20, 1),
(49, 21, 1),
(50, 22, 1),
(51, 28, 1),
(52, 29, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `lastname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patronymic` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender_id` int(11) NOT NULL,
  `birthday` date NOT NULL,
  `role_id` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `lastname`, `firstname`, `patronymic`, `login`, `pass`, `gender_id`, `birthday`, `role_id`, `active`) VALUES
(1, 'Иванов ', 'Иван ', 'Иванович', 'log', '1234', 1, '1990-03-10', 3, 1),
(2, 'Васильев', 'Петр', 'Иванович', 'log12', 'pass', 1, '1990-03-10', 4, 1),
(3, 'Федорова', 'Милана', 'Иванова', 'log222', 'pass', 2, '1990-03-10', 3, 1),
(4, 'Админ', 'Админ', 'Админ', 'admin', 'admin', 2, '1990-03-10', 1, 1),
(5, 'fg', 'fd', 'f', 'd', 'dg', 1, '2021-03-16', 1, 0),
(6, 'dfg', 'gdfg', 'dfgdf', 'dfg', 'dfg', 1, '2021-03-16', 1, 0),
(7, 'gh', 'gf', 'fg', 'fgh', 'ghjh', 1, '2021-03-11', 3, 0),
(8, 'uy', 'yiyi', 'yi', 'kuiy', 'huku', 2, '2021-03-10', 3, 0),
(9, 'df', 'dfg', 'df', 'df', 'd', 1, '2021-03-12', 3, 0),
(10, 'fg', 'fd', 'fd', 'fd', 'ty', 1, '2021-03-18', 1, 0),
(11, 'Жидкова', 'dg', 'rtert', 'rtertre', 'ertert', 1, '2021-03-13', 2, 0),
(12, 'dgdfg', 'dfgdfg', 'fdg', 'dfgdfg', 'dfgdfgdfg', 1, '2021-03-12', 3, 0),
(13, 'dfgdg', 'gdfg', 'dfgdf', 'dfdfffd', 'fd', 1, '2021-03-12', 1, 0),
(14, 'dfg', 'dfg', 'dfg', 'dfgdfgddf', 'ddfg', 1, '2021-03-02', 1, 0),
(15, 'eryeary', 'yayaery', 'dfhetyearyaer', 'rterterter', 'terterte', 2, '2021-03-16', 1, 0),
(16, 'ert', 'ert', 'erte', 'tr', 'ertt', 1, '2021-03-13', 1, 0),
(17, 'ert', 'ert', 'erte', 'trertertert', 'ertert', 1, '2021-03-03', 1, 0),
(18, 'erer', 'ert', 'ert', 'ertertert', 'rtret', 2, '2021-03-04', 1, 0),
(19, 'dfgdfg', 'dgdf', 'gdgdfg', 'dfgdfgdf', 'gdfgdfg', 1, '2021-03-11', 1, 0),
(20, 'ва', 'вап', 'авва', 'пва', 'вапва', 1, '2021-03-25', 1, 0),
(21, 'dgfegertert', 'erterter', 'tertertetrert', 'erertet', 'dfgdfgdfg', 1, '2021-03-04', 1, 0),
(22, 'newprepod', 'dddddd', 'dddddddddd', 'dgdfd', 'fgdfgdg', 1, '2021-03-08', 1, 0),
(23, 'dfgdfg', 'fddfg', 'dfdf', 'dfgd', 'dfgdf', 1, '2021-03-15', 1, 0),
(24, 'АМММММ', 'ИИИИИ', 'ЛИИИИ', 'log', 'pass', 1, '2021-03-27', 4, 1),
(25, 'fgdf', 'dfgd', 'dffg', 'dfdfg', 'dfgdfg', 1, '2021-03-15', 1, 0),
(26, 'dfgdg', 'dfgdf', 'dffdg', 'fdg', 'dffdfg', 1, '2021-03-09', 1, 0),
(27, 'tertert', 'erter', 'ertert', 'erter', 'ertertert', 1, '2021-03-10', 1, 0),
(28, 'пва', 'авпва', 'вапав', 'вав', 'вавпа', 1, '2021-03-14', 1, 0),
(29, 'aaaaaaaaaaaaaaaa', 'dfgdg', 'dfgdfgd', 'aaaaa', 'aaaaaa', 1, '2021-03-08', 1, 0),
(30, 'dffdg', 'dfd', 'gdfgfd', 'dfdg', 'dfg', 1, '2021-03-12', 4, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classroom`
--
ALTER TABLE `classroom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `day`
--
ALTER TABLE `day`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gruppa`
--
ALTER TABLE `gruppa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `special_id` (`special_id`);

--
-- Indexes for table `lesson_num`
--
ALTER TABLE `lesson_num`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lesson_plan`
--
ALTER TABLE `lesson_plan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gruppa_id` (`gruppa_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `otdel`
--
ALTER TABLE `otdel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `day_id` (`day_id`),
  ADD KEY `classroom_id` (`classroom_id`),
  ADD KEY `lesson_plan_id` (`lesson_plan_id`);

--
-- Indexes for table `special`
--
ALTER TABLE `special`
  ADD PRIMARY KEY (`id`),
  ADD KEY `otdel_id` (`otdel_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `gruppa_id` (`gruppa_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `otdel_id` (`otdel_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `gender_id` (`gender_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classroom`
--
ALTER TABLE `classroom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `day`
--
ALTER TABLE `day`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gruppa`
--
ALTER TABLE `gruppa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lesson_num`
--
ALTER TABLE `lesson_num`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lesson_plan`
--
ALTER TABLE `lesson_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `otdel`
--
ALTER TABLE `otdel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `special`
--
ALTER TABLE `special`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gruppa`
--
ALTER TABLE `gruppa`
  ADD CONSTRAINT `gruppa_ibfk_1` FOREIGN KEY (`special_id`) REFERENCES `special` (`id`);

--
-- Constraints for table `lesson_plan`
--
ALTER TABLE `lesson_plan`
  ADD CONSTRAINT `lesson_plan_ibfk_1` FOREIGN KEY (`gruppa_id`) REFERENCES `gruppa` (`id`),
  ADD CONSTRAINT `lesson_plan_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`),
  ADD CONSTRAINT `lesson_plan_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`day_id`) REFERENCES `day` (`id`),
  ADD CONSTRAINT `schedule_ibfk_2` FOREIGN KEY (`classroom_id`) REFERENCES `classroom` (`id`),
  ADD CONSTRAINT `schedule_ibfk_3` FOREIGN KEY (`lesson_plan_id`) REFERENCES `lesson_plan` (`id`);

--
-- Constraints for table `special`
--
ALTER TABLE `special`
  ADD CONSTRAINT `special_ibfk_1` FOREIGN KEY (`otdel_id`) REFERENCES `otdel` (`id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`gruppa_id`) REFERENCES `gruppa` (`id`);

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `teacher_ibfk_2` FOREIGN KEY (`otdel_id`) REFERENCES `otdel` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
