<!DOCTYPE html>
<?php include('header.php'); 
if($_SESSION['user_type']==='7')
{
include('menuchatsupport.php');
}

if($_SESSION['user_type']==='3')
{
include('menusales.php');
}

if($_SESSION['user_type']==='13')
{
include('menusuperadmin.php');
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
        <h6 style="color:darkgrey;">Changepassword-</h1>
        </div>
        
        <!-- Main content -->
        <section class="content">
        <div class="container-fluid">
        <div class="row">
        <div class="col-md-6 col-lg-6">
        
        <div class="card" style="margin-bottom:80px;">
       
        <div class="card-body">
        <h1 class="app-page-title mb-0">Superadmin</h1>
        <div>
     
       
  
   
                
            
        
        <form id="contact" method="post" action="<?php echo base_url(); ?>admin/changepass"  
        onsubmit="setTimeout(function(){window.location.reload();},600);">
        
        
     
        
        <input type="hidden" name="user_id" id="user_id" value="<?php echo $this->session->userdata('user_id_admin');?>">   
 
        

        <div class="mb-3">
        <label for="inputName" class="form-label" style="color: black;"><b style="font-weight: 500;">Password</b></label>
        <input type="text" name="pass_super" class="form-control" id="pass_super">
        </div>
        
       
     
     
        <button type="submit" class="btn btn-primary" style="color: #fff;">Sumbit</button>
       
      
        </form>
      
        
        
        
        </div>
        
         </div>
         
         
         
        
        
        </div>
        
        
        
        <!-- /.card-body -->
        </div>
        
        
        
        
        <div class="col-md-6 col-lg-6">
        
        <div class="card">
       
        <div class="card-body">
        <h1 class="app-page-title mb-0">Salesadmin</h1>
        <div>
     
       
  
   
                
            
        
        <form id="contact" method="post" action="https://happynikah.com/happyadmin/admin/changesalespass" 
        onsubmit="if (!window.__cfRLUnblockHandlers) return false; setTimeout(function(){window.location.reload();},600);">
        
        
     
        
        <input type="hidden" name="user_id" id="user_id" value="9">   
 
        

        <div class="mb-3">
        <label for="inputName" class="form-label" style="color: black;"><b style="font-weight: 500;">Password</b></label>
        <input type="text" name="pass_sales" class="form-control" id="pass_sales">
        </div>
        
        <button type="submit" class="btn btn-primary" style="color: #fff;">Sumbit</button>
       
        </form>
        
      
        
        
        
        </div>
        
         </div>
         
         
         
        
        
        </div>
        
        
        
        <!-- /.card-body -->
        </div>
        
        <!-- /.card -->
        </div>
        
        
        
        <div class="row">
        <div class="col-md-6 col-lg-6">
        
        <div class="card">
       
        <div class="card-body">
        <h1 class="app-page-title mb-0">Chatsupportadmin</h1>
        <div>
     
       
  
   
                
            
        
        <form id="contact" method="post" action="<?php echo base_url(); ?>admin/changechatsupportpass"  
        onsubmit="setTimeout(function(){window.location.reload();},600);">
        
        
     
        
        <input type="hidden" name="user_id" id="user_id" value="11">   
 
        

        <div class="mb-3">
        <label for="inputName" class="form-label" style="color: black;"><b style="font-weight: 500;">Password</b></label>
        <input type="text" name="pass_chat" class="form-control" id="pass_chat">
        </div>
        
       
     
     
        <button type="submit" class="btn btn-primary" style="color: #fff;">Sumbit</button>
       
      
        </form>
      
        
        
        
        </div>
        
         </div>
         
         
         
        
        
        </div>
        
        
        
        <!-- /.card-body -->
        </div>
        
        
        
        
        <div class="col-md-6 col-lg-6">
        
        <div class="card">
       
        <div class="card-body">
        <h1 class="app-page-title mb-0">Serviceadmin</h1>
        <div>
     
       
  
   
                
            
        
        <form id="contact" method="post" action="https://happynikah.com/happyadmin/admin/changeservicepass" 
        onsubmit="if (!window.__cfRLUnblockHandlers) return false; setTimeout(function(){window.location.reload();},600);">
        
        
     
        
        <input type="hidden" name="user_id" id="user_id" value="12">   
 
        

        <div class="mb-3">
        <label for="inputName" class="form-label" style="color: black;"><b style="font-weight: 500;">Password</b></label>
        <input type="text" name="pass_service" class="form-control" id="pass_service">
        </div>
        
        <button type="submit" class="btn btn-primary" style="color: #fff;">Sumbit</button>
       
        </form>
        
      
        
        
        
        </div>
        
         </div>
         
         
         
        
        
        </div>
        
        
        
        <!-- /.card-body -->
        </div>
        
        <!-- /.card -->
        </div>
        
        
         <div class="row">
        <div class="col-md-6 col-lg-6">
        
        <div class="card" style="margin-top: 60px;">
       
        <div class="card-body">
        <h1 class="app-page-title mb-0">Supportadmin</h1>
        <div>
     
       
  
   
                
            
        
        <form id="contact" method="post" action="<?php echo base_url(); ?>admin/changesupportpass"  
        onsubmit="setTimeout(function(){window.location.reload();},600);">
        
        
     
        
        <input type="hidden" name="user_id" id="user_id" value="10">   
 
        

        <div class="mb-3">
        <label for="inputName" class="form-label" style="color: black;"><b style="font-weight: 500;">Password</b></label>
        <input type="text" name="pass_support" class="form-control" id="pass_support">
        </div>
        
       
     
     
        <button type="submit" class="btn btn-primary" style="color: #fff;">Sumbit</button>
       
      
        </form>
      
        
        
        
        </div>
        
         </div>
         
         
         
        
        
        </div>
        
        
        
        <!-- /.card-body -->
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
        
        
        
        <form id="contact" method="post" action="<?php echo base_url(); ?>admin/todaypostpone_delete"  
        onsubmit="setTimeout(function(){window.location.reload();},600);">
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
        <select id="reason_status" class="form-control custom-select" name="reason_status">
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
        <textarea id="message" class="form-control" required="" name="message">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->session->userdata('username');?>
        </textarea>
        </div>
        </div>
        <div class="modal-footer">
        
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Sumbit</button>
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