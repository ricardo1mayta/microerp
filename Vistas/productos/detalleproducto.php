<?php include_once(HTML_DIR . '/template/titulo.php'); ?>
<?php include_once(HTML_DIR . '/template/links.php'); ?>
<script type="text/javascript">

function permite(elEvento, permitidos) {
  // Variables que definen los caracteres permitidos
  var numeros = "0123456789";
  var teclas_especiales = [8, 37, 39, 46];
  // 8 = BackSpace, 46 = Supr, 37 = flecha izquierda, 39 = flecha derecha
   // Seleccionar los caracteres a partir del parámetro de la función
  switch(permitidos) {
    case 'num':
      permitidos = numeros;
      break;
  }
 
  // Obtener la tecla pulsada 
  var evento = elEvento || window.event;
  var codigoCaracter = evento.charCode || evento.keyCode;
  var caracter = String.fromCharCode(codigoCaracter);
 
  // Comprobar si la tecla pulsada es alguna de las teclas especiales
  // (teclas de borrado y flechas horizontales)
  var tecla_especial = false;
  for(var i in teclas_especiales) {
    if(codigoCaracter == teclas_especiales[i]) {
      tecla_especial = true;
      break;
    }
  }
 
  // Comprobar si la tecla pulsada se encuentra en los caracteres permitidos
  // o si es una tecla especial
  return permitidos.indexOf(caracter) != -1 || tecla_especial;
}
</script>
<?php include_once(HTML_DIR . '/template/header_menu.php'); ?>
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
    <?php  if(isset($sms)){ echo $sms; }?>
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
              <h3 class="box-title">Registro del detallle de los  Productos</h3>
            </div>
            <!-- /.box-header -->
            <form role="form" action="../registrardetalleProducto/" name="form1" id="form1" method="POST" >
                <div class="box-body">
                  <div class="form-group col-md-2">
                      <label>Categoria</label>
                       <select class="form-control" name="categoria" id="categoria" onchange="from(document.form1.categoria.value,'marca','../Vistas/productos/selec2_marca.php')" required>
                       <option>-----Seleccione-----</option>
                        <?php 
                         $cate = new Parametros();
                         $categoria=$cate->get_Idparametros('1');
                         while($cat=$categoria->fetch_array()){  
                             ?>
                                  <option value="<?php echo $cat['PAR_C_CODIGO']?>"><?php echo $cat['PAR_D_NOMBRE']?></option>
                                             
                          <?php }?>
                        </select>
                    </div>
                    <div class="form-group col-md-2" name="marca" id="marca">
                      <label>Marca </label>
                       <select class="form-control"  disabled>
                       <option>-----Seleccione-----</option>
                         
                         </select>                      
                         
                    </div>
                     <div class="form-group col-md-2" name="prod" id="prod">
                          <label>Producto</label>
                           <select class="form-control" disabled>
                           <option>-----Seleccione-----</option>
                            
                     </select>
                     </div>
                    
                    <div class="form-group col-md-2">
                      <label>Detalle del Producto </label>
                      <input type="text" class="form-control"  id="terminos" name="nompro" placeholder="Nombre del Detalle" onkeyup="buscar()" required>
                    </div>
                    <div class="form-group col-md-2">
                      <label>Cantidad</label>
                      <input type="text" class="form-control"  name="cant" placeholder="0"  onkeypress="return permite(event,'num')"  required>
                    </div>
                   	<div class="form-group col-md-2">
                      <label>Precio $.</label>
                      <input type="text" class="form-control"   name="prec" placeholder="0.00" onkeypress="return permite(event,'num')"  required>
                    </div>
                     <div class="form-group col-md-12">
                     <br>
                         <input type="hidden" value="guardardet"  name="evento">
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
                  <div class="table-responsive"> 
                    <table id="example2" class="table ">
      					    <thead>
                     <tr>
      							
      					
                        <th>PRODUCTO</th>
                        <th>DETALLE</th>
                        <th>CANTIDAD</th>
                        <th>PRECIO</th>
                        <th>OPCIONES</th>
      					        
      						  </tr>
                    </thead>
                    <tbody>
		                 <?php 
               			 $dpro = new detProductos();
                         $det=$dpro->get_Detalleproductos();
                         	while($lista1=$det->fetch_array()){  
                             ?>
                           <tr>
                           
                            <td><?php echo $lista1['PRO_D_NOMBRE']?></td>
                            <td><?php echo $lista1['DPRO_D_NOMBRE']?></td>
                            <td><?php echo $lista1['DPRO_N_CANTIDAD']?></td>
                            <td><?php echo $lista1['DPRO_N_PRECIO']?></td>
                           	<td> <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" 
                            data-target="#editardetproductos" data-id="<?php echo $lista1['DPRO_C_CODIGO']?>"  data-nombre="<?php echo $lista1['DPRO_D_NOMBRE']?>" data-cantidad="<?php echo $lista1['DPRO_N_CANTIDAD']?>" data-precio="<?php echo $lista1['DPRO_N_PRECIO']?>" ><i class=" fa  fa-list"></i> Editar</button></td>
                            <td><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" 
                            data-target="#eliminardetproductos" data-id="<?php echo $lista1['DPRO_C_CODIGO']?>" data-nombre="<?php echo $lista1['DPRO_D_NOMBRE']?>" ><i class=" fa  fa-list"></i> Eliminar</button>
                            </td>
                          </tr>             
                          <?php }?>
				                </tbody>
					             </table>
                    <br>
                  </div>
                
                </div>
           

           </div>
          <!-- /.box -->
        </div>
        
        
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

