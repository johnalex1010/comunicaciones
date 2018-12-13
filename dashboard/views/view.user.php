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
		        <!-- // Table -->
				<div class="row">
					<div class="col-lg-4 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
                <?php if ($user['activo'] == 1): ?>
                      <h5>Usuario: <i class="text-success">activo</i></h5>
                    <?php else: ?>
                      <h5>Usuario: <i class="text-danger">inactivo</i></h5>
                    <?php endif ?>
                <div class="usta-perfil">
                  <div class="usta-perfil-description">
                    <!-- <img src="<?php echo URL."public/images/usuarios/".$user['usuario'].".jpg" ?>" alt=""> -->
                    <div class="usta-perfil-name">
                      <h3><?php echo $user['usuario'] ?></h3>
                      <div><?php echo $user['nombres']." ".$user['apellidos'] ?></div>
                      <div class="text-info"><?php echo $user['cargo'] ?></div>
                    </div>
                  </div>
                </div>
							</div>
						</div>
					</div>
          <div class="col-lg-4 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Cambiar Datos personales</h4>
                <div class="usta-perfil">
                  <div class="usta-perfil-form">
                    <form action="">
                      <input type="password" class="form-control" id="exampleInputName1" placeholder="Cambiar Nombre">
                      <input type="password" class="form-control" id="exampleInputName1" placeholder="Contraseña">
                      <input type="password" class="form-control" id="exampleInputName1" placeholder="Repetir Contraseña">

                      <select class="form-control" id="exampleFormControlSelect2">
                        <option value="" selected disabled><?php echo $user['cargo'] ?></option>
                        <?php
                          for ($i=0; $i < $totalCargo; $i++) { 
                            echo "<option>".$cargo[$i]['cargo']."</option>";
                          }
                        ?>
                      </select>
                      <select class="form-control" id="exampleFormControlSelect2">
                        <option value="" selected disabled><?php echo $user['permiso'] ?></option>
                        <?php
                          for ($i=0; $i < $totalPermiso; $i++) { 
                            echo "<option>".$permiso[$i]['permiso']."</option>";
                          }
                        ?>
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