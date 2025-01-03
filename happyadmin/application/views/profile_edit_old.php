<!DOCTYPE html>
<?php include('header.php'); ?>
<?php include('menu.php'); ?>
    
    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <h1 class="app-page-title">Edit Profile</h1>
                <div class="row gy-4">
	                <div class="col-12 col-lg-6">
					<form action="<?php echo site_url('admin/register/Register/'.$ProfileDetails['id']); ?>" method="post" autocomplete="off">

		                <div class="app-card app-card-settings shadow-sm d-flex flex-column align-items-start">
						    <div class="app-card-header p-3 border-bottom-0">
						        <div class="row align-items-center gx-3">
							        <div class="col-auto">
								        <div class="app-icon-holder">
										    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
</svg>
									    </div><!--//icon-holder-->
						                
							        </div><!--//col-->
							        <div class="col-auto">
								        <h4 class="app-card-title">Basic Information</h4>
							        </div><!--//col-->
						        </div><!--//row-->
						    </div><!--//app-card-header-->
						    <div class="app-card-body px-4 w-100">
								    <div class="mb-3">
									    <label for="setting-input-1" class="form-label"> Name<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info."><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
  <circle cx="8" cy="4.5" r="1"/>
</svg></span><font color="red">*</font></label>
<input type="hidden" name="userid" value="<?php echo $ProfileDetails['id'];?>" >
<input type="text" id="name" class="form-control" name="name" required="" value="<?= !empty($ProfileDetails['name'])? $ProfileDetails['name'] : '' ?>">
									</div>
									<div class="mb-3">
									    <label for="setting-input-2" class="form-label">Gender<font color="red">*</font></label>
						<input type="radio" id="male" name="gender" value="1" <?= (isset($ProfileDetails['gender']) && !empty($ProfileDetails['gender'])) ? ($ProfileDetails['gender'] == 1 ? 'checked' : '') : '' ?> required>Male
                        <label for="male">
                        </label>
						<input type="radio" id="female" name="gender" value="2" <?= (isset($ProfileDetails['gender']) && !empty($ProfileDetails['gender'])) ? ($ProfileDetails['gender'] == 2 ? 'checked' : '') : '' ?> required>Female
                        <label for="female">
                        </label>									</div>
						           
						<div class="mb-3">
                <label for="setting-input-3"  class="form-label">Phone <font color="red">*</font></label>
                <div class="row">
                  <div class="col-md-5">
                <select id="country_code" class="form-control custom-select" name="country_code" required>
                  <option value="">--Select--</option>
                  <?php foreach ($country as $value) { ?>
                    <option value="<?php echo $value->id; ?>" <?= (isset($ProfileDetails['secondary_code']) && !empty($ProfileDetails['secondary_code'])) ? ($ProfileDetails['secondary_code'] == $value->id ? 'selected' : '') : '' ?>><?php echo $value->name."(+".$value->country_code.")"; ?></option>
                  <?php } ?>
                </select> 
                  </div>
                  <div class="col-md-7">
                   <input type="text" id="phone" class="form-control" name="phone" required="" pattern="[6-9]{1}[0-9]{9}" 
       title="Phone number with 6-9 and remaing 9 digit with 0-9" value="<?= !empty($ProfileDetails['phone'])? $ProfileDetails['phone'] : '' ?>">
              </div>
			</div>
		</div>
			  <div class="mb-3">
                <label for="setting-input-3"  class="form-label">Date of Birth <font color="red">*</font></label>
                <input type="text" class="form-control" id="dob" name="dob" required="" value="<?= !empty($ProfileDetails['dob'])? $ProfileDetails['dob'] : '' ?>">
              </div>
              <div class="form-group">
                <label for="setting-input-4"  class="form-label">Age <font color="red">*</font></label>
                <input type="text" class="form-control" id="age" name="age" readonly="" value="<?= !empty($ProfileDetails['age'])? $ProfileDetails['age'] : '' ?>">
           
              </div>
			  <div class="mb-3">
                <label for="setting-input-5"  class="form-label">Source </label>
                <input type="text" id="source" class="form-control" name="source" value="<?= !empty($ProfileDetails['source'])? $ProfileDetails['source'] : '' ?>">
              </div>
			  <div class="mb-3">
                <label for="setting-input-6"  class="form-label">Marital Status <font color="red">*</font></label>
                <select id="marital_status" class="form-control" name="marital_status" required="">
                    <option value="">--Select--</option>
                    <?php foreach ($maritalstatus as $value) { ?>
                    <option value="<?php echo $value->maritalstatus ?>" <?= (isset($ProfileDetails['marital_status']) && !empty($ProfileDetails['marital_status'])) ? ($ProfileDetails['marital_status'] == $value->maritalstatus ? 'selected' : '') : '' ?>><?php echo $value->maritalstatus; ?></option>  
                    <?php } ?>
                  
                </select>
              </div>
              <div class="form-group" style="display:none" id="for_marital_status">
                <label for="setting-input-7"  class="form-label">No of Children </label>
                <select id="no_of_children" class="form-control custom-select" name="no_of_children"  >
                  <option value="">--Select--</option>
                  <?php for ($i=1; $i <=7 ; $i++) {  ?>
                    <option value="<?php echo $i; ?>" <?= (isset($ProfileDetails['no_of_children']) && !empty($ProfileDetails['no_of_children'])) ? ($ProfileDetails['no_of_children'] == $i ? 'selected' : '') : '' ?>><?php echo $i; ?></option>
                  <?php } ?>
                </select>
              </div>
			  <div class="mb-3">
                <label for="setting-input-8"  class="form-label">Physically Challenged  <font color="red">*</font></label>
                <select id="physically_challenged" class="form-control custom-select" name="physically_challenged" required="">
                  <option value="">--Select--</option>
                  <option value="Physically Challenged" <?= (isset($ProfileDetails['physical_status']) && !empty($ProfileDetails['physical_status'])) ? (($ProfileDetails['physical_status'] == 'Physically Challenged') ? 'selected' : '') : '' ?>>Physically Challenged</option>
                  <option value="Normal" <?= (isset($ProfileDetails['physical_status']) && !empty($ProfileDetails['physical_status'])) ? (($ProfileDetails['physical_status'] == 'Normal') ? 'selected' : '') : '' ?>>Normal</option>
                </select>
              </div>
              <?php if($ProfileDetails['physical_status']!="Normal")
              {?>
              <div id="for_physically_challenged" >

			  <div class="mb-3">
                <label for="setting-input-9"  class="form-label">Physical status  </label>
                <select id="physical_status" class="form-control custom-select" name="physical_status" >
                    <option value="">--Select--</option>
                    <?php foreach ($physicalstatus as $value) { ?>
                    <option value="<?php echo $value->id ?>" <?= (isset($ProfileDetails['disability']) && !empty($ProfileDetails['disability'])) ? ($ProfileDetails['disability'] == $value->id ? 'selected' : '') : '' ?>><?php echo $value->physicalstatus; ?></option>  
                    <?php } ?>
                  
                </select>
              </div>
			  <div class="mb-3">
                <label for="setting-input-10"  class="form-label">Disability Box </label>
                <input type="text" id="disability" class="form-control" name="disability" value="<?= !empty($ProfileDetails['registration_phychallenge'])? $ProfileDetails['registration_phychallenge'] : '' ?>">
              </div>
                    </div>
                    <?php }else{?>
                      <div id="for_physically_challenged" style="display:none">

<div class="mb-3">
        <label for="setting-input-9"  class="form-label">Physical status  </label>
        <select id="physical_status" class="form-control custom-select" name="physical_status" >
            <option value="">--Select--</option>
            <?php foreach ($physicalstatus as $value) { ?>
            <option value="<?php echo $value->id ?>" <?= (isset($ProfileDetails['disability']) && !empty($ProfileDetails['disability'])) ? ($ProfileDetails['disability'] == $value->id ? 'selected' : '') : '' ?>><?php echo $value->physicalstatus; ?></option>  
            <?php } ?>
          
        </select>
      </div>
<div class="mb-3">
        <label for="setting-input-10"  class="form-label">Disability Box </label>
        <input type="text" id="disability" class="form-control" name="disability" value="<?= !empty($ProfileDetails['registration_phychallenge'])? $ProfileDetails['registration_phychallenge'] : '' ?>">
      </div>
            </div>
                      <?php }?>
					<div class="mb-3">
                <label for="setting-input-11"  class="form-label">Nationality <font color="red">*</font></label>
                <select id="nationality" class="form-control custom-select" name="nationality" required="" >
                    <option value="">--Select--</option>
                    <?php foreach ($country as $value) { ?>
                    <option value="<?php echo $value->id ?>" <?= (isset($ProfileDetails['nationality']) && !empty($ProfileDetails['nationality'])) ? ($ProfileDetails['nationality'] == $value->id ? 'selected' : '') : '' ?>><?php echo $value->name; ?></option>  
                    <?php } ?>
                  
                </select>
              </div>
			  
								   
						    </div><!--//app-card-body-->
						  
							<div class="app-card-header p-3 border-bottom-0">
						        <div class="row align-items-center gx-3">
							        <div class="col-auto">
								        <div class="app-icon-holder">
										    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-sliders" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M11.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM9.05 3a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0V3h9.05zM4.5 7a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM2.05 8a2.5 2.5 0 0 1 4.9 0H16v1H6.95a2.5 2.5 0 0 1-4.9 0H0V8h2.05zm9.45 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm-2.45 1a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0v-1h9.05z"/>
