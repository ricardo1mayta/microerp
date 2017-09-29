     <?php  
              require('../../config.ini.php');
              include("../../Modelo/conexion.php");
              include("../../Modelo/contactos/contactos.php") ?>
             
<?php 
$id=$_REQUEST["p"];
  $cp=new Contactos(); 

  $cor=$cp->get_destrito($id);


  if(($r=$cor->fetch_row())>0) {?>
<select class="form-control" id="di" >
	<option value="0" >Estado</option>
	<?php 
	$id=$_REQUEST["p"];
	$cp=new Contactos(); 

  $cor=$cp->get_destrito($id); 
  while($row3=$cor->fetch_array()){

    ?>
    <option value="<?=$row3[0]?>"><?=$row3[1]?></option>  
    <?php } ?>
</select>
<?php } ?>