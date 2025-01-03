<!DOCTYPE html>
<html>
<?php include('include/user_header_gotonikah.php'); ?>

    <section id="userContent">
        <div class="container cpContent">
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-5 d-flex align-items-center">
                    <img src="<?php echo base_url() ?>assets/images/cp.png" alt="change Password" class="cpIcon mb-md-4">
                </div>
                <div class="col-12 col-md-1"></div>
                <div class="col-12 col-md-5 d-flex align-items-center">
                    <div class="w-100">
                        <h2>Change Password</h2>
                        
                        <?php $error="";
                        if($this->session->flashdata('pass_mismatch') != ''){ $error = 'Password and Confirm Password Mismatch'; }  ?>
                         <?php if($this->session->flashdata('pass_mismatch_old') != ''){ $error = 'Current Password Mismatch'; }  ?>
                         
                         
                         <?php if($error !=''){ ?>
                         
                         <p style="background: #ff000040; padding: 10px; color: #f10000; text-align: center;  border-radius: 8px" > <?php echo $error; ?> </p>
                         
                         <?php } ?>
                         
                         <?php if($this->session->flashdata('sucess') != ''){ ?>
                         <p style="background: #36f37040; padding: 10px; color: #0a8335; text-align: center;  border-radius: 8px" > <?php echo 'Sucessfully Updated the Password'; ?> </p>
                         <?php } ?>
                         
                        <p>Enter a new password below to change your password</p>
                        <form class="customForm" action="<?php echo site_url('user/changepassword_gotonikah'); ?>" method="post">
                            <div class="mb-3">
                                <label class="form-label">Current Password</label>
                                <input type="password" name="opassword" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">New Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Confirm New Password</label>
                                <input type="password" name="cpassword" class="form-control" required>
                            </div>
                            <div>
                                <button type="submit" class="btn cstmBtnColr">Change Password</button>
                            </div>
                        </form>
                    </div>                    
                </div>
                <div class="col-12 col-md-1"></div>
            </div>
        </div>
    </section>
    
    <!--<section id="userFooter">-->
    <!--    <div class="container">-->
    <!--        <div class="row">-->
    <!--            <div class="col-12 text-center">-->
    <!--                <p class="at">© 2022 happynikah All Rights Reserved</p>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->

    <?php include('include/footer_gotonikah.php'); ?>
    

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
        });
        
    </script>

</body>
</html>