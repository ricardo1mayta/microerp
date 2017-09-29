<?php 
@include"../Entidades/actividades.php";
$actividades= new Actividades();
echo $estado=$_POST['estado'];
echo $idact=$_POST['idact'];


		if($activ=$actividades->set_estadoactividad($idact,$estado) and $idact!="" and $estado!="")
		{
				
				if($activ['sms']=="ok") {
				  $Session['sms']=$activ['sms'];
				  header("location:../Vistas/user_actividades.php");

				} else {

				  $Session['sms']=$activ['sms'];
				  header("location:../Vistas/user_actividades.php");
				}
			}else
			{

				
				 $Session['sms']="faltan datos";
				 header("location:../Vistas/user_actividades.php");
			}
			?>
