<!DOCTYPE html>
<?php include('header.php');
$user_id=$this->session->userdata('user_id_admin');

if($user_id=='26')
{
include('menusales.php');  
}
?>

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
<!-- DataTables -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">

<!-- Theme style -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.min.css">
</head>

<style type="text/css">
   .reduce-gap .col-md-6 {
        padding-right: 5px; /* Adjust the padding-right value */
        padding-left: 5px; /* Adjust the padding-left value */
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

        <div class="app-card-body" style="padding-bottom: 50px;">

      <div class="row">
    <div class="col-md-12">
        <form id="filterForm">
            <div class="row mb-3 reduce-gap">
                <div class="col-md-6">
                    <label style="margin-left:15px;">Start Date:</label>
                    <input type="date" id="from_date" name="from_date" style="width:50%;" required>
                </div>
                <div class="col-md-6">
                    <label>End Date:</label>
                    <input type="date" name="to_date" id="to_date" style="width:50%;"  required >
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <?php 
                    $emp_id= $this->db->select('*')->from('tbl_users1')->where('user_id !=', 33)->where('user_type', 4)->get()->result_array(); ?>
          <select  style="width: 50%;margin-left: 95px;" id="user_id" name="user_id" required>
                        <option value="" selected disabled>Please Select Staff</option> 
                        <?php foreach($emp_id as $value) { ?>
                            <option value="<?php echo $value['user_id']; ?>">
                                <?php echo $value['user_name']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                 <div class="col-md-6">
                    <input type="submit" value="Submit" class="btn btn-primary">
                </div>
            </div>

          
           

        </form>
    </div>
</div>
<br/>
 <div id="customerData">
            </div>






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
  

  <?php include('footer.php'); ?>
  <!-- jQuery -->

<script>
  var user_id,from_date,to_date;
  $(document).ready(function() {
    $('#filterForm').submit(function(e) {
      e.preventDefault();
      from_date=$('#from_date').val();
      to_date=$('#to_date').val();
      user_id = $('#user_id').val();
      var formData = $(this).serialize();
      $.ajax({
        url: '<?php echo base_url('admin/district_date_staff_count'); ?>',
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


  
    
    
  </body>

  </html>