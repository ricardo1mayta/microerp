<?php 
include"../Entidades/parametros.php";
$dparamtro=new Parametros();

(int)$idtipo=$_POST['tipoParam'];
$nombre=$_POST['NdetParametro'];
$Descrip=$_POST['Desccripcion'];
if($nombre!="" and $idtipo!=""){
		if ($dparamtro->guardar_parametros($nombre,$Descrip,$idtipo)==true) {
		    $cookie_name = "errores";
			$cookie_value ="Guardado exitoso";
			setcookie($cookie_name, $cookie_value, time() + 6, "/"); 
						
				?><script language="JavaScript" type="text/javascript">
				location.href = "../Vistas/administracion_atributos.php" ;
					</script><?php

		} else {
		    $cookie_name = "errores";
			$cookie_value ="Fallo la consulta";
			setcookie($cookie_name, $cookie_value, time() + 6, "/"); 
						
				?><script language="JavaScript" type="text/javascript">
				location.href = "../Vistas/administracion_atributos.php" ;
					</script><?php
		}
	}else
	{
		$cookie_name = "errores";
		$cookie_value ="Faltan Datos";
		setcookie($cookie_name, $cookie_value, time() + 6, "/"); 
				
		?><script language="JavaScript" type="text/javascript">
		location.href = "../Vistas/administracion_atributos.php" ;
			</script><?php

}
 ?>}
