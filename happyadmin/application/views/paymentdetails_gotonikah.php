<!DOCTYPE html>

<?php include('header.php'); ?>
<?php include('menusales_gotonikah.php'); ?>

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
          <?php $login_id=$this->session->userdata('user_id_admin');?>
                <?php $payment_details = $this->db->select('tbl_payement.id as pid,
                tbl_payement.amount,tbl_payement.user_id,
                tbl_payement.date,tbl_payement.expiry_date,tbl_payement.plan_id,tbl_payement.payment_mode,
                tbl_registration.*,tbl_plan.*')->from('tbl_payement')
                ->join('tbl_registration','tbl_registration.id=tbl_payement.user_id')
                ->join('tbl_plan','tbl_plan.plan_id=tbl_payement.plan_id')
                ->where('tbl_payement.status',1)
                ->where('tbl_registration.goto_nikah',1)
                ->where('tbl_payement.session_id',$login_id)
                ->get()->num_rows();?>
                
               <h6 style="float: right;">Total records : <?php echo $payment_details;?></h6>
        </section>

        <!-- Main content -->
      <div class="tab-content" id="orders-table-tab-content">
                    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                        <div class="app-card app-card-orders-table shadow-sm mb-5">
                            <div class="app-card-body">
                                <div class="table-responsive">
                             
                        
                <?php $cdate=date('Y-m-d');?>
                
                
                
                
                <?php $payment_details_total  = $this->db->select('tbl_payement.id as pid,
                tbl_payement.amount,tbl_payement.user_id,
                tbl_payement.date,tbl_payement.expiry_date,tbl_payement.plan_id,tbl_payement.payment_mode,
                tbl_registration.*,tbl_plan.*')->from('tbl_payement')
                ->join('tbl_registration','tbl_registration.id=tbl_payement.user_id')
                ->join('tbl_plan','tbl_plan.plan_id=tbl_payement.plan_id')
                ->where('tbl_payement.status',1)
                ->where('tbl_registration.goto_nikah',1)
                ->where('tbl_payement.session_id',$login_id)
                ->get()->result_array();?>
               
   
        
         
              
                <table id="example" class="table app-table-hover mb-0 text-left">
                   
  
                    <thead style="background-color: grey;
    border: 1px solid black;
    color: #ffffff;">
                      <tr>
                     
                        
                <th class="cell">GN ID</th>
                <th class="cell">Payment Date</th>
                <th class="cell">Amount</th>
                <th class="cell">Sale Amount</th>
                <th class="cell">Package</th>
                <th class="cell">Expiry Date</th>
                <th class="cell">Payment Method</th>

                      </tr>
                    </thead>
                   
                   <tbody>
                
                <?php
                foreach ($payment_details_total as $value2) 
                { ?>
                
                <tr>
                <td>
               <?php echo $value2['happynikah_id'];?>
                </td>
                <td>
                    <?php $dt=$value2['date'];?>
         
                
                  <?php $k11=date('d-m-Y',strtotime($dt)); ?> 
                  
                <?php echo $k11;?>
                </td>
                <td>
                <?php echo $value2['plan_amount'];?>
                </td>
                <td>
              <?php echo $value2['amount'];?>
                </td>
                <td>
                 <?php echo $value2['plan_name'];?>
                </td>
                <td>
                    <?php $dt2= $value2['expiry_date'];?>
                 
                 <?php $k12=date('d-m-Y',strtotime($dt2)); ?> 
                  
                <?php echo $k12;?>
                
                </td>
                <td>
                <?php echo $value2['payment_mode'];?>
                </td>
                </tr>
                <!-- next tr -->
                
                <!-- next tr -->
                
                <!-- next tr -->
                
                 <?php
                
                } ?>
                
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
  
  <style>
      
      .app-card-orders-table .table .cell
      {
           color: #ffffff;
      }
  </style>
  <?php include('footer.php'); ?>
  <!-- jQuery -->

  <!-- Bootstrap 4 -->
 <link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css' rel='stylesheet'>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" >
    </script>
      
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" >
    </script>



	   <script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js">
			
	</script>
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