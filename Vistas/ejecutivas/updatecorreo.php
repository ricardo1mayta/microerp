       <?php  
              require('../../config.ini.php');
              include("../../Modelo/conexion.php");
              include("../../Modelo/contactos/contactos.php") ?>
              <?php 
							$cor=$_REQUEST["txt_corr"];
							$tipo=$_REQUEST["tipocor"];
							$idusu=$_REQUEST["u"];
							$idcor=$_REQUEST["idcor"];
							$con=new contactos();	
							$co=$con->update_correocontacto($cor,$idusu,$idcor,$tipo);
							echo $co[0].=" Correo Actualizado";
?>

