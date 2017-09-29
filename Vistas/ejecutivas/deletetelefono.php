       <?php  
              require('../../config.ini.php');
              include("../../Modelo/conexion.php");
              include("../../Modelo/contactos/contactos.php") ?>
              <?php 
        

							
							
							$idusu=$_REQUEST["u"];
							$idtel=$_REQUEST["t"];
							$con=new contactos();	
							$co=$con->delete_numtelefono($idtel,$idusu);
							echo $co[0].=" Telefono eliminado";
									

	
?>
