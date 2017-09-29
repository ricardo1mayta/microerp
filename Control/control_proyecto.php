<?php 
include"../Entidades/proyecto.php";
$proyecto = new Proyectos();

	 $idpro=$_POST['producto'];
	 $idus=$_POST['user'];
	 $nombre=$_POST['nomproy'];
	 $Descrip=$_POST['desproy'];
	 $fini=$_POST['fini'];
	 $fin=$_POST['ffin'];
	 $idcrea=$_POST['crea'];

	
		
		if($nombre!="" and $idus>=1 and $idpro!="")
		{
					$pro=$proyecto-> guardar_proyectos($idus,$idpro,$fini,$fin,$nombre,$Descrip,$idcrea);
				if($pro['sms']=="ok") {
						$cookie_name = "errores";
						$cookie_value = $pro['sms'];
						setcookie($cookie_name, $cookie_value, time() + 6, "/"); 
						
						?><script language="JavaScript" type="text/javascript">
						location.href = "../Vistas/registro_proyectos.php" ;
						</script><?php
				 

				} else {

				  		$cookie_name = "errores";
						$cookie_value = $pro['sms'];
						setcookie($cookie_name, $cookie_value, time() + 6, "/"); 
						
						?><script language="JavaScript" type="text/javascript">
						location.href = "../Vistas/registro_proyectos.php" ;
						</script><?php
				}
			}else
			{

				$cookie_name = "errores";
						$cookie_value = $pro['sms'];
						setcookie($cookie_name, $cookie_value, time() + 6, "/"); 
						
						?><script language="JavaScript" type="text/javascript">
						location.href = "../Vistas/registro_proyectos.php" ;
						</script><?php
			}
			
			?>
