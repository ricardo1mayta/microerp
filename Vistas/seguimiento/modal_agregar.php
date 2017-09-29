<form id="guardarDatos">
<div class="modal fade" id="dataRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Modificar país:</h4>
      </div>
      <div class="modal-body">
      <div id="datos_ajax"></div>
      <div class="form-group ">
         <label>Categoria </label>
         <input type="text"   name="categoria1" id="categoria1" class="form-control" disabled>
         <select class="form-control" name="categoria" id="categoria">
         <option>-----Seleccione-----</option>
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
             <input type="text" class="form-control"  name="id" id="id"   required>
            <input type="text" class="form-control"  name="titulo" id="titulo"   required>
          </div>
          <div class="form-group ">
            <label>Descripcion</label>
            <input type="text" class="form-control"  name="descripcion" id="descripcion"  placeholder="Descripcion"  required>
          </div>
          <div class="form-group">
            <label>Responsable</label>
           <input type="text" class="form-control"  name="responsable1" id="responsable1" disabled>
            <select class="form-control" name="user" id="user" >
              <option value="<?php echo $usuar["US_C_CODIGO"]?>"><?php echo $usuar["US_D_NOMBRE"]." ".$usuar["US_D_APELL"]?></option>
                  <?php 
                   $u = new User();
                   $us=$u->lista_usuariosprensa(13,12);
                   while($usr=mysql_fetch_array($us)){  

                        if($usr["US_C_CODIGO"]!=$usuar["US_C_CODIGO"]){

                       ?>
                            <option value="<?php echo $usr["US_C_CODIGO"]?>"><?php echo $usr["US_D_NOMBRE"]." ".$usr["US_D_APELL"]?></option>
                                       
                    <?php }}?>
                  </select>
        </div>
        
      </div>
      <div class="modal-footer">

        <button type="submit" class="btn btn-primary">Actualizar datos</button>
      </div>
    </div>
  </div>
</div>
</form>