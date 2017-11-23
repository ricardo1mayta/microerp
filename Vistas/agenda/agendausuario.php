       <?php  
              require('../../config.ini.php');
              include("../../Modelo/conexion.php");
              
              include("../../Modelo/agenda/agenda.php"); ?>

<?php 




  
  $pro = new Agenda();
              
      $events = array();
     

      $tex=$_REQUEST['u'];
        
          $categoria=$pro->get_allagendaus($tex);
          while($row=$categoria->fetch_array())
          {
          $events[] = array('id'=> $row['AGE_C_CODIGO'],'title'=> $row['TIP_D_NOMBRE'],'start'=> $row['AGE_F_FECHAINICIO'],'end'=> $row['AGE_F_FECHAFIN']); 
           
          }
 
    echo json_encode($events);

					
?>							    

