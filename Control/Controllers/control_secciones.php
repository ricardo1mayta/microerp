<?php 
@include"../Entidades/secciones.php";
$secciones= new Secciones();
$nombre=$_POST['nomsecc'];
$Descrip=$_POST['dessecc'];
$iduser=$_POST['user'];
$idcat=$_POST['categoria'];
$nomproy=$_POST['nomproy'];
 
	
	
		if($secc=$secciones->guardar_secciones($iduser,$nomproy,$idcat,$nombre,$Descrip))
		{
				
				if($secc['sms']=="ok") {
				  echo  $sms=$secc['sms'];
				  header("location:../Vistas/registro_secciones.php?error=".$sms."&nom=".$nomproy);

				} else {

				  echo  $sms =$secc['sms'];
				  header("location:../Vistas/registro_secciones.php?error=".$sms."&nom=".$nomproy);
				}
			}else
			{

				
				 echo  $sms ="faltan datos";
				  header("location:../Vistas/registro_secciones.php?error=".$sms."&nom=".$nomproy);
			}
