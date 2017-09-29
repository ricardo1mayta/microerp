
       <?php  
             require('../../config.ini.php');
             include("../../Modelo/conexion.php");
             include("../../Modelo/empresas/direccionempresa.php"); 
             ?>
<?php 
					//$respuesta = new stdClass();
					
					 $codigo=$_POST['codigo'];
					 $idipo=$_POST['t_direccion'];
					 $idusu=$_POST['usuario'];
					 $direccion=$_POST['direccion'];
					 $iddis=0;
							

							if($_POST['codigo']!='' and $_POST['direccion'] !='' and $_POST['usuario'] !=''){
 								 $pro = new Direccionempresa();
                       			 $cat=$pro->save_direccionempresa($direccion,$codigo,$iddis,$idipo,$idusu) ;
                       			 
                       			}
							include("listardireccion.php");
					?>
						
    					


