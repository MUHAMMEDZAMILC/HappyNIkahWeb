<!DOCTYPE html>
<?php include('header.php');

if($_SESSION['user_type']==='0' &&  $_SESSION['nikah_type']=='happymangalyam')
{
include('happymangalyam_sales_super.php'); 
}


if($_SESSION['user_type']==='6' &&  $_SESSION['nikah_type']=='happymangalyam')
{
include('menusupport_mangalyam.php');	
}

?>

    <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <div class="row g-3 mb-4 align-items-center justify-content-between">
				    <div class="col-auto">
			            <h1 class="app-page-title mb-0">Quick Register</h1>
				    </div>
				    <div class="col-auto">
					     <div class="page-utilities">
						    <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
							    
						    </div><!--//row-->
					    </div><!--//table-utilities-->
				    </div><!--//col-auto-->
			    </div><!--//row-->
			   
			    
		    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">
            Profile Delete</h5>

            <form id="contact" method="post" action="<?php echo base_url(); ?>admin/todayfollowup_update">          

            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body"> 
            <input type="hidden" name="deleteId" id="deleteId"/>  
            <div class="mb-3">
            <label for="inputName" class="form-label">Status</label>
            <select id="reason_status" class="form-control custom-select" name="reason_status">
            <option value="">--select--</option>
            <option value="Profile Contains Abusive Contents(Vulgar or racist)">Profile Contains Abusive Contents(Vulgar or racist)</option>
            <option value="Vulgar/Invalid Photos">Vulgar/Invalid Photos</option>
            <option value="Invalid Data">Invalid Data</option>
            <option value="Invalid Contact Details">Invalid Contact Details</option>
            <option value="Contact number/link mentioned in restricted fields">Contact number/link mentioned in restricted fields</option>
            <option value="Multiple/Duplicate profiles">Multiple/Duplicate profiles</option>
            <option value="Fake Profiles">Fake Profiles</option>
            <option value="Abnormal Activity Found">Abnormal Activity Found</option>
            <option value="Marriage Fixed">Marriage Fixed</option>
            <option value="Minor Profiles">Minor Profiles</option>
            <option value="Others">Others</option>
            </select>
            </div>

            <div class="mb-3">
            <label for="inputName" class="form-label">Message</label>
            <textarea id="description" class="form-control" required="" name="message" 
            value="">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->session->userdata('username');?>(<?php echo $this->session->userdata('user_id_admin');?>)
            </textarea>
            </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            Close
            </button>
            <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
            </div>
            </div>
            </div>
            </div>


			<div class="tab-content" id="orders-table-tab-content">
			<div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
			<div class="app-card app-card-orders-table shadow-sm mb-5">

			<button type="button" class="btn btn-success" 
			style="color:#fff;margin-left:20px;margin-top: 20px;" id="exportto">Export to Excel</button>

			<div class="app-card-body">
			<div class="table-responsive">
			<table id="example" class="table app-table-hover mb-0 text-left">
			<thead style="background-color: grey;border:1px solid black;">
			<tr>
			<th style="color:#fff;">Sl No</th>
			<th style="color:#fff;">HM ID</th>
			<th style="color:#fff;">Name</th>
			<th style="color:#fff;">Mobile</th>
			<th style="color:#fff;">Date</th>
			<!-- <th class="cell">Status</th> -->
			<th style="color:#fff;">Actions</th>
			</tr>
			</thead>
			<tbody>
			<?php
			$i = 1;
			foreach ($register as $key=>$value) { ?>
			<tr id="trr">
			<td><?php echo $i; ?></td>
			<td><?php echo $value->happynikah_id; ?></td>
			<td><span class="truncate"><?php echo $value->name; ?></span></td>
			<td><?php if($value->countryCode!= '0'){$countryCode = "+".$value->countryCode; }else{$countryCode="";} echo $countryCode.$value->phone; ?></td>
			<!-- <td class="cell"><?php echo $value->phone; ?></td> -->
			<td><span>
			<?php $date=$value->reg_date; ?>
			<?php $reg_date=date('d-m-Y',strtotime($date));?>	    
			<?php echo $reg_date; ?></span></td>
			<!-- 												<td class="cell"><span class="badge bg-warning">Step 1</span></td> -->


			<td>


			<form method="post" action="<?= base_url() ?>admin/search_profiles">
			<input type="hidden" id="inputName" class="form-control" name="search_profile"  value="<?php echo $value->happynikah_id ?>"  required >


			<button type="submit" name="search_profile_btn" class="badge bg-success" id="search_button" style="color:white;border: 0px transparent;">View Profile
			</button>

			<!--<a class="badge bg-success" style="color:white;" href="<?= base_url() ?>admin/profile/view/<?= $value->id; ?>">View Profile</a>-->


			</form>

			<!-- <span style="color:white;" class="badge bg-danger" href="#">Delete Profile</span> -->
			<!--<a class="badge bg-danger"  style="color:white;"   -->
			<!--data-id="<?php echo $value->id;?>" id="asms">Delete Profile</a>-->
			</td>




			</tr>
			<?php
			$i++;
			} ?>

			</tbody>
			</table>
			</div><!--//table-responsive-->

			</div><!--//app-card-body-->		
			</div><!--//app-card-->
			<!--  <nav class="app-pagination">
			<ul class="pagination justify-content-center">
			<li class="page-item disabled">
			<a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
			</li>
			<li class="page-item active"><a class="page-link" href="#">1</a></li>
			<li class="page-item"><a class="page-link" href="#">2</a></li>
			<li class="page-item"><a class="page-link" href="#">3</a></li>
			<li class="page-item">
			<a class="page-link" href="#">Next</a>
			</li>
			</ul>
			</nav>   -->
			<!--//app-pagination-->

			</div><!--//tab-pane-->





			</div><!--//tab-content-->



			</div><!--//container-fluid-->
			</div><!--//app-content-->

			<?php include('footer.php'); ?>





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

			<script type="text/javascript">
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
			url: '<?= base_url() ?>admin/quickregister_excel_mangalyam',
			data: {

			},
			success: function(response) 
			{
			if (response.success) 
			{         

			var cacheBuster = new Date().getTime();
			var downloadUrl = '<?= base_url() ?>upload/quickregister.xlsx?cb=' + cacheBuster;
			window.location.href = downloadUrl;

			} 
			else 
			{

			var cacheBuster = new Date().getTime();
			var downloadUrl = '<?= base_url() ?>upload/quickregister.xlsx?cb=' + cacheBuster;
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

			<script type="text/javascript">

			$(function() 
			{
			$("a[id='asms']").click(function()
			{
			$("#delete").modal("show");
			const deleteId = $(this).attr('data-id');
			const field = $('#deleteId');
			field.val(deleteId);
			console.log(field[0]);
			return false;
			});
			});

			</script>
			</html> 

