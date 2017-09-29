<?php include(HTML_DIR . '/template/titulo.php'); ?>
<?php include(HTML_DIR . '/template/links.php'); ?>
<style type="text/css">
 
#mimenu{ z-index: 10000}


.fixed{position:fixed; right: 20%;top: 10%}
</style>
<script>


$(document).ready(function() {

      var ud=$("#udes").val();
      var u=$("#user").val();
      var ur='../Vistas/chats/cargar-mensages.php?u='+u+'&ud='+ud;
     // alert(u);
      // Accion que nos ubica en el mensaje mas reciente 
      function setScroll(){
          var div = document.getElementById('chat-box');
          div.scrollTop = '9999';
      }
      
      // Indicamos las acciones a ejecutar al enviar un mensaje
      
      
      // Cargamos los mensajes y nos ubicamos al ultimo
      $('#chat-box').load(ur, function(response, status, xhr) {
        if (status == "error") {
          var msg = "Hubo un error en la carga del chat: ";
          $("#error").html(msg + xhr.status + " " + xhr.statusText);
          
        } else {
         setScroll();
          //alert("hola mi tados");
        }
      });
      $('#usuarios').load('../Vistas/chats/cargar-usuarios.php', function(response, status, xhr) {
        if (status == "error") {
          var msg = "Hubo un error en la carga del chat: ";
          $("#error").html(msg + xhr.status + " " + xhr.statusText);
          
        } else {
         setScroll();
          //alert("hola mi tados");
        }
      });
 
      // Le indicamos cargar los mensajes cada 15 segundos 
      setInterval(function() {
        var uds=$("#udes").val();
        var us=$("#user").val();
        var url='../Vistas/chats/cargar-mensages.php?u='+us+'&ud='+uds;
        $('#chat-box').load(url);
        //setScroll();
         var div = document.getElementById('chat-box');
          div.scrollTop = '9999';
        //alert("holasssss");
      },15000);

      setInterval(function() {
        
        var url='../Vistas/chats/cargar-usuarios.php';
        $('#usuarios').load(url);
                 
      },20000);


 
    });
/*
window.onload=function(){
 
    var div = document.getElementById('chat-box');
    div.scrollTop = '9999';
 
}*/
</script>
<?php include(HTML_DIR . '/template/header_menu.php'); ?>
<?php  

   ?>
  <div class="content-wrapper" >
	  <div class="content">
        <div class="error">hola error</div>
      
       
	 	    <div class=" col-md-12">
          <div class="box box-warning direct-chat direct-chat-warning">
            <div class="box-header with-border">
                  <h3 class="box-title">Direct Chat</h3>

                  <div class="box-tools pull-right">
                    <span data-toggle="tooltip" title="3 New Messages" class="badge bg-yellow">3</span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle">
                      <i class="fa fa-comments"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
            </div>
            <dir class="box-body">
              <div class="row">
              <div class="col-md-3" >
                
                  <div class="" id="usuarios" style="height: 400px;overflow:auto;"  >
                    
                      
                     
                    
                    <!-- /.users-list -->
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    <form action="#" method="post">
                      <div class="input-group">
                        <input type="text" name="message" placeholder="Buscar" class="form-control">
                            <span class="input-group-btn">
                              <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                      </div>
                    </form>
                  </div>
              </div>
              <!--/.box -->
        
              <div class="col-md-9">
            
                <div class="chat" >
                  <div class="direct-chat-messages" id="chat-box" style="height:400px">
                  <!-- chat item -->
                  </div>
                </div>
            
                <div class="box-footer">
                  <form  id="formmesage" action="" method="POST" onsubmit="set_mensage(); return false;">
                    <div class="input-group">
                    <input type="hidden" name="chat-usuario" id="user" value="<?php echo $user['US_C_CODIGO'];?>">
                    <input type="hidden" name="chat-destino" id="udes" value="<?php echo $user['US_C_CODIGO'];?>">
                      <input class="form-control"  name="chat-mensaje" id="chat-form-mensaje" placeholder="Type message...">

                      <div class="input-group-btn">

                        <input  type="submit" class="btn btn-success"  value="enviar"/>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>     
      </div>
	  </div>
  </div>

<?php include(HTML_DIR . '/template/ajustes_generales.php'); ?>
<?php include(HTML_DIR . '/template/scrips.php'); ?>
<script >
  function set_mensage(){
      var uds=$("#udes").val();
         var url='../Vistas/chats/inserta-mensage.php';      
           $.ajax({
                   type: "POST",
                   url: url,
                   data: $("#formmesage").serialize(), // Adjuntar los campos del formulario enviado.
                              
                   success: function(data)
                   {
                       //$("#respuesta").html(data); // Mostrar la respuestas del script PHP.
                         $('#error').append(data); 
                      $('#chat-form-mensaje').val(''); 
                      //alert(data);
                      abre(uds);
                   }
                 });
                
                 // setScroll();
               
               
        
         
         return false;
}
function abre(ud){
      var u=$("#user").val();
      $("#udes").val(ud);
      //alert(u);
       var ur='../Vistas/chats/cargar-mensages.php?u='+u+'&ud='+ud;
      $(document).ready(function() {
      $('#chat-box').load(ur, function(response, status, xhr) {
            if (status == "error") {
              var msg = "Hubo un error en la carga del chat: ";
              $("#error").html(msg + xhr.status + " " + xhr.statusText);
              alert("errro");
            } else {
             // setScroll();
              var div = document.getElementById('chat-box');
              div.scrollTop = '9999';
              $( "#chat-form-mensaje" ).focus();
              //alert("hola mi tados");
            }
          });
      });
}  
</script>
<?php include(HTML_DIR . '/template/inferior_depues_cuerpo.php'); ?>
