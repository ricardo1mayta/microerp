<?php include_once(HTML_DIR . '/template/titulo.php'); ?>
<?php include_once(HTML_DIR . '/template/links.php'); ?>
<?php include_once(HTML_DIR . '/template/css_calendar.php'); ?>
<?php 
	 $pro = new Agenda();              
	 	$events = array();
	 	
		 $categoria=$pro->get_allagendaus($usuario['US_C_CODIGO']);
	 	    while($row=$categoria->fetch_array())
	          {
	          	$cadena=$row['AGE_D_DETALLE'];
	          	$buscar=array(chr(13).chr(10), "\r\n", "\n", "\r");
				$reemplazar=array(" ", " ", " ", " ");
				$det=str_ireplace($buscar,$reemplazar,$cadena);
	          	//$det=eregi_replace("[\n|\r|\n\r|\t|\0|\x0B]", "",$cadena);
	          $events[] = array('id'=> $row['AGE_C_CODIGO'],'title'=> $row['AGE_DESCRIPCION'],'start'=> $row['AGE_F_FECHAINICIO'],'end'=> $row['AGE_F_FECHAFIN'],'color'=>$row['AGE_C_COLOR'],'description'=>$det,'contacto'=>$row['CONTACTO'],'tipo'=>$row['TIP_D_NOMBRE']); 
	           
	          }

 ?>
<script >
$(document).ready(function(){
  //var us=$("#idusu").val();
      setTimeout(function() {
        $("#mensage").fadeOut(1500);
    },3000);

  buscar(2);

});

function buscar(u){

  var buscar=$("#search").val();
  var url="../Vistas/agenda/empresasUsuarios.php";
 var u=<?=$usuario['US_C_CODIGO']?>;
  $('#resultado').html('<div  class="overlay" ><img src="../Public/img/Sistema/loading3.gif" alt="Loading..." width="25" height="25" />hola</div>')
    $.ajax({
           type: "GET",
           url: url,
           data: {u: u,txt: buscar}, // Adjuntar los campos del formulario enviado.
                      
           success: function(data)
           {
               //$("#respuesta").html(data); // Mostrar la respuestas del script PHP.
                $('#resultado').html(data);
              $("#resultado").show();

           }
         });
  }
  function link(c,n){
  $("#codigo").val(c);
  $("#resultado").hide();
  $("#search").val(n);
 
  contactos(c);


  }
 function contactos(c){
	
	 var url="../Vistas/agenda/contactosEmpresa.php";
 
    $.ajax({
           type: "GET",
           url: url,
           data: {codigo: c}, // Adjuntar los campos del formulario enviado.
                      
           success: function(data)
           {
               //$("#respuesta").html(data); // Mostrar la respuestas del script PHP.
                $('#contact').html(data);
            

           }
         });

  }

function rep(){
	$("#ico").hide();
	$("#rep").show();
}
</script>

