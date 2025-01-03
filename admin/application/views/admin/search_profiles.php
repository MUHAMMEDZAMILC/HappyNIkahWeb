
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | DataTables</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
<?php include('includes/menu.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">


            <div class="card">
              <!-- <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div> -->
              <!-- /.card-header -->
              <div class="card-body">
                
                  
                    <div class="row">
                        <div class="col-lg-4">
                            <form method="post" action="<?= base_url()?>admin/search_profiles">
                                <div class="form-group">
                                  <label for="inputName">ID/Contact No. <font color="red">*</font></label>
                                  <input type="text" id="inputName" class="form-control" name="search_profile" required>
                                  <span id="error" style="color:red;display: none">Please insert Happynikah ID/Mobile No.</span>
                                </div>
                        </div>
                      <div class="col-lg-6">
                        <!-- <div class="form-group"> -->
                          
                    <label for="inputName">&nbsp;</label>
                    <!-- <button onclick="search_profiles()" name="search_profile_btn" class="btn btn-success" style="margin-top: 32px;"> -->
                      <button type="submit" name="search_profile_btn" class="btn btn-success" style="margin-top: 32px;">
                        <i class="fas fa-search"></i>
                      </button>
                    </form>
                      <button onclick="window.location.href='<?= base_url()?>admin/search_profiles'" name="search_profile_btn" class="btn btn-danger" style="margin-top: 32px;">
                        <i class="fa fa-undo" aria-hidden="true"></i>
                      </button>
                        <!-- </div> -->
                        
                      </div>
                    </div>
                    

                  
               
             
                <?php
                
                if(empty($get_search_profiles))
                  {
                    echo "please enter ID !!";
                  } 
                  else
                    { 
                      // echo json_encode($get_search_profiles);
                      $r_id = $get_search_profiles->id;
                      $happynikah_id = $get_search_profiles->happynikah_id;
                      $name = $get_search_profiles->name;
                      $age = $get_search_profiles->age;
                      if($get_search_profiles->gender == '1')
                      {
                        $gender = "Male";
                      }
                      else
                      {
                        $gender = "Female";
                      }
                      $address = $get_search_profiles->address;
                      $reg_date = $get_search_profiles->reg_date;

                      if($get_search_profiles->reg_through == '0' || $get_search_profiles->reg_through == '2')
                      {
                        $reg_through = "Customer Registered";
                      }
                      else
                      {
                        $reg_through = "Staff Registered";
                      }
                      
                      if($get_search_profiles->status == '0')
                      {
                        $status = "Pending";
                      }
                      elseif ($get_search_profiles->status == '1') {
                        $status = "Approved";
                      }
                      elseif ($get_search_profiles->status == '2') {
                        $status = "Rejected";
                      }
                      elseif ($get_search_profiles->status == '3') {
                        $status = "Deleted";
                      }
                      
                       elseif ($get_search_profiles->status == '4') {
                        $status = "Block";
                      }
                       elseif ($get_search_profiles->status == '5') {
                        $status = "UnBlock";
                      }
                      
                      ?>
                <div id="profile" style="">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Happynikah ID</th>
                        <th>Name</th>
                        <th>Age & Gender</th>
                        <th>Login</th>
                        <th>Status</th>
                        <th>Profile Description</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                      <tr>
                        <td>
                          <span id="hn_id"><?= $happynikah_id?></span><br>
                          (<?=$status?>)<br>
                          <hr>
                          <span id="reg_through"><?= $reg_through?></span>
                        </td>  
                        <td><span id="profile_name"><?= $name?></span></td>
                        <td><span id="profile_age"><?= $age?></span>, <span id="profile_gender"><?= $gender?></span></td>
                        <td></td>
                        <td>Active</td>
                        <td><span id="profile_description">Address: <?= $address ?><br> Registered on: <?= $reg_date ?></span></td>
                      </tr>
                    
                    </tbody>
                  </table>
                  <a target="_blank" href="<?= base_url()?>admin/profile/view/<?= $r_id?>" id="basicinfo" class="btn btn-success">basic info</a>
                  <!-- <a target="_blank" id="verifyemail" class="btn btn-success">verify email</a> -->
                  <!-- <a target="_blank" id="hideprofile" class="btn btn-success">hide profile</a> -->
                  <!-- <a target="_blank" id="message" class="btn btn-success">enter message</a> -->
                  <!-- <a target="_blank" id="blockuser" class="btn btn-success">block</a> -->
                  <!-- <a target="_blank" id="deleteuser" class="btn btn-success">delete</a> -->
                  <?php 
                  if($get_search_profiles->status != '3')
                  {?>
                    <a target="_blank" id="approve" class="btn btn-success" data-toggle="modal" data-target="#approve_pay" onclick="approve_pay('<?= $r_id?>')">approved to paid</a>
                  <?php }?>
                  <!-- <a target="_blank" id="changepassword" class="btn btn-success">change password</a> -->
                  <!-- <a target="_blank" id="interest" class="btn btn-success">interest details</a> -->
                </div>
              <?php }?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- modals -->

  <div class="modal fade" id="approve_pay">
      <form action="<?php echo site_url('admin/approve_payment'); ?>" method="post">
            
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Plan Payment</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div id="approveform"></div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        </div>
        <!-- /.modal-dialog -->
      </form>
  </div>
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>assets/dist/js/demo.js"></script>
<!-- Page specific script -->

<script>
  var url = '<?php echo base_url()?>'
  function approve_pay(r_id)
  {
    $.ajax({
          type: 'POST',
          url: url+'admin/approve_pay',
          data: {r_id:r_id},
          success: function (data) { 
              $('#approveform').html(data)
          },
        })
  }
</script>
</body>
</html>
