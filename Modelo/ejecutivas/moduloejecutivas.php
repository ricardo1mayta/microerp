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
    public function get_empresaNombre($txt,$us)
    {
        $sql = "SELECT e.EMP_C_CODIGO,c.PAR_C_CODIGO,e.EMP_C_RUC,e.EMP_D_RAZONSOCIAL,e.EMP_D_NOMBRECOMERCIAL FROM dg_cartera c INNER JOIN dg_empresas e on c.EMP_C_CODIGO=e.EMP_C_CODIGO WHERE c.US_C_CODIGO='$us' AND e.EMP_E_ESTADO>0
 and concat(e.EMP_D_RAZONSOCIAL,' ',e.EMP_D_NOMBRECOMERCIAL) LIKE '%YANA%' GROUP BY e.EMP_C_CODIGO ORDER BY e.EMP_C_CODIGO DESC limit 10;";
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
    public function get_conteouser12($txt,$us) 
    {
        $sql = "SELECT count(e.EMP_C_CODIGO) FROM dg_cartera c INNER JOIN dg_empresas e on c.EMP_C_CODIGO=e.EMP_C_CODIGO WHERE c.US_C_CODIGO='$us' AND e.EMP_E_ESTADO=1 and concat(e.EMP_C_RUC,' ',e.EMP_D_RAZONSOCIAL,' ',e.EMP_D_NOMBRECOMERCIAL) LIKE '%".$txt."%' ;";
         $rows=$this->db->query($sql);  
        $result=$rows->fetch_array();
    
        return $result;
    }
    public function get_allEmpresas123($ini,$intervalo,$us) 
    {
        echo $sql = "SELECT e.EMP_C_CODIGO,c.PAR_C_CODIGO,e.EMP_C_RUC,e.EMP_D_RAZONSOCIAL,e.EMP_D_NOMBRECOMERCIAL,empresalibre(e.EMP_C_CODIGO,36) AS MINERIA, empresalibre(e.EMP_C_CODIGO,39) AS CONSTRUCCION
         FROM dg_cartera c INNER JOIN dg_empresas e on c.EMP_C_CODIGO=e.EMP_C_CODIGO WHERE c.US_C_CODIGO='$us' AND c.CAR_E_ESTADO>0 GROUP BY e.EMP_C_CODIGO ORDER BY e.EMP_C_CODIGO DESC limit $ini,$intervalo; ";
         $rows=$this->db->query($sql);  
        return $rows;
    }
    public function get_conteo123() 
    {
        $sql = "SELECT count(e.EMP_C_CODIGO) as TOTAL FROM dg_empresas e 
        WHERE e.EMP_E_ESTADO>0 ORDER BY e.EMP_C_CODIGO DESC ; ";
         $rows=$this->db->query($sql);  
         $result=$rows->fetch_array();
    
        return $result;
    }

    public function get_sectores($idemp,$par) 
    {
        $sql = "SELECT S.PAR_C_CODIGO,S.PAR_D_NOMBRE,S.PAR_D_DECRIPCION,S.PAR_C_PADRE FROM dg_cartera C 
        INNER JOIN  sectores S ON S.PAR_C_CODIGO=C.PAR_C_CODIGO WHERE S.PAR_C_PADRE='$par'  AND C.EMP_C_CODIGO='$idemp' GROUP BY S.PAR_C_PADRE; ";
         $rows=$this->db->query($sql);  
        return $rows;
    }
    public function get_sectoresejecutivas($idemp,$par) 
    {
        $sql = "SELECT S.PAR_C_CODIGO,S.PAR_D_NOMBRE,S.PAR_D_DECRIPCION,S.PAR_C_PADRE FROM dg_cartera C 
        INNER JOIN  sectores S ON S.PAR_C_CODIGO=C.PAR_C_CODIGO WHERE S.PAR_C_PADRE='$par'  AND C.EMP_C_CODIGO='$idemp'";
         $rows=$this->db->query($sql);  
        return $rows;
    }

   public function get_ejecutivasasignadas($idemp,$idpar) 
    {
        $sql = "SELECT u.US_C_CODIGO,c.EMP_C_CODIGO,  CASE WHEN (CONCAT(u.US_D_NOMBRE,' ',u.US_D_APELL))='' THEN 'libre' else 'ocupado' end  as NOMBRE FROM dg_cartera c
inner join dg_user u on u.US_C_CODIGO=c.US_C_CODIGO 
INNER JOIN sectores S ON S.PAR_C_CODIGO=c.PAR_C_CODIGO WHERE c.EMP_C_CODIGO='$idemp' AND S.PAR_C_PADRE='$idpar' GROUP BY EMP_C_CODIGO";
        
       $rows=$this->db->query($sql);  
       
    
        return $rows;
    }
    public function set_solicitud() 
    {
        $sql = "SELECT count(e.EMP_C_CODIGO) as TOTAL FROM dg_empresas e 
        WHERE e.EMP_E_ESTADO>0 ORDER BY e.EMP_C_CODIGO DESC ; ";
         $rows=$this->db->query($sql);  
         $result=$rows->fetch_array();
    
        return $result;
    }
    
}

?>
