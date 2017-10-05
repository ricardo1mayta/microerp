   <?php 
    @include('links/titulo.php'); 
    @include('links/links.php'); 
    @include('links/header_menu.php'); 
    
   @include("../Entidades/generico.php");
   @include("../Entidades/parametros.php");
   @include("../Entidades/detParametros.php");

   ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administración del Sistema
        <small>Digamma</small>
      </h1>
     
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
                      
          <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Registro de Productos</h3>
            </div>
            <!-- /.box-header -->
            <form role="form" action="../Control/control_producto.php" name="form1" id="form1" method="POST" >
                <div class="box-body">
                  <div class="form-group">
                      <label>Categoria</label>
                       <select class="form-control" name="categoria" id="categoria" onchange="from(document.form1.categoria.value,'marca','selec2_marca.php')" required>
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
                    <div class="form-group" name="marca" id="marca">
                      <label>Marca </label>
                       <select class="form-control"  disabled>
                       <option>-----Seleccione-----</option>
                         
                         </select>                      
                         
                    </div>
                    <div class="form-group">
                      <label>Nombre del Producto</label>
                      <input type="text" class="form-control"  name="nompro" placeholder="ingrse Nombre del Producto" required>
                    </div>
                    <div class="form-group">
                      <label>Descripción del Producto</label>
                      <input type="text" class="form-control"  name="despro" placeholder="Descripcion del Producto " required>
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
            </form>
           </div>
          <!-- /.box -->
        </div>
        
        
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>


<?php 
@include_once('links/scrips.php');
@include_once('links/inferior_depues_cuerpo.php');?>?>