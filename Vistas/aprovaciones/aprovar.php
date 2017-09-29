 <?php  
require('../../config.ini.php');
include("../../Modelo/conexion.php");
include("../../Modelo/pedidos/pedidos.php"); ?>
<?php  
$ped=$_REQUEST['ped'];
$us=$_REQUEST['u'];
$e=$_REQUEST['e'];
$obs=$_REQUEST['obs'];

$p = new Pedidos();
$result=$p->validar_pedidos($ped,$us,$e,$obs);

?>
     