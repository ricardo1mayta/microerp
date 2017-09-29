  <?php  
              require('../../config.ini.php');
              include("../../Modelo/conexion.php");
              include("../../Modelo/empresa/empresa.php") ?>
<script >
 $(document).ready(function() {
cargar_contactos();
   
  });
	function buscar(e){
		var u=67;

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


  function cargar_contactos(){
  	var url="../Vistas/ejecutivas/listarContactos.php";
 var e = $("#codigocliente").val();
 //$('table_contactos').html('');
    $.ajax({
           type: "GET",
           url: url,
           data: {e:e}, // Adjuntar los campos del formulario enviado.
                      
           success: function(data)
           {
               //$("#respuesta").html(data); // Mostrar la respuestas del script PHP.
                $('#table_contactos tbody').html(data);
            // alert(e);

           }
         });

  }

  function newcontacto()
  {
  		var url="../Vistas/ejecutivas/savecontacto.php";
 	var e = $("#codigocliente").val();
 //$('table_contactos').html('');
    $.ajax({
           type: "GET",
           url: url,
           data: {e:e}, // Adjuntar los campos del formulario enviado.
                      
           success: function(data)
           {
               //$("#respuesta").html(data); // Mostrar la respuestas del script PHP.
                $('#table_contactos tbody').html(data);
             //alert(e);

           }
         });
  }
  function newtelefono(e,c,m)
  { 
	
  	if (validanumero(e,c,m)){
		$('#newtel').modal('toggle'); 
  	var url="../Vistas/ejecutivas/savetelefono.php";
 	
 	//$('table_contactos').html('');
    $.ajax({
           type: "GET",
           url: url,
           data: $("#newtelefono").serialize(), // Adjuntar los campos del formulario enviado.
                      
           success: function(data)
           {
               //$("#respuesta").html(data); // Mostrar la respuestas del script PHP.
                //$('#table_contactos tbody').html(data);
            swal("Agregado",data, "success");
             cargar_contactos();

           }
         });
	}else{
		swal("Alerta",m, "error");
	}
  }
function edittelefono(e,c,m)
  { 
  	
	if (validanumero(e,c,m)){
		$('#edittel').modal('toggle'); 
  	var url="../Vistas/ejecutivas/updatetelefono.php";
 	
 	//$('table_contactos').html('');
    $.ajax({
           type: "GET",
           url: url,
           data: $("#editelcon").serialize(), // Adjuntar los campos del formulario enviado.
                      
           success: function(data)
           {
               //$("#respuesta").html(data); // Mostrar la respuestas del script PHP.
                //$('#table_contactos tbody').html(data);
            swal("Agregado",data, "success");
             cargar_contactos();

           }
         });
	}else{
		swal("Alerta",m, "error");
	}
  }
  function delete_telefono(t){
  	swal({
            title: "Atención!!",
            text: "Desea Eliminar?",
            type: "warning",
             confirmButtonText: "OK",
            cancelButtonText: "Cancelar",
            showCancelButton: true,
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
          },
          function(){
            setTimeout(function(){
            			var u=67;
                          var url="../Vistas/ejecutivas/deletetelefono.php";
 							 	//$('table_contactos').html('');
						    $.ajax({
						           type: "GET",
						           url: url,
						           data: {t:t,u:u}, // Adjuntar los campos del formulario enviado.
						                      
						           success: function(data)
						           {
						               //$("#respuesta").html(data); // Mostrar la respuestas del script PHP.
						                //$('#table_contactos tbody').html(data);
						            swal("Agregado",data, "success");
						             cargar_contactos();

						           }
						         });                               
                       }, 1000);
              }); 
  }
function newcorreo(e,m)
  { 
	
  	if (validacorreo(e,m)){
		$('#newcorr').modal('toggle'); 
  	var url="../Vistas/ejecutivas/savecorreo.php";
 	
 	//$('table_contactos').html('');
    $.ajax({
           type: "GET",
           url: url,
           data: $("#frmnewcorreo").serialize(), // Adjuntar los campos del formulario enviado.
                      
           success: function(data)
           {
               //$("#respuesta").html(data); // Mostrar la respuestas del script PHP.
                //$('#table_contactos tbody').html(data);
            swal("Agregado",data, "success");
             cargar_contactos();

           }
         });
	}else{
		swal("Alerta",m, "error");
	}
  }
function editcorreo(e,m)
  { 
  	
	if (validacorreo(e,m)){
		$('#editcorr').modal('toggle'); 
  	var url="../Vistas/ejecutivas/updatecorreo.php";
 	
 	//$('table_contactos').html('');
    $.ajax({
           type: "GET",
           url: url,
           data: $("#formedicorreo").serialize(), // Adjuntar los campos del formulario enviado.
                      
           success: function(data)
           {
               //$("#respuesta").html(data); // Mostrar la respuestas del script PHP.
                //$('#table_contactos tbody').html(data);
            swal("Agregado",data, "success");
             cargar_contactos();

           }
         });
	}else{
		swal("Alerta",m, "error");
	}
  }
  function delete_correo(t){

  	swal({
            title: "Atención!!",
            text: "Desea Eliminar?",
            type: "warning",
             confirmButtonText: "OK",
            cancelButtonText: "Cancelar",
            showCancelButton: true,
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
          },
          function(){
            setTimeout(function(){
            			var u=67;
                          var url="../Vistas/ejecutivas/deletecorreo.php";
 							 	//$('table_contactos').html('');
						    $.ajax({
						           type: "GET",
						           url: url,
						           data: {c:t,u:u}, // Adjuntar los campos del formulario enviado.
						                      
						           success: function(data)
						           {
						               //$("#respuesta").html(data); // Mostrar la respuestas del script PHP.
						                //$('#table_contactos tbody').html(data);
						            swal("Agregado",data, "success");
						             cargar_contactos();

						           }
						         });                               
                       }, 1000);
              }); 
  }
function savecontactoss(){
		var u=67;
          var url="../Vistas/ejecutivas/savecontacto.php";
				 	//$('table_contactos').html('');
		    $.ajax({
		           type: "GET",
		           url: url,
		           data:$("#frmcontactos").serialize() , // Adjuntar los campos del formulario enviado.
		                      
		           success: function(data)
		           {
		               //$("#respuesta").html(data); // Mostrar la respuestas del script PHP.
		                //$('#table_contactos tbody').html(data);
		                $('#addcontactos').modal('toggle'); 
		                cargar_contactos();
		            swal("Agregado",data, "success");
		             

		           }
		         });                               
      
}
function updatecontactoss(){
		var u=67;
          var url="../Vistas/ejecutivas/updatecontacto.php";
				 	//$('table_contactos').html('');
		    $.ajax({
		           type: "GET",
		           url: url,
		           data:$("#frmeditacontactos").serialize() , // Adjuntar los campos del formulario enviado.
		                      
		           success: function(data)
		           {
		               //$("#respuesta").html(data); // Mostrar la respuestas del script PHP.
		                //$('#table_contactos tbody').html(data);
		                $('#editcontactos').modal('toggle'); 
		                cargar_contactos();
		            swal("Actaualizado",data, "success");
		             

		           }
		         });                               
      
}
function deletecontactoss(c){
	swal({
            title: "Atención!!",
            text: "Desea Eliminar?",
            type: "warning",
             confirmButtonText: "OK",
            cancelButtonText: "Cancelar",
            showCancelButton: true,
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
          },
          function(){
            setTimeout(function(){
            			var u=67;
			          var url="../Vistas/ejecutivas/deletecontacto.php";
							 	//$('table_contactos').html('');
					    $.ajax({
					           type: "GET",
					           url: url,
					           data:{c:c,u:u} , // Adjuntar los campos del formulario enviado.
					                      
					           success: function(data)
					           {             
					                cargar_contactos();
					            swal("Eliminado",data, "success");
					             

					           }
					         });                             
                       }, 1000);
              }); 



		                             
      
}
function estados(p)
{
var e =$(p).val();
alert(e);
 var url="../Vistas/ejecutivas/estados.php";
 $("#estados").html('');
                
              $.ajax({
                     type: "GET",
                     url: url,
                     data:{p:e} , // Adjuntar los campos del formulario enviado.
                                
                     success: function(data)
                     {             
                          
                      $("#estados").html(data);
                       

                     }
                   });           

}
function provincia(p)
{
var e =$(p).val();
alert(e);
 var url="../Vistas/ejecutivas/provincia.php";
 $("#provincia").html('');
                
              $.ajax({
                     type: "GET",
                     url: url,
                     data:{p:e} , // Adjuntar los campos del formulario enviado.
                                
                     success: function(data)
                     {             
                          
                      $("#provincia").html(data);
                       

                     }
                   });           

}
</script>


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <?php  if(isset($sms)){ echo $sms; }?>
     <h1>Modulo Ventas</h1> 
     <input type="hidden" id="usco" value="<?=$user['US_C_CODIGO'] ?>">
    </section>

    <!-- Main content -->
    <section class="content">
    	<div class="row">
    	
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">INFORMACIÓN GENERAL</a></li>
              <li><a href="#tab_2" data-toggle="tab">INFORMACIÓN ADICIONAL</a></li>
              <li><a href="#tab_3" data-toggle="tab">CONTACTOS</a></li>
              <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                	<div class="box box-warning">
				        <div class="box-header with-border">
				          <?php 
				          if(isset($_POST['codigo'])){ $idempresa=$_POST['codigo']; }else{$idempresa=3151;}
				          	
				            		$e=new Empresas(); 
				            		$emp=$e->get_Empresasid($idempresa);
				            ?>
				            <input type="hidden" id="codigocliente" value="<?php echo $idempresa; ?>">
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
				      	 <form action="../detalleEmpresas/" method="POST">
				          <div class="col-md-6"> 
				          
							<div class="form-group ">
					            <label>RUC</label>
					            <input type="text" class="form-control input-sm"   value="<?php echo $emp['EMP_C_RUC'];?>" disabled>
					            <input type="hidden" class="form-control input-sm"  id="rucemp" name="rucemp" value="<?php echo $emp['EMP_C_RUC'];?>" placeholder="Ruc"  >
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

					            <label>Opcion de solicitud</label>
					            <select class="form-control" name="estado">
					            	<option value="<?php echo $emp['EMP_E_ESTADO'];?>"><?php echo $emp['ESTADO'];?></option>
					            	
					            	
					            	<option value="5">Baja</option>
					            </select>
					        </div>

					        <div class="form-group ">
					            <input type="hidden" name="evento" value="actualizar">
					            <input type="hidden" name="idemp" value="<?php echo $idempresa; ?>">
						           	 <button class="btn btn-info">Actualizar</button>
						    </div>
						  </form>
						</div> 
						      
					  <div class="col-md-6">
						<h3> Sectores</h3>
						<div class="col-md-6 col-sm-6 col-xs-12">
				          <div class="info-box">
				            <span class="info-box-icon bg-blue"><i class="">Min</i></span>

				            <div class="info-box-content">
				            <?php 
				          		$ejc=new Moduloejecutivas();
				          		$ej=$ejc->get_sectoresejecutivas($idempresa,36);
				          		
				          		while($row=$ej->fetch_array()){ ?>
				          			<span class="info-box-text"><?php echo $row['PAR_D_NOMBRE']; ?></span><br>
				          		<?php }	 ?>
				              
				            </div>
				            <!-- /.info-box-content -->
				          </div>
				          <!-- /.info-box -->
				        </div>
				        <div class="col-md-6 col-sm-6 col-xs-12">
				          <div class="info-box">
				            <span class="info-box-icon bg-green"><i class="">Con</i></span>

				            <div class="info-box-content">
				            <?php 
				          		$ejc=new Moduloejecutivas();
				          		$ej=$ejc->get_sectoresejecutivas($idempresa,39);
				          		
				          		while($row=$ej->fetch_array()){ ?>
				          			<span class="info-box-text"><?php echo $row['PAR_D_NOMBRE']; ?></span><br>
				          		<?php }	 ?>
				              
				            </div>
				            <!-- /.info-box-content -->
				          </div>
				          <!-- /.info-box -->
				        </div>
		          		<div class="form-group  "> 
		                	<div class="form-group">
						   	 <label>Tags</label>
						   	</div>
						   	
							<div class="col-md-12">
								<div class="form-group">
								<input type="text" name="text" id="text" class="form-control" onkeyup="buscar(<?php echo $idempresa; ?>)">
								</div>
							</div>
							<div class="form-group" id="tag">
							
							</div>
		                </div>
				               
				      </div>
				    </div>
				          
				        
				 </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
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
                <div class="form-group col-md-12">
                <div id="pais" class=" col-md-4">
                  <select onchange="estados(this)">

                    <option>Pais</option>
                    <?php $cp=new Contactos(); 

                      $cor=$cp->get_pais(); 
                      while($row3=$cor->fetch_array()){

                        ?>
                        <option value="<?=$row3[0]?>"><?=$row3[1]?></option>  
                        <?php } ?>
                    </select>
                  </div>
                  <div id="estados" class=" col-md-4">
                    
                  </div>
                  <div id="provincia" class=" col-md-4">
                    
                  </div>
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
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
               	<div class="box box-warning " >
			        <div class="box-header with-border">
			          <?php 
			            		$e=new Empresas(); 
			            		$emp=$e->get_Empresasid($idempresa);
			            ?>
			              <h3 class="box-title"><small>Contactos de:</small> <?php echo $emp['EMP_D_NOMBRECOMERCIAL'];?>
			              </h3>

			          <div class="box-tools pull-right">
			            <input class="btn btn-info btn-xs " type="submit" value="Mas" data-toggle="modal" data-target="#addcontactos"  />   
			          </div>
			        </div>
			        <div class="box-body">
				       	<div class="box-body table-responsive no-padding">
				       
				        <table class="table" id="table_contactos" >
				        <thead>

				        	<tr>
				        		<th colspan="2">Op</th>
				        		<th>Codigo</th>
				        		<th>Nombre</th>
				        		<th>Direccion</th>
				        		<th>Tipo Contacto</th>
				        		<th>Telefono</th>
				        		<th>Correo</th>
				        		<th colspan="2">
					       		 
					       		 </th>
					        	</tr>
				        </thead>
				        <tbody>
				        
				          </tbody>
				        
						  </table>
						  </div>
					  <div class=" pull-right">
			                  		<input type="hidden" name="idemp" value="<?php echo $idempresa; ?>">
			        		
			        		
			          
			              
			          </div>
			        </div>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->
       </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php include_once(HTML_DIR . '/template/footer.php'); ?>
<div class="modal" id="addcontactos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-blue">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Agregar Nuevo Contacto</h4>
      </div>
      <div class="modal-body">
        
        <form class="form-horizontal" id="frmcontactos">
         	<div class="form-group">
			    <label  class="col-lg-2 control-label">Nombres *</label>
			    <div class="col-lg-10">
			      <input type="text" name="nombre"  class="form-control">
			    </div>
			</div>
			<div class="form-group">
			    <label  class="col-lg-2 control-label">Apellidos *</label>
			    <div class="col-lg-10">
			      <input type="text" name="apellidos" class="form-control">
			    </div>
			</div>
			<div class="form-group">
			    <label  class="col-lg-2 control-label">Cargo *</label>
			    <div class="col-lg-10">
			      <select class="form-control" name="cargo">

	                <?php
	                $cargo=new contactos();
	                $cargos=$cargo->get_cargosContacto();
	                while($fila=$cargos->fetch_array()){
	                
	                ?>
	                	<option value="<?=$fila["CAR_C_CODIGO"];?>">
	                	<?=$fila["CAR_D_NOMBRE"];?>
	                	</option>
	                <?php } ?>	
	                </select>
			    </div>
			</div>	
			<div class="form-group">
			    <label  class="col-lg-2 control-label">Dirección *</label>
			    <div class="col-lg-10">
			      <input type="text" name="direccion" class="form-control" >
			    </div>
			</div>			
      </div>
      <div class="modal-footer">
      	  <input type="hidden" name="u" value="<?=$user['US_C_CODIGO'] ?>">
      	  <input type="hidden" name="idemp" value="<?php echo $emp['EMP_C_CODIGO']; ?>">
          <input type="submit"  class="btn btn-warning" onclick="savecontactoss(); return false;" value="Agregar">
      </div>
      </form>
      </div> 
    </div>
  </div>
</div>
<div class="modal" id="editcontactos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-blue">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Editar Contacto</h4>
      </div>
      <div class="modal-body">
        
        <form class="form-horizontal" id="frmeditacontactos">
         	<div class="form-group">
			    <label  class="col-lg-2 control-label">Nombres *</label>
			    <div class="col-lg-10">
			      <input type="text" name="nombre"  class="form-control" >
			    </div>
			</div>
			<div class="form-group">
			    <label  class="col-lg-2 control-label">Apellidos *</label>
			    <div class="col-lg-10">
			      <input type="text" name="apellidos" class="form-control" >
			    </div>
			</div>
			<div class="form-group">
			    <label  class="col-lg-2 control-label">Cargo *</label>
			    <div class="col-lg-10">
			      <select class="form-control" name="cargo">

	                <?php
	                $cargo=new contactos();
	                $cargos=$cargo->get_cargosContacto();
	                while($fila=$cargos->fetch_array()){
	                
	                ?>
	                	<option value="<?=$fila["CAR_C_CODIGO"];?>">
	                	<?=$fila["CAR_D_NOMBRE"];?>
	                	</option>
	                <?php } ?>	
	                </select>
			    </div>
			</div>	
			<div class="form-group">
			    <label  class="col-lg-2 control-label">Dirección *</label>
			    <div class="col-lg-10">
			      <input type="text" name="direccion" class="form-control"  >
			    </div>
			</div>	
			
      </div>
      <div class="modal-footer">
      	  <input type="hidden" name="u" value="<?=$user['US_C_CODIGO'] ?>">
      	  <input type="hidden" name="idcon" value="">

          <input type="submit"  class="btn btn-warning" value="Actualizar" onclick="updatecontactoss(); return false;">
      </div>
      </form>
      </div> 
    </div>
  </div>
</div>
<div class="modal" id="newtel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-blue">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Nuevo Telefono</h4>
      </div>
      <div class="modal-body">
        
        <form class="form-horizontal" id="newtelefono" >
        <div class="form-group">
		    <label  class="col-lg-2 control-label">Tipo *</label>
		    <div class="col-lg-10">
		      <select class="form-control" name="cbx_tipotel">

                <?php
                $tt=new Contactos();
                $cargos=$tt->get_tipotelefono();
                while($fila=$cargos->fetch_array()){
                
                ?>
                	<option value="<?=$fila[0]?>">
                	<?=$fila[1]?>
                	</option>
                <?php } ?>	
                </select>
		    </div>
			</div>	
         	<div class="form-group">
			    <label  class="col-lg-2 control-label">Telefono *</label>
			    <div class="col-lg-10">
			      <input type="text" name="txt_telefono" id="txt_telefono"  class="form-control">
			    </div>
			</div>
      </div>
      <div class="modal-footer">
      	  <input type="hidden" name="idcon" value="">
      	  <input type="hidden" name="u" value="<?=$user['US_C_CODIGO'] ?>">
          <input type="submit"  class="btn btn-warning" onclick="newtelefono('txt_telefono',5,'Minimo 5 numeros'); return false;"  value="Agregar">
      </div>
      </form>
      </div> 
    </div>
  </div>
</div>
<div class="modal" id="edittel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-blue">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Editar Telefono</h4>
      </div>
      <div class="modal-body">
        
        <form class="form-horizontal" id="editelcon">
        <div class="form-group">
		    <label  class="col-lg-2 control-label">Tipo *</label>
		    <div class="col-lg-10">
		      <select class="form-control" name="tipotel">

                <?php
                $tt=new Contactos();
                $cargos=$tt->get_tipotelefono();
                while($fila=$cargos->fetch_array()){
                
                ?>
                	<option value="<?=$fila[0]?>">
                	<?=$fila[1]?>
                	</option>
                <?php } ?>	
                </select>
		    </div>
			</div>	
         	<div class="form-group">
			    <label  class="col-lg-2 control-label">Telefono *</label>
			    <div class="col-lg-10">
			      <input type="text" name="txt_tel" id="txt_tel"    class="form-control">
			    </div>
			</div>
		
			
				
			
      </div>
      <div class="modal-footer">
      	  <input type="hidden" name="u" value="<?=$user['US_C_CODIGO'] ?>">
      	  <input type="hidden" name="idtel" value="">
          <input type="submit"  class="btn btn-warning" onclick="edittelefono('txt_tel',5,'Minimo 5 numeros'); return false;"   value="Actulizar">
      </div>
      </form>
      </div> 
    </div>
  </div>
</div>

<div class="modal" id="newcorr" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-blue">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Nuevo Correo</h4>
      </div>
      <div class="modal-body">
        
        <form class="form-horizontal" id="frmnewcorreo">
        <div class="form-group">
		    <label  class="col-lg-2 control-label">Tipo *</label>
		    <div class="col-lg-10">
		      <select class="form-control" name="tipocorr">

                <?php
                $tt=new Contactos();
                $cargos=$tt->get_tipocorreo();
                while($fila=$cargos->fetch_array()){
                ?>
                	<option value="<?=$fila[0]?>">
                	<?=$fila[1]?>
                	</option>
                <?php } ?>	
                </select>
		    </div>
			</div>	
         	<div class="form-group">
			    <label  class="col-lg-2 control-label">Telefono *</label>
			    <div class="col-lg-10">
			      <input type="text" name="txt_corr" id="txt_corr1"   class="form-control">
			    </div>
			</div>
		
			
				
			
      </div>
      <div class="modal-footer">
      	  <input type="hidden" name="u" value="<?=$user['US_C_CODIGO'] ?>">
      	  <input type="hidden" name="idcon" value="">
          <input type="submit"  class="btn btn-warning" onclick="newcorreo('txt_corr1','El correo no existe'); return false;" value="Agregar">
      </div>
      </form>
     </div> 
    </div>
  </div>
</div>
<div class="modal" id="editcorr" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-blue">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Editar Correo</h4>
      </div>
      <div class="modal-body">
        
        <form class="form-horizontal" id="formedicorreo">
        <div class="form-group">
		    <label  class="col-lg-2 control-label">Tipo *</label>
		    <div class="col-lg-10">
		      <select class="form-control" name="tipocor">

                <?php
                $tt=new Contactos();
                $cargos=$tt->get_tipocorreo();
                while($fila=$cargos->fetch_array()){
                
                ?>
                	<option value="<?=$fila[0]?>">
                	<?=$fila[1]?>
                	</option>
                <?php } ?>	
                </select>
		    </div>
			</div>	
         	<div class="form-group">
			    <label  class="col-lg-2 control-label">Correo *</label>
			    <div class="col-lg-10">
			      <input type="text" name="txt_corr" id="txt_corr"  class="form-control">
			    </div>
			</div>
      </div>
      <div class="modal-footer">
      	  <input type="hidden" name="idcor" >
      	  <input type="hidden" name="idcon" >
      	  <input type="hidden" name="u" value="<?=$user['US_C_CODIGO'] ?>" >
          <input type="submit"  class="btn btn-warning" value="Actulizar" onclick="editcorreo('txt_corr','El correo no existe'); return false;">
      </div>
      </form>
      </div> 
    </div>
  </div>
</div>

     <!-- /.box-body -->



<!-- Bootstrap 3.3.6 -->

<!-- DataTables -->

<script >
 $(document).ready(function() {
    setTimeout(function() {
        $("#mensage").fadeOut(1500);
    },8000);
  });
function validacorreo(e,m){
	if($('#'+e).val().indexOf('@', 0) == -1 || $('#'+e).val().indexOf('.', 0) == -1) {
 	$('#'+e).css('border-color','#FF0000');
           
            return false;
        }
         else{
        	 $('#'+e).css('border-color','green');
        	return true;
        }
}

function validanumero(e,c,m){
	if ($('#'+e).val().length <= c || isNaN($('#'+e).val())) {
            $('#'+e).css('border-color','#FF0000');
            
            return false;
        }
        else{
        	 $('#'+e).css('border-color','green');
        	return true;
        }
}


function tipocontacto(k,c){
	
	if(k.checked == true){
	
	var url = "../Vistas/contactos/tipocontacto.php";
	var u=$("#usco").val();
	var t=$(k).val();
	$.ajax({
           type: "GET",
           url: url,
           data: {u: u, c: c,e: 1,t: t}, // Adjuntar los campos del formulario enviado.
                      
           success: function(data)
           {
             
              swal("Activado",data, "success");

           }
         });
	         
		
	} else{
		var e=1;
	var url = "../Vistas/contactos/tipocontacto.php";
	var u=$("#usco").val();
	var t=$(k).val();
	$.ajax({
           type: "GET",
           url: url,
           data: {u: u, c: c,e: 0,t: t}, // Adjuntar los campos del formulario enviado.
                      
           success: function(data)
           {
             
             swal("Desactivado", data, "success");

           }
         });
		
	}

}
 $('#newcorr').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var con = button.data('con') 
  
  var modal = $(this)
   modal.find('input[name="txt_corr"]').val('') 
  modal.find('input[name="idcon"]').val(con)  
});

