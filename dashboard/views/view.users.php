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
        <h3>Usuarios registrados <a href="<?php echo URL."pages/new-user.php" ?>" class="btn btn-inverse-success btn-rounded">Usuario +</a></h3>
        <br>
				<div class="row">
        <!-- //card -->
        <?php for ($i=1; $i < 9; $i++): ?>
          <div class="col-lg-3 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="usta-card-user">
                  <div class="usta-card-img">
                    <img src="<?php echo URL."public/images/usuarios/face".$i.".jpg"; ?>" alt="Img" class="profile-image">
                    <h4>Usuario <?php echo $i ?><div class="usta-card-fecha">Fecha de creación: <?php echo date("Y-m-d", mt_rand(0, 500000000)); ?></div></h4>
                  </div>
                  <div class="usta-card-u">
                    <p>John Alexander Fandiño Rojas<br><i class="text-info">Cargo</i></p>
                  </div>
                  <a href="<?php echo URL."pages/user.php?id=$i" ?>" class="btn btn-inverse-secondary btn-rounded">Ver</a>
                </div>
              </div>
            </div>
          </div>          
        <?php endFor ?>

         <!-- Paginación -->
          <div class="content-wrapper">
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