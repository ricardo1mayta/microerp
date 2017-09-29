       <?php  
              require('../../config.ini.php');
              include("../../Modelo/conexion.php");
              include("../../Modelo/campanadirectorio/directoriorubros.php"); ?>
              
<?php 
					$pro = new Directoriorubros();
					if( isset($_GET['s'])){
						echo '<option >Seleccione</option>';
						  $s=$_GET['s'];
						  
		                     $categoria=$pro-> get_allrubross($s);
		                     	  while($row=$categoria->fetch_array()){                         	
                         	 ?>
						   
			         		
			         		<option value="<?php echo $row['DRU_C_CODIGO']; ?>"><?php echo $row['DRU_D_DESCRIPCION']; ?></option>
			         		
						    <?php
                         	}
		                    
                    	 } else{
                          
                        echo "";
                    	 }
                   
                        
?>							    

