<?php  
class Telefonoempresa{

private $db;

  public function __construct() 
  {
        
         $this->db = new Conexion();
       
  }
    
   
   public function save_telefonoempresa($telefono,$idemp,$idusu,$idtipo) 
    {  
      $sql = "CALL spa_save_telefonoempresa('$telefono','$idemp','$idusu','$idtipo');";
        
       $rows=$this->db->query($sql);  
      return $rows;
        
        
    }
    public function get_telefonoempresa($idemp) 
    {  
      $sql = "select * , CASE WHEN TEL_T_TIPO ='1' THEN 'FIJO' WHEN TEL_T_TIPO  ='2'THEN 'CELULAR' ELSE 'OTROS' END AS TIPO from  dg_telefonosempresa where EMP_C_CODIGO='$idemp' and TEL_E_ESTADO>0";
        
      $rows=$this->db->query($sql);  
      return $rows;
        
        
    }
    public function delete_telefonoempresa($idtel,$idusu) 
    {  
      $sql = "CALL spa_delete_telefonoempresa('$idtel','$idusu');";
        
       $rows=$this->db->query($sql);  
      return $rows;
        
        
    }

}
?>