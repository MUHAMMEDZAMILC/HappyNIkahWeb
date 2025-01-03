<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <title>Happy Nikah</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" sizes="32x32" href="favicon.ico">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@300;400;500;600;700;900&family=Poppins:wght@300;400;500;600;700;800;900&family=Roboto:wght@400;@500&display=swap" rel="stylesheet"> 

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css?v=<?= rand(10,100);?>">
    
    <style type="text/css">
        .validationclass{
                color: red;
                font-size: 12px;
                padding: 5px 2px;
        }
        .otpInputs{
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            align-content: space-around;
            justify-content: space-evenly;
        }
        .errorotp{
             text-align: center;
             color: red;
             background: #ff00000f;
             padding: 5px;
        }
 .already-member{
    float: left;
    width: 89px;
    font-size: 10px;
    color: white;
        }
        .loginbtn{
    background: #fdfdfdad;
    width: 90px;
    margin-left: 8px;
    padding: 2px 0px;
     
        }
        
   #banner .overlay{
       background-color: rgb(253 232 232 / 0%);
   }     
   
   #banner .bannerPara {
    background: #ffffff38;
    padding: 15px 4px;
   }
@media only screen and (max-width: 600px) {
    .already-member{
        float: left;
        width: 89px;
        font-size: 10px;
        color: white;
    }
    .loginbtn{
        background: #fdfdfdad;
        width: 60px;
        margin-left: 8px;
        padding: 2px 0px;
        font-size: 12px;
    }
}
    </style>
</head>
<body>
    <section id="header">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="<?php echo base_url(); ?>">
                    <img src="<?php echo base_url() ?>assets/images/HappyNikkahwhite.png" alt="Go to Nikah" width="auto" height="auto" class="gotoNikahlogo">
                </a>
                 <a href="<?php echo base_url(); ?>"><button class="btn bthBtn" type="button">Back to Home</button></a>
            </div>
        </nav>
    </section>
    <section id="registerPage" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8 col-lg-6 mx-auto text-center">
                    <img src="<?php echo base_url() ?>assets/images/congrtsIcon.png" class="congrtsIcon" alt="Congratulations" width="auto" height="auto">
                    <h2 class="congrtsHead">Congratulations !</h2>
                    <p class="congrtsPara mb-4">Your profile has been successfully Created. You will redirected to Home page.</p>
                    <p class="congrtsPara mb-4">Your registration will be effective only after admin approval. Username and password will be send to you via SMS.</p>
                    <button class="btn cstmBtnColr" type="button" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                </div>
            </div>
        </div>
    </section>
    <section id="footer">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 mb-5 mb-md-0">
                    <img src="<?php echo base_url() ?>assets/images/HappyNikah.png" alt="go to Nikah" width="auto" height="auto" class="flogo">
                    <p class="para1" style="">Happy Nikah is an exclusive matrimonial website for Muslims to make happy lives.
