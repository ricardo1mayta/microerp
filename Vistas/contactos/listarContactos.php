<?php include_once(HTML_DIR . '/template/titulo.php'); ?>
<?php include_once(HTML_DIR . '/template/links.php'); ?>

<?php include_once(HTML_DIR . '/template/header_menu.php'); ?>
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blank page
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">BUSCAR CONTACTOS</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body table-responsive no-padding">
	        <div class="col-md-12">
        
				<form action="" method="post">
					<input type="search" name="txtCriterio" class="form-control" placeholder="Buscar por Ruc, Empresa, Contacto o correo">
				</form>
				<table class="table table-hover">
				<tr>
					<th>N°</th>
					<th>EMPRESA</th>
					<th>CONTACTO</th>
					<th>OPCIONES</th>
				</tr>
					<?php
					$cargo=new contactos();
					$criterio=$_REQUEST["txtCriterio"];
					foreach((array)$cargo->mostrar_contacto($criterio) as $fila){
					(int)$n+=1;	
					?>
				<tr>
					<td><?=$n;?></td>
					<td>EMPRESA</td>
					<td>
						<?=$fila["CON_D_TRATADO"];?> 
						<?=strtoupper($fila["CON_D_NOMBRE"]);?>
						<?=strtoupper($fila["CON_D_APELLIDO"]);?>
					</td>
					<td><i class="fa fa-trash"></i></td>				
				</tr>	
					<?php } ?>	
				</table>
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
