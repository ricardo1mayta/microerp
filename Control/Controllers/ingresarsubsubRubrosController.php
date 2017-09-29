<?php
if(isset($_SESSION['usuario'])) {

	if(!empty($_POST['evento']))
		{

			$evento=$_POST['evento'];

			switch ($evento) {
				case 'agregar':
						if( !empty($_POST['desc'])  and !empty($_POST['subrubro'])){

								
								 $desc=$_POST['desc'];
								 $sec=$_POST['subrubro'];
								 
								 $user=$_SESSION['usuario'];
								 $idus=$user['US_C_CODIGO'];
								 
								 $prod=new  Directoriosubsubrubros();
								  

								$p=$prod->Agrega_subsubrubro($desc,$sec,$idus) ;
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
	                          include(HTML_DIR .'campanadirectorio/ingresarsubsubrubros.php');
	                            
						}
						else{
							$sms=' <div id="mensage" class="alert alert-danger alert-dismissible">
			                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			                              <h4><i class="icon fa fa-ban"></i> Error!</h4>Faltan Datos</div>';
							include(HTML_DIR .'campanadirectorio/ingresarsubsubrubros.php');

						}
					break;
				case 'editar':
						if( !empty($_POST['desc'])   and !empty($_POST['codigo']) ){

								 $codigo=$_POST['codigo'];
								 $desc=$_POST['desc'];
								 
								 
								 $user=$_SESSION['usuario'];
								 $idus=$user['US_C_CODIGO'];
								 
								 $prod=new  Directoriosubsubrubros();
								  

								$p=$prod->edita_subsubrubro($codigo,$desc,$idus);
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
	                          include(HTML_DIR .'campanadirectorio/ingresarsubsubrubros.php');
	                            
						}
						else{
							$sms=' <div id="mensage" class="alert alert-danger alert-dismissible">
			                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			                              <h4><i class="icon fa fa-ban"></i> Error!</h4>Faltan Datos</div>';
							include(HTML_DIR .'campanadirectorio/ingresarsubsubrubros.php');

						}
					break;
					case 'eliminar':
						if(  !empty($_POST['codigo']) ){

								 $codigo=$_POST['codigo'];
															 
								 
								 $user=$_SESSION['usuario'];
								 $idus=$user['US_C_CODIGO'];
								 
								 $prod=new  Directoriosubsubrubros();
								  

								$p=$prod->elimina_subsubrubro($idus,$codigo); 
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
	                          include(HTML_DIR .'campanadirectorio/ingresarsubsubrubros.php');
	                            
						}
						else{
							$sms=' <div id="mensage" class="alert alert-danger alert-dismissible">
			                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			                              <h4><i class="icon fa fa-ban"></i> Error!</h4>Faltan Datos</div>';
							include(HTML_DIR .'campanadirectorio/ingresarsubsubrubros.php');

						}
					break;
				
				
				

				
				


				}
					
	}else
	{
		include(HTML_DIR .'campanadirectorio/ingresarsubsubrubros.php');
	}


}else
{
	echo "No tiene permisos de usuario";
}
//$db->close();
?>