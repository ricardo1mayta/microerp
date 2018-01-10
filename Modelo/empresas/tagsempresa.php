<?php

class TagsEmpresa {

private $db;

public function __construct() 
{
        
         $this->db = new Conexion();
       
}
    
   
public function save_tagsempresa($idemp,$idus,$tag) 
{  
    $sql = "CALL spa_save_tagempresa('$idemp','$idus','$tag');";
        
       $rows=$this->db->query($sql);  
       $result=$rows->fetch_array();
    
        return $result;
        
        
    }
    

   public function delete_tagsempresa($tag,$idus) 
  {  
      $sql = "CALL spa_delete_tagempresa('$tag','$idus');";
        
       $rows=$this->db->query($sql);  
       $result=$rows->fetch_array();
    
        return $result;
        
        
    }
    public function get_alltagsempresa($idemp) 
    {
        $sql = "SELECT t.TGE_C_CODIGO,tg.TAG_D_NOMBRE FROM dg_tagsempresa t 
INNER JOIN dg_keywords tg ON tg.TAG_C_CODIGO=t.TAG_C_CODIGO WHERE t.EMP_C_CODIGO='$idemp' AND t.TGE_E_ESTADO>0 limit 5";
         $rows=$this->db->query($sql);  
        return $rows;
    }
     public function get_alltagttxt($txt) 
    {
        $sql = "SELECT TAG_C_CODIGO,TAG_D_NOMBRE FROM dg_keywords where TAG_E_ESTADO>0 and TAG_D_NOMBRE like '".$txt."%' limit 5";
         $rows=$this->db->query($sql);  
        return $rows;
    }

}


?>

