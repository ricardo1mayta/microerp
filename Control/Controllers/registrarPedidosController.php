<?php



if(isset($_SESSION['usuario'])) {
	if(isset($_REQUEST["cmdAgregar"])){
		
		/*$_SESSION["i"]=$_SESSION["i"]+1;
		$i=$_SESSION["i"];
		$pedido[$i]["idEmpresa"]=$_REQUEST["txtCodigoEmpresa"];
		$pedido[$i]["idContacto"]=$_REQUEST["cboContacto"];
		$pedido[$i]["idProducto"]=$_REQUEST["prod"];
		$pedido[$i]["Costo"]=$_REQUEST["txtCosto"];
		$pedido[$i]["Cantidad"]=(int)$_REQUEST["txtCantidad"];
		$pedido[$i]["Observacion"]=$_REQUEST["txtObservacion"];
		$pedido[$i]["Beneficio"]=$_REQUEST["txtBeneficios"];*/
		//$pedido.=$pedido;
		
		//foreach ($pedido as $key => &$val) {}
		//echo " carrito ".var_dump($pedido);
		
		//$_SESSION["pedido"][]=(array)$pedido;
		$detalle=explode("|",$_REQUEST["detalle"]);
		$contacto=explode("|",$_REQUEST["cboContacto"]);
		$_SESSION["pedido"][]=array('idEmpresa'=>$_REQUEST["txtCodigoEmpresa"],'idContacto'=>$contacto[0],'idNomContacto'=>$contacto[1],'idDetProducto'=>$detalle[0],'idNomDetProducto'=>$detalle[1],'Costo'=>$_REQUEST["txtCosto"],'Cantidad'=>$_REQUEST["txtCantidad"]);
	}
}

include(HTML_DIR .'pedidos/registrarPedidos.php');
?>