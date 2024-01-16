<?php
$admin_data = session()->get();
?>
<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Bituin</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?= base_url('public/assets/css/app.min.css') ?>">
  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url('public/assets/css/style.css') ?>">
  <link rel="stylesheet" href="<?= base_url('public/assets/css/components.css') ?>">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="<?= base_url('public/assets/css/custom.css') ?>">
    <link rel="stylesheet" href="<?= base_url('public/assets/bundles/datatables/datatables.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('public/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') ?>">
  <link rel='shortcut icon' type='image/x-icon' href="<?= base_url('public/assets/img/bituinlogo.png') ?>" />

  <style>
     .modal.fade .modal-dialog {
      transform: translate(0, -50%);
      transition: transform 0.3s ease-out;
    }
    .modal.fade.show .modal-dialog {
      transform: translate(0, 0);
    }
    .modal.fade.show {
      background-color: rgba(0, 0, 0, 0.6); /* Adjust the opacity as desired */
    }
  </style>
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                <i data-feather="maximize"></i>
              </a></li>
            <li>
              <form class="form-inline mr-auto">
                <div class="search-element">
                  <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200">
                  <button class="btn" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </form>
            </li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          

  <li class="dropdown dropdown-list-toggle">
    <a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg">
        <i data-feather="bell"></i>
        <?php
        $totalNotifications = (empty($newOrders) ? 0 : 1) + (empty($newcomment) ? 0 : 1) + (empty($newBooking) ? 0 : 1);
        if ($totalNotifications > 0):
        ?>
            <span class="badge badge-primary" id="notificationCount">
                <?php echo $totalNotifications; ?>
            </span>
        <?php endif; ?>
    </a>
    <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
        <div class="dropdown-header ">
            Notifications
            <div class="float-right">
            </div>
        </div>
        <?php if ($totalNotifications > 0): ?>
            <ul class="list-unstyled">
                <?php if (!empty($newOrders)): ?>
                    <li class="dropdown-item">
                        <a href="<?php echo base_url('pendingorders'); ?>" class="media-body text-decoration-none text-dark">
                            <div class="media-title"><b>New Order! Accept it now!</b></div>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (!empty($newcomment)): ?>
                    <li class="dropdown-item">
                        <div class="media-body">
                        <a href="<?php echo base_url('reviews'); ?>" class="media-body text-decoration-none text-dark">
                            <div class="media-title" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><b>New Review! Your response is needed for <br> buyer's reference!</b></div>
                        </div>
                    </li>
                <?php endif; ?>
                <?php if (!empty($newBooking)): ?>
                    <li class="dropdown-item">
                        <div class="media-body">
                        <a href="<?php echo base_url('reservationlist'); ?>" class="media-body text-decoration-none text-dark">
                            <div class="media-title" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><b>New Booking! Accept it now!</b></div>
                        </div>
                    </li>
                <?php endif; ?>
            </ul>
        <?php else: ?>
          <p class="dropdown-item">No new notifications.</p>
        <?php endif; ?>
    </div>
