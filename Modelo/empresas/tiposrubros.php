<?php

class Empresas {

private $db;

public function __construct() 
{
        
         $this->db = new Conexion();
       
}
    
   
public function save_tipoempresas($ruc,$rsocial,$nomcomercial,$rubro,$idus) 
{  
      $sql = "CALL spa_save_tipoempresa('$ruc','$rsocial','$nomcomercial','$rubro','$idus');";
        
       $rows=$this->db->query($sql);  
       $result=$rows->fetch_array();
    
        return $result;
        
        
    }
    


}

?>
