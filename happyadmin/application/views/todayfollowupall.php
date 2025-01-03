<!DOCTYPE html>
<?php include('header.php'); ?>
 <?php $user_id=$this->session->userdata('user_id_admin');?>
<?php if($_SESSION['user_type']==='3')
{
include('menusales.php');
}

if($_SESSION['user_type']==='13')
{
include('menusuperadmin.php');
}

if($user_id==='26')
{
include('menusales.php');     
}

if($_SESSION['user_type']==='7')
{
include('menuchatsupport.php');
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

            <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">

            <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
            <h6 style="color:darkgrey;">Today followup</h1>
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
            <h1 class="app-page-title mb-0">Today Followup</h1>

            <?php $todaydate = date('d-m-Y',strtotime("+0 days"));?>
            
            <?php $user_id=$this->session->userdata('user_id_admin');?>
               
            <?php $today= $this->db->select('tbl_registration.*,tbl_followup.id as fid,tbl_followup.status as fstatus,tbl_followup.message as fmessage,tbl_followup.fdate as followdate')
                                 ->from('tbl_registration')
                                 ->join('tbl_followup','tbl_followup.uid=tbl_registration.id')
                                 ->where('tbl_followup.fdate',$todaydate)
                                 ->where('tbl_followup.delete_status','Active')
                                 ->get()->result_array();?>

           
        
           <?php $todaydate = date('d-m-Y',strtotime("+0 days"));?>
           
           <?php $todayfollow =  $this->db->select('*')->from('tbl_followup')
                                 ->join('tbl_registration','tbl_registration.id=tbl_followup.uid')
                                 ->where('tbl_followup.fdate',$todaydate)
                                 ->where('tbl_followup.delete_status','Active')
                                 ->get();?>

            <div>
            <h6 style="float: right;">Total records :
            <?php echo $todayfollow->num_rows(); ?></h6>
            </div>
            <br><br>


            <div class="table-scroll-y my-custom-scrollbar" style="height: 645px;">
            <table id="example" class="table table-bordered">
            <thead style="background-color: grey;border:1px solid black;">
            <tr>
            <th style="color:#fff;">HN ID</th>
            <th style="color:#fff;">Action</th>
            <th style="color:#fff;">Name/Age/Gender</th>
            <th style="color:#fff;">Followup Details</th>
            <th style="color:#fff;">Phone</th>

            <!-- <th>Gender</th> -->

            <!-- <th>Profile Description</th> -->
            <!-- <th>Registered on </th> -->
            <!-- <th>Registration Through </th> -->
            </tr>
            </thead>
            
            <tbody>
            <?php $j=1;?>
            <?php foreach($today as $td) 
            {

            ?>
            <tr style="border: 1px solid black;" id="row-1">
              
            <td style="padding-top: 40px;">
                  <hr style="border: 1px solid red;">
            <li style="list-style-type:none;">
            <a  class="asm" data-id="<?php echo $td['id'];?>" href="#" 
            style="color:#15a362;" data-replace="Enter message">

           <!-- onclick="<?php echo $td['id']; ?>" -->

            Enter Message</a>
            </li>
            <hr>
            <li style="list-style-type:none;">
            <div>
            <span>
            <?php echo $td['happynikah_id'];?>
            </span>
            </div>
            </li>
            <hr>
            <li style="list-style-type:none;">
            <div>
            <span>
                
                
            <?php if($td['reg_through']=='0')
            {?>
            <?php echo "Website";?>
            <?php }?>
            
            <?php if($td['reg_through']=='1')
            {?>
            <?php echo "Admin";?>
            <?php }?>
            
            <?php if($td['reg_through']=='2')
            {?>
            <?php echo "Mobile";?>
            <?php }?>
                                                
                                                
                                                
            </span>
            </div>
            </li>
            <!--<hr>-->
            <!--<li style="list-style-type:none;">-->
            <!--<a href="<?= base_url() ?>admin/profile/view/<?= $td['id']; ?>">View Details</a>-->
            <!--</li>-->
            <hr>
            <li style="list-style-type:none;">
            <!--  -->
            <a data-id="<?php echo $td['fid'];?>"  class="closefollowup">Close Follow up</a>
            
            </li>

   <!--  <p>This will be fade out after some time... <a href="" onclick="remove_cart('123')" id="id">test</a></p> -->



            </td>
            <td style="padding-top: 70px;">

          <!--   <li style="list-style-type:none;">
            <a href="#">Basic Details</a>
            </li> -->

            <li style="list-style-type:none;">
                
            <!--<a style="color:#15a362;" href="<?= base_url() ?>admin/profile/view/<?= $td['id']; ?>">Basic Details</a>-->
            
            <form method="post" action="<?= base_url() ?>admin/search_profiles">
            <div class="form-group">
            
            <input type="hidden" id="inputName" class="form-control" name="search_profile"  value="<?php echo $td['happynikah_id'] ?>"  required >
            <!--<span id="error" style="color:red;display:none;">Please insert Happynikah ID/Mobile No.</span>-->
            </div>
            </div>
            <div class="col-lg-6">
            <!-- <div class="form-group"> -->
            
            <label for="inputName">&nbsp;</label>
            <!-- <button onclick="search_profiles()" name="search_profile_btn" class="btn btn-success" style="margin-top: 32px;"> -->
            <button type="submit" name="search_profile_btn" class="btn btn-success" id="search_button"
            
            style="background: transparent;width: 114px;margin-left: -15px;color: #378fd3;">
            <!--<i class="fa-sharp fa-solid fa-share"></i>-->
            Basic Details
            </button>
            </form>
            </li>
             <hr>
             
             
          <!--   <li style="list-style-type:none;">
            <a href="#">Delete</a>
            </li> -->

            <li style="list-style-type:none;">
            <a class="asms" href="#"  data-id="<?php echo $td['id'];?>" 
            style="color:#15a362;" data-replace="Delete">
            Delete
            </a>
            </li>


            <hr>
            <li style="list-style-type:none;">
            <a  class="bbb"  data-id="<?php echo $td['id'];?>" onclick="blockprofile();"  data-replace="Block Profile">Block</a>
            </li>
            <hr>

            <!--<li style="list-style-type:none;">-->
            <!--<a href="#"  class="pp" style="color: red;" data-id="<?php echo $td['id'];?>">Postpone payment</a>-->
            <!--</li>-->
            </td>
            <td style="padding-top:120px;">
            <li style="list-style-type:none;">
            <div>
            <span>
            <?php echo $td['name'];?>
            </span>
            <br>
            <br>
            <span>
            <?php echo $td['age'];?>
            </span>
            <br>
            <br>
            <span>
            <?php 
            if ($td['gender'] == '1')
            {
            $gender = "Male";
            }
            else
            {
            $gender = "Female";
            }
            ?>

            <?php echo $gender;?>
            </span>
            </div>

            </li>

            </td>
            <td style="padding-top: 100px;">
            <li style="list-style-type:none;">
            <div>
                
                 <span>
            <?php $msg=$td['fmessage'];?>
            <?php echo $msg;?>

            </span>
            
            <br/>
            <span><b>
            <?php $msg=$td['fstatus'];?>
            <?php echo $msg;?>
         </b>
            </span>
            </div>
            <hr>
            <div>
            <span style="background-color:lightgreen;">
          

            <?php $old_date5= $td['followdate'];?>         
          

            <?php echo $old_date5;?>

            </span>
            </div>
            <hr>
            <div>
            <span>
            <!--<button class="btn btn-danger">-->
            <!--Paid-->
            <!--</button>-->
            
            <?php
            if ($td['status'] == '0') 
            {
            $status = "Pending";
            } 
            elseif ($td['status'] == '1')
            {
            $status = "Approved";
            } 
            elseif ($td['status'] == '2') 
            {
            $status = "Rejected";
            } 
            elseif ($td['status'] == '3') 
            {
            $status = "Deleted";
            }
            ?>
            <button class="btn btn-danger" style="color:#fff;">
            <!-- Paid -->
            <?php echo $status;?> 
            </button>
            
            
            </span>
            </div>
            </li>

            </td>
            <td>
            <li style="list-style-type:none;">
            <br>
            <br><br><br><br><br>
            <div>
            <span>
            <!-- parappanagadi, malappuram ,kerala , india -->
            <!-- <?php echo $td['address'];?> -->
            
            <!--<?php echo $td['cityname'];?>-->
              <?php echo $td['phone'];?>
            </div>
            </li>
            </td>
            </tr>
            <!-- next tr -->

         
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


            <!-- Modal for enter message -->
            
                <div class="modal fade" id="enterMessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">


                <h5 class="modal-title" id="exampleModalLongTitle">Enter Message

                <!--  <?php echo $this->session->userdata('user_id_admin');?>  -->
                
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>

                <form id="contact" method="post" action="<?php echo base_url();?>admin/pending_followup_register" onsubmit="setTimeout(function(){window.location.reload();},700);">

                <input type="hidden" name="eventId" id="eventId"/>
                <!-- <span id="idHolder"></span> -->
                <div class="modal-body">
                <div class="mb-3">
                <label for="inputName" class="form-label">Status</label>
                <select id="status" class="form-control custom-select" name="status" required  style="padding-bottom: 2px;">
               <option value="" selected disabled>--Please Select Status--</option>
                 <option value="Interested">Interested / Follow up</option>
                <option value="Ring">Ring not respond (RNR) </option>
                <option value="busy">Busy / call back</option>
                <option value="Add comments">Add Comments</option>
                <option value="Switched off">Switched off</option>
                <option value="Whatsapp connect">Whatsapp connect</option>
                 <option value="Marriage Fixed">Marriage Fixed</option>
                 <option value="Not Interested">Not Interested</option>
                 
                </select>
                </div>


                <div class="mb-3" id="follow">
                <label for="setting-input-3" class="form-label">Follow up date</label>          
                <input type="text" id="noSunday" name="fdate" required>
                </div>


                <!--<div class="mb-3" id="follow2" style="display:none">-->
                <!--<label for="setting-input-3" class="form-label">Follow up date</label>      -->
                <!--<input type="text" id="noSunday2" name="fdate">-->
                <!--</div>-->

                <div class="mb-3">
                <label for="inputName" class="form-label">Message</label>
                <textarea id="message" class="form-control" required  name="message" style="height: 160px;"></textarea>
                  
             

                </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close
                </button>
                <button type="submit"  id="save-project-btn3"  name="register" class="btn btn-primary" style="color: #fff;">Save changes</button>
                     
                </div>
                </div>
                </div>
                </form>
                </div>




        <form id="contact" method="post" action="<?php echo base_url(); ?>admin/closependingfollowup"  onsubmit="setTimeout(function(){window.location.reload();},800);">
           <div class="modal fade" id="deleteEmpModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
        
        <h5 class="modal-title" id="exampleModalLongTitle">
        Are You Sure want to close Followup ?
        
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
        


   


<!--    <form id="deleteEmpForm" method="post">-->
<!--    <div class="modal fade" id="deleteEmpModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">-->
<!--      <div class="modal-dialog" role="document">-->
<!--        <div class="modal-content">-->
<!--          <div class="modal-header">-->
<!--            <h5 class="modal-title" id="deleteModalLabel">Delete Customer</h5>-->
<!--            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">-->
<!--                <span aria-hidden="true">&times;</span>-->
<!--                </button>-->

<!--          </div>-->
<!--          <div class="modal-body">-->
<!--               <strong>Are you sure to delete this record?</strong>-->
<!--          </div>-->
<!--          <div class="modal-footer">-->
<!--            <input type="hidden" name="deleteEmpId" id="deleteEmpId" class="form-control">-->
<!--            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>-->
<!--            <button type="submit" class="btn btn-primary"  style="color:#fff;">Yes</button>-->
<!--          </div>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
<!--</form>-->



        <!-- modal for block -->
        <div class="modal fade" id="block_" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Block Profile</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        
        <form id="contact" method="post" action="<?php echo base_url(); ?>admin/block_profile_todayfollowup" onsubmit="setTimeout(function(){window.location.reload();},700);">
        
        
        <div class="modal-body">
        <div class="mb-3">
        
        <label for="inputName" class="form-label">Status</label>
        <select id="block_status" class="form-control custom-select" name="block_status" required>
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
        <textarea id="block_description" class="form-control" required name="block_description"  style="height: 100px;"></textarea>
        </div>
        </div>
        <div class="modal-footer">
        
        
        <input type="hidden" name="user_id2" id="user_id2">
        <input type="hidden" name="session" 
        value="<?php echo $this->session->userdata('user_id_admin');?>" id="session">
        
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btnblk_" id="btnblk_" style="color: #fff;">Save changes</button>
        </div>
        </div>
        </div>
        </form>
        </div>
        <!--End modal block-->
        
        
        <!--Payment Request-->
        
        <form id="contact" method="post" action="<?php echo base_url(); ?>admin/payment_request" onsubmit="setTimeout(function(){window.location.reload();},700);">
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
        <select id="plantype" class="form-control custom-select"  name="plantype" style="padding-bottom:6px;">
        <option value="" selected disabled>--Please Select Plan Type--</option>
        <option value="normal">Normal</option>
        <option value="premium">Premium</option>
        
        </select>
        </div>
        <div class="mb-3">
        <label for="inputName" class="form-label" style="color: black;">
        <b>Membership Plan</b></label>
        <select id="membership_plan" class="form-control custom-select" name="membership_plan">
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
        <label for="inputName" class="form-label" style="color: black;">
        <b>PostPone Date</b>
        </label>
        <input type="text" name="postpone_date"  id="postpone_date" class="form-control" required>
        </div>
        
        <div class="mb-3">
        <label for="inputName" class="form-label" style="color: black;">
        <b>Message</b></label>
        <textarea id="message" class="form-control"  required  name="message"  style="height: 100px;"></textarea>
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




        <form id="contactdelete" method="post" action="<?php echo base_url(); ?>admin/profile_delete" onsubmit="setTimeout(function(){window.location.reload();},700);">

            <div class="modal fade" id="deletecnt" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">
            Profile Delete</h5>

            <!--<form id="contact" method="post" action="<?php echo base_url(); ?>admin/todayfollowup_update">          -->

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
            <textarea id="message" class="form-control" required name="message"  style="height: 100px;"></textarea>
            </div>
            </div>
            <div class="modal-footer">

                 <input type="hidden" name="user_id" id="user_id">
       <input type="hidden" name="session" 
       value="<?php echo $this->session->userdata('user_id_admin');?>" id="session">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            Close
            </button>
            <button type="submit" class="btn btn-primary" style="color: #fff;">Save changes</button>
            </div>
           
            </div>
            </div>
            </div>
            </div>
            </form>
           <!-- end modal for Interest details  -->
            <?php include('footer.php'); ?>

           <script type="text/javascript">
               
            $(function() 
            {
            $("a[class='asm']").click(function() 
            {
            $("#enterMessage").modal("show");
            // var eventId = $(this).data('id');
            const eventId = $(this).attr('data-id');
            const field = $('#eventId');
            field.val(eventId);
            console.log(field[0]);          
            // $('#idHolder').html( eventId );
            return false;
            });
            });



            $(function() 
            {
            $("a[class='pp']").click(function() 
            {
            $("#postpone").modal("show");
            // var eventId = $(this).data('id');
            const payment_id = $(this).attr('data-id');
            const field = $('#payment_id');
            field.val(payment_id);
            console.log(field[0]);          
            // $('#idHolder').html( eventId );
            return false;
            });
            });
            

            $(function() {
            $(".validate").click(function() {
            var i = $(this).closest("tr").attr("id");
            $("#" + i).hide();
            var url = "<?php echo $_SERVER['PHP_SELF']; ?>";
            $.post(url, {
            id: i,
            });
            });
            });

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

             $(function() 
            {
            $("a[class='closefollowup']").click(function()
            {
         
            var empId = $(this).data('id');            
            $('#deleteEmpModal').modal('show');
            $('#deleteEmpId').val(empId);
            
            const user_id2 = $(this).attr('data-id');
            const field = $('#user_id2');
            field.val(user_id2);
            console.log(field[0]);
            return false;
            
            });
            });
            
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



            function remove_cart(itemid)
            {
            event.preventDefault();
            var btn = event.target;
            setTimeout(function() {
            $(btn)
            .closest("p")
            .fadeOut("fast");
            }, 100);
            }


            $(document).ready(function()
            {
            $(function() 
            {
            $("#my_date_picker").datepicker();
            });
            })

            $(document).ready(function () 
            {   
            // $('body').on('change','#status', function() 
            // $('#status').change(function() {
            // {
            // $('#show_only').val(this.value==);


            // var status=$("#status").val();
            // $( "#noSunday" ).datepicker({ 
            // beforeShowDay: noSunday,
            // maxDate: "+2d",
            // minDate:0
            // });

            // function noSunday(date)
            // { 
            // var day = date.getDay(); 
            // return [(day > 0), '']; 
            // }; 
            
            
            
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
			

            $("#noSunday").datepicker({ 
            beforeShowDay: noSunday,
            dateFormat: 'dd-mm-yy',
            maxDate: "+4d",
            minDate:0
            });

            function noSunday(date)
            { 
            var day = date.getDay(); 
            return [(day > 0), '']; 
            }; 


            $("#noSunday2").datepicker({ 
            beforeShowDay: noSunday2,
            dateFormat: 'dd-mm-yy',
            maxDate: "+4d",
            minDate:0
            });

            function noSunday2(date)
            { 
            var day = date.getDay(); 
            return [(day > 0), '']; 
            }; 
            });

            
          
        $('#deleteEmpForm').on('submit',function(){
        var empId = $('#deleteEmpId').val();
        $.ajax({
        type : "POST",
        url  : "delete_data",
        dataType : "JSON",  
        data : {id:empId},
        success: function(data){
        location.reload();
        $("#"+empId).remove();
        $('#deleteEmpId').val("");
        $('#deleteEmpModal').modal('hide');
        // listEmployee();
        }
        });
        return false;
        });



        $(function() 
        {
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

            <link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css' rel='stylesheet'>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" ></script>

            <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" ></script>

            <!-- jQuery -->
         <!--    <script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script> -->
            <!-- Bootstrap 4 -->
            <!-- <script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
            <!-- DataTables  & Plugins -->
            <script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
            <script src="<?php echo base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
            <script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
            <script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
            <!-- <script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
			<script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script> -->
            <!-- <script src="<?php echo base_url() ?>assets/plugins/jszip/jszip.min.js"></script>
            <script src="<?php echo base_url() ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
            <script src="<?php echo base_url() ?>assets/plugins/pdfmake/vfs_fonts.js"></script> -->
            <!-- <script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
			<script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
			<script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script> -->

            </html>