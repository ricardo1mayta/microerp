<?php
class Parametros {

			private $db;

			public function __construct() 
			{
			        
			         $this->db = new Conexion();
			       
			}
  

		    public function get_parametros() 
			{
		       $sql="SELECT * FROM dg_parametros";
		       $rows=$this->db->query($sql);  
        	return $rows;
		    }
		     
		    public function get_Allparametros() 
			{
		        $sql = "SELECT p1.PAR_D_NOMBRE,p2.PAR_D_NOMBRE,p3.PAR_D_NOMBRE,p3.PAR_D_DECRIPCION FROM dg_parametros p1 INNER JOIN dg_parametros p2 ON p2.PAR_C_PADRE=p1.PAR_C_CODIGO INNER JOIN dg_parametros p3 ON p3.PAR_C_PADRE=p2.PAR_C_CODIGO";
		       	 $rows=$this->db->query($sql);  
        		return $rows;
		    }


		    public function get_Idparametros($id) 
			{
		        $sql="SELECT * FROM dg_parametros WHERE PAR_C_PADRE='$id'";
		       	$rows=$this->db->query($sql);  
        		return $rows;
		    }
		    public function get_Idparametross($id) 
			{
		        $sql="SELECT * FROM dg_parametros WHERE PAR_C_PADRE='$id'";
		       	$rows=$this->db->query($sql);  
        		return $rows;
		    }

}

?>
