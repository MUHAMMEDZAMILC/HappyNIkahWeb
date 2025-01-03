<!DOCTYPE html>
<html>
<?php include('include/header.php'); ?>
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

    <section id="userContent">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-5 col-lg-4">
                    <?php include('include/user_info.php') ?>
                    <div class="proPhotoUpload">
                        <h5 class="listTypeHead">Photos <span></span><?php echo count($images); ?></h5>
                        <div class="row" id="ajaxappendimage">

                        <?php foreach ($images as $image) { ?>
                             
                            <div class="col-6 col-sm-4 col-md-6 col-lg-4" id="imagediv<?php echo $image->user_image_id; ?>">
                                <div class="proUpldedImg">
                                <button class="closeimgbtn" alt="delete" onclick="deleteprpick('<?php echo $image->user_image_id; ?>')">x</button>
                                <button class="dpimgbtn" alt="Set profile picture" onclick="changeprpick('<?php echo $image->user_image; ?>')"><i class="fa fa-user" aria-hidden="true"></i></button>
                                    <img src="<?php echo base_url() ?>assets/photo_storage/<?php echo $image->user_image; ?>" alt="profile image" class="proImg">
                                </div>
                            </div>

                            <?php } ?>
                             
                             
                          <?php if(count($images)!=3){?>
                            <div class="col-6 col-sm-4 col-md-6 col-lg-4">
                                <div class="proUpldedImg">
                                    <div class="uploadProWarpr">
                                        <button class="btn">
                                            <img src="<?php echo base_url() ?>assets/images/plus.png">
                                        </button>
                                        <input type="file" name="myfile" id="uploadimage"/>
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                        </div>
                        
                        <p>Photo Protection</p>
                        <div class="row">
                            <div class="col-lg-4">
                                <label>
                                <input type="radio" name="photo_protection" value="0" <?php if($ProfileDetails['photo_visibility'] == '0'){ echo "checked";}?>>
                                Public</label>
                            </div>
                            <div class="col-lg-4">
                                <label>
                                <input type="radio" name="photo_protection" value="1" <?php if($ProfileDetails['photo_visibility'] == '1'){ echo "checked";}?>>
                                Protected</label>
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
                        <span id="settings_error" style="color: red;text-align: center;"></span>
                        <div class="col-lg-12 text-center settings-form">
                            <button type="button" class="submit-settings" name="submit-settings" id="submit-settings" onclick="submit_setting('<?= $this->session->userdata('user_id')?>')">Save</button>
                        </div>
                    </div>
                    <?php include('include/side_menu.php'); ?>
                    <!-- mobile app advrtisment -->
                    <div class="appAdvBox2">
                        <h2 class="subHead mb-4">Search Profiles<br><span>Anytime! Anywhere!!</span></h2>
                        <p class="pOne">Finding your perfect match has never been easier without the Happynikah application</p>
                        <p class="pTwo">Download now and communicate with muslim matches on-the-go!</p>
                        <img src="<?php echo base_url() ?>assets/images/appMob1.png" class="mobAppIcon">
                        <div class="row">
                            <div class="col-6 col-sm-6 d-flex align-items-center justify-content-center">
                                <a href="javascript:void(0)">
                                    <img src="<?php echo base_url() ?>assets/images/appleStore.png" alt="appleStore" class="storeIcon" width="auto" height="auto">
                                </a>
                            </div>
                            <div class="col-6 col-sm-6 d-flex align-items-center justify-content-center">
                                <a target="_blank" href="https://play.google.com/store/apps/details?id=com.sysol.happy_nikah">
                                    <img src="<?php echo base_url() ?>assets/images/playStore.png" alt="playStore" class="storeIcon" width="auto" height="auto">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-7 col-lg-8">
                   
                    <!-- profile edit -->
                    <div class="customCard">
                        <form class="customForm viewOnly" id="profileAbout" action="<?php echo site_url('user/update_about'); ?>" method="post" autocomplete="off">
                        <div class="customCardHeader">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <h2 class="cardHead mb-0">About</h2>
                                </div>
                                <div class="col-6 d-flex align-items-center justify-content-end">
                                    <button type="button" class="editBtn aboutEditBtn">
                                        <img src="<?php echo base_url() ?>assets/images/editing.png">
                                        Edit
                                    </button>
                                    <button type="submit" class="saveBtn aboutSaveBtn d-none">
                                        <img src="<?php echo base_url() ?>assets/images/seen.png">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                            <textarea style="height:<?php echo (strlen($ProfileDetails['about'])/2).'px' ;?>" name="about" class="form-control" placeholder="" ><?= !empty($ProfileDetails['about'])? $ProfileDetails['about'] : '' ?></textarea>
                        </form>
                    </div>
                    
                    <div class="row">
                        <div class="col-12 col-xxl-6 d-flex align-items-stretch">
                            <div class="customCard"> 
                            <form class="customForm viewOnly" id="profilebi" action="<?php echo site_url('user/update_basic_info'); ?>" method="post" autocomplete="off">
                                <div class="customCardHeader">
                                    <div class="row">
                                        <div class="col-6 d-flex align-items-center">
                                            <h2 class="cardHead mb-0">Basic Information</h2>
                                        </div>
                                        <div class="col-6 d-flex align-items-center justify-content-end">
                                            <button type="button" class="editBtn biEditBtn">
                                                <img src="<?php echo base_url() ?>assets/images/editing.png">
                                                Edit
                                            </button>
                                            <button type="submit" class="saveBtn biSaveBtn d-none">
                                                <img src="<?php echo base_url() ?>assets/images/seen.png">
                                                Save
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                
                                    <div class="row mb-3">
                                        <div class="col-6 d-flex justify-content-between align-items-center">
                                            <label class="form-label mb-0">Created By</label>
                                            <span>:</span>
                                        </div>
                                        <div class="col-6 d-flex align-items-center">
                                            <select class="form-select form-control" aria-label="" name="profile_for">
                                            <option value="">Select</option>
                                                <option value="self" <?= (isset($ProfileDetails['profile_for']) && !empty($ProfileDetails['profile_for'])) ? (($ProfileDetails['profile_for'] == 'self') ? 'selected' : '') : '' ?>>Self</option>
                                                  <option value="Parents" <?= (isset($ProfileDetails['profile_for']) && !empty($ProfileDetails['profile_for'])) ? (($ProfileDetails['profile_for'] == 'Parents') ? 'selected' : '') : '' ?>>Parents</option>
                                                  <option value="Brother" <?= (isset($ProfileDetails['profile_for']) && !empty($ProfileDetails['profile_for'])) ? (($ProfileDetails['profile_for'] == 'Brother') ? 'selected' : '') : '' ?> >Brother</option>
                                                  <option value="Sister" <?= (isset($ProfileDetails['profile_for']) && !empty($ProfileDetails['profile_for'])) ? (($ProfileDetails['profile_for'] == 'Sister') ? 'selected' : '') : '' ?>>Sister</option>
                                                  <option value="Relatives" <?= (isset($ProfileDetails['profile_for']) && !empty($ProfileDetails['profile_for'])) ? (($ProfileDetails['profile_for'] == 'Relatives') ? 'selected' : '') : '' ?>>Relatives</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-6 d-flex justify-content-between align-items-center">
                                            <label class="form-label mb-0">Name</label>
                                            <span>:</span>
                                        </div>
                                        <div class="col-6 d-flex align-items-center">
                                            <input type="text" class="form-control" name="name" value="<?= !empty($ProfileDetails['name'])? $ProfileDetails['name'] : '' ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-6 d-flex justify-content-between align-items-center">
                                            <label class="form-label mb-0">Phone</label>
                                            <span>:</span>
                                        </div>
                                        <div class="col-6 d-flex align-items-center">
                                            <!--<input type="number" id="inputName" class="form-control" name="phone" value="<?= !empty($ProfileDetails['phone']) && $ProfileDetails['phone'] != 'NULL' ? $ProfileDetails['phone'] : '' ?>">-->
                                            <p><?= !empty($ProfileDetails['phone']) && $ProfileDetails['phone'] != 'NULL' ? $ProfileDetails['phone'] : '' ?></p>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-6 d-flex justify-content-between align-items-center">
                                            <label class="form-label mb-0">Email</label>
                                            <span>:</span>
                                        </div>
                                        <div class="col-6 d-flex align-items-center">
                                             <input type="email" id="inputName" class="form-control" name="mail" value="<?= !empty($ProfileDetails['mail']) && $ProfileDetails['mail'] != 'NULL' ? $ProfileDetails['mail'] : '' ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-6 d-flex justify-content-between align-items-center">
                                            <label class="form-label mb-0">Gender</label>
                                            <span>:</span>
                                        </div>
                                        <div class="col-6 d-flex align-items-center">

                                            <!--<select class="form-select form-control" aria-label="" name="gender">-->
                                            <!--<option value="">Select</option>-->
                                            <!--      <option value="1" <?= (isset($ProfileDetails['gender']) && !empty($ProfileDetails['gender'])) ? (($ProfileDetails['gender'] == '1') ? 'selected' : '') : '' ?>>Male</option>-->
                                            <!--      <option value="2" <?= (isset($ProfileDetails['gender']) && !empty($ProfileDetails['gender'])) ? (($ProfileDetails['gender'] == '2') ? 'selected' : '') : '' ?>>Female</option>-->
                                            <!--</select>-->
                                            <p><?= (($ProfileDetails['gender'] == '1') ? 'Male' : 'Female');?></p>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-6 d-flex justify-content-between align-items-center">
                                            <label class="form-label mb-0">Age</label>
                                            <span>:</span>
                                        </div>
                                        <div class="col-6 d-flex align-items-center">
                                            <select class="form-select form-control" aria-label="" name="age" >
                                            <option value="">Select</option>
                                            <?php for ($i=18; $i <=80 ; $i++) {  ?>
                                            <option value="<?php echo $i; ?>" <?= (isset($ProfileDetails['age']) && !empty($ProfileDetails['age'])) ? ($ProfileDetails['age'] == $i ? 'selected' : '') : '' ?>><?php echo $i; ?></option>
                                            <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-6 d-flex justify-content-between align-items-center">
                                            <label class="form-label mb-0">Marital Status</label>
                                            <span>:</span>
                                        </div>
                                        <div class="col-6 d-flex align-items-center">
                                            <select class="form-select form-control marital_status" aria-label="" name="marital_status" >
                                            <option value="">Select</option>
                                              <option value="Unmarried" <?= (isset($ProfileDetails['marital_status']) && !empty($ProfileDetails['marital_status'])) ? (($ProfileDetails['marital_status'] == 'Unmarried') ? 'selected' : '') : '' ?>>Unmarried</option>
                                              <option value="Divorced" <?= (isset($ProfileDetails['marital_status']) && !empty($ProfileDetails['marital_status'])) ? (($ProfileDetails['marital_status'] == 'Divorced') ? 'selected' : '') : '' ?>>Divorced</option>
                                              <option value="Widow/Widower" <?= (isset($ProfileDetails['marital_status']) && !empty($ProfileDetails['marital_status'])) ? (($ProfileDetails['marital_status'] == 'Widow/Widower') ? 'selected' : '') : '' ?>>Widow/Widower</option>
                                              <option value="Separated" <?= (isset($ProfileDetails['marital_status']) && !empty($ProfileDetails['marital_status'])) ? (($ProfileDetails['marital_status'] == 'Separated') ? 'selected' : '') : '' ?>>Separated</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3" id="no_of_children">
                                        <div class="col-6 d-flex justify-content-between align-items-center">
                                            <label class="form-label mb-0">No of Children</label>
                                            <span>:</span>
                                        </div>
                                        <div class="col-6 d-flex align-items-center">
                                            <input type="number" id="noofchildren" class="form-control" name="no_of_children" value="<?= !empty($ProfileDetails['no_of_children']) && $ProfileDetails['no_of_children'] != 'NULL'? $ProfileDetails['no_of_children'] : '' ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-6 d-flex justify-content-between align-items-center">
                                            <label class="form-label mb-0">Mother Tongue</label>
                                            <span>:</span>
                                        </div>
                                        <div class="col-6 d-flex align-items-center">
                                            <select class="form-select form-control" aria-label="" name="mother_tongue" >
                                            <option value="">Select</option>
                                                <?php foreach ($mothertongue as $value) { ?>
                                                <option value="<?php echo $value->mothertongue_id ?>" <?= (isset($ProfileDetails['mothertongue']) && !empty($ProfileDetails['mothertongue'])) ? ($ProfileDetails['mothertongue'] == $value->mothertongue ? 'selected' : '') : '' ?>><?php echo $value->mothertongue; ?></option>  
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-6 d-flex justify-content-between align-items-center">
                                            <label class="form-label mb-0">Other Contact Number </label>
                                            <span>:</span>
                                        </div>
                                        <div class="col-6 d-flex align-items-center">
                                            <input type="number" class="form-control" name="othercontactno" value="<?= !empty($ProfileDetails['other_contact_number']) && $ProfileDetails['other_contact_number'] != 'NULL'? $ProfileDetails['other_contact_number'] : '' ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-6 d-flex justify-content-between align-items-center">
                                            <label class="form-label mb-0">Hobbies </label>
                                            <span>:</span>
                                        </div>
                                        <div class="col-6 d-flex align-items-center">
                                            <input type="text" class="form-control" name="registration_hobbies" value="<?= !empty($ProfileDetails['registration_hobbies']) && $ProfileDetails['registration_hobbies'] != 'NULL'? $ProfileDetails['registration_hobbies'] : '' ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-6 d-flex justify-content-between align-items-center">
                                            <label class="form-label mb-0">Photo visibility </label>
                                            <span>:</span>
                                        </div>
                                        <div class="col-6 d-flex align-items-center">
                                             <select class="form-select form-control" aria-label="" name="photo_visibility" >
                                             <option value="">Select</option>
                                              <option value="option1" <?= (isset($ProfileDetails['photo_visibility']) && !empty($ProfileDetails['photo_visibility'])) ? (($ProfileDetails['photo_visibility'] == 'option1') ? 'selected' : '') : '' ?>>Private</option>
                                              <option value="option2" <?= (isset($ProfileDetails['photo_visibility']) && !empty($ProfileDetails['photo_visibility'])) ? (($ProfileDetails['photo_visibility'] == 'option2') ? 'selected' : '') : '' ?>>Public</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-12 col-xxl-6 d-flex align-items-stretch">
                            <div class="customCard">
                                <form class="customForm viewOnly" id="profileri" action="<?php echo site_url('user/update_religious_info'); ?>" method="post" autocomplete="off">
                                <div class="customCardHeader">
                                    <div class="row">
                                        <div class="col-6 d-flex align-items-center">
                                            <h2 class="cardHead mb-0">Religious Information</h2>
                                        </div>
                                        <div class="col-6 d-flex align-items-center justify-content-end">
                                            <button type="button" class="editBtn riEditBtn">
                                                <img src="<?php echo base_url() ?>assets/images/editing.png">
                                                Edit
                                            </button>
                                            <button type="submit" class="saveBtn riSaveBtn d-none">
                                                <img src="<?php echo base_url() ?>assets/images/seen.png">
                                                Save
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                
                                    <div class="row mb-3">
                                        <div class="col-6 d-flex justify-content-between align-items-center">
                                            <label class="form-label mb-0">Religion</label>
                                            <span>:</span>
                                        </div>
                                        <div class="col-6 d-flex align-items-center">
                                            <input type="text" name="" class="form-control" name="user_religion" value="Muslim">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-6 d-flex justify-content-between align-items-center">
                                            <label class="form-label mb-0">Belief</label>
                                            <span>:</span>
                                        </div>
                                        <div class="col-6 d-flex align-items-center">
                                            <select class="form-select form-control belief" aria-label="" name="user_caste">
                                            <option value="">Select</option>
                                                <?php  foreach ($belief as $value) { ?>
                                                <option value="<?php echo $value->sid ?>" <?= (isset($ProfileDetails['user_caste']) && !empty($ProfileDetails['user_caste'])) ? ($ProfileDetails['user_caste'] == $value->sub_caste ? 'selected' : '') : '' ?>><?php echo $value->sub_caste; ?></option>  <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-xxl-6 d-flex align-items-stretch">
                            <div class="customCard">
                                <form class="customForm viewOnly" id="profileprf" action="<?php echo site_url('user/update_professional_info'); ?>" method="post" autocomplete="off">
                                <div class="customCardHeader">
                                    <div class="row">
                                        <div class="col-6 d-flex align-items-center">
                                            <h2 class="cardHead mb-0">Professional</h2>
                                        </div>
                                        <div class="col-6 d-flex align-items-center justify-content-end">
                                            <button type="button" class="editBtn prfEditBtn">
                                                <img src="<?php echo base_url() ?>assets/images/editing.png">
                                                Edit
                                            </button>
                                            <button type="submit" class="saveBtn prfSaveBtn d-none">
                                                <img src="<?php echo base_url() ?>assets/images/seen.png">
                                                Save
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                
                                    <div class="row mb-3">
                                        <div class="col-6 d-flex justify-content-between align-items-center">
                                            <label class="form-label mb-0">Highest Education</label>
                                            <span>:</span>
                                        </div>
                                        <div class="col-6 d-flex align-items-center">
                                            <select class="form-select form-control" aria-label="" name="qualification">
                                            <option value="">Select</option>
                                                <?php foreach ($qualification as $value) { ?>
                                                <option value="<?php echo $value->qualification_id ?>" <?= (isset($ProfileDetails['qualification']) && !empty($ProfileDetails['qualification'])) ? ($ProfileDetails['qualification'] == $value->qualification ? 'selected' : '') : '' ?>><?php echo $value->qualification; ?></option>  
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-6 d-flex justify-content-between align-items-center">
                                            <label class="form-label mb-0">Job</label>
                                            <span>:</span>
                                        </div>
                                        <div class="col-6 d-flex align-items-center">
                                            <select class="form-select form-control" aria-label="" name="job">
                                            <option value="">Select</option>
                                                <?php foreach ($job as $value) { ?>
                                                <option value="<?php echo $value->job_id ?>" <?= (isset($ProfileDetails['job_name']) && !empty($ProfileDetails['job_name'])) ? ($ProfileDetails['job_name'] == $value->job_name ? 'selected' : '') : '' ?>><?php echo $value->job_name; ?></option>  
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-6 d-flex justify-content-between align-items-center">
                                            <label class="form-label mb-0">Profession</label>
                                            <span>:</span>
                                        </div>
                                        <div class="col-6 d-flex align-items-center">
                                            <select class="form-select form-control" aria-label="" name="profession" >
                                            <option value="">Select</option>
                                                <?php foreach ($profession as $value) { ?>
                                                <option value="<?php echo $value->profession_id ?>" <?= (isset($ProfileDetails['profession']) && !empty($ProfileDetails['profession'])) ? ($ProfileDetails['profession'] == $value->profession_id ? 'selected' : '') : '' ?>><?php echo $value->profession_name; ?></option>  
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-6 d-flex justify-content-between align-items-center">
                                            <label class="form-label mb-0">Job status</label>
                                            <span>:</span>
                                        </div>
                                        <div class="col-6 d-flex align-items-center">
                                            <select class="form-select form-control" aria-label="" name="job_status">
                                            <option value="">Select</option>
                                                <option value="Private" <?= (isset($ProfileDetails['job_category']) && !empty($ProfileDetails['job_category'])) ? (($ProfileDetails['job_category'] == 'Private') ? 'selected' : '') : '' ?>>Private</option>
                                                <option value="Government" <?= (isset($ProfileDetails['job_category']) && !empty($ProfileDetails['job_category'])) ? (($ProfileDetails['job_category'] == 'Government') ? 'selected' : '') : '' ?>>Government</option>
                                                <option value="Self" <?= (isset($ProfileDetails['job_category']) && !empty($ProfileDetails['job_category'])) ? (($ProfileDetails['job_category'] == 'Self') ? 'selected' : '') : '' ?>>Self</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-6 d-flex justify-content-between align-items-center">
                                            <label class="form-label mb-0">Annual Income </label>
                                            <span>:</span>
                                        </div>
                                        <div class="col-6 d-flex align-items-center">
                                             <select id="inputStatus" class="form-select form-control" aria-label="" name="annual_income">
                                                      <option value="">Select</option>
                                                      <option value="10000 - 100000" <?= (isset($ProfileDetails['annual_income'])) && !empty($ProfileDetails['annual_income']) ? (($ProfileDetails['annual_income'] == '10000 - 100000') ? 'selected' : '') : '' ?>>10000 - 100000</option>
                                                      <option value="100000 - 200000" <?= (isset($ProfileDetails['annual_income'])) && !empty($ProfileDetails['annual_income']) ? (($ProfileDetails['annual_income'] == '100000 - 200000') ? 'selected' : '') : '' ?>>100000 - 200000</option>
                                                      <option value="200000 - 300000" <?= (isset($ProfileDetails['annual_income'])) && !empty($ProfileDetails['annual_income']) ? (($ProfileDetails['annual_income'] == '200000 - 300000') ? 'selected' : '') : '' ?>>200000 - 300000</option>
                                                      <option value="300000 - 400000" <?= (isset($ProfileDetails['annual_income'])) && !empty($ProfileDetails['annual_income']) ? (($ProfileDetails['annual_income'] == '300000 - 400000') ? 'selected' : '') : '' ?>>300000 - 400000</option>
                                                      <option value="400000 - 500000" <?= (isset($ProfileDetails['annual_income'])) && !empty($ProfileDetails['annual_income']) ? (($ProfileDetails['annual_income'] == '400000 - 500000') ? 'selected' : '') : '' ?>>400000 - 500000</option>
                                                      <option value="500000 - 600000" <?= (isset($ProfileDetails['annual_income'])) && !empty($ProfileDetails['annual_income']) ? (($ProfileDetails['annual_income'] == '500000 - 600000') ? 'selected' : '') : '' ?>>500000 - 600000</option>
                                                      <option value="600000 - 700000" <?= (isset($ProfileDetails['annual_income'])) && !empty($ProfileDetails['annual_income']) ? (($ProfileDetails['annual_income'] == '600000 - 700000') ? 'selected' : '') : '' ?>>600000 - 700000</option>
                                                      <option value="700000 - 800000" <?= (isset($ProfileDetails['annual_income'])) && !empty($ProfileDetails['annual_income']) ? (($ProfileDetails['annual_income'] == '700000 - 800000') ? 'selected' : '') : '' ?>>700000 - 800000</option>
                                                      <option value="800000 - 900000" <?= (isset($ProfileDetails['annual_income'])) && !empty($ProfileDetails['annual_income']) ? (($ProfileDetails['annual_income'] == '800000 - 900000') ? 'selected' : '') : '' ?>>800000 - 900000</option>
                                                      <option value="900000 - 1000000" <?= (isset($ProfileDetails['annual_income'])) && !empty($ProfileDetails['annual_income']) ? (($ProfileDetails['annual_income'] == '900000 - 1000000') ? 'selected' : '') : '' ?>>900000 - 1000000</option>
                                                      <option value="1000000 - Above" <?= (isset($ProfileDetails['annual_income'])) && !empty($ProfileDetails['annual_income']) ? (($ProfileDetails['annual_income'] == '1000000 - Above') ? 'selected' : '') : '' ?>>1000000 - Above</option>
                                                      
                                             </select>
                                        </div>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                        <div class="col-12 col-xxl-6 d-flex align-items-stretch">
                            <div class="customCard">
                               <form class="customForm viewOnly" id="profilepa" action="<?php echo site_url('user/update_physical_info'); ?>" method="post" autocomplete="off">
                                <div class="customCardHeader">
                                    <div class="row">
                                        <div class="col-6 d-flex align-items-center">
                                            <h2 class="cardHead mb-0">Physical Attributes</h2>
                                        </div>
                                        <div class="col-6 d-flex align-items-center justify-content-end">
                                            <button type="button" class="editBtn paEditBtn">
                                                <img src="<?php echo base_url() ?>assets/images/editing.png">
                                                Edit
                                            </button>
                                            <button type="submit" class="saveBtn paSaveBtn d-none">
                                                <img src="<?php echo base_url() ?>assets/images/seen.png">
                                                Save
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                
                                    <div class="row mb-3">
                                        <div class="col-6 d-flex justify-content-between align-items-center">
                                            <label class="form-label mb-0">Height</label>
                                            <span>:</span>
                                        </div>
                                        <div class="col-6 d-flex align-items-center">
                                            <select class="form-select form-control" aria-label="" name="height">
                                            <option value="">Select</option>
                                                <?php foreach ($Height as $value) { ?>
                                                <option value="<?php echo $value->height_id ?>" <?= (isset($ProfileDetails['user_height']) && !empty($ProfileDetails['user_height'])) ? ($ProfileDetails['user_height'] == $value->height ? 'selected' : '') : '' ?>><?php echo $value->height; ?></option>  
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-6 d-flex justify-content-between align-items-center">
                                            <label class="form-label mb-0">Weight</label>
                                            <span>:</span>
                                        </div>
                                        <div class="col-6 d-flex align-items-center">
                                            <select class="form-select form-control" aria-label="" name="weight">
                                            <option value="">Select</option>
                                                <?php foreach ($weight as $value) { ?>
                                                <option value="<?php echo $value->weight_id ?>" <?= (isset($ProfileDetails['weight']) && !empty($ProfileDetails['weight'])) ? ($ProfileDetails['weight'] == $value->weight ? 'selected' : '') : '' ?>><?php echo $value->weight; ?></option>  
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-6 d-flex justify-content-between align-items-center">
                                            <label class="form-label mb-0">Color</label>
                                            <span>:</span>
                                        </div>
                                        <div class="col-6 d-flex align-items-center">
                                            <select class="form-select form-control" aria-label="" name="color">
                                            <option value="">Select</option>
                                              <option value="Very Fair" <?= (isset($ProfileDetails['color']) && !empty($ProfileDetails['color'])) ? (($ProfileDetails['color'] == 'Very Fair') ? 'selected' : '') : '' ?>>Very Fair</option>
                                              <option value="Fair" <?= (isset($ProfileDetails['color']) && !empty($ProfileDetails['color'])) ? (($ProfileDetails['color'] == 'Fair') ? 'selected' : '') : '' ?>>Fair</option>
                                              <option value="Wheatish" <?= (isset($ProfileDetails['color']) && !empty($ProfileDetails['color'])) ? (($ProfileDetails['color'] == 'Wheatish') ? 'selected' : '') : '' ?>>Wheatish</option>
                                              <option value="Wheatish Brown" <?= (isset($ProfileDetails['color']) && !empty($ProfileDetails['color'])) ? (($ProfileDetails['color'] == 'Wheatish Brown') ? 'selected' : '') : '' ?>>Wheatish Brown</option>
                                              <option value="Dark" <?= (isset($ProfileDetails['color']) && !empty($ProfileDetails['color'])) ? (($ProfileDetails['color'] == 'Dark') ? 'selected' : '') : '' ?>>Dark</option>
                                              <option value="Prefer not to say" <?= (isset($ProfileDetails['color']) && !empty($ProfileDetails['color'])) ? (($ProfileDetails['color'] == 'Prefer not to say') ? 'selected' : '') : '' ?>>Prefer not to say</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-6 d-flex justify-content-between align-items-center">
                                            <label class="form-label mb-0">Physical status</label>
                                            <span>:</span>
                                        </div>
                                        <div class="col-6 d-flex align-items-center">
                                            <select class="form-select form-control physical_status" aria-label="" name="physical_status">
                                            <option value="">Select</option>
                                                <option value="Normal" <?= (isset($ProfileDetails['physical_status']) && !empty($ProfileDetails['physical_status'])) ? (($ProfileDetails['physical_status'] == 'Normal') ? 'selected' : '') : '' ?>>Normal</option>
                                                <option value="Physically Challenged" <?= (isset($ProfileDetails['physical_status']) && !empty($ProfileDetails['physical_status'])) ? (($ProfileDetails['physical_status'] == 'Physically Challenged') ? 'selected' : '') : '' ?>>Physically Challenged</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3" id="type">
                                        <div class="col-6 d-flex justify-content-between align-items-center">
                                            <label class="form-label mb-0">Type of Physical Challenge </label>
                                            <span>:</span>
                                        </div>
                                        <div class="col-6 d-flex align-items-center">
                                             <input type="text" class="form-control" name="registration_phychallenge" value="<?= !empty($ProfileDetails['registration_phychallenge']) && $ProfileDetails['registration_phychallenge'] != 'NULL'? $ProfileDetails['registration_phychallenge'] : '' ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-6 d-flex justify-content-between align-items-center">
                                            <label class="form-label mb-0">Blood Group</label>
                                            <span>:</span>
                                        </div>
                                        <div class="col-6 d-flex align-items-center">
                                            <select class="form-select form-control" aria-label="" name="blood_group">
                                            <option value="">Select</option>
                                                  <option value="A+ve" <?= (isset($ProfileDetails['blood_group']) && !empty($ProfileDetails['blood_group'])) ? (($ProfileDetails['blood_group'] == 'A+ve') ? 'selected' : '') : '' ?>>A+ve</option>
                                                  <option value="A-ve" <?= (isset($ProfileDetails['blood_group']) && !empty($ProfileDetails['blood_group'])) ? (($ProfileDetails['blood_group'] == 'A-ve') ? 'selected' : '') : '' ?>>A-ve</option>
                                                  <option value="B+ve" <?= (isset($ProfileDetails['blood_group']) && !empty($ProfileDetails['blood_group'])) ? (($ProfileDetails['blood_group'] == 'B+ve') ? 'selected' : '') : '' ?>>B+ve</option>
                                                  <option value="B-ve" <?= (isset($ProfileDetails['blood_group']) && !empty($ProfileDetails['blood_group'])) ? (($ProfileDetails['blood_group'] == 'B-ve') ? 'selected' : '') : '' ?>>B-ve</option>
                                                  <option value="O+ve" <?= (isset($ProfileDetails['blood_group']) && !empty($ProfileDetails['blood_group'])) ? (($ProfileDetails['blood_group'] == 'O+ve') ? 'selected' : '') : '' ?>>O+ve</option>
                                                  <option value="O-ve" <?= (isset($ProfileDetails['blood_group']) && !empty($ProfileDetails['blood_group'])) ? (($ProfileDetails['blood_group'] == 'O-ve') ? 'selected' : '') : '' ?>>O-ve</option>
                                                  <option value="AB+ve" <?= (isset($ProfileDetails['blood_group']) && !empty($ProfileDetails['blood_group'])) ? (($ProfileDetails['blood_group'] == 'AB+ve') ? 'selected' : '') : '' ?>>AB+ve</option>
                                                  <option value="AB-ve" <?= (isset($ProfileDetails['blood_group']) && !empty($ProfileDetails['blood_group'])) ? (($ProfileDetails['blood_group'] == 'AB-ve') ? 'selected' : '') : '' ?>>AB-ve</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-xxl-6 d-flex align-items-stretch">
                            <div class="customCard">
                                <form class="customForm viewOnly" id="profilelctn" action="<?php echo site_url('user/update_location_info'); ?>" method="post" autocomplete="off">
                                <div class="customCardHeader">
                                    <div class="row">
                                        <div class="col-6 d-flex align-items-center">
                                            <h2 class="cardHead mb-0">Location</h2>
                                        </div>
                                        <div class="col-6 d-flex align-items-center justify-content-end">
                                            <button type="button" class="editBtn lctnEditBtn">
                                                <img src="<?php echo base_url() ?>assets/images/editing.png">
                                                Edit
                                            </button>
                                            <button type="submit" class="saveBtn lctnSaveBtn d-none">
                                                <img src="<?php echo base_url() ?>assets/images/seen.png">
                                                Save
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                
                                    <div class="row mb-3">
                                        <div class="col-6 d-flex justify-content-between align-items-center">
                                            <label class="form-label mb-0">Address </label>
                                            <span>:</span>
                                        </div>
                                        <div class="col-6 d-flex align-items-center">
                                            <input type="text" class="form-control" name="address" value="<?= !empty($ProfileDetails['address']) && $ProfileDetails['address'] != 'NULL' ? $ProfileDetails['address'] : '' ?>">
                                        </div>
                                    </div>
                                
                                    <div class="row mb-3">
                                        <div class="col-6 d-flex justify-content-between align-items-center">
                                            <label class="form-label mb-0">City/Street </label>
                                            <span>:</span>
                                        </div>
                                        <div class="col-6 d-flex align-items-center">
                                            <input type="text" class="form-control" name="city" value="<?= !empty($ProfileDetails['native_place']) && $ProfileDetails['native_place'] != 'NULL' ? $ProfileDetails['native_place'] : '' ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-6 d-flex justify-content-between align-items-center">
                                            <label class="form-label mb-0">Pincode</label>
                                            <span>:</span>
                                        </div>
                                        <div class="col-6 d-flex align-items-center">
                                            <input type="number" class="form-control" name="pincode" value="<?= !empty($ProfileDetails['pincode']) && $ProfileDetails['pincode'] != 'NULL' ? $ProfileDetails['pincode'] : '' ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-6 d-flex justify-content-between align-items-center">
                                            <label class="form-label mb-0">District</label>
                                            <span>:</span>
                                        </div>
                                        <div class="col-6 d-flex align-items-center">
                                            <select class="form-select form-control" aria-label="" name="district">
                                            <option value="">Select</option>
                                                <?php foreach ($district as $value) { ?>
                                                <option value="<?php echo $value->district_id ?>" <?= (isset($ProfileDetails['district']) && !empty($ProfileDetails['district'])) ? ($ProfileDetails['district'] == $value->district ? 'selected' : '') : '' ?>><?php echo $value->district; ?></option>  
                                                <?php } ?> 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-6 d-flex justify-content-between align-items-center">
                                            <label class="form-label mb-0">State</label>
                                            <span>:</span>
                                        </div>
                                        <div class="col-6 d-flex align-items-center">
                                             <select class="form-select form-control" aria-label="" name="state">
                                            <option value="">Select</option>
                                                <?php foreach ($state as $value) { ?>
                                                <option value="<?php echo $value->id ?>" <?= (isset($ProfileDetails['state']) && !empty($ProfileDetails['state'])) ? ($ProfileDetails['state'] == $value->id ? 'selected' : '') : '' ?>><?php echo $value->name; ?></option>  
                                                <?php } ?> 
                                            </select>
                                            <!--<input type="text" class="form-control" name="state" value="<?= !empty($ProfileDetails['state']) && $ProfileDetails['state'] != 'NULL' ? $ProfileDetails['state'] : '' ?>">-->
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-6 d-flex justify-content-between align-items-center">
                                            <label class="form-label mb-0">Country</label>
                                            <span>:</span>
                                        </div>
                                        <div class="col-6 d-flex align-items-center">
                                            <select class="form-select form-control" aria-label="" name="country">
                                            <option value="">Select</option>
                                                <?php foreach ($country as $value) { ?>
                                                <option value="<?php echo $value->id ?>" <?= (isset($ProfileDetails['country']) && !empty($ProfileDetails['country'])) ? ($ProfileDetails['country'] == $value->id ? 'selected' : '') : '' ?>><?php echo $value->name; ?></option>  
                                                <?php } ?> 
                                            </select>
                                            <!--<input type="text" class="form-control" name="country" value="<?= !empty($ProfileDetails['country']) && $ProfileDetails['country'] != 'NULL' ? $ProfileDetails['country'] : '' ?>">-->
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-12 col-xxl-6 d-flex align-items-stretch">
                            <div class="customCard">
                                <form class="customForm viewOnly" id="profilefmly" action="<?php echo site_url('user/update_family_info'); ?>" method="post" autocomplete="off">
                                <div class="customCardHeader">
                                    <div class="row">
                                        <div class="col-6 d-flex align-items-center">
                                            <h2 class="cardHead mb-0">Family</h2>
                                        </div>
                                        <div class="col-6 d-flex align-items-center justify-content-end">
                                            <button type="button" class="editBtn fmlyEditBtn">
                                                <img src="<?php echo base_url() ?>assets/images/editing.png">
                                                Edit
                                            </button>
                                            <button type="submit" class="saveBtn fmlySaveBtn d-none">
                                                <img src="<?php echo base_url() ?>assets/images/seen.png">
                                                Save
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                
                                    <div class="row mb-3">
                                        <div class="col-6 d-flex justify-content-between align-items-center">
                                            <label class="form-label mb-0">Father's Name</label>
                                            <span>:</span>
                                        </div>
                                        <div class="col-6 d-flex align-items-center">
                                            <input type="text" class="form-control" name="fathers_name" value="<?= !empty($ProfileDetails['fathers_name']) && $ProfileDetails['fathers_name'] != 'NULL'? $ProfileDetails['fathers_name'] : '' ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-6 d-flex justify-content-between align-items-center">
                                            <label class="form-label mb-0">Occupation of Father</label>
                                            <span>:</span>
                                        </div>
                                        <div class="col-6 d-flex align-items-center">
                                            <input type="text"  class="form-control" name="father_occupation" value="<?= $ProfileDetails['fathers_occupation'] ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-6 d-flex justify-content-between align-items-center">
                                            <label class="form-label mb-0">Mother's Name</label>
                                            <span>:</span>
                                        </div>
                                        <div class="col-6 d-flex align-items-center">
                                            <input type="text" class="form-control" name="mothers_name" value="<?= !empty($ProfileDetails['mothers_name']) && $ProfileDetails['mothers_name'] != 'NULL'? $ProfileDetails['mothers_name'] : '' ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-6 d-flex justify-content-between align-items-center">
                                            <label class="form-label mb-0">Occupation of Mother</label>
                                            <span>:</span>
                                        </div>
                                        <div class="col-6 d-flex align-items-center">
                                            <input type="text" class="form-control" name="mother_occupation" value="<?= !empty($ProfileDetails['mothers_occupation']) && $ProfileDetails['mothers_occupation'] != 'NULL'? $ProfileDetails['mothers_occupation'] : '' ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-6 d-flex justify-content-between align-items-center">
                                            <label class="form-label mb-0">Number of family members</label>
                                            <span>:</span>
                                        </div>
                                        <div class="col-6 d-flex align-items-center">
                                            <select class="form-select form-control" aria-label="" name="no_of_family_members">
                                            <option value="">Select</option>
                                                <?php for ($i=0; $i <=20 ; $i++) { ?>
                                                <option value="<?php echo $i; ?>" <?= (isset($ProfileDetails['total_members']) && !empty($ProfileDetails['total_members'])) ? ($ProfileDetails['total_members'] == $i ? 'selected' : '') : '' ?>><?php echo $i; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-6 d-flex justify-content-between align-items-center">
                                            <label class="form-label mb-0">Financial Status</label>
                                            <span>:</span>
                                        </div>
                                        <div class="col-6 d-flex align-items-center">
                                            <select class="form-select form-control" aria-label="" name="financial_status">
                                            <option value="">Select</option>
                                                  <option value="Very Rich"  <?= (isset($ProfileDetails['financial_status']) && !empty($ProfileDetails['financial_status'])) ? (($ProfileDetails['financial_status'] == 'Very Rich') ? 'selected' : '') : '' ?>>Very Rich</option>
                                                  <option value="Rich" <?= (isset($ProfileDetails['financial_status']) && !empty($ProfileDetails['financial_status'])) ? (($ProfileDetails['financial_status'] == 'Rich') ? 'selected' : '') : '' ?>>Rich</option>
                                                  <option value="Upper Middle class" <?= (isset($ProfileDetails['financial_status']) && !empty($ProfileDetails['financial_status'])) ? (($ProfileDetails['financial_status'] == 'Upper Middle class') ? 'selected' : '') : '' ?>>Upper Middle class</option>
                                                  <option value="Middle class" <?= (isset($ProfileDetails['financial_status']) && !empty($ProfileDetails['financial_status'])) ? (($ProfileDetails['financial_status'] == 'Middle class') ? 'selected' : '') : '' ?>>Middle class</option>
                                                  <option value="Poor" <?= (isset($ProfileDetails['financial_status']) && !empty($ProfileDetails['financial_status'])) ? (($ProfileDetails['financial_status'] == 'Poor') ? 'selected' : '') : '' ?>>Poor</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>


                        <div class="col-12 col-xxl-6 d-flex align-items-stretch">
                            <div class="customCard">
                                <form class="customForm viewOnly" id="profileprefference" action="<?php echo site_url('user/update_partner_preference'); ?>" method="post" autocomplete="off">
                                <div class="customCardHeader">
                                    <div class="row">
                                        <div class="col-6 d-flex align-items-center">
                                            <h2 class="cardHead mb-0">Prefference</h2>
                                        </div>
                                        <div class="col-6 d-flex align-items-center justify-content-end">
                                            <button type="button" class="editBtn preferenceEditBtn">
                                                <img src="<?php echo base_url() ?>assets/images/editing.png">
                                                Edit
                                            </button>
                                            <button type="submit" class="saveBtn preferencesaveBtn d-none">
                                                <img src="<?php echo base_url() ?>assets/images/seen.png">
                                                Save
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                
                                    <div class="row mb-3">
                                        <div class="col-6 d-flex justify-content-between align-items-center">
                                            <label class="form-label mb-0">Age From</label>
                                            <span>:</span>
                                        </div>
                                        <div class="col-6 d-flex align-items-center">
                                            <select class="form-select form-control AgeFrom" aria-label="" name="partner_age_from">
                                            <option value="">Select</option>
                                                <?php for ($i=18; $i <=80 ; $i++) { ?>
                                                <option value="<?php echo $i; ?>" <?= (isset($ProfileDetails['partner_age_from']) && !empty($ProfileDetails['partner_age_from'])) ? ($ProfileDetails['partner_age_from'] == $i ? 'selected' : '') : '' ?>><?php echo $i; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-6 d-flex justify-content-between align-items-center">
                                            <label class="form-label mb-0">Age To</label>
                                            <span>:</span>
                                        </div>
                                        <div class="col-6 d-flex align-items-center">
                                            <select class="form-select form-control AgeTo" aria-label="" name="partner_age_to">
                                            <option value="">Select</option>
                                                <?php for ($i=18; $i <=80 ; $i++) { ?>
                                                <option value="<?php echo $i; ?>" <?= (isset($ProfileDetails['partner_age_to']) && !empty($ProfileDetails['partner_age_to'])) ? ($ProfileDetails['partner_age_to'] == $i ? 'selected' : '') : '' ?>><?php echo $i; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-6 d-flex justify-content-between align-items-center">
                                            <label class="form-label mb-0">Height From</label>
                                            <span>:</span>
                                        </div>
                                        <div class="col-6 d-flex align-items-center">
                                            <select class="form-select form-control HeightFrom" aria-label="" name="partner_height">
                                            <option value="">Select</option>
                                                <?php foreach ($Height as $value) { ?>
                                                <option value="<?php echo $value->height_id; ?>" <?= (isset($ProfileDetails['partner_height_from']) && !empty($ProfileDetails['partner_height_from'])) ? ($ProfileDetails['partner_height_from'] == $value->height ? 'selected' : '') : '' ?>><?php echo $value->height; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-6 d-flex justify-content-between align-items-center">
                                            <label class="form-label mb-0">Height To</label>
                                            <span>:</span>
                                        </div>
                                        <div class="col-6 d-flex align-items-center">
                                            <select class="form-select form-control HeightTo" aria-label="" name="partner_height_to">
                                            <option value="">Select</option>
                                                <?php foreach ($Height as $value) { ?>
                                                <option value="<?php echo $value->height_id; ?>" <?= (isset($ProfileDetails['partner_height_to']) && !empty($ProfileDetails['partner_height_to'])) ? ($ProfileDetails['partner_height_to'] == $value->height ? 'selected' : '') : '' ?>><?php echo $value->height; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-6 d-flex justify-content-between align-items-center">
                                            <label class="form-label mb-0">Qualification Preference</label>
                                            <span>:</span>
                                        </div>
                                        <div class="col-6 d-flex align-items-center">
                                            <select class="form-select form-control" aria-label="" name="partner_education">
                                            <option value="">Select</option>
                                                <?php foreach ($qualification as $value) { ?>
                                                <option value="<?php echo $value->qualification_id; ?>" <?= (isset($ProfileDetails['partner_education']) && !empty($ProfileDetails['partner_education'])) ? ($ProfileDetails['partner_education'] == $value->qualification_id ? 'selected' : '') : '' ?>><?php echo $value->qualification; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-6 d-flex justify-content-between align-items-center">
                                            <label class="form-label mb-0">Family Type Preference</label>
                                            <span>:</span>
                                        </div>
                                        <div class="col-6 d-flex align-items-center">
                                            <select class="form-select form-control" aria-label="" name="partner_familytype">
                                                      <option value="">Select</option>
                                                      <option value="Very Rich" <?= (isset($ProfileDetails['partner_familytype']) && !empty($ProfileDetails['partner_familytype'])) ? ($ProfileDetails['partner_familytype'] == 'Very Rich' ? 'selected' : '') : '' ?>>Very Rich</option>
                                                      <option value="Rich" <?= (isset($ProfileDetails['partner_familytype']) && !empty($ProfileDetails['partner_familytype'])) ? ($ProfileDetails['partner_familytype'] == 'Rich' ? 'selected' : '') : '' ?>>Rich</option>
                                                      <option value="Middle class" <?= (isset($ProfileDetails['partner_familytype']) && !empty($ProfileDetails['partner_familytype'])) ? ($ProfileDetails['partner_familytype'] == 'Middle class' ? 'selected' : '') : '' ?>>Middle class</option>
                                                      <option value="Poor" <?= (isset($ProfileDetails['partner_familytype']) && !empty($ProfileDetails['partner_familytype'])) ? ($ProfileDetails['partner_familytype'] == 'Poor' ? 'selected' : '') : '' ?>>Poor</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    
                                </form>
                            </div>
                        </div>

                        
                    </div>
                    <!-- enroll button -->
                    <div class="enrollBox2 mb-5 d-sm-flex d-md-block d-lg-flex align-items-stretch">
                        <div class="contentBox">
                            <p class="enrollPara">Enroll for the assisted services &amp; enjoy personalized matchmaking</p>
                            <button type="button" class="enrollBtn">Enroll Now</button>
                        </div>
                        <div class="imgBox">
                            <img src="<?php echo base_url() ?>assets/images/enrollImg.jpg" class="enrollImg d-sm-none d-md-block d-lg-none">
                            <img src="<?php echo base_url() ?>assets/images/enrollImg.png" class="enrollImg d-none d-sm-block d-md-none d-lg-block">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section id="userFooter">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <p class="at">© 2022 happynikah All Rights Reserved</p>
                </div>
            </div>
        </div>
    </section>

        <div class="clk-popup" style="display:none;">
  
        <div  id="CommonDatadiv" >
           
        <input type="hidden" id="imagecatno" value=""/>
        <input type="hidden" id="imagetitleen" value=""/>
        <input type="hidden" id="imagetitlear" value=""/>
        <input type="hiddden" id="userid" value="<?php echo $user_id ?>" style="display:none;">
        <input type="hiddden" id="picnum" value="<?php echo count($images); ?>" style="display:none;">

        <div id="vanilla-demo"></div>
        <div class="divphotobottom">
        <!-- <button class="vanilla-rotate rotateleft" data-deg="90"><i class="fa fa-undo" aria-hidden="true"></i> Rotate Left</button> -->
            <button class="basic-result" id="saveimages">Save Image</button>
        <!-- <button class="vanilla-rotate rotateright" data-deg="-90"><i class="fa fa-repeat" aria-hidden="true"></i> Rotate Right</button> -->
        </div>   
        </div>
        </div>

    

    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/bootstrap.bundle.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            // burger menu
            $(".hamburger").click(function(){
                $(this).toggleClass("is-active");
                $('body').toggleClass("is-scroll-disabled");
            });
            // burger menu end

            // send request btn
            $(".sndrqst").click(function(){
                $(this).toggleClass("clicked");
            });

            // edit and save 
            $(".aboutEditBtn").click(function(){
                $("#profileAbout").removeClass("viewOnly");
                $(this).addClass("d-none");
                $(".aboutSaveBtn").removeClass("d-none");
            });
            $(".aboutSaveBtn").click(function(){
                $("#profileAbout").addClass("viewOnly");
                $(this).addClass("d-none");
                $(".aboutEditBtn").removeClass("d-none");
            });
            $(".biEditBtn").click(function(){
                $("#profilebi").removeClass("viewOnly");
                $(this).addClass("d-none");
                $(".biSaveBtn").removeClass("d-none");
            });
            $(".biSaveBtn").click(function(){
                $("#profilebi").addClass("viewOnly");
                $(this).addClass("d-none");
                $(".biEditBtn").removeClass("d-none");
            });
            $(".riEditBtn").click(function(){
                $("#profileri").removeClass("viewOnly");
                $(this).addClass("d-none");
                $(".riSaveBtn").removeClass("d-none");
            });
            $(".riSaveBtn").click(function(){
                $("#profileri").addClass("viewOnly");
                $(this).addClass("d-none");
                $(".riEditBtn").removeClass("d-none");
            });
            $(".prfEditBtn").click(function(){
                $("#profileprf").removeClass("viewOnly");
                $(this).addClass("d-none");
                $(".prfSaveBtn").removeClass("d-none");
            });
            $(".prfSaveBtn").click(function(){
                $("#profileprf").addClass("viewOnly");
                $(this).addClass("d-none");
                $(".prfEditBtn").removeClass("d-none");
            });
            $(".paEditBtn").click(function(){
                $("#profilepa").removeClass("viewOnly");
                $(this).addClass("d-none");
                $(".paSaveBtn").removeClass("d-none");
            });
            $(".paSaveBtn").click(function(){
                $("#profilepa").addClass("viewOnly");
                $(this).addClass("d-none");
                $(".paEditBtn").removeClass("d-none");
            });
            $(".lctnEditBtn").click(function(){
                $("#profilelctn").removeClass("viewOnly");
                $(this).addClass("d-none");
                $(".lctnSaveBtn").removeClass("d-none");
            });
            $(".lctnSaveBtn").click(function(){
                $("#profilelctn").addClass("viewOnly");
                $(this).addClass("d-none");
                $(".lctnEditBtn").removeClass("d-none");
            });
            $(".fmlyEditBtn").click(function(){
                $("#profilefmly").removeClass("viewOnly");
                $(this).addClass("d-none");
                $(".fmlySaveBtn").removeClass("d-none");
            });
            $(".fmlySaveBtn").click(function(){
                $("#profilefmly").addClass("viewOnly");
                $(this).addClass("d-none");
                $(".fmlyEditBtn").removeClass("d-none");
            });

            $(".preferenceEditBtn").click(function(){
                $("#profileprefference").removeClass("viewOnly");
                $(this).addClass("d-none");
                $(".preferencesaveBtn").removeClass("d-none");
            });

            // $(".preferencesaveBtn").click(function(){
            //     $("#profileprefference").addClass("viewOnly");Job status
            //     $(this).addClass("d-none");
            //     $(".preferenceEditBtn").removeClass("d-none");
            // });
        });
        
    </script>

  <script src="<?php echo base_url() ?>assets/cropimage/croppie.min.js"></script>
  <script src="<?php echo base_url() ?>assets/cropimage/jquery.bpopup.min.js"></script>
  <script type="text/javascript">
    
function onclickin(){
            
            $('.clk-popup').bPopup({
      escClose: true,
      modal: true,
      modalClose: true,
    });
            
    }


$(document).ready(function(){

 

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


  $('#uploadimage').on('change', function(){
      
      
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
                                   url: '<?php echo site_url('user/uploadphoto')?>',
                                   type: 'post',
                                   data: "imagevalue="+response+"&picnum="+picnum,
                                   dataType: 'html',
                                   success: function (data) { 
                                       
 if(picnum == 0){ location.reload(); } location.reload();                                      
                                       
  
if(data != 0){
 $('#ajaxappendimage').prepend(data);
}else{
    alert('Limit Exeded');
}
 $('.clk-popup').bPopup().close();
 $('#saveimages').html('Upload');  
                                      
 
                                       
                                    } 




                                });
                  
                  
              });






 
      
  });



    function changeprpick(image){

      var userid = $('#userid').val();
      
      $.ajax({
                       url: '<?php echo site_url('user/setprofilepic')?>',
                       type: 'post',
                       data: "image="+image+"&userid="+userid,
                       dataType: 'html',
                       success: function (data) { 

                            $('.profileImgBox').html(data);
                          

                           
                        } 




                    });
      
      }


    function deleteprpick(image_id){
      if (confirm("Are you sure you want to delete?")){
      
            $.ajax({
                       url: '<?php echo site_url('user/deleteprofilepic')?>',
                       type: 'post',
                       data: "image_id="+image_id,
                       dataType: 'json',
                       success: function (data) { 

                              window.location.reload();
                          

                           
                        } 




                    });
            }

      
      
      }



$(document).ready( function() {
  $( ".AgeFrom" ).change(function() {
        var AgeFrom = $('.AgeFrom').val();
        if(AgeFrom !='' ) 
        {
            $(".AgeTo").empty();
            $(".AgeTo").append('<option value="">To</option>');
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
                    url: "<?= base_url() ?>index.php/User/GetHeight",
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

$(document).ready(function(){

var marital_status = $(".marital_status").val();
  if(marital_status == 'Divorced' || marital_status=='Widow/Widower'){
            $("#no_of_children").show();
        }
        else if(marital_status == 'Unmarried'  || marital_status=='Separated'){
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
        else if(marital_status == 'Unmarried'  || marital_status=='Separated'){
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
    
//   var belief = $(".belief").val();
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
});


 </script>
 
 <script>
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

    $(document).ready(function(){
        photo_protection_onload();
    })

    $('input[name=photo_protection]').on('change',function(){
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
        var protect = $('input[name=photo_protection]:checked').val();
        if(protect == 1)
        {
            $('#password-protection').show();
        }
        if(protect == 0)
        {
            $('#password-protection').hide();
        }
    }
    
    

    function submit_setting(user_id){
        var photo_protection = $('input[name=photo_protection]:checked').val();
        
        var photopassword = $('#photopassword').val();
        if($('input[name=showtoexpress]:checked').val() == undefined)
        {
            var showtoexpress = '0';
        }
        else
        {
            var showtoexpress = '1';
        }
        if($('input[name=showtopremium]:checked').val() == undefined)
        {
            var showtopremium = '0';
        }
        else
        {
            var showtopremium = '1';
        }
        $.ajax({
            url: "<?= base_url() ?>index.php/user/submit_setting",
            data: {
                user_id:user_id,
                photopassword: photopassword,
                showtoexpress: showtoexpress,
                showtopremium: showtopremium,
                photo_protection:photo_protection
            },
            type: "POST",
            success: function(data) {
                $('#settings_error').html('Settings saved!')
                setTimeout(function () {
                    location.reload(true);
                }, 1700);
                // location.reload();
            }
        });
    }
</script>


</body>
</html>