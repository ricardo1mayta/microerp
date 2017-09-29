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
      if(isset($_POST['id']))
      {
        $id=$_POST['id'];
        $idproy=$_POST['idproy'];
              
       }else
       {

              	$id="";
        }

$s=new Secciones();
	$nomsec=$s->get_rowSeccion($id) 

   ?>


 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <div class="row">
    <!-- Main content -->
    <div class="col-md-12">
           
              <!-- Default box -->
              <div class="box">
                <div class="box-header with-border">
                  <strong><h3 class="box-title "><? echo $nomsec['PAR_D_NOMBRE']." ".$nomsec['ETA_D_NOMBRE']; ?></h3></strong>
		            <div class="box-tools pull-right">
		           
		           <a href="reporte_secciones.php?id=<? echo $idproy;?>" class="btn btn-box-tool" >
		              Regresar</a>
		          </div>
                  
                </div>
                <div class="box-body">
                
                  <div class="col-md-12">
                              
                  <!-- general form elements disabled -->
	                  <div class="box box-warning sombra">
	                    <div class="box-header with-border">
	                    
	                    </div>
	                    <div class="box-body">
	                        <table id="" class="table table-bordered table-hover">
	                        <thead>
	                        <tr>
	                          <th>Intem</th>
	                          <th>Actividad</th>
	                          <th>Descripción</th>
                             <th>Inicio</th>
                              <th>Fin</th>

	                          <th width="50">Estado</th>
                            <th width="50"></th>
	                        </tr>
	                        </thead>
	                        <tbody>
	                         <?php 
	                          $act=new Actividades();
	                           $dpa=$act->r_Allactividades($id);
	                          
	                                 while($lista=mysql_fetch_array($dpa))
	                                 {  

	                                     ?>
	                                     
	                              <tr>
	                                <td><?php echo $lista['ACT_C_CODIGO']?></td>
	                                <td><?php echo $lista['ACT_D_NOMBRE']?></td>
	                                <td><?php echo $lista['ACT_D_DESCRIPCION']?></td>
                                   <td><?php echo $lista['ACT_F_FECHAINI']?></td>
                                    <td><?php echo $lista['ACT_F_FECHAFIN']?></td>
                                                           
                                   <td><?php
                                if($lista['ACT_E_ESTADO']=="PENDIENTE")
                                 {?>
                                   <div class="progress progress-sm">
                                      <div class="progress-bar progress-bar-danger" style="width: 25%"></div>
                                    </div>
                                    <?php }elseif ($lista['ACT_E_ESTADO']=="INICIADO") {
                                      ?>
                                      <div class="progress progress-sm">
                                        <div class="progress-bar progress-bar-yellow" style="width:50%"></div>
                                      </div>
                                      <?php

                                    }else
                                    {?>
                                      <div class="progress progress-sm">
                                        <div class="progress-bar progress-bar-success" style="width: 100%"></div>
                                      </div>
                                    <?php }
                                    ?>
                                </td>
                                <td><?php
                                if($lista['ACT_E_ESTADO']=="PENDIENTE")
                                 {?>
                                    <span class="badge bg-red">0%</span>
                                    <?php }elseif ($lista['ACT_E_ESTADO']=="INICIADO") {
                                      ?>
                                      <span class="badge bg-yellow">10%</span>
                                      <?php

                                    }else
                                    {?>
                                         <span class="badge bg-green">100%</span>
                                    <?php }
                                    ?>
                                </td>
                                
	                              </tr>
	                        <?php }?>
	                        
	                        </tbody>
	                                      
	                      </table>
	                    </div>           
	                   
	                   </div>
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
