       <?php  
              require('../../config.ini.php');
              include("../../Modelo/conexion.php");
              include("../../Modelo/empresas/empresa.php"); ?>
<?php 
					$pro = new Empresas();
    					$clientes = array();
    					
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
		    					
		                        $categoria=$pro->get_allEmpresas12($tex,$ini,10);
		                       
		                     
		                     }else{
		                     	$categoria=$pro->get_allEmpresas123($ini,10);
		                     	
		                     }
                    	 } else{
                         $categoria=$pro->get_allEmpresas123($ini,10);
                         
                    	 }
                    	 $total=$datos[0];
                         while($row=$categoria->fetch_array()){
                         	
                         	$codigo=$row['EMP_C_CODIGO'];
						    $rsocial=$row['EMP_D_RAZONSOCIAL'];
						    $nombre=$row['EMP_D_NOMBRECOMERCIAL'];
						    $ruc=$row['EMP_C_RUC'];
						    
                          	$clientes[] = array('codigo'=> $codigo, 'rsocial'=> $rsocial, 'nombre'=> $nombre, 'ruc'=> $ruc);  
                          	} 
							//Creamos el JSON
							$json_string = json_encode($clientes);

							echo $json_string;
							


						
							//Si queremos crear un archivo json, sería de esta forma:
							/*
							$file = 'clientes.json';
							file_put_contents($file, $json_string);
							*/
?>							    

