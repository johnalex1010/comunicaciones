<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
                  <img src="<?php echo URL ?>public/images/usuarios/face1.jpg" alt="profile image">
                </div>
                <div class="text-wrapper">
                  <p class="profile-name"><?php echo $_SESSION['usuario']; ?></p>
                  <div>
                    <small class="designation text-muted">Manager</small>
                  </div>
                </div>
              </div>
              <button class="btn btn-success btn-block">Nueva Solicitud<i class="mdi mdi-plus"></i></button>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URL ?>pages/admin.php">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URL ?>pages/statics.php">
              <i class="menu-icon mdi mdi-chart-line"></i>
              <span class="menu-title">Charts</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URL ?>pages/users.php">
              <i class="menu-icon mdi mdi-account-multiple-outline"></i>
              <span class="menu-title">Usuarios</span>
            </a>
          </li>
        </ul>
      </nav>