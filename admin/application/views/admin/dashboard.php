<!DOCTYPE html>
<html lang="en">
<?php include('includes/header.php'); ?> 
<?php include('includes/menu.php');?>
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
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
        <p>Daily</p>
        <div class="row">
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $daily_all ?></h3>

                <p>All Users</p>
              </div>
              <!--<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>-->
            </div>
          </div>
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $daily_pending ?></h3>

                <p>Pending Users</p>
              </div>
              <div class="icon">
                <!-- <i class="ion ion-bag"></i> -->
              </div>
              <!--<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>-->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $daily_approved; ?></h3>

                <p>Approved Users</p>
              </div>
              <div class="icon">
                <!-- <i class="ion ion-person-add"></i> -->
              </div>
              <!--<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>-->
            </div>
          </div>
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $daily_rejected; ?><sup style="font-size: 20px"></sup></h3>

                <p>Rejected Users</p>
              </div>
              <div class="icon">
                <!-- <i class="ion ion-stats-bars"></i> -->
              </div>
              <!--<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>-->
            </div>
          </div>
          <!-- ./col -->
          
          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $daily_deleted; ?></h3>

                <p>Deleted Users</p>
              </div>
              <div class="icon">
                <!-- <i class="ion ion-pie-graph"></i> -->
              </div>
              <!--<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>-->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                  <div class="row">
                      <div class="col-lg-6"><p style="color: #fff;">Male: <?= $daily_male?></p></div>
                      <div class="col-lg-6"><p style="color: #fff;">Female: <?= $daily_female?></p></div>
                  </div>
                  <div class="row">
                      <div class="col-lg-6"><p style="color: #fff;">Website: <?= $daily_website?></p></div>
                      <div class="col-lg-6"><p style="color: #fff;">Admin: <?= $daily_admin?></p></div>
                      <div class="col-lg-6"><p style="color: #fff;">Mobile: <?= $daily_mobile?></p></p></div>
                  </div>
              </div>
              <!--<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>-->
            </div>
          </div>
          
        </div>

        <p>Total</p>
        <div class="row">
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $all ?></h3>

                <p>All Users</p>
              </div>
              
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $pending ?></h3>

                <p>Pending Users</p>
              </div>
              <div class="icon">
                <!-- <i class="ion ion-bag"></i> -->
              </div>
              <a href="<?php echo site_url('admin/users/0') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $approved; ?></h3>

                <p>Approved Users</p>
              </div>
              <div class="icon">
                <!-- <i class="ion ion-person-add"></i> -->
              </div>
              <a href="<?php echo site_url('admin/users/1') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $rejected; ?><sup style="font-size: 20px"></sup></h3>

                <p>Rejected Users</p>
              </div>
              <div class="icon">
                <!-- <i class="ion ion-stats-bars"></i> -->
              </div>
              <a href="<?php echo site_url('admin/users/2') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          
          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $deleted; ?></h3>

                <p>Deleted Users</p>
              </div>
              <div class="icon">
                <!-- <i class="ion ion-pie-graph"></i> -->
              </div>
              <a href="<?= base_url()?>admin/users/3" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                  <div class="row">
                      <div class="col-lg-6"><p style="color: #fff;">Male: <?= $male?></p></div>
                      <div class="col-lg-6"><p style="color: #fff;">Female: <?= $female?></p></div>
                  </div>
                  <div class="row">
                      <div class="col-lg-6"><p style="color: #fff;">Website: <?= $website?></p></div>
                      <div class="col-lg-6"><p style="color: #fff;">Admin: <?= $admin?></p></div>
                      <div class="col-lg-6"><p style="color: #fff;">Mobile: <?= $mobile?></p></p></div>
                  </div>
              </div>
              <div class="icon">
                <!-- <i class="ion ion-bag"></i> -->
                
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
        </div>
        <!-- /.row -->
        <!-- Main row -->
        
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include('includes/footer.php'); ?>
</body>
</html>
