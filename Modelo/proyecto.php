<?php

include_once '../config.ini.php';

class Proyectos {


			public function __construct() 
			{
			        $db = new DB_Class();
			       
			}

		    public function get_proyectos() 
			{
				//$sql="select P.PRY_C_CODIGO,p.PRY_D_NOMBRE, DATE(p.PRY_F_FECHAINI),DATE(.PRY_F_FECHAFIN),u.US_D_NOMBRE from dg_proyectos p inner join dg_user u on u.US_C_CODIGO=p.US_C_CODIGO";

		        $res = mysql_query("select P.PRY_C_CODIGO,p.PRY_D_NOMBRE, DATE(p.PRY_F_FECHAINI),DATE(.PRY_F_FECHAFIN),u.US_D_NOMBRE from dg_proyectos p inner join dg_user u on u.US_C_CODIGO=p.US_C_CODIGO");
		       	return $res;
		    }
		     public function guardar_proyectos($us,$prod,$fini,$fin,$nombre,$descr,$idcrea) 
			{
				$sql="call sp_insertar_proyecto('".$prod."','".$idcrea."','".$us."','".$nombre."','".$descr."','".$fini."','".$fin."')";
		        $res = mysql_query($sql) or die(mysql_error());
		        $no_rows = mysql_fetch_array($res);
                return $no_rows;
		       	
		    }
		    public function get_Allproyectos($id) 
			{
				
		        $res = mysql_query("select * from proeyectos WHERE PRY_C_CREA='$id'");
		       	return $res;
		    }
		     public function get_Allproyectos_act($idus) 
			{
				$sql="SELECT distinct p.PRY_D_NOMBRE,p.PRY_I_IMG,p.PRY_C_CODIGO,p.PRY_F_FECHAINI,p.PRY_F_FECHAFIN,avance_proyecto(p.PRY_C_CODIGO) as AVANCE FROM dg_actividades a INNER JOIN dg_etapas e on e.ETA_C_CODIGO=a.ETA_C_CODIGO INNER JOIN dg_proyectos p ON p.PRY_C_CODIGO=e.PRY_C_CODIGO   where a.US_C_CODIGO='$idus' AND p.PRY_E_ESTADO>0;";
		        $res = mysql_query($sql);
		       	return $res;
		    }
		    public function get_Allproyectos_informe($is) 
			{
				$sql="select * , avance_proyecto(PRY_C_CODIGO) as AVANCE,activ_final(PRY_C_CODIGO) AS FINALIZADAS,total_actv(PRY_C_CODIGO) as TOTAL  from proeyectos";
		        $res = mysql_query($sql);
		       	return $res;
		    }


		     public function avance_proyecto($id) 
			{
				$sql="select avance_proyecto('$id') as AVANCE";
		        $res = mysql_query($sql);
		       	return $res;
		    }

		    public function get_nombreProy($id) 
			{
				$sql="select * from proeyectos where PRY_C_CODIGO='$id'";
		        $res = mysql_query($sql);
		         $no_rows = mysql_fetch_array($res);
                return $no_rows;
		       	
		    }
		   

}

?>
