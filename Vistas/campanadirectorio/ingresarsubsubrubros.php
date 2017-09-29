<?php include_once(HTML_DIR . '/template/titulo.php'); ?>
<?php include_once(HTML_DIR . '/template/links.php'); ?>
<?php include_once(HTML_DIR . '/template/css_calendar.php'); ?>
<script >
$(document).ready(function(){
  buscar1();

});

function buscar1(){


  var buscar=$("#txtbuscar").val();
  var url="../Vistas/campanadirectorio/ajaxsubsubrubros.php";
  
  $('#tablajson tbody').html('');
    $.ajax({
           type: "GET",
           url: url,
           data: {txt: buscar}, // Adjuntar los campos del formulario enviado.
                      
           success: function(data)
           {
               //$("#respuesta").html(data); // Mostrar la respuestas del script PHP.
                $('#tablajson tbody').html(data);
              

           }
         });
   

}
function rubros(){

var sec=$("#sector").val();
var url="../Vistas/campanadirectorio/rubros.php";
  
  $('#rubro').html('');
    $.ajax({
           type: "GET",
           url: url,
           data: {s: sec}, // Adjuntar los campos del formulario enviado.
                      
           success: function(data)
           {
               //$("#respuesta").html(data); // Mostrar la respuestas del script PHP.
                $('#rubro').html(data);
              

           }
         });
   

}
function subrubros(){

var sec=$("#rubro").val();
var url="../Vistas/campanadirectorio/subsubrubros.php";
  
  $('#subrubro').html('');
    $.ajax({
           type: "GET",
           url: url,
           data: {s: sec}, // Adjuntar los campos del formulario enviado.
                      
           success: function(data)
           {
               //$("#respuesta").html(data); // Mostrar la respuestas del script PHP.
                $('#subrubro').html(data);
              

           }
         });
   

}
function rubros2(){

var sec=$("#sec").val();
var url="../Vistas/campanadirectorio/rubros.php";
  
  $('#ru').html('');
    $.ajax({
           type: "GET",
           url: url,
           data: {s: sec}, // Adjuntar los campos del formulario enviado.
                      
           success: function(data)
           {
               //$("#respuesta").html(data); // Mostrar la respuestas del script PHP.
                $('#ru').html(data);
              

           }
         });
   

}



</script>
<?php include_once(HTML_DIR . '/template/header_menu.php'); ?>


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <?php  if(isset($sms)){ echo $sms; }?>
      <h1>
      Rubros
        <small></small>
         
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-4">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h4 class="box-title">Ingresar Rubrosss</h4>
            </div>
            <div class="box-body">
            	<form action="../ingresarsubsubRubros/" method="POST">
	            <div class="form-group ">
	                <label>Sector</label>
		            <select class="form-control" name="sector" id="sector" onchange="rubros()">
                <option value="">Selecionar</option>
		              	<option value="36">Minería</option>
		              	<option value="39">Construción</option>
		            </select>
	             </div>
               <div class="form-group ">
                  <label>Categoría</label>
                <select class="form-control" name="rubro" id="rubro" onchange="subrubros()">
                  
                </select>
               </div>
               <div class="form-group ">
                  <label>Rubro</label>
                <select class="form-control" name="subrubro" id="subrubro">
                  
                </select>
               </div>
	             <div class="form-group " >
                  <label>Nombre del Sub-Rubro</label>
              	  <input type="" name="desc" class="form-control" value="">
              </div>
              <div class="form-group ">
                  <input type="hidden" name="evento"  value="agregar">
                  <input type="submit" name="" class="btn btn-success" value="Agregar">
              </div>
             </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
         </div>

         <div class="col-md-8">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h4 class="box-title">Modifcar  Sub-Rubro</h4>
            </div>
            <div class="box-body">
            
              
             
              <div class="input-group input-group-sm col-md-12">	            
                <input type="text" class="form-control"  id="txtbuscar" name="txtbuscar" onkeyup="buscar1()" placeholder="Descripción"  >
                    <span class="input-group-btn">

                       <boton class="btn btn-info " id="btn_enviar"  onclick="buscar1()" ><i class="fa  fa-search"></i></boton>
                    </span>
              </div>
              
              
              <div>
		         <table class="table table-bordered table-hover"  id="tablajson">
		          	<thead class="bg-gray color-palette">
		         	<tr>
		         		<td colspan="2" width="10%">Mantenimientos</td>
		         		
		         		<td>Sector</td>
		         		<td>Categoría</td>
                <td>Rubros</td>
                <td>Sub-Rubros</td>
		         		
		         	</tr>
		         	</thead>
		         	<tbody>
		         		
		         	</tbody>
		         </table>
             </div>
            </div>

            <!-- /.box-body -->
          </div>
          <!-- /. box -->
         </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include_once(HTML_DIR . '/template/footer.php'); ?> 
<div class="modal" id="editarRubro" tabindex="-1" role="dialog" aria-labelledby="">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header bg-green color-palette">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Modificar Rubro</h4>
      </div>
      <div class="modal-body ">
         
            <form  action="../ingresarsubsubRubros/" method="post">
              
        
             <div class="form-group ">
	               <h4 class="modal-rubro" id=""></h4>
		            <input type="hidden" name="secc" >
		             <input type="hidden" name="codigo" >
	          </div>
            
	          <div class="form-group " >
                  <label>Descripción</label>
              	  <input type="" name="desc" class="form-control" value="">
              </div>
           
             </div>
             
      
      		<div class="modal-footer">
          		 <input type="hidden" name="evento"  value="editar">
                  <input type="submit" name="" class="btn btn-success" value="Actualizar">
      </div>
       </form>
      </div> 
    </div>
  </div>
</div>
<div class="modal fade" id="eliminarrubro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-red color-palette">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Eliminar Rubro</h4>
      </div>
      <div class="modal-body">
        <form action="../ingresarsubsubRubros/" method="post">
              <div class="col-md-12">
                    
                    <div class="form-group col-md-8">
                     
                      <input type="hidden"  name="codigo"  >
                       <input type="hidden" value="eliminar"  name="evento">
                    
                     
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
<?php include_once(HTML_DIR . '/template/scrip_calendar.php'); ?> 

<!-- Bootstrap 3.3.6 -->

<!-- DataTables -->

<script >
 $(document).ready(function() {
    setTimeout(function() {
        $("#mensage").fadeOut(1500);
    },3000);
  });

$('#editarRubro').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id')
  var sec = button.data('sec')
  var nombre = button.data('desc')
  var sector = button.data('secnm')

   
  var modal = $(this)
  modal.find('.modal-title').text('Editar : ' + nombre)
  modal.find('.modal-rubro').text('Rubro : '+ sector)
 
  modal.find('input[name="codigo"]').val(id)
  modal.find('input[name="sec1"]').val(sec)
  modal.find('input[name="secc"]').val(sec)
  modal.find('input[name="desc"]').val(nombre)
  
})
  
 $('#eliminarrubro').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id')
 
  var nombre = button.data('desc')
 

   
  var modal = $(this)
  modal.find('.modal-title').text('Eliminar : ' + nombre)
 
  modal.find('input[name="codigo"]').val(id)
  
 
})



 
  </script>
  
<?php include_once(HTML_DIR . '/template/inferior_depues_cuerpo.php'); ?>
