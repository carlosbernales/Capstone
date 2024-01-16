 
<script src="https://kit.fontawesome.com/e89090f246.js" crossorigin="anonymous"></script>
<?php
$data = session()->get();
?>

<section style="background-image: url(public/template/assets/img/bg7.jpg); background-size: 100%; background-repeat: no-repeat;">
        <div class="container-fluid page-header">
            <div class="container" >
                <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                    <h3 class="display-4  text-white text-uppercase"><strong>Flowers</strong></h3>
                    <div class="d-inline-flex  text-white">
                        <p class="m-0 text-uppercase"><a class=" text-white" href="<?= base_url('home') ?>"><strong>Home</strong></a></p>
                          <i class="fa-solid fa-angles-right mt-1 mx-3"></i>
                        <p class="m-0 text-uppercase"><strong>Dried Flower Bouquet</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="products_section">
    <div class="container">
      <div class="row">
        <div class="col-xl-12 col-md-12 col-12 p-0 m-0">
            <h5 class="mt-5 text-center text-uppercase" style="letter-spacing: 5px; color: #02a618"><strong>Dried Flower Bouquet</strong></h5>
            <h1 class="mb-5 text-center font-weight-bold"><strong>Longlasting and Elegant</strong></h1>
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
                  <?php
                        $product_id = $row['id'];
                        $ratings = array_filter($reviews, function ($review) use ($product_id) {
                            return $review['product_id'] == $product_id;
                        });

                        $rating_sum = 0;
                        foreach ($ratings as $rating) {
                            $rating_sum += $rating['rating'];
                        }

                        $average_rating = 0;
                        if (count($ratings) > 0) {
                            $average_rating = $rating_sum / count($ratings);
                        }
                        
                        $stars = floor($average_rating);
                        $half_star = ($average_rating - $stars) >= 0.5;

                        for ($i = 1; $i <= 5; $i++) {
                          if ($i <= $stars) {
                              echo '<span class="fa fa-star" style="font-size:15px;color:#02a618;"></span>';
                          } elseif ($half_star && $i == ($stars + 1)) {
                              echo '<span class="fa fa-star-half-o" style="font-size:15px;color:#02a618;"></span>';
                          } else {
                              echo '<span class="fa fa-star-o" style="font-size:15px;color:#ccc;"></span>';
                          }
                        }
                        ?>

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
 