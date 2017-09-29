<?php 
/**
* 
*/
class Master 
{
	
	function __construct()
	{
		# code...
	}

	public function cabecera($titrulo)
	{
		print"<!DOCTYPE html><html><head><meta charset='utf-8'><meta http-equiv='X-UA-Compatible' content='IE=edge'><title>".$titrulo."</title>";
		print "<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>";
		include('../Vistas/links.php');
		print"</head><body>hola mundo</body>";
		print "<body class='hold-transition skin-blue sidebar-mini'>";
		print"<div class='wrapper'>";


	}
	public function piepagina()
	{
		
		print " ";
	}

}
 ?>