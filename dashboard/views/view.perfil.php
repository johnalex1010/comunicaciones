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
       <?php if (isset($popMjs)): ?>
             <div class="row purchace-popup">
              <div class="col-12 pop-mensaje">
                <span class="d-block d-md-flex align-items-center">
                  <p><?php echo $popMjs; ?></p>
                  <i class="mdi mdi-close popup-dismiss d-none d-md-block"></i>
                </span>
              </div>
            </div>
            <?php endif ?>
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
                    <img src="<?php echo URL."public/images/usuarios/".$consulta['usuario'].".jpg" ?>" alt="">
                    <div class="usta-perfil-name">
                      <div>Usuario: <b class="text-success"><?php echo $consulta['usuario'] ?></b></div>
                      <div><?php echo $consulta['nombres']." ".$consulta['apellidos'] ?></div>
                      <div class="text-info"><?php echo $consulta['cargo'] ?></div>
                      <div><?php echo $consulta['email'] ?></div>
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
                    <form class="forms-sample" action="#" method="POST">
                      <input type="text" name="nombres" class="form-control" id="exampleInputName1" placeholder="Cambiar Nombre" value="<?php echo $_POST['nombres'] ?>">
                      <input type="text" name="apellidos" class="form-control" id="exampleInputName1" placeholder="Cambiar Apellido" value="<?php echo $_POST['apellidos'] ?>">
                      <input type="password" name="password" class="form-control" id="exampleInputName1" placeholder="Contraseña">
                      <input type="password" name="repassword" class="form-control" id="exampleInputName1" placeholder="Repetir Contraseña">
                      <input type="submit" name="submitPerfil" class="btn btn-success mr-2" value="Cambiar">
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- <div class="col-lg-4 grid-margin stretch-card">
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
                          <td><a href="<?php echo URL ?>pages/resume-ST.php?ST=5" class="btn btn-inverse-secondary">Ver ST</a></td>
                        </tr>
                        <?php endFor ?>
                      </tbody>
                    </table>
                  </div>
                  <a href="<?php echo URL ?>">Ver mis solicitudes</a>
                </div>              
              </div>
            </div>
          </div> -->
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