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
						
						<h1>Trasabilidad: <a href="resume.php?ST=<?php echo $consultaT[0]['numST']; ?>"><?php echo $consultaT[0]['numST'] ?></a></h1>
						<br>
						<?php for ($i = 0; $i<$totalTrasabilidad; $i++): ?>
						<div class="fluid-container">
		                    <div class="row ticket-card mt-3 pb-2 border-bottom pb-3 mb-3">
		                      <div class="col-md-1">
		                        <img class="img-md rounded-circle" src="<?php echo URL ?>public/images/usuarios/<?php echo $consultaT[$i]['usuario'] ?>.jpg" alt="profile image">
		                      </div>
		                      <div class="ticket-details col-md-9">
		                        <div class="d-flex">
		                          <p class="text-dark font-weight-semibold mr-2 mb-0 no-wrap">Usuario: <?php echo $consultaT[$i]['usuario']?></p>
		                        </div>
		                        <p class="text-gray mb-2"><?php echo $consultaT[$i]['comentario']?></p>
		                        <div class="row text-gray d-md-flex d-none">
		                          <div class="col-4 d-flex">
		                            <small class="mb-0 mr-2 text-muted text-muted">Fecha :</small>
		                            <small class="Last-responded mr-2 mb-0 text-muted text-muted"><?php echo fecha($consultaT[$i]['fecha']);?></small>
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
                <?php for ($i=0; $i < $totalUA; $i++): ?>
                  <li><?php echo $consultaUA[$i]['usuario'] ?></li>
                <?php endFor ?>
				</ul>
				<form class="forms-sample" action="#" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
					<div class="form-group">
						<label>Agregar usuario</label>						
						<select class="form-control" id="exampleFormControlSelect2">
							<option value="" selected disabled>Seleccionar usuario</option>
							<?php
								for ($i=0; $i < $totalU; $i++) { 
									echo "<option>".$consultaU[$i]['usuario']."</option>";
								}
							?>
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