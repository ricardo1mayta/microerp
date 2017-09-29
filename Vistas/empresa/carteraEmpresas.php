<?php include_once(HTML_DIR . '/template/titulo.php'); ?>
<?php include_once(HTML_DIR . '/template/links.php'); ?>
<script >
 $(document).ready(function() {

   
  });
	function buscar(e){
		var u=<?php echo $usuario['US_C_CODIGO']; ?>;

  var buscar=$("#text").val();
  var url="../Vistas/empresa/listartags.php";
 
  $('#tag').html('<div  class="overlay" ><img src="../Public/img/Sistema/loading3.gif" alt="Loading..." width="25" height="25" />hola</div>')
    $.ajax({
           type: "GET",
           url: url,
           data: {txt: buscar,e: e,u: u}, // Adjuntar los campos del formulario enviado.
                      
           success: function(data)
           {
               //$("#respuesta").html(data); // Mostrar la respuestas del script PHP.
                $('#tag').html(data);
              $("#tag").show();

           }
         });
  }
  function link(e,u,t){
  


  var url="../Vistas/empresa/listartags.php";
 
  $('#tag').html('<div  class="overlay" ><img src="../Public/img/Sistema/loading3.gif" alt="Loading..." width="25" height="25" />hola</div>')
    $.ajax({
           type: "GET",
           url: url,
           data: {e: e, u: u, t: t}, // Adjuntar los campos del formulario enviado.
                      
           success: function(data)
           {
               //$("#respuesta").html(data); // Mostrar la respuestas del script PHP.
                $('#tag').html(data);
              $("#tag").show();

           }
         });

  $("#tag").hide();
  $("#text").val("");
  }
  function eliminar(i,u,e){

  var url="../Vistas/empresa/listartags.php";
 
  $('#tag').html('<div  class="overlay" ><img src="../Public/img/Sistema/loading3.gif" alt="Loading..." width="25" height="25" />hola</div>')
    $.ajax({
           type: "GET",
           url: url,
           data: {u: u, tg: i,e:e}, // Adjuntar los campos del formulario enviado.
                      
           success: function(data)
           {
               //$("#respuesta").html(data); // Mostrar la respuestas del script PHP.
                $('#tag').html(data);
              $("#tag").show();

           }
         });
  }

