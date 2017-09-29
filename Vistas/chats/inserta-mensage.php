     <?php  
              require('../../config.ini.php');
              include("../../Modelo/conexion.php");
             include("../../Modelo/chat/chats.php"); 
               ?>

<?php 

  //Verificamos que el nombre usuario este presente en el campo de texto oculto
  $u = false;
  if(isset($_POST['chat-usuario']) and strlen(trim($_POST['chat-usuario'])) > 0 and strlen(trim($_POST['chat-destino'])) > 0)
  {
    $usuario = $_POST['chat-usuario'];
    $u = true;
  }
   
  //Verificamos que el mensaje sea valido
  $m = false;
  if(isset($_POST['chat-mensaje']) and strlen(trim($_POST['chat-mensaje'])) > 0)
  {
    $mensaje = $_POST['chat-mensaje'];
    $m = true;
  }
  $d = false;
  if(isset($_POST['chat-destino']) and strlen(trim($_POST['chat-destino'])) > 0)
  {
    $des = $_POST['chat-destino'];
    $d = true;
  }
   
  $ret = $usuario;
 
  // Si ambos son validos
  if($u and $m and $d)
  {
  	$chat=new Chat(); 
    $result=$chat->save_chats($mensaje,$usuario,$des);

   
    $ret = $mensaje;
  }
  echo $ret;
?>