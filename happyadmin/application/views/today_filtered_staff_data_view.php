<!DOCTYPE html>
<html>

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


  <style>
        /*table {*/
        /*    border-collapse: collapse;*/
        /*    width: 100%;*/
        /*}*/
        /*th, td {*/
        /*    border: 1px solid #ddd;*/
        /*    padding: 8px;*/
        /*    text-align: left;*/
        /*}*/
        /*th {*/
        /*    background-color: #f2f2f2;*/
        /*}*/
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
                  <li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/dashboard">Home</a></li>
                  <li class="breadcrumb-item active"><?= $page ?></li>
                </ol>
                
              <h4 style="margin-top: 63px;
              float: right;">Filtered Amount: ₹<?php echo isset($filteredtotal->famount) ? 
              $filteredtotal->famount : 0; ?></h4>
              
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
                                    
    
<div class="tab-content" id="orders-table-tab-content">
                    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                        <div class="app-card app-card-orders-table shadow-sm mb-5">
                            <div class="app-card-body">
                                <div class="table-responsive">
                               
                               
                               <a href="<?php echo base_url();?>admin/tdypaymentcreation" class="btn btn-primary" style="margin-left: 30px;margin-top: 10px;">Today Sale</a> 

                                    <table id="example" class="table app-table-hover mb-0 text-left">
                                        
                                        
        
                        
             
                                        
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
                      $i = 1;?>
            <?php foreach ($filteredData as $item): ?>
                <tr>
                  
                    
                    
                    <!--<td class="cell"><?php echo $i; ?></td>-->
                          <td class="cell"><?php echo $item->happynikah_id; ?></td>
                          <td class="cell"><?php echo $item->name; ?></td>
                          <td class="cell"><?php echo $item->phone; ?></td>
                          <td class="cell">
                           
                           
                          <?php if (!empty($item->ctime)): ?>
   

                  <?php $dateString =$item->ctime;?>

                  <?php $date = new DateTime($dateString);
                  $formattedDate = $date->format('d-m-Y H:i:s');

                  echo $formattedDate;?>

              <?php endif; ?>
                         
              
                        
                        </td>
                           <td class="cell"><?php echo $item->dt; ?></td>
                           
                           <td class="cell">
                               
                               
                                 <?php if($item->paystatus=='Add Contacts')
                              {?>
                              <?php echo "0";?>
                              <?php }?>
                              
                              
                               <?php if($item->paystatus!='Add Contacts')
                              {?>
                              <?php echo $item->final_amount; ?>
                               <?php }?>
                               
                               
                            
                               </td>
                               
                                  <td class="cell">
                                
                                <?php echo $item->addoncontact; ?>      
                                      </td>
                              <td class="cell">
                             
                               <?php echo $item->paystatus; ?>
                             
                               
                           </td>
                           
                           
                           
                            <?php
                        $i++;
                       ?>
                      
                </tr>
            <?php endforeach; ?>
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
		
  <!-- Bootstrap 4 -->

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