</svg>
									    </div><!--//icon-holder-->
						                
							        </div><!--//col-->
							        <div class="col-auto">
								        <h4 class="app-card-title">Religious details</h4>
							        </div><!--//col-->
						        </div><!--//row-->
						    </div><!--//app-card-header-->
							<div class="app-card-body px-4 w-100 ">
							<div class="mb-3">
                <label for="inputName"  class="form-label">Religion<font color="red">*</font></label>
                <select id="religion" class="form-control custom-select" name="religion" required="">
                    <option value="">--Select--</option>
                    <?php foreach ($religion as $value) { ?>
                    <option value="<?php echo $value->rid ?>" <?= (isset($ProfileDetails['religion']) && !empty($ProfileDetails['religion'])) ? ($ProfileDetails['religion'] == $value->rid ? 'selected' : '') : '' ?>><?php echo $value->religion; ?></option>  
                    <?php } ?>  
                </select>        
                    </div> 
					<div class="mb-3">
                <label for="inputName"  class="form-label">Belief<font color="red">*</font></label>
                <select id="belief" class="form-control custom-select" name="belief" required="">
                    <option value="">--Select--</option>
                    <?php foreach ($belief as $value) { ?>
                    <option value="<?php echo $value->cid ?>" <?= (isset($ProfileDetails['caste']) && !empty($ProfileDetails['caste'])) ? ($ProfileDetails['caste'] == $value->cid ? 'selected' : '') : '' ?>><?php echo $value->caste; ?></option>  
                    <?php } ?>  
                </select>                </div>
							</div><!---//app-card-body-->
							<div class="app-card-header p-3 border-bottom-0">
						        <div class="row align-items-center gx-3">
							        <div class="col-auto">
								        <div class="app-icon-holder">
										    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-sliders" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M11.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM9.05 3a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0V3h9.05zM4.5 7a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM2.05 8a2.5 2.5 0 0 1 4.9 0H16v1H6.95a2.5 2.5 0 0 1-4.9 0H0V8h2.05zm9.45 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm-2.45 1a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0v-1h9.05z"/>
</svg>
									    </div><!--//icon-holder-->
						                
							        </div><!--//col-->
							        <div class="col-auto">
								        <h4 class="app-card-title">Education and Professional Details </h4>
							        </div><!--//col-->
						        </div><!--//row-->
						    </div><!--//app-card-header-->
							<div class="app-card-body px-4 w-100">
							<div class="mb-3">
                <label for="inputName" class="form-label">Highest Education<font color="red">*</font></label>
                <select id="highest_education" class="form-control custom-select" name="highest_education" required="">
                    <option value="">--Select--</option>
                    <?php foreach ($highest_education as $value) { ?>
                    <option value="<?php echo $value->id ?>" <?= (isset($ProfileDetails['highest_education']) && !empty($ProfileDetails['highest_education'])) ? ($ProfileDetails['highest_education'] == $value->id ? 'selected' : '') : '' ?> ><?php echo $value->high_education; ?></option>  
                    <?php } ?>  
                </select>                 </div> 
				<div class="mb-3" class="form-label">
                <label for="inputName" class="form-label">Education<font color="red">*</font></label>
                <select id="education" class="form-control custom-select" name="education" required >
                <?php foreach ($edu_data as $value) { ?>
                  <option value="<?php echo $value->edu_id ?>" <?= (isset($ProfileDetails['education']) && !empty($ProfileDetails['education'])) ? ($ProfileDetails['education'] == $value->edu_id ? 'selected' : '') : '' ?> ><?php echo $value->education; ?></option>  

                    <?php } ?>  
                </select>               </div>
				<div class="mb-3">
                <label for="inputName" class="form-label">Profession Type<font color="red">*</font></label>
                <select id="profession_type" class="form-control custom-select" name="profession_type" required="">
                    <option value="">--Select--</option>
                    <?php foreach ($professiontype as $value) { ?>
                    <option value="<?php echo $value->professiontype ?>" <?= (isset($ProfileDetails['job_category']) && !empty($ProfileDetails['job_category'])) ? ($ProfileDetails['job_category'] == $value->professiontype ? 'selected' : '') : '' ?>  ><?php echo $value->professiontype; ?></option>  
                    <?php } ?>  
                </select>               </div>
                <div class="mb-3">
                <label for="inputName" class="form-label">Profession<font color="red">*</font></label>
                <select id="profession" class="form-control custom-select" name="profession" required="" >
                    <option value="">--Select--</option>
                    <?php foreach ($profession as $value) { ?>
                    <option value="<?php echo $value->profession_id ?>"  <?= (isset($ProfileDetails['occupation']) && !empty($ProfileDetails['occupation'])) ? ($ProfileDetails['occupation'] == $value->profession_id ? 'selected' : '') : '' ?> ><?php echo $value->profession_name; ?></option>  
                    <?php } ?>  
                </select>              </div>
				<div class="mb-3">
                <label for="inputName" class="form-label">Job Details<font color="red">*</font></label>
                <textarea  id="job_details" class="form-control" required="" name="job_details" ><?= !empty($ProfileDetails['job_details']) && $ProfileDetails['job_details'] != 'NULL'? $ProfileDetails['job_details'] : '' ?></textarea>
             </div>
             <div class="mb-3" class="form-label">
                <label for="inputName" class="form-label">Annual Income</label>
                <select id="annual_income" class="form-control custom-select" name="annual_income" >
                <?php foreach ($income as $value) { ?>
                  <option value="<?php echo $value->income_id ?>" <?= (isset($ProfileDetails['annual_income']) && !empty($ProfileDetails['annual_income'])) ? ($ProfileDetails['annual_income'] == $value->edu_id ? 'selected' : '') : '' ?> ><?php echo $value->income; ?></option>  

                    <?php } ?>  
                </select>               </div>
							</div><!---//app-card-body-->
              <div class="app-card-header p-3 border-bottom-0">
						        <div class="row align-items-center gx-3">
							        <div class="col-auto">
								        <div class="app-icon-holder">
										    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-sliders" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M11.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM9.05 3a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0V3h9.05zM4.5 7a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM2.05 8a2.5 2.5 0 0 1 4.9 0H16v1H6.95a2.5 2.5 0 0 1-4.9 0H0V8h2.05zm9.45 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm-2.45 1a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0v-1h9.05z"/>
