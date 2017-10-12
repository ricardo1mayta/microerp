       <?php  
              require('../../config.ini.php');
              include("../../Modelo/conexion.php");
              include("../../Modelo/empresas/cartera.php"); ?>
<?php 
					$pro = new Cartera();
    					if(isset($_GET['codigo'])){
						 $idemp=$_GET['codigo'];
						      
						  	$categoria=$pro->get_contactosempresa($idemp);
		                        while($row=$categoria->fetch_array()){
                         	$codigo=$row['CON_C_CODIGO'];
						    $nombre=$row['NOMBRE'];
						    ?>
						      <option value="<?php echo $codigo;?>"><?php echo  $nombre;?></option>
						    <?php
						    
		                     }
		                     echo "datos econtrados";
                    	 } else{
                         echo "sin datos";
                         
                    	 }
                    	
                        
?>							    

