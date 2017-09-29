 <?php  
require('../../config.ini.php');
include("../../Modelo/conexion.php");
include("../../Modelo/pedidos/detallepedidos.php"); ?>
<?php  $p = new DetallePedidos();
 $result=$p->get_detallepedidos($_GET['txt']);
 $total=0;
 $i=1;
 setlocale(LC_MONETARY, 'en_US');
 while($lista=$result->fetch_array()){  
 $total=$total+$lista['SUB_TOTAL'];                      
     ?>
     <tr >
     <td><?php echo $lista['DPE_C_CODIGO'].$i++; ?></td>
       <td><?php echo $lista['NOMBRE'] ?></td>
       <td  >
       
       <span id="fc<?=$lista['DPE_C_CODIGO']?>"><?php echo $lista['DPE_N_CANTIDAD'] ?></span>

       <span id="ec<?=$lista['DPE_C_CODIGO']?>" onclick="editc(<?=$lista['DPE_C_CODIGO']?>,<?=$lista['DPE_N_CANTIDAD']?>)" data-toggle="tooltip" title="Editar" class="glyphicon glyphicon-pencil pull-right"></span>

       <span id="cc<?=$lista['DPE_C_CODIGO']?>" style="display: none" onclick="canceleditc(<?=$lista['DPE_C_CODIGO']?>,<?=$lista['DPE_N_CANTIDAD']?>)" data-toggle="tooltip" title="Editar" class="glyphicon glyphicon-remove pull-right"></span>

       </td>
       <td  >
       <span id="s<?=$lista['DPE_C_CODIGO']?>" style="display:none;" >$. </span>
       <span id="f<?=$lista['DPE_C_CODIGO']?>"><?php echo money_format('%.2n',  round($lista['DPE_N_PRECIO'], 2));  ?></span>

       <span id="e<?=$lista['DPE_C_CODIGO']?>" onclick="edit(<?=$lista['DPE_C_CODIGO']?>,<?=$lista['DPE_N_PRECIO']?>)" data-toggle="tooltip" title="Editar" class="glyphicon glyphicon-pencil pull-right"></span>

       <span id="c<?=$lista['DPE_C_CODIGO']?>" style="display: none" onclick="canceledit(<?=$lista['DPE_C_CODIGO']?>,<?=$lista['DPE_N_PRECIO']?>)" data-toggle="tooltip" title="Eliminar" class="glyphicon glyphicon-remove pull-right"></span>

       </td>
       <td  ><?php echo money_format('%.2n',  round($lista['SUB_TOTAL'], 2)); ?></td>
       <td><i class="fa fa-close" data-toggle="tooltip" title="Eliminar" onclick="eliminarproducto(<?=$lista['DPE_C_CODIGO']?>,<?=$_GET['txt']?>)" ></i></i></td>
       

     </tr>
     <?php } ?>
      <tr class=" bg-gray">
      <td colspan="4" ><span class="pull-right"> Total:</span></td>
      <td colspan="3" ><?php echo money_format('%.2n', round($total, 2)); ?></td>
      </tr>