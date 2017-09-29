<?php

include_once '../config.ini.php';

class Secciones{


			public function __construct() 
			{
			        $db = new DB_Class();
			       
			}

		    public function get_secciones($id) 
			{
				$sql="select p.PAR_D_NOMBRE,e.ETA_D_NOMBRE  from dg_etapas e
inner join dg_parametros p on p.PAR_C_CODIGO=e.PAR_C_CODIGO
WHERE e.ETA_C_CODIGO=".$id." Limit 1";
				$res = mysql_query($sql);
		        $nombre = mysql_fetch_array($res);
		        $nom=$nombre['PAR_D_NOMBRE'].": ".$nombre['ETA_D_NOMBRE'];
		       	return $nom;
				
				
		    }
		     public function guardar_secciones($us,$proy,$cat,$nombre,$descr) 
			{
				$sql="call sp_insertar_etapa('".$proy."','".$us."','".$cat."','".$nombre."','".$descr."')";
		        $res = mysql_query($sql) or die(mysql_error());
		        $no_rows = mysql_fetch_array($res);
                return $no_rows;
		       	
		    }
		    public function get_Allsecciones($nom) 
			{
				
				$sql="select *,carga('$nom',ETA_C_CODIGO) AS CARGA,avance(ETA_C_CODIGO) as AVANCE  from etapas WHERE PRY_D_NOMBRE='$nom'";

		        $res = mysql_query($sql);
		       	return $res;
		    }
		    public function get_Userseciones($idus,$idproy) 
			{
				
				$sql="select distinct A.ETA_C_CODIGO,CONCAT(E.ETA_D_NOMBRE,' - ',P.PRY_D_NOMBRE) AS NOMBRE from dg_actividades A INNER JOIN dg_etapas E ON E.ETA_C_CODIGO=A.ETA_C_CODIGO INNER JOIN dg_proyectos P ON P.PRY_C_CODIGO=E.PRY_C_CODIGO WHERE A.US_C_CODIGO='$idus' AND A.ACT_E_ESTADO>0 AND A.ACT_E_ESTADO<3 AND P.PRY_C_CODIGO='$idproy'";

		        $res = mysql_query($sql);
		       	return $res;
		    }

		    public function porcenta_seccion($nomproy,$idsec) 
			{
				$sql="call sp_consulta_carga('".$nomproy."','".$idsec."')";
		        $res = mysql_query($sql) or die(mysql_error());
		        $no_rows = mysql_fetch_array($res);
                return $no_rows;
		       	
		    }
		     public function get_rowSeccion($id) 
			{
				$sql="select * from etapas WHERE ETA_C_CODIGO='$id'";
		        $res = mysql_query($sql) or die(mysql_error());
		        $no_rows = mysql_fetch_array($res);
                return $no_rows;
		       	
		    }

		    public function get_numSecciones() 
			{ $nom=$_SESSION['proyecto'];
				$sql="select count(*) AS numrows from etapas WHERE PRY_D_NOMBRE='$nom' ";
		        $res = mysql_query($sql) or die(mysql_error());
		         $no_rows = mysql_fetch_array($res);
                return $no_rows;
                
		       	
		    }
		   public function secciones($nom) 
			{
				
				$sql="select *,carga('$nom',ETA_C_CODIGO) AS CARGA,avance(ETA_C_CODIGO) as AVANCE  from etapas WHERE PRY_C_CODIGO='$nom' AND ETA_E_ESTADO=1";
		        $res = mysql_query($sql) or die(mysql_error());
		       
                return $res;
		       	
		    }

		    public function update_seccion($categoria,$titulo,$descripcion,$user,$id) 
			{
				
				$sql="call sp_upd_estapas('$categoria','$titulo','$descripcion','$user','$id')";
		        $res = mysql_query($sql) or die(mysql_error());
		        $no_rows = mysql_fetch_array($res);
                return $no_rows;
		       	
		    }


		    public function delite_seccion($id) 
			{
				
				$sql="call sp_delete_estapas('$id')";
		        $res = mysql_query($sql) or die(mysql_error());
		        $no_rows = mysql_fetch_array($res);
                return $no_rows;
		       	
		    }
		    public function avance_seccion($id) 
			{
				
				$sql="select avance('$id') as AVANCE";
		        $res = mysql_query($sql) or die(mysql_error());
		        $no_rows = mysql_fetch_array($res);
                return $no_rows;
		       	
		    }
		     public function r_secciones($id) 
			{
				
				
				$sql="select *,r_carga('1',ETA_C_CODIGO) AS CARGA,avance(ETA_C_CODIGO) as AVANCE  from etapas WHERE PRY_C_CODIGO='$id' AND ETA_E_ESTADO=1";
		        $res = mysql_query($sql) or die(mysql_error());
		       
                return $res;
		       	
		       	
		    }



}

?>
