<?php

class Directoriosubsubrubros {

private $db;

public function __construct() 
{
        
         $this->db = new Conexion();
       
}
    public function Agrega_subsubrubro($desc,$rub,$idus) 
    {  
      $sql = "CALL spa_agrega_dirsubsubrubros('$desc','$rub','$idus');";
        
       $rows=$this->db->query($sql);  
       $result=$rows->fetch_array();
    
        return $result;
       
    }
	public function edita_subsubrubro($codigo,$desc,$us) 
    {  
      $sql = "CALL spa_update_dirsubsubrubro('$codigo','$desc','$us');";
        
       $rows=$this->db->query($sql);  
       $result=$rows->fetch_array();
    
        return $result;
       
    }
    public function elimina_subsubrubro($idus,$codigo) 
    {  
      $sql = "call spa_delete_dirsubsubrubro('$codigo','$idus');";
        
       $rows=$this->db->query($sql);  
       $result=$rows->fetch_array();
    
        return $result;
       
    }
    
    public function get_allsubrubros($txt) 
    {  
      $sql = "SELECT ss.SSR_C_CODIGO,p.PAR_D_NOMBRE,r.DRU_D_DESCRIPCION,sr.SRB_D_DESCRIPCION,ss.SSR_D_DESCRIPCION FROM  dg_direc_subsubrubros ss
INNER JOIN dg_direc_subrubros sr on sr.SRB_C_CODIGO=ss.SRB_C_CODIGO
INNER JOIN dg_direc_rubros r on r.DRU_C_CODIGO=sr.DRU_C_CODIGO 
INNER JOIN dg_parametros p ON p.PAR_C_CODIGO=r.SEC_C_CODIGO WHERE ss.SSR_E_ESTADO>0 and ss.SSR_D_DESCRIPCION LIKE '".$txt."%'  ORDER BY sr.SRB_C_CODIGO DESC ;";
        
       $rows=$this->db->query($sql);  
       
            return $rows;
       
    }
     
    public function get_allsubsubru($s) 
    {  
      $sql = "SELECT SRB_C_CODIGO,SRB_D_DESCRIPCION FROM dg_direc_subrubros sr  WHERE sr.SRB_E_ESTADO>0  and sr.DRU_C_CODIGO='$s' ORDER BY sr.SRB_D_DESCRIPCION DESC;";
        
       $rows=$this->db->query($sql);  
       
            return $rows;
       
    }
    public function get_allsubsubsubru($s) 
    {  
      $sql = "SELECT SSR_C_CODIGO,SSR_D_DESCRIPCION FROM dg_direc_subsubrubros sr  WHERE sr.SSR_E_ESTADO>0  and sr.SRB_C_CODIGO='$s' ORDER BY sr.SSR_D_DESCRIPCION ASC;";
        
       $rows=$this->db->query($sql);  
       
            return $rows;
       
    }
     public function get_allsubru() 
    {  
      $sql = "SELECT ss.SSR_C_CODIGO,p.PAR_D_NOMBRE,r.DRU_D_DESCRIPCION,sr.SRB_D_DESCRIPCION,ss.SSR_D_DESCRIPCION FROM  dg_direc_subsubrubros ss
INNER JOIN dg_direc_subrubros sr on sr.SRB_C_CODIGO=ss.SRB_C_CODIGO
INNER JOIN dg_direc_rubros r on r.DRU_C_CODIGO=sr.DRU_C_CODIGO 
INNER JOIN dg_parametros p ON p.PAR_C_CODIGO=r.SEC_C_CODIGO WHERE ss.SSR_E_ESTADO>0  ORDER BY sr.SRB_C_CODIGO DESC limit 50;";
        
       $rows=$this->db->query($sql);  
       
            return $rows;
       
    }



}

?>