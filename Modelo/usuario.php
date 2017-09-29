<?php

class User {

private $db;

public function __construct() 
{
        
         $this->db = new Conexion();
       
}
	
   
public function register_user($nombre,$apell,$correo,$pass,$sede,$img) 
{
      
		
		$sql = "call sp_insertar_usuario('$nombre','$apell','$correo','$pass','$sede','$img');";
        
       $rows=$this->db->query($sql);  
		$result=$rows->fetch_array();
	
		return $result;
		
		
    }

   public function check_login($emailusername, $password) 
	{  
       
        $password = ($password);
		
       $sql="SELECT * from dg_user U WHERE U.US_C_CORREO = '$emailusername' and U.US_P_PASSWORD = '$password'; ";

        $rows=$this->db->query($sql); 
        $ro=$this->db->query($sql);      
		$no_rows =$this->db->rows($rows);
        if ($no_rows == 1) 
		{
     
            $_SESSION['login'] = true;
            $_SESSION['usuario'] = $rows->fetch_array();
            $u=$ro->fetch_array();
            
            $sql1="CALL sp_ingreso_usuario(".$u['US_C_CODIGO'].");";   
            $rows=$this->db->query($sql1);         
            return $no_rows;
            
        }
        else
		{
		    return $no_rows;
		}
    }

     

    
    public function user_salida($id) {
        $sql="CALL sp_salida_usuario('$id');";   
            $rows=$this->db->query($sql);   
            $result=$rows->fetch_array();
            return $result;
    }
    public function user_ingreso($id) {
        $sql="CALL sp_ingreso_usuario('$id');";   
            $rows=$this->db->query($sql);   
            $result=$rows->fetch_array();
            return $result;
    }
    public function lista_usuarios() 
    {  
              $sql="SELECT * FROM dg_user WHERE US_E_ESTADO >0  ORDER BY US_E_ESTADOSISTEMA DESC";   
            $result=$this->db->query($sql);   
            
            return $result;
            
          
    }
     public function delete_usuario($id) 
    {  
            $sql="CALL sp_delete_usuario('$id');";   
            $rows=$this->db->query($sql);   
            $result=$rows->fetch_array();
            return $result;
            
          
    }
    public function update_usuario($id,$nombre,$apell,$correo,$pass,$sede,$img) 
    {  
              $sql="CALL sp_modificar_usuario('$id','$nombre','$apell','$correo','$pass','$sede','$img');";   
            $rows=$this->db->query($sql);   
            $result=$rows->fetch_array();
            return $result;
            
          
    }





    public function lista_usuariosprensa($rol1,$rol2) 
    {  
              $sql="SELECT distinct u.US_C_CODIGO,u.US_D_NOMBRE,u.US_D_APELL FROM dg_permisos P inner join dg_user u on u.US_C_CODIGO=P.US_C_CODIGO where RO_C_CODIGO=".$rol1." OR RO_C_CODIGO=".$rol2;   
            $result = mysql_query($sql);
            
            return $result;
            
          
    }
   

}

?>