</svg>
									    </div><!--//icon-holder-->
						                
							        </div><!--//col-->
							        <div class="col-auto">
								        <h4 class="app-card-title">Physical Attributes </h4>
							        </div><!--//col-->
						        </div><!--//row-->
						    </div><!--//app-card-header-->
							<div class="app-card-body px-4 w-100">
							<div class="mb-3">
                <label for="inputName" class="form-label">Hight<font color="red">*</font></label>
                <select id="height" class="form-control custom-select" name="height" required="">
                  <option value="">--Select--</option>
                  <?php foreach ($Height as $value) { ?>
                    <option value="<?php echo $value->height_id; ?>" <?= (isset($ProfileDetails['height']) && !empty($ProfileDetails['height'])) ? ($ProfileDetails['height'] == $value->height_id ? 'selected' : '') : '' ?>><?php echo $value->height; ?></option>
                  <?php } ?>
                </select>              </div> 
				<div class="mb-3">
                <label for="inputName" class="form-label">Weight<font color="red">*</font></label>
                <select id="weight" class="form-control custom-select" name="weight" required="">
                  <option value="">--Select--</option>
                  <?php foreach ($weight as $value) { ?>
                    <option value="<?php echo $value->weight_id; ?>" <?= (isset($ProfileDetails['wid']) && !empty($ProfileDetails['wid'])) ? ($ProfileDetails['wid'] == $value->weight_id ? 'selected' : '') : '' ?>><?php echo $value->weight; ?></option>
                  <?php } ?>
                </select>               </div>
				<div class="mb-3">
                <label for="inputName" class="form-label">Skin Color</label>
                <select id="skin_color" class="form-control custom-select" name="skin_color">
                  <option value="">--Select--</option>
                  <?php foreach ($skin_color as $value) { ?>
                    <option value="<?php echo $value->skincolor; ?>" <?= (isset($ProfileDetails['color']) && !empty($ProfileDetails['color'])) ? ($ProfileDetails['color'] == $value->skincolor ? 'selected' : '') : '' ?>><?php echo $value->skincolor; ?></option>
                  <?php } ?>
                </select>               </div>
             
				<div class="mb-3">
                <label for="inputName" class="form-label">Mother Tounge</label>
                <select id="mothertongue" class="form-control custom-select" name="mothertongue">
                  <option value="">--Select--</option>
                  <?php foreach ($mothertongue as $value) { ?>
                    <option value="<?php echo $value->mothertongue_id; ?>" <?= (isset($ProfileDetails['mother_tongue']) && !empty($ProfileDetails['mother_tongue'])) ? ($ProfileDetails['mother_tongue'] == $value->mothertongue_id ? 'selected' : '') : '' ?>><?php echo $value->mothertongue; ?></option>
                  <?php } ?>
                </select>  
                   </div>
                   <div class="mb-3">
                <label for="inputName" class="form-label">Blood Group</label>
                <select id="bloodgroup" class="form-control custom-select" name="bloodgroup">
                  <option value="">--Select--</option>
                  <?php foreach ($bloodgroup as $value) { ?>
                    <option value="<?php echo $value->id; ?>" <?= (isset($ProfileDetails['blood_group']) && !empty($ProfileDetails['blood_group'])) ? ($ProfileDetails['blood_group'] == $i ? 'selected' : '') : '' ?>><?php echo $value->bloodgroup; ?></option>
                  <?php } ?>
                </select>  
                   </div>
				   <div class="mb-3">
            
                <label for="inputName" class="form-label">Body Type</label>
                <select id="bodytype" class="form-control custom-select" name="bodytype">
                  <option value="">--Select--</option>
                  <?php foreach ($bodytype as $value) { ?>
                    <option value="<?php echo $value->bodytype; ?>" <?= (isset($ProfileDetails['bodytype']) && !empty($ProfileDetails['bodytype'])) ? ($ProfileDetails['bodytype'] == $value->bodytype ? 'selected' : '') : '' ?>><?php echo $value->bodytype; ?></option>
                  <?php } ?>
                </select>               </div>
				<div class="mb-3">
                <label for="inputName" class="form-label">Appearance</label>
                <select id="appearance" class="form-control custom-select" name="appearance">
                  <option value="">--Select--</option>
                  <?php foreach ($appearance as $value) { ?>
                    <option value="<?php echo $value->appearance; ?>" <?= (isset($ProfileDetails['appearance']) && !empty($ProfileDetails['appearance'])) ? ($ProfileDetails['appearance'] == $value->appearance ? 'selected' : '') : '' ?>><?php echo $value->appearance; ?></option>
                  <?php } ?>
                </select>                </div>
                    
							</div><!---//app-card-body-->
              <div class="app-card-header p-3 border-bottom-0">
						        <div class="row align-items-center gx-3">
							        <div class="col-auto">
								        <div class="app-icon-holder">
										    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-sliders" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M11.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM9.05 3a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0V3h9.05zM4.5 7a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM2.05 8a2.5 2.5 0 0 1 4.9 0H16v1H6.95a2.5 2.5 0 0 1-4.9 0H0V8h2.05zm9.45 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm-2.45 1a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0v-1h9.05z"/>
</svg>
									    </div><!--//icon-holder-->
						                
							        </div><!--//col-->
							        <div class="col-auto">
								        <h4 class="app-card-title">Location and Contact Details</h4>
							        </div><!--//col-->
						        </div><!--//row-->
						    </div><!--//app-card-header-->
							<div class="app-card-body px-4 w-100">
							<div class="mb-3">
                <label for="inputName" class="form-label">Home Country</label>
                <select id="country" class="form-control custom-select" name="country" >
                  <option value="">--Select--</option>
                  <?php foreach ($country as $value) { ?>
                    <option value="<?php echo $value->id; ?>" <?= (isset($ProfileDetails['home_country']) && !empty($ProfileDetails['home_country'])) ? ($ProfileDetails['home_country'] == $value->id ? 'selected' : '') : '' ?>><?php echo $value->name; ?></option>
                  <?php } ?>
                </select>                </div> 
				<div class="mb-3">
                <label for="inputName" class="form-label">Home State</label>
                <select id="states" class="form-control custom-select" name="states" >
                <?php foreach ($homestates as $value) { ?>
                    <option value="<?php echo $value->id; ?>" <?= (isset($ProfileDetails['home_state']) && !empty($ProfileDetails['home_state'])) ? ($ProfileDetails['home_state'] == $value->id ? 'selected' : '') : '' ?>><?php echo $value->name; ?></option>
                  <?php } ?>
                 
                </select>                 </div>
               
				<div class="mb-3">
                <label for="inputName" class="form-label">Home District</label>
                <select id="districts"  name="districts" class="form-control">
                <?php foreach ($homedistricts as $value) { ?>
                    <option value="<?php echo $value->district_id; ?>" <?= (isset($ProfileDetails['home_district']) && !empty($ProfileDetails['home_district'])) ? ($ProfileDetails['home_district'] == $value->district_id ? 'selected' : '') : '' ?>><?php echo $value->district; ?></option>
                  <?php } ?>                 
                </select>                 </div>
				<div class="mb-3">
                <label for="inputName" class="form-label">Home City</label>
                <select id="city" class="form-control custom-select" name="city">
                <?php foreach ($homecity as $value) { ?>
                    <option value="<?php echo $value->id; ?>" <?= (isset($ProfileDetails['home_city']) && !empty($ProfileDetails['home_city'])) ? ($ProfileDetails['home_city'] == $value->id ? 'selected' : '') : '' ?>><?php echo $value->name; ?></option>
                  <?php } ?>                   
                </select>                 </div>
				<div class="mb-3">
                <label for="inputName" class="form-label">Present Country</label>
                <select id="present_country"  class="form-control custom-select" name="present_country">
                  <option value="">--Select--</option>
                  <?php foreach ($country as $value) { ?>
                    <option value="<?php echo $value->id; ?>" <?= (isset($ProfileDetails['country']) && !empty($ProfileDetails['country'])) ? ($ProfileDetails['country'] == $value->id ? 'selected' : '') : '' ?>><?php echo $value->name; ?></option>
                  <?php } ?>
                </select>                </div> 
				<div class="mb-3">
                <label for="inputName" class="form-label">Present State</label>
                <select id="present_states" class="form-control custom-select" name="present_states">
                  <option value="">--Select--</option>
                  <?php foreach ($states as $value) { ?>
                    <option value="<?php echo $value->id; ?>" <?= (isset($ProfileDetails['state']) && !empty($ProfileDetails['state'])) ? ($ProfileDetails['state'] == $value->id ? 'selected' : '') : '' ?>><?php echo $value->name; ?></option>
                  <?php } ?>
                </select>                 </div>
               
				<div class="mb-3">
                <label for="inputName" class="form-label">Present District</label>
                <select id="present_district"  class="form-control custom-select" name="present_district">
                  <option value="">--Select--</option>
                  <?php foreach ($districts as $value) { ?>
                    <option value="<?php echo $value->district_id; ?>" <?= (isset($ProfileDetails['home_district']) && !empty($ProfileDetails['home_district'])) ? ($ProfileDetails['home_district'] == $value->district_id ? 'selected' : '') : '' ?>><?php echo $value->district; ?></option>
                  <?php } ?> 
                </select>                 </div>
				<div class="mb-3">
                <label for="inputName" class="form-label">Present City</label>
                <select id="present_city"  class="form-control custom-select" name="present_city">
                  <option value="">--Select--</option>
                  <?php foreach ($city as $value) { ?>
                    <option value="<?php echo $value->id; ?>" <?= (isset($ProfileDetails['home_city']) && !empty($ProfileDetails['home_city'])) ? ($ProfileDetails['home_city'] == $value->id ? 'selected' : '') : '' ?>><?php echo $value->name; ?></option>
                  <?php } ?> 
                </select>                 </div>
            
				<div class="mb-3">
                <label for="inputName" class="form-label">Secondary Number</label>
                <div class="row">
                  <div class="col-md-5">
                    <select id="secondary_code" class="form-control custom-select" name="secondary_code">
                  <option value="">--Select--</option>
                  <?php foreach ($country as $value) { ?>
                    <option value="<?php echo $value->id; ?>" <?= (isset($ProfileDetails['secondary_code']) && !empty($ProfileDetails['secondary_code'])) ? ($ProfileDetails['secondary_code'] == $value->id ? 'selected' : '') : '' ?>><?php echo $value->name."(+".$value->country_code.")"; ?></option>
                  <?php } ?>
                </select> 
              </div>
			  <div class="col-md-7">
                <input type="text" id="secondary_number" class="form-control" name="secondary_number" id="sec_phone_number" value="<?= !empty($ProfileDetails['other_contact_number']) && $ProfileDetails['other_contact_number'] != 'NULL'? $ProfileDetails['other_contact_number'] : '' ?>">
                  </div>
                 </div>              </div>
				 <div class="mb-3">
                <label for="inputName" class="form-label">Email</label>
                <input type="email" id="email" class="form-control" name="email" value="<?= !empty($ProfileDetails['mail']) && $ProfileDetails['mail'] != 'NULL'? $ProfileDetails['mail'] : '' ?>">
              </div> 
			  <div class="mb-3">
                <label for="inputName" class="form-label">Address<font color="red">*</font></label>
                <textarea  id="address" class="form-control" required="" name="address" ><?= !empty($ProfileDetails['address']) && $ProfileDetails['address'] != 'NULL'? $ProfileDetails['address'] : '' ?></textarea>
              </div>
                    
							</div><!---//app-card-body-->
              <div class="app-card-header p-3 border-bottom-0">
						        <div class="row align-items-center gx-3">
							        <div class="col-auto">
								        <div class="app-icon-holder">
										    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-sliders" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M11.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM9.05 3a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0V3h9.05zM4.5 7a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM2.05 8a2.5 2.5 0 0 1 4.9 0H16v1H6.95a2.5 2.5 0 0 1-4.9 0H0V8h2.05zm9.45 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm-2.45 1a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0v-1h9.05z"/>
