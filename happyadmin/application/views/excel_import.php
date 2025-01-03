<!DOCTYPE html>
<?php include('header.php'); 

$user_id=$this->session->userdata('user_id_admin');
 
   if($user_id==='26')
    {
     include('menusales.php');     
    }


?>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

<!-- <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css"> -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/custom.css">
<div class="app-wrapper">

<style>
svg.svg-inline--fa.fa-xmark {
    margin-top: 11px;
    /* margin-left: 20px; */
}
  
  </style>
    <div class="app-content pt-3 p-md-3 p-lg-4">
        
        <div class="container-xl">
        
        <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
        <h6 style="color:darkgrey;">Data Excel Import</h1>
        </div>
        
        <!-- Main content -->
        <section class="content">
        <div class="container-fluid">
        <div class="row">
        <div class="col-12">
        
        <div class="card">
        <!-- <div class="card-header">
        <h3 class="card-title">DataTable with default features</h3>
        </div> -->
        <!-- /.card-header -->
     
        <div class="card-body">
        <h1 class="app-page-title mb-0">Excel </h1>
        <div>
       
        </div>
        
        
        
        
        <form action="<?=base_url('admin/dataimport')?>" enctype="multipart/form-data" method="post">
		<input type="file" name="upload_excel" required />
		<input type="submit" name="submit" value="Submit">
		<?php if($this->session->flashdata('success'))  { ?>
			<p><?=$this->session->flashdata('success')?></p>
		<?php  } ?>
		<?php if($this->session->flashdata('error'))  { ?>
			<p><?=$this->session->flashdata('error')?></p>
		<?php  } ?>
	</form>
        
        
        
        
        
        
        
        <div class="table-scroll-y my-custom-scrollbar" style="height: 645px;">
        
        
        
      
        
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
        
        <!-- Modal for enter message -->
        <form id="contact" method="post" action="<?php echo base_url(); ?>admin/calllogspostpone_update"  onsubmit="setTimeout(function(){window.location.reload();},700);">
        <div class="modal fade" id="enterMessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
        
        <h5 class="modal-title" id="exampleModalLongTitle">
        Are You Sure want to Postpone ?
        
        </h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        
        <input type="hidden" name="user_id" id="user_id">   
        <input type="hidden" name="login_id" 
        value="<?php echo $this->session->userdata('user_id_admin');?>" id="login_id">
        
        <div class="modal-body">
        <div class="mb-3">
        <label for="inputName" class="form-label" style="color:black;"><b>Plan Type</b></label>
        <select id="plantype" class="form-control custom-select" 
        name="plantype">
        <option value="">--select--</option>
        <option value="normal">Normal</option>
        <option value="premium">Premium</option>
        
        </select>
        </div>
        <div class="mb-3">
        <label for="inputName" class="form-label" style="color: black;">
        <b>Membership Plan</b></label>
        <select id="membership_plan" class="form-control custom-select" name="membership_plan">
        <option value="">--select--</option>
        <option value="1">Bronze</option>
        <option value="2">Diamond</option>
        <option value="3">Crown</option>
        <option value="4">Master</option>
        <option value="5">Assisted</option>
        <option value="6">Assited Pro</option>
        
        </select>
        </div>
        <div class="mb-3">
        <label for="inputName" class="form-label" style="color: black;"><b>PostPone Date</b></label>
        <input type="date" name="postpone_date" class="form-control" required>
        </div>
        
        <div class="mb-3">
        <label for="inputName" class="form-label" style="color: black;">
        <b>Message</b></label>
        <textarea id="message" class="form-control" required name="message" style="height:100px;"></textarea>
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
        
        
        <form id="contact" method="post" action="<?php echo base_url(); ?>admin/todaypostpone_delete"  onsubmit="setTimeout(function(){window.location.reload();},700);">
        <div class="modal fade" id="deletepostpone" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
        
        <h5 class="modal-title" id="exampleModalLongTitle">
        Are You Sure want to close Postpone ?
        
        <!--  <?php echo $this->session->userdata('user_id_admin');?>  -->
        
        </h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        
        
        <input type="hidden" name="user_id2" id="user_id2">
        
        <input type="hidden" name="login_id" 
        value="<?php echo $this->session->userdata('user_id_admin');?>" id="login_id">
        
        <div class="modal-body">
        
        <div class="mb-3">
        <label for="inputName" class="form-label">Reason</label>
        <select id="reason_status" class="form-control custom-select" name="reason_status" required>
        <option value="">---select---</option>
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
        <label for="inputName" class="form-label" style="color: black;">
        <b>Message</b></label>
        <textarea id="message" class="form-control" required name="message" style="height:100px;"></textarea>
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
        
        <?php include('footer.php'); ?>
        
        <!-- jQuery -->
        <script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        
        <script>
        $(function()
        {
        $("a[class='asm']").click(function()
        {
        $("#enterMessage").modal("show");
        const user_id = $(this).attr('data-id');
        const field = $('#user_id');
        field.val(user_id);
        console.log(field[0]);          
        
        return false;
        });
        });    
        
        $(function() 
        {
        $("a[class='asm2']").click(function() 
        {
        $("#deletepostpone").modal("show");
        
        const user_id2 = $(this).attr('data-id');
        const field = $('#user_id2');
        field.val(user_id2);
        console.log(field[0]);          
        
        return false;
        });
        });   
        </script>
        
        </html>