$('#editcorr').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var idcor = button.data('idcor')
  var corr = button.data('corr')
  var con = button.data('con') 
  var tcor= button.data('tcor')
  
  var modal = $(this)
  modal.find('.modal-title').text('Editar a: ' + corr)
  modal.find('input[name="idcor"]').val(idcor)
  modal.find('input[name="idcon"]').val(con)
  modal.find('input[name="txt_corr"]').val(corr)
  
  modal.find('select[name="tipocor"]').val(tcor)
  
});
 $('#newtel').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var con = button.data('con') 
  
  var modal = $(this)
   modal.find('input[name="txt_telefono"]').val('') 
  modal.find('input[name="idcon"]').val(con)  
});

 $('#edittel').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var idtel = button.data('idtel')
  var ntel = button.data('ntel')
  var con = button.data('con') 
  var ttel= button.data('ttel')
  
  var modal = $(this)
  modal.find('.modal-title').text('Editar a: ' + ntel)
  modal.find('input[name="idtel"]').val(idtel)
  modal.find('input[name="con_tel"]').val(con)
  modal.find('input[name="txt_tel"]').val(ntel)
  
  modal.find('select[name="tipotel"]').val(ttel)
  
});

  $('#editcontactos').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id')
  var dir = button.data('dir')
  var nombre = button.data('nom') 
  var apell= button.data('apell')
  var cargo= button.data('cargo') 
  
  var modal = $(this)
  modal.find('.modal-title').text('Editar a: ' + nombre)
  modal.find('input[name="idcon"]').val(id)
  modal.find('input[name="direccion"]').val(dir)
  modal.find('input[name="nombre"]').val(nombre)
  modal.find('input[name="apellidos"]').val(apell)
  modal.find('select[name="cargo"]').val(cargo)
  
});




 var n=0;
 var n1=0;





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

  

