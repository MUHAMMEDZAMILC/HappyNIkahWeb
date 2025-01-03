<!DOCTYPE html>
<?php include('header.php');
if($_SESSION['user_type']==='0')
{
include('menu.php');	
}

?>

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
<!-- DataTables -->

<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.min.css">
</head>


<style>
    
    select option[selected][disabled]
    {
    font-size: 16px;
    font-weight: bold;
    }
</style>


<!-- Content Wrapper. Contains page content -->
                <div class="app-wrapper">
                <div class="app-content pt-3 p-md-3 p-lg-4">
                <div class="container">
                <div class="row g-3 mb-4 align-items-center justify-content-between">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                <h1><?= $page ?></h1>
                </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active"><?= $page ?></li>
                </ol>
                </div>
                </div>
                </div><!-- /.container-fluid -->
                </section>
                
                <!-- Main content -->
                <div class="tab-content" id="orders-table-tab-content">
                
                <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="row">
                
                <div class="col-md-6">
                
                
                </div>
                </div><br>
                
                <div class="app-card-body" style="padding-bottom: 40px;">
                
                <div class="row" style="margin-left:20px;margin-top:31px;">
                
                <form id="filterForm">
                
                
                <select class="form-control"  id="selected_date" name="selected_date" 
                style="padding-bottom: 4px;margin-left: 100px;width: 25%;margin-top: -40px; font-weight: bold;" required>
                <option value="" selected disabled>Please Select Days</option> 
                
                <?php
                
                $today = date('Y-m-d');
                echo '<option value="' . $today . '">Today</option>';
                
                for ($i = 1; $i <= 6; $i++) 
                { 
                $previous_date = date('Y-m-d', strtotime("-$i days"));
                echo '<option value="' . $previous_date . '">Before ' . $i . ' Day(s) Ago</option>';
                }
                ?>
                </select>
                
                
                
                <div class="row" style="width:0px;margin-top: -31px;">  
                <div class="col-md-6">
                <input type="submit" value="Submit"style="margin-top: -28px;width: 80px;margin-left: 420px;height: 30px;">
                
                </div>
                
                </div><br> 
                
                
                <div id="customerData">
                <!-- The filtered customer data will be appended here -->
                </div>
                
                </div>  
                </div>
                
                
                </div>
                
                </form>
                
                
                
                
                </div>
                <!-- /.card-body -->
                
                <!-- /.card -->
                </div>
                <!-- /.col -->
                </div>
                <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
                
                <!-- /.content -->
                </div>
                </div>
                </div>
                
                
  <script type="text/javascript">
    
  </script>


  
  <?php include('footer.php'); ?>
  <!-- jQuery -->



<script>
  $(document).ready(function() {
  $('#filterForm').submit(function(e) {
  e.preventDefault();
  var formData = $(this).serialize();
  $.ajax({
  url: '<?php echo base_url('admin/multiple_contacts_form'); ?>',
  method: 'post',
  data: formData,
  dataType: 'html',
  success: function(data) {
  $('#customerData').html(data);
  }
  });
  });
  });
</script>







    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/script.js/2.0.2/script.min.js"></script>
      



		
		
  <!-- AdminLTE App -->

  <!-- AdminLTE for demo purposes -->

  <!-- Page specific script -->
  
  
  </body>

  </html>