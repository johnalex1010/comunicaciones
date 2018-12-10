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
          
          <?php require_once '../controllers/controller.estado.php'; ?>

          <div class="col-lg-3 grid-margin stretch-card">
            <div class="card">
              <div class="card-body <?php echo $estado ?>">
                <div>
                  <?php if ($maxT['MAXT'] == 2): ?>
                    <h2>Finalizado</h2>
                  <?php else: ?>
                    <form class="forms-sample" action="#" >
                      <table class="tale">
                        <tbody>
                          <tr>
                            <td>
                                <select class="form-control" id="exampleFormControlSelect2">
                                  <?php for ($f=0; $f<$estadoNum; $f++): ?>
                                    <option value="<?php echo $fase[$f]['id_fase']; ?>"><?php echo $fase[$f]['fase']; ?></option>
                                  <?php endFor ?>
                                  
                                </select>
                            </td>
                            <td><input type="submit" class="btn <?php echo $estado ?>" value="Cambiar"></td>
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
                <?php for ($i=0; $i < 3; $i++): ?>
                  <div class="card-trasabilidad">
                    <p class="card-trasabilidad-usuario text-success"><?php echo $consultaT[$i]['usuario']." - ".$consultaT[$i]['fecha']; ?></p>
                    <p><?php echo $consultaT[$i]['comentario']; ?></p>
                  </div>
                  <hr>
                <?php endFor ?>
                
                <?php if ($maxT['MAXT'] != 2): ?>
                  <form action="#" method="POST">
                  <?php if (isset($errorTrasabilidad)) {
                    echo $errorTrasabilidad;
                  } ?>
                    <textarea name="comentario" class="form-control" cols="30" rows="5" placeholder="Agregar trasabilidad"></textarea>
                    <br>
                    <button type="submit" name="submitT" class="btn btn-success mr-2">Agregar trasabilidad</button>
                  </form>
                  <br>
                <?php endif ?>
                <a href="<?php echo URL. "pages/trasabilidad.php?ST=".$ts['numST']."" ?>" class="btn btn-outline-info">Ver toda la trasabilidad</a>
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