<?php

class rankingVentas{

private $db;

    public function __construct() 
    {
        
         $this->db = new Conexion();
       
    }
     
  

     public function get_rankingventas($pro) 
            {
               $sql="select concat(u.US_D_NOMBRE,' ',u.US_D_APELL) as nombre, ifnull((select sum(dpe.DPE_N_CANTIDAD*dpe.DPE_N_PRECIO) from dg_detallepedidos dpe 
                    inner join dg_pedidos ped on dpe.PED_C_CODIGO=ped.PED_C_CODIGO
                    where dpe.DPE_U_CREA=u.US_C_CODIGO and ped.PED_E_ESTADO>0 and dpe.PRO_C_CODIGO='$pro'),0) as monto,
                    (select mv.MTV_N_MONTOVENTAS from dg_metasventas mv WHERE mv.US_C_CODIGO=u.US_C_CODIGO and mv.PRO_C_CODIGO='$pro') metaventas,
                    (select mv.MTV_N_MONTOFINANZAS from dg_metasventas mv WHERE mv.US_C_CODIGO=u.US_C_CODIGO and mv.PRO_C_CODIGO='$pro') metafinanzas
                    from dg_metasventas mv
                    inner join dg_user u on mv.US_C_CODIGO=u.US_C_CODIGO
                    where mv.PRO_C_CODIGO='$pro';";
                
                $rows=$this->db->query($sql);  
                return $rows;
            }
    public function get_productosañoactual($par) 
            {
               $sql="select * from dg_productos where year(PRO_F_FECHAFINAL)=year(now()) and PAR_C_CODIGO='$par';";
                
                $rows=$this->db->query($sql);  
                return $rows;
            }

    
}

?>
