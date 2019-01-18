<?php require_once '../views/view.header.php'; ?>
<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auto-form-wrapper">

              <form action="#" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
               <?php if (isset($error)) {
                  echo $error;
               } ?>
                <div class="form-group">
                  <label class="label">Usuario</label>
                  <div class="input-group">
                    <input type="text" name="usuario" class="form-control" placeholder="Usuario">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="label">Contraseña</label>
                  <div class="input-group">
                    <input type="password" name="password" class="form-control" placeholder="*********">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <button class="btn btn-primary submit-btn btn-block" name="submit">Iniciar sesión</button>
                </div>
                <div class="form-group d-flex justify-content-between">
                  <div class="form-check form-check-flat mt-0">
                    <!-- <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" checked> Recordar contraseña
                    </label> -->
                  </div>
                  <!-- <a href="#" class="text-small forgot-password text-black">Olvidé mi contraseña</a> -->
                </div>
              </form>
            </div>
            <ul class="auth-footer">
              <li>
                <a href="#">Términos y condiciones</a>
              </li>
            </ul>
            <p class="footer-text text-center">copyright © 2018 Bootstrapdash. All rights reserved.</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <?php require_once '../views/view.footer.php'; ?>