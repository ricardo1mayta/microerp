
       <?php  
             require('../../config.ini.php');
             include("../../Modelo/conexion.php");
             include("../../Modelo/empresas/cartera.php"); 
             ?>

<select class="form-control" id="ejecutiva" name="ideje" onchange="agregarejecutiva(this.form); return false"> 
<option>Opciones</option>
<option value="0">Ninguna</option>
<?php 
	$cate = new Cartera();
		$SECTOR1=$cate->get_ejecutivas(1);
		while($sec=$SECTOR1->fetch_array()){  
		?>
		<option value="<?php echo $sec['US_C_CODIGO']?>"><?php echo $sec['US_D_NOMBRE']?>
		</option>
	<?php }?>

</select>