     <?php  
              require('../../config.ini.php');
              include("../../Modelo/conexion.php");
              include("../../Modelo/contactos/contactos.php") ?>
<?php 
if(isset($_REQUEST['p'])) { $idparis=$_REQUEST['p']; } else{ $idparis=0; };
if(isset($_REQUEST['e'])) {$idest=$_REQUEST['e']; } else{ $idest=0; };
if(isset($_REQUEST['pr'])) {$idprov=$_REQUEST['pr']; } else{ $idprov=0; };
if(isset($_REQUEST['di'])) { $iddis=$_REQUEST['di']; } else{ $iddis=0; };
if(isset($_REQUEST['u'])) { $idus=$_REQUEST['u']; } else{ $idus=0; };
if(isset($_REQUEST['em'])) { $idemp=$_REQUEST['em']; } else{ $idemp=0; };




if($idparis>0){

$cp=new Contactos(); 

$cor=$cp->save_ubigeo($idparis,$idest,$idprov,$iddis,$idus,$idemp);
echo $cor[0];
}
 ?>