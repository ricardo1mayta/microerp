<?php 
include"../Entidades/parametros.php";
$nombre=$_POST['nompar'];
$Descrip=$_POST['Desccripcion'];
$paramtro=new Parametros();

if ($paramtro->guardar_parametros($nombre,$Descrip,'0')==true and $nombre!="") {
    echo "gruardaro exitoso";
    header("location:../Vistas/administracion_atributos.php");

} else {
    echo "eror" ;
}



 ?>