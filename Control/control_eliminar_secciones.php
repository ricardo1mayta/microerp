<?php session_start();
 	 @include("../Entidades/secciones.php");

			 $id=$_POST['ideta'];
			
		if ($id>0) {
          

		$sec=new Secciones();
			if(isset($_SESSION['proyecto'])){
                  $nomp=$_SESSION['proyecto'];
                }else{
                $_SESSION['proyecto']=$nomp;
              }
			$pro=$sec->delite_seccion($id);
				if($pro['sms']=="ok") {
				 
				   $url="../Vistas/registro_secciones.php?nom=".$pro['PRY_C_CODIGO'];
				  $cookie_name = "errores";
				  $cookie_value = $pro['sms'];
				setcookie($cookie_name, $cookie_value, time() + 6, "/"); 
				
		  		?><script language="JavaScript" type="text/javascript">
				location.href = '<?=$url;?>';
				</script><?php
				 

				} else {

				  
				  $url="../Vistas/registro_secciones.php?nom=".$pro['PRY_C_CODIGO'];
				  $cookie_name = "errores";
				  $cookie_value = $pro['sms'];
				  setcookie($cookie_name,$cookie_value,time() + 6, "/"); 
				
					?><script language="JavaScript" type="text/javascript">
					location.href = '<?=$url;?>';
					</script><?php
				}
			}else
			{

				
				 $url="../Vistas/registro_secciones.php?nom=".$pro['PRY_C_CODIGO'];
				  $cookie_name = "errores";
				  $cookie_value = "FALTAN DATOS";
				  setcookie($cookie_name, $cookie_value, time() + 6, "/"); 
				
					?><script language="JavaScript" type="text/javascript">
					location.href = '<?=$url;?>';
					</script><?php

			}

?>