</svg>
									    </div><!--//icon-holder-->
						                
							        </div><!--//col-->
							        <div class="col-auto">
								        <h4 class="app-card-title">Family Details</h4>
							        </div><!--//col-->
						        </div><!--//row-->
						    </div><!--//app-card-header-->
							<div class="app-card-body px-4 w-100">
							<div class="mb-3">
              <label for="inputName" class="form-label">Family Type<font color="red">*</font></label>
              <select id="familytype" class="form-control custom-select" name="familytype" >
              <option value="">Select</option>
                    <?php foreach ($familytype as $value) { ?>
                    <option value="<?php echo $value->id ?>" <?= (isset($FamilyDetails['familytype']) && !empty($FamilyDetails['familytype'])) ? ($FamilyDetails['familytype'] == $value->familytype ? 'selected' : '') : '' ?>><?php echo $value->familytype; ?></option>  
                    <?php } ?>
                </select>   
                             <label for="inputName" class="form-label">Financial Status<font color="red">*</font></label>
                             <select id="financialstatus" class="form-control custom-select" name="financialstatus">
                             <option value="">Select</option>
                    <?php foreach ($financialstatus as $value) { ?>
                    <option value="<?php echo $value->id ?>" <?= (isset($FamilyDetails['financial_status']) && !empty($FamilyDetails['financial_status'])) ? ($ProfileDetails['financial_status'] == $value->financialstatus ? 'selected' : '') : '' ?>><?php echo $value->financialstatus; ?></option>  
                    <?php } ?>
                </select>              </div>
                <div class="mb-3">
              <label for="inputName" class="form-label">Home Type<font color="red">*</font></label>
              <select id="hometype" class="form-control custom-select" name="hometype" >
              <option value="">Select</option>
                    <?php foreach ($hometype as $value) { ?>
                    <option value="<?php echo $value->id ?>" <?= (isset($FamilyDetails['hometype']) && !empty($FamilyDetails['hometype'])) ? ($FamilyDetails['hometype'] == $value->hometype ? 'selected' : '') : '' ?>><?php echo $value->hometype; ?></option>  
                    <?php } ?>
                </select>   
                             <label for="inputName" class="form-label">Number of Family Members<font color="red">*</font></label>
                             <select id="total_members" class="form-control custom-select" name="total_members">
                             
                             <option value="">--Select--</option>
                  <?php for ($i=0; $i <=20 ; $i++) { ?>
                    <option value="<?php echo $i; ?>" <?= (isset($FamilyDetails['total_members']) && !empty($FamilyDetails['total_members'])) ? ($FamilyDetails['total_members'] == $i ? 'selected' : '') : '' ?>><?php echo $i; ?></option>
                  <?php } ?>
                </select>              </div>
                <div class="mb-3">
                <label for="inputName" class="form-label">Father Details</label>
                <select id="fatherdetails" class="form-control" name="fatherdetails" >
                <option value="">--Select--</option>
                <option value="Alive" <?= (isset($FamilyDetails['fatherdetails']) && !empty($FamilyDetails['fatherdetails'])) ? ($FamilyDetails['fatherdetails'] =="Alive"? 'selected' : '') : '' ?>><?php echo "Alive"; ?></option>
                <option value="Died" <?= (isset($FamilyDetails['fatherdetails']) && !empty($FamilyDetails['fatherdetails'])) ? ($FamilyDetails['fatherdetails'] == "Died" ? 'selected' : '') : '' ?>><?php echo "Died"; ?></option>

                </select>               </div> 
                <div class="mb-3">
                <label for="inputName" class="form-label">Father Occupation</label>
               <input type="text" name="fathers_occupation" class="form-control" value="<?= !empty($FamilyDetails['fathers_occupation']) && $FamilyDetails['fathers_occupation'] != 'NULL'? $FamilyDetails['fathers_occupation'] : '' ?>">
                </select>               </div>
                <div class="mb-3">
                <label for="inputName" class="form-label">Mother Details</label>
                <select id="motherdetails" class="form-control custom-select" name="motherdetails" >
                <option value="">--Select--</option>
                <option value="Alive" <?= (isset($FamilyDetails['motherdetails']) && !empty($FamilyDetails['motherdetails'])) ? ($FamilyDetails['motherdetails'] =="Alive"? 'selected' : '') : '' ?>><?php echo "Alive"; ?></option>
                <option value="Died" <?= (isset($FamilyDetails['motherdetails']) && !empty($FamilyDetails['motherdetails'])) ? ($FamilyDetails['motherdetails'] == "Died" ? 'selected' : '') : '' ?>><?php echo "Died"; ?></option>

                </select>  
                   </div>
				 
                <div class="mb-3">
                <label for="inputName" class="form-label">Mother Occupation</label>
                <input type="text" name="mothers_occupation" class="form-control" value="<?= !empty($FamilyDetails['mothers_occupation']) && $FamilyDetails['mothers_occupation'] != 'NULL'? $FamilyDetails['mothers_occupation'] : '' ?>">
             </div>
            
							</div><!---//app-card-body-->
							<div class="app-card-footer p-4 mt-auto">
						   </div>
						</div><!--//app-card-->
	                </div><!--//col-->
	                <div class="col-12 col-lg-6">
		                <div class="app-card app-card-settings shadow-sm d-flex flex-column align-items-start">
					

             
              <div class="app-card-header p-3 border-bottom-0">
						        <div class="row align-items-center gx-3">
							        <div class="col-auto">
								        <div class="app-icon-holder">
										    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-sliders" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M11.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM9.05 3a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0V3h9.05zM4.5 7a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM2.05 8a2.5 2.5 0 0 1 4.9 0H16v1H6.95a2.5 2.5 0 0 1-4.9 0H0V8h2.05zm9.45 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm-2.45 1a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0v-1h9.05z"/>