</li>






          
          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="<?= base_url('public/assets/img/user.png') ?>"
                class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title">Hello<?= isset($userData['firstname']) ? $userData['firstname'] : '' ?> </div>
              <a href="<?= base_url('admins') ?>" class="dropdown-item has-icon"> <i class="far
										fa-user"></i> Admins
              </a> 
              <a href="<?= base_url('employeelist') ?>" class="dropdown-item has-icon"> <i class="far
										fa-user"></i> Employees
              </a> 
              <div class="dropdown-divider"></div>
              <a href="<?= base_url('admin_logout') ?>" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
             <a> <img alt="image" src="<?= base_url('public/assets/img/bituinlogo.png') ?>" class="header-logo" /> <span
                class="logo-name">Bituin</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown">
              <a href="<?= base_url('dashboard') ?>" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>

            <li class="dropdown">
              <a href="<?= base_url('reservationlist') ?>" class="menu-toggle nav-link has-dropdown"><i data-feather="book-open"></i><span>Reservation</span></a>
              <ul class="dropdown-menu">
              <li><a class="nav-link" href="<?= base_url('reservationlist') ?>">Reservations</a></li>
                <li><a class="nav-link" href="<?= base_url('reservation_report') ?>">Reservation Report</a></li>
                 <li><a class="nav-link" href="<?= base_url('payment_list') ?>">Payments</a></li>
              </ul>
            </li>


            <li class="dropdown">
              <a href="<?= base_url('productlist') ?>" class="menu-toggle nav-link has-dropdown"><i data-feather="codepen"></i><span>Products</span></a>
              <ul class="dropdown-menu">
              <li><a class="nav-link" href="<?= base_url('categorylist') ?>">Product Category</a></li>
                <li><a class="nav-link" href="<?= base_url('productlist') ?>">Products</a></li>
              </ul>
            </li>
            
            
            <li class="dropdown">
              <a href="<?= base_url('orderlist') ?>" class="menu-toggle nav-link has-dropdown"><i data-feather="shopping-bag"></i><span>Orders</span></a>
              <ul class="dropdown-menu">
              <li><a class="nav-link" href="<?= base_url('orderlist') ?>">All Orders</a></li>
                <li><a class="nav-link" href="<?= base_url('pendingorders') ?>">Pending</a></li>
                <li><a class="nav-link" href="<?= base_url('topay_orders') ?>">Accepted</a></li>
                <li><a class="nav-link" href="<?= base_url('todeliver_orders') ?>">To Ship</a></li>
                <li><a class="nav-link" href="<?= base_url('pickup_orders') ?>">Pick Up</a></li>
                <li><a class="nav-link" href="<?= base_url('reviews') ?>">Order Reviews</a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="<?= base_url('stocks') ?>" class="menu-toggle nav-link has-dropdown"><i data-feather="archive"></i><span>Stocks</span></a>
              <ul class="dropdown-menu">
              <li><a class="nav-link" href="<?= base_url('stocks') ?>">Stocks</a></li>
                <li><a class="nav-link" href="<?= base_url('stocks_category') ?>">Stocks Category</a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="<?= base_url('sales') ?>" class="nav-link"><i data-feather="dollar-sign"></i><span>Sales</span></a>
            </li>

           


           

            <li class="dropdown">
            <a href="<?= base_url('pos_view') ?>" class="menu-toggle nav-link has-dropdown"><i data-feather="clipboard"></i><span>POS</span></a>
              <ul class="dropdown-menu">
              <li><a class="nav-link" href="<?= base_url('pos_view') ?>">POS Products</a></li>
              <li><a class="nav-link" href="<?= base_url('pos_custom') ?>">POS Customize</a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="<?= base_url('orderlist') ?>" class="menu-toggle nav-link has-dropdown"><i data-feather="shopping-bag"></i><span>Address</span></a>
              <ul class="dropdown-menu">
              <li><a class="nav-link" href="<?= base_url('citylist') ?>">City</a></li>
              <li><a class="nav-link" href="<?= base_url('brgylist') ?>">Barangay</a></li>
              </ul>
            </li>
          </ul>
        </aside>
      </div>




















































   
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <?php if (session()->has('success')) : ?>
                <div class="alert alert-success"><?= session('success') ?></div>
              <?php endif; ?>

              <?php if (session()->has('error')) : ?>
                <div class="alert alert-danger"><?= session('error') ?></div>
              <?php endif; ?>
            </div>
            <div class="card-body">
              <div class="profile-info">
                <div class="profile-field">
                  <span class="field-label"><strong>Full Name</strong></span>
                  <span class="field-value">
                    <?= isset($userData['firstname']) ? $userData['firstname'] : '' ?> <?= isset($userData['lastname']) ? $userData['lastname'] : '' ?>
                    <a class="edit-icon" data-toggle="modal" data-target="#fullnameModal">
                       <span class="fa fa-edit" style="font-size: 18px; font-weight: bold; color: red; cursor: pointer;"></span>
                    </a>
                  </span>
                </div> <br>


                <div class="profile-field">
                  <span class="field-label"><strong>Email</strong></span>
                  <span class="field-value">
                    <?= isset($userData['email']) ? $userData['email'] : '' ?>
                    <a class="edit-icon" data-toggle="modal" data-target="#emailModal">
                       <span class="fa fa-edit" style="font-size:18px; font-weight: bold; color: red; cursor: pointer;"></span>
                    </a>
                  </span>
                </div> <br>

                <div class="profile-field">
                  <span class="field-label"><strong>Contact</strong></span>
                  <span class="field-value">
                    <?= isset($userData['phone']) ? $userData['phone'] : '' ?>
                   <a class="edit-icon" data-toggle="modal" data-target="#contactModal">
                       <span class="fa fa-edit" style="font-size: 18px; font-weight: bold; color: red; cursor: pointer;"></span>
                    </a>
                  </span>
                </div> <br>

                <div class="profile-field">
                  <span class="field-label"><strong>Gcash Infos</strong></span>
                  <span class="field-value">
                    <?= isset($userData['gcash_no']) ? $userData['gcash_no'] : '' ?>
                    <a class="edit-icon" data-toggle="modal" data-target="#gcashModal">
                       <span class="fa fa-edit" style="font-size: 18px; font-weight: bold; color: red; cursor: pointer;"></span>
                    </a>
                  </span>
                </div> <br>

                <div class="profile-field">
                    <span class="field-label"><strong>Address</strong></span>
                    <span class="field-value">
                        <?= isset($userData['address']) ? $userData['address'] : '' ?>
                        <a class="edit-icon" data-toggle="modal" data-target="#addressModal">
                            <span class="fa fa-edit" style="font-size: 18px; font-weight: bold; color: red; cursor: pointer;"></span>
                        </a>
                    </span>
                </div>
                <br>


                <div class="profile-field">
                  <span class="field-label"><strong>Password</strong></span>
                  <span class="field-value">
                    <a class="edit-icon" data-toggle="modal" data-target="#passwordModal">
                       <span class="fa fa-edit" style="font-size: 18px; font-weight: bold; color: red; cursor: pointer;"></span>
                    </a>
                  </span>
                </div>
                
                


                    <div class="modal fade" id="emailModal" tabindex="-1" role="dialog" aria-labelledby="emailModalLabel" aria-hidden="true" data-backdrop="false">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                          <h5 class="modal-title" id="emailModal">Edit Email</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                          <form action="<?= site_url('saveAdmin') ?>" method="POST" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group mb-2">
                                  <label>Email</label>
                                  <input type="email" name="email" class="form-control" required>
                                  <input name="id" type="hidden"  value="<?= isset($userData['id']) ? $userData['id'] : '' ?>">
                                  <input name="firstname" type="hidden"  value="<?= isset($userData['firstname']) ? $userData['firstname'] : '' ?>">
                                  <input name="lastname" type="hidden"  value="<?= isset($userData['lastname']) ? $userData['lastname'] : '' ?>">
                                  <input name="address" type="hidden"  value="<?= isset($userData['address']) ? $userData['address'] : '' ?>">
                                  <input name="phone" type="hidden"  value="<?= isset($userData['phone']) ? $userData['phone'] : '' ?>">
                                </div>
                              </div>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary px-4 float-right">Save</button>
                          </form>
                          </div>
                        </div>
                      </div>
                    </div>





                    <div class="modal fade" id="fullnameModal" tabindex="-1" role="dialog" aria-labelledby="fullnameModalLabel" aria-hidden="true" data-backdrop="false">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                          <h5 class="modal-title" id="fullnameModal">Edit Fullname</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                          <form action="<?= site_url('saveAdmin') ?>" method="POST" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group mb-2">
                                  <label>Firstname</label>
                                  <input type="text" name="firstname" class="form-control" required >
                                </div>
                              </div>
                              <div class="col-md-12">
                                <div class="form-group mb-2">
                                  <label>Last Name</label>
                                  <input type="text" name="lastname" class="form-control" required>
                                  <input name="id" type="hidden"  value="<?= isset($userData['id']) ? $userData['id'] : '' ?>">
                                  <input name="address" type="hidden"  value="<?= isset($userData['address']) ? $userData['address'] : '' ?>">
                                  <input name="phone" type="hidden"  value="<?= isset($userData['phone']) ? $userData['phone'] : '' ?>">
                                  <input name="gcash_no" type="hidden"  value="<?= isset($userData['gcash_no']) ? $userData['gcash_no'] : '' ?>">
                                </div>
                              </div>
                              
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary px-4 float-right">Save</button>
                          </form>
                          </div>
                        </div>
                      </div>
                    </div>



                    <div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="contactModalLabel" aria-hidden="true" data-backdrop="false">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                          <form action="<?= site_url('saveAdmin') ?>" method="POST" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group mb-2">
                                  <label>New Phone #</label>
                                  <input type="text" name="phone" class="form-control" required >
                                  <input name="id" type="hidden"  value="<?= isset($userData['id']) ? $userData['id'] : '' ?>">
                                  <input name="firstname" type="hidden"  value="<?= isset($userData['firstname']) ? $userData['firstname'] : '' ?>">
                                  <input name="lastname" type="hidden"  value="<?= isset($userData['lastname']) ? $userData['lastname'] : '' ?>">
                                  <input name="address" type="hidden"  value="<?= isset($userData['address']) ? $userData['address'] : '' ?>">
                                  <input name="gcash_no" type="hidden"  value="<?= isset($userData['gcash_no']) ? $userData['gcash_no'] : '' ?>">
                                </div>
                              </div>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary px-4 float-right">Save</button>
                          </form>
                          </div>
                        </div>
                      </div>
                    </div>




                    <div class="modal fade" id="gcashModal" tabindex="-1" role="dialog" aria-labelledby="gcashModalLabel" aria-hidden="true" data-backdrop="false">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                          <form action="<?= site_url('saveAdmin') ?>" method="POST" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group mb-2">
                                  <label>New Phone #</label>
                                  <input type="number" name="gcash_no" class="form-control"  >
                                  <input name="id" type="hidden"  value="<?= isset($userData['id']) ? $userData['id'] : '' ?>">
                                  <input name="firstname" type="hidden"  value="<?= isset($userData['firstname']) ? $userData['firstname'] : '' ?>">
                                  <input name="phone" type="hidden"  value="<?= isset($userData['phone']) ? $userData['phone'] : '' ?>">
                                  <input name="lastname" type="hidden"  value="<?= isset($userData['lastname']) ? $userData['lastname'] : '' ?>">
                                  <input name="address" type="hidden"  value="<?= isset($userData['address']) ? $userData['address'] : '' ?>">
                                </div>
                              </div>
                              <div class="col-md-12">
                                <div class="form-group mb-2">
                                  <label>Gcash QR</label>
                                  <input type="file" name="gcash_qr" class="form-control"  >
                                </div>
                              </div>
                              <div class="col-md-12">
                                <div class="form-group mb-2">
                                  <label>Signature</label>
                                  <input type="file" name="signature_image" class="form-control"  >
                                </div>
                              </div>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary px-4 float-right">Save</button>
                          </form>
                          </div>
                        </div>
                      </div>
                    </div>




                    <div class="modal fade" id="addressModal" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true" data-backdrop="false">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                          <form action="<?= site_url('saveAdmin') ?>" method="POST" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group mb-2">
                                  <label>New Address</label>
                                  <input type="text" name="address" class="form-control" required >
                                  <input name="id" type="hidden"  value="<?= isset($userData['id']) ? $userData['id'] : '' ?>">
                                  <input name="firstname" type="hidden"  value="<?= isset($userData['firstname']) ? $userData['firstname'] : '' ?>">
                                  <input name="lastname" type="hidden"  value="<?= isset($userData['lastname']) ? $userData['lastname'] : '' ?>">
                                  <input name="phone" type="hidden"  value="<?= isset($userData['phone']) ? $userData['phone'] : '' ?>">
                                  <input name="gcash_no" type="hidden"  value="<?= isset($userData['gcash_no']) ? $userData['gcash_no'] : '' ?>">
                                </div>
                              </div>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary px-4 float-right">Save</button>
                          </form>
                          </div>
                        </div>
                      </div>
                    </div>




                    <div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="passwordModalLabel" aria-hidden="true" data-backdrop="false">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                          <form action="<?= site_url('saveAdmin') ?>" method="POST" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group mb-2">
                                  <label>New Password</label>
                                  <input type="password" name="password" id="password" class="form-control" required >
                                </div>
                              </div>

                              <div class="col-md-12">
                                <div class="form-group mb-2">
                                  <label>Confirm Password</label>
                                  <input type="password" name="confirm_password" id="confirm_password" class="form-control" required >
                                  <input name="id" type="hidden"  value="<?= isset($userData['id']) ? $userData['id'] : '' ?>">
                                  <input name="firstname" type="hidden"  value="<?= isset($userData['firstname']) ? $userData['firstname'] : '' ?>">
                                  <input name="lastname" type="hidden"  value="<?= isset($userData['lastname']) ? $userData['lastname'] : '' ?>">
                                  <input name="address" type="hidden"  value="<?= isset($userData['address']) ? $userData['address'] : '' ?>">
                                  <input name="phone" type="hidden"  value="<?= isset($userData['phone']) ? $userData['phone'] : '' ?>">
                                  <input name="email" type="hidden"  value="<?= isset($userData['email']) ? $userData['email'] : '' ?>">
                                  <input name="gcash_no" type="hidden"  value="<?= isset($userData['gcash_no']) ? $userData['gcash_no'] : '' ?>">
                                </div>
                              </div>
                              
                            </div>
                             <div class="col-sm-12">
                                <div class="form-group mb-2">
                                    <input type="checkbox" class="form-group-input width-auto" id="show_password_checkbox">
                                    <label class="form-group-label" for="show_password_checkbox">Show Password</label>
                                 </div>
                             </div>
                            <hr>
                            <button type="submit" class="btn btn-primary px-4 float-right">Save</button>
                          </form>
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
    </div>
  </section>
