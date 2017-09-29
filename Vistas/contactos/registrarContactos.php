<?php include_once(HTML_DIR . '/template/titulo.php'); ?>

<?php include_once(HTML_DIR . '/template/links.php'); ?>

<?php include_once(HTML_DIR . '/template/header_menu.php'); ?>



<?php

$cod_empresa=$_REQUEST["idemp"];
$cod_contacto=$_REQUEST["idcon"];

$contact=new contactos();	
$contact->mostrar_contacto_x_codigo($cod_contacto);
$contact->mostrar_empresa_x_codigo($cod_empresa);
?>





<div class="content-wrapper" OnLoad='compt=setTimeout("self.close();",50)'">

	<section class="content-header">

    <?php  if(isset($sms)){ echo $sms; }?>

      <h1>

        Administración del Sistema

        <small>Digamma</small>

      </h1>

     

    </section>

     <section class="content">

      	<div class="row">

     	   <div class="col-md-12">

     	   		<div class="box box-warning">

		            <div class="box-header with-border">

		              <h3 class="box-title"> Información General de Contactos</h3>

		            </div>

		            <div class="box-body ">

		            <div class="col-md-12">
		            	<div class="form-group col-md-2">
							  <label>Tratado</label>							
		                      <select class="form-control" name="cboTratado">
									<option value="SR" 
									<?=($contact->__get("tratado")=="SR")?"selected":"";?>
									>SR.</option>

									<option value="SRA" 
									<?=($contact->__get("tratado")=="SRA")?"selected":"";?>
									>SRA.</option>

									<option value="SRTA" 
									<?=($contact->__get("tratado")=="SRTA")?"selected":"";?>
									>SRTA.</option>

									<option value="ING" 
									<?=($contact->__get("tratado")=="ING")?"selected":"";?>
									>ING.</option>
							    </select>
						</div>
						<div class="form-group col-md-3">
							   <label>Nombres</label>
							   <input type="text" class="form-control" name="txtNombres" placeholder="Nombres" value="<?=$contact->__get("nombres");?>" required>							
		                      
						</div>
						<div class="form-group col-md-3">
			                    <label>Apellidos</label>
			                    <input type="text" class="form-control" name="txtApellidos" placeholder="Apellidos" value="<?=$contact->__get("apellidos");?>" required>
			            </div>
		            </div>

						<form action="" method="post">
							<input type="hidden" name="txtCodigoContacto" value="<?=$cod_contacto;?>">
						    

							<div class="col-md-12">

									<div class="form-group">

											

										<div class="form-group col-md-4">

										<label>Tratado</label>

					                      <select class="form-control" name="cboTratado">

			<option value="SR" 
			<?=($contact->__get("tratado")=="SR")?"selected":"";?>
			>SR.</option>

			<option value="SRA" 
			<?=($contact->__get("tratado")=="SRA")?"selected":"";?>
			>SRA.</option>

			<option value="SRTA" 
			<?=($contact->__get("tratado")=="SRTA")?"selected":"";?>
			>SRTA.</option>

			<option value="ING" 
			<?=($contact->__get("tratado")=="ING")?"selected":"";?>
			>ING.</option>

										    </select>

					                    

					                    </div>

										<div class="form-group col-md-8">

					                     <label>Nombres</label>

					                      <input type="text" class="form-control" name="txtNombres" placeholder="Nombres" value="<?=$contact->__get("nombres");?>" required>

					                    </div>

					                    

					                    <div class="form-group col-md-12 ui-widget">

					                     <label for="skills">Empresa</label>
					                     
					                      <input type="text" class="form-control" placeholder="Empresa" value="<?=$contact->razon_social;?>" readonly>
					                      <input type="hidden" name="txtCodigoEmpresa" value="<?=$cod_empresa;?>">

					                    </div>

					                    <div class="form-group col-md-12">

					                    <label>Cargo</label>

					                    <select class="form-control" name="cboCargo">

					                    <?php
					                    $cargo=new contactos();
					                    foreach($cargo->mostrar_cargos() as $fila){
					                    ?>
					                    	<option value="<?=$fila["CAR_C_CODIGO"];?>"  
					                    <?=($contact->__get("cargo")==$fila["CAR_C_CODIGO"])?"selected":"";?>
					                    	
					                    	>
					                    	<?=$fila["CAR_D_NOMBRE"];?>
					                    	</option>
					                    <?php } ?>	
					                    </select>

					                    </div>

					                </div>

					                

							</div>	

							<div class="col-md-6">
								<label>Numero</label>
														<div class="input-group input-group-sm">

