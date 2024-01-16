
<?php
$data = session()->get();

?>
<?= $this->extend('admin/adminlte3/index') ?>

<?= $this->section('content') ?>


<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Edit customization</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Customization</li>
          <li class="breadcrumb-item active">Edit customization</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
  

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Product
                        <a href="<?= site_url('customizationlist'); ?>" class="btn btn-danger px-4 float-right">Back</a></h4>     
                        </h4>   
                    </div>
                    <div class="card-body">
                        <form action="<?= site_url('updatecustom_'.$custom['id']) ?>" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h2>Customer Details</h2>						
                                        <div class="form-group mb-2 mt-3">
                                            <label>Full Name</label>
                                            <input type="text" name="name" id="name"  class="form-control" value="<?= $data['firstname'].' '.$data['lastname'] ?>" readonly>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label>Email Address</label>
                                            <input type="text" name="email" id="email" class="form-control" value="<?= $data['email']?>" readonly>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label>Contact Number</label>
                                            <input type="text" name="phone" id="phone" class="form-control" value="<?= $data['phone']?>"readonly>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label>Contact Number</label>
                                            <input type="text" name="phone" id="phone" class="form-control" value="<?= $data['phone']?>"readonly>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label>Total Amount</label>
                                            <input type="text" name="est_amount" id="est_amount" class="form-control"  value="<?= $custom['est_amount']?>">
                                        </div>
                                       
                                    </div>
                                    <div class="col-md-6">
                                    <h2>Flower Details</h2>	
                                        
                                    <div class="form-group mb-2 mt-3">
                                            <label>Upload your desire customization</label>
                                            <input type="file" name="custom_img"  class="form-control" >
                                        </div>

                                        <div class="form-group mb-2">
                                            <label>Customized Description</label>
                                            <textarea name="custom_des" value="<?= $custom['custom_des']?>"  cols="30" rows="5" class="form-control" placeholder="Optional..."></textarea>
                                        </div>
                                        <label>Status</label>
                                        <div class="input-group">
                                            <select name="status"  value="<?= $custom['status'] ?>" class="custom-select">
                                            <option><?= $custom['status'] ?></option>
                                                <option>Pending</option>
                                                <option>Accepted</option>
                                                <option>Cancel</option>
                                            </select>
                                        </div>
                                    <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary mt-3 float-right">Submit</button>
                                    </div>
                                </div>
                            </form>
					</div>
                </div>
                
            </div>
            
        </div>
        <div class="col-md-6 mt-5">
                    <img src="<?= base_url("public/customization/".$custom['custom_img']); ?>" class="rounded" width="500px" height="500px" alt="image">
                </div>
    </div>  
    </div>                 


    <?= $this->endSection() ?>