<?php  
require('../../config.ini.php');
include("../../Modelo/conexion.php");
include("../../Modelo/productos.php"); ?>

<?php 


 ?>
 <div class="box-body">
                  
                 <table id="datos" class="table">
                    <tr>
                    
                        <th>CATEGORIA</th>
                        <th>MARCA</th>
                        <th>PRODUCTO</th>
                        <th>ESTADO</th>
                        <th colspan="2" width="80">OPCIONES</th>
                        
                    </tr>

                     <?php 
                     $pro = new Productos();
                         $p=$pro->get_allProductos();
                          while($lista1=$p->fetch_array()){  
                             ?>
                           <tr>
                            <td><?php echo $lista1[0]?></td>
                            <td><?php echo $lista1[1]?></td>
                            <td><?php echo $lista1[2]?></td>
                            <?php if ($lista1[3]==1){ ?>
                            <td><form action="../registrarProductos/" method="POST">
                            <input type="hidden" value="finalizar"  name="evento">
                             <input type="hidden" value="<?php echo $lista1['PRO_C_CODIGO']?>"  name="codigo">
                             <input type="submit" class="btn btn-success btn-xs" value="Finalizar" > </form></td>
                            <?php } else {?>
                            <td><form action="" method=""><input type="submit" class="btn btn-primary btn-xs" value="Iniciar" disabled> </form></td>
                            <?php } ?>
                            <td> <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" 
                            data-target="#editarproductos" data-id="<?php echo $lista1['PRO_C_CODIGO']?>" data-nombre="<?php echo $lista1['PRO_D_NOMBRE']?>" data-fini="<?php echo $lista1['PRO_F_FECHAINICIAL']?>" data-ffin="<?php echo $lista1['PRO_F_FECHAFINAL']?>" ><i class=" fa  fa-list"></i> Editar</button></td>
                            <td><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" 
                            data-target="#eliminarproductos" data-id="<?php echo $lista1['PRO_C_CODIGO']?>" ><i class=" fa  fa-list"></i> Eliminar</button>
                            </td>
                            

                            
                          </tr>             
                          <?php }?>
                          
                   </table>
                    <br>
                    
                
                </div>