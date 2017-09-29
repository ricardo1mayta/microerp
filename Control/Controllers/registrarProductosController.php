<?php
if(isset($_SESSION['usuario'])) {

	if(!empty($_POST['evento']))
		{

			$evento=$_POST['evento'];

			switch ($evento) {
				case 'guardar':
						if(!empty($_POST['marca']) and !empty($_POST['fini']) and !empty($_POST['ffin']) and !empty($_POST['nompro'])){

								
								$marca=$_POST['marca'];
								$fini=$_POST['fini'];
								$ffin=$_POST['ffin'];
								$nombre=$_POST['nompro'];
								$prod=new Productos();

								$p=$prod->save_producto($nombre,$marca,$fini,$ffin);
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
	                            include(HTML_DIR .'productos/registrarProductos.php');
	                            
						}
						else{
							$sms=' <div id="mensage" class="alert alert-danger alert-dismissible">
			                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			                              <h4><i class="icon fa fa-ban"></i> Error!</h4>Faltan Datos</div>';
							 include(HTML_DIR .'productos/registrarProductos.php');

						}
					break;
				case 'finalizar':
						if(!empty($_POST['codigo']) ){

								
								$codigo=$_POST['codigo'];

							$prod=new Productos();

							$p=$prod->fin_producto($codigo);
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
                            include(HTML_DIR .'productos/registrarProductos.php');
                   }
				break;
				case 'editar':

						if(!empty($_POST['codigo']) ){

										
										 $codigo=$_POST['codigo'];
										 $nompro=$_POST['nombres'];
										if ($_POST['finic']==''){ $fini=$_POST['fi'];} else {$fini=$_POST['finic'];}
										if ($_POST['ffind']==''){ $ffin=$_POST['ff'];} else {$ffin=$_POST['ffind'];}
										

									$prod=new Productos();

									$p=$prod->editar_producto($codigo,$nompro,$fini,$ffin);
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
		                            include(HTML_DIR .'productos/registrarProductos.php');
		                   }
				break;
				case 'eliminar':

						if(!empty($_POST['codigo']) ){

										
										 $codigo=$_POST['codigo'];
										
										

									$prod=new Productos();

									$p=$prod->eliminar_producto($codigo);
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
		                            include(HTML_DIR .'productos/registrarProductos.php');
		                   }
				break;

				}
					
	}else
	{
		include(HTML_DIR .'productos/registrarProductos.php');
	}


}else
{
	echo "no tiene permisos de usuario";
}
//$db->close();
?>