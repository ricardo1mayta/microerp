     <?php  
              require('../../config.ini.php');
              include("../../Modelo/conexion.php");
              include("../../Modelo/contactos/contactos.php") ?>
             
<?php if($_REQUEST["p"]>0) {?>
<select class="form-control"  onchange="provincia(this)" id="e" >
	<option value="0">Estado</option>
	<?php 
	$id=$_REQUEST["p"];
	$cp=new Contactos(); 

  $cor=$cp->get_estado($id); 
  while($row3=$cor->fetch_array()){

    ?>
    <option value="<?=$row3[0]?>"><?=$row3[2]?></option>  
    <?php } ?>
</select>
<?php } ?>