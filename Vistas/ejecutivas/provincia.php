     <?php  
              require('../../config.ini.php');
              include("../../Modelo/conexion.php");
              include("../../Modelo/contactos/contactos.php") ?>
             
<?php 
$id=$_REQUEST["p"];
  $cp=new Contactos(); 

  $cor=$cp->get_provincia($id);


  if(($r=$cor->fetch_row())>0) {?>
<select class="form-control" onchange="distrito(this)" id="pr">
	<option value="0">Estado</option>
	<?php 
	 $cp=new Contactos(); 

  $cor=$cp->get_provincia($id);
  while($row3=$cor->fetch_array()){

    ?>
    <option value="<?=$row3[0]?>"><?=$row3[1]?></option>  
    <?php } ?>
</select>
<?php } ?>