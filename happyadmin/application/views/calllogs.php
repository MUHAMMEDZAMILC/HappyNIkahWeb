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
    
    $user_id=$this->session->userdata('user_id_admin');
    
    if($user_id==='26')
    {
    include('menusales.php');     
    }
    
    
    if($_SESSION['user_type']==='13')
    {
    include('menusuperadmin.php');
    }
    
    else
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
        <h6 style="color:darkgrey;">Postpone</h1>
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
        <?php 
             $emp_id=$this->session->userdata('user_id_admin'); 
             $ptoday_date=date('Y-m-d');
        
             $convertdate=date('d-m-Y',strtotime($ptoday_date));
             $payment_id=$this->db->select('tbl_paymentrequest.payment_id')->from('tbl_paymentrequest')->get()->result_array();
        
            $qu=  $this->db->select('*')
                  ->from('tbl_paymentrequest')
                  ->where('login_id',$emp_id)->where('delete_status','Active')
                  //->where('postpone_date >=',$convertdate)
                   ->where("STR_TO_DATE(postpone_date, '%d-%m-%Y') >", $ptoday_date) 
                  ->where('paid_status','UnPaid')
                  ->group_by('payment_id',$payment_id)->get()->num_rows();?>
            
            
        <div class="card-body">
        <h1 class="app-page-title mb-0">Postpone</h1>
        <div>
        <h6 style="float: right;">Total records :<?php echo $qu;?></h6>
        </div>
        <br><br>
        <?php
        $emp_id=$this->session->userdata('user_id_admin'); 
        $ptoday_date=date('Y-m-d');
        
        $convertdate=date('d-m-Y',strtotime($ptoday_date));
        
      
        $payment_id=$this->db->select('tbl_paymentrequest.payment_id')->from('tbl_paymentrequest')->get()->result_array();
        
        		
                 
        $query2 = $this->db->select('tbl_registration.id,tbl_registration.happynikah_id,tbl_registration.name,tbl_paymentrequest.id as pid,
                  tbl_paymentrequest.user_id,tbl_paymentrequest.plan_id,
                  tbl_paymentrequest.plan_type,tbl_paymentrequest.postpone_date,tbl_paymentrequest.delete_status,tbl_paymentrequest.paid_status,tbl_paymentrequest.cdate,
                  tbl_paymentrequest.login_id,tbl_paymentrequest.payment_id,tbl_paymentrequest.message')
                  ->from('tbl_paymentrequest')
                  ->join('tbl_registration','tbl_registration.id=tbl_paymentrequest.payment_id')
        // ->join('table2', 'table1.common_id = table2.common_id', 'left')
        
                 ->where('login_id',$emp_id)
                ->where('delete_status','Active')
                ->where('paid_status','UnPaid')
                ->where("STR_TO_DATE(postpone_date, '%d-%m-%Y') >", $ptoday_date) 
                // ->where('postpone_date >=',$convertdate)
                ->group_by('payment_id',$payment_id)->get()->result_array();	
                 
        
        $i=1;
        ?>
        <div class="table-scroll-y my-custom-scrollbar" style="height: 645px;">
        <table id="example" class="table table-bordered table-striped">
        <thead style="background-color: grey;border:1px solid black;">
        <tr>
        <th style="color:#fff;">SL No</th>
        <th style="color:#fff;">HN ID</th>
        <th style="color:#fff;">Name</th>
        <th style="color:#fff;">Expiry Date</th>
        <th style="color:#fff;">Count</th>
        <th style="color:#fff;">Action</th>
        </tr>
        </thead>
        <tbody>
      
         
        
        <?php foreach($query2 as $value){ ?>
        
        <?php $que=$this->db->select('tbl_paymentrequest.*')->from('tbl_paymentrequest')->where('login_id',$emp_id)
        ->where('payment_id',$value['payment_id'])->where("STR_TO_DATE(postpone_date, '%d-%m-%Y') >", $ptoday_date)->where('delete_status','Active')->get()->num_rows();
        ?>
        
        <tr>
        <td><?php echo $i++; ?></td>
        <td>
        <?php echo $value['happynikah_id']; ?>
        </td>
        <td>
        <?php echo $value['name']; ?> 
        </td>
        <td>
        
        
        
        <?php $post_date= $value['postpone_date']; ?> 
        
        <?php $post_date_new=date('d-m-Y',strtotime($post_date));?>
        <?php echo $post_date_new;?>
        
        </td>
        <td>
        <?php echo $que; ?>
        </td>
        <td>
        <div>   
        
        <a class="asm" data-id="<?php echo $value['pid'];?>"  style="font-weight: 600;
        padding: 0.5rem 1rem;
        font-size: .875rem;color: #fff;
        border: none;background-color:#38b17a;border-color:#38b17a;"><i class="fa-solid fa-check"></i></a>
        <a class="asm2"  data-id="<?php echo $value['pid'];?>"  style="font-weight: 600;padding: 0.5rem 1rem;
        font-size: .875rem;border: none;background-color:#d26d69;border-color:#d26d69;color: #fff;
        padding-bottom: 10px;margin-left: 4px;">
        
        
        <i class="fa-solid fa-xmark"></i>
        </a>
        
        
        <!--<button class="btn btn-secondary" onclick="window.location.href='<?= base_url();?>admin/profile/view/<?=$value['payment_id'] ?>'">-->
        <!-- <i class="fa-solid fa-circle-right"></i></button>-->
        
        
        
        <form method="post" action="<?= base_url() ?>admin/search_profiles" style="margin-top: -37px;
        margin-left: 94px;">
        
        
        <input type="hidden" id="inputName" class="form-control" name="search_profile"  value="<?php echo $value['happynikah_id']; ?>"  required >
        <!--<span id="error" style="color:red;display:none;">Please insert Happynikah ID/Mobile No.</span>-->
        
        
        <!-- <div class="form-group"> -->
        
        <label for="inputName">&nbsp;</label>
        <!-- <button onclick="search_profiles()" name="search_profile_btn" class="btn btn-success" style="margin-top: 32px;"> -->
        <button type="submit" name="search_profile_btn" class="btn btn-secondary" id="search_button" style="">
        <i class="fa-solid fa-circle-right"></i>
        </button>
        </form>
        
        
        
        
        </div>
        </td>
        </tr>
        
             <?php } ?>
       
        
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
        <select id="plantype" class="form-control custom-select"  name="plantype" style="padding-bottom: 6px;">
        <option value="" selected disabled>--Please Select Plan Type--</option>
        <option value="normal">Normal</option>
        <option value="premium">Premium</option>
        
        </select>
        </div>
        <div class="mb-3">
        <label for="inputName" class="form-label" style="color: black;">
        <b>Membership Plan</b></label>
        <select id="membership_plan" class="form-control custom-select" name="membership_plan" style="padding-bottom: 6px;">
        <option value="" selected disabled>--Please Select Plan--</option>
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
        <input type="text" name="postpone_date"  id="postpone_date" class="form-control" required readonly>
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
        <option value="" selected disabled>---Please Select Reason---</option>
        
        <!--<option value="Profile Contains Abusive Contents(Vulgar or racist)">Profile Contains Abusive Contents(Vulgar or racist)</option>-->
        <!--<option value="Vulgar/Invalid Photos">Vulgar/Invalid Photos</option>-->
        <!--<option value="Invalid Data">Invalid Data</option>-->
        <!--<option value="Invalid Contact Details">Invalid Contact Details</option>-->
        <!--<option value="Contact number/link mentioned in restricted fields">Contact number/link mentioned in restricted fields</option>-->
        <!--<option value="Multiple/Duplicate profiles">Multiple/Duplicate profiles</option>-->
        <!--<option value="Fake Profiles">Fake Profiles</option>-->
        <!--<option value="Abnormal Activity Found">Abnormal Activity Found</option>-->
        
        <option value="Marriage Fixed">Marriage Fixed</option>
        <option value="Not Interested">Not Interested</option>
        <option value="Paid Customer">Paid Customer</option>
        <option value="Re Postpone">Re Postpone</option>
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
        
        
           <link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css' rel='stylesheet'>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" >
    </script>
      
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" >
    </script>
        
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
        
        
        // $("#postpone_date").datepicker({ 
        // beforeShowDay: function(date){
        // var day = date.getDay(); 
        
        // return [(day != 0 && day != 1)];
        // },
        // dateFormat: 'dd-mm-yy',
        // maxDate: "+4d",
        // minDate: 0
        // });
			
        
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