<?php include_once(HTML_DIR . '/template/titulo.php'); ?>
<?php include_once(HTML_DIR . '/template/links.php'); ?>
<?php include_once(HTML_DIR . '/template/header_menu.php'); ?>
<script >
$(document).ready(function(){
buscar();
 $('#pagina').text('pagina 1 de ');
});


 function buscar(){
  
        var buscar=$("#txtbuscar").val();
        var url="../Vistas/empresa/asignarajax.php?txt="+buscar;
       contadores();
          $("#tablajson tbody").html("");
         
        if(buscar!=""){
          $('#resul').html('<div  class="overlay" ><img src="../Public/img/Sistema/loading3.gif" alt="Loading..." width="25" height="25" /></div>')
        //$('#resul').html('<div id="load" class="overlay"><i class="fa fa-refresh fa-spin"></i></div>')
          }
          $.getJSON(url,function(clientes){
          
          $.each(clientes, function(i,cliente){
          var newRow =
          "<tr>"
          +'<td><form action="../carteraEmpresas/" method="POST"> <input type="hidden" name="codigo" value='+cliente.codigo+'><input type="submit" class="btn btn-warning btn-xs" value="+"></form></td>'
          +'<td><form action="../empresaRubros/" method="POST"> <input type="hidden" name="codigo" value='+cliente.codigo+'><input type="submit" class="btn btn-info btn-xs" value="D"></form></td>'
          +"<td>"+cliente.ruc+"</td>" 
          +"<td>"+cliente.rsocial+"</td>"   
          +"<td>"+cliente.nombre+"</td>"
          
          
          + '<td> <button type="button" class="btn btn-danger btn-xs" data-toggle="modal"  data-target="#eliminarEmpresas" data-id='+cliente.codigo+' data-nombre='+cliente.nombre+' ><i class="fa fa-trash-o"></i></button></td>'
          +"</tr>"; 
          $(newRow).appendTo("#tablajson tbody"); 
          $('#resul').fadeIn(1000).html(clientes);

          });
         
      });
 
}
 function buscarpaginacion(evetus){
        var buscar=$("#txtbuscar").val();
       var ini=parseFloat($("#acumulador").val());
       var tot=$("#contotal").val();
       var aux=tot%10;
        if(ini>=0){
            if(evetus=='sig'){
              if(ini+10>tot-aux){
                ini=(tot-aux);
              }else{
               ini=(ini+10);
              
              }
            } 
            if(evetus=='ant')
            {
              if(ini==0){
                ini=0;
              }else{
               ini=(ini-10);
              } 
            }
            if(evetus=='fin')
            {
              
              
              if(tot==0){
                ini=0;
              }else{
               ini=(tot-aux);
            }
           }
           $('#pagina').text('Pagina '+((ini/10)+1)+' de ');
          $('#acumulador').val(ini);
          } else {
            $('#acumulador').val(0);
          }
          

        var url="../Vistas/empresa/asignarajax.php?txt="+buscar+"&limit="+ini+"";
        //alert(url);
        
          $("#tablajson tbody").html("");
         
        if(buscar!=""){
          $('#resul').html('<div  class="overlay" ><img src="../Public/img/Sistema/loading3.gif" alt="Loading..." width="25" height="25" /></div>')
        //$('#resul').html('<div id="load" class="overlay"><i class="fa fa-refresh fa-spin"></i></div>')
          }
          $.getJSON(url,function(clientes){
          
          $.each(clientes, function(i,cliente){
          var newRow =
          "<tr>"
          +'<td><form action="../carteraEmpresas/" method="POST"> <input type="hidden" name="codigo" value='+cliente.codigo+'><input type="submit" class="btn btn-warning btn-xs" value="+"></form></td>'
          +'<td><form action="../carteraEmpresas/" method="POST"> <input type="hidden" name="codigo" value='+cliente.codigo+'><input type="submit" class="btn btn-info btn-xs" value="D"></form></td>'   
          +"<td>"+cliente.ruc+"</td>"
          +"<td>"+cliente.rsocial+"</td>"
          +"<td>"+cliente.nombre+"</td>"
          
         
          + '<td> <button type="button" class="btn btn-danger btn-xs" data-toggle="modal"  data-target="#eliminarEmpresas" data-id='+cliente.codigo+' data-nombre='+cliente.nombre+' ><i class="fa fa-trash-o"></i></button></td>'
          +"</tr>"; 
          $(newRow).appendTo("#tablajson tbody"); 
          $('#resul').fadeIn(1000).html(clientes);


          });
          
          
         
      });
 
}


