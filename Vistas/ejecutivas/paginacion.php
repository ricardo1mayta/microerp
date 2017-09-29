 <?php  
              require('../../config.ini.php');
              include("../../Modelo/conexion.php");
              include("../../Modelo/empresas/empresa.php"); ?>
<?php 
                    $pro = new Empresas();
                       
                        if(isset($_GET['txt'])){
                         $tex=$_GET['txt'];
                                $categoria=$pro->get_conteo12($tex);
                               
                         } else{
                         $categoria=$pro->get_conteo12("");
                         
                         }
                         
                        
                            //Creamos el JSON
                            $json_string =$categoria[0];

                            echo "<input id='contotal' type='hidden' value='".$json_string."'>";
                             echo "<label>Registros encontrados: ".$json_string."</label>";
                            


        
?>                              