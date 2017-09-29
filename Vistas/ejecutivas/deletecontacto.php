       <?php  
              require('../../config.ini.php');
              include("../../Modelo/conexion.php");
              include("../../Modelo/contactos/contactos.php") ?>
              <?php 
        		 $idus=$_REQUEST["u"];
        		 $idcon=$_REQUEST["c"];
	         if($idcon>0 ){
							$con=new contactos();	
							$co=$con->delete_contacto($idcon,$idus);
							echo $co[0].=" Contacto Eliminado";
		
		

							} else {

								echo "Error";
							}		

	
?>

