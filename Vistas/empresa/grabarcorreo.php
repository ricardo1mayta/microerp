    
       <?php  
             require('../../config.ini.php');
             include("../../Modelo/conexion.php");
             include("../../Modelo/empresas/correoempresa.php"); ?>
<?php 
					//$respuesta = new stdClass();
					$codigo=$_POST['codigo'];
                    $idtipo=$_POST['t_correo'];
					$correo=$_POST['correo'];
					$idusu=$_POST['usuario'];
					if($_POST['codigo']!='' and $_POST['correo'] !='' and $_POST['usuario'] !=''){
 						 $pro = new Correoempresa();
                        $cat=$pro->save_correoempresa($correo,$codigo,$idusu,$idtipo);
                    		
    				}
                    include("listarcorreos.php");
                    ?>
							
    					


