<?php @include('links/titulo.php'); 
      @include('links/links.php'); 
      @include('links/header_menu.php');
 	  @include("../Entidades/generico.php");
      @include("../Entidades/parametros.php");
     
      
      @include("../Entidades/usuario.php");
      @include("../Entidades/proyecto.php");
      @include("../Entidades/secciones.php"); 

 		
 		$usuar=$_SESSION['usuario'];

         if(isset($_GET["nom"]))
         {
          $_SESSION['proyecto']=$_GET["nom"];

          }else
          {
            $_SESSION['proyecto']='';
        }
      ?>

  <?php include('modal_agregar.php');?>
  <?php include('modal_modificar.php');?>
  <?php include('modal_eliminar.php');?>
 <div class="content-wrapper">
 
    <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
        Estructuración de Proyectos
        <small>Digamma</small>
      </h1>
     
    </section>
    <!-- Main content -->
    <section class="content">
	 
		<div class='col-md-12'>	
			<h3 class="box-title"><?php echo $_SESSION['proyecto'] ?> </h3>
		</div>
		<div class='col-md-12'>
			<h3 class='text-right'>		
				<button type="button" class="btn btn-default" data-toggle="modal" data-target="#dataRegister"><i class='glyphicon glyphicon-plus'></i> Agregar</button>
			</h3>
		</div>	
		
		  <div class="row">
			
				<div class="col-md-12">
					<div id="loader" class="text-center"> <img src="loader.gif"></div>
					<div class="datos_ajax_delete"></div><!-- Datos ajax Final -->
					<div class="outer_div"></div><!-- Datos ajax Final -->
				</div>
		  </div>
		</div>
	</section>
</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="js/app.js"></script>
	<script>
		$(document).ready(function(){
			load(1);
		});
	</script>
 
<?php 


//@include_once('links/scrips.php');
//@include_once('links/scrip_chart.php');
@include_once('links/inferior_depues_cuerpo.php');?>
