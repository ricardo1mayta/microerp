<?php require('Control/core.php');

$v=new Permisos();
if(isset($_GET['view'])) {
$vis=$v->chexview($user['US_C_CODIGO'],$_GET['view']);
$activ=$_GET['view'];
	if($vis==$_GET['view']){

		if(file_exists('Control/Controllers/' . $_GET['view'] . 'Controller.php')) {
		    include('Control/Controllers/' . $_GET['view'] . 'Controller.php');
		  } else {

		   include('Control/Controllers/errorController.php');
		  }
	 
	}else { 

		include('Control/Controllers/loginController.php');	
	 }


	  
} else {
	  echo "No existe la pagina!!!";
	}

?>
