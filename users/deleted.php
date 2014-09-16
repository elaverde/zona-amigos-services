<?php session_start();
include ("../libs_php/mysql.php");
$db = new MySQL();
$db->extract_dates("GET");
$db->operacion("DELETE FROM `ubicaciones` WHERE `ideusu_ubi`='$id'");
$idI=mysql_insert_id();
$db->operacion("DELETE FROM `usuarios` WHERE `ideusu_usu`='$id'");
?>