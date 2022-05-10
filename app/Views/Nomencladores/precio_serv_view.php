<!DOCTYPE html>
<html lang="en">.

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Precio de servicios</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>/public/tema_tesis/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/public/tema_tesis/plugins/fontawesome-free/css/styles.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url() ?>/public/tema_tesis/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/public/tema_tesis/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/public/tema_tesis/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>/public/tema_tesis/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/public/tema_tesis/dist/css/toastr.min.css">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="../../index3.html" class="nav-link">Inicio</a>
        </li>
      </ul>
      <!-- parte del perfil-->
      <div class="dropdown ml-auto">
        <button class="btn btn-whithe dropdown-toggle fas fa-user" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Perfil
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="#"><i class="fas fa-envelope"></i> <?= session('email'); ?></a>
          <a class="dropdown-item" href="#"><i class="fas fa-cog"></i> Cambiar contraseña</a>
          <a class="dropdown-item" href="<?= base_url('index.php/Login/salir/') ?>"><i class="fas fa-power-off"></i> Salir</a>
        </div>
      </div>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-success elevation-4">
      <!-- Brand Logo -->
      <a href="../../index3.html" class="brand-link">
        <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a>
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Buscar" aria-label="Buscar">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <li class="nav-item">
              <a href="#" class="nav-link">
                <p>
                  Nomencladores
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url() ?>/index.php/Nom_Departamentos" class="nav-link">
                    <p>Departamentos</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url() ?>/index.php/Nom_Clientes" class="nav-link">
                    <p>Clientes</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url() ?>/index.php/Nom_Estados" class="nav-link">
                    <p>Estados</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url() ?>/index.php/Nom_Frecuencia" class="nav-link">
                    <p>Fecuencia</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url() ?>/index.php/Nom_Moneda" class="nav-link">
                    <p>Moneda</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url() ?>/index.php/Nom_Servicios" class="nav-link">
                    <p>Servicios</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url() ?>/index.php/Nom_Precio_serv" class="nav-link">
                    <p>Precio de servicios</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url() ?>/index.php/Nom_Tecnicos/" class="nav-link">
                    <p>Técnicos</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url() ?>/index.php/Nom_Uni_medida" class="nav-link">
                    <p>Unidad de medida</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <p>
                  Reportes
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url() ?>/index.php/Reportes" class="nav-link">
                    <p>Reportes</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <p>
                  Seguridad
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url() ?>/index.php/Admin_sist" class="nav-link">
                    <p>Gestión de usuarios</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url() ?>/index.php/Rep_ordTrab" class="nav-link">
                    <p>Trazas</p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
          </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Precio de servicios</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <!-- Main content -->
      <section class="content">

        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <button type="button" class="float-right btn btn-success mr-1" data-toggle="modal" data-target="#addModal">Agregar <span class="fas fa-plus"></span></button>
                </div>
              </div>
            </div>
            <!--Modal ADD-->
            <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true" role="dialog">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header d-block">
                    <h3 class="modal-title text-center" id="addModal">Agregar precio al servicio</h3>
                  </div>
                  <div class="modal-body">
                    <form id="addPrec_serv" name="addPrec_serv" action="<?php echo site_url('Nom_Precio_serv/add'); ?>" method="post">
                      <div class="row">
                        <div class="col-12 col-sm-6">
                          <label for="inputState">Servicio:</label>
                          <select id="servicio" name="servicio" class="form-control">
                            <option selected>Seleccione un servicio</option>
                            <?php foreach ($serv as $key) : ?>
                              <option value="<?= $key['id_servicio']; ?>"><?= $key['nombre']; ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                        <div class="col-12 col-sm-6">
                          <label for="inputState">Moneda:</label>
                          <select id="sigla" name="sigla" class="form-control">
                            <option selected>Seleccione una moneda</option>
                            <?php foreach ($mon as $key) : ?>
                              <option value="<?= $key['id_moneda']; ?>"><?= $key['sigla']; ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                        <div class="col-12">
                          <div class="form-group">
                            <label for="text">Precio:</label>
                            <input required type="text" name="precio" class="form-control precio" id="precio" placeholder="Precio">
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success fa fa-floppy">Guardar</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- FIN Modal ADD-->
            
            <!--INICIO DEL MODAL UPDATE-->
            <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true" role="dialog">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header d-block">
                    <h3 class="modal-title text-center" id="updateModal">Actualizar el precio del servicio</h3>
                  </div>
                  <div class="modal-body">
                    <form id="updatePrec_serv" name="updatePrec_serv" action="<?php echo site_url('Nom_Precio_serv/update'); ?>" method="post">
                      <input type="hidden" name="id_prec_serv" id="id_prec_serv" />
                      <div class="row">
                        <div class="col-12 col-sm-6">
                          <label for="inputState">Servicio:</label>
                          <select id="servicio" name="servicio" class="form-control">
                            <option selected>Seleccione un servicio</option>
                            <?php foreach ($serv as $key) : ?>
                              <option value="<?= $key['id_servicio']; ?>"><?= $key['nombre']; ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                        <div class="col-12 col-sm-6">
                          <label for="inputState">Moneda:</label>
                          <select id="sigla" name="sigla" class="form-control">
                            <option selected>Seleccione una moneda</option>
                            <?php foreach ($mon as $key) : ?>
                              <option value="<?= $key['id_moneda']; ?>"><?= $key['sigla']; ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                        <div class="col-12">
                          <div class="form-group">
                            <label for="text">Precio:</label>
                            <input required type="text" name="precio" class="form-control precio" id="precio" placeholder="Precio">
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="updtbtn btn btn-success">Actualizar</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- FIN Modal UPDATE-->

            <!--INICIO DEL MODAL SHOW-->
            <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="showModalLabel" aria-hidden="true" role="dialog">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header d-block">
                    <h3 class="modal-title text-center" id="showModal">Detalles del precio del servicio</h3>
                  </div>
                  <div class="modal-body">
                    <form id="showPrec_serv" name="showPrec_serv" action="<?php echo site_url('Nom_Precio_serv/show'); ?>" method="post">
                      <input type="hidden" name="id_prec_serv" id="id_prec_serv" />
                      <div class="row">
                        <div class="col-12 col-sm-6">
                          <label for="inputState">Servicio:</label>
                          <select id="servicio" name="servicio" class="form-control">
                            <option selected>Seleccione un servicio</option>
                            <?php foreach ($serv as $key => $serv) : ?>
                              <option disabled value="<?= $serv['id_servicio']; ?>"><?= $serv['nombre']; ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                        <div class="col-12 col-sm-6">
                          <label for="inputState">Moneda:</label>
                          <select id="sigla" name="sigla" class="form-control">
                            <option selected>Seleccione una moneda</option>
                            <?php foreach ($mon as $key => $mon) : ?>
                              <option disabled value="<?= $mon['id_moneda']; ?>"><?= $mon['sigla']; ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                        <div class="col-12">
                          <div class="form-group">
                            <label for="text">Precio:</label>
                            <input type="text" disabled name="precio" class="form-control codigo" id="precio" placeholder="Codigo">
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- FIN Modal SHOW-->
          </div>
          <div class="card">
            <div class="card-header">
              <!-- <h3 class="card-title">Departamentos</h3> -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th class="text-sm-center">Precio</th>
                    <th class="text-sm-center">Sigla</th>
                    <th class="text-sm-center">Nombre del servicio</th>
                    <th class="text-sm-center">Operaciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($precio_serv as $key) : ?>
                    <tr id_area="<?php echo $key['id_prec_serv']; ?>">
                      <td class="text-sm-center"><?php echo $key['precio']; ?></td>
                      <td class="text-sm-center"><?php echo $key['sigla']; ?></td>
                      <td class="text-sm-center"><?php echo $key['nombre']; ?></td>
                      <td class="text-sm-center">
                        <button title="Editar" data-id="<?php echo $key['id_prec_serv']; ?>" class="btn btn-warning btnEdit"><span class="fa fa-edit"></span></button>
                        <button title="Eliminar" data-id="<?php echo $key['id_prec_serv']; ?>" class="btn btn-danger btnDelete"><span class="fa fa-times"></span></button>
                        <button title="Detalles" data-id="<?php echo $key['id_prec_serv']; ?>" class="btn btn-primary btnShow"><span class="fa fa-search-plus"></span></button>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- FIN Modal UPDATE-->
    </div>
  </div>
  </div>
  </section>

  </div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="<?= base_url() ?>/public/tema_tesis/plugins/jquery/jquery.min.js"></script>
  <script src="<?= base_url() ?>/public/tema_tesis/plugins/jquery/jquery.validate.js"></script>
  <script src="<?= base_url() ?>/public/tema_tesis/plugins/jquery/sweetalert.min.js"></script>


  <!-- Bootstrap 4 -->
  <script src="<?= base_url() ?>/public/tema_tesis/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="<?= base_url() ?>/public/tema_tesis/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>/public/tema_tesis/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url() ?>/public/tema_tesis/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?= base_url() ?>/public/tema_tesis/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="<?= base_url() ?>/public/tema_tesis/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?= base_url() ?>/public/tema_tesis/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="<?= base_url() ?>/public/tema_tesis/plugins/jszip/jszip.min.js"></script>
  <script src="<?= base_url() ?>/public/tema_tesis/plugins/pdfmake/pdfmake.min.js"></script>
  <script src="<?= base_url() ?>/public/tema_tesis/plugins/pdfmake/vfs_fonts.js"></script>
  <script src="<?= base_url() ?>/public/tema_tesis/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="<?= base_url() ?>/public/tema_tesis/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="<?= base_url() ?>/public/tema_tesis/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url() ?>/public/tema_tesis/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?= base_url() ?>/public/tema_tesis/dist/js/demo.js"></script>
  <!-- Page specific script -->

  <!-- Carga js precio_serv -->
  <script src="<?= base_url() ?>/public/tema_tesis/dist/js/cruds/precio_serv.js"></script>
  <script src="<?= base_url() ?>/public/tema_tesis/dist/js/toastr.min.js"></script>
</body>

</html>