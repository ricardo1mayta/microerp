 <?php  
require('../../config.ini.php');
include("../../Modelo/conexion.php");
include("../../Modelo/pedidos/pedidos.php"); ?>

<?php 
$us=$_GET['u'];
$p = new Pedidos();
 $result=$p->get_pedidos_validar($us);
  setlocale(LC_MONETARY, 'en_US');
  while($lista=$result->fetch_array()){                        
     ?>
     <tr id="sell<?=$lista[0]?>" >
       <td><?php echo 'PED-'. substr(('00000000'.$lista[0]), -8,8); ?></td>
       <td><?php echo $lista[1] ?></td>
       <td><?php echo $lista[2] ?></td>
       <td><?php echo money_format('%.2n',  round($lista['TOTAL'], 2));  ?></td>
       <td  onclick="verdetallepedido(<?=$lista[0]?>,<?=$lista[0]?>,'<?=$lista[1]?>')"><i class="fa fa-mail-forward"   data-toggle="tooltip" title="Detalle"></i></td>
       <td onclick="validar(<?=$lista[0]?>,3)"><i class="fa  fa-check btn btn-success"  data-toggle="tooltip" title="Aceptar Pedido"></i></td>
       <td onclick="obs(<?=$lista[0]?>,2)"><i class="fa  fa-close btn btn-danger"  data-toggle="tooltip" title="Desaprovar Pedido"></i></td>
     </tr>
     <?php } ?>