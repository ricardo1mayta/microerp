       <?php  
              require('../../config.ini.php');
              include("../../Modelo/conexion.php");
              include("../../Modelo/empresas/empresa.php"); 
              include("../../Modelo/ejecutivas/moduloejecutivas.php"); ?>
<?php 
					$pro = new Empresas();
    					
    					
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
                   
                         while($row=$categoria->fetch_array()){
                         	$codigo=$row['EMP_C_CODIGO'];
						    $rsocial=$row['EMP_D_RAZONSOCIAL'];
						    $nombre=$row['EMP_D_NOMBRECOMERCIAL'];
						    $ruc=$row['EMP_C_RUC'];
						    $min=$row['MIN'];
						     $con=$row['CON'];
						     /* <td>
							         <form action="../detalleEmpresas/" method="POST"> 
								         <input type="hidden" name="codigo" value="<?php echo $codigo; ?>">
								         <input type="submit" class="btn btn-warning btn-xs" value="+">
							         </form>
						         </td>*/
                         	 ?>
						    <tr>
						        
						          <td><?php echo $ruc; ?></td>   
						          <td><?php echo $nombre; ?></td>
						          <td><?php echo $rsocial; ?></td>
						           <td><?php 
						          // if($con==0){ echo '<span class="badge bg-green">Solicitar</span>';}
						          // elseif($con==1){ echo '<span class="badge bg-green">Solicitar</span>';}
						           if ($min==2) { echo '<span class="badge bg-red">Asignado</span>';}
						           else{ echo '<a onclick="solicitar('.$codigo.',36)"><span class="badge bg-green">Solicitar</span></a>';}
						            ?></td>
						            <td><?php 
						           if ($con==2) { echo '<span class="badge bg-red">Asignado</span>';}
						           else{ echo '<a onclick="solicitar('.$codigo.',39)"><span class="badge bg-green">Solicitar</span></a>';}
						            ?></td>

						          
					          </tr>
						    <?php
                         	}
?>							    

