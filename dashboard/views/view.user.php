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
					<div class="col-lg-4 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title">Perfil</h4>
                <div class="usta-perfil">
                  <div class="usta-perfil-description">
                    <img src="<?php echo URL."public/images/usuarios/face".$_GET['id'].".jpg" ?>" alt="">
                    <div class="usta-perfil-name">
                      <h3>USUARIO <?php echo $_GET['id'] ?></h3>
                      <div>Nombre Nombre Apellido Apellido</div>
                      <div class="text-info">Cargo</div>
                      <div>Unidad a la que pertenece</div>
                    </div>
                  </div>
                </div>
							</div>
						</div>
					</div>
          <div class="col-lg-4 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Datos personales</h4>
                <div class="usta-perfil">
                  <div class="usta-perfil-form">
                    <form action="">
                      <input type="password" class="form-control" id="exampleInputName1" placeholder="Cambiar Nombre">
                      <input type="password" class="form-control" id="exampleInputName1" placeholder="Contraseña">
                      <input type="password" class="form-control" id="exampleInputName1" placeholder="Repetir Contraseña">

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