<?php include('include/register-header.php'); ?>

    <section id="registerPage">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div id="ERtabV" class="resp-vtabs hor_1">
                        <ul class="resp-tabs-list hor_1">
                            <li class="resp-tab-item hor_1" onclick="">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="circleNo">
                                            <span>1</span>
                                        </div>
                                    </div>
                                    <a style="color: black;" href="<?php echo site_url('user/registration_step1?currentpage=1'); ?>">
                                    <div class="flex-grow-1 ms-3">
                                       <p class="menuHead">Basic Information</p>
                                       <p class="menuPara">Set up your your Basic Information...</p>
                                    </div>
                                    </a>
                                </div>
                            </li>
                        
                            <li class="resp-tab-item hor_1" onclick="">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="circleNo">
                                            <span>2</span>
                                        </div>
                                    </div>
                                    <a style="color: black;" href="<?php echo site_url('user/registration_steptwo?currentpage=1'); ?>">
                                    <div class="flex-grow-1 ms-3">
                                       <p class="menuHead">Personal Information</p>
                                       <p class="menuPara">Set up your Personal Information...</p>
                                    </div>
                                    </a>
                                </div>
                            </li>
                            <li class="resp-tab-item hor_1" onclick="">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="circleNo">
                                            <span>3</span>
                                        </div>
                                    </div>
                                    <a style="color: black;" href="<?php echo site_url('user/registration_stepthree?currentpage=1'); ?>">
                                    <div class="flex-grow-1 ms-3">
                                       <p class="menuHead">Family Information</p>
                                       <p class="menuPara">Set up your Family Information...</p>
                                    </div>
                                    </a>
                                </div>
                            </li>
                            <li class="resp-tab-item hor_1 resp-tab-active" onclick="">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="circleNo">
                                            <span>4</span>
                                        </div>
                                    </div>
                                    <a style="color: black;" href="<?php echo site_url('user/registration_stepfour?currentpage=1'); ?>">
                                    <div class="flex-grow-1 ms-3">
                                       <p class="menuHead">Create Password</p>
                                       <p class="menuPara">Set up your Password...</p>
                                    </div>
                                    </a>
                                </div>
                            </li>
                        </ul> 
                        <div class="resp-tabs-container hor_1">
                            <h2 class="resp-accordion hor_1">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="circleNo">
                                            <span>1</span>
                                        </div>
                                    </div>
                                    <a style="color: black;" href="<?php echo site_url('user/registration_step1?currentpage=1'); ?>">
                                    <div class="flex-grow-1 ms-3">
                                       <p class="menuHead">Basic Information</p>
                                       <p class="menuPara">Set up your your Basic Information...</p>
                                    </div>
                                    </a>
                                </div>
                            </h2>
                            <h2 class="resp-accordion hor_1">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="circleNo">
                                            <span>2</span>
                                        </div>
                                    </div>
                                    <a style="color: black;" href="<?php echo site_url('user/registration_steptwo?currentpage=1'); ?>">
                                    <div class="flex-grow-1 ms-3">
                                       <p class="menuHead">Personal Information</p>
                                       <p class="menuPara">Set up your Personal Information...</p>
                                    </div>
                                    </a>
                                </div>
                            </h2>
                            <h2 class="resp-accordion hor_1">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="circleNo">
                                            <span>3</span>
                                        </div>
                                    </div>
                                    <a style="color: black;" href="<?php echo site_url('user/registration_stepthree?currentpage=1'); ?>">
                                    
                                    <div class="flex-grow-1 ms-3">
                                       <p class="menuHead">Family Information</p>
                                       <p class="menuPara">Set up your Family Information...</p>
                                    </div>
                                    
                                    </a>
                                </div>
                            </h2>
                            <h2 class="resp-accordion hor_1 resp-tab-active">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="circleNo">
                                            <span>4</span>
                                        </div>
                                    </div>
                                    <a style="color: black;" href="<?php echo site_url('user/registration_stepfour?currentpage=1'); ?>">
                                    
                                    <div class="flex-grow-1 ms-3">
                                       <p class="menuHead">Create Password</p>
                                       <p class="menuPara">Set up your Password...</p>
                                    </div>
                                    
                                    </a>
                                </div>
                            </h2>
                            
                            <!-- Family Information -->
                            <div class="resp-tab-content hor_1 resp-tab-content-active">
                                <div class="row">
                                    <div class="col-12 col-lg-10 mx-auto">
                                        <form action="<?php echo site_url('user/create_password'); ?>?currentpage=1" method="post" autocomplete="off" class="customForm">
                                            <h2 class="congrtsHead">Create your password here</h2>
                                            <p>Your HappyNikah ID: <b><?= $userdetails->happynikah_id?></b></p>
                                            <p>Your Registered Phone No: <b><?php if($userdetails->countryCode != 0){ $countryCode = "+".$userdetails->countryCode;}else{ $countryCode=""; } echo $countryCode.$userdetails->phone?></b></p>
                                            <div class="row">
                                                <div class="col-12 col-lg-6 mb-3">
                                                    <label class="form-label">Set Password:</label>
                                                    <input type="password" name="set_password" class="form-control" required>
                                                </div>
                                                <div class="col-12 col-lg-6 mb-3">
                                                    <label class="form-label">Confirm Password:</label>
                                                    <input type="password" name="confirm_password" class="form-control" required>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-12 col-md-6 mb-3 mb-md-0">
                                                    <button type="button" class="btn backBtn w-100" onclick="window.location.href='<?php echo base_url(); ?>'">Back</button>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <button type="submit" class="btn cstmBtnColr w-100" >Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   <?php include('include/register-footer.php'); ?>