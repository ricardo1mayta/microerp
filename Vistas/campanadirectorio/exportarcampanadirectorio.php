<?php
header("Content-type:text/html;charset=utf-8");
header("Content-Type:application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment;filename=\"Reporte.xls\"");
header("Expires: 0");

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>


 <?php  
              require('../../config.ini.php');
              include("../../Modelo/conexion.php");
              include("../../Modelo/campanadirectorio/directorio.php"); ?>
<?php
//Inicio de la instancia para la exportación en Excel


echo "<table border=1> ";
echo "<tr> ";
echo     "<th>EMPRESA</th> ";
echo 	"<th>SECTOR</th> ";
echo 	"<th>CATEGORIA</th> ";
echo 	"<th>RUBRO</th> ";
echo 	"<th>NOMBRE DIRECTORIO</th> ";
echo 	"<th>PAGANTE</th> ";
echo "</tr> ";
$d=new Directorio();
$dir=$d->get_directorioexport();
while($row=$dir->fetch_array()){	

	

	echo "<tr> ";
	echo 	"<td>".$row['Empresa']."</td> "; 
	echo 	"<td>".$row['Sector']."</td> "; 
	echo 	"<td>".$row['Categoria']."</td> "; 
	echo 	"<td>".$row['Rubro']."</td> "; 
	echo 	"<td>".$row['NombreDirectorio']."</td> "; 
	echo 	"<td>".$row['Pagante']."</td> "; 
	echo "</tr> ";

}
echo "</table> ";
?>

</body>
</html>