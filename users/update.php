<?php session_start();
include ("../libs_php/mysql.php");
$db = new MySQL();
$db->extract_dates("GET");
$db->operacion("UPDATE `usuarios` SET `nombre_usu`='$nom',`apellido_usu`='$ape',`telefono_usu`='$tel',`email_usu`='$email' WHERE `ideusu_usu`='$id'");
?>