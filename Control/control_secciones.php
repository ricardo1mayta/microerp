<?php 
@include"../Entidades/secciones.php";
$secciones= new Secciones();
$nombre=$_POST['nomsecc'];
$Descrip=$_POST['dessecc'];
$iduser=$_POST['user'];
$idcat=$_POST['categoria'];
$nomproy=$_POST['nomproy'];
 
	
	
		if($nombre!="" and $iduser>0 and $idcat>0 and $nomproy!="")
		{
			$secc=$secciones->guardar_secciones($iduser,$nomproy,$idcat,$nombre,$Descrip);	
				if($secc['sms']=="ok") {
				 
				   $url="../Vistas/registro_secciones.php?nom=".$nomproy;
				  $cookie_name = "errores";
				  $cookie_value = $secc['sms'];
				setcookie($cookie_name, $cookie_value, time() + 6, "/"); 
				
		  		?><script language="JavaScript" type="text/javascript">
				location.href = '<?=$url;?>';
				</script><?php
				 

				} else {

				  
				  $url="../Vistas/registro_secciones.php?nom=".$nomproy;
				  $cookie_name = "errores";
				  $cookie_value = $secc['sms'];
				  setcookie($cookie_name, $cookie_value, time() + 6, "/"); 
				
					?><script language="JavaScript" type="text/javascript">
					location.href = '<?=$url;?>';
					</script><?php
				}
			}else
			{

				
				 $url="../Vistas/registro_secciones.php?nom=".$nomproy;
				  $cookie_name = "errores";
				  $cookie_value = "FALTAN DATOS";
				  setcookie($cookie_name, $cookie_value, time() + 6, "/"); 
				
					?><script language="JavaScript" type="text/javascript">
					location.href = '<?=$url;?>';
					</script><?php
			}
