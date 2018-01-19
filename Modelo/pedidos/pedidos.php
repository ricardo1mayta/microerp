<?php

class Pedidos {

	private $db;

	public function __construct() 
	{
	        
	         $this->db = new Conexion();
	       
	}
	//funcion 	que guarda los pedidos
	public function save_pedido($idemp,$us,$con) 
    {
        $sql = "call spt_save_pedido('$idemp','$us','$con');";
         $rows=$this->db->query($sql);  
         $result=$rows->fetch_array();
         return $result;

    }
    public function delete_pedido($idped,$us) 
    {
         $sql = "call spt_delete_pedido('$idped','$us');";
         $rows=$this->db->query($sql);  
         $result=$rows->fetch_array();
         return $result;

    }
//funcion que permite listar las empresas cliente en la vista pedidos
     public function get_empresasclientes($txt,$us) 
    {
         $sql = "SELECT e.EMP_C_CODIGO,e.EMP_C_RUC,e.EMP_D_RAZONSOCIAL,(SELECT DIRE_D_DESCRIPCION from dg_direccionesempresa where EMP_C_CODIGO=e.EMP_C_CODIGO and DIRE_T_TIPO=1 LIMIT 1) as DIRECCION FROM dg_cartera c 
INNER JOIN dg_empresas e on c.EMP_C_CODIGO=e.EMP_C_CODIGO WHERE c.US_C_CODIGO='$us' AND e.EMP_E_ESTADO>0 
and concat(e.EMP_D_RAZONSOCIAL,' ',e.EMP_D_NOMBRECOMERCIAL) LIKE '%".$txt."%' GROUP BY e.EMP_C_CODIGO  limit 10;";
         $rows=$this->db->query($sql);  
        return $rows;

    }

    // Este metodo para listar productos en la vista pedidos
     public function get_productos($txt) 
    {
                $sql="SELECT dp.DPRO_C_CODIGO,DPRO_N_CANTIDAD,dp.DPRO_N_PRECIO,CONCAT(tp.TDP_D_NOMBRE,' ',dp.DPRO_D_NOMBRE,'-',p.PRO_D_NOMBRE)  AS NOMBRE from dg_detalleProductos dp 
                        INNER JOIN dg_productos p on p.PRO_C_CODIGO=dp.PRO_C_CODIGO 
                        inner join dg_tipodetalleproducto tp on tp.TDP_C_CODIGO=dp.TDP_C_CODIGO
                        where CONCAT(tp.TDP_D_NOMBRE,' ',dp.DPRO_D_NOMBRE,'-',p.PRO_D_NOMBRE) LIKE '%".$txt."%' LIMIT 12; ";
                $rows=$this->db->query($sql);  
                return $rows;
    }
     public function get_pedidos($us,$e) 
    {
                $sql="SELECT p.PED_C_CODIGO,c.EMP_D_RAZONSOCIAL,c.EMP_C_RUC,(SELECT SUM(DPE_N_CANTIDAD*DPE_N_PRECIO) FROM dg_detallepedidos where PED_C_CODIGO=p.PED_C_CODIGO) AS TOTAL,p.PED_E_ESTADO from dg_pedidos p
INNER JOIN dg_empresas c on c.EMP_C_CODIGO=p.EMP_C_CODIGO where p.US_C_CODIGO='$us' AND p.PED_E_ESTADO='$e'; ";
                $rows=$this->db->query($sql);  
                return $rows;

    }
     public function get_pedidosall($us) 
    {
                $sql="SELECT p.PED_C_CODIGO,c.EMP_D_RAZONSOCIAL,c.EMP_C_RUC,(SELECT SUM(DPE_N_CANTIDAD*DPE_N_PRECIO) FROM dg_detallepedidos where PED_C_CODIGO=p.PED_C_CODIGO) AS TOTAL,p.PED_E_ESTADO,p.PED_O_OSERVACION from dg_pedidos p
INNER JOIN dg_empresas c on c.EMP_C_CODIGO=p.EMP_C_CODIGO where p.US_C_CODIGO='$us' order by p.PED_C_CODIGO desc limit 200;";
                $rows=$this->db->query($sql);  
                return $rows;

    }
    public function get_pedidos_cobranzas($us) 
    {
                $sql="SELECT p.PED_C_CODIGO,c.EMP_D_RAZONSOCIAL,c.EMP_C_RUC,(SELECT SUM(DPE_N_CANTIDAD*DPE_N_PRECIO) FROM dg_detallepedidos where PED_C_CODIGO=p.PED_C_CODIGO) AS TOTAL from dg_pedidos p
INNER JOIN dg_empresas c on c.EMP_C_CODIGO=p.EMP_C_CODIGO where  p.PED_E_ESTADO=2; ";
                $rows=$this->db->query($sql);  
                return $rows;

    }
     public function get_pedidos_validar($us) 
    {
                $sql="SELECT p.PED_C_CODIGO,c.EMP_D_RAZONSOCIAL,c.EMP_C_RUC,(SELECT SUM(DPE_N_CANTIDAD*DPE_N_PRECIO) FROM dg_detallepedidos where PED_C_CODIGO=p.PED_C_CODIGO) AS TOTAL from dg_pedidos p
INNER JOIN dg_empresas c on c.EMP_C_CODIGO=p.EMP_C_CODIGO where   p.PED_E_ESTADO=1; ";
                $rows=$this->db->query($sql);  
                return $rows;

    }
public function validar_pedidos($ped,$us,$e,$obs) 
    {
                $sql="call spv_validar_pedido('$ped','$us','$e','$obs');";
                $rows=$this->db->query($sql); 
                 $result=$rows->fetch_array(); 
                return $result;

    }
    public function valida_pedido($idped,$u,$arch) 
    {
                $sql="call spv_valida_pedidoporcorreo('$idped','$arch','$u')";
                $rows=$this->db->query($sql); 
                 $result=$rows->fetch_array(); 
                return $result;

    }

}
?>