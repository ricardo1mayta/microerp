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
   
      var url="../Vistas/pedidos/detallepedidos.php";
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


function eliminarproducto(id,p){

 swal({
  title: "Atención!!",
  text: "Desea Eliminar?",
  type: "warning",
   confirmButtonText: "OK",
  cancelButtonText: "Cancelar",
  showCancelButton: true,
  closeOnConfirm: false,
  showLoaderOnConfirm: true,
},
function(){
  setTimeout(function(){
    var user=$('#usco').val();
   
      var url="../Vistas/pedidos/deletedetallepedido.php";
    
        $.ajax({
               type: "GET",
               url: url,
               data: {txt:id, u:user}, // Adjuntar los campos del formulario enviado.
                          
               success: function(data)
               {
                   //$("#respuesta").html(data); // Mostrar la respuestas del script PHP.
                    //alert(data);
                    cargarpedidos();
                    verdetallepedido(p,fila);
                    
                    swal("Eliminado: "+data+fila);
                    $("#sell"+fila).addClass('bg-yellow');

                  
                     
               }
             });
    
  }, 1000);
});

}
function eliminapedido(id){

 swal({
  title: "Atención!!",
  text: "Desea Eliminar?",
  type: "warning",
   confirmButtonText: "OK",
  cancelButtonText: "Cancelar",
  showCancelButton: true,
  closeOnConfirm: false,
  showLoaderOnConfirm: true,
},
function(){
  setTimeout(function(){
    var user=$('#usco').val();
   
      var url="../Vistas/pedidos/deletepedido.php";
    
        $.ajax({
               type: "GET",
               url: url,
               data: {txt:id, u:user},
               success: function(data)
               {
                     cargarpedidos();
                     swal("Eliminado: "+data);

                  
                     
               }
             });
    
  }, 1000);
});

}
function cargarpedidos(){
var user=$('#usco').val();
   
      var url="../Vistas/pedidos/pedidosuser.php";
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
function updatedetalle(i,c,t){
   $(c).keypress(function(e) {
    if(e.which == 13) {
        var ca=$(c).val();
        
        var user=$('#usco').val();
   
        var url="../Vistas/pedidos/updatedetallepedido.php";
        cargarpedidos();
          $.ajax({
                 type: "GET",
                 url: url,
                 data: {u:user,p:ca,txt:i,t:t}, 
                            
                 success: function(data)
                 {
                     
                     verdetallepedido(pedido,pedido);

                      swal("Actualizado: "+data+" pedido "+pedido);

                       
                 }
               });
     
    }
});
 
}
function editc(i,p){

  $("#fc"+i).html('<input onkeyup="updatedetalle('+i+',this,2)" type="text" value="'+p+'" />');
  $("#ec"+i).hide();
  $("#cc"+i).show();

}
function canceleditc(i,p){
  $("#fc"+i).html(p);
  $("#ec"+i).show();
  $("#cc"+i).hide();
}
function edit(i,p){

  $("#f"+i).html('<input onkeyup="updatedetalle('+i+',this,1)" type="text" value="'+p+'" />');
  $("#s"+i).show();
  $("#e"+i).hide();
  $("#c"+i).show();

}
function canceledit(i,p){
  $("#f"+i).html("$."+p);
  $("#s"+i).hide();
  $("#e"+i).show();
  $("#c"+i).hide();
}

function test(f){
  $("#sell"+f).addClass('bg-yellow');
}
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
               <button type="button" class="btn btn-box-tool" data-toggle="modal"  ><i class="fa fa-minus"></i> </button>
                <button type="button" class="btn btn-box-tool" data-toggle="modal"><i class="fa fa-remove"></i></button>
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
               <button type="button" class="btn btn-box-tool" data-toggle="modal"  ><i class="fa fa-minus"></i> </button>
                <button type="button" class="btn btn-box-tool" data-toggle="modal"><i class="fa fa-remove"></i></button>
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
                    <th >OP</th>
                                           
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
