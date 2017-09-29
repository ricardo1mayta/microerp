             <?php  
              require('../../config.ini.php');
              include("../../Modelo/conexion.php");
             include("../../Modelo/usuario.php"); 
               ?>
               <table class="table table-border" width="20%">
            <?php $usuar=new User(); 
                      $result=$usuar->lista_usuarios();
                      while($row = $result->fetch_array()){             
        
                      ?>
                      <tr onclick="abre(<?php echo $row['US_C_CODIGO']; ?>)">
                        <td><?php echo "<img src=../Public/img/Usuarios/".$row['US_I_IMAGEN']."  width='30' height='30' class='img-circle' alt='User mage' >"; ?>
                          
                        </td>
                        <td>
                          <h6 class="text-black"> &nbsp;
                              <?php echo " ".$row['US_D_NOMBRE']." " .$row['US_D_APELL'];?>
                            </h6>
                        </td>
                        <td><?php if($row['US_E_ESTADOSISTEMA']==1) {?>
                            
                              <font size="-2"><i class="fa fa-circle" style="color:#3ADF00"></i></font>
                           
                            
                           <?php } ?>
                        </td>
                        <td><font size="-2"><?php echo date('H:m',$row['US_F_SALIDASISTEMA'])  ?></font></td>
                      </tr>

          
                      <?php } ?>
                    </table>