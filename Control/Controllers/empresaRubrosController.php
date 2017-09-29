<?php
if(isset($_SESSION['usuario'])) {

	if(!empty($_POST['evento']))
		{

			$evento=$_POST['evento'];

			switch ($evento) {

				case 'Guardar':

						
						
						if( !empty($_POST['e']) and !empty($_POST['u']) and !empty($_POST['n']) and !empty( $_POST['sector'])) {
						
						$e=$_POST['e'];
						$n=$_POST['n'];
						$u=$_POST['u'];
						$p=$_POST['paga'];
						$sector=$_POST['sector'];
						$idemp=$e;
						  $pro = new Directorio();
		                    $p=$pro-> agrega_dire($e,$n,$u,$p,$sector);
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
								}
								else{

										$sms=' <div id="mensage" class="alert alert-danger alert-dismissible">
			                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			                              <h4><i class="icon fa fa-ban"></i> Error!</h4>Faltan Datos</div>';
							 
							}
		                                   	
                         	  include(HTML_DIR .'campanadirectorio/empresaRubros.php');
				break;
				case 'Actualizar':

						
						
						if( !empty($_POST['dir']) and !empty($_POST['u']) and !empty($_POST['n'])) {
						
						$e=$_POST['e'];
						$n=$_POST['n'];
						$u=$_POST['u'];
						$p=$_POST['paga'];
						$dir=$_POST['dir'];
						$idemp=$e;
						  $pro = new Directorio();
		                    $p=$pro->edita_dirnombre($dir,$n,$u,$p);
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
								}
								else{

										$sms=' <div id="mensage" class="alert alert-danger alert-dismissible">
			                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			                              <h4><i class="icon fa fa-ban"></i> Error!</h4>Faltan Datos</div>';
							 
							}
		                                   	
                         	  include(HTML_DIR .'campanadirectorio/empresaRubros.php');
				break;
				case 'eliminar':
						if(  !empty($_POST['codigo']) and !empty($_POST['cod']) ){

								 $idemp=$_POST['codigo'];
								 $codigo=$_POST['cod'];
															 
								 
								 $user=$_SESSION['usuario'];
								 $idus=$user['US_C_CODIGO'];
								 
								 $prod=new  Directorio();
								  

								$p=$prod->elimina_emprubro($codigo,$idus); 
									if($p['sms']=='ok'){
										
										  
										 $sms='<div id="mensage" class="alert alert-success alert-dismissible">
			                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			                            <h4><i class="icon fa fa-check"></i>'.$p['sms'].' </h4>'.$ms.' Sin Problemas, Gracias.</div>';

									}
									else{
										 $sms=' <div id="mensage" class="alert alert-danger alert-dismissible">
			                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			                              <h4><i class="icon fa fa-ban"></i> Error!</h4>'.$p['sms'].'</div>';
			                           
									}
	                          include(HTML_DIR .'campanadirectorio/empresaRubros.php');
	                            
						}
						else{
							$sms=' <div id="mensage" class="alert alert-danger alert-dismissible">
			                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			                              <h4><i class="icon fa fa-ban"></i> Error!</h4>Faltan Datos</div>';
							include(HTML_DIR .'campanadirectorio/empresaRubros.php');

						}
					break;

				

						
				}

				
				
					
	} else
	
	{

		include(HTML_DIR .'campanadirectorio/empresaRubros.php');
	}


}else
{
	//include(HTML_DIR .'campanadirectorio/empresaRubros.php');
	echo "no tiene permisos de usuario";
}
//$db->close();
//include(HTML_DIR .'campanadirectorio/empresaRubros.php');


?>
