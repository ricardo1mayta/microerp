    
       <?php  
             require('../../config.ini.php');
             include("../../Modelo/conexion.php");
             include("../../Modelo/empresas/telefonoempresa.php"); 
             ?>
<?php 
					//$respuesta = new stdClass();
					
					 $codigo=$_POST['codigo'];
					  $idtipo=$_POST['t_telefono'];
					 $idusu=$_POST['usuario'];
					 $telefono=$_POST['telefono'];
							

							if($_POST['codigo']!='' and $_POST['telefono'] !='' and $_POST['usuario'] !=''){
 								 $pro = new Telefonoempresa();
                       			 $cat=$pro->save_telefonoempresa($telefono,$codigo,$idusu,$idtipo);
                       			}
							include("listartelefonos.php");
					?>
						
    					


