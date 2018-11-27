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
						<h4 class="card-title">Trasabilidad: ST18_001</h4>
						<?php for ($i = 1; $i <=5; $i++): ?>
						<div class="fluid-container">
		                    <div class="row ticket-card mt-3 pb-2 border-bottom pb-3 mb-3">
		                      <div class="col-md-1">
		                        <img class="img-md rounded-circle" src="<?php echo URL ?>public/images/usuarios/face<?php echo $i ?>.jpg" alt="profile image">
		                      </div>
		                      <div class="ticket-details col-md-9">
		                        <div class="d-flex">
		                          <p class="text-dark font-weight-semibold mr-2 mb-0 no-wrap">Usuario <?php echo $i ?> :</p>
		                          <p class="mb-0">Donec rutrum congue leo eget malesuada.</p>
		                        </div>
		                        <p class="text-gray mb-2">Donec rutrum congue leo eget malesuada. Quisque velit nisi, pretium ut lacinia in, elementum id enim
		                          vivamus.Donec rutrum congue leo eget malesuada. Quisque velit nisi, pretium ut lacinia in, elementum id enim
		                          vivamus.
		                        </p>
		                        <div class="row text-gray d-md-flex d-none">
		                          <div class="col-4 d-flex">
		                            <small class="mb-0 mr-2 text-muted text-muted">Due in :</small>
		                            <small class="Last-responded mr-2 mb-0 text-muted text-muted">2 Days</small>
		                          </div>
		                        </div>
		                      </div>
		                    </div>
		                </div>
						<?php endFor ?>
					</div>
				</div>
			</div>
          <div class="col-lg-3 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Usuario asignados</h4>
                <ul class="list-arrow ">
                <?php for ($i=1; $i < 6; $i++): ?>
                  <li>Usuario <?php echo $i ?></li>
                <?php endFor ?>
				</ul>
				<form class="forms-sample" action="" >
					<div class="form-group">
						<label>Agregar usuario</label>
						<select class="form-control" id="exampleFormControlSelect2">
							<option>Usuario 1</option>
							<option>Usuario 2</option>
							<option>Usuario 3</option>
							<option>Usuario 4</option>
							<option>Usuario 5</option>
						</select>
					</div>
					<button type="submit" class="btn btn-success mr-2">Agregar</button>
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