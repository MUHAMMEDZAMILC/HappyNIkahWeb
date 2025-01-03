<!DOCTYPE html>
<html>
<?php include('include/user_header_gotonikah.php'); ?>


    <section id="userContent">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-5 col-lg-4">
                <?php include('include/user_info_gotonikah.php'); ?>
            <?php include('include/side_menu_gotonikah.php'); ?>

                </div>
                <div class="col-12 col-md-7 col-lg-8">
                    <!-- account settings -->
                    <div class="row">
                        <div class="col-12 col-lg-6 mb-4">
                            <div class="AccSettingsBox">
                                <h2>Notification Alert</h2>
                                <form class="customForm px-3">
                                    <div id="alert_val"></div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" id="emailCheck" onclick="add_alertvalues()" <?php if(in_array(1,$alert_data)){?>checked<?php }?>>
                                        <label class="form-check-label" for="emailCheck">Email Alert</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="2" id="SMSCheck" onclick="add_alertvalues()" <?php if(in_array(2,$alert_data)){?>checked<?php }?>>
                                        <label class="form-check-label" for="SMSCheck">SMS Alert</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="3" id="notificationCheck" onclick="add_alertvalues()" <?php if(in_array(3,$alert_data)){?>checked<?php }?>>
                                        <label class="form-check-label" for="notificationCheck">Notification Alert</label>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                        <div class="col-12 col-lg-6 mb-4">
                        <div class="AccSettingsBox">
                        <h2>Profile Hide/Unhide</h2>
                        <form class="customForm px-3 mb-5">
                        <?php foreach($hide_data as $val)
                        { 
                        $hide_status=$val->hide_status;
                        }
                        ?>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="profileHideUnhide" id="profileHide" value="1" <?php if($hide_status==1){?>checked<?php }?>>
                        <label class="form-check-label" for="profileHide">Hide</label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="profileHideUnhide" id="profileUnhide" value="0" <?php if($hide_status==0){?>checked<?php }?>>
                        <label class="form-check-label" for="profileUnhide">Unhide</label>
                        </div>
                        </form>
                        
                        <?php if(empty($delete_data))
                        {?>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#proDelModal" class="btn delProfileBtn" style="border: 1px solid #5aba47;color:#5aba47;">
                        Delete My profile</button>
                        <?php }
                        
                        else
                        {?>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#proDelModal" class="btn delProfileBtn" style="color:green;border-color:green;">Delete Request Sent</button>
                        
                        <?php }?>
                        </div>
                        </div>
                        </div>
                        
                        
                    <!-- app adv -->
                    <div class="appAdvBox2" style="background: transparent linear-gradient(91deg, #6fc95ea3 0%, #5aba47 100%) 0% 0% no-repeat padding-box;padding: 50px 70px 0;padding-bottom:50px;">
                        <div class="row">
                            <div class="col-12 col-lg-6 d-flex align-items-center mb-4 mb-lg-0">
                                <div class="w-100">
                                    <h2 class="subHead mb-4">Search Profiles<br><span style="color:#fff;">Anytime! Anywhere!!</span></h2>
                                    <p class="pOne">Finding your perfect match has never been easier with the Goto nikah application</p>
                                    <p class="pTwo">Download now and communicate with muslim matches on-the-go!</p>
                                    <div class="row">
                                        <div class="col-6 col-sm-6 d-flex align-items-center justify-content-center">
                                            <a href="javascript:void(0)">
                                                <img src="<?php echo base_url() ?>assets/images/appleStore.png" alt="appleStore" class="storeIcon" width="auto" height="auto">
                                            </a>
                                        </div>
                                        <div class="col-6 col-sm-6 d-flex align-items-center justify-content-center">
                                            <a href="https://play.google.com/store/apps/details?id=com.sysol.goto_nikah">
                                                <img src="<?php echo base_url() ?>assets/images/playStore.png" alt="playStore" class="storeIcon" width="auto" height="auto">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 d-flex align-items-center ">
                                <div class="w-100">
                                    <img src="<?php echo base_url() ?>assets/images/Mobile_single.png" class="mobAppIcon">
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </section>
    
        <?php include('include/footer_gotonikah.php'); ?>
        
        <style>
        .customForm .form-check-input:checked 
        {
        background-color: #5aba47;
        border-color: #5aba47;
        }
        </style>
        
    <!-- delete profile Modal -->
    <div class="modal fade" id="proDelModal" tabindex="-1" aria-labelledby="proLockModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body p-4">
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="float: right;margin-bottom: 15px;">
                         
                         
                     </button> 

                    <form class="customForm">
                        <div id="delete_val"></div>
                        <div class="mb-3">
                            <select class="form-select" aria-label="Default select example" name="reason" id="reason">
                              <option vaue="">Select Reason</option>
                              <option value="1">I found my match on Happy Nikkah</option>
                              <option value="2">I found my match on other sites</option>
                              <option value="3">Taking a break</option>
                              <option value="4">I am unhappy with my experience on Happy Nikkah</option>
                              <option value="5">Other Reason</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <textarea class="form-control" rows="4" name="comments" id="comments"></textarea>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <button type="button" class="btn cancelBtn" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn cstmBtnColr"  onclick="send_deleterequest()">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    

    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/bootstrap.bundle.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            // burger menu
            $(".hamburger").click(function(){
                $(this).toggleClass("is-active");
                $('body').toggleClass("is-scroll-disabled");
            });
            // burger menu end

            $('input[name="profileHideUnhide"]').change(function() {
                var radioVal = $('input[name="profileHideUnhide"]:checked').val();
    $.ajax({
        url: "<?php echo site_url('user/hide_profile'); ?>",
        type: "post",
        data: { hide_status:radioVal,},
        success: function (response) {
        alert("Success");
           // You will get response from your PHP page (what you echo or print)
        },
        // error: function(jqXHR, textStatus, errorThrown) {
        //   console.log(textStatus, errorThrown);
        // }
        });
            });
            
        });
      function send_deleterequest()
      {
        
        var reason=$('#reason').val();
        var comments=$('#comments').val();
        if(reason=="" || comments=="")
        {
            $('#delete_val').html('<font color="red" >All Fields are Required</font>'); 
        }
        if(reason!="" && comments!="")
        {        $.ajax({
        url: "<?php echo site_url('user/delete_profile'); ?>",
        type: "post",
        data: { reason:reason,comments:comments,},
        success: function (response) {
            $('#delete_val').html('<font color="green" >Delete Request has been sent Successfully..</font>'); 
            $('#reason').val('');
            $('#comments').val('');
           // $('.cancelBtn').trigger('click');
           // You will get response from your PHP page (what you echo or print)
        },
        // error: function(jqXHR, textStatus, errorThrown) {
        //   console.log(textStatus, errorThrown);
        // }
        });
      }  }
     function add_alertvalues(){
        var val = [];
        $(':checkbox:checked').each(function(i){
          val[i] = $(this).val();
         
        });
        $.ajax({
        url: "<?php echo site_url('user/add_useralerts'); ?>",
        type: "post",
        data: { val:val,},
        success: function (response) {
            $('#alert_val').html('<font color="green" >Notification Alerts Updated Successfully..</font>'); 
               },
       
        });
      }
    </script>

</body>
</html>