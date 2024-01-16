<?php
$data = session()->get();
?>
<script src="https://kit.fontawesome.com/e89090f246.js" crossorigin="anonymous"></script>


<section style="background-image: url(public/template/assets/img/bg7.jpg); background-size: 100%; background-repeat: no-repeat;">
        <div class="container-fluid page-header">
            <div class="container" >
                <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                    <h3 class="display-4  text-white text-uppercase"><strong>Funeral</strong></h3>
                    <div class="d-inline-flex  text-white">
                        <p class="m-0 text-uppercase"><a class=" text-white" href="<?= base_url('home') ?>"><strong>Home</strong></a></p>
                          <i class="fa-solid fa-angles-right mt-1 mx-3"></i>
                        <p class="m-0 text-uppercase"><strong>Funeral Stands</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="products_section">
    <div class="container">
      <div class="row">
        <div class="col-xl-12 col-md-12 col-12 p-0 m-0">
            <h5 class="mt-5 text-center text-uppercase" style="letter-spacing: 5px; color: #02a618"><strong>Funeral Stands</strong></h5>
            <h1 class="mb-5 text-center font-weight-bold"><strong>Standing Sympathy Arrangement</strong></h1>
        </div>
      </div>
      <div class="row portfolio">
        <?php foreach($product as $row) : ?>
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="shadow p-3 mb-5 bg-body">
              <div class="d-flex justify-content-center portfolio-wrap">
              <a href="<?= base_url(); ?>/productdetails/<?= $row['id']; ?>"><img src="<?= base_url("public/public/products/".$row['product_image'])?>" class="img-fluid" style="width: 275px; height: 250px;" alt="products"></a>
              </div>
              <hr>
              <div class="px-4">
                <div class="mt-2 py-2">
                <div class="text-center">
                
                    <h5 class="mt-2 prod_font"><span style="color: #02a618"><?= $row['product_name']; ?></span></h5>
                    <h5 class="prod_font">₱ <?= $row['product_price']; ?></h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

