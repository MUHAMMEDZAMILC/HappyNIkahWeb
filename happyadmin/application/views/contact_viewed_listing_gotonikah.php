<!DOCTYPE html>
<?php include('header.php');  
    $user_id=$this->session->userdata('user_id_admin');
    
    if($user_id=='2')
    {
    include('gotonikah_sales_super.php');     
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
			            <h1 class="app-page-title mb-0" style="margin-left: 20px;">Viewed Contacts List</h1>
				    </div>
				    <div class="col-auto">
					     <div class="page-utilities">
						    <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
							    
						    </div><!--//row-->
					    </div><!--//table-utilities-->
				    </div><!--//col-auto-->
			    </div><!--//row-->
			   	
				<div class="tab-content" id="orders-table-tab-content">
			        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
					    <div class="app-card app-card-orders-table shadow-sm mb-5">
						    <div class="app-card-body">
							    <div class="table-responsive">

					 <?php 
                        $this->db->select('R.id, R.happynikah_id');
                        $this->db->from('tbl_registration R');
                        $this->db->where('R.happynikah_id', $hn_id); 
                        $query = $this->db->get();    
                        $detail2 = $query->result_array();
                     
                    ?>  
                  <h4   style="margin-left: 25px;margin-top: 10px;">Search ID :<?php echo $hn_id;?></h4>	
                    <?php 
                        $this->db->select('C.*, R1.id AS sender_id,R1.status,R1.goto_nikah,R2.goto_nikah,R1.hmangalyam,R2.hmangalyam, R1.happynikah_id AS sender_happynikah_id, 
                        P.id, P.plan_id, P.description,R2.id AS receiver_id, R2.happynikah_id AS receiver_happynikah_id');
                        $this->db->from('tbl_contact_viewed C');
                        $this->db->join('tbl_registration R1', 'R1.id = C.sender_id', 'left');
                        $this->db->join('tbl_payement P', 'P.id = C.planid', 'left');
                        $this->db->join('tbl_registration R2', 'R2.id = C.receiver_id', 'left');
                        $this->db->where('R1.happynikah_id',$hn_id);
                        // $this->db->where('R1.status','1');
                        $this->db->where('R1.goto_nikah', '1');
                        $this->db->where('R2.goto_nikah', '1');
               
                        $qu = $this->db->get();    
                        $register = $qu->result_array(); 
                   

                        ?>

						 <table id="example" class="table app-table-hover mb-0 text-left">
							<thead style="background-color: grey;border:1px solid black;">
											<tr>
												<th style="color:#fff;">Sl No</th>
												<th style="color:#fff;">Viewed ID's</th>
												<th style="color:#fff;">Plan Name</th>
												<th style="color:#fff;">Date Time</th>
												<th style="color:#fff;">Action</th>
											</tr>
										</thead>

										
										 <tbody>            
					        <?php
					           $i = 1;
					           
					            foreach ($register as $value){?> 
					              <tr>
					                 <td>
					                 <?php echo $i;?>
					                 </td>
					                 
					                 <td>
					                  <?php echo $value['receiver_happynikah_id'];?>
					                  </td>
					                  
					                   <td>
					                   <?php $plan_id = $value['plan_id'];?>
					                        
					                  <?php if($plan_id=='1')
					                  {?>
					                  <?php echo "Bronze Plan";?>
					                  <?php }?>
					                  
					                  <?php if($plan_id=='2')
					                  {?>
					                  <?php echo "Diamond Plan";?>
					                  <?php }?>
					                  
					                  <?php if($plan_id=='3')
					                  {?>
					                  <?php echo "Crown Plan";?>
					                  <?php }?>
					                  
					                  <?php if($plan_id=='4')
					                  {?>
					                  <?php echo "Master Plan";?>
					                  <?php }?>
					                  
					                  <?php if($plan_id=='5')
					                  {?>
					                  <?php echo "Assisted Plan";?>
					                  <?php }?>
					                  
					                  <?php if($plan_id=='6')
					                  {?>
					                  <?php echo "Assisted Pro Plan";?>
					                  <?php }?>
					                  
					                   
					                  <?php if($plan_id=='7')
					                  {?>
					                  <?php echo "Zero Plan";?>
					                  <?php }?>
					                    
					               </td>
					               <td>
					               
					               <?php $datestring= $value['date'];?>
					               
					              <?php $newDateString = date('d-m-Y H:i:s', strtotime($datestring));
					              
					              echo  $newDateString;?>
					               </td>
					               
					               <td>
					                   
                        
                        <form method="post" action="<?= base_url() ?>admin/search_profiles">
                        <input type="hidden" id="inputName" class="form-control" name="search_profile"  value="<?php echo $value['receiver_happynikah_id'] ?>"  required >
                        
                        <button type="submit" name="search_profile_btn" class="badge bg-success" id="search_button" style="color:white;border: 0px transparent;">View Profile
                        </button>
                        </form>
                    
					               </td>
					                     					                        
					                     </tr>  
					                    <?php
					                      $i++;
					                     } 
					                   ?>            
					                      
						              </tbody>
										</table>
										</div>

										</div>		
										</div>
					
						
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

