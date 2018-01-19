<?php include_once(HTML_DIR . '/template/titulo.php'); ?>
<?php include_once(HTML_DIR . '/template/links.php'); ?>
<script >


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
</script>
<?php include_once(HTML_DIR . '/template/header_menu.php'); ?>
<div class="content-wrapper" OnLoad='compt=setTimeout("self.close();",50)'">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <?php  if(isset($sms)){ echo $sms; }?>
      <h1>Modulo: Ventas</h1>
     <input type="hidden" id="usco" value="<?=$user['US_C_CODIGO'] ?>">
     <input type="hidden" id="idemp" >
     
    </section>


    <!-- Main content -->
    <section class="content">
      <div class="row">
      
        <!-- left column -->
        <div class="col-md-12">
                      
          <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Lista de estado del Proceso de pedidos</h3>
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
                        <th>Detalle</th>
                        <th>Estado</th>
                        <th>Obs</th>
                                               
                      </thead>
                      <tbody>
                        <?php  $p = new Pedidos();
                         $result=$p->get_pedidosall($user['US_C_CODIGO'],2);
                         while($lista=$result->fetch_array()){                        
                             ?>
                             <tr>
                               <td><?php echo $lista[0] ?></td>
                               <td><?php echo $lista[1] ?></td>
                               <td><?php echo $lista[2] ?></td>
                               <td><?php echo $lista[3] ?></td>
                               <td  onclick="verdetallepedido(<?=$lista[0]?>,<?=$lista[0]?>,'<?=$lista[1]?>')"><i class="fa fa-mail-forward" data-toggle="modal" data-target="#detallepedido"  data-toggle="tooltip" title="Detalle"></i></td>
                               <td>
                                  <?php 
                                    if($lista['PED_E_ESTADO']==0){
                                    echo '<span class="badge bg-red">Baja</span>';
                                    }
                                    if($lista['PED_E_ESTADO']==1){
                                    echo '<span class="badge bg-red">Sin Validar</span>';
                                    }
                                    if($lista['PED_E_ESTADO']==2){
                                    echo '<span class="badge bg-yellow">En Proceso</span>';
                                    }
                                    if($lista['PED_E_ESTADO']==3){
                                    echo '<span class="badge bg-green">En Facturacion</span>';
                                    }
                                   ?>
                                    </td>
                                    <td><?php echo $lista[5] ?></td>
  
                             </tr>
                             <?php } ?>
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
<div  class="modal " id="detallepedido" tabindex="-1" role="dialog"  >
  <div class="modal-dialog "  >
    <div class="modal-content " style="border-radius: 15px; padding: 5px 5px 5px 5px"> 
      <div class="modal-body" >
      <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Datos de Productos</h3>
                          
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
  </div>
</div>
   
 
            <!-- /.box-body -->
 <?php include_once(HTML_DIR . '/template/footer.php'); ?>

<?php include_once(HTML_DIR . '/template/ajustes_generales.php'); ?>

<?php include_once(HTML_DIR . '/template/scrips.php'); ?>

<?php include_once(HTML_DIR . '/template/sliders.php'); ?>

<!-- Bootstrap 3.3.6 -->

<!-- DataTables -->

<script >
 $(document).ready(function() {
    setTimeout(function() {
        $("#mensage").fadeOut(1500);
    },3000);
  });
  </script>
  <script>
  $(function () {
    /* BOOTSTRAP SLIDER */
    $('.slider').slider();

    /* ION SLIDER */
    $("#range_1").ionRangeSlider({
    type: 'single',
    values: [
        'Inicio', 'PEDIDO', 'BASE DATOS',
        'FACTURACION', 'CONBRANZA'
    ],
    min: 0,
      max:5,
      from: 0,
      step: 1,
      from_percent: 0,
      from_value: 'Inicio',
      prettify: false
    });
    
   });
</script>
  
<?php include_once(HTML_DIR . '/template/inferior_depues_cuerpo.php'); ?>
