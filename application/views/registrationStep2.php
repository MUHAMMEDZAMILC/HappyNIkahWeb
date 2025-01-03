<!DOCTYPE html>
<html>
<?php include('include/register-header.php'); ?>
    <section id="registerPage">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div id="ERtabV" class="resp-vtabs hor_1">
                        <ul class="resp-tabs-list hor_1">
                            <li class="resp-tab-item hor_1" onclick="window.location.href='<?php echo site_url('registration_step1?currentpage=1'); ?>'">
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
                            <li class="resp-tab-item hor_1 resp-tab-active" onclick="window.location.href='<?php echo site_url('registration_steptwo?currentpage=1'); ?>'">
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
                            <h2 class="resp-accordion hor_1" onclick="window.location.href='registrationStep1.html'">
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
                            <h2 class="resp-accordion hor_1 resp-tab-active"  onclick="window.location.href='registrationStep2.html'">
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
                            <!-- Educational & Physical Attributes -->
                            <div class="resp-tab-content hor_1 resp-tab-content-active">
                                <div class="row">
                                    <div class="col-12 col-lg-10 mx-auto">
                                        <form action="<?php echo site_url('user/register_personal_info'); ?>?currentpage=1" method="post" autocomplete="off" class="customForm" id="personaldetails">
                                            <div class="row">
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Highest Education</label>
                                                    <select id="highest_education" class="form-control custom-select" name="highest_education" required="">
                    <option value="">--Select--</option>
                    <?php foreach ($highest_education as $value) { ?>
                    <option value="<?php echo $value->id ?>" <?= (isset($ProfileDetails->highest_education) && !empty($ProfileDetails->highest_education)) ? ($ProfileDetails->highest_education == $value->id ? 'selected' : '') : '' ?> ><?php echo $value->high_education; ?></option>  
                    <?php } ?>  
                </select>  
                <p id="highest_education_val" ></p>

                                                </div>
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Education</label>
                                                    <select id="education" class="form-control form-select" name="education" required>
                    <option value="">--Select--</option>
                    <?php foreach ($edu_data as $value) { ?>
                  <option value="<?php echo $value->edu_id ?>" <?= (isset($ProfileDetails->education) && !empty($ProfileDetails->education)) ? ($ProfileDetails->education == $value->edu_id ? 'selected' : '') : '' ?> ><?php echo $value->education; ?></option>  

                    <?php } ?> 
                   
                </select> 
                <p id="education_val" ></p>

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Professional Type</label>
                                                    <select id="profession_type" class="form-control form-select" name="profession_type" required="">
                    <option value="">--Select--</option>
                    <?php foreach ($professiontype as $value) { ?>
                    <option value="<?php echo $value->professiontype ?>" <?= (isset($ProfileDetails->job_category) && !empty($ProfileDetails->job_category)) ? ($ProfileDetails->job_category == $value->professiontype ? 'selected' : '') : '' ?> ><?php echo $value->professiontype; ?></option>  
                    <?php } ?>  
                </select>
                <p id="professiontype_val" ></p>

                                                </div>
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Profession</label>
                                                    <select id="profession" class="form-control form-select" name="profession" required="" >
                    <option value="">--Select--</option>
                    <?php foreach ($profession as $value) { ?>
                    <option value="<?php echo $value->profession_id ?>"  <?= (isset($ProfileDetails->occupation) && !empty($ProfileDetails->occupation)) ? ($ProfileDetails->occupation == $value->profession_id ? 'selected' : '') : '' ?> ><?php echo $value->profession_name; ?></option>  
                    <?php } ?>  
                </select>
                <p id="profession_val" ></p>
 
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Height</label>
                                                     <select id="height" class="form-control custom-select" name="height" required="">
                  <option value="">--Select--</option>
                  <?php foreach ($Height as $value) { ?>
                    <option value="<?php echo $value->height_id; ?>" <?= (isset($ProfileDetails->height) && !empty($ProfileDetails->height)) ? ($ProfileDetails->height == $value->height_id ? 'selected' : '') : '' ?>><?php echo $value->height; ?></option>
                    <?php }?>
                </select>  
                                                </div>
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Weight</label>
                                                    <select id="weight" class="form-control form-select" name="weight" required="">
                  <option value="">--Select--</option>
                  <?php foreach ($weight as $value) { ?>
                    <option value="<?php echo $value->weight_id; ?>" <?= (isset($ProfileDetails->weight) && !empty($ProfileDetails->weight)) ? ($ProfileDetails->weight == $value->weight_id ? 'selected' : '') : '' ?>><?php echo $value->weight; ?></option>
                  <?php } ?>
                </select>   
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Skin Color</label>
                                                    <select id="skin_color" class="form-control form-select" name="skin_color">
                  <option value="">--Select--</option>
                  <?php foreach ($skin_color as $value) { ?>
                    <option value="<?php echo $value->skincolor; ?>" <?= (isset($ProfileDetails->color) && !empty($ProfileDetails->color)) ? ($ProfileDetails->color == $value->skincolor ? 'selected' : '') : '' ?>><?php echo $value->skincolor; ?></option>
                  <?php } ?>
                </select>
                                                </div>
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Mother Tounge</label>
                                                    <select id="mothertongue" class="form-control form-select" name="mothertongue">
                  <option value="">--Select--</option>
                  <?php foreach ($mothertongue as $value) { ?>
                    <option value="<?php echo $value->mothertongue_id; ?>" <?= (isset($ProfileDetails->mother_tongue) && !empty($ProfileDetails->mother_tongue)) ? ($ProfileDetails->mother_tongue == $value->mothertongue_id ? 'selected' : '') : '' ?>><?php echo $value->mothertongue; ?></option>
                  <?php } ?>
                </select>  
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Body Type</label>
                                                    <select id="bodytype" class="form-control form-select" name="bodytype">
                  <option value="">--Select--</option>
                  <?php foreach ($bodytype as $value) { ?>
                    <option value="<?php echo $value->bodytype; ?>" <?= (isset($ProfileDetails->bodytype) && !empty($ProfileDetails->bodytype)) ? ($ProfileDetails->bodytype == $value->bodytype ? 'selected' : '') : '' ?>><?php echo $value->bodytype; ?></option>
                  <?php } ?>
                </select>  
                                                </div>
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Apperance</label>
                                                    <select id="appearance" class="form-control form-select" name="appearance">
                  <option value="">--Select--</option>
                  <?php foreach ($appearance as $value) { ?>
                    <option value="<?php echo $value->appearance; ?>" <?= (isset($ProfileDetails->appearance) && !empty($ProfileDetails->appearance)) ? ($ProfileDetails->appearance == $value->appearance ? 'selected' : '') : '' ?>><?php echo $value->appearance; ?></option>
                  <?php } ?>
                </select>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-12 col-md-6 mb-3 mb-md-0">
                                                    <button type="button" class="btn backBtn w-100" onclick="window.location.href='<?php echo site_url('registration_step1?gotoback=1'); ?>'">Back</button>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <button type="button" class="btn cstmBtnColr w-100" onclick="checkvalidation()" >Next</button>
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
    <?php include('include/footer.php'); ?>
