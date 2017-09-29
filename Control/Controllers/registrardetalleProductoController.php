<?php
if(isset($_SESSION['usuario'])) {
	if(!empty($_POST['evento']))
		{
			$evento=$_POST['evento'];
			switch ($evento) {
				case 'guardardet':
						if(!empty($_POST['prod']) and !empty($_POST['nompro']) and !empty($_POST['cant']) and !empty($_POST['prec'])  ){
								$idpro=$_POST['prod'];
								$nombre=$_POST['nompro'];
								$cantidad=$_POST['cant'];
								$precio=$_POST['prec'];
								$prod=new detProductos();
								$p=$prod->save_detproducto($idpro,$nombre,$cantidad,$precio);
									if($p['sms']=='ok'){
										  // $url="../Vistas/registro_secciones.php?nom=".$nomproy;
										 $sms='<div id="mensage" class="alert alert-success alert-dismissible">
			                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			                            <h4><i class="icon fa fa-check"></i>'.$p['sms'].' </h4> Sin Problemas, Gracias.</div>';
									}
									else{
										 $sms=' <div id="mensage" class="alert alert-danger alert-dismissible">
			                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			                              <h4><i class="icon fa fa-ban"></i> Error!</h4>'.$p['sms'].'</div>';
									}
	                            include(HTML_DIR .'productos/detalleproducto.php');
						}
						else{
							$sms=' <div id="mensage" class="alert alert-danger alert-dismissible">
			                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			                              <h4><i class="icon fa fa-ban"></i> Error!</h4>Faltan Datos</div>';
							 include(HTML_DIR .'productos/detalleproducto.php');
						}
					break;
				case 'editardet':
						if(!empty($_POST['codigo']) and !empty($_POST['nombres']) and !empty($_POST['cant']) and !empty($_POST['prec'] )){
										$codigo=$_POST['codigo'];
										$nombre=$_POST['nombres'];
										$cantidad=$_POST['cant'];
										$precio=$_POST['prec'];
									$prod=new detProductos();
									$p=$prod->editar_detproducto($codigo,$nombre,$cantidad,$precio);
										if($p['sms']=='ok'){
											  // $url="../Vistas/registro_secciones.php?nom=".$nomproy;
											 $sms='<div id="mensage" class="alert alert-success alert-dismissible">
				                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				                            <h4><i class="icon fa fa-check"></i>'.$p['sms'].' </h4> Sin Problemas, Gracias.</div>';
										}
										else{
											 $sms=' <div id="mensage" class="alert alert-danger alert-dismissible">
				                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				                              <h4><i class="icon fa fa-ban"></i> Error!</h4>'.$p['sms'].'</div>';
										}
		                           include(HTML_DIR .'productos/detalleproducto.php');
		                   }
				break;
				case 'eliminardet':
						if(!empty($_POST['codigo']) ){
										 $codigo=$_POST['codigo'];
									$prod=new detProductos();
									$p=$prod->eliminar_detproducto($codigo);
										if($p['sms']=='ok'){
											  // $url="../Vistas/registro_secciones.php?nom=".$nomproy;
											 $sms='<div id="mensage" class="alert alert-success alert-dismissible">
				                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				                            <h4><i class="icon fa fa-check"></i>'.$p['sms'].' </h4> Sin Problemas, Gracias.</div>';
										}
										else{
											 $sms=' <div id="mensage" class="alert alert-danger alert-dismissible">
				                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				                              <h4><i class="icon fa fa-ban"></i> Error!</h4>'.$p['sms'].'</div>';
										}
		                            include(HTML_DIR .'productos/detalleproducto.php');
		                   }
				break;
				}
	}else
	{
		include(HTML_DIR .'productos/detalleproducto.php');
	}
}else
{
	echo "no tiene permisos de usuario";
}
//$db->close();
?>