<?php include_once(HTML_DIR . '/template/titulo.php'); ?>
<?php include_once(HTML_DIR . '/template/links.php'); ?>
<script >
 $(document).ready(function() {

   
  });
  function buscar(e){
    var u=<?php echo $usuario['US_C_CODIGO']; ?>;

  var buscar=$("#text").val();
  var url="../Vistas/empresa/listartags.php";
 
  $('#tag').html('<div  class="overlay" ><img src="../Public/img/Sistema/loading3.gif" alt="Loading..." width="25" height="25" />hola</div>')
    $.ajax({
           type: "GET",
           url: url,
           data: {txt: buscar,e: e,u: u}, // Adjuntar los campos del formulario enviado.
                      
           success: function(data)
           {
               //$("#respuesta").html(data); // Mostrar la respuestas del script PHP.
                $('#tag').html(data);
              $("#tag").show();

           }
         });
  }
  function link(e,u,t){
  


  var url="../Vistas/empresa/listartags.php";
 
  $('#tag').html('<div  class="overlay" ><img src="../Public/img/Sistema/loading3.gif" alt="Loading..." width="25" height="25" />hola</div>')
    $.ajax({
           type: "GET",
           url: url,
           data: {e: e, u: u, t: t}, // Adjuntar los campos del formulario enviado.
                      
           success: function(data)
           {
               //$("#respuesta").html(data); // Mostrar la respuestas del script PHP.
                $('#tag').html(data);
              $("#tag").show();

           }
         });

  $("#tag").hide();
  $("#text").val("");
  }
  function eliminar(i,u,e){

  var url="../Vistas/empresa/listartags.php";
 
  $('#tag').html('<div  class="overlay" ><img src="../Public/img/Sistema/loading3.gif" alt="Loading..." width="25" height="25" />hola</div>')
    $.ajax({
           type: "GET",
           url: url,
           data: {u: u, tg: i,e:e}, // Adjuntar los campos del formulario enviado.
                      
           success: function(data)
           {
               //$("#respuesta").html(data); // Mostrar la respuestas del script PHP.
                $('#tag').html(data);
              $("#tag").show();

           }
         });
  }


  function cargar_contactos(){
    var url="../Vistas/ejecutivas/listarContactos.php";
 var e = $("#codigocliente").val();
 //$('table_contactos').html('');
    $.ajax({
           type: "GET",
           url: url,
           data: {e:e}, // Adjuntar los campos del formulario enviado.
                      
           success: function(data)
           {
               //$("#respuesta").html(data); // Mostrar la respuestas del script PHP.
                $('#table_contactos tbody').html(data);
            // alert(e);

           }
         });

  }

  function newcontacto()
  {
      var url="../Vistas/ejecutivas/savecontacto.php";
  var e = $("#codigocliente").val();
 //$('table_contactos').html('');
    $.ajax({
           type: "GET",
           url: url,
           data: {e:e}, // Adjuntar los campos del formulario enviado.
                      
           success: function(data)
           {
               //$("#respuesta").html(data); // Mostrar la respuestas del script PHP.
                $('#table_contactos tbody').html(data);
             //alert(e);

           }
         });
  }
  function newtelefono(e,c,m)
  { 
  
    if (validanumero(e,c,m)){
    $('#newtel').modal('toggle'); 
    var url="../Vistas/ejecutivas/savetelefono.php";
  
  //$('table_contactos').html('');
    $.ajax({
           type: "GET",
           url: url,
           data: $("#newtelefono").serialize(), // Adjuntar los campos del formulario enviado.
                      
           success: function(data)
           {
               //$("#respuesta").html(data); // Mostrar la respuestas del script PHP.
                //$('#table_contactos tbody').html(data);
            swal("Agregado",data, "success");
             cargar_contactos();

           }
         });
  }else{
    swal("Alerta",m, "error");
  }
  }
