<?php
if(isset($_SESSION['usuario'])) {

	if(!empty($_POST['evento']))
		{

			$evento=$_POST['evento'];

			switch ($evento) {
				case 'guardar':

					//$db = new Conexion();
					include(HTML_DIR .'seguimiento/administracion_atributos.php');
					//$db->close();
					break;
				}
			}else
	{
		include(HTML_DIR .'seguimiento/administracion_atributos.php');
	}


}else
{
	echo "no tiene permisos de usuario";
}
?>