<?php include_once(HTML_DIR . '/template/titulo.php'); ?>
<?php include_once(HTML_DIR . '/template/links.php'); ?>
<script >
$(document).ready(function(){
  var us=$("#idusu").val();
  
  buscar1(us);
 $('#pagina').text('pagina 1 de ');
});


 
 function buscarpaginacion(evetus){
        var buscar=$("#txtbuscar").val();
       var ini=parseFloat($("#acumulador").val());
       var tot=$("#contotal").val();
       var us=$("#idusu").val();
      var  n=1;
       var aux=tot%10;
        if(ini>=0){
           if(evetus=='sig'){ if(ini+10>tot-aux){ ini=(tot-aux);n=(ini/10) ; }else{ ini=(ini+10); n=(ini/10) ;} } 
            if(evetus=='ant'){ if(ini==0){ ini=0; n=(ini/10) ; }else{ ini=(ini-10); n=(ini/10) ; } }
            if(evetus=='fin') { if(tot==0){ ini=0; n=(ini/10) ;}else{ ini=(tot-aux);n=(ini/10) ; } }
            if(evetus=='ini') { if(tot==0){ ini=0; n=(ini/10) ; }else{ ini=0; n=1;  } }

          $('#acumulador').val(ini);
          $('#pagina').text('Pagina '+((ini/10)+1)+' de ');
          } else {
            $('#acumulador').val(0);
          }
          

        var url="../Vistas/ejecutivas/empresasUsuarios.php";
        //alert(url);
        
          $.ajax({
           type: "GET",
           url: url,
           data: {u: us,txt: buscar,limit:ini}, // Adjuntar los campos del formulario enviado.
                      
           success: function(data)
           {
               //$("#respuesta").html(data); // Mostrar la respuestas del script PHP.
                $('#tablajson tbody').html(data);
              $('#resul').fadeIn(1000).html(data);

           }
         });
 
}

function buscar1(){

  var buscar=$("#txtbuscar").val();
  var url="../Vistas/ejecutivas/empresasUsuarios.php";
  var us=$("#idusu").val();
  contadores(us)
  $('#resul').html('<div  class="overlay" ><img src="../Public/img/Sistema/loading3.gif" alt="Loading..." width="25" height="25" /></div>')
    $.ajax({
           type: "GET",
           url: url,
           data: {u: us,txt: buscar}, // Adjuntar los campos del formulario enviado.
                      
           success: function(data)
           {
               //$("#respuesta").html(data); // Mostrar la respuestas del script PHP.
                $('#tablajson tbody').html(data);
              $('#resul').fadeIn(1000).html(data);

           }
         });
  }


function contadores(u){

var buscar=$("#txtbuscar").val();

var url="../Vistas/ejecutivas/paginacionuser.php"; // El script a dónde se realizará la petición.
    $.ajax({
           type: "GET",
           url: url,
           data: {u: u,txt: buscar}, 
                      
           success: function(data)
           { 
               //$("#respuesta").html(data); // Mostrar la respuestas del script PHP.
                $('#total').fadeIn(1000).html(data);
              

           }
         });
}


