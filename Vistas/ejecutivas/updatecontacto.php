       <?php  
              require('../../config.ini.php');
              include("../../Modelo/conexion.php");
              include("../../Modelo/contactos/contactos.php") ?>
              <?php 
        		$nombre=$_REQUEST["nombre"];
        		$apell=$_REQUEST["apellidos"];
        		$cargo=$_REQUEST["cargo"];
        		$direc=$_REQUEST["direccion"];
        		$idus=$_REQUEST["u"];
        		$idcon=$_REQUEST["idcon"];
	if($idcon>0 ){
							$con=new contactos();	
							$co=$con->update_contacto($nombre,$apell,$cargo,$direc,$idus,$idcon);
							echo $co[0].=" Contacto Actualizado";
		
		

							} else {

								echo "Error";
							}		

	
?>