</script>
<?php include_once(HTML_DIR . '/template/header_menu.php'); ?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <?php  if(isset($sms)){ echo $sms; }?>
      <h1>
        Administración del Sistema
        <small>Digamma</small>
      </h1>
     
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-warning">
        <div class="box-header with-border">
          <?php 
          if(isset($_POST['codigo'])){ $idempresa=$_POST['codigo']; }else{$idempresa=$idemp;}
          	
            		$e=new Empresas(); 
            		$emp=$e->get_Empresasid($idempresa);
            ?>
              <h2 class="box-title text-green"><small>Información General de:</small> <?php echo $emp['EMP_D_RAZONSOCIAL'];?></h2>
              <h3 class="box-title text-red"><small>&nbsp; Estado:</small> <?php echo $emp['ESTADO'];?></h3>
             
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
      	 <form action="../carteraEmpresas/" method="POST">
          <div class="col-md-6"> 
          
			<div class="form-group ">
	            <label>RUC</label>
	            <input type="text" class="form-control input-sm"  id="rucemp" name="rucemp" value="<?php echo $emp['EMP_C_RUC'];?>" placeholder="Ruc"  >
	            </div>
	            <div class="form-group ">
	            <label>Razón Social</label>
	                      <input type="text" class="form-control" value="<?php echo $emp['EMP_D_RAZONSOCIAL'];?>" id="rsocial" name="rsocial" placeholder="Razon Social"  >
	            </div>
	            <div class="form-group ">
	            <label>Nombres Comercial</label>
	              <input type="text" class="form-control" value="<?php echo $emp['EMP_D_NOMBRECOMERCIAL'];?>" id="nomcomercial" name="nomcomercial" placeholder="Empresa"  >
	            </div>
	            <div class="input-group ">
	            	<label>Pagina Web</label>
	            </div>
	            <div class="input-group input-group-sm">	            
                <input type="text" class="form-control" value="<?php echo $emp['EMP_W_WEB'];?>" id="web" name="web" placeholder="web"  >
                    <span class="input-group-btn">
                       <a  class="btn btn-info btn-flat" target="_blank" href="http://<?php echo $emp['EMP_W_WEB'];?>">Ir</a>
                    </span>
              </div>
	            <div class="form-group ">
	            <label>Estado</label>
	            <select class="form-control" name="estado">
	            	<option value="<?php echo $emp['EMP_E_ESTADO'];?>"><?php echo $emp['ESTADO'];?></option>
	            	<option value="1">Activo</option>
	            	<option value="2">No Aplica</option>
	            	<option value="3">Baja</option>
	            	<option value="4">Solcidado</option>
	            	<option value="5">Solicitud de baja</option>
	            </select>
	            </div>
	            <div class="form-group ">
	            <input type="hidden" name="evento" value="actualizar">
	            <input type="hidden" name="idemp" value="<?php echo $idempresa; ?>">
		           	 <button class="btn btn-info">Actualizar</button>
		        </div>
		       
		    </div> 
		    </form>   
			<div class="col-md-6">	
			    <div class="form-group  "> 
				    <label>Asignaciones</label>
				     <div class="box-tools pull-right">
		           <button type="button" class="btn btn-success btn-xs" data-toggle="modal"  data-target="#sectorr" data-id='+cliente.codigo+' data-nombre='+cliente.nombre+' ><i class="fa fa-plus-square"></i></button>
		                
				</div>
				<div class="col-md-12">
					<table class="table">
					<thead>
						<td>Rubro</td>
						<td>Ejecutiva</td>
					</thead>
                  <?php $usu=$_SESSION['usuario'];
                      $cate = new Cartera();
                         $SECTOR=$cate->get_sectorempresa($emp['EMP_C_CODIGO']);
                         while($cat=$SECTOR->fetch_array()){  
                             ?>
                            <tr>
                               <td><?php echo $cat['SECTOR']?></td>
                               <td>
                               <form method="POST" id="cod<?php echo $cat['PAR_C_CODIGO']?>" >
                               	<input type="hidden" name="idemp" value="<?php echo $idempresa; ?>">
                              	<input type="hidden" name="idcar" value="<?php echo $cat['CAR_C_CODIGO'];?>">
                              	<input type="hidden" name="evento" value="ejecutiva">
                               	<div  id="combo<?php echo $cat['PAR_C_CODIGO']?>" > 
                               		 <?php 
				                     $eje=new Cartera(); 
            						$ej=$eje->get_ejecutivasasignadas($emp['EMP_C_CODIGO'], $cat['PAR_C_CODIGO']);?>
            						
            						 <label id="ejecutivaa" ><?php if($ej['NOMBRE']==""){echo "<p class='text-red'>Falta Asignar</p>";}else{ echo "<p class='text-green'>".$ej['NOMBRE']."</p>";} ?></label>
            						<input type="hidden" name="ideje" value="<?php echo $ej['US_C_CODIGO']; ?>">
								</div>
								</form>
								</td>
								<td>
								<input type="image" name="" src="../Public/img/Sistema/edit.png" onclick="mostrarcombo(combo<?php echo $cat['PAR_C_CODIGO']?>); return false;">
									
								</td>
							</tr>
                           <?php }?>

                	</table>    
                </div>
                <div class="form-group  "> 
                	<div class="form-group">
				   	 <label>Tags</label>
				   	</div>
				   	
				<div class="col-md-12">
					<div class="form-group">
					<input type="text" name="text" id="text" class="form-control" onkeyup="buscar(<?php echo $idempresa; ?>)">
					</div>
					<div class="form-group" id="tag">
					
					</div>
					
              <!-- /.form-group -->
					
		           
		          <!-- /.box -->
                </div>
               </div> 
		  	</div>

        </div>
        
      </div>
      <!-- /.box -->
      <div class="box box-warning">
        <div class="box-header with-border">
          <?php 
            		$e=new Empresas(); 
            		$emp=$e->get_Empresasid($idempresa);
            ?>
              <h3 class="box-title"><small>Información Adicional de:</small> <?php echo $emp['EMP_D_NOMBRECOMERCIAL'];?></h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div class="form-group col-md-6" >
				<label>Correos</label>
	            <table width="100%">
	            	<tr>
	            	<td width="25%">
	            	<form id="formulario" method="POST" name="formulario" onsubmit="grabarcorreo(); return false">
	        			<select class="form-control" name="t_correo">
	        				<option value="0">Tipo</option>
	        				<option value="1">Corporativo</option>
	        				<option value="2">Ventas</option>
	        				<option value="3">Marketing</option>
	        				<option value="4">Otros</option>
	        			</select>
	            	</td>
	            	<td width="75%">
	            	<form id="formulario" method="POST" name="formulario" onsubmit="grabarcorreo(); return false">
	            	
	            		<input type="hidden" name="codigo" value="<?php echo $emp['EMP_C_CODIGO'];?>">
	            		<input type="hidden" name="usuario" value="<?php echo $usuario['US_C_CODIGO']?>">
	            		<input type="email" class="form-control"   name="correo" id="email" placeholder="ejemplo@dominio.com"  >

	            	</td>
	            	<td>
	            		<boton class="btn btn-info " id="btn_enviar"  onclick="grabarcorreo()" ><i class="fa fa-floppy-o"></i></boton>
	            	</form>
	            	
	            	</td>
	            	</tr>
	            	<tr>
	            		<td colspan="2">
	                    	
	                    	<table id="resultado" class="table">
	                    		<?php $c=new Correoempresa(); 

								$cor=$c->get_correoempresa($emp['EMP_C_CODIGO']); 
								while($row=$cor->fetch_array()){
								?>
		                    	<tr>
		                    	<td width="30%">
		                    		<?php echo$row['TIPO'];?></td>
		                    	<td >
		                    	<td width="70%">
		                    		<?php echo$row['CORE_D_CORREO'];?></td>
		                    	<td >
		                    		<form id="fila<?php echo $row['CORE_C_CODIGO'];?>" method="POST" onsubmit="deletecorreo(fila<?php echo $row['CORE_C_CODIGO'];?>); return false">
		                    			<input type="hidden" name="codigo" value="<?php echo $emp['EMP_C_CODIGO'];?>">
		                    			<input type="hidden" name="idcore" value="<?php echo $row['CORE_C_CODIGO'];?>">
		                    			<input type="hidden" name="usuario" value="<?php echo $usuario['US_C_CODIGO']?>">
		                    			<boton class="btn btn-danger  btn-xs"  onclick="deletecorreo(fila<?php echo $row['CORE_C_CODIGO'];?>)"><i class="fa fa-trash-o"></i></boton>
		                    		</form>
		                    	</td>
		                    	</tr>
		                    	<?php } ?>
		                    	
	                    	</table>
	            		</td>
	            	</tr>
	            </table>
	        </div>
	        <div class="form-group col-md-6">
	            <label>Telefonos</label>
	            <table width="100%" >
	            	<tr>
	            	<td width="23%">
	            	<form id="formulario1" method="POST" name="formulario1" onsubmit="grabartelefono(); return false">
	        			<select class="form-control" name="t_telefono">
	        				<option value="0">Tipo</option>
	        				<option value="1">Fijo</option>
	        				<option value="2">Celular</option>
	        				<option value="3">Otros</option>
	        			</select>
	            	</td>
	            	<td width="70%"> 
	            	
	            		<input type="hidden" name="eve" value="1">
	            		<input type="hidden" name="codigo" value="<?php echo $emp['EMP_C_CODIGO'];?>">
	            		<input type="hidden" name="usuario" value="<?php echo $usuario['US_C_CODIGO']?>">
	            		<input type="number" class="form-control"   name="telefono" id="phone" placeholder="999999999"  >
	            	</td>

	            	<td>
	            		<boton class="btn btn-info " id="btn_enviar"  onclick="grabartelefono()" ><i class="fa fa-floppy-o"></i></boton>
	            	
	            	</td>
	            	</form>
	            	</tr>
	            	
	            	<tr>
	            		<td colspan="2">
	                    	<table id="resultado1" class="table">
	                    	
		                    	<?php $t=new Telefonoempresa(); 
	    						$tel=$t->get_telefonoempresa($emp['EMP_C_CODIGO']); 
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
		                    			<input type="hidden" name="codigo" value="<?php echo $emp['EMP_C_CODIGO'];?>">
		                    			<input type="hidden" name="idtel" value="<?php echo $row1['TEL_C_CODIGO'];?>">
		                    			<input type="hidden" name="usuario" value="<?php echo $usuario['US_C_CODIGO']?>">
		                    			<boton class="btn btn-danger  btn-xs"  onclick="deletetelefono(fila1<?php echo $row1['TEL_C_CODIGO'];?>)"><i class="fa fa-trash-o"></i></boton>
		                    		</form>
		                    	</td>
		                    	</tr>
		                    	<?php } ?>
		                    	
	                    	</table>
	            		</td>
	            	</tr>
	            </table>
	        </div>
	         <div class="form-group col-md-12" >
				<label>Direccion</label>
	            <table width="100%">
	            	<tr>
	            	<td width="15%">
	            	<form id="formulario2" method="POST" name="formulario2" onsubmit="grabardireccion(); return false">
	        			<select class="form-control" name="t_direccion">
	        				<option value="0">Tipo</option>
	        				<option value="1">Fical</option>
	        				<option value="2">Ent. Factura</option>
	        				<option value="2">Ent. Revista</option>
	        				<option value="4">Otros</option>
	        			</select>
	            	</td>
	            	<td width="85%">	            	
	            		<input type="hidden" name="codigo" value="<?php echo $emp['EMP_C_CODIGO'];?>">
	            		<input type="hidden" name="usuario" value="<?php echo $usuario['US_C_CODIGO']?>">
	            		<input type="text" class="form-control"    name="direccion" id="direccion" placeholder="Direccion"  >

	            	</td>
	            	<td>
	            		<boton class="btn btn-info " id="btn_enviar"  onclick="grabardireccion()" ><i class="fa  fa-floppy-o"></i></boton>
	            	</form>
	            	
	            	</td>
	            	</tr>
	            	<tr>
	            		<td colspan="2">
	                    	
	                    	<table id="resultado2" class="table">
	                    		<?php $c=new Direccionempresa(); 

								$cor=$c->get_direccionempresa($emp['EMP_C_CODIGO']); 
								while($row3=$cor->fetch_array()){
								?>
		                    	<tr>
		                    	<td width="20%">
									<?php echo $row3['TIPO'];?></td>
								<td>
		                    	<td width="80%">
		                    		<?php echo$row3['DIRE_D_DESCRIPCION'];?></td>
		                    	<td>
		                    		<form id="fila3<?php echo $row3['DIRE_C_CODIGO'];?>" method="POST" onsubmit="deletedireccion(fila3<?php echo $row3['DIRE_C_CODIGO'];?>); return false">
		                    			<input type="hidden" name="codigo" value="<?php echo $emp['EMP_C_CODIGO'];?>">
		                    			<input type="hidden" name="iddir" value="<?php echo $row3['DIRE_C_CODIGO'];?>">
		                    			<input type="hidden" name="usuario" value="<?php echo $usuario['US_C_CODIGO']?>">
		                    			<boton class="btn btn-danger  btn-xs"  onclick="deletedireccion(fila3<?php echo $row3['DIRE_C_CODIGO'];?>)"><i class="fa fa-trash-o"></i></boton>
		                    		</form>
		                    	</td>
		                    	</tr>
		                    	<?php } ?>
		                    	
	                    	</table>
	            		</td>
	            	</tr>
	            </table>
	        </div>
		 	
        </div>
        
      </div>
      <div class="box box-warning " >
        <div class="box-header with-border">
          <?php 
            		$e=new Empresas(); 
            		$emp=$e->get_Empresasid($idempresa);
            ?>
              <h3 class="box-title"><small>Contactos de:</small> <?php echo $emp['EMP_D_NOMBRECOMERCIAL'];?>
              </h3>

          <div class="box-tools pull-right">
           	
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>

            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
              
          </div>
        </div>
        <div class="box-body">
       	<div class="box-body table-responsive no-padding">
       
        <table class="table">
        <thead>

        	<tr>
        		<th>Op</th>
        		<th>Codigo</th>
        		<th>Nombre</th>
        		<th>Direccion</th>
        		<th>Telefono</th>
        		<th>Correo</th>
        		<th colspan="2">
	       		 
	       		 </th>
	        	</tr>
        </thead>
        <tbody>
          <?php 

          $car = new Cartera();
                         $res=$car->get_contactosempresa($idempresa);
                         while($l=$res->fetch_array()){                        
                             ?>
                                 
                          <tr class="">
                          	<td><form action="../registrarContactos/" method="post">
                            		<input type="hidden" name="idcon" value="<?php echo $l['CON_C_CODIGO']; ?>">
        							<input type="hidden" name="idemp" value="<?php echo $idempresa; ?>">
        							<button class="btn btn-info btn-xs"> <i class="fa fa-edit"></i></button>
	       						</form>
	       		 			</td>
                            <td><?php echo  $l['CON_C_CODIGO'];?></td>
                            
                            <td><?php echo $l['NOMBRE'];?></td>
                            
                            <td><?php echo $l['CON_D_DIRECCION']?></td>
                            <td><?php 
                            	 $cor = new Cartera();
                            	 $core=$cor->get_telefonocontactos($l['CON_C_CODIGO']);
                            	 while($c=$core->fetch_array()){                        
                             ?>

                             <li style="list-style: none;"></small><?php echo $c['TEL_D_TELEFONO']."  -  "; ?><font size="-3" class="text-green">(<?php echo $c['TIPTEL_D_NOMBRE']; ?>)</font></li>

                            <?php } ?></td>
                            <td><?php 
                            	 $cor = new Cartera();
                            	 $core=$cor->get_correocontactos($l['CON_C_CODIGO']);
                            	 while($c=$core->fetch_array()){                        
                             ?>

                             <li style="list-style: none;"><?php echo $c['COR_D_EMAIL']; ?><small><font size="-3" class="text-green">(<?php echo $c['TIPCOR_D_NOMBRE']; ?>)</font></small></li>

                            <?php } ?></td>
                            <td><form action="../carteraEmpresas/" method="post">
                            		<input type="hidden" name="idcon" value="<?php echo $l['CON_C_CODIGO']; ?>">
        							<input type="hidden" name="idemp" value="<?php echo $idempresa; ?>">
        							
	       						</form>
	       					</td>

                           
                          </tr>
          <?php } ?> 
          </tbody>
        
		  </table>
		  </div>
		  <div class="box-tools pull-right">
           <form action="../registrarContactos/" method="post">
        		<input type="hidden" name="idemp" value="<?php echo $idempresa; ?>">
        		<button class="btn btn-info btn-xs ">Mas</button>
        		
            </form>
              
          </div>
        </div>
        
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php include_once(HTML_DIR . '/template/footer.php'); ?>
<div class="modal" id="sectorr" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Sector que falta Agregar</h4>
      </div>
      <div class="modal-body">
        <form action="../carteraEmpresas/" method="post">
           <?php 
              $cate = new Cartera();
                 $SECTOR1=$cate->get_sectorfaltaempresa($emp['EMP_C_CODIGO']);
                 while($sec=$SECTOR1->fetch_array()){  
                     ?>
                     <div class="checkbox">
                      <label>
                      <input type="checkbox" value="<?php echo $sec['PAR_C_CODIGO']?>" name="mine[]">
                       <?php echo $sec['PAR_D_NOMBRE']?></label>
                     </div>
            <?php }?>
					
      </div>
      <div class="modal-footer">
      	  <input type="hidden" name="evento" value="sector">
      	  <input type="hidden" name="idemp" value="<?php echo $emp['EMP_C_CODIGO']; ?>">
          <input type="submit"  class="btn btn-warning" value="Agregar">
      </div>
      </form>
      </div> 
    </div>
  </div>
