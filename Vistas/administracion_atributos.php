   <?php 
      @include('links/titulo.php'); 
      @include('links/links.php'); 
      @include('links/header_menu.php');

      @include("../Entidades/generico.php");
      @include("../Entidades/parametros.php");
      @include("../Entidades/detParametros.php");

   ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Admistracion de Sistema
        <small>Digamma</small>
      </h1>
     
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
                      
          <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Registro de Parametros</h3>
            </div>
            <!-- /.box-header -->
            <form role="form" action="../Control/control_parametro.php" method="POST" >
                <div class="box-body">
                  <br>
                    
                    <div class="form-group">
                      <label>Nombre del Parametro</label>
                      <input type="text" class="form-control"  name="nompar" placeholder="ingrse Nombre " required>
                    </div>

                      <div class="box-footer">
                         <button type="submit" class="btn btn-primary">Guardar</button> 
                    </div>
                    <br>
                    <br>
                    
                    <br>
                
                </div>
            </form>
           </div>
          <!-- /.box -->
        </div>
         <!-- Right column -->
        <div class="col-md-6">
                      
          <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Registro del detalle de Parametros</h3>
            </div>
            <!-- /.box-header -->
            <form role="form" action="../Control/control_detalle_parametro.php" method="POST">
                <div class="box-body">
                  <div class="form-group">
                      <label>Seleciona el Tipo </label>
                       <select class="form-control" name="tipoParam">
                       <option>-----Seleccione-----</option>
                        <?php 
                         $marca = new Parametros();
                         $marcass=$marca->get_parametros();
                         while($marcas=mysql_fetch_array($marcass)){  
                             ?>
                                  <option value="<?php echo $marcas['PAR_C_CODIGO']?>"><?php echo $marcas['PAR_D_NOMBRE']?></option>
                                             
                          <?php }?>
                        </select>
                    </div>
                    <div class="form-group">
                      <label>Nombre </label>
                      <input type="text" name="NdetParametro" class="form-control" placeholder="ingrse Nombre " required>
                    </div>
                    <div class="form-group">
                      <label>Descripción</label>
                      <input type="text" name="Desccripcion" class="form-control" placeholder="ingrse Descripción " required>
                    </div>
                      <div class="box-footer">
                         <button type="submit" class="btn btn-success">Guardar</button> 
                    </div>
                
                </div>
            </form>
           </div>
          <!-- /.box -->
        </div>
        <div class="col-md-12">
                      
          <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Lista del Registro  detalle de Parametros</h3>
            </div>
            <!-- /.box-header -->
            <form role="form" action="control_regitro_parametro.php">
                <div class="box-body">
                  
                     <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#ID</th>
                  <th>Detalle del Parametro</th>
                  <th>Parametros</th>
                  <th style="width: 40px">Label</th>
                </tr>
                <?php 
                $param = new Parametros();
                         $dpa=$param->get_Allparametros();
                         while($lista=mysql_fetch_array($dpa)){  
                             ?>
                                <tr>
                            <td><?php echo $lista[0]?></td>
                            <td><?php echo $lista[1]?></td>
                            <td><?php echo $lista[2]?></td>
                            <td><?php echo $lista[3]?></td>
                          </tr>             
                          <?php }?>
                      
              </table>         
              </div>
            </form>
           </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<?php 
@include_once('links/ajustes_generales.php');
@include_once('links/scrips.php');
@include_once('links/inferior_depues_cuerpo.php');?>