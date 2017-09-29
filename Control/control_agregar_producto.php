<?php 
include"../Entidades/producto.php";
	$producto = new Productos();
	 $marca=$_POST['marca'];
	 $nombre=$_POST['nompro'];
	 $descrip=$_POST['despro'];
	 $fini=$_POST['fini'];
	 $ffin=$_POST['ffin'];
	
	if($nombre!="" and $marca>=1){
	$pro=$producto->guardar_productos_ventas($nombre,$descrip,$marca,$fini,$ffin);
		if($pro['sms']=="ok") {
		 
		  		$cookie_name = "errores";
				$cookie_value = $pro['sms'];
				setcookie($cookie_name, $cookie_value, time() + 6, "/"); 
				
		  		?><script language="JavaScript" type="text/javascript">
				location.href = "../Vistas/registro_producto_ventas.php" ;
				</script><?php
				
		  

		} else {

		  
		   
                $cookie_name = "errores";
				$cookie_value = $pro['sms'];
				setcookie($cookie_name, $cookie_value, time() + 6, "/"); 
                    
		  		?><script language="JavaScript" type="text/javascript">
				location.href = "../Vistas/registro_producto_ventas.php" ;
				</script><?php 
		}
	}else
	{

				 
				$cookie_name = "errores";
				$cookie_value = "faltan datos";
				setcookie($cookie_name, $cookie_value, time() + 6, "/"); 
				
		  ?><script language="JavaScript" type="text/javascript">
				location.href = "../Vistas/registro_producto_ventas.php" ;
				</script><?php 
	}
 ?>