<script type="text/javascript">
    $( "#highest_education" ).change(function() {
        var high_education= $('#highest_education').val();
        if( $('#highest_education').val() !='' ) 
        {
            $("#education").empty();
            $("#education").append('<option value="">-Select-</option>');
            $.ajax({
                    url: "<?= site_url() ?>/User/GetEducation",
                    data: {
                      high_education: high_education
                    },
                    type: "POST",
                    success: function(data) {
                        $("#education").html(data);
                        $('#education').change();
                    }
                });
           
        }  
    });
       function checkvalidation(){

            var highest_education = $('#highest_education').val();

            var education = $('#education').val();
            var professiontype = $('#profession_type').val();
            var occupation = $('#profession').val();
            var height = $('#height').val();
            var weight = $('#weight').val();

            if(highest_education == ''){ 
                $('#highest_education_val').html('<font color="red" >Field Required</font>'); 
            }
            else if(education == '')
            { 
                $('#education_val').html('<font color="red" >Field Required</font>');
            }else if(professiontype == '')
            { 
                $('#professiontype_val').html('<font color="red" >Field Required</font>');
            }else if(occupation == '')
            { 
                $('#profession_val').html('<font color="red" >Field Required</font>');
            }
                else{ $( "#personaldetails" ).submit();}
       }
    </script>
</body>
</html>