</div>
     <!-- /.box-body -->
<div class="modal" id="tagss" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Tags</h4>
      </div>
      <div class="modal-body">
        <form action="../carteraEmpresas/" method="post">
        <table class="table">
           <?php 
		                $tag=new Tags();
		                $t=$tag->get_alltags();
                         while($cat=$t->fetch_array()){
		                 ?>
		                 <tr><td>
		                 <label><input type="checkbox" name="option[]" value="<?php echo $cat['TAG_C_CODIGO'] ?>" /><?php echo $cat['TAG_D_NOMBRE'] ?></label>
		                 </td></tr>
		                 <?php } ?>
		</table>		
      </div>
      <div class="modal-footer">
      	  
      	  <input type="hidden" name="idemp" value="<?php echo $emp['EMP_C_CODIGO']; ?>">
          <input type="submit"  class="btn btn-warning" value="Guardar">
      </div>
      </form>
      </div> 
    </div>
  </div>
</div>

<?php include_once(HTML_DIR . '/template/ajustes_generales.php'); ?>

<?php include_once(HTML_DIR . '/template/scrips.php'); ?>


<!-- Bootstrap 3.3.6 -->

<!-- DataTables -->

<script >

 $(document).ready(function() {

    setTimeout(function() {
        $("#mensage").fadeOut(1500);
    },3000);
    buscar(<?php echo $idempresa; ?>)
  });
 $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();
});

 function agregarejecutiva(formu){

if (confirm('Desea continuar?')) {
    formu.submit();
} else {
    // Do nothing!
    setTimeout(function() {
        $("#mensage").fadeOut(00);
    },00);
  // $("#ejecutiva").remove();
    location.reload();

}
   

 }

 function mostrarcombo(combo){
 	

 	 var url = "../Vistas/empresa/ejecutivas.php"; // El script a dónde se realizará la petición.
    $.ajax({
           type: "POST",
           url: url,
            // Adjuntar los campos del formulario enviado.
           
           success: function(data)
           {
               //$("#respuesta").html(data); // Mostrar la respuestas del script PHP.
                $(combo).fadeIn(000).html(data);
             	

           }
         });

		
			
		 
		
 }



