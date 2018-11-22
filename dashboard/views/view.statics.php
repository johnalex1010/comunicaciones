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
					<div class="col-lg-5 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title">Estadística básica</h4>
								<canvas id="doughnutChart" style="height:250px"></canvas>
							</div>
						</div>
					</div>
					<div class="col-lg-7 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title">Exportar</h4>
								<form action="">
									<div class="form-group row">
										<label class="col-sm-3 col-form-label">Exportar resumen total</label>
										<div class="col-sm-3">
											<input type="submit" class="btn btn-info btn-fw" value="Exportar">
										</div>
										<div class="col-sm-3"></div>
										<div class="col-sm-3"></div>
									</div>
								</form>
								<form action="">
									<div class="form-group row">
										<label class="col-sm-3 col-form-label">Exportar por Usuario</label>
										<div class="col-sm-3">
											<select class="form-control">
				                              <option>Usuario 1</option>
				                              <option>Usuario 2</option>
				                            </select>
										</div>
										<div class="col-sm-3">
											 <input type="submit" class="btn btn-info btn-fw" value="Exportar">
										</div>
										<div class="col-sm-3"></div>
									</div>
								</form>
								<form action="">
									<div class="form-group row">
										<label class="col-sm-3 col-form-label">Exportar por fechas</label>
										<div class="col-sm-3">
											<input type="date" class="form-control" id="exampleInputPassword1" placeholder="Fecha 1">
										</div>
										<div class="col-sm-3">
											<input type="date" class="form-control" id="exampleInputPassword1" placeholder="Fecha 2">
										</div>
										<div class="col-sm-3">
											 <input type="submit" class="btn btn-info btn-fw" value="Exportar">
										</div>
									</div>
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