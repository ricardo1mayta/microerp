<?php 
include"../Entidades/parametros.php";
$nombre=$_POST['nompar'];
$Descrip=$_POST['Desccripcion'];
$paramtro=new Parametros();
if( $nombre!=""){
if ($paramtro->guardar_parametros($nombre,$Descrip,'0')==true ) {

    
    
	$cookie_name = "errores";
	$cookie_value ="ok";
	setcookie($cookie_name, $cookie_value, time() + 6, "/"); 
				
		?><script language="JavaScript" type="text/javascript">
		location.href = "../Vistas/administracion_atributos.php" ;
			</script><?php

} else {
    $cookie_name = "errores";
	$cookie_value ="Fallo! en la consulta";
	setcookie($cookie_name, $cookie_value, time() + 6, "/"); 
				
		?><script language="JavaScript" type="text/javascript">
		location.href = "../Vistas/administracion_atributos.php" ;
			</script><?php
}
}else{
	$cookie_name = "errores";
	$cookie_value ="Faltan Datos";
	setcookie($cookie_name, $cookie_value, time() + 6, "/"); 
				
		?><script language="JavaScript" type="text/javascript">
		location.href = "../Vistas/administracion_atributos.php" ;
			</script><?php
	}


 ?>