
<?php

class tipoDetProductos {

private $db;

    public function __construct() 
    {
        
         $this->db = new Conexion();
       
    }
     
   

     public function get_TipoDetalleproductos() 
            {
               $sql="SELECT TDP_C_CODIGO,TDP_D_NOMBRE FROM dg_tipodetalleproducto where TDP_E_ESTADO>0 order by TDP_D_NOMBRE asc;";
                
                $rows=$this->db->query($sql);  
                return $rows;
            }

    
}

?>
