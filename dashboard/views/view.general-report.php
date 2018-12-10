<?php 
require_once '../pages/general.report.php';
?>
<div class="row">
	<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
      <div class="card card-statistics">
        <div class="card-body">
          <div class="clearfix">
            <div class="float-left">
              <i class="mdi mdi-bell-ring text-info icon-lg"></i>
            </div>
            <div class="float-right">
              <p class="mb-0 text-right">ST -> Ingresadas</p>
              <div class="fluid-container">
                <h3 class="font-weight-medium text-right mb-0"><?php echo $stsT['TOTAL']; ?></h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
      <div class="card card-statistics">
        <div class="card-body">
          <div class="clearfix">
            <div class="float-left">
              <i class="mdi mdi-bell text-success icon-lg"></i>
            </div>
            <div class="float-right">
              <p class="mb-0 text-right">ST -> Finalizadas</p>
              <div class="fluid-container">
                <h3 class="font-weight-medium text-right mb-0"><?php echo $stsF['FINALIZADAS']; ?></h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
      <div class="card card-statistics">
        <div class="card-body">
          <div class="clearfix">
            <div class="float-left">
              <i class="mdi mdi-bell-sleep text-warning icon-lg"></i>
            </div>
            <div class="float-right">
              <p class="mb-0 text-right">ST -> En desarrollo</p>
              <div class="fluid-container">
                <h3 class="font-weight-medium text-right mb-0"><?php echo $stsD['DESARROLLO']; ?></h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
      <div class="card card-statistics">
        <div class="card-body">
          <div class="clearfix">
            <div class="float-left">
              <i class="mdi mdi-bell-off text-danger icon-lg"></i>
            </div>
            <div class="float-right">
              <p class="mb-0 text-right">ST -> Canceladas</p>
              <div class="fluid-container">
                <h3 class="font-weight-medium text-right mb-0"><?php echo $stsC['CANCELADAS']; ?></h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>