<?php 
class MySQL{
  var $server="localhost";
  var $user="solucir9_amigo";
  var $password="zonaamigos";
  var $bd="solucir9_zona_amigos";
  var $sistemifo='Zona Amigos';
  private $conexion; private $total_consultas;
  public function MySQL(){ 
    if(!isset($this->conexion)){
      $this->conexion = (@mysql_connect($this->server,$this->user,$this->password))
      or die(mysql_error());
      mysql_select_db($this->bd,$this->conexion) or die(mysql_error());
    }
  }
  public function  close_mysql(){
	mysql_close($this->conexion);
  }
  public function consulta($consulta){ 
    $this->total_consultas++; 
    $resultado = mysql_query($consulta,$this->conexion);
    if(!$resultado){ 
      echo 'MySQL Error: ' . mysql_error();
      exit;
    }
    return $resultado;
  }
  
  public function operacion($operacion){ 
    mysql_query ($operacion,$this->conexion) or die(mysql_error());
  }
  
  public function ID_increment($tabla){
  $consulta = $this->consulta("SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = '".$this->bd."' AND TABLE_NAME = '".$tabla."'");
  $row = mysql_fetch_assoc($consulta);
  return $row['AUTO_INCREMENT'];	
  }
  
public function return_querys($consulta,$return_dates,$separador){
$result='';	
$sql= $this->consulta($consulta);
$resuls = $this->fetch_array($sql);
for ($i=0;$i<count($return_dates);$i++) { 
$result.=$resuls[$return_dates[$i]].$separador; 
}
return $result;
}
public function return_query($consulta,$return_dates){
$result='';	
$sql= $this->consulta($consulta);
$resuls = $this->fetch_array($sql);
$result.=$resuls[$return_dates]; 
return $result;
}

    
  public function fetch_array($consulta){
   return mysql_fetch_array($consulta);
  }
  public function num_rows($consulta){
  return mysql_num_rows($consulta);
  }
  public function getTotalConsultas(){
  return $this->total_consultas; 
  }
  
  public function extract_dates($type){ 
  switch ($type) {
  case 'POST':
  foreach($_POST as $nombre_campo => $valor){ 
  $asignacion = "\$GLOBALS[\"" . $nombre_campo . "\"]='" . $valor . "';"; 
  eval($asignacion); 
  }
  break; 
  case 'GET';
  foreach($_GET as $nombre_campo => $valor){ 
  $asignacion = "\$GLOBALS[\"" . $nombre_campo . "\"]='" . $valor . "';"; 
  eval($asignacion); 
  }
  break;
  }
  }
  public function toInt($str)
  {
    return preg_replace("/([^0-9\\.])/i", "", $str);
  }
  public function selected($p1,$p2){
  if ($p1==$p2){ return 'selected ';} else {'';}
  }
  public function options($opciones,$selected) {   
   for ($i=0;$i<count($opciones);$i++) { 
	    $val=$i+1;
        echo '<option '.$this->selected($val,$selected).' value="'.$val.'" >'.$opciones[$i] . "</option>"; 
    } 
  }
  public function options_ex($opciones,$selected) {   
   for ($i=0;$i<count($opciones);$i++) { 
	    $val=$i+1;
        echo '<option '.$this->selected($val,$selected).' value="'.$opciones[$i] .'" >'.$opciones[$i] . "</option>"; 
    } 
  }
  
  public function options_query($consulta,$value,$text,$selected) {   
  $consulta = $this->consulta($consulta);
  while($resuls = $this->fetch_array($consulta)){
  echo '<option '.$this->selected($resuls[$value],$selected).' value="'.$resuls[$value].'" >'.$resuls[$text]. "</option>"; 
  } 
  }
  public function img ($url,$name,$width,$height,$pathr){
	$imagen=false;
	$dir='';  
	$ext = array('jpeg','jpg','png','gif');
		foreach ($ext as &$val) {
			if (file_exists($url.$name.".".$val)){
			$dir=$url.$name.".".$val;
			$imagen=true;
			}
		}	
		
  echo '<div style="width:'.$width.'px; margin:0px; background-repeat:no-repeat;height:'.$height.'px; background-image:url('.$pathr.$dir.'); background-size:contain; "></div>';	
   } 
   
   public function imgen_url ($url,$width,$height){
   echo '<div style="width:'.$width.'px; margin:0px; background-repeat:no-repeat;height:'.$height.'px; background-image:url('.$url.'); background-size:contain; "></div>';	
   } 
  
   public function deleted_imgs ($url,$name){
   $ext = array('jpeg','jpg','png','gif','JPEG','JPG','PNG','GIF');
	    foreach ($ext as &$val) {
			if (file_exists($url.$name.".".$val)){
			unlink($url.$name.".".$val);
			}
		}	
   }
   public function img_url ($url,$name,$imagenremplace){
	$imagen=false;  
	$ext = array('jpeg','jpg','png','gif');
		foreach ($ext as &$val) {
			if (file_exists($url.$name.".".$val)){
			$dir=$url.$name.".".$val;
			$imagen=true;
			}
		}	
		if ($imagen==false){
		$dir=$imagenremplace ;
	    }
		return $dir;
   }  
}
?>

