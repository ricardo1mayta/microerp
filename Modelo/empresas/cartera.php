<?php

class Cartera{

private $db;

  public function __construct() 
  {
        
         $this->db = new Conexion();
       
  }
    
   
   public function save_cartera($idemp,$idusu,$idsec) 
    {  
      $sql = "CALL spa_save_cartera('$idemp','$idusu','$idsec');";
        
       $rows=$this->db->query($sql);  
      return $rows;
        
        
    }
    
    public function get_allEmpresas() 
    {
        $sql = "SELECT e.EMP_C_CODIGO, p.PAR_D_NOMBRE,e.EMP_C_RUC,e.EMP_D_RAZONSOCIAL,e.EMP_D_NOMBRECOMERCIAL,
		CASE WHEN e.EMP_E_ESTADO ='1' THEN 'ACTIVO' WHEN e.EMP_E_ESTADO ='2'THEN 'OBS' ELSE 'OTRO' END AS ESTADO FROM dg_empresas e 
		INNER JOIN dg_parametros p ON p.PAR_C_CODIGO=e.PAR_C_CODIGO
		WHERE e.EMP_E_ESTADO>0; ";
        $rows=$this->db->query($sql);  
        return $rows;
    }
    public function get_sectorempresa($idemp) 
    {
        $sql = "select c.CAR_C_CODIGO,c.PAR_C_CODIGO,(select PAR_D_NOMBRE from dg_parametros where PAR_C_CODIGO=c.PAR_C_CODIGO) as SECTOR from dg_cartera c
where c.CAR_E_ESTADO>0 and c.EMP_C_CODIGO='$idemp'";
        $rows=$this->db->query($sql);  
        return $rows;
    }
    public function get_sectorfaltaempresa($idemp) 
    {
        $sql = "SELECT * FROM sectores s WHERE s.PAR_C_CODIGO NOT IN (SELECT c.PAR_C_CODIGO FROM dg_cartera c WHERE c.EMP_C_CODIGO='$idemp' AND c.PAR_C_CODIGO=s.PAR_C_CODIGO);";
        $rows=$this->db->query($sql);  
        return $rows;
    }
     public function get_ejecutivas($idrol) 
    {
        $sql = "select u.US_C_CODIGO,u.US_D_NOMBRE,u.US_D_APELL,US_C_CORREO from dg_permisos p 
inner join dg_user u on u.US_C_CODIGO=p.US_C_CODIGO where RO_C_CODIGO='$idrol' GROUP BY p.US_C_CODIGO;";
        $rows=$this->db->query($sql);  
        return $rows;
    }
     public function set_ejecutivas($idemp,$idpar,$idusu,$idejec) 
    {
        $sql = "call spa_update_ejecartera('$idemp','$idpar','$idusu','$idejec');";
        $rows=$this->db->query($sql);  
        return $rows;
    }


     public function get_ejecutivasasignadas($idemp,$idpar) 
    {
        $sql = "SELECT u.US_C_CODIGO, NULLIF(CONCAT(u.US_D_NOMBRE,' ',u.US_D_APELL),'Falta Agregar') as NOMBRE FROM dg_cartera c
inner join dg_user u on u.US_C_CODIGO=c.US_C_CODIGO WHERE c.EMP_C_CODIGO='$idemp' AND c.PAR_C_CODIGO='$idpar'";
        
       $rows=$this->db->query($sql);  
       $result=$rows->fetch_array();
    
        return $result;
    }
     public function set_ejecutivacartera($idcar,$idejec,$idusu) 
    {
        $sql = "call spa_update_ejecartera('$idcar','$idusu','$idejec');";
        $rows=$this->db->query($sql);  
         $result=$rows->fetch_array();
    
        return $result;
    }


     public function get_contactosempresa($idemp) 
    {
         $sql = "SELECT ca.CAR_C_CODIGO,c.CON_C_CODIGO,c.CON_D_NOMBRE,c.CON_D_APELLIDO,ca.CAR_D_NOMBRE, CONCAT(c.CON_D_NOMBRE,' ',c.CON_D_APELLIDO,' - ',ca.CAR_D_NOMBRE) as NOMBRE,c.CON_D_DIRECCION FROM  dg_detalleempresacontactos dc
INNER JOIN dg_contactos c ON c.CON_C_CODIGO=dc.CON_C_CODIGO
INNER JOIN dg_cargos ca on ca.CAR_C_CODIGO=c.CAR_C_CODIGO
 where dc.EMP_C_CODIGO='$idemp' and c.CON_E_ESTADO>0; ";
        $rows=$this->db->query($sql);  
        return $rows;
    }

    public function get_correocontactos($idcon) 
    {
        $sql = "SELECT * FROM dg_correos c
INNER JOIN dg_tiposcorreos tc on tc.TIPCOR_C_CODIGO=c.TIPCOR_C_CODIGO
WHERE CON_C_CODIGO='$idcon' AND c.COR_E_ESTADO>0";
        $rows=$this->db->query($sql);  
        return $rows;
    }
    public function get_telefonocontactos($idcon) 
    {
        $sql = "SELECT * FROM dg_telefonos t 
INNER JOIN dg_tipostelefonos tt on tt.TIPTEL_C_CODIGO=t.TIPTEL_C_CODIGO
WHERE t.CON_C_CODIGO='$idcon' and t.TEL_E_ESTADO>0";
        $rows=$this->db->query($sql);  
        return $rows;
    }
    public function get_sectorcontactos($idcon) 
    {
        $sql = "SELECT 
(case when (SELECT T2.TCO_E_ESTADO from dg_tipocontacto T2 where T2.TCO_T_TIPO=1 AND T2.CON_C_CODIGO='$idcon')=1 then 'checked' ELSE ' ' end) as CO,
(case when (SELECT T2.TCO_E_ESTADO from dg_tipocontacto T2 where T2.TCO_T_TIPO=2 AND T2.CON_C_CODIGO='$idcon')=1 then 'checked' ELSE ' ' end)AS MN,
(case when (SELECT T2.TCO_E_ESTADO from dg_tipocontacto T2 where T2.TCO_T_TIPO=3 AND T2.CON_C_CODIGO='$idcon')=1 then 'checked' ELSE ' ' end) AS CN";
        $rows=$this->db->query($sql);  
         $result=$rows->fetch_array();
    
        return $result;
    }




}

?>
