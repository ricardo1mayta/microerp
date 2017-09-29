<?php 
//require("../Datos/conexion.php");
include("../cn.php");
$con=new sqlserver;


//$con=conectar();
$result=$con->query("select * from user;");

//$users=mysql_query("select * from user",$con);


        while($obj = $result->fetch_object()){ 
            echo $obj->EMAIL."<br>"; 
           
        } 
    



#EMPRESAS REVISADAS
	$cnx_contar=new sqlserver;
	$sql="SELECT COUNT(*) as A  from user";
	$result=$cnx_contar->query($sql);
	$row=$result->fetch_object();
	$empresas_revisadas_hoy=$row->A;
echo $empresas_revisadas_hoy;



 ?>

