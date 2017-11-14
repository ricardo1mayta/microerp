<?php

class Tags {

private $db;

public function __construct() 
{
        
         $this->db = new Conexion();
       
}
    
   
public function save_tags($tag,$idus) 
{  
      $sql = "CALL spa_save_tag('$tag','$idus');";
        
       $rows=$this->db->query($sql);  
       $result=$rows->fetch_array();
    
        return $result;
        
        
    }
    

   public function delete_tags($tag,$idus) 
  {  
      $sql = "CALL spa_delete_tag('$tag','$idus');";
        
       $rows=$this->db->query($sql);  
       $result=$rows->fetch_array();
    
        return $result;
        
        
    }
    public function get_alltags() 
    {
        $sql = "SELECT TAG_C_CODIGO,TAG_D_NOMBRE FROM dg_keywords where TAG_E_ESTADO>0  order by TAG_C_CODIGO DESC limit 20";
         $rows=$this->db->query($sql);  
        return $rows;
    }
     public function get_allttxt($txt) 
    {
        $sql = "SELECT TAG_C_CODIGO,TAG_D_NOMBRE FROM dg_keywords where TAG_E_ESTADO>0 and TAG_D_NOMBRE like '".$txt."%' limit 5";
         $rows=$this->db->query($sql);  
        return $rows;
    }

}

?>

