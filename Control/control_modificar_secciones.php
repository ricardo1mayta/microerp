<?php session_start();
 	 @include("../Entidades/secciones.php");

			 $id=$_POST['id'];
			 $titulo=$_POST['titulo'];
			 $descripcion=$_POST['descripcion'];	

			if($_POST['categoria']>0)
			{
				 $categoria=$_POST['categoria'];
			
			}else{
				 $categoria=$_POST['categoria1'];
			}

			if($_POST['user']>0){
				 $user=$_POST['user'];
			
			}else{
				 $user=$_POST['responsable1'];
			}
		if ($id>0 && $titulo!="" && $descripcion!="" && $user>0) {
          

		$sec=new Secciones();
			if(isset($_SESSION['proyecto'])){
                  $nomp=$_SESSION['proyecto'];
                }else{
                $_SESSION['proyecto']=$nomp;
              }
			$pro=$sec->update_seccion($categoria,$titulo,$descripcion,$user,$id);
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
				/*
					?><script language="JavaScript" type="text/javascript">
					location.href = '<?=$url;?>';
					</script><?php*/
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