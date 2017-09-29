     <?php  
              require('../../config.ini.php');
              include("../../Modelo/conexion.php");
              include("../../Modelo/campanadirectorio/directoriosubsubrubros.php"); 
              $pro = new Directoriosubsubrubros();
					if( isset($_GET['s']) ){
							$s=$_GET['s'];

						  
		                     $categoria=$pro->get_allsubsubsubru($s);
		                                         
		                     

              ?>
            
              <option value="">Seleccione</option>
              
<?php 				

					
		                     	  while($row=$categoria->fetch_array()){                         	
                         	 ?>
						       		
			         		<option value="<?php echo $row['SSR_C_CODIGO']; ?>"><?php echo $row['SSR_D_DESCRIPCION']; ?></option>
			         		
						    <?php 
						
                         	}
		                    
                    	 } else{
                          
                        
                    	 }
                   
                        
?>
