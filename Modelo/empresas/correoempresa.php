<?php  
class Correoempresa{

private $db;

  public function __construct() 
  {
        
         $this->db = new Conexion();
       
  }
    
   
   public function save_correoempresa($correo,$idemp,$idusu,$idtipo) 
    {  
      $sql = "CALL spa_save_correoempresa('$correo','$idemp','$idusu','$idtipo');";
        
       $rows=$this->db->query($sql);  
      return $rows;
        
        
    }
    public function delete_correoempresa($idcore,$idusu) 
    {  
      $sql = "CALL spa_delete_correoempresa('$idcore','$idusu');";
        
       $rows=$this->db->query($sql);  
      return $rows;
        
        
    }
    public function get_correoempresa($idemp) 
    {  
      $sql = "select *,CASE WHEN CORE_T_TIPO ='1' THEN 'CORPORATIVO' WHEN CORE_T_TIPO  ='2'THEN 'VENTAS' WHEN CORE_T_TIPO  ='3'THEN 'MARKETING' ELSE 'OTROS' END AS TIPO  from  dg_correosempresa where EMP_C_CODIGO='$idemp' and CORE_E_ESTADO>0";
        
      $rows=$this->db->query($sql);  
      return $rows;
        
        
    }



}
?>