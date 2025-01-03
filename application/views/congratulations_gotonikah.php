<!DOCTYPE html>
<html>



<head>
    <meta charset="UTF-8">
    <title>Goto Nikah | Kerala Muslim Matrimony Site | Nikah Matrimony in Kerala</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="Goto Nikah, Nikah Matrimony is a muslim marriage website where you can find your partner. You can find a partner among thousands of registered profile">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url();?>/happyadmin/assets/images/gotonikh.jpg">
    <!--<title>GoNikah</title>-->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
    <link href="css/css2.css" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
</head>

<body>
   <section id="header" style="background-color: white;padding: 0px 0;position: fixed;top: 0;left: 0;right: 0;z-index: 11;box-shadow: 1px 5px #8e8c8c1c;">

        <nav class="navbar navbar-expand-lg">

            <div class="container">

                <a class="navbar-brand" href="<?php echo site_url('user/gotonikah'); ?>">

                    <img src="<?php echo base_url() ?>happyadmin/assets/images/goto nikah logo.png" alt="Go to Nikah" class="gotoNikahlogo" style="width:150px !important;" height="auto">

                </a>



    <!--             <div class="mob-login" id="moblogin">-->

    <!--                <n class="already-member" style="color:#000;">Already a member?</n>-->

    <!--                <button type="button" class="btn loginbtn" data-bs-toggle="modal" data-bs-target="#loginModal" id="logmob" style="background: #5ABA47;width: 90px;margin-left: 8px;-->
    <!--padding: 2px 0px;color: #ffff;">Login</button>-->

    <!--            </div>-->
                
                
                

                <!--<n class="already-member">Already a member?</n><button type="button" class="btn loginbtn" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>-->

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarGoToNikah" aria-controls="navbarGoToNikah" aria-expanded="false" aria-label="Toggle navigation">

                    <div class="hamburger" id="hamburger-1">

                        <span class="line"></span>

                        <span class="line"></span>

                        <span class="line"></span>

                    </div>

                </button>

                <div class="collapse navbar-collapse" id="navbarGoToNikah">
                    
                    
                

                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0 mt-3 mt-lg-0">

                        <li class="nav-item">

                            <a class="nav-link active" aria-current="page" href="<?php echo site_url('user/gotonikah'); ?>">Home</a>

                        </li>

                        <li class="nav-item">

                            <a class="nav-link" href="<?php echo site_url('user/about_gotonikah'); ?>">About us</a>

                        </li>
                        
                         

                        <li class="nav-item">

                            <a class="nav-link" href="<?php echo site_url('user/download_gotonikah'); ?>">Download</a>

                        </li>

                        <li class="nav-item">

                            <a class="nav-link" href="<?php echo site_url('user/contactus_gotonikah'); ?>">Contact</a>

                        </li>
                        
                       
                

                    </ul>
                    
                     <div class="d-flex" style="margin-left: 0px;">
                    <a href="javascript:void(0)" style="margin-top: -84px;" id="headicon">
                        <img src="<?php echo base_url() ?>assets/images/appleStoreF.png" alt="appleStore" id="apple" width="auto" height="auto" style="width: 90px;
    margin-bottom: -5px;" class="storeIcon me-3">
                    </a>
                    <a target="_blank" href="https://play.google.com/store/apps/details?id=com.sysol.goto_nikah" style="margin-top: -84px;">
                        <img src="<?php echo base_url() ?>assets/images/playStoreF.png" alt="playStore" width="auto"  style="width:90px;"   height="auto" class="storeIcon">
                    </a>
                </div>

                    <div class="web-login">

                        <n class="already-member" style="color:#000;">Already a member?</n>

                        <button type="button" class="btn loginbtn" data-bs-toggle="modal" data-bs-target="#loginModal" style="background: #5ABA47;width: 90px;margin-left: 8px;
    padding: 2px 0px;color: #ffff;">Login</button>

                    </div>

                    <!--<ul class="d-flex logList align-items-center mb-3 mb-lg-0">-->

                    <!--    <li>Already Member</li>-->

                    <!--    <li>-->

                    <!--        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>-->

                    <!--    </li>-->

                    <!--</ul>-->



                </div>

            </div>

        </nav>

    </section> 
    
    <style>
    #header .nav-link
    {
    color:#000;
    }
    #registerPage .congrtsHead 
    {
    color: #5aba47;
    }
    </style>

    <section id="registerPage" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8 col-xxl-6 mx-auto text-center">
                    <!--<img src="images/congrtsIcon.png" class="congrtsIcon" alt="Congratulations" width="auto" height="auto">-->
                    <h2 class="congrtsHead">Congratulations !</h2>
                    <p class="congrtsPara mb-4">Your profile has been successfully Created. You will redirected to Home page.</p>
                    <p class="congrtsPara mb-5">Your registration will be effective only after admin approval. Username and password will be send to you via email.</p>
                    <div class="pwSetBox">
                        <h3 class="setPwHead">Set Profile Password</h3>
                        <?php if(isset($errormessage) && $errormessage==1)
                        {
                            ?>
                            <span style="color:red;font-size:16px;">Passwords dont match.</span>
                            <?php
                        }?>
                        <div class="row mb-4">
                            <div class="col-12 col-md-6 d-flex align-items-center">
                                <div class="w-100">
                                    <p><span class="me-3">Name :</span><?= $userdetails->name?></p>
                                    <p><span class="me-3">Profile Id :</span><?= $userdetails->happynikah_id?></p>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 d-flex align-items-center">
                                <div class="w-100">
                                    <form class="customForm" action="<?php echo site_url('user/create_password_gotonikah'); ?>?currentpage=1" method="post" autocomplete="off">
                                        <div class="mb-3">
                                            <label class="form-label">Enter password</label>
                                            <input type="password" class="form-control" placeholder="" name="set_password" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Confirm your password</label>
                                            <input type="password" class="form-control" placeholder=""  name="confirm_password" required >
                                        </div>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 ms-auto">
                                <button type="submit" class="btn cstmBtnColr w-100" >Submit</button>
                            </div>
                        </div>
                    </div> 
                  </form>
                    
                </div>
            </div>
        </div>
    </section>
    <?php include('include/footer_gotonikah.php'); ?>

</body>
</html>