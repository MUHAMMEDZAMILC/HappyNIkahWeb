<!DOCTYPE html>

<html>

<?php include('include/user_header.php'); ?>

<link rel="stylesheet" href="<?php echo base_url() ?>assets/cropimage/croppie.css">



<!-- <link rel="stylesheet" href="https://www.waytonikah.com/assets/common/css/croppie.css">

--> 

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

  

  

  .proPhotoUpload .proUpldedImg {

  position: relative;

  overflow: hidden;

  background-color: #ccc;

  margin-bottom: 20px;

  /*padding-bottom: 100%;*/

  padding-bottom: 5%;

  border-radius: 5px;

  padding-top: 132px;

}

 

 

</style>







  <div class="clk-popup" style="display:none;padding-top:10px;">

  

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

        

    <section id="userContent">

        <div class="container">

            <div class="row">

                <div class="col-12 col-md-5 col-lg-4">

                    <?php include('include/user_info.php') ?>

                    <div class="proPhotoUpload">

                        <h5 class="listTypeHead">Photos <span></span><?php echo count($images); ?></h5>

                        <div class="row" id="ajaxappendimage">



                        <?php $datas=array();

                        foreach ($images as $image) { 

                           // print_r($image);

                        ?>

                             

                            <div class="col-6 col-sm-4 col-md-6 col-lg-4" id="imagediv<?php echo $image->user_image_id; ?>">

                                <div class="proUpldedImg">

                                <button class="closeimgbtn" alt="delete" style="margin-left:25px;"  onclick="deleteprpick('<?php echo $image->user_image_id; ?>')">x</button>

                                <button class="dpimgbtn" alt="Set profile picture" onclick="changeprpick('<?php echo $image->user_image; ?>','<?php echo $image->user_image_id; ?>')"><i class="fa fa-user" aria-hidden="true"></i></button>

                                    <img src="<?php echo base_url('/assets/photo_storage/') . $image->user_image; ?>" alt="profile image" class="proImg">

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

                                

                                <!--<i class="fa fa-eye" id="togglePassword" class="togglePassword"></i>-->

                                

                                    <button type="button" id="togglePassword" class="togglePassword" style="background: transparent;border: 0px transparent;"> 

            

            <i class="fa fa-eye" id="togglePassword" class="togglePassword"></i>

            </button>   

            

                                

                                

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

                                <a href="https://apps.apple.com/in/app/happy-nikah/id1638696026">

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

                                    <h2 class="cardHead mb-0">About</h2><font color="red" size="3px">*</font>

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

                        

                            <textarea style="height:<?php echo (strlen($ProfileDetails['about'])/2).'px' ;?>" name="about" class="form-control" placeholder="" required><?= !empty($ProfileDetails['about'])? $ProfileDetails['about'] : '' ?></textarea>

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

                                            <label class="form-label mb-0">Name<font color="red" size="3px">*</font></label>

                                            <span>:</span>

                                        </div>

                                        <div class="col-6 d-flex align-items-center">

                                            <input type="text" class="form-control" name="name" value="<?= !empty($ProfileDetails['name'])? $ProfileDetails['name'] : '' ?>" required>

                                        </div>

                                    </div>

                                    <div class="row mb-3">

                                        <div class="col-6 d-flex justify-content-between align-items-center">

                                            <label class="form-label mb-0">Phone</label>

                                            <span>:</span>

                                        </div>

                                        <div class="col-6 d-flex align-items-center">

                                            <div class="row">

                <!--  <div class="col-md-3">

                <select id="country_code" class="form-control form-select" name="country_code">

                  <option value="">--Select--</option>

                  <?php foreach ($countryCode as $value) { ?>

                    <option value="<?php echo $value['country_code']; ?>" <?= (isset($ProfileDetails['countryCode']) && !empty($ProfileDetails['countryCode'])) ? ($ProfileDetails['countryCode'] == $value['country_code'] ? 'selected' : '') : '' ?>><?php echo "+".$value['country_code']; ?></option>

                  <?php } ?>

                </select> 

              </div>-->

			  <div class="col-md-7">

			      <?= !empty($ProfileDetails['phone']) && $ProfileDetails['phone'] != 'NULL'? "+".$ProfileDetails['countryCode']."&nbsp;".$ProfileDetails['phone'] : '' ?>

<!--                <input type="text" id="phone" class="form-control" name="phone"  value="<?= !empty($ProfileDetails['phone']) && $ProfileDetails['phone'] != 'NULL'? $ProfileDetails['phone'] : '' ?>">

-->                  </div>

                 </div>                                         </div>

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

                                        <!-- <div class="form-check form-check-inline custom_radio">

                                        <input class="form-check-input" type="radio" name="gender" id="male" value="1" <?= (($ProfileDetails['gender'] == '1') ? 'checked' : '');?>>

                                        <label class="form-check-label" for="male">Male</label>

                                    </div>

                                    <div class="form-check form-check-inline custom_radio">

                                        <input class="form-check-input" type="radio" name="gender" id="female" value="2" <?= (($ProfileDetails['gender'] == '2') ? 'checked' : '');?>>

                                        <label class="form-check-label" for="female">Female</label>

                                    </div>-->

                                          <!--  <select class="form-select form-control" aria-label="" name="gender">

                                                 <option value="1" <?= (isset($ProfileDetails['gender']) && !empty($ProfileDetails['gender'])) ? (($ProfileDetails['gender'] == '1') ? 'selected' : '') : '' ?>>Male</option>

                                              <option value="2" <?= (isset($ProfileDetails['gender']) && !empty($ProfileDetails['gender'])) ? (($ProfileDetails['gender'] == '2') ? 'selected' : '') : '' ?>>Female</option>

                                            </select>-->

                                            <?php if($ProfileDetails['gender']==1){echo "Male";}else{ echo "Female";}?>

                                        </div>

                                    </div>

                                    <div class="row mb-3">

                                        <div class="col-6 d-flex justify-content-between align-items-center">

                                            <label class="form-label mb-0">Date of birth<font color="red" size="3px">*</font></label>

                                            <span>:</span>

                                        </div>

                                        <div class="col-6 d-flex align-items-center">

                                           

                                            <input type="text" id="dob" class="form-control" name="dob" value="<?= !empty($ProfileDetails['dob']) && $ProfileDetails['dob'] != 'NULL' ?  date("d-m-Y", strtotime($ProfileDetails['dob'])) : '' ?>" readonly required>



                                        </div>

                                    </div>

                                    <div class="row mb-3">

                                        <div class="col-6 d-flex justify-content-between align-items-center">

                                            <label class="form-label mb-0">Age<font color="red" size="3px">*</font></label>

                                            <span>:</span>

                                        </div>

                                        <div class="col-6 d-flex align-items-center">

                                           



    <input type="text" id="age" class="form-control" name="age" disabled="true"  value="<?= !empty($ProfileDetails['age'])? $ProfileDetails['age'] : '' ?>"  required>

   



                                </div>

                                

                                    </div>

                                    <div class="row mb-3">

                                        <div class="col-6 d-flex justify-content-between align-items-center">

                                            <label class="form-label mb-0">Marital Status<font color="red" size="3px">*</font></label>

                                            <span>:</span>

                                        </div>

                                        <div class="col-6 d-flex align-items-center">

                                            <select class="form-select form-control marital_status" aria-label="" name="marital_status" required >

                                            <option value="">Select</option>

                                              <option value="Unmarried" <?= (isset($ProfileDetails['marital_status']) && !empty($ProfileDetails['marital_status'])) ? (($ProfileDetails['marital_status'] == 'Unmarried') ? 'selected' : '') : '' ?>>Unmarried</option>

                                              <option value="Divorced" <?= (isset($ProfileDetails['marital_status']) && !empty($ProfileDetails['marital_status'])) ? (($ProfileDetails['marital_status'] == 'Divorced') ? 'selected' : '') : '' ?>>Divorced</option>

                                              <option value="Widow/Widower" <?= (isset($ProfileDetails['marital_status']) && !empty($ProfileDetails['marital_status'])) ? (($ProfileDetails['marital_status'] == 'Widow/Widower') ? 'selected' : '') : '' ?>>Widow/Widower</option>

                                              <option value="Separated" <?= (isset($ProfileDetails['marital_status']) && !empty($ProfileDetails['marital_status'])) ? (($ProfileDetails['marital_status'] == 'Separated') ? 'selected' : '') : '' ?>>Separated</option>

                                            </select>

                                        </div>

                                    </div>

                                    <?php if($ProfileDetails['marital_status']!="Unmarried")

                                    {?>

                                    <div class="row mb-3" id="no_of_children">

                                        <div class="col-6 d-flex justify-content-between align-items-center">

                                            <label class="form-label mb-0">No of Children</label>

                                            <span>:</span>

                                        </div>

                                        <div class="col-6 d-flex align-items-center">

                                            <input type="number" id="noofchildren" class="form-control" name="no_of_children" value="<?= !empty($ProfileDetails['no_of_children']) && $ProfileDetails['no_of_children'] != 'NULL'? $ProfileDetails['no_of_children'] : '' ?>">

                                        </div>

                                    </div>

                                    <?php }?>

                                    

			  <div class="row mb-3">

              <div class="col-6 d-flex justify-content-between align-items-center">

                <label for="setting-input-8"  class="form-label">Physically Challenged  <font color="red" size="3px">*</font></label>

                <span>:</span>

             </div>

                <div class="col-6 d-flex align-items-center">



                <select id="physically_challenged" class="form-control form-select" name="physically_challenged" required>

                  <option value="">--Select--</option>

                  <option value="Physically Challenged" <?= (isset($ProfileDetails['physical_status']) && !empty($ProfileDetails['physical_status'])) ? (($ProfileDetails['physical_status'] == 'Physically Challenged') ? 'selected' : '') : '' ?>>Physically Challenged</option>

                  <option value="Normal" <?= (isset($ProfileDetails['physical_status']) && !empty($ProfileDetails['physical_status'])) ? (($ProfileDetails['physical_status'] == 'Normal') ? 'selected' : '') : '' ?>>Normal</option>

                </select>

                    </div>

              </div>

              <?php if($ProfileDetails['physical_status']!="Normal")

              {?>

              <div id="for_physically_challenged" >



			  <div class="row mb-3">

              <div class="col-6 d-flex justify-content-between align-items-center">



                <label for="setting-input-9"  class="form-label">Physical status  </label>

                <span>:</span>

             </div>                <div class="col-6 d-flex align-items-center">



                <select id="physical_status" class="form-control form-select" name="physical_status" >

                    <option value="">--Select--</option>

                    <?php foreach ($physicalstatus as $value) { ?>

                    <option value="<?php echo $value->id ?>" <?= (isset($ProfileDetails['disability']) && !empty($ProfileDetails['disability'])) ? ($ProfileDetails['disability'] == $value->id ? 'selected' : '') : '' ?>><?php echo $value->physicalstatus; ?></option>  

                    <?php } ?>

                  

                </select>

              </div></div>

			  <div class="row mb-3">

              <div class="col-6 d-flex align-items-center">  

                <label for="setting-input-10"  class="form-label">Disability Box </label>  <span>:</span>

             </div>

             <div class="col-6 d-flex align-items-center">  

                <input type="text" id="disability" class="form-control" name="disability" value="<?= !empty($ProfileDetails['registration_phychallenge'])? $ProfileDetails['registration_phychallenge'] : '' ?>">

              </div>

            </div>

                    </div>

                    <?php }else{?>

                      <div id="for_physically_challenged" style="display:none">



<div class="row mb-3">

<div class="col-6 d-flex align-items-center">  

        <label for="setting-input-9"  class="form-label">Physical status  </label>

        <span>:</span>

             </div>

             <div class="col-6 d-flex align-items-center">  



        <select id="physical_status" class="form-control custom-select" name="physical_status" >

            <option value="">--Select--</option>

            <?php foreach ($physicalstatus as $value) { ?>

            <option value="<?php echo $value->id ?>" <?= (isset($ProfileDetails['disability']) && !empty($ProfileDetails['disability'])) ? ($ProfileDetails['disability'] == $value->id ? 'selected' : '') : '' ?>><?php echo $value->physicalstatus; ?></option>  

            <?php } ?>

          

        </select></div>

      </div>

<div class="row mb-3">

<div class="col-6 d-flex align-items-center">  

        <label for="setting-input-10"  class="form-label">Disability Box </label><span>:</span>

             </div>

             <div class="col-6 d-flex align-items-center">  

        <input type="text" id="disability" class="form-control" name="disability" value="<?= !empty($ProfileDetails['registration_phychallenge'])? $ProfileDetails['registration_phychallenge'] : '' ?>">

      </div>

    </div>

            </div>    

                      <?php }?>

                      <div class="row mb-3">

                      <div class="col-6 d-flex align-items-center">  



                <label for="inputName" class="form-label">Nationality<font color="red" size="3px">*</font></label>

                <span>:</span>

             </div>

             <div class="col-6 d-flex align-items-center">  



                <select id="nationality"  class="form-control form-select" name="nationality" required>

                  <option value="">Select</option>

                  <?php foreach ($country as $value) { ?>

                    <option value="<?php echo $value->id; ?>" <?= (isset($ProfileDetails['nationality']) && !empty($ProfileDetails['nationality'])) ? ($ProfileDetails['nationality'] == $value->id ? 'selected' : '') : '' ?>><?php echo $value->name; ?></option>

                  <?php } ?>

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

                                            <input type="text" class="form-control" name="user_religion" value="Muslim" required readonly>

                                        </div>

                                    </div>

                                    <div class="row mb-3">

                                        <div class="col-6 d-flex justify-content-between align-items-center">

                                            <label class="form-label mb-0">Belief<font color="red" size="3px">*</font></label>

                                            <span>:</span>

                                        </div>

                                        <div class="col-6 d-flex align-items-center">

                                            <select class="form-select form-control belief" aria-label="" name="user_caste" required>

                                            <option value="">Select</option>

                                                <?php  foreach ($belief as $value) { ?>

                                                <option value="<?php echo $value->cid ?>" <?= (isset($ProfileDetails['caste']) && !empty($ProfileDetails['caste'])) ? ($ProfileDetails['caste'] == $value->caste ? 'selected' : '') : '' ?>><?php echo $value->caste; ?></option>  <?php } ?>

                                            </select>

                                        </div>

                                    </div>

                                    

                                    

                                     <div class="row mb-3">

                                        <div class="col-6 d-flex justify-content-between align-items-center">

                                            <label class="form-label mb-0">Madrssa Education<font color="red" size="3px">*</font></label>

                                            <span>:</span>

                                        </div>

                                        <div class="col-6 d-flex align-items-center">

                                            <select class="form-select form-control madrassa" aria-label="" name="madrassa_education" required>

                                            <option value="">--Select--</option>

                    <?php foreach ($madrassa_education as $value) { ?>

                      <option value="<?php echo $value->id ?>" <?= (isset($ProfileDetails['madrassa_education']) && !empty($ProfileDetails['madrassa_education'])) ? ($ProfileDetails['madrassa_education'] == $value->id ? 'selected' : '') : '' ?>><?php echo $value->madr_education; ?></option>

                    <?php } ?>

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

                <label for="inputName" class="form-label">Highest Education<font color="red" size="3px">*</font></label>

                <span>:</span>

                                                </div>

                                                <div class="col-6 d-flex align-items-center">

                <select id="highest_education" class="form-control form-select" name="highest_education"  required>

                    <option value="">--Select--</option>

                    <?php foreach ($highest_education as $value) { ?>

                    <option value="<?php echo $value->id ?>" <?= (isset($ProfileDetails['highest_education']) && !empty($ProfileDetails['highest_education'])) ? ($ProfileDetails['highest_education'] == $value->id ? 'selected' : '') : '' ?> ><?php echo $value->high_education; ?></option>  

                    <?php } ?>  

                </select>    

                </div>  

                </div> 

                

				<div class="row mb-3" class="form-label">

                <div class="col-6 d-flex justify-content-between align-items-center">

                <label for="inputName" class="form-label">Education<font color="red" size="3px">*</font></label>

                <span>:</span>

                    </div>

                    <div class="col-6 d-flex align-items-center">

                        

                <select id="education" class="form-control custom-select" name="education" required="">

                    <?php foreach ($education as $value) { ?>

                    <option value="<?php echo $value->edu_id ?>" <?= (isset($ProfileDetails['edn']) && !empty($ProfileDetails['edn'])) ? ($ProfileDetails['edn'] == $value->edu_id ? 'selected' : '') : '' ?>>

                        <?php echo $value->education; ?></option>  

                    

                    <?php } ?>  

                    </select>  

                

                </div>         

                

                </div>

				<div class="row mb-3">

                <div class="col-6 d-flex justify-content-between align-items-center">

                <label for="inputName" class="form-label">Profession Type<font color="red" size="3px">*</font></label>

                <span>:</span>

                    </div>                    <div class="col-6 d-flex align-items-center">

                <select id="profession_type" class="form-control custom-select" name="profession_type" required="">

                    <option value="">--Select--</option>

                    <?php foreach ($professiontype as $value) { ?>

                    <option value="<?php echo $value->professiontype ?>" <?= (isset($ProfileDetails['job_category']) && !empty($ProfileDetails['job_category'])) ? ($ProfileDetails['job_category'] == $value->professiontype ? 'selected' : '') : '' ?>  ><?php echo $value->professiontype; ?></option>  

                    <?php } ?>  

                </select>     </div>          </div>

                <div class="row mb-3">

                <div class="col-6 d-flex justify-content-between align-items-center">

                <label for="inputName" class="form-label">Profession<font color="red" size="3px">*</font></label>

                <span>:</span>

                    </div> 

                    <div class="col-6 d-flex align-items-center">

                <select id="profession" class="form-control custom-select" name="profession" required="" >

                    <option value="">--Select--</option>

                    <?php foreach ($profession as $value) { ?>

                    <option value="<?php echo $value->profession_id ?>"  <?= (isset($ProfileDetails['occupation']) && !empty($ProfileDetails['occupation'])) ? ($ProfileDetails['occupation'] == $value->profession_id ? 'selected' : '') : '' ?> ><?php echo $value->profession_name; ?></option>  

                    <?php } ?>  

                </select>   </div>           </div>

				<div class="row mb-3">

                <div class="col-6 d-flex justify-content-between align-items-center">

                <label for="inputName" class="form-label">Job Details<font color="red" size="3px">*</font></label>

                <span>:</span>

                    </div> 

                    <div class="col-6 d-flex align-items-center">

                <textarea  id="job_details" class="form-control" required="" name="job_details" ><?= !empty($ProfileDetails['job_details']) && $ProfileDetails['job_details'] != 'NULL'? $ProfileDetails['job_details'] : '' ?></textarea>

             </div></div>  

             <div class="row mb-3" class="form-label">

             <div class="col-6 d-flex justify-content-between align-items-center">

                <label for="inputName" class="form-label">Annual Income</label>

                <span>:</span>

                    </div> 

                    <div class="col-6 d-flex align-items-center">

                <select id="annual_income" class="form-control custom-select" name="annual_income" >

                  <option value="">--Select--</option>  

                <?php foreach ($income as $value) { ?>

                  <option value="<?php echo $value->income ?>" <?= (isset($ProfileDetails['annual_income']) && !empty($ProfileDetails['annual_income'])) ? ($ProfileDetails['annual_income'] == $value->income ? 'selected' : '') : '' ?> ><?php echo $value->income; ?></option>  



                    <?php } ?>  

                </select>   </div>            </div>

							</div>

                                    

                                </form>

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

                <label for="inputName" class="form-label">Hight<font color="red" size="3px">*</font></label>

                <span>:</span>

                    </div> 

                    <div class="col-6 d-flex align-items-center">

                <select id="height" class="form-control custom-select" name="height" required="">

                  <option value="">--Select--</option>

                  <?php foreach ($Height as $value) { ?>

                    <option value="<?php echo $value->height_id; ?>" <?= (isset($ProfileDetails['height']) && !empty($ProfileDetails['height'])) ? ($ProfileDetails['height'] == $value->height_id ? 'selected' : '') : '' ?>><?php echo $value->height; ?></option>

                  <?php } ?>

                </select>        </div>      </div> 

				<div class="row mb-3">

                <div class="col-6 d-flex justify-content-between align-items-center">

                <label for="inputName" class="form-label">Weight<font color="red" size="3px">*</font></label>

                <span>:</span>

                    </div>                     <div class="col-6 d-flex align-items-center">

                <select id="weight" class="form-control custom-select" name="weight" required="">

                  <option value="">--Select--</option>

                  <?php foreach ($weight as $value) { ?>

                    <option value="<?php echo $value->weight_id; ?>" <?= (isset($ProfileDetails['weight']) && !empty($ProfileDetails['weight'])) ? ($ProfileDetails['weight'] == $value->weight_id ? 'selected' : '') : '' ?>><?php echo $value->weight; ?></option>

                  <?php } ?>

                </select>   </div>             </div>

				<div class="row mb-3">

                <div class="col-6 d-flex justify-content-between align-items-center">

                <label for="inputName" class="form-label">Skin Color<font color="red" size="3px">*</font></label>

                <span>:</span>

                    </div> 

                    <div class="col-6 d-flex align-items-center">

                <select id="skin_color" class="form-control custom-select" name="skin_color" required>

                  <option value="">--Select--</option>

                  <?php foreach ($skin_color as $value) { ?>

                    <option value="<?php echo $value->skincolor; ?>" <?= (isset($ProfileDetails['color']) && !empty($ProfileDetails['color'])) ? ($ProfileDetails['color'] == $value->skincolor ? 'selected' : '') : '' ?>><?php echo $value->skincolor; ?></option>

                  <?php } ?>

                </select>    </div>           </div>

             

				<div class="row mb-3">

                <div class="col-6 d-flex justify-content-between align-items-center">

                <label for="inputName" class="form-label">Mother Tounge<font color="red" size="3px">*</font></label>

                <span>:</span>

                </div>      

                

                <div class="col-6 d-flex align-items-center">

                <select id="mothertongue" class="form-control custom-select" name="mothertongue" required>

                  <option value="">--Select--</option>

                  <?php foreach ($mothertongue as $value) { ?>

                    <option value="<?php echo $value->mothertongue_id; ?>" <?= (isset($ProfileDetails['mother_tongue']) && !empty($ProfileDetails['mother_tongue'])) ? ($ProfileDetails['mother_tongue'] == $value->mothertongue_id ? 'selected' : '') : '' ?>><?php echo $value->mothertongue; ?></option>

                  <?php } ?>

                </select>  

                </div>

                 </div>

                 

                   <div class="row mb-3">

                   <div class="col-6 d-flex justify-content-between align-items-center">

                <label for="inputName" class="form-label">Blood Group</label> <span>:</span>

                    </div> <div class="col-6 d-flex align-items-center">

                <select id="bloodgroup" class="form-control custom-select" name="bloodgroup">

                  <option value="">--Select--</option>

                  <?php foreach ($bloodgroup as $value) { ?>

                    <option value="<?php echo $value->bloodgroup; ?>" <?= (isset($ProfileDetails['blood_group']) && !empty($ProfileDetails['blood_group'])) ? ($ProfileDetails['blood_group'] == $value->bloodgroup ? 'selected' : '') : '' ?>><?php echo $value->bloodgroup; ?></option>

                  <?php } ?>

                </select>  </div>

                   </div>

				   <div class="row mb-3">

                   <div class="col-6 d-flex justify-content-between align-items-center">

                <label for="inputName" class="form-label">Body Type<font color="red" size="3px">*</font></label><span>:</span>

                    </div><div class="col-6 d-flex align-items-center">

                <select id="bodytype" class="form-control custom-select" name="bodytype" required>

                  <option value="">--Select--</option>

                  <?php foreach ($bodytype as $value) { ?>

                    <option value="<?php echo $value->bodytype; ?>" <?= (isset($ProfileDetails['bodytype']) && !empty($ProfileDetails['bodytype'])) ? ($ProfileDetails['bodytype'] == $value->bodytype ? 'selected' : '') : '' ?>><?php echo $value->bodytype; ?></option>

                  <?php } ?>

                </select>   </div>            </div>

				<div class="row mb-3">

                <div class="col-6 d-flex justify-content-between align-items-center">

                <label for="inputName" class="form-label">Appearance<font color="red" size="3px">*</font></label><span>:</span>

                    </div><div class="col-6 d-flex align-items-center">

                <select id="appearance" class="form-control custom-select" name="appearance" required>

                  <option value="">--Select--</option>

                  <?php foreach ($appearance as $value) { ?>

                    <option value="<?php echo $value->appearance; ?>" <?= (isset($ProfileDetails['appearance']) && !empty($ProfileDetails['appearance'])) ? ($ProfileDetails['appearance'] == $value->appearance ? 'selected' : '') : '' ?>><?php echo $value->appearance; ?></option>

                  <?php } ?>

                </select>   </div>             </div>

                                </form>

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

                <label for="inputName" class="form-label">Home Country<font color="red" size="3px">*</font></label>

                <span>:</span>

                                        </div>

                                        <div class="col-6 d-flex align-items-center">



                <select id="country" class="form-control custom-select" name="country" required>

                  <option value="">--Select--</option>

                  <?php foreach ($country as $value) { ?>

                    <option value="<?php echo $value->id; ?>" <?= (isset($ProfileDetails['home_country']) && !empty($ProfileDetails['home_country'])) ? ($ProfileDetails['home_country'] == $value->id ? 'selected' : '') : '' ?>><?php echo $value->name; ?></option>

                  <?php } ?>

                </select>        </div>        </div> 

				<div class="row mb-3">

                <div class="col-6 d-flex justify-content-between align-items-center">

                <label for="inputName" class="form-label">Home State<font color="red" size="3px">*</font></label>

                <span>:</span>

                                        </div>

                                        <div class="col-6 d-flex align-items-center">

                <select id="states" class="form-control custom-select" name="states" required>

                                      <option value="">--Select--</option>



                <?php foreach ($homestates as $value) { ?>

                    <option value="<?php echo $value->id; ?>" <?= (isset($ProfileDetails['state']) && !empty($ProfileDetails['state'])) ? ($ProfileDetails['state'] == $value->id ? 'selected' : '') : '' ?>><?php echo $value->name; ?></option>

                  <?php } ?>

                 

                </select>   </div>              </div>

               

				<div class="row mb-3">

                <div class="col-6 d-flex justify-content-between align-items-center">

                <label for="inputName" class="form-label">Home District<font color="red" size="3px">*</font></label>

                <span>:</span>

                                        </div>

                                        <div class="col-6 d-flex align-items-center">

                <select id="districts"  name="districts" class="form-control" required>

                                      <option value="">--Select--</option>



                <?php foreach ($homedistricts as $value) { ?>

                    <option value="<?php echo $value->district_id; ?>" <?= (isset($ProfileDetails['native_district']) && !empty($ProfileDetails['native_district'])) ? ($ProfileDetails['native_district'] == $value->district_id ? 'selected' : '') : '' ?>><?php echo $value->district; ?></option>

                  <?php } ?>                 

                </select>        </div>         </div>

				<div class="row mb-3">

                <div class="col-6 d-flex justify-content-between align-items-center">

                <label for="inputName" class="form-label">Home City<font color="red" size="3px">*</font></label>

                <span>:</span>

                                        </div>

                                        <div class="col-6 d-flex align-items-center">

                <select id="city" class="form-control custom-select" name="city" required>

                                      <option value="">--Select--</option>



                <?php foreach ($city as $value) { ?>

                    <option value="<?php echo $value->name; ?>" <?= (isset($ProfileDetails['native_place']) && !empty($ProfileDetails['native_place'])) ? ($ProfileDetails['native_place'] == $value->name ? 'selected' : '') : '' ?>><?php echo $value->name; ?></option>

                  <?php } ?>                   

                </select>      </div>           </div>

				<div class="row mb-3">

                <div class="col-6 d-flex justify-content-between align-items-center">

                <label for="inputName" class="form-label">Present Country<font color="red" size="3px">*</font></label>

                <span>:</span>

                                        </div>

                                        <div class="col-6 d-flex align-items-center">

                <select id="present_country"  class="form-control custom-select" name="present_country" required>

                                      <option value="">--Select--</option>



                  <?php foreach ($country as $value) { ?>

                    <option value="<?php echo $value->id; ?>" <?= (isset($ProfileDetails['present_country']) && !empty($ProfileDetails['present_country'])) ? ($ProfileDetails['present_country'] == $value->id ? 'selected' : '') : '' ?>><?php echo $value->name; ?></option>

                  <?php } ?>

                </select>        </div>        </div> 

				<div class="row mb-3">

                <div class="col-6 d-flex justify-content-between align-items-center">

                <label for="inputName" class="form-label">Present State<font color="red" size="3px">*</font></label>

                <span>:</span>

                                        </div>

                                        <div class="col-6 d-flex align-items-center">

                <select id="present_states" class="form-control custom-select" name="present_states" required>

                                      <option value="">--Select--</option>



                  <?php foreach ($states as $value) { ?>

                    <option value="<?php echo $value->id; ?>" <?= (isset($ProfileDetails['present_state']) && !empty($ProfileDetails['present_state'])) ? ($ProfileDetails['present_state'] == $value->id ? 'selected' : '') : '' ?>><?php echo $value->name; ?></option>

                  <?php } ?>

                </select>           </div>      </div>

               

				<div class="row mb-3">

                <div class="col-6 d-flex justify-content-between align-items-center">

                <label for="inputName" class="form-label">Present District<font color="red" size="3px">*</font></label>

                <span>:</span>

                                        </div>

                                        <div class="col-6 d-flex align-items-center">

                <select id="present_district"  class="form-control custom-select" name="present_district" required>

                                      <option value="">--Select--</option>



                  <?php foreach ($districts as $value) { ?>

                    <option value="<?php echo $value->district_id; ?>" <?= (isset($ProfileDetails['present_district']) && !empty($ProfileDetails['present_district'])) ? ($ProfileDetails['present_district'] == $value->district_id ? 'selected' : '') : '' ?>><?php echo $value->district; ?></option>

                  <?php } ?> 

                </select>            

                </div>  

                

                

                </div>

                

				<!--<div class="row mb-3">-->

    <!--            <div class="col-6 d-flex justify-content-between align-items-center">-->

    <!--            <label for="inputName" class="form-label">Present City<font color="red" size="3px">*</font></label>-->

    <!--            <span>:</span>-->

    <!--                                    </div>-->

                <!--                        <div class="col-6 d-flex align-items-center">-->

                <!--<select id="present_city"  class="form-control custom-select" name="present_city" required>-->

                <!--                      <option value="">--Select--</option>-->



                  <?php foreach ($homecity as $value) { ?>

                    <!--<option value="<?php echo $value->id; ?>" <?= (isset($ProfileDetails['present_city']) && !empty($ProfileDetails['present_city'])) ? ($ProfileDetails['present_city'] == $value->id ? 'selected' : '') : '' ?>><?php echo $value->name; ?></option>-->

                  <?php } ?> 

                <!--</select> -->

                

                  <!--</div>-->

                  <!--</div>-->

				<div class="row mb-3">

                <div class="col-6 d-flex justify-content-between align-items-center">

                <label for="inputName" class="form-label">Secondary Number</label>

                <span>:</span>

                                        </div>

                                        <div class="col-6 d-flex align-items-center">

                <div class="row">

                  <div class="col-md-3">

                    <select id="secondary_code" class="form-control custom-select" name="secondary_code">

                                          <option value="">--Select--</option>



                  <?php foreach ($countryCode as $value) { ?>

                    <option value="<?php echo $value['country_code']; ?>" <?= (isset($ProfileDetails['secondary_code']) && !empty($ProfileDetails['secondary_code'])) ? ($ProfileDetails['secondary_code'] == $value['country_code'] ? 'selected' : '') : '' ?>><?php echo "+".$value['country_code']; ?></option>

                  <?php } ?>

                </select> 

              </div>

			  <div class="col-md-9">

                <input type="text" id="secondary_number" class="form-control" name="secondary_number" id="sec_phone_number" value="<?= !empty($ProfileDetails['other_contact_number']) && $ProfileDetails['other_contact_number'] != 'NULL'? $ProfileDetails['other_contact_number'] : '' ?>" maxlength="10" onkeypress="return event.charCode > 47 && event.charCode < 58;">

                  </div>

                 </div>      </div>        </div>

				 <div class="row mb-3">

                 <div class="col-6 d-flex justify-content-between align-items-center">



                <label for="inputName" class="form-label">Email</label>

                <span>:</span>

                                        </div>

                                        <div class="col-6 d-flex align-items-center">

                <input type="email" id="email" class="form-control" name="email" value="<?= !empty($ProfileDetails['mail']) && $ProfileDetails['mail'] != 'NULL'? $ProfileDetails['mail'] : '' ?>">

              </div> </div>

			  <div class="row mb-3">

              <div class="col-6 d-flex justify-content-between align-items-center">

                <label for="inputName" class="form-label">Address<font color="red" size="3px">*</font></label>

                <span>:</span>

                                        </div>

                                        <div class="col-6 d-flex align-items-center">

                <textarea  id="address" class="form-control" required="" name="address" ><?= !empty($ProfileDetails['address']) && $ProfileDetails['address'] != 'NULL'? $ProfileDetails['address'] : '' ?></textarea>

              </div></div></form>

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

<label for="inputName" class="form-label">Family Type<font color="red" size="3px">*</font></label>

<span>:</span>

                                        </div>

                                        <div class="col-6 d-flex align-items-center">

              <select id="familytype" class="form-control custom-select" name="familytype" required>

              <option value="">--Select--</option>

                    <?php foreach ($familytype as $value) { ?>

                    <option value="<?php echo $value->familytype ?>" <?= (isset($ProfileDetails['familytype']) && !empty($ProfileDetails['familytype'])) ? ($ProfileDetails['familytype'] == $value->familytype ? 'selected' : '') : '' ?>><?php echo $value->familytype; ?></option>  

                    <?php } ?>

                </select>   

                    </div></div>

                    <div class="row mb-3">

                    <div class="col-6 d-flex justify-content-between align-items-center">

                             <label for="inputName" class="form-label">Financial Status<font color="red" size="3px">*</font></label>

                             <span>:</span>

                                        </div>

                                        <div class="col-6 d-flex align-items-center">

                                         <select id="financialstatus" class="form-control custom-select" name="financialstatus" required>

                             <option value="">Select</option>

                    <?php foreach ($financialstatus as $value) { ?>

                    <option value="<?php echo $value->financialstatus ?>" <?= (isset($ProfileDetails['financial_status']) && !empty($ProfileDetails['financial_status'])) ? ($ProfileDetails['financial_status'] == $value->financialstatus ? 'selected' : '') : '' ?>><?php echo $value->financialstatus; ?></option>  

                    <?php } ?>

                </select>   

                

                </div>  

                

                </div>

                <div class="row mb-3">

                <div class="col-6 d-flex justify-content-between align-items-center">

              <label for="inputName" class="form-label">Home Type<font color="red" size="3px">*</font></label>

              <span>:</span>

                                        </div>

                                        <div class="col-6 d-flex align-items-center">

                                            

              <select id="hometype" class="form-control custom-select" name="hometype" required >

              <option value="">Select</option>

                    <?php foreach ($hometype as $value) { ?>

                    <option value="<?php echo $value->hometype ?>" <?= (isset($ProfileDetails['hometype']) && !empty($ProfileDetails['hometype'])) ? ($ProfileDetails['hometype'] == $value->hometype ? 'selected' : '') : '' ?>><?php echo $value->hometype; ?></option>  

                    <?php } ?>

                </select>  

                </div>

                </div>

                <div class="row mb-3">

                <div class="col-6 d-flex justify-content-between align-items-center">

                             <label for="inputName" class="form-label">Number of Family Members<font color="red" size="3px">*</font></label>

                             <span>:</span>

                                        </div>

                                        <div class="col-6 d-flex align-items-center">

                                             <select id="total_members" class="form-control custom-select" name="total_members" required>

                             

                             <option value="">--Select--</option>

                  <?php for ($i=0; $i <=20 ; $i++) { ?>

                    <option value="<?php echo $i; ?>" <?= (isset($ProfileDetails['total_members']) && !empty($ProfileDetails['total_members'])) ? ($ProfileDetails['total_members'] == $i ? 'selected' : '') : '' ?>><?php echo $i; ?></option>

                  <?php } ?>

                </select>  </div>            </div>

                <div class="row mb-3">

                <div class="col-6 d-flex justify-content-between align-items-center">

                <label for="inputName" class="form-label">Father Details</label>

                <span>:</span>

                                        </div>

                                        <div class="col-6 d-flex align-items-center">

      <select id="fatherdetails" class="form-control" name="fatherdetails" >

                <option value="">--Select--</option>

                <option value="Alive" <?= (isset($ProfileDetails['fatherdetails']) && !empty($ProfileDetails['fatherdetails'])) ? ($ProfileDetails['fatherdetails'] =="Alive"? 'selected' : '') : '' ?>><?php echo "Alive"; ?></option>

                <option value="Died" <?= (isset($ProfileDetails['fatherdetails']) && !empty($ProfileDetails['fatherdetails'])) ? ($ProfileDetails['fatherdetails'] == "Died" ? 'selected' : '') : '' ?>><?php echo "Died"; ?></option>



                </select>     </div>          </div> 

                <div class="row mb-3">

                <div class="col-6 d-flex justify-content-between align-items-center">

                <label for="inputName" class="form-label">Father Occupation</label>

                <span>:</span>

                                        </div>

                                        <div class="col-6 d-flex align-items-center">

               <input type="text" name="fathers_occupation" class="form-control" value="<?= !empty($ProfileDetails['fathers_occupation']) && $ProfileDetails['fathers_occupation'] != 'NULL'? $ProfileDetails['fathers_occupation'] : '' ?>">

                </select>       </div>        </div>

                <div class="row mb-3">

                <div class="col-6 d-flex justify-content-between align-items-center">

                <label for="inputName" class="form-label">Mother Details</label>

                <span>:</span>

                                        </div>

                                        <div class="col-6 d-flex align-items-center">

                <select id="motherdetails" class="form-control custom-select" name="motherdetails" >

                <option value="">--Select--</option>

                <option value="Alive" <?= (isset($ProfileDetails['motherdetails']) && !empty($ProfileDetails['motherdetails'])) ? ($ProfileDetails['motherdetails'] =="Alive"? 'selected' : '') : '' ?>><?php echo "Alive"; ?></option>

                <option value="Died" <?= (isset($ProfileDetails['motherdetails']) && !empty($ProfileDetails['motherdetails'])) ? ($ProfileDetails['motherdetails'] == "Died" ? 'selected' : '') : '' ?>><?php echo "Died"; ?></option>



                </select>  </div>

                   </div>

				 

                <div class="row mb-3">

                <div class="col-6 d-flex justify-content-between align-items-center">

                <label for="inputName" class="form-label">Mother Occupation</label>

                <span>:</span>

                                        </div>

                                        <div class="col-6 d-flex align-items-center">

                <input type="text" name="mothers_occupation" class="form-control" value="<?= !empty($ProfileDetails['mothers_occupation']) && $ProfileDetails['mothers_occupation'] != 'NULL'? $ProfileDetails['mothers_occupation'] : '' ?>">

             </div></div>

                                    

                                </form>

                            </div>

                        </div>





                        <div class="col-12 col-xxl-6 d-flex align-items-stretch">

                            <div class="customCard">

                                <form class="customForm viewOnly" id="hobbies" action="<?php echo site_url('user/update_hobbies'); ?>" method="post" autocomplete="off">

                                <div class="customCardHeader">

                                    <div class="row">

                                        <div class="col-6 d-flex align-items-center">

                                            <h2 class="cardHead mb-0">Hobbies and Interests</h2>

                                        </div>

                                        <div class="col-6 d-flex align-items-center justify-content-end">

                                            <button type="button" class="editBtn hobbiesEditBtn">

                                                <img src="<?php echo base_url() ?>assets/images/editing.png">

                                                Edit

                                            </button>

                                            <button type="submit" class="saveBtn hobbiessaveBtn d-none">

                                                <img src="<?php echo base_url() ?>assets/images/seen.png">

                                                Save

                                            </button>

                                        </div>

                                    </div>

                                </div>

                                

                                 

                                    <!--<div class="row mb-3">

                                    <div class="col-6 d-flex justify-content-between align-items-center">

                <label for="inputName" class="form-label">Favourite Sports</label>

                <span>:</span>

                                        </div>

                                        <div class="col-6 d-flex align-items-center">

                <textarea  id="favourite_sports" class="form-control" name="favourite_sports" ><?= !empty($ProfileDetails['fav_sports']) && $ProfileDetails['fav_sports'] != 'NULL'? $ProfileDetails['fav_sports'] : '' ?></textarea>

              </div></div>

              <div class="row mb-3">

              <div class="col-6 d-flex justify-content-between align-items-center">

                <label for="inputName" class="form-label">Favourite Food</label>

                <span>:</span>

                                        </div>

                                        <div class="col-6 d-flex align-items-center">

                <textarea  id="favourite_food" class="form-control" name="favourite_food" ><?= !empty($ProfileDetails['fav_food']) && $ProfileDetails['fav_food'] != 'NULL'? $ProfileDetails['fav_food'] : '' ?></textarea>

              </div></div>

              <div class="row mb-3">

              <div class="col-6 d-flex justify-content-between align-items-center">

                <label for="inputName" class="form-label">Eating Habits </label>

                <span>:</span>

                                        </div>

                                        <div class="col-6 d-flex align-items-center">

                <textarea  id="eating_habits" class="form-control" name="eating_habits" ><?= !empty($ProfileDetails['eating_habits']) && $ProfileDetails['eating_habits'] != 'NULL'? $ProfileDetails['eating_habits'] : '' ?></textarea>

              </div></div>

              <div class="row mb-3">

              <div class="col-6 d-flex justify-content-between align-items-center">

                <label for="inputName" class="form-label">Favourite Places</label>

                <span>:</span>

                                        </div>

                                        <div class="col-6 d-flex align-items-center">

                <textarea  id="favourite_places" class="form-control" name="favourite_places" ><?= !empty($ProfileDetails['fav_places']) && $ProfileDetails['fav_places'] != 'NULL'? $ProfileDetails['fav_places'] : '' ?></textarea>

              </div></div>-->

              <!---<div class="row mb-3">

              <div class="col-6 d-flex justify-content-between align-items-center">

                <label for="inputName" class="form-label">Movies and Musics </label>

                <span>:</span>

                                        </div>

                <div class="col-6 d-flex align-items-center">

                <textarea  id="favourite_movies" class="form-control" name="favourite_movies" ><?= !empty($ProfileDetails['movies_musics']) && $ProfileDetails['movies_musics'] != 'NULL'? $ProfileDetails['movies_musics'] : '' ?></textarea>

                                                </div>

              </div>-->

              <div class="row mb-3">

              <div class="col-6 d-flex justify-content-between align-items-center">

              <label for="inputName" class="form-label">Hobbies</label>

              <span>:</span>

                                        </div>

                                        <div class="col-6 d-flex align-items-center">

                                                        <textarea  id="hobbies" class="form-control" name="hobbies" ><?= !empty($ProfileDetails['hobbies']) && $ProfileDetails['hobbies'] != 'NULL'? $ProfileDetails['hobbies'] : '' ?></textarea>

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

                                            <h2 class="cardHead mb-0">Preference</h2>

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

                                    <div class="col-3 d-flex justify-content-between align-items-center">

              <label for="inputName" class="form-label">Age From<font color="red" size="3px">*</font></label>

              <span>:</span>

                                        </div>

                                        <div class="col-9 d-flex align-items-center">

                                        <select id="partner_age_from" class="form-control form-select" name="partner_age_from" required >

                  <option value="">Select</option>

                  <?php for ($i=18; $i <=80 ; $i++) {  ?>

                    <option value="<?php echo $i; ?>" <?= (isset($ProfileDetails['partner_age_from']) && !empty($ProfileDetails['partner_age_from'])) ? ($ProfileDetails['partner_age_from'] == $i ? 'selected' : '') : '' ?>><?php echo $i; ?></option>

                  <?php } ?>

                </select> 

                  </div></div>  

                  <div class="row mb-3">

                                    <div class="col-3 d-flex justify-content-between align-items-center">

                             <label for="inputName" class="form-label">Age to<font color="red" size="3px">*</font></label>

                             <span>:</span>

                                        </div>

                                        <div class="col-9 d-flex align-items-center">

                                        <select id="partner_age_to" class="form-control custom-select" name="partner_age_to" required>

                  <option value="">Select</option>

                  <?php for ($i=18; $i <=80 ; $i++) {  ?>

                    <option value="<?php echo $i; ?>" <?= (isset($ProfileDetails['partner_age_to']) && !empty($ProfileDetails['partner_age_to'])) ? ($ProfileDetails['partner_age_to'] == $i ? 'selected' : '') : '' ?>><?php echo $i; ?></option>

                  <?php } ?>

                </select>   </div>           </div>

                <div class="row mb-3">

                <div class="col-3 d-flex justify-content-between align-items-center">

              <label for="inputName" class="form-label">Height From<font color="red" size="3px">*</font></label>

              <span>:</span>

                                        </div>

                                        <div class="col-9 d-flex align-items-center">

              <select id="partner_height_from" class="form-control custom-select" name="partner_height_from" required >

              <option value="">Select</option>

                    <?php foreach ($Height as $value) { ?>

                    <option value="<?php echo $value->height_id ?>" <?= (isset($ProfileDetails['partner_height']) && !empty($ProfileDetails['partner_height'])) ? ($ProfileDetails['partner_height'] == $value->height_id ? 'selected' : '') : '' ?>><?php echo $value->height; ?></option>  

                    <?php } ?>

                </select> </div></div>  

                <div class="row mb-3">

                <div class="col-3 d-flex justify-content-between align-items-center">

                             <label for="inputName" class="form-label">Height to<font color="red" size="3px">*</font></label>

                             <span>:</span>

                                        </div>

                                        <div class="col-9 d-flex align-items-center">

                                         <select id="partner_height_to" class="form-control custom-select" name="partner_height_to" required>

                             <option value=""><?php echo $ProfileDetails['partner_height_to'];?></option>

                    <?php foreach ($Height as $value) { ?>

                    <option value="<?php echo $value->height_id ?>" <?= (isset($ProfileDetails['partner_heightto']) && !empty($ProfileDetails['partner_heightto'])) ? ($ProfileDetails['partner_heightto'] == $value->height_id ? 'selected' : '') : '' ?>><?php echo $value->height; ?></option>  

                    <?php } ?>

                </select>      </div>        </div>

                <div class="row mb-3">

                <div class="col-3 d-flex justify-content-between align-items-center">

                <label for="inputName" class="form-label">Physical Status</label>

                <span>:</span>

                                        </div>

                                        <div class="col-9 d-flex align-items-center">

                                        <select id="partner_physical_status"  class="form-control form-select" name="partner_physical_status[]">

                <?php  if(isset($OtherDetails['physicalstatus']) && $OtherDetails['physicalstatus']!="NULL")

                {

$datas=explode(",",$OtherDetails['physicalstatus']);

                }?>

                <?php foreach ($physicalstatus as $value) { ?>

                    <option value="<?php echo $value->physicalstatus; ?>" <?= (isset($OtherDetails['physicalstatus']) && !empty($OtherDetails['physicalstatus'])) ? (in_array($value->id,$datas) ? 'selected' : '') : '' ?>><?php echo $value->physicalstatus; ?></option>

                  <?php } ?>

                 

                </select>  

               

                  

                  

                </div> </div>

                <div class="row mb-3">

                <div class="col-3 d-flex justify-content-between align-items-center">

                <label for="inputName" class="form-label">Marital Status</label>

                <span>:</span>

                                        </div>

                                        <div class="col-9 d-flex align-items-center">

              

                    <select id="partner_marital_status"  class="form-control form-select" name="partner_marital_status[]" multiple="multiple">

                <?php  if(isset($ProfileDetails['partner_maritalstatus']) && $ProfileDetails['partner_maritalstatus']!="NULL")

                {

$datas=explode(",",$OtherDetails['partner_maritalstatus']);

                }?>

                <?php foreach ($maritalstatus as $value) { ?>

                    <option value="<?php echo $value->id; ?>" <?= (isset($ProfileDetails['partner_maritalstatus']) && !empty($ProfileDetails['partner_maritalstatus'])) ? (in_array($value->id,$datas) ? 'selected' : '') : '' ?>><?php echo $value->maritalstatus; ?></option>

                  <?php } ?>

                 

                </select>  

                     </div> </div>       

                <div class="row mb-3">

                <div class="col-3 d-flex justify-content-between align-items-center">

                <label for="inputName" class="form-label">Mother Tounge</label>

                <span>:</span>

                                        </div>

                                        <div class="col-9 d-flex align-items-center">

               

                    <select id="partner_mothertongue"  class="form-control form-select" name="partner_mothertongue[]" multiple="multiple">

                <?php  if(isset($ProfileDetails['partner_mother_tongue']) && $ProfileDetails['partner_mother_tongue']!="NULL")

                {

$datas=explode(",",$OtherDetails['mother_tongue']);

                }?>

                <?php foreach ($mothertongue as $value) { ?>

                    <option value="<?php echo $value->mothertongue_id; ?>" <?= (isset($ProfileDetails['partner_mother_tongue']) && !empty($ProfileDetails['partner_mother_tongue'])) ? (in_array($value->mothertongue_id,$datas) ? 'selected' : '') : '' ?>><?php echo $value->mothertongue; ?></option>

                  <?php } ?>

                 

                </select>   

                   </div>

                </div>

                <div class="row mb-3">

                <div class="col-3 d-flex justify-content-between align-items-center">

                <label for="inputName" class="form-label">Language Spoken</label>

                <span>:</span>

                                        </div>

                                        <div class="col-9 d-flex align-items-center">



                    <select id="partner_language_spoken"  class="form-control form-select" name="partner_language_spoken[]" multiple="multiple">

                <?php  if(isset($ProfileDetails['partner_languagespoken']) && $ProfileDetails['partner_languagespoken']!="NULL")

                {

$datas=explode(",",$OtherDetails['partner_languagespoken']);

                }?>

                <?php foreach ($mothertongue as $value) { ?>

                    <option value="<?php echo $value->mothertongue_id; ?>" <?= (isset($ProfileDetails['partner_languagespoken']) && !empty($ProfileDetails['partner_languagespoken'])) ? (in_array($value->mothertongue_id,$datas) ? 'selected' : '') : '' ?>><?php echo $value->mothertongue; ?></option>

                  <?php } ?>

                 

                </select>   

                    </div>

                    </div>

                   

                <div class="row mb-3">

                <div class="col-3 d-flex justify-content-between align-items-center">

                <label for="inputName" class="form-label">Skin Color</label>

                <span>:</span>

                                        </div>

                                        <div class="col-9 d-flex align-items-center">

                    <select id="partner_skin_color"  class="form-control form-select" name="partner_skin_color[]" multiple="multiple">

                <?php  if(isset($ProfileDetails['partner_skincolor']) && $ProfileDetails['partner_skincolor']!="NULL")

                {

$datas=explode(",",$OtherDetails['partner_skincolor']);

                }?>

                <?php foreach ($skin_color as $value) { ?>

                    <option value="<?php echo $value->id; ?>" <?= (isset($ProfileDetails['partner_skincolor']) && !empty($ProfileDetails['partner_skincolor'])) ? (in_array($value->id,$datas) ? 'selected' : '') : '' ?>><?php echo $value->skincolor; ?></option>

                  <?php } ?>

                 

                </select> 

                          </div>

               </div>

				<div class="row mb-3">

                <div class="col-3 d-flex justify-content-between align-items-center">

                <label for="inputName" class="form-label">Appearance</label>

                <span>:</span>

                                        </div>

                                        <div class="col-9 d-flex align-items-center">

                    <select id="partner_appearance"  class="form-control form-select" name="partner_appearance[]" multiple="multiple">

                <?php  if(isset($ProfileDetails['partner_appearance']) && $ProfileDetails['partner_appearance']!="NULL")

                {

$datas=explode(",",$OtherDetails['partner_appearance']);

                }?>

                <?php foreach ($appearance as $value) { ?>

                    <option value="<?php echo $value->id; ?>" <?= (isset($ProfileDetails['partner_appearance']) && !empty($ProfileDetails['partner_appearance'])) ? (in_array($value->id,$datas) ? 'selected' : '') : '' ?>><?php echo $value->appearance; ?></option>

                  <?php } ?>

                 

                </select>  

                 </div>

                 </div>

           

           

                <div class="row mb-3">

                <div class="col-3 d-flex justify-content-between align-items-center">

                <label for="inputName" class="form-label">Caste</label>

                <span>:</span>

                </div>  

                <div class="col-9 d-flex align-items-center">

                <?php  if(isset($ProfileDetails['partner_caste']) && $ProfileDetails['partner_caste']!="NULL")

                {

                $datas=explode(",",$OtherDetails['partner_caste']);

                }?>

                <select id="partner_caste" class="form-control custom-select" name="partner_caste[]" multiple="multiple">

                <?php foreach ($belief as $value) { ?>

                <option value="<?php echo $value->cid; ?>" <?= (isset($ProfileDetails['partner_caste']) && !empty($ProfileDetails['partner_caste'])) ? (in_array($value->cid,$datas) ? 'selected' : '') : '' ?>><?php echo $value->caste; ?></option>

                <?php } ?>

                </select>   

                </div>    

                </div>

                

						

                <div class="row">

                <div class="customCardHeader">

                <div class="col-6 d-flex align-items-center">

                <h2 class="cardHead mb-0">Partner education and Professional Informations</h2>

                </div>

                </div>  

                

                </div>    

                    

                

                <div class="row mb-3">

                <div class="col-6 d-flex justify-content-between align-items-center">

                <label for="inputName" class="form-label">Partner Education</label>

                <span>:</span>

                </div>  

                <div class="col-6 d-flex align-items-center">

                    

                <?php  if(isset($OtherDetails['partner_education']) && $OtherDetails['partner_education']!="NULL")

                {

                $datas=explode(",",$OtherDetails['partner_education']);

                 }?>

                <select id="partner_education" class="form-control custom-select" name="partner_education[]" multiple="multiple">

              

                  <?php foreach ($highest_education as $value) { ?>

                <option value="<?php echo $value->id; ?>" <?= (isset($OtherDetails['partner_education']) && !empty($OtherDetails['partner_education'])) ? (in_array($value->id,$datas) ? 'selected' : '') : '' ?>>

                    <?php echo $value->high_education; ?>

                    </option>

                <?php } ?>

                </select>

                

                </div>   

                </div>

                

               

                <div class="row mb-3">

                <div class="col-6 d-flex justify-content-between align-items-center">

                <label for="inputName" class="form-label">Partner Occupation</label>

                <span>:</span>

                </div> 

                <div class="col-6 d-flex align-items-center"> 

                

                <?php  if(isset($ProfileDetails['partner_education']) && $ProfileDetails['partner_education']!="NULL")

                {

                $datas=explode(",",$OtherDetails['partner_occupation']);

                }?>

                <select id="partner_occupation" class="form-control custom-select" name="partner_occupation[]" multiple="multiple">

                <?php foreach ($profession as $value) { ?>

                <option value="<?php echo $value->profession_id; ?>" <?= (isset($ProfileDetails['partner_occupation']) && !empty($ProfileDetails['partner_occupation'])) ? (in_array($value->profession_id,$datas) ? 'selected' : '') : '' ?>><?php echo $value->profession_name; ?></option>

                <?php } ?>

                </select>    

                

                </div>

                </div>

                

                

                <div class="row mb-3">

                <div class="col-6 d-flex justify-content-between align-items-center">

                <label for="inputName" class="form-label">Annual Income</label>

                <span>:</span>

                </div> 

                <div class="col-6 d-flex align-items-center"> 

                <select id="partner_annualincome" class="form-control custom-select" name="partner_annualincome">

                <option value="">--Select--</option>

                <?php foreach ($income as $value) { ?>

                <option value="<?php echo $value->income ?>" <?= (isset($ProfileDetails['partner_annualincome']) && !empty($ProfileDetails['partner_annualincome'])) ? ($ProfileDetails['partner_annualincome'] == $value->income ? 'selected' : '') : '' ?> ><?php echo $value->income; ?></option>  

                

                <?php } ?> 

                </select>

                </div>  

                </div>

                

                

                <div class="row">

                <div class="customCardHeader">

                <div class="col-6 d-flex align-items-center">

                <h2 class="cardHead mb-0">Partner Location and Contact preference</h2>

                </div>

                </div>  

                

                </div>     

                                 

                <div class="row mb-3">

                <div class="col-6 d-flex justify-content-between align-items-center">

                <label for="inputName" class="form-label">Country</label>

                <span>:</span>

                                        </div> 

                                        <div class="col-6 d-flex align-items-center"> 

                <select id="partner_country" class="form-control custom-select" name="partner_country" >

                  <option value="">--Select--</option>

                  <?php foreach ($country as $value) { ?>

                    <option value="<?php echo $value->id; ?>" <?= (isset($ProfileDetails['partner_country']) && !empty($ProfileDetails['partner_country'])) ? ($ProfileDetails['partner_country'] == $value->id ? 'selected' : '') : '' ?>><?php echo $value->name; ?></option>

                  <?php } ?>

                </select>   </div>             </div> 

				<div class="row mb-3">

                <div class="col-6 d-flex justify-content-between align-items-center">

                <label for="inputName" class="form-label">State</label>

                <span>:</span>

                                        </div> 

                                        <div class="col-6 d-flex align-items-center"> 

                <select id="partner_state" class="form-control custom-select" name="partner_state" >

                                      <option value="">--Select--</option>

                <?php foreach ($partner_states as $value) { ?>

                    <option value="<?php echo $value->id; ?>" <?= (isset($ProfileDetails['partner_state']) && !empty($ProfileDetails['partner_state'])) ? ($ProfileDetails['partner_state'] == $value->id ? 'selected' : '') : '' ?>><?php echo $value->name; ?></option>

                  <?php } ?>

                 

                </select> 

                

                </div>            

                

                </div>

               

				<div class="row mb-3">                

                    <div class="col-6 d-flex justify-content-between align-items-center">

                <label for="inputName" class="form-label">District</label>

                <span>:</span>

                 </div> 

                                        

                                        

                    <div class="col-6 d-flex align-items-center"> 



                <select id="partner_district"  class="form-control form-select" name="partner_district[]" multiple="multiple">

                <option value="">--Select--</option>

                <?php  if(isset($ProfileDetails['partner_district']) && $ProfileDetails['partner_district']!="NULL")

                {

                $datas=explode(",",$OtherDetails['partner_district']);

                }?>

                <?php foreach ($partner_district as $value) { ?>

                <option value="<?php echo $value->district_id; ?>" <?= (isset($ProfileDetails['partner_district']) && !empty($ProfileDetails['partner_district'])) ? (in_array($value->district_id,$datas) ? 'selected' : '') : '' ?>><?php echo $value->district; ?></option>

                <?php } ?>

                

                </select>   

        </div>

        

        </div>

				

				<div class="row mb-3">

                <div class="col-6 d-flex justify-content-between align-items-center">

                <label for="inputName" class="form-label">Nationality</label>

                <span>:</span>

                                        </div>          

                 <div class="col-6 d-flex align-items-center"> 

                <select id="partner_nationality"  class="form-control custom-select" name="partner_nationality">

                  <option value="">--Select--</option>

                  <?php foreach ($country as $value) { ?>

                    <option value="<?php echo $value->id; ?>" <?= (isset($ProfileDetails['partner_nationality']) && !empty($ProfileDetails['partner_nationality'])) ? ($ProfileDetails['partner_nationality'] == $value->id ? 'selected' : '') : '' ?>><?php echo $value->name; ?></option>

                  <?php } ?>

                </select>   </div>             </div> 

                <div class="row mb-3">

                <div class="col-6 d-flex justify-content-between align-items-center">

                <label for="inputName" class="form-label">Expectations</label>

                <span>:</span>

                                        </div>          

                 <div class="col-6 d-flex align-items-center"> 

                 <textarea  id="partner_expectation" class="form-control" required="" name="partner_expectation" ><?= !empty($ProfileDetails['demands']) && $ProfileDetails['demands'] != 'NULL'? $ProfileDetails['demands'] : '' ?></textarea>

                </div>          

                </div> 





                                </form>

                            </div>

                        </div>



                        

                    </div>

                    <!-- enroll button -->

                  <!--  <div class="enrollBox2 mb-5 d-sm-flex d-md-block d-lg-flex align-items-stretch">

                        <div class="contentBox">

                            <p class="enrollPara">Enroll for the assisted services &amp; enjoy personalized matchmaking</p>

                            <button type="button" class="enrollBtn">Enroll Now</button>

                        </div>

                        <div class="imgBox">

                            <img src="<?php echo base_url() ?>assets/images/enrollImg.jpg" class="enrollImg d-sm-none d-md-block d-lg-none">

                            <img src="<?php echo base_url() ?>assets/images/enrollImg.png" class="enrollImg d-none d-sm-block d-md-none d-lg-block">

                        </div>

                    </div>-->

                </div>

            </div>

        </div>

    </section>

    

<!--<section id="userFooter">-->

<!--<div class="container">-->

<!--<div class="row">-->

<!--<div class="col-12 text-center">-->

<!--<p class="at">© 2022 happynikah All Rights Reserved</p>-->

<!--</div>-->

<!--</div>-->

<!--</div>-->

<!--</section>-->



  <?php include('include/footer.php'); ?>



       



    


<!-- 
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-3.6.0.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/bootstrap.bundle.min.js"></script> -->

    

     <script src="<?php echo base_url() ?>assets/cropimage/croppie.min.js"></script>

  <script src="<?php echo base_url() ?>assets/cropimage/jquery.bpopup.min.js"></script>

  

<!--   <script src="<?php echo base_url() ?>assets/dist/js/croppie.min.js"></script>

-->    <!-- <script src="<?php echo base_url() ?>assets/dist/js/jquery.bpopup.min.js"></script>

     

  -->

        <script type="text/javascript">

        

        function onclickin(){

        

        $('.clk-popup').bPopup({

        escClose: true,

        modal: true,

        modalClose: true,

        });

        

        }

        </script>

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/jquery-ui/jquery-ui.css"></script>

    <script src="<?php echo base_url() ?>assets/js/jquery-ui/jquery-ui.js"></script>

<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">

--><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />

<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

--><script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script> 





        <script type="text/javascript">

        

            $(document).ready(function () 

            {

            $('#partner_physical_status').selectpicker();

            $('#partner_marital_status').selectpicker();

            $('#partner_mothertongue').selectpicker();

            $('#partner_language_spoken').selectpicker();

            $('#partner_skin_color').selectpicker();

            $('#partner_appearance').selectpicker();

            $('#partner_caste').selectpicker();

            $('#partner_occupation').selectpicker();

            $('#partner_district').selectpicker();

            $('#partner_education').selectpicker();

            

            

            /* $('#dob').datepicker({ 

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

            });*/

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

            /* $(".aboutSaveBtn").click(function(){

            $("#profileAbout").addClass("viewOnly");

            $(this).addClass("d-none");

            $(".aboutEditBtn").removeClass("d-none");

            });*/

            $(".biEditBtn").click(function(){

            $("#profilebi").removeClass("viewOnly");

            $(this).addClass("d-none");

            $(".biSaveBtn").removeClass("d-none");

            });

            /*  $(".biSaveBtn").click(function(){

            $("#profilebi").addClass("viewOnly");

            $(this).addClass("d-none");

            $(".biEditBtn").removeClass("d-none");

            });*/

            $(".riEditBtn").click(function(){

            $("#profileri").removeClass("viewOnly");

            $(this).addClass("d-none");

            $(".riSaveBtn").removeClass("d-none");

            });

            /* $(".riSaveBtn").click(function(){

            $("#profileri").addClass("viewOnly");

            $(this).addClass("d-none");

            $(".riEditBtn").removeClass("d-none");

            });*/

            $(".prfEditBtn").click(function(){

            $("#profileprf").removeClass("viewOnly");

            $(this).addClass("d-none");

            $(".prfSaveBtn").removeClass("d-none");

            });

            /*  $(".prfSaveBtn").click(function(){

            $("#profileprf").addClass("viewOnly");

            $(this).addClass("d-none");

            $(".prfEditBtn").removeClass("d-none");

            });*/

            $(".paEditBtn").click(function(){

            $("#profilepa").removeClass("viewOnly");

            $(this).addClass("d-none");

            $(".paSaveBtn").removeClass("d-none");

            });

            /* $(".paSaveBtn").click(function(){

            $("#profilepa").addClass("viewOnly");

            $(this).addClass("d-none");

            $(".paEditBtn").removeClass("d-none");

            });*/

            $(".lctnEditBtn").click(function(){

            $("#profilelctn").removeClass("viewOnly");

            $(this).addClass("d-none");

            $(".lctnSaveBtn").removeClass("d-none");

            });

            /*$(".lctnSaveBtn").click(function(){

            $("#profilelctn").addClass("viewOnly");

            $(this).addClass("d-none");

            $(".lctnEditBtn").removeClass("d-none");

            });*/

            $(".fmlyEditBtn").click(function(){

            $("#profilefmly").removeClass("viewOnly");

            $(this).addClass("d-none");

            $(".fmlySaveBtn").removeClass("d-none");

            });

            /* $(".fmlySaveBtn").click(function(){

            $("#profilefmly").addClass("viewOnly");

            $(this).addClass("d-none");

            $(".fmlyEditBtn").removeClass("d-none");

            });*/

            

            $(".preferenceEditBtn").click(function(){

            $("#profileprefference").removeClass("viewOnly");

            $(this).addClass("d-none");

            $(".preferencesaveBtn").removeClass("d-none");

            });

            $(".hobbiesEditBtn").click(function(){

            $("#hobbies").removeClass("viewOnly");

            $(this).addClass("d-none");

            $(".hobbiessaveBtn").removeClass("d-none");

            });

            

            // $(".preferencesaveBtn").click(function(){

            //     $("#profileprefference").addClass("viewOnly");Job status

            //     $(this).addClass("d-none");

            //     $(".preferenceEditBtn").removeClass("d-none");

            // });

            });

        

    </script>



        

        <script type="text/javascript">

        

        

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

  



        

        $('#saveimages').click(function(event)

        {

        

        $('#saveimages').html('<i class="fa fa-circle-o-notch fa-spin" style="font-size:24px"></i> Uploading...');   

        

        $path = 'fileupload_fashion';

        

        var size = { width: 1080, height: 1200 }; 

        var userid = $('#userid').val();

        var picnum = $('#picnum').val();

        

        

        $image_crop.croppie('result', {

        type: 'canvas',

        size: size,

        format:'jpeg'

        }).then(function(response)

        {

        

        

        $.ajax({

        url: '<?php echo site_url('user/uploadphoto')?>',

        type: 'post',

        data: "imagevalue="+response+"&picnum="+picnum,

        dataType: 'html',

        success: function (data)

        { 

        

        if(picnum == 0)

        {

        location.reload(); 

            

        } location.reload();                                      

        

      

        if(data != 0){

        $('#ajaxappendimage').prepend(data);

        }else{

        alert('Limit Exeded');

        }

        $('.clk-popup').bPopup().close();

        $('#saveimages').html('Upload');  

         location.reload(); 

        

        } 

        

        });

        });

        });

        

        

        function changeprpick(image,imgid){

        

        var userid = $('#userid').val();

        

        $.ajax({

        url: '<?php echo site_url('user/setprofilepic')?>',

        type: 'post',

        data: "image="+image+"&userid="+userid+"&imageid="+imgid,

        dataType: 'html',

        success: function (data)

        { 

        $('.profileImgBox').html(data);

        } 

        });

        }

        

        

        function deleteprpick(image_id)

        {

        if (confirm("Are you sure you want to delete?")){

        $.ajax({

        url: '<?php echo site_url('user/deleteprofilepic')?>',

        type: 'post',

        data: "image_id="+image_id,

        dataType: 'json',

        success: function (data)

        { 

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



        $( ".HeightFrom" ).change(function() 

        {

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

 

 

    //   $('#togglePassword').on('click',function()

    //   {

    //     var type = $('#photopassword').attr('type');

    //     if(type == "password")

    //     {

    //         $('#photopassword').attr('type','text')

    //         $(this).attr('class','fa fa-eye-slash')

    //     }

    //     if(type == "text")

    //     {

    //         $('#photopassword').attr('type','password')

    //         $(this).attr('class','fa fa-eye')

    //     }

    //     })

    

    

    

    

      function show() 

      {

      var p = document.getElementById('photopassword');

      p.setAttribute('type', 'text');

      }



      function hide() 

      {

      var p = document.getElementById('photopassword');

      p.setAttribute('type', 'password');

      }



      var pwShown = 0;



      document.getElementById("togglePassword").addEventListener("click", function () 

      {

      if (pwShown == 0) 

      {

      pwShown = 1;

      show();

      } 

      else 

      {

      pwShown = 0;

      hide();

      }

      }, false);

    

    



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

                $('#settings_error').html('<font color="green">'+data+'</font>')

                setTimeout(function () {

                    location.reload(true);

                }, 1700);

                // location.reload();

            }

        });

    }

    $("#country").change(function() {

        var country = $('#country').val();

        if(country !='' ) 

        {

            $("#states").empty();

            $("#states").append('<option value="">-Select-</option>');

            $.ajax({

                    url: "<?= base_url() ?>user/GetStates",

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

                    url: "<?= base_url() ?>user/GetDistrict",

                    data: {

                      states: states

                    },

                    type: "POST",

                    success: function(data) {

                        $("#districts").html(data);

                        $('#districts').change();

                    }

                });

              

           

        }  

    });

     $( "#districts" ).change(function() {

        var districts = $('#districts').val();

        if(districts !='' ) 

        {

            $("#city").empty();

            $("#city").append('<option value="">-Select-</option>');

            $.ajax({

                    url: "<?= site_url() ?>/user/GetCity",

                    data: {

                      districts: districts

                    },

                    type: "POST",

                    success: function(data) {

                        $("#city").html(data);

                       // $("#present_states").html(data);

                       // $('#states').change();

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

                    url: "<?= base_url() ?>user/GetStates",

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

                    url: "<?= base_url() ?>user/GetDistrict",

                    data: {

                      states: present_states

                    },

                    type: "POST",

                    success: function(data) {

                        $("#present_district").html(data);

                    }

                });

               

           

        }  

    });

     $( "#present_district" ).change(function() {

        var present_district = $('#present_district').val();

        if(states !='' ) 

        {

           

            $("#present_city").empty();

            $("#present_city").append('<option value="">-Select-</option>');

            $.ajax({

                    url: "<?= base_url() ?>user/GetCity",

                    data: {

                      districts: present_district

                    },

                    type: "POST",

                    success: function(data) 

                    {

                        $("#present_city").html(data);

                    }

                });

           

        }  

    });

    

    

    

    

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

    

    

    

    

    

    $("#partner_country").change(function() {

        var country = $('#partner_country').val();

        if(country !='' ) 

        {

            $("#partner_state").empty();

            $("#partner_state").append('<option value="">-Select-</option>');

            $.ajax({

                    url: "<?= base_url() ?>user/GetStates",

                    data: {

                      country: country

                    },

                    type: "POST",

                    success: function(data) {

                        $("#partner_state").html(data);

                        $('#partner_state').change();

                    }

                });

           

        }  

    });

     $("#partner_state").change(function() {

        var state = $('#partner_state').val();

        if(state !='' ) 

        {

            $("#partner_district").empty();

            $("#partner_district").append('<option value="">-Select-</option>');

            $.ajax({

                    url: "<?= base_url() ?>user/GetDistrict",

                    data: {

                      states: state

                    },

                    type: "POST",

                    success: function(data) {

                       // alert(data);

                        $("#partner_district").html(data);

                         $('#partner_district').selectpicker();

                     //   $('#partner_district').change();

                    }

                });

           

        }  

    });

</script>


<script type="text/javascript">
    document.addEventListener('contextmenu', function(e) {
    if (e.target.tagName === 'IMG') {
    e.preventDefault();
    }
    });


    // Disable text and image selection
    document.addEventListener('selectstart', function(e) {
    e.preventDefault();
    });

    // Disable image dragging
    document.addEventListener('dragstart', function(e) {
    if (e.target.tagName === 'IMG') {
    e.preventDefault();
    }
    });

</script>




</body>

</html>