</svg>
									    </div><!--//icon-holder-->
						                
							        </div><!--//col-->
							        <div class="col-auto">
								        <h4 class="app-card-title">Hobbies and Interests</h4>
							        </div><!--//col-->
						        </div><!--//row-->
						    </div><!--//app-card-header-->
							<div class="app-card-body px-4 w-100">
              <div class="mb-3">
                <label for="inputName" class="form-label">Favourite Sports</label>
                <textarea  id="favourite_sports" class="form-control" name="favourite_sports" ><?= !empty($OtherDetails['fav_sports']) && $OtherDetails['fav_sports'] != 'NULL'? $OtherDetails['fav_sports'] : '' ?></textarea>
              </div>
              <div class="mb-3">
                <label for="inputName" class="form-label">Favourite Food</label>
                <textarea  id="favourite_food" class="form-control" name="favourite_food" ><?= !empty($OtherDetails['fav_food']) && $OtherDetails['fav_food'] != 'NULL'? $OtherDetails['fav_food'] : '' ?></textarea>
              </div>
              <div class="mb-3">
                <label for="inputName" class="form-label">Eating Habits </label>
                <textarea  id="eating_habits" class="form-control" name="eating_habits" ><?= !empty($OtherDetails['eating_habits']) && $OtherDetails['eating_habits'] != 'NULL'? $OtherDetails['eating_habits'] : '' ?></textarea>
              </div>
              <div class="mb-3">
                <label for="inputName" class="form-label">Favourite Places</label>
                <textarea  id="favourite_places" class="form-control" name="favourite_places" ><?= !empty($OtherDetails['fav_places']) && $OtherDetails['fav_places'] != 'NULL'? $OtherDetails['fav_places'] : '' ?></textarea>
              </div>
              <div class="mb-3">
                <label for="inputName" class="form-label">Movies and Musics </label>
                <textarea  id="favourite_movies" class="form-control" name="favourite_movies" ><?= !empty($OtherDetails['movies_musics']) && $OtherDetails['movies_musics'] != 'NULL'? $OtherDetails['movies_musics'] : '' ?></textarea>

              </div>
              <div class="mb-3">
                <label for="inputName" class="form-label">Hobbies and Interests </label>
                <textarea  id="hobbies" class="form-control" name="hobbies" ><?= !empty($OtherDetails['hobbies']) && $OtherDetails['hobbies'] != 'NULL'? $OtherDetails['hobbies'] : '' ?></textarea>

              </div>      
							</div><!---//app-card-body-->
              <div class="app-card-header p-3 border-bottom-0">
						        <div class="row align-items-center gx-3">
							        <div class="col-auto">
								        <div class="app-icon-holder">
										    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-sliders" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M11.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM9.05 3a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0V3h9.05zM4.5 7a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM2.05 8a2.5 2.5 0 0 1 4.9 0H16v1H6.95a2.5 2.5 0 0 1-4.9 0H0V8h2.05zm9.45 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm-2.45 1a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0v-1h9.05z"/>
</svg>
									    </div><!--//icon-holder-->
						                
							        </div><!--//col-->
							        <div class="col-auto">
								        <h4 class="app-card-title">Partner preference </h4>
							        </div><!--//col-->
						        </div><!--//row-->
						    </div><!--//app-card-header-->
							<div class="app-card-body px-4 w-100">
							<div class="mb-3">
              <label for="inputName" class="form-label">Age From<font color="red">*</font></label>
              <select id="partner_age_from" class="form-control custom-select" name="partner_age_from" >
                  <option value="">Select</option>
                  <?php for ($i=18; $i <=80 ; $i++) {  ?>
                    <option value="<?php echo $i; ?>" <?= (isset($OtherDetails['partner_age_from']) && !empty($OtherDetails['partner_age_from'])) ? ($OtherDetails['partner_age_from'] == $i ? 'selected' : '') : '' ?>><?php echo $i; ?></option>
                  <?php } ?>
                </select>   
                             <label for="inputName" class="form-label">Age to<font color="red">*</font></label>
                             <select id="partner_age_to" class="form-control custom-select" name="partner_age_to">
                  <option value="">Select</option>
                  <?php for ($i=18; $i <=80 ; $i++) {  ?>
                    <option value="<?php echo $i; ?>" <?= (isset($OtherDetails['partner_age_to']) && !empty($OtherDetails['partner_age_to'])) ? ($OtherDetails['partner_age_to'] == $i ? 'selected' : '') : '' ?>><?php echo $i; ?></option>
                  <?php } ?>
                </select>              </div>
                <div class="mb-3">
              <label for="inputName" class="form-label">Height From<font color="red">*</font></label>
              <select id="partner_height_from" class="form-control custom-select" name="partner_height_from" >
              <option value="">Select</option>
                    <?php foreach ($Height as $value) { ?>
                    <option value="<?php echo $value->height_id ?>" <?= (isset($OtherDetails['partner_height']) && !empty($OtherDetails['partner_height'])) ? ($OtherDetails['partner_height'] == $value->height_id ? 'selected' : '') : '' ?>><?php echo $value->height; ?></option>  
                    <?php } ?>
                </select>   
                             <label for="inputName" class="form-label">Height to<font color="red">*</font></label>
                             <select id="partner_height_to" class="form-control custom-select" name="partner_height_to">
                             <option value="">Select</option>
                    <?php foreach ($Height as $value) { ?>
                    <option value="<?php echo $value->height_id ?>" <?= (isset($OtherDetails['partner_height_to']) && !empty($OtherDetails['partner_height_to'])) ? ($OtherDetails['partner_height_to'] == $value->height_id ? 'selected' : '') : '' ?>><?php echo $value->height; ?></option>  
                    <?php } ?>
                </select>              </div>
                <div class="mb-3">
                <label for="inputName" class="form-label">Physical Status</label><br>
                <?php  if(isset($OtherDetails['partner_physicalstatus']) && $OtherDetails['partner_physicalstatus']!="NULL")
                {
$datas=explode(",",$OtherDetails['partner_physicalstatus']);
                }?>
                   <?php foreach ($physicalstatus as $value) { ?>
                    <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" name="partner_physical_status[]" value="<?php echo $value->id; ?>" <?= (isset($OtherDetails['partner_physicalstatus']) && !empty($OtherDetails['partner_physicalstatus'])) ? (in_array($value->id,$datas) ? 'checked' : '') : '' ?>>
                <label class="form-check-label"><?php echo $value->physicalstatus;?></label>
                </div> <?php } ?>
                  
                </div> 
                <div class="mb-3">
                <label for="inputName" class="form-label">Marital Status</label>
                <?php  if(isset($OtherDetails['partner_maritalstatus']) && $OtherDetails['partner_maritalstatus']!="NULL")
                {
$datas=explode(",",$OtherDetails['partner_maritalstatus']);
                }?>
                     <?php foreach ($maritalstatus as $value) { ?>
                      <div class="form-check mb-3">
                      <input type="checkbox" class="form-check-input" name="partner_marital_status[]" value="<?php echo $value->id; ?>" <?= (isset($OtherDetails['partner_maritalstatus']) && !empty($OtherDetails['partner_maritalstatus'])  ) ? ( in_array($value->id,$datas) ? 'checked' : '') : '' ?>>
                      <label class="form-check-label"><?php echo $value->maritalstatus;?></label>
                </div>
                    <?php } ?>
                     </div>        
                <div class="mb-3">
                <label for="inputName" class="form-label">Mother Tounge</label>
                <?php  if(isset($OtherDetails['mother_tongue']) && $OtherDetails['mother_tongue']!="NULL")
                {
$datas=explode(",",$OtherDetails['mother_tongue']);
                }?>
                <?php foreach ($mothertongue as $value) { ?>
                      <div class="form-check mb-3">
                      <input type="checkbox" class="form-check-input" name="partner_mothertongue[]" value="<?php echo $value->mothertongue_id; ?>" <?= (isset($OtherDetails['mother_tongue']) && !empty($OtherDetails['mother_tongue'])) ? (in_array($value->mothertongue_id,$datas)? 'checked' : '') : '' ?>>
                      <label class="form-check-label"><?php echo $value->mothertongue;?></label>
                </div>
                    <?php } ?> 
                   </div>
				 
                <div class="mb-3">
                <label for="inputName" class="form-label">Language Spoken</label>
                <?php  if(isset($OtherDetails['partner_languagespoken']) && $OtherDetails['partner_languagespoken']!="NULL")
                {
$datas=explode(",",$OtherDetails['partner_languagespoken']);
                }?>
                <?php foreach ($mothertongue as $value) { ?>
                      <div class="form-check mb-3">
                      <input type="checkbox" class="form-check-input" name="partner_language_spoken[]" value="<?php echo $value->mothertongue_id; ?>" <?= (isset($OtherDetails['partner_languagespoken']) && !empty($OtherDetails['partner_languagespoken'])) ? (in_array($value->mothertongue_id,$datas) ? 'checked' : '') : '' ?>>
                      <label class="form-check-label"><?php echo $value->mothertongue;?></label>
                </div>
                    <?php } ?>             </div>
                <div class="mb-3">
                <label for="inputName" class="form-label">Skin Color</label>
                <?php  if(isset($OtherDetails['partner_skincolor']) && $OtherDetails['partner_skincolor']!="NULL")
                {
$datas=explode(",",$OtherDetails['partner_skincolor']);
                }?>
               <?php foreach ($skin_color as $value) { ?>
                      <div class="form-check mb-3">
                      <input type="checkbox" class="form-check-input" name="partner_skin_color[]" value="<?php echo $value->id; ?>" <?= (isset($OtherDetails['partner_skincolor']) && !empty($OtherDetails['partner_skincolor'])) ? (in_array($value->id,$datas) ? 'checked' : '') : '' ?>>
                      <label class="form-check-label"><?php echo $value->skincolor;?></label>
                </div>
                    <?php } ?>                </div>
             
			
				<div class="mb-3">
                <label for="inputName" class="form-label">Appearance</label>
                <?php  if(isset($OtherDetails['partner_appearance']) && $OtherDetails['partner_appearance']!="NULL")
                {
$datas=explode(",",$OtherDetails['partner_appearance']);
                }?>
              
                <?php foreach ($appearance as $value) { ?>
                      <div class="form-check mb-3">
                      <input type="checkbox" class="form-check-input" name="partner_appearance[]" value="<?php echo $value->id; ?>" <?= (isset($OtherDetails['partner_appearance']) && !empty($OtherDetails['partner_appearance'])) ? (in_array($value->id,$datas) ? 'checked' : '') : '' ?>>
                      <label class="form-check-label"><?php echo $value->appearance;?></label>
                </div>
                    <?php } ?>  
                  </div>
                <div class="mb-3">
                <label for="inputName" class="form-label">Religion</label>
                <select id="partner_religion" class="form-control custom-select" name="partner_religion">
                  <option value="">--Select--</option>
                  <?php foreach ($religion as $value) { ?>
                    <option value="<?php echo $value->rid; ?>" <?= (isset($OtherDetails['partner_religion']) && !empty($OtherDetails['partner_religion'])) ? ($OtherDetails['partner_religion'] == $value->religion ? 'selected' : '') : '' ?>><?php echo $value->religion; ?></option>
                  <?php } ?>
                </select>               </div>
                <div class="mb-3">
                <label for="inputName" class="form-label">Caste</label>
                <select id="partner_caste" class="form-control custom-select" name="partner_caste">
                  <option value="">--Select--</option>
                  <?php foreach ($belief as $value) { ?>
                    <option value="<?php echo $value->cid; ?>" <?= (isset($OtherDetails['partner_caste']) && !empty($OtherDetails['partner_caste'])) ? ($OtherDetails['partner_caste'] == $value->cid ? 'selected' : '') : '' ?>><?php echo $value->caste; ?></option>
                  <?php } ?>
                </select>               </div>
							</div><!---//app-card-body-->
              <div class="app-card-header p-3 border-bottom-0">
						        <div class="row align-items-center gx-3">
							        <div class="col-auto">
								        <div class="app-icon-holder">
										    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-sliders" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M11.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM9.05 3a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0V3h9.05zM4.5 7a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM2.05 8a2.5 2.5 0 0 1 4.9 0H16v1H6.95a2.5 2.5 0 0 1-4.9 0H0V8h2.05zm9.45 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm-2.45 1a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0v-1h9.05z"/>
