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
             <div class="box">
                <div class="box-header with-border">
                  <strong><h3 class="box-title ">ACTIVIDADES POR PROYECTOS:</h3></strong>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                      <i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                <div class="table-responsive" style="padding: 20px;">
                          <table id="" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                              <th>Item</th>
                              <th>Nombre del Proyecto</th>
                              <th>Fecha Inicio</th>
                              <th>Fecha de Cierre</th>
                              <th>Responsable</th>
                              <th colspan="2">Mantenimiento</th>
                            </tr>
                            </thead>
                            <tbody>
                             <?php 
                               $param = new Proyectos();

                                     $dpa=$param->get_Allproyectos_act($idus);
                                     while($lista=mysql_fetch_array($dpa))
                                     {  

                                         ?>
                                         
                                  <tr>
                                    <td><?php echo $lista['PRY_C_CODIGO']?></td>
                                    <td><?php echo $lista['PRY_D_NOMBRE']?></td>
                                    <td><?php echo $lista['PRY_F_FECHAINI']?></td>
                                    <td><?php echo $lista['PRY_F_FECHAFIN']?></td>
                                    <td><?php echo $lista['US_D_NOMBRE']?></td>
                                    <td><div class="text-center" >
                                          <input type="text" class="knob" value="<?=(Double)$lista["AVANCE"];?>" data-width="45" data-height="45" data-fgColor="#3c8dbc" data-readonly="true">

                                          <div class="knob-label"></div>
                                        </div>
                                    </td>
                                    
                                   <td><a href="user_actividades.php?id=<?php echo $lista['PRY_C_CODIGO'];?>" class="btn btn-success">+ <i class="fa fa-arrow-circle-right"></i></a></td>
                                    
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
    
    <!-- /.content -->
    </div>

  </div>
</div>
  <!-- /.content-wrapper -->
  
  

<?php
@include_once('links/footer.php');
@include_once('links/ajustes_generales.php');
//@include_once('links/scrips.php');
@include_once('links/scrip_chart.php');
@include_once('links/inferior_depues_cuerpo.php');?>
