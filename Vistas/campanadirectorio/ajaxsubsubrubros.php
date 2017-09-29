       <?php  
              require('../../config.ini.php');
              include("../../Modelo/conexion.php");
              include("../../Modelo/campanadirectorio/directoriosubsubrubros.php"); ?>
              
<?php 
					$pro = new Directoriosubsubrubros();
					if(isset($_GET['txt']) ){
						 $tex=$_GET['txt'];
						 
						  if($tex!=''){						  	
		                   			$categoria=$pro->get_allsubrubros($tex);
		                   		
		                     
		                     }else{
		                     	$categoria=$pro-> get_allsubru();
		                     }
                    	 } else{
                          
                         $categoria=$pro-> get_allsubru();
                    	 }
                   
                          while($row=$categoria->fetch_array()){                         	
                         	 ?>
						    <tr>
			         		<td>
			         			<button type="button" class="btn btn-danger btn-xs" data-toggle="modal"  data-target="#eliminarrubro" data-id="<?php echo $row['SSR_C_CODIGO']; ?>"  data-desc="<?php echo $row['SSR_D_DESCRIPCION']; ?>"   ><i class="fa fa-trash-o"></i></button>
			         		</td>
			         		<td><button type="button" class="btn btn-info btn-xs" data-toggle="modal"  data-target="#editarRubro" data-id="<?php echo $row['SSR_C_CODIGO']; ?>" data-sec="<?php echo $row['SRB_C_CODIGO']; ?>"  data-secnm="<?php echo $row['SRB_D_DESCRIPCION']; ?>" data-desc="<?php echo $row['SSR_D_DESCRIPCION']; ?>" ><i class="fa fa-refresh"></i></button></td>
			         		<td><?php echo $row['PAR_D_NOMBRE']; ?></td>
			         		<td><?php echo $row['DRU_D_DESCRIPCION']; ?></td>
			         		<td><?php echo $row['SRB_D_DESCRIPCION']; ?></td>
			         		<td><?php echo $row['SSR_D_DESCRIPCION']; ?></td>
			         		
					          </tr>
						    <?php
                         	}
?>							    

