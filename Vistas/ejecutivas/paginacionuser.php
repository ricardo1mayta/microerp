 <?php  
              require('../../config.ini.php');
              include("../../Modelo/conexion.php");
              include("../../Modelo/ejecutivas/moduloejecutivas.php"); ?>
<?php 
                 $pro = new Moduloejecutivas();
                       
                        if(isset($_GET['txt'])){
                         $tex=$_GET['txt'];
                         $us=$_GET['u'];
                                $categoria=$pro->get_conteouser12($tex,$us);
                               
                         } else{
                         $categoria=$pro->get_conteouser12("",$us);
                         
                         }
                         
                        
                            //Creamos el JSON
                            $json_string =$categoria[0];

                            echo "<input id='contotal' type='hidden' value='".$json_string."'>";
                             echo "<label>Registros encontrados: ".$json_string."</label>";
                            


        
?>                              