</svg>
									    </div><!--//icon-holder-->
						                
							        </div><!--//col-->
							        <div class="col-auto">
								        <h4 class="app-card-title">Partner education and Professional Informations</h4>
							        </div><!--//col-->
						        </div><!--//row-->
						    </div><!--//app-card-header-->
							<div class="app-card-body px-4 w-100">
							<div class="mb-3">
              <label for="inputName" class="form-label">Partner Education</label>
              <select id="partner_education" class="form-control custom-select" name="partner_education" >
                <?php foreach ($edu_data as $value) { ?>
                  <option value="<?php echo $value->edu_id ?>" <?= (isset($OtherDetails['partner_education']) && !empty($OtherDetails['partner_education'])) ? ($OtherDetails['partner_education'] == $value->edu_id ? 'selected' : '') : '' ?> ><?php echo $value->education; ?></option>  

                    <?php } ?>  
                </select>      </div>
                <div class="mb-3">
              <label for="inputName" class="form-label">Partner Occupation</label>
                <select id="partner_occupation" class="form-control custom-select" name="partner_occupation">
                  <option value="">--Select--</option>
                  <?php foreach ($profession as $value) { ?>
                    <option value="<?php echo $value->profession_id; ?>" <?= (isset($OtherDetails['partner_occupation']) && !empty($OtherDetails['partner_occupation'])) ? ($OtherDetails['partner_occupation'] == $value->profession_id ? 'selected' : '') : '' ?>><?php echo $value->profession_name; ?></option>
                  <?php } ?>
                </select>     </div>
                <div class="mb-3">
              <label for="inputName" class="form-label">Annual Income</label>
                <select id="partner_annualincome" class="form-control custom-select" name="partner_annualincome">
                  <option value="">--Select--</option>
                  <?php foreach ($income as $value) { ?>
                  <option value="<?php echo $value->income_id ?>" <?= (isset($OtherDetails['partner_annualincome']) && !empty($OtherDetails['partner_annualincome'])) ? ($OtherDetails['partner_annualincome'] == $value->income_id ? 'selected' : '') : '' ?> ><?php echo $value->income; ?></option>  

                    <?php } ?> 
                </select>     </div>
							</div><!---//app-card-body-->
              <div class="app-card-header p-3 border-bottom-0">
						        <div class="row align-items-center gx-3">
							        <div class="col-auto">
								        <div class="app-icon-holder">
										    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-sliders" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M11.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM9.05 3a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0V3h9.05zM4.5 7a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM2.05 8a2.5 2.5 0 0 1 4.9 0H16v1H6.95a2.5 2.5 0 0 1-4.9 0H0V8h2.05zm9.45 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm-2.45 1a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0v-1h9.05z"/>
