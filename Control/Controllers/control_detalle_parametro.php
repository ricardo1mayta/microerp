<?php 
include"../Entidades/parametros.php";
$dparamtro=new Parametros();

(int)$idtipo=$_POST['tipoParam'];
$nombre=$_POST['NdetParametro'];
$Descrip=$_POST['Desccripcion'];
if ($dparamtro->guardar_parametros($nombre,$Descrip,$idtipo)==true and $nombre!="" and $idtipo!="") {
    echo "gruardaro exitoso";
   header("location:../Vistas/administracion_atributos.php");

} else {
    echo "eror" ;
}

 ?>