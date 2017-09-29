<?php
class sqlserver{
   private $servidor="localhost";
   private $usuario="grupodig_agatha"; 
   private $clave="agatha2016$$"; 
   private $bdd="grupodig_agatha";
   private $puerto="3306";
   private $cnx=NULL;
   
   public function __construct($servidor=NULL, $usuario=NULL, $clave=NULL, $bdd=NULL,$puerto=NULL){
   	   try{
		   //IF conpactos
		   $this->servidor=is_null($servidor)? $this->servidor:$servidor;
		   $this->usuario=is_null($usuario)? $this->usuario:$usuario;
		   $this->clave=is_null($clave)? $this->clave:$clave;
		   $this->bdd=is_null($bdd)? $this->bdd:$bdd;
		   $this->puerto=is_null($puerto)? $this->puerto:$puerto;
		   $this->cnx = new mysqli($this->servidor, $this->usuario, $this->clave, $this->bdd,$this->puerto);
	   }catch(Exception $e){
		   echo $e->getMessage();
	   }
	}

  
	public function query($sql){
	  $cnx=$this->cnx;
   	   try{
		   	$cnx->query("SET NAMES 'utf8'"); 
		   	$result=$cnx->query($sql);
		   	//$cnx->close();
			return $result;
			//$result->free();
	   }catch(Exception $e){
		   echo $e->getMessage();
	   } 	   
   }
  
   public function __destruct(){
	   //$cnx=$this->cnx;
	   unset($this->servidor);
	   unset($this->usuario);
   	   unset($this->clave);
   	   unset($this->bdd);
   	   unset($this->puerto);
	   unset($this->cnx);
   	   	//$cnx->close();
		//$result->free();
	}
   
}

$cnx=new sqlserver;
$terminos=$_POST["terminos"];
(string)$sql="SELECT RUC,NomEmp,NomComercial from Empresa where CONCAT(RUC,NomEmp,NomComercial)  like '%$terminos%' limit 43;";
$result3=$cnx->query($sql);
 ?>

<?php 

      @include('links/titulo.php'); 
      @include('links/links.php'); 
      @include('links/header_menu.php');

      @include("../Entidades/generico.php");
      @include("../Entidades/parametros.php");
      @include("../Entidades/detParametros.php");
      @include("../Entidades/producto.php");
      @include("../Entidades/usuario.php");
      @include("../Entidades/proyecto.php");
     // @include("../Entidades/secciones.php");
      @include("../Entidades/actividades.php");


        $usuar=$_SESSION['usuario'];
       
         if(isset($_GET["noms"]))
         {
          $noms=$_GET["noms"];
             
          }else
          {
            $noms="";
        }
   ?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <?php  @include('actividades_eliminar.php');?>
     <?php 
						
						
						
                            if(isset($_COOKIE["errores"]))
							{
                             if($_COOKIE["errores"]=="ok"){

                            ?>
                            
                            <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-check"></i>  <?php 
                  			$cookie_name="errores";
                  			if(isset($_COOKIE[$cookie_name])) {
                        	echo $_COOKIE[$cookie_name];
                    		} 
                    		?>!</h4>
                            
                            Se Registro sin Problemas, Gracias.
                          </div>

                       <?php } else
                          {
                            ?>
                            
                            <div class="alert alert-danger alert-dismissible">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <h4><i class="icon fa fa-ban"></i> Error!</h4>
                               <?php 
              									$cookie_name="errores";
              									if(isset($_COOKIE[$cookie_name])) {
              									echo $_COOKIE[$cookie_name];
                    				  } 
                   			 ?>
                            </div>
                            <?php


                            }
						}
                        ?>
   <div class="row">
    <!-- Main content -->
    <div class="col-md-10">
            

              <!-- Default box -->
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title"></h3>
                      

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                      <i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  
                                
                    <!-- general form elements disabled -->
                    <div class="box box-warning">
                     
                      <form  name="form1" action="buscador.php" onSubmit="buscar()" method="post">
                          <div class="box-body">
                                 
                                <div class="form-group col-md-12">
                                    <div class="input-group">
                                  <input id="terminos" name="terminos" type="text"  class="form-control" placeholder="Search..." autofocus>
                                      <span class="input-group-btn">
                                        <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                                        </button>
                                      </span>
                                </div>

                                   

                                   
                                 </div >
                                 <div class="form-group col-md-12">
                                 	<table id="datos" class="table table-condensed"  style="font-size:12;">
										<tr>
									    	<th>RUC</th>
									        <th>EMPRESA</th>
									        <th>NOMBRE COMERCIAL</th>
										</tr>

									
										<?php
											while($row=$result3->fetch_object()){
											echo "<tr><td><a href='http://192.168.1.155:8080/Agatha2/mod3/citas/citas.php?RUC=".$row->RUC."' target='_BLANK'>".$row->RUC."</a></td><td>".$row->NomEmp."</td><td>".$row->NomComercial."</td></tr>";		
											}
										?>


									</table>

                                 </div>
                             
                            </div>
                          
                      </form>
                     </div>
                    <!-- /.box -->
                  
                 
                </div>
                <!-- /.box-body -->
               
                <!-- /.box-footer-->
              </div>
              <!-- /.box -->

            
            

              <!-- Default box -->
             
              <!-- /.box -->

            
      </div>
      <div class="col-md-2">
            

              <!-- Default box -->
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title"> falta...</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                      <i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  
                  <div class="col-md-12">
                              
                  <!-- general form elements disabled -->
                  <div class="box box-warning sombra">
                    <div class="box-body">
                       <div class="text-center" >
                        
                       </div>

                    </div>

                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                       
                                      
                      </table>
                    </div>           
                   
                   </div>
                  <!-- /.box -->
                  </div>
                </div>
               
              </div>
              <!-- /.box -->

           
      </div>
    <!-- /.content -->
    </div>

  </div>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="js/app.js"></script>
  <!-- /.content-wrapper -->
 
<?php

@include_once('links/footer.php');
@include_once('links/ajustes_generales.php');
@include_once('links/scrips.php');
//@include_once('links/scrip_chart.php');
@include_once('links/inferior_depues_cuerpo.php');?>

