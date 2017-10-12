<?php

class Agenda {

private $db;

    public function __construct() 
    {
            
             $this->db = new Conexion();
           
    }
    public function agregar_agenda($desc,$fini,$ffin,$idus,$color,$idemp,$con,$detalle,$idpro) 
    {  
     $sql = "CALL spa_agregar_agenda('$desc','$fini','$ffin','$idus','$color','$idemp','$con','$detalle','$idpro');";
        
       $rows=$this->db->query($sql);  
       $result=$rows->fetch_array();
    
        return $result;
       
    }
     public function editar_agenda($idage,$detalle,$fini,$ffin,$idus,$color) 
    {  
      $sql = "CALL spa_editar_agenda('$idage','$detalle','$fini','$ffin','$idus','$color');";
        
       $rows=$this->db->query($sql);  
       $result=$rows->fetch_array();
    
        return $result;
       
    }
     public function eliminar_agenda($idage,$idus) 
    {  
      $sql = "CALL spa_eliminar_agenda('$idage','$idus');";
        
       $rows=$this->db->query($sql);  
       $result=$rows->fetch_array();
    
        return $result;
       
    }

     public function get_allagendaus($idus) 
    {  
      $sql = "SELECT a.AGE_C_CODIGO,a.AGE_C_COLOR,CONCAT(t.TIP_D_NOMBRE,' - ',e.EMP_D_RAZONSOCIAL) as AGE_DESCRIPCION,a.AGE_F_FECHAFIN,a.AGE_F_FECHAINICIO,a.AGE_D_DETALLE,(SELECT CONCAT(c.CON_D_TRATADO,'. ',c.CON_D_NOMBRE,' ',c.CON_D_APELLIDO,' - ',ca.CAR_D_NOMBRE) FROM dg_contactos c INNER JOIN dg_cargos ca on ca.CAR_C_CODIGO=c.CAR_C_CODIGO WHERE c.CON_C_CODIGO=a.CON_C_CODIGO) AS CONTACTO  FROM dg_agenda a 
INNER JOIN dg_empresas e on e.EMP_C_CODIGO=a.EMP_C_CODIGO
left JOIN dg_tiposagenda t on t.TIP_C_CODIGO=a.AGE_DESCRIPCION 
where a.US_C_CODIGO ='$idus' AND a.AGE_E_ESTADO>0 AND a.AGE_F_FECHAFIN<now() and  a.AGE_F_FECHAFIN>=DATE_SUB(NOW(), INTERVAL 12 MONTH) ;";
        
       $rows=$this->db->query($sql);  
       
            return $rows;
       
    }

   public function get_allagendausEmp($idemp,$idus,$idpro) 
    {  
      $sql = "SELECT a.AGE_C_CODIGO,a.AGE_C_COLOR,a.EMP_C_CODIGO,t.TIP_D_NOMBRE,t.TIP_I_IMG,a.AGE_F_FECHAFIN,a.AGE_F_FECHAINICIO,a.AGE_D_DETALLE,(SELECT CONCAT(c.CON_D_TRATADO,'. ',c.CON_D_NOMBRE,' ',c.CON_D_APELLIDO,' - ',ca.CAR_D_NOMBRE)  FROM dg_contactos c INNER JOIN dg_cargos ca on ca.CAR_C_CODIGO=c.CAR_C_CODIGO WHERE c.CON_C_CODIGO=a.CON_C_CODIGO) AS CONTACTO, DATE_FORMAT(a.AGE_F_FECHAINICIO,'%H:%I') AS HORA ,DATE_FORMAT(a.AGE_F_FECHAINICIO,'%d-%m-%Y') AS FECHA FROM dg_agenda a 
INNER JOIN dg_empresas e on e.EMP_C_CODIGO=a.EMP_C_CODIGO
left JOIN dg_tiposagenda t on t.TIP_C_CODIGO=a.AGE_DESCRIPCION where a.US_C_CODIGO ='$idus' and a.EMP_C_CODIGO='$idemp' and a.PRO_C_CODIGO='$idpro' ORDER BY a.AGE_C_CODIGO DESC;";
        
       $rows=$this->db->query($sql);  
       
            return $rows;
       
    }
     public function get_allsinfinalizar($idus) 
    {  
     $sql = "SELECT a.AGE_C_CODIGO,a.EMP_C_CODIGO,a.AGE_C_COLOR,CONCAT(t.TIP_D_NOMBRE,' - ',e.EMP_D_RAZONSOCIAL) as AGE_DESCRIPCION,a.AGE_F_FECHAFIN,a.AGE_F_FECHAINICIO,a.AGE_D_DETALLE,(SELECT CONCAT(c.CON_D_TRATADO,'. ',c.CON_D_NOMBRE,' ',c.CON_D_APELLIDO,' - ',ca.CAR_D_NOMBRE) FROM dg_contactos c INNER JOIN dg_cargos ca on ca.CAR_C_CODIGO=c.CAR_C_CODIGO WHERE c.CON_C_CODIGO=a.CON_C_CODIGO) AS CONTACTO  FROM dg_agenda a 
INNER JOIN dg_empresas e on e.EMP_C_CODIGO=a.EMP_C_CODIGO
left JOIN dg_tiposagenda t on t.TIP_C_CODIGO=a.AGE_DESCRIPCION 
where a.US_C_CODIGO ='$idus' and a.AGE_E_ESTADO=1 AND a.AGE_F_FECHAFIN<now() and  a.AGE_F_FECHAFIN>=DATE_SUB(NOW(), INTERVAL 3 MONTH) ORDER BY a.AGE_F_FECHAFIN desc;";
        
       $rows=$this->db->query($sql);  
       
            return $rows;
       
    }
    public function get_programados($idus) 
    {  
     $sql = "SELECT a.AGE_C_CODIGO,a.EMP_C_CODIGO,a.AGE_C_COLOR,CONCAT(t.TIP_D_NOMBRE,' - ',e.EMP_D_RAZONSOCIAL) as AGE_DESCRIPCION,a.AGE_F_FECHAFIN,a.AGE_F_FECHAINICIO,a.AGE_D_DETALLE,(SELECT CONCAT(c.CON_D_TRATADO,'. ',c.CON_D_NOMBRE,' ',c.CON_D_APELLIDO,' - ',ca.CAR_D_NOMBRE) FROM dg_contactos c INNER JOIN dg_cargos ca on ca.CAR_C_CODIGO=c.CAR_C_CODIGO WHERE c.CON_C_CODIGO=a.CON_C_CODIGO) AS CONTACTO  FROM dg_agenda a 
INNER JOIN dg_empresas e on e.EMP_C_CODIGO=a.EMP_C_CODIGO
left JOIN dg_tiposagenda t on t.TIP_C_CODIGO=a.AGE_DESCRIPCION 
where a.US_C_CODIGO ='$idus' and a.AGE_E_ESTADO=1 AND a.AGE_F_FECHAFIN>now()  ORDER BY a.AGE_F_FECHAFIN desc;";
        
       $rows=$this->db->query($sql);  
       
            return $rows;
       
    }
  
}

?>