<?php include_once(HTML_DIR . '/template/header_menu.php'); ?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <?php  if(isset($sms)){ echo $sms; }?>
      <h1>
       Agenda
        <small></small>
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> CRM</a></li>
        <li class="active">Calendario</li>
        <a href="../Vistas/agenda/ical.php?date=20120302&amp;startTime=1300&amp;endTime=1400&amp;subject=Meeting&amp;desc=Meeting to discuss processes.">Add Appointment to your Outlook Calendar</a>
      </ol>
    </section>
    <section class="content">

      <div class="row">
        <div class="col-md-3">
                      
          <div class="box box-default ">
            <div class="box-header with-border">
              <h3 class="box-title">Eventos Pasados</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php $a=new Agenda();
            	$i=0;
            	$ag=$a->get_allsinfinalizar($usuario['US_C_CODIGO']); 
					while($row=$ag->fetch_array())
          		{
          			$i++;
            	?>
            	<form action="../listarAgenda/" method="POST" id="search-form<?=$i?>"> 
              	<div  onClick="document.forms['search-form<?=$i?>'].submit();" class="external-event" style="background-color:<?php echo $row['AGE_C_COLOR'];?>;color:white; "><?php echo $row['AGE_DESCRIPCION']." - ".$row['AGE_F_FECHAFIN'];?>
                     <input type="hidden" name="codigo" value="<?=$row['EMP_C_CODIGO']?>">
			        
		         </form>
		         </div>
                <?php } ?>
                
            </div>
            <!-- /.box-body -->
          </div>
          <div class="box box-default ">
            <div class="box-header with-border">
              <h3 class="box-title">Eventos Programados</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php $a=new Agenda();

            	$ag=$a->get_programados($usuario['US_C_CODIGO']); 
					while($row=$ag->fetch_array())
          		{
            	?>
            	<form action="../listarAgenda/" method="POST" id="form<?=$i?>">
              	<div onClick="document.forms['form<?=$i?>'].submit();" class="external-event" style="background-color:<?php echo $row['AGE_C_COLOR'];?>;color:white; "><?php echo $row['AGE_DESCRIPCION']." - ".$row['AGE_F_FECHAFIN'];?></div>
              		<input type="hidden" name="codigo" value="<?=$row['EMP_C_CODIGO']?>">
			        
		         </form>
                <?php } ?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
         </div>          
         <div class="col-md-9">
	          <div class="box box-primary">
	            <div class="box-body no-padding">
	              <!-- THE CALENDAR -->
	            <div id="calendar"></div>
	            </div>
	            <!-- /.box-body -->
	          </div>
          <!-- /. box -->
          
        	</div>
        <!-- /.col -->
      	</div>

      
      <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
	<div class="modal-content">
	<form class="form-horizontal" method="POST" action="../agendaEjecutiva/">
	
	  <div class="modal-header bg-aqua">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="myModalLabel">Agregar Eventos</h4>
	  </div>
	  <div class="modal-body">
		  		<div class="input-group">
	                <input id="search" type="text" class="form-control" placeholder="Buscar Empresa" onkeydown="buscar(2)">

	                <div class="input-group-btn">
	                  <button  type="button" class="btn btn-primary btn-flat"><i class="fa fa-search" onclick="buscar(2)"></i></button>
	                </div>
	                
	                <!-- /btn-group -->
              	</div>
              	<div id="resultado" class="form-group col-sm-12">hola mundo</div>
              	<div class="form-group"><input  id="codigo" name="codigo" type="hidden"></div>
              	<div class="form-group">
                  <label class="col-sm-2 control-label">Contactos</label>
                   <div class="col-sm-10">
                  <select class="form-control" id="contact" name="contacto">
                   
                  </select>
                </div>
             </div>
             
             <div class="form-group">
                  <label class="col-sm-2 control-label">Productos</label>
                  <div class="col-sm-10">
                  <select class="form-control"  name="prod">
                   <option >Seleccionar</option>
                      <?php 
	                        $id=$_GET['id'];
	                        $cate = new Productos();
	                        $categoria=$cate->get_allProductos();
	                         while($cat=$categoria->fetch_array()){   
	                             ?>
	                              <option value="<?php echo $cat['PRO_C_CODIGO']?>"><?php echo $cat['PRO_D_NOMBRE']?></option>
	                                             
	                          <?php }?>

                  </select>
                </div>
            </div>
            <div class="form-group">
                  <label class="col-sm-2 control-label">Tipo</label>
                  <div class="col-sm-10">
                  <select class="form-control"  name="tipo">
                  	<option >Seleccionar</option>
                     <?php 
	                        $id=$_GET['id'];
	                        $cate = new Tipoagenda();
	                        $categoria=$cate->get_all();
	                         while($cat=$categoria->fetch_array()){   
	                             ?>
	                              <option value="<?php echo $cat['TIP_C_CODIGO']?>"><?php echo $cat['TIP_D_NOMBRE']?></option>
	                                             
	                          <?php }?>

                  </select>
                </div>
            </div>
		   <div class="form-group">
			<label for="title" class="col-sm-2 control-label">Descripcion:</label>
			<div class="col-sm-10">
			<textarea name="detalle" id="detalle" class="form-control" rows="5" cols="80" placeholder="Agrega Aqui el detalle del Evento"></textarea>
			  
			</div>
	  </div>
		  <div class="form-group">
			<label for="color" class="col-sm-2 control-label">Color</label>
			<div class="col-sm-10">
			  <select name="color" class="form-control" id="color">
				  <option value="">Choose</option>
				  <option style="color:#0071c5;" value="#0071c5">&#9724; Prioridad Muy Baja</option>
				  <option style="color:#40E0D0;" value="#40E0D0">&#9724; Prioridad Nula</option>
				  <option style="color:#008000;" value="#008000">&#9724; Prioridad Baja</option>						  
				  <option style="color:#FFD700;" value="#FFD700">&#9724; Prioridad Media </option>
				  <option style="color:#FF8C00;" value="#FF8C00">&#9724; Prioridad Media alta</option>
				  <option style="color:#FF0000;" value="#FF0000">&#9724; Prioridad muy ALta</option>
				  <option style="color:#000;" value="#000">&#9724; Sin Prioridad</option>
				  
				</select>
			</div>
		  </div>
		  <div class="form-group">
			<label for="start" class="col-sm-2 control-label">Inicio</label>
			<div class="col-sm-6">
			  <input type="text" name="start" class="form-control" id="start" readonly>
			</div>
			<div class="col-sm-4">
			  <select name="hini" class="form-control">
			  	<option value="09:00:00">09:00 AM</option>
			  	<option value="09:30:00">09:30 AM</option>
			  	<option value="10:00:00">10:00 AM</option>
			  	<option value="10:30:00">10:30 AM</option>
			  	<option value="11:00:00">11:00 AM</option>
			  	<option value="11:30:00">11:30 AM</option>
			  	<option value="12:00:00">12:00 AM</option>
			  	<option value="12:30:00">12:30 AM</option>
			  	<option value="13:00:00">01:00 PM</option>
			  	<option value="13:30:00">01:30 PM</option>
			  	<option value="14:00:00">02:00 PM</option>
			  	<option value="14:30:00">02:30 PM</option>
			  	<option value="15:00:00">03:00 PM</option>
			  	<option value="15:30:00">03:30 PM</option>
			  	<option value="16:00:00">04:00 PM</option>
			  	<option value="16:30:00">04:30 PM</option>
			  	<option value="17:00:00">05:00 PM</option>
			  	<option value="17:30:00">05:30 PM</option>
			  	
			  </select>
			</div>
		  </div>
		  <div class="form-group">
			<label for="end" class="col-sm-2 control-label">Fin</label>
			<div class="col-sm-6">
			  <input type="date" name="end" class="form-control" id="end" >
			</div>
			<div class="col-sm-4">
			  <select name="hfin" class="form-control">
			  	<option value="09:30:00">09:30 AM</option>
			  	<option value="10:00:00">10:00 AM</option>
			  	<option value="10:30:00">10:30 AM</option>
			  	<option value="11:00:00">11:00 AM</option>
			  	<option value="11:30:00">11:30 AM</option>
			  	<option value="12:00:00">12:00 AM</option>
			  	<option value="12:30:00">12:30 AM</option>
			  	<option value="13:00:00">01:00 PM</option>
			  	<option value="13:30:00">01:30 PM</option>
			  	<option value="14:00:00">02:00 PM</option>
			  	<option value="14:30:00">02:30 PM</option>
			  	<option value="15:00:00">03:00 PM</option>
			  	<option value="15:30:00">03:30 PM</option>
			  	<option value="16:00:00">04:00 PM</option>
			  	<option value="16:30:00">04:30 PM</option>
			  	<option value="17:00:00">05:00 PM</option>
			  	<option value="17:30:00">05:30 PM</option>
			  	<option value="18:00:00">06:00 PM</option>
			  </select>
			</div>

		  </div>
		
	  </div>
	  <div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		<input type="submit" class="btn btn-primary" name="evento" value="Agregar"> 
	  </div>
	</form>
	</div>
  </div>
