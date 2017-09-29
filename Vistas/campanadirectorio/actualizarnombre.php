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
						  
		                    $p=$pro-> edita_dirnombre($e,$n,$u,$p);
		                  if($p['sms']=='ok'){
																					
										  // $url="../Vistas/registro_secciones.php?nom=".$nomproy;
										$sms='<div id="men" >
			                            <span class="label label-success">'.$p['sms'].' Actualizado </span></td></div>';

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
              <h4 class="box-title">Nombre para el Directorio</h4>
            </div>
            <div class="box-body">
              <form action=""  id="dirnombre">
                            
               <div class="form-group col-md-8" >
                  
                  <input type="text" name="n" class="form-control" value="<?php echo $emp['EMP_D_NOMBRECOMERCIAL'];?>">
              </div>
              <div class="form-group col-md-2">
                  <div class="radio">
                  <label>Pagante:  </label>
                  	<?php if($sms['pagante']==1){?>
                    <label>
                      <input type="radio" name="paga" id="optionsRadios1" value="Si" required="required" checked>
                    Si
                    </label>
                    <?php } else { ?>
                     <label>
                      <input type="radio" name="paga" id="optionsRadios1" value="Si" required="required" >
                      Si
                    </label>
                    <?php } ?>
                    <?php if($sms['pagante']==1){?>
                    <label>
                      <input type="radio" name="paga" id="optionsRadios1" value="No" required="required">
                    No
                    </label>
                    <?php } else { ?>
                     <label>
                      <input type="radio" name="paga" id="optionsRadios1" value="No" required="required"  checked>
                      No
                    </label>
                    <?php } ?>
                  </div>
                             
                </div>
              <div class="form-group col-md-2">
              <input type="text" name="u"  value="<?php echo $u;?>">
                  <input type="text" name="e"  value="<?php echo $e;?>">
                  <input type="button" name="" class="btn btn-success" value="Agregar" onclick="agregar()">
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

