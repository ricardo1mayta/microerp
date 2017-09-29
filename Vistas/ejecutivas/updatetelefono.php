       <?php  
              require('../../config.ini.php');
              include("../../Modelo/conexion.php");
              include("../../Modelo/contactos/contactos.php") ?>
              <?php 
        

							
							 $tel=$_REQUEST["txt_tel"];
							 $tipotel=$_REQUEST["tipotel"];
							 $idusu=$_REQUEST["u"];
							 $idtel=$_REQUEST["idtel"];
							$con=new contactos();	
							$co=$con->update_numtelefono($idtel,$tel,$idusu,$tipotel);
							echo $co[0].=" Telefono Actualizado";
									

	
?>

