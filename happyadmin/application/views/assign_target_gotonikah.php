<!DOCTYPE html>
<?php include('header.php');

if($_SESSION['user_type']==='0' &&  $_SESSION['nikah_type']=='gotonikah')
{
include('gotonikah_sales_super.php');	
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
                                 
                                 <div class="col-md-6">
                            
                             <form action="<?php echo base_url();?>admin/assign_target_form_gotonikah" method="post">
                                 
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                                 
                    <?php $targetdata2=$this->db->select('*')->from('tbl_users1')->where('user_id !=', 9)->where('user_type', 3)->get()->result_array();?>
                      
                    <select class="form-control" id="user_id" name="user_id" required  style="padding-bottom: 4px;margin-left: 48px;margin-top: 40px;width: 50%;">
                        <option value="" selected disabled>Please Select Staff</option> 
                        <?php foreach($targetdata2 as $value){ ?>
                        <option value="<?php echo $value['user_id']; ?>"><?php echo $value['user_name']; ?></option>
                        <?php } ?>
                        </select>
                      
              <!--<label> Amount</label>-->
              <input type="text" class="form-control" name="target_amount" id="target_amount" style="width: 35%;margin-top: -37px;margin-left: 375px;" placeholder="Target Amount" required>
                
          <input type="submit"  id="save-project-btn3"  name="submit" class="btn btn-primary" style="margin-top: 20px;margin-left: 48px; margin-top: 35px;color: #fff;">
          </form>
          
          </div>
                             </div>
          
                            <div class="app-card-body">
                                <div class="table-responsive">
                                

                        <table id="example" class="table app-table-hover mb-0 text-left">
                        <!--<button class="btn btn-secondary" style="margin-left:10px;margin-top:10px;" >Back</button>-->
                        <thead>
                        <tr>
                        <th class="cell">Sl No</th>
                        <th class="cell">Staff Name</th>
                        <th class="cell">Target Amount</th>
                        <th class="cell">Sale Amount</th>
                        <!--    <th class="cell">Acheived </th>-->
                        <!--<th class="cell">Balance </th>-->
                        </tr>
                        </thead>
                        
                        <tbody>
                            
                            
                    <?php
                    $i = 1;
                    
                    $targetdata = $this->db->select('tbl_target.user_id,tbl_target.sale_amount,tbl_target.target_amount,tbl_target.status,tbl_users1.user_id,tbl_users1.user_name')
                    ->from('tbl_target')->join('tbl_users1', 'tbl_users1.user_id=tbl_target.user_id')
                    ->where('tbl_target.status','1')
                    ->get()->result_array();
                    
                    foreach ($targetdata as $value) 
                    {
                    ?>
                    <tr>
                    <td class="cell"><?php echo $i; ?></td>
                    <td class="cell"><?php echo $value['user_name']; ?></td>
                    <td class="cell"><?php echo $value['target_amount']; ?></td>
                    <td class="cell">
                    <?php
                    $this->db->select('SUM(final_amount) as famount');
                    $this->db->from('tbl_payement');
                    $this->db->where('tbl_payement.status', 1);
                    $this->db->where('tbl_payement.payment_staff_id', $value['user_id']);
                    $query = $this->db->get();
                    $result = $query->row();
                    $totalAmount = $result->famount;
                    echo $totalAmount;
                    ?>
                    </td>
                    </tr>
                    <?php
                    $i++;
                    }
                    ?>
                        
                        
                        </tbody>
                        </table>
                  
                  
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