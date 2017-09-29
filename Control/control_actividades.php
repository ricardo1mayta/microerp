<?php 
@include"../Entidades/actividades.php";
$actividades= new Actividades();
$nombre=$_POST['idact'];
$iduser=$_POST['user'];
$dur=$_POST['dur'];
$dif=$_POST['dif'];
$nomsecc=$_POST['idsecc'];
 
	
	
		if($nombre>0 and $iduser>0 and $dur>0 and $dif>0)
		{
			$activ=$actividades->guardar_actividades($iduser,$nomsecc,$dur,$dif,$nombre);
				
				if($activ['sms']=="ok") {
				 
				  $url="../Vistas/registro_actividades.php?noms=".$nomsecc;
				  $cookie_name = "errores";
				  $cookie_value = $activ['sms'];
				setcookie($cookie_name, $cookie_value, time() + 6, "/"); 
				
		  		?><script language="JavaScript" type="text/javascript">
				location.href = '<?=$url;?>';
				</script><?php

				} else {

				  $url="../Vistas/registro_actividades.php?noms=".$nomsecc;
				  $cookie_name = "errores";
				  $cookie_value = $activ['sms'];
				  setcookie($cookie_name, $cookie_value, time() + 6, "/"); 
				
		  		?><script language="JavaScript" type="text/javascript">
				location.href = '<?=$url;?>';
				</script><?php
				}
			}else
			{

				
				 
				 $url="../Vistas/registro_actividades.php?noms=".$nomsecc;
				  $cookie_name = "errores";
				  $cookie_value = "faltan datos";
				  setcookie($cookie_name, $cookie_value, time() + 6, "/"); 
				
		  		?><script language="JavaScript" type="text/javascript">
				location.href = '<?=$url;?>';
				</script><?php
			}
			?>
