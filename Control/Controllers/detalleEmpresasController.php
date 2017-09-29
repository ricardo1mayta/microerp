<?php
if(isset($_SESSION['usuario'])) {

	if(!empty($_POST['evento']))
		{

			$evento=$_POST['evento'];

			switch ($evento) {
				case 'actualizar':

							 	
						if( !empty($_POST['rsocial'])  and !empty($_POST['rucemp']) ){
								
								 $us=$_SESSION['usuario'];
								 $rsocial=$_POST['rsocial'];
								 $nomcomercial=$_POST['nomcomercial'];
								 $ruc=$_POST['rucemp'];
								
								 $estado=$_POST['estado'];
								 $idus=$us['US_C_CODIGO'];
								 $idemp=$_POST['idemp'];
								 $web=$_POST['web'];
								$prod=new Empresas();
								
								$p=$prod->update_empresa($ruc,$rsocial,$nomcomercial,$estado,$idus,$idemp,$web);
									if($p['sms']=='ok'){
																					
										  // $url="../Vistas/registro_secciones.php?nom=".$nomproy;
										$sms='<div id="mensage" class="alert alert-success alert-dismissible">
			                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			                            <h4><i class="icon fa fa-check"></i>'.$p['sms'].' </h4>'.$ms.' Sin Problemas, Gracias.</div>';

									}
									else{
										$sms=' <div id="mensage" class="alert alert-danger alert-dismissible">
			                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			                              <h4><i class="icon fa fa-ban"></i> Error!</h4>'.$p['sms'].'</div>';
			                           
									}
	                         include(HTML_DIR .'ejecutivas/detalleEmpresas.php');
	                            
						}
						else{
							$sms=' <div id="mensage" class="alert alert-danger alert-dismissible">
			                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			                              <h4><i class="icon fa fa-ban"></i> Error!</h4>Faltan Datos</div>';
							include(HTML_DIR .'ejecutivas/detalleEmpresas.php');

						}

					break;
					case 'ejecutiva':

					

					$idcar=$_POST['idcar'];
					$idusu=$user['US_C_CODIGO'];
					$ideje=$_POST['ideje'];
					$idemp=$_POST['idemp'];
					$car=new Cartera();

					$p=$car->set_ejecutivacartera($idcar,$ideje,$idusu);
					if($p['sms']=='ok'){
																					
										  // $url="../Vistas/registro_secciones.php?nom=".$nomproy;
										$sms='<div id="mensage" class="alert alert-success alert-dismissible">
			                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			                            <h4><i class="icon fa fa-check"></i>'.$p['sms'].' </h4>'.$ms.' Sin Problemas, Gracias.</div>';

									}
									else{
										$sms=' <div id="mensage" class="alert alert-danger alert-dismissible">
			                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			                              <h4><i class="icon fa fa-ban"></i> Error!</h4>'.$p['sms'].'</div>';
			                           
									}
	                         include(HTML_DIR .'ejecutivas/detalleEmpresas.php');
	                         
					break;

					case 'sector':

					$id=$_REQUEST["mine"];
					
					$idusu=$user['US_C_CODIGO'];
					
					$idemp=$_POST['idemp'];
					

					if($id!=""){
							foreach ($id as $i => $fila) {
								
							$car=new Cartera();
							if($car->save_cartera($idemp,$idus,$id[$i])){
								$ms=" Se Registro Correctamente  Los Tipo de Sector";

								}

							}

							$sms='<div id="mensage" class="alert alert-success alert-dismissible">
			                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			                            <h4><i class="icon fa fa-check"></i>'.$p['sms'].' </h4>'.$ms.' Sin Problemas, Gracias.</div>';
						}else{
										$sms=' <div id="mensage" class="alert alert-danger alert-dismissible">
			                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			                              <h4><i class="icon fa fa-ban"></i> Error!</h4>'.$p['sms'].'</div>';
			                           
								}

	                     include(HTML_DIR .'ejecutivas/detalleEmpresas.php');
	                    
						break;
						
				}

				
				//include(HTML_DIR .'ejecutivas/detalleEmpresas.php');
					
	}else
	{

		include(HTML_DIR .'ejecutivas/detalleEmpresas.php');
	}


}else
{
	//include(HTML_DIR .'ejecutivas/detalleEmpresas.php');
	echo "no tiene permisos de usuario";
}
//$db->close();
//include(HTML_DIR .'ejecutivas/detalleEmpresas.php');


?>
