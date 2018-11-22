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
          <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h2 class="display1 ">Solicitud: <i class="text-primary">ST18_001</i></h2>
              </div>
            </div>
          </div>
          <div class="col-lg-3 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h2 class="display1 ">Solicitud: <i class="text-primary">ST18_001</i></h2>
              </div>
            </div>
          </div>
          <div class="col-lg-3 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h2 class="display1 ">Solicitud: <i class="text-primary">ST18_001</i></h2>
              </div>
            </div>
          </div>
					<div class="col-lg-9 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title">Resumen</h4>
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

                <a href="" class="btn btn-outline-info">Ver toda la trasabilidad</a>
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