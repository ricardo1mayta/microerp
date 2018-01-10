 <?php  
require('../../config.ini.php');
include("../../Modelo/conexion.php");
include("../../Modelo/pedidos/pedidos.php"); ?>

<?php  		$txt=$_GET['txt'];
			$u=$_GET['u'];
if($txt!=""){

			$pro = new Pedidos();

                        $categoria=$pro->get_empresasclientes($txt,$u);
                         //echo $categoria->num_rows;
                         while($row=$categoria->fetch_array()){ 
                         $dir=$row['DIRECCION'];
                         $nom=$row['EMP_D_RAZONSOCIAL'];  
                             ?>
                             <label onclick="agregar_c(<?php echo $row['EMP_C_CODIGO']; ?>,<?php echo $row['EMP_C_RUC']; ?>,'<?=$nom; ?>','<?=$dir; ?>')"  style="cursor: pointer"><?=$row['EMP_D_RAZONSOCIAL']; ?></label><br>
                             
                             <?php }

                             echo "Datos Encontrados: ".$categoria->num_rows;} ?>
