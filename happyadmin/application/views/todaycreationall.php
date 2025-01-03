<!DOCTYPE html>
<?php include('header.php');

if($_SESSION['user_type']==='4')
{
include('menucreation.php');	
}

if($_SESSION['user_type']==='13')
{
include('menusuperadmin.php');
}

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
                          
                             <button type="button" class="btn btn-success"  style="color:#fff;margin-left:20px;margin-top: 20px;" id="exportto">Export to Excel</button>  
                            
                            
                            <div class="app-card-body">
                            <div class="table-responsive">
                            
                            
                            <table id="example" class="table app-table-hover mb-0 text-left">
                            <!--<button class="btn btn-secondary" style="margin-left:10px;margin-top:10px;" >Back</button>-->
                            <thead>
                            <tr>
                            <th class="cell">Sl No</th>
                            <th class="cell">HN ID</th>
                            <th class="cell">Name</th>
                            
                            <th class="cell">Mobile</th>
                            <th class="cell">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 1;
                            
                            foreach ($todaycreation as $value) { ?>
                            <tr>
                            <td class="cell"><?php echo $i; ?></td>
                            <td class="cell"><?php echo $value->happynikah_id; ?></td>
                            <td class="cell"><?php echo $value->name; ?></td>
                            <td class="cell"><?php echo $value->phone; ?></td>
                            
                            <td class="cell"> 
                            <form method="post" action="<?= base_url() ?>admin/search_profiles">
                            <div class="form-group">
                            
                            <input type="hidden" id="inputName" class="form-control" name="search_profile"  value="<?php echo $value->happynikah_id ?>"  required >
                            </div>
                            </div>
                            <div class="col-lg-6">
                            
                            <label for="inputName">&nbsp;</label>
                            <!-- <button onclick="search_profiles()" name="search_profile_btn" class="btn btn-success" style="margin-top: 32px;"> -->
                            <button type="submit" name="search_profile_btn" class="btn btn-success" id="search_button"
                            
                            style="background: transparent;width: 114px;margin-left: -15px;color: #378fd3;">
                            <!--<i class="fa-sharp fa-solid fa-share"></i>-->
                            Basic Details
                            </button>
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
    
    
    
    $('#exportto').click(function() 
	{
	$.ajax({
	type: 'POST',
	url: '<?= base_url() ?>admin/todaycreationall_excel',
	data: {

	},
	success: function(response) 
	{
	if (response.success) 
	{         

	var cacheBuster = new Date().getTime();
	var downloadUrl = '<?= base_url() ?>upload/todaycreationall.xlsx?cb=' + cacheBuster;
	window.location.href = downloadUrl;

	} 
	else 
	{

	var cacheBuster = new Date().getTime();
	var downloadUrl = '<?= base_url() ?>upload/todaycreationall.xlsx?cb=' + cacheBuster;
	window.location.href = downloadUrl;

	}
	},
	error: function(error)
	{
	alert('Error exporting Excel file');
	}
	});
	});
  </script>
  
  </body>

  </html>