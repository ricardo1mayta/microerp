	<table id="resultado2" class="table">
							                    	
	<?php $t=new Direccionempresa(); 
	$tel=$t->get_direccionempresa($codigo); 
	while($row3=$tel->fetch_array()){
	?>
	<tr>
	<td width="20%">
		<?php echo $row3['TIPO'];?></td>
	<td>
	<td width="80%">
		<?php echo $row3['DIRE_D_DESCRIPCION'];?></td>
	<td>
		<form id="fila3<?php echo $row3['DIRE_C_CODIGO'];?>" method="POST" onsubmit="deletedireccion(fila3<?php echo $row3['DIRE_C_CODIGO'];?>); return false">
			<input type="hidden" name="codigo" value="<?php echo $codigo;?>">
			<input type="hidden" name="iddir" value="<?php echo $row3['DIRE_C_CODIGO'];?>">
			<input type="hidden" name="usuario" value="<?php echo $idusu;?>">
			<boton class="btn btn-danger  btn-xs"  onclick="deletedireccion(fila3<?php echo $row3['DIRE_C_CODIGO'];?>)"><i class="fa fa-trash-o"></i></boton>
		</form>
	</td>
	</tr>
	<?php } ?>

</table>