function grabarcorreo(){
 if($("#email").val().indexOf('@', 0) == -1 || $("#email").val().indexOf('.', 0) == -1) {
 	$('#email').css('border-color','#FF0000');
            alert('El correo electrónico introducido no es correcto.');
            return false;
        }

 var url = "../Vistas/empresa/grabarcorreo.php"; // El script a dónde se realizará la petición.
    $.ajax({
           type: "POST",
           url: url,
           data: $("#formulario").serialize(), // Adjuntar los campos del formulario enviado.
           
           beforeSend: function(){
                        $('#resultado').html('<div  class="overlay" ><img src="../Public/img/Sistema/loading3.gif" alt="Loading..." width="25" height="25" /></div>');
            },
           success: function(data)
           {
               //$("#respuesta").html(data); // Mostrar la respuestas del script PHP.
                $('#resultado').fadeIn(1000).html(data);
              $('#email').val("");
              $('#email').css('border-color','green');

           }
         });
    return false;

    
};

function grabartelefono(){

 if ($('#phone').val().length <= 5 || isNaN($('#phone').val())) {
            $('#phone').css('border-color','#FF0000');
            alert('El número de teléfono debe tener al menos 9 números.');
            return false;
        }

 var url = "../Vistas/empresa/grabartelefono.php"; // El script a dónde se realizará la petición.
    $.ajax({
           type: "POST",
           url: url,
           data: $("#formulario1").serialize(), // Adjuntar los campos del formulario enviado.
           
           beforeSend: function(){
                        $('#resultado1').html('<div  class="overlay" ><img src="../Public/img/Sistema/loading3.gif" alt="Loading..." width="25" height="25" /></div>');
            },
           success: function(data)
           {
               //$("#respuesta").html(data); // Mostrar la respuestas del script PHP.
                $('#resultado1').fadeIn(1000).html(data);
             	$('#phone').val("");
               	$('#phone').css('border-color','green');

           }
         });
    return false;

    
};
function grabardireccion(){
	if ($('#direccion').val().length <= 3) {
            $('#direccion').css('border-color','#FF0000');
            alert('No es una direccion');
            return false;
        }

 var url = "../Vistas/empresa/grabadireccion.php"; // El script a dónde se realizará la petición.
    $.ajax({
           type: "POST",
           url: url,
           data: $("#formulario2").serialize(), // Adjuntar los campos del formulario enviado.
           
           beforeSend: function(){
                        $('#resultado2').html('<div  class="overlay" ><img src="../Public/img/Sistema/loading3.gif" alt="Loading..." width="25" height="25" /></div>');
            },
           success: function(data)
           {
               //$("#respuesta").html(data); // Mostrar la respuestas del script PHP.
                $('#resultado2').fadeIn(1000).html(data);
             	$('#direccion').val("");
             	$('#direccion').css('border-color','green');

           }
         });
    return false;

    
};

