<?php
$admin_data = session()->get();
?>
<!DOCTYPE html>
<html lang="en">

<!-- invoice.html  21 Nov 2019 04:05:05 GMT -->

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Bituin</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="/public/assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="/public/assets/css/style.css">
  <link rel="stylesheet" href="/public/assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="/public/assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='dist/img/bituinlogo.png' />

  <style>
    .invoice-title {
      display: flex;
      justify-content: center; /* Center the content horizontally */
      align-items: baseline;
    }

    .text-md-right {
      display: flex;
      justify-content: flex-end;
    }

    .float-lg-left {
      margin-right: 10px;
    }

    @media print {
      .hide-on-print {
        display: none !important;
      }
    }
    .swal2-modal {
      max-width: 400px !important; /* Adjust the width as needed */
    }
  </style>
</head>
<body>





































<!-- Main Content -->
<section class="section">
  <div class="section-body">
    <div class="invoice">
      <div class="invoice-print">
        <div class="row">
          <div class="col-md-12">
            <h2 style="text-align: center;">
              <img src="<?= base_url('public/assets/img/bituinlogo.png') ?>" alt="Logo" width="60" height="60">
              Receipt
            </h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <address>
              <div class="invoice-number" style="text-align: left;">
                <h6><?= $order['order_id'] ?> <span></span></h6>
                <input type="hidden" name="reference_id">
              </div>
              <h5 class="mb-3"><strong>Seller</strong></h5>
              <strong>Bituin Flower Shop</strong><br>
              09951776920<br>
              Bonifacio Street, Brgy. Ilaya<br>
              Calapan City Oriental Mindoro, Philippines
            </address>
          </div>
          <div class="col-md-6 text-md-right">
            <address>
              <strong>Date:</strong>
              <?= date('Y-m-d'); ?></span><br><br>
              <h5 class="mb-3"><strong>Buyer</strong></h5>
              <strong><?= $order['firstname'] ?> <?= $order['lastname'] ?></strong>
              <br>
              <?= $order['contact'] ?><br>
              <?php if ($order['order_type'] !== 'Pick Up' && $order['order_type'] !== 'Pick Up (Paid)') : ?>
                <?= $order['selected_barangay'] ?>, <?= $order['selected_city'] ?><br>
                <?= $order['other_infoaddres'] ?>
              <?php endif; ?>
            </address>
          </div>
        </div>
        <div class="row mt-6">
          <div class="col-md-12">
            <div class="section-title">Order Summary</div>
            
            <div class="table-responsive">
              <table class="table table-striped table-hover table-md">
                <tr>
                  <th>Name</th>
                  <?php
                    // Assuming $item is an associative array containing your data
                    
                    // Check if $item['flower_sizeOrtype'] is equal to "DragNdrop"
                    if ($order['flower_sizeOrtype'] == 'DragNdrop') {
                        // If not "DragNdrop", display the <th>Item Price</th>
                        echo '<th>Color</th>';
                    }
                    ?>
                 <?php
                    // Assuming $item is an associative array containing your data
                    
                    // Check if $item['flower_sizeOrtype'] is equal to "DragNdrop"
                    if ($order['flower_sizeOrtype'] !== 'DragNdrop') {
                        // If not "DragNdrop", display the <th>Item Price</th>
                        echo '<th>Item Price</th>';
                    }
                    ?>

                  <th>Quantity</th>
                   <?php
                    // Assuming $item is an associative array containing your data
                    
                    // Check if $item['flower_sizeOrtype'] is equal to "DragNdrop"
                    if ($order['flower_sizeOrtype'] !== 'DragNdrop') {
                        // If not "DragNdrop", display the <th>Item Price</th>
                        echo '<th>Total</th>';
                    }
                    ?>
                </tr>
                <?php foreach ($orderItems as $item) : ?>
                  <tr>
                    <td><?= $item['item_name'] ?></td>
                    <?php
                        // Assuming $item is an associative array containing your data
                        
                        // Check if $item['flower_sizeOrtype'] is not equal to "DragNdrop"
                        if ($order['flower_sizeOrtype'] == 'DragNdrop') {
                            // If not "DragNdrop", display the <td> element with item color
                            echo '<td>' . $item['item_color'] . '</td>';
                        }
                        ?>

                    <?php
                        $item_amount = $item['item_amount'];
                        
                        if ($item_amount != 0) {
                            echo "<td>$item_amount</td>";
                        }
                        ?>

                    <td><?= $item['item_qty'] ?></td>
                        <?php
                        $totalAmount = $item['item_amount'] * $item['item_qty'];
                        
                        // Check if the total amount is not equal to zero before displaying it
                        if ($totalAmount != 0) {
                             echo '<td>' . $totalAmount . '</td>';
                        }
                        ?>
                  </tr>
                <?php endforeach; ?>
              </table>
            </div>
            <div class="row mt-4">
              <div class="col-lg-8">
                <strong>Payment Method:</strong>
                <?php if ($order['order_type'] === 'Online') : ?>
                  <span>Paid</span>
                <?php elseif ($order['order_type'] === 'Pick Up (Paid)') :  ?>
                  <span>Already Paid for Pick Up</span>
                <?php elseif ($order['order_type'] === 'Pick Up') :  ?>
                <span>Pick Up</span>
                 <?php else :?>
                  <span>Cash on Delivery</span>
                <?php endif; ?>
                <div class="images">
               </div>
              </div>
              <div class="col-lg-4 text-right">
                <div class="invoice-detail-item">
                 <div class="invoice-detail-name">Total:  <span style="font-weight: bold; font-size: larger;">&#8369;<?= $order['order_amount'] ?></span></div>
                    <?php
                    if ($order['order_type'] !== 'Pick Up' && $order['order_type'] !== 'Pick Up (Paid)') {
                    ?>
                        <div class="invoice-detail-name">Shipping Fee: <span style="font-weight: bold; font-size: larger;">&#8369;<?= $order['shipping_fee'] ?></span></div>
                        <div class="invoice-detail-name">Subtotal: <span style="font-weight: bold; font-size: larger;">&#8369;<?= $order['shipping_fee'] + $order['order_amount'] ?></span></div>
                    <?php
                    }
                    ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <hr>
        <div class="col-lg-12 text-md-right">
          <div class="float-lg-left mb-lg-0 mb-3 hide-on-print">
            <a href="<?= base_url('topay_orders') ?>" class="btn btn-danger btn-icon icon-left">Close</span></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>





































    <!-- General JS Scripts -->
    <script src="/public/assets/js/app.min.js"></script>
    <!-- JS Libraies -->
    <!-- Page Specific JS File -->
    <!-- Template JS File -->
    <script src="/public/assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="/public/assets/js/custom.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18"></script>

    <script>
      document.addEventListener('DOMContentLoaded', function() {
        const payButton = document.getElementById('payButton');

        payButton.addEventListener('click', function(event) {
          event.preventDefault(); // Prevent form submission

          Swal.fire({
            title: 'Are you sure?',
            text: 'Once paid, the transaction cannot be reversed.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Pay',
            cancelButtonText: 'Cancel',
          }).then((result) => {
            if (result.isConfirmed) {
              // The user clicked "Pay"
              document.forms[0].submit(); // Submit the form
            }
          });
        });
      });

      window.onload = function() {
        window.print();
      };
    </script>
</body>

<!-- invoice.html  21 Nov 2019 04:05:05 GMT -->

</html>
