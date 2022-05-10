<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Reportes</title>

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

  <link rel="stylesheet" href="<?= base_url() ?>/public/tema_tesis/dist/css/dualist.scss">

  <link rel="" href="https://cdn.datatables.net/fixedheader/3.1.6/css/fixedHeader.dataTables.min.css">

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
          <a class="dropdown-item" href="#"><i class="fas fa-envelope"></i> <?= session(
                                                                              'email'
                                                                            ) ?></a>
          <a class="dropdown-item" href="#"><i class="fas fa-cog"></i> Cambiar contraseña</a>
          <a class="dropdown-item" href="<?= base_url(
                                            'index.php/Login/salir/'
                                          ) ?>"><i class="fas fa-power-off"></i> Salir</a>
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
        <?php if (session('fk_id_rol') == 1) : ?>
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
                  <li class="nav-item">
                    <a href="<?= base_url() ?>/index.php/Rep_histRep" class="nav-link">
                      <p>Historial de estado <br>
                        del reporte </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url() ?>/index.php/Rep_ordTrab" class="nav-link">
                      <p>Reporte de la <br>
                        orden de trabajo</p>
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

        <?php elseif (
          session('fk_id_rol') == 3 ||
          session('fk_id_rol') == 7
        ) : ?>
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


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
                  <li class="nav-item">
                    <a href="<?= base_url() ?>/index.php/Rep_histRep" class="nav-link">
                      <p>Historial de estado <br>
                        del reporte </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url() ?>/index.php/Rep_ordTrab" class="nav-link">
                      <p>Reporte de la <br>
                        orden de trabajo</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
            </li>
            </ul>
          </nav>
        <?php else : ?>
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
                  <li class="nav-item">
                    <a href="<?= base_url() ?>/index.php/Rep_histRep" class="nav-link">
                      <p>Historial de estado <br>
                        del reporte </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url() ?>/index.php/Rep_ordTrab" class="nav-link">
                      <p>Reporte de la <br>
                        orden de trabajo</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
            </li>
            </ul>
          </nav>
        <?php endif; ?>
        <!-- /.sidebar-menu    -->
      </div>
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Reportes</h1>
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
                    <h3 class="modal-title text-center" id="addModal">Agregar reporte</h3>
                  </div>
                  <div class="modal-body">
                    <form id="addReporte" name="addReporte" action="<?php echo site_url(
                                                                      'Reportes/add'
                                                                    ); ?>" method="post">
                      <div class="row">
                        <div class="col-12 col-sm-6">
                          <label for="inputState">Cliente:</label>
                          <select id="cliente" name="cliente" class="form-control">
                            <option selected>Seleccione un cliente</option>
                            <?php foreach ($cliente as $key) : ?>
                              <option value="<?= $key['id_cliente'] ?>"><?= $key['nombre'] ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                        <div class="col-12 col-sm-6">
                          <label for="inputState">Estado:</label>
                          <select id="estado" name="estado" class="form-control">
                            <option selected>Seleccione una estado</option>
                            <?php foreach ($estado as $key) : ?>
                              <option value="<?= $key['id_estado'] ?>"><?= $key['nombre'] ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                        <div class="col-12 col-sm-6">
                          <label for="inputState">Área:</label>
                          <select id="area" name="area" class="form-control">
                            <option selected>Seleccione una área</option>
                            <?php foreach ($area as $key) : ?>
                              <option value="<?= $key['id_area'] ?>"><?= $key['nombre'] ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                        <div class="col-12 col-sm-6">
                          <div class="form-group">
                            <label for="text">Fecha:</label>
                            <input required type="date" name="fecha" class="form-control fecha" id="fecha" placeholder="Fecha">
                          </div>
                        </div>
                        <div class="col-lg-12 col-sm-6">
                          <div class="form-group">
                            <label for="text">Descripción:</label>
                            <div class="col-lg-12 col-sm-6">
                              <textarea name="descripcion" id="descripcion" cols="47" rows="5"></textarea>
                            </div>
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

            <!--MODAL UPDATE-->
            <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true" role="dialog">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header d-block">
                    <h3 class="modal-title text-center" id="updateModal">Actualizar reporte</h3>
                  </div>
                  <div class="modal-body">
                    <form id="updateReporte" name="updateReporte" action="<?php echo site_url(
                                                                            'Reportes/update'
                                                                          ); ?>" method="post">
                      <input type="hidden" name="id_reporte" id="id_reporte" />
                      <input type="hidden" name="codigo" id="codigo" />
                      <div class="row">
                        <div class="col-12 col-sm-6 hidden">
                          <label for="inputState">Cliente:</label>
                          <select id="cliente" name="cliente" class="form-control">
                            <option selected>Seleccione un cliente</option>
                            <?php foreach ($cliente as $key) : ?>
                              <option value="<?= $key['id_cliente'] ?>"><?= $key['nombre'] ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                        <div class="col-12 col-sm-6">
                          <label for="inputState">Estado:</label>
                          <select id="estado" name="estado" class="form-control">
                            <option selected>Seleccione una estado</option>
                            <?php foreach ($estado as $key) : ?>
                              <option value="<?= $key['id_estado'] ?>"><?= $key['nombre'] ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                        <div class="col-12 col-sm-6">
                          <label for="inputState">Área:</label>
                          <select id="area" name="area" class="form-control">
                            <option selected>Seleccione una área</option>
                            <?php foreach ($area as $key) : ?>
                              <option value="<?= $key['id_area'] ?>"><?= $key['nombre'] ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                        <div class="col-12 col-sm-6">
                          <div class="form-group">
                            <label for="text">Fecha:</label>
                            <input required type="date" name="fecha" class="form-control fecha" id="fecha" placeholder="Fecha">
                          </div>
                        </div>
                        <div class="col-12 col-sm-6">
                          <div class="form-group">
                            <label for="text">Descripción:</label>
                            <div class="col-lg-12 col-sm-6">
                              <textarea name="descripcion" id="descripcion" cols="47" rows="5"></textarea>
                            </div>
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

            <!--MODAL CANCELAR-->
            <div class="modal fade" id="cancelarModal" tabindex="-1" aria-labelledby="cancelarModalLabel" aria-hidden="true" role="dialog">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header d-block">
                    <h3 class="modal-title text-center" id="cancelarModal">Cancelar reporte</h3>
                  </div>
                  <div class="modal-body">
                    <form id="Cancelar" name="Cancelar" action="<?php echo site_url(
                                                                  'Reportes/cancelar'
                                                                ); ?>" method="post">
                      <input type="hidden" name="id_reporte" id="id_reporte" />
                      <input type="hidden" name="codigo" id="codigo" />
                      <div class="row">

                        <div class="col-12">
                          <div class="form-group">
                            <label for="text">Motivo por el cual se cancela el reporte:</label>
                            <div class="col-lg-12 col-sm-6">
                              <textarea name="descripcion" id="descripcion" cols="53" rows="5"></textarea>
                            </div>
                          </div>
                          <div class="col-lg-12 col-sm-6">
                            <div class="form-group">
                              <label for="text">Fecha de cancelación:</label>
                              <input required type="date" name="fecha_canc" class="form-control fecha" id="fecha_canc" placeholder="Fecha">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="updtbtn btn btn-success">Guardar</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- FIN Modal CANCELAR-->

            <!--MODAL Asignar tecnico-->
            <div class="modal fade" id="Asig_tec_Modal" tabindex="-1" aria-labelledby="Asig_tec_ModalLabel" aria-hidden="true" role="dialog">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header d-block">
                    <h3 class="modal-title text-center" id="updateModal">Asignar Técnico</h3>
                  </div>
                  <div class="modal-body">
                    <form id="asig_tec_Reporte" name="asig_tec_Reporte" action="<?php echo site_url(
                                                                                  'Reportes/asig_tecnico'
                                                                                ); ?>" method="get">
                      <input type="hidden" name="id_reporte" id="id_reporte" />
                      <div class="row">

                        <div class="container">

                          <div class="row" style="margin-bottom: 40px;">
                            <div class="col">
                              <form id="demoform">
                                <select multiple="multiple" size="10" name="duallistbox_demo1[]" title="duallistbox_demo1[]">
                                  <?php foreach ($tecnico as $key) : ?>
                                    <option value="<?= $key['id_tecnico'] ?>"><?= $key['nombre'] ?></option>
                                  <?php endforeach; ?>

                                </select>
                                <br>

                                <div class="col-lg-12 col-sm-6">
                                  <div class="form-group">
                                    <label for="text">Fecha de asignación:</label>
                                    <input required type="date" name="fecha_asig" class="form-control fecha" id="fecha_asig" placeholder="Fecha">
                                  </div>
                                </div>
                                <div class="row justify-content-center">
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="updtbtn btn btn-success">Asignar</button>
                                  </div>
                              </form>
                            </div>
                          </div>
                        </div>

                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- FIN Modal Asignar tecnico-->

            <!--MODAL Cerrar-->
            <div class="modal fade" id="CerrarModal" tabindex="-1" aria-labelledby="CerrarModalLabel" aria-hidden="true" role="dialog">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header d-block">
                    <h3 class="modal-title text-center" id="cancelarModal">Cerrar reporte</h3>
                  </div>
                  <div class="modal-body">
                    <form id="Cerrar" name="Cerrar" action="<?php echo site_url(
                                                              'Reportes/cerrar'
                                                            ); ?>" method="post">
                      <input type="hidden" name="id_reporte" id="id_reporte" />
                      <div class="row">

                        <div class="col-12">
                          <div class="col-lg-12 col-sm-6">
                            <div class="form-group">
                              <label for="text">Fecha de cierre:</label>
                              <input required type="date" name="fecha_cierre" class="form-control fecha" id="fecha_cierre" placeholder="Fecha">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="updtbtn btn btn-success">Guardar</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- FIN Modal Cerrar-->

            <!--MODAL SHOW-->
            <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="showModalLabel" aria-hidden="true" role="dialog">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header d-block">
                    <h3 class="modal-title text-center" id="showModal">Detalles del reporte</h3>
                  </div>
                  <div id="imprime" class="modal-body">
                    <form id="showReporte" name="showReporte" method="post">
                      <input type="hidden" name="id_reporte" id="id_reporte" />
                      <div class="row">
                        <div class="col-12 col-sm-6">
                          <label for="inputState">Cliente:</label>
                          <select id="cliente" name="cliente" class="form-control">
                            <option selected>Seleccione un cliente</option>
                            <?php foreach ($cliente as $key => $cliente) : ?>
                              <option disabled value="<?= $cliente['id_cliente'] ?>"><?= $cliente['nombre'] ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                        <div class="col-12 col-sm-6">
                          <label for="inputState">Estado:</label>
                          <select id="estado" name="estado" class="form-control">
                            <option selected>Seleccione una estado</option>
                            <?php foreach ($estado as $key) : ?>
                              <option disabled value="<?= $key['id_estado'] ?>"><?= $key['nombre'] ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                        <div class="col-12 col-sm-6">
                          <label for="inputState">Área:</label>
                          <select id="area" name="area" class="form-control">
                            <option selected>Seleccione una área</option>
                            <?php foreach ($area as $key) : ?>
                              <option disabled value="<?= $key['id_area'] ?>"><?= $key['nombre'] ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                        <div class="col-12 col-sm-6">
                          <label for="inputState">Técnico:</label>
                          <select id="tecnico" name="tecnico" class="form-control">
                            <option selected>Seleccione una técnico</option>
                            <?php foreach ($tecnico as $key) : ?>
                              <option disabled value="<?= $key['id_tecnico'] ?>"><?= $key['nombre'] ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                        <div class="col-12 col-sm-6">
                          <div class="form-group">
                            <label for="text">Fecha:</label>
                            <input required disabled type="date" name="fecha" class="form-control fecha" id="fecha" placeholder="Fecha">
                          </div>
                        </div>
                        <div class="col-12 col-sm-6">
                          <div class="form-group">
                            <label for="text">Código:</label>
                            <input required disabled type="text" name="codigo" class="form-control codigo" id="codigo" placeholder="Código">
                          </div>
                        </div>
                        <div class="col-12 col-sm-6">
                          <div class="form-group">
                            <label for="text">Descripción:</label>
                            <div class="col-lg-12 col-sm-6">
                              <textarea disabled name="descripcion" id="descripcion" cols="47" rows="5"></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
                        <button class="btn btn-success" id="printButton">Imprimir</button>
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
            <?php if (session('fk_id_rol') == 3) : ?>
              <div class="card-body">
                <table id="example" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Área</th>
                      <th>Cliente</th>
                      <th>Recibido por</th>
                      <th>Estado</th>
                      <th>Fecha</th>
                      <th class="text-sm-center">Operaciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($reporte_area as $key) : ?>
                      <tr id_area="<?php echo $key['id_reporte']; ?>">
                        <td><?php echo $key['area']; ?></td>
                        <td><?php echo $key['cliente']; ?></td>
                        <td><?php echo $key['usuario']; ?></td>
                        <td><?php echo $key['estado']; ?></td>
                        <td><?php echo $key['fecha']; ?></td>
                        <td class="text-sm-center">

                          <?php if ($key['estado'] == 'Asignado') : ?>
                            <button title="Editar" data-id="<?php echo $key['id_reporte']; ?>" class="btn btn-warning btnEdit"><span class="fa fa-edit"></span></button>
                            <button title="Cancelar" data-id="<?php echo $key['id_reporte']; ?>" class="cancelar_btn btn btn-danger btnCancelar"><span class="fa fa-unlock-alt"></span></button>
                            <button title="Cerrar reporte" data-id="<?php echo $key['id_reporte']; ?>" class="btn btn-dark btnTerminar"><span class="fa fa-file"></span></button>


                            <button title="Detalles" data-id="<?php echo $key['id_reporte']; ?>" class="btn btn-primary btnShow"><span class="fa fa-search-plus"></span></button>
                          <?php elseif ($key['estado'] == 'Terminado') : ?>
                            <button title="Detalles" data-id="<?php echo $key['id_reporte']; ?>" class="btn btn-primary btnShow"><span class="fa fa-search-plus"></span></button>
                          <?php elseif ($key['estado'] == 'Cancelado') : ?>
                            <button title="Detalles" data-id="<?php echo $key['id_reporte']; ?>" class="btn btn-primary btnShow"><span class="fa fa-search-plus"></span></button>
                          <?php else : ?>
                            <button title="Editar" data-id="<?php echo $key['id_reporte']; ?>" class="btn btn-warning btnEdit"><span class="fa fa-edit"></span></button>
                            <button title="Cancelar" data-id="<?php echo $key['id_reporte']; ?>" class="cancelar_btn btn btn-danger btnCancelar"><span class="fa fa-unlock-alt"></span></button>
                            <button title="Asignar técnico" data-id="<?php echo $key['id_reporte']; ?>" class="asig_tec_btn btn btn-success btnAsig_tec"><span class="fa fa-user"></span></button>
                            <button title="Detalles" data-id="<?php echo $key['id_reporte']; ?>" class="btn btn-primary btnShow"><span class="fa fa-search-plus"></span></button>
                          <?php endif; ?>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            <?php elseif (session('fk_id_rol') == 7) : ?>
              <div class="card-body">
                <table id="example" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Cliente</th>
                      <th>Recibido por</th>
                      <th>Estado</th>
                      <th>Fecha</th>
                      <th class="text-sm-center">Operaciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($reporte_area as $key) : ?>
                      <tr id_area="<?php echo $key['id_reporte']; ?>">
                        <td><?php echo $key['cliente']; ?></td>
                        <td><?php echo $key['usuario']; ?></td>
                        <td><?php echo $key['estado']; ?></td>
                        <td><?php echo $key['fecha']; ?></td>
                        <td class="text-sm-center">

                          <?php if ($key['estado'] == 'Asignado') : ?>
                            <button title="Editar" data-id="<?php echo $key['id_reporte']; ?>" class="btn btn-warning btnEdit"><span class="fa fa-edit"></span></button>
                            <button title="Cancelar" data-id="<?php echo $key['id_reporte']; ?>" class="cancelar_btn btn btn-danger btnCancelar"><span class="fa fa-unlock-alt"></span></button>
                            <button title="Cerrar reporte" data-id="<?php echo $key['id_reporte']; ?>" class="btn btn-dark btnTerminar"><span class="fa fa-file"></span></button>
                            <button title="Detalles" data-id="<?php echo $key['id_reporte']; ?>" class="btn btn-primary btnShow"><span class="fa fa-search-plus"></span></button>
                          <?php elseif ($key['estado'] == 'Terminado') : ?>
                            <button title="Detalles" data-id="<?php echo $key['id_reporte']; ?>" class="btn btn-primary btnShow"><span class="fa fa-search-plus"></span></button>
                          <?php elseif ($key['estado'] == 'Cancelado') : ?>
                            <button title="Detalles" data-id="<?php echo $key['id_reporte']; ?>" class="btn btn-primary btnShow"><span class="fa fa-search-plus"></span></button>
                          <?php else : ?>
                            <button title="Editar" data-id="<?php echo $key['id_reporte']; ?>" class="btn btn-warning btnEdit"><span class="fa fa-edit"></span></button>
                            <button title="Cancelar" data-id="<?php echo $key['id_reporte']; ?>" class="cancelar_btn btn btn-danger btnCancelar"><span class="fa fa-unlock-alt"></span></button>
                            <button title="Asignar técnico" data-id="<?php echo $key['id_reporte']; ?>" class="asig_tec_btn btn btn-success btnAsig_tec"><span class="fa fa-user"></span></button>
                            <button title="Detalles" data-id="<?php echo $key['id_reporte']; ?>" class="btn btn-primary btnShow"><span class="fa fa-search-plus"></span></button>
                          <?php endif; ?>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            <?php else : ?>
              <div class="card-body">
                <table id="example" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Área</th>
                      <th>Cliente</th>
                      <th>Recibido por</th>
                      <th>Estado</th>
                      <th>Fecha</th>
                      <th class="text-sm-center">Operaciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($reporte as $key) : ?>
                      <tr id_area="<?php echo $key['id_reporte']; ?>">
                        <td><?php echo $key['area']; ?></td>
                        <td><?php echo $key['cliente']; ?></td>
                        <td><?php echo $key['usuario']; ?></td>
                        <td><?php echo $key['estado']; ?></td>
                        <td><?php echo $key['fecha']; ?></td>
                        <td class="text-sm-center">

                          <?php if ($key['estado'] == 'Asignado') : ?>
                            <button title="Editar" data-id="<?php echo $key['id_reporte']; ?>" class="btn btn-warning btnEdit"><span class="fa fa-edit"></span></button>
                            <button title="Cancelar" data-id="<?php echo $key['id_reporte']; ?>" class="cancelar_btn btn btn-danger btnCancelar"><span class="fa fa-unlock-alt"></span></button>
                            <button title="Cerrar reporte" data-id="<?php echo $key['id_reporte']; ?>" class="btn btn-dark btnTerminar"><span class="fa fa-file"></span></button>
                            <button title="Detalles" data-id="<?php echo $key['id_reporte']; ?>" class="btn btn-primary btnShow"><span class="fa fa-search-plus"></span></button>
                          <?php elseif ($key['estado'] == 'Terminado') : ?>
                            <button title="Detalles" data-id="<?php echo $key['id_reporte']; ?>" class="btn btn-primary btnShow"><span class="fa fa-search-plus"></span></button>
                          <?php elseif ($key['estado'] == 'Cancelado') : ?>
                            <button title="Detalles" data-id="<?php echo $key['id_reporte']; ?>" class="btn btn-primary btnShow"><span class="fa fa-search-plus"></span></button>
                          <?php else : ?>
                            <button title="Editar" data-id="<?php echo $key['id_reporte']; ?>" class="btn btn-warning btnEdit"><span class="fa fa-edit"></span></button>
                            <button title="Cancelar" data-id="<?php echo $key['id_reporte']; ?>" class="cancelar_btn btn btn-danger btnCancelar"><span class="fa fa-unlock-alt"></span></button>
                            <button title="Asignar técnico" data-id="<?php echo $key['id_reporte']; ?>" class="asig_tec_btn btn btn-success btnAsig_tec"><span class="fa fa-user"></span></button>
                            <button title="Detalles" data-id="<?php echo $key['id_reporte']; ?>" class="btn btn-primary btnShow"><span class="fa fa-search-plus"></span></button>
                          <?php endif; ?>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
          </div>
        <?php endif; ?>
        </div>
    </div>
  </div>
  </div>
  </section>

  </div>

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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.2/jQuery.print.min.js"></script>


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

  <!-- plugin -->
  <script src="https://www.virtuosoft.eu/code/bootstrap-duallistbox/bootstrap-duallistbox/v3.0.2/jquery.bootstrap-duallistbox.js"></script>
  <link rel="stylesheet" type="text/css" href="https://www.virtuosoft.eu/code/bootstrap-duallistbox/bootstrap-duallistbox/v3.0.2/bootstrap-duallistbox.css">



  <!-- AdminLTE App -->
  <script src="<?= base_url() ?>/public/tema_tesis/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?= base_url() ?>/public/tema_tesis/dist/js/demo.js"></script>
  <!-- Page specific script -->

  <!-- Carga js reportes -->
  <script src="<?= base_url() ?>/public/tema_tesis/dist/js/cruds/reportes.js"></script>
  <script src="<?= base_url() ?>/public/tema_tesis/dist/js/toastr.min.js"></script>


  <script>
    $('#printButton').on('click', function() {
      if ($('.modal').is(':visible')) {
        var modalId = $(event.target).closest('.modal').attr('id');
        $('body').css('visibility', 'hidden');
        $("#" + modalId).css('visibility', 'visible');
        $('#' + modalId).removeClass('modal');
        window.print();
        $('body').css('visibility', 'visible');
        $('#' + modalId).addClass('modal');
      } else {
        window.print();
      }
    });

    var demo1 = $('select[name="duallistbox_demo1[]"]').bootstrapDualListbox({
      nonSelectedListLabel: 'Técnicos disponibles',
      selectedListLabel: 'Técnicos asignados',
      preserveSelectionOnMove: 'moved',
      moveAllLabel: 'Agregar todos',
    //  removeAllLabel: 'Desmarcar todos',
      filterPlaceHolder: 'Buscar',
      infoText: 'Mostrando {0}',
      infoTextEmpty: 'Lista vacía',

    });
    $("#demoform").submit(function() {
      alert($('[name="duallistbox_demo1[]"]').val());
      return false;
    });
  </script>
</body>

</html>