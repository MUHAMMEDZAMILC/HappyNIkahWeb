     <!DOCTYPE html>
    <?php include('header.php');

    if($_SESSION['user_type']==='3')
    {
     include('menusales_gotonikah.php');
    }
    ?>
              
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
       <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
       <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/custom.css">

        <div class="app-wrapper">
        
        <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
        
        <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
        <h6 style="color:darkgrey;">Active calls</h1>
        </div>
        
        <!-- Main content -->
        <section class="content">
        <div class="container-fluid">
        <div class="row">
        <div class="col-12">
        
        
        <div class="card">
        
        <!-- /.card-header -->
        <div class="card-body">
        <h1 class="app-page-title mb-0">Active calls</h1>
        <div>
       
         <?php $sess_id= $this->session->userdata('user_id_admin');?>
         <?php $approvecalls_count = $this->db->select('tr.*,tasp.action_check,tasp.assign_id,tasp.active_status,tasp.goto_status')->from('tbl_registration as tr')
         ->join('tbl_assign_active_calls as tasp','tasp.action_check = tr.id')
        //  ->where('assign_status','Inactive')
         ->where('goto_status','1')
         ->where('active_status!=','Inactive')
         ->where('assign_id',$sess_id)->get()->num_rows();?>
        
        <h6 style="float: right;">Total records : <?php echo $approvecalls_count;?></h6>
        </div>
        <br><br>
        
        
        <div class="table-scroll-y my-custom-scrollbar" style="height: 645px;">
        <table id="example" class="table table-bordered">
        <thead style="background-color: grey;border:1px solid black;">
        <tr>
        <th style="color:#fff;">GN ID</th>
        <th style="color:#fff;">Action</th>
        <!-- <th>Gender</th> -->
        <th style="color:#fff;">Description</th>
        <th style="color:#fff;">Name/Age/Gender</th>
        
        <th style="color:#fff;">Location</th>
    
        </tr>
        </thead>
        <tbody>
        <tr style="border: 1px solid black;">
        <?php $sess_id= $this->session->userdata('user_id_admin');?>
        <?php $approvecalls = $this->db->select('tr.*,tasp.action_check,tasp.assign_id,tasp.active_status,tasp.goto_status')
        ->from('tbl_registration as tr')
        ->join('tbl_assign_active_calls as tasp','tasp.action_check = tr.id')
       
        ->where('active_status!=','Inactive')
        ->where('goto_status','1')
        ->where('assign_id',$sess_id)->get()->result_array();?>
        
        <?php foreach($approvecalls as $approve)
        {?>
        
        <td>
        
        <li style="list-style-type:none;">
        <p>
        <!--HN100001 -->
        <?php echo $approve['happynikah_id'];?>   
        </p>
        </li>
        <hr>
        
        <li style="list-style-type:none;">
        <p style="background-color:#6afc82;width: 100px;">
            
         <?php $reg_date= $approve['reg_date'];?>
        <?php $regnew=date('d-m-Y',strtotime($reg_date));?>
          <?php echo $regnew;?>
        </li>
               <hr>
         <li style="list-style-type:none;">
        <p>
        <!--HN100001 -->
        
          <?php if($approve['reg_through']=='0')
            {?>
            <?php echo "Website";?>
            <?php }?>
            
            <?php if($approve['reg_through']=='1')
            {?>
            <?php echo "Admin";?>
            <?php }?>
            
            <?php if($approve['reg_through']=='2')
            {?>
            <?php echo "Mobile";?>
            <?php }?>
            
        </p>
        </li>
 
        
        
        </td>
        <td>
        
        <li style="list-style-type:none;">
                       
             <form method="post" action="<?= base_url() ?>admin/search_profiles">
                <div class="form-group">
                
                <input type="hidden" id="inputName" class="form-control" name="search_profile"  value="<?php echo $approve['happynikah_id'] ?>"  required >
               
                </div>
                </div>
                <div class="col-lg-6">
                
                <label for="inputName">&nbsp;</label>
               
                <button type="submit" name="search_profile_btn" class="btn btn-success" id="search_button"
                
                style="background: transparent;width: 114px;margin-left: -15px;color: #378fd3;">
                    <!--<i class="fa-sharp fa-solid fa-share"></i>-->
                    Basic Details
                </button>
                </form>
                
        
        </li>
        
        <hr>
        <li style="list-style-type:none;">
        <a class="asms"  data-id="<?php echo $approve['id'];?>" data-replace="Delete"  style="color: #378fd3;">Delete</a>
        </li>
        <hr>
        <li style="list-style-type:none;">
        <a class="bbb" data-id="<?php echo $approve['id'];?>"  data-replace="Block Profile" style="color: #378fd3;">Block</a>
        </li>
        <hr>
        <li style="list-style-type:none;">
        <a class="pp" style="color: red;" data-id="<?php echo $approve['id'];?>">PostPone Payment</a>
        </li>
        <!--<hr>-->
        <!--<li style="list-style-type:none;">-->
        <!--<a href="#" style="color: #378fd3;">Other State</a>-->
        <!--</li>-->
        </td>
        
        <td>
        <li style="list-style-type:none;">
        <p>
        <h6><u>Profile Description</u></h6>
        <br>
        <p>
        
        <!--My name is Adheena.. Looking for good proposal..Looking for very attractive person look like harshan-->
        
        <?php echo $approve['about'];?>   
        </p>
        </p>
        </li>
        
        </td>
        <td>
        <li style="list-style-type:none;">
        <br>
        <br>
        <p> 
        <!--Adheena-->
        <?php echo $approve['name'];?>  
        <br>
        <?php echo $approve['age'];?>  
        <br>
        <!--Female-->
        <?php if($approve['gender']=='1')
        {?>
        <?php $gender_name="Male";?>
        <?php }?>
        
        <?php if($approve['gender']=='2')
        {?>
        <?php $gender_name="Female";?>
        <?php }?>
        
        <?php echo $gender_name;?> 
        </p>
        
        </li>
        
        </td>
        <td>
        <li style="list-style-type:none;">
        <br>
        <br>
        <p>
        <!--Vadakara , Kozhikkode , Kerala-->
        
        <?php echo $approve['address'];?>   
        </p>
        
        </li>
        </td>
        
        </tr>
        
        <?php }?>
        
      
        
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
        </section>
        <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


	<!-- modal for delete  -->
		<form id="contactdelete" method="post" action="<?php echo base_url(); ?>admin/profile_delete" onsubmit="setTimeout(function(){window.location.reload();},700);">
        <div class="modal fade" id="deletecnt" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">
          Profile Delete</h5>

        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body"> 
            
        <div class="mb-3">
        <label for="inputName" class="form-label">Status</label>
        <select id="reason_status" class="form-control custom-select" name="reason_status" required>
        <option value="" selected disabled>--Please Select Status--</option>
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
        <textarea id="message" class="form-control"  name="message" style="height:100px;" required></textarea>
    <!--&nbsp;&nbsp;&nbsp;&nbsp;-->
   <!--<?php echo $this->session->userdata('username');?>-->
    
       
        </div>
        </div>
        <div class="modal-footer">

        <input type="hidden" name="user_id" id="user_id">
       <input type="hidden" name="session" 
       value="<?php echo $this->session->userdata('user_id_admin');?>" id="session">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close
        </button>
       <!--  <button type="submit" class="btn btn-primary">Save changes</button> -->

      <button type="submit" class="btn btn-primary"  id="btn_update" style="color:#fff;">Save changes
       </button>

        </div>
       
        </div>
        </div>
        </div>
        </div>
        </form>
        
        
        	<!-- modal for postpone  -->
		
		<form id="contact" method="post" action="<?php echo base_url(); ?>admin/payment_request_active_calls" onsubmit="setTimeout(function(){window.location.reload();},700);">
				    
		<div class="modal fade" id="postpone" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Payment Request</h5>
						<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					
	

               <input type="hidden" name="payment_id" id="payment_id">
               
					<div class="modal-body">
						<div class="mb-3">
							<label for="inputName" class="form-label" style="color:black;"><b>Plan Type</b></label>
							<select id="plantype" class="form-control custom-select" name="plantype" style="padding-bottom:6px;">
								<option value="" selected disabled>--Please Select PlanType --</option>
								<option value="normal">Normal</option>
								<option value="premium">Premium</option>

						</select>
						</div>
						<div class="mb-3">
						<label for="inputName" class="form-label" style="color: black;">
						<b>Membership Plan</b></label>
						<select id="membership_plan" class="form-control custom-select" name="membership_plan" style="padding-bottom:6px;">
								<option value="" selected disabled>--Please Select Plan--</option>
								<option value="1">Bronze</option>
								<option value="2">Diamond</option>
								<option value="3">Crown</option>
								<option value="4">Master</option>
								<option value="5">Assisted</option>
								<option value="6">Assited Pro</option>
								<!--<option value="">Elite</option>-->
							</select>
						</div>
						<div class="mb-3">
						<label for="inputName" class="form-label" style="color: black;"><b>PostPone Date</b></label>
						<input type="text" name="postpone_date"  id="postpone_date" class="form-control" required readonly>
						</div>

						<div class="mb-3">
						<label for="inputName" class="form-label" style="color: black;">
							<b>Message</b></label>
							<textarea id="message" class="form-control" name="message"  required  style="height:100px;"></textarea>
							  
							
						</div>
					</div>
					<div class="modal-footer">

						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary" style="color:#fff;">Sumbit</button>
					</div>
				</div>
			</div>
		</div>
		</form>
		
        
        
        	<!-- modal for block -->
      <form id="blockform" method="post" action="<?php echo base_url(); ?>admin/block_profile_approve_calls" onsubmit="setTimeout(function(){window.location.reload();},700);">

		<div class="modal fade" id="block_" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
		<div class="modal-header">
		<h5 class="modal-title" id="exampleModalLongTitle">Block Profile</h5>
		<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>
		<div class="modal-body">
		<div class="mb-3">

		<label for="inputName" class="form-label">Status</label>
		<select id="block_status" class="form-control custom-select" name="block_status" required style="padding-bottom:4px;">
		<option value="" selected disabled>--Please Select Status--</option>
		<option value="Profile Contains Abusive Contents ( Vulgar or racist )">Profile Contains Abusive Contents ( Vulgar or racist )</option>
		<option value="Vulgar / Invalid Photos">Vulgar / Invalid Photos </option>
		<option value="Invalid Data">Invalid Data </option>
		<option value="Invalid Contact Details">Invalid Contact Details</option>
		<option value="Contact number / link mentioned in restricted fields">Contact number / link mentioned in restricted fields </option>
		<option value="Multiple / Duplicate profiles">Multiple / Duplicate profiles </option>
		<option value="Fake Profiles">Fake Profiles</option>
		<option value="Abnormal Activity Found">Abnormal Activity Found </option>
		<option value="Marriage Fixed">Marriage Fixed</option>
		<option value="Minor Profiles">Minor Profiles</option>
		<option value="Others">Others</option>
		</select>

		</div>

		<div class="mb-3">
		<label for="inputName" class="form-label">Message</label>
		<textarea id="block_description" class="form-control" required name="block_description" style="height:100px;"></textarea>
		
		</div>
		</div>
		<div class="modal-footer">
		 <input type="hidden" name="user_id2" id="user_id2">
		    <input type="hidden" name="session" value="<?php echo $this->session->userdata('user_id_admin');?>" id="session">
		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-primary btnblk_" id="btnblk_" style="color:#fff;">Save changes</button>
		</div>
		</div>
		</div>
		</div>
		</form>
		<!-- end of block modal  -->
		<!-- modal for change password  -->
        


            <!-- end modal for Interest details  -->
            <?php include('footer.php'); ?>


    <link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css' rel='stylesheet'>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" >
    </script>
      
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" >
    </script>
  
		<!-- DataTables  & Plugins -->
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
			
			
			<script>
            $(function()
            {
            $("a[class='asms']").click(function()
            {
            $("#deletecnt").modal("show");
            
            const user_id = $(this).attr('data-id');
            const field = $('#user_id');
            field.val(user_id);
            console.log(field[0]); 
            
            return false;
            });
            });
            
            $(function() {
            $("a[class='pp']").click(function() {
            $("#postpone").modal("show");
            
            const payment_id = $(this).attr('data-id');
            const field = $('#payment_id');
            field.val(payment_id);
            console.log(field[0]); 
            
            return false;
            });
            });
            
            
            
            
            	
			$("#postpone_date").datepicker({ 
			beforeShowDay: postpone_date,
			dateFormat: 'dd-mm-yy',
			maxDate: "+3d",
			minDate:0
			});

			function postpone_date(date)
			{ 
			var day = date.getDay(); 
			return [(day > 0), '']; 
			}; 
			
			
			
            $(function()
            {
                
            $("a[class='bbb']").click(function()
            {
            $("#block_").modal("show");
            
             const user_id2 = $(this).attr('data-id');
            const field = $('#user_id2');
            field.val(user_id2);
            console.log(field[0]); 
            
            return false;
            });
            });

			</script>

            </html>