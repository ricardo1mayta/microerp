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


        $usuar=$_SESSION['usuario'];
       
         if(isset($_GET["noms"]))
         {
          $noms=$_GET["noms"];
           $_SESSION['seccion']=$noms;  
          }else
          {
            $noms=$_SESSION['seccion'];
        }
   ?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <?php  @include('actividades_eliminar.php');?>
     <?php 
						
						
						
                            if(isset($_COOKIE["errores"]))
							{
                             if($_COOKIE["errores"]=="ok"){

                            ?>
                            
                            <div class="alert alert-success alert-dismissible" id="mensage">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-check"></i>  <?php 
                  			$cookie_name="errores";
                  			if(isset($_COOKIE[$cookie_name])) {
                        	echo $_COOKIE[$cookie_name];
                    		} 
                    		?>!</h4>
                            
                            Se Registro sin Problemas, Gracias.
                          </div>

                       <?php } else
                          {
                            ?>
                            
                            <div class="alert alert-danger alert-dismissible" id="mensage">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <h4><i class="icon fa fa-ban"></i> Error!</h4>
                               <?php 
              									$cookie_name="errores";
              									if(isset($_COOKIE[$cookie_name])) {
              									echo $_COOKIE[$cookie_name];
                    				  } 
                   			 ?>
                            </div>
                            <?php


                            }
						}
                        ?>
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
                                 
                                <div class="form-group col-md-4">
                                    <label>Actividad</label>

                                    <input type="hidden"   name="idsecc" id="idsecc" value='<?php echo $noms ?>'>
                                   
                                        <select class="form-control" name="idact" id="idact"  required>
                                         <option>-Seleccione-</option>
                                      <?php 
                                       $cate = new Parametros();
                                       $categoria=$cate->get_Idparametros('23');
                                       while($cat=mysql_fetch_array($categoria)){  
                                           ?>
                                                <option value="<?php echo $cat['PAR_C_CODIGO']?>"><?php echo $cat['PAR_D_NOMBRE']?></option>
                                                           
                                        <?php }?>
                                      </select>
                       
                                  </div>
                                  
                                   
                                  <div class="form-group col-md-3">
                                   <label>Responsable</label>
                                     <select class="form-control" name="user" id="user" >
                                     <option value="<?php echo $usuar["US_C_CODIGO"]?>"><?php echo $usuar["US_D_NOMBRE"]." ".$usuar["US_D_APELL"]?></option>
                                      <?php 
                                       $u = new User();
                                       $us=$u->lista_usuariosprensa(13,12);
                                       while($usr=mysql_fetch_array($us)){  

                                            if($usr["US_C_CODIGO"]!=$usuar["US_C_CODIGO"]){

                                           ?>
                                                <option value="<?php echo $usr["US_C_CODIGO"]?>"><?php echo $usr["US_D_NOMBRE"]." ".$usr["US_D_APELL"]?></option>
                                                           
                                        <?php }}?>
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
                         $i=0;
                           $act = new Actividades();
                                 $dpa=$act->get_Allactividades($noms);
                                 while($lista=mysql_fetch_array($dpa))
                                 {  

                                     ?>
                                     
                              <tr>
                                <td><?php echo $i=$i+1;?></td>
                                <td><?php echo $lista['ACT_D_NOMBRE']?></td>
                                <td><?php echo $lista['ACT_D_DESCRIPCION']?></td>
                                <td><?php echo $lista['ACT_F_FECHAINI']?></td>
                                <td><?php echo $lista['ACT_F_FECHAFIN']?></td>
                                <td><?php
                                if($lista['ACT_E_ESTADO']=="PENDIENTE")
                                 {?>
                                   <div class="progress progress-sm">
                                      <div class="progress-bar progress-bar-danger" style="width: 5%"></div>
                                    </div>
                                    <?php }elseif ($lista['ACT_E_ESTADO']=="INICIADO") {
                                      ?>
                                      <div class="progress progress-sm">
                                        <div class="progress-bar progress-bar-yellow" style="width:<?php echo (int)$lista['AVANCE_ACT']."%"?>"></div>
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
                                    <span class="">0%</span>
                                    <?php }elseif ($lista['ACT_E_ESTADO']=="INICIADO") {
                                      ?>
                                      <span class=""><?php echo (int)$lista['AVANCE_ACT']."%"?></span>
                                      <?php

                                    }else
                                    {?>
                                         <span class="">100%</span>
                                    <?php }
                                    ?>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-block btn-xs  btn-danger" data-toggle="modal" data-target="#actDelete" data-id="<?php echo $lista['ACT_C_CODIGO']?>" data-idsec="<?php echo $noms;?>" ><i class='glyphicon glyphicon-trash'></i></button>
                       
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

            
      </div>
      <div class="col-md-4">
            

              <!-- Default box -->
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Resumen avance del Seccion</h3>

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
                        <?php $s=$sec->avance_seccion($noms);?>
                              <input type="text"  class="knob"  value="<?php echo (Int)$s['AVANCE']?>" data-width="250" data-height="250" data-fgColor="#00a65a"  data-readonly="true">
                              

                              <div style="position:relative;top:-160px;left:45px;z-index:5;font-size:40px;font:arial;color:#00a65a;"><strong>%<strong></div>
                       </div>

                    </div>

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
                         <?php /*
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
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="js/app.js"></script>
  <!-- /.content-wrapper -->
 
<?php

@include_once('links/footer.php');
@include_once('links/ajustes_generales.php');
//@include_once('links/scrips.php');
@include_once('links/scrip_chart.php');
@include_once('links/inferior_depues_cuerpo.php');?>