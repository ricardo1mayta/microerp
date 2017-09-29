
<?php 
require('../../config.ini.php');
include("../../Modelo/conexion.php");
include("../../Modelo/contactos/contactos.php"); ?>
<?php 
$us=$_GET['u'];
$tip=$_GET['t'];
$e=$_GET['e'];
$con=$_GET['c'];
$p = new Contactos();
 $result=$p->activa_tipocontacto($e,$us,$con,$tip); 
 echo $result[0]; ?>