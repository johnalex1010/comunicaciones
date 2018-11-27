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
				    <div class="col-lg-9 grid-margin stretch-card">
		              <div class="card">
		                <div class="card-body">
		                	<h3>Solicitudes</h3>
		                  <div class="table-responsive">
		                    <table class="table">
		                      <thead>
		                        <tr>
		                          <th>N° ST</th>
		                          <th>Usuario Asignado</th>
		                          <th>Nombre de ST</th>
		                          <th>Estado</th>
		                        </tr>
		                      </thead>
		                      <tbody>
		                      	<?php for ($i=1; $i < 7; $i++): ?>
								<tr>
									<td>Jacob</td>
									<td>53275531</td>
									<td>12 May 2017</td>
									<td>
									<label class="badge badge-success">No realizada</label>
									</td>
									<td><a href="<?php echo URL ?>pages/resume-ST.php?ST=<?php echo $i ?>" class="btn btn-inverse-primary btn-rounded">Ver</a></td>
								</tr>
		                      	<?php endFor ?>
		                      </tbody>
		                    </table>
		                  </div>
		                </div>
		                <!-- Paginación -->
						<div class="row">
							<div class="col-lg-12 grid-margin stretch-card" >
								<div class="btn-group" role="group" aria-label="First group" style="margin: auto">
									<a href="" class="btn btn-primary btn-rounded"><</a>
									<a href="" class="btn btn-primary">1</a>
									<a href="" class="btn btn-primary">2</a>
									<a href="" class="btn btn-primary">3</a>
									<a href="" class="btn btn-primary">4</a>
									<a href="" class="btn btn-primary">5</a>
									<a href="" class="btn btn-primary btn-rounded">></a>
								</div>
							</div>
						</div>
		              </div>
		            </div>
		            <!-- Filtros -->
		            <div class="col-lg-3 grid-margin stretch-card">
		            	<div class="card">
		              		<div class="card-body">
                  				<h4>Filtros de busqueda</h4>
                  				<form class="forms-sample" action="" >
									<div class="form-group">
										<label for="exampleFormControlSelect2">Usuario</label>
										<select class="form-control" id="exampleFormControlSelect2">
											<option>Usuario 1</option>
											<option>Usuario 2</option>
											<option>Usuario 3</option>
											<option>Usuario 4</option>
											<option>Usuario 5</option>
										</select>
									</div>
									<div class="form-group">
										<label>Número Solicitud</label>
										<input type="text" class="form-control" placeholder="Número Solicitud" aria-label="Username">
									</div>
									<div class="form-group">
										<label>Nombre Solicitud</label>
										<input type="text" class="form-control" placeholder="Nombre Solicitud" aria-label="Username">
									</div>
									<div class="form-group">
										<label for="exampleFormControlSelect2">Estado Solicitud</label>
										<select class="form-control" id="exampleFormControlSelect2">
											<option>Estado 1</option>
											<option>Estado 2</option>
											<option>Estado 3</option>
											<option>Estado 4</option>
											<option>Estado 5</option>
										</select>
									</div>
									<div class="form-group">
										<label>Fecha Solcitud</label>
										<input type="date" class="form-control" placeholder="Fecha" aria-label="Username">
									</div>
									<button type="submit" class="btn btn-success mr-2">Buscar</button>
                  				</form>
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