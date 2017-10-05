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

	
		
		if($pro=$proyecto-> guardar_proyectos($idus,$idpro,$fini,$fin,$nombre,$Descrip,$idcrea) and $nombre!=" " and $idus>=1 and $idpro!="")
		{
					echo 'ok';
				if($pro['sms']=="ok") {
				  echo  $sms=$pro['sms'];
				  header("location:../Vistas/registro_proyectos.php?error=".$sms);

				} else {

				  echo  $sms =$pro['sms'];
				  header("location:../Vistas/registro_proyectos.php?error=".$sms);
				}
			}else
			{

				echo 'error';
				 echo  $sms ="faltan datos";
				  header("location:../Vistas/registro_proyectos.php?error=".$sms);
			}
			
			?>
