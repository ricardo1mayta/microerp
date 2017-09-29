       <?php  
              require('../../config.ini.php');
              include("../../Modelo/conexion.php");
              include("../../Modelo/campanadirectorio/directoriosubrubros.php"); ?>
              <option value="">Seleccione</option>
<?php 				

					$pro = new Directoriosubrubros();
					if( isset($_GET['s'])){
											  $s=$_GET['s'];
						  
		                     $categoria=$pro-> get_allsubrubross($s);
		                     	  while($row=$categoria->fetch_array()){                         	
                         	 ?>
						   
			         		
			         		<option value="<?php echo $row['SRB_C_CODIGO']; ?>"><?php echo $row['SRB_D_DESCRIPCION']; ?></option>
			         		
						    <?php 
                         	}
		                    
                    	 } else{
                          
                        echo "<option>no existe</option>";
                    	 }
                   
                        
?>