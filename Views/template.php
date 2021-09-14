<!--
=========================================================
Material Dashboard - v2.1.2
=========================================================

Product Page: https://www.creative-tim.com/product/material-dashboard
Copyright 2020 Creative Tim (https://www.creative-tim.com)
Coded by Creative Tim

=========================================================
The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->

<?php include $_SERVER['DOCUMENT_ROOT']."/AUTO-EMAIL/conexion/db.php"; ?>
<?php include $_SERVER['DOCUMENT_ROOT']."/AUTO-EMAIL/Views/pages/head.php";?>
<!--<head>-->

<?php include $_SERVER['DOCUMENT_ROOT']."/AUTO-EMAIL/Views/pages/sidebar.php";?>
    <div class="main-panel ">
      <!-- Navbar -->
      <?php include $_SERVER['DOCUMENT_ROOT']."/AUTO-EMAIL/Views/pages/navbar.php"?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
            <?php if(isset($_SESSION['message'])){?>
                <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                  <?= $_SESSION['message'] ?>
                  <button type="button" data-bs-dismiss="alert" aria-label="Close" class="btn btn-white btn-fab btn-fab-mini btn-round pull-right d-flex align-items-center" >
                    <i class=" material-icons">close</i>
                  </button>
                </div>
              <?php session_unset(); } ?>
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title">Registrar Emplead@</h4>
                  <p class="card-category">Complete el Registro para Agregar un nuevo Emplead@</p>
                </div>
                <div class="card-body">
                  <form action="Controllers/save-empleado.php" method="post">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nombres</label>
                          <input type="text" name="nombres" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Correo</label>
                          <input type="email" name="correo" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="">Fecha de Nacimiento</label>
                          <input type="date" name="nac" class="form-control" placeholder="">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Cargo en la Empresa</label>
                          <input type="text" name="cargo" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Extencion</label>
                          <input type="number" name="exten" class="form-control">
                        </div>
                      </div>
                    </div>
                    <button type="submit" name="save-empleado"  data-toggle="popover" title="Popover title" data-content="And here's some amazing content. It's very engaging. Right?" class="btn btn-warning pull-right">Agregar Persona</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card">
                  <div class="card-header card-header-danger">
                      <h4 class="card-title">Full header coloured</h4>
                      <p class="category">Category subtitle</p>
                  </div>
                  <div class="card-body">
                        The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona...
                        <!-- markup -->
                        <div class="togglebutton">
                          <label>
                            <input type="checkbox" checked="">
                              <span class="toggle"></span>
                              Toggle is on
                          </label>
                        </div>
                        <div class="togglebutton">
                          <label>
                            <input type="checkbox">
                              <span class="toggle"></span>
                                Toggle is off
                          </label>
                        </div>
                  </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title ">Tabla de Empleados</h4>
                  <p class="card-category"> Lista de todos los Empleados Registrados en la Aplicacion Web</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table" id="data-usuarios">
                      <thead class=" text-warning text-center">
                        <th>
                          ID
                        </th>
                        <th>
                          Nombres
                        </th>
                        <th>
                          Fec.Nac
                        </th>
                        <th>
                          cargo del empleado
                        </th>
                        <th>
                        Exten
                        </th>
                        <th>
                          Correo Electronico
                        </th>
                        <th>
                          Acciones
                        </th>
                      </thead>
                      <tbody>
                          <?php
                          $show_persona = "SELECT * FROM personas";
                          $result_personas = mysqli_query($mysqli, $show_persona);
                          while ($row = mysqli_fetch_array($result_personas)) { ?>
                            <tr>
                              <td class="text-center"><?= $row['id'] ?></td>
                              <td class="text-center"><?php echo $row['nombres']?></td>
                              <td class="text-center"><?php echo $row['fecha_nacimiento']?></td>
                              <td class="text-center"><?php echo $row['cargo']?></td>
                              <td class="text-center"><?php echo $row['exten']?></td>
                              <td class="text-center"><?php echo $row['correo']?></td>
                              <td class="text-center">
                                <a class="btn btn-info  btn-fab btn-fab-mini btn-round" href="./Controllers/edit-empleado.php?id=<?php echo $row['id'] ?>">
                                <i class="material-icons">edit</i>
                                </a>
                                <a class="btn btn-danger  btn-fab btn-fab-mini btn-round"href="Controllers/delete-empleado.php?id=<?php echo $row['id'] ?>">
                                <i class="material-icons">delete</i>
                                </a>
                              </td>
                          </tr>
                          <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div><!--fin de la tabla-->
      </div>
    </div>
      </div>
      <?php include("pages/footer.php")?>
    </div>
  </div><!--fin del wrapper-->
  <?php include("pages/customizer.php")?>