function deletedireccion(formu){
 var url = "../Vistas/empresa/deletedireccion.php"; // El script a dónde se realizará la petición.
    $.ajax({
           type: "POST",
           url: url,
           data: $(formu).serialize(), // Adjuntar los campos del formulario enviado.
           
           beforeSend: function(){
                        $('#resultado2').html('<div  class="overlay" ><img src="../Public/img/Sistema/loading3.gif" alt="Loading..." width="25" height="25" /></div>');
            },
           success: function(data)
           {
               //$("#respuesta").html(data); // Mostrar la respuestas del script PHP.
                $('#resultado2').fadeIn(1000).html(data);
             	

           }
         });
};
function deletetelefono(formu){
 var url = "../Vistas/empresa/deletetelefono.php"; // El script a dónde se realizará la petición.
    $.ajax({
           type: "POST",
           url: url,
           data: $(formu).serialize(), // Adjuntar los campos del formulario enviado.
           
           beforeSend: function(){
                        $('#resultado1').html('<div  class="overlay" ><img src="../Public/img/Sistema/loading3.gif" alt="Loading..." width="25" height="25" /></div>');
            },
           success: function(data)
           {
               //$("#respuesta").html(data); // Mostrar la respuestas del script PHP.
                $('#resultado1').fadeIn(1000).html(data);
             	

           }
         });
};
function deletecorreo(formu){
 var url = "../Vistas/empresa/deletecorreo.php"; // El script a dónde se realizará la petición.
    $.ajax({
           type: "POST",
           url: url,
           data: $(formu).serialize(), // Adjuntar los campos del formulario enviado.
           
           beforeSend: function(){
                        $('#resultado').html('<div  class="overlay" ><img src="../Public/img/Sistema/loading3.gif" alt="Loading..." width="25" height="25" /></div>');
            },
           success: function(data)
           {
               //$("#respuesta").html(data); // Mostrar la respuestas del script PHP.
                $('#resultado').fadeIn(1000).html(data);
             	

           }
         });
};
  </script>

  
<?php include_once(HTML_DIR . '/template/inferior_depues_cuerpo.php'); ?>