function edittelefono(e,c,m)
  { 
    
  if (validanumero(e,c,m)){
    $('#edittel').modal('toggle'); 
    var url="../Vistas/ejecutivas/updatetelefono.php";
  
  //$('table_contactos').html('');
    $.ajax({
           type: "GET",
           url: url,
           data: $("#editelcon").serialize(), // Adjuntar los campos del formulario enviado.
                      
           success: function(data)
           {
               //$("#respuesta").html(data); // Mostrar la respuestas del script PHP.
                //$('#table_contactos tbody').html(data);
            swal("Agregado",data, "success");
             cargar_contactos();

           }
         });
  }else{
    swal("Alerta",m, "error");
  }
  }
  function delete_telefono(t){
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
                  var u=<?php echo $usuario['US_C_CODIGO']; ?>;
                          var url="../Vistas/ejecutivas/deletetelefono.php";
                //$('table_contactos').html('');
                $.ajax({
                       type: "GET",
                       url: url,
                       data: {t:t,u:u}, // Adjuntar los campos del formulario enviado.
                                  
                       success: function(data)
                       {
                           //$("#respuesta").html(data); // Mostrar la respuestas del script PHP.
                            //$('#table_contactos tbody').html(data);
                        swal("Agregado",data, "success");
                         cargar_contactos();

                       }
                     });                               
                       }, 1000);
              }); 
  }
function newcorreo(e,m)
  { 
  
    if (validacorreo(e,m)){
    $('#newcorr').modal('toggle'); 
    var url="../Vistas/ejecutivas/savecorreo.php";
  
  //$('table_contactos').html('');
    $.ajax({
           type: "GET",
           url: url,
           data: $("#frmnewcorreo").serialize(), // Adjuntar los campos del formulario enviado.
                      
           success: function(data)
           {
               //$("#respuesta").html(data); // Mostrar la respuestas del script PHP.
                //$('#table_contactos tbody').html(data);
            swal("Agregado",data, "success");
             cargar_contactos();

           }
         });
  }else{
    swal("Alerta",m, "error");
  }
  }
function editcorreo(e,m)
  { 
    
  if (validacorreo(e,m)){
    $('#editcorr').modal('toggle'); 
    var url="../Vistas/ejecutivas/updatecorreo.php";
  
  //$('table_contactos').html('');
    $.ajax({
           type: "GET",
           url: url,
           data: $("#formedicorreo").serialize(), // Adjuntar los campos del formulario enviado.
                      
           success: function(data)
           {
               //$("#respuesta").html(data); // Mostrar la respuestas del script PHP.
                //$('#table_contactos tbody').html(data);
            swal("Agregado",data, "success");
             cargar_contactos();

           }
         });
  }else{
    swal("Alerta",m, "error");
  }
  }
  function delete_correo(t){

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
                  var u=<?php echo $usuario['US_C_CODIGO']; ?>;
                          var url="../Vistas/ejecutivas/deletecorreo.php";
                //$('table_contactos').html('');
                $.ajax({
                       type: "GET",
                       url: url,
                       data: {c:t,u:u}, // Adjuntar los campos del formulario enviado.
                                  
                       success: function(data)
                       {
                           //$("#respuesta").html(data); // Mostrar la respuestas del script PHP.
                            //$('#table_contactos tbody').html(data);
                        swal("Agregado",data, "success");
                         cargar_contactos();

                       }
                     });                               
                       }, 1000);
              }); 
  }