</div><!-- Modal -->
<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<form class="form-horizontal" method="POST" action="../agendaEjecutiva/">
  <div class="modal-header bg-gray">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h4 class="modal-title" id="myModalLabel">Seguiemiento de Cliente</h4>
  </div>
  <div class="modal-body">
	
	  <div class="form-group">
		<label  class="col-sm-2 control-label">Nombre:</label>
		<div class="col-sm-10">
		<label id="title" class=" control-label"></label>
		 
		</div>
	  </div>
	  <div class="form-group">
		<label  class="col-sm-2 control-label">Contacto:</label>
		<div class="col-sm-10">
			<label id="contact" class="control-label"></label>
		</div>
	  </div>
	  <div class="form-group">
		<label for="title" class="col-sm-2 control-label">Descripcion:</label>
		<div class="col-sm-10">
		<textarea name="detalle" id="detalle" class="form-control" rows="5" cols="80" placeholder="Agrega Aqui el detalle del Evento"></textarea>
		  
		</div>
	  </div>
	  
	  <div class="form-group">
		<label for="start" class="col-sm-2 control-label">Inicio:</label>
		<div class="col-sm-6">
		  <input type="date" name="start" class="form-control" id="start" >
		</div>
		<div class="col-sm-4">
		  <select name="hstart" id="hstart" class="form-control">
		  	<option value="09:00:00">09:00 AM</option>
		  	<option value="09:30:00">09:30 AM</option>
		  	<option value="10:00:00">10:00 AM</option>
		  	<option value="10:30:00">10:30 AM</option>
		  	<option value="11:00:00">11:00 AM</option>
		  	<option value="11:30:00">11:30 AM</option>
		  	<option value="12:00:00">12:00 AM</option>
		  	<option value="12:30:00">12:30 AM</option>
		  	<option value="13:00:00">01:00 PM</option>
		  	<option value="13:30:00">01:30 PM</option>
		  	<option value="14:00:00">02:00 PM</option>
		  	<option value="14:30:00">02:30 PM</option>
		  	<option value="15:00:00">03:00 PM</option>
		  	<option value="15:30:00">03:30 PM</option>
		  	<option value="16:00:00">04:00 PM</option>
		  	<option value="16:30:00">04:30 PM</option>
		  	<option value="17:00:00">05:00 PM</option>
		  	<option value="17:30:00">05:30 PM</option>
		  	
		  </select>
		</div>
	  </div>
	  <div class="form-group">
		<label for="end" class="col-sm-2 control-label">Fin:</label>
		<div class="col-sm-6">
		  <input type="date" name="end" class="form-control" id="end" >
		</div>
		<div class="col-sm-4">
		  <select name="hend" id="hend" class="form-control">
		  	<option value="09:30:00">09:30 AM</option>
		  	<option value="10:00:00">10:00 AM</option>
		  	<option value="10:30:00">10:30 AM</option>
		  	<option value="11:00:00">11:00 AM</option>
		  	<option value="11:30:00">11:30 AM</option>
		  	<option value="12:00:00">12:00 AM</option>
		  	<option value="12:30:00">12:30 AM</option>
		  	<option value="13:00:00">01:00 PM</option>
		  	<option value="13:30:00">01:30 PM</option>
		  	<option value="14:00:00">02:00 PM</option>
		  	<option value="14:30:00">02:30 PM</option>
		  	<option value="15:00:00">03:00 PM</option>
		  	<option value="15:30:00">03:30 PM</option>
		  	<option value="16:00:00">04:00 PM</option>
		  	<option value="16:30:00">04:30 PM</option>
		  	<option value="17:00:00">05:00 PM</option>
		  	<option value="17:30:00">05:30 PM</option>
		  	<option value="18:00:00">06:00 PM</option>
		  </select>
		</div>

	 

	  </div>
	   <div class="form-group bg-yellow">
		<label  class="col-sm-2 control-label ">Importante!!</label>
		<div class="col-sm-10 " id="ico">
			<p>LLenar la fecha, solo sí desea cerrar la ficha y aperturar una nueva. Pasado un tiempo De lo contrario solo quedara vacía</p>
		</div>
		
	  </div>
	  <div class="form-group ">
		<label  class="col-sm-2 control-label">Reprogramar:</label>
		<div class="col-sm-10" id="ico">
			<input type="date"  class="form-control " name="repro">
		</div>
		
	  </div>
  </div>
  
  	<div class="modal-footer bg-gray">
  		<input type="hidden" name="id" class="form-control" id="id">
  		<input type="submit" name="evento" class="btn btn-success" value="Aceptar">
  		<input type="submit" name="evento" class="btn btn-default " id="eli" value="Eliminar">
  		<input type="submit" name="evento" class="btn btn-default " id="ce" value="Cerrar Ficha">
  	</form>
    	
  </div>

