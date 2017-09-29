<?php

include_once '../../config.ini.php';


$emailusername=htmlspecialchars(trim($_POST["txt_email"]));
$password=htmlspecialchars(trim($_POST["txt_pass"]));
//$usuario="neurocodigo";
//$clave="1234568″;
 $sql="SELECT * from dg_user U INNER JOIN dg_sedes S ON U.SED_C_CODIGO=S.SED_C_CODIGO WHERE U.US_C_CORREO = '$emailusername' and U.US_P_PASSWORD = '$password' AND S.SED_E_ESTADO=1;";

    $rows=$this->db->query($sql);      
    $no_rows =$this->db->rows($rows);


$tmp_usu="";
$tmp_clave="";
$arr_rpta=array();

if ($no_rows == 1) 
        {
            $arr_rpta=array(“estado"=>"1″,"url"=>"otro.php");
            $_SESSION['login'] = true;
            $_SESSION['usuario'] = $rows->fetch_array();            
          
           

        }
        else
        {
           $arr_rpta=array(“estado"=>"0″,"url"=>"nada amigo");
            
        }

echo json_encode($arr_rpta);
?>