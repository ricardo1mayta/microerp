</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="http://www.digammaperu.com" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>G</b>Dg</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Grupo DIGAMMA</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
            <!-- Tasks: style can be found in dropdown.less -->
             <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success">4</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 4 messages</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- start message -->
                        <a href="#">
                          <div class="pull-left">
                             <?php echo "<img src=../Public/img/Usuarios/". $usuario['US_I_IMAGEN']." class='user-image' alt='User mage' >"; ?>
                          </div>
                          <h4>
                            Support Team
                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <!-- end message -->
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="../../dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            AdminLTE Design Team
                            <small><i class="fa fa-clock-o"></i> 2 hours</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="../../dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Developers
                            <small><i class="fa fa-clock-o"></i> Today</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="../../dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Sales Department
                            <small><i class="fa fa-clock-o"></i> Yesterday</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="../../dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Reviewers
                            <small><i class="fa fa-clock-o"></i> 2 days</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
             </li>
             <li class="dropdown notifications-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                <span class="label label-warning">10</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">Tienes 10 Notificaciones</li>
                <li>
                  <!-- inner menu: contains the actual data -->
                  <ul class="menu">
                    <li>
                      <a href="#">
                        <i class="fa fa-users text-aqua"></i> 5  Empresas por hacer seguimiento
                      </a>
                    </li>
                   
                    <li>
                      <a href="#">
                        <i class="fa fa-users text-red"></i> 5 Empresas Adicionadas
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-shopping-cart text-green"></i> 5 Ventas concretadas
                      </a>
                    </li>
                    
                  </ul>
                </li>
                <li class="footer"><a href="#">Ver Todo</a></li>
              </ul>
            </li>
            <li class="dropdown tasks-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-flag-o"></i>
                <span class="label label-danger">9</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">Tienes 9 tareas por hacer</li>
                <li>
                  <!-- inner menu: contains the actual data -->
                  <ul class="menu">
                    <li><!-- Task item -->
                      <a href="#">
                        <h3>
                          Design some buttons
                          <small class="pull-right">20%</small>
                        </h3>
                        <div class="progress xs">
                          <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">20% Complete</span>
                          </div>
                        </div>
                      </a>
                    </li>
                    <!-- end task item -->
                    <li><!-- Task item -->
                      <a href="#">
                        <h3>
                          Create a nice theme
                          <small class="pull-right">40%</small>
                        </h3>
                        <div class="progress xs">
                          <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">40% Complete</span>
                          </div>
                        </div>
                      </a>
                    </li>
                    <!-- end task item -->
                    <li><!-- Task item -->
                      <a href="#">
                        <h3>
                          Some task I need to do
                          <small class="pull-right">60%</small>
                        </h3>
                        <div class="progress xs">
                          <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">60% Complete</span>
                          </div>
                        </div>
                      </a>
                    </li>
                    <!-- end task item -->
                    <li><!-- Task item -->
                      <a href="#">
                        <h3>
                          Make beautiful transitions
                          <small class="pull-right">80%</small>
                        </h3>
                        <div class="progress xs">
                          <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">80% Complete</span>
                          </div>
                        </div>
                      </a>
                    </li>
                    <!-- end task item -->
                  </ul>
                </li>
                <li class="footer">
                  <a href="#">View all tasks</a>
                </li>
              </ul>
            </li>
                
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
     
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          |   <?php 
             echo "<img src=../Public/img/Usuarios/". $usuario['US_I_IMAGEN']." class='img-circle' alt='User Image' >";
              ?>
          
        </div>
        <div class="pull-left info">
          <p><?php 
              echo $usuario['US_D_NOMBRE']." " .$usuario['US_D_APELL'];
              ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> En linea</a>
          <br>
        </div>
      </div>
      

      <!-- sidebar menu:con mysql : style can be found in sidebar.less -->
        <?php include('menu_navegacion.php') ?>

     
  </aside>
