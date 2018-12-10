<?php require_once '../views/view.header.php'; ?>
<body>
<?php $page = (isset($_GET["page"])) ? $_GET["page"] : 1; ?>
<?php Pagination::config($page, 7, "t_trasabilidad", null , 6); ?>
<?php $data = Pagination::data(); ?>
<?php $active = ""; ?>
<?php if ($data["error"]): header("location:".URL."pages/404.php"); endif;?>

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
										<th>Fecha de ingreso</th>
										<th>Estado</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach (Pagination::show_rows("numST") as $row): ?>
									<tr>
									<td><i><?php echo $row["numST"]; ?></i></td>
									<td><?php echo fecha($row["fecha"]); ?></td>
									<td><p style="padding:0.3rem; border-radius: 3px; display: inline-block; width: 100px; text-align: center;"
									<?php if ($row["id_fase"] == 1): ?>
										class="card-color-enDesarrollo"><?php echo $row["fase"]; ?></p>
									<?php elseif($row["id_fase"] == 2): ?>
										class="card-color-finalizado"><?php echo $row["fase"]; ?></p>
									<?php else: ?>
										class="card-color-cancelado"><?php echo $row["fase"]; ?></p>
									<?php endif ?>
									</td>
									<td><a class="btn btn-inverse-primary btn-rounded" href="<?php echo URL."pages/resume.php?ST=".$row["numST"]; ?>">Ver</a></td>
									</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
		                  </div>
		                </div>
		                <!-- Paginación -->
						<div class="row">
							<div class="col-lg-12 grid-margin stretch-card" >
								<div class="btn-group" role="group" aria-label="First group" style="margin: auto">
									<!-- Boton Inicio y siguiente-->
									<?php if ($data["actual-section"] != 1): ?>
										<a class="btn btn-primary btn-rounded" href="admin.php?page=1" >Inicio</a>
										<a class="btn btn-primary" href="admin.php?page=<?php echo $data['previous']; ?>">&laquo;</a>	
									<?php endif; ?>

									<!-- Botones numerados-->
									<?php for ($i = $data["section-start"]; $i <= $data["section-end"]; $i++): ?>					
										<?php if ($i > $data["total-pages"]): break; endif; ?>
										<?php $active = ($i == $data["this-page"]) ? "active" : ""; ?>			    
										<a class="<?php echo $active; ?> btn btn-primary" href="admin.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
							    	<?php endfor; ?>

									<!-- Boton Atras y fin-->
									<?php if ($data["actual-section"] != $data["total-sections"]): ?>
								    	<a class="btn btn-primary" href="admin.php?page=<?php echo $data['next']; ?>">&raquo;</a>
								    	<a class="btn btn-primary btn-rounded" href="admin.php?page=<?php echo $data['total-pages']; ?>">Final</a>
						    		<?php endif; ?>
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
											<option value="" selected disabled>Seleccionar usuario</option>
											<?php
												for ($i=0; $i < $totalU; $i++) { 
													echo "<option>".$consultaU[$i]['usuario']."</option>";
												}
											?>
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