
<?php

class Directoriosubrubros {

private $db;

public function __construct() 
{
        
         $this->db = new Conexion();
       
}
    public function Agrega_subrubro($desc,$rub,$idus) 
    {  
      $sql = "CALL spa_agrega_dirsubrubros('$desc','$rub','$idus');";
        
       $rows=$this->db->query($sql);  
       $result=$rows->fetch_array();
    
        return $result;
       
    }
	public function edita_subrubro($codigo,$desc,$us) 
    {  
      $sql = "CALL spa_update_dirsubrubro('$codigo','$desc','$us');";
        
       $rows=$this->db->query($sql);  
       $result=$rows->fetch_array();
    
        return $result;
       
    }
    public function elimina_rubro($idus,$codigo) 
    {  
      $sql = "call spa_delete_dirsubrubro('$codigo','$idus');";
        
       $rows=$this->db->query($sql);  
       $result=$rows->fetch_array();
    
        return $result;
       
    }
     public function get_subrubros($txt,$s) 
    {  
      $sql = "SELECT sr.SRB_C_CODIGO,p.PAR_D_NOMBRE,r.DRU_D_DESCRIPCION,sr.SRB_D_DESCRIPCION FROM dg_direc_subrubros sr 
INNER JOIN dg_direc_rubros r on r.DRU_C_CODIGO=sr.DRU_C_CODIGO 
INNER JOIN dg_parametros p ON p.PAR_C_CODIGO=r.SEC_C_CODIGO WHERE sr.SRB_E_ESTADO>0 and sr.SRB_D_DESCRIPCION LIKE '".$txt."%' and r.DRU_C_CODIGO='$s' ORDER BY sr.SRB_C_CODIGO DESC LIMIT 30;";
        
       $rows=$this->db->query($sql);  
       
            return $rows;
       
    }
    public function get_allsubrubros($txt) 
    {  
      $sql = "SELECT sr.SRB_C_CODIGO,p.PAR_D_NOMBRE,r.DRU_D_DESCRIPCION,sr.SRB_D_DESCRIPCION FROM dg_direc_subrubros sr 
INNER JOIN dg_direc_rubros r on r.DRU_C_CODIGO=sr.DRU_C_CODIGO 
INNER JOIN dg_parametros p ON p.PAR_C_CODIGO=r.SEC_C_CODIGO WHERE sr.SRB_E_ESTADO>0 and sr.SRB_D_DESCRIPCION LIKE '".$txt."%'  ORDER BY sr.SRB_C_CODIGO DESC LIMIT 30;";
        
       $rows=$this->db->query($sql);  
       
            return $rows;
       
    }
     public function get_allsubrubross($s) 
    {  
      $sql = "SELECT sr.SRB_C_CODIGO,p.PAR_D_NOMBRE,r.DRU_D_DESCRIPCION,sr.SRB_D_DESCRIPCION FROM dg_direc_subrubros sr 
INNER JOIN dg_direc_rubros r on r.DRU_C_CODIGO=sr.DRU_C_CODIGO 
INNER JOIN dg_parametros p ON p.PAR_C_CODIGO=r.SEC_C_CODIGO WHERE sr.SRB_E_ESTADO>0  and r.DRU_C_CODIGO='$s' ORDER BY r.DRU_D_DESCRIPCION DESC LIMIT 30;";
        
       $rows=$this->db->query($sql);  
       
            return $rows;
       
    }
     public function get_allsubru() 
    {  
      $sql = "SELECT sr.SRB_C_CODIGO,p.PAR_D_NOMBRE,r.DRU_D_DESCRIPCION,sr.SRB_D_DESCRIPCION FROM dg_direc_subrubros sr 
INNER JOIN dg_direc_rubros r on r.DRU_C_CODIGO=sr.DRU_C_CODIGO 
INNER JOIN dg_parametros p ON p.PAR_C_CODIGO=r.SEC_C_CODIGO WHERE sr.SRB_E_ESTADO>0  ORDER BY sr.SRB_C_CODIGO DESC LIMIT 30;";
        
       $rows=$this->db->query($sql);  
       
            return $rows;
       
    }



}

?>
