<?php require_once '../views/view.header.php'; ?>
<body>
  <div class="container-scroller">
    <?php require_once '../views/view.nav-top.php'; ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <?php require_once '../views/view.nav-side.php'; ?>      
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
      <!-- //CONTENIDO AQUÍ -->
        <!-- // Panel Home -->
        <?php require_once '../views/view.general-report.php'; ?>
        
            <!-- // Table -->
        <div class="row">
          <div class="col-lg-8 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Creación usuarios</h4>
                <div class="usta-perfil">
                  <div class="usta-perfil-form">
                    <form action="">
                      <label for="">Foto de perfil</label>
                      <input type="file" class="form-control" placeholder="Subir foto de perfil">
                      <label for="">Nombre completo</label>
                      <input type="password" class="form-control" id="exampleInputName1" placeholder="Cambiar Nombre">
                      <label for="">Contraseña</label>
                      <input type="password" class="form-control" id="exampleInputName1" placeholder="Contraseña">
                      <label for="">Repetir contraseña</label>
                      <input type="password" class="form-control" id="exampleInputName1" placeholder="Repetir Contraseña">
                      <label for="">Cargo</label>
                      <select class="form-control">
                        <option>Cargo 1</option>
                        <option>Cargo 2</option>
                        <option>Cargo 3</option>
                        <option>Cargo 4</option>
                      </select>
                      
                      <input type="submit" class="btn btn-success mr-2" value="Cambiar">
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <!-- //FIN CONTENIDO AQUÍ -->
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
<?php require_once '../views/view.footer.php'; ?>