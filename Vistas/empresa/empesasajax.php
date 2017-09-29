       <?php  
              require('../../config.ini.php');
              include("../../Modelo/conexion.php");
              include("../../Modelo/empresas/empresa.php"); ?>
<?php 
					
						 $tex=$_GET['txt'];
						 if($tex!=''){
 						 $pro = new Empresas();
                        
						 $clientes = array(); //creamos un array
                         $categoria=$pro->get_allEmpresas2($tex);
                         while($row=$categoria->fetch_array()){
                         	
                         	$codigo=$row['EMP_C_CODIGO'];
						    $rsocial=$row['EMP_D_RAZONSOCIAL'];
						    $nombre=$row['EMP_D_NOMBRECOMERCIAL'];
						    $ruc=$row['EMP_C_RUC'];
						    
                          	$clientes[] = array('codigo'=> $codigo, 'rsocial'=> $rsocial, 'nombre'=> $nombre, 'ruc'=> $ruc);   
                         }
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