    
       <?php  
             require('../../config.ini.php');
             include("../../Modelo/conexion.php");
             include("../../Modelo/empresas/telefonoempresa.php"); 
             ?>
<?php 
					//$respuesta = new stdClass();
					
					 $codigo=$_POST['codigo'];
					 $idusu=$_POST['usuario'];
					 $idtel=$_POST['idtel'];
							
					if($_POST['idtel']!='' and $_POST['usuario'] !=''){
							 $pro = new Telefonoempresa();
               			 $cat=$pro->delete_telefonoempresa($idtel,$idusu);
               			 
               			}
					include("listartelefonos.php");
					?>
							
    					


