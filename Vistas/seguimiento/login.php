<?php
session_start();
include_once 'include/functions.php';
$user = new User();

if ($user->get_session())
{
   header("location:home.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {    
    $login = $user->check_login($_POST['emailusername'], $_POST['password']);
    if ($login) {
        // Registration Success
       header("location:login.php");
    } else {
        // Registration Failed
        echo 'Username / password wrong';
    }
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
       
        <title>Demo 9lessons.info | Login</title>
		<style>
		body
		{
				font-family:Arial, Helvetica, sans-serif;
		}
		</style>
		<script language="javascript" type="text/javascript"> 
		
	
            function submitregistration() {
                var form = document.login;
				
     
 
if(form.emailusername.value == "")
{
alert( "Enter email or username." );
return false;
}
else if(form.password.value == "")
{
alert( "Enter password." );
return false;
}
 
 
}
 
 
	</script> 
    </head>
    <body>
        <div id="container">
           
            <div id="main-body">
                <br/><br/>
                <form method="POST" action=""  id="login_form" name="login">
                    <div class="head">
                        <b> Login Here !</b><br/><br/>
                    </div>
                    <label>Email or Username</label><br/>
                    <input type="text" name="emailusername"  required="true"/><br/>         <br/>
                    <label>Password</label><br/>
                    <input type="password" name="password" id="password" required="true"/><br/><br/>
                    <input type="hidden" name="flag" value="login"/>
                    <input type="submit" name="login_btn" onclick="return( submitregistration());" value="Login"/><br/><br/>
                    <label><a href="register.php">Register new user</a></label>
                </form>
				More tutorials <a href="http://9lessons.info">http://9lessons.info</a>
            </div>
           
        </div>
    </body>
</html>