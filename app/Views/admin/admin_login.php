<?php
$admin_data = session()->get();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Bituin</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <link rel="stylesheet" href="assets/bundles/bootstrap-social/bootstrap-social.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='dist/img/bituinlogo.png' />
</head>
<body>
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
      <div class="mt-5 text-job text-center">
        <h5>Admin Login</h5>
        </div><br>
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">
              <div class="card-header">
                <div class="col-sm-6">
                  <a href="<?=base_url('admin_login')?>" class="btn w-100 text-white" style="background-color: blue">Admin</a>
                </div>
                <div class="col-sm-6">
                  <a href="<?=base_url('employee_login')?>" class="btn w-100 text-white" style="background-color: #02a618;">Employee</a>
                </div>
              </div>
              <div class="card-body">
                <?php $validation =  \Config\Services::validation(); ?>
                <?php if(session()->getFlashdata('msg')) : ?>
                  <div class="alert alert-danger" role="alert">
                    <?= session()->getFlashdata('msg') ?>
                  </div>
                <?php endif; ?>
                <form method="post" action="">
                  <?= csrf_field(); ?>
                  <div class="form-group">
                    <label for="email">Username</label>
                    <input type="text" placeholder="Username" class="form-control <?php if($validation->getError('username')): ?>is-invalid<?php endif ?>" name="username">
                    <?php if ($validation->getError('username')): ?>
                      <div class="invalid-feedback">
                        <?= $validation->getError('username') ?>
                      </div>
                    <?php endif; ?>
                  </div>
                  <div class="form-group">
                    <label for="email">Password</label>
                    <input type="password" placeholder="Password" class="form-control <?php if($validation->getError('password')): ?>is-invalid<?php endif ?>" name="password">
                    <?php if ($validation->getError('password')): ?>
                      <div class="invalid-feedback">
                        <?= $validation->getError('password') ?>
                      </div>
                    <?php endif; ?>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">Login</button>
                  </div>
                </form>
                <div class="text-center mt-4 mb-3">
                  <h6><a href="<?php echo base_url('/');?>" class="text-job float-end">Back to website</a></h6>
                </div>
              </div>
            </div>
            <div class="mt-5 text-muted text-center">
              Don't have an account? <a href="<?php echo base_url('admin_register');?>">Create One</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
</body>
</html>
