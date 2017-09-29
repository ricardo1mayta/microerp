
<?php

class Directoriorubros {

private $db;

public function __construct() 
{
        
         $this->db = new Conexion();
       
}
    public function Agrega_rubro($desc,$sec,$idus) 
    {  
      $sql = "CALL spa_agregarubrodirectorio('$desc','$sec','$idus');";
        
       $rows=$this->db->query($sql);  
       $result=$rows->fetch_array();
    
        return $result;
       
    }
	public function edita_rubro($idsec,$desc,$idus,$codigo) 
    {  
      $sql = "CALL spa_update_direrubros('$idsec','$desc','$idus','$codigo');";
        
       $rows=$this->db->query($sql);  
       $result=$rows->fetch_array();
    
        return $result;
       
    }
    public function elimina_rubro($idus,$codigo) 
    {  
      $sql = "CALL spa_delete_direrubro('$codigo','$idus');";
        
       $rows=$this->db->query($sql);  
       $result=$rows->fetch_array();
    
        return $result;
       
    }
     public function get_allgendaus($txt,$s) 
    {  
      $sql = "SELECT d.DRU_C_CODIGO,d.SEC_C_CODIGO,d.DRU_D_DESCRIPCION,(SELECT PAR_D_NOMBRE FROM dg_parametros where PAR_C_CODIGO=d.SEC_C_CODIGO) as PAR_D_NOMBRE FROM dg_direc_rubros d where d.DRU_E_ESTADO>0 and d.DRU_D_DESCRIPCION LIKE '".$txt."%' and d.SEC_C_CODIGO='$s' order by DRU_C_CODIGO desc LIMIT 30;";
        
       $rows=$this->db->query($sql);  
       
            return $rows;
       
    }
    public function get_rubros($txt) 
    {  
      $sql = "SELECT d.DRU_C_CODIGO,d.SEC_C_CODIGO,d.DRU_D_DESCRIPCION,(SELECT PAR_D_NOMBRE FROM dg_parametros where PAR_C_CODIGO=d.SEC_C_CODIGO) as PAR_D_NOMBRE FROM dg_direc_rubros d where d.DRU_E_ESTADO>0 and d.DRU_D_DESCRIPCION LIKE '".$txt."%'  order by DRU_C_CODIGO desc LIMIT 30;";
        
       $rows=$this->db->query($sql);  
       
            return $rows;
       
    }
     public function get_allrubross($s) 
    {  
      $sql = "SELECT d.DRU_C_CODIGO,d.SEC_C_CODIGO,d.DRU_D_DESCRIPCION,(SELECT PAR_D_NOMBRE FROM dg_parametros where PAR_C_CODIGO=d.SEC_C_CODIGO) as PAR_D_NOMBRE FROM dg_direc_rubros d where d.DRU_E_ESTADO>0 and d.SEC_C_CODIGO='$s' order by DRU_C_CODIGO desc LIMIT 30;";
        
       $rows=$this->db->query($sql);  
       
            return $rows;
       
    }
     public function get_allrubros() 
    {  
      $sql = "SELECT d.DRU_C_CODIGO,d.SEC_C_CODIGO,d.DRU_D_DESCRIPCION,(SELECT PAR_D_NOMBRE FROM dg_parametros where PAR_C_CODIGO=d.SEC_C_CODIGO) as PAR_D_NOMBRE FROM dg_direc_rubros d where d.DRU_E_ESTADO>0  order by DRU_C_CODIGO desc LIMIT 30;";
        
       $rows=$this->db->query($sql);  
       
            return $rows;
       
    }



}

?>
