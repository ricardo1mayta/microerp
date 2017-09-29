<?php include_once(HTML_DIR . '/template/titulo.php'); ?>
<?php include_once(HTML_DIR . '/template/links.php'); ?>
<link rel="stylesheet" href="/maps/documentation/javascript/demos/demos.css">
<?php include_once(HTML_DIR . '/template/header_menu.php'); ?>


   <div class="content-wrapper" OnLoad='compt=setTimeout("self.close();",50)'">
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

                        
       <div class="col-md-12">
                      
          <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title"> Cartera</h3>
            </div>
            <!-- /.box-header -->
            <form role="form" action="../registrarEmpresas/" name="form1" id="form1" method="POST" >
                <div class="box-body">
                	<div class="form-group">
                		<div class="col-md-6">

                  <?php 
                      $cate = new Cartera();
                         $SECTOR=$cate->get_sectorempresa('16406');
                         while($cat=$SECTOR->fetch_array()){  
                             ?> 
                                <div class="checkbox">
                                      <label>
                                        <input type="checkbox" value="<?php echo $cat['PAR_C_CODIGO']?>" class="flat-red" name="sector[]">
                                      <?php echo $cat['SECTOR']?>
                                      </label>
                                </div>
                           <?php }?>
                    </div>
                    <div class="col-md-6">

                  <?php 
                      $cate = new Cartera();
                         $SECTOR=$cate->get_sectorempresa('16406');
                         while($cat=$SECTOR->fetch_array()){  
                             ?>
                                 <label>
                                        <input type="checkbox" value="<?php echo $cat['PAR_C_CODIGO']?>" class="flat-red" name="sector[]">
                                      <?php echo $cat['SECTOR']?>
                                      </label>
                           <?php }?>
                    </div>
                	</div>
                    <div class="form-group">
	                 <button type="button" class="btn btn-success btn-xs" data-toggle="modal" 
	                     data-target="#cartera" data-id="<?php echo $lista1['EMP_C_CODIGO']?>"  data-nombre="<?php echo $lista1['EMP_D_RAZONSOCIAL']?>" ><i class="fa fa-list"></i> Agregar</button>
	                </div>
                </div>
            </form>

           </div>
          <!-- /.box -->
        </div>                     
                           
                  
        <!-- left column -->
        <div class="col-md-6">
                      
          <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Adminsitracion de ficha de la Empresas</h3>
            </div>
            <!-- /.box-header -->
            <form role="form" action="../registrarEmpresas/" name="form1" id="form1" method="POST" >
                <div class="box-body">
                  <div class="form-group col-md-12">
                      <label>SECTOR</label>
                       <select class="form-control" name="sector" id="sector" onchange="from(document.form1.sector.value,'rubro','../Vistas/empresa/selec2_rubrosector.php')" required>
                       <option>Seleccione</option>
                        <?php 
                              

                         $cate = new Parametros();
                         $SECTOR=$cate->get_Idparametros('35');
                         while($cat=$SECTOR->fetch_array()){  
                             ?>
                                  <option value="<?php echo $cat['PAR_C_CODIGO']?>"><?php echo $cat['PAR_D_NOMBRE']?></option>
                                             
                          <?php }?>
                        </select>
                    </div>
                    <div class="form-group col-md-12" name="rubro" id="rubro">
                      <label>Rubro </label>
                       <select class="form-control"  disabled>
                       <option>Seleccione</option>
                         
                         </select>                      
                         
                    </div>
                    
                    <div class="form-group col-md-12">
                      <label>RUC</label>
                      <input type="label" class="form-control"  id="ruc" name="ruc" placeholder="ingrse Ruc de la Empresa"  >
                    </div>
                    <div class="form-group col-md-12">
                      <label>Razon Social de Empresa</label>
                      <input type="label" class="form-control"  id="rsocial" name="rsocial" placeholder="ingrse Razon Social de la Empresa"  >
                    </div>
                    <div class="form-group col-md-12">
                      <label>Nombre Comercial</label>
                      <input type="label" class="form-control"  id="nomcomercial" name="nomcomercial" placeholder="ingrse Nombre de la Empresa"  >
                    </div>
                    
                     <div class="form-group col-md-12">
                     <br>
                         <input type="hidden" value="guardar"  name="evento">
                         <button type="submit" class="btn btn-success col-md-4">Guardar</button> 
                     </div>
                    

                    <br>
                    
                
                </div>
            </form>

          </div>
          <!-- /.box -->
        </div>
        <div class="col-md-6">
                      
          <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Adminsitracion de ficha de la Empresas</h3>
            </div>
            <!-- /.box-header -->
            <form role="form" action="../registrarEmpresas/" name="form1" id="form1" method="POST" >
                <div class="box-body">
                 Falta agregar
					  
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
              <h3 class="box-title">Empresas Registrados </h3>

            </div>
            <!-- /.box-header -->
          
                <div class="box-body"  >
                 <div class="table-responsive" style="padding: 20px;"> 
                   
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
  
<div class="modal fade" id="editarEmpresas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Editar Empresa</h4>
      </div>
      <div class="modal-body">
        <form  action="../registrarEmpresas/" method="post">
              <div class="col-md-12">
                    <div class="form-group col-md-6">
                      <label>RUC</label>
                      <input type="text" class="form-control"  id="ruc1" name="ruc1" placeholder="ingrse Nombre del Producto" onkeyup="buscar()" >
                    </div>
                    <div class="form-group col-md-6">
                      <label>Razon Social de Empresa</label>
                      <input type="text" class="form-control"  id="rsocial1" name="rsocial1" placeholder="ingrse Nombre del Producto" onkeyup="buscar()" >
                    </div>
                    <div class="form-group col-md-6">
                      <label>Nombre Comercial</label>
                      <input type="text" class="form-control"  id="nomcomercial1" name="nomcomercial1" placeholder="ingrse Nombre de la Empresa" onkeyup="buscar()" >
                    </div>
                    
                    <div class="form-group col-md-6">
                      <br>
                      <input type="hidden" name="codigo">
                      <input type="hidden" value="editar"  name="evento">
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
 
<div class="modal fade" id="eliminarEmpresas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Eliminar Empresa</h4>
      </div>
      <div class="modal-body">
        <form action="../registrarEmpresas/" method="post">
              <div class="col-md-12">
                    
                    <div class="form-group col-md-8">
                      <label>Desea eliminar la Empresa: </label>
                      <input type="text"  name="codigo"  >
                       <input type="hidden" value="eliminar"  name="evento">
                    
                     
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
<div class="modal fade" id="cartera" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Opciones de canrtera</h4>
      </div>
      <div class="modal-body">
        <form action="../registrarEmpresas/" method="post">
              <div class="col-md-12">
                    
                    
                    <div class="form-group">
	                  <div class="checkbox">
	                    <label>
	                      <input type="checkbox">
	                     Cia minera
	                    </label>
	                  </div>
	                   <div class="checkbox">
	                    <label>
	                      <input type="checkbox">
	                     provedor de mineria
	                    </label>
	                  </div>
	                  <div class="checkbox">
	                    <label>
	                      <input type="checkbox">
	                    Constructora
	                    </label>
	                  </div>
	                  <div class="checkbox">
	                    <label>
	                      <input type="checkbox">
	                     provedor Contruccion
	                    </label>
	                  </div>
	                  <div class="checkbox">
	                    <label>
	                      <input type="checkbox" disabled>
	                      Checkbox disabled
	                    </label>
	                  </div>
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

            <!-- /.box-body -->
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
   
     $('#exam').DataTable({
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
