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
  <link rel='shortcut icon' type='image/x-icon' href="<?= base_url('public/assets/img/bituinlogo.png') ?>" />

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
              max-width: 330px !important; /* Adjust the width as needed */
              max-height: 300px !important;
          }
          .swal2-icon {
            font-size: 10px; /* Change the size to your desired value */
          }
    .hidden-td {
    display: none;
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
              <div class="col-lg-6">
                <div class="invoice-title">
                  <h2 style="text-align: center;">Receipt</h2>
                  <form method="post" action="<?= site_url('insert-custom-data'); ?>">
                  <input type="hidden" name="order_type" value="POS">
                  <input type="hidden" name="order_status" value="Completed">
                  <input type="hidden" name="firstname" value="<?= $firstname; ?>">
                  <input type="hidden" name="lastname" value="<?= $lastname; ?>">
                  <input type="hidden" name="contact" value="<?= $contact; ?>">
                </div>
                <div class="invoice-number d-flex justify-content-between">
                  <h6>REF_ID. <span><?= $reference_id; ?></span></h6>
                  <input type="hidden" name="reference_id" value="REF_ID. <?= $reference_id; ?>">
                  <address>
                        <strong>Date:</strong>
                        <?= date('Y-m-d'); ?></span><br>
                  </address>
                </div>
                
                <div class="row">
                  <div class="col-md-6">
                    <address>
                      <div class="invoice-number" style="text-align: left;">
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
                      <h5 class="mb-3"><strong>Buyer</strong></h5>
                      <strong><?= $firstname; ?> <?= $lastname; ?></strong>
                      <br>
                      <?= $contact; ?><br>
                    </address>
                  </div>
                </div>

                <div class="row mt-4">
                  <div class="col-md-12">
                    <div class="section-title">Order Summary</div>
                    <p class="section-lead">All items here cannot be deleted.</p>
                    <div class="table-responsive">
                      <table class="table table-striped table-hover table-md">
                        <tr>
                          <th>Name</th>
                          <th>Color</th>
                          <th>Quantity</th>
                        </tr>
                        <?php foreach ($formDataArray as $index => $formData) : ?>
                          <tr>
                            <td><span><?= $formData['name']; ?></span><input type="hidden" name="formDataArray[<?= $index; ?>][name]" value="<?= $formData['name']; ?>"></td>
                            <td><span><?= $formData['color']; ?></span><input type="hidden" name="formDataArray[<?= $index; ?>][color]" value="<?= $formData['color']; ?>"></td>
                            <td><span><?= $formData['new_input']; ?></span><input type="hidden" name="formDataArray[<?= $index; ?>][new_input]" value="<?= $formData['new_input']; ?>"></td>
                            <td class="hidden-td">
                            <span><?= $formData['total_input']; ?></span>
                            <input type="hidden" name="formDataArray[<?= $index; ?>][total_input]" value="<?= $formData['total_input']; ?>">
                            </td>
                            <td class="hidden-td">
                            <span><?= $formData['price']; ?></span>
                            <input type="hidden" name="formDataArray[<?= $index; ?>][price]" value="<?= $formData['price']; ?>">
                            </td>

                            
                          </tr>
                        <?php endforeach; ?>
                      </table>
                    </div>
                   <div class="row text-center">
                            <div class="col-lg-4 mx-auto">
                                <div class="invoice-detail-item">
                                    <div class="invoice-detail-name">Subtotal</div>
                                    <div class="invoice-detail-value">&#8369;<?php echo $receipt_total; ?></div>
                                </div>
                            </div>
                            <div class="col-lg-4 mx-auto">
                                <div class="invoice-detail-item">
                                    <div class="invoice-detail-name">Amount Paid</div>
                                    <div class="invoice-detail-value">&#8369;<?php echo $amount_paid; ?></div>
                                </div>
                            </div>
                            <div class="col-lg-4 mx-auto">
                                <div class="invoice-detail-item">
                                    <div class="invoice-detail-name">Change</div>
                                    <div class="invoice-detail-value invoice-detail-value-lg">&#8369;<?php echo $change; ?></div>
                                </div>
                            </div>
                        </div>
                        <br>
                        
                        <style>
                            .invoice-detail-items {
                                text-align: center; /* Center-align the text */
                            }
                        
                            .invoice-detail-names {
                                border-top: 1px solid #000; /* You can adjust the color and thickness of the underline */
                                display: inline-block; /* Ensures that the underline spans only the width of the text */
                                padding-top: 8px; /* Adjust the padding to control the space between the text and underline */
                                width: 100px; /* Adjust the width of the underline */
                            }
                        </style>
                        
                        <div class="row mt-4">
                            <div class="col-lg-8">
                                <div class="section-title"></div>
                                <p class="section-lead"></p>
                                <div class="images">
                                </div>
                            </div>
                            <div class="col-lg-2 text-right">
                            <div class="invoice-detail-items" style="position: relative;">
                                <div class="signature_image" style="position: absolute; top: -40px; left: 0; z-index: 1;">
                                    <?php

                                    if (!empty($userData['signature_image'])) {
                                        echo '<img src="' . base_url('public/public/signature_images/' . $userData['signature_image']) . '" alt="Signature Image" style="max-width: 100px; max-height: 100px; opacity: 0.5;">';
                                    }
                                    ?>

                                </div>
                                <div style="position: relative; z-index: 2;">
                                    <div class="invoice-detail-names">Seller Signature</div>
                                </div>
                            </div>
                        </div>

                        </div>
                      
                    </div>
                  </div>
                </div>
              </div>
              <hr>
              <div class="col-lg-12 text-md-right">
                <div class="float-lg-left mb-lg-0 mb-3 hide-on-print">
                  <button type="submit" id="payButton" class="btn btn-primary btn-icon icon-left"><i class="fas fa-credit-card"></i>Pay</button>
                  <a href="<?= base_url('pos_custom') ?>" class="btn btn-danger btn-icon icon-left"><i class="fas fa-times"></i><span>Cancel</span></a>
                </div>
              </div>
            </div>
            </form>
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
    <script src="<?= base_url() ?>/public/sweetalert/dist/sweetalert2.all.min.js"></script>

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
            confirmButtonColor: '#28a745',  // Green color for the "Yes" button
            cancelButtonColor: '#d33',
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
