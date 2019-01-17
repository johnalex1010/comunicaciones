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
				
		    <!-- // Table -->
			<div class="row">
				<div class="col-lg-9 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<h1>Trazabilidad: <a href="resume.php?ST=<?php echo $consultaT[0]['numST']; ?>"><?php echo $consultaT[0]['numST'] ?></a></h1>
						</div>
					</div>
				</div>
				<div class="col-lg-3 grid-margin stretch-card">
					<div class="card">
						<div class="card-body <?php echo $estado ?>">
							<div>
								<?php if ($maxT['id_fase'] == 2): ?>
								<h2>Finalizado</h2>
								<?php else: ?>
								<form class="forms-sample" action="#" method="POST">
									<table class="tale">
										<tbody>
											<tr>
												<td>
													<select class="form-control" name="estado" >
														<?php if ($maxT['id_fase'] == 1): ?>
														<option value="1">En desarrollo</option>
														<?php elseif($maxT['id_fase'] == 3): ?>
														<option value="3">Cancelado</option>
														<?php endif ?>

														<?php for ($f=0; $f<$estadoNum; $f++): ?>
														<option value="<?php echo $fase[$f]['id_fase']; ?>"><?php echo $fase[$f]['fase']; ?></option>
														<?php endFor ?>
													</select>
												</td>
												<td><input type="submit" name="submitEstado" class="btn <?php echo $estado ?>" value="Cambiar estado"></td>
											</tr>
										</tbody>
									</table>
								</form>
								<?php endif ?>
							</div>
						</div>
					</div>
				</div>


			<div class="col-lg-9 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<?php for ($i = 0; $i<$totalTrazabilidad; $i++): ?>
						<div class="fluid-container">
		                    <div class="row ticket-card mt-3 pb-2 border-bottom pb-3 mb-3">
		                      <!-- <div class="col-md-1">
		                        <img class="img-md rounded-circle" src="<?php echo URL ?>public/images/usuarios/<?php echo $consultaT[$i]['usuario'] ?>.jpg" alt="profile image">
		                      </div> -->
		                      <div class="ticket-details col-md-9">
		                        <div class="d-flex">
		                          <p class="text-dark font-weight-semibold mr-2 mb-0 no-wrap">Usuario: <?php echo $consultaT[$i]['usuario']?></p>
		                        </div>
		                        <p class="text-gray mb-2"><?php echo nl2br($consultaT[$i]['comentario']);?></p>
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
					<!-- //Usuarios asginados -->
					<div class="card-body">
						<h4 class="card-title">Usuario asignados</h4>
						<ul class="list-arrow ">
							<?php for ($i=0; $i < $totalUA; $i++): ?>
							<li><?php echo $consultaUA[$i]['nombres']." ".$consultaUA[$i]['apellidos'] ?></li>
							<?php endFor ?>
						</ul>
						<?php if ($maxT['id_fase'] != 2): ?>
							<?php if ($per['id_permiso'] == 1 || $per['id_permiso'] == 2): ?>
								<form class="forms-sample" action="#" method="POST">
									<div class="form-group">
										<label>Agregar usuario</label>
										<select class="form-control" name="userST" id="exampleFormControlSelect2">
											<option value="" selected disabled>Seleccionar usuario</option>
											<?php
												for ($i=0; $i < $totalU; $i++) { 
													echo "<option value='".$consultaU[$i]['id_usuario']."'>".$consultaU[$i]['nombres']." ".$consultaU[$i]['apellidos']."</option>";
												}
											?>
										</select>
									</div>
									<button type="submit" name="submitUserST" class="btn btn-success mr-2">Agregar usuario</button>
								</form>
							<?php endif ?>
						<?php endif ?>
						<hr>
					</div>
					
					<!-- //Alertas asignadas -->
					<div class="card-body">
						<h4 class="card-title">Alertas</h4>
						<ul class="list-arrow ">
							<?php for ($i=0; $i < $totalA; $i++): ?>
							<li>Alerta creada por <b class="text-success"><?php echo $consultaA[$i]['usuario']."</b> para el <b class='text-info'>".fecha($consultaA[$i]['fecha_alerta']); ?></b></li>
							<?php endFor ?>
						</ul>
						<?php if ($maxT['id_fase'] != 2): ?>
							<?php if ($per['id_permiso'] == 1 || $per['id_permiso'] == 2): ?>
								<form class="forms-sample" action="#" method="POST">
									<div class="form-group">
										<input type="date" name="fecha_alerta" class="form-control" placeholder="Fecha Alerta" aria-label="Username">
									</div>
									<button type="submit" name="submitAlertST" class="btn btn-success mr-2">Nueva Alerta</button>
								</form>
							<?php endif ?>
						<?php endif ?>
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