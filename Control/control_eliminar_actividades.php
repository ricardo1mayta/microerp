<?php session_start();
 	 @include("../Entidades/actividades.php");

			$id=$_POST['idact'];
			
		if ($id>0) {
          

		$sec=new Actividades();
			
              
			$pro=$sec->delite_actividad($id);
				if($pro['sms']=="ok") {
				 
				  $url="../Vistas/registro_actividades.php?noms=".$pro['PRY_C_CODIGO'];
				  $cookie_name = "errores";
				   $cookie_value = $pro['sms'];
				setcookie($cookie_name, $cookie_value, time() + 2, "/"); 
				
		  		?><script language="JavaScript" type="text/javascript">
				location.href = '<?=$url;?>';
				</script><?php
				 

				} else {

				  
				  $url="../Vistas/registro_actividadesphp?noms=".$pro['PRY_C_CODIGO'];
				  $cookie_name = "errores";
				 $cookie_value = $pro['sms'];
				  setcookie($cookie_name,$cookie_value,time() + 2, "/"); 
				
					?><script language="JavaScript" type="text/javascript">
					location.href = '<?=$url;?>';
					</script> <?php }
				
			}else
			{

				
				 $url="../Vistas/registro_actividades.php?noms=".$pro['PRY_C_CODIGO'];
				  $cookie_name = "errores";
				  $cookie_value = "FALTAN DATOS";
				  setcookie($cookie_name, $cookie_value, time() + 6, "/"); 
				
					?><script language="JavaScript" type="text/javascript">
					location.href = '<?=$url;?>';
					</script><?php
					
			}

?>