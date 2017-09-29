<?php

include_once '../config.ini.php';

class Productos {


            public function __construct() 
            {
                    $db = new DB_Class();
                   
            }

            public function get_productos() 
            {
                $sql="select p.PRO_C_CODIGO AS CODIGO,(SELECT dp.DPAR_D_NOMBRE FROM dg_detalleparametros dp WHERE dp.DPAR_C_CODIGO=p.CAT_C_CODIGO )AS CATEGORIA,(SELECT dp.DPAR_D_NOMBRE FROM dg_detalleparametros dp WHERE dp.DPAR_C_CODIGO=p.MAR_C_CODIGO )AS MARCA,p.PRO_D_NOMBRE AS NOMBRE from dg_productos p";
                $res = mysql_query($sql);
                return $res;
            }
             public function guardar_productos($nombre,$desc,$mar) 
            {
                $sql="call sp_insertar_producto('".$mar."','".$nombre."','".$desc."')";
                $res = mysql_query($sql) or die(mysql_error());
                $no_rows = mysql_fetch_array($res);
                return $no_rows;
            }
             public function guardar_productos_ventas($nombre,$desc,$mar,$fini,$ffin) 
            {
                $sql="call sp_insertar_producto_ventas('".$mar."','".$nombre."','".$desc."','".$fini."','".$ffin."')";
                $res = mysql_query($sql) or die(mysql_error());
                $no_rows = mysql_fetch_array($res);
                return $no_rows;
            }
             public function activar_productos_ventas($idprod) 
            {
                $sql="call sp_insertar_producto_ventas('".$mar."','".$nombre."','".$desc."','".$fini."','".$ffin."')";
                $res = mysql_query($sql) or die(mysql_error());
                $no_rows = mysql_fetch_array($res);
                return $no_rows;
            }
            public function get_Idproductos($id) 
            {
                $sql="select PRO_C_CODIGO,PRO_D_NOMBRE  from dg_productos  WHERE PAR_C_CODIGO=".$id." AND PRO_E_ESTADO=1";
                $res = mysql_query($sql);
                return $res;
            }

            public function get_AllDetalleproductos() 
            {
               /* $sql="select pb.PAR_D_NOMBRE,pa.PAR_D_NOMBRE,p.PRO_D_NOMBRE,dp.DRPO_D_NOMBRE from dg_detalleProductos dp
                        inner join dg_productos p on p.PRO_C_CODIGO=dp.PRO_C_CODIGO
                        INNER JOIN dg_parametros pa on pa.PAR_C_CODIGO=p.PAR_C_CODIGO
                        INNER JOIN dg_parametros pb on pb.PAR_C_CODIGO=pa.PAR_C_PADRE;";*/
                $sql="select pb.PAR_D_NOMBRE,pa.PAR_D_NOMBRE,p.PRO_D_NOMBRE,p.PRO_E_ESTADOVENTAS from dg_productos p
                        INNER JOIN dg_parametros pa on pa.PAR_C_CODIGO=p.PAR_C_CODIGO
                        INNER JOIN dg_parametros pb on pb.PAR_C_CODIGO=pa.PAR_C_PADRE;";
                $res = mysql_query($sql);
                return $res;
            }
           

}

?>