function contadores(){

  var buscar=$("#txtbuscar").val();
       
 var url = "../Vistas/empresa/paginacion.php?txt="+buscar; // El script a dónde se realizará la petición.
    $.ajax({
           type: "POST",
           url: url,
           data: $("#formu1").serialize(), // Adjuntar los campos del formulario enviado.
           
           
           success: function(data)
           {
               //$("#respuesta").html(data); // Mostrar la respuestas del script PHP.
                $('#total').fadeIn(1000).html(data);
              

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
</script>
<?php include_once(HTML_DIR . '/template/header_menu.php'); ?>


   <div class="content-wrapper" OnLoad='compt=setTimeout("self.close();",50)'">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <?php  if(isset($sms)){ echo $sms; }?>
      <h1>
          Modulo: Ventas
        
      </h1>
     
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

                   
                           
                   
        <!-- left column -->
        <div class="col-md-12">
                      
          <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Registro de Empresas </h3>
              <div class="box-tools pull-right">
               <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregarEmpresas" ><i class="fa fa-plus"></i> Agregar</button>
               
              </div>
              
            </div>
            <!-- /.box-header -->
            <form role="form" action="../registrarEmpresas/" name="form1" id="form1" method="POST" > 
            </form>
                <div class="box-body">
                  
                    
                    <div  style="padding: 20px 0px 0px 20px; " class="input-group col-md-6">
                    <input id="txtbuscar" name="terminos" type="text"  onkeyup="buscar()" class="form-control " placeholder="Search..." autofocus>
                        <span class="input-group-btn">
                          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"  onclick="buscar()"></i>
                          </button>
                        </span>
                    </div>
                    <div class="table-responsive" style="padding: 20px;">
                     <table class="table table-bordered table-hover" id="tablajson">
                      <thead class="bg-gray color-palette">
                        <th  width="5%" colspan="2">Op</th>
                        <th  width="25%">RUC</th>
                        <th width="35%">RAZON SOCIAL</th>
                        <th  width="40%">NOMBRE COMERCIAL</th>
                        <th width="5%"><button  class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button></th>
                                             
                      </thead>
                      <tbody></tbody>
                     </table> 
                     <label id="pagina"></label> 
                     <div id="total">
                       
                     </div>          
                      <div>

                      <input type="hidden" name="" id="acumulador" value="0">
                        <ul class="pagination">
                        <li><a href="../registrarEmpresas/">Inicio</a></li>  
                        <li><a  onclick="buscarpaginacion('ant')" >&laquo;Anterior</a></li>                      
                        <li><a  onclick="buscarpaginacion('sig')">Siguiente&raquo;</a></li>                    
                        <li><a onclick="buscarpaginacion('fin')">Final</a></li>
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
         
            <form  action="../registrarEmpresas/" method="post">
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
                  <input type="text" class="form-control"  id="ruc" name="ruc" placeholder="ingrese Nombre del Producto" onkeyup="buscar()" >
                </div>
                <div class="form-group col-md-6">
                  <label>Razon Social de Empresa</label>
                  <input type="text" class="form-control"  id="rsocial" name="rsocial" placeholder="ingrese Nombre del Producto" onkeyup="buscar()" >
                </div>
                <div class="form-group col-md-6">
                  <label>Nombre Comercial</label>
                  <input type="text" class="form-control"  id="nomcomercial" name="nomcomercial" placeholder="ingrese Nombre de la Empresa" onkeyup="buscar()" >
                </div>
                <div class="form-group col-md-6">
                  <label>Pagina Web</label>
                  <input type="text" class="form-control"  id="web" name="web" placeholder="ingrese la web de la Empresa"  >
                </div>
                 
                <div class="form-group col-md-6">
                  <br>
                  <input type="hidden" name="codigo">
                  <input type="hidden" value="guardar"  name="evento">
                  
                  
                 
                </div>
               </div> 
            
        
      
      <div class="modal-footer">
          <button type="submit"  class="btn btn-warning" ><i class="fa "></i> Guardar</button>
      </div>
       </form>
      </div> 
    </div>
  </div>
</div>
 
<div class="modal fade" id="eliminarEmpresas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-red color-palette">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Eliminar Empresa</h4>
      </div>
      <div class="modal-body">
        <form action="../registrarEmpresas/" method="post">
              <div class="col-md-12">
                    
                    <div class="form-group col-md-8">
                      <h2>Desea eliminar la Empresa</h2>
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
  modal.find('input[name="mine"]').prop("checked", "checked")
 
 

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

 $('#sectorr').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id')
  var nombre = button.data('nombre') 
  //var marcado = $("#mini").prop("checked");
  // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Eliminar a: ' + nombre)
  modal.find('input[name="codigo"]').val(id)
   modal.find('input[name="mine"]').prop("checked", "checked")
 

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
   
     $('#tablajso').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": false,
      "ordering": true,
      "info": false,
      "autoWidth": true
    });
  });

 
  </script>
  
<?php include_once(HTML_DIR . '/template/inferior_depues_cuerpo.php'); ?>