</div>



            



            
      


              
      

        
          



























    
     
          
          
          

        <div class="settingSidebar">
          <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
          </a>
          <div class="settingSidebar-body ps-container ps-theme-default">
            <div class=" fade show active">
              <div class="setting-panel-header">Setting Panel
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Select Layout</h6>
                <div class="selectgroup layout-color w-50">
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout" checked>
                    <span class="selectgroup-button">Light</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="2" class="selectgroup-input-radio select-layout">
                    <span class="selectgroup-button">Dark</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Sidebar Color</h6>
                <div class="selectgroup selectgroup-pills sidebar-color">
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Color Theme</h6>
                <div class="theme-setting-options">
                  <ul class="choose-theme list-unstyled mb-0">
                    <li title="white" class="active">
                      <div class="white"></div>
                    </li>
                    <li title="cyan">
                      <div class="cyan"></div>
                    </li>
                    <li title="black">
                      <div class="black"></div>
                    </li>
                    <li title="purple">
                      <div class="purple"></div>
                    </li>
                    <li title="orange">
                      <div class="orange"></div>
                    </li>
                    <li title="green">
                      <div class="green"></div>
                    </li>
                    <li title="red">
                      <div class="red"></div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="mini_sidebar_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Mini Sidebar</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="sticky_header_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Sticky Header</span>
                  </label>
                </div>
              </div>
              <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                  <i class="fas fa-undo"></i> Restore Default
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
        <strong>Copyright &copy; 2021-2023 <a href="http://adminlte.io">Bituin Flowers</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <!-- <b>Version</b> 3.0.2 -->
    </div>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>
  <!-- General JS Scripts -->
  <script src="<?= base_url('public/assets/js/app.min.js') ?>"></script>
  <!-- JS Libraies -->
  <script src="<?= base_url('public/assets/bundles/apexcharts/apexcharts.min.js') ?>"></script>
  <!-- Page Specific JS File -->
  <script src="<?= base_url('public/assets/js/page/index.js') ?>"></script>
  <!-- Template JS File -->
  <script src="<?= base_url('public/assets/js/scripts.js') ?>"></script>
  <!-- Custom JS File -->
  <script src="<?= base_url('public/assets/js/custom.js') ?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="<?= base_url('') ?>public/assets/bundles/datatables/datatables.min.js"></script>
  <script src="<?= base_url('') ?>public/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script>
      const showPasswordCheckbox = document.getElementById('show_password_checkbox');
        const passwordInput = document.getElementById('password');
        const confirmPassInput = document.getElementById('confirm_password');

        showPasswordCheckbox.addEventListener('change', () => {
            if (showPasswordCheckbox.checked) {
                passwordInput.type = 'text';
                confirmPassInput.type = 'text';
            } else {
                passwordInput.type = 'password';
                confirmPassInput.type = 'password';
            }
        });
  </script>
  
  
</body>

</html>