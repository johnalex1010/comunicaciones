<?php require_once '../models/model.usuario.php'; require_once '../models/model.permisoU.php'; ?>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <div class="nav-link">
        <div class="user-wrapper">
          <div class="profile-image">
            <img src="<?php echo URL ?>public/images/usuarios/<?php echo $consulta['usuario'] ?>.jpg" alt="profile image">
          </div>
          <div class="text-wrapper">
            <p class="profile-name"><?php echo $consulta['usuario']; ?></p>
            <div>
              <small class="designation text-muted"><?php echo $consulta['cargo']; ?></small>
            </div>
          </div>
        </div>
        <a href="<?php echo URLF ?>" class="btn btn-success btn-block" target="_blank">Nueva Solicitud<i class="mdi mdi-plus"></i></a>
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
        <span class="menu-title">Estadísticas</span>
      </a>
    </li>
    <?php if ($pU['id_permiso'] == 1): ?>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo URL ?>pages/users.php">
        <i class="menu-icon mdi mdi-account-multiple-outline"></i>
        <span class="menu-title">Usuarios</span>
      </a>
    </li>
    <?php endif ?>

    
  </ul>
</nav>