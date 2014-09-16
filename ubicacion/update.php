<?php session_start();
include ("../libs_php/mysql.php");
$db = new MySQL();
$db->extract_dates("GET");
date_default_timezone_set("America/Bogota");
$date=date("Y-m-d");
$hora=date("H:i:s");
$db->operacion("UPDATE `ubicaciones` SET `latitu_ubi`='$lat',`longit_ubi`='$lon',`fecha_ubi`='$date',`hora_ubi`='$hora' WHERE `ideusu_ubi`='$id'");
?>