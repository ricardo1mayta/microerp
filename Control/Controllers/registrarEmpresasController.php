<?php
if(isset($_SESSION['usuario'])) {

	if(!empty($_POST['evento']))
		{

			$evento=$_POST['evento'];

			switch ($evento) {
				case 'guardar':
						if( !empty($_POST['rsocial'])  and !empty($_POST['ruc'])){

								
								 $id=$_REQUEST["mine"];


								
								 $rsocial=$_POST['rsocial'];
								 $nomcomercial=$_POST['nomcomercial'];
								 $ruc=$_POST['ruc'];
								 $user=$_SESSION['usuario'];
								 $idus=$user['US_C_CODIGO'];
								 $web=$_POST['web'];
								 $prod=new Empresas();
								  

								$p=$prod->save_empresas($ruc,$rsocial,$nomcomercial,$idus,$web);
									if($p['sms']=='ok'){
										if($id!=""){
												foreach ($id as $i => $fila) {
													
												$car=new Cartera();
												if($car->save_cartera($p['codigo'],$idus,$id[$i])){
													$ms=" Se Registro Correctamente  Los Tipo de Sector";

													}
												}
											}

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
	                          include(HTML_DIR .'empresa/registrarEmpresas.php');
	                            
						}
						else{
							$sms=' <div id="mensage" class="alert alert-danger alert-dismissible">
			                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			                              <h4><i class="icon fa fa-ban"></i> Error!</h4>Faltan Datos</div>';
							include(HTML_DIR .'empresa/registrarEmpresas.php');

						}
					break;
				
				case 'editar':

						if(!empty($_POST['codigo']) and !empty($_POST['rsocial1']) and !empty($_POST['ruc1'])){
										
										 $codigo=$_POST['codigo'];
										 $nombre=$_POST['nomcomercial1'];
										 $rsocial=$_POST['rsocial1'];
										 $ruc=$_POST['ruc1'];
										 $user=$_SESSION['usuario'];
								 		 $idus=$user['US_C_CODIGO'];
								 		 $web=$_POST['web'];
										
									 $prod=new Empresas();

									$p=$prod->editar_empresa($codigo,$nombre,$ruc,$rsocial,$idus,$web);
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
		                           include(HTML_DIR .'empresa/registrarEmpresas.php');
		                   }
				break;
				case 'eliminar':

						if(!empty($_POST['codigo']) ){

										
										 $codigo=$_POST['codigo'];
										 $user=$_SESSION['usuario'];
								 		 $idus=$user['US_C_CODIGO'];
										
										

									$prod=new Empresas();

									$p=$prod->eliminar_empresa($codigo,$idus);
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
		                            include(HTML_DIR .'empresa/registrarEmpresas.php');
		                   }
				break;

				


				}
					
	}else
	{
		include(HTML_DIR .'empresa/registrarEmpresas.php');
	}


}else
{
	echo "no tiene permisos de usuario";
}
//$db->close();
?>