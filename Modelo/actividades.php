<?php

include_once '../config.ini.php';

class Actividades{


			public function __construct() 
			{
			        $db = new DB_Class();
			       
			}

		    public function get_Useractividades($iduser) 
			{
				$sql="select A.ACT_C_CODIGO,E.ETA_D_NOMBRE,A.ACT_D_NOMBRE,A.ACT_D_DESCRIPCION,A.ACT_F_FECHAINI,A.ACT_F_FECHAFIN,CASE A.ACT_E_ESTADO WHEN 1 THEN 'PENDIENTE' WHEN 2 THEN 'INICIADO' WHEN 3 THEN 'FINALIZADO' ELSE 'ABORTADO' END AS ACT_E_ESTADO from dg_actividades A INNER JOIN dg_etapas E ON E.ETA_C_CODIGO=A.ETA_C_CODIGO WHERE A.US_C_CODIGO=".$iduser;

		        $res = mysql_query($sql);
		       	return $res;
		       	
		    }
		     public function guardar_actividades($us,$secc,$dur,$dif,$idact) 
			{
				$sql="call sp_insertar_actividades('".$secc."','".$us."','".$dur."','".$dif."','".$idact."')";
		        $res = mysql_query($sql) or die(mysql_error());
		        $no_rows = mysql_fetch_array($res);
                return $no_rows;
		       	
		    }
		    public function get_Allactividades($id) 
			{
				
				$sql="select  ACT_C_CODIGO,ACT_D_NOMBRE,ACT_D_DESCRIPCION, ACT_F_FECHAINI,ACT_F_FECHAFIN,CASE ACT_E_ESTADO WHEN 1 THEN 'PENDIENTE' WHEN 2 THEN 'INICIADO' WHEN 3 THEN 'FINALIZADO' ELSE 'ABORTADO' END AS ACT_E_ESTADO,avance_act(ACT_C_CODIGO) AS AVANCE_ACT from dg_actividades WHERE ETA_C_CODIGO='$id' AND ACT_E_ESTADO>0 AND ACT_E_ESTADO<4";

		        $res = mysql_query($sql);
		       	return $res;
		    }
		    public function get_actividadesEtapas($iduser,$ideta) 
			{
				$sql="select A.ACT_C_CODIGO,E.ETA_D_NOMBRE,A.ACT_D_NOMBRE,A.ACT_D_DESCRIPCION,A.ACT_F_FECHAINI,A.ACT_F_FECHAFIN,A.ACT_E_ESTADO from dg_actividades A INNER JOIN dg_etapas E ON E.ETA_C_CODIGO=A.ETA_C_CODIGO WHERE A.ACT_E_ESTADO>=1 AND A.ACT_E_ESTADO<=2 AND A.US_C_CODIGO=".$iduser." and A.ETA_C_CODIGO=".$ideta;

		        $res = mysql_query($sql);
		       	return $res;
		       	
		    }

		    public function get_actividadesEtapas2($iduser,$ideta) 
			{
				$sql="select A.ACT_C_CODIGO,E.ETA_D_NOMBRE,A.ACT_D_NOMBRE,A.ACT_D_DESCRIPCION,A.ACT_F_FECHAINI,A.ACT_F_FECHAFIN,A.ACT_E_ESTADO from dg_actividades A INNER JOIN dg_etapas E ON E.ETA_C_CODIGO=A.ETA_C_CODIGO WHERE A.ACT_E_ESTADO=3 AND A.US_C_CODIGO=".$iduser." and A.ETA_C_CODIGO=".$ideta;

		        $res = mysql_query($sql);
		       	return $res;
		       	
		    }
		    public function set_estadoactividad($idact,$sta) 
			{
				$sql="call sp_upd_estado_actididades('".$idact."','".$sta."')";

		         $res = mysql_query($sql) or die(mysql_error());
		        $no_rows = mysql_fetch_array($res);
                return $no_rows;
		       	
		    }

		    public function delite_actividad($id)
		    {

		    	$sql="call sp_delete_actividad('".$id."')";

		         $res = mysql_query($sql) or die(mysql_error());
		        $no_rows = mysql_fetch_array($res);
                return $no_rows;
		    }

		    public function  avance_user($idproy,$idus)
		    {

		    	$sql="select avance_user('$idproy','$idus') as AVANCE";

		         $res = mysql_query($sql) or die(mysql_error());
		        $no_rows = mysql_fetch_array($res);
                return $no_rows;
		    }

		    public function r_Allactividades($id) 
			{
				
				$sql="select  ACT_C_CODIGO,ACT_D_NOMBRE,ACT_D_DESCRIPCION, ACT_F_FECHAINI,ACT_F_FECHAFIN,(TIMESTAMPDIFF(MINUTE ,ACT_F_FECHAINI,ACT_F_FECHAFIN)/60) AS DURACION ,CASE ACT_E_ESTADO WHEN 1 THEN 'PENDIENTE' WHEN 2 THEN 'INICIADO' WHEN 3 THEN 'FINALIZADO' ELSE 'ABORTADO' END AS ACT_E_ESTADO,avance_act(ACT_C_CODIGO) AS AVANCE_ACT from dg_actividades WHERE ETA_C_CODIGO='$id' AND ACT_E_ESTADO>0 AND ACT_E_ESTADO<4";

		        $res = mysql_query($sql);
		       	return $res;
		    }
}

?>
