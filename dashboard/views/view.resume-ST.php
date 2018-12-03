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
          <div class="col-lg-9 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h2 class="display1 ">Solicitud: <i class="text-primary"><?php echo $ts['numST'] ?></i></h2>
              </div>
            </div>
          </div>
          <div class="col-lg-3 grid-margin stretch-card">
            <div class="card">
              <div class="card-body card-estado ">
                <div class="card-estado">
                  <form class="forms-sample" action="" >                    
                    <table class="tale">
                      <tbody>
                        <tr>
                          <td>                            
                              <select class="form-control" id="exampleFormControlSelect2">
                                <option>Estado 1</option>
                                <option>Estado 2</option>
                                <option>Estado 3</option>
                                <option>Estado 4</option>
                                <option>Estado 5</option>
                              </select>
                          </td>
                          <td><input type="submit" class="btn btn-success" value="Cambiar"></td>
                        </tr>
                      </tbody>
                    </table>
                  </form>
                </div>
              </div>
            </div>
          </div>
					<div class="col-lg-9 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
                <h4 class="card-title"><?php echo $ts['nomUnidad']." / ".$ts['categoria']." / <b class='text-warning'>".$ts['subCategoria']."</b>"; ?></h4>
                <!-- //Datos De contacto -->
                <?php require_once '../views/view.table-solicitante.php'; ?>
                <br><br>
                <!-- //Datos dependiendo del tipo de solicitud -->
                <?php require_once $model; require_once $view_tipo_solicitud; ?>
							</div>
						</div>
					</div>
          <div class="col-lg-3 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Trasabilidad</h4>
                <?php for ($i=1; $i < 4; $i++): ?>
                  <div class="card-trasabilidad">
                    <p class="card-trasabilidad-usuario text-success">Usuario -  00/00/0000</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia id iusto voluptas nostrum autem quia minus ducimus necessitatibus, veniam facilis. Ab ipsa hic itaque cumque, voluptates rerum libero ullam voluptatum.</p>
                  </div>
                  <hr>
                <?php endFor ?>

                <a href="<?php echo URL. "pages/trasabilidad.php" ?>" class="btn btn-outline-info">Ver toda la trasabilidad</a>
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