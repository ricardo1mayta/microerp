	<table id="resultado1" class="table">
							                    	
	<?php $t=new Telefonoempresa(); 
	$tel=$t->get_telefonoempresa($codigo); 
	while($row1=$tel->fetch_array()){
	?>
	<tr>
	<td width="20%">
		<?php echo $row1['TIPO'];?></td>
	<td>
	<td width="80%">
		<?php echo $row1['TEL_D_NUMERO'];?></td>
	<td>
		<form id="fila1<?php echo $row1['TEL_C_CODIGO'];?>" method="POST" onsubmit="deletetelefono(fila1<?php echo $row1['TEL_C_CODIGO'];?>); return false">
			<input type="hidden" name="codigo" value="<?php echo $codigo;?>">
			<input type="hidden" name="idtel" value="<?php echo $row1['TEL_C_CODIGO'];?>">
			<input type="hidden" name="usuario" value="<?php echo $idusu;?>">
			<boton class="btn btn-danger  btn-xs"  onclick="deletetelefono(fila1<?php echo $row1['TEL_C_CODIGO'];?>)"><i class="fa fa-trash-o"></i></boton>
		</form>
	</td>
	</tr>
	<?php } ?>

</table>