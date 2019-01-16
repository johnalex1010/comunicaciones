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
        <!-- // Panel Home -->
        <?php require_once '../views/view.general-report.php'; ?>
        
          <!-- // Table -->
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
            <h3 style="text-align: center">Algunas alertas están a punto de expirar</h3>
            <div class="table-responsive">
              <table class="table table_alerta">
                  <thead>
                    <tr>
                      <th>ST</th>
                      <th>Fecha de expiración</th>
                      <th>Ultímo comentario</th>
                      
                    </tr>
                  </thead>
                <tbody>
                  <?php
                    for ($i = 0; $i < $totalAl; $i++){
                      $date1 = date('Y-m-d');
                      $date2 = $consultaAl[$i]['fecha_alerta'];
                      if ($date1 <= $date2) {
                        $date1 = new DateTime($date1);
                        $date2 = new DateTime($date2);
                        $diff = $date1->diff($date2);
                        $diferencia = $diff->days;
                        if ($diferencia <= 5){
                  ?>
                    <tr>
                      <td><?php echo $consultaAl[$i]["numST"]; ?></td>
                      <td>La alerta expira el <b class="text-success"><?php echo $consultaAl[$i]['fecha_alerta']; ?></b></td>
                      <td ><?php echo $consultaAl[$i]['comentario'] ?></td>
                       <td><a class="btn btn-inverse-primary btn-rounded" href="<?php echo URL."pages/resume.php?ST=".$consultaAl[$i]["numST"]; ?>">Ver</a></td>
                    </tr>
                  <?php
                        }
                      }
                    }
                  ?>                  
                </tbody>
              </table>
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