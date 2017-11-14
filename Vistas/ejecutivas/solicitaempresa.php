    
       <?php  
             require('../../config.ini.php');
             include("../../Modelo/conexion.php");
             include("../../Modelo/empresas/empresa.php");  
          	
					
					 $idemp=$_POST['e'];
					 $idusu=$_POST['u'];
					 $p=$_POST['p'];
					 					
					 $pro = new Empresas();
                     $cat=$pro->set_solicitarempresa($idemp,$idusu,$p);
               		echo $cat[0];	
               			
					?>
							
    					

