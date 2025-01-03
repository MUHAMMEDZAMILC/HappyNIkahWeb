    <!DOCTYPE html>
    <?php include('header.php');
    $user_id=$this->session->userdata('user_id_admin');
    
    if($_SESSION['user_type']==='13')
    {
    include('menusuperadmin.php');	
    }
    
     if($_SESSION['user_type']==='14')
    {
    include('menuaccountsadmin.php');	
    }
    
    if($user_id==='26')
    {
    include('menusales.php');
    }
    
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
                
                
                 <?php
                            $reg_date=date("Y-m-d");
                            $emp_id=$this->session->userdata('emp_id');
                            
                            $this->db->select('SUM(final_amount) as famount');
                            
                            $this->db->from('tbl_payement');
                            
                            $this->db->join('tbl_registration','tbl_registration.id=tbl_payement.user_id');
                            $this->db->where('tbl_payement.status',1);
                            $this->db->where('tbl_registration.goto_nikah',0);
                            $this->db->where('tbl_payement.payment_status','Paid');
                            $query2 = $this->db->get();
                            $final = $query2->row();
                            
                            $totalAmount = $final->famount; ?>  
                            
                                <h2 style="margin-left: 880px;margin-top: 30px;">Total:<?php echo $totalAmount; ?></h2>
                                
                
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/dashboard">Home</a></li>
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
                            <div class="app-card-body">
                                <div class="table-responsive">
                                    
                                    
                           
                                
                                

                                    <table id="example" class="table app-table-hover mb-0 text-left">
                                        
                <div class="container">
                <div class="row mt-4 ml-1">
                <div class="col-md-10">
                <form action="<?php echo base_url('admin/filterpaymentcreation'); ?>" 
                method="post">
                <div class="form-row">
                <div class="form-group col-md-4">
                
                
                <label for="start_date"> Start Date</label>
                <input type="date" name="start_date" class="form-control" required>
                </div>
                
                <div class="form-group col-md-4">
                <label for="end_date"> End Date</label>
                <input type="date" name="end_date" class="form-control" required>
                </div>
                </div>
                
                
                <div class="form-row">
                <div class="form-group col-md-4">
                <?php $targetdata2 = $this->db->select('*')->from('tbl_users1')
                ->where('user_id !=', 9)->where('user_type', 3)
                ->get()
                ->result_array(); ?>
                
                <label for="selected_category">Select Staff</label>
                <select name="selected_category" class="form-control" id="selected_category" required>
                <option value="" selected disabled>
                ----Please Select Staff----</option>
                <?php foreach ($targetdata2 as $value) : ?>
                <option value="<?php echo $value['user_id']; ?>"><?php echo $value['user_name']; ?></option>
                <?php endforeach; ?>
                </select>
                </div>
                
                <div class="form-group col-md-4">
                <label for="selected_status">Select Status</label>
                <select name="selected_status"  id="selected_status" class="form-control" required>
                <option value="" selected disabled>
                ----Please Select Status----</option>
                <option value="Paid">Paid</option>
                <option value="Add Contacts">Add Contacts</option>
                <option value="Physically Challenged">Physically Challenged</option>
                <option value="Orphans">Orphans</option>
                <option value="Financially Poor">Financially Poor</option>
                </select>
                </div>
                </div>
                
                <button type="submit" class="btn btn-primary">Filter</button>
                </form>
                </div>
                </div>
                </div>
                
                </div>
                </div>
                
                </div>
                </div>
                </div>   
                  
                     
    <!--                 <div id="filtered_data">-->
        <!-- Filtered data will be displayed here -->
    <!--</div>      -->
                    
    

                    <thead>
                      <tr>
                        <!--<th class="cell">Sl No</th>-->
                        <th class="cell">HN ID</th>
                        <th class="cell">Name</th>
                     
                        <th class="cell">Mobile</th>
                        <th class="cell">Payment Date</th>
                       <th class="cell">Plan</th>
                        <th class="cell">Amount</th>
                        
                           <th class="cell">Add Contact</th>
                           
                         <th class="cell">Status</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $i = 1;
                      foreach ($totalcreation as $value) { ?>
                        <tr>
                          <!--<td class="cell"><?php echo $i; ?></td>-->
                          <td class="cell"><?php echo $value->happynikah_id; ?></td>
                          <td class="cell"><?php echo $value->name; ?></td>
                          <td class="cell"><?php echo $value->phone; ?></td>
                          <td class="cell">
                           
                         
                         
                         
                            <?php $dateString =$value->ctime;?>
                    
                    <?php $date = new DateTime($dateString);
                    $formattedDate = $date->format('d-m-Y H:i:s');
                    
                    echo $formattedDate;?>
                         
              
                        
                        </td>
                           <td class="cell"><?php echo $value->dt; ?></td>
                           
                           
                            <td class="cell">
                                
                            <?php if($value->paystatus=='Add Contacts')
                            {?>
                            <?php echo "0";?>
                            <?php }?>
                            
                            <?php if($value->paystatus!='Add Contacts')
                            {?>
                            <?php echo $value->final_amount;?>
                            <?php }?>

                                
                                </td>
                                
                                 <td class="cell">
                                 <?php echo $value->addoncontact; ?>     
                                     </td>
                              <td class="cell">
                             
                               
                             <?php echo $value->paystatus; ?>
                             
                               
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
		

  <!-- AdminLTE for demo purposes -->

  <!-- Page specific script -->
  <script>
  
  
//   $(document).ready(function() {
//     $('#selected_option').change(function() {
//         var selectedOption = $(this).val();

  
//         $.ajax({
//             type: 'POST',
//             url: '<?php echo base_url("admin/filterData"); ?>',
//             data: {selected_option: selectedOption},
//             success: function(response) {
              
//                 $('#filtered_data').html(response);
//             }
//         });
//     });
// });


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