 <?php  
require('../../config.ini.php');
include("../../Modelo/conexion.php");
include("../../Modelo/pedidos/pedidos.php"); ?>

<?php  		$txt=$_GET['txt'];
if($txt!=""){

			$pro = new Pedidos();

                        $rows=$pro->get_productos($txt);

                         while($row=$rows->fetch_array()){   

                             ?>
                             <label onclick="agregar(<?=$row['DPRO_C_CODIGO']?>,<?=$row['DPRO_N_CANTIDAD']?>,<?=$row['DPRO_N_PRECIO']?>,this)"  style="cursor: pointer"><?=$row['NOMBRE']; ?></label><br>
                             
                             <?php }
                             echo "Datos Encontrados: ".$rows->num_rows;} ?>
