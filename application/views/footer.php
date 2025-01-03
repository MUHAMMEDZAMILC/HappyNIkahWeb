<section id="footer">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 mb-5 mb-md-0">
                    <img src="<?php echo base_url() ?>assets/images/logo.png" alt="go to Nikah" width="auto" height="auto" class="flogo">
                    <p class="para1">Happy Nikah is an exclusive matrimonial website for Muslims to make happy lives. We are ready to help Muslims to find their suitable life partner in an Islamic way. Happynikah.com will make your matrimonial searches and online-match making a simple, easy and happy experience.</p>     </div>
                <div class="col-12 col-md-1">
                </div>
                <div class="col-12 col-md-3 mb-5 mb-md-0">
                    <h2>Quick Links</h2>
                    <ul class="flinks"> 
                        <li>
                            <a href="<?php echo site_url('user'); ?>">Register</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('user/about'); ?>">About Us</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('user/terms'); ?>">Terms of Use</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('user/privacy'); ?>">Privacy Policy</a>
                        </li>
                    </ul>
                </div>
                <div class="col-12 col-md-4">
                    <h2>Follow us</h2>
                    <ul class="socialIcons d-flex">
                        <li>
                            <a href="https://www.facebook.com/happynikahmatrimony">
                                <img src="<?php echo base_url() ?>assets/images/fb.png" alt="facebook" width="auto" height="auto" class="socialLoogo">
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/happynikahmatrimony/">
                                <img src="<?php echo base_url() ?>assets/images/instagram.png" alt="instagram" width="auto" height="auto" class="socialLoogo">
                            </a>
                        </li>
                       <!-- <li>
                            <a href="javascript:void(0)">
                                <img src="<?php echo base_url() ?>assets/images/twitter.png" alt="twitter" width="auto" height="auto" class="socialLoogo">
                            </a>
                        </li>-->
                        <li>
                            <a href="https://youtube.com/channel/UCbZ6wkcWuVxDBCDG5AGRvhQ">
                                <img src="<?php echo base_url() ?>assets/images/youtube.png" alt="youtube" width="auto" height="auto" class="socialLoogo">
                            </a>
                        </li>
                    </ul>
                    <h3>Download App</h3>
                    <div class="d-flex">
                        <a href="javascript:void(0)">
                            <img src="<?php echo base_url() ?>assets/images/appleStoreF.png" alt="appleStore" width="auto" height="auto" class="storeIcon me-3">
                        </a>
                        <a href="https://play.google.com/store/apps/details?id=com.sysol.happy_nikah">
                            <img src="<?php echo base_url() ?>assets/images/playStoreF.png" alt="playStore" width="auto" height="auto" class="storeIcon">
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <p class="at">© 2022 happynikah All Rights Reserved</p>
                </div>
            </div>
        </div>
    </section>


    <!-- login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="row">
                        <div class="col-12 col-lg-6 d-none d-lg-flex align-items-stretch">
                            <div class="leftBox w-100">
                                <h2 class="modalHead mb-4"id="loginModalLabel">Search Profiles<br><span>Anytime! Anywhere!!</span></h2>
                                <p class="lpone">Finding your perfect match has never been easier with the Happy nikah application</p>
                                <p class="lptwo">Download now and communicate with muslim matches on-the-go!</p>
                                <div class="d-flex justify-content-center">
                                    <a href="javascript:void(0)">
                                        <img src="<?php echo base_url() ?>assets/images/appleStore.png" alt="appleStore" class="storeIcon me-3" width="auto" height="auto">
                                    </a>
                                    <a href="https://play.google.com/store/apps/details?id=com.sysol.happy_nikah">
                                        <img src="<?php echo base_url() ?>assets/images/playStore.png" alt="playStore" class="storeIcon" width="auto" height="auto">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 d-flex align-items-stretch">
                            <div class="rbox w-100">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                <div class="d-flex justify-content-between mb-5">
                                    <h3 class="welcomeHead">Welcome Back!<br><span>Please Login</span></h3>
                                    <img src="<?php echo base_url() ?>assets/images/logo.png" alt="go to Nikah" class="llogo" width="auto" height="auto">
                                </div>
                                <div class="emailLogBox">
                                    <form class="customForm">
                                    <div class="mb-3" id="loginerror" style="display:none">
