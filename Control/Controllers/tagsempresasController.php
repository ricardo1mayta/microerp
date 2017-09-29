<?php
if(isset($_SESSION['usuario'])) {

	if(!empty($_POST['evento']))
		{

			$evento=$_POST['evento'];

			switch ($evento) {

				case 'Agregar':

						
						
						if( !empty($_POST['tag']) ) {
						
						$tag=$_POST['tag'];
					
						//$hfin=$_POST['hfin'];
						$user=$_SESSION['usuario'];
						$idus=$user['US_C_CODIGO'];
						
						  $pro = new Tags();
		                    $p=$pro-> save_tags($tag,$idus);
		                  if($p['sms']=='ok'){
																					
										  // $url="../Vistas/registro_secciones.php?nom=".$nomproy;
										$sms='<div id="mensage" class="alert alert-success alert-dismissible">
			                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			                            <h4><i class="icon fa fa-check"></i>'.$p['sms'].' </h4>'.$ms.' Sin Problemas, Gracias.</div>';
			                            //include(HTML_DIR .'agenda/ical.php');
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
		                                   	
                         	  include(HTML_DIR .'empresa/tagsempresas.php');
                         	
				break;
				case 'Eliminar':

						
						
						if( !empty($_POST['codigo']) ) {
						
						$idtag=$_POST['codigo'];
						
						
						//$hfin=$_POST['hfin'];
						$user=$_SESSION['usuario'];
						$idus=$user['US_C_CODIGO'];
						
						   $pro = new Tags();
		                   $p=$pro-> delete_tags($idtag,$idus);

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
								}
								else{

										$sms=' <div id="mensage" class="alert alert-danger alert-dismissible">
			                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			                              <h4><i class="icon fa fa-ban"></i> Error!</h4>Faltan Datos</div>';
							 
								}
		                                   	
                         	  include(HTML_DIR .'empresa/tagsempresas.php');
                         	
				break;
				
				
				

						
				}

				
				
					
	} else
	
	{
 
		include(HTML_DIR .'empresa/tagsempresas.php');
	}


}else
{
	
	echo "no tiene permisos de usuario";
}



?>
