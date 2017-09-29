  <?php  @include("../Entidades/producto.php");?>

                <label>Producto</label>
                       <select class="form-control" name="producto" id="producto" onchange="capturar()" required>
                       <option>-----Seleccione-----</option>
                        <?php 
                        $id=$_GET['id'];
                         $prod = new Productos();
                         $producto=$prod->get_Idproductos($id);
                         while($pro=mysql_fetch_array($producto)){  
                             ?>
                                  <option value="<?php echo $pro['PRO_C_CODIGO']?>"><?php echo $pro['PRO_D_NOMBRE']?></option>
                                             
                          <?php }?>
                        </select>