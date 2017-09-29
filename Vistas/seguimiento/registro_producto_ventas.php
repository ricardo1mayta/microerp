<?php @include('links/titulo.php'); 
      @include('links/links.php'); 
      @include('links/header_menu.php');
    
   include("../Entidades/generico.php");
   include("../Entidades/parametros.php");
   include("../Entidades/detParametros.php");
   include("../Entidades/producto.php");

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
                     
        <!-- left column -->
        <div class="col-md-12">
                      
          <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Registro de Productos</h3>
            </div>
            <!-- /.box-header -->
            <form role="form" action="../Control/control_agregar_producto.php" name="form1" id="form1" method="POST" >
                <div class="box-body">
                  <div class="form-group col-md-3">
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
                    <div class="form-group col-md-3" name="marca" id="marca">
                      <label>Marca </label>
                       <select class="form-control"  disabled>
                       <option>-----Seleccione-----</option>
                         
                         </select>                      
                         
                    </div>
                    
                     <div class="form-group col-md-3">
                            <label>Fecha Inicio</label>

                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="date" name="fini" class="form-control pull-right" id="datepicker" required>
                            </div>
                            <!-- /.input group -->
                     </div>
                     <div class="form-group col-md-3">
                            <label>Fecha Fin</label>

                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="date" name="ffin" class="form-control pull-right" id="datepicker" required>
                            </div>
                            <!-- /.input group -->
                     </div>
                    <div class="form-group col-md-6">
                      <label>Nombre del Producto</label>
                      <input type="text" class="form-control"  id="terminos" name="nompro" placeholder="ingrse Nombre del Producto" onkeyup="buscar()" >
                    </div>
                   
                     <div class="form-group col-md-3">
                     <br>
                         <button type="submit" class="btn btn-success">Guardar</button> 
                    </div>
                    

                    <br>
                    
                
                </div>
            </form>

           </div>
          <!-- /.box -->
        </div>
        
         <!-- left column -->
        <div class="col-md-12">
                      
          <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Productos Registrados </h3>

            </div>
            <!-- /.box-header -->
          
                <div class="box-body">
                  
                 <table id="datos" class="table">
      						  <tr>
      							
      					        <th>CATEGORIA</th>
                        <th>MARCA</th>
                        <th>PRODUCTO</th>
                        <th>ESTADO</th>
                        <th colspan="2" width="80">OPCIONES</th>
      					        
      						  </tr>

		                 <?php 
               			 $pro = new Productos();
                         $det=$pro->get_AllDetalleproductos();
                         	while($lista1=mysql_fetch_array($det)){  
                             ?>
                           <tr>
                            <td><?php echo $lista1[0]?></td>
                            <td><?php echo $lista1[1]?></td>
                            <td><?php echo $lista1[2]?></td>
                            <?php if ($lista1[3]==1){ ?>
                            <td><form action="" method=""><input type="submit" class="btn btn-danger" value="Finalizar" > </form></td>
                            <?php } else {?>
                            <td><form action="" method=""><input type="submit" class="btn btn-success" value="Activar.." > </form></td>
                            <?php } ?>
                            <td><input type="submit" class="btn btn-info" value="Editar" ></td>
                            <td><input type="submit" class="btn btn-danger" value="Eliminar" ></td>
                          </tr>             
                          <?php }?>
				                  
					         </table>
                    <br>
                    
                
                </div>
           

           </div>
          <!-- /.box -->
        </div>
        
        
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>


<?php @include_once('links/scrips.php');?>

<?php @include_once('links/inferior_depues_cuerpo.php');?>