<?php 
@include"../Entidades/actividades.php";
$actividades= new Actividades();
$estado=$_POST['estado'];
$idact=$_POST['idact'];
$id=$_REQUEST['id'];


		if($idact!="" and $estado!="")

		{
			$activ=$actividades->set_estadoactividad($idact,$estado);

				if($activ['sms']=="ok") {
				$cookie_name = "errores";
				$cookie_value = $activ['sms'];
				setcookie($cookie_name, $cookie_value, time() + 6, "/"); 
				
		  		?><script language="JavaScript" type="text/javascript">
				location.href = "../Vistas/user_actividades.php?id=<?php echo $id;?>" ;
				</script><?php

				} else {

				$cookie_name = "errores";
				$cookie_value = $activ['sms'];
				setcookie($cookie_name, $cookie_value, time() + 6, "/"); 
				
		  		?><script language="JavaScript" type="text/javascript">
				location.href = "../Vistas/user_actividades.php?id=<?php echo $id;?>" ;
				</script><?php
				}
			}else
			{

				
				$cookie_name = "errores";
				$cookie_value = "Error";
				setcookie($cookie_name, $cookie_value, time() + 6, "/"); 
				
		  		?><script language="JavaScript" type="text/javascript">
				location.href = "../Vistas/user_actividades.php?id=<?php echo $id;?>" ;
				</script><?php
			}
			?>
