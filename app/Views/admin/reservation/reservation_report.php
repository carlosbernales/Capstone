<?php
$admin_data = session()->get();
?>
<!DOCTYPE html>
<html lang="en">


<!-- datatables.html  21 Nov 2019 03:55:21 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Bituin</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?= base_url('public/assets/css/app.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('public/assets/bundles/datatables/datatables.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('public/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') ?>">
  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url('public/assets/css/style.css') ?>">
  <link rel="stylesheet" href="<?= base_url('public/assets/css/components.css') ?>">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="<?= base_url('public/assets/css/custom.css') ?>">
  <link rel='shortcut icon' type='image/x-icon' href="<?= base_url('dist/img/bituinlogo.png') ?>" />

  <style>
    /* Custom styles for header and footer */
    .header {
      font-weight: bold;
      font-size: 16px;
      background-color: #f2f2f2;
      padding: 10px;
    }
    .footer {
      font-size: 14px;
      background-color: #f2f2f2;
      padding: 10px;
      text-align: center;
    }
  </style>
  <script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
  <script>
     function printDataTable() {
        var header = "<div class='header'><span style='text-align: center;'><h1>Bituin's Florist Sales Report</h1></span></div>";
        var footer = "<div class='footer'><span style='text-align: center;'><h3>Bituin's Flowers Shop EST. 2021-2023</h3></span></div>";

        var printWindow = window.open('', '_blank');
        printWindow.document.open();
        printWindow.document.write(header);
        printWindow.document.write("<style>table th, table td { text-align: center; }</style>");
        printWindow.document.write("<style>.hide-on-print { display: none; }</style>");

        // Remove the 'View' column header before printing
        var exampleTable = document.getElementById('example').cloneNode(true);
        var viewColumnHeader = exampleTable.querySelector('.hide-on-print');
        if (viewColumnHeader) {
            viewColumnHeader.parentNode.removeChild(viewColumnHeader);
        }

        printWindow.document.write(exampleTable.outerHTML);
        printWindow.document.write(footer);
        printWindow.document.close();
        printWindow.print();
    }

    function exportToExcel() {
        // Clone the table and remove the 'View' column header and corresponding buttons
        var exampleTable = document.getElementById('example').cloneNode(true);
        var viewColumnHeader = exampleTable.querySelector('.hide-on-print');
        if (viewColumnHeader) {
            viewColumnHeader.parentNode.removeChild(viewColumnHeader);
        }

        // Remove corresponding buttons in each row
        var rows = exampleTable.querySelectorAll('tr');
        for (var i = 0; i < rows.length; i++) {
            var buttons = rows[i].querySelectorAll('.hide-on-print');
            for (var j = 0; j < buttons.length; j++) {
                buttons[j].parentNode.removeChild(buttons[j]);
            }
        }
        var worksheet = XLSX.utils.table_to_sheet(exampleTable);
        var workbook = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(workbook, worksheet, 'Sheet1');
        XLSX.writeFile(workbook, 'Sales Report.xlsx');
    }
  </script>
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
        $totalNotifications = (empty($newOrders) ? 0 : 1) + (empty($newcomment) ? 0 : 1) 
        + (empty($newBooking) ? 0 : 1) + (empty($toshipOrders) ? 0 : 1) + (empty($onthewayOrders) ? 0 : 1);
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
                <?php if (!empty($toshipOrders)): ?>
                    <li class="dropdown-item">
                        <a href="<?php echo base_url('topay_orders'); ?>" class="media-body text-decoration-none text-dark">
                            <div class="media-title"><b>A order is ready to ship, deliver it now!</b></div>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (!empty($onthewayOrders)): ?>
                    <li class="dropdown-item">
                        <a href="<?php echo base_url('todeliver_orders'); ?>" class="media-body text-decoration-none text-dark">
                            <div class="media-title"><b>This order is delivered? Mark it as delivered!</b></div>
                        </a>
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
            <div class="dropdown-title">Hello <?= $user_info['firstname'] ?></div>
              <a href="<?= base_url('admin_profile') ?>" class="dropdown-item has-icon"> <i class="far
										fa-user"></i> Profile
              </a> <a href="<?= base_url('admins') ?>" class="dropdown-item has-icon"> <i class="fas fa-bolt"></i>
                Admins
              </a> 
              <a href="<?= base_url('employeelist') ?>" class="dropdown-item has-icon"> <i class="fas fa-bolt"></i>
                Employees
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
            <li class="dropdown ">
              <a href="<?= base_url('dashboard') ?>" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>

            <li class="dropdown active">
              <a href="<?= base_url('reservationlist') ?>" class="menu-toggle nav-link has-dropdown"><i data-feather="book-open"></i><span>Reservation</span></a>
              <ul class="dropdown-menu">
              <li><a class="nav-link" href="<?= base_url('reservationlist') ?>">Reservations</a></li>
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
                    <h4>Reservation Reports</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="example" style="width:100%;">
                        <thead>
                          <tr>
                          <th>Name</th>
                      <th>Contact Number</th>
                      <th>Location</th>
                      <th>Event Date</th>
                      <th>Payment</th>
                          </tr>
                        </thead>
                        <tbody>
                    <?php foreach($booking as $row) : ?>
                      <tr>
                          <td><?= $row['fullname'] ?></td>
                          <td><?= $row['contact'] ?></td>
                          <td><?= $row['location'] ?></td>
                          <td><?= $row['booking_date_formatted'] ?></td>
                          <td><?= $row['payment_amount'] ?></td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th colspan="4"></th>
                        <th  id="total"></th>
                      </tr>
                    </tfoot>
                  </table>
                <div class="text-center">
                <button onclick="printDataTable()" class="btn btn-primary"><i class="fa fa-print" aria-hidden="true"></i> Print</button>
               <button onclick="exportToExcel()" class="btn btn-success"><i class="fa fa-file-excel" aria-hidden="true"></i> Excel</button>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


























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
          <a href="templateshub.net">Templateshub</a></a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>
  <!-- General JS Scripts -->
  <script src="<?= base_url('public/assets/js/app.min.js') ?>"></script>
  <!-- JS Libraies -->
  <script src="<?= base_url('public/assets/bundles/datatables/datatables.min.js') ?>"></script>
  <script src="<?= base_url('public/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') ?>"></script>
  <script src="<?= base_url('public/assets/bundles/jquery-ui/jquery-ui.min.js') ?>"></script>
  <!-- Page Specific JS File -->
  <script src="<?= base_url('public/assets/js/page/datatables.js') ?>"></script>
  <!-- Template JS File -->
  <script src="<?= base_url('public/assets/js/scripts.js') ?>"></script>
  <!-- Custom JS File -->
  <script src="<?= base_url('public/assets/js/custom.js') ?>"></script>

  <script src="<?= base_url() ?>/public/sweetalert/dist/sweetalert2.all.min.js"></script>
<!-- Page specific script -->
<script src="https://cdn.datatables.net/plug-ins/1.10.20/api/sum().js"></script>
<script>

$(document).ready(function(){
      var table = $("#example").DataTable({
        "createdRow":function(row,data,index){                   
            if(data[4] >= 500){
            $('td', row).css({
                    'color':'black',
                });
            }
        }, 
        "drawCallback":function(){
              var api = this.api();
              $(api.column(4).footer()).html(
                  'Total: &#8369;'+api.column(4, {page:'current'}).data().sum()
              )
        }
      });
    });
</script>
</body>


<!-- datatables.html  21 Nov 2019 03:55:25 GMT -->
</html>