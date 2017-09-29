  <?php  
              require('../../config.ini.php');
              include("../../Modelo/conexion.php");
              include("../../Modelo/contactos/contactos.php") ?>
<?php
$idempresa=$_REQUEST['e']; 
$cp=new Contactos(); 

                      $ub=$cp->get_ubigeo($idempresa); 
                      echo "<h3 class='text-blue'>Ubicación - | ".$ub[0]." |  ".$ub[1]." | ".$ub[2]." | ".$ub[3];

                        ?>
                 <button class="btn btn-success" onclick="editarubigeo()"><i class="fa fa-edit"></i></button></h3>