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

         if(isset($_GET["id"]))
         {
          $nomp=$_GET["id"];
             
              
          }else
          {
            $nomp="";
        }

        $p=new Proyectos();
       $n=$p->get_nombreProy($nomp) ;
   ?>
 
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  
  <?php @include('secciones_modificar.php');?>
  <?php @include('secciones_eliminar.php');?>
    <!-- Content Header (Page header) -->
   <section class="content-header">
   <div class="box-tools pull-right">
          <a href="reporte_gerenciaOperaciones.php" class="btn btn-box-tool" >
                  Regresar</a>
          </div>
      <h1>
       Informe de Secciones
        
      </h1>
         
    </section>
    <!-- Main content -->
    <section class="content">
       
     
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo $n['PRY_D_NOMBRE']; ?> </h3>

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
              <h3 class="box-title">Detalle de Secciones </h3>
            </div>
            <div class="box-body">
                <table id="" class="table table-bordered table-hover">
                <thead>
                <tr>
                  
                  <th>#</th>
                  <th>Categoria</th>
                  <th>Titulo</th>
                  <th>Descripción</th>
                  <th>Responsable</th>
                  <th>Carga</th>
                  <th>Avance</th>
                   <th >Detalle</th>
                </tr>
                </thead>
                <tbody>
                 <?php 
                  $i=0;
                   $secc = new Secciones();
                  $query =$secc->r_secciones($nomp);
                    while($lista=mysql_fetch_array($query)){ ?>
                             
                      <tr>
                       <td><?php echo $i=$i+1; ?></td>
                        <td><?php echo $lista['PAR_D_NOMBRE']?></td>
                        <td><?php echo $lista['ETA_D_NOMBRE']?></td>
                        <td><?php echo $lista['ETA_D_DESCRIPCION']?></td>
                        <td><?php echo $lista['US_D_NOMBRE']?></td>
                        <td><?php echo $lista['CARGA']."%"?></td>
                      
                        <td>
                            <div class="text-center" >
                              <input type="text" class="knob" value="<?=(Double)$lista["AVANCE"];?>" data-width="45" data-height="45" data-fgColor="#3c8dbc" data-readonly="true">

                              <div class="knob-label"></div>
                            </div>
                        </td>
                         <td>
                         <form action="reporte_actividades.php" method="post">
                          <input type="hidden" name="id" value="<?php echo $lista['ETA_C_CODIGO']?>">
                           <input type="hidden" name="idproy" value="<?php echo $nomp?>">
                          <button class="btn btn-warning">+</button>
                         </form>
                         
                       
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