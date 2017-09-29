 
<?php 
      @include('links/titulo.php'); 
      @include('links/links.php'); 
      
      @include("../Entidades/generico.php");
      @include("../Entidades/parametros.php");
      @include("../Entidades/detParametros.php");
      @include("../Entidades/producto.php");
      @include("../Entidades/usuario.php");
      @include("../Entidades/proyecto.php");
      @include("../Entidades/secciones.php");

        $usuar=$_SESSION['usuario'];


         if(isset($_GET["id"]))
         {
              $id=$_GET["id"];
              $secc=new Secciones();

              $data=$secc->get_rowSeccion($id);
          }else
          {
            $data="";
        }
        
                        
   ?>
<body>
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo $id ?> </h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div class="col-md-12">
                        
            <!-- general form elements disabled -->
            <div class="box box-warning ">
              <div class="box-header with-border">
                <h3 class="box-title">Registro de Secciones </h3>
              </div>

              <!-- /.box-header -->
              <form role="form" name="form1" target="new"  action="registro_secciones.php?nom=REVISTA%20RUMBO%20MINERO%20EDICIÓN%2097" method="POST" >
                  <div class="box-body">
                      <div class="form-group col-md-3">
                             <label>Categoria </label>
                             <select class="form-control" name="categoria" id="categoria">
                             <option value="<?php echo $usuar["PAR_C_CODIGO"]?>"><?php echo $data["PAR_D_NOMBRE"]?></option>
                          <?php 
                           $cate = new Parametros();
                           $categoria=$cate-> get_Idparametros('8');
                           while($cat=mysql_fetch_array($categoria)){  
                             if($cat["PAR_C_CODIGO"]!=$data["PAR_C_CODIGO"]){
                               ?>
                                    <option value="<?php echo $cat['PAR_C_CODIGO']?>"><?php echo $cat['PAR_D_NOMBRE']?></option>
                                               
                            <?php }}?>
                          </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Titulo</label>
                            <input type="hidden"   name="nomproy" id="nomproy" >
                            <textarea  type="text" rows="3" class="form-control"  name="nomsecc" id="nomsecc"  ><?php echo $data['ETA_D_NOMBRE'];?></textarea>
                          </div>
                          <div class="form-group col-md-3">
                            <label>Descripcion</label>
                            <textarea class="form-control" rows="3" type="text"  name="dessecc" id="dessecc" ><?php echo $data['ETA_D_DESCRIPCION'];?></textarea>
                          </div>
                          
                          <div class="form-group col-md-3">
                              <label>Responsable</label>
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
                           
                            <div class="box-footer col-md-12 btn ">
                               <button type="submit" class="btn btn-warning  col-md-12 "><i class="fa fa-save"  > </i> Actualizar</button> 
                               <input  type="submit"  value="guardar"  onclick="javascript:window.opener.location.href='../Control/control_m_secciones.php?id=2';window.close(_self);"/>

                          </div>

                            
                     
                     
                    </div>
                  
              </form>
             </div>
            <!-- /.box -->
          </div>
        </div>
        
        <!-- /.box-footer-->
      </div>


<?php
//@include_once('links/scrips.php');
@include_once('links/scrip_chart.php');
@include_once('links/inferior_depues_cuerpo.php');
?>
   </body>  