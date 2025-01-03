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
                            <li class="resp-tab-item hor_1 resp-tab-active" onclick="">
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
                            <li class="resp-tab-item hor_1" onclick="">
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
                            <h2 class="resp-accordion hor_1 resp-tab-active">
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
                            <h2 class="resp-accordion hor_1">
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
                                        <form action="<?php echo site_url('user/register_family_info'); ?>?currentpage=1" method="post" autocomplete="off" class="customForm">
                                            <div class="row">
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Father's Name :</label>
                                                    <input type="text" class="form-control" placeholder="" name="fathers_name">
                                                </div>
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Occupation of Father :</label>
                                                    <input type="text" class="form-control" placeholder="" name="father_occupation">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Mother's Name :</label>
                                                    <input type="text" class="form-control" placeholder="" name="mothers_name">
                                                </div>
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Occupation of Mother :</label>
                                                    <input type="text" class="form-control" placeholder="" name="mother_occupation">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Number of family members :</label>
                                                    <select class="form-select form-control" aria-label="" name="no_of_family_members">
                                                        <option value="1">Select</option>
                                                        <?php for ($i=0; $i <=20 ; $i++) { ?>
                                                        <option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
                                                      <?php } ?>
                                                     </select>
                                                </div>
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Financial Status :</label>
                                                    <select id="inputStatus" class="form-select form-control" aria-label="" name="financial_status">
                                                  <option value="">Select</option>
                                                  <option value="Very Rich" >Very Rich</option>
                                                  <option value="Rich" >Rich</option>
                                                  <option value="Upper Middle class" >Upper Middle class</option>
                                                  <option value="Middle class">Middle class</option>
                                                  <option value="Poor" >Poor</option>
                                                </select>
                                                </div>
                                            </div>
                                            <div></div>
                                            <div class="row">
                                                <div class="col-12 col-md-6 mb-3">
                                                    <h5>Partner Preference</h5>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Age From :</label>
                                                    <select id="inputStatus" class="form-select form-control AgeFrom" aria-label=""  name="age_from" >
                                                      <option value="">From</option>
                                                      <?php for ($i=18; $i <=80 ; $i++) {  ?>
                                                        <option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
                                                      <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Age To :</label>
                                                    <select id="inputStatus" class="form-select form-control AgeTo" name="age_to">
                                                      <option value="">To</option>
                                                      <?php for ($i=18; $i <=80 ; $i++) {  ?>
                                                        <option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
                                                      <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Height From :</label>
                                                    <select id="inputStatus" class="form-select form-control HeightFrom" name="height_preference_from">
                                                        <option value="">Select</option>
                                                        <?php foreach ($Height as $value) { ?>
                                                        <option value="<?php echo $value->height_id ?>" ><?php echo $value->height; ?></option>  
                                                        <?php } ?>
                                                      
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Height To</label>
                                                    <select id="inputStatus" class="form-select form-control HeightTo" name="height_preference_to">
                                                    <option value="">Select</option>
                                                    <?php foreach ($Height as $value) { ?>
                                                    <option value="<?php echo $value->height_id ?>" ><?php echo $value->height; ?></option>  
                                                    <?php } ?>
                                                  
                                                </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Qualification Preference :</label>
                                                    <select id="inputStatus" class="form-select form-control" aria-label="" name="qualification_preference">
                                                    <option value="">Select</option>
                                                    <?php foreach ($qualification as $value) { ?>
                                                    <option value="<?php echo $value->qualification_id ?>" ><?php echo $value->qualification; ?></option>  
                                                    <?php } ?>
                                                  
                                                </select>
                                                </div>
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Family Type Preference :</label>
                                                    <select class="form-select form-control" aria-label="" name="family_type_preference">
                                                      <option value="">Select</option>
                                                      <option value="Very Rich" >Very Rich</option>
                                                      <option value="Rich" >Rich</option>
                                                      <option value="Middle class" >Middle class</option>
                                                      <option value="Poor" >Poor</option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="row mb-4">
                                                <div class="col-12 mb-3">
                                                    <label class="form-label">Expectations :</label>
                                                    <textarea class="form-control" rows="6" name="expectations" ></textarea>
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="row">
                                                <div class="col-12 col-md-6 mb-3 mb-md-0">
                                                    <button type="button" class="btn backBtn w-100" onclick="window.location.href='<?php echo base_url(); ?>'">Back</button>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <button type="submit" class="btn cstmBtnColr w-100" >Next</button>
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