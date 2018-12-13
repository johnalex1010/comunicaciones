<?php require_once '../views/view.header.php'; ?>
<body>
<?php $page = (isset($_GET["page"])) ? $_GET["page"] : 1; ?>
<?php Pagination::config($page, 8, "t_usuario", null , 6); ?>
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
        <!-- // Table -->
        <h3>Usuarios registrados <a href="<?php echo URL."pages/new-user.php" ?>" class="btn btn-inverse-success btn-rounded">Usuario +</a></h3>
        <br>
				<div class="row">
        <!-- //card -->
        <?php foreach (Pagination::show_rows("id_usuario") as $row): ?>
          <div class="col-lg-3 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="usta-card-user">
                  <div class="usta-card-img">
                    <?php if ($row['activo'] == 1): ?>
                      <h5>Usuario: <i class="text-success">activo</i></h5>
                    <?php else: ?>
                      <h5>Usuario: <i class="text-danger">inactivo</i></h5>
                    <?php endif ?>
                    <!-- <img src="<?php echo URL."public/images/usuarios/".$row['usuario'].".jpg"; ?>" alt="Img" class="profile-image"> -->
                    <h4><?php echo $row['usuario'] ?><div class="usta-card-fecha">Fecha de creación: <?php echo $row['fecha_creacion']?></div></h4>
                  </div>
                  <div class="usta-card-u">
                    <p>
                      <?php echo $row['nombres']." ".$row['apellidos'];?><br>
                      <i class="text-info"><?php echo $row['cargo'];?></i>
                      <br>
                      <i>Permisos: <?php echo $row['permiso'];?></i>
                    </p>
                  </div>
                  <a href="<?php echo URL."pages/user.php?id=".$row['id_usuario'] ?>" class="btn btn-inverse-secondary btn-rounded">Ver</a>
                </div>
              </div>
            </div>
          </div>          
        <?php endforeach; ?>

         <!-- Paginación -->
          <div class="content-wrapper">
           <div class="row">
              <div class="col-lg-12 grid-margin stretch-card" >
                <div class="btn-group" role="group" aria-label="First group" style="margin: auto">
                  <!-- Boton Inicio y siguiente-->
                  <?php if ($data["actual-section"] != 1): ?>
                    <a class="btn btn-primary btn-rounded" href="users.php?page=1" >Inicio</a>
                    <a class="btn btn-primary" href="users.php?page=<?php echo $data['previous']; ?>">&laquo;</a> 
                  <?php endif; ?>

                  <!-- Botones numerados-->
                  <?php for ($i = $data["section-start"]; $i <= $data["section-end"]; $i++): ?>         
                    <?php if ($i > $data["total-pages"]): break; endif; ?>
                    <?php $active = ($i == $data["this-page"]) ? "active" : ""; ?>          
                    <a class="<?php echo $active; ?> btn btn-primary" href="users.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    <?php endfor; ?>

                  <!-- Boton Atras y fin-->
                  <?php if ($data["actual-section"] != $data["total-sections"]): ?>
                      <a class="btn btn-primary" href="users.php?page=<?php echo $data['next']; ?>">&raquo;</a>
                      <a class="btn btn-primary btn-rounded" href="users.php?page=<?php echo $data['total-pages']; ?>">Final</a>
                    <?php endif; ?>
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