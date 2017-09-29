<?php  
class Chat {

private $db;

    public function __construct() 
    {
            
             $this->db = new Conexion();
           
    }
     public function save_chats($sms,$idusu,$iddes) 
    {  
      $sql = "CALL spa_save_chats('$sms','$idusu','$iddes');";
        
       $rows=$this->db->query($sql);  
       $result=$rows->fetch_array();
    
        return $result;
        
        
    }
    public function listar_chats($idus,$destino) 
    {  
      $sql = "SELECT c.CHA_C_CODIGO,c.CHA_D_MENSAGE,c.US_C_CODIGO,(SELECT CONCAT(US_D_NOMBRE,' ',US_D_APELL) FROM dg_user WHERE US_C_CODIGO=c.US_C_CODIGO) AS REMITENTE,
(SELECT US_I_IMAGEN FROM dg_user WHERE US_C_CODIGO=c.US_C_CODIGO) AS IMG_REMITENTE ,
c.US_C_DESTINO,(SELECT CONCAT(US_D_NOMBRE,' ',US_D_APELL) FROM dg_user WHERE US_C_CODIGO=c.US_C_DESTINO) AS DESTINO,
(SELECT US_I_IMAGEN FROM dg_user WHERE US_C_CODIGO=c.US_C_DESTINO) AS IMG_DESTINO,c.CHA_F_FECHA FROM dg_chats c

where (c.US_C_CODIGO='$idus' and c.US_C_DESTINO='$destino') or (c.US_C_CODIGO='$destino' and c.US_C_DESTINO='$idus') ORDER BY c.CHA_F_FECHA ASC";
        
       $result=$this->db->query($sql);  
       
    
        return $result;
       
    }


}
?>