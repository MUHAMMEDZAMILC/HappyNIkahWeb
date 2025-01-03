<!DOCTYPE html>
<?php include('header.php'); ?>

    <?php 
    $user_id=$this->session->userdata('user_id_admin');
    
    if($user_id=='2')
    {
    include('gotonikah_sales_super.php');     
    }
    
    if($_SESSION['user_type']==='6')
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
			            <h1 class="app-page-title mb-0">Gulf Approvels</h1>
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
			   
			  
                <?php
                  $this->db->select('R.id, R.happynikah_id, R.name, R.phone, R.countryCode, R.reg_date, R.reg_through,R.goto_nikah');
					$this->db->from('tbl_registration R');
					$this->db->where_in('R.reg_through', array('0', '2')); 
					$this->db->where_in('R.countryCode', array('973', '965', '968', '974', '966','967', '971'));
					$this->db->where('R.status','0'); 
					$this->db->where('R.goto_nikah','1');
					$query = $this->db->get();    
					$detail2 = $query->result_array(); 
                   ?>
				
				<div class="tab-content" id="orders-table-tab-content">
			        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
					    <div class="app-card app-card-orders-table shadow-sm mb-5">
					        
					        	<button type="button" class="btn btn-success" style="color:#fff;margin-left:20px;margin-top: 20px;" id="exportto">Export to Excel</button>
					        			       
						    <div class="app-card-body">
							    <div class="table-responsive">
							        <table id="example" class="table app-table-hover mb-0 text-left">
										<thead style="background-color: grey;border:1px solid black;">
											<tr>
												<th style="color:#fff;">Sl No</th>
												<th style="color:#fff;">GN ID</th>
												<th style="color:#fff;">Name</th>
												<th style="color:#fff;">Mobile</th>
												<th style="color:#fff;">Reg Date</th>
												<th style="color:#fff;">Actions</th>
											</tr>
										</thead>
										<tbody>
										<?php
										 $i = 1;
										 foreach ($detail2 as $key=>$value) { ?>
											<tr id="trr">
												<td><?php echo $i; ?></td>
														<td><?php echo $value['happynikah_id']; ?></td>
												<td><span class="truncate"><?php echo $value['name']; ?></span></td>
												<td><?php if($value['countryCode']!= '0'){
													$countryCode = "+".$value['countryCode']; 
											}
											else{
													$countryCode="";
												} 
												echo $countryCode.$value['phone']; ?></td>

												<td><span>
												    <?php $date=$value['reg_date']; ?>
											<?php $reg_date=date('d-m-Y',strtotime($date));?>	    
										    <?php echo $reg_date; ?></span></td>
			
					<td>
					    			
			<form method="post" action="<?= base_url() ?>admin/search_profiles">
			<input type="hidden" id="inputName" class="form-control" name="search_profile"  value="<?php echo $value['happynikah_id']?>"  required >
        
        
        <button type="submit" name="search_profile_btn" class="badge bg-success" id="search_button" style="color:white;border: 0px transparent;">View Profile
         </button>
       					
                    
                    </form>
                 
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
		url: '<?= base_url() ?>admin/gulfdata_excel_gotonikah',
		data: {

		},
		success: function(response) 
		{
		if (response.success) 
		{         

		var cacheBuster = new Date().getTime();
		var downloadUrl = '<?= base_url() ?>upload/gulfdata.xlsx?cb=' + cacheBuster;
		window.location.href = downloadUrl;

		} 
		else 
		{

		var cacheBuster = new Date().getTime();
		var downloadUrl = '<?= base_url() ?>upload/gulfdata.xlsx?cb=' + cacheBuster;
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

<!-- <script type="text/javascript">
	
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

</script> -->
</html> 

