       <?php  
              require('../../config.ini.php');
              include("../../Modelo/conexion.php");
              include("../../Modelo/ejecutivas/moduloejecutivas.php"); ?>
<?php 
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
		    					
		                        $categoria=$pro->get_allEmpresas12($tex,$ini,10,$u);
		                       
		                     
		                     }else{
		                     	$categoria=$pro->get_allEmpresas123($ini,10,$u);
		                     	
		                     }
                    	 } else{
                         $categoria=$pro->get_allEmpresas123($ini,10,$u);
                         
                    	 }
                    	
                         while($row=$categoria->fetch_array()){
                         	
                         	$codigo=$row['EMP_C_CODIGO'];
						    $rsocial=$row['EMP_D_RAZONSOCIAL'];
						    $nombre=$row['EMP_D_NOMBRECOMERCIAL'];
						    $ruc=$row['EMP_C_RUC'];
						    $par=$row['PAR_C_CODIGO'];

						    ?>
						    <tr>
						         <td>
							         <form action="../detalleEmpresas/" method="POST"> 
								         <input type="hidden" name="codigo" value="<?php echo $codigo; ?>">
								         <input type="submit" class="btn btn-warning btn-xs" value="+">
							         </form>
						         </td>
						         <td>
							         <form action="../listarAgenda/" method="POST"> 
								         <input type="hidden" name="codigo" value="<?php echo $codigo; ?>">
								         <input type="submit" class="btn btn-info btn-xs" value="A">
							         </form>
						         </td>
						          <td><?php echo $ruc; ?></td>   
						          <td><?php echo $nombre; ?></td>
						          <td><?php echo $rsocial; ?></td>
						          <td><?php
						          $s = new Moduloejecutivas();
						          $se=$s->get_sectores($codigo,36);
						           while($r=$se->fetch_array()){
						           	echo '<span class="badge bg-yellow">'.$r['PAR_D_DECRIPCION'].'</span>';
						           	/*
						           	if($r['PAR_C_CODIGO']==37){
						           		echo '<span class="badge bg-yellow">'.$r['PAR_D_DECRIPCION'].'</span>';
							           	}else if ($r['PAR_C_CODIGO']==38) {
							           		echo '<span class="badge bg-light-blue">'.$r['PAR_D_DECRIPCION'].'</span>';
							           	}*/
						             } ?>
						          </td>
						          <td><?php
						          $s = new Moduloejecutivas();
						          $se=$s->get_sectores($codigo,39);
						           while($r=$se->fetch_array()){
						           	echo '<span class="badge bg-teal">'.$r['PAR_D_DECRIPCION'].'</span>';
						           	/*
						            	if($r['PAR_C_CODIGO']==40){
						           		echo '<span class="badge bg-teal">'.$r['PAR_D_DECRIPCION'].'</span>';
							           	}else if ($r['PAR_C_CODIGO']==41) {
							           		echo '<span class="badge bg-navy">'.$r['PAR_D_DECRIPCION'].'</span>';
							           	}*/
						             } ?>
						          </td>
					          </tr>
						    <?php
						    
                          	}
?>							    

