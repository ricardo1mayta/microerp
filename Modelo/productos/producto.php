<?php

class Productos {

private $db;

public function __construct() 
{
        
         $this->db = new Conexion();
       
}
    
   
public function save_producto($nombre ,$marca  ,$fini ,$ffin) 
{  
       $sql = "CALL spa_save_producto('$marca','$nombre','$fini','$ffin');";
        
       $rows=$this->db->query($sql);  
       $result=$rows->fetch_array();
    
        return $result;
        
        
    }
    public function fin_producto($codigo) 
    {  
       $sql = "CALL spa_fin_producto('$codigo');";
        
       $rows=$this->db->query($sql);  
       $result=$rows->fetch_array();
    
        return $result;
        
        
    }

 public function editar_producto($codigo,$nombre,$fini,$ffin) 
    {  
       $sql = "CALL spa_edtar_producto('$codigo','$nombre','$fini','$ffin');";
        
       $rows=$this->db->query($sql);  
       $result=$rows->fetch_array();
    
        return $result;
        
        
    }
    public function eliminar_producto($codigo) 
    {  
       $sql = "CALL spa_eliminar_producto('$codigo');";
        
       $rows=$this->db->query($sql);  
       $result=$rows->fetch_array();
    
        return $result;
        
        
    }
  

    public function get_allProductos() 
    {
        $sql = "SELECT pa2.PAR_D_NOMBRE,pa.PAR_D_NOMBRE,p.PRO_D_NOMBRE,p.PRO_E_ESTADOVENTAS,p.PRO_C_CODIGO,p.PRO_F_FECHAINICIAL,p.PRO_F_FECHAFINAL FROM dg_productos p
        inner join dg_parametros pa on p.PAR_C_CODIGO=pa.PAR_C_CODIGO
        inner join dg_parametros pa2 on pa.PAR_C_PADRE=pa2.PAR_C_CODIGO
        where PRO_E_ESTADOVENTAS>0 order by p.PRO_C_CODIGO DESC;";
        $rows=$this->db->query($sql);  
        return $rows;
    }
  

    public function get_nomProductos($idus,$idpro) 
    {
    
         $sql = "SELECT * FROM sm_productos where PRO_D_NOMBRE LIKE '$idpro%' AND AUD_U_USARIOCREA='$idus' AND PRO_N_CANTIDAD>0 limit 5";
         $rows=$this->db->query($sql);  
        return $rows;
     
    }
    public function get_AllDetalleproductos() 
    {
                $sql="select pb.PAR_D_NOMBRE,pa.PAR_D_NOMBRE,p.PRO_D_NOMBRE,p.PRO_E_ESTADOVENTAS from dg_productos p
                        INNER JOIN dg_parametros pa on pa.PAR_C_CODIGO=p.PAR_C_CODIGO
                        INNER JOIN dg_parametros pb on pb.PAR_C_CODIGO=pa.PAR_C_PADRE;";
                $res = mysqli_query($sql);
                return $res;
    }
  

    public function get_Idproductos($id) 
    {
                $sql="SELECT *,CONCAT(DAY(PRO_F_FECHAFINAL),'-',mes(MONTH(PRO_F_FECHAFINAL)),'-',YEAR(PRO_F_FECHAFINAL)) AS FIN FROM dg_productos where PAR_C_CODIGO='$id' AND PRO_E_ESTADOVENTAS=1";
                $rows=$this->db->query($sql);  
                return $rows;
    }
    
   
}

?>