<font color="red">Invalid Username or Password..</font>                                        </div>
                                        <div class="mb-3">
                                            <input type="text" name="username_login" class="form-control"  id="username_login" placeholder="Username/email">
                                        </div>
                                        <div class="mb-3">
                                            <input type="password" name="password_login" class="form-control" id="password_login" placeholder="Password">
                                        </div>
                                        <p class="note">By continuing, you agree to Happy nikah's <a href="<?php echo site_url('user/terms'); ?>">Terms of Use</a> and <a href="<?php echo site_url('user/privacy'); ?>">Privacy Policy.</a></p>
                                        <button type="button" class="btn cstmBtnColr w-100" id="loginbtn" onclick="login()">Login</button>
                                        <p class="orTxt">OR</p>
                                        <button type="button" class="btn w-100 mb-3 loginOtpBtn">OTP Login</button>
                                    </form>
                                </div>
                                <div class="otpLogBox" style="display:none;" >
                                    <form class="customForm" id="otplogin">
                                    <div class="d-flex">
                                        <select name="otpcountryCode" id="otpcountryCode" class="form-control phoneSelect" required>
                                            <option value="">ISD</option>
                                        <?php
                                        foreach($countryCode as $val){
                                            if($val['country_order'] != '0'){?>
                                            <option value="<?= $val['country_code'];?>"><?= "+".$val['country_code'];?></option>
                                        <?php }}?>
                                     </select>

                                        <input type="text" class="form-control" placeholder="Mobile Number" id="otpmobile" name="otpmobile" maxlength="10" onkeypress="return event.charCode > 47 && event.charCode < 58;" >
                                    </div>
                                    <span id="otpmobilecode_val" class="validationclass" style="color: red;font-size: 15px;"></span>    

                                        <div class="mb-3">
                                           
                                        <p class="note">By continuing, you agree to Happy nikah's <a href="<?php echo site_url('user/terms'); ?>">Terms of Use</a> and <a href="<?php echo site_url('user/privacy'); ?>">Privacy Policy.</a></p>
                                        <button type="button" class="btn cstmBtnColr sendOtp w-100" onclick="otplogin()">Send OTP</button>
                                        <p class="orTxt">OR</p>
                                        <button type="button" class="btn w-100 mb-3 loginEmailBtn">Email Login</button>
                                            </div>
                                    </form>
                                </div>
                                <div class="otpsendBox" style="display:none;" >
                                    <form class="customForm">
                                        <div class="mb-3">
                                            <label class="form-label">Enter Your OTP</label>
                                            <div class="otpInputs">
                                                <input type="text" id="verify7" class="form-control" maxlength="1" onkeyup="tabChange(this,'verify8')" />
                                                <input type="text" id="verify8" class="form-control" maxlength="1" onkeyup="tabChange(this,'verify9')" />
                                                <input type="text" id="verify9" class="form-control" maxlength="1" onkeyup="tabChange(this,'verify10')" />
                                                <input type="text" id="verify10" class="form-control" maxlength="1" onkeyup="tabChange(this,'verify11')" />
                                                <input type="text" id="verify11" class="form-control" maxlength="1" onkeyup="tabChange(this,'verify12')" />
                                                <input type="text" id="verify12" class="form-control" maxlength="1"  />
                                            </div>
                                        </div>
                                        <button type="button" class="btn cstmBtnColr w-100" onclick="verify_mobile_forlogin()">Submit</button>
                                        <p class="note text-center mb-1"><a href="javascript:void(0)">Send the Code Again</a></p>
                                        <p class="note text-center mb-4"><a href="javascript:void(0)">Change Mobile Number/Emial</a></p>
                                        <button type="button" class="btn w-100 mb-3 loginEmailBtn">Email Login</button>
                                    </form>
                                    <span id="userexist_val" class="validationclass" style="color: red;font-size: 15px;"></span>    

                                </div>
                                <div class="d-flex justify-content-between mb-3">
                                    <a href="javascript:void(0)" class="regWtFb">
                                        <img src="<?php echo base_url() ?>assets/images/fb2.png" alt="facebook" width="auto" height="auto">
                                        <span>Facebook</span>
                                    </a>
                                    <a href="javascript:void(0)" class="regWtgoogle">
                                        <img src="<?php echo base_url() ?>assets/images/google.png" alt="google" width="auto" height="auto">
                                        <span>Google</span>
                                    </a>
                                </div>
                                <p class="text-center newtoTxt">New to Happy Nikah <a href="<?php echo site_url('user'); ?>">Register Now</a></p>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/bootstrap.bundle.min.js"></script>

    <script src="<?php echo base_url(); ?>/assets/js/owl.carousel.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            // partner slider
            $(".owl-partner").owlCarousel({
                margin: 25,
                responsiveClass: true,
                nav: false,
                dots: false,
                autoplay: true,
                autoplayHoverPause: false,
                loop:true,
                responsive: {
                    0: {
                        items: 1.2,
                    },
                    576: {
                        items: 1.5,
                    },
                    768: {
                        items: 2.2,
                    },
                    992: {
                        items: 2.5,
                    },
                    1200: {
                        items: 3.2,
                    },
                    1400: {
                        items: 3.5,
                    }
                },
            });
            // partner slider end

            // burger menu
            $(".hamburger").click(function(){
                $(this).toggleClass("is-active");
                $('body').toggleClass("is-scroll-disabled");
            });
            // burger menu end

            // login with otp and email switch
            $(".loginOtpBtn").click(function(){
                $(".emailLogBox").hide();
                $(".otpLogBox").show();
            }); 
            $(".loginEmailBtn").click(function(){
                $(".otpLogBox").hide();
                $(".emailLogBox").show();
            });
          //  $(".sendOtp").click(function(){
          //      $(".otpLogBox").hide();
          //      $(".otpsendBox").show();
          //  });

            // partner slider
            $(".owl-userTalk").owlCarousel({
                margin: 25,
                responsiveClass: true,
                nav: false,
                dots: true,
                autoplay: true,
                autoplayHoverPause: true,
                loop:false,
                responsive: {
                    0: {
                        items: 1,
                    },
                    576: {
                        items: 1,
                    },
                    767: {
                        items: 2,
                    }
                },
            });
            // partner slider end

        });
        function login(){
            alert(<?php echo base_url();?>);
    
        
    
    } 
    function otplogin()
    {
       
        if($("#otpmobile").val()=="" || $("#otpcountryCode").val()=="")
        {
            $('#otpmobilecode_val').html('Field Required');  

        }
      
        else{
            $('#otpmobilecode_val').html('');  
        }
        var code=$("#otpcountryCode").val();
        var mobile=$("#otpmobile").val();
        if(code!="" && mobile!="")
        {
            
            $('#otpmobile_val').html('');  
        $.ajax({
        url: "<?php echo site_url('user/otplogin'); ?>",
        type: "post",
        data: { code:code,mobile:mobile,},
        success: function (response) {
            alert(response);
       
           // You will get response from your PHP page (what you echo or print)
        },
        // error: function(jqXHR, textStatus, errorThrown) {
        //   console.log(textStatus, errorThrown);
        // }
        });
        }
    }
    function verify_mobile_forlogin(){
        
        var otpdigit1 = $('#verify7').val();
        var otpdigit2 = $('#verify8').val();
        var otpdigit3 = $('#verify9').val();
        var otpdigit4 = $('#verify10').val();
        var otpdigit5 = $('#verify11').val();
        var otpdigit6 = $('#verify12').val();
        
        $.ajax({
            url: "<?php echo base_url();?>index.php/user/verify_mobile?currentpage=1",
            type: "post",
            data: { otpdigit1:otpdigit1,otpdigit2:otpdigit2,otpdigit3:otpdigit3,otpdigit4:otpdigit4,otpdigit5:otpdigit5,otpdigit6:otpdigit6},
            success: function (response) {
                console.log(response);
                if(response == 1){
                    $('.errorotplogin').html('OTP Verified');
                    $('.errorotplogin').css('color','green');
                window.location.href = "<?php echo site_url('user/registration_steptwo?currentpage=1'); ?>";

             }
             else if(response==2)
             {
                $('.errorotplogin').html('OTP Verified');
                    $('.errorotplogin').css('color','green');
                window.location.href = "<?php echo site_url('user/registration_stepthree?currentpage=1'); ?>";

             }
             else if(response==3)
             {
                $('.errorotplogin').html('OTP Verified');
                    $('.errorotplogin').css('color','green');
                window.location.href = "<?php echo site_url('user/registration_stepfour?currentpage=1'); ?>";

             }
             else if(response==4)
             {
                $('.errorotplogin').html('OTP Verified');
                    $('.errorotplogin').css('color','green');
                window.location.href = "<?php echo site_url('user/home'); ?>";

             }
             else if(response == 6){ 
                               
                $('#loginerror').show();
                
                $('#loginbtn').html('Login');
            }else{
                
                window.location.href = "<?php echo site_url('user/registration_step1?currentpage=1'); ?>";
            }
                if(response == 1)
                {
                    $('.errorotplogin').html('OTP Verified');
                    $('.errorotplogin').css('color','green');
                    // window.location.href = "<?php echo base_url();?>index.php/user/registration_steptwo?currentpage=1";
                    setTimeout(function() {
                        window.location.href = "<?php echo base_url();?>index.php/user/congratulations";
                    }, 1500);
                }
                else
                {
                    $('.errorotplogin').html('Invalid OTP');
                }
                
            },
        });
        
    }
    </script>

  