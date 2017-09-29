<?php 
require("../Datos/conexion.php");
//$con=new sqlserver;


$con=conectar();
$users=mysql_query("select * from user",$con);

while($fila=mysql_fetch_array($users)){
    echo $fila[1]."<br>";
}

/*
$consulta = mysql_query("SELECT * FROM ");
desconectar();

while($fec = mysql_fetch_array($consulta)){
	
$start_date = $fec['FecIni'];
$end_date = $fec['FecFin'];
$fecha_a_evaluar = date("d-m-Y");

if (check_in_range($start_date, $end_date, $fecha_a_evaluar)) {
	$edi = $fec['Detalle'];	
	$fecfinmin = $fec['FecFin'];
	}
}
*/
 ?>