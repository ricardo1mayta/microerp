<?php

class Contactos {

private $db;

    public function __construct() 
    {
            
             $this->db = new Conexion();
           
    }
    public function save_contacto($nombre,$apell,$cargo,$direc,$idus,$idemp){
    	$sql = "CALL spc_save_contacto('$nombre','$apell','$cargo','$direc','$idus','$idemp');";
        
       $rows=$this->db->query($sql);  
       $result=$rows->fetch_array();    
        return $result;

    }
    public function update_contacto($nombre,$apell,$cargo,$direc,$idus,$idcon){
       $sql = "CALL spc_update_contacto('$nombre','$apell','$cargo','$direc','$idus','$idcon');";
        
       $rows=$this->db->query($sql);  
       $result=$rows->fetch_array();    
        return $result;

    }
     public function delete_contacto($idcon,$idus){
       $sql = "CALL spc_delete_contacto('$idcon','$idus');";
        
       $rows=$this->db->query($sql);  
       $result=$rows->fetch_array();    
        return $result;

    }

     public function save_correo($cor,$con,$tip,$us){
    $sql = "CALL spc_save_correo('$cor','$con','$tip','$us');";
        
       $rows=$this->db->query($sql);  
       $result=$rows->fetch_array();    
        return $result;


    }
     public function save_telefono($tel,$tip,$con,$us){
    	$sql = "CALL spc_save_telefono('$tel','$tip','$con','$us');";
        
       $rows=$this->db->query($sql);  
       $result=$rows->fetch_array();    
        return $result;


    }
     public function save_tipocontacto($tip,$con,$us){
    	$sql = "CALL spc_save_tipocontacto('$tip','$con','$us');";
        
        $rows=$this->db->query($sql);  
       $result=$rows->fetch_array();    
        return $result;


    }
    public function get_cargosContacto(){
    	$sql = "SELECT * FROM dg_cargos WHERE CAR_E_ESTADO>0;";
        
        $rows=$this->db->query($sql);  
      
        return $rows;


    }
     public function activa_tipocontacto($e,$us,$con,$tip){
    	 $sql = "call spc_avtiva_tipocontacto('$e','$us','$con','$tip') ";
        
       $rows=$this->db->query($sql);  
       $result=$rows->fetch_array();    
        return $result;


    }
    public function get_tipotelefono(){
    	 $sql = "SELECT * from dg_tipostelefonos;";
        
       $rows=$this->db->query($sql);   
        return $rows;


    }
     public function get_tipocorreo(){
    	 $sql = "SELECT * from dg_tiposcorreos;";
        
       $rows=$this->db->query($sql);   
        return $rows;


    }
public function update_numtelefono($idtel,$num,$idus,$tipo){
      $sql = "call spc_update_numtelefono('$idtel','$num','$idus','$tipo');";
        
       $rows=$this->db->query($sql);   
        $result=$rows->fetch_array();    
        return $result;


    }
public function delete_numtelefono($idtel,$idus){
      $sql = "call spc_delete_telefonocontacto('$idtel','$idus');";
        
       $rows=$this->db->query($sql);   
        $result=$rows->fetch_array();    
        return $result;


    }
public function update_correocontacto($cor,$iduss,$idcor,$tipo){
      $sql = "call spc_update_correo('$cor','$iduss','$idcor','$tipo');";
      $rows=$this->db->query($sql);   
      $result=$rows->fetch_array();    
      return $result;

    }
public function delete_correocontacto($idcor,$idus){
       $sql = "call spc_delete_correo('$idcor','$idus');"; 
      $rows=$this->db->query($sql);   
      $result=$rows->fetch_array();    
      return $result;
    }
public function get_pais(){
       $sql = "SELECT * from dg_pais;"; 
      $rows=$this->db->query($sql);   
          
      return $rows;
    }
public function get_estado($id){
       $sql = "SELECT * from dg_estado where  ubicacionpaisid='$id';"; 
      $rows=$this->db->query($sql);   
          
      return $rows;
    }
public function get_provincia($id){
       $sql = "SELECT * from dg_provincia where  DEP_C_CODIGO='$id';"; 
      $rows=$this->db->query($sql);   
          
      return $rows;
    }
public function get_destrito($id){
       $sql = "SELECT * from dg_distrito where  P_C_CODIGO='$id';"; 
      $rows=$this->db->query($sql);   
          
      return $rows;
    }
public function save_ubigeo($idparis,$idest,$idprov,$iddis,$idus,$idemp){
      $sql = "call spu_save_ubigeo('$idparis','$idest','$idprov','$iddis','$idus','$idemp');";
      $rows=$this->db->query($sql);   
      $result=$rows->fetch_array();    
      return $result;

    }
public function get_ubigeo($idemp){
      $sql = "SELECT (SELECT CONCAT('País :', p.paisnombre) from dg_pais p where p.id=u.id_pais),
(SELECT CONCAT('Estado :',e.estadonombre) FROM dg_estado e where e.id=u.id_estado),
(SELECT CONCAT('Provincia:',pr.P_D_NOMBREPROVINCIA) FROM dg_provincia pr WHERE pr.P_C_CODIGO=u.P_C_CODIGO),
(SELECT CONCAT('Distrito :',d.DIS_D_NOMBREDISTRITO) FROM dg_distrito d WHERE d.DIS_C_CODIGO=u.DIS_C_CODIGO)
 from dg_ubigeo u WHERE u.EMP_C_CODIGO='$idemp';";
      $rows=$this->db->query($sql);   
      $result=$rows->fetch_array();    
      return $result;
    }
public function get_contacto($idemp){
  $sql = "SELECT c.CON_C_CODIGO,CONCAT(c.CON_D_NOMBRE,' ',c.CON_D_APELLIDO,'---',ca.CAR_D_NOMBRE) as CONTACTO FROM dg_contactos c
    INNER JOIN  dg_cargos ca on ca.CAR_C_CODIGO=c.CAR_C_CODIGO 
    INNER JOIN dg_detalleempresacontactos d on d.CON_C_CODIGO=c.CON_C_CODIGO
    WHERE d.EMP_C_CODIGO='$idemp';"; 
      $rows=$this->db->query($sql);   
          
      return $rows;
  }
}


?>