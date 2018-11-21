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
		                      	<?php for ($i=0; $i < 6; $i++): ?>
								<tr>
									<td>Jacob</td>
									<td>53275531</td>
									<td>12 May 2017</td>
									<td>
									<label class="badge badge-success">No realizada</label>
									</td>
									<td><a href="#" class="btn btn-inverse-primary">Ver</a></td>
								</tr>
		                      	<?php endFor ?>
		                      </tbody>
		                    </table>
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
										<input type="text" class="form-control" placeholder="Username" aria-label="Username">
									</div>
									<div class="form-group">
										<label>Nombre Solicitud</label>
										<input type="text" class="form-control" placeholder="Username" aria-label="Username">
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
										<input type="date" class="form-control" placeholder="Username" aria-label="Username">
									</div>
									<button type="submit" class="btn btn-success mr-2">Submit</button>
                  				</form>
                  			</div>
		              	</div>
		            </div>		            
		        </div>

		        <!-- Paginación -->
				<div class="row">
	        		<div class="col-lg-9 grid-margin stretch-card" >
						<div class="btn-group" role="group" aria-label="First group" style="margin: auto">
							<button type="button" class="btn btn-primary"><</button>
							<button type="button" class="btn btn-primary">1</button>
							<button type="button" class="btn btn-primary">2</button>
							<button type="button" class="btn btn-primary">3</button>
							<button type="button" class="btn btn-primary">4</button>
							<button type="button" class="btn btn-primary">5</button>
							<button type="button" class="btn btn-primary">6</button>
							<button type="button" class="btn btn-primary">7</button>
							<button type="button" class="btn btn-primary">></button>
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