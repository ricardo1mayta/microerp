       <?php  
              require('../../config.ini.php');
              include("../../Modelo/conexion.php");
              include("../../Modelo/contactos/contactos.php") ?>
              <?php 
        

							
							$cor=$_REQUEST["txt_corr"];
							$tipo=$_REQUEST["tipocorr"];
							$us=$_REQUEST["u"];
							$cont=$_REQUEST["idcon"];
							$con=new contactos();	
							$co=$con->save_correo($cor,$cont,$tipo,$us);
							echo $co[0].=" Correo Guardado";
									

	
?>

