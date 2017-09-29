       <?php  
              require('../../config.ini.php');
              include("../../Modelo/conexion.php");
              include("../../Modelo/campanadirectorio/directorio.php"); ?>
              
<?php 
					
					if(isset($_GET['idemp']) and isset($_GET['subr']) and isset($_GET['u'])){
						 $subr=$_GET['subr'];
						 $ss=$_GET['ss'];
						 
						 $idemp=$_GET['idemp'];
						 $u=$_GET['u'];
						 if($subr>0 and $idemp>0){
						 $pro = new Directorio();
                         $s=$pro->agrega_subrempresa($subr,$idemp,$u,$ss);
                         	if($s[0]=="ok"){
                        	 echo '<tr><td colspan="4"><span class="badge bg-green">'.$s[0].'</span></td></tr>';
                    		 }else{
                    		 	echo '<tr><td colspan="4"><span class="badge bg-red">'.$s[0].'</span></td></tr>';
                    		 }
                         }
                    	 } 
                    	 	 $idemp=$_GET['idemp'];
                    	 $p= new Directorio();
                         $categoria=$p->get_subrubros($idemp);
                   
                          while($row=$categoria->fetch_array()){                         	
                         	 ?>
						    <tr>
			         		<td>
			         			<button type="button" class="btn btn-danger btn-xs" data-toggle="modal"  data-target="#eliminarrubro" data-id="<?php echo $row['DEMP_C_CODIGO']; ?>" data-codigo="<?php echo $idemp; ?>" ><i class="fa fa-trash-o"></i></button>			         			
			         		</td>

			         		<td><?php echo $row[PAR_D_NOMBRE]; ?></td>
			         		<td><?php echo $row[DRU_D_DESCRIPCION]; ?></td>
			         		<td><?php echo $row[SRB_D_DESCRIPCION]; ?></td>
			         		<td><?php echo $row[SSR_D_DESCRIPCION]; ?></td>
			         		
			         		
					          </tr>
						    <?php
                         	}
?>							    

