 <?php  
require('../../config.ini.php');
include("../../Modelo/conexion.php");
include("../../Modelo/pedidos/pedidos.php"); ?>

<?php 
$us=$_GET['u'];
$p = new Pedidos();
 $result=$p->get_pedidos_cobranzas($us);
  setlocale(LC_MONETARY, 'en_US');
  while($lista=$result->fetch_array()){                        
     ?>
     <tr id="sell<?=$lista[0]?>" >
       <td><?php echo 'PED-'. substr(('00000000'.$lista[0]), -8,8); ?></td>
       <td><?php echo $lista[1] ?></td>
       <td><?php echo $lista[2] ?></td>
       <td><?php echo "$ ".number_format(round($lista['TOTAL'], 2),2);  ?></td>

       <td  onclick="verdetallepedido(<?=$lista[0]?>,<?=$lista[0]?>,'<?=$lista[1]?>')"><i class="fa fa-mail-forward" data-toggle="modal" data-target="#detallepedido"  data-toggle="tooltip" title="Detalle"></i></td>
       <td><label class="">
        <input type="checkbox" value="3" onChange="" >Orden Pedido</label><br>
        <label class="">
        <input type="checkbox" value="3" onChange="" >Contrato</label></td>
       <td onclick="obs(<?=$lista[0]?>,2)"><i class="fa  fa-thumbs-up btn btn-success"  data-toggle="tooltip" title="Finalizar Requisitos"></i></td>
       
     </tr>
     <?php } ?>