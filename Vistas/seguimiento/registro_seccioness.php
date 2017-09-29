 
<?php @include('links/titulo.php'); 
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
        Estructuración de Proyectos
        <small>Digamma</small>
      </h1>
     
    </section>
    <!-- Main content -->
    <section class="content">
    
       <?php 
            
            
            
                  if(isset($_COOKIE["errores"]))
                    {           
                          if($_COOKIE["errores"]=="ok"){

                            ?>
                            
                            <div class="alert alert-success alert-dismissible">
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
                            
                            <div class="alert alert-danger alert-dismissible">
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
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo $nomp ?> </h3>

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
            <div class="box box-warning ">
              <div class="box-header with-border">
                <h3 class="box-title">Registro de Secciones </h3>
              </div>
              
              <!-- /.box-header -->
              <form role="form" name="form1" action="../Control/control_secciones.php" method="POST" >
                  <div class="box-body">
                      <div class="form-group col-md-3">
                             <label>Categoria </label>
                             <select class="form-control" name="categoria" id="categoria">
                             <option>-----Seleccione-----</option>
                          <?php 
                           $cate = new Parametros();
                           $categoria=$cate-> get_Idparametros('8');
                           while($cat=mysql_fetch_array($categoria)){  
                               ?>
                                    <option value="<?php echo $cat['PAR_C_CODIGO']?>"><?php echo $cat['PAR_D_NOMBRE']?></option>
                                               
                            <?php }?>
                          </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Titulo</label>
                            <input type="hidden"   name="nomproy" id="nomproy" value='<?php echo $nomp ?>'>
                            <input type="text" class="form-control"  name="nomsecc" id="nomsecc"  placeholder="ingrse Nombre de la seccion"  required>
                          </div>
                          <div class="form-group col-md-3">
                            <label>Descripcion</label>
                            <input type="text" class="form-control"  name="dessecc" id="dessecc"  placeholder="Descripcion"  required>
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
                           
                            <div class="box-footer col-md-3">
                               <button type="submit" class="btn btn-primary"><i class="fa fa-save" > </i>_Guardar Seccion</button> 
                          </div>

                            
                     
                     
                    </div>
                  
              </form>
             </div>
            <!-- /.box -->
          </div>
        </div>
        
        <!-- /.box-footer-->
      </div>
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo $nomp ?> </h3>

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
                  <th colspan="3">Avance</th>
                   <th align="center">Mantenimientos</th>
                </tr>
                </thead>
                <tbody>
                 <?php 
                  $i=0;
                   $secc = new Secciones();
                  $query =$secc->secciones();
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
                              <input type="text" class="knob" value="<?=(Double)$lista["AVANCE"];?>" data-width="50" data-height="50" data-fgColor="#3c8dbc" data-readonly="true">

                              <div class="knob-label"></div>
                            </div>
                        </td>
                         <td><a  href="registro_actividades.php?noms=<?php echo $lista['ETA_C_CODIGO']?>" class="btn btn-success"><i class="fa fa-plus" ></i></a> 
                       
                        </td>
                        <td> <button type="button" class="btn btn-info" data-toggle="modal" data-target="#dataUpdate" data-id="<?php echo $lista['ETA_C_CODIGO']?>"  data-categoria="<?php echo $lista['PAR_D_NOMBRE']?>" data-titulo="<?php echo $lista['ETA_D_NOMBRE']?>" data-descripcion="<?php echo $lista['ETA_D_DESCRIPCION'];?>" data-responsable="<?php echo $lista['US_D_NOMBRE']?>"><i class="fa fa-pencil-square-o" aria-hidden="true" ></i></button>
                        </td>
                         <td> <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#dataDelete" data-id="<?php echo $row['id']?>"  ><i class='glyphicon glyphicon-trash'></i> </button>
                        </td>

                        
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
        <!-- /.box-body -->
        <div class="box-footer">
          Digammaperu.com
        </div>
        <!-- /.box-footer-->
      </div>

      <!-- /.box -->
   

  


    </section>
    <!-- /.content -->
  </div>

  <script src="js/app.js"></script>
  <script>
    $(document).ready(function(){
      load(1);
    });
  </script>
  <!-- /.content-wrapper -->

<?php 


@include_once('links/scrips.php');
@include_once('links/scrip_chart.php');
@include_once('links/inferior_depues_cuerpo.php');?>