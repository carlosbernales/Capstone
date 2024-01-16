<script src="https://kit.fontawesome.com/e89090f246.js" crossorigin="anonymous"></script>
<?php
$data = session()->get();
?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

<section style="background-image: url(template/assets/img/bg7.jpg); background-size: 100%; background-repeat: no-repeat;">
        <div class="container-fluid page-header">
            <div class="container" >
                <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                    <h3 class="display-4  text-white text-uppercase"><strong>My Booking</strong></h3>
                    <div class="d-inline-flex  text-white">
                        <p class="m-0 text-uppercase"><a class=" text-white" href="<?= base_url('home') ?>"><strong>Home</strong> </a></p>
                          <i class="fa-solid fa-angles-right mt-1 mx-3"></i>
                        <p class="m-0 text-uppercase"><strong>My Booking</strong> </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

<section>
    <div class="container">
    <?php $validation =  \Config\Services::validation(); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center p-3 cdhead">
                        <h2><strong>Booking Details</strong></h2>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 p-3">
                                <h3 class="text-uppercase my-3 text-center"><strong>Bituins Flower Shop</strong></h3>
                                <div class="row mt-5" style="font-size:20px;">
                                    <div class="col-sm-5">
                                    <p><i class="fa-sharp fa-solid fa-location-dot" style="font-size:20px;color:#02a618;"></i> Calapan City, Jp. Rizal St. beside Halina Bakery</p>
                                    </div>
                                    <div class="col-sm-3">
                                    <p><i class="fa fa-mobile-phone" style="font-size:20px;color:#02a618;"></i> 0968-626-5272</p>
                                    </div>
                                    <div class="col-sm-4">
                                    <p><i class="fa-brands fa-facebook-f" style="font-size:20px;color:#02a618;"></i> Bituin's Flower Accessories Shop</p>
                                    </div>
                                </div>
                                <hr>
                            <div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 p-3">
                                <div class="card">

                                    <div class="card-header">
                                        <h4><strong>Pay Now</strong>
                                        <a href="<?=base_url('my_booking')?>"  style="border-radius:0px;" class="btn btn-secondary float-end">Go Back</a></h4>
                                    </div>
                                    <div class="row">
                                        <div class="col sm-8">
                                            <div class="card-body p-4">  
                                                <input type="hidden" name="id" value="<?= $edit_payment['id'] ?>">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <span class="mb-2 d-flex justify-content-between">
                                                        <strong>Recipient Name:</strong>Jennifer Acedillo
                                                        <strong>Gcash Number: </strong> 0948 812 3232</span>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                <form action="<?=base_url('update_payment_'.$edit_payment['id'])?>" method="post" enctype="multipart/form-data">
                                                    <?= csrf_field() ?>
                                                        <div class="form-group my-3">
                                                            <label>Enter the payment amount</label>
                                                            <input type="number" name="payment_amount" class="form-control <?php if($validation->getError('payment_amount')): ?>is-invalid<?php endif ?>">
                                                            <?php if ($validation->getError('payment_amount')): ?>
                                                                <div class="invalid-feedback">
                                                                    <?= $validation->getError('payment_amount') ?>
                                                                </div>                                
                                                            <?php endif; ?>
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label>Upload proof of payment. ('JPEG,JPG,PNG')</label>
                                                            <input class="form-control" name="proof_payment" type="file">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-success w-100" style="background-color: #02a618; border-color: #02a618;border-radius:0px;">Submit</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                        <img src="<?=base_url('/public/ss_payment/qrcode.jpg')?>" height="300" class="mt-3">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
            
<script>
   
	$(document).ready(function(){
    <?php if(session()->getFlashdata('status')){?>
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 1500,
        timerProgressBar: true,
        didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})
Toast.fire({
  icon: '<?= session()->getFlashdata('status_icon')?>',
  title: '<?= session()->getFlashdata('status')?>'
})
      <?php }?>
  });

</script>
