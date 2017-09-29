<?php  
  require('../../config.ini.php');
  include("../../Modelo/conexion.php");
  include("../../Modelo/productos/producto.php"); 
  include("../../Modelo/agenda/agenda.php"); 
?>

<ul class="timeline timeline-inverse">
                        
  <?php 
        $id=$_GET['id'];
        $e=$_GET['e'];
         $cate = new Productos();
        $categoria=$cate->get_Idproductos($id);
         while($cat=$categoria->fetch_array()){   
             ?>
   <li class="time-label">
        <span class="bg-aqua"><?php echo $cat['PRO_D_NOMBRE']?> F.V.
              <?php echo $cat['FIN']?>
        </span>
    </li>
    
      

      <?php 
    $ejc=new Agenda();
    $ej=$ejc->get_allagendausEmp($e,2,$cat['PRO_C_CODIGO']);
    
    while($row=$ej->fetch_array()){ ?>
    <li>
    <i class="<?php echo $row['TIP_I_IMG'];?> "></i>
    <div class="timeline-item" >
            <span class="time" ><h5><i class="fa fa-calendar"  ></i>&nbsp;<?php echo $row['FECHA']; ?>&nbsp;&nbsp;<i class="fa fa-clock-o"></i>&nbsp;<?php echo $row['HORA']; ?></h5></span>
            <h3 class="timeline-header"><?php echo $row['TIP_D_NOMBRE']; ?> </h3>
            <div class="timeline-body">
            <h5><b>CONTACTO:<?php echo $row['CONTACTO'];?></b></h5>
            <p><?php echo $row['AGE_D_DETALLE'];?></p>
            <p><?php echo $row['AGE_D_DETALLE'];?></p>

            </div>
          
    </div>
  <?php }  ?> <br> <li>            
<?php }?>
          
 
  <!-- END timeline item -->
  
    <i class="fa fa-clock-o bg-gray"></i>
  </li>
</ul> 