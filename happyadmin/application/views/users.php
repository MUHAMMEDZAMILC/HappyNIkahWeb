    <!DOCTYPE html>
    <?php include('header.php');
    
     $user_id=$this->session->userdata('user_id_admin');
     
      if($user_id==='10')
    {
     include('menusupport.php');     
    }
    
    if($_SESSION['user_type']==='4')
    {
    include('menucreation.php');	
    } 
    
    if($_SESSION['user_type']==='13')
    {
    include('menusuperadmin.php');	   
    }
    
     if($user_id==='26' || $user_id=='8'  || $user_id=='17')
    {
     include('menusales.php');     
    }
    
    else
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
                            <div class="app-card-body">
                                <div class="table-responsive">
                                

                                    <table id="example" class="table app-table-hover mb-0 text-left">

                    <thead>
                      <tr>
                        <th class="cell">ID</th>
                        <th class="cell">HN ID</th>
                        <th class="cell">Name</th>
                        <th class="cell">Reg Date</th>
                        <th class="cell">Mobile</th>
                        <th class="cell">Age</th>
                        <th class="cell">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $i = 1;
                      foreach ($users as $value) { ?>
                        <tr>
                          <td class="cell"><?php echo $i; ?></td>
                          <td class="cell"><?php echo $value->happynikah_id; ?></td>
                          <td class="cell"><?php echo $value->name; ?></td>
                          <td class="cell">
                              <?php $regdate= $value->reg_date; ?>
                              <?php $hk=date('d-m-Y',strtotime($regdate));?>
                             <?php echo $hk; ?>
                             
                             </td>
                          <td class="cell"><?php if ($value->countryCode != '0') {
                            $countryCode = "+" . $value->countryCode;
                            } else {
                            $countryCode = "";
                            }
                            echo $countryCode . $value->phone; ?></td>
                            <td class="cell"><?php echo $value->age; ?>
                            </td>
                          <td class="cell">
                              
                              
                            <!--  <a href="<?php echo site_url('/admin/profile/view/' . $value->id); ?>">-->
                            <!--<button class="btn btn-success btn-sm preimage" style="color:white;">-->
                            <!--<i class="fa fa-eye" aria-hidden="true"></i>  View Details</button></a>-->
                            
                            
                            <form method="post" action="<?= base_url() ?>admin/search_profiles">
                            <input type="hidden" id="inputName" class="form-control" name="search_profile"  value="<?php echo $value->happynikah_id ?>"  required >
                            
                            <button type="submit" name="search_profile_btn" class="btn btn-success btn-sm preimage" id="search_button" 
                            style="color:white;border: 0px transparent;">
                            <i class="fa fa-eye" aria-hidden="true"></i> 
                            View Details
                            </button>
                            
                            <!--<a class="badge bg-success" style="color:white;" href="<?= base_url() ?>admin/profile/view/<?= $value->id; ?>">View Profile</a>-->
                            
                            
                            </form>
                       

                            <!--<a onclick="return confirm('Are you sure to Delete this data Premenently?')" href="<?php echo site_url('/admin/delete_profile/' . $value->id); ?>"><button class="btn btn-primary" style="background: red;  border: red;"> Delete</button></a>-->
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