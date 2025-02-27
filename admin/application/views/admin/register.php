<!DOCTYPE html>
<html lang="en">
<?php include('includes/header.php'); ?> 
<?php include('includes/menu.php');?>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Project Add</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Project Add</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <?php if($this->session->flashdata('added')){?>          <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-check"></i> Successfully Added. </h4>
     
    </div> <?php } ?>   
     <?php if($this->session->flashdata('error')){?>          <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-check"></i> Unable to add Data!!</h4>
     
    </div> <?php } ?>
    
    <?php if($this->session->flashdata('existing')){?>          <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-check"></i> Mobile number already registered!</h4>
     
    </div> <?php } ?>
    <section class="content">
       
      <div class="row">
        <div class="col-md-6">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Basic information</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <form action="<?php echo site_url('admin/register/Register'); ?>" method="post" autocomplete="off">
            <div class="card-body">
            <div class="form-group">
                <label for="inputStatus">Created By</label>
                <input type="hidden" id="inputName" class="form-control" name="userid" value="<?= !empty($ProfileDetails['id']) && $ProfileDetails['id'] != 'NULL' ? $ProfileDetails['id'] : '' ?>">
                <select id="inputStatus" class="form-control custom-select" name="created_by">
                  <option value="self" <?= (isset($ProfileDetails['profile_for']) && !empty($ProfileDetails['profile_for'])) ? (($ProfileDetails['profile_for'] == 'self') ? 'selected' : '') : 'selected' ?>>Self</option>
                  <option value="Parents" <?= (isset($ProfileDetails['profile_for']) && !empty($ProfileDetails['profile_for'])) ? (($ProfileDetails['profile_for'] == 'Parents') ? 'selected' : '') : '' ?>>Parents</option>
                  <option value="Brother" <?= (isset($ProfileDetails['profile_for']) && !empty($ProfileDetails['profile_for'])) ? (($ProfileDetails['profile_for'] == 'Brother') ? 'selected' : '') : '' ?> >Brother</option>
                  <option value="Sister" <?= (isset($ProfileDetails['profile_for']) && !empty($ProfileDetails['profile_for'])) ? (($ProfileDetails['profile_for'] == 'Sister') ? 'selected' : '') : '' ?>>Sister</option>
                  <option value="Relatives" <?= (isset($ProfileDetails['profile_for']) && !empty($ProfileDetails['profile_for'])) ? (($ProfileDetails['profile_for'] == 'Relatives') ? 'selected' : '') : '' ?>>Relatives</option>
                </select>
              </div>
              <div class="form-group">
                <label for="inputName">Name <font color="red">*</font></label>
                <input type="text" id="inputName" class="form-control" name="name" required="" value="<?= !empty($ProfileDetails['name'])? $ProfileDetails['name'] : '' ?>">
              </div>
              <div class="form-group">
                <label for="inputDescription" style=" margin-right: 18px; ">Gender <font color="red">*</font></label>
            <div class="icheck-primary d-inline">
                        <input type="radio" id="male" name="gender" value="1" <?= (isset($ProfileDetails['gender']) && !empty($ProfileDetails['gender'])) ? ($ProfileDetails['gender'] == 1 ? 'checked' : '') : '' ?> required>Male
                        <label for="male">
                        </label>
                      </div>
              <div class="icheck-primary d-inline">
                        <input type="radio" id="female" name="gender" value="2" <?= (isset($ProfileDetails['gender']) && !empty($ProfileDetails['gender'])) ? ($ProfileDetails['gender'] == 2 ? 'checked' : '') : '' ?> required>Female
                        <label for="female">
                        </label>
                      </div>
               <!--  <input type="radio" name="gender" value="1" required="">Male
                <input type="radio" name="gender" value="2" required="">Female -->

              </div>
              
              <div class="form-group">
                <label for="inputName">Phone <font color="red">*</font></label>
                <div class="row">
                  <div class="col-md-5">
                <select id="country_code" class="form-control custom-select" name="country_code" required>
                  <?php //print_r($country); die(); ?>
                  <option value="">--Select--</option>
                  <?php 
                    foreach ($countryCode as $value) { 
                   if (isset($ProfileDetails['countryCode']) && ($ProfileDetails['countryCode'])==$value->id) {  ?>
                    <option selected="selected" value="<?php echo $value->id; ?>" name="<?php echo $value->country; ?>"><?php echo $value->country;?></option>
                  <?php } else{ ?>
                    <option value="<?php echo $value->id;?>" name="<?php echo $value->country; ?>"><?php echo $value->country;?></option> 
                <?php  }

                   } ?>
                 <!--  <?php foreach ($country as $value) { ?>
                    <option value="<?php echo $value->country_code; ?>" <?= (isset($ProfileDetails['secondary_code']) && !empty($ProfileDetails['secondary_code'])) ? ($ProfileDetails['secondary_code'] == $value->id ? 'selected' : '') : '' ?>><?php echo $value->name."(+".$value->country_code.")"; ?></option>
                  <?php } ?> -->
                </select> 
                  </div>
                  <div class="col-md-7">
                   <input type="text" id="phone" class="form-control" name="phone" minlength="5" maxlength="10" required  title="No alphabets and No special characters" value="<?= !empty($ProfileDetails['phone'])? $ProfileDetails['phone'] : '' ?>">
              </div></div></div>      

             <!--  <div class="form-group">
                <label for="inputName">Phone <font color="red">*</font></label>
                <input type="text" id="inputName" class="form-control mobile-valid" name="phone" required="10 digit number only (No alphabets and No special characters) & numbers starts from 6,7,8,9" 
       title="" value="<?= !empty($ProfileDetails['phone']) && $ProfileDetails['phone'] != 'NULL' ? $ProfileDetails['phone'] : '' ?>">
              </div> -->
              <div class="form-group">
                <label for="inputName">Email </label>
                <input type="email" id="inputName" class="form-control" name="email" value="<?= !empty($ProfileDetails['mail']) && $ProfileDetails['mail'] != 'NULL' ? $ProfileDetails['mail'] : '' ?>">
              </div>
              <div class="form-group">
                <label for="inputName">Age <font color="red">*</font></label>
                <select id="inputStatus" class="form-control custom-select" name="age" required="">
                  <option value="">--Select--</option>
                  <?php for ($i=18; $i <=80 ; $i++) {  ?>
                    <option value="<?php echo $i; ?>" <?= (isset($ProfileDetails['age']) && !empty($ProfileDetails['age'])) ? ($ProfileDetails['age'] == $i ? 'selected' : '') : '' ?>><?php echo $i; ?></option>
                  <?php } ?>
                </select>
              </div>

              <div class="form-group">
                <label for="inputClientCompany">Height <font color="red">*</font></label>
                <select id="inputStatus" class="form-control custom-select" name="height" required="">
                    <option value="">--Select--</option>
                    <?php foreach ($Height as $value) { ?>
                    <option value="<?php echo $value->height_id ?>" <?= (isset($ProfileDetails['user_height']) && !empty($ProfileDetails['user_height'])) ? ($ProfileDetails['user_height'] == $value->height ? 'selected' : '') : '' ?>><?php echo $value->height; ?></option>  
                    <?php } ?>
                  
                </select>
              </div>
              <div class="form-group">
                <label for="inputClientCompany">Weight <font color="red">*</font></label>
                <select id="inputStatus" class="form-control custom-select" name="weight" required="">
                    <option value="">--Select--</option>
                    <?php foreach ($weight as $value) { ?>
                    <option value="<?php echo $value->weight_id ?>" <?= (isset($ProfileDetails['weight']) && !empty($ProfileDetails['weight'])) ? ($ProfileDetails['weight'] == $value->weight ? 'selected' : '') : '' ?>><?php echo $value->weight; ?></option>  
                    <?php } ?>
                  
                </select>
              </div>
              <div class="form-group">
                <label for="inputName">Color </label>
                <select id="inputStatus" class="form-control custom-select" name="color">
                  <option value="">--Select--</option>
                  <option value="Very Fair" <?= (isset($ProfileDetails['color']) && !empty($ProfileDetails['color'])) ? (($ProfileDetails['color'] == 'Very Fair') ? 'selected' : '') : '' ?>>Very Fair</option>
                  <option value="Fair" <?= (isset($ProfileDetails['color']) && !empty($ProfileDetails['color'])) ? (($ProfileDetails['color'] == 'Fair') ? 'selected' : '') : '' ?>>Fair</option>
                  <option value="Wheatish" <?= (isset($ProfileDetails['color']) && !empty($ProfileDetails['color'])) ? (($ProfileDetails['color'] == 'Wheatish') ? 'selected' : '') : '' ?>>Wheatish</option>
                  <option value="Wheatish Brown" <?= (isset($ProfileDetails['color']) && !empty($ProfileDetails['color'])) ? (($ProfileDetails['color'] == 'Wheatish Brown') ? 'selected' : '') : '' ?>>Wheatish Brown</option>
                  <option value="Dark" <?= (isset($ProfileDetails['color']) && !empty($ProfileDetails['color'])) ? (($ProfileDetails['color'] == 'Dark') ? 'selected' : '') : '' ?>>Dark</option>
                  <option value="Prefer not to say" <?= (isset($ProfileDetails['color']) && !empty($ProfileDetails['color'])) ? (($ProfileDetails['color'] == 'Prefer not to say') ? 'selected' : '') : '' ?>>Prefer not to say</option>
                </select>
              </div>
              <div class="form-group">
                <label for="inputName">Marital Status <font color="red">*</font></label>
                <select id="inputStatus" class="form-control custom-select" name="marital_status" required="">
                  <option value="">--Select--</option>
                  <option value="Unmarried" <?= (isset($ProfileDetails['marital_status']) && !empty($ProfileDetails['marital_status'])) ? (($ProfileDetails['marital_status'] == 'Unmarried') ? 'selected' : '') : '' ?>>Unmarried</option>
                  <option value="Divorced" <?= (isset($ProfileDetails['marital_status']) && !empty($ProfileDetails['marital_status'])) ? (($ProfileDetails['marital_status'] == 'Divorced') ? 'selected' : '') : '' ?>>Divorced</option>
                  <option value="Widow/Widower" <?= (isset($ProfileDetails['marital_status']) && !empty($ProfileDetails['marital_status'])) ? (($ProfileDetails['marital_status'] == 'Widow/Widower') ? 'selected' : '') : '' ?>>Widow/Widower</option>
                  <option value="Separated" <?= (isset($ProfileDetails['marital_status']) && !empty($ProfileDetails['marital_status'])) ? (($ProfileDetails['marital_status'] == 'Separated') ? 'selected' : '') : '' ?>>Separated</option>
                  <option value="Nikah Divorced" <?= (isset($ProfileDetails['marital_status']) && !empty($ProfileDetails['marital_status'])) ? (($ProfileDetails['marital_status'] == 'Nikah Divorced') ? 'selected' : '') : '' ?>>Nikah Divorced</option>
                  <option value="Married" <?= (isset($ProfileDetails['marital_status']) && !empty($ProfileDetails['marital_status'])) ? (($ProfileDetails['marital_status'] == 'Married') ? 'selected' : '') : '' ?>>Married</option>
                </select>
              </div>
              <div class="form-group">
                <label for="inputName">Physical status  <font color="red">*</font></label>
                <select id="inputStatus" class="form-control custom-select" name="physical_status" required="">
                  <option value="">--Select--</option>
                  <option value="Normal" <?= (isset($ProfileDetails['physical_status']) && !empty($ProfileDetails['physical_status'])) ? (($ProfileDetails['physical_status'] == 'Normal') ? 'selected' : '') : '' ?>>Normal</option>
                  <option value="Physically Challenged" <?= (isset($ProfileDetails['physical_status']) && !empty($ProfileDetails['physical_status'])) ? (($ProfileDetails['physical_status'] == 'Physically Challenged') ? 'selected' : '') : '' ?>>Physically Challenged</option>
                </select>
              </div>
              <div class="form-group">
                <label for="inputClientCompany">Mother Tongue</label>
                <select id="inputStatus" class="form-control custom-select" name="mother_tongue">
                    <option value="">--Select--</option>
                    <?php foreach ($mothertongue as $value) { ?>
                    <option value="<?php echo $value->mothertongue_id ?>" <?= (isset($ProfileDetails['mothertongue']) && !empty($ProfileDetails['mothertongue'])) ? ($ProfileDetails['mothertongue'] == $value->mothertongue ? 'selected' : '') : '' ?>><?php echo $value->mothertongue; ?></option>  
                    <?php } ?>
                  
                </select>
              </div>
              <div class="form-group">
                <label for="inputName">Blood Group </label>
                <select id="inputStatus" class="form-control custom-select" name="blood_group">
                  <option value="">--Select--</option>
                  <option value="A+ve" <?= (isset($ProfileDetails['blood_group']) && !empty($ProfileDetails['blood_group'])) ? (($ProfileDetails['blood_group'] == 'A+ve') ? 'selected' : '') : '' ?>>A+ve</option>
                  <option value="A-ve" <?= (isset($ProfileDetails['blood_group']) && !empty($ProfileDetails['blood_group'])) ? (($ProfileDetails['blood_group'] == 'A-ve') ? 'selected' : '') : '' ?>>A-ve</option>
                  <option value="B+ve" <?= (isset($ProfileDetails['blood_group']) && !empty($ProfileDetails['blood_group'])) ? (($ProfileDetails['blood_group'] == 'B+ve') ? 'selected' : '') : '' ?>>B+ve</option>
                  <option value="B-ve" <?= (isset($ProfileDetails['blood_group']) && !empty($ProfileDetails['blood_group'])) ? (($ProfileDetails['blood_group'] == 'B-ve') ? 'selected' : '') : '' ?>>B-ve</option>
                  <option value="A+ve" <?= (isset($ProfileDetails['blood_group']) && !empty($ProfileDetails['blood_group'])) ? (($ProfileDetails['blood_group'] == 'A+ve') ? 'selected' : '') : '' ?>>O+ve</option>
                  <option value="A-ve" <?= (isset($ProfileDetails['blood_group']) && !empty($ProfileDetails['blood_group'])) ? (($ProfileDetails['blood_group'] == 'A-ve') ? 'selected' : '') : '' ?>>O-ve</option>
                  <option value="B+ve" <?= (isset($ProfileDetails['blood_group']) && !empty($ProfileDetails['blood_group'])) ? (($ProfileDetails['blood_group'] == 'B+ve') ? 'selected' : '') : '' ?>>AB+ve</option>
                  <option value="B-ve" <?= (isset($ProfileDetails['blood_group']) && !empty($ProfileDetails['blood_group'])) ? (($ProfileDetails['blood_group'] == 'B-ve') ? 'selected' : '') : '' ?>>AB-ve</option>
                </select>
              </div>
              <div class="form-group">
                <label for="inputClientCompany">Belief</label>
                <select id="inputStatus" class="form-control custom-select" name="belief">
                    <option value="">--Select--</option>
                    <?php foreach ($belief as $value) { ?>
                    <option value="<?php echo $value->sid ?>" <?= (isset($ProfileDetails['user_caste']) && !empty($ProfileDetails['user_caste'])) ? ($ProfileDetails['user_caste'] == $value->sub_caste ? 'selected' : '') : '' ?>><?php echo $value->sub_caste; ?></option>  
                    <?php } ?>
                  
                </select>
              </div>
              <div class="form-group">
                <label for="inputName">Address <font color="red">*</font></label>
                <textarea id="inputName" class="form-control" name="address"><?= !empty($ProfileDetails['address']) && $ProfileDetails['address'] != 'NULL' ? $ProfileDetails['address'] : '' ?></textarea>
              </div>
              <div class="form-group">
                <label for="inputName">City/Street <font color="red">*</font></label>
                <input type="text" id="inputName" class="form-control" name="city" required="" value="<?= !empty($ProfileDetails['native_place']) && $ProfileDetails['native_place'] != 'NULL' ? $ProfileDetails['native_place'] : '' ?>">
              </div>
              <div class="form-group">
                <label for="inputName">Pincode </label>
                <input type="number" id="inputName" class="form-control" name="pincode" value="<?= !empty($ProfileDetails['pincode']) && $ProfileDetails['pincode'] != 'NULL' ? $ProfileDetails['pincode'] : '' ?>">
              </div>
              <div class="form-group">
                <label for="inputClientCompany">District <font color="red">*</font></label>
                <select id="inputStatus" class="form-control custom-select" name="district" required="">
                    <option value="">--Select--</option>
                    <?php foreach ($district as $value) { ?>
                    <option value="<?php echo $value->district_id ?>" <?= (isset($ProfileDetails['district']) && !empty($ProfileDetails['district'])) ? ($ProfileDetails['district'] == $value->district ? 'selected' : '') : '' ?>><?php echo $value->district; ?></option>  
                    <?php } ?>
                  
                </select>
              </div>
              <div class="form-group">
                <label for="inputName">Other Contact Number </label>
                <input type="number" id="inputName" class="form-control" name="othercontactno" pattern="[6-9]{1}[0-9]{9}" 
       title="Phone number with 6-9 and remaing 9 digit with 0-9" value="<?= !empty($ProfileDetails['other_contact_number']) && $ProfileDetails['other_contact_number'] != 'NULL'? $ProfileDetails['other_contact_number'] : '' ?>">
              </div>
              <div class="form-group">
                <label for="inputClientCompany">Highest Education<font color="red">*</font></label>
              
               <select id="inputStatus" class="form-control custom-select" name="qualification" required="">
                    <option value="">--Select--</option>
                    <?php foreach ($qualification as $value) { ?>
                    <option value="<?php echo $value->edu_id ?>" <?= (isset($ProfileDetails['education']) && !empty($ProfileDetails['education'])) ? ($ProfileDetails['education'] == $value->education ? 'selected' : '') : '' ?>><?php echo $value->education; ?></option>  
                    <?php } ?>
                  
                </select>
                
              </div>
              <div class="form-group">
                <label for="inputClientCompany">Job</label>
               
               <select id="inputStatus" class="form-control custom-select" name="job">
                    <option value="">--Select--</option>
                    <?php foreach ($job as $value) { ?>
                    <option value="<?php echo $value->profession_id ?>" <?= (isset($ProfileDetails['profession_name']) && !empty($ProfileDetails['profession_name'])) ? ($ProfileDetails['profession_name'] == $value->profession_name ? 'selected' : '') : '' ?>><?php echo $value->profession_name; ?></option>  
                    <?php } ?>
                  
                </select>
              </div>
              <div class="form-group">
                <label for="inputDescription">Job status</label>
                <input type="radio" name="job_status" value="Private" <?= (isset($ProfileDetails['job_category']) && !empty($ProfileDetails['job_category'])) ? ($ProfileDetails['job_category'] == 'Private' ? 'checked' : '') : '' ?>>Private
                <input type="radio" name="job_status" value="Government" <?= (isset($ProfileDetails['job_category']) && !empty($ProfileDetails['job_category'])) ? ($ProfileDetails['job_category'] == 'Government' ? 'checked' : '') : '' ?>>Government
                <input type="radio" name="job_status" value="Self" <?= (isset($ProfileDetails['job_category']) && !empty($ProfileDetails['job_category'])) ? ($ProfileDetails['job_category'] == 'Self' ? 'checked' : '') : '' ?>>Self
              </div>
              <div class="form-group">
                <label for="inputName">Annual Income </label>
                <input type="number" id="inputName" class="form-control" name="annual_income" value="<?= !empty($ProfileDetails['annual_income']) && $ProfileDetails['annual_income'] != 'NULL'? $ProfileDetails['annual_income'] : '' ?>">
              </div>
              <div class="form-group">
                <label for="inputName">Hobbies </label>
                <input type="text" id="inputName" class="form-control" name="hobbies" value="<?= !empty($ProfileDetails['registration_hobbies']) && $ProfileDetails['registration_hobbies'] != 'NULL'? $ProfileDetails['registration_hobbies'] : '' ?>">
              </div>
              
              <div class="form-group">
                <label for="inputDescription">Photo visibility</label>
                <div class="row">
                  <div class="col-md-6">
                    <input type="radio" name="photo_visibility" value="0" checked <?= (isset($ProfileDetails['photo_visibility']) && !empty($ProfileDetails['photo_visibility'])) ? ($ProfileDetails['photo_visibility'] == '0' ? 'checked' : '') : '' ?>>Public
                  </div>
                  <div class="col-md-6">
                    <input type="radio" name="photo_visibility" value="1" <?= (isset($ProfileDetails['photo_visibility']) && !empty($ProfileDetails['photo_visibility'])) ? ($ProfileDetails['photo_visibility'] == '1' ? 'checked' : '') : '' ?>>Protected
                  </div>
                  
                   
                   <div class="row password-protection" id="password-protection" style="display: none">
                            <?php 

                            $photo_settings = $this->General_Model->photo_settings($this->uri->segment(4));
                            ?>
                            <div class="col-lg-12 settings-form">
                                <label>Password:</label>
                                <input type="password" name="photopassword" id="photopassword" autocomplete="new-password" <?php if(!empty($photo_settings->photopassword)){if($photo_settings->photopassword != '0'){ echo 'value="'.$photo_settings->photopassword.'"';}}?>>   
                                <i class="fa fa-eye" id="togglePassword" class="togglePassword"></i>
                            </div>
                            <div class="col-lg-12 settings-form">
                                <label>
                                <input type="checkbox" name="showtoexpress" <?php if(!empty($photo_settings->showtoexpress)){if($photo_settings->showtoexpress != '0'){ echo 'checked';}}?>>
                                Show my photo to express interest accepted members</label>
                            </div>
                            <div class="col-lg-12 settings-form">
                                <label>
                                <input type="checkbox" name="showtopremium" <?php if(!empty($photo_settings->showtopremium)){if($photo_settings->showtopremium != '0'){ echo 'checked';}}?>>
                                Show my photo to premium members</label>
                            </div>  
                    </div> 
                
                    
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-6">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Family details</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Father's Name </label>
                <input type="text" id="inputName" class="form-control" name="fathers_name" value="<?= !empty($ProfileDetails['fathers_name']) && $ProfileDetails['fathers_name'] != 'NULL'? $ProfileDetails['fathers_name'] : '' ?>">
              </div>
              <div class="form-group">
                <label for="inputName">Occupation of Father </label>
                <input type="text" id="inputName" class="form-control" name="father_occupation" value="<?= !empty($ProfileDetails['fathers_occupation']) && $ProfileDetails['fathers_occupation'] != 'NULL'? $ProfileDetails['fathers_occupation'] : '' ?>">
              </div>
              <div class="form-group">
                <label for="inputName">Mother's Name </label>
                <input type="text" id="inputName" class="form-control" name="mothers_name" value="<?= !empty($ProfileDetails['mothers_name']) && $ProfileDetails['mothers_name'] != 'NULL'? $ProfileDetails['mothers_name'] : '' ?>">
              </div>
              <div class="form-group">
                <label for="inputName">Occupation of Mother </label>
                <input type="text" id="inputName" class="form-control" name="mother_occupation" value="<?= !empty($ProfileDetails['mothers_occupation']) && $ProfileDetails['mothers_occupation'] != 'NULL'? $ProfileDetails['mothers_occupation'] : '' ?>">
              </div>
              <div class="form-group">
                <label for="inputName">Number of family members </label>
                <select id="inputStatus" class="form-control custom-select" name="no_of_family_members">
                  <option value="">--Select--</option>
                  <?php for ($i=0; $i <=20 ; $i++) { ?>
                    <option value="<?php echo $i; ?>" <?= (isset($ProfileDetails['total_members']) && !empty($ProfileDetails['total_members'])) ? ($ProfileDetails['total_members'] == $i ? 'selected' : '') : '' ?>><?php echo $i; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label for="inputName">Financial Status </label>
                <select id="inputStatus" class="form-control custom-select" name="financial_status">
                  <option value="">--Select--</option>
                  <?php foreach ($financialstatus as $value) { ?>
                    <option value="<?php echo $value->financialstatus; ?>" ><?php echo $value->financialstatus; ?></option>
                  <?php } ?>
                  
                </select>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Partner Preference</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
 

              <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Age From</label>
                <select id="inputStatus" class="form-control custom-select AgeFrom" name="age_from" >
                  <option value="">Select</option>
                  <?php for ($i=18; $i <=80 ; $i++) {  ?>
                    <option value="<?php echo $i; ?>" <?= (isset($ProfileDetails['partner_age_from']) && !empty($ProfileDetails['partner_age_from'])) ? ($ProfileDetails['partner_age_from'] == $i ? 'selected' : '') : '' ?>><?php echo $i; ?></option>
                  <?php } ?>
                </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Age To</label>
                <select id="inputStatus" class="form-control custom-select AgeTo doubleinput" name="age_to">
                  <option value="">Select</option>
                  <?php for ($i=18; $i <=80 ; $i++) {  ?>
                    <option value="<?php echo $i; ?>" <?= (isset($ProfileDetails['age']) && !empty($ProfileDetails['age'])) ? ($ProfileDetails['age'] == $i ? 'selected' : '') : '' ?>><?php echo $i; ?></option>
                  <?php } ?>
                </select>
                      </div>
                    </div>
                  </div>

              <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Height From</label>
             <select id="inputStatus" class="form-control custom-select HeightFrom" name="height_preference_from">
                    <option value="">Select</option>
                    <?php foreach ($Height as $value) { ?>
                    <option value="<?php echo $value->height_id ?>" <?= (isset($ProfileDetails['partner_height_from']) && !empty($ProfileDetails['partner_height_from'])) ? ($ProfileDetails['partner_height_from'] == $value->height ? 'selected' : '') : '' ?>><?php echo $value->height; ?></option>  
                    <?php } ?>
                  
                </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Height To</label>
                <select id="inputStatus" class="form-control custom-select HeightTo" name="height_preference_to">
                    <option value="">Select</option>
                    <?php foreach ($Height as $value) { ?>
                    <option value="<?php echo $value->height_id ?>" <?= (isset($ProfileDetails['partner_height_to']) && !empty($ProfileDetails['partner_height_to'])) ? ($ProfileDetails['partner_height_to'] == $value->height ? 'selected' : '') : '' ?>><?php echo $value->height; ?></option>  
                    <?php } ?>
                  
                </select>
                      </div>
                    </div>
                  </div>    

 
              <div class="form-group">
                <label for="inputClientCompany">Qualification Preference</label>
                <select id="inputStatus" class="form-control custom-select" name="qualification_preference">
                    <option value="">--Select--</option>
                    <?php foreach ($highest_education as $value) { ?>
                    <option value="<?php echo $value->id ?>" <?= (isset($ProfileDetails['partner_education']) && !empty($ProfileDetails['partner_education'])) ? ($ProfileDetails['partner_education'] == $value->high_education ? 'selected' : '') : '' ?>><?php echo $value->high_education; ?></option>  
                    <?php } ?>
                  
                </select>
              </div>
              <div class="form-group">
                <label for="inputName">Family Type Preference </label>
                <select id="inputStatus" class="form-control custom-select" name="family_type_preference">
                  <option value="">--Select--</option>
                  <option value="Very Rich" <?= (isset($ProfileDetails['partner_familytype']) && !empty($ProfileDetails['partner_familytype'])) ? (($ProfileDetails['partner_familytype'] == 'Very Rich') ? 'selected' : '') : '' ?>>Very Rich</option>
                  <option value="Rich" <?= (isset($ProfileDetails['partner_familytype']) && !empty($ProfileDetails['partner_familytype'])) ? (($ProfileDetails['partner_familytype'] == 'Rich') ? 'selected' : '') : '' ?>>Rich</option>
                  <option value="Middle class" <?= (isset($ProfileDetails['partner_familytype']) && !empty($ProfileDetails['partner_familytype'])) ? (($ProfileDetails['partner_familytype'] == 'Middle class') ? 'selected' : '') : '' ?>>Middle class</option>
                  <option value="Poor" <?= (isset($ProfileDetails['partner_familytype']) && !empty($ProfileDetails['partner_familytype'])) ? (($ProfileDetails['partner_familytype'] == 'A+ve') ? 'selected' : '') : '' ?>>Poor</option>
                </select>
              </div>
              <div class="form-group">
                <label for="inputName">Expectations </label>
                <textarea id="inputName" class="form-control" name="expectations" ><?= !empty($ProfileDetails['partner_expectation']) && $ProfileDetails['partner_expectation'] != 'NULL'? $ProfileDetails['partner_expectation'] : '' ?></textarea>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <input type="reset" value="Reset" class="btn btn-secondary">
          <?php if(isset($ProfileDetails)){ ?>
              <input type="submit" value="Update User Details" class="btn btn-success float-right" name="submit">
          <?php  } 
          else{ ?>
              <input type="submit" value="Save User Details" class="btn btn-success float-right" name="submit">
          <?php }
          ?>
        </div>
      </div>
    </section>
    </form>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include('includes/footer.php'); ?>
</body>
<script type="text/javascript">
$(document).ready( function() {
    photo_protection_onload();
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
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#phone').keypress(function (e) {
    var regex = new RegExp("^[0-9-]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }

    e.preventDefault();
    return false;
});

   });
</script>
</html>