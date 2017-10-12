<?php 
require('../../config.ini.php');
include("../../Modelo/conexion.php");
include("../../Modelo/pedidos/pedidos.php"); ?>
<?php 
$us=$_POST['u'];

$idped=$_POST['idped'];

$dir_subida = '../../Public/img/Validaciones/';
$fichero_subido = $dir_subida . $idped.basename($_FILES['archivo']['name']);
$nombre=$idped.basename($_FILES['archivo']['name']);


if (move_uploaded_file($_FILES['archivo']['tmp_name'], $fichero_subido)) {
    echo "El fichero es válido y se subió con éxito.\n";
    $p = new Pedidos();
	 $result=$p-> valida_pedido($idped,$us,$nombre); 
	 echo $result[0];
} else {
    echo "¡Posible ataque de subida de ficheros!\n";
}





 ?>