<?php 
@include"../Entidades/actividades.php";
$actividades= new Actividades();
$nombre=$_POST['nomact'];
$Descrip=$_POST['desact'];
$iduser=$_POST['user'];
$dur=$_POST['dur'];
$dif=$_POST['dif'];
$nomsecc=$_POST['idsecc'];
 
	
	
		if($activ=$actividades->guardar_actividades($iduser,$nomsecc,$dur,$dif,$nombre,$Descrip))
		{
				
				if($activ['sms']=="ok") {
				  echo  $sms=$activ['sms'];
				  header("location:../Vistas/registro_actividades.php?error=".$sms."&noms=".$nomsecc);

				} else {

				  echo  $sms =$activ['sms'];
				  header("location:../Vistas/registro_actividades.php?error=".$sms."&noms=".$nomsecc);
				}
			}else
			{

				
				 echo  $sms ="faltan datos";
				 header("location:../Vistas/registro_actividades.php?error=".$sms."&noms=".$nomsecc);
			}
			?>
