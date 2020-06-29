<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <b>Register</b>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form action="<?php echo base_url('register/insert');?>" enctype="multipart/form-data" method="post">
      <?= form_error('Nama','<small class="text-danger pl-3">','</small>');?>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Full name" name="Nama" value=<?= set_value('Nama');?>>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <?= form_error('UN','<small class="text-danger pl-3">','</small>');?>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="UN" value=<?= set_value('UN');?>>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-address-card"></span>
            </div>
          </div>
        </div>
        <?= form_error('PW','<small class="text-danger pl-3">','</small>');?>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="PW">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <?= form_error('PW2','<small class="text-danger pl-3">','</small>');?>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Retype password" name="PW2">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <?= form_error('HP','<small class="text-danger pl-3">','</small>');?>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Phone Number" name="HP" value=<?= set_value('HP');?>>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="file" class="form-control" name="Foto">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-image"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


      <a href="<?php echo base_url('login');?>" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->
</body>
