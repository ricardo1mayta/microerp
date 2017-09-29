       <?php  
              require('../../config.ini.php');
              include("../../Modelo/conexion.php");
              include("../../Modelo/contactos/contactos.php") ?>
              <?php 
        
							$idusu=$_REQUEST["u"];
							$idtel=$_REQUEST["c"];
							$con=new contactos();	
							$co=$con->delete_correocontacto($idtel,$idusu);
							echo $co[0].=" Correo eliminado";
									

	
?>