We are ready to help Muslims to find their suitable life partner in an Islamic way.
<!--We do not support anything against Islamic law,-->
<!--Only matured Muslim men and women with an intention of marriage are allowed to register at-->
<!--Happynikah.com.-->
Happynikah.com will make your matrimonial searches and online-match making a simple, easy and
happy experience.</p>
                </div>
                <div class="col-12 col-md-1">
                </div>
                <div class="col-12 col-md-3 mb-5 mb-md-0">
                    <h2>Quick Links</h2>
                    <ul class="flinks"> 
                        <li>
                            <a href="<?php echo site_url('user/registration_step1'); ?>">Register</a>
                        </li>
                        <li>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#aboutModal">About Us</a>
                        </li>
                        <li>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal">Terms of Use</a>
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
                            <a href="https://www.facebook.com/happy.nikah.muslim.matrimony/">
                                <img src="<?php echo base_url() ?>assets/images/fb.png" alt="facebook" width="auto" height="auto" class="socialLoogo">
                            </a>
                        </li>
                        <li>
                            <a href="https://instagram.com/happy_nikah?igshid=YmMyMTA2M2Y=">
                                <img src="<?php echo base_url() ?>assets/images/instagram.png" alt="instagram" width="auto" height="auto" class="socialLoogo">
                            </a>
                        </li>
                        <!--<li>-->
                        <!--    <a href="javascript:void(0)">-->
                        <!--        <img src="<?php echo base_url() ?>assets/images/twitter.png" alt="twitter" width="auto" height="auto" class="socialLoogo">-->
                        <!--    </a>-->
                        <!--</li>-->
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
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true" <?php if($_GET['error'] == 1) { echo 'style="display:block; opacity:1;"'; }?>>
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="row">
                        <div class="col-12 col-lg-6 d-none d-lg-flex align-items-stretch">
                            <div class="leftBox w-100">
                                <h2 class="modalHead mb-4"id="loginModalLabel">Search Profiles<br><span>Anytime! Anywhere!!</span></h2>
                                <p class="lpone">Finding your perfect match has never been easier without the Happynikah application</p>
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
                                    <img src="<?php echo base_url() ?>assets/images/HappyNikah.png" alt="go to Nikah" class="llogo" width="auto" height="auto">
                                </div>
                                <div class="emailLogBox">
                                   
                                        <div class="mb-3">
                                            <input type="text" id="username_login" class="form-control" placeholder="User ID/Mobile Number">
                                        </div>
                                        <div class="mb-3">
                                            <input type="password" id="password_login" class="form-control" placeholder="Password">
                                        </div>
                                        
                                       
                                        <p id="loginerror" style="color: red; text-align: center; display:none;">Username or Password incorrect</p>

                                        
                                        <p class="text-right forgot"><a onclick="forgotpassword()" style="cursor: pointer; width:100%; float:right; text-align: right!important;">Forgot Password?</a></p>
                                        <p class="note">By continuing, you agree to Happynikah's <a data-bs-toggle="modal"  data-bs-target="#termsModal" href="#">Terms and Condition</a> and <a href="#" data-bs-toggle="modal"  data-bs-target="#termsModal">Privacy Policy.</a></p>
                                        <a href="#" class="btn cstmBtnColr w-100" onclick="login()" id="loginbtn">Login</a>
                                        <!-- <p class="orTxt">OR</p>
                                        <button type="button" class="btn w-100 mb-3 loginOtpBtn">OTP Login</button> -->
                                    
                                </div>
                                <div class="resetpwdLogBox" style="display:none;" >
                                    <p>Enter your registered Mobile Number here to get New Password</p>
                                    <!--<form class="customForm">-->
                                        <div>
                                            <select name="countryCode" id="countryCode1" class="form-control code-country" required="" style="margin-top: 0px;">
                                                <option value="91">+91</option>
                                                <option value="973">+973</option>
                                                <option value="965">+965</option>
                                                <option value="968">+968</option>
                                                <option value="974">+974</option>
                                                <option value="966">+966</option>
                                                <option value="971">+971</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <input type="number" id="resetmobilenumber" name="" class="form-control" placeholder="Mobile Number" style="padding-left: 70px;">
                                            
                                            
                                        </div>
                                        <p class="note">By continuing, you agree to Happynikah's <a href="#" data-bs-toggle="modal"  data-bs-target="#termsModal">Terms and Condition</a> and <a href="<?php echo site_url('user/privacy'); ?>">Privacy Policy.</a></p>
                                        <button type="button" class="btn cstmBtnColr sendOtp w-100" onclick="sendpassword()">Send OTP</button>
                                        <p class="orTxt">OR</p>
                                        <button type="button" class="btn w-100 mb-3 loginEmailBtn"> Login by Mobile and Password</button>
                                    <!--</form>-->
                                </div>
                                <div class="Resetpasswordtab" style="display:none;" >
                                    <p>Enter New Password</p>
                                    <!--<form class="customForm">-->
                                        <div class="mb-3">
                                            <input type="text" id="passwordreset" name="" class="form-control" placeholder="Password">
                                            <br>
                                            <input type="text" id="confirmpasswordreset" name="" class="form-control" placeholder="Confirm Password">
                                             
                                            
                                        </div>
                                        <p class="note">By continuing, you agree to Happynikah's <a href="#" data-bs-toggle="modal"  data-bs-target="#termsModal">Terms and Condition</a> and <a href="#">Privacy Policy.</a></p>
                                        <button type="button" class="btn cstmBtnColr sendOtp w-100" onclick="changepassword()">Change Password</button>
                                        <p class="orTxt">OR</p>
                                        <button type="button" class="btn w-100 mb-3 loginEmailBtn"> Login by Mobile and Password</button>
                                    <!--</form>-->
                                </div>
                                <div class="otpLogBox" style="display:none;" >
                                    <!--<form class="customForm">-->
                                        <div class="mb-3">
                                            <input type="text" name="" class="form-control" placeholder="Mobile Number/Email">
                                        </div>
                                        <p class="note">By continuing, you agree to Happynikah's <a href="#" data-bs-toggle="modal"  data-bs-target="#termsModal">Terms and Condition</a> and <a href="<?php echo site_url('user/privacy'); ?>">Privacy Policy.</a></p>
                                        <button type="button" class="btn cstmBtnColr sendOtp w-100">Send OTP</button>
                                        <p class="orTxt">OR</p>
                                        <button type="button" class="btn w-100 mb-3 loginEmailBtn">Email Login</button>
                                    <!--</form>-->
                                </div>
                                <div class="otpsendBox" style="display:none;" >
                                    <!--<form class="customForm">-->
                                        <div class="mb-3">
                                            <label class="form-label">Enter Your OTP</label>
                                            <div class="otpInputs">
                                                <input id="otpdigit1" type="number" class="form-control" maxlength="1" onkeyup="tabChange(this,'otpdigit2')" autofocus style="width: 40px;"/>
                                                <input id="otpdigit2" type="number" class="form-control" maxlength="1" onkeyup="tabChange(this,'otpdigit3')" style="width: 40px;"/>
                                                <input id="otpdigit3" type="number" class="form-control" maxlength="1" onkeyup="tabChange(this,'otpdigit4')" style="width: 40px;"/>
                                                <input id="otpdigit4" type="number" class="form-control" maxlength="1" onkeyup="tabChange(this,'otpdigit5')" style="width: 40px;"/>
                                                <input id="otpdigit5" type="number" class="form-control" maxlength="1" onkeyup="tabChange(this,'otpdigit6')" style="width: 40px;"/>
                                                <input id="otpdigit6" type="number" class="form-control" maxlength="1"  style="width: 40px;"/>
                                            </div>
                                        </div>
                                        <p class="errorotp"></p>
                                        <button type="button" class="btn cstmBtnColr w-100" onclick="verifyotp()">NEXT</button>
                                        <!--<p class="note text-center mb-1"><a href="javascript:void(0)">Send the Code Again</a></p>-->
                                        <!--<p class="note text-center mb-4"><a href="javascript:void(0)">Change Mobile Number/Emial</a></p>-->
                                        <button type="button" class="btn w-100 mb-3 loginEmailBtn">Login by Mobile and Password</button>
                                    <!--</form>-->
                                </div>
                                <!-- <div class="d-flex justify-content-between mb-3">
                                    <a href="javascript:void(0)" class="regWtFb">
                                        <img src="<?php echo base_url() ?>assets/images/fb2.png" alt="facebook" width="auto" height="auto">
                                        <span>Facebook</span>
                                    </a>
                                    <a href="javascript:void(0)" class="regWtgoogle">
                                        <img src="<?php echo base_url() ?>assets/images/google.png" alt="google" width="auto" height="auto">
                                        <span>Google</span>
                                    </a>
                                </div> -->
                                <p class="text-center newtoTxt">New to HappyNikah <a href="<?php echo site_url('user/registration_step1'); ?>">Register Now</a></p>
                                
                              
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- terms Modal -->
    <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="row">
                        
                     
                        
 <div class="col-12" style="padding:50px;"> 
 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="float:right"></button>
                    <div style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri","sans-serif";border:none;border-bottom:dashed #666666 1.0pt;padding:0in 0in 0in 0in;'>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";text-align:center;'><strong><span style='font-size:16px;font-family:"Times New Roman","serif";color:#C00000;'>TERMS AND CONDITIONS</span></strong></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><strong><span style='font-size:16px;font-family:"Times New Roman","serif";'>&nbsp;</span></strong></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><strong><span style='font-size:16px;font-family:"Times New Roman","serif";'>Welcome to happynikah.com</span></strong></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>Please read the terms of use for this website carefully. In accordance with this terms and conditions, the users of happynikah.com are provided with limited license to use the service and content of this website. By signing up the service, you give your acceptance to be bound by the Terms and conditions (herein referred to as &ldquo;Agreement&rdquo;). To become a member of this website and to be able to communicate with fellow members, you must register as a member and follow the instructions given during the Registration process. This Agreement outlines the terms that you are subjected to as a member of this website. The Agreement may be revised from time to time at the sole discretion of happynikah.com and will be intimated to you. Pursuant to such changes, if you continue to use the site then it will be constituted as your acceptance for the changes.</span></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><strong><span style='font-size:16px;font-family:"Times New Roman","serif";'>Criteria of Use</span></strong></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>You are at least 18 or 18+ years of age. The membership of those users will be declined whose eligibility does not match the criteria. Using this site will determine that you possess the right, authority and competence to sign this Agreement and to be bound by the terms of use of this Agreement.&nbsp;</span></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>This site does not encourage and/or promote illegitimate sexual relations or affairs outside marriage. If any member is found to be using this site as a means of promoting or indulging or engaging in any illegitimate sexual relations or affairs outside marriage or if happynikah.com becomes aware of such activities then the membership of the particular user will be terminated without any refund. happynikah.comis not bound by any liability towards such individual. The binding and final termination will be the sole discretion of happynikah.com.com.</span></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><strong><span style='font-size:16px;font-family:"Times New Roman","serif";'>Terms of Use</span></strong></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>This Agreement will come into effect once you have registered as a member and will remain in full force as and when you continue to use the Site. If you wish to terminate your membership for any reason and at any time, you may do so by informing happynikah.com in writing. In the event of happynikah.com terminating your membership or you terminate your membership, you will not be entitled any refund irrespective of whether you have any unutilized subscription fees. happynikah.comreserves the sole right to terminate your access to the Site and/or your membership for any reason. You will be intimated of the same via email at the email address (or any other email address that you may later provide) you provided in your application for membership to happynikah.com.com. In the event of happynikah.com terminating your membership for breaching the Agreement, you will not be entitled to any refund. Even after the termination of the Agreement, provisions including sections 4,5,7,9 -12 of this Agreement will remain in effect.</span></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><strong><span style='font-size:16px;font-family:"Times New Roman","serif";'>Non-Commercial Use by Members</span></strong></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>The service of this website is for the personal use of individual members only. Members of happynikah.com will not use the services of the website for any commercial purpose including link building of any kind irrespective of whether it may be deemed competitive to happynikah.com or otherwise. The membership of this website is restricted to individuals only therefore, non-individual entity may not become members of happynikah.com.com. Appropriate legal action will be taken against illegitimate and/or unauthorized use of the Site, which may include unauthorized framing of or linking to the Site.</span></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><strong><span style='font-size:16px;font-family:"Times New Roman","serif";'>Other Terms of Use</span></strong></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>1. Members of the website will not engage in any advertising or solicitation of selling or buying any services or products through this website.&nbsp;</span></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>2. You will not send any chain letters or spam the email of happynikah.com members.</span></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>3. Using any information obtained from this service for the purpose of harassing, abusing or harming a fellow member will be considered as the violation of this agreement.</span></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>4. Happynikah.com has the sole right to restrict the number of communications, emails, of all the members in order to protect its members from any sort of abuse or misuse.</span></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>5. Sending obscene, lewd, licentious, defamatory messages that promote hatred and/or are racial or abusive in any manner will be deemed as a breach of this agreement and shall be entitled to termination of your membership.&nbsp;</span></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>6. Happynikah.com at its own discretion reserves the right to screen messages that are sent to other Member(s). We also regulate the number of your chat sessions.</span></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>7. Use of Bots, EXE&apos;s, CGI or any other programs/scripts to view content on or communicate/contact/respond/interact with happynikah.com and/or its Members is restricted.</span></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><strong><span style='font-size:16px;font-family:"Times New Roman","serif";'>Propriety Rights</span></strong></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>The propriety rights of this website are owned by happynikah.com and retain all intellectual property without any limitation. The proprietary information shall not be copied, modified, published, transmitted, distributes, displayed, sold or performs in any form. Happynikah.com website possesses copyrighted material, trademarks, and other proprietary information Ownership of content posted on the Site</span></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><strong><span style='font-size:16px;font-family:"Times New Roman","serif";'>You agree that</span></strong></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>1) Happynikah.com owns all the lawful, legal and non-objectionable messages, content and/or other information, content or material that are posted on the forum boards.</span></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>2) All such information, content and/or material posted on the forum boards may be scrutinized by happynikah.com and have the sole right at its own discretion to remove, edit and/or display such information, material and/or content, messages, photos or profiles which might be deemed as offensive, illegitimate, derogatory, obscene, libellous, or that might violate the rights, harm, or intimidate the safety of other members. It will be considered as a breach of this agreement and may be liable to termination.</span></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>3) The Content that are published or displayed on the Site by you will be at your sole discretion.</span></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>4) Happynikah.com reserves the right to verify the authenticity of Content posted on the Site and may ask you to provide any documentary or other form of evidence supporting the Content you post on the Site.&nbsp;</span></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>5) In the event of your failure to produce such evidence, or if the evidence is not sufficient to support and justify your claim then happynikah.com may, in its sole discretion, terminate your Membership without any refund.&nbsp;</span></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>6) You understand that by posting content to any public forum, you automatically grant happynikah.com and other members the license to utilize, reproduce, exhibit, distribute and perform the information and content in any manner.</span></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><strong><span style='font-size:16px;font-family:"Times New Roman","serif";'>Content prohibited on the Site&nbsp;</span></strong></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>Any member violating the following provision will be subjected to appropriate legal action in the sole discretion of happynikah.com.com. The violator will be removed and membership will be terminated from the website without refund. It includes (but is not limited to) Content that:</span></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>1) New profiles will be verified for its authenticity by way of happynikah.com and will be immediately activated after receiving quality declaration.</span></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>2) In the event of unacceptable profile contents or if the profile contains violent language or unsolicited material then happynikah.com reserves the sole right to discontinue, deactivate, or terminate the concerned profile.</span></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>3) Only paid customer will have access to contact information of other members.</span></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>4) The liability of your connections with other members through this Service solely lies with you. Happynikah.com does not have any obligation to supervise the disputes between its members.</span></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>5) Free membership may be discontinued by happynikah.com as and when it is deemed to be of no more relevance.&nbsp;</span></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>6) Happynikah.com does not claim any responsibility for the misuse of this service.&nbsp;</span></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>7) All the members are required to submit their profile with the necessary facts required for establishing a matrimonial alliance. Happynikah.com will not be responsible for any loss or damage caused for concealing facts relevant to marriage.</span></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>8) Happynikah.com does not guarantee the legitimacy and validity of the information provided by the members. This may include information related religion, caste or creed or any other personal information.</span></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>9) Happynikah.com will not be responsible for any delays caused in posting information due to technical faults.</span></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>10) For loss or damage due to the discontinuation of the service or for any damage caused due to accessing other member&rsquo;s profile, happynikah.com is not responsible.</span></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>11) Happynikah.com does not provide any guarantee that you as an applicant will receive responses and is not liable to any refunds or credits.</span></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>12) The users will not promote any an illegal or unauthorized copy of another person&apos;s copyrighted work which may include pirated computer programs, providing information to circumvent manufacture-installed copy-protect devices, or pirated music.</span></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>13) The users will not send any information with restricted contents or password only access pages, or hidden pages or images.</span></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>14) The users will not encourage extra marital affairs, exploitation of people under 18 years of age in a sexual or violent manner, other illegal activities such as making or buying illegal weapons, violating someone&apos;s privacy, or providing or creating computer viruses.</span></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>The service of happynikah.com must be used in accordance to all local, state, and federal laws and regulations. Creation of more than one profile is not permitted in any case. Doing so may subject your membership to terminate without any refunds.</span></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><strong><span style='font-size:16px;font-family:"Times New Roman","serif";'>Copyright Policy</span></strong></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>The copyrighted material, trademarks, or other proprietary information may not be copied, reproduced or distributed in any form without the prior written consent of the owner. In the event of your copyright materials being copied and posted, you may get in touch with our copyright Agents for copyright infringement with an electronic or physical signature authorizing the person to act on behalf of the owner and a description of the copyrighted material that you believe has been infringed. You must also include the source of the material, your address, telephone number, and email address along with a written statement. If applicable then you may also produce a certificate of the registration or any other intellectual property right. You can contact happynikah.com&apos;s Copyright Agent for Notice of claims of copyright infringement by writing to the Mumbai address located under the Help/Contact section.</span></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><strong><span style='font-size:16px;font-family:"Times New Roman","serif";'>Privacy</span></strong></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>The use of this service is governed by the happynikah.com Privacy Policy.</span></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><strong><span style='font-size:16px;font-family:"Times New Roman","serif";'>Disclaimers</span></strong></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>Happynikah.com does not claim any responsibility for the authenticity of the Content posted on the Site, whether caused by users visiting the Site, Members or by any equipment or programming associated with or utilized in the Service. Furthermore, happynikah.com does not claim any responsibility for the conduct of any user and/or Member whether online or offline. Happynikah.com assumes no responsibility for any error, omission, interruption, deletion, defect, delay in operation or transmission, communications line failure, theft or destruction or unauthorized access to, or alteration of, user and/or Member communications. The exchange of profile(s) through or by happynikah.com should not in any way be construed as any offer and/or recommendation from/by happynikah.com. The Site and the Service are provided &quot;AS-IS AVALAIBLE BASIS&quot; and happynikah.com expressly disclaims any warranty of fitness for a particular purpose or non-infringement. Happynikah.com cannot guarantee and does not promise any specific results from use of the Site and/or the happynikah.com Service.</span></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><strong><span style='font-size:16px;font-family:"Times New Roman","serif";'>Limitation on Liability</span></strong></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>Except in jurisdictions where such provisions are limited, in any event, happynikah.com will not be liable to you or any third person for any indirect, consequential, exemplary, incidental, special or punitive damages, including also lost profits arising from your use of the Site. Notwithstanding anything to the contrary contained herein, happynikah.com, liability to you for any cause whatsoever, and regardless of the form of the action, will at all times be limited to the amount paid, if any, by you to happynikah.com, for the Service during the term of membership.</span></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><strong><span style='font-size:16px;font-family:"Times New Roman","serif";'>Disputes</span></strong></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>If any dispute involving the Site and/or the Service arises, you agree that the dispute will be governed by the laws of India under the exclusive jurisdiction to the courts of Mumbai, India.</span></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><strong><span style='font-size:16px;font-family:"Times New Roman","serif";'>Indemnity</span></strong></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>You agree to indemnify and hold happynikah.com, its subsidiaries, directors, affiliates, officers, agents, and other partners and employees, harmless from any loss, liability, claim, or demand, including reasonable attorney&apos;s fees, made by any third party due to or arising out of your use of the Service in violation of this Agreement and/or arising from a breach of these Terms of Use and/or any breach of your representations and warranties set forth above.</span></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><strong><span style='font-size:16px;font-family:"Times New Roman","serif";'>Other</span></strong></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>By becoming a Member of happynikah.com Service, you agree to receive specific emails from happynikah.com. This Agreement, accepted upon use of the Site and further affirmed by becoming a Member of the happynikah.com Service, contains the entire agreement between you and happynikah.com regarding the use of the Site and/or the Service. If any provision of this Agreement is held invalid, the remainder of this Agreement shall continue in full force and effect. You are under an obligation to report any misuse or abuse of the Site to happynikah.com by writing to Customer Care. On receiving such complaint, happynikah.com may, if necessary, terminate the membership of the Member responsible for such violation abuse or misuse. If the complainant is at fault then they will be liable for termination of his / her membership without any refund of the subscription fee.</span></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>For queries related to this agreement, please contact us</span></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri","sans-serif";'>&nbsp;</p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri","sans-serif";'>&nbsp;</p>
    
