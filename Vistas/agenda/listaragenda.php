<?php include_once(HTML_DIR . '/template/titulo.php'); ?>
<?php include_once(HTML_DIR . '/template/links.php'); ?>
<script >
  function pro(e){

  var cat=$("#categoria").val();

  var url="../Vistas/agenda/selec2_marca.php";
 
    $.ajax({
           type: "GET",
           url: url,
           data: {id: cat,e: e}, // Adjuntar los campos del formulario enviado.
                      
           success: function(data)
           {
               //$("#respuesta").html(data); // Mostrar la respuestas del script PHP.
                $('#marcas').html(data);
           
           }
         });
    }
  function his(e){

  var cat=$("#marca").val();
  var url="../Vistas/agenda/historialpormarca.php";
 var u=<?=$usuario['US_C_CODIGO']?>;
    $.ajax({
           type: "GET",
           url: url,
           data: {id: cat,e: e,u:u}, // Adjuntar los campos del formulario enviado.
                      
           success: function(data)
           {
               //$("#respuesta").html(data); // Mostrar la respuestas del script PHP.
                $('#historial').html(data);
           
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
       Lista de Agenda
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
            <div class="box box-danger">
              <div class="box-header with-border">
              <?php 
              if(isset($_POST['codigo'])){ $idempresa=$_POST['codigo']; }else{$idempresa=$idemp;}
                
                    $e=new Empresas(); 
                    $emp=$e->get_Empresasid($idempresa);
                ?>
                <h3 class="box-title">Opciones:</h3>
              </div>
              <div class="box-body">
                  <div class="form-group ">
                      <label>Categoria</label>
                       <select class="form-control" name="categoria" id="categoria" onchange="pro(<?=$idempresa;?>)">
                       <option>Seleccione</option>
                        <?php 
                              

                         $cate = new Parametros();
                         $categoria=$cate->get_Idparametros('1');
                         while($cat=$categoria->fetch_array()){  
                             ?>
                                  <option value="<?php echo $cat['PAR_C_CODIGO']?>"><?php echo $cat['PAR_D_NOMBRE']?></option>
                                             
                          <?php }?>
                        </select>
                    </div>
                    <div class="form-group " name="marcas" id="marcas">
                      <label>Marca </label>
                       <select class="form-control">
                       
                         
                       </select>                      
                         
                  </div>  
                  
              </div>
              <!-- /.box-body -->
           
            </div>
        </div>
        <div class="col-md-9">
           <div class="box box-danger">
            <div class="box-header with-border">          
                <h3 class="box-title"><?php echo $emp['EMP_D_RAZONSOCIAL'];?></h3>
                <div class="box-tools pull-right">
                 <form action="../agendaEjecutiva/" method="POST">
                  <button type="submit" class="btn btn-success" >
                   </i>Agregar</button>
                  </form>
                </div>
              </div>
              
              <div class="box-body" id="historial">
                  
                  Selecionar Marca!!!...
                
                 
              </div>
              <!-- /.box-body -->
           
            </div>

        </div>
      </div>

      	 
       
      
    </section>
    <!-- /.content -->
</div>

<?php include_once(HTML_DIR . '/template/footer.php'); ?> 
<?php include_once(HTML_DIR . '/template/ajustes_generales.php'); ?>

<?php include_once(HTML_DIR . '/template/scrips.php'); ?>

<?php include_once(HTML_DIR . '/template/inferior_depues_cuerpo.php'); ?>
