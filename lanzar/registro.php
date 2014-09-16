<?php
include ("../libs_php/mysql.php");
$db = new MySQL(); 
$pregunta = new stdClass();
/*
for ($i = 1; $i <= 10; $i++) {
	$data[$i] = array("pregunta" => "Albert", "id" => "Camus");
}*/
$query="SELECT * FROM `quiz` WHERE 1";
$consulta =$db->consulta($query);
$i = 0;
while($resultados = $db->fetch_array($consulta)){
	$data[$i] = array("pregunta" => utf8_encode($resultados['preg_qui']), "id" => $resultados['id_qui']);
	$i+=1; 
}
$pregunta->pregutas = $data;
$json = json_encode($pregunta);
echo $json;
?>