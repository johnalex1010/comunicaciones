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
                    <img src="<?php echo URL."public/images/usuarios/face1.jpg" ?>" alt="">
                    <div class="usta-perfil-name">
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
                      <input type="submit" class="btn btn-success mr-2" value="Cambiar">
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Ultimas Solicitudes</h4>
                <div class="usta-rank-ST">
                  <div class="table-responsive">
                    <table class="table">
                      <tbody>
                        <?php for ($i=0; $i < 3; $i++): ?>
                        <tr>
                          <td><h6>Nombre Solicitud</h6><p>Fecha: 00/00/0000</p></td>
                          <td><a href="" class="estado btn btn-inverse-success">Estado</a></td>
                          <td><a href="" class="btn btn-inverse-secondary">Ver ST</a></td>
                        </tr>
                        <?php endFor ?>
                      </tbody>
                    </table>
                  </div>
                  <a href="<?php echo URL ?>">Ver mis solicitudes</a>
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