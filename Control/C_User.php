<?php 

include_once '../Entidades/usuario.php';
$user = new User();

$email=$_POST["email"];
$pass=md5($_POST["pass"]);

$login = $user->check_login($email, $pass);
    if ($login) {
    	$user=$_SESSION['usuario'];
       
        // Registration Success
       /* if($user['US_C_CODIGO']==51)
        {
			?><script language="JavaScript" type="text/javascript">
				location.href = "http://190.102.143.46:8080/agatha/gerencia/ventarevistaanual2015.php";
				</script><?php        	
        }else
        { ?><script language="JavaScript" type="text/javascript">
				location.href = "../Vistas/principal.php";
				</script><?php
					
        }*/
    } else {
        // Registration Failed
 			$cookie_name = "err";
			$cookie_value = " Error de Corre / Contraseña";
			setcookie($cookie_name, $cookie_value, time() + 6, "/"); // 86400 = 1 day
        	
			?><script language="JavaScript" type="text/javascript">
				location.href = "../index.php";
				</script><?php
        

    }


 ?>