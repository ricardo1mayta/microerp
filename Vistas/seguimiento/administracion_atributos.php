 <?php include_once(HTML_DIR . '/template/titulo.php'); ?>
<?php include_once(HTML_DIR . '/template/links.php'); ?>  
<?php include_once(HTML_DIR . '/template/header_menu.php'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Admistracion de Sistema
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
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
                      
          <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Registro de Parametros</h3>
            </div>
            <!-- /.box-header -->
            <form role="form" action="../Control/control_parametro.php" method="POST" >
                <div class="box-body">
                  <br>
                    
                    <div class="form-group">
                      <label>Nombre del Parametro</label>
                      <input type="text" class="form-control"  name="nompar" placeholder="ingrse Nombre " required>
                    </div>

                      <div class="box-footer">
                         <button type="submit" class="btn btn-primary">Guardar</button> 
                    </div>
                    <br>
                    <br>
                    
                    <br>
                
                </div>
            </form>
           </div>
          <!-- /.box -->
        </div>
         <!-- Right column -->
        <div class="col-md-6">
                      
          <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Registro del detalle de Parametros</h3>
            </div>
            <!-- /.box-header -->
            <form role="form" action="../Control/control_detalle_parametro.php" method="POST">
                <div class="box-body">
                  <div class="form-group">
                      <label>Seleciona el Tipo </label>
                       <select class="form-control" name="tipoParam">
                       <option>-----Seleccione-----</option>
                        <?php 
                         $marca = new Parametros();
                         $marcass=$marca->get_parametros();
                         while($marcas=mysql_fetch_array($marcass)){  
                             ?>
                                  <option value="<?php echo $marcas['PAR_C_CODIGO']?>"><?php echo $marcas['PAR_D_NOMBRE']?></option>
                                             
                          <?php }?>
                        </select>
                    </div>
                    <div class="form-group">
                      <label>Nombre </label>
                      <input type="text" name="NdetParametro" class="form-control" placeholder="ingrse Nombre " required>
                    </div>
                    <div class="form-group">
                      <label>Descripción</label>
                      <input type="text" name="Desccripcion" class="form-control" placeholder="ingrse Descripción ">
                    </div>
                      <div class="box-footer">
                         <button type="submit" class="btn btn-success">Guardar</button> 
                    </div>
                
                </div>
            </form>
           </div>
          <!-- /.box -->
        </div>
        <div class="col-md-12">
                      
          <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Lista del Registro  detalle de Parametros</h3>
            </div>
            <!-- /.box-header -->
            <form role="form" action="control_regitro_parametro.php">
                <div class="box-body">
                  
                     <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#ID</th>
                  <th>Detalle del Parametro</th>
                  <th>Parametros</th>
                  <th style="width: 40px">Label</th>
                </tr>
                <?php 
                $param = new Parametros();
                         $dpa=$param->get_Allparametros();
                         while($lista=$dpa->fetch_array()){  
                             ?>
                                <tr>
                            <td><?php echo $lista[0]?></td>
                            <td><?php echo $lista[1]?></td>
                            <td><?php echo $lista[2]?></td>
                            <td><?php echo $lista[3]?></td>
                          </tr>             
                          <?php }?>
                      
              </table>         
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
 <?php include_once(HTML_DIR . '/template/footer.php'); ?>

<?php include_once(HTML_DIR . '/template/ajustes_generales.php'); ?>

<?php include_once(HTML_DIR . '/template/scrips.php'); ?>


<!-- Bootstrap 3.3.6 -->

<!-- DataTables -->

<script >
     $(document).ready(function() {
        setTimeout(function() {
            $("#mensage").fadeOut(1500);
        },3000);
      });

      $('#editarEmpresas').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var id = button.data('id')
      var ruc = button.data('ruc')
      var nombre = button.data('nombre') 
      var rsocial= button.data('rsocial') 
      
      var modal = $(this)
      modal.find('.modal-title').text('Editar a: ' + nombre)
      modal.find('input[name="codigo"]').val(id)
      modal.find('input[name="ruc1"]').val(ruc)
      modal.find('input[name="nomcomercial1"]').val(nombre)
      modal.find('input[name="rsocial1"]').val(rsocial)
     
      

    })
      $('#eliminarEmpresas').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var id = button.data('id')
      var nombre = button.data('nombre') 
      // Extract info from data-* attributes
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this)
      modal.find('.modal-title').text('Eliminar a: ' + nombre)
      modal.find('input[name="codigo"]').val(id)
      modal.find('input[name="mine"]').prop("checked", "checked")
     
     

    })
     $('#finalizarEmpresas').on('show.bs.modal', function (event) {
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

     $('#sectorr').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var id = button.data('id')
      var nombre = button.data('nombre') 
      //var marcado = $("#mini").prop("checked");
      // Extract info from data-* attributes
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this)
      modal.find('.modal-title').text('Eliminar a: ' + nombre)
      modal.find('input[name="codigo"]').val(id)
       modal.find('input[name="mine"]').prop("checked", "checked")
     

    })



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
       
         $('#tablajso').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": false,
          "ordering": true,
          "info": false,
          "autoWidth": true
        });
      });

     
  </script>
  
<?php include_once(HTML_DIR . '/template/inferior_depues_cuerpo.php'); ?>
