<!DOCTYPE html>
<?php include('header.php');

if($_SESSION['user_type']==='0' &&  $_SESSION['nikah_type']=='happynikah')
{
include('menu.php');	
}

if($_SESSION['user_type']==='0' &&  $_SESSION['nikah_type']=='gotonikah')
{
include('gotonikah_sales_super.php');	
}


$user_id=$this->session->userdata('user_id_admin');

if($user_id==='26')
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
                                 
                                 <div class="col-md-12">
                            
                             <form action="<?php echo base_url();?>admin/staff_create_form" method="post">
                                 
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">



            <input type="text" class="form-control" name="user_name" id="user_name" style=" width: 30%;margin-top: 28px;margin-left: 54px;" placeholder="Enter User Name" required>
 
                
                
                
                   
                   
                    <?php $targetdata2=$this->db->select('*')->from('tbl_employees1')->where('status','1')->get()->result_array();?>
                      
                       <select class="form-control" id="user_type" name="user_type" required  style="padding-bottom: 4px;margin-left: 53px;margin-top: 28px;width: 30%;">
								  <option value="" selected disabled>Please select User Type</option> 
								 <option value="3" name="user_type" id="user_type">Sales Creation</option>
								 <option value="4" name="user_type" id="user_type">Profile Creation</option>
								</select>
								
                <input type="text" class="form-control" name="emp_id" id="emp_id" style=" width: 30%;margin-top: 28px;margin-left: 54px;" placeholder="Employee ID" required>      
                
                
                             <input type="text" class="form-control" name="password" id="password" style=" width: 30%;margin-top: 28px;margin-left: 54px;" placeholder="Enter Password" required>    
                             
              <!--<label> Amount</label>-->
             
                
          <input type="submit"  id="save-project-btn3"  name="submit" class="btn btn-primary" style="margin-left: 57px;margin-top: 37px;margin-bottom: 70px;color: #fff;">
          </form>
          
          </div>
                             </div>
          
                            <div class="app-card-body">
                                <div class="table-responsive">
                                

                       
                  
                  
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

        <!-- /.content -->
      </div>
    </div>
  </div>
  <?php include('footer.php'); ?>
  <!-- jQuery -->

   <link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css' rel='stylesheet'>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" >
    </script>
      
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" >
    </script>



	   <script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js">
			
		</script>
		<script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js">
			
		</script>
		<script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js">
			
		</script>

		<!-- <script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
			<script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script> -->
		<script src="<?php echo base_url() ?>assets/plugins/jszip/jszip.min.js">
			
		</script>
		<script src="<?php echo base_url() ?>assets/plugins/pdfmake/pdfmake.min.js">
			
		</script>
		<script src="<?php echo base_url() ?>assets/plugins/pdfmake/vfs_fonts.js">
			
		</script>
		
		
  <!-- AdminLTE App -->

  <!-- AdminLTE for demo purposes -->

  <!-- Page specific script -->
  <script>
    $(function() {
      $("#example").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
  
  </body>

  </html>