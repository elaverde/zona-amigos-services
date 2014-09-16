<?php
session_start();
include ("../libs_php/mysql.php");
$db = new MySQL();
$db->extract_dates("GET");
$db->operacion("UPDATE `quiz` SET `lanzar_qui`='no' WHERE 1");
$db->operacion("TRUNCATE TABLE `test`");
$db->operacion("UPDATE `quiz` SET lanzar_qui='si' WHERE id_qui='$id'");
?>