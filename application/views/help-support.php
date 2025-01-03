<!DOCTYPE html>
<html>
<?php include('include/user_header.php'); ?>


    <section id="userContent">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-5 col-lg-4">
                <?php include('include/user_info.php'); ?>
            <?php include('include/side_menu.php'); ?>
                   <!-- <div class="enrollBox mb-5">
                        <img src="images/enrollImg.jpg" class="enrollImg">
                        
                        <div class="contentBox">
                            <p class="enrollPara">Enroll for the assisted services &amp; enjoy personalized matchmaking</p>
                            <button type="button" class="enrollBtn">Enroll Now</button>
                        </div>
                    </div>-->
                </div>
                <div class="col-12 col-md-7 col-lg-8">
                    <!-- help and support -->
                    <div class="helpSupport mb-4">
                        <h2>Help Center  
                            <?php $user_id_new=$this->session->userdata('user_id');?>
                                <!-- <?php echo $user_id_new;?> -->
                            </h2>
                        <div class="row">
                            <div class="col-12 col-lg-6 mb-3">
                                <p>if you need any help from Happy Nikkah Customer side, Please reach our customer care executive</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-xl-8">
                                <div class="row mb-5 mb-xl-4">
                                    <div class="col-12 col-lg-5 mb-3 mb-lg-0 d-flex align-items-center">
                                        <div class="d-flex align-items-center">
                                            <img src="<?php echo base_url() ?>assets/images/phone.png" class="helpTypeIcon">
                                            <span class="helpTypeLabel">Voice Support</span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-7 d-flex align-items-center">
                                        <a href="tel:+91 8089809394" class="d-flex align-items-center justify-content-between linkBtn">
                                            <span>Call Now</span>
                                            <span>+91-8593999888</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="row mb-5 mb-xl-4">
                                    <div class="col-12 col-lg-5 mb-3 mb-lg-0 d-flex align-items-center">
                                        <div class="d-flex align-items-center">
                                            <img src="<?php echo base_url() ?>assets/images/phone.png" class="helpTypeIcon">
                                            <span class="helpTypeLabel">WhatsApp</span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-7 d-flex align-items-center">
                                        <a href="https://wa.me/+91 8089809394" class="d-flex align-items-center justify-content-between linkBtn">
                                            <span>Message</span>
                                            <span>+91-8593999888</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="row mb-5 mb-xl-4">
                                    <div class="col-12 col-lg-5 mb-3 mb-lg-0 d-flex align-items-center">
                                        <div class="d-flex align-items-center">
                                            <img src="<?php echo base_url() ?>assets/images/mail.png" class="helpTypeIcon">
                                            <span class="helpTypeLabel">Mail Us</span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-7 d-flex align-items-center">
                                        <a href="tel:+91 8089809394" class="d-flex align-items-center justify-content-between linkBtn">
                                            <span>Mail us</span>
                                            <span>info@happynikah.com</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-4">
                                
                                <!--<a href="https://tawk.to/chat/63d6e822c2f1ac1e20303d20/1gnvpgd3q">-->
                                
                                <!--<a href="https://tawk.to/chat/64a28395cc26a871b025fdcb/1h4dd412q">-->
                                <a href="https://tawk.to/chat/64a299b7cc26a871b0260336/1h4digu1e">
                                    
                                <button class="btn chatPaymentSupportBtn mb-4" type="button">
                                    <img src="<?php echo base_url() ?>assets/images/Chat1.svg" class="helpTypeIcon">
                                    <span>Chat Support</span>
                                </button>
                                </a>
                                
                                <a href="<?php echo base_url();?>upgradeto_premium">
                                    
                                    <!--user/upgradeto_premium-->
                                    
                                    <button class="btn chatPaymentSupportBtn" type="button">
                                    <img src="<?php echo base_url() ?>assets/images/paymentSupport.svg" class="helpTypeIcon">
                                    <span>Payment Support</span>
                                    </button>
                                
                                </a>
                                
                            </div>
                        </div>
                        
                        
                    </div>
                    <!-- app adv -->
                    <div class="appAdvBox2">
                        <div class="row">
                            <div class="col-12 col-lg-6 d-flex align-items-center mb-4 mb-lg-0">
                                <div class="w-100">
                                    <h2 class="subHead mb-4">Search Profiles<br><span>Anytime! Anywhere!!</span></h2>
                                    <p class="pOne">Finding your perfect match has never been easier with the Happy nikah application</p>
                                    <p class="pTwo">Download now and communicate with muslim matches on-the-go!</p>
                                    <div class="row">
                                        <div class="col-6 col-sm-6 d-flex align-items-center justify-content-center">
                                            <a href="javascript:void(0)">
                                                <img src="<?php echo base_url() ?>assets/images/appleStore.png" alt="appleStore" class="storeIcon" width="auto" height="auto">
                                            </a>
                                        </div>
                                        <div class="col-6 col-sm-6 d-flex align-items-center justify-content-center">
                                            <a href="https://play.google.com/store/apps/details?id=com.sysol.happy_nikah">
                                                <img src="<?php echo base_url() ?>assets/images/playStore.png" alt="playStore" class="storeIcon" width="auto" height="auto">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 d-flex align-items-center ">
                                <div class="w-100">
                                    <img src="<?php echo base_url() ?>assets/images/appMob1.png" class="mobAppIcon">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- enroll button -->
                  <!--  <div class="enrollBox2 mb-5 d-sm-flex d-md-block d-lg-flex align-items-stretch">
                        <div class="contentBox">
                            <p class="enrollPara">Enroll for the assisted services &amp; enjoy personalized matchmaking</p>
                            <button type="button" class="enrollBtn">Enroll Now</button>
                        </div>
                        <div class="imgBox">
                            <img src="<?php echo base_url() ?>assets/images/enrollImg.jpg" class="enrollImg d-sm-none d-md-block d-lg-none">
                            <img src="<?php echo base_url() ?>assets/images/enrollImg.png" class="enrollImg d-none d-sm-block d-md-none d-lg-block">
                        </div>
                    </div>-->
                </div>
            </div>
        </div>
    </section>
    
  
    
    
      <?php include('include/footer.php'); ?>
      

    <!-- delete profile Modal -->
    <div class="modal fade" id="proDelModal" tabindex="-1" aria-labelledby="proLockModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body p-4">
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                    <form class="customForm">
                        <div class="mb-3">
                            <select class="form-select" aria-label="Default select example">
                              <option selected>Select Reason</option>
                              <option value="1">I found my match on Happy Nikkah</option>
                              <option value="2">I found my match on other sites</option>
                              <option value="3">Taking a break</option>
                              <option value="4">I am unhappy with my experience on Happy Nikkah</option>
                              <option value="5">Other Reason</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <textarea class="form-control" rows="4"></textarea>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <button type="button" class="btn cancelBtn" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn cstmBtnColr" data-bs-dismiss="modal" onclick="window.location.href='index.html'">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<!--Start of Tawk.to Script-->




    <script type="text/javascript">
    // var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    // (function(){
    // var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    // s1.async=true;
    // s1.src='https://embed.tawk.to/63d6e822c2f1ac1e20303d20/1gnvnli18';
    // s1.charset='UTF-8';
    // s1.setAttribute('crossorigin','*');
    // s0.parentNode.insertBefore(s1,s0);
    // })();
    </script>
    
    
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/64a299b7cc26a871b0260336/1h4digu1e';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
    
    
    
<!--End of Tawk.to Script-->
    

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