</svg>
									    </div><!--//icon-holder-->
						                
							        </div><!--//col-->
							        <div class="col-auto">
								        <h4 class="app-card-title">Partner Location and Contact preference</h4>
							        </div><!--//col-->
						        </div><!--//row-->
						    </div><!--//app-card-header-->
							<div class="app-card-body px-4 w-100">
							<div class="mb-3">
                <label for="inputName" class="form-label">Country</label>
                <select id="partner_country" class="form-control custom-select" name="partner_country" >
                  <option value="">--Select--</option>
                  <?php foreach ($country as $value) { ?>
                    <option value="<?php echo $value->id; ?>" <?= (isset($OtherDetails['partner_country']) && !empty($OtherDetails['partner_country'])) ? ($OtherDetails['partner_country'] == $value->id ? 'selected' : '') : '' ?>><?php echo $value->name; ?></option>
                  <?php } ?>
                </select>                </div> 
				<div class="mb-3">
                <label for="inputName" class="form-label">State</label>
                <select id="partner_state" class="form-control custom-select" name="partner_state" >
                <?php foreach ($partner_states as $value) { ?>
                    <option value="<?php echo $value->id; ?>" <?= (isset($OtherDetails['partner_state']) && !empty($OtherDetails['partner_state'])) ? ($OtherDetails['partner_state'] == $value->id ? 'selected' : '') : '' ?>><?php echo $value->name; ?></option>
                  <?php } ?>
                 
                </select>                 </div>
               
				<div class="mb-3">
                <label for="inputName" class="form-label">District</label>
               
                <select id="partner_district" multiple  class="form-control custom-select" name="partner_district[]" size="10" style="height:150px;">
                <?php  if(isset($OtherDetails['partner_district']) && $OtherDetails['partner_district']!="NULL")
                {
$datas=explode(",",$OtherDetails['partner_district']);
                }?>
                <?php foreach ($partner_district as $value) { ?>
                    <option value="<?php echo $value->district_id; ?>" <?= (isset($OtherDetails['partner_district']) && !empty($OtherDetails['partner_district'])) ? (in_array($value->district_id,$datas) ? 'selected' : '') : '' ?>><?php echo $value->district; ?></option>
                  <?php } ?>
                 
                </select>   
        </div>
				
				<div class="mb-3">
                <label for="inputName" class="form-label">Nationality</label>
                <select id="partner_nationality"  class="form-control custom-select" name="partner_nationality">
                  <option value="">--Select--</option>
                  <?php foreach ($country as $value) { ?>
                    <option value="<?php echo $value->id; ?>" <?= (isset($OtherDetails['partner_nationality']) && !empty($OtherDetails['partner_nationality'])) ? ($OtherDetails['partner_nationality'] == $value->id ? 'selected' : '') : '' ?>><?php echo $value->name; ?></option>
                  <?php } ?>
                </select>                </div> 
				
			  
                    
							</div><!---//app-card-body-->
             
                <div class="app-card-header p-3 border-bottom-0">
						        <div class="row align-items-center gx-3">
							        <div class="col-auto">
								        <div class="app-icon-holder">
										    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-sliders" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M11.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM9.05 3a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0V3h9.05zM4.5 7a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM2.05 8a2.5 2.5 0 0 1 4.9 0H16v1H6.95a2.5 2.5 0 0 1-4.9 0H0V8h2.05zm9.45 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm-2.45 1a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0v-1h9.05z"/>
</svg>
									    </div><!--//icon-holder-->
						                
							        </div><!--//col-->
							        <div class="col-auto">
								        <h4 class="app-card-title">Partner Expectation</h4>
							        </div><!--//col-->
						        </div><!--//row-->
						    </div><!--//app-card-header-->
							<div class="app-card-body px-4 w-100">
							<div class="mb-3">
                <label for="inputName" class="form-label">Expectation<font color="red">*</font></label>
                <textarea id="partner_expectation" class="form-control" required="" name="partner_expectation" ><?= !empty($OtherDetails['partner_expectation']) && $OtherDetails['partner_expectation'] != 'NULL'? $OtherDetails['partner_expectation'] : '' ?></textarea>
              </div>
              <div class="mb-3">
                <label for="inputName" class="form-label">Profile Description<font color="red">*</font></label>
                <textarea id="description" class="form-control" required="" name="description" ><?= !empty($OtherDetails['aboutme']) && $OtherDetails['aboutme'] != 'NULL'? $OtherDetails['aboutme'] : '' ?></textarea>
              </div>
							</div><!---//app-card-body-->
							<div class="app-card-footer p-4 mt-auto">
							<input type="reset" value="Reset" class="btn btn-secondary">

							<input type="submit" class="btn app-btn-primary" value="Update User Details" name="submit">
						    </div><!--//app-card-footer-->

						</div><!--//app-card-->
				  </form>
	                </div><!--//col-->
	                <div class="col-12 col-lg-6">
		                <div class="app-card app-card-settings shadow-sm d-flex flex-column align-items-start">
						    <div class="app-card-header p-3 border-bottom-0">
						        <div class="row align-items-center gx-3">
							        <div class="col-auto">
								        <div class="app-icon-holder">
										    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-shield-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M5.443 1.991a60.17 60.17 0 0 0-2.725.802.454.454 0 0 0-.315.366C1.87 7.056 3.1 9.9 4.567 11.773c.736.94 1.533 1.636 2.197 2.093.333.228.626.394.857.5.116.053.21.089.282.11A.73.73 0 0 0 8 14.5c.007-.001.038-.005.097-.023.072-.022.166-.058.282-.111.23-.106.525-.272.857-.5a10.197 10.197 0 0 0 2.197-2.093C12.9 9.9 14.13 7.056 13.597 3.159a.454.454 0 0 0-.315-.366c-.626-.2-1.682-.526-2.725-.802C9.491 1.71 8.51 1.5 8 1.5c-.51 0-1.49.21-2.557.491zm-.256-.966C6.23.749 7.337.5 8 .5c.662 0 1.77.249 2.813.525a61.09 61.09 0 0 1 2.772.815c.528.168.926.623 1.003 1.184.573 4.197-.756 7.307-2.367 9.365a11.191 11.191 0 0 1-2.418 2.3 6.942 6.942 0 0 1-1.007.586c-.27.124-.558.225-.796.225s-.526-.101-.796-.225a6.908 6.908 0 0 1-1.007-.586 11.192 11.192 0 0 1-2.417-2.3C2.167 10.331.839 7.221 1.412 3.024A1.454 1.454 0 0 1 2.415 1.84a61.11 61.11 0 0 1 2.772-.815z"/>
  <path fill-rule="evenodd" d="M10.854 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
</svg>
									    </div><!--//icon-holder-->
						                
							        </div><!--//col-->
							        <div class="col-auto">
								        <h4 class="app-card-title">Security</h4>
							        </div><!--//col-->
						        </div><!--//row-->
						    </div><!--//app-card-header-->
						    <div class="app-card-body px-4 w-100">
							    
							    <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"><strong>Password</strong></div>
									        <div class="item-data">••••••••</div>
									    </div><!--//col-->
									    <div class="col text-end">
										    <a class="btn-sm app-btn-secondary" href="#">Change</a>
									    </div><!--//col-->
								    </div><!--//row-->
							    </div><!--//item-->
							    <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"><strong>Two-Factor Authentication</strong></div>
									        <div class="item-data">You haven't set up two-factor authentication. </div>
									    </div><!--//col-->
									    <div class="col text-end">
										    <a class="btn-sm app-btn-secondary" href="#">Set up</a>
									    </div><!--//col-->
								    </div><!--//row-->
							    </div><!--//item-->
						    </div><!--//app-card-body-->
						</div><!--//app-card-->
	                </div><!--//col-->
	                <div class="col-12 col-lg-6">
		                <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
						    <div class="app-card-header p-3 border-bottom-0">
						        <div class="row align-items-center gx-3">
							        <div class="col-auto">
								        <div class="app-icon-holder">
										    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-shield-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M5.443 1.991a60.17 60.17 0 0 0-2.725.802.454.454 0 0 0-.315.366C1.87 7.056 3.1 9.9 4.567 11.773c.736.94 1.533 1.636 2.197 2.093.333.228.626.394.857.5.116.053.21.089.282.11A.73.73 0 0 0 8 14.5c.007-.001.038-.005.097-.023.072-.022.166-.058.282-.111.23-.106.525-.272.857-.5a10.197 10.197 0 0 0 2.197-2.093C12.9 9.9 14.13 7.056 13.597 3.159a.454.454 0 0 0-.315-.366c-.626-.2-1.682-.526-2.725-.802C9.491 1.71 8.51 1.5 8 1.5c-.51 0-1.49.21-2.557.491zm-.256-.966C6.23.749 7.337.5 8 .5c.662 0 1.77.249 2.813.525a61.09 61.09 0 0 1 2.772.815c.528.168.926.623 1.003 1.184.573 4.197-.756 7.307-2.367 9.365a11.191 11.191 0 0 1-2.418 2.3 6.942 6.942 0 0 1-1.007.586c-.27.124-.558.225-.796.225s-.526-.101-.796-.225a6.908 6.908 0 0 1-1.007-.586 11.192 11.192 0 0 1-2.417-2.3C2.167 10.331.839 7.221 1.412 3.024A1.454 1.454 0 0 1 2.415 1.84a61.11 61.11 0 0 1 2.772-.815z"/>
  <path fill-rule="evenodd" d="M10.854 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
