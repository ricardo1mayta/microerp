<?php 
include"../Entidades/detalleProducto.php";
	$producto = new DetProducto();
	 $idprod=$_POST['producto'];
	 $nombre=$_POST['nompro'];
	 $cant=$_POST['cant'];
	 $prec=$_POST['prec'];
	 
	
	if($nombre!="" and $idprod>=1){
	$pro=$producto->guardar_detproductos_ventas($nombre,$cant,$prec,$idprod);
		if($pro['sms']=="ok") {
		 
		  		$cookie_name = "errores";
				$cookie_value = $pro['sms'];
				setcookie($cookie_name, $cookie_value, time() + 6, "/"); 
				
		  		?><script language="JavaScript" type="text/javascript">
				location.href = "../Vistas/RegistrodetalleProductos.php" ;
				</script><?php
				
		  

		} else {

		  
		   
                $cookie_name = "errores";
				$cookie_value = $pro['sms'];
				setcookie($cookie_name, $cookie_value, time() + 6, "/"); 
                    
		  		?><script language="JavaScript" type="text/javascript">
				location.href = "../Vistas/RegistrodetalleProductos.php" ;
				</script><?php 
		}
	}else
	{

				 
				$cookie_name = "errores";
				$cookie_value = "faltan datos";
				setcookie($cookie_name, $cookie_value, time() + 6, "/"); 
				
		  ?><script language="JavaScript" type="text/javascript">
				location.href = "../Vistas/RegistrodetalleProductos.php" ;
				</script><?php 
	}
 ?>