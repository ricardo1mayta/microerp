<?php include_once(HTML_DIR . '/template/titulo.php'); ?>
<?php include_once(HTML_DIR . '/template/links.php'); ?>
<?php include_once(HTML_DIR . '/template/css_calendar.php'); ?>
<script >
$(document).ready(function(){
  buscar1(u);
 
});

function buscar1(u){

var codigo=$("#codigo").val();
var subru=$("#subrubros").val();
if ($('#subsubrubros').length) {
  var subsubru=$("#subsubrubros").val();
} else {
   var subsubru=0;
}



var u=$("#u").val();
 
  var url="../Vistas/campanadirectorio/subrubrosempresa.php";
  
  $('#tablajson tbody').html('');
    $.ajax({
           type: "GET",
           url: url,
           data: {idemp: codigo,subr: subru,u: u,ss: subsubru }, // Adjuntar los campos del formulario enviado.
                      
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
   if(sec==39){
      $('#srubros').html('<div class="form-group col-md-4"><label>Sub-Rubros</label><select class="form-control" name="subsubrubros" id="subsubrubros" ></select></div>');
      
    }else{
      $('#srubros').html('');
      
    }

}

function subru(){
var sec=$("#rubro").val();


var url="../Vistas/campanadirectorio/subrubros.php";
 
  $('#subsubrubros').html('');
    $.ajax({
           type: "GET",
           url: url,
           data: {s: sec}, // Adjuntar los campos del formulario enviado.
                      
           success: function(data)
           {
               //$("#respuesta").html(data); // Mostrar la respuestas del script PHP.
                $('#subrubros').html(data);
              

           }

         });

   
 
}

function subsubru(){

var sec=$("#subrubros").val();
var url="../Vistas/campanadirectorio/subsubrubros1.php";
 
  $('#subsubrubros').html('');
    $.ajax({
           type: "GET",
           url: url,
           data: {s: sec}, // Adjuntar los campos del formulario enviado.
                      
           success: function(data)
           {
               //$("#respuesta").html(data); // Mostrar la respuestas del script PHP.
                $('#subsubrubros').html(data);
              

           }
         });
    

}
function duplica(){
  var nombre1=$("#n1").val();
  $("#n2").val(nombre1);

}

</script>
<?php include_once(HTML_DIR . '/template/header_menu.php'); ?>


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <?php  if(isset($sms)){ echo $sms; }?>
    <?php   if(isset($_POST['codigo'])){ $idempresa=$_POST['codigo']; }else{$idempresa=$idemp;}
          	$e=new Empresas(); $emp=$e->get_Empresasid($idempresa);
            $d=new Directorio(); $dir=$d->get_empresadirectorio($idempresa);
            $dc=new Directorio(); $dirc=$dc->get_empresadirectorioc($idempresa);
            ?>
      <h1>
      Rubros >
       <small>Empresa :</small> <?php echo $emp['EMP_D_RAZONSOCIAL'];?>
       <small>RUC :</small> <?php echo $emp['EMP_C_RUC'];?>
        <small>&nbsp; Estado:</small> <?php echo $emp['ESTADO'];?> 
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12 " id="agrega" >
          <div class="box box-solid">
            <div class="box-header with-border">
              <h4 class="box-title">Nombre para el Directorio Minria</h4>
                <input type="hidden" name="codigo" id="codigo"  value="<?php echo $idempresa;?>">
               
            </div>
            <div class="box-body ">
              <form action="../empresaRubros/" method="POST">
                            
               <div class="form-group col-md-8" >
                  <?php  ?>
                  <input type="text" name="n" id="n1" class="form-control" value="<?php if($dir['DRT_D_NOMBRE']==""){ echo $emp['EMP_D_NOMBRECOMERCIAL']; } else { echo $dir['DRT_D_NOMBRE']; }?>">

              </div>
              <div class="form-group col-md-2">
                  <div class="radio">
                  <label>Pagante:  </label>
                      <?php if($dir['DRT_N_PAGANTE']==1) { ?>
                      <label>
                      <input type="radio" name="paga" id="optionsRadios1" value="1" required="required" checked>
                      Si
                      </label>
                      
                      <label>
                      <input type="radio" name="paga" id="optionsRadios1" value="0" required="required" >
                      No
                      </label>
                      
                      <?php }else { ?>
                      <label>
                      <input type="radio" name="paga" id="optionsRadios1" value="1" required="required" >
                      Si
                      </label>
                      <label>
                       <input type="radio" name="paga" id="optionsRadios1" value="0" required="required" >
                       No
                       </label>
                       <?php } ?>
                   
                  </div>
                             
                </div>
              <div class="form-group col-md-2">
              <input type="hidden" name="u" id="u" value="<?php echo $usuario['US_C_CODIGO'];?>">
                  <input type="hidden" name="e"  value="<?php echo $idempresa;?>">
                  <input type="hidden" name="sector"  value="36">
                  <input type="hidden" name="dir"  value="<?php echo $dir['DRT_C_CODIGO']; ?>">
                    <?php if($dir['EMP_C_CODIGO']==$idempresa) { ?>

                  <input type="submit" name="evento" class="btn btn-warning" value="Actualizar" >
                  <input type="button" id="dupliaca" class="btn btn-info" value="Copiar" onclick="duplica()">
                  <?php } else { ?>
                   <input type="submit" name="evento" class="btn btn-success" value="Guardar" >
                   <?php } ?>

              </div>
             </form>
            </div>
            <!-- /.box-body -->
          </div>
          <div class="box box-solid">
            <div class="box-header with-border">
              <h4 class="box-title">Nombre para el Directorio Construcción</h4>
                <input type="hidden" name="codigo" id="codigo"  value="<?php echo $idempresa;?>">
               
            </div>
            <div class="box-body ">
              <form action="../empresaRubros/" method="POST">
                            
               <div class="form-group col-md-8" >
                  <?php  ?>
                  <input type="text" name="n" id="n2" class="form-control" value="<?php if($dir['DRT_D_NOMBRE']==""){ echo $emp['EMP_D_NOMBRECOMERCIAL']; } else { echo $dirc['DRT_D_NOMBRE']; }?>">

              </div>
              <div class="form-group col-md-2">
                  <div class="radio">
                  <label>Pagante:  </label>
                      <?php if($dirc['DRT_N_PAGANTE']==1) { ?>
                      <label>
                      <input type="radio" name="paga" id="optionsRadios1" value="1" required="required" checked>
                      Si
                      </label>
                      
                      <label>
                      <input type="radio" name="paga" id="optionsRadios1" value="0" required="required" >
                      No
                      </label>
                      
                      <?php }else { ?>
                      <label>
                      <input type="radio" name="paga" id="optionsRadios1" value="1" required="required" >
                      Si
                      </label>
                      <label>
                       <input type="radio" name="paga" id="optionsRadios1" value="0" required="required" >
                       No
                       </label>
                       <?php } ?>
                   
                  </div>
                             
                </div>
              <div class="form-group col-md-2">
              <input type="hidden" name="u" id="u" value="<?php echo $usuario['US_C_CODIGO'];?>">
                  <input type="hidden" name="e"  value="<?php echo $idempresa;?>">
                   <input type="hidden" name="sector"  value="39">
                  <input type="hidden" name="dir"  value="<?php echo $dirc['DRT_C_CODIGO']; ?>">
                    <?php if($dirc['EMP_C_CODIGO']==$idempresa) { ?>

                  <input type="submit" name="evento" class="btn btn-warning" value="Actualizar" >
                  <?php } else { ?>
                   <input type="submit" name="evento" class="btn btn-success" value="Guardar" >
                   <?php } ?>

              </div>
             </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
         </div>
         
       
        <div class="col-md-12">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h4 class="box-title">Seleccionar Rubros y  Sub-Rubros</h4>
            </div>
            <div class="box-body">
            	<form action="" method="POST">
	            <div class="form-group col-md-3">
	                <label>Sector</label>
		            <select class="form-control" name="sector" id="sector" onchange="rubros()">
                <option value="">Selecionar</option>
		              	<option value="36">Mineria</option>
		              	<option value="39">Construción</option>
		            </select>
	             </div>
               <div class="form-group col-md-3">
                  <label>Categoria</label>
                <select class="form-control" name="rubro" id="rubro" onchange="subru()">                  
                </select>
               </div>
               <div class="form-group col-md-4">
                  <label>Rubros</label>
                <select class="form-control" name="subrubros" id="subrubros" onchange="subsubru()">                
                </select>
               </div>
               <div id="srubros">
                 
               </div>
               
	            
              <div class="form-group col-md-2">
              <br>
                  <input type="hidden" name="evento"  value="agregar">
                  <input type="submit" name="" class="btn btn-success" value="Agregar" onclick="buscar1(); return false;">
              </div>
             </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
         </div>

         <div class="col-md-12">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h4 class="box-title"> Lista de Sub - Rubros Agregados</h4>
            </div>
            <div class="box-body">
            
              <div>
		         <table class="table table-bordered table-hover"  id="tablajson">
		          	<thead class="bg-gray color-palette">
		         	<tr>
		         		<td  width="10%">Mantenimientos</td>
		         		
		         		<td>Sector</td>
		         		<td>Categoria</td>
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

<div class="modal fade" id="eliminarrubro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-red color-palette">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Eliminar Rubro</h4>
      </div>
      <div class="modal-body">
        <form action="../empresaRubros/" method="POST">
              <div class="col-md-12">
                    
                    <div class="form-group col-md-8">
                     
                      <input type="hidden"  name="codigo"  >
                      <input type="hidden"  name="cod"  >
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

  
 $('#eliminarrubro').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id')
 
  var codigo = button.data('codigo')
 

   
  var modal = $(this)
  modal.find('.modal-title').text('Desea Eliminar : ' )
 
  modal.find('input[name="codigo"]').val(codigo)
   modal.find('input[name="cod"]').val(id)
 
})



 
  </script>
  
<?php include_once(HTML_DIR . '/template/inferior_depues_cuerpo.php'); ?>