function savecontactoss(){
    var u=<?php echo $usuario['US_C_CODIGO']; ?>;
          var url="../Vistas/ejecutivas/savecontacto.php";
          //$('table_contactos').html('');
        $.ajax({
               type: "GET",
               url: url,
               data:$("#frmcontactos").serialize() , // Adjuntar los campos del formulario enviado.
                          
               success: function(data)
               {
                   //$("#respuesta").html(data); // Mostrar la respuestas del script PHP.
                    //$('#table_contactos tbody').html(data);
                    $('#addcontactos').modal('toggle'); 
                    cargar_contactos();
                swal("Agregado",data, "success");
                 

               }
             });                               
      
}
function updatecontactoss(){
    var u=<?php echo $usuario['US_C_CODIGO']; ?>;
          var url="../Vistas/ejecutivas/updatecontacto.php";
          //$('table_contactos').html('');
        $.ajax({
               type: "GET",
               url: url,
               data:$("#frmeditacontactos").serialize() , // Adjuntar los campos del formulario enviado.
                          
               success: function(data)
               {
                   //$("#respuesta").html(data); // Mostrar la respuestas del script PHP.
                    //$('#table_contactos tbody').html(data);
                    $('#editcontactos').modal('toggle'); 
                    cargar_contactos();
                swal("Actaualizado",data, "success");
                 

               }
             });                               
      
}
function deletecontactoss(c){
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
                  var u=<?php echo $usuario['US_C_CODIGO']; ?>;
                var url="../Vistas/ejecutivas/deletecontacto.php";
                //$('table_contactos').html('');
              $.ajax({
                     type: "GET",
                     url: url,
                     data:{c:c,u:u} , // Adjuntar los campos del formulario enviado.
                                
                     success: function(data)
                     {             
                          cargar_contactos();
                      swal("Eliminado",data, "success");
                       

                     }
                   });                             
                       }, 1000);
              }); 



                                 
      
}
function estados(p)
  {
  var e =$(p).val();
 
   var url="../Vistas/ejecutivas/estados.php";
   $("#estados").html('');
    $("#provincia").hide('');
     $("#distrito").hide('');
                  
              $.ajax({
                     type: "GET",
                     url: url,
                     data:{p:e} , // Adjuntar los campos del formulario enviado.
                                
                     success: function(data)
                     {             
                       $("#estados").show();    
                      $("#estados").html(data);
                       

                     }
                   });           

}
function provincia(p)
  {
  var e =$(p).val();
 
   var url="../Vistas/ejecutivas/provincia.php";
   $("#provincia").html('');
       $("#distrito").html('');             
              $.ajax({
                     type: "GET",
                     url: url,
                     data:{p:e} , // Adjuntar los campos del formulario enviado.
                                
                     success: function(data)
                     {             
                      $("#provincia").show();    
                      $("#provincia").html(data);
                       

                     }
                   });           

}
function distrito(p)
  {
  var e =$(p).val();
  
   var url="../Vistas/ejecutivas/distrito.php";
   $("#distrito").html('');
                  
              $.ajax({
                     type: "GET",
                     url: url,
                     data:{p:e} , // Adjuntar los campos del formulario enviado.
                                
                     success: function(data)
                     {             
                       $("#distrito").show();   
                      $("#distrito").html(data);
                       

                     }
                   });           

}
function editarubigeo(){
$("#pais").show();
$("#botones").show(); 

}
function ocultar(t){
$("#botones").hide();  
$("#pais").hide();
$("#estados").hide();
$("#provincia").hide();
$("#distrito").hide();
}
function agregarubigeo(em){
  var p= $("#p").val();
var e=$("#e").val();
var pr= $("#pr").val();
var di=$("#di").val();
var u=<?php echo $usuario['US_C_CODIGO']; ?>;

var url="../Vistas/ejecutivas/guardarubigeo.php";
   
                  
              $.ajax({
                     type: "GET",
                     url: url,
                     data:{p:p,e:e,pr:pr,di:di,u:u,em:em} , // Adjuntar los campos del formulario enviado.
                                
                     success: function(data)
                     {   
                        cargarubigeo();
                        swal('ok',data,'success');
                        ocultar();
                     }
                   });        
 
  

}
function cargarubigeo(){
  var e=<?php echo $_POST['codigo'];?>;
  var url="../Vistas/ejecutivas/cargarubigeo.php";
   $('#ubigeo').html('');
                  
              $.ajax({
                     type: "GET",
                     url: url,
                     data:{e:e} , // Adjuntar los campos del formulario enviado.
                                
                     success: function(data)
                     {   
                        $('#ubigeo').html(data);
                        
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
        Administración del Sistema
        <small>Digamma</small>
      </h1>
     
    </section>
    <section class="content">
      <div class="row">
      
          <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab">INFORMACIÓN GENERAL</a></li>
                <li><a href="#tab_2" data-toggle="tab">INFORMACIÓN ADICIONAL</a></li>
                <li><a href="#tab_3" data-toggle="tab">CONTACTOS</a></li>
                <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
              </ul>
              <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    <div class="box box-warning">
                  <div class="box-header with-border">
             
                    <?php 
                    if(isset($_POST['codigo'])){ $idempresa=$_POST['codigo']; }else{$idempresa=$idemp;}
                      
                          $e=new Empresas(); 
                          $emp=$e->get_Empresasid($idempresa);
                      ?>
                        <h2 class="box-title text-green"><small>Información General de:</small> <?php echo $emp['EMP_D_RAZONSOCIAL'];?></h2>
                        <h3 class="box-title text-red"><small>&nbsp; Estado:</small> <?php echo $emp['ESTADO'];?></h3>
                       
                    <div class="box-tools pull-right">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                      <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                    </div>
                  </div>     
                  <div class="box-body">
                    <div class="col-md-6"> 
                      <form action="../carteraEmpresas/" method="POST">
                        
                        
                    <div class="form-group ">
                            <label>RUC</label>
                            <input type="text" class="form-control input-sm"  id="rucemp" name="rucemp" value="<?php echo $emp['EMP_C_RUC'];?>" placeholder="Ruc"  >
                            </div>
                            <div class="form-group ">
                            <label>Razón Social</label>
                                      <input type="text" class="form-control" value="<?php echo $emp['EMP_D_RAZONSOCIAL'];?>" id="rsocial" name="rsocial" placeholder="Razon Social"  >
                            </div>
                            <div class="form-group ">
                            <label>Nombres Comercial</label>
                              <input type="text" class="form-control" value="<?php echo $emp['EMP_D_NOMBRECOMERCIAL'];?>" id="nomcomercial" name="nomcomercial" placeholder="Empresa"  >
                            </div>
                            <div class="input-group ">
                              <label>Pagina Web</label>
                            </div>
                            <div class="input-group input-group-sm">              
                              <input type="text" class="form-control" value="<?php echo $emp['EMP_W_WEB'];?>" id="web" name="web" placeholder="web"  >
                                  <span class="input-group-btn">
                                     <a  class="btn btn-info btn-flat" target="_blank" href="http://<?php echo $emp['EMP_W_WEB'];?>">Ir</a>
                                  </span>
                          </div>
                        <div class="form-group ">
                            <label>Estado</label>
                            <select class="form-control" name="estado">
                              <option value="<?php echo $emp['EMP_E_ESTADO'];?>"><?php echo $emp['ESTADO'];?></option>
                              <option value="1">Activo</option>
                              <option value="2">No Aplica</option>
                              <option value="3">Baja</option>
                              <option value="4">Solcidado</option>
                              <option value="5">Solicitud de baja</option>
                            </select>
                        </div>
                        <div class="form-group ">
                            <input type="hidden" name="evento" value="actualizar">
                            <input type="hidden" name="idemp" value="<?php echo $idempresa; ?>">
                               <button class="btn btn-info">Actualizar</button>
                      </div>
                         
                     
                  </form> 
                </div> 

                <div class="col-md-6">  
                    <div class="form-group  "> 
                      <label>Asignaciones</label>
                       <div class="box-tools pull-right">
                         <button type="button" class="btn btn-success btn-xs" data-toggle="modal"  data-target="#sectorr" data-id='+cliente.codigo+' data-nombre='+cliente.nombre+' ><i class="fa fa-plus-square"></i></button>
                              
                  </div>
                  <div class="col-md-12">
                    <table class="table">
                    <thead>
                      <td>Rubro</td>
                      <td>Ejecutiva</td>
                    </thead>
                            <?php $usu=$_SESSION['usuario'];
                                $cate = new Cartera();
                                   $SECTOR=$cate->get_sectorempresa($emp['EMP_C_CODIGO']);
                                   while($cat=$SECTOR->fetch_array()){  
                                       ?>
                                      <tr>
                                         <td><?php echo $cat['SECTOR']?></td>
                                         <td>
                                         <form method="POST" id="cod<?php echo $cat['PAR_C_CODIGO']?>" >
                                          <input type="hidden" name="idemp" value="<?php echo $idempresa; ?>">
                                          <input type="hidden" name="idcar" value="<?php echo $cat['CAR_C_CODIGO'];?>">
                                          <input type="hidden" name="evento" value="ejecutiva">
                                          <div  id="combo<?php echo $cat['PAR_C_CODIGO']?>" > 
                                             <?php 
                                       $eje=new Cartera(); 
                                  $ej=$eje->get_ejecutivasasignadas($emp['EMP_C_CODIGO'], $cat['PAR_C_CODIGO']);?>
                                  
                                   <label id="ejecutivaa" ><?php if($ej['NOMBRE']==""){echo "<p class='text-red'>Falta Asignar</p>";}else{ echo "<p class='text-green'>".$ej['NOMBRE']."</p>";} ?></label>
                                  <input type="hidden" name="ideje" value="<?php echo $ej['US_C_CODIGO']; ?>">
                          </div>
                          </form>
                          </td>
                          <td>
                          <input type="image" name="" src="../Public/img/Sistema/edit.png" onclick="mostrarcombo(combo<?php echo $cat['PAR_C_CODIGO']?>); return false;">
                            
                          </td>
                        </tr>
                                     <?php }?>

                            </table>    
                          </div>
                          <div class="form-group  "> 
                            <div class="form-group">
                       <label>Tags</label>
                      </div>
                      
                  <div class="col-md-12">
                    <div class="form-group">
                    <input type="text" name="text" id="text" class="form-control" onkeyup="buscar(<?php echo $idempresa; ?>)">
                    </div>
                    <div class="form-group" id="tag">
                    
                    </div>
                    
                       
                          </div>
                         
                  </div>
                </div>
                    </div>
                  </div>        
            </div>
        <div class="tab-pane" id="tab_2">
          fffjfjf
        </div>
      </div>
      </div>
    </div>
  </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php include_once(HTML_DIR . '/template/footer.php'); ?>
<div class="modal" id="sectorr" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Sector que falta Agregar</h4>
      </div>
      <div class="modal-body">
        <form action="../carteraEmpresas/" method="post">
           <?php 
              $cate = new Cartera();
                 $SECTOR1=$cate->get_sectorfaltaempresa($emp['EMP_C_CODIGO']);
                 while($sec=$SECTOR1->fetch_array()){  
                     ?>
                     <div class="checkbox">
                      <label>
                      <input type="checkbox" value="<?php echo $sec['PAR_C_CODIGO']?>" name="mine[]">
                       <?php echo $sec['PAR_D_NOMBRE']?></label>
                     </div>
            <?php }?>
          
      </div>
      <div class="modal-footer">
          <input type="hidden" name="evento" value="sector">
          <input type="hidden" name="idemp" value="<?php echo $emp['EMP_C_CODIGO']; ?>">
          <input type="submit"  class="btn btn-warning" value="Agregar">
      </div>
      </form>
      </div> 
    </div>
  </div>
</div>
     <!-- /.box-body -->
<div class="modal" id="tagss" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Tags</h4>
      </div>
      <div class="modal-body">
        <form action="../carteraEmpresas/" method="post">
        <table class="table">
           <?php 
                    $tag=new Tags();
                    $t=$tag->get_alltags();
                         while($cat=$t->fetch_array()){
                     ?>
                     <tr><td>
                     <label><input type="checkbox" name="option[]" value="<?php echo $cat['TAG_C_CODIGO'] ?>" /><?php echo $cat['TAG_D_NOMBRE'] ?></label>
                     </td></tr>
                     <?php } ?>
    </table>    
      </div>
      <div class="modal-footer">
          
          <input type="hidden" name="idemp" value="<?php echo $emp['EMP_C_CODIGO']; ?>">
          <input type="submit"  class="btn btn-warning" value="Guardar">
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
    buscar(<?php echo $idempresa; ?>)
  });
 $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();
});

 function agregarejecutiva(formu){

if (confirm('Desea continuar?')) {
    formu.submit();
} else {
    // Do nothing!
    setTimeout(function() {
        $("#mensage").fadeOut(00);
    },00);
  // $("#ejecutiva").remove();
    location.reload();

}
   

 }

 function mostrarcombo(combo){
  

   var url = "../Vistas/empresa/ejecutivas.php"; // El script a dónde se realizará la petición.
    $.ajax({
           type: "POST",
           url: url,
            // Adjuntar los campos del formulario enviado.
           
           success: function(data)
           {
               //$("#respuesta").html(data); // Mostrar la respuestas del script PHP.
                $(combo).fadeIn(000).html(data);
              

           }
         });

    
      
     
    
 }



