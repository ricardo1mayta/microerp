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

    
      
        echo $numrows = $row['numrows'];
     

    $total_pages = ceil($numrows/$per_page);
    $reload = 'index.php';
    //consulta principal para recuperar los datos
     $seccc = new Secciones();
    $query =$seccc->secciones();
    
    if ($numrows>0){
      ?>
     <table id="" class="table table-bordered table-hover">
                <thead>
                <tr>
                  
                  
                  <th>Categoria</th>
                  <th>Titulo</th>
                  <th>Descripción</th>
                  <th>Responsable</th>
                  <th>Carga</th>
                  <th>Avance</th>
                   <th align="center">+</th>
                </tr>
                </thead>
                <tbody>
                 <?php 
                    while($lista=mysql_fetch_array($query)){ ?>
                             
                      <tr>
                       
                        <td><?php echo $lista['PAR_D_NOMBRE']?></td>
                        <td><?php echo $lista['ETA_D_NOMBRE']?></td>
                        <td><?php echo $lista['ETA_D_DESCRIPCION']?></td>
                        <td><?php echo $lista['US_D_NOMBRE']?></td>
                        <td><?php echo $lista['CARGA']."%"?></td>
                        
                        <td>
                          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#dataUpdate" data-id="<?php echo $lista['ETA_C_CODIGO']?>"  data-categoria="<?php echo $lista['PAR_D_NOMBRE']?>" data-titulo="<?php echo $lista['ETA_D_NOMBRE']?>" data-descripcion="<?php echo $lista['ETA_D_DESCRIPCION'];?>" data-responsable="<?php echo $lista['US_D_NOMBRE']?>"><i class='glyphicon glyphicon-edit'></i> Modificar</button>
                          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#dataDelete" data-id="<?php echo $row['id']?>"  ><i class='glyphicon glyphicon-trash'></i> Eliminar</button>
                        </td>
                        <td>
                            <div class="text-center" >
                              <input type="text" class="knob" value="<?=(Double)$lista["AVANCE"];?>" data-width="50" data-height="50" data-fgColor="#3c8dbc" data-readonly="true">

                              <div class="knob-label"></div>
                            </div>
                        </td>
                         <td><a  href="registro_actividades.php?noms=<?php echo $lista['ETA_C_CODIGO']?>" class="btn btn-success"><i class="fa fa-plus" ></i></a> 
                       
                        </td>
                        <td> <a  title="Editar"  class='btn btn-warning' onclick="newWindow(this.href, 'popup', 1000, 300, 1, 1, 0, 0, 0, 1, 0); return false;" target="_blank" href="modificar_secccion.php?id=<?php echo $lista['ETA_C_CODIGO']?>" ><i class="fa fa-pencil-square-o" aria-hidden="true" ></i></a>
                        </td>
                         <td> <a  class='btn btn-danger' onClick="window.open(this.href, this.target, 'width=800,height=400'); return false;" href="modificar_secccion.php?id=<?php echo $lista['ETA_C_CODIGO']?>" ><i class="fa fa-minus"></i></a>

                         <a href="go_mensaje.php?id=4" onclick="newWindow(this.href, 'popup', 450, 400, 1, 1, 0, 0, 0, 1, 0); return false;" target="_blank">e</a>
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
?>