</script>
<?php include_once(HTML_DIR . '/template/header_menu.php'); ?>


   <div class="content-wrapper" OnLoad='buscar()'>
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <?php  if(isset($sms)){ echo $sms; }?>
      <h1>Modulo: Ventas</h1>
      
    <input type="hidden" id="idusu" value="<?php echo $usuario['US_C_CODIGO']; ?>"> 
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

                   
                           
                   
        <!-- left column -->
        <div class="col-md-12">
                      
          <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Cartera de Empresas</h3>
              <div class="box-tools pull-right">
              
               
              </div>
              
            </div>
            <!-- /.box-header -->
            <form role="form" action="../registrarEmpresas/" name="form1" id="form1" method="POST" > 
            </form>
                <div class="box-body">
                  
                    
                    <div  style="padding: 20px 0px 0px 20px; " class="input-group col-md-6">
                    <input id="txtbuscar" name="terminos" type="text"  onkeyup="buscar1()" class="form-control " placeholder="Search..." autofocus>
                        <span class="input-group-btn">
                          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"  onclick="buscar1()"></i>
                          </button>
                        </span>
                    </div>
                    <div class="table-responsive" style="padding: 20px;">
                     <table class="table table-bordered table-hover" id="tablajson">
                      <thead class="bg-gray color-palette">
                        <th  width="5%" colspan="2"><button  class="btn btn-warning btn-xs">+</button></th>
                        <th  width="25%">RUC</th>
                        <th width="35%">RAZON SOCIAL</th>
                        <th  width="40%">NOMBRE COMERCIAL</th>
                        <th  width="40%">MINERIA</th>
                        <th  width="40%">CONSTRUCION</th>
                                                                     
                      </thead>
                      <tbody></tbody>
                     </table> 
                      <label id="pagina"></label> 
                     <div id="total">
                       
                     </div>
                             
                      <div>

                      <input type="hidden" name="" id="acumulador" value="0">
                        <ul class="pagination">
                        <li style="cursor: pointer" ><a onclick="buscarpaginacion('ini')">Inicio</a></li>  
                        <li style="cursor: pointer"><a  onclick="buscarpaginacion('ant')" >&laquo;Anterior</a></li>                      
                        <li style="cursor: pointer"><a  onclick="buscarpaginacion('sig')">Siguiente&raquo;</a></li>                    
                        <li style="cursor: pointer"><a onclick="buscarpaginacion('fin')">Final</a></li>
                        </ul>
                      </div>
                    </div>
                    
                </div>     
           </div>
          <!-- /.box -->
        </div>
        
         <!-- left column -->
        
        
        
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
 <?php include_once(HTML_DIR . '/template/footer.php'); ?> 
<div class="modal" id="agregarEmpresas" tabindex="-1" role="dialog" aria-labelledby="">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header bg-green color-palette">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Datos Generales de la  Empresa</h4>
      </div>
      <div class="modal-body ">
         
            <form  action="../listarEmpresas/" method="post">
              <div class="col-md-12">

                  <?php 
                      $cate = new Parametros();
                         $SECTOR=$cate->get_Idparametros('35');
                         while($cat=$SECTOR->fetch_array()){  
                             ?>
                                <div class="form-group col-md-6">
                                  <label> <?php echo $cat['PAR_D_NOMBRE']?></label>

                                  <?php 
                                      $cate1 = new Parametros();
                                       $SECTOR1=$cate1->get_Idparametros($cat['PAR_C_CODIGO']);
                                       while($cat1=$SECTOR1->fetch_array()){  
                                   ?>
                                    <div class="checkbox">
                                      <label>
                                        <input type="checkbox" value="<?php echo $cat1['PAR_C_CODIGO']?>" class="flat-red" name="mine[]">
                                      <?php echo $cat1['PAR_D_NOMBRE']?>
                                      </label>
                                    </div>
                                             
                                 <?php }?>
                                </div>

                         <?php }?>

              </div>
        
              <div class="box col-md-12 ">
              <br>
                <div class="form-group col-md-6">
                  <label>RUC</label>
                  <input type="text" class="form-control"  id="ruc" name="ruc" placeholder="ingrse Nombre del Producto" onkeyup="buscar()" >
                </div>
                <div class="form-group col-md-6">
                  <label>Razon Social de Empresa</label>
                  <input type="text" class="form-control"  id="rsocial" name="rsocial" placeholder="ingrse Nombre del Producto" onkeyup="buscar()" >
                </div>
                <div class="form-group col-md-6">
                  <label>Nombre Comercial</label>
                  <input type="text" class="form-control"  id="nomcomercial" name="nomcomercial" placeholder="ingrse Nombre de la Empresa" onkeyup="buscar()" >
                </div>
                 
                <div class="form-group col-md-6">
                  <br>
                  <input type="hidden" name="codigo">
                  <input type="hidden" value="guardar"  name="evento">
                  
                  
                 
                </div>
               </div> 
            
        
      
      <div class="modal-footer">
          <button type="button"  class="btn btn-warning" ><i class="fa "></i> Guardar</button>
      </div>
       </form>
      </div> 
    </div>
  </div>
</div>
 


            <!-- /.box-body -->
 

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
