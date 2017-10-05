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



         if(isset($_GET["noms"]))
         {
          $noms=$_GET["noms"];
          }else
          {
            $noms="";
        }
   ?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <div class="row">
    <!-- Main content -->
    <div class="col-md-8">
            

              <!-- Default box -->
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title"><?php 
                        $sec=new Secciones();

                        echo $sec->get_secciones($noms)?> - Registro de Actividades</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                      <i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  
                                
                    <!-- general form elements disabled -->
                    <div class="box box-warning">
                     

                      <form role="form" name="form1" action="../Control/control_actividades.php" method="POST" >
                          <div class="box-body">
                                 
                                <div class="form-group col-md-3">
                                    <label>Actividad</label>

                                    <input type="hidden"   name="idsecc" id="idsecc" value='<?php echo $noms ?>'>
                                    <input type="text" class="form-control"  name="nomact" id="nomact"  placeholder="Nombre de la actividades"  required>
                                  </div>
                                  <div class="form-group col-md-3">
                                    <label>Descripcion</label>
                                    <input type="text" class="form-control"  name="desact" id="desact"  placeholder="Descripcion"  required>
                                  </div>
                                   
                                  <div class="form-group col-md-3">
                                   <label>Responsable</label>
                                     <select class="form-control" name="user" id="user" >
                                     <option>-Seleccione-</option>
                                      <?php 
                                       $u = new User();
                                       $us=$u->lista_usuarios();
                                       while($usr=mysql_fetch_array($us)){  
                                           ?>
                                                <option value="<?php echo $usr["US_C_CODIGO"]?>"><?php echo $usr["US_D_NOMBRE"]." ".$usr["US_D_APELL"]?></option>
                                                           
                                        <?php }?>
                                      </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Duración</label>
                                         <select class="form-control" name="dur" id="dur" >
                                         <option>0</option>
                                          <?php 
                                                for ($i = 1; $i <= 10; $i++) {
                                                 echo " <option value='".$i."' >".$i."</option>";
                                                  }
                                           ?>
                                          </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Dificultad</label>
                                         <select class="form-control" name="dif" id="dif" >
                                         <option>0</option>
                                          <?php 
                                                for ($i = 1; $i <= 10; $i++) {
                                                 echo " <option value='".$i."' >".$i."</option>";
                                                  }
                                           ?>
                                          </select>
                                    </div>
                                    <div class="box-footer col-md-2">
                                     <br>
                                       <button type="submit" class="btn btn-primary">Guardar Actividad</button> 
                                  </div>

                                     
                             
                            </div>
                          
                      </form>
                     </div>
                    <!-- /.box -->
                  
                 
                </div>
                <!-- /.box-body -->
               
                <!-- /.box-footer-->
              </div>
              <!-- /.box -->

            
            

              <!-- Default box -->
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title"><?php 
                        $sec=new Secciones();

                        echo $sec->get_secciones($noms)?> - Actividades Programadas</h3>

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
                          <th>Intem</th>
                          <th>Actividad</th>
                          <th>Descripción</th>
                          <th>F_inicio</th>
                          <th>F_fin</th>
                          <th>Estado</th>
                        </tr>
                        </thead>
                        <tbody>
                         <?php 
                           $act = new Actividades();
                                 $dpa=$act->get_Allactividades($noms);
                                 while($lista=mysql_fetch_array($dpa))
                                 {  

                                     ?>
                                     
                              <tr>
                                <td><?php echo $lista['ACT_C_CODIGO']?></td>
                                <td><?php echo $lista['ACT_D_NOMBRE']?></td>
                                <td><?php echo $lista['ACT_D_DESCRIPCION']?></td>
                                <td><?php echo $lista['ACT_F_FECHAINI']?></td>
                                <td><?php echo $lista['ACT_F_FECHAFIN']?></td>
                                <td><?php echo $lista['ACT_E_ESTADO']?></td>
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

            
      </div>
      <div class="col-md-4">
            

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
                            }
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