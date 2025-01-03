<!DOCTYPE html>
<?php include('header.php');

if($_SESSION['user_type']==='0' &&  $_SESSION['nikah_type']=='gotonikah')
{
include('gotonikah_sales_super.php');	
}

if($_SESSION['user_type']==='6' &&  $_SESSION['nikah_type']=='gotonikah')
{
include('menusupport_gotonikah.php');	
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
			            <h1 class="app-page-title mb-0">Stage Three</h1>
				    </div>
				    <div class="col-auto">
					     <div class="page-utilities">
						    <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
							    <!-- <div class="col-auto">
								    <form class="table-search-form row gx-1 align-items-center">
					                    <div class="col-auto">
					                        <input type="text" id="search-orders" name="searchorders" class="form-control search-orders" placeholder="Search">
					                    </div>
					                    <div class="col-auto">
					                        <button type="submit" class="btn app-btn-secondary">Search</button>
					                    </div>
					                </form>
					                
							    </div>  -->
							   <!--  <div class="col-auto">
								    
								    <select class="form-select w-auto" >
										  <option selected value="option-1">All</option>
										  <option value="option-2">This week</option>
										  <option value="option-3">This month</option>
										  <option value="option-4">Last 3 months</option>
										  
									</select>
							    </div> -->
							   <!--  <div class="col-auto">						    
								    <a class="btn app-btn-secondary" href="#">
									    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
		  <path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
		  <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
		</svg>
									    Download CSV
									</a>
							    </div> -->
						    </div><!--//row-->
					    </div><!--//table-utilities-->
				    </div><!--//col-auto-->
			    </div><!--//row-->
			   
			    
			   <!--  <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
				    <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-bs-toggle="tab" href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true">All</a>
				    <a class="flex-sm-fill text-sm-center nav-link"  id="orders-paid-tab" data-bs-toggle="tab" href="#orders-paid" role="tab" aria-controls="orders-paid" aria-selected="false">Paid</a>
				    <a class="flex-sm-fill text-sm-center nav-link" id="orders-pending-tab" data-bs-toggle="tab" href="#orders-pending" role="tab" aria-controls="orders-pending" aria-selected="false">Pending</a>
				    <a class="flex-sm-fill text-sm-center nav-link" id="orders-cancelled-tab" data-bs-toggle="tab" href="#orders-cancelled" role="tab" aria-controls="orders-cancelled" aria-selected="false">Cancelled</a>
				</nav> -->
				





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
													<th style="color:#fff;">GN ID</th>
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
	
	$('#exportto').click(function() 
	{
	$.ajax({
	type: 'POST',
	url: '<?= base_url() ?>admin/stagethree_excel_gotonikah',
	data: {

	},
	success: function(response) 
	{
	if (response.success) 
	{         

	var cacheBuster = new Date().getTime();
	var downloadUrl = '<?= base_url() ?>upload/stagethree.xlsx?cb=' + cacheBuster;
	window.location.href = downloadUrl;

	} 
	else 
	{

	var cacheBuster = new Date().getTime();
	var downloadUrl = '<?= base_url() ?>upload/stagethree.xlsx?cb=' + cacheBuster;
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
</html> 

