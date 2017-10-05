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

      $idus=$usuario['US_C_CODIGO'];
   ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Seguimiento de Proyectos
        <small>Digamma</small>
      </h1>
     
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
                      
          <!-- general form elements disabled -->
          <div class="box box-warning sombra">
            <div class="box-header with-border">
              <h3 class="box-title">Registro de Proyectos</h3>
            </div>

            <!-- /.box-header -->
            <form role="form" name="form1" action="../Control/control_proyecto.php" method="POST" >
                <div class="box-body">

                    <div class="col-md-4">
                      <div class="box box-info fond">
                        <div class="form-group">
                          <h3>Paso 1</h3>
                          <label>Categoria </label>
                           <select class="form-control" name="categoria" id="categoria" onchange="from(document.form1.categoria.value,'marcas','selec2_marca.php')" required>
                           <option>-----Seleccione-----</option>
                        <?php 
                         $cate = new Parametros();
                         $categoria=$cate-> get_Idparametros('1');
                         while($cat=mysql_fetch_array($categoria)){  
                             ?>
                                  <option value="<?php echo $cat['PAR_C_CODIGO']?>"><?php echo $cat['PAR_D_NOMBRE']?></option>
                                             
                          <?php }?>
                        </select>
                        </div>
                        <div class="form-group" name="marcas" id="marcas">
                          <label>Marca</label>
                           <select class="form-control" disabled >
                           <option>-----Seleccione-----</option>
                            
                        </select>
                        </div>
                        <div class="form-group" name="prod" id="prod">
                          <label>Producto</label>
                           <select class="form-control" disabled>
                           <option>-----Seleccione-----</option>
                            
                            </select>
                        </div>
                        <div class="form-group">
                          <label>Nombre del Proyecto</label>
                          <input type="text" class="form-control"  name="" id="nomp"  placeholder="ingrse Nombre del Producto" disabled>
                           <input type="hidden" class="form-control"  name="nomproy" id="nomproy">

                        </div>
                        </div>
                     </div>
                    <div class="col-md-4">
                       <div class="box box-info fond">
                        
                        <div class="form-group">
                           <h3>Paso 2</h3>
                          <label>Descripción del Proyecto</label>
                          <input type="text" class="form-control"  name="desproy" placeholder="Descripcion del Producto " required>
                        </div>
                        <div class="form-group">
                            <label>Fecha de apertura del Proyecto</label>

                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="date" name="fini" class="form-control pull-right" id="datepicker" required>
                            </div>
                            <!-- /.input group -->
                          </div>
                           <div class="form-group">
                            <label>Fecha de Cierre del Proyecto</label>

                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="date" name="ffin"  class="form-control pull-right" id="datepicker" required>
                            </div>
                            <!-- /.input group -->
                          </div>
                         </div>
                       </div>
                    <div class="col-md-4">
                          <div class="box box-info fond">
                           <div class="form-group">
                           <h3>Paso 3</h3>
                            <input type="hidden" name="crea" value="<?php echo $idus ?>">
                          <label>Seleciona El Responsable</label>
                           <select class="form-control" name="user" id="user" required>
                           <option>-----Seleccione-----</option>
                            <?php 
                             $u = new User();
                             $us=$u->lista_usuarios();
                             while($usr=mysql_fetch_array($us)){  
                                 ?>
                                      <option value="<?php echo $usr["US_C_CODIGO"]?>"><?php echo $usr["US_D_NOMBRE"]." ".$usr["US_D_APELL"]?></option>
                                                 
                              <?php }?>
                            </select>
                          </div>
                         
                          <div class="box-footer">
                             <button type="submit" class="btn btn-primary">Guardar</button> 
                        </div>

                       
                            <?php if(isset($_GET['error']))
                                {
                                 if($_GET['error']=="ok"){

                                ?>
                                
                                <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-check"></i> <?php echo $_GET['error'];?>!</h4>
                                
                                Se Registro sin Problemas, Gracias.
                              </div>

                           <?php } else
                              {
                                ?>
                                
                                <div class="alert alert-danger alert-dismissible">
                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                  <h4><i class="icon fa fa-ban"></i> Error!</h4>
                                  <?php echo $_GET['error'];
                                    $_GET['error']=null;
                                  ?>
                                </div>
                                <?php


                                }
                            }
                            ?>
                         
                        
                        
                        <br>
                        <br>
                        
                        <br>
                    </div>
                  </div>
                </div>
            </form>
           </div>
          <!-- /.box -->
        </div>
              
      </div>
      <!-- /.row -->
    </section>
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

              <table id="example2" class="table table-bordered table-hover">
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

                         $dpa=$param->get_Allproyectos($idus);
                         while($lista=mysql_fetch_array($dpa))
                         {  

                             ?>
                             
                      <tr>
                        <td><?php echo $lista[0]?></td>
                        <td><?php echo $lista[1]?></td>
                        <td><?php echo $lista[2]?></td>
                        <td><?php echo $lista[3]?></td>
                        <td><?php echo $lista[4]?></td>
                        <td><?php echo "<a  href='registro_secciones.php?nom=".$lista[1]."' class='btn btn-warning'>Estructurar </a>";?> 
                       
                       </form> 


                        </td>
                        
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
  <script type="text/javascript">
  
    function capturar()
    {   
     var cat=document.getElementById('categoria').options.selectedIndex;
        var c=document.getElementById('categoria').options[cat].text;

      var mar=document.getElementById('marca').options.selectedIndex;
        var m=document.getElementById('marca').options[mar].text;

      var producto=document.getElementById('producto').options.selectedIndex;
        var p=document.getElementById('producto').options[producto].text;

        
        document.getElementById('nomp').value=c.concat(" ",m," ",p);

          var nom=document.getElementById('nomp').value;
          document.getElementById('nomproy').value=nom;

       //alert(c);
    }

    function enviar(){

      document.form2.submit()
    }

  </script>
  <script>
    $(function () {
      
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false
      });
    });
  </script>

<?php 
@include_once('links/scrips.php');
@include_once('links/inferior_depues_cuerpo.php');?>
