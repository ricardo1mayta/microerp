<table id="resultado" class="table">
	<?php $c=new Correoempresa(); 
	$cor=$c->get_correoempresa($codigo); 
	while($row=$cor->fetch_array()){
	?>
	<tr>
	<td width="20%">
		<?php echo$row['TIPO'];?></td>
	<td>
	<td width="80%">
		<?php echo$row['CORE_D_CORREO'];?></td>
	<td>
		<form id="fila<?php echo $row['CORE_C_CODIGO'];?>" method="POST" onsubmit="deletecorreo(fila<?php echo $row['CORE_C_CODIGO'];?>); return false">
			<input type="hidden" name="codigo" value="<?php echo $codigo?>">
			<input type="hidden" name="idcore" value="<?php echo $row['CORE_C_CODIGO'];?>">
			<input type="hidden" name="usuario" value="<?php echo $idusu?>">
			<boton class="btn btn-danger  btn-xs"  onclick="deletecorreo(fila<?php echo $row['CORE_C_CODIGO'];?>)"><i class="fa fa-trash-o"></i></boton>
		</form>
	</td>
	</tr>
	<?php } ?>
	
</table>