</div>
</div>
</div>


<?php include_once(HTML_DIR . '/template/footer.php'); ?> 
<?php include_once(HTML_DIR . '/template/ajustes_generales.php'); ?>

<?php include_once(HTML_DIR . '/template/scrips.php'); ?>
<?php include_once(HTML_DIR . '/template/scrip_calendar.php'); ?> 

<!-- Bootstrap 3.3.6 -->

<!-- DataTables -->

<script>

	$(document).ready(function() {
		

		
		$('#calendar').fullCalendar({
			buttonText: {
        	today: 'Hoy',
        	month: 'Mes',
        	week: 'Semana',
        	day: 'Dia',

      		},
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'

			},
			businessHours: {
			  start: '09:00', // hora final
			  end: '18:00', // hora inicial
			  dow: [ 1, 2, 3, 4, 5 ] // dias de semana, 0=Domingo
			},
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			selectable: true,
			weekNumbers: true,
			selectHelper: true,
			
          	firstDay : 1,
          	allDaySlot : false,
			groupByDateAndResource: true,
			monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio','Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
    		monthNameShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun','Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
    		dayNames: ['Domingo', 'Lunes', 'Martes', 'Miercoles','Jueves', 'Viernes', 'Sabado'],
    		dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
			select: function(start, end) {
				
				$('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD'));
				$('#ModalAdd #end').val(moment(start).format('YYYY-MM-DD'));
				$('#ModalAdd').modal('show');
				
			},
			eventRender: function(event, element) {
				element.find('.fc-title').append("<br/>"+event.tipo );
				element.bind('dblclick', function() {
					$('#ModalEdit #id').val(event.id);
					$('#ModalEdit #contact').text(event.con);
					$('#ModalEdit #detalle').val(event.description);
					$('#ModalEdit #title').text(event.title);
					$('#ModalEdit #color').val(event.color);
					$('#ModalEdit #start').val(event.start.format('YYYY-MM-DD'));
					$("#ModalEdit #hstart option[value='"+event.start.format('HH:mm:ss')+"']").attr("selected",true);
					$('#ModalEdit #end').val(event.end.format('YYYY-MM-DD'));
					$("#ModalEdit #hend option[value='"+event.end.format('HH:mm:ss')+"']").attr("selected",true);
					
					$('#ModalEdit').modal('show');
					var f=event.end.format('YYYY-MM-DD HH:mm');
					//var f=event.end.format('YYYY-MM-DD');
					var dt = new Date();
					var time = dt.getFullYear()+"-"+(dt.getMonth()+1)+"-"+dt.getDate()+" "+dt.getHours() + ":" + dt.getMinutes();
					//var time = dt.format('YYYY-MM-DD');
					//alert(Date.parse(f));
					if(Date.parse(f)<=Date.parse(time)){
						$("#eli").hide();
						$("#ce").show();
						
					} else {
						$("#eli").show();
						$("#ce").hide();
						//alert(f);
					}
					//alert(time);


				});
			},
			eventDrop: function(event, delta, revertFunc) { // si changement de position

				edit(event);

			},
			eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur

				edit(event);

			},
			events: [
			<?php foreach($events as $event): 
			
					$start = $event['start'];
				
					$end = $event['end'];
				
			?>
				{
					id: '<?php echo $event['id']; ?>',
					title: '<?php echo $event['title']; ?>',
					start: '<?php echo $event['start']; ?>',
					end: '<?php echo $event['end']; ?>',
					color: '<?php echo $event['color']; ?>',
					description: '<?=$event['description']?>',
					tipo:'<?=$event['tipo']?>',
					con: '<?php echo $event['contacto']; ?>'

				},
			<?php endforeach; ?>
			]
		});
		
		function edit(event){
			start = event.start.format('YYYY-MM-DD HH:mm:ss');
			end = event.end.format('YYYY-MM-DD HH:mm:ss');
			
			
			id =  event.id;
			
			Event = [];
			Event[0] = id;
			Event[1] = start;
			Event[2] = end;
			
			
			$.ajax({
			 url: 'editEventDate.php',
			 type: "POST",
			 data: {Event:Event},
			 success: function(rep) {
					if(rep == 'OK'){
						alert('Guardado');
					}else{
						alert('Error en el Guardado.'); 
					}
				}
			});
		}
		
	});

 

</script>

<?php include_once(HTML_DIR . '/template/inferior_depues_cuerpo.php'); ?>

