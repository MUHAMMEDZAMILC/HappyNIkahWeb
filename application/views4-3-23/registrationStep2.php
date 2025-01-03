<?php include('include/register-header.php'); ?>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/cropimage/croppie.css">
<style type="text/css">
  .clk-popup{
    background: white;
    width: 414px;
    padding: 5px 10px;
    padding-bottom: 21px;
  }
  .divphotobottom button{
    background: #1aab97;
    color: white;
    border: 0;
    padding: 11px 12px;
    border-radius: 11px;
    width: 100%;
  }
  .divphotobottom{
    display: flex;
    justify-content: space-between;
  }
  #uploadimage{
    padding: 12px;
  }
  footer{
    float: left;
    width: 100%;
    margin-left: unset !important;
  }
  .closeimgbtn{
    position: absolute;
    width: 23px;
    height: 23px;
    background: white;
    /* top: 110px; */
    z-index: 99;
    color: black;
    border-radius: 39px;
    top: 3px;
    left: 3px;
    border: 0;
  }

  .dpimgbtn{
    position: absolute;
    width: 23px;
    height: 23px;
    background: white;
    /* top: 110px; */
    z-index: 99;
    color: black;
    border-radius: 39px;
    top: 3px;
    right: 3px;
    border: 0;
  }
  .proPhotoUpload .proUpldedImg {
 
    z-index: 9;
}
</style>
    <section id="registerPage">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div id="ERtabV" class="resp-vtabs hor_1">
                        <ul class="resp-tabs-list hor_1">
                            <li class="resp-tab-item hor_1" >
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="circleNo">
                                            <span>1</span>
                                        </div>
                                    </div>
                                    <a style="color: black;" href="<?php echo site_url('user/registration_step1'); ?>?currentpage=1">
                                    <div class="flex-grow-1 ms-3">
                                       <p class="menuHead">Basic Information</p>
                                       <p class="menuPara">Set up your your Basic Information...</p>
                                    </div>
                                    </a>
                                </div>
                            </li>
                            <li class="resp-tab-item hor_1 resp-tab-active">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="circleNo">
                                            <span>2</span>
                                        </div>
                                    </div>
                                    <a style="color: black;" href="<?php echo site_url('user/registration_step2'); ?>?currentpage=1">
                                    <div class="flex-grow-1 ms-3">
                                       <p class="menuHead">Personal Information</p>
                                       <p class="menuPara">Set up your Personal Information...</p>
                                    </div>
                                    </a>
                                </div>
                            </li>
                            <li class="resp-tab-item hor_1" style="pointer-events: none;">
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
                            <h2 class="resp-accordion hor_1" >
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="circleNo">
                                            <span>1</span>
                                        </div>
                                    </div>
                                    <a style="color: black;" href="<?php echo site_url('user/registration_step1'); ?>?currentpage=1">
                                    <div class="flex-grow-1 ms-3">
                                       <p class="menuHead">Basic Information</p>
                                       <p class="menuPara">Set up your your Basic Information...</p>
                                    </div>
                                    </a>
                                </div>
                            </h2>
                            <h2 class="resp-accordion hor_1 resp-tab-active"  >
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="circleNo">
                                            <span>2</span>
                                        </div>
                                    </div>
                                    <a style="color: black;" href="<?php echo site_url('user/registration_steptwo'); ?>?currentpage=1">
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
                            <!-- Personal Information -->
                            <div class="resp-tab-content hor_1 resp-tab-content-active">
                                <div class="row">
                                    <div class="col-12 col-lg-10 mx-auto">
                                        <form action="<?php echo site_url('user/register_personal_info'); ?>?currentpage=1" method="post" autocomplete="off" class="customForm" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-12 mb-3">
                                                    <label class="form-label">About:</label>
                                                    <textarea class="form-control" name="about"><?= !empty($ProfileDetails->about) && $ProfileDetails->about != 'NULL' ? $ProfileDetails->about : '' ?></textarea>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Age *:</label>
                                                    <select class="form-select form-control" aria-label="" name="age" required="">
                                                      <option value="">Select</option>
                                                      <?php for ($i=18; $i <=80 ; $i++) {  ?>
                                                        <option value="<?php echo $i; ?>" <?= (isset($ProfileDetails->age) && !empty($ProfileDetails->age)) ? ($ProfileDetails->age == $i ? 'selected' : '') : '' ?>><?php echo $i; ?></option>
                                                      <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Colour :</label>
                                                    <select id="inputStatus" class="form-select form-control" aria-label="" name="color">
                                                      <option value="">Select</option>
                                                      <option value="Very Fair" <?= (isset($ProfileDetails->color) && !empty($ProfileDetails->color)) ? (($ProfileDetails->color == 'Very Fair') ? 'selected' : '') : '' ?>>Very Fair</option>
                                                      <option value="Fair" <?= (isset($ProfileDetails->color) && !empty($ProfileDetails->color)) ? (($ProfileDetails->color == 'Fair') ? 'selected' : '') : '' ?>>Fair</option>
                                                      <option value="Wheatish" <?= (isset($ProfileDetails->color) && !empty($ProfileDetails->color)) ? (($ProfileDetails->color == 'Wheatish') ? 'selected' : '') : '' ?>>Wheatish</option>
                                                      <option value="Wheatish Brown" <?= (isset($ProfileDetails->color) && !empty($ProfileDetails->color)) ? (($ProfileDetails->color == 'Wheatish Brown') ? 'selected' : '') : '' ?>>Wheatish Brown</option>
                                                      <option value="Dark" <?= (isset($ProfileDetails->color) && !empty($ProfileDetails->color)) ? (($ProfileDetails->color == 'Dark') ? 'selected' : '') : '' ?>>Dark</option>
                                                      <option value="Prefer not to say" <?= (isset($ProfileDetails->color) && !empty($ProfileDetails->color)) ? (($ProfileDetails->color == 'Prefer not to say') ? 'selected' : '') : '' ?>>Prefer not to say</option>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="row">
                                             <label class="form-label">Email :</label>
                                             <div class="col-12 mb-3">
                                                    <input type="email" class="form-control" placeholder="Email" id="email" name="email" value="<?= !empty($BasicDetails->mail) && $BasicDetails->mail != 'NULL' ? $BasicDetails->mail : '' ?>">
                                                    <p id="email_val" class="validationclass"></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 mb-3">
                                                    <label class="form-label">Address:</label>
                                                    <textarea class="form-control" name="address"><?= !empty($ProfileDetails->address) && $ProfileDetails->address != 'NULL' ? $ProfileDetails->address : '' ?></textarea>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Height *:</label>
                                                    <select id="inputStatus" class="form-select form-control" aria-label="" name="height" required="">
                                                        <option value="">Select</option>
                                                        <?php foreach ($Height as $value) { ?>
                                                        <option value="<?php echo $value->height_id ?>" <?= (isset($ProfileDetails->height) && !empty($ProfileDetails->height)) ? ($ProfileDetails->height == $value->height_id   ? 'selected' : '') : '' ?>><?php echo $value->height; ?></option>  
                                                        <?php } ?>
                                                      
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Weight *:</label>
                                                    <select id="inputStatus" class="form-select form-control" aria-label="" name="weight" required="">
                                                        <option value="">Select</option>
                                                        <?php foreach ($weight as $value) { ?>
                                                        <option value="<?php echo $value->weight_id ?>" <?= (isset($ProfileDetails->weight) && !empty($ProfileDetails->weight)) ? ($ProfileDetails->weight == $value->weight_id ? 'selected' : '') : '' ?>><?php echo $value->weight; ?></option>  
                                                        <?php } ?>
                                                      
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Marital Status *:</label>
                                                    <select id="inputStatus" class="form-select form-control marital_status" aria-label="" name="marital_status" required="">
                                                      <option value="">Select</option>
                                                      <option value="Unmarried"  <?= (isset($ProfileDetails->marital_status) && !empty($ProfileDetails->marital_status)) ? (($ProfileDetails->marital_status == 'Unmarried') ? 'selected' : '') : '' ?>>Unmarried</option>
                                                      <option value="Divorced" <?= (isset($ProfileDetails->marital_status) && !empty($ProfileDetails->marital_status)) ? (($ProfileDetails->marital_status == 'Divorced') ? 'selected' : '') : '' ?>>Divorced</option>
                                                      <option value="Widow/Widower" <?= (isset($ProfileDetails->marital_status) && !empty($ProfileDetails->marital_status)) ? (($ProfileDetails->marital_status == 'Widow/Widower') ? 'selected' : '') : '' ?>>Widow/Widower</option>
                                                      <option value="Separated" <?= (isset($ProfileDetails->marital_status) && !empty($ProfileDetails->marital_status)) ? (($ProfileDetails->marital_status == 'Separated') ? 'selected' : '') : '' ?>>Separated</option>
                                                    </select>

                                                </div>
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Physical Status *:</label>
                                                    <select id="inputStatus" class="form-select form-control physical_status" aria-label="" name="physical_status" required="">
                                                      <option value="">Select</option>
                                                      <option value="Normal" <?= (isset($ProfileDetails->physical_status) && !empty($ProfileDetails->physical_status)) ? (($ProfileDetails->physical_status == 'Normal') ? 'selected' : '') : '' ?>>Normal</option>
                                                      <option value="Physically Challenged" <?= (isset($ProfileDetails->physical_status) && !empty($ProfileDetails->physical_status)) ? (($ProfileDetails->physical_status == 'Physically Challenged') ? 'selected' : '') : '' ?>>Physically Challenged</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row" >
                                                <div class="col-12 col-md-6 mb-3" id="no_of_children">
                                                    <label class="form-label">No of Children *:</label>
                                                    <input type="number" id="noofchildren" class="form-control" name="no_of_children" value="<?= !empty($ProfileDetails->no_of_children) && $ProfileDetails->no_of_children != 'NULL' ? $ProfileDetails->no_of_children : '' ?>">

                                                </div>
                                                <div class="col-12 col-md-6 mb-3" id="type">
                                                    <label class="form-label">Type of Physical Challenge *:</label>
                                                    <input type="text" id="noofchildren" class="form-control" name="registration_phychallenge" value="<?= !empty($ProfileDetails->registration_phychallenge) && $ProfileDetails->registration_phychallenge != 'NULL' ? $ProfileDetails->registration_phychallenge : '' ?>">

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Mother Tongue :</label>
                                                    <select id="inputStatus" class="form-select form-control" aria-label="" name="mother_tongue">
                                                        <option value="">Select</option>
                                                        <?php foreach ($mothertongue as $value) { ?>
                                                        <option value="<?php echo $value->mothertongue_id ?>" <?= (isset($ProfileDetails->mother_tongue) && !empty($ProfileDetails->mother_tongue)) ? ($ProfileDetails->mother_tongue == $value->mothertongue_id ? 'selected' : '') : '' ?>><?php echo $value->mothertongue; ?></option>  
                                                        <?php } ?>
                                                      
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Blood Group :</label>
                                                    <select id="inputStatus" class="form-select form-control" aria-label="" name="blood_group">
                                                      <option value="">Select</option>
                                                      <option value="A+ve" <?= (isset($ProfileDetails->blood_group) && !empty($ProfileDetails->blood_group)) ? (($ProfileDetails->blood_group == 'A+ve') ? 'selected' : '') : '' ?>>A+ve</option>
                                                      <option value="A-ve" <?= (isset($ProfileDetails->blood_group) && !empty($ProfileDetails->blood_group)) ? (($ProfileDetails->blood_group == 'A-ve') ? 'selected' : '') : '' ?>>A-ve</option>
                                                      <option value="B+ve" <?= (isset($ProfileDetails->blood_group) && !empty($ProfileDetails->blood_group)) ? (($ProfileDetails->blood_group == 'B+ve') ? 'selected' : '') : '' ?>>B+ve</option>
                                                      <option value="B-ve" <?= (isset($ProfileDetails->blood_group) && !empty($ProfileDetails->blood_group)) ? (($ProfileDetails->blood_group == 'B-ve') ? 'selected' : '') : '' ?>>B-ve</option>
                                                      <option value="O+ve" <?= (isset($ProfileDetails->blood_group) && !empty($ProfileDetails->blood_group)) ? (($ProfileDetails->blood_group == 'O+ve') ? 'selected' : '') : '' ?>>O+ve</option>
                                                      <option value="O-ve" <?= (isset($ProfileDetails->blood_group) && !empty($ProfileDetails->blood_group)) ? (($ProfileDetails->blood_group == 'O-ve') ? 'selected' : '') : '' ?>>O-ve</option>
                                                      <option value="AB+ve" <?= (isset($ProfileDetails->blood_group) && !empty($ProfileDetails->blood_group)) ? (($ProfileDetails->blood_group == 'AB+ve') ? 'selected' : '') : '' ?>>AB+ve</option>
                                                      <option value="AB-ve" <?= (isset($ProfileDetails->blood_group) && !empty($ProfileDetails->blood_group)) ? (($ProfileDetails->blood_group == 'AB-ve') ? 'selected' : '') : '' ?>>AB-ve</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Belief :</label>
                                                    <select id="inputStatus" class="form-select form-control belief" aria-label="" name="belief">
                                                        <option value="">Select</option>
                                                        <?php foreach ($belief as $value) { ?>
                                                        <option value="<?php echo $value->sid ?>" <?= (isset($ProfileDetails->caste) && !empty($ProfileDetails->caste)) ? ($ProfileDetails->caste == $value->sid ? 'selected' : '') : '' ?>><?php echo $value->sub_caste; ?></option>  
                                                        <?php } ?>
                                                      
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Other Contact No :</label>
                                                    <input type="number" class="form-control" name="othercontactno" value="<?= !empty($ProfileDetails->other_contact_number) && $ProfileDetails->other_contact_number != 'NULL'? $ProfileDetails->other_contact_number : '' ?>" <input type="text" class="form-control" name="othercontactno" value="<?= !empty($ProfileDetails->other_contact_number) && $ProfileDetails->other_contact_number != 'NULL'? $ProfileDetails->other_contact_number : '' ?>" maxlength="10" onkeypress="return event.charCode > 47 && event.charCode < 58;">
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="row">
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Country *:</label>
                                                    <select id="country" class="form-select form-control" aria-label="" name="country" required="">
                                                        
                                                        <option value="">Select Country</option>
                                                        <?php foreach($country as $country){ ?>
                                                        
                                                        <option value="<?php echo $country->id; ?>" <?php if($country->id == '101'){ echo "selected";}?>><?php echo $country->name; ?></option>
                                                        
                                                        <?php } ?>
                                                        </select>
                                                    <!--<input type="text" class="form-control" name="country" value="<?= !empty($ProfileDetails->country) && $ProfileDetails->country != 'NULL' ? $ProfileDetails->country : '' ?>">-->
                                                </div>
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">State *:</label>
                                                    
                                                    <select id="state" class="form-select form-control" aria-label="" name="state" required="" onchange="fetchcity()">
                                                        
                                                    </select>
                                                    <!--<input type="text" class="form-control" name="state" value="<?= !empty($ProfileDetails->state) && $ProfileDetails->state != 'NULL' ? $ProfileDetails->state : '' ?>">-->
                                                </div>
                                                
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">District/City *:</label>
                                                    <select  class="form-select form-control" aria-label="" name="district" required="" id="district">
                                                        <option value="">Select</option>
                                                         <?php //foreach ($district as $value) { ?> 
                                                        <!--<option value="<?php echo $value->district_id ?>" <?= (isset($ProfileDetails->native_district) && !empty($ProfileDetails->native_district)) ? ($ProfileDetails->native_district == $value->district_id ? 'selected' : '') : '' ?>><?php echo $value->district; ?></option>  -->
                                                         <?php //} ?> 
                                                      
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Pincode :</label>
                                                    <input type="number" class="form-control" name="pincode" value="<?= !empty($ProfileDetails->pincode) && $ProfileDetails->pincode != 'NULL' ? $ProfileDetails->pincode : '' ?>">
                                                </div>
                                                
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">City/Street *:</label>
                                                    <input type="text" class="form-control" name="city" required="" value="<?= !empty($ProfileDetails->native_place) && $ProfileDetails->native_place != 'NULL' ? $ProfileDetails->native_place : '' ?>">
                                                </div>
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Highest Education *:</label>
                                                    <select class="form-select form-control" aria-label="" name="qualification" required="">
                                                    <option value="">Select</option>
                                                    <?php foreach ($qualification as $value) { ?>
                                                    <option value="<?php echo $value->qualification_id ?>" <?= (isset($ProfileDetails->education) && !empty($ProfileDetails->education)) ? ($ProfileDetails->education == $value->qualification_id ? 'selected' : '') : '' ?>><?php echo $value->qualification; ?></option>  
                                                    <?php } ?>
                                                  
                                                </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Job :</label>
                                                    <select class="form-select form-control" aria-label="" name="job">
                                                    <option value="">Select</option>
                                                    <?php foreach ($job as $value) { ?>
                                                    <option value="<?php echo $value->job_id ?>" <?= (isset($ProfileDetails->occupation) && !empty($ProfileDetails->occupation)) ? ($ProfileDetails->occupation == $value->job_id ? 'selected' : '') : '' ?>><?php echo $value->job_name; ?></option>  
                                                    <?php } ?>
                                                  
                                                </select>
                                                </div>
                                                
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Profession :</label>
                                                    <select class="form-select form-control" aria-label="" name="profession">
                                                    <option value="">Select</option>
                                                    <?php foreach ($profession as $value) { ?>
                                                    <option value="<?php echo $value->profession_id ?>" <?= (isset($ProfileDetails->profession) && !empty($ProfileDetails->profession)) ? ($ProfileDetails->profession == $value->profession_id ? 'selected' : '') : '' ?>><?php echo $value->profession_name; ?></option>  
                                                    <?php } ?>
                                                  
                                                </select>
                                                </div>
                                                
                                                
                                                
                                                
                                                
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Job status :</label>
                                                    <select class="form-select form-control" aria-label="" name="job_status">
                                                    <option value="">Select</option>
                                                    <option value="Private" <?= (isset($ProfileDetails->job_category) && !empty($ProfileDetails->job_category)) ? (($ProfileDetails->job_category == 'Private') ? 'selected' : '') : '' ?>>Private</option>
                                                    <option value="Government" <?= (isset($ProfileDetails->job_category) && !empty($ProfileDetails->job_category)) ? (($ProfileDetails->job_category == 'Government') ? 'selected' : '') : '' ?>>Government</option>
                                                    <option value="Self" <?= (isset($ProfileDetails->job_category) && !empty($ProfileDetails->job_category)) ? (($ProfileDetails->job_category == 'Self') ? 'selected' : '') : '' ?>>Self</option>
                                                  
                                                </select>
                                                </div>
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Annual Income :</label>
                                                    <select id="inputStatus" class="form-select form-control" aria-label="" name="annual_income">
                                                      <option value="">Select</option>
                                                      <option value="10000 - 100000" <?= (isset($ProfileDetails->annual_income) && !empty($ProfileDetails->annual_income)) ? (($ProfileDetails->annual_income == '10000 - 100000') ? 'selected' : '') : '' ?>>10000 - 100000</option>
                                                      <option value="100000 - 200000" <?= (isset($ProfileDetails->annual_income) && !empty($ProfileDetails->annual_income)) ? (($ProfileDetails->annual_income == '100000 - 200000') ? 'selected' : '') : '' ?>>100000 - 200000</option>
                                                      <option value="200000 - 300000" <?= (isset($ProfileDetails->annual_income) && !empty($ProfileDetails->annual_income)) ? (($ProfileDetails->annual_income == '200000 - 300000') ? 'selected' : '') : '' ?>>200000 - 300000</option>
                                                      <option value="300000 - 400000" <?= (isset($ProfileDetails->annual_income) && !empty($ProfileDetails->annual_income)) ? (($ProfileDetails->annual_income == '300000 - 400000') ? 'selected' : '') : '' ?>>300000 - 400000</option>
                                                      <option value="400000 - 500000" <?= (isset($ProfileDetails->annual_income) && !empty($ProfileDetails->annual_income)) ? (($ProfileDetails->annual_income == '400000 - 500000') ? 'selected' : '') : '' ?>>400000 - 500000</option>
                                                      <option value="500000 - 600000" <?= (isset($ProfileDetails->annual_income) && !empty($ProfileDetails->annual_income)) ? (($ProfileDetails->annual_income == '500000 - 600000') ? 'selected' : '') : '' ?>>500000 - 600000</option>
                                                      <option value="600000 - 700000" <?= (isset($ProfileDetails->annual_income) && !empty($ProfileDetails->annual_income)) ? (($ProfileDetails->annual_income == '600000 - 700000') ? 'selected' : '') : '' ?>>600000 - 700000</option>
                                                      <option value="700000 - 800000" <?= (isset($ProfileDetails->annual_income) && !empty($ProfileDetails->annual_income)) ? (($ProfileDetails->annual_income == '700000 - 800000') ? 'selected' : '') : '' ?>>700000 - 800000</option>
                                                      <option value="800000 - 900000" <?= (isset($ProfileDetails->annual_income) && !empty($ProfileDetails->annual_income)) ? (($ProfileDetails->annual_income == '800000 - 900000') ? 'selected' : '') : '' ?>>800000 - 900000</option>
                                                      <option value="900000 - 1000000" <?= (isset($ProfileDetails->annual_income) && !empty($ProfileDetails->annual_income)) ? (($ProfileDetails->annual_income == '900000 - 1000000') ? 'selected' : '') : '' ?>>900000 - 1000000</option>
                                                      <option value="1000000 - Above" <?= (isset($ProfileDetails->annual_income) && !empty($ProfileDetails->annual_income)) ? (($ProfileDetails->annual_income == '1000000 - Above') ? 'selected' : '') : '' ?>>1000000 - Above</option>
                                                      
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-12 col-xl-6 mb-3">
                                                    <label class="form-label">Hobbies</label>
                                                    <textarea class="form-control" name="hobbies" style="min-height: 5.7em;"><?= !empty($ProfileDetails->registration_hobbies) && $ProfileDetails->registration_hobbies != 'NULL'? $ProfileDetails->registration_hobbies : '' ?></textarea>
                                                </div>
                                                <div class="col-12 col-xl-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Upload Photo</label>
                                                        <div class="upload-btn-wrapper">
                                                            <button class="btn">
                                                                <img src="<?php echo base_url() ?>assets/images/photoUpload.png">
                                                                Upload Photo:
                                                            </button>
                                                            <input type="file" id="upload" name="image" />
                                                        </div>
                                                        <!-- <input type="email" class="form-control" placeholder=""> -->
                                                    </div>
                                             <?php if(!empty($ProfileDetails->photo) && $ProfileDetails->photo != 'NULL'){ ?>
                                                        <img id="imgview" style="width: 100%;  margin-bottom: 10px;"  src="<?php echo base_url('/assets/photo_storage/'.$ProfileDetails->photo) ?>">

                                                    <?php } 
                                                    else{ ?>
                                                        <img id="imgview" style="width: 100%;  margin-bottom: 10px;" > 
                                                    <?php }   
                                                    ?>

                                                    <div class="mb-3">
                                                        <p class="mb-0">
                                                            <label class="form-label">Photo Visibility</label>
                                                        </p>
                                                        <div class="form-check form-check-inline custom_radio ps-0">
                                                            <input class="form-check-input" type="radio" name="photo_visibility" id="public" value="0" <?= (isset($ProfileDetails->photo_visibility) && !empty($ProfileDetails->photo_visibility)) ? (($ProfileDetails->photo_visibility == '0') ? 'checked' : '') : 'checked' ?>>
                                                            <label class="form-check-label" for="public">Public</label>
                                                        </div>
                                                        <div class="form-check form-check-inline custom_radio ps-0">
                                                            <input class="form-check-input" type="radio" name="photo_visibility" id="regUsr" value="1"  <?= (isset($ProfileDetails->photo_visibility) && !empty($ProfileDetails->photo_visibility)) ? (($ProfileDetails->photo_visibility == '1') ? 'checked' : '') : '' ?>>
                                                            <label class="form-check-label" for="regUsr">Protected</label>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="row password-protection" id="password-protection" style="display: none">
                                                        <?php 
                                                        $photo_settings = $this->General_Model->photo_settings($this->session->userdata('user_id'));
                                                        ?>
                                                        <div class="col-lg-12 settings-form">
                                                            <label>Password:</label>
                                                            <input type="password" name="photopassword" id="photopassword" autocomplete="new-password" <?php if($photo_settings->photopassword != '0'){ echo 'value="'.$photo_settings->photopassword.'"';}?>>   
                                                            <i class="fa fa-eye" id="togglePassword" class="togglePassword"></i>
                                                        </div>
                                                        <div class="col-lg-12 settings-form">
                                                            <label>
                                                            <input type="checkbox" name="showtoexpress" <?php if($photo_settings->showtoexpress != '0'){ echo 'checked';}?>>
                                                            Show my photo to express interest accepted members</label>
                                                        </div>
                                                        <div class="col-lg-12 settings-form">
                                                            <label>
                                                            <input type="checkbox" name="showtopremium" <?php if($photo_settings->showtopremium != '0'){ echo 'checked';}?>>
                                                            Show my photo to premium members</label>
                                                        </div>  
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-md-6 mb-3 mb-md-0">
                                                    <a href="<?php echo site_url('user/registration_step1') ?>" class="btn backBtn w-100">
                                                    <!-- <button class="btn backBtn w-100" >Back</button> -->
                                                    back
                                                </a>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <button type="submit" class="btn cstmBtnColr w-100" >Next</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <h2 class="resp-accordion hor_1" style="pointer-events: none;">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="circleNo">
                                            <span>3</span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                       <p class="menuHead">Family Information</p>
                                       <p class="menuPara">Set up your Family Information...</p>
                                    </div>
                                </div>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   <?php include('include/register-footer.php'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
  $( document ).ready(function() {
  $('#upload').change(function(){
    var input = this;
    var url = $(this).val();
    var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
    if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) 
     {
        var reader = new FileReader();

        reader.onload = function (e) {
           $('#imgview').attr('src', e.target.result);
        }
       reader.readAsDataURL(input.files[0]);
    }
    else
    {
      $('#imgview').attr('src', '/assets/no_preview.png');
    }
  });

});
</script>

  <div class="clk-popup" style="display:none;">
  
        <div  id="CommonDatadiv" >
           
        <input type="hidden" id="imagecatno" value=""/>
        <input type="hidden" id="imagetitleen" value=""/>
        <input type="hidden" id="imagetitlear" value=""/>
        <input type="hiddden" id="userid" value="<?php echo $_SESSION['user_id']; ?>" style="display:none;">
        <input type="hiddden" id="picnum" value="0" style="display:none;">

        <div id="vanilla-demo"></div>
        <div class="divphotobottom">
        <!-- <button class="vanilla-rotate rotateleft" data-deg="90"><i class="fa fa-undo" aria-hidden="true"></i> Rotate Left</button> -->
            <button class="basic-result" id="saveimages">Save Image</button>
        <!-- <button class="vanilla-rotate rotateright" data-deg="-90"><i class="fa fa-repeat" aria-hidden="true"></i> Rotate Right</button> -->
        </div>   
        </div>
        </div>
        
<script src="<?php echo base_url() ?>assets/cropimage/croppie.min.js"></script>
  <script src="<?php echo base_url() ?>assets/cropimage/jquery.bpopup.min.js"></script>
  <script type="text/javascript">
  
  $(document).ready(function(){
  var country = $('#country').val();
  
  fetchstate(country);
 });
 function fetchstate(country){
     
      $.ajax({
        url: "<?php echo base_url('home/fetchstate');?>",
        type: "post",
        data: { country:country},
        success: function (response) {
            
            
            $('#state').html(response);
          
        },
         
     });
 }
 
//  function fetchstate(){
     
     
//      var country = $('#country').val();
     
     
//       $.ajax({
//         url: "<?php echo base_url('home/fetchstate');?>",
//         type: "post",
//         data: { country:country},
//         success: function (response) {
            
            
//             $('#state').html(response);
          
//         },
         
//      });
//  }
 
 
 function fetchcity(){
     var state = $('#state').val();
     
      $.ajax({
        url: "<?php echo base_url('home/fetchcity');?>",
        type: "post",
        data: { state:state},
        success: function (response) {
            
            
            $('#district').html(response);
          
        },
         
     });
     
     
 }
    
function onclickin(){
            
            $('.clk-popup').bPopup({
      escClose: true,
      modal: true,
      modalClose: true,
    });
            
    }


$(document).ready(function(){
var marital_status = $(".marital_status").val();
  if(marital_status == 'Divorced' || marital_status=='Widow/Widower'){
            $("#no_of_children").show();
        }
        else if(marital_status == 'Unmarried' || marital_status=='Separated'){
            $("#no_of_children").hide();
            $("#noofchildren").val('');
        }
        else{
            $("#no_of_children").hide();
        }

  $(".marital_status").change(function(){
        var marital_status = $(this).val();
        if(marital_status == 'Divorced' || marital_status=='Widow/Widower'){
            $("#no_of_children").show();
        }
        else if(marital_status == 'Unmarried' || marital_status=='Separated'){
            $("#no_of_children").hide();
            $("#noofchildren").val('');
        }
        else{
            $("#no_of_children").hide();
        }
  });
  
  var physical_status = $(".physical_status").val();
  if(physical_status == 'Physically Challenged'){
            $("#type").show();
        }
        else{
            $("#type").hide();
        }

    $(".physical_status").change(function(){
        var physical_status = $(this).val();
        if(physical_status == 'Physically Challenged'){
            $("#type").show();
        }
        else{
            $("#type").hide();
        }
    });
    
// var belief = $(".belief").val();
//   if(belief == 8){
//             $(".other_caste").show();
//         }
//         else{
//             $(".other_caste").hide();
//         }

//     $(".belief").change(function(){
//         var belief = $(this).val();
//         if(belief == 8){
//             $(".other_caste").show();
//         }
//         else{
//             $(".other_caste").hide();
//         }
//     });
 

$image_crop = $('#vanilla-demo').croppie({
         enableExif: true,
                viewport: {
                  width:169,
                  height:200,
                  type:'square' //circle
                },
                boundary: {
        width: 100+'%',
        height: 300,
      },
                 
  });
  

  
 
  
    });  


function uploadphoto(){

 var reader = new FileReader();
    reader.onload = function (event) {
      $image_crop.croppie('bind', {
        url: event.target.result
      }).then(function(){
       
      });
    }
    reader.readAsDataURL(this.files[0]);


    onclickin().click();

}


  $('#upload').on('change', function(){
      
      
    var reader = new FileReader();
    reader.onload = function (event) {
      $image_crop.croppie('bind', {
        url: event.target.result
      }).then(function(){
         $image_crop.croppie('setZoom', 0)
      });
    }
    reader.readAsDataURL(this.files[0]);
    
           

     onclickin().click();
    
  });
  


    $('#saveimages').click(function(event){
        
     $('#saveimages').html('<i class="fa fa-circle-o-notch fa-spin" style="font-size:24px"></i> Uploading...');   
      
     $path = 'fileupload_fashion';

      var size = { width: 1080, height: 1200 }; 
      var userid = $('#userid').val();
      var picnum = $('#picnum').val();
     
      
       $image_crop.croppie('result', {
                type: 'canvas',
                size: size,
                format:'jpeg'
              }).then(function(response){
                  
                    
                  
                  $.ajax({
                                   url: '<?php echo site_url('user/uploadphoto?currentpage=1')?>',
                                   type: 'post',
                                   data: "imagevalue="+response+"&picnum="+picnum+"&type=1",
                                   dataType: 'html',
                                   success: function (data) { 
  
if(data != 0){
 
 $('#imgview').attr('src', data);
}
 $('.upload-btn-wrapper').hide();
 $('.clk-popup').bPopup().close();
 $('#saveimages').html('Upload');  
                                      
 
                                       
                                    } 




                                });
                  
                  
              });

    




 
      
  });
  
  $(document).ready(function(){
        photo_protection_onload();
    })

    $('input[name=photo_visibility]').on('change',function(){
        var protect = $(this).val();
        if(protect == 1)
        {
            $('#password-protection').show();
        }
        if(protect == 0)
        {
            $('#password-protection').hide();
        }
    })

    function photo_protection_onload()
    {
        var protect = $('input[name=photo_visibility]:checked').val();
        if(protect == 1)
        {
            $('#password-protection').show();
        }
        if(protect == 0)
        {
            $('#password-protection').hide();
        }
    }
</script>