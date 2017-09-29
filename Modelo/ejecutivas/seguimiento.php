<?php

class Moduloejecutivas {

private $db;

public function __construct() 
{
        
         $this->db = new Conexion();
       
}
    public function solicitar_empresa($ruc,$rsocial,$nomcomercial,$idus) 
    {  
      $sql = "CALL spa_solicitar_empresa('$ruc','$rsocial','$nomcomercial','$idus');";
        
       $rows=$this->db->query($sql);  
       $result=$rows->fetch_array();
    
        return $result;
       
    }
public function get_allEmpresas12($txt,$ini,$intervalo,$us) 
    {
        $sql = "SELECT e.EMP_C_CODIGO,c.PAR_C_CODIGO,e.EMP_C_RUC,e.EMP_D_RAZONSOCIAL,e.EMP_D_NOMBRECOMERCIAL,empresalibre(e.EMP_C_CODIGO,36) AS MINERIA, empresalibre(e.EMP_C_CODIGO,39) AS CONSTRUCCION 
         FROM dg_cartera c INNER JOIN dg_empresas e on c.EMP_C_CODIGO=e.EMP_C_CODIGO WHERE c.US_C_CODIGO='$us' AND e.EMP_E_ESTADO>0 
and concat(e.EMP_C_RUC,' ',e.EMP_D_RAZONSOCIAL,' ',e.EMP_D_NOMBRECOMERCIAL) LIKE '%".$txt."%' GROUP BY e.EMP_C_CODIGO ORDER BY e.EMP_C_CODIGO DESC limit $ini,$intervalo; ";
         $rows=$this->db->query($sql);  
        return $rows;
    }
    public function get_conteo12($txt) 
    {
        $sql = "SELECT count(e.EMP_C_CODIGO) AS total FROM dg_empresas e 
        WHERE e.EMP_E_ESTADO>0 and concat(e.EMP_C_RUC,' ',e.EMP_D_RAZONSOCIAL,' ',e.EMP_D_NOMBRECOMERCIAL) LIKE '%".$txt."%' ORDER BY e.EMP_C_CODIGO DESC ; ";
         $rows=$this->db->query($sql);  
        $result=$rows->fetch_array();
    
        return $result;
    }
   

  
}

?>
