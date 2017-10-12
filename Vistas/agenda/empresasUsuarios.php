       <?php  
              require('../../config.ini.php');
              include("../../Modelo/conexion.php");
              include("../../Modelo/ejecutivas/moduloejecutivas.php");
               //include("../../Modelo/empresas/empresa.php"); ?>
<?php 
					//$pro = new Moduloejecutivas();
					$pro = new Moduloejecutivas();

					$u=$_GET['u'];
    					
						if(isset($_GET['limit'])){
    						(int)$ini=$_GET['limit'];
    						$intevalo=10;
    					}else
    					{
    						$ini=0;
    						$intevalo=10;
    						
    					}

    					if(isset($_GET['txt'])){
						 $tex=$_GET['txt'];
						  if($tex!=''){
		    					
		                        //$categoria=$pro->get_allEmpresas12($tex,0,10,$u);
						  	$categoria=$pro->get_empresaNombre($tex,$u);
		                        while($row=$categoria->fetch_array()){
                         	
                         	$codigo=$row['EMP_C_CODIGO'];
						    $rsocial=$row['EMP_D_RAZONSOCIAL'];
						    $nombre=$row['EMP_D_NOMBRECOMERCIAL'];
						    $ruc=$row['EMP_C_RUC'];
						    $par=$row['PAR_C_CODIGO'];

						    ?>
						    
						         
						          <a onclick="link(<?php echo $codigo; ?>,'<?php echo $rsocial; ?>')"><?php echo  $rsocial." | ".$ruc." |"; ?></a><br>
						         
						          
					          
						    <?php
						    
                          	}
		                     
		                     }
		                     echo "datos econtrados";
                    	 } else{
                         echo "sin datos";
                         
                    	 }
                    	
                        
?>							    

