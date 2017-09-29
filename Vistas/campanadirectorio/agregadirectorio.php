       <?php  
              require('../../config.ini.php');
              include("../../Modelo/conexion.php");
              include("../../Modelo/campanadirectorio/directorio.php"); ?>
              
<?php 
					$pro = new Directorio();
					if( !empty($_GET['e']) and !empty($_GET['u']) and !empty($_GET['n'])) {
						
						echo   $e=$_GET['e'];
						echo   $n=$_GET['n'];
						echo   $u=$_GET['u'];
						echo   $p=$_GET['paga'];
						echo   $dir=$_GET['dir'];
						  
		                    $p=$pro-> agrega_dire($e,$n,$u,$p,$dir);
		                  if($p['sms']=='ok'){
																					
										  // $url="../Vistas/registro_secciones.php?nom=".$nomproy;
										$sms='<div id="men" >
			                            <span class="label label-success">'.$p['sms'].' Agregado </span></td></div>';

									}
									else{
										$sms=' <div id="men" >
			                              <span class="label label-danger">'.$p['sms'].'</span></td></div>';
			                           
									} 
		                   /*
		                     	  while($row=$categoria->fetch_array()){  */                       	
                         	 ?>
						   
			         		
			         		<div class="box box-solid">

					            <div class="box-header with-border">
					              <h4 class="box-title">Nombre para el Directorio </h4>
					              <div class="box-tools pull-right">
					               <h4><?php echo $sms; ?></h4>
					               
					              </div>
					            </div>
					            <div class="box-body">
					              <form action="" method="POST">
					                            
					               <div class="form-group col-md-8" >
					                  <label><?php echo $p['nombre']?></label>
					                
					              </div>
					              <div class="form-group col-md-2">
					              
					                  <input type="hidden" name="evento"  value="agregar">
					                  <input type="image"  src="../Public/img/Sistema/edit.png"  onclick="editar();  return false;">
					              </div>
					             </form>
					            </div>
					            <!-- /.box-body -->
					          </div>
			         		
						    <?php
                         	
		                    
                    	 } else{
                          
                        echo "nada";
                    	 }
                   
                        
?>							    

