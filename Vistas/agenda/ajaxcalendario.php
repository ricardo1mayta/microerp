       <?php  
              require('../../config.ini.php');
              include("../../Modelo/conexion.php");
              
              include("../../Modelo/agenda/agenda.php"); ?>
<?php 
					$pro = new Agenda();
    					
    					$clientes = array();
    				

    					if(isset($_GET['txt'])){
						 $tex=$_GET['txt'];
						  $fini=$_GET['fechaini'];
						   $ffin=$_GET['fechafin'];
						 $categoria=$pro->agrega_agenda($ini,10);
						
						$clientes[] = array('txt'=> $categoria[0]); 
                    	 } else{
                         $clientes[] = array('txt'=> 'error'); 
                         
                    	 }
                   
                          $json_string = json_encode($clientes);

							echo $json_string;
?>							    

