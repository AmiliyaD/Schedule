<?php 
session_start();
require "secure.php";
require_once "../../BaseMapClass/GruppaMap.php";
require_once "../../BaseMapClass/OtdelMap.php";
require_once "../../BaseMapClass/Helper.php";
require_once "../../classes/Gruppa.php";
require_once "../../BaseMapClass/SpecialMap.php";
require_once "../../classes/Special.php";


if (isset($_POST['saveOtdel'])) {
    $insertOtdel = new OtdelMap;
    $in = $insertOtdel->insert($_POST['otdel_nam'], $_POST['active']);
    var_dump($in);
    if ($in) {
        $_SESSION['message'] = "Новый отдел добавлен";
        header("Location: ../otdelList.php");
    }
}
if (isset($_POST['saveGruppa'])) {
    $gruppa = new Gruppa;
    $gruppa->GruppaName = Helper::clearString($_POST['GruppaName']);
    $gruppa->special_id = $_POST['special_id'];
    $gruppa->date_begin = $_POST['date_begin'];
    $gruppa->date_end = $_POST['date_end']; 

    if($gruppa) {
        $saveGruppa = new GruppaMap;
        $saveGrup = $saveGruppa->insert($gruppa);
        $_SESSION['message'] = "Новая группа добавлена";
        header("Location: ../gruppaList.php");
    }
}