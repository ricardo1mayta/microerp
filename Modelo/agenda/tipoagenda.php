<?php

class Tipoagenda {

private $db;

    public function __construct() 
    {
            
             $this->db = new Conexion();
           
    }
   function get_all(){

      $sql = "SELECT * FROM dg_tiposagenda;";
        
      $rows=$this->db->query($sql);
        
      return $rows;
   }
}