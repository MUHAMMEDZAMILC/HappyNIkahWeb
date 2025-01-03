<!DOCTYPE html>
<?php include('header.php');
if($_SESSION['user_type']==='3')
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
                                
                    <div class="col-md-6">
                            
                          </div>
                             </div>
          
                            <div class="app-card-body">
                              <div class="row">  
                               <div class="col-md-6">  
                              <br/>     
                              <br/> 
                              
								
								
                        
                        
                             
                                </div>   
                              </div><br><br>
                              <div class="table-responsive">
                             <table id="example" class="table app-table-hover mb-0 text-left">
                              <thead>
                               <tr>
                                <th class="cell">Sl No</th>
                                <th class="cell">HN ID</th>
                                <th class="cell">Name</th>
                                
                                <th class="cell">Phone</th>
                                
                                <th class="cell">Count</th>
                                
                                <th class="cell">Visit Date</th>
                                <th class="cell">Action</th>
                          
                               </tr>
                              </thead>
                           
                            <tbody>
                            <?php
                            $i = 1;
                            foreach ($que as $value)
                            { ?>
                            <tr>
                            <td class="cell"><?php echo $i; ?></td>
                            <td class="cell"><?php echo $value['happynikah_id']; ?></td>
                            <td class="cell"><?php echo $value['name']; ?>
                            
                            
                             <?php
        $sender_id = $value['sender_id'];
        $paidstatus = $this->db->select('user_id, status, expiry_date')->from('tbl_payement')->where('status', '1')->where('user_id', $sender_id)->get()->row_array();
        $userpaid = $paidstatus['user_id'];
        $today_current_date = date('Y-m-d');
        
        if ($userpaid == $sender_id && $paidstatus['expiry_date'] >= $today_current_date)
        {
        echo '<span class="countcircle" style="background: #ff3bff;width: 65px;
    height: 30px;">Paid</span>';
        } 
        elseif ($userpaid == $sender_id && $paidstatus['expiry_date'] < $today_current_date) 
        {
        echo '<span class="countcircle" style="background: #ff3bff; width: 65px;
    height: 30px;">Expired</span>';
        }
        ?>
        
                            
                            </td>
                             <td class="cell"><?php echo $value['phone']; ?></td>
                            <td class="cell"> <span class="countcircle" style=" width: 44px;height: 32px;">
        <?php echo $value['visit_count']; ?>
        </span>
        </td>
                            <td class="cell">
                                
                                 
        <?php $dateString =$value['date'];?>
        
        <?php $date = new DateTime($dateString);
        
        // Format the date as per the desired format
        $formattedDate = $date->format('d-m-Y H:i:s');
        
        echo $formattedDate;?>
        
                            </td>
                            <td class="cell">
                                
                                
                                
                                 <form method="post" action="<?= base_url() ?>admin/search_profiles">
        <input type="hidden" id="inputName" class="form-control" 
        name="search_profile" 
        value="<?php echo $value['happynikah_id'];?>"  required >
        
        
        <label for="inputName">&nbsp;</label>
        
        <button type="submit" name="search_profile_btn" class="btn btn-success" id="search_button" style="color:#fff;">
        View Details
        </button>
        
        </form>
        
        <form method="post" action="<?= base_url() ?>admin/paymentvisit_delete_sale">
        <input type="hidden" id="delete_id" class="form-control" 
        name="delete_id" 
        value="<?php echo $value['sender_id'];?>"  required>
        <label for="inputName">&nbsp;</label>
        
        <button type="submit" name="delete_btn" class="btn btn-danger" id="delete_btn" style="color: #fff;margin-top: 10px;width: 110px;">Delete</button>
        
        </form>
        
        
        
                                </td>
                            </tr>
                            <?php
                            $i++;
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
  <script type="text/javascript">
   
   function totalpostpone(){
    var url = '<?php echo base_url() ?>'
     $("#submit").click(function(){
     var emp_id= $('#emp_id').val();
     console.log(emp_id);
     $.ajax({
    dataType: 'text',
    type: 'POST',
    url: url + 'admin/total_postponeall',
    data: {
    emp_id: emp_id    
    },
    success: function(result2) {
    },
    })
    });
   }
</script>

  </body>

  </html>