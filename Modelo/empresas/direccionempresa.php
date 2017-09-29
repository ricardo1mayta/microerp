<?php  
class Direccionempresa{

private $db;

  public function __construct() 
  {
        
         $this->db = new Conexion();
       
  }
    
   
   public function save_direccionempresa($direccion,$idemp,$iddis,$idipo,$idusu) 
    {  
      $sql = "CALL spa_save_direccionempresa('$direccion','$idemp','$iddis','$idipo','$idusu');";
        
       $rows=$this->db->query($sql);  
      return $rows;
        
        
    }
    public function delete_direccionempresa($iddir,$idusu) 
    {  
      $sql = "CALL spa_delete_direccionempresa('$iddir','$idusu');";
        
       $rows=$this->db->query($sql);  
      return $rows;
        
        
    }
    public function get_direccionempresa($idemp) 
    {  
      $sql = "select *, CASE WHEN DIRE_T_TIPO ='1' THEN 'FISCAL' WHEN DIRE_T_TIPO  ='2'THEN 'ENTREGA' ELSE 'OTROS' END AS TIPO from  dg_direccionesempresa where EMP_C_CODIGO='$idemp' and DIRE_E_ESTADO>0";
        
      $rows=$this->db->query($sql);  
      return $rows;
   
    }



}
?>