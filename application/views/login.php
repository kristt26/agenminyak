<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SPK SAW | Log in</title>
  <link rel="icon" href="<?=base_url('favicon.ico')?>">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>public/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?=base_url()?>public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>public/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <img src="<?=base_url()?>public/img/btn.png" width="75%" alt=""><br><br>
    <h4>SPK Pemilihan Karyawan Terbaik</h4>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      <?php
        if($this->session->flashdata('pesan')):
      ?>
      <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                  <?= $this->session->flashdata('pesan')?>
                </div>
        <?php endif; ?>
      <form method="post" accept-charset="utf-8" action="<?= base_url()?>auth/login">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?=base_url()?>public/plugins/jquery/jquery.min.js"></script>
<script src="<?=base_url()?>public/plugins/angular/angular.min.js"></script>

  <script src="<?=base_url()?>public/js/apps.js"></script>
  <script src="<?=base_url()?>public/js/services/helper.services.js"></script>
  <script src="<?=base_url()?>public/js/services/auth.services.js"></script>
  <!-- <script src="<?=base_url()?>public/js/services/storage.services.js"></script> -->
  <script src="<?=base_url()?>public/js/services/services.js"></script>
  <script src="<?=base_url()?>public/js/controllers/admin.controllers.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url()?>public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>public/dist/js/adminlte.min.js"></script>

</body>
</html>