function grabarcorreo(){
 if($("#email").val().indexOf('@', 0) == -1 || $("#email").val().indexOf('.', 0) == -1) {
  $('#email').css('border-color','#FF0000');
            alert('El correo electrónico introducido no es correcto.');
            return false;
        }

 var url = "../Vistas/empresa/grabarcorreo.php"; // El script a dónde se realizará la petición.
    $.ajax({
           type: "POST",
           url: url,
           data: $("#formulario").serialize(), // Adjuntar los campos del formulario enviado.
           
           beforeSend: function(){
                        $('#resultado').html('<div  class="overlay" ><img src="../Public/img/Sistema/loading3.gif" alt="Loading..." width="25" height="25" /></div>');
            },
           success: function(data)
           {
               //$("#respuesta").html(data); // Mostrar la respuestas del script PHP.
                $('#resultado').fadeIn(1000).html(data);
              $('#email').val("");
              $('#email').css('border-color','green');

           }
         });
    return false;

    
};

function grabartelefono(){

 if ($('#phone').val().length <= 5 || isNaN($('#phone').val())) {
            $('#phone').css('border-color','#FF0000');
            alert('El número de teléfono debe tener al menos 9 números.');
            return false;
        }

 var url = "../Vistas/empresa/grabartelefono.php"; // El script a dónde se realizará la petición.
    $.ajax({
           type: "POST",
           url: url,
           data: $("#formulario1").serialize(), // Adjuntar los campos del formulario enviado.
           
           beforeSend: function(){
                        $('#resultado1').html('<div  class="overlay" ><img src="../Public/img/Sistema/loading3.gif" alt="Loading..." width="25" height="25" /></div>');
            },
           success: function(data)
           {
               //$("#respuesta").html(data); // Mostrar la respuestas del script PHP.
                $('#resultado1').fadeIn(1000).html(data);
              $('#phone').val("");
                $('#phone').css('border-color','green');

           }
         });
    return false;

    
};
function grabardireccion(){
  if ($('#direccion').val().length <= 3) {
            $('#direccion').css('border-color','#FF0000');
            alert('No es una direccion');
            return false;
        }

 var url = "../Vistas/empresa/grabadireccion.php"; // El script a dónde se realizará la petición.
    $.ajax({
           type: "POST",
           url: url,
           data: $("#formulario2").serialize(), // Adjuntar los campos del formulario enviado.
           
           beforeSend: function(){
                        $('#resultado2').html('<div  class="overlay" ><img src="../Public/img/Sistema/loading3.gif" alt="Loading..." width="25" height="25" /></div>');
            },
           success: function(data)
           {
               //$("#respuesta").html(data); // Mostrar la respuestas del script PHP.
                $('#resultado2').fadeIn(1000).html(data);
              $('#direccion').val("");
              $('#direccion').css('border-color','green');

           }
         });
    return false;

    
};

