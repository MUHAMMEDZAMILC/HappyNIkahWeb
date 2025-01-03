<!DOCTYPE html>
<?php include('header.php'); 

if($_SESSION['user_type']==='7' &&  $_SESSION['nikah_type']=='happynikah')
{
include('menuchatsupport.php');
}

if($_SESSION['user_type']==='7' &&  $_SESSION['nikah_type']=='gotonikah')
{
include('menuchatsupport_gotonikah.php');
}

if($_SESSION['user_type']==='4' &&  $_SESSION['nikah_type']=='happynikah')
{
include('menucreation.php');
}

if($_SESSION['user_type']==='4' &&  $_SESSION['nikah_type']=='gotonikah')
{
include('menucreation_gotonikah.php');
}


if($_SESSION['user_type']==='13')
{
include('menusuperadmin.php');
}

if($_SESSION['user_type']==='3' &&  $_SESSION['nikah_type']=='happynikah')
{
include('menusales.php');
}

if($_SESSION['user_type']==='3' &&  $_SESSION['nikah_type']=='gotonikah')
{
include('menusales_gotonikah.php');
}


if($_SESSION['user_type']==='3' &&  $_SESSION['nikah_type']=='gotonikah')
{
include('menumenusales_gotonikah.php');
}


$user_id5=$this->session->userdata('user_id_admin');

  if($user_id5=='8' || $user_id5=='26')
    {
     include('menusales.php');     
    }
    

//  include('menu.php'); 
 ?>
 
  <?php  if($_SESSION['user_type']==='0' && $_SESSION['nikah_type']=='happynikah') 
    {
    include('menu.php');
    }
    
    if($_SESSION['user_type']==='0' && $_SESSION['nikah_type']=='gotonikah') 
    {
    include('gotonikah_sales_super.php');
    }
    
     if($_SESSION['user_type']==='8' && $_SESSION['nikah_type']=='happynikah') 
    {
    include('menuservice.php');
    }
    
     if($_SESSION['user_type']==='6' && $_SESSION['nikah_type']=='happynikah') 
    {
    include('menusupport.php');
    }
    
    if($_SESSION['user_type']==='6' && $_SESSION['nikah_type']=='gotonikah') 
    {
    include('menusupport_gotonikah.php');
    }
    
    ?>

 
  <link rel="stylesheet" href="https://www.waytonikah.com/assets/common/css/croppie.css">
<!--  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">-->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    
  <div class="app-wrapper">

  <div class="app-content pt-3 p-md-3 p-lg-4">
  <div class="container-xl">

  <h1 class="app-page-title">Edit Profile</h1>
  

  <form  class="customForm viewOnly"  id="profilebi"  action="<?php echo site_url('admin/register/Register/'.$ProfileDetails['id']); ?>" method="post" 
	          autocomplete="off"  onsubmit="return submitForm()">
  <div class="row">
  <div class="col-md-12">
<a href="<?php echo base_url();?>admin/search_profiles">
  <button type="button" class="btn btn-secondary" style="margin-left: 5px;padding-top: 8px;margin-bottom: 6px;float: right;">Back</button>

</a>

  <button type="button" class="editBtn biEditBtn" 
  style="background-color: #cde1eb;
  border-radius: 4px;border: none;color: #31799c;padding: 6px 20px;float:right;">

  <img src="<?php echo base_url() ?>../assets/images/editing.png" style="height: 15px;
  margin-right: 8px;position: relative;top: -2px;">Edit
  </button>

<!--   <input type="submit" class="saveBtn biSaveBtn d-none" name="submit"
  style="background-color: #cde1eb; border-radius: 4px;border: none;color: #31799c;
  padding: 6px 20px;float:right;" value="Save"> -->



  <!-- <img src="<?php echo base_url() ?>../assets/images/seen.png" style="height: 15px;
  margin-right: 8px;position: relative;top: -2px;">Save
  </button> -->

  </div>
  </div>

    <!--         <input type="back" value="Back" class="btn btn-secondary" style="width: 8%;
    margin-left: 840px;margin-bottom: 10px;"> -->


<style type="text/css">
    .form-label {
    margin-bottom: .5rem;
    font-weight: 600;
    letter-spacing: 1px;
    font-size: 16px;
    color:#000;
}
.app-card .app-card-title {
  font-size: 1.600rem;
  margin-bottom: 0;
}
.app-card
{
    background: #96969682  !important;
}
     .customForm.viewOnly .form-control 
  {
    border: none;
    padding-left: 10px;
    pointer-events: none;
    color:#000; 
  }
  
  .customCard .customForm.viewOnly .form-control {
  border: none;
  pointer-events: none;
}


  .customForm.viewOnly .form-check-input 
  {
    border: none;
    padding: 0;
    pointer-events: none;
  }
 
   .customForm.viewOnly .form-control .custom-select
  {
    border: none;
    padding: 0;
    pointer-events: none;
  } 

.customForm.viewOnly .protected
  {
    border: none;
    padding: 0;
    pointer-events: none;
  } 


 .customForm.viewOnly .btn-group
{
     border: none;
    padding: 0;
    pointer-events: none;
}
.form-control option{
    color:#000;
}
.select2-container--default.select2-container--focus .select2-selection--multiple {
  border: solid black 1px;
  outline: 0;
  color: #000;
}
</style>


            <div class="row gy-4">
            
            <div class="col-12 col-lg-6">
            
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
            
            
            
            <div class="col-auto">
            <div class="item-label mb-2"><strong>Photo </strong>
            </div>
            <div class="item-data">
            
    
            <!--https://happynikah.azurewebsites.net/api/Files/photo_storage/?filePath=-->
            
            <img class="profile-image"  id="profileImage"  src="" alt="" style="width: 80px;">
          
          
         
          
            </div>
            </div><!--//col-->
            <div class="col text-end">
            <b> <?php echo $ProfileDetails['happynikah_id'];?></b>
            </div><!--//col-->
            
            
            <input type="file" id="uploadimage">
            
            
            <a href="<?php echo site_url('admin/profilephoto/'.$ProfileDetails['id']); ?>">
            <button type="button" class="btn btn-success btn-block" style="color:#fff;">
            Upload More
            </button>
            </a>
            
            
                      <a class="btn btn-danger btn-sm" data-replace="Delete Photo" style="color:#fff;" id="delete_ph">
                          Delete Photo
            </a>
            
            <div class="mb-3">
            <label for="inputDescription" style="font-weight: bold;">Photo visibility</label>
            <br/>
            
            <input type="radio" name="photo_visibility" value="0" checked <?= (isset($ProfileDetails['photo_visibility']) && !empty($ProfileDetails['photo_visibility'])) ? ($ProfileDetails['photo_visibility'] == '0' ? 'checked' : '') : '' ?>>Public
            
            
            <input type="radio" class="protected" name="photo_visibility" value="1" <?= (isset($ProfileDetails['photo_visibility']) && !empty($ProfileDetails['photo_visibility'])) ? ($ProfileDetails['photo_visibility'] == '1' ? 'checked' : '') : '' ?>>Protected
            
            </div>
            
            <?php $userid= $ProfileDetails['id'];?>
            
            <div class="mb-3 password-protection" id="password-protection" style="display: none">
            <?php 
            
            $qq=$this->db->select('photopassword,showtoexpress,showtopremium')
            ->from("tbl_registration")->where('id',$userid)->get();
            $photo_settings = $qq->row();
            ?>
            
            
            <label>Password:</label>
            <input type="password" name="photopassword" id="photopassword" autocomplete="new-password" <?php if(!empty($photo_settings->photopassword)){if($photo_settings->photopassword != '0'){ echo 'value="'.$photo_settings->photopassword.'"';}}?>>   
            
            
            <!-- <i class="fa fa-eye" id="togglePassword" class="togglePassword"></i> -->
            
            <button type="button" id="togglePassword" class="togglePassword"> 
            
            <i class="fa fa-eye" id="togglePassword" class="togglePassword"></i>
            </button>   
            <label>
            <input type="checkbox"  name="showtoexpress" <?php if(!empty($photo_settings->showtoexpress)){if($photo_settings->showtoexpress != '0'){ echo 'checked';}}?>>
            Show my photo to express interest accepted members</label>
            
            <label>
            <input type="checkbox" name="showtopremium" <?php if(!empty($photo_settings->showtopremium)){if($photo_settings->showtopremium != '0'){ echo 'checked';}}?>>
            Show my photo to premium members</label>
            </div> 
            
            <div class="mb-3">
            <label for="setting-input-1" class="form-label"> Name<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info."><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
            <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
            <circle cx="8" cy="4.5" r="1"/>
            </svg></span></label>
            <input type="hidden" name="userid" value="<?php echo $ProfileDetails['id'];?>" >
            <input type="text" id="name" class="form-control" name="name" value="<?= !empty($ProfileDetails['name'])? $ProfileDetails['name'] : '' ?>">
            </div>
            <div class="mb-3">
            <label for="setting-input-2" class="form-label">Gender</label>
            <input type="radio" id="male" name="gender" value="1" <?= (isset($ProfileDetails['gender']) && !empty($ProfileDetails['gender'])) ? ($ProfileDetails['gender'] == 1 ? 'checked' : '') : '' ?>>Male
            <label for="male">
            </label>
            <input type="radio" id="female" name="gender" value="2" <?= (isset($ProfileDetails['gender']) && !empty($ProfileDetails['gender'])) ? ($ProfileDetails['gender'] == 2 ? 'checked' : '') : '' ?>>Female
            <label for="female">
            </label>		
            </div>
            
            <button type="button"  id="showcontact" class="btn btn-primary" name="answer" style="float:right;color:#fff;margin-top: -22px;" 
            onclick="showDiv('<?php echo $ProfileDetails['id']; ?>')" />
            Show Contact
           
            </button>
            
            
            
            <!--<div class="d-sm-flex align-items-center justify-content-between" id="show_contact_div">-->
            
            <!--<a onclick="update_contact_viewed(<?php echo $this->uri->segment(4);?>)"> -->
            
            <!--<button type="button" class="btn cstmBtnColr upgradeProModal">-->
            
            <!--     Show Contact</button></a>-->
            <!--</div>-->
                        
            
          
                   
                 
                 
                   <!--<div class="proUser" style="display:none;" id="contact_div">-->
                   <!-- </div>                   -->
                                  
                                    
                                    
            <div class="mb-3">
            <label for="setting-input-3"  class="form-label">
            Phone
            