</svg>
									    </div><!--//icon-holder-->
						                
							        </div><!--//col-->
							        <div class="col-auto">
								        <h4 class="app-card-title">Security</h4>
							        </div><!--//col-->
						        </div><!--//row-->
						    </div><!--//app-card-header-->
						    <div class="app-card-body px-4 w-100">
							    
							    <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"><strong>Password</strong></div>
									        <div class="item-data">••••••••</div>
									    </div><!--//col-->
									    <div class="col text-end">
										    <a class="btn-sm app-btn-secondary" href="#">Change</a>
									    </div><!--//col-->
								    </div><!--//row-->
							    </div><!--//item-->
							    <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"><strong>Two-Factor Authentication</strong></div>
									        <div class="item-data">You haven't set up two-factor authentication. </div>
									    </div><!--//col-->
									    <div class="col text-end">
										    <a class="btn-sm app-btn-secondary" href="#">Set up</a>
									    </div><!--//col-->
								    </div><!--//row-->
							    </div><!--//item-->
						    </div><!--//app-card-body-->
						    
						    <div class="app-card-footer p-4 mt-auto">
							   <a class="btn app-btn-secondary" href="#">Manage Security</a>
						    </div><!--//app-card-footer-->
						   
						</div><!--//app-card-->
	                </div>
	                <div class="col-12 col-lg-6">
		                <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
						    <div class="app-card-header p-3 border-bottom-0">
						        <div class="row align-items-center gx-3">
							        <div class="col-auto">
								        <div class="app-icon-holder">
										    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-credit-card" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7z"/>
  <path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1z"/>
</svg>
									    </div><!--//icon-holder-->
						                
							        </div><!--//col-->
							        <div class="col-auto">
								        <h4 class="app-card-title">Payment methods</h4>
							        </div><!--//col-->
						        </div><!--//row-->
						    </div><!--//app-card-header-->
						    <div class="app-card-body px-4 w-100">
							    
							    <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"><i class="fab fa-cc-visa me-2"></i><strong>Credit/Debit Card </strong></div>
									        <div class="item-data">1234*******5678</div>
									    </div><!--//col-->
									    <div class="col text-end">
										    <a class="btn-sm app-btn-secondary" href="#">Edit</a>
									    </div><!--//col-->
								    </div><!--//row-->
							    </div><!--//item-->
							    <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"><i class="fab fa-paypal me-2"></i><strong>PayPal</strong></div>
									        <div class="item-data">Not connected</div>
									    </div><!--//col-->
									    <div class="col text-end">
										    <a class="btn-sm app-btn-secondary" href="#">Connect</a>
									    </div><!--//col-->
								    </div><!--//row-->
							    </div><!--//item-->
						    </div><!--//app-card-body-->
						    <div class="app-card-footer p-4 mt-auto">
							   <a class="btn app-btn-secondary" href="#">Manage Payment</a>
						    </div><!--//app-card-footer-->
						   
						</div><!--//app-card-->
	                </div>
                </div><!--//row-->
			    
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
	    
	  <?php include('footer.php'); ?>

	  <script type="text/javascript">
$(document).ready( function() {
  
           photo_protection_onload();
    var age = "";
        $('#dob').datepicker({
          
          dateFormat: 'dd-mm-yy',
          minDate: '01-01-1980',
        maxDate: '31-12-2000',
            onSelect: function(value, ui) {
                var today = new Date();
                age = today.getFullYear() - ui.selectedYear;
                $('#age').val(age);
            },
            changeMonth: true,
            changeYear: true
        })

  $( ".AgeFrom" ).change(function() {
        var AgeFrom = $('.AgeFrom').val();
        if(AgeFrom !='' ) 
        {
            $(".AgeTo").empty();
            $(".AgeTo").append('<option value="">-Select-</option>');
            for (var i = (AgeFrom); i <= 80 ; i++) {
                $(".AgeTo").append('<option value="'+i+'">'+i+'</option>');
            }
        }  
    });

  $( ".HeightFrom" ).change(function() {
        var HeightFrom = $('.HeightFrom').val();
        if(HeightFrom !='') 
        {
            // $(".HeightTo").empty();
            // $(".HeightTo").append('<option value="">-Select-</option>');
            // for (var i = (HeightFrom); i <= 200 ; i++) {
            //     $(".HeightTo").append('<option value="'+i+'">'+i+' cm</option>');
            // } 
            $.ajax({
                    url: "<?= base_url() ?>admin/GetHeight",
                    data: {
                        HeightFrom: HeightFrom
                    },
                    type: "POST",
                    success: function(data) {
                        $(".HeightTo").html(data);
                        $('.HeightTo').change();
                    }
                });
        } 
    });
    
    

});

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
    });

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

    $('#togglePassword').on('click',function(){
        
        var type = $('#photopassword').attr('type');
        
        if(type == "password")
        {
            $('#photopassword').attr('type','text')
            $(this).attr('class','fa fa-eye-slash')
        }
        if(type == "text")
        {
            $('#photopassword').attr('type','password')
            $(this).attr('class','fa fa-eye')
        }
        
    })
    $( "#highest_education" ).change(function() {
        var high_education = $('#highest_education').val();
        if(high_education !='' ) 
        {
            $("#education").empty();
            $("#education").append('<option value="">-Select-</option>');
            $.ajax({
                    url: "<?= base_url() ?>admin/GetEducation",
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
    $( "#partner_country" ).change(function() {
        var partner_country = $('#partner_country').val();
        if(partner_country !='' ) 
        {
            $("#partner_state").empty();
            $("#partner_state").append('<option value="">-Select-</option>');
            $.ajax({
                    url: "<?= base_url() ?>admin/GetStates",
                    data: {
                      country: partner_country
                    },
                    type: "POST",
                    success: function(data) {
                        $("#partner_state").html(data);
                        $('#partner_state').change();
                    }
                });
           
        }  
    });
    $( "#partner_state" ).change(function() {
        var partner_state = $('#partner_state').val();
        if(partner_state !='' ) 
        {
            $("#partner_district").empty();
            $.ajax({
                    url: "<?= base_url() ?>admin/GetDistrict",
                    data: {
                      states: partner_state
                    },
                    type: "POST",
                    success: function(data) {
                     // alert(data);
                        $("#partner_district").append(data);
                    }
                });
                       
        }  
    });
    $( "#country" ).change(function() {
        var country = $('#country').val();
        if(country !='' ) 
        {
            $("#states").empty();
            $("#states").append('<option value="">-Select-</option>');
            $.ajax({
                    url: "<?= base_url() ?>admin/GetStates",
                    data: {
                      country: country
                    },
                    type: "POST",
                    success: function(data) {
                        $("#states").html(data);
                        $('#states').change();
                    }
                });
           
        }  
    });
    $( "#states" ).change(function() {
        var states = $('#states').val();
        if(states !='' ) 
        {
            $("#districts").empty();
            $("#districts").append('<option value="">-Select-</option>');
            $.ajax({
                    url: "<?= base_url() ?>admin/GetDistrict",
                    data: {
                      states: states
                    },
                    type: "POST",
                    success: function(data) {
                        $("#districts").html(data);
                        $('#districts').change();
                    }
                });
                $("#city").empty();
            $("#city").append('<option value="">-Select-</option>');
            $.ajax({
                    url: "<?= base_url() ?>admin/GetCity",
                    data: {
                      states: states
                    },
                    type: "POST",
                    success: function(data) {
                        $("#city").html(data);
                        $('#city').change();
                    }
                });
           
        }  
    });
    $( "#present_country" ).change(function() {
        var present_country = $('#present_country').val();
        if(present_country !='' ) 
        {
          $("#present_states").empty();
          $("#present_districts").empty();
          $("#present_city").empty();
            $("#present_states").append('<option value="">-Select-</option>');
            $.ajax({
                    url: "<?= base_url() ?>admin/GetStates",
                    data: {
                      country: present_country
                    },
                    type: "POST",
                    success: function(data) {
                        $("#present_states").html(data);
                    }
                });
           
        }  
    });
    $( "#present_states" ).change(function() {
        var present_states = $('#present_states').val();
        if(states !='' ) 
        {
            $("#present_districts").empty();
            $("#present_districts").append('<option value="">-Select-</option>');
            $.ajax({
                    url: "<?= base_url() ?>admin/GetDistrict",
                    data: {
                      states: present_states
                    },
                    type: "POST",
                    success: function(data) {
                        $("#present_district").html(data);
                    }
                });
                $("#present_city").empty();
            $("#present_city").append('<option value="">-Select-</option>');
            $.ajax({
                    url: "<?= base_url() ?>admin/GetCity",
                    data: {
                      states: present_states
                    },
                    type: "POST",
                    success: function(data) {
                        $("#present_city").html(data);
                    }
                });
           
        }  
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
</html> 

