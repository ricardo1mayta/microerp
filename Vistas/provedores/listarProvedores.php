<?php include_once(HTML_DIR . '/template/titulo.php'); ?>
<?php include_once(HTML_DIR . '/template/links.php'); ?>
<?php include_once(HTML_DIR . '/template/header_menu.php'); ?>
<?php  

   ?>
  <div class="content-wrapper" >
	  <div class="content">
	  
        <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Lista de Provedores<?php //echo $nomp ?></h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <?php   if(isset($sms)) { echo $sms; $sms="";}?>
          <div class="col-md-12">
                      
          <!-- general form elements disabled -->
          <div class="box box-warning sombra">
            <div class="box-header with-border">
              
            </div>
            <div class="box-body">
                <table  class="table ">
                <thead>
                <tr>
                  
                  
                  <th>CODIGO</th>
                  <th>NOMBRE</th>
                  <th>CORREO</th>
                  <th>DIRECCION</th>
                   
                   
                </tr>
                </thead>
                <tbody>
                 <?php 
                        $pro = new Provedores();
                         $result=$pro->get_allprovedores($usuario['US_C_CODIGO']);
                         while($lista=$result->fetch_array()){                        
                             ?>
                             
                      <tr>
                        <td><?php echo $lista[0]?></td>
                        <td><?php echo $lista[1]?></td>
                        <td><?php echo $lista[2]?></td>
                        <td><?php echo $lista[4]?></td>
                        <td><?php echo $lista[5]?></td>
                         <td><?php echo $lista[5]?></td>
                         <td>
                          <form action="../listarUsuarios/"  method="post">
                            <input type="hidden" value="eliminar" name="evento">
                            <input type="hidden" value="<?php echo $lista['US_C_CODIGO']?>" name="id">
                            <input type="submit"  class='btn btn-warning'  value="Eliminar">
                          </form>
                                             
                        </td>
                        <td>
                         
                                             
                        </td>
                         <td>
                        
                             <button type="button" class="btn btn-primary" data-toggle="modal" 
                             data-target="#exampleModal" data-id="<?php echo $lista[0]?>" data-nombre="<?php echo $lista[1]?>" data-correo="<?php echo $lista[2]?>" 
                             data-direccion="<?php echo $lista[4]?>">Editar</button>                
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

        <!-- /.box-footer-->
      </div>

	  </div>
  </div>

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">New message</h4>
      </div>
      <div class="modal-body">
        <form action="../listarProvedores/"  method="post">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Nombre:</label>
             <input type="text" id"id" name="id" class="form-control">
            <input type="text" id"nombre" name="nombre" class="form-control">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Correo:</label>
            <input type="text" id"correo" name="correo" class="form-control">
          </div>
         
          <div class="form-group">
            <label for="message-text" class="control-label">Direccion:</label>
            <textarea class="form-control" name="direccion" id="message-text"></textarea>
          </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Actualizar">
        
      </div>
      </form>
    </div> 
  </div>
</div>
  
<?php @include_once(HTML_DIR . '/template/ajustes_generales.php'); ?>

<?php @include_once(HTML_DIR . '/template/scrips.php'); ?>

<script >
  $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id')
  var nombre = button.data('nombre') 
  var correo = button.data('correo') 
  var direccion = button.data('direccion') 
  // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Editar a: ' + nombre)
  modal.find('input[name="id"]').val(id)
  modal.find('input[name="nombre"]').val(nombre)
  modal.find('input[name="correo"]').val(correo)
  modal.find('textarea[name="direccion"]').text(direccion)
  
})
  </script>
<?php @include_once(HTML_DIR . '/template/inferior_depues_cuerpo.php'); ?>