</label>
            <div class="row">
            <div class="col-md-5">
            <select id="country_code" class="form-control custom-select" name="country_code" style="padding-bottom: 4px;">
            <option value="">--Select Country Code--</option>
            
            <?php foreach ($countryCode as $value)
            { ?>
            <option value="<?php echo $value->id; ?>" <?= (isset($ProfileDetails['countryCode']) && !empty($ProfileDetails['countryCode'])) ? ($ProfileDetails['countryCode'] == $value->id ? 'selected' : '') : '' ?>>
        
            <?php echo $value->country; ?></option>
            <?php } ?>
            </select> 
            </div>
            
            <div class="col-md-7">
            
            <div id="welcomeDiv"  style="display:none;" class="answer_list">
            <input type="text" id="phone" class="form-control" name="phone" 
            title="Phone number with 6-9 and remaing 9 digit with 0-9" pattern="[5-9]{1}[0-9]{9,8}" value="<?= !empty($ProfileDetails['phone'])? $ProfileDetails['phone'] : '' ?>">
            </div>
            </div>
            </div>
            </div>

            
            <div class="mb-3">
            <label for="setting-input-3"  class="form-label">Date of Birth</label>
            <input type="text" class="form-control" id="dob" name="dob" value="<?= !empty($ProfileDetails['dob'])? $ProfileDetails['dob'] : '' ?>">
            </div>
            <div class="form-group">
            <label for="setting-input-4"  class="form-label">Age</label>
            <input type="text" class="form-control" id="age" name="age" readonly="" value="<?= !empty($ProfileDetails['age'])? $ProfileDetails['age'] : '' ?>">
            
            </div>
            
            <div class="mb-3">
            <label for="setting-input-5"  class="form-label">Email </label>
            <input type="email" id="email" class="form-control" name="email" value="<?= !empty($ProfileDetails['mail'])? $ProfileDetails['mail'] : '' ?>">
            </div>
            
            <div class="mb-3">
            <label for="setting-input-5"  class="form-label">Source </label>
            
            <!--        <input type="text" id="source" class="form-control" name="source" value="<?= !empty($ProfileDetails['source'])? $ProfileDetails['source'] : '' ?>"> -->
            
            <select class="form-control custom-select" id="source" name="source"  style="padding-bottom: 5px;">
            <option value="">--Select Source--</option>
            <option value="Facebook" <?= (isset($ProfileDetails['source']) && !empty($ProfileDetails['source'])) ? (($ProfileDetails['source'] == 'Facebook') ? 'selected' : '') : '' ?>>Facebook</option>
            <option value="Instagram" <?= (isset($ProfileDetails['source']) && !empty($ProfileDetails['source'])) ? (($ProfileDetails['source'] == 'Instagram') ? 'selected' : '') : '' ?>>Instagram</option>
            <option value="Whatsapp" <?= (isset($ProfileDetails['source']) && !empty($ProfileDetails['source'])) ? (($ProfileDetails['source'] == 'Whatsapp') ? 'selected' : '') : '' ?>>Whatsapp</option>
            <option value="Website" <?= (isset($ProfileDetails['source']) && !empty($ProfileDetails['source'])) ? (($ProfileDetails['source'] == 'Website') ? 'selected' : '') : '' ?>>Website</option>
            <option value="Others" <?= (isset($ProfileDetails['source']) && !empty($ProfileDetails['source'])) ? (($ProfileDetails['source'] == 'Others') ? 'selected' : '') : '' ?>>Others</option>
            </select>
            
            </div>
            
            <div class="mb-3">
            <label for="setting-input-6"  class="form-label">Marital Status</label>
            <select id="marital_status" class="form-control" name="marital_status">
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
            <label for="setting-input-8"  class="form-label">Physically Challenged</label>
            <select id="physically_challenged" class="form-control custom-select" name="physically_challenged">
            <option value="">--Select--</option>
            <option value="Normal" <?= (isset($ProfileDetails['physical_status']) && !empty($ProfileDetails['physical_status'])) ? (($ProfileDetails['physical_status'] == 'Normal') ? 'selected' : '') : '' ?>>Normal</option>

            <option value="Physically Challenged" <?= (isset($ProfileDetails['physical_status']) && !empty($ProfileDetails['physical_status'])) ? (($ProfileDetails['physical_status'] == 'Physically Challenged') ? 'selected' : '') : '' ?>>Physically Challenged</option>
            </select>
            </div>
            <?php if($ProfileDetails['physical_status']!="Normal")
            {?>
            <div id="for_physically_challenged">
            
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
            <label for="setting-input-11"  class="form-label">Nationality</label>
            <select id="nationality" class="form-control custom-select" name="nationality">
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
										    <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M40 936V427q-18-11-29-27T0 363.875q0-20.125 20.5-49T70 258q29 28 49.5 56.875t20.5 49Q140 384 129 400t-29 27v189h110V514q0-24 18.5-43t47.5-19q-13-22-19.5-43t-6.5-40.623Q250 331 267.5 298.5 285 266 316 246l164-110 164 110q31 20 48.5 52.5t17.5 69.877Q710 388 703.5 409q-6.5 21-19.5 43 29 0 47.5 19t18.5 43v102h110V427q-18-11-29-27t-11-36.125q0-20.125 20.5-49T890 258q29 28 49.5 56.875t20.5 49Q960 384 949 400t-29 27.394V936H530V776q0-21.25-14.325-35.625Q501.351 726 480.175 726 459 726 444.5 740.375 430 754.75 430 776v160H40Zm356-482h168q36.211 0 61.105-24.75Q650 404.5 650 368.5q0-22.5-10.5-41.5t-27.289-30.579L480 208l-132.211 88.421Q331 308 320.5 327T310 368.5q0 36 24.895 60.75Q359.789 454 396 454ZM100 876h270V776q0-45.833 32.118-77.917 32.117-32.083 78-32.083Q526 666 558 698.083q32 32.084 32 77.917v100h270V676H690V514H270v162H100v200Zm380-362Zm0-60Zm0-2Z"/></svg>
									    </div><!--//icon-holder-->
						                
							        </div><!--//col-->
							        <div class="col-auto">
								        <h4 class="app-card-title">Religious details</h4>
							        </div><!--//col-->
						        </div><!--//row-->
						    </div><!--//app-card-header-->
							<div class="app-card-body px-4 w-100 ">
							<div class="mb-3">
                <label for="inputName"  class="form-label">Religion</label>
                <select id="religion" class="form-control custom-select" name="religion">
                    <option value="">--Select--</option>
                    <?php foreach ($religion as $value) { ?>
                    <option value="<?php echo $value->rid ?>" <?= (isset($ProfileDetails['religion']) && !empty($ProfileDetails['religion'])) ? ($ProfileDetails['religion'] == $value->rid ? 'selected' : '') : '' ?>><?php echo $value->religion; ?></option>  
                    <?php } ?>  
                </select>        
                    </div> 
					<div class="mb-3">
                <label for="inputName"  class="form-label">Belief</label>
                <select id="belief" class="form-control custom-select" name="belief">
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
										    <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M560 482v-48q33-14 67.5-21t72.5-7q26 0 51 4t49 10v44q-24-9-48.5-13.5T700 446q-38 0-73 9.5T560 482Zm0 220v-49q33-13.5 67.5-20.25T700 626q26 0 51 4t49 10v44q-24-9-48.5-13.5T700 666q-38 0-73 9t-67 27Zm0-110v-48q33-14 67.5-21t72.5-7q26 0 51 4t49 10v44q-24-9-48.5-13.5T700 556q-38 0-73 9.5T560 592ZM248 756q53.566 0 104.283 12.5T452 806V379q-45-30-97.619-46.5Q301.763 316 248 316q-38 0-74.5 9.5T100 349v434q31-14 70.5-20.5T248 756Zm264 50q50-25 98-37.5T712 756q38 0 78.5 6t69.5 16V349q-34-17-71.822-25-37.823-8-76.178-8-54 0-104.5 16.5T512 379v427Zm-30 90q-51-38-111-58.5T248 817q-36.537 0-71.768 9Q141 835 106 848q-23.1 11-44.55-3Q40 831 40 805V342q0-15 7-27.5T68 295q42-20 87.395-29.5Q200.789 256 248 256q63 0 122.5 17T482 325q51-35 109.5-52T712 256q46.868 0 91.934 9.5Q849 275 891 295q14 7 21.5 19.5T920 342v463q0 27.894-22.5 42.447Q875 862 853 848q-34-14-69.232-22.5Q748.537 817 712 817q-63 0-121 21t-109 58ZM276 567Z"/></svg>
									    </div><!--//icon-holder-->
						                
							        </div><!--//col-->
							        <div class="col-auto">
								        <h4 class="app-card-title">Education and Professional Details </h4>
							        </div><!--//col-->
						        </div><!--//row-->
						    </div><!--//app-card-header-->
			
			
						    
                    <div class="app-card-body px-4 w-100">
                    <div class="mb-3">
                    <label for="inputName" class="form-label">Highest Education</label>
                    <select id="highest_education" class="form-control custom-select" name="highest_education">
                    <option value="">--Select--</option>
                    <?php foreach ($highest_education as $value) { ?>
                    <option value="<?php echo $value->id ?>" <?= (isset($ProfileDetails['highest_education']) && !empty($ProfileDetails['highest_education'])) ? ($ProfileDetails['highest_education'] == $value->id ? 'selected' : '') : '' ?> ><?php echo $value->high_education; ?></option>  
                    <?php } ?>  
                    </select>          
                    </div> 
                    
                    
                    <div class="mb-3" class="form-label">
                    <label for="inputName" class="form-label">Education</label>
                    <select id="education" class="form-control custom-select" name="education">
                    <option value="">--Select--</option>
                    <?php foreach ($education as $value) { ?>
                    <option value="<?php echo $value->edu_id ?>" <?= (isset($ProfileDetails['education']) && !empty($ProfileDetails['education'])) ? ($ProfileDetails['education'] == $value->edu_id ? 'selected' : '') : '' ?> ><?php echo $value->education; ?></option>  
                    
                    <?php } ?>  
                    </select>  
                    </div>
                    
                    
                <div class="mb-3" class="form-label">
                  <label for="inputName" style="font-weight:bold;">Madrassa Education</label>
                   <select id="madrassa_education" class="form-control custom-select" name="madrassa_education">
                    <option value="">--Select--</option>
                    <?php foreach ($madrassa_education as $value) { ?>
                      <option value="<?php echo $value->id ?>" <?= (isset($ProfileDetails['madrassa_education']) && !empty($ProfileDetails['madrassa_education'])) ? ($ProfileDetails['madrassa_education'] == $value->id ? 'selected' : '') : '' ?>><?php echo $value->madr_education; ?></option>
                    <?php } ?>
                  </select>
                </div>
                
				<div class="mb-3">
                <label for="inputName" class="form-label">Profession Type</label>
                <select id="profession_type" class="form-control custom-select" name="profession_type">
                    <option value="">--Select--</option>
                    <?php foreach ($professiontype as $value) { ?>
                    <option value="<?php echo $value->professiontype ?>" <?= (isset($ProfileDetails['job_category']) && !empty($ProfileDetails['job_category'])) ? ($ProfileDetails['job_category'] == $value->professiontype ? 'selected' : '') : '' ?>  ><?php echo $value->professiontype; ?></option>  
                    <?php } ?>  
                </select>               
                </div>
                
                <div class="mb-3">
                <label for="inputName" class="form-label">Profession</label>
                <select id="profession" class="form-control custom-select" name="profession" style="padding-bottom: 5px;">
                    <option value="">--Select--</option>
                    <?php foreach ($profession as $value) { ?>
                    <option value="<?php echo $value->profession_id ?>"  <?= (isset($ProfileDetails['occupation']) && !empty($ProfileDetails['occupation'])) ? ($ProfileDetails['occupation'] == $value->profession_id ? 'selected' : '') : '' ?> ><?php echo $value->profession_name; ?></option>  
                    <?php } ?>  
                </select>              
                </div>
                
				<div class="mb-3">
                <label for="inputName" class="form-label">Job Details</label>
                <textarea  id="job_details" class="form-control" style="height: 50px;" name="job_details" ><?= !empty($ProfileDetails['job_details']) && $ProfileDetails['job_details'] != 'NULL'? $ProfileDetails['job_details'] : '' ?></textarea>
                </div>
             
             
             <!--<div class="mb-3" class="form-label">-->
             <!--   <label for="inputName" class="form-label">Annual Income</label>-->
             <!--   <select id="annual_income" class="form-control custom-select" name="annual_income">-->
             <!--    <option value="">--Select--</option>-->
             <!--   <?php foreach ($income as $value) { ?>-->
             <!--     <option value="<?php echo $value->income ?>" <?= (isset($ProfileDetails['annual_income']) && !empty($ProfileDetails['annual_income'])) ? ($ProfileDetails['annual_income'] == $value->income ? 'selected' : '') : '' ?> ><?php echo $value->income; ?></option>  -->

             <!--       <?php } ?>  -->
             <!--   </select> -->
             <!--   </div>-->
             
                
							
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
                <label for="inputName" class="form-label">Height</label>
                <select id="height" class="form-control custom-select" name="height">
                  <option value="">--Select--</option>
                  <?php foreach ($Height as $value) { ?>
                    <option value="<?php echo $value->height_id; ?>" <?= (isset($ProfileDetails['height']) && !empty($ProfileDetails['height'])) ? ($ProfileDetails['height'] == $value->height_id ? 'selected' : '') : '' ?>><?php echo $value->height; ?></option>
                  <?php } ?>
                </select> 
                </div> 
                
                
				<div class="mb-3">
                <label for="inputName" class="form-label">Weight</label>
                <select id="weight" class="form-control custom-select" name="weight" style="padding-bottom: 5px;">
                  <option value="">--Select--</option>
                  <?php foreach ($weight as $value) { ?>
                    <option value="<?php echo $value->weight_id; ?>" <?= (isset($ProfileDetails['wid']) && !empty($ProfileDetails['wid'])) ? ($ProfileDetails['wid'] == $value->weight_id ? 'selected' : '') : '' ?>><?php echo $value->weight; ?></option>
                  <?php } ?>
                </select>               </div>
				<div class="mb-3">
                <label for="inputName" class="form-label">Skin Color</label>
                <select id="skin_color" class="form-control custom-select" name="skin_color" style="padding-bottom: 5px;">
                  <option value="">--Select--</option>
                  <?php foreach ($skin_color as $value) { ?>
                    <option value="<?php echo $value->skincolor; ?>" <?= (isset($ProfileDetails['color']) && !empty($ProfileDetails['color'])) ? ($ProfileDetails['color'] == $value->skincolor ? 'selected' : '') : '' ?>><?php echo $value->skincolor; ?></option>
                  <?php } ?>
                </select> 
                </div>
             
				<div class="mb-3">
                <label for="inputName" class="form-label">Mother Tounge</label>
                <select id="mothertongue" class="form-control custom-select" name="mothertongue" style="padding-bottom: 5px;">
                  <option value="">--Select--</option>
                  <?php foreach ($mothertongue as $value) { ?>
                    <option value="<?php echo $value->mothertongue_id; ?>" <?= (isset($ProfileDetails['mother_tongue']) && !empty($ProfileDetails['mother_tongue'])) ? ($ProfileDetails['mother_tongue'] == $value->mothertongue_id ? 'selected' : '') : '' ?>><?php echo $value->mothertongue; ?></option>
                  <?php } ?>
                </select>  
                   </div>
                   
                   
                <!--   <div class="mb-3">-->
                <!--<label for="inputName" class="form-label">Blood Group</label>-->
                <!--<select id="bloodgroup" class="form-control custom-select" name="bloodgroup">-->
                <!--  <option value="">--Select--</option>-->
                <!--  <?php foreach ($bloodgroup as $value) { ?>-->
                <!--    <option value="<?php echo $value->bloodgroup; ?>" <?= (isset($ProfileDetails['blood_group']) && !empty($ProfileDetails['blood_group'])) ? ($ProfileDetails['blood_group'] == $value->bloodgroup ? 'selected' : '') : '' ?>><?php echo $value->bloodgroup; ?></option>-->
                <!--  <?php } ?>-->
                <!--</select>  -->
                <!--   </div>-->
                   
				   <div class="mb-3">
                <label for="inputName" class="form-label">Body Type</label>
                <select id="bodytype" class="form-control custom-select" name="bodytype" style="padding-bottom: 5px;">
                  <option value="">--Select--</option>
                  <?php foreach ($bodytype as $value) { ?>
                    <option value="<?php echo $value->bodytype; ?>" <?= (isset($ProfileDetails['bodytype']) && !empty($ProfileDetails['bodytype'])) ? ($ProfileDetails['bodytype'] == $value->bodytype ? 'selected' : '') : '' ?>><?php echo $value->bodytype; ?></option>
                  <?php } ?>
                </select> 
                </div>
                
                
				<div class="mb-3" style="padding-bottom: 233px;">
                <label for="inputName" class="form-label">Appearance</label>
                <select id="appearance" class="form-control custom-select" name="appearance" style="padding-bottom: 5px;">
                  <option value="">--Select--</option>
                  <?php foreach ($appearance as $value) { ?>
                    <option value="<?php echo $value->appearance; ?>" <?= (isset($ProfileDetails['appearance']) && !empty($ProfileDetails['appearance'])) ? ($ProfileDetails['appearance'] == $value->appearance ? 'selected' : '') : '' ?>><?php echo $value->appearance; ?></option>
                  <?php } ?>
                </select> 
                </div>
                    
			</div><!---//app-card-body-->
			
			
			
			
            
            <!--<div class="app-card-header p-3 border-bottom-0">-->
            <!--<div class="row align-items-center gx-3">-->
            <!--<div class="col-auto">-->
            <!--<div class="app-icon-holder">-->
            <!--<svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M480 976q-82 0-155-31.5t-127.5-86Q143 804 111.5 731T80 576q0-85 32-158t87.5-127q55.5-54 130-84.5T489 176q79 0 150 26.5T763.5 276q53.5 47 85 111.5T880 529q0 108-63 170.5T650 762h-75q-18 0-31 14t-13 31q0 27 14.5 46t14.5 44q0 38-21 58.5T480 976Zm0-400Zm-233 26q20 0 35-15t15-35q0-20-15-35t-35-15q-20 0-35 15t-15 35q0 20 15 35t35 15Zm126-170q20 0 35-15t15-35q0-20-15-35t-35-15q-20 0-35 15t-15 35q0 20 15 35t35 15Zm214 0q20 0 35-15t15-35q0-20-15-35t-35-15q-20 0-35 15t-15 35q0 20 15 35t35 15Zm131 170q20 0 35-15t15-35q0-20-15-35t-35-15q-20 0-35 15t-15 35q0 20 15 35t35 15ZM480 916q11 0 15.5-4.5T500 897q0-14-14.5-26T471 818q0-46 30-81t76-35h73q76 0 123-44.5T820 529q0-132-100-212.5T489 236q-146 0-247.5 98.5T140 576q0 141 99.5 240.5T480 916Z"/></svg>-->
            <!--</div>-->
            
            <!--</div>-->
            <!--<div class="col-auto">-->
            <!--<h4 class="app-card-title">Hobbies and Interests</h4>-->
            <!--</div>-->
            <!--</div>-->
            <!--</div>-->
            <!--<div class="app-card-body px-4 w-100"   style="margin-bottom: 50px;">-->
            
            <!--<div class="mb-3">-->
            <!--<label for="inputName" class="form-label">Hobbies and Interests </label>-->
            <!--<textarea  id="hobbies" class="form-control" style="height: 120px;" name="hobbies"><?= !empty($ProfileDetails['hobbies']) && $ProfileDetails['hobbies'] != 'NULL'? $ProfileDetails['hobbies'] : '' ?></textarea>-->
            
            
            <!--</div>      -->
            <!--</div>-->
				
				
			
			
			
		
  
							<!---//app-card-body-->
							<!-- <div class="app-card-footer p-4 mt-auto">
						   </div> -->
						</div><!--//app-card-->
            
	                </div><!--//col-->
	                
                               
	  <div class="col-12 col-lg-6">
     
	      <div class="app-card app-card-settings shadow-sm d-flex flex-column align-items-start">
	          
	          
	          
	          
	          
	          	
             <div class="app-card-header p-3 border-bottom-0">
						        <div class="row align-items-center gx-3">
							        <div class="col-auto">
								        <div class="app-icon-holder">
										    <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M480.089 566Q509 566 529.5 545.411q20.5-20.588 20.5-49.5Q550 467 529.411 446.5q-20.588-20.5-49.5-20.5Q451 426 430.5 446.589q-20.5 20.588-20.5 49.5Q410 525 430.589 545.5q20.588 20.5 49.5 20.5ZM480 897q133-121 196.5-219.5T740 504q0-117.79-75.292-192.895Q589.417 236 480 236t-184.708 75.105Q220 386.21 220 504q0 75 65 173.5T480 897Zm0 79Q319 839 239.5 721.5T160 504q0-150 96.5-239T480 176q127 0 223.5 89T800 504q0 100-79.5 217.5T480 976Zm0-472Z"/></svg>
                </div><!--//icon-holder-->
                
                </div><!--//col-->
                <div class="col-auto">
                <h4 class="app-card-title">Location and Contact Details</h4>
                </div><!--//col-->
                </div><!--//row-->
                </div><!--//app-card-header-->
                
                <div class="app-card-body px-4 w-100">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="mb-3">
                        <label for="inputName" class="form-label">Home Country</label>
                        
                        
                        <select id="country" class="form-control custom-select" name="country">
                        <option value="">--Select--</option>
                        <?php foreach ($country as $value) { ?>
                        <option value="<?php echo $value->id; ?>" <?= (isset($ProfileDetails['home_country']) && !empty($ProfileDetails['home_country'])) ? ($ProfileDetails['home_country'] == $value->id ? 'selected' : '') : '' ?>><?php echo $value->name; ?></option>
                        <?php } ?>
                        </select> 
                        
                      </div> 
                    </div>
                    <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="inputName" class="form-label">Home State</label>
                        <select id="states" class="form-control custom-select" name="states">
                        <option value="">--Select--</option>
                        <?php foreach ($homestates as $value) { ?>
                            <option value="<?php echo $value->id; ?>" <?= (isset($ProfileDetails['state']) && !empty($ProfileDetails['state'])) ? ($ProfileDetails['state'] == $value->id ? 'selected' : '') : '' ?>><?php echo $value->name; ?></option>
                          <?php } ?>
                        
                        </select>                
                        </div>
                    </div>
                  </div>
                
                <div class="row">
                  <div class="col-sm-6">
                  <div class="mb-3">
                <label for="inputName" class="form-label">Home District</label>
                <select id="districts"  name="districts" class="form-control" style="padding-bottom: 5px;">
                <option value="">--Select--</option>
                <?php foreach ($homedistricts as $value) { ?>
                    <option value="<?php echo $value->district_id; ?>" <?= (isset($ProfileDetails['native_district']) && !empty($ProfileDetails['native_district'])) ? ($ProfileDetails['native_district'] == $value->district_id ? 'selected' : '') : '' ?>><?php echo $value->district; ?></option>
                  <?php } ?>                 
                </select>              
                </div>
                 </div>
                 
                  <div class="col-sm-6">
                  <div class="mb-3">
                <label for="inputName" class="form-label">Home City</label>
                
                <!--<select id="city" class="form-control custom-select" name="city" style="padding-bottom:5px;">-->
                <!--<option value="">--Select--</option>-->
                <!--<?php foreach ($homecity as $value) { ?>-->
                <!--    <option value="<?php echo $value->name; ?>" <?= (isset($ProfileDetails['native_place']) && !empty($ProfileDetails['native_place'])) ? ($ProfileDetails['native_place'] == $value->name ? 'selected' : '') : '' ?>><?php echo $value->name; ?></option>-->
                <!--  <?php } ?>                   -->
                <!--</select>  -->
                
            <input type="text" id="native_place" class="form-control" name="native_place" value="<?= !empty($ProfileDetails['native_place']) ? $ProfileDetails['native_place'] : '' ?>">


                
                
                </div>
                 </div>
                </div>
                
                
                 <hr style="height: 13px;color: black;">

              <div class="col-6">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="sameasabove">
                  <label class="form-check-label" for="sameasabove">
                    <p style="color: red;">Click if above location is same as present location</p>
                  </label>
                </div>
              </div>
              
              
                  <div class="row">
                    <div class="col-sm-6">
                    <div class="mb-3">
                <label for="inputName" class="form-label">Present Country</label>
                <select id="present_country"  class="form-control custom-select" name="present_country">
                  <option value="">--Select--</option>
                  <?php foreach ($country as $value) { ?>
                    <option value="<?php echo $value->id; ?>" <?= (isset($ProfileDetails['home_country']) && !empty($ProfileDetails['home_country'])) ? ($ProfileDetails['home_country'] == $value->id ? 'selected' : '') : '' ?>><?php echo $value->name; ?></option>
                  <?php } ?>
                </select>    
                </div> 
                    </div>
                    <div class="col-sm-6">
                    <div class="mb-3">
                <label for="inputName" class="form-label">Present State</label>
                <select id="present_states" class="form-control custom-select" name="present_states">
                  <option value="">--Select--</option>
                  <?php foreach ($states as $value) { ?>
                    <option value="<?php echo $value->id; ?>" <?= (isset($ProfileDetails['home_state']) && !empty($ProfileDetails['home_state'])) ? ($ProfileDetails['home_state'] == $value->id ? 'selected' : '') : '' ?>><?php echo $value->name; ?></option>
                  <?php } ?>
                  
                </select>           
                </div>
                </div>
                 </div>
                 
                 
                    <div class="row">
                      <div class="col-sm-6">
                      <div class="mb-3">
                <label for="inputName" class="form-label">Present District</label>
                <select id="present_district"  class="form-control custom-select" name="present_district" style="padding-bottom:5px;">
                  <option value="">--Select--</option>
                  <?php foreach ($districts as $value) { ?>
                    <option value="<?php echo $value->district_id; ?>" <?= (isset($ProfileDetails['home_district']) && !empty($ProfileDetails['home_district'])) ? ($ProfileDetails['home_district'] == $value->district_id ? 'selected' : '') : '' ?>><?php echo $value->district; ?></option>
                  <?php } ?> 
                </select>               
                </div>
                </div>
                      <div class="col-sm-6">
                          
                <!--          <div class="mb-3">-->
                <!--<label for="inputName" class="form-label">Present City<font color="red">*</font></label>-->
                <!--<select id="present_city" class="form-control custom-select" name="present_city">-->
                <!--  <option value="">--Select--</option>-->
                <!--  <?php foreach ($homecity as $value) { ?>-->
                <!--    <option value="<?php echo $value->id; ?>" <?= (isset($ProfileDetails['home_city']) && !empty($ProfileDetails['home_city'])) ? ($ProfileDetails['home_city'] == $value->id ? 'selected' : '') : '' ?>><?php echo $value->name; ?></option>-->
                <!--  <?php } ?>-->
                  
                <!--</select>           -->
                <!--</div>-->
                
                     </div>
				
                    </div>
               
				
            
				<div class="mb-3">
                <label for="inputName" class="form-label">Secondary Number</label>
                <div class="row">
                  <div class="col-md-5">
                    <select id="secondary_code" class="form-control custom-select" name="secondary_code">
                  <option value="">--Select--</option>
                  
                
                <?php foreach ($countryCode as $value)
                { ?>
                <option value="<?php echo $value->id; ?>" <?= (isset($ProfileDetails['secondary_code']) && !empty($ProfileDetails['secondary_code'])) ? ($ProfileDetails['secondary_code'] == $value->id ? 'selected' : '') : '' ?>>
                
                <?php echo $value->country; ?></option>
                <?php } ?>
                   </select>
                
             
            
              </div>
			  <div class="col-md-7">
                <input type="text" id="secondary_number" class="form-control" name="secondary_number"  value="<?= !empty($ProfileDetails['other_contact_number']) && $ProfileDetails['other_contact_number'] != 'NULL'? $ProfileDetails['other_contact_number'] : '' ?>">
                  </div>
                 </div>            
                </div>
				<!--  <div class="mb-3">
                <label for="inputName" class="form-label">Email</label>
                <input type="email" id="mail" class="form-control" name="mail" value="<?= !empty($ProfileDetails['mail']) && $ProfileDetails['mail'] != 'NULL'? $ProfileDetails['mail'] : '' ?>">
              </div>  -->
	            <div class="mb-3">
                <label for="inputName" class="form-label">Address</label>
                <textarea style="height: 112px;"  id="address" class="form-control"  name="address" ><?= !empty($ProfileDetails['address']) && $ProfileDetails['address'] != 'NULL'? $ProfileDetails['address'] : '' ?></textarea>
            </div>
                    
	</div><!---//app-card-body-->
	
	
					
          <div class="app-card-header p-3 border-bottom-0">
						<div class="row align-items-center gx-3">
							<div class="col-auto">
								<div class="app-icon-holder">
                <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M720.08 329q-30.08 0-51.58-21.42-21.5-21.421-21.5-51.5 0-30.08 21.42-51.58 21.421-21.5 51.5-21.5 30.08 0 51.58 21.42 21.5 21.421 21.5 51.5 0 30.08-21.42 51.58-21.421 21.5-51.5 21.5ZM660 976V640q0-30-15-54t-44-35l41-120q8-25 29.5-40t48.5-15q27 0 48.5 15t29.5 40l102 295H790v250H660ZM495 556q-25 0-42.5-17.5T435 496q0-25 17.5-42.5T495 436q25 0 42.5 17.5T555 496q0 25-17.5 42.5T495 556ZM220.08 329q-30.08 0-51.58-21.42-21.5-21.421-21.5-51.5 0-30.08 21.42-51.58 21.421-21.5 51.5-21.5 30.08 0 51.58 21.42 21.5 21.421 21.5 51.5 0 30.08-21.42 51.58-21.421 21.5-51.5 21.5ZM150 976V686H80V436q0-24.75 17.625-42.375T140 376h160q24.75 0 42.375 17.625T360 436v250h-70v290H150Zm290 0V806h-50V640q0-18.333 12.833-31.167Q415.667 596 434 596h122q18.333 0 31.167 12.833Q600 621.667 600 640v166h-50v170H440Z"/></svg>
								</div><!--//icon-holder-->
              </div><!--//col-->
            <div class="col-auto">
            <h4 class="app-card-title">Family Details</h4>
					</div><!--//col-->
				</div><!--//row-->
		</div><!--app-card-header -->
              <div class="app-card-body px-4 w-100">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="mb-3">
                      <label for="inputName" class="form-label">Family Type</label>
              
                      <select id="familytype" class="form-control custom-select" name="familytype" style="padding-bottom:5px;">
                        <option value="">--Select--</option>
                        <?php foreach ($familytype as $value) { ?>
                        <option value="<?php echo $value->familytype ?>" <?= (isset($ProfileDetails['familytype']) && !empty($ProfileDetails['familytype'])) ? ($ProfileDetails['familytype'] == $value->familytype ? 'selected' : '') : '' ?>><?php echo $value->familytype; ?></option>  
                        <?php } ?>
                      </select> 
                    </div>

                  </div>
                  <div class="col-sm-6">
                    <div class="mb-3">
                    
                      <label for="inputName" class="form-label">Financial Status</label>
                    
                        <select id="financialstatus" class="form-control custom-select" name="financialstatus" style="padding-bottom:5px;">
                        <option value="">--Select--</option>
                        <?php foreach ($financialstatus as $value) { ?>
                        <option value="<?php echo $value->financialstatus ?>" <?= (isset($ProfileDetails['financial_status']) && !empty($ProfileDetails['financial_status'])) ? ($ProfileDetails['financial_status'] == $value->financialstatus ? 'selected' : '') : '' ?>><?php echo $value->financialstatus; ?></option>  
                        <?php } ?>
                        </select>              
                    
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="mb-3">
                      <label for="inputName" class="form-label">Home Type</label>
                      
                      <select id="hometype" class="form-control custom-select" name="hometype" style="padding-bottom:5px;">
                        <option value="">--Select--</option>
                              <?php foreach ($hometype as $value)
                              { ?>
                              <option value="<?php echo $value->hometype ?>" <?= (isset($ProfileDetails['hometype']) && !empty($ProfileDetails['hometype'])) ? ($ProfileDetails['hometype'] == $value->hometype ? 'selected' : '') : '' ?>><?php echo $value->hometype; ?></option>  
                              <?php } ?>
                          </select>
                    </div>
                  </div>
                  <div class="col-sm-6">
                  <div class="mb-3">
                    
                
                    <label for="inputName" class="form-label">Number of Family Members</label>
                    <select id="total_members" class="form-control custom-select" name="total_members">
                    
                    <option value="">--Select--</option>
                      <?php for ($i=0; $i <=20 ; $i++) { ?>
                        <option value="<?php echo $i; ?>" <?= (isset($FamilyDetails['total_members']) && !empty($FamilyDetails['total_members'])) ? ($FamilyDetails['total_members'] == $i ? 'selected' : '') : '' ?>><?php echo $i; ?></option>
                      <?php } ?>
                    </select>              
                  </div>
                  </div>
                </div>
                
                
				  <div class="row">
                  <div class="col-sm-6">
                      <div class="mb-3">
                        <label for="inputName" class="form-label">Father Details</label>
                        <select id="fatherdetails" class="form-control" name="fatherdetails" >
                        <option value="">--Select--</option>
                        <option value="Alive" <?= (isset($FamilyDetails['fatherdetails']) && !empty($FamilyDetails['fatherdetails'])) ? ($FamilyDetails['fatherdetails'] =="Alive"? 'selected' : '') : '' ?>><?php echo "Alive"; ?></option>
                        <option value="Died" <?= (isset($FamilyDetails['fatherdetails']) && !empty($FamilyDetails['fatherdetails'])) ? ($FamilyDetails['fatherdetails'] == "Died" ? 'selected' : '') : '' ?>><?php echo "Died"; ?></option>

                        </select>               
                      </div> 
                  </div>
                  <div class="col-sm-6">
                  <div class="mb-3">
                      <label for="inputName" class="form-label">Father Occupation</label>
                    <input type="text" name="fathers_occupation" class="form-control" value="<?= !empty($FamilyDetails['fathers_occupation']) && $FamilyDetails['fathers_occupation'] != 'NULL'? $FamilyDetails['fathers_occupation'] : '' ?>">
                      </select>               
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                  <div class="mb-3">
                      <label for="inputName" class="form-label">Mother Details</label>
                      <select id="motherdetails" class="form-control custom-select" name="motherdetails" >
                      <option value="">--Select--</option>
                      <option value="Alive" <?= (isset($FamilyDetails['motherdetails']) && !empty($FamilyDetails['motherdetails'])) ? ($FamilyDetails['motherdetails'] =="Alive"? 'selected' : '') : '' ?>><?php echo "Alive"; ?></option>
                      <option value="Died" <?= (isset($FamilyDetails['motherdetails']) && !empty($FamilyDetails['motherdetails'])) ? ($FamilyDetails['motherdetails'] == "Died" ? 'selected' : '') : '' ?>><?php echo "Died"; ?></option>

                      </select>  
                   </div>
                  </div>
                  <div class="col-sm-6">
                        <div class="mb-3">
                      <label for="inputName" class="form-label">Mother Occupation</label>
                      <input type="text" name="mothers_occupation" class="form-control" value="<?= !empty($FamilyDetails['mothers_occupation']) && $FamilyDetails['mothers_occupation'] != 'NULL'? $FamilyDetails['mothers_occupation'] : '' ?>">
                      </div>
                  </div>
                </div>
                </div>
                    
                    
                    
                   
				
              <div class="app-card-header p-3 border-bottom-0">
						        <div class="row align-items-center gx-3">
							        <div class="col-auto">
								        <div class="app-icon-holder">
										    <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M475 916q5 0 11.5-2.5T497 907l337-338q13-13 19.5-29.667Q860 522.667 860 506q0-17-6.5-34T834 442L654 262q-13-13-30-19.5t-34-6.5q-16.667 0-33.333 6.5Q540 249 527 262l-18 18 81 82q13 14 23 32.5t10 40.5q0 38-29.5 67T526 531q-25 0-41.5-7.5t-30.185-21.341L381 429 200 610q-5 5-7 10.526-2 5.527-2 11.842 0 12.632 8.5 21.132 8.5 8.5 21.167 8.5 6.333 0 11.833-3t9.5-7l138-138 42 42-137 137q-5 5-7 11t-2 12q0 12 9 21t21 9q6 0 11.5-2.5t9.5-6.5l138-138 42 42-137 137q-4 4-6.5 10.333Q361 794.667 361 801q0 12 9 21t21 9q6 0 11-2t10-7l138-138 42 42-138 138q-5 5-7 11t-2 11q0 14 8 22t22 8Zm.064 60Q442 976 416 951.5t-31-60.619Q351 886 328 863t-28-57q-34-5-56.5-28.5T216 721q-37-5-61-30t-24-60q0-17 6.724-34.049T157 567l224-224 110 110q8 8 17.333 12.5Q517.667 470 527 470q13 0 24.5-11.5t11.5-24.654q0-5.846-3.5-13.346T548 405L405 262q-13-13-30-19.5t-34-6.5q-16.667 0-33.333 6.5Q291 249 278.059 261.857L126 414q-14 14-19.5 29.5t-6.5 35q-1 19.5 7.5 38T128 550l-43 43q-20-22-32.5-53T40 477q0-30 11.5-57.5T84 371l151-151q22-22 49.793-32.5 27.794-10.5 57-10.5Q371 177 398.5 187.5T448 220l18 18 18-18q22-22 49.793-32.5 27.794-10.5 57-10.5Q620 177 647.5 187.5T697 220l179 179q22 22 33 50.033t11 57Q920 535 909 562.5T876 612L539 949q-13 13-29.532 20t-34.404 7ZM377 430Z"/></svg>
									    </div><!--//icon-holder-->
						                
							        </div><!--//col-->
							        <div class="col-auto">
								        <h4 class="app-card-title">Partner preference </h4>
							        </div><!--//col-->
						        </div><!--//row-->
						    </div><!--//app-card-header-->
							<div class="app-card-body px-4 w-100">
							<div class="mb-3">
              <label for="inputName" class="form-label">Age From</label>
                <select id="partner_age_from" class="form-control custom-select" name="partner_age_from">
                <option value="">--Select--</option>
                <?php for ($i=18; $i <=80 ; $i++) {  ?>
                <option value="<?php echo $i; ?>" <?= (isset($OtherDetails['partner_age_from']) && !empty($OtherDetails['partner_age_from'])) ? ($OtherDetails['partner_age_from'] == $i ? 'selected' : '') : '' ?>><?php echo $i; ?></option>
                <?php } ?>
                </select>   
                
                    <label for="inputName" class="form-label">Age to</label>
                    <select id="partner_age_to" class="form-control custom-select" name="partner_age_to">
                    <option value="">--Select--</option>
                    <?php for ($i=18; $i <=80 ; $i++) {  ?>
                    <option value="<?php echo $i; ?>" <?= (isset($OtherDetails['partner_age_to']) && !empty($OtherDetails['partner_age_to'])) ? ($OtherDetails['partner_age_to'] == $i ? 'selected' : '') : '' ?>><?php echo $i; ?></option>
                    <?php } ?>
                    </select>              
                    </div>
                    
                    
                    <div class="mb-3">
                    <label for="inputName" class="form-label">Height From</label>
                    <select id="partner_height_from" class="form-control custom-select" name="partner_height_from">
                    <option value="">--Select--</option>
                    <?php foreach ($Height as $value) { ?>
                    <option value="<?php echo $value->height_id ?>" <?= (isset($OtherDetails['partner_height']) && !empty($OtherDetails['partner_height'])) ? ($OtherDetails['partner_height'] == $value->height_id ? 'selected' : '') : '' ?>><?php echo $value->height; ?></option>  
                    <?php } ?>
                    </select>  
                    
                    
                    <label for="inputName" class="form-label">Height to</label>
                    <select id="partner_height_to" class="form-control custom-select" name="partner_height_to">
                    <option value="">--Select--</option>
                    <?php foreach ($Height as $value) 
                    { ?>
                    <option value="<?php echo $value->height_id ?>" <?= (isset($OtherDetails['partner_height_to']) && !empty($OtherDetails['partner_height_to'])) ? ($OtherDetails['partner_height_to'] == $value->height_id ? 'selected' : '') : '' ?>><?php echo $value->height; ?></option>  
                    <?php } ?>
                    </select>            
                    </div>
                
               <!-- <div class="mb-3">-->
                    
               <!--  <label for="inputName" class="form-label">Physical Status</label>-->
                    
                   
               <!--<select id="partner_physical_status"  class="form-control form-select" name="partner_physical_status[]" multiple="multiple">        -->
                <!--<option value="">--Select--</option>-->
                <?php  if(isset($OtherDetails['partner_physicalstatus']) && $OtherDetails['partner_physicalstatus']!="NULL")
                {
                $datas=explode(",",$OtherDetails['partner_physicalstatus']);
                }?>
                <?php foreach ($physicalstatus as $value) { ?>
                <!--<option value="<?php echo $value->id; ?>" <?= (isset($OtherDetails['partner_physicalstatus']) && !empty($OtherDetails['partner_physicalstatus'])) ? (in_array($value->id,$datas) ? 'selected' : '') : '' ?>>-->
                <!--    <?php echo $value->physicalstatus; ?>-->
                <!--    </option>-->
                <?php } ?>
                
                <!--</select>   -->
                <!--</div> -->
                
                <div class="mb-3">
                <label for="inputName" class="form-label">Marital Status</label>
                
                
                     <select id="partner_marital_status"  class="form-control form-select" name="partner_marital_status[]" multiple="multiple">        
                <option value="">--Select--</option>
                <?php  if(isset($OtherDetails['partner_maritalstatus']) && $OtherDetails['partner_maritalstatus']!="NULL")
                {
                $datas=explode(",",$OtherDetails['partner_maritalstatus']);
                }?>
                <?php foreach ($maritalstatus as $value) { ?>
                <option value="<?php echo $value->id; ?>" <?= (isset($OtherDetails['partner_maritalstatus']) && !empty($OtherDetails['partner_maritalstatus'])) ? (in_array($value->id,$datas) ? 'selected' : '') : '' ?>>
                    <?php echo $value->maritalstatus; ?>
                    </option>
                <?php } ?>
                
                
                </select>   
                
                </div>   
                
                
                <div class="mb-3">
                <label for="inputName" class="form-label">Mother Tounge</label>
             
                
                <select id="partner_mother_tongue"  class="form-control form-select" name="partner_mother_tongue[]" multiple="multiple">        
                <option value="">--Select--</option>
                <?php  if(isset($OtherDetails['partner_mother_tongue']) && $OtherDetails['partner_mother_tongue']!="NULL")
                {
                $datas=explode(",",$OtherDetails['partner_mother_tongue']);
                }?>
                <?php foreach ($mothertongue as $value) { ?>
                <option value="<?php echo $value->mothertongue_id; ?>" <?= (isset($OtherDetails['partner_mother_tongue']) && !empty($OtherDetails['partner_mother_tongue'])) ? (in_array($value->mothertongue_id,$datas) ? 'selected' : '') : '' ?>>
                    <?php echo $value->mothertongue; ?>
                    </option>
                <?php } ?>
                
                
                </select>  
                
                 </div>
                 
			
                <div class="mb-3">
                <label for="inputName" class="form-label">Skin Color</label>
              
              <select id="partner_skin_color"  class="form-control form-select" name="partner_skin_color[]" multiple="multiple">        
                <option value="">--Select--</option>
                <?php  if(isset($OtherDetails['partner_skincolor']) && $OtherDetails['partner_skincolor']!="NULL")
                {
                $datas=explode(",",$OtherDetails['partner_skincolor']);
                }?>
                <?php foreach ($skin_color as $value) { ?>
                <option value="<?php echo $value->id; ?>" <?= (isset($OtherDetails['partner_skincolor']) && !empty($OtherDetails['partner_skincolor'])) ? (in_array($value->id,$datas) ? 'selected' : '') : '' ?>>
                    <?php echo $value->skincolor; ?>
                    </option>
                <?php } ?>
                
                </select>  
                </div>
             
			
				
                  
                  
                         <div class="row">

                  <div class="col-sm-6">
	 				  <div class="mb-3">
			             <label for="setting-input-8" class="form-label">Physically Challenged</label>
			                <select id="partner_physically_challenged" class="form-control custom-select" name="partner_physically_challenged" style="padding-bottom: 5px;">
			                   <option value="">--Select--</option>
			                    <option value="Normal" <?= (isset($OtherDetails['partner_physicalstatus']) && !empty($OtherDetails['partner_physicalstatus'])) ? (($OtherDetails['partner_physicalstatus'] == 'Normal') ? 'selected' : '') : '' ?>>Normal</option>
			                  <option value="Physically Challenged" <?= (isset($OtherDetails['partner_physicalstatus']) && !empty($OtherDetails['partner_physicalstatus'])) ? (($OtherDetails['partner_physicalstatus'] == 'Physically Challenged') ? 'selected' : '') : '' ?>>Physically Challenged</option>

			                  </select>
			                </div>
			            </div>
			            
			            
			            <div class="col-sm-6">
    <div class="mb-3">
      <label for="setting-input-8" class="form-label">Financial Status</label>
       
        
        
                <select id="partnerfinancialstatus" class="form-control custom-select" name="partnerfinancialstatus"  style="padding-bottom: 5px;">
                <option value="">--Select--</option>
                <?php foreach ($financialstatus as $value) { ?>
                <option value="<?php echo $value->financialstatus ?>" <?= (isset($OtherDetails['partner_financial']) && !empty($OtherDetails['partner_financial'])) ? ($OtherDetails['partner_financial'] == $value->financialstatus ? 'selected' : '') : '' ?>><?php echo $value->financialstatus; ?></option>  
                <?php } ?>
                </select>        
                
                </div>
                </div>
                </div>	 
                
			            
			             <div id="for_partner_physicallychallenged" style="display:none">
			               <div class="row">
                             <div class="col-sm-6">
			                 <div class="mb-3">
			                 
			                  <label for="setting-input-9" class="form-label">Physical status </label>
			                    <select id="partner_physical_status" class="form-control custom-select" name="partner_physical_status">
			                      <option value="">--Select--</option>
			                      <?php foreach ($physicalstatus as $value) { ?>
			                        <option value="<?php echo $value->physicalstatus;?>" <?= (isset($ProfileDetails['physicalstatus']) && !empty($ProfileDetails['physicalstatus'])) ? ($ProfileDetails['physicalstatus'] == $value->id ? 'selected' : '') : '' ?>><?php echo $value->physicalstatus; ?></option>
			                      <?php } ?>

			                    </select>
			                    
			                 
			                  </div>
			                 </div>
			                   <div class="col-sm-6">
			                  <div class="mb-3" style="display: none" id="partner_disabilities">
			                    <label for="setting-input-10" class="form-label">Disability Box </label>
			                    <input type="text" id="partner_disability" class="form-control" name="partner_disability" value="<?= !empty($ProfileDetails['disability']) ? $ProfileDetails['disability'] : '' ?>">
			                  </div>
			                </div>
			            </div>
			        </div>
			        
			           
                  <div class="row">
                    <div class="col-sm-6">
                    <div class="mb-3">
                <label for="inputName" class="form-label">Religion</label>
                <select id="partner_religion" class="form-control custom-select" name="partner_religion">
                  <option value="">--Select--</option>
                  <?php foreach ($religion as $value) { ?>
                    <option value="<?php echo $value->rid; ?>" <?= (isset($OtherDetails['partner_religion']) && !empty($OtherDetails['partner_religion'])) ? ($OtherDetails['partner_religion'] == $value->rid ? 'selected' : '') : '' ?>><?php echo $value->religion; ?></option>
                  <?php } ?>
                </select>              
                </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="mb-3">
                <label for="inputName" class="form-label">Caste</label>
                <select id="partner_caste" class="form-control custom-select"  name="partner_caste">
                  <option value="">--Select--</option>
                  <?php foreach ($belief as $value) { ?>
                    <option value="<?php echo $value->cid; ?>" <?= (isset($OtherDetails['partner_caste']) && !empty($OtherDetails['partner_caste'])) ? ($OtherDetails['partner_caste'] == $value->cid ? 'selected' : '') : '' ?>><?php echo $value->caste; ?></option>
                  <?php } ?>
                </select>
                </div>
                    </div>
                  </div> 
                
				</div>
				
				<!---//app-card-body-->
				
                <div class="app-card-header p-3 border-bottom-0">
                <div class="row align-items-center gx-3">
                <div class="col-auto" style="margin-left: 70px;">
                <div class="app-icon-holder">
                <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M560 482v-48q33-14 67.5-21t72.5-7q26 0 51 4t49 10v44q-24-9-48.5-13.5T700 446q-38 0-73 9.5T560 482Zm0 220v-49q33-13.5 67.5-20.25T700 626q26 0 51 4t49 10v44q-24-9-48.5-13.5T700 666q-38 0-73 9t-67 27Zm0-110v-48q33-14 67.5-21t72.5-7q26 0 51 4t49 10v44q-24-9-48.5-13.5T700 556q-38 0-73 9.5T560 592ZM248 756q53.566 0 104.283 12.5T452 806V379q-45-30-97.619-46.5Q301.763 316 248 316q-38 0-74.5 9.5T100 349v434q31-14 70.5-20.5T248 756Zm264 50q50-25 98-37.5T712 756q38 0 78.5 6t69.5 16V349q-34-17-71.822-25-37.823-8-76.178-8-54 0-104.5 16.5T512 379v427Zm-30 90q-51-38-111-58.5T248 817q-36.537 0-71.768 9Q141 835 106 848q-23.1 11-44.55-3Q40 831 40 805V342q0-15 7-27.5T68 295q42-20 87.395-29.5Q200.789 256 248 256q63 0 122.5 17T482 325q51-35 109.5-52T712 256q46.868 0 91.934 9.5Q849 275 891 295q14 7 21.5 19.5T920 342v463q0 27.894-22.5 42.447Q875 862 853 848q-34-14-69.232-22.5Q748.537 817 712 817q-63 0-121 21t-109 58ZM276 567Z"/></svg>
                </div><!--//icon-holder-->
                
                </div><!--//col-->
                <div class="col-auto">
                <h4 class="app-card-title">Partner Education and Professional Informations</h4>
                </div><!--//col-->
                </div><!--//row-->
                </div><!--//app-card-header-->
                <div class="app-card-body px-4 w-100">
                <div class="mb-3">
                <label for="inputName" class="form-label">Partner Education</label>
                
            <select id="partner_education" class="form-control custom-select" name="partner_education[]" multiple="multiple">
				<option value="">--Select--</option>
				          
				 <?php  if(isset($OtherDetails['partner_education']) && $OtherDetails['partner_education']!="NULL")
                {
                $datas=explode(",",$OtherDetails['partner_education']);
                }?>
                <?php foreach ($highest_education as $value) { ?>
                <option value="<?php echo $value->id; ?>" <?= (isset($OtherDetails['partner_education']) && !empty($OtherDetails['partner_education'])) ? (in_array($value->id,$datas) ? 'selected' : '') : '' ?>>
                    <?php echo $value->high_education; ?>
                    </option>
                <?php } ?>
                
				        </select>
                

                </div>
                
            <div class="mb-3">
            <label for="inputName" class="form-label">Partner Occupation</label>
              
                <select id="partner_occupation" class="form-control custom-select" name="partner_occupation[]" multiple="multiple">
              	<option value="">--Select--</option>
                <?php  if(isset($OtherDetails['partner_occupation']) && $OtherDetails['partner_occupation']!="NULL")
                {
                $datas=explode(",",$OtherDetails['partner_occupation']);
                }?>
                
                <?php foreach ($profession as $value) { ?>
                <option value="<?php echo $value->profession_id; ?>" <?= (isset($OtherDetails['partner_occupation']) && !empty($OtherDetails['partner_occupation'])) ? (in_array($value->profession_id,$datas) ? 'selected' : '') : '' ?>><?php echo $value->profession_name; ?></option>
                <?php } ?>
                </select>
                
                </div>
                
                <!--<div class="mb-3">-->
                <!--<label for="inputName" class="form-label">Annual Income</label>-->
                <!--<select id="partner_annualincome" class="form-control custom-select" name="partner_annualincome">-->
                <!--<option value="">--Select--</option>-->
                <!--<?php foreach ($income as $value) { ?>-->
                <!--<option value="<?php echo $value->income ?>" <?= (isset($OtherDetails['partner_annualincome']) && !empty($OtherDetails['partner_annualincome'])) ? ($OtherDetails['partner_annualincome'] == $value->income ? 'selected' : '') : '' ?> ><?php echo $value->income; ?></option>  -->
                
                <!--<?php } ?> -->
                <!--</select>   -->
                <!--</div>-->
                
							
			</div><!---//app-card-body-->
              <div class="app-card-header p-3 border-bottom-0">
						        <div class="row align-items-center gx-3">
							        <div class="col-auto">
								        <div class="app-icon-holder">
                        <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M480.089 566Q509 566 529.5 545.411q20.5-20.588 20.5-49.5Q550 467 529.411 446.5q-20.588-20.5-49.5-20.5Q451 426 430.5 446.589q-20.5 20.588-20.5 49.5Q410 525 430.589 545.5q20.588 20.5 49.5 20.5ZM480 897q133-121 196.5-219.5T740 504q0-117.79-75.292-192.895Q589.417 236 480 236t-184.708 75.105Q220 386.21 220 504q0 75 65 173.5T480 897Zm0 79Q319 839 239.5 721.5T160 504q0-150 96.5-239T480 176q127 0 223.5 89T800 504q0 100-79.5 217.5T480 976Zm0-472Z"/></svg>
									      </div><!--//icon-holder-->
						                
							        </div><!--//col-->
							        <div class="col-auto">
								        <h4 class="app-card-title">Partner Location and Contact Preference</h4>
							        </div><!--//col-->
						        </div><!--//row-->
						  </div><!--//app-card-header-->
							<div class="app-card-body px-4 w-100">
                <div class="row">
                  <div class="col-sm-6">
                  <div class="mb-3">
                  <label for="inputName" class="form-label">Partner Country</label>
                    <select id="partner_country" class="form-control custom-select" name="partner_country">
                      <option value="">--Select--</option>
                      <?php foreach ($country as $value) { ?>
                  
                          <option value="<?php echo $value->id; ?>" <?= (isset($ProfileDetails['partner_country']) && !empty($ProfileDetails['partner_country'])) ? ($ProfileDetails['partner_country'] == $value->id ? 'selected' : '') : '' ?>>
                        
                      <?php echo $value->name; ?></option>
                        
                     
                    </option>

                      <?php } ?>
                    </select>
                </div> 
                  </div>
                  <div class="col-sm-6">
                  <div class="mb-3">
                  <label for="inputName" class="form-label">Partner State</label>
                   
                   
                    <!--<select id="partner_state" class="form-control custom-select" name="partner_state" >-->
                    <!--  <option value="">--Select--</option>-->
                    <!-- </select>-->
                     
                     <select id="partner_state" class="form-control custom-select" name="partner_state">
                <option value="">--Select--</option>
                <?php foreach ($partner_states as $value) { ?>
                    <option value="<?php echo $value->id; ?>" <?= (isset($ProfileDetails['partner_state']) && !empty($ProfileDetails['partner_state'])) ? ($ProfileDetails['partner_state'] == $value->id ? 'selected' : '') : '' ?>><?php echo $value->name; ?></option>
                  <?php } ?>
                 
                </select> 
                   
                
                     
                </div>
                  </div>
                </div>
							  

                

                <div class="mb-3">
                  <label for="inputName" class="form-label">Partner District</label>
                    <!--<select id="partner_district"   class="form-control custom-select" name="partner_district[]" multiple style="height:40px;">-->
                        
                        
                        <!--<select id="partner_district"  class="form-control form-select" name="partner_district[]" multiple="multiple">-->
                   
               <select id="partner_district"  class="form-control form-select" name="partner_district[]" multiple="multiple">        
                <option value="">--Select--</option>
                <?php  if(isset($ProfileDetails['partner_district']) && $ProfileDetails['partner_district']!="NULL")
                {
                $datas=explode(",",$ProfileDetails['partner_district']);
                }?>
                <?php foreach ($partner_district as $value) { ?>
                <option value="<?php echo $value->district_id; ?>" <?= (isset($ProfileDetails['partner_district']) && !empty($ProfileDetails['partner_district'])) ? (in_array($value->district_id,$datas) ? 'selected' : '') : '' ?>><?php echo $value->district; ?></option>
                <?php } ?>
                
                </select>   
                
                    <!--</select>   -->
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
								        <h4 class="app-card-title">About</h4>
							        </div><!--//col-->
						        </div><!--//row-->
						    </div><!--//app-card-header-->
							<div class="app-card-body px-4 w-100">

              <div class="mb-3">
                <label for="inputName" class="form-label">Profile Description
                
                </label>

                <textarea id="description" class="form-control"  style="height: 140px;" name="description" ><?= !empty($ProfileDetails['aboutme']) && $ProfileDetails['aboutme'] != 'NULL'? $ProfileDetails['aboutme'] : '' ?></textarea>
            </div>
			</div><!---//app-card-body-->

        <!--<div class="col-md-12">-->
        <!--<input type="submit"  class="saveBtn biSaveBtn d-none"  name="submit" -->
        <!--style="background-color: #cde1eb;border-radius: 4px;border: none;color: #31799c;padding: 6px 20px;float: right;margin-top: -3292px;margin-right: 72px;" value="Save">-->
        <!--</div>-->
        
        
        <div class="app-card-footer p-4 mt-auto">
        <!--<input type="reset" value="Reset" class="btn btn-secondary">-->
        
        <input type="submit"  id="sbmt" class="saveBtn biSaveBtn d-none"
        name="submit" style="background-color: #cde1eb; border-radius: 4px;border: none;color: #31799c;padding: 6px 20px;float:right;" value="Save"> 
        
        
        </div><!--//app-card-footer-->
        
        </div><!--//app-card-->
        
        </div>
        
        </div><!--//col-->
        
        <!-- 
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
        </div>
        
        </div>
        <div class="col-auto">
        <h4 class="app-card-title">Security</h4>
        </div>
        </div>
        </div> -->
        
        
        <!--     <div class="app-card-body px-4 w-100">
        
        <div class="item border-bottom py-3">
        <div class="row justify-content-between align-items-center">
        <div class="col-auto">
        <div class="item-label"><strong>Password</strong></div>
        <div class="item-data">••••••••</div>
        </div> -->
        <!--//col-->
        <!--   <div class="col text-end">
        <a class="btn-sm app-btn-secondary" href="#">Change</a>
        </div> -->
        <!--//col-->
        <!-- </div> -->
        <!--//row-->
        <!-- </div> -->
        <!--//item-->
        
        <!-- <div class="item border-bottom py-3">
        <div class="row justify-content-between align-items-center">
        <div class="col-auto">
        <div class="item-label"><strong>Two-Factor Authentication</strong></div>
        <div class="item-data">You haven't set up two-factor authentication. </div>
        </div> -->
        <!--//col-->
        
        <!-- 		    <div class="col text-end">
        <a class="btn-sm app-btn-secondary" href="#">Set up</a>
        </div> -->
        
        <!--//col-->
        <!-- </div> -->
        <!--//row-->
        <!-- </div> -->
        <!--//item-->
        <!-- </div> -->
        <!--//app-card-body-->
        <!-- </div> -->
        <!--//app-card-->
                      
        </div>
        <!--//col-->
        
        </div><!--//row-->
      
        
        </div><!--//container-fluid-->
          </form>
        </div><!--//app-content-->
        


      <div class="clk-popup" style="display:none;">
  
        <div  id="CommonDatadiv" >
           
        <input type="hidden" id="imagecatno" value=""/>
        <input type="hidden" id="imagetitleen" value=""/>
        <input type="hidden" id="imagetitlear" value=""/>
         <?php
           $i =0;?>
        <input type="hiddden" id="userid" value="<?php echo $ProfileDetails['id'];?>" style="display:none;">
        <input type="hiddden" id="picnum" value="<?php echo $i ?>" style="display:none;">

        <div id="vanilla-demo"></div>
        <div class="divphotobottom">
        <!--<button class="vanilla-rotate rotateleft" data-deg="90"><i class="fa fa-undo" aria-hidden="true"></i> Rotate Left</button>-->
         <button class="basic-result" id="saveimages">Save Image</button>
        <!--<button class="vanilla-rotate rotateright" data-deg="-90"><i class="fa fa-repeat" aria-hidden="true"></i> Rotate Right</button>-->
        </div>   
        </div>
        </div>
        
        	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title text-success" id="exampleModalLabel" >Successfully Updated</h5>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		        </div>
		        <div class="modal-body">
		            
               
		       </div>
		       <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		      </div>
		    </div>
		  </div>
		</div>

		
     <form id="contactpaid" method="post" action="<?php echo base_url();?>admin/deletepic">
      <div class="modal fade" id="delete_photo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
        <div class="modal-content">
         <div class="modal-header">
         		        <h5 class="modal-title text-success" id="exampleModalLabel" ></h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           <p>Are You Sure You Want To Delete Photo..? </p>
        </div>
        
        <div class="modal-footer">
          <input type="hidden" name="user_image_id" value="<?php echo $ProfileDetails['id'];?>">
            <input type="hidden" name="user_image_photo" value="<?php echo $ProfileDetails['photo'];?>">
            
          <button type="submit" name="delete_photo" class="btn btn-danger delete_photo" style="color:#fff;">Delete</button>
        </div>
      </div>
    </div>
  </div>
  </form>


 <style type="text/css">
.img-circle{
   border-radius: unset !important;
   margin-bottom:4px !important;
}
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
  .row {
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-flex-wrap: wrap;
    -ms-flex-wrap: wrap;
    flex-wrap: nowrap;
    margin-right: -7.5px;
    margin-left: -7.5px;
    align-content: stretch;
    flex-direction: row;
    justify-content: space-evenly;

  }
  
    .customForm.viewOnly .form-control 
  {
    border: none;
    padding: 0;
    pointer-events: none;
  }
  
  .customCard .customForm.viewOnly .form-control {
  border: none;
  padding: 0;
  pointer-events: none;
}
  
  
  /*Mlutiselect*/
  
  

.dropdown,.dropup{
    position:relative
}
.dropdown-toggle:focus{
    outline:0
}
.dropdown-menu{
    position:absolute;
    top:100%;
    left:0;
    z-index:1000;
    display:none;
    float:left;
    min-width:160px;
    padding:5px 0;
    margin:2px 0 0;
    font-size:14px;
    text-align:left;
    list-style:none;
    background-color:#fff;
    -webkit-background-clip:padding-box;
    background-clip:padding-box;
    border:1px solid #ccc;
    border:1px solid rgba(0,0,0,.15);
    border-radius:4px;
    -webkit-box-shadow:0 6px 12px rgba(0,0,0,.175);
    box-shadow:0 6px 12px rgba(0,0,0,.175)
}
.dropdown-menu.pull-right{
    right:0;
    left:auto
}
.dropdown-menu .divider{
    height:1px;
    margin:9px 0;
    overflow:hidden;
    background-color:#e5e5e5
}
.dropdown-menu>li>a{
    display:block;
    padding:3px 20px;
    clear:both;
    font-weight:400;
    line-height:1.42857143;
    color:#333;
    white-space:nowrap
}
.dropdown-menu>li>a:focus,.dropdown-menu>li>a:hover{
    color:#262626;
    text-decoration:none;
    background-color:#f5f5f5
}
.dropdown-menu>.active>a,.dropdown-menu>.active>a:focus,.dropdown-menu>.active>a:hover{
    color:#fff;
    text-decoration:none;
    background-color:#337ab7;
    outline:0
}
.dropdown-menu>.disabled>a,.dropdown-menu>.disabled>a:focus,.dropdown-menu>.disabled>a:hover{
    color:#777
}
.dropdown-menu>.disabled>a:focus,.dropdown-menu>.disabled>a:hover{
    text-decoration:none;
    cursor:not-allowed;
    background-color:transparent;
    background-image:none;
    filter:progid:DXImageTransform.Microsoft.gradient(enabled=false)
}
.open>.dropdown-menu{
    display:block
}
.open>a{
    outline:0
}
.dropdown-menu-right{
    right:0;
    left:auto
}
.dropdown-menu-left{
    right:auto;
    left:0
}
.dropdown-header{
    display:block;
    padding:3px 20px;
    font-size:12px;
    line-height:1.42857143;
    color:#777;
    white-space:nowrap
}
.dropdown-backdrop{
    position:fixed;
    top:0;
    right:0;
    bottom:0;
    left:0;
    z-index:990
}

/*# sourceMappingURL=bootstrap.min.css.map */

  
</style>
	    
	    
	<?php include('footer.php'); ?>
	    	  

<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->

<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  -->


    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>  -->
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">  -->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>-->


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />-
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

    <!-- <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  -->
     <script src="<?php echo base_url() ?>assets/dist/js/croppie.min.js"></script>
     <script src="<?php echo base_url() ?>assets/dist/js/jquery.bpopup.min.js"></script>
     
     
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
    

             <script type="text/javascript">
    			$(function() {
				$("a[id='delete_ph']").click(function() {
					$("#delete_photo").modal("show");
					return false;
				   });
			   });
            </script>

        <script type="text/javascript">
        $(document).ready( function()
        
        {
        $('#partner_education').selectpicker();
     
        $('#partner_occupation').selectpicker();
        //   $('#partner_district').multiselect();
        
        $('#partner_district').selectpicker();
        // $('#partner_physical_status').selectpicker();
        $('#partner_marital_status').selectpicker();
        $('#partner_mother_tongue').selectpicker();
        $('#partner_language_spoken').selectpicker();
        $('#partner_skin_color').selectpicker();
        $('#partner_appearance').selectpicker();
         
        photo_protection_onload();
        var age = "";
       
        
        // $("#dob").datepicker({dateFormat:'dd-mm-yy',minDate: '01-01-1980',
        // maxDate: '31-12-2000', changeMonth: true,
        // changeYear: true });
        // $("#dob").on("change",function(){
        // var date = $(this).val();
        // var date1 = new Date(date);
        // var today = new Date();
        // console.log(date1);
        // var age = Math.floor((today-date1) / (365.25 * 24 * 60 * 60 * 1000));
        // console.log(age);
        // $('#age').val(age);
        // });
        
        
        $("#dob").datepicker({    
        changeMonth: true,
        changeYear: true,
        yearRange: '1960:2005',
        onClose: function(dateText, inst) 
        { 
        var startDate = new Date(dateText);
        
        var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
        var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
        $(this).datepicker('setDate', new Date(year, month, inst.selectedDay));
        }
        });
        
        $("#dob").on("change",function()
        {
        var date = $(this).val();
        var date1 = new Date(date);
        var today = new Date();
        console.log(date1);
        var age = Math.floor((today-date1) / (365.25 * 24 * 60 * 60 * 1000));
        console.log(age);
        $('#age').val(age);
        
        });

        
    
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



    // $('#togglePassword').on('click',function(){
        
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
        
    // })
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


    // $( "#partner_state" ).change(function() {
    //     var partner_state = $('#partner_state').val();
    //     if(partner_state !='' ) 
    //     {
    //         $("#partner_district").empty();
    //         $.ajax({
    //                 url: "<?= base_url() ?>admin/GetDistrict",
    //                 data: {
    //                   states: partner_state
    //                 },
    //                 type: "POST",
    //                 success: function(data) {
    //                  // alert(data);
    //                     $("#partner_district").append(data);
    //                 }
    //             });
                       
    //     }  
    // });



          $( "#partner_state" ).change(function() 
          {
          var partner_state = $('#partner_state').val();
          if(partner_state !='' ) 
          {
          $.ajax({
          url: "<?= base_url() ?>admin/GetDistrict",
          data: {
          states: partner_state
          },
          type: "POST",
          success: function(data)
          {
          // alert(data);
          $("#partner_district").append(data);
        $('#partner_district').selectpicker();

          }
          });
          }
          });



    
function submitForm() {
        // Perform AJAX form submission
        $.ajax({
            type: 'POST',
            url: $('#profilebi').attr('action'),
            data: $('#profilebi').serialize(),
            success: function (data) {
                // Optional: Check the response to confirm successful data submission

                // Reload the page after 500 milliseconds
                setTimeout(function () {
                    location.reload(true);
                }, 500);
            },
            error: function (error) {
                // Handle errors if necessary
                console.error('Error submitting the form:', error);
            }
        });

        // Prevent the default form submission
        return false;
    }
    
    
    
     function states(home_country,home_state) {
   if(home_country!='' && home_state==''){
      $("#present_states").empty();
      $("#present_district").empty();
      $("#present_city").empty();
      $("#present_states").append('<option value="">-Select-</option>');
     }
      $.ajax({
        url: "<?= base_url() ?>admin/GetStates",
        data: {
          country: home_country,
          states:home_state
        },
        type: "POST",
        success: function(data) {
          $("#present_states").html(data);
        }
    });
}

 function district(home_state,home_district){
     if(home_state!='' && home_district=='') {
       $("#present_district").empty();
       $("#present_city").empty();
       $("#present_district").append('<option value="">-Select-</option>');
      }
      $.ajax({
        url: "<?= base_url() ?>admin/GetDistrict",
        data: {
          states: home_state,
          districts: home_district
        },
        type: "POST",
        success: function(data) {
          $("#present_district").html(data);
        }
      });
}
 function city(home_district,home_city){
     if(home_district!='' && home_city=='') {
       $("#present_city").empty();
       $("#present_city").append('<option value="">-Select-</option>');
      }
      $.ajax({
        url: "<?= base_url() ?>admin/GetCity",
        data: {
         districts : home_district,
          city: home_city
        },
        type: "POST",
        success: function(data) {
          $("#present_city").html(data);
        }
      });
}

    
    
      $("#country").change(function() {
    var country = $('#country').val();
    console.log(country);
    if (country != '') {
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
  
  
  $("#states").change(function() {
    var states = $('#states').val();
    console.log(states);
    if (states != '') {
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

     $("#districts").change(function() {
        var districts = $('#districts').val();
        console.log(districts);
        $("#city").empty();
        $("#city").append('<option value="">-Select-</option>');
      $.ajax({
        url: "<?= base_url() ?>admin/GetCity",
        data: {
          districts: districts
        },
        type: "POST",
        success: function(data) {
          $("#city").html(data);
          $('#city').change();
        }
      });
     });
      
    }
  });


function showDiv(receiver_id) 
{
   document.getElementById('welcomeDiv').style.display = "block";
   
  
   
    data = {receiver_id : receiver_id};
            $.ajax({
                url: '<?php echo base_url()?>admin/showcontactsdata',
                type: 'POST',
                data:data,
                success: function(response) {
                    // $('#dataContainer').html(response);
                    
                },
                // error: function() {
                //     alert('Error occurred while fetching data.');
                // }
            });
            }

    // $( "#present_country" ).change(function() {
    //     var present_country = $('#present_country').val();
    //     if(present_country !='' ) 
    //     {
    //       $("#present_states").empty();
    //       $("#present_districts").empty();
    //       $("#present_city").empty();
    //         $("#present_states").append('<option value="">-Select-</option>');
    //         $.ajax({
    //                 url: "<?= base_url() ?>admin/GetStates",
    //                 data: {
    //                   country: present_country
    //                 },
    //                 type: "POST",
    //                 success: function(data) {
    //                     $("#present_states").html(data);
    //                 }
    //             });
           
    //     }  
    // });



$("#present_country").change(function() {
    var present_country = $('#present_country').val();
    var present_states = '';
    if (present_country != '') {
      states(present_country,present_states);
    }
  });
  $("#present_states").change(function() {
    var present_states = $('#present_states').val();
    var present_district = '';
    var present_city = '';
    if(present_states != '') {
     district(present_states,present_district);
    }
  });
   $("#present_district").change(function() {
    var present_district = $('#present_district').val();
   console.log(present_district);
    var present_city = '';
    if(present_district != '') {
     city(present_district,present_city);
    }
  });
  
    
    //  $("#present_states").change(function() {
    // var present_states = $('#present_states').val();
    // if (present_states != '') {
    //   $("#present_districts").empty();
    //   $("#present_districts").append('<option value="">-Select-</option>');
    //   $.ajax({
    //     url: "<?= base_url() ?>admin/GetDistrict",
    //     data: {
    //       present_states: states
    //     },
    //     type: "POST",
    //     success: function(data) {
    //       $("#present_districts").html(data);
    //       $('#present_districts').change();
    //     }
    //   });
      
    //         $("#present_city").empty();
    //         $("#present_city").append('<option value="">-Select-</option>');
    //         $.ajax({
    //                 url: "<?= base_url() ?>admin/GetCity",
    //                 data: {
    //                   states: present_states
    //                 },
    //                 type: "POST",
    //                 success: function(data) {
    //                     $("#present_city").html(data);
    //                 }
    //             });
           
    //     }  
    // });
    
    
      var mstatus = $('#marital_status').val();
      if(mstatus=="Divorced")
      {
        $("#for_marital_status").show();
      }
      
      
    if(mstatus=="Widow/Widower")
    {
    $("#for_marital_status").show();
    }
    
    $( "#marital_status" ).change(function() {
      var mstatus = $('#marital_status').val();
      if(mstatus=="Unmarried")
      {
        $("#for_marital_status").hide();
        $('#no_of_children').val("");

      }
      
    //   if(mstatus=="Divorced")
    //   {
    //      $("#for_marital_status").show();   
    //   }
      else
      {
        $("#for_marital_status").show();
        // $('#no_of_children').val("");
        
        
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


    
    
     $("#partner_physicallychallenged").change(function() {
    var partner_chanllenge = $('#partner_physicallychallenged').val();
    console.log(partner_chanllenge);
    if(partner_chanllenge == "Physically Challenged") {
      $("#for_partner_physicallychallenged").show();   
    }
     else {
      $("#for_partner_physicallychallenged").hide();
      $('#partner_physical_status').val("");
      $('#partner_disability').val("");

    }
  });
  
  
    $("#partner_physical_status").change(function () {
   var partner_physical_status = $('#partner_physical_status').val();
       console.log(partner_physical_status);
       if(partner_physical_status == "Blind") {  
        $("#partner_disabilities").show();
       }
        else if(partner_physical_status == "Deaf / Dumb") {  
        $("#partner_disabilities").show();
       }
       else if(partner_physical_status == "Physically Challanged") {  
        $("#partner_disabilities").show();
       }
       else
       {
        $("#partner_disabilities").hide();
         $('#partner_disability').val("");
       } 
  });
 
 


    $(".biEditBtn").click(function()
    {
    $("#profilebi").removeClass("viewOnly");
    $(this).addClass("d-none");
    $(".biSaveBtn").removeClass("d-none");
    });


    // $(".biSaveBtn").click(function(){
    // $("#profilebi").addClass("viewOnly");
    // $(this).addClass("d-none");
    // $(".biEditBtn").removeClass("d-none");

    // });




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
        
        
        $(function() {
        $("button[class='basic-result']").click(function() {
        
        // //   setTimeout(function(){
        // // 	location.reload(); 
        // // 	}, 8000);
        
        
        //                   setTimeout(function(){
        // 	location.reload(); 
        // 	}, 1000);
        
        
        });
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
        }).then(function(response){
        
        
        
        
        $.ajax({
        url: '<?php echo base_url()?>admin/uploadphoto',
        type: 'post',
        data: "imagevalue="+response+"&userid="+userid+"&picnum="+picnum,
        // data: "imagevalue="+response+"&picnum="+picnum,
        dataType: 'json',
        success: function (data) { 
        
        // window.location.reload();
        
        location.reload();
        
        
        if(data == true)
        {
        //   alert('You Have already uploaded 4 Images...')
        
        //       $('.clk-popup').bPopup().close();
        //   window.location.reload();
        
        
        
        }
        else{
        $('.clk-popup').bPopup().close();
        window.location.reload();
        }
        
        } 
        
        });
        
        });
        
        });
        


 $('input[type="checkbox"]').click(function() {
     if ($(this).is(":checked")) {
      var home_country = $("#country").val();
      var home_state = $("#states").val();
      var home_district = $("#districts").val();
      var home_city = $("#city").val();
      //console.log(home_district);
    //   var home_city = $("#city").val();
      console.log(home_city);
      $("#present_country").val(home_country); 
       states(home_country,home_state);
       district(home_state,home_district);   
       city(home_district,home_city);         
     }
    });
    


       $( "#highest_education" ).change(function() {
        var high_education= $('#highest_education').val();
        if( $('#highest_education').val() !='' ) 
        {
            $("#education").empty();
            $("#education").append('<option value="">-Select-</option>');
            $.ajax({
                    url: "<?= site_url() ?>admin/GetEducation",
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
    


      function changeprpick(image)
      {

      var userid = $('#userid').val();

      $.ajax({
      url: '<?php echo base_url()?>admin/setprofilepic',
      type: 'post',
      data: "image="+image+"&userid="+userid,
      dataType: 'json',
      success: function (data) { 

      window.location.reload();

      } 

      });

      }
      
      
         $(".upgradeProModal").click(function(){
                $(".normalUser").addClass("d-none");
                $(".proUser").removeClass("d-none");
            }); 
            
      
    function update_contact_viewed(pid)
    {
    url_address='<?php echo site_url() ?>/user/update_contact_viewed';
    data = { receiver_id : pid};
    $.ajax({
    type: "post",
    url: url_address,
    data: data,
    success: function(response){ 
    $("#contact_div").show();
    $("#show_contact_div").hide();
    
    },
    error: function(XMLHttpRequest, textStatus, errorThrown){
    alert(textStatus);
    }

    });
        
    }
    
    
    
    $(document).ready(function() {
    $('#sbmt').click(function() {
    
     if ($('#name').val() && $('#code').val() && $('#dob').val()  && $('#dob').val() && $('#email').val()
     && $('#marital_status').val() && $('#physically_challenged').val()  && $('#nationality').val() && $('#religion').val() && $('#belief').val() 
     
    && $('#highest_education').val()  && $('#education').val()  && $('#profession_type').val()  && $('#profession').val() && $('#job_details').val()
     
    && $('#height').val()  && $('#weight').val()  && $('#address').val()  && $('#familytype').val() && $('#financialstatus').val()
      
    && $('#hometype').val()  && $('#total_members').val()  && $('#partner_age_from').val()  && $('#partner_age_to').val() && $('#partner_height_from').val()
       
    && $('#partner_height_to').val()  && $('#partner_expectation').val()  && $('#aboutme').val()) 
      
      {
        $('#exampleModal').modal('show');
      
     }
    })
});



    const imgElement = document.getElementById('profileImage');
    const imageUrl = 'https://happynikah.azurewebsites.net/api/Files/photo_storage/?filePath=<?php echo $ProfileDetails['photo']; ?>';

    function imageExists(url, callback) 
    {
        const img = new Image();
        img.onload = function() 
        {
            callback(true);
        };
        img.onerror = function() 
        {
            callback(false);
        };
        img.src = url;
    }

    imageExists(imageUrl, function(exists) 
    {
        if(exists) 
        {
        imgElement.src = imageUrl;
        }
        else 
        {
        imgElement.src = '../../../../assets/photo_storage/<?php echo $ProfileDetails['photo']; ?>';
        }
    });
    
    
    $(document).ready(function() 
    {
    $('#phone').keypress(function (e) 
    {
    var regex = new RegExp("^[0-9-]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    //console.log(str);
    if (regex.test(str)) {
    return true;
    }
    
    e.preventDefault();
    return false;
    });
    });
    
    
   
    
    
    document.addEventListener('DOMContentLoaded', function() 
    {
    var form = document.getElementById('contactpaid');
    form.addEventListener('submit', function(event) 
    {
        event.preventDefault();
        
        
        var formData = new FormData(form);
        var xhr = new XMLHttpRequest();
        xhr.open('POST', form.getAttribute('action'));
        xhr.onload = function() 
        {
            if (xhr.status === 200) 
            {
                setTimeout(function() 
                {
                    window.location.reload();
                }, 800);
            } 
            else 
            {
        
                console.error('Form submission failed.');
            }
        };
        xhr.send(formData);
    });
});
   

</script>


</html> 

