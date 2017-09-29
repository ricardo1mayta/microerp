   <?php 

      @include('links/titulo.php'); 
      @include('links/links.php'); 
      @include('links/header_menu.php');

      @include("../Entidades/generico.php");
      @include("../Entidades/parametros.php");
      @include("../Entidades/detParametros.php");
      @include("../Entidades/producto.php");
      @include("../Entidades/usuario.php");
      @include("../Entidades/proyecto.php");
      @include("../Entidades/secciones.php");
      @include("../Entidades/actividades.php");

      $idus=$usuario['US_C_CODIGO'];
      if(isset($_REQUEST['id'])){
        $id=$_REQUEST['id'];
              }

   ?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  
      <!-- /.row -->
   <div class="row">
    <!-- Main content -->
    <div class="col-md-8">
            <?php 
            $secio=new Secciones();
             $act = new Actividades();
             $ussecc=$secio->get_Userseciones($idus,$id);
                          
                                 while($listas=mysql_fetch_array($ussecc))
                                 {  

             ?>
              <!-- Default box -->
              <div class="box">
                <div class="box-header with-border">
                  <strong><h3 class="box-title "><?php echo $listas['NOMBRE'] ?></h3></strong>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                      <i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                
                  <div class="col-md-12">
                              
                  <!-- general form elements disabled -->
                  <div class="box box-warning sombra">
                   
                    <div class="box-body">
                    <ul class="nav nav-tabs">
                      <li class="active"><a href="#tab_1<?php echo $listas['ETA_C_CODIGO'] ?>" data-toggle="tab">Actividades Programadas</a></li>
                      <li><a href="#tab_2<?php echo $listas['ETA_C_CODIGO'] ?>" data-toggle="tab">Actividades Finalizadas</a></li>
                                         
                    </ul>
                    <div class="tab-content">
                      <div class="tab-pane active" id="tab_1<?php echo $listas['ETA_C_CODIGO'] ?>">
                       <div class="table-responsive" >
                          <table id="" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                              <th width="50">Estado</th>
                             
                              <th>Actividad</th>
                              <th>Descripción</th>
                              
                            </tr>
                            </thead>
                            <tbody>
                             <?php 
                              
                               $dpa=$act->get_actividadesEtapas($idus,$listas['ETA_C_CODIGO']);
                              
                                     while($lista=mysql_fetch_array($dpa))
                                     {  

                                         ?>
                                         
                                  <tr>
                                    <td>
                                    
                                    <?php 
                                       if($lista['ACT_E_ESTADO']==1){
                                    ?>
                                       <div class="box-footer ">
                                       <form action="../Control/control_iniciarActividad.php?id=<?php echo $id;?>" method="POST" >
                                          <input type="hidden" name="idact" value="<?php echo $lista['ACT_C_CODIGO']?>">
                                           <input type="hidden" name="estado" value="2">
                                          <button type="submit" class="btn btn-success" title="Iniciar" ><i class="fa  fa-power-off" ></i></button>
                                          
                                          </form>
                                      </div>
                                      <?php }else{?>
                                        <form action="../Control/control_iniciarActividad.php?id=<?php echo $id;?>" method="POST" >
                                            <div class="box-footer ">
                                            <input type="hidden" name="idact" value="<?php echo $lista['ACT_C_CODIGO']?>">
                                             <input type="hidden" name="estado" value="3">
                                             
                                              <button type="submit" class="btn btn-danger" title="Fin" ><i class="fa  fa-power-off" ></i></button> 
                                            </form>
                                        </div>
                                        <?php }?>
                                    </td>
                                   
                                    <td><?php echo $lista['ACT_D_NOMBRE']?></td>
                                    <td><?php echo $lista['ACT_D_DESCRIPCION']?></td>
                                    
                                  </tr>
                              <?php 
                                }
                              ?>
                        
                            </tbody>
                                      
                          </table>
                        </div>
                      </div> 
                      <div class="tab-pane active" id="tab_2<?php echo $listas['ETA_C_CODIGO'] ?>">
                       <div class="table-responsive" >
                          <table id="" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                              <th width="50">Estado</th>
                              
                              <th>Actividad</th>
                              <th>Descripción</th>
                              
                            </tr>
                            </thead>
                            <tbody>
                             <?php 
                              
                               $dpa=$act->get_actividadesEtapas2($idus,$listas['ETA_C_CODIGO']);
                              
                                     while($lista=mysql_fetch_array($dpa))
                                     {  
                                      
                                         ?>
                                        
                                        <tr>
                                          <td>Finalizada</td>
                                          
                                          <td><?php echo $lista['ACT_D_NOMBRE']?></td>
                                          <td><?php echo $lista['ACT_D_DESCRIPCION']?></td>
                                          
                                        </tr>
                                      <?php 
                                        }
                                      
                                      ?>
                        
                              </tbody>
                                        
                            </table>
                          </div>
                        </div>           
                      </div>
                    </div>
                   </div>
                  </div>
                </div>
               </div>
              <!-- /.box -->
            <?php } ?>
            
      </div>
     <div class="col-md-4">
            

              <!-- Default box -->
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">% de Act. Finalizadas</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                      <i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  
                  <div class="col-md-12">
                              
                  <!-- general form elements disabled -->
                  <div class="box box-warning sombra">
                    <div class="box-body">
                       <div class="text-center" >
                        <?php $act = new Actividades();
                        $s=$act->avance_user($id,$usuario['US_C_CODIGO']);?>
                              <input type="text"  class="knob"  value="<?php echo $s['AVANCE']?>" data-width="180" data-height="180" data-fgColor="#00a65a"  data-readonly="true">
                              

                              <div style="position:relative;top:-130px;left:45px;z-index:5;font-size:40px;font:arial;color:#00a65a;"><strong>%<strong></div>
                       </div>

                    </div>

                    <div class="box-body">
                        
                    </div>           
                   
                   </div>
                  <!-- /.box -->
                  </div>
                </div>
               
              </div>
              <!-- /.box -->

           
      </div>
    <!-- /.content -->
    </div>

  </div>
   
  <!-- /.content-wrapper -->
  
  

<?php
@include_once('links/footer.php');
@include_once('links/ajustes_generales.php');
//@include_once('links/scrips.php');
@include_once('links/scrip_chart.php');
@include_once('links/inferior_depues_cuerpo.php');?>
