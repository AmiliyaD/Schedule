<?php
session_start();
if (!isset($_SESSION['role']) || isset($_POST['out'])) {
session_destroy();
header("Location: ../login.php");
exit;
} 