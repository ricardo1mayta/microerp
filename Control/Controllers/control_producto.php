<?php 
include"../Entidades/producto.php";
	$producto = new Productos();
	 $marca=$_POST['marca'];
	 $nombre=$_POST['nompro'];
	 $descrip=$_POST['despro'];
	
	if($pro=$producto->guardar_productos($nombre,$descrip,$marca) and $nombre!=" " and $marca>=1){
echo 'ok';
		if($pro['sms']=="ok") {
		  echo  $sms=$pro['sms'];
		  header("location:../Vistas/registro_productos.php?error=".$sms);

		} else {

		  echo  $sms =$pro['sms'];
		  header("location:../Vistas/registro_productos.php?error=".$sms);
		}
	}else
	{

		echo 'error';
		 echo  $sms ="faltan datos";
		  header("location:../Vistas/registro_productos.php?error=".$sms);
	}
 ?>