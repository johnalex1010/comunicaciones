<?php require_once '../models/model.usuario.php'; ?>
<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
    <a class="navbar-brand brand-logo" href="<?php echo URL ?>">
      <!-- <img src="<?php echo URL ?>public/images/logo.svg" alt="logo" /> -->
      <img src="<?php echo URL ?>public/images/solicita.fw.png" alt="logo" />
    </a>
    <a class="navbar-brand brand-logo-mini" href="<?php echo URL ?>">
      <img src="<?php echo URL ?>public/images/logo-mini.svg" alt="logo" />
    </a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center">
<!-- 	<ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
		<li class="nav-item	">
			<a href="#" class="nav-link"><i class="mdi mdi-elevation-rise"></i>Reportes</a>
		</li>
	</ul> -->
	<ul class="navbar-nav navbar-nav-right">
		<li class="nav-item dropdown d-none d-xl-inline-block">
			<a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
				<span class="profile-text">Hola, <?php echo $consulta['nombres']." ".$consulta['apellidos']; ?> !</span>
				<!-- <img class="img-xs rounded-circle" src="<?php echo URL ?>public/images/usuarios/<?php echo $consulta['usuario'] ?>.jpg" alt="Profile image"> -->
			</a>
			<div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
				<a href="<?php echo URL ?>pages/perfil.php"class="dropdown-item mt-2">Mi perfil</a>
				<a href="<?php echo URL . 'pages/cerrar-session.php'; ?>"class="dropdown-item">Cerrar sesión</a>
			</div>
		</li>
	</ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="mdi mdi-menu"></span>
    </button>
  </div>
</nav>