function deletedireccion(formu){
 var url = "../Vistas/empresa/deletedireccion.php"; // El script a dónde se realizará la petición.
    $.ajax({
           type: "POST",
           url: url,
           data: $(formu).serialize(), // Adjuntar los campos del formulario enviado.
           
           beforeSend: function(){
                        $('#resultado2').html('<div  class="overlay" ><img src="../Public/img/Sistema/loading3.gif" alt="Loading..." width="25" height="25" /></div>');
            },
           success: function(data)
           {
               //$("#respuesta").html(data); // Mostrar la respuestas del script PHP.
                $('#resultado2').fadeIn(1000).html(data);
              

           }
         });
};
function deletetelefono(formu){
 var url = "../Vistas/empresa/deletetelefono.php"; // El script a dónde se realizará la petición.
    $.ajax({
           type: "POST",
           url: url,
           data: $(formu).serialize(), // Adjuntar los campos del formulario enviado.
           
           beforeSend: function(){
                        $('#resultado1').html('<div  class="overlay" ><img src="../Public/img/Sistema/loading3.gif" alt="Loading..." width="25" height="25" /></div>');
            },
           success: function(data)
           {
               //$("#respuesta").html(data); // Mostrar la respuestas del script PHP.
                $('#resultado1').fadeIn(1000).html(data);
              

           }
         });
};
function deletecorreo(formu){
 var url = "../Vistas/empresa/deletecorreo.php"; // El script a dónde se realizará la petición.
    $.ajax({
           type: "POST",
           url: url,
           data: $(formu).serialize(), // Adjuntar los campos del formulario enviado.
           
           beforeSend: function(){
                        $('#resultado').html('<div  class="overlay" ><img src="../Public/img/Sistema/loading3.gif" alt="Loading..." width="25" height="25" /></div>');
            },
           success: function(data)
           {
               //$("#respuesta").html(data); // Mostrar la respuestas del script PHP.
                $('#resultado').fadeIn(1000).html(data);
              

           }
         });
};
  </script>

  
