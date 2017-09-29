<?php

include_once '../config.ini.php';
class Generico{


public function __construct() 
{
        $db = new DB_Class();
        
}
	
    
   
    public function user_menu($uid) {
        $menu = mysql_query("SELECT * FROM dg_vista_menu WHERE  VIS_E_ESTADO=1 AND US_C_CODIGO=".$uid." ORDER BY VIS_D_NOMBRE ASC;");
        return $menu;

       /* $menudata= mysql_fetch_array($menu);
        $_SESSION['menu'] = $menudata;*/
    }
    public function user_sub_menu($uid,$idpad) {
        $menu = mysql_query("SELECT DISTINCT * FROM dg_vista_menu WHERE US_C_CODIGO=".$uid." AND VIS_E_ESTADO=1 AND VIS_P_PADRE=".$idpad." ORDER BY VIS_D_NOMBRE ASC;");
        return $menu;

       /* $menudata= mysql_fetch_array($menu);
        $_SESSION['menu'] = $menudata;*/
    }
    public function grilla($query) {
        $menu = mysql_query($query);
        return $menu;
    }

}

?>
