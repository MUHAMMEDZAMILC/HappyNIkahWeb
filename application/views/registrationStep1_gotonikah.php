<!DOCTYPE html>
<html>
<?php include('include/register-header-gotonikah.php'); ?>
    <section id="registerPage">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div id="ERtabV" class="resp-vtabs hor_1">
                        <ul class="resp-tabs-list hor_1">
                            <li class="resp-tab-item hor_1 resp-tab-active" onclick="window.location.href='<?php echo site_url('user/registration_step1_gotonikah?currentpage=1'); ?>'">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="circleNo">
                                            <span>1</span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                       <p class="menuHead">Basic Information</p>
                                    </div>
                                </div>
                            </li>
                            <li class="resp-tab-item hor_1" style="pointer-events: none;">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="circleNo">
                                            <span>2</span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                       <p class="menuHead">Educational & Physical Attributes</p>
                                    </div>
                                </div>
                            </li>
                            <li class="resp-tab-item hor_1" style="pointer-events: none;">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="circleNo">
                                            <span>3</span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                       <p class="menuHead">Location & Contact details</p>
                                    </div>
                                </div>
                            </li>
                            <li class="resp-tab-item hor_1" style="pointer-events: none;">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="circleNo">
                                            <span>4</span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                       <p class="menuHead">Profile Description</p>
                                    </div>
                                </div>
                            </li>
                        </ul> 
                        <div class="resp-tabs-container hor_1">
                            <h2 class="resp-accordion hor_1 resp-tab-active" onclick="window.location.href='registrationStep1.html'">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="circleNo">
                                            <span>1</span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                       <p class="menuHead">Basic Information</p>
                                    </div>
                                </div>
                            </h2>
                            <!-- Basic Information -->
                            <div class="resp-tab-content hor_1 resp-tab-content-active">
                                <div class="row">
                                    <div class="col-12 col-lg-10 mx-auto">
                                        <form action="<?php echo site_url('user/register_basicinfo_gotonikah'); ?>?currentpage=1" method="post" autocomplete="off" class="customForm" id="bascidetails">

                                            <div class="row">
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Marital Status</label>
                                                    <select class="form-select form-control" aria-label="" id="marital_status" name="marital_status" required="">
                                                    <option value="">--Select--</option>
                    <?php foreach ($maritalstatus as $value) { ?>
                    <option value="<?php echo $value->maritalstatus ?>"  <?= (isset($BasicDetails->marital_status) && !empty($BasicDetails->marital_status)) ? ($BasicDetails->marital_status == $value->maritalstatus ? 'selected' : '') : '' ?> ><?php echo $value->maritalstatus; ?></option>  
                    <?php } ?>
                                                    </select>
                                                    <p id="marital_status_val" ></p>
                                                </div>
                                                <div class="col-12 col-md-6 mb-3"  style="<?= (isset($BasicDetails->marital_status) && !empty($BasicDetails->marital_status)) ? ($BasicDetails->marital_status != 'Unmarried' ? '' : 'display:none') : 'display:none' ?>" id="for_marital_status">
                                                    <label class="form-label">No. of Children</label>
                                                    <select id="no_of_children" class="form-control" name="no_of_children"  >
                  <option value="">--Select--</option>
                  <?php for ($i=1; $i <=7 ; $i++) {  ?>
                    <option value="<?php echo $i; ?>" <?= (isset($BasicDetails->no_of_children) && !empty($BasicDetails->no_of_children)) ? ($BasicDetails->no_of_children == $i ? 'selected' : '') : '' ?> ><?php echo $i;?></option>
                  <?php } ?>
                </select>    
                                                                <p id="marital_status_val" ></p>
                                            </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Physically challanged</label>
                                                    <select class="form-select form-control" aria-label=""  id="physically_challenged" name="physically_challenged" required="">
                                                    <option value="">--Select--</option>
                  <option value="Physically Challenged"  <?= (isset($BasicDetails->physical_status) && !empty($BasicDetails->physical_status)) ? ($BasicDetails->physical_status == 'Physically Challenged' ? 'selected' : '') : '' ?>>Physically Challenged</option>
                  <option value="Normal"  <?= (isset($BasicDetails->physical_status) && !empty($BasicDetails->physical_status)) ? ($BasicDetails->physical_status == 'Normal' ? 'selected' : '') : '' ?>>Normal</option>
             
                                                    </select>
                                                    <p id="physically_challenged_val" ></p>

                                                </div>
                                                <div id="for_physically_challenged" style="<?= (isset($BasicDetails->physical_status) && !empty($BasicDetails->physical_status)) ? ($BasicDetails->physical_status == 'Physically Challenged' ? '' : 'display:none') : 'display:none' ?>">
                                                <div class="row">
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Physical Status</label>
                                                    <select class="form-select form-control" aria-label="" name="physical_status" id="physical_status">
                                                    <option value="">--Select--</option>
                    <?php foreach ($physicalstatus as $value) { ?>
                    <option value="<?php echo $value->id ?>" <?= (isset($BasicDetails->disability) && !empty($BasicDetails->disability)) ? ($BasicDetails->disability== $value->id ? 'selected' : '') : '' ?>><?php echo $value->physicalstatus; ?></option>  
                    <?php } ?>
                                                    </select>
                                                </div>
                                           
                                            
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Disability</label>
                                                    <input type="text" class="form-control" placeholder="" id="disability" name="disability" value="<?= !empty($BasicDetails->registration_phychallenge)? $BasicDetails->registration_phychallenge : '' ?>" >
                                                </div>
                                            </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Religion</label>
                                                    <select class="form-select form-control" aria-label="" id="religion" name="religion">
                    <?php foreach ($religion as $value) { ?>
                    <option value="<?php echo $value->rid ?>" <?= (isset($BasicDetails->religion) && !empty($BasicDetails->religion)) ? ($BasicDetails->religion == $value->rid ? 'selected' : '') : '' ?>><?php echo $value->religion; ?></option>  
                    <?php } ?>  
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Belief</label>
                                                    <select class="form-select form-control" aria-label="" name="belief" id="belief" >
                                                    <option value="">--Select--</option>
                    <?php foreach ($belief as $value) { ?>
                    <option value="<?php echo $value->cid ?>" <?= (isset($BasicDetails->caste) && !empty($BasicDetails->caste)) ? ($BasicDetails->caste== $value->cid ? 'selected' : '') : '' ?>><?php echo $value->caste; ?></option>  
                    <?php } ?>  
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                            <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Nationality</label>
                                                    <select id="nationality" class="form-select form-control" name="nationality" required="" >
                    <option value="">--Select--</option>
                    <?php foreach ($country as $value) { ?>
                    <option value="<?php echo $value->id ?>" <?= (isset($BasicDetails->nationality) && !empty($BasicDetails->nationality)) ? ($BasicDetails->nationality == $value->id ? 'selected' : '') : '' ?>><?php echo $value->name; ?></option>  
                    <?php } ?>
                  
                </select>
                                                </div>
                                                <div class="col-12 col-md-6 mb-3">
                                                <label class="form-label">DOB</label>
                                                <input type="text" class="form-control" placeholder="Date of Birth" id="dob" name="dob" title="Date of Birth" min="1962-01-01" max="2004-12-30" value="<?= !empty($BasicDetails->dob)? $BasicDetails->dob : '' ?>" >
                                                 </div>
                                    </div>
                                            <div class="row">
                                                <div class="col-12 col-md-6 ms-auto">
                                                    <button type="button" class="btn cstmBtnColr w-100" onclick="checkvalidation()" id="submitbtn">Next</button>
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
                                            <span>2</span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                       <p class="menuHead">Educational & Physical Attributes</p>
                                    </div>
                                </div>
                            </h2>
                            <h2 class="resp-accordion hor_1" style="pointer-events: none;">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="circleNo">
                                            <span>3</span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                       <p class="menuHead">Location & Contact details</p>
                                    </div>
                                </div>
                            </h2>
                            <h2 class="resp-accordion hor_1" style="pointer-events: none;">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="circleNo">
                                            <span>4</span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                       <p class="menuHead">Profile Description</p>
                                    </div>
                                </div>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    
    <style>
        #registerPage .resp-tab-active .menuHead 
        {
      color: #5aba47;
     }
     #registerPage .resp-tab-active .circleNo span 
     {
    color: #5aba47;
    }
    
    #registerPage .resp-tab-active .circleNo
    {
    border: 2px solid #5aba47;
    }
    </style>
    
    <?php include('include/footer_gotonikah.php'); ?>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/jquery-ui/jquery-ui.css"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery-ui/jquery-ui.js"></script>

