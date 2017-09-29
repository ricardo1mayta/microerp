              <?php  @include("../Entidades/parametros.php"); ?>

                <label>Marca </label>
                       <select class="form-control" name="marca" id="marca" onchange="from(document.form1.categoria.value,'prod','selec_productos.php')" required>
                       <option>-----Seleccione-----</option>
                        <?php 
                        $id=$_GET['id'];
                         $cate = new Parametros();
                         $categoria=$cate-> get_Idparametros($id);
                         while($cat=mysql_fetch_array($categoria)){  
                             ?>
                                  <option value="<?php echo $cat['PAR_C_CODIGO']?>"><?php echo $cat['PAR_D_NOMBRE']?></option>
                                             
                          <?php }?>
                        </select>


