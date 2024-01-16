<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Bituin</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?=base_url()?>/public/assets/css/app.min.css">
  <link rel="stylesheet" href="<?=base_url()?>/public/assets/bundles/jquery-selectric/selectric.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="<?=base_url()?>/public/assets/css/style.css">
  <link rel="stylesheet" href="<?=base_url()?>/public/assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="<?=base_url()?>/public/assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href="<?=base_url('public/assets/img/bituinlogo.png')?>" />
</head>

<body>
<div class="loader"></div>
<div id="app">
    <section class="section">
        <?php $validation =  \Config\Services::validation(); ?>
        <div class="container mt-5">
            <div class="mt-5 text-job text-center">
                <h5>Admin Register</h5>
            </div><br>
            <div class="row">
                <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                    <div class="card card-primary">
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                            <?php if(session()->getFlashdata('error')) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?= session()->getFlashdata('error') ?>
                            </div>
                            <?php endif; ?>
                            <form method="post" action="<?= site_url('admin_register') ?>">
                                <?= csrf_field(); ?>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control <?php if($validation->getError('email')): ?>is-invalid<?php endif ?>" name="email" value="<?= set_value('email') ?>"> 
                                    <?php if ($validation->getError('email')): ?>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('email') ?>
                                    </div>                                
                                    <?php endif; ?>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-6">
                                        <label for="firstname">Firstname</label>
                                        <input type="text" class="form-control <?php if($validation->getError('firstname')): ?>is-invalid<?php endif ?>" name="firstname" style="text-transform: capitalize;" value="<?= set_value('firstname') ?>"> 
                                        <?php if ($validation->getError('firstname')): ?>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('firstname') ?>
                                        </div>                                
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="lastname">Lastname</label>
                                        <input type="text" class="form-control <?php if($validation->getError('lastname')): ?>is-invalid<?php endif ?>" name="lastname" style="text-transform: capitalize;" value="<?= set_value('lastname') ?>"> 
                                        <?php if ($validation->getError('lastname')): ?>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('lastname') ?>
                                        </div>                                
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="phone" class="d-block">Phone Number</label>
                                        <input type="number" maxlength="11" class="form-control <?php if($validation->getError('phone')): ?>is-invalid<?php endif ?>" name="phone" value="<?= set_value('phone') ?>"> 
                                        <?php if ($validation->getError('phone')): ?>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('phone') ?>
                                        </div>                                
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="address">Address</label>
                                        <input type="address" class="form-control <?php if($validation->getError('address')): ?>is-invalid<?php endif ?>" name="address" style="text-transform: capitalize;" value="<?= set_value('address') ?>"> 
                                        <?php if ($validation->getError('address')): ?>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('address') ?>
                                        </div>                                
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="password" class="d-block">Password</label>
                                        <input type="password" class="form-control <?php if($validation->getError('password')): ?>is-invalid<?php endif ?>"  name="password">
                                        <?php if ($validation->getError('password')): ?>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('password') ?>
                                        </div>                                
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="confirm_password">Confirm Password</label>
                                        <input type="password" class="form-control <?php if($validation->getError('confirm_password')): ?>is-invalid<?php endif ?>"  name="confirm_password">
                                        <?php if ($validation->getError('confirm_password')): ?>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('confirm_password') ?>
                                        </div>                                
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        Register
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="mb-4 text-muted text-center">
                            Already Registered? <a href="<?php echo base_url('signin');?>">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

  <!-- General JS Scripts -->
  <script src="<?=base_url()?>/public/assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <script src="<?=base_url()?>/public/assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="<?=base_url()?>/public/assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="<?=base_url()?>/public/assets/js/page/auth-register.js"></script>
  <!-- Template JS File -->
  <script src="<?=base_url()?>/public/assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="<?=base_url()?>/public/assets/js/custom.js"></script>
</body>

</html>
