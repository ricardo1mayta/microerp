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

   ?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <div class="row">
    <!-- Main content -->
    <div class="col-md-12">
            <?php 
            $secio=new Secciones();
             $act = new Actividades();
             $ussecc=$secio->get_Userseciones($idus);
                          
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
                    <div class="box-header with-border">
                      <h3 class="box-title">Actividades Programadas </h3>
                    </div>
                    <div class="box-body">
                        <table id="" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                          <th>Intem</th>
                          <th>Actividad</th>
                          <th>Descripción</th>
                          <th>Estado</th>
                        </tr>
                        </thead>
                        <tbody>
                         <?php 
                          
                           $dpa=$act->get_actividadesEtapas($idus,$listas['ETA_C_CODIGO']);
                          
                                 while($lista=mysql_fetch_array($dpa))
                                 {  

                                     ?>
                                     
                              <tr>
                                <td><?php echo $lista['ACT_C_CODIGO']?></td>
                                <td><?php echo $lista['ACT_D_NOMBRE']?></td>
                                <td><?php echo $lista['ACT_D_DESCRIPCION']?></td>
                                <td>
                                
                                <?php 
                                   if($lista['ACT_E_ESTADO']==1){
                                ?>
                                   <div class="box-footer ">
                                   <form action="../Control/control_iniciarActividad.php" method="POST" >
                                      <input type="hidden" name="idact" value="<?php echo $lista['ACT_C_CODIGO']?>">
                                       <input type="hidden" name="estado" value="2">
                                      <button type="submit" class="btn btn-success" >Iniciar</button>
                                      
                                      </form>
                                  </div>
                                  <?php }else{?>
                                    <form action="../Control/control_iniciarActividad.php" method="POST" >
                                        <div class="box-footer ">
                                        <input type="hidden" name="idact" value="<?php echo $lista['ACT_C_CODIGO']?>">
                                         <input type="hidden" name="estado" value="3">
                                         
                                          <button type="submit" class="btn btn-warning">Fin</button> 
                                        </form>
                                    </div>
                                    <?php }?>
                                </td>
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
              <!-- /.box -->
            <?php } ?>
            
      </div>
      <div class="col-md-12">
            

              <!-- Default box -->
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Resumen Global</h3>

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
                        <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                          <th>Usuario</th>
                          <th>Avance</th>
                          <th>Carga</th>
                         
                        </tr>
                        </thead>
                        <tbody>
                         <?php 

                         $nombre_archivo = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
                        //verificamos si en la ruta nos han indicado el directorio en el que se encuentra
                        if ( strpos($nombre_archivo, '/') !== FALSE )
                            //de ser asi, lo eliminamos, y solamente nos quedamos con el nombre y su extension
                            $nombre_archivo = array_pop(explode('/', $nombre_archivo));

                        echo $nombre_archivo;

                         /*
                           $act = new Actividades();
                                 $dpa=$act->get_Allactividades($noms);
                                 while($lista=mysql_fetch_array($dpa))
                                 {  

                                     ?>
                                     
                              <tr>
                                <td><?php echo $lista['ACT_C_CODIGO']?></td>
                                <td><?php echo $lista['ACT_D_NOMBRE']?></td>
                                <td><?php echo $lista['ACT_D_DESCRIPCION']?></td>
                                
                                <td> 
                               
                                </td>
                                
                              </tr>
                          <?php 
                            }*/
                          ?>
                        
                        </tbody>
                                      
                      </table>
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
@include_once('links/scrips.php');
@include_once('links/inferior_depues_cuerpo.php');?>