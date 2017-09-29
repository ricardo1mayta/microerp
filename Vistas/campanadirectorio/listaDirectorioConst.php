<?php include_once(HTML_DIR . '/template/titulo.php'); ?>
<?php include_once(HTML_DIR . '/template/links.php'); ?>
<?php include_once(HTML_DIR . '/template/css_calendar.php'); ?>
<?php include_once(HTML_DIR . '/template/header_menu.php'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <?php  if(isset($sms)){ echo $sms; }?>
      <h1>
      Directorio
        <small></small>
         
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h4 class="box-title">Lista del Directorio</h4>
              <div class="box-tools pull-right">
               <a class="btn btn-info" href="http://grupodigamma.com/sys/Vistas/campanadirectorio/exportarcampanadirectorioCons.php
">Exportar Data</a>
               
              </div>
            </div>
            
            <div class="box-body">
           
            	
            	<table  class="table table-bordered">
					<tr>
					  <th>EMPRESA</th>
					  <th>SECTOR</th>
					  <th>CATEGORIA</th>
					  <th>RUBRO</th>
            <th>SUB-RUBRO</th>
					  <th>NOMBRE DIRECTORIO</th>
            <th>PAGANTE</th>
					  <th>AGREGA</th>
					  <th>MODIFICA</th>
					</tr> 
					<?php  
						$d=new Directorio();
						$dir=$d->get_directorioexportcons1();
						while($row=$dir->fetch_array()){ ?>	
						<tr> 
							<td><?php echo $row['Empresa']?></td>  
							<td><?php echo $row['Sector']?></td>  
							<td><?php echo $row['Categoria']?></td>  
							<td><?php echo $row['Rubro']?></td>  
              <td><?php echo $row['SubRubro']?></td> 
							<td><?php echo $row['NombreDirectorio']?></td>
              <td><?php echo $row['Pagante']?></td> 
							<td><?php echo $row['AGREGADO']?></td> 
							<td><?php echo $row['MODIFICA']?></td>   
						</tr> 

				<?php } ?>
				</table> 
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
         </div>

      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include_once(HTML_DIR . '/template/footer.php'); ?> 

<?php include_once(HTML_DIR . '/template/ajustes_generales.php'); ?>
<?php include_once(HTML_DIR . '/template/scrips.php'); ?>
<?php include_once(HTML_DIR . '/template/scrip_calendar.php'); ?>
<?php include_once(HTML_DIR . '/template/inferior_depues_cuerpo.php'); ?>
