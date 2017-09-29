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

       $usuar=$_SESSION['usuario'];

         if(isset($_GET["nom"]))
         {
          $nomp=$_GET["nom"];
                if(isset($_SESSION['proyecto'])){
                  $nomp=$_SESSION['proyecto'];
                }else{
                $_SESSION['proyecto']=$nomp;
              }
          }else
          {
            $nomp="";
        }
   ?>
 
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Reporte de Proyectos
        <small>Digamma</small>
      </h1>
     
    </section>
    <!-- Main content -->
     <section class="content">
    <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Lista de Proyectos</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div class="box-body">

              <table id="" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Item</th>
                  <th>Nombre del Proyecto</th>
                  <th>Fecha Inicio</th>
                  <th>Fecha de Cierre</th>
                  <th>Responsable</th>
                  <th>Mantenimiento</th>
                </tr>
                </thead>
                <tbody>
                 <?php 
                   $param = new Proyectos();

                         $dpa=$param->get_Allproyectos_informe($idus);
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
                        
                       <td><?php echo "<a  href='reporte_secciones.php?id=".$lista['PRY_C_CODIGO']."' class='btn btn-warning'>+</a>";?>        </td>
                        
                      </tr>
                  <?php 
                    }
                  ?>
                
                </tbody>
                
              </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
        </section>
      </div>
    </section>

    <!-- /.content -->
  </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="js/app.js"></script>
 
  <!-- /.content-wrapper -->

<?php 

@include_once('links/ajustes_generales.php');
@include_once('links/footer.php');
//@include_once('links/scrips.php');
@include_once('links/scrip_chart.php');
@include_once('links/inferior_depues_cuerpo.php');?>