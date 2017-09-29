 <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
         
              
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <?php 
              echo "<img src=../Public/img/Usuarios/". $usuario['US_I_IMAGEN']." class='user-image' alt='User Image' >";
              ?>
              
              <span class="hidden-xs"><?php 
                  echo $usuario['US_D_NOMBRE']." " .$usuario['US_D_APELL'];
                ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
               <?php 
              echo "<img src=../Public/img/Usuarios/". $usuario['US_I_IMAGEN']." class='img-circle' alt='User Image' >";
              ?>
                <p><?php 
                  echo $usuario['US_D_NOMBRE']." " .$usuario['US_D_APELL'];
                  echo"<small> Desde: ".$usuario['US_F_FECHAINGRESO']."</small>" ?></p>
                <p>
                  
                  
                </p>
              </li>
              
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Tareas</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Informes</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Ediciones</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="../" class="btn btn-default btn-flat">Salir</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>