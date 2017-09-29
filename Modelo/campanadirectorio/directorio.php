
<?php

class Directorio {

private $db;

public function __construct() 
{
        
         $this->db = new Conexion();
       
}
    public function agrega_dire($idemp,$nombre,$idus,$paga,$sector) 
    {  
      $sql = "CALL spa_agrega_directorio('$idemp','$nombre','$idus','$paga','$sector');";
        
       $rows=$this->db->query($sql);  
       $result=$rows->fetch_array();
    
        return $result;
       
    }

	public function edita_dirnombre($iddir,$nombre,$idus,$paga) 
    {  
      $sql = "CALL spa_edita_dirnombre('$iddir','$nombre','$idus','$paga');";
        
       $rows=$this->db->query($sql);  
       $result=$rows->fetch_array();
    
        return $result;
       
    }
    public function agrega_subrempresa($subr,$idemp,$idus,$sub) 
    {  
      echo $sql = "CALL spa_agrega_empsubrubro('$subr','$idemp','$idus','$sub');";
        
       $rows=$this->db->query($sql);  
       $result=$rows->fetch_array();
    
        return $result;
       
    }
    public function elimina_emprubro($codigo,$us) 
    {  
      $sql = "CALL spa_elimina_empsubrubro('$codigo','$us');";
        
       $rows=$this->db->query($sql);  
       $result=$rows->fetch_array();
    
        return $result;
       
    }
     public function get_empresadirectorio($idemp) 
    {  
      $sql = "SELECT  *  FROM  dg_directorio  
    WHERE DRT_E_ESTADO >0 AND  EMP_C_CODIGO ='$idemp' AND PAR_C_CODIGO=36 AND YEAR(DRT_F_CREA)=YEAR(NOW());";
    
       $rows=$this->db->query($sql);  
       
            $result=$rows->fetch_array();
    
        return $result;
       
    }
     public function get_empresadirectorioc($idemp) 
    {  
      $sql = "SELECT  *  FROM  dg_directorio  
    WHERE DRT_E_ESTADO >0 AND  EMP_C_CODIGO ='$idemp' AND PAR_C_CODIGO=39 AND YEAR(DRT_F_CREA)=YEAR(NOW());";
        
       $rows=$this->db->query($sql);  
       
            $result=$rows->fetch_array();
    
        return $result;
       
    }
    public function get_subrubros($idemp) 
    {  
      $sql = "SELECT  de.DEMP_C_CODIGO,p.PAR_D_NOMBRE,r.DRU_D_DESCRIPCION,sr.SRB_D_DESCRIPCION,ss.SSR_D_DESCRIPCION FROM dg_detempresasubrubros de
left JOIN dg_direc_subsubrubros ss on ss.SSR_C_CODIGO=de.SSR_C_CODIGO
INNER JOIN dg_direc_subrubros sr on sr.SRB_C_CODIGO=de.SRB_C_CODIGO
INNER JOIN dg_direc_rubros r ON r.DRU_C_CODIGO=sr.DRU_C_CODIGO
INNER JOIN dg_parametros p ON p.PAR_C_CODIGO=r.SEC_C_CODIGO
WHERE de.EMP_C_CODIGO='$idemp' AND de.DEMP_E_ESTADO>0 AND YEAR(DEMP_F_CREA)=YEAR(NOW()) ORDER BY  de.DEMP_C_CODIGO DESC; ";
        
       $rows=$this->db->query($sql);  
       
            return $rows;
       
    }
     public function get_allrubross($s) 
    {  
      $sql = "SELECT d.DRU_C_CODIGO,d.SEC_C_CODIGO,d.DRU_D_DESCRIPCION,(SELECT PAR_D_NOMBRE FROM dg_parametros where PAR_C_CODIGO=d.SEC_C_CODIGO) as PAR_D_NOMBRE FROM dg_direc_rubros d where d.DRU_E_ESTADO>0 and d.SEC_C_CODIGO='$s' order by DRU_C_CODIGO desc LIMIT 30;";
        
       $rows=$this->db->query($sql);  
       
            return $rows;
       
    }
     public function get_allrubros() 
    {  
      $sql = "SELECT d.DRU_C_CODIGO,d.SEC_C_CODIGO,d.DRU_D_DESCRIPCION,(SELECT PAR_D_NOMBRE FROM dg_parametros where PAR_C_CODIGO=d.SEC_C_CODIGO) as PAR_D_NOMBRE FROM dg_direc_rubros d where d.DRU_E_ESTADO>0  order by DRU_C_CODIGO desc LIMIT 30;";
        
       $rows=$this->db->query($sql);  
       
            return $rows;
       
    }
 public function get_directorioexport() 
    {  
      $sql = "SELECT * from Directorio;";
        
       $rows=$this->db->query($sql);  
       
            return $rows;
       
    }
    public function get_directorioexport1() 
    {  
      $sql = "SELECT * from Directorio limit 30;";
        
       $rows=$this->db->query($sql);  
       
            return $rows;
       }
    public function get_directorioexportcons() 
    {  
      $sql = "SELECT * from DirectorioCons;";
        
       $rows=$this->db->query($sql);  
       
            return $rows;
       
    }
     public function get_directorioexportcons1() 
    {  
      $sql = "SELECT * from DirectorioCons limit 30;";
        
       $rows=$this->db->query($sql);  
       
            return $rows;
       
    }
     public function get_directorioexport2() 
    {  
      $sql = "SELECT * from Directorio limit 30;";
        
       $rows=$this->db->query($sql);  
       
            return $rows;
       
    }


}

?>
