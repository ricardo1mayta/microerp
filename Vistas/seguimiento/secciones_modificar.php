<form  action="../Control/control_modificar_secciones.php" method="post">
<div class="modal fade" id="dataUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header alert-success"  >
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"></h4>
      </div>
      <div class="modal-body">
			<div id="datos_ajax"></div>
      <div class="form-group ">
         <label>Categoria </label>
         <input type="hidden"   name="categoria1" id="categoria1" class="form-control">
          <input type="text"   name="categoriass" id="categoriass" class="form-control" disabled>
         <select class="form-control" name="categoria" id="categoria">
         <option>Cambiar a...</option>
          <?php 
           $cate = new Parametros();
           $categoria=$cate-> get_Idparametros('8');
           while($cat=mysql_fetch_array($categoria)){  
               ?>
                    <option value="<?php echo $cat['PAR_C_CODIGO']?>"><?php echo $cat['PAR_D_NOMBRE']?></option>
                               
            <?php }?>
      </select>
      </div>
     
		     <div class="form-group ">
            <label>Titulo</label>
             <input type="hidden" class="form-control"  name="id" id="id">
             
            <input type="text" class="form-control"  name="titulo" id="titulo"   required>
          </div>
          <div class="form-group ">
            <label>Descripcion</label>
            <input type="text" class="form-control"  name="descripcion" id="descripcion"  placeholder="Descripcion"  required>
          </div>
          <div class="form-group">
            <label>Responsable</label>
           <input type="hidden" class="form-control"  name="responsable1" id="responsable1">
            <input type="text" class="form-control"  name="responsable" id="responsable" disabled>
            <select class="form-control" name="user" id="user" >
              <option value="">Cambiar a..</option>
                  <?php 
                   $u = new User();
                   $us=$u->lista_usuariosprensa(13,12);
                   while($usr=mysql_fetch_array($us)){  

                       ?>
                            <option value="<?php echo $usr["US_C_CODIGO"]?>"><?php echo $usr["US_D_NOMBRE"]." ".$usr["US_D_APELL"]?></option>
                                       
                    <?php }?>
                  </select>
        </div>
        
      </div>
      <div class="modal-footer">

        <input type="submit"   class="btn btn-primary" value="Actualizar"/>
      </div>
    </div>
  </div>
</div>
</form>