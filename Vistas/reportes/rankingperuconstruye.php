<?php include(HTML_DIR . '/template/titulo.php'); ?>
<?php include(HTML_DIR . '/template/links.php'); ?>

<?php include(HTML_DIR . '/template/header_menu.php'); ?>
<?php  

   ?>
  <div class="content-wrapper" >
	 <section class="content-header">
      <h1>
        Ranking Perú Construye
        <small>Ediciones <?=date("Y");?></small>
      </h1>
     
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <?php 
        $cate = new rankingVentas();
                         $categoria=$cate->get_productosañoactual('4');
                         while($cat=$categoria->fetch_array()){  


         ?>
        <div class="col-md-4">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"><?=$cat['PRO_D_NOMBRE']?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">Ejecutiva</th>
                  <th>Vendido</th>
                  <th>Meta Ventas</th>
                  <th style="width: 40px">Progreso</th>
                </tr>
                <?php 
                  $totalmetas=0;
                  $totalventas=0;
                   $ran = new rankingVentas();
                         $ra=$ran->get_rankingventas($cat['PRO_C_CODIGO']);
                         while($lista=$ra->fetch_array()){
                            $totalmetas=$totalmetas+$lista['metaventas'];
                            $totalventas=$totalventas+$lista['monto'];
                 ?>
                <tr>
                  <td><?=$lista['nombre']?></td>
                  <td><?=$lista['monto']?></td>
                  <td><?=$lista['metaventas']?></td>
                  <td>
                    <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-green" style="width: <?=number_format($lista['monto']/$lista['metaventas']*100,0)?>%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-green"><?=number_format($lista['monto']/$lista['metaventas']*100,0)?>%</span></td>
                </tr>
                <?php }?> 
                <tr>
                  <td>Totales</td>
                  <td><?=$totalventas?></td>
                  <td><?=$totalmetas?></td>
                  <td>
                    <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-green" style="width: <?=number_format($totalventas/$totalmetas*100,0)?>%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-green"><?=number_format($totalventas/$totalmetas*100,0)?>%</span></td>
                </tr>   
                 <tr>
                 
                  <td colspan="2">Fecha de Cierre</td>
                  <td colspan="2"><?=$cat['PRO_F_FECHAFINAL']?></td>
                </tr>            
              </table>
            </div>
            <!-- /.box-body -->           
          </div>
          <!-- /.box -->
        </div>
        
        <?php   
                        } ?>
      </div>
  </div>

<?php include(HTML_DIR . '/template/ajustes_generales.php'); ?>
<?php include(HTML_DIR . '/template/scrips.php'); ?>
<?php include(HTML_DIR . '/template/inferior_depues_cuerpo.php'); ?>
