
<?php

class detProductos {

private $db;

    public function __construct() 
    {
        
         $this->db = new Conexion();
       
    }
     
    public function save_detproducto($idpro,$nombre,$cantidad,$precio,$tdp,$um,$lg,$an,$ubi) 
    {  
       $sql = "CALL spa_save_detproducto('$idpro','$nombre','$cantidad','$precio','$tdp','$um','$lg','$an','$ubi');";
        
       $rows=$this->db->query($sql);  
       $result=$rows->fetch_array();
    
        return $result;
        
        
    }

    public function editar_detproducto($codigo,$nombre,$cantidad,$precio)
    {  
       $sql = "CALL spa_editar_detproducto('$codigo','$nombre','$cantidad','$precio');";
        
       $rows=$this->db->query($sql);  
       $result=$rows->fetch_array();
    
        return $result;
        
        
    }

     public function get_Detalleproductos() 
            {
               $sql="select p.PRO_C_CODIGO,p.PRO_D_NOMBRE,tp.TDP_D_NOMBRE,dp.DPRO_D_NOMBRE,dp.DPRO_C_CODIGO,dp.DPRO_N_CANTIDAD,dp.DPRO_N_PRECIO from dg_detalleProductos dp
                        inner join dg_productos p on p.PRO_C_CODIGO=dp.PRO_C_CODIGO
                        INNER JOIN dg_parametros pa on pa.PAR_C_CODIGO=p.PAR_C_CODIGO
                        INNER JOIN dg_parametros pb on pb.PAR_C_CODIGO=pa.PAR_C_PADRE 
                        inner join dg_tipodetalleproducto tp on tp.TDP_C_CODIGO=dp.TDP_C_CODIGO  where dp.DPRO_E_ESTADO=1 order by dp.DPRO_C_CODIGO DESC;";
                
                $rows=$this->db->query($sql);  
                return $rows;
            }

    public function eliminar_detproducto($codigo)
    {
        $sql = "CALL spa_eliminar_detproducto('$codigo');";
        
        $rows=$this->db->query($sql);  
        $result=$rows->fetch_array();
    
        return $result;

    }
}

?>
