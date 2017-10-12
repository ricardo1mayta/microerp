 <?php  
require('../../config.ini.php');
include("../../Modelo/conexion.php");
include("../../Modelo/pedidos/pedidos.php"); ?>

<?php 
function asDollars($value) {
  return '$ ' . number_format($value, 2);
}
$us=$_GET['u'];
$p = new Pedidos();
 $result=$p->get_pedidos($us,1);
  setlocale(LC_MONETARY, 'en_US');
  $number = -1234.5672;
  $number = 123.4;

  while($lista=$result->fetch_array()){                        
     ?>
     <tr id="sell<?=$lista[0]?>" >
       <td><?php echo 'PED-'. substr(('00000000'.$lista[0]), -8,8); ?></td>
       <td><?php echo $lista[1] ?></td>
       <td><?php echo $lista[2] ?></td>
       <td><?=asDollars(round($lista['TOTAL'], 2))?> </td>
      
       
       <td  onclick="verdetallepedido(<?=$lista[0]?>,<?=$lista[0]?>,'<?=$lista[1]?>')"><i class="fa fa-mail-forward" data-toggle="modal" data-target="#detallepedido"   data-toggle="tooltip" title="Detalle"></i></td>
       <td onclick="eliminapedido(<?=$lista[0]?>)"><i class="fa fa-thumbs-down"  data-toggle="tooltip" title="Dar de Baja"></i></td>
       <td ><button data-toggle="modal" data-target="#validapedido" data-id="<?=$lista[0]?>"> <i class="fa  fa-check"   ></i></button></td>

     </tr>
     <?php } ?>