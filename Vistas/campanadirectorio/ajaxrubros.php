       <?php  
              require('../../config.ini.php');
              include("../../Modelo/conexion.php");
              include("../../Modelo/campanadirectorio/directoriorubros.php"); ?>
              
<?php 
					$pro = new Directoriorubros();
					if(isset($_GET['txt']) and isset($_GET['s'])){
						 $tex=$_GET['txt'];
						  $s=$_GET['s'];
						  if($tex!=''){
						  	if($s>0){
		    					$categoria=$pro->get_allgendaus($tex,$s);	
		                   		}else{
		                   			$categoria=$pro->get_rubros($tex);
		                   		}
		                       
		                     
		                     }else  if ($s>0){
		                     	$categoria=$pro-> get_allrubross($s);
		                     	
		                     } else{
		                     	$categoria=$pro-> get_allrubros();
		                     }
                    	 } else{
                          
                         $categoria=$pro-> get_allrubros();
                    	 }
                   
                          while($row=$categoria->fetch_array()){                         	
                         	 ?>
						    <tr>
			         		<td>
			         			<button type="button" class="btn btn-danger btn-xs" data-toggle="modal"  data-target="#eliminarrubro" data-id="<?php echo $row['DRU_C_CODIGO']; ?>"  data-desc="<?php echo $row['DRU_D_DESCRIPCION']; ?>"   ><i class="fa fa-trash-o"></i></button>
			         		</td>
			         		<td><button type="button" class="btn btn-info btn-xs" data-toggle="modal"  data-target="#editarRubro" data-id="<?php echo $row['DRU_C_CODIGO']; ?>" data-sec="<?php echo $row['SEC_C_CODIGO']; ?>"  data-secnm="<?php echo $row['PAR_D_NOMBRE']; ?>" data-desc="<?php echo $row['DRU_D_DESCRIPCION']; ?>" ><i class="fa fa-refresh"></i></button></td>
			         		<td><?php echo $row['PAR_D_NOMBRE']; ?></td>
			         		<td><?php echo $row['DRU_D_DESCRIPCION']; ?></td>
			         		
					          </tr>
						    <?php
                         	}
?>							    

