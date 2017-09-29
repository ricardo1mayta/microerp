<?php
if(isset($_SESSION['usuario'])) {

	if(!empty($_POST['evento']))
		{

			$evento=$_POST['evento'];

			switch ($evento) {
				case 'guardar':
						if(!empty($_POST['rubro']) and !empty($_POST['rsocial'])  and !empty($_POST['ruc'])){

								
								 $rubro=$_POST['rubro'];
								 $rsocial=$_POST['rsocial'];
								 $nomcomercial=$_POST['nomcomercial'];
								 $ruc=$_POST['ruc'];
								 $user=$_SESSION['usuario'];
								 $idus=$user['US_C_CODIGO'];
								 $prod=new Empresas();

								$p=$prod->save_empresas($ruc,$rsocial,$nomcomercial,$rubro,$idus);
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
	                          include(HTML_DIR .'empresa/fichaEmpresa.php');
	                            
						}
						else{
							$sms=' <div id="mensage" class="alert alert-danger alert-dismissible">
			                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			                              <h4><i class="icon fa fa-ban"></i> Error!</h4>Faltan Datos</div>';
							include(HTML_DIR .'empresa/registrarEmpresas.php');

						}
					break;
					case 'ficha':
						include(HTML_DIR .'empresa/fichaEmpresa.php');
						break;
				}
					
	}else
	{
		include(HTML_DIR .'empresa/fichaEmpresa.php');
	}


}else
{
	echo "no tiene permisos de usuario";
}
//$db->close();
?>