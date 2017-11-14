<?php include_once(HTML_DIR . '/template/titulo.php'); ?>
<?php include_once(HTML_DIR . '/template/links.php'); ?>
<script >
	function noespacios(i) {
		var er = new RegExp(/\s/);
		var web = document.getElementById('tag').value;;
		if(er.test(web)){
			alert('No se permiten espacios');
			return false;
		}
                else
			return true;
	}
</script>
<?php include_once(HTML_DIR . '/template/header_menu.php'); ?>

<!-- Content Wrapper. Contains page content -->
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

      <!-- Default box -->
      <div class="box box-warning">
        <div class="box-header with-border">
          <?php 
          //if(isset($_POST['codigo'])){ $idempresa=$_POST['codigo']; }else{$idempresa=$idemp;}
          	
            	//	$e=new Empresas(); 
            	//	$emp=$e->get_Empresasid($idempresa);
            ?>
             

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
        	<div class="row">
	        	<div class="col-md-6 ">
	        		<form action="../tagsempresas/" method="POST" onsubmit="return noespacios()">
			      		<div class="form-group col-md-8">
				            <label  class="col-sm-1 control-label">Tag</label>
				            <div class="col-md-10">
				            	<input type="text"  class="form-control"  id="tag" name="tag"  placeholder="Tag" >
				            </div>
				        </div>
				        <div class="form-group col-md-4">
				            
				            <input type="submit" class="btn btn-warning "   name="evento"  value="Agregar"  >
				        </div>

			        </form>
			        
		        </div>
		       
		        <div class="col-md-6 ">
		        <br>
		        	<table class="table table-border" border="1">
		        		<thead class="bg-gray color-palette">
		        			<th>Id</th>
		        			<th>Nombre</th>
		        			<th width="10%">Opciones</th>
		        		</thead>
		        		<tbody>
		        			<?php 
		        			$t=new Tags();
		        			$ta=$t->get_alltags();
		        			$n=1;
		        			 while($row=$ta->fetch_array()){  
		        			 ?>
		        			 <tr>
		        			 	<td><?php echo $n++; ?></td>
		        			 	<td><?php echo $row['TAG_D_NOMBRE']; ?></td>
		        			 	<td><button type="button" class="btn btn-danger btn-xs" data-toggle="modal"  data-target="#eliminarEmpresas" data-id='<?php echo $row[0]; ?>' data-nombre='<?php echo $row[1]; ?>'><i class="fa fa-trash-o"></i></button></td>
		        			 </tr>
		        			<?php } ?>
		        		</tbody>
		        	</table>
		        </div>
		  	</div>

        </div>
        
      </div>
      <!-- /.box -->
    
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php include_once(HTML_DIR . '/template/footer.php'); ?>

<div class="modal fade" id="eliminarEmpresas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-red color-palette">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Eliminar Empresa</h4>
      </div>
      <div class="modal-body">
        <form action="../tagsempresas/" method="post">
              <div class="col-md-12">
                    
                    <div class="form-group col-md-8">
                      <h2>Desea eliminar El Tag</h2>
                      <input type="hidden"  name="codigo"  >
                       <input type="hidden" value="Eliminar"  name="evento">
                    
                     
                    </div>
                    
              </div>
        
      </div>
      <div class="modal-footer">
          <button type="submit"  class="btn btn-warning" ><i class="fa fa-trash-o"></i> Aceptar </button>
      </div>
      </form>
      </div> 
    </div>
  </div>
</div>

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
 $('#eliminarEmpresas').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id')
  var nombre = button.data('nombre') 
 
  var modal = $(this)
  modal.find('.modal-title').text('Eliminar a: ' + nombre)
  modal.find('input[name="codigo"]').val(id)
 
 
})
 

  </script>

  
<?php include_once(HTML_DIR . '/template/inferior_depues_cuerpo.php'); ?>