</div>
   </div>                      
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!--about us modal-->
    <div class="modal fade" id="aboutModal" tabindex="-1" aria-labelledby="aboutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="row">
                        
                     
                        
 <div class="col-12" style="padding:50px;"> 
 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="float:right"></button>
                    <div style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri","sans-serif";border:none;border-bottom:dashed #666666 1.0pt;padding:0in 0in 0in 0in;'>
    
    <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><strong><span style='font-size:32px;font-family:"Times New Roman","serif";color:#C00000;'>About Us</span></strong></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>Happynikah.com is a premium matrimonial website for Muslims. Our aim is to help Muslims to find their suitable life partner in an Islamic way.</span></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>We are among the most trustworthy and technically suitable life partner in an Islamic way. We do not support anything that&apos;s not Halal in Islam so Happynikah.com is not a dating portal at all. Only matured Muslim men and women with an intention of marriage are allowed to register at Happynikah.com&rsquo;sadvanced matrimonial portals. Happynikah.com will make your matrimonial searches and online-match making a simple, easy and happy experience. No wonder as the number of memberships of Happynikah.com is greatly increasing day by day.</span></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><strong><span style='font-size:16px;font-family:"Times New Roman","serif";'>Highlights of Happynikah.com</span></strong></p>
    <ul style="margin-bottom:0in;" type="disc">
        <li style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>Global and wide set of profiles.</span></li>
        <li style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>Free and easy profile registration.</span></li>
        <li style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>Safe and secure site. 100% privacy guaranteed.</span></li>
        <li style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>Registered profiles are manually screened or validated to ensure that they meet the norms of our site.&nbsp;</span></li>
        <li style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>E-mail &amp; mobile alerts when members contact each other.</span></li>
    </ul>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><strong><span style='font-size:16px;font-family:"Times New Roman","serif";'>The aim of Happynikah.com is clear</span></strong></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>Understand the needs and concerns of singles Muslims through tireless research and analysis.<br>&nbsp;Provide a pleasant, satisfying, and superior matchmaking experience to our customers while ensuring their privacy and security.<br>&nbsp;Give our customers complete control through easy to use interfaces and features that can help them identify, filter and contact potential partners.</span></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>Happynikah.com is entirely committed to the creed of Islam. It is quite safe, secure and confidential. Our management team is highly Islamic and our employees are dedicated to make this online matrimonial channel the leader in the field of Muslim matrimony. Happynikah.com fulfils all needs of today&apos;s Muslim singles that are truly searching for suitable and valuable ways to meet with their prospective life partners.</span></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>If you are urgently looking for life partner, we invite you to join Happynikah.com and experience the happiness and overwhelming results to lead a success in finding a suitable Muslim life partner, Insha&rsquo;Allah.</span></p>