<div class="modal fade" id="editardetproductos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Editar Producto</h4>
      </div>
      <div class="modal-body">
        <form  action="../registrardetalleProducto/" method="post">
              <div class="col-md-12">
                    <div class="form-group col-md-6">
                      <label>Detalle del Producto </label>
                      <input type="text" class="form-control"  id="nombres" name="nombres" placeholder="Nombre del Detalle" onkeyup="buscar()" >
                    </div>
                    <div class="form-group col-md-3">
                      <label>Cantidad</label>
                      <input type="text" class="form-control" onkeypress="return permite(event,'num')"  name="cant" placeholder="0">
                    </div>
                    <div class="form-group col-md-3">
                      <label>Precio $.</label>
                      <input type="text" class="form-control"   onkeypress="return permite(event,'num')"  name="prec" placeholder="0.00">
                    </div>
                   
                    <div class="form-group col-md-4">
                      <br>
                      
                      <input type="hidden"   name="codigo">
                      <input type="hidden" value="editardet"  name="evento">
                      <input type="submit"  class="btn btn-warning" value=" Actualizar">
                     
                    </div>
              </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      
      </div> 
    </div>
  </div>
</div>
 
<div class="modal fade" id="eliminardetproductos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Eliminar detalle Producto</h4>
      </div>
      <div class="modal-body">
        <form action="../registrardetalleProducto/" method="post">
              <div class="col-md-12">
                    
                    <div class="form-group col-md-8">
                      <label>Desea eliminar el Producto: </label>
                      <input type="hidden"  name="codigo"  >
                       <input type="hidden" value="eliminardet"  name="evento">
                    
                     
                    </div>
                    
              </div>
        
      </div>
      <div class="modal-footer">
          <input type="submit"  class="btn btn-warning" value=" Eliminar">
      </div>
      </form>
      </div> 
    </div>
  </div>
</div>
<?php include_once(HTML_DIR . '/template/footer.php'); ?>
<?php include_once(HTML_DIR . '/template/ajustes_generales.php'); ?>

<?php include_once(HTML_DIR . '/template/scrips.php'); ?>
<script >
  $('#editardetproductos').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id')
  var nombre = button.data('nombre') 
  var correo= button.data('cantidad')  
  var direccion = button.data('precio') 
  // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Editar a: ' + nombre)
  modal.find('input[name="codigo"]').val(id)
  
  modal.find('input[name="nombres"]').val(nombre)
  modal.find('input[name="cant"]').val(correo)
  modal.find('input[name="prec"]').val(direccion)


})
  $('#eliminardetproductos').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id')
  var nombre = button.data('nombre') 
  // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Eliminar a: ' + nombre)
  modal.find('input[name="codigo"]').val(id)
 

})
 

  
  </script>

  <script>
  $(function () {
    $("#example1").DataTable();
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


<?php include_once(HTML_DIR . '/template/inferior_depues_cuerpo.php'); ?>
