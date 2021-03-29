<?php
require "secure.php";
require_once "../../BaseMapClass/Helper.php";
require_once "../../BaseMapClass/SpecialMap.php";
require_once "../../BaseMapClass/GruppaMap.php";
require_once "../../classes/Otdel.php";
require_once "../../BaseMapClass/OtdelMap.php";
require_once "../../BaseMapClass/Helper.php";
require_once "../../classes/Gruppa.php";
require_once "../../BaseMapClass/SpecialMap.php";
require_once "../../classes/Special.php";


if (isset($_POST['changeTeacher'])) {
    var_dump($_POST);
}
if(isset($_POST['changeOtdel'])) {
    var_dump($_POST);
    $otdel = new Otdel;
    $otdel->otdelName = $_POST['otdel_nam'];
    $otdel->active = $_POST['active'];

    $upd = new OtdelMap;
    $updOtdel = $upd->update($otdel, $_GET['id']);
    var_dump($updOtdel);
}

?>

