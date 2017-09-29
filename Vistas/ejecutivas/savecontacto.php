 <?php  
              require('../../config.ini.php');
              include("../../Modelo/conexion.php");
              include("../../Modelo/contactos/contactos.php"); ?>
<?php 

							 $nombre=$_REQUEST['nombre'];
							 $apell=$_REQUEST['apellidos'];
							 $cargo=$_REQUEST['cargo'];
							 $direccion=$_REQUEST['direccion'];
					
							 $idusu=$_REQUEST['u'];
							
							 $idemp=$_REQUEST['idemp'];

							if($idemp>0 and $nombre!="" and $apell!="" and $cargo>0){
							$contact=new contactos();	
							 $c=$contact->save_contacto($nombre,$apell,$cargo,$direccion,$idusu,$idemp);
							

								echo $c[0];

							} else {

								echo "Falta Datos en el Contacto";
							}
	
?>