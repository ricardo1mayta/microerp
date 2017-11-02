<?php

class Empresas {

private $db;

public function __construct() 
{
        
         $this->db = new Conexion();
       
}
    
   
public function save_empresas($ruc,$rsocial,$nomcomercial,$idus,$web) 
{  
      $sql = "CALL spa_save_empresa('$ruc','$rsocial','$nomcomercial','$idus','$web');";
        
       $rows=$this->db->query($sql);  
       $result=$rows->fetch_array();
    
        return $result;
        
        
    }
    

 public function editar_empresa($codigo,$nombre,$ruc,$rsocial,$idus,$web) 
    {  
       $sql = "CALL spa_editar_empresa('$codigo','$nombre','$ruc','$rsocial','$idus'.'$web');";
        
       $rows=$this->db->query($sql);  
       $result=$rows->fetch_array();
    
        return $result;
        
        
    }
public function update_empresa($ruc,$rsocial,$nombre,$estado,$idus,$idemp,$web) 
    {  
       $sql = "CALL spa_update_empresa('$ruc','$rsocial','$nombre','$estado','$idus','$idemp','$web');";
        
       $rows=$this->db->query($sql);  
       $result=$rows->fetch_array();
    
        return $result;
        
        
    }
    

    public function eliminar_empresa($codigo,$idus) 
    {  
       $sql = "CALL spa_eliminar_empresa('$codigo','$idus');";
        
       $rows=$this->db->query($sql);  
       $result=$rows->fetch_array();
    
        return $result;
        
        
    }
  
    public function get_allEmpresas() 
    {
        $sql = "select e.EMP_C_CODIGO,e.EMP_C_RUC,e.EMP_D_RAZONSOCIAL,e.EMP_D_NOMBRECOMERCIAL,c.US_C_CODIGO,c.PAR_C_CODIGO,(select PAR_D_NOMBRE from dg_parametros where PAR_C_CODIGO=c.PAR_C_CODIGO) as SECTOR from dg_cartera c
left join dg_empresas e on e.EMP_C_CODIGO=c.EMP_C_CODIGO 
where c.CAR_E_ESTADO>0 and ( c.US_C_CODIGO is null or c.US_C_CODIGO<=0) limit 1,50; ";
         $rows=$this->db->query($sql);  
        return $rows;
    }
    public function get_allEmpresas12($txt,$ini,$intervalo) 
    {
        $sql = "SELECT e.EMP_C_CODIGO,e.EMP_C_RUC,e.EMP_D_RAZONSOCIAL,e.EMP_D_NOMBRECOMERCIAL,
        empresalibre(e.EMP_C_CODIGO,36) AS MIN, empresalibre(e.EMP_C_CODIGO,39) AS CON FROM dg_empresas e 
        WHERE e.EMP_E_ESTADO>0 and concat(e.EMP_C_RUC,' ',e.EMP_D_RAZONSOCIAL,' ',e.EMP_D_NOMBRECOMERCIAL) LIKE '%".$txt."%' ORDER BY e.EMP_C_CODIGO DESC limit $ini,$intervalo; ";
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
   
    public function get_allEmpresas123($ini,$intervalo) 
    {
        $sql = "SELECT e.EMP_C_CODIGO,e.EMP_C_RUC,e.EMP_D_RAZONSOCIAL,e.EMP_D_NOMBRECOMERCIAL,
        empresalibre(e.EMP_C_CODIGO,36) AS MIN, empresalibre(e.EMP_C_CODIGO,39) AS CON FROM dg_empresas e 
        WHERE e.EMP_E_ESTADO>0 ORDER BY e.EMP_C_CODIGO DESC limit $ini,$intervalo; ";
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
  public function get_allEmpresas2($txt) 
    {
        $sql = "SELECT e.EMP_C_CODIGO, p.PAR_D_NOMBRE,e.EMP_C_RUC,e.EMP_D_RAZONSOCIAL,e.EMP_D_NOMBRECOMERCIAL,
        CASE WHEN e.EMP_E_ESTADO ='1' THEN 'ACTIVO' WHEN e.EMP_E_ESTADO ='2'THEN 'OBS' ELSE 'OTRO' END AS ESTADO FROM dg_empresas e 
            INNER JOIN dg_parametros p ON p.PAR_C_CODIGO=e.PAR_C_CODIGO
          WHERE e.EMP_E_ESTADO>0 and concat(e.EMP_C_RUC,' ',e.EMP_D_RAZONSOCIAL,' ',e.EMP_D_NOMBRECOMERCIAL) LIKE '%".$txt."%' ORDER BY e.EMP_C_CODIGO DESC limit 0,50; ";
        $rows=$this->db->query($sql);  
        return $rows;
    }

    public function get_Empresasid($idemp) 
    {
        $sql = "select *,CASE WHEN EMP_E_ESTADO ='1' THEN 'Activo' WHEN EMP_E_ESTADO ='2'THEN 'No Aplica'  WHEN EMP_E_ESTADO ='3'THEN 'Baja'  WHEN EMP_E_ESTADO ='4'THEN 'Solicitado' WHEN EMP_E_ESTADO ='5'THEN 'Solicitud de Baja' ELSE 'OBS' END AS ESTADO from dg_empresas where EMP_C_CODIGO='$idemp'";
        $rows=$this->db->query($sql);  
        $result=$rows->fetch_array();
        return $result;
    }
    public function get_Empresasidssss($idemp) 
    {
        $sql = "SELECT * FROM dg_keywords";
        $rows=$this->db->query($sql);  
        $result=$rows->fetch_array();
        return $result;
    }
     public function set_solicitarempresa($idemp) 
    {
        $sql = "SELECT * FROM dg_keywords";
        $rows=$this->db->query($sql);  
        $result=$rows->fetch_array();
        return $result;
    }
    
}

?>
