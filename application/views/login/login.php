<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b>Login</b>
  </div>
  <?= $this->session->flashdata('pesan'); ?>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      <form action="" method="post">
      <?= form_error('UN','<small class="text-danger pl-3">','</small>');?>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="UN" <?= set_value('UN');?>>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-address-card"></span>
            </div>
          </div>
        </div>
        <?= form_error('PW','<small class="text-danger pl-3">','</small>');?>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="PW" <?= set_value('PW');?>>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col">
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
</body>