<input name="txtTelefono[]" type="tel" class="form-control" value="<?=current($contact->telefono);?>" placeholder="N° Teléfono">
<input name="txtTelefono[]" type="tel" class="form-control" value="<?=next($contact->telefono);?>" placeholder="N° Teléfono">
<input name="txtTelefono[]" type="tel" class="form-control" value="<?=next($contact->telefono);?>" placeholder="N° Teléfono">

										                    
												        </div>
							</div>

						</div>

					</div>

					<div class="box box-warning">

			            <div class="box-header with-border">

			              <h3 class="box-title">Información Adicional</h3>

			            </div>

			            <div class="box-body ">

							<div class="col-md-12" >    

									<div class="col-md-6">

										<div id="contenedorTel">
											<div class="addedTel">
												<div class="form-group col-md-4" >
													<label>Tipo</label>
													<select name="cboTipoTelefono" class="form-control">
													<?php
					                    			$cargo=new contactos();
					                    			foreach($cargo->mostrar_tipoTelefono() as $fila){
					                    			?>
					                    				<option value="<?=$fila["TIPTEL_C_CODIGO"];?>">
					                    				<?=$fila["TIPTEL_D_NOMBRE"];?>
					                    				</option>
					                    			<?php } ?>	

								    				</select>
													<select name="cboTipoTelefono" class="form-control">
													<?php
					                    			$cargo=new contactos();
					                    			foreach($cargo->mostrar_tipoTelefono() as $fila){
					                    			?>
					                    				<option value="<?=$fila["TIPTEL_C_CODIGO"];?>">
					                    				<?=$fila["TIPTEL_D_NOMBRE"];?>
					                    				</option>
					                    			<?php } ?>	

								    				</select>
													<select name="cboTipoTelefono" class="form-control">
													<?php
					                    			$cargo=new contactos();
					                    			foreach($cargo->mostrar_tipoTelefono() as $fila){
					                    			?>
					                    				<option value="<?=$fila["TIPTEL_C_CODIGO"];?>">
					                    				<?=$fila["TIPTEL_D_NOMBRE"];?>
					                    				</option>
					                    			<?php } ?>	

								    				</select>

										    	</div>													

												<div class="col-md-6">
													<label>Numero</label>
														<div class="input-group input-group-sm">

<input name="txtTelefono[]" type="tel" class="form-control" value="<?=current($contact->telefono);?>" placeholder="N° Teléfono">
<input name="txtTelefono[]" type="tel" class="form-control" value="<?=next($contact->telefono);?>" placeholder="N° Teléfono">
<input name="txtTelefono[]" type="tel" class="form-control" value="<?=next($contact->telefono);?>" placeholder="N° Teléfono">

										                    
												        </div>
												</div>
											</div>
										</div>

										<!-- div class="form-group col-md-12">
											<label>Agregar Telefono</label>
											<a id="agregarCampoTel" class="btn btn-info" href="#"> + </a>
										</div -->

										<div class="form-group col-md-12">			
											<label>Dirección</label> 
											<input type="text" name="txtDireccion" class="form-control" placeholder="Dirección" value="<?=$contact->__get("direccion");?>">
										</div> 


																		
<!--         -->									
										<div id="contenedor">
											<div class="added">
												<div class="form-group col-md-4">
													<label>Tipo</label>
													<select name="cboTipoCorreo" class="form-control">
													<?php
					                    			$cargo=new contactos();
					                    			foreach($cargo->mostrar_tipoCorreo() as $fila){
					                    			?>
					                    				<option value="<?=$fila["TIPCOR_C_CODIGO"];?>">
					                    				<?=$fila["TIPCOR_D_NOMBRE"];?>
					                    				</option>
					                    			<?php } ?>								    											    				</select>
										    	</div>
												<div class="col-md-8">
													<label>Correo</label>
													<div class="input-group input-group-sm">

<input type="email" name="txtCorreo[]" class="form-control" placeholder="E-Mail" value="<?=current($contact->correo);?>" >
<input type="email" name="txtCorreo[]" class="form-control" placeholder="E-Mail" value="<?=next($contact->correo);?>" >
<input type="email" name="txtCorreo[]" class="form-control" placeholder="E-Mail" value="<?=next($contact->correo);?>" >			                    
										                    <!-- span class="input-group-btn">
										                      <button type="button" class="eliminar btn btn-info btn-flat">X</button>
										                    </span -->
										            <?php //} ?>
										            </div>
												</div>
												
											</div>
										</div>