</div>
   </div>                      
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/bootstrap.bundle.min.js"></script>
    
    <script>
        function login(){
        
        var username = $('#username_login').val();
        var password = $('#password_login').val();
        
        $('#loginbtn').html('<i class="fa fa-circle-o-notch fa-spin" style="font-size:24px"></i>  Please wait....');
        
        $.ajax({
        url: "<?php echo site_url('user/login'); ?>",
        type: "post",
        data: { username:username,password:password},
        success: function (response) {
            
            if(response == 2){ 
                
                 
                
                $('#loginerror').show();
                
                $('#loginbtn').html('Login');
            
            }else{
                
                window.location.href = "<?php echo site_url('user/home'); ?>";
            }
            
           // You will get response from your PHP page (what you echo or print)
        },
        // error: function(jqXHR, textStatus, errorThrown) {
        //   console.log(textStatus, errorThrown);
        // }
        });
        
    
    }
    
    function forgotpassword(){
        
        $('.emailLogBox').hide();
        $('.resetpwdLogBox').show();
        
    }
    
    function sendpassword(){
        
        
        var mobile = $('#resetmobilenumber').val();
        var code = $('#countryCode1').val();
        
        $('.otpsendBox').show();
        $('.resetpwdLogBox').hide();
        
        $.ajax({
        url: "<?php echo base_url('home/resetpassword');?>",
        type: "post",
        data: { mobile:mobile,code:code},
        success: function (response) {
            
            if(response == 2){ 
                
                $('.otpsendBox').hide();
                $('.resetpwdLogBox').show();
                
                alert('Mobile Number not registered');
            
            }
            
           // You will get response from your PHP page (what you echo or print)
        },
        // error: function(jqXHR, textStatus, errorThrown) {
        //   console.log(textStatus, errorThrown);
        // }
     });
        
    }
    
    function verifyotp(){
        
        var otpdigit1 = $('#otpdigit1').val();
        var otpdigit2 = $('#otpdigit2').val();
        var otpdigit3 = $('#otpdigit3').val();
        var otpdigit4 = $('#otpdigit4').val();
        var otpdigit5 = $('#otpdigit5').val();
        var otpdigit6 = $('#otpdigit6').val();
        
        $.ajax({
        url: "<?php echo base_url('home/verifyotp');?>",
        type: "post",
        data: { otpdigit1:otpdigit1,otpdigit2:otpdigit2,otpdigit3:otpdigit3,otpdigit4:otpdigit4,otpdigit5:otpdigit5,otpdigit6:otpdigit6},
        success: function (response) {
            
            if(response == 1){
                
                $('.Resetpasswordtab').show();
                $('.otpsendBox').hide();
                
            }else{ 
                $('.errorotp').html('Invalid OTP');
                
            } 
            
            // You will get response from your PHP page (what you echo or print)
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }
     });
        
    }
    
    function changepassword(){
        
        
        var confirmpasswordreset = $('#confirmpasswordreset').val();
        
        var passwordreset = $('#passwordreset').val();
        
        
        if(confirmpasswordreset == passwordreset){
            
        $.ajax({
        url: "<?php echo base_url('home/changepassword');?>",
        type: "post",
        data: { confirmpasswordreset:confirmpasswordreset,passwordreset:passwordreset},
        success: function (response) {
            
            
            
            if(response == 1){
                
            alert('Sucessfully changed your password. Please login to continue !');    
            $('.emailLogBox').show();
            $('.otpsendBox').hide();
            $('.Resetpasswordtab').hide();
                
                // $('.Resetpasswordtab').show();
                // $('.otpsendBox').hide();
                
                
            }else{ 
                
                // $('.errorotp').html('Invalid OTP');
                
                
            } 
            
            
            

           // You will get response from your PHP page (what you echo or print)
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }
     });
            
            
        }else{
            alert('Password and Confirm Password Miss-match');
        }
        
        
        
    }
    
    function lettersOnly() 
    {
        var inputValue = event.keyCode;
        if(!(inputValue >= 65 && inputValue <= 122) && (inputValue != 32 && inputValue != 0)){
            event.preventDefault();
        }
    }
    
    function tabChange(first,last)
     {
        if(first.value.length){
            document.getElementById(last).focus();
        }
     }
     
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
                $('.resetpwdLogBox').hide();
                $('.otpsendBox').hide();
            });
            $(".sendOtp").click(function(){
                $(".otpLogBox").hide();
                // $(".otpsendBox").show();
            });
        });
    </script>

</body>
</html>