<script  type="text/javascript">
      $('#dob').datepicker({ 
        dateFormat: 'yy-mm-dd',
        minDate: '1980-01-01',
        maxDate: '2000-12-31',
            onSelect: function(value, ui) {
                var today = new Date();
                age = today.getFullYear() - ui.selectedYear;
                $('#age').val(age);
            },
            changeMonth: true,
            changeYear: true
        });
    $( "#marital_status" ).change(function() {
      var mstatus = $('#marital_status').val();
      if(mstatus=="Unmarried")
      {
        $("#for_marital_status").hide();
        $('#no_of_children').val("");

      }
      else{
        $("#for_marital_status").show();
      }
    }); 
    $( "#physically_challenged" ).change(function() {
      var pchallenged = $('#physically_challenged').val();
      if(pchallenged=="Physically Challenged")
      {
        $("#for_physically_challenged").show();
        
      }
      else{
        $("#for_physically_challenged").hide();
        $('#physical_status').val("");
        $('#disability').val("");

      }
    });
    </script>
     <script type="text/javascript">
        
        function checkvalidation(){

            var marital_status = $('#marital_status').val();

            var physically_challenged = $('#physically_challenged').val();

            if(marital_status == ''){ 
                $('#marital_status_val').html('<font color="red" >Field Required</font>'); 
            }
            else if(physically_challenged == '')
            { 
                $('#physically_challenged_val').html('<font color="red" >Field Required</font>');
                              }
                else{ $( "#bascidetails" ).submit();}
       }
    </script>
</body>
</html>