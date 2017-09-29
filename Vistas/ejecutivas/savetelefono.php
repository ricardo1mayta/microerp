       <?php  
              require('../../config.ini.php');
              include("../../Modelo/conexion.php");
              include("../../Modelo/contactos/contactos.php") ?>
              <?php 
        

							
							$tel=$_REQUEST["txt_telefono"];
							$tipo=$_REQUEST["cbx_tipotel"];
							$idusu=$_REQUEST["u"];
							$idcon=$_REQUEST["idcon"];
							$con=new contactos();	
							$co=$con->save_telefono($tel,$tipo,$idcon,$idusu);
							echo $ms.="Telefono Guardado";
									

	
?>