<?php include_once(HTML_DIR . '/template/inferior_depues_cuerpo.php'); ?>
<div class="box box-warning">
                  <div class="box-header with-border">
             
                    <?php 
                    if(isset($_POST['codigo'])){ $idempresa=$_POST['codigo']; }else{$idempresa=$idemp;}
                      
                          $e=new Empresas(); 
                          $emp=$e->get_Empresasid($idempresa);
                      ?>
                        <h2 class="box-title text-green"><small>Información General de:</small> <?php echo $emp['EMP_D_RAZONSOCIAL'];?></h2>
                        <h3 class="box-title text-red"><small>&nbsp; Estado:</small> <?php echo $emp['ESTADO'];?></h3>
                       
                    <div class="box-tools pull-right">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                      <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                    </div>
                  </div>     
                  <div class="box-body">
                    <div class="col-md-6"> 
                      <form action="../carteraEmpresas/" method="POST">
                        
                        
                    <div class="form-group ">
                            <label>RUC</label>
                            <input type="text" class="form-control input-sm"  id="rucemp" name="rucemp" value="<?php echo $emp['EMP_C_RUC'];?>" placeholder="Ruc"  >
                            </div>
                            <div class="form-group ">
                            <label>Razón Social</label>
                                      <input type="text" class="form-control" value="<?php echo $emp['EMP_D_RAZONSOCIAL'];?>" id="rsocial" name="rsocial" placeholder="Razon Social"  >
                            </div>
                            <div class="form-group ">
                            <label>Nombres Comercial</label>
                              <input type="text" class="form-control" value="<?php echo $emp['EMP_D_NOMBRECOMERCIAL'];?>" id="nomcomercial" name="nomcomercial" placeholder="Empresa"  >
                            </div>
                            <div class="input-group ">
                              <label>Pagina Web</label>
                            </div>
                            <div class="input-group input-group-sm">              
                              <input type="text" class="form-control" value="<?php echo $emp['EMP_W_WEB'];?>" id="web" name="web" placeholder="web"  >
                                  <span class="input-group-btn">
                                     <a  class="btn btn-info btn-flat" target="_blank" href="http://<?php echo $emp['EMP_W_WEB'];?>">Ir</a>
                                  </span>
                          </div>
                        <div class="form-group ">
                            <label>Estado</label>
                            <select class="form-control" name="estado">
                              <option value="<?php echo $emp['EMP_E_ESTADO'];?>"><?php echo $emp['ESTADO'];?></option>
                              <option value="1">Activo</option>
                              <option value="2">No Aplica</option>
                              <option value="3">Baja</option>
                              <option value="4">Solcidado</option>
                              <option value="5">Solicitud de baja</option>
                            </select>
                        </div>
                        <div class="form-group ">
                            <input type="hidden" name="evento" value="actualizar">
                            <input type="hidden" name="idemp" value="<?php echo $idempresa; ?>">
                               <button class="btn btn-info">Actualizar</button>
                      </div>
                         
                     
                  </form> 
                </div> 

                <div class="col-md-6">  
                    <div class="form-group  "> 
                      <label>Asignaciones</label>
                       <div class="box-tools pull-right">
                         <button type="button" class="btn btn-success btn-xs" data-toggle="modal"  data-target="#sectorr" data-id='+cliente.codigo+' data-nombre='+cliente.nombre+' ><i class="fa fa-plus-square"></i></button>
                              
                  </div>
                  <div class="col-md-12">
                    <table class="table">
                    <thead>
                      <td>Rubro</td>
                      <td>Ejecutiva</td>
                    </thead>
                            <?php $usu=$_SESSION['usuario'];
                                $cate = new Cartera();
                                   $SECTOR=$cate->get_sectorempresa($emp['EMP_C_CODIGO']);
                                   while($cat=$SECTOR->fetch_array()){  
                                       ?>
                                      <tr>
                                         <td><?php echo $cat['SECTOR']?></td>
                                         <td>
                                         <form method="POST" id="cod<?php echo $cat['PAR_C_CODIGO']?>" >
                                          <input type="hidden" name="idemp" value="<?php echo $idempresa; ?>">
                                          <input type="hidden" name="idcar" value="<?php echo $cat['CAR_C_CODIGO'];?>">
                                          <input type="hidden" name="evento" value="ejecutiva">
                                          <div  id="combo<?php echo $cat['PAR_C_CODIGO']?>" > 
                                             <?php 
                                       $eje=new Cartera(); 
                                  $ej=$eje->get_ejecutivasasignadas($emp['EMP_C_CODIGO'], $cat['PAR_C_CODIGO']);?>
                                  
                                   <label id="ejecutivaa" ><?php if($ej['NOMBRE']==""){echo "<p class='text-red'>Falta Asignar</p>";}else{ echo "<p class='text-green'>".$ej['NOMBRE']."</p>";} ?></label>
                                  <input type="hidden" name="ideje" value="<?php echo $ej['US_C_CODIGO']; ?>">
                          </div>
                          </form>
                          </td>
                          <td>
                          <input type="image" name="" src="../Public/img/Sistema/edit.png" onclick="mostrarcombo(combo<?php echo $cat['PAR_C_CODIGO']?>); return false;">
                            
                          </td>
                        </tr>
                                     <?php }?>

                            </table>    
                          </div>
                          <div class="form-group  "> 
                            <div class="form-group">
                       <label>Tags</label>
                      </div>
                      
                  <div class="col-md-12">
                    <div class="form-group">
                    <input type="text" name="text" id="text" class="form-control" onkeyup="buscar(<?php echo $idempresa; ?>)">
                    </div>
                    <div class="form-group" id="tag">
                    
                    </div>
                    
                       
                          </div>
                         
                  </div>
                </div>
                    </div>