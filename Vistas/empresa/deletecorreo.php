    
       <?php  
             require('../../config.ini.php');
             include("../../Modelo/conexion.php");
             include("../../Modelo/empresas/correoempresa.php"); 
             ?>
<?php 
					//$respuesta = new stdClass();
					
					 $codigo=$_POST['codigo'];
					 $idusu=$_POST['usuario'];
					 $idcore=$_POST['idcore'];
							
					if($_POST['idcore']!='' and $_POST['usuario'] !=''){
							 $pro = new Correoempresa();
                        $cat=$pro->delete_correoempresa($idcore,$idusu);
               			
               			}else{echo "No existe empresa";}

					include("listarcorreos.php");
					?>
							
    					

