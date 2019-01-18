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
        <?php if (isset($popMjsExito)): ?>
         <div class="row purchace-popup">
          <div class="col-12 pop-new-user">
            <span class="d-block d-md-flex align-items-center">
              <p><?php echo $popMjsExito ?></p>
              <i class="mdi mdi-close popup-dismiss d-none d-md-block"></i>
            </span>
          </div>
        </div>
        <?php endif ?>


          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
               <h2 class="display1 ">Creación de usuario</h2>
            </div>
          </div>
        
            <!-- // Table -->
        <form action="#" method="POST">
        <div class="row">
          <div class="col-lg-4 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Información de contacto</h4>
                <div class="usta-perfil">
                  <div class="usta-perfil-form">
                      <!-- <label for="">Foto de perfil</label>
                      <input type="file" class="form-control" placeholder="Subir foto de perfil"> -->
                      <!-- <br> -->
                      <input type="text" class="form-control" id="exampleInputName1" name="nombres" placeholder="Nombre(s)" value="<?php echo !empty($_POST['nombres']) ? $_POST['nombres'] : "" ?>">
                      <br>
                      <input type="text" class="form-control" id="exampleInputName1" name="apellidos" placeholder="Apellido(s)" value="<?php echo !empty($_POST['apellidos']) ? $_POST['apellidos'] : "" ?>">
                      <br>
                      <input type="email" class="form-control" id="exampleInputName1" name="email" placeholder="Correo instutucional" value="<?php echo !empty($_POST['email']) ? $_POST['email'] : "" ?>">
                      <br>
                      <select class="form-control" name="cargo" >
                        <option value="" disabled selected>Cargo</option>                        
                         <?php
                          for ($i=0; $i < $totalCargo; $i++) { 
                            echo "<option value='".$cargo[$i]['id_cargo']."'>".$cargo[$i]['cargo']."</option>";
                          }
                        ?>
                      </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Datos de usuario</h4>
                <div class="usta-perfil">
                  <div class="usta-perfil-form">
                      <input type="text" class="form-control" id="exampleInputName1" name="usuario" placeholder="Usuario" value="<?php echo !empty($_POST['usuario']) ? $_POST['usuario'] : "" ?>">
                      <br>
                      <input type="password" class="form-control" id="exampleInputName1" name="password" placeholder="Contraseña">
                      <br>
                      <input type="password" class="form-control" id="exampleInputName1" name="repassword" placeholder="Repetir Contraseña">
                      <br>
                       <select class="form-control" name="permiso">
                        <option value="" disabled selected>Permisos</option>
                         <?php
                          for ($i=0; $i < $totalPermiso; $i++) { 
                            echo "<option value='".$permiso[$i]['id_permiso']."'>".$permiso[$i]['permiso']."</option>";
                          }
                        ?>
                      </select>
                      <br>                      
                      <input type="submit" name="submitNU" class="btn btn-success mr-2" value="Crear usuario">
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php if ($error): ?>
          <div class="col-lg-4 grid-margin stretch-card">
            <div class="card">
              <div class="card-body card-error">
                <h4 class="card-title">Errores</h4>
                <ul class="list-arrow">
                <?php
                  foreach ($error as $error) {
                    echo "<li>".$error ."</li>";
                  }
                ?>
                </ul>
              </div>
            </div>              
          </div>
          <?php endif ?>         
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