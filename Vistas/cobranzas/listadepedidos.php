<?php include_once(HTML_DIR . '/template/titulo.php'); ?>
<?php include_once(HTML_DIR . '/template/links.php'); ?>

<script >

$(document).ready(function(){
cargarpedidos();

});

var fila=0;
var auxfila=0;
var pedido=0;
 

function verdetallepedido(p,f,n){
  pedido=p;
  $("#sell"+fila).removeClass('bg-yellow');
  var nn='00000000'+p;
  var texto='PED-'+nn.substr(nn.length - 8)+'<br>'+n;
  $("#nombreempresa").html(texto);
  auxfila=fila;
   fila=f;
    var user=$('#usco').val();
   
      var url="../Vistas/cobranzas/detallepedidos.php";
    //$('#tablajsonp tbody').html('');
        $.ajax({
               type: "GET",
               url: url,
               data: {txt:p, u:user}, // Adjuntar los campos del formulario enviado.
                          
               success: function(data)
               {
                   //$("#respuesta").html(data); // Mostrar la respuestas del script PHP.
                    $('#tablajsonp tbody').html(data);

                  $("#sell"+fila).addClass('bg-yellow');

                     
               }
             });
     
}



function validar(ped,e){

  var user=$('#usco').val();
   
      var url="../Vistas/aprovaciones/aprovar.php";
    
        $.ajax({
               type: "GET",
               url: url,
               data: {ped:ped,e:e,u:user},
               success: function(data)
               {
                     cargarpedidos();
                     swal("Aprovado: "+data);

                  
                     
               }
             });

}
function obs(ped,e){
swal({
  title: "Atención!!",
  text: "Porque Se da de Baja?",
  type: "input",
  showCancelButton: true,
  closeOnConfirm: false,
  animation: "slide-from-top",
  inputPlaceholder: "Write something"
},
function(inputValue){
  if (inputValue === false) return false;
  
  if (inputValue === "") {
    swal.showInputError("Detallar Observaciones");
    return false
  }
   
  var user=$('#usco').val();
   
      var url="../Vistas/aprovaciones/aprovar.php";
    
        $.ajax({
               type: "GET",
               url: url,
               data: {ped:ped,e:e,u:user,obs:inputValue},
               success: function(data)
               {
                     cargarpedidos();
                     swal("Desaprovado: "+data);

                  
                     
               }
             });
  
});
}
function cargarpedidos(){
var user=0;
   
      var url="../Vistas/cobranzas/pedidoslista.php";
    //$('#tablajson tbody').html('');
        $.ajax({
               type: "GET",
               url: url,
               data: {u:user}, // Adjuntar los campos del formulario enviado.
                          
               success: function(data)
               {
                   //$("#respuesta").html(data); // Mostrar la respuestas del script PHP.
                    $('#tablajson tbody').html(data);
                  

                     
               }
             });

}
// With JQuery


</script>
<?php include_once(HTML_DIR . '/template/header_menu.php'); ?>


   <div class="content-wrapper" OnLoad='compt=setTimeout("self.close();",50)'">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <?php  if(isset($sms)){ echo $sms; }?>
      <h1>Nuevo Pedido</h1>
     <input type="hidden" id="usco" value="<?=$user['US_C_CODIGO'] ?>">
     <input type="hidden" id="idemp" >
     
    </section>


    <!-- Main content -->
    <section class="content">
      <div class="row">
      
        <!-- left column -->
        <div class="col-md-6">
                      
          <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Datos de Productos</h3>
              <div class="box-tools pull-right">              
               <button type="button" class="btn btn-box-tool" data-widget="collapse"  ><i class="fa fa-minus"></i> </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
              </div>             
            </div>
            <div class="box-body">
              <div class="table-responsive" class=" col-md-12" style="padding: 20px;">
                
                 <table   class="table table-bordered table-hover" id="tablajson">
                  <thead class="bg-gray">
                    <th>#</th>
                    <th>CLiente</th>
                    <th>RUC</th>
                    <th>Monto</th>
                    <th colspan="2">Op</th>
                                           
                  </thead>
                  <tbody>
                    
                  </tbody>
                  <tfoot></tfoot>
                 </table>           
                
              </div>
          
            </div>
              
          </div>
        </div>
        <div class="col-md-6">
                      
          <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Datos de Productos</h3>
              <div class="box-tools pull-right">              
               <button type="button" class="btn btn-box-tool"  data-widget="collapse"><i class="fa fa-minus"></i> </button>
                <button type="button" class="btn btn-box-tool"  data-widget="remove"><i class="fa fa-remove"></i></button>
              </div>             
            </div>
            <div class="box-body">
             <center><h2 id="nombreempresa"></h2></center>
              <div class="table-responsive" class=" col-md-12" style="padding: 20px;">
                 
                 <table class="table table-bordered table-hover" id="tablajsonp">
                  <thead class="bg-gray">
                    <th>#</th>
                    <th>Productos</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Sub-Total</th>
                    
                                           
                  </thead>
                  <tbody>
                    
                  </tbody>
                  <tfoot></tfoot>
                 </table>           
                
              </div>
          
            </div>
              
          </div>
        </div>
       
        
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
 
<div  class="modal " id="alertas" tabindex="-1" role="dialog"  >
  <div class="modal-dialog "  >
    <div class="modal-content " style="border-radius: 15px; padding: 5px 5px 5px 5px"> 
      <div class="modal-body" >
      <center><h5 id="mensaje">Error</h5></center>
      </div> 
    </div>
  </div>
</div>            <!-- /.box-body -->
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

  
 
  </script>
  
<?php include_once(HTML_DIR . '/template/inferior_depues_cuerpo.php'); ?>