<!--         -->										

										<!-- div class="form-group col-md-12">
											<label>Agregar E-Mail</label>
											<a id="agregarCampo" class="btn btn-info" href="#"> + </a>
										</div -->

									</div>

									<div class="col-md-6">

										<div class="form-group col-md-12">			

											<label>Cumpleaños</label>

											<input type="date" name="dtCumpleanos" class="form-control" placeholder="Cumpleaños" value="<?=$contact->__get("cumpleanos");?>">

										   							   

										</div>

										<div class="form-group col-md-12">			

											

										    <label>Aniversario</label>

											<input type="date" name="dtAniversario" class="form-control" placeholder="Aniversario" value="<?=$contact->__get("aniversario");?>">

										   							   

										</div>

										<div class="form-group col-md-12">			

											<label>Facebook</label>

											<input type="url" name="urlFacebook" class="form-control" placeholder="Facebook" value="<?=$contact->__get("facebook");?>">

										   							   

										</div>

										<div class="form-group col-md-12">			

											<label>Twitter</label>

											<input type="url" name="urlTwitter" class="form-control" placeholder="Twitter" value="<?=$contact->__get("twitter");?>">

										   							   

										</div>   

										<div class="form-group col-md-12">			

											<label>Linkedin</label>

											<input type="url" name="urlLinkedin" class="form-control" placeholder="Linkedin" value="<?=$contact->__get("linkedin");?>">						   

										</div>   										  								

									</div>

									<div class="col-md-12">

										<div class="form-group col-md-12">			

											<label></label>
											<?php if($cod_contacto==""){?>
											<input type="submit" class="btn btn-info btn-flat" name="cmdGuardar" value="Registrar Contacto">
											<?php }else{?>
											<input type="submit" class="btn btn-info btn-flat" name="cmdActualizar" value="Actualizar Contacto">
											<?php }?>
													   

										</div>

									</div>	   



								

									</form>

								</div>

							</div>

						</div>

					</div>

				</div>

			</div>

	  </div>

	</section>

</div>

            <!-- /.box-body -->

 <?php include_once(HTML_DIR . '/template/footer.php'); ?>



<?php include_once(HTML_DIR . '/template/ajustes_generales.php'); ?>



<?php include_once(HTML_DIR . '/template/scrips.php'); ?>





<!-- Bootstrap 3.3.6 -->



<!-- DataTables -->



<script >

/*
$('form').submit(function(e){

    if ($('input[type=checkbox]:checked').length === 0) {
        e.preventDefault();
        alert('Debe seleccionar el tipo de contacto: VENTAS / MINERIA / CONSTRUCCION');
    }
});
*/

 $(document).ready(function() {

    setTimeout(function() {

        $("#mensage").fadeOut(1500);

    },3000);

  });



  $('#editarEmpresas').on('show.bs.modal', function (event) {

  var button = $(event.relatedTarget) // Button that triggered the modal

  var id = button.data('id')

  var ruc = button.data('ruc')

  var nombre = button.data('nombre') 

  var rsocial= button.data('rsocial') 

  

  var modal = $(this)

  modal.find('.modal-title').text('Editar a: ' + nombre)

  modal.find('input[name="codigo"]').val(id)

  modal.find('input[name="ruc1"]').val(ruc)

  modal.find('input[name="nomcomercial1"]').val(nombre)

  modal.find('input[name="rsocial1"]').val(rsocial)

 

  



})

  $('#eliminarEmpresas').on('show.bs.modal', function (event) {

  var button = $(event.relatedTarget) // Button that triggered the modal

  var id = button.data('id')

  var nombre = button.data('nombre') 

  // Extract info from data-* attributes

  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).

  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.

  var modal = $(this)

  modal.find('.modal-title').text('Eliminar a: ' + nombre)

  modal.find('input[name="codigo"]').val(id)

 



})

 $('#finalizarEmpresas').on('show.bs.modal', function (event) {

  var button = $(event.relatedTarget) // Button that triggered the modal

  var id = button.data('id')

  var nombre = button.data('nombre') 

  // Extract info from data-* attributes

  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).

  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.

  var modal = $(this)

  modal.find('.modal-title').text('Eliminar a: ' + nombre)

  modal.find('input[name="codigo"]').val(id)

 



})





$(function () {

    $("#example1").DataTable();

    $('#example2').DataTable({

      "paging": true,

      "lengthChange": false,

      "searching": false,

      "ordering": true,

      "info": true,

      "autoWidth": false

    });

   

     $('#exam').DataTable({

      "paging": true,

      "lengthChange": false,

      "searching": false,

      "ordering": true,

      "info": true,

      "autoWidth": false

    });

  });



 

  </script>

  

<?php include_once(HTML_DIR . '/template/inferior_depues_cuerpo.php'); ?>

