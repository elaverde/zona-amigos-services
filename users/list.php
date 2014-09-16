<?php
include ("../libs_php/mysql.php");
$db = new MySQL(); 
$ubicaciones = new stdClass();
$db->extract_dates("GET");

if($id=="ALL"){
$query="SELECT *
FROM
ubicaciones
INNER JOIN usuarios ON ubicaciones.ideusu_ubi = usuarios.ideusu_usu
WHERE 1";
}else{
$query="SELECT *
FROM
ubicaciones
INNER JOIN usuarios ON ubicaciones.ideusu_ubi = usuarios.ideusu_usu
WHERE usuarios.ideusu_usu='$id'";	
}


$consulta =$db->consulta($query);
$i = 0;
while($res = $db->fetch_array($consulta)){
	$data[$i] = array("id" => $res['ideusu_usu'],"nombres" => $res['nombre_usu'],"apellidos" => $res['apellido_usu'],"telefono" => $res['telefono_usu'],"email" => $res['email_usu'],"latitud" => $res['latitu_ubi'],"longitud" => $res['longit_ubi'],"fecha" => $res['fecha_ubi'],"hora" => $res['hora_ubi']);
	$i+=1; 
}
$ubicaciones->usuarios = $data;
$json = json_encode($ubicaciones);
echo $json;
?>