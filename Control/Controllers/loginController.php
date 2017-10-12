<?php


if(isset($_POST['login'])){

	$us = new User();

$email=$_POST["email"];
$pass=md5($_POST["pass"]);

$login = $us->check_login($email, $pass);
 		//$use = new User();
 		//$us=$_SESSION['USUARIO'];
    	//$u=$use->user_ingreso($user['US_C_CODIGO']);
        //echo $us['US_C_CODIGO']."usuario:".$u[0];
        
    if ($login>0) {
    
        echo "<script language=Javascript> location.href=\"./principal/\"; </script>";
    } else {
        
 	echo "<script language=Javascript> location.href=\"\"; </script>";
     session_destroy();
    }

} else{
		$use = new User();
 		
    	//$u=$use->user_salida($user['US_C_CODIGO']);
        //echo "usuario:".$u[0];
include(HTML_DIR .'login/login.php');
session_destroy();
}





 
?>