<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Menu Principal</title><?php 
  if(isset($_SESSION['usuario'])){ 
 $usuario=$_SESSION['usuario'];
} else {
	echo "<script language=Javascript> location.href=\"../\"; </script>";
}

 ?>