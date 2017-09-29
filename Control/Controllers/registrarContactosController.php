<?php 

if(isset($_SESSION['usuario'])) {

	if(isset($_REQUEST["cmdActualizar"])){
		if($_REQUEST["txtCodigoContacto"]){
			/*eliminar */
		$contacto=new contactos();
		$contacto->actualizar_contacto($_REQUEST["txtCodigoContacto"]);
		}
	}
	
	if(isset($_REQUEST["cmdGuardar"])or isset($_REQUEST["cmdActualizar"])){

		$tipo=$_REQUEST["chkTipo"];
		
		$id_empresa=$_REQUEST["txtCodigoEmpresa"];

		$dni=$_REQUEST["txtDNI"];
		$tratado=$_REQUEST["cboTratado"];
		$nombres=$_REQUEST["txtNombres"];
		$apellidos=$_REQUEST["txtApellidos"];
		$direccion=$_REQUEST["txtDireccion"];
		$cumpleanos=$_REQUEST["dtCumpleanos"];
		$aniversario=$_REQUEST["dtAniversario"];
		$twitter=$_REQUEST["urlTwitter"];
		$facebook=$_REQUEST["urlFacebook"];
		$linkedin=$_REQUEST["urlLinkedin"];
		$obs=$_REQUEST["txtObs"];		
		$cargo=$_REQUEST["cboCargo"];
		
/*
		$tipoTelefono[]=$_REQUEST["cboTipoTelefono_1"];
		$tipoTelefono[]=$_REQUEST["cboTipoTelefono_2"];
		$tipoTelefono[]=$_REQUEST["cboTipoTelefono_3"];
*/
		//$tipoTelefono[]=$_REQUEST["cboTipoTelefono"];
		echo json_encode($_REQUEST["cboTipoTelefono"]);

		$tipoCorreo=$_REQUEST["cboTipoCorreo"];
		$telefono=$_REQUEST["txtTelefono"];
		$correo=$_REQUEST["txtCorreo"];
		
		/*$empresa=$_REQUEST["txtApellidos"];*/

		$contacto=new contactos();

		$contacto->registrar_contacto($dni,$tratado,$nombres,$apellidos,$direccion,$cumpleanos,$aniversario,$facebook,$twitter,$linkedin,$obs,$cargo);
		$contacto->registrar_tipocontacto($contacto->id_contacto,$tipo);/*ok*/
		$contacto->registrar_telefono($contacto->id_contacto,$tipoTelefono,$telefono); /*ok - parcialmente*/
		

		
		$contacto->registrar_empresa_contacto($id_empresa,$contacto->id_contacto,$user); /*ok*/
		$contacto->registrar_correo($contacto->id_contacto,$tipoCorreo,$correo);/**/
		$idemp=$id_empresa;
		
		if($contacto){
?>

			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h4><i class="icon fa fa-check"></i></h4>
				
				<?php #header('Location:http://grupodigamma.com/sys/registrarContactos/')?>

				Contacto registrado sin Problemas, Gracias.

			</div>

<?php
			if($id_empresa>0){
				include(HTML_DIR .'contactos/registrarContactos.php');
				//include(HTML_DIR .'empresa/carteraEmpresas.php');
			}else{
				include(HTML_DIR .'contactos/registrarContactos.php');
				
			}						 
}else{ ?>

			<div class="alert alert-success alert-dismissible">

				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

				<h4><i class="icon fa fa-check"></i></h4>

				Contacto registrado sin Problemas, Gracias.

			</div>

<?php

		}

	

	}else{

		include(HTML_DIR .'contactos/registrarContactos.php');

	}

}else{

	echo "No cuenta con permisos suficientes para visualizar esta ventana.";

}

?>