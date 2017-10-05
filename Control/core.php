<?php
/*
  EL NÚCLEO DE LA APLICACIÓN!
*/

session_start();
 $user=$_SESSION['usuario'];
 
 date_default_timezone_set('America/Caracas');

#Constantes de conexión

require('config.ini.php');

#Constantes de la APP
define('HTML_DIR','Vistas/');
//define('APP_TITLE','COM');
//define('APP_COPY','Copyright &copy; ' . date('Y',time()) . ' Ocrend Software.');
//define('APP_URL','localhost:90/OcrendBB/'); //Adaptado a mi nuevo entorno con Ubuntu
//require('vendor/autoload.php');
require('Modelo/conexion.php');
require('Modelo/usuario.php');
require('Modelo/permisos.php');
require('Modelo/parametros.php');
require('Modelo/vistas.php');
require('Modelo/roles.php');
require('Modelo/categoria.php');
require('Modelo/marca.php');
require('Modelo/productos/producto.php');
require('Modelo/productos/detalleProducto.php');
require('Modelo/empresas/empresa.php');
require('Modelo/empresas/cartera.php');
require('Modelo/empresas/correoempresa.php');
require('Modelo/empresas/telefonoempresa.php');
require('Modelo/empresas/direccionempresa.php');
require('Modelo/empresas/tags.php');
require('Modelo/contactos/contactos.php');
require('Modelo/ejecutivas/moduloejecutivas.php');
require('Modelo/campanadirectorio/directoriorubros.php');
require('Modelo/campanadirectorio/directoriosubrubros.php');
require('Modelo/campanadirectorio/directoriosubsubrubros.php');
require('Modelo/pedidos/pedidos.php');
require('Modelo/pedidos/detallepedidos.php');
require('Modelo/campanadirectorio/directorio.php');
require('Modelo/agenda/agenda.php');
require('Modelo/agenda/tipoagenda.php');
require('Modelo/chat/chats.php');





?>
