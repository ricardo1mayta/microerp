<?php
if(isset($_SESSION['usuario'])) {

	if(!empty($_POST['evento']))
		{

			$evento=$_POST['evento'];

			switch ($evento) {

				case 'Agregar':

						
						
						if( !empty($_POST['codigo']) and !empty($_POST['contacto']) and !empty($_POST['tipo'])) {
						
						$codigo=$_POST['codigo'];
						$contacto=$_POST['contacto'];
						$idpro=$_POST['prod'];
						$tipo=$_POST['tipo'];
						$color=$_POST['color'];
						$fini=$_POST['start']." ".$_POST['hini'];
						$detalle=$_POST['detalle'];
						$ffin=$_POST['end']." ".$_POST['hfin'];
						//$hfin=$_POST['hfin'];
						$user=$_SESSION['usuario'];
						$idus=$user['US_C_CODIGO'];
						
						  $pro = new Agenda();
		                    $p=$pro-> agregar_agenda($tipo,$fini,$ffin,$idus,$color,$codigo,$contacto,$detalle,$idpro);
		                  if($p['sms']=='ok'){
																					
										  // $url="../Vistas/registro_secciones.php?nom=".$nomproy;
										$sms='<div id="mensage" class="alert alert-success alert-dismissible">
			                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			                            <h4><i class="icon fa fa-check"></i>'.$p['sms'].' </h4> Sin Problemas, Gracias.</div>';
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
		                                   	
                         	  include(HTML_DIR .'agenda/agenda.php');
                         	
				break;
				case 'Aceptar':

						
						
						if( !empty($_POST['id']) ) {
						
						$idage=$_POST['id'];
						$ms="";
						$detalle=$_POST['detalle'];
						$repro=$_POST['repro'];
						$fini=$_POST['start']." ".$_POST['hstart'];
						
						$ffin=$_POST['end']." ".$_POST['hend'];
						//$hfin=$_POST['hfin'];
						$user=$_SESSION['usuario'];
						$idus=$user['US_C_CODIGO'];
						$color="#FF8C00";
					
						  $pro = new Agenda();
						if ($repro!=null) {
		                  
		                  $p=$pro-> editar_agenda($idage,$detalle,$repro,$repro,$idus,$color,2);

		                  }
		                  else
		                  {
		                  	$p=$pro-> editar_agenda($idage,$detalle,$fini,$ffin,$idus,$color,1);
		                  }
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
		                                   	
                         	 include(HTML_DIR .'agenda/agenda.php');
                         	
				break;
				case 'Eliminar':

						if( !empty($_POST['id']) ) {
						$idage=$_POST['id'];
						$user=$_SESSION['usuario'];
						$idus=$user['US_C_CODIGO'];
						
						  $pro = new Agenda();
		                    $p=$pro-> eliminar_agenda($idage,$idus);
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
		                                   	
                         	  include(HTML_DIR .'agenda/agenda.php');
                         	
				break;
				case 'Cerrar Ficha':

						
						$ms="";
						if( !empty($_POST['id']) ) {
						
						$idage=$_POST['id'];
						$color="#FF8C00";
						$detalle=$_POST['detalle'];
						//$color=$_POST['color'];
						$fini=$_POST['start']." ".$_POST['hstart'];
						//$estado=$_POST['estado'];
						$ffin=$_POST['end']." ".$_POST['hend'];
						//$hfin=$_POST['hfin'];
						$user=$_SESSION['usuario'];
						$idus=$user['US_C_CODIGO'];
						$color="#FF8C00";
						$estado=3;
						  $pro = new Agenda();
		                    $p=$pro-> editar_agenda($idage,$detalle,$fini,$ffin,$idus,$color,$estado);
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
		                                   	
                         	  include(HTML_DIR .'agenda/agenda.php');
                         	
				break;
				
				
				
				
				

						
				}

				
				
					
	} else
	
	{
 
		include(HTML_DIR .'agenda/agenda.php');
	}


}else
{
	//include(HTML_DIR .'agenda/agenda.php');
	echo "no tiene permisos de usuario";
}
//$db->close();
//include(HTML_DIR .'agenda/agenda.php');


?>
