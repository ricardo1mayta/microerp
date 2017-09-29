<?php

class DetallePedidos {

	private $db;

	public function __construct() 
	{
	        
	         $this->db = new Conexion();
	       
	}
	//funcion 	que guarda los pedidos
	public function save_detallepedido($idped,$idpro,$can,$pre,$us) 
    {
         $sql = "call spt_save_detallepedido('$idped','$idpro','$can','$pre','$us');";
         $rows=$this->db->query($sql);  
         $result=$rows->fetch_array();
         return $result;

    }
    public function delete_detallepedido($iddetp,$us) 
    {
         $sql = "call spt_delete_detallepedido('$iddetp','$us');";
         $rows=$this->db->query($sql);  
         $result=$rows->fetch_array();
         return $result;

    }
    public function update_precio_detallepedido($iddetp,$pre,$us) 
    {
         $sql = "call spt_update_precio_detallepedido('$iddetp','$pre','$us');";
         $rows=$this->db->query($sql);  
         $result=$rows->fetch_array();
         return $result;

    }
    public function update_cantidad_detallepedido($iddetp,$can,$us) 
    {
         $sql = "call spt_update_cantidad_detallepedido('$iddetp','$can','$us');";
         $rows=$this->db->query($sql);  
         $result=$rows->fetch_array();
         return $result;

    }
    public function get_detallepedidos($idped) 
    {
                $sql="SELECT DPE_C_CODIGO,(SELECT CONCAT(dm.DPRO_D_NOMBRE,' - ',pm.PRO_D_NOMBRE) FROM dg_detalleProductos dm 
INNER JOIN dg_productos pm ON pm.PRO_C_CODIGO=dm.PRO_C_CODIGO where dm.DPRO_C_CODIGO=dp.PRO_C_CODIGO) AS NOMBRE,dp.DPE_N_CANTIDAD,dp.DPE_N_PRECIO,dp.DPE_N_CANTIDAD*dp.DPE_N_PRECIO as SUB_TOTAL 
FROM dg_detallepedidos dp WHERE dp.PED_C_CODIGO='$idped' and DPE_E_ESTADO>0";
                $rows=$this->db->query($sql);  
                return $rows;
    }

}