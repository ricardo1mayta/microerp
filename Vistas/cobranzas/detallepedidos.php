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

       </td>
       <td  >
       
       <span id="f<?=$lista['DPE_C_CODIGO']?>"><?php echo"$ ".number_format(round($lista['DPE_N_PRECIO'], 2),2);  ?></span>

       </td>
       <td  ><?php echo "$ ".number_format(round($lista['SUB_TOTAL'], 2),2); ?></td>
       
       

     </tr>
     <?php } ?>
      <tr class=" bg-gray">
      <td colspan="4" ><span class="pull-right"> Total:</span></td>
      <td colspan="3" ><?php echo "$ ".number_format(round($total, 2),2); ?></td>
      </tr>