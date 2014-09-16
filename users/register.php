<?php session_start();
include ("../libs_php/mysql.php");
$db = new MySQL();
$db->extract_dates("GET");
$db->operacion("INSERT INTO 
`usuarios`(`ideusu_usu`, `nombre_usu`, `apellido_usu`, `telefono_usu`, `email_usu`) VALUES (NULL,'$nom','$ape','$tel','$email')");
$idI=mysql_insert_id();
$db->operacion("INSERT INTO `ubicaciones`(`ideubi_ubi`, `ideusu_ubi`, `latitu_ubi`, `longit_ubi`, `fecha_ubi`, `hora_ubi`) VALUES (NULL,'$idI','','','','')");
?>