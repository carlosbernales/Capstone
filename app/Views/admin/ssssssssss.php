<?= $this->extend('admin/adminlte3/index') ?>

<?= $this->section('content') ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?=count($category_count);?></h3>

                <p>Category</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-list"></i>
              </div>
              <a href="<?=base_url('categorylist')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3><?=count($product_count);?><sup style="font-size: 20px"></sup></h3>

                <p>Products</p>
              </div>
              <div class="icon">
                <i class="ion ion-cube"></i>
              </div>
              <a href="<?=base_url('productlist')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?=count($user_count);?></h3>

                <p>Customers</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?=base_url('userlist')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3><?=count($order_count);?></h3>

                <p>Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-clipboard"></i>
              </div>
              <a href="<?=base_url('orderlist')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?=count($pending_count);?></h3>

                <p>Pending Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-clock"></i>
              </div>
              <a href="<?=base_url('orderlist')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?=count($pending_booking);?></h3>

                <p>Pending Booking</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-walk"></i>
              </div>
              <a href="<?=base_url('reservationlist')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-light">
              <div class="inner">
                <h3><?=count($stocks_count);?></h3>

                <p>Stocks</p>
              </div>
              <div class="icon">
                <i class="ion ion-arrow-graph-up-right"></i>
              </div>
              <a href="<?=base_url('stocks')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-dark">
              <div class="inner">
                <h3>10640.00</h3>

                <p>Total Earnings</p>
              </div>
              <div class="icon">
                <i class="ion ion-cash"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->

   
<div class="container-fluid">
  <div class="row p-5">
    <div class="col-md-6">
      
      <div id="barsize">
        <canvas id="barChart"></canvas>
        <div>
          <?php 
          if($saleschart):
              foreach($saleschart as $saleschart):
                  $month[]  = $saleschart['month_name'];
                  $amount[] = $saleschart['total_amount'];
              endforeach;
          endif;
          ?>
        </div>
      </div>
    </div>
    
    <div class="col-md-6">
      <div id="barsize">
        <canvas id="lineChart"></canvas>
        <div>
          <?php 
          if($linechart):
              foreach($linechart as $data):
                  $itemname[]  = $data['item_name'];
                  $totalAmounts[] = $data['total_amount'];
                  $monthname[] = $data['month_name'];
              endforeach;
          endif;
          ?>
        </div>
      </div>
    </div>
  </div>
  
  <div class="row p-5">
    <div class="col-md-6">
      <div id="barsize">
        <!-- PIE CHART -->
        <canvas id="pieChart"></canvas>
        <div>
          <?php 
          if($piechart):
              foreach($piechart as $piechart):
                  $product_name[]  = $piechart['item_name'];
                  $total_amount[] = $piechart['total_sold'];
              endforeach;
          endif;
          ?>
        </div>
      </div>
    </div>
    
    <div class="col-md-6">
      <div id="barsize">
        <!-- POLAR AREA CHART -->
        <canvas id="polarChart"></canvas>
        <div>
          <?php 
          if($stockschart):
              foreach($stockschart as $stockchart):
                  $productname[]  = $stockchart['product_name'];
                  $total[] = $stockchart['stock_qty'];
              endforeach;
          endif;
          ?>
        </div>
      </div>
    </div>
  </div>
</div>
</section>


<script>
  
 // BAR CHART --------------------------------------------------------------
  var ctx = document.getElementById('barChart').getContext('2d');

  // Define chart data and options
  var chartData = {
      labels: <?php echo json_encode($month) ?>,
      datasets: [{
          label: 'MONTHLY SALES',
          data: <?php echo json_encode($amount) ?>,
          backgroundColor: 'rgba(54, 162, 235, 0.2)',
          borderColor: 'rgb(54, 162, 235)',
          borderWidth: 1
      }]
  };

  var chartOptions = {
      scales: {
          y: {
              beginAtZero: true
          }
      }
  };

  // Create the chart
  var myChart = new Chart(ctx, {
      type: 'bar',
      data: chartData,
      options: chartOptions
  });
  // END OF BAR CHART --------------------------------------------------------------


  // POLAR AREA CHART --------------------------------------------------------------
  var ctx = document.getElementById('polarChart').getContext('2d');

  // Define chart data and options
  var chartData = {
      labels: <?php echo json_encode($product_name) ?>,
      datasets: [{
          label: 'Sold',
          data: <?php echo json_encode($total_amount) ?>,
      }]
  };

  var chartOptions = {
      scales: {
          r: {
              beginAtZero: true
          }
      }
  };

  // Create the chart
  var myChart = new Chart(ctx, {
      type: 'polarArea',
      data: chartData,
      options: chartOptions
  });
  // END OF POLAR AREA CHART --------------------------------------------------------------


  // LINE CHART --------------------------------------------------------------
  var ctx = document.getElementById('lineChart').getContext('2d');

    var lineChart = new Chart(ctx, {
      type: 'line',
      data: {
          labels: <?php echo json_encode($monthname) ?>,
          datasets: [
              {
                label: 'PRODUCT NAME: ' + <?php echo json_encode($itemname) ?>,
                data:   <?php echo json_encode($totalAmounts) ?>,
                backgroundColor: 'rgba(0, 123, 255, 0.5)',
                borderColor: 'rgba(0, 123, 255, 1)',
                borderWidth: 2,
                pointRadius: 4,
                pointBackgroundColor: 'rgba(0, 123, 255, 1)',
                pointBorderColor: 'rgba(255, 255, 255, 1)',
                pointHoverRadius: 6,
                pointHoverBackgroundColor: 'rgba(0, 123, 255, 1)',
                pointHoverBorderColor: 'rgba(255, 255, 255, 1)',
              },
              
          ]
      },
      options: {
          responsive: true,
          scales: {
              y: {
                  beginAtZero: true
              }
          }
      }
    });
    // END OF LINE CHART --------------------------------------------------------------

var ctx = document.getElementById('pieChart').getContext('2d');

// Define chart data and options
var chartData = {
    labels: <?php echo json_encode($productname) ?>,
    datasets: [{
        label: 'Stocks',
        data: <?php echo json_encode($total) ?>,
        
        backgroundColor: [
            'rgba(255, 99, 132, 0.7)',   // Example color 1
            'rgba(54, 162, 235, 0.7)',   // Example color 2
            'rgba(255, 206, 86, 0.7)',    // Example color 3
            // Add more colors as needed
        ],
        borderColor: [
            'rgba(255, 99, 132, 1)',     // Example border color 1
            'rgba(54, 162, 235, 1)',     // Example border color 2
            'rgba(255, 206, 86, 1)',      // Example border color 3
            // Add more colors as needed
        ],
        borderWidth: 1,
    }]
};

var chartOptions = {
    responsive: true,
    maintainAspectRatio: false,
};

// Create the chart
var myChart = new Chart(ctx, {
    type: 'pie',
    data: chartData,
    options: chartOptions
});

</script>
<!--END SCRIPTS -->

<script>
    
</script>


    
    <!-- /.content -->

<?= $this->endSection() ?>