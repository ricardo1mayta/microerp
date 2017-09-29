    
       <?php  
             require('../../config.ini.php');
             include("../../Modelo/conexion.php");
             include("../../Modelo/empresas/direccionempresa.php"); 
             ?>
<?php 
					//$respuesta = new stdClass();
					
					 $codigo=$_POST['codigo'];
					 $idusu=$_POST['usuario'];
					 $iddir=$_POST['iddir'];
							
					if($_POST['iddir']!='' and $_POST['usuario'] !=''){
							 $pro = new Direccionempresa();
                        $cat=$pro->delete_direccionempresa($iddir,$idusu);
               			
               			}else{echo "No existe empresa";}

					include("listardireccion.php");
					?>
							
    					

