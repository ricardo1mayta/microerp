 <?php  
              require('../../config.ini.php');
              include("../../Modelo/conexion.php");
              include("../../Modelo/contactos/contactos.php");
              include("../../Modelo/empresas/cartera.php"); ?>
  <?php 
  $idempresa= $_GET['e'];

                  $car = new Cartera();
                               $res=$car->get_contactosempresa($idempresa);
                               while($l=$res->fetch_array()){                        
                                   ?>
                                       
                                <tr class="">
                                <td><i class="fa  fa-trash text-red" onclick="deletecontactoss(<?=$l['CON_C_CODIGO']?>)" data-toggle="tooltip" title="Eliminar" ></i></td>
                                  <td>
                            <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#editcontactos" data-id="<?=$l['CON_C_CODIGO']?>" data-nom="<?=$l['CON_D_NOMBRE']?>" data-apell="<?=$l['CON_D_APELLIDO']?>" data-dir="<?=$l['CON_D_DIRECCION']?>" data-cargo="<?=$l['CAR_C_CODIGO']?>"> <i class="fa fa-edit" data-toggle="tooltip" title="Editar"></i></button>
                          
                        </td>
                                  <td><?php echo  "CO-".$l['CON_C_CODIGO'];?></td>
                                  
                                  <td><?php echo $l['NOMBRE'];?></td>
                                  
                                  <td><?php echo $l['CON_D_DIRECCION']?></td>
                                  <td>
                                  <?php 
                                     $cor = new Cartera();
                                     $c=$cor->get_sectorcontactos($l['CON_C_CODIGO']);
                                     
                                  ?>

                                        <label class="">
                              <input type="checkbox" value="1" onChange="tipocontacto(this,<?=$l['CON_C_CODIGO']?>)" <?=$c[0]?>>CR.</label>
                              <label class="">
                              <input type="checkbox" value="2" onChange="tipocontacto(this,<?=$l['CON_C_CODIGO']?>)" <?=$c[1]?>>RM.</label>
                              <label class="">
                              <input type="checkbox" value="3" onChange="tipocontacto(this,<?=$l['CON_C_CODIGO']?>)" <?=$c[2]?>>PC.</label>
                                     
                                   <?php  ?>
                                    

                                  </td>
                                  <td><?php 
                                     $cor = new Cartera();
                                     $core=$cor->get_telefonocontactos($l['CON_C_CODIGO']);
                                     while($c=$core->fetch_array()){                        
                                   ?>

                                   <li style="list-style: none;"></small><?php echo $c['TEL_D_TELEFONO']."  -  "; ?><font size="-3" class="text-green">(<?php echo $c['TIPTEL_D_NOMBRE']; ?>)</font>  
                                   <i class="fa fa-close text-red pull-right" onclick="delete_telefono(<?=$c['TEL_C_CODIGO']?>)" ></i>
                                    <i class="fa fa-edit text-yellow pull-right" data-ntel="<?=$c['TEL_D_TELEFONO']?>" data-idtel="<?=$c['TEL_C_CODIGO']?>" data-ttel="<?=$c['TIPTEL_C_CODIGO']?>" data-con="<?=$l['CON_C_CODIGO']?>" data-toggle="modal" data-target="#edittel"></i>
                                   </li>

                                  <?php } ?>
                                  <i class="fa fa-plus-square text-green" data-toggle="modal" data-con="<?=$l['CON_C_CODIGO']?>" data-target="#newtel"></i>
                                  </td>
                                  <td><?php 
                                     $cor = new Cartera();
                                     $core=$cor->get_correocontactos($l['CON_C_CODIGO']);
                                     while($c=$core->fetch_array()){                        
                                   ?>

                                   <li style="list-style: none;"><?php echo $c['COR_D_EMAIL']; ?><small><font size="-3" class="text-green">(<?php echo $c['TIPCOR_D_NOMBRE']; ?>)</font></small>
                                   <i class="fa fa-close text-red pull-right" onclick="delete_correo(<?=$c['COR_C_CODIGO']?>)" ></i>
                                    <i class="fa fa-edit text-yellow pull-right" data-corr="<?=$c['COR_D_EMAIL']?>" data-idcor="<?=$c['COR_C_CODIGO']?>" data-tcor="<?=$c['TIPCOR_C_CODIGO']?>" data-con="<?=$l['CON_C_CODIGO']?>"  data-toggle="modal" data-target="#editcorr"></i>
                                   
                                   </li>

                                  <?php } ?>
                                  <i class="fa fa-plus-square text-green" data-con="<?=$l['CON_C_CODIGO']?>" data-toggle="modal" data-target="#newcorr"></i>
                                  </td>
                                  <td><form action="../carteraEmpresas/" method="post">
                                      <input type="hidden" name="idcon" value="<?php echo $l['CON_C_CODIGO']; ?>">
                            <input type="hidden" name="idemp" value="<?php echo $idempresa; ?>">
                            
                          </form>
                        </td>

                                 
                                </tr>
                  <?php } ?> 