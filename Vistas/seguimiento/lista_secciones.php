<?php

      @include('links/titulo.php'); 
      //@include('links/links.php');
     // @include("../Entidades/generico.php");
     // @include("../Entidades/parametros.php");
     // @include("../Entidades/detParametros.php");
     // @include("../Entidades/producto.php");
     // @include("../Entidades/usuario.php");
     // @include("../Entidades/proyecto.php");
      @include("../Entidades/secciones.php");
  # conectare la base de datos
   
   
   
  $action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
  if($action == 'ajax'){
    include 'pagination.php'; //incluir el archivo de paginación
    //las variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
    $per_page = 5; //la cantidad de registros que desea mostrar
    $adjacents  = 4; //brecha entre páginas después de varios adyacentes
    $offset = ($page - 1) * $per_page;
    //Cuenta el número total de filas de la tabla*/
    $secc = new Secciones();
    $row=$secc->get_numSecciones();

    
      
        $numrows = $row['numrows'];
     //echo "<h3> Cantidad de Seciones : ".$numrows." </h3>";

    $total_pages = ceil($numrows/$per_page);
    $reload = 'index.php';
    //consulta principal para recuperar los datos
     
    $query =$secc->secciones();
    
    if ($numrows>0){
      ?>
     <table id="" class="table table-bordered table-hover">
                <thead>
                <tr>
                  
                  <th>#</th>
                  <th>Categoria</th>
                  <th>Titulo</th>
                  <th>Descripción</th>
                  <th>Responsable</th>
                  <th>Carga</th>
                  <th colspan="3">Avance</th>
                   <th align="center">Mantenimientos</th>
                </tr>
                </thead>
                <tbody>
                 <?php 
                  $i=0;
                    while($lista=mysql_fetch_array($query)){ ?>
                             
                      <tr>
                       <td><?php echo $i=$i+1; ?></td>
                        <td><?php echo $lista['PAR_D_NOMBRE']?></td>
                        <td><?php echo $lista['ETA_D_NOMBRE']?></td>
                        <td><?php echo $lista['ETA_D_DESCRIPCION']?></td>
                        <td><?php echo $lista['US_D_NOMBRE']?></td>
                        <td><?php echo $lista['CARGA']."%"?></td>
                      
                        <td>
                            <div class="text-center" >
                              <input type="text" class="knob" value="<?=(Double)$lista["AVANCE"];?>" data-width="50" data-height="50" data-fgColor="#3c8dbc" data-readonly="true">

                              <div class="knob-label"></div>
                            </div>
                        </td>
                         <td><a  href="registro_actividades.php?noms=<?php echo $lista['ETA_C_CODIGO']?>" class="btn btn-success"><i class="fa fa-plus" ></i></a> 
                       
                        </td>
                        <td> <button type="button" class="btn btn-info" data-toggle="modal" data-target="#dataUpdate" data-id="<?php echo $lista['ETA_C_CODIGO']?>"  data-categoria="<?php echo $lista['PAR_D_NOMBRE']?>" data-titulo="<?php echo $lista['ETA_D_NOMBRE']?>" data-descripcion="<?php echo $lista['ETA_D_DESCRIPCION'];?>" data-responsable="<?php echo $lista['US_D_NOMBRE']?>"><i class="fa fa-pencil-square-o" aria-hidden="true" ></i></button>
                        </td>
                         <td> <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#dataDelete" data-id="<?php echo $row['id']?>"  ><i class='glyphicon glyphicon-trash'></i> </button>
                        </td>

                        
                        </td>
                      </tr>
                  <?php 
                    }
                  ?>
                
                </tbody>
                
              </table>
    <div class="table-pagination pull-right">
      <?php echo paginate($reload, $page, $total_pages, $adjacents);?>
    </div>
    
      <?php
      
    } else {
      ?>
      <div class="alert alert-warning alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4>Aviso!!!</h4> No hay datos para mostrar
            </div>
      <?php
    }
  }

@include_once('links/scrip_chart.php');
?>