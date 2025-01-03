    <!DOCTYPE html>
    <?php include('header.php'); ?>
    <?php
    if($_SESSION['user_type']==='4')
    {
    include('menucreation_happymangalyam.php');  
    } 
    
    if($_SESSION['user_type']==='3')
    {
    include('menusales_mangalyam.php');  
    } 
    
    ?>

    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


        <style>
        .form-label 
        {
        margin-bottom: .5rem;
        font-weight: 600;
        letter-spacing: 1px;
        font-size: 16px;
        color:#000;
        }
        .form-control
        {
        color:#000;   
        }
        label
        {
        color:#000; 
        font-weight: 600;
        letter-spacing: 1px;
        }
        .app-card
        {
        background: #96969682  !important;
        }
        .app-card .app-card-title {
        font-size: 1.600rem;
        margin-bottom: 0;
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
<div class="app-wrapper">

  <div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">

      <h1 class="app-page-title">User Registration</h1>
      <div class="row gy-4">
        <div class="col-12 col-lg-6">
          <?php if ($this->session->flashdata('added'))
          { ?>
          
<script>
    $(window).on('load',function(){
       $('#exampleModal').modal('show');
    });
 </script>
        
          <?php }?>
          
          <?php if($this->session->flashdata('existing'))
          {?>
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-check"></i> Existing Phone Number</h4>
            </div>
          <?php } ?>

       <form action="<?php echo site_url('admin/register_mangalyam/Register_mangalyam'); ?>" method="post" autocomplete="off" id="regform">

            <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
              <div class="app-card-header p-3 border-bottom-0">
                <div class="row align-items-center gx-3">
                  <div class="col-auto">
                    <div class="app-icon-holder">
                      <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                      </svg>
                    </div>
                    <!--//icon-holder-->

                  </div>
                  <!--//col-->
                  <div class="col-auto">
                    <h4 class="app-card-title">Basic Information</h4>
                  </div>
                  <!--//col-->
                </div>
                <!--//row-->
              </div>
              <!--//app-card-header-->
              <div class="app-card-body px-4 w-100">
                <div class="mb-3">
                  <label for="setting-input-1" class="form-label"> Name<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info."><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z" />
                        <circle cx="8" cy="4.5" r="1" />
                      </svg></span>
                    <font color="red">*</font>
                  </label>
                  <input type="text" id="name" class="form-control" name="name" value="<?= !empty($ProfileDetails['name']) ? $ProfileDetails['name'] : '' ?>" required>
                </div>
                <div class="mb-3">
                  <label for="setting-input-2" class="form-label">Gender<font color="red">*</font></label><br>
            <input type="radio" id="male" name="gender" value="1" <?= (isset($ProfileDetails['gender']) && !empty($ProfileDetails['gender'])) ? ($ProfileDetails['gender'] == 1 ? 'checked' : '') : '' ?> required>
                  <label for="male">Male
                  </label>
            <input type="radio" id="female" name="gender" value="2" <?= (isset($ProfileDetails['gender']) && !empty($ProfileDetails['gender'])) ? ($ProfileDetails['gender'] == 2 ? 'checked' : '') : '' ?> required>
                  <label for="female">Female
                  </label>
                </div>
              
                <div class="mb-3">
                  <label for="setting-input-3" class="form-label">Phone <font color="red">*</font></label>
                  <div class="row">
                    <div class="col-md-5">
                      <select id="country_code" class="form-control custom-select" name="country_code" required style="padding-bottom: 5px;">
                        <option value="">Select</option>
                        <?php 
                    foreach ($countryCode as $value) { 
                   if (isset($ProfileDetails['countryCode']) && ($ProfileDetails['countryCode'])==$value->id) {  ?>
                    <option selected="selected" value="<?php echo $value->id; ?>" name="<?php echo $value->country; ?>"><?php echo $value->country;?></option>
                  <?php } else{ ?>
                    <option value="<?php echo $value->id;?>" name="<?php echo $value->country; ?>"><?php echo $value->country;?></option> 
                    <?php  }
                          } ?>

                       <!--  <?php foreach ($country as $value) { ?>
                          <option value="<?php echo $value->id; ?>" <?= (isset($ProfileDetails['secondary_code']) && !empty($ProfileDetails['secondary_code'])) ? ($ProfileDetails['secondary_code'] == $value->id ? 'selected' : '') : '' ?>><?php echo $value->name . "(+" . $value->country_code . ")"; ?></option>
                        <?php } ?> -->
                      </select>
                    </div>
                    <div class="col-md-7">
                      <input type="text" id="phone" class="form-control" name="phone" minlength="5" maxlength="10" required title="No alphabets and No special characters" value="<?= !empty($ProfileDetails['phone']) ? $ProfileDetails['phone'] : '' ?>">
                   
                 <span id="phone_result"></span>  
                   
                    </div>
                  </div>
                </div>

                <div class="mb-3">
                  <label for="setting-input-3" class="form-label">Date of Birth <font color="red">*</font></label>
                  <input type="text" class="form-control" id="dob" name="dob" required="" value="<?= !empty($ProfileDetails['dob']) ? $ProfileDetails['dob'] : '' ?>">
                </div>
                <div class="form-group">
                  <label for="setting-input-4" class="form-label">Age <font color="red">*</font></label>
                  <input type="text" class="form-control" id="age" name="age" readonly="" value="<?= !empty($ProfileDetails['age']) ? $ProfileDetails['age'] : '' ?>">

                </div>
                <div class="mb-3">
                  <label for="setting-input-5" class="form-label">Source<font color="blue">*</font></label>
                  <select class="form-control custom-select" id="source" name="source" style="padding-bottom: 5px;">
                    <option value="">Select any</option>
                    <option value="Facebook" <?= (isset($ProfileDetails['source']) && !empty($ProfileDetails['source'])) ? (($ProfileDetails['source'] == 'Facebook') ? 'selected' : '') : '' ?>>Facebook</option>
                    <option value="Instagram" <?= (isset($ProfileDetails['source']) && !empty($ProfileDetails['source'])) ? (($ProfileDetails['source'] == 'Instagram') ? 'selected' : '') : '' ?>>Instagram</option>
                    <option value="Whatsapp" <?= (isset($ProfileDetails['source']) && !empty($ProfileDetails['source'])) ? (($ProfileDetails['source'] == 'Whatsapp') ? 'selected' : '') : '' ?>>Whatsapp</option>
                    <option value="Website" <?= (isset($ProfileDetails['source']) && !empty($ProfileDetails['source'])) ? (($ProfileDetails['source'] == 'Website') ? 'selected' : '') : '' ?>>Website</option>
                    <option value="Others" <?= (isset($ProfileDetails['source']) && !empty($ProfileDetails['source'])) ? (($ProfileDetails['source'] == 'Others') ? 'selected' : '') : '' ?>>Others</option>
                  </select>
                  <!-- <input type="text" id="source" class="form-control" name="source" value="<?= !empty($ProfileDetails['source']) ? $ProfileDetails['source'] : '' ?>"> -->
                </div>
                <div class="mb-3">
                  <label for="setting-input-6" class="form-label">Marital Status <font color="red">*</font></label>
                  <select id="marital_status" class="form-control custom-select" name="marital_status" required style="padding-bottom: 5px;">
                    <option value="">--Select--</option>
                    <?php foreach ($maritalstatus as $value) { ?>
                      <option value="<?php echo $value->maritalstatus ?>" <?= (isset($ProfileDetails['maritalstatus']) && !empty($ProfileDetails['maritalstatus'])) ? ($ProfileDetails['maritalstatus'] == $value->maritalstatus ? 'selected' : '') : '' ?>><?php echo $value->maritalstatus; ?></option>
                    <?php } ?>

                  </select>
                </div>
                <div class="form-group" style="display:none" id="for_marital_status">
                  <label for="setting-input-7" class="form-label">No of Children </label>
                  <select id="no_of_children" class="form-control custom-select" name="no_of_children" style="padding-bottom: 5px;">
                    <option value="">--Select--</option>
                    <?php for ($i = 1; $i <= 7; $i++) {  ?>
                      <option value="<?php echo $i; ?>" <?= (isset($ProfileDetails['no_of_children']) && !empty($ProfileDetails['no_of_children'])) ? ($ProfileDetails['no_of_children'] == $i ? 'selected' : '') : '' ?>><?php echo $i; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="setting-input-8" class="form-label">Physically Challenged <font color="red">*</font></label>
                  <select id="physically_challenged" class="form-control custom-select" name="physically_challenged" required style="padding-bottom: 5px;">
                    <option value="">--Select--</option>
                    
                <option value="Normal" <?= (isset($ProfileDetails['physically_challenged']) && !empty($ProfileDetails['physically_challenged'])) ? (($ProfileDetails['physically_challenged'] == 'Normal') ? 'selected' : '') : '' ?>>Normal</option>

                <option value="Physically Challenged" <?= (isset($ProfileDetails['physically_challenged']) && !empty($ProfileDetails['physically_challenged'])) ? (($ProfileDetails['physically_challenged'] == 'Physically Challenged') ? 'selected' : '') : '' ?>>Physically Challenged</option>
                  </select>
                </div>
                <div id="for_physically_challenged" style="display:none">

                  <div class="mb-3">
                    <label for="setting-input-9" class="form-label">Physical status </label>
                    <select id="physical_status" class="form-control custom-select" name="physical_status" style="padding-bottom: 5px;">
                      <option value="">--Select--</option>
                      <?php foreach ($physicalstatus as $value) { ?>
                        <option value="<?php echo $value->physicalstatus;?>" <?= (isset($ProfileDetails['physicalstatus']) && !empty($ProfileDetails['physicalstatus'])) ? ($ProfileDetails['physicalstatus'] == $value->id ? 'selected' : '') : '' ?>><?php echo $value->physicalstatus; ?></option>
                      <?php } ?>

                    </select>
                  </div>
                  <div class="mb-3" style="display: none" id="disabilities">
                    <label for="setting-input-10" class="form-label">Disability Box </label>
                    <input type="text" id="disability" class="form-control" name="disability" value="<?= !empty($ProfileDetails['disability']) ? $ProfileDetails['disability'] : '' ?>">
                  </div>
                </div>
                <div class="mb-3">
                  <label for="setting-input-11" class="form-label">Nationality <font color="red">*</font></label>
                  <select id="nationality" class="form-control custom-select" name="nationality" required style="padding-bottom: 5px;">
                    <option value="">--Select--</option>
                    <?php foreach ($country as $value) { ?>
                      <option value="<?php echo $value->id ?>" <?= (isset($ProfileDetails['nationality']) && !empty($ProfileDetails['nationality'])) ? ($ProfileDetails['nationality'] == $value->id ? 'selected' : '') : '' ?>><?php echo $value->name; ?></option>
                    <?php } ?>

                  </select>
                </div>


              </div>
              <!--//app-card-body-->
              
              
              
              
              <!-- physical attribute content below  -->
              <div class="app-card-header p-3 border-bottom-0">
              <div class="row align-items-center gx-3">
                <div class="col-auto">
                  <div class="app-icon-holder">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-gear" viewBox="0 0 16 16">
                      <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm.256 7a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Zm3.63-4.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z" />
                    </svg>
                  </div>
                  <!--//icon-holder-->

                </div>
                <!--//col-->
                <div class="col-auto">
                  <h4 class="app-card-title">Physical Attributes </h4>
                </div>
                <!--//col-->
              </div>
              <!--//row-->
            </div>
            <!--//app-card-header-->
            <div class="app-card-body px-4 w-100">
            <div class="row">
              <div class="col-sm-6">
                <div class="mb-3">
                    <label for="inputName" class="form-label">Height<font color="red">*</font></label>
                      <select id="height" class="form-control custom-select" name="height" required style="padding-bottom: 5px;">
                        <option value="">--Select--</option>
                        <?php foreach ($Height as $value) { ?>
                        <option value="<?php echo $value->height_id; ?>" <?= (isset($ProfileDetails['height']) && !empty($ProfileDetails['height'])) ? ($ProfileDetails['height'] == $value->height_id ? 'selected' : '') : '' ?>><?php echo $value->height; ?></option>
                        <?php } ?>
                      </select>
                </div>
                </div>

              <div class="col-sm-6">
                <div class="mb-3">
                  <label for="inputName" class="form-label">Weight<font color="red">*</font></label>
                    <select id="weight" class="form-control custom-select" name="weight" required style="padding-bottom: 5px;">
                      <option value="">--Select--</option>
                        <?php foreach ($weight as $value) { ?>
                          <option value="<?php echo $value->weight_id; ?>" <?= (isset($ProfileDetails['weight']) && !empty($ProfileDetails['weight'])) ? ($ProfileDetails['weight'] == $value->weight_id ? 'selected' : '') : '' ?>><?php echo $value->weight; ?></option>
                        <?php } ?>
                    </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="mb-3">
                  <label for="inputName" class="form-label">Skin Color<font color="blue">*</font></label>
                    <select id="skin_color" class="form-control custom-select" name="skin_color" style="padding-bottom: 5px;">
                      <option value="">--Select--</option>
                      <?php foreach ($skin_color as $value) { ?>
                      <option value="<?php echo $value->skincolor; ?>" <?= (isset($ProfileDetails['color']) && !empty($ProfileDetails['color'])) ? ($ProfileDetails['color'] == $value->skincolor ? 'selected' : '') : '' ?>><?php echo $value->skincolor; ?></option>
                      <?php } ?>
                    </select>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="mb-3">
                  <label for="inputName" class="form-label">Mother Tounge<font color="blue">*</font></label>
                    <select id="mothertongue" class="form-control custom-select" name="mothertongue" style="padding-bottom: 5px;">
                      <option value="">--Select--</option>
                      <?php foreach ($mothertongue as $value) { ?>
                      <option value="<?php echo $value->mothertongue_id; ?>" <?= (isset($ProfileDetails['mothertongue']) && !empty($ProfileDetails['mothertongue'])) ? ($ProfileDetails['mothertongue'] == $mothertongue_id ? 'selected' : '') : '' ?>><?php echo $value->mothertongue; ?></option>
                      <?php } ?>
                    </select>
                </div>
              </div>
            </div>

              <div class="row">
                <div class="col-sm-6">
                  <div class="mb-3">
                    <label for="inputName" class="form-label">Body Type<font color="blue">*</font></label>
                      <select id="bodytype" class="form-control custom-select" name="bodytype" style="padding-bottom: 5px;">
                        <option value="">--Select--</option>
                        <?php foreach ($bodytype as $value) { ?>
                        <option value="<?php echo $value->bodytype; ?>" <?= (isset($ProfileDetails['bodytype']) && !empty($ProfileDetails['bodytype'])) ? ($ProfileDetails['bodytype'] == $bodytype ? 'selected' : '') : '' ?>><?php echo $value->bodytype; ?></option>
                        <?php } ?>
                      </select>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="mb-3">
                    <label for="inputName" class="form-label">Appearance<font color="blue">*</font></label>
                      <select id="appearance" class="form-control custom-select" name="appearance" style="padding-bottom: 5px;">
                        <option value="">--Select--</option>
                        <?php foreach ($appearance as $value) { ?>
                        <option value="<?php echo $value->appearance; ?>" <?= (isset($ProfileDetails['appearance']) && !empty($ProfileDetails['appearance'])) ? ($ProfileDetails['appearance'] == $appearance ? 'selected' : '') : '' ?>><?php echo $value->appearance; ?></option>
                        <?php } ?>
                      </select>
                  </div>
                </div>
              </div>  
              
              
              
              <div class="row">
                <div class="col-sm-6">
                    
                      <div class="mb-3">
                <label for="inputName" class="form-label">Blood Group</label>
                <select id="bloodgroup" class="form-control custom-select" name="bloodgroup" style="padding-bottom: 5px;">
                  <option value="">--Select--</option>
                  <?php foreach ($bloodgroup as $value) { ?>
                    <option value="<?php echo $value->bloodgroup; ?>" <?= (isset($ProfileDetails['blood_group']) && !empty($ProfileDetails['blood_group'])) ? ($ProfileDetails['blood_group'] == $value->bloodgroup ? 'selected' : '') : '' ?>><?php echo $value->bloodgroup; ?></option>
                  <?php } ?>
                </select>  
                   </div>
                   </div>
                   </div>
              
            </div>
            

              <div class="app-card-header p-3 border-bottom-0">
                <div class="row align-items-center gx-3">
                  <div class="col-auto">
                    <div class="app-icon-holder">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                        <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z" />
                      </svg>
                    </div>
                    <!--//icon-holder-->

                  </div>
                  <!--//col-->
                  <div class="col-auto">
                    <h4 class="app-card-title">Religious details</h4>
                  </div>
                  <!--//col-->
                </div>
                <!--//row-->
              </div>
              <!--//app-card-header-->
              <div class="app-card-body px-4 w-100 ">
                <div class="mb-3">
                  <label for="inputName" class="form-label">Religion<font color="red">*</font></label>
                  <select id="religion" class="form-control custom-select" name="religion" required  style="padding-bottom: 5px;">
                    <option value="">--Select--</option>
                    <?php foreach ($religion as $value) { ?>
                      <option value="<?php echo $value->rid ?>" <?= (isset($ProfileDetails['religion']) && !empty($ProfileDetails['religion'])) ? ($ProfileDetails['religion'] == $value->rid ? 'selected' : '') : '' ?>><?php echo $value->religion; ?></option>
                    <?php } ?>
                  </select>
                </div>
              
              
                
                
                
                  <div class="mb-3" class="form-label">
                  <label for="inputName">Caste<font color="red">*</font></label>
                  <select id="belief" class="form-control custom-select" name="belief" required style="padding-bottom: 5px;">
                    <option value="">--Select--</option>

                  </select>
                </div>
                
                
                  <div class="mb-3">
                  <label for="inputName" class="form-label">Zodiac<font color="blue">*</font></label>
                  <select id="zodiac" class="form-control custom-select" name="zodiac"   style="padding-bottom: 5px;">
                    <option value="">--Select--</option>
                    <?php foreach ($zodiac as $value) { ?>
                      <option value="<?php echo $value->zodiac ?>" <?= (isset($ProfileDetails['zodiac']) && !empty($ProfileDetails['zodiac'])) ? ($ProfileDetails['zodiac'] == $value->zodiac ? 'selected' : '') : '' ?>><?php echo $value->zodiac; ?></option>
                    <?php } ?>
                  </select>
                </div>
                
                
              </div>
              <!---//app-card-body-->
              <div class="app-card-header p-3 border-bottom-0">
                <div class="row align-items-center gx-3">
                  <div class="col-auto">
                    <div class="app-icon-holder">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-mortarboard" viewBox="0 0 16 16">
                        <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5ZM8 8.46 1.758 5.965 8 3.052l6.242 2.913L8 8.46Z" />
                        <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Zm-.068 1.873.22-.748 3.496 1.311a.5.5 0 0 0 .352 0l3.496-1.311.22.748L8 12.46l-3.892-1.556Z" />
                      </svg>
                    </div>
                    <!--//icon-holder-->

                  </div>
                  <!--//col-->
                  <div class="col-auto">
                    <h4 class="app-card-title">Education and Professional Details </h4>
                  </div>
                  <!--//col-->
                </div>
                <!--//row-->
              </div>
              <!--//app-card-header-->
              <div class="app-card-body px-4 w-100">
                <div class="mb-3">
                  <label for="inputName" class="form-label">Highest Education<font color="red">*</font></label>
                  <select id="highest_education" class="form-control custom-select" name="highest_education" required style="padding-bottom: 5px;">
                    <option value="">--Select--</option>
                    <?php foreach ($highest_education as $value) { ?>
                      <option value="<?php echo $value->id ?>" <?= (isset($ProfileDetails['highest_education']) && !empty($ProfileDetails['highest_education'])) ? ($ProfileDetails['highest_education'] == $value->id ? 'selected' : '') : '' ?>><?php echo $value->high_education; ?></option>
                    <?php } ?>
                  </select>
                </div>
                
                
                <div class="mb-3" class="form-label">
                  <label for="inputName">Education<font color="red">*</font></label>
                  <select id="education" class="form-control custom-select" name="education" required style="padding-bottom: 5px;">
                    <option value="">--Select--</option>

                  </select>
                </div>
                
                
              
                <div class="mb-3" class="form-label" id="madrasaEducation"  style="display: none;">
                <label for="inputName">Madrassa Education<font color="blue">*</font></label>
                <select id="madrassa_education" class="form-control custom-select" name="madrassa_education"  style="padding-bottom: 5px;">
                <option value="">--Select--</option>
                <?php foreach ($madrassa_education as $value) { ?>
                <option value="<?php echo $value->id ?>" <?= (isset($ProfileDetails['madrassa_education']) && !empty($ProfileDetails['madrassa_education'])) ? ($ProfileDetails['madrassa_education'] == $value->id ? 'selected' : '') : '' ?>><?php echo $value->madr_education; ?></option>
                <?php } ?>
                </select>
                </div>
             
                
                
                <div class="mb-3">
                  <label for="inputName" class="form-label">Profession Type<font color="red">*</font></label>
                  <select id="profession_type" class="form-control custom-select" name="profession_type" required style="padding-bottom: 5px;">
                    <option value="">--Select--</option>
                    <?php foreach ($professiontype as $value) { ?>
                      <option value="<?php echo $value->professiontype ?>" <?= (isset($ProfileDetails['job_category']) && !empty($ProfileDetails['job_category'])) ? ($ProfileDetails['job_category'] == $value->professiontype ? 'selected' : '') : '' ?>><?php echo $value->professiontype; ?></option>
                    <?php } ?>
                  </select>
                </div>
                
                <div class="mb-3">
                  <label for="inputName" class="form-label">Profession<font color="red">*</font></label>
                  <select id="profession" class="form-control custom-select" name="profession" required style="padding-bottom: 5px;">
                    <option value="">--Select--</option>
                    <?php foreach ($profession as $value) { ?>
                      <option value="<?php echo $value->profession_id ?>" <?= (isset($ProfileDetails['profession']) && !empty($ProfileDetails['profession'])) ? ($ProfileDetails['profession'] == $value->profession_id ? 'selected' : '') : '' ?>><?php echo $value->profession_name; ?></option>
                    <?php } ?>
                  </select>
                </div>
                
                <div class="mb-3">
                <label for="inputName" class="form-label">Job Details<font color="red">*</font></label>
                <textarea  id="job_details" class="form-control" style="height: 50px;" name="job_details" ><?= !empty($ProfileDetails['job_details']) && $ProfileDetails['job_details'] != 'NULL'? $ProfileDetails['job_details'] : '' ?></textarea>
                </div>
                
                <div class="mb-3" class="form-label">
                <label for="inputName" class="form-label">Annual Income</label>
                <select id="annual_income" class="form-control custom-select" name="annual_income" style="padding-bottom: 5px;">
                <option value="">--Select--</option>
                <?php foreach ($income as $value) { ?>
                  <option value="<?php echo $value->income ?>" <?= (isset($ProfileDetails['annual_income']) && !empty($ProfileDetails['annual_income'])) ? ($ProfileDetails['annual_income'] == $value->income ? 'selected' : '') : '' ?> ><?php echo $value->income; ?></option>  
                <?php } ?>  
                </select> 
                </div>
                
                
              </div>
                            <!---//Financial status-->
              <div class="app-card-header p-3 border-bottom-0">
                <div class="row align-items-center gx-3">
                  <div class="col-auto">
                    <div class="app-icon-holder">
                          <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M720.08 329q-30.08 0-51.58-21.42-21.5-21.421-21.5-51.5 0-30.08 21.42-51.58 21.421-21.5 51.5-21.5 30.08 0 51.58 21.42 21.5 21.421 21.5 51.5 0 30.08-21.42 51.58-21.421 21.5-51.5 21.5ZM660 976V640q0-30-15-54t-44-35l41-120q8-25 29.5-40t48.5-15q27 0 48.5 15t29.5 40l102 295H790v250H660ZM495 556q-25 0-42.5-17.5T435 496q0-25 17.5-42.5T495 436q25 0 42.5 17.5T555 496q0 25-17.5 42.5T495 556ZM220.08 329q-30.08 0-51.58-21.42-21.5-21.421-21.5-51.5 0-30.08 21.42-51.58 21.421-21.5 51.5-21.5 30.08 0 51.58 21.42 21.5 21.421 21.5 51.5 0 30.08-21.42 51.58-21.421 21.5-51.5 21.5ZM150 976V686H80V436q0-24.75 17.625-42.375T140 376h160q24.75 0 42.375 17.625T360 436v250h-70v290H150Zm290 0V806h-50V640q0-18.333 12.833-31.167Q415.667 596 434 596h122q18.333 0 31.167 12.833Q600 621.667 600 640v166h-50v170H440Z"/></svg>

                    </div>
                    <!--//icon-holder-->

                  </div>
                  <!--//col-->
                  <div class="col-auto">
                    <h4 class="app-card-title">Family Details</h4>
                  </div>
                  <!--//col-->
                </div>
                <!--//row-->
              </div>
              <!--//app-card-header-->
              <div class="app-card-body px-4 w-100">
                
                        <div class="row">
                  <div class="col-sm-6">
                    <div class="mb-3">
                      <label for="inputName" class="form-label">Family Type<font color="red">*</font></label>
              
                      <select id="familytype" class="form-control custom-select" name="familytype" required style="padding-bottom: 5px;">
                        <option value="">--Select--</option>
                        <?php foreach ($familytype as $value) { ?>
                        <option value="<?php echo $value->familytype ?>" <?= (isset($ProfileDetails['familytype']) && !empty($ProfileDetails['familytype'])) ? ($ProfileDetails['familytype'] == $value->familytype ? 'selected' : '') : '' ?>><?php echo $value->familytype; ?></option>  
                        <?php } ?>
                      </select> 
                    </div>

                  </div>
                  <div class="col-sm-6">
                    <div class="mb-3">
                    
                      <label for="inputName" class="form-label">Financial Status<font color="red">*</font></label>
                    
                        <select id="financialstatus" class="form-control custom-select" name="financialstatus" required style="padding-bottom: 5px;">
                                <option value="">Select</option>
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
                      <label for="inputName" class="form-label">Home Type<font color="red">*</font></label>
                      
                      <select id="hometype" class="form-control custom-select" name="hometype" required style="padding-bottom: 5px;">
                        <option value="">Select</option>
                              <?php foreach ($hometype as $value)
                              { ?>
                              <option value="<?php echo $value->hometype ?>" <?= (isset($ProfileDetails['hometype']) && !empty($ProfileDetails['hometype'])) ? ($ProfileDetails['hometype'] == $value->hometype ? 'selected' : '') : '' ?>><?php echo $value->hometype; ?></option>  
                              <?php } ?>
                          </select>
                    </div>
                  </div>
                  <div class="col-sm-6">
                  <div class="mb-3">
                    
                
                    <label for="inputName" class="form-label">Number of Family Members<font color="red">*</font></label>
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
                        <select id="fatherdetails" class="form-control" name="fatherdetails" style="padding-bottom: 5px;">
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
                      <select id="motherdetails" class="form-control custom-select" name="motherdetails" style="padding-bottom: 5px;">
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
              
              

            
              <!---//app-card-body-->
              <div class="">
                <img  src="<?php echo base_url(); ?>assets/images/Signup.svg" alt="hi" style="height:604px;margin-bottom: 34px;" draggable="false" style="user-select: none;" onmousedown="return false">
                <a style="font-size: 7px;text-align:center;padding-left:257px;" href="https://storyset.com/user">User illustrations by Storyset</a>
              </div>

            </div>

            <!--//app-card-->
        </div>
        <!--//col-->
        <div class="col-12 col-lg-6">
          <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
            
            <!---//app-card-body-->


            <div class="app-card-header p-3 border-bottom-0">
              <div class="row align-items-center gx-3">
                <div class="col-auto">
                  <div class="app-icon-holder">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                      <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                      <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                    </svg>
                  </div>
                  <!--//icon-holder-->

                </div>
                <!--//col-->
                <div class="col-auto">
                  <h4 class="app-card-title">Location and Contact Details</h4>
                </div>
                <!--//col-->
              </div>
              <!--//row-->
            </div>
            <!--//app-card-header-->
            <div class="app-card-body px-4 w-100">
              <div class="mb-3">
                <label for="inputName" class="form-label">Home Country<font color="red">*</font></label>
                <select id="country" class="form-control custom-select" name="country" style="padding-bottom: 5px;" required>
                  <option value="">--Select--</option>
                  <?php foreach ($country as $value) { ?>
                    <option value="<?php echo $value->id; ?>" <?= (isset($ProfileDetails['home_country']) && !empty($ProfileDetails['home_country'])) ? ($ProfileDetails['home_country'] == $id ? 'selected' : '') : '' ?>><?php echo $value->name; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="mb-3">
                <label for="inputName" class="form-label">Home State<font color="red">*</font></label>
                <select id="states" class="form-control custom-select" name="states" required style="padding-bottom: 5px;">
                  <option value="">--Select--</option>

                </select>
              </div>

              <div class="mb-3">
                <label for="inputName" class="form-label">Home District<font color="red">*</font></label>
                <select id="districts" class="form-control custom-select" name="districts" required style="padding-bottom: 5px;">
                  <option value="">--Select--</option>

                </select>
              </div>
              <div class="mb-3">
                <label for="inputName" class="form-label">Home City<font color="red">*</font></label>
               <!--  <select id="city" class="form-control custom-select" name="city" required style="padding-bottom: 5px;">
                  <option value="">--Select--</option>

                </select> -->
              
                <input type="text" id="native_place" class="form-control" 
                name="native_place"   value="<?= !empty($ProfileDetails['native_place']) ? $ProfileDetails['native_place'] : '' ?>" required>


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

              <div class="mb-3">
                <label for="inputName" class="form-label">Present Country<font color="red">*</font></label>
                <select id="present_country" class="form-control custom-select" name="present_country"  required style="padding-bottom: 5px;">
                  <option value="">--Select--</option>
                  <?php foreach ($country as $value) { ?>
                    <option value="<?php echo $value->id; ?>" <?= (isset($ProfileDetails['name']) && !empty($ProfileDetails['name'])) ? ($ProfileDetails['name'] == $id ? 'selected' : '') : '' ?>><?php echo $value->name; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="mb-3">
                <label for="inputName" class="form-label">Present State<font color="red">*</font></label>
                <select id="present_states" class="form-control custom-select" name="present_states" required style="padding-bottom: 5px;">
                  <option value="">--Select--</option>

                </select>
              </div>

              <div class="mb-3">
                <label for="inputName" class="form-label">Present District<font color="red">*</font></label>
                <select id="present_district" class="form-control custom-select" name="present_district" required style="padding-bottom: 5px;">
                  <option value="">--Select--</option>

                </select>
              </div>
              
              <!--<div class="mb-3">-->
              <!--  <label for="inputName" class="form-label">Present City<font color="blue">*</font></label>-->
              <!--  <select id="present_city" class="form-control custom-select" name="present_city" style="padding-bottom: 5px;">-->
              <!--    <option value="">--Select--</option>-->

              <!--  </select>-->
              <!--</div>-->
              

              <div class="mb-3">
                <label for="inputName" class="form-label">Secondary Number<font color="blue">*</font></label>
                <div class="row">
                  <div class="col-md-5">
                    <select id="secondary_code" class="form-control custom-select" name="secondary_code" style="padding-bottom: 5px;">
                      <option value="">--Select--</option>
                       <?php 
                    foreach ($countryCode as $value) { 
                   if (isset($ProfileDetails['secondary_code']) && ($ProfileDetails['secondary_code'])==$value->id) {  ?>
                    <option selected="selected" value="<?php echo $value->id; ?>" name="<?php echo $value->country; ?>"><?php echo $value->country;?></option>
                  <?php } else{ ?>
                    <option value="<?php echo $value->id;?>" name="<?php echo $value->country; ?>"><?php echo $value->country;?></option> 
                    <?php  }
                          } ?>
                     <!--  <?php foreach ($country as $value) { ?>
                        <option value="<?php echo $value->id; ?>" <?= (isset($ProfileDetails['secondary_code']) && !empty($ProfileDetails['secondary_code'])) ? ($ProfileDetails['secondary_code'] == $value->id ? 'selected' : '') : '' ?>><?php echo $value->name . "(+" . $value->country_code . ")"; ?></option>
                      <?php } ?> -->
                    </select>
                  </div>
                  <div class="col-md-7">
                    <input type="text" id="secondary_number" class="form-control" name="secondary_number" minlength="5" maxlength="10" title="No alphabets and No special characters" value="<?= !empty($ProfileDetails['secondary_number']) && $ProfileDetails['secondary_number'] != 'NULL' ? $ProfileDetails['secondary_number'] : '' ?>">
                  </div>
                </div>
              </div>
              <div class="mb-3">
                <label for="inputName" class="form-label">Email<font color="blue">*</font></label>
                <input type="email" id="email" class="keyup-email form-control" placeholder="example:happynikah@gmail.com" name="email" value="<?= !empty($ProfileDetails['email']) && $ProfileDetails['email'] != 'NULL' ? $ProfileDetails['email'] : '' ?>">
              </div>
              <div class="mb-3">
                <label for="inputName" class="form-label">Address<font color="blue">*</font></label>
                <textarea id="address" class="form-control" name="address"  value="<?= !empty($ProfileDetails['address']) && $ProfileDetails['address'] != 'NULL' ? $ProfileDetails['address'] : '' ?>" style="height: 150px;"></textarea>
              </div>

            </div>
            
            
            
              <div class="app-card-header p-3 border-bottom-0">
                    <div class="row align-items-center gx-3">
                    <div class="col-auto">
                    <div class="app-icon-holder">
                    <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M480 976q-82 0-155-31.5t-127.5-86Q143 804 111.5 731T80 576q0-85 32-158t87.5-127q55.5-54 130-84.5T489 176q79 0 150 26.5T763.5 276q53.5 47 85 111.5T880 529q0 108-63 170.5T650 762h-75q-18 0-31 14t-13 31q0 27 14.5 46t14.5 44q0 38-21 58.5T480 976Zm0-400Zm-233 26q20 0 35-15t15-35q0-20-15-35t-35-15q-20 0-35 15t-15 35q0 20 15 35t35 15Zm126-170q20 0 35-15t15-35q0-20-15-35t-35-15q-20 0-35 15t-15 35q0 20 15 35t35 15Zm214 0q20 0 35-15t15-35q0-20-15-35t-35-15q-20 0-35 15t-15 35q0 20 15 35t35 15Zm131 170q20 0 35-15t15-35q0-20-15-35t-35-15q-20 0-35 15t-15 35q0 20 15 35t35 15ZM480 916q11 0 15.5-4.5T500 897q0-14-14.5-26T471 818q0-46 30-81t76-35h73q76 0 123-44.5T820 529q0-132-100-212.5T489 236q-146 0-247.5 98.5T140 576q0 141 99.5 240.5T480 916Z"/></svg>
                    </div><!--//icon-holder-->
                    
                    </div><!--//col-->
                    <div class="col-auto">
                    <h4 class="app-card-title">Hobbies and Interests</h4>
                    </div><!--//col-->
                    </div><!--//row-->
                    </div><!--//app-card-header-->
                    <div class="app-card-body px-4 w-100">
                    
                    <div class="mb-3">
                    <label for="inputName" class="form-label">Hobbies and Interests </label>
                    <textarea  id="hobbies" class="form-control" style="height: 100px;" name="hobbies"><?= !empty($ProfileDetails['hobbies']) && $ProfileDetails['hobbies'] != 'NULL'? $ProfileDetails['hobbies'] : '' ?></textarea>
                    
                    
                    </div>      
                    </div><!---//app-card-body-->
                    
                    

            <!-- partner preference content below -->
            <div class="app-card-header p-3 pt-5 border-bottom-0">
              <div class="row align-items-center gx-3">
                <div class="col-auto">
                  <div class="app-icon-holder">
                  <svg xmlns="http://www.w3.org/2000/svg" height="40" viewBox="0 96 960 960" fill="currentColor" class="bi bi-card-text" width="40"><path d="m540 653.333-28.333-63.666L448 561.333 511.667 533 540 469.334 568.333 533 632 561.333l-63.667 28.334L540 653.333ZM420 440l-41.333-90.667L288 308l90.667-41.333L420 176l41.333 90.667L552 308l-90.667 41.333L420 440ZM40 896V736q0-30.667 21.5-52t51.833-21.333H251q18 0 34.333 9 16.334 9 27.334 24.666 29 41 73.166 63.667Q430 782.667 480 782.667q50.333 0 94.5-22.667t73.5-63.667q11.667-15.666 27.5-24.666t33.5-9h137.667q30.666 0 52 21.333Q920 705.333 920 736v160H653.334V786.333Q617.667 816.666 573.167 833q-44.5 16.333-93.167 16.333-48.333 0-92.667-16.5-44.333-16.5-80.667-46.834V896H40Zm120-293.334q-46.667 0-80-33.333t-33.333-80q0-47.666 33.333-80.5Q113.333 376 160 376q47.667 0 80.5 32.833 32.833 32.834 32.833 80.5 0 46.667-32.833 80T160 602.666Zm640 0q-46.667 0-80-33.333t-33.333-80q0-47.666 33.333-80.5Q753.333 376 800 376q47.667 0 80.5 32.833 32.833 32.834 32.833 80.5 0 46.667-32.833 80T800 602.666Z"/></svg>
                  </div>
                  <!--//icon-holder-->

                </div>
                <!--//col-->
                <div class="col-auto">
                  <h4 class="app-card-title">Partner Preference </h4>
                </div>
                <!--//col-->
              </div>
              <!--//row-->
            </div>
             <!--//app-card-header-->
           <div class="app-card-body px-4 w-100">
             <div class="card-body">
 
      <div class="row">
       <div class="col-sm-6">
         <!-- text input -->
         <div class="mb-3">
           <label>Age From<font color="red">*</font></label>
        <select id="inputStatus" class="form-control custom-select partner_age_from" required name="partner_age_from" style="padding-bottom: 5px;">
         <option value="">Select</option>
         <?php for ($i=18; $i <=80 ; $i++) {  ?>
           <option value="<?php echo $i; ?>" <?= (isset($ProfileDetails['partner_age_from']) && !empty($ProfileDetails['partner_age_from'])) ? ($ProfileDetails['partner_age_from'] == $i ? 'selected' : '') : '' ?>><?php echo $i; ?></option>
              <?php } ?>
           </select>
         </div>
       </div>
       <div class="col-sm-6">
         <div class="mb-3">
           <label>Age To<font color="red">*</font></label>
            <select id="inputStatus" class="form-control custom-select partner_age_to doubleinput" required name="partner_age_to" style="padding-bottom: 5px;">
             <option value="">Select</option>
               <?php for ($i=18; $i <=80 ; $i++) {  ?>
                <option value="<?php echo $i; ?>" <?= (isset($ProfileDetails['partner_age_to']) && !empty($ProfileDetails['partner_age_to'])) ? ($ProfileDetails['partner_age_to'] == $i ? 'selected' : '') : '' ?>><?php echo $i; ?></option>
                   <?php } ?>
                   </select>
                 </div>
              </div>
            </div>

       <div class="row">
          <div class="col-sm-6">
         <!-- text input -->
         <div class="mb-3">
           <label>Height From<font color="blue">*</font></label>
            <select id="inputStatus" class="form-control custom-select partner_height" name="partner_height_from" style="padding-bottom: 5px;">
              <option value="">Select</option>
                <?php foreach ($Height as $value) { ?>
                 <option value="<?php echo $value->height_id ?>" <?= (isset($ProfileDetails['partner_height']) && !empty($ProfileDetails['partner_height'])) ? ($ProfileDetails['partner_height'] == $value->height ? 'selected' : '') : '' ?>><?php echo $value->height; ?></option>  
                     <?php } ?>
     
                    </select>
                 </div>
              </div>
       <div class="col-sm-6">
         <div class="mb-3">
           <label>Height To<font color="blue">*</font></label>
             <select id="inputStatus" class="form-control custom-select partner_height_to" name="partner_height_to" style="padding-bottom: 5px;">
              <option value="">Select</option>
                <?php foreach ($Height as $value) { ?>
                  <option value="<?php echo $value->height_id ?>" <?= (isset($ProfileDetails['partner_height_to']) && !empty($ProfileDetails['partner_height_to'])) ? ($ProfileDetails['partner_height_to'] == $value->height ? 'selected' : '') : '' ?>><?php echo $value->height; ?></option>  
                        <?php } ?>
     
                      </select>
               </div>
             </div>
           </div>   
           
           
           
            <!--<div class="mb-3">-->
                    
                 <!--<label for="inputName" class="form-label">Physical Status</label>-->
                 
                   
               <!--<select id="partner_physical_statusnew"  class="form-control custom-select" name="partner_physical_statusnew[]" multiple="multiple" style="padding-bottom: 21px;">        -->
               <!-- <option value="">--Select--</option>-->
               
              <?php foreach ($physicalstatus as $value) 
            { ?>
               <!-- ?>-->
               <!-- <option value="<?php echo $value->id; ?>" <?= (isset($OtherDetails['partner_physicalstatus']) && !empty($OtherDetails['partner_physicalstatus'])) ? (in_array($value->id,$datas) ? 'selected' : '') : '' ?>>-->
               <!-- <?php echo $value->physicalstatus; ?>-->
               <!-- </option>-->
                <?php } ?>
                
               <!-- </select>   -->
                
                <!--</div> -->
                
           
           <div class="mb-3">
                <label for="inputName" class="form-label">Marital Status</label>
                
                
                     <select id="partner_marital_status"  class="form-control custom-select" name="partner_marital_status[]" multiple="multiple" style="padding-bottom: 21px;">        
                <option value="">--Select--</option>
              
                <?php foreach ($maritalstatus as $value) { ?>
                <option value="<?php echo $value->id; ?>" <?= (isset($OtherDetails['partner_maritalstatus']) && !empty($OtherDetails['partner_maritalstatus'])) ? (in_array($value->id,$datas) ? 'selected' : '') : '' ?>>
                    <?php echo $value->maritalstatus; ?>
                    </option>
                <?php } ?>
                
                
                </select>   
                
                </div>   
                
           
              <div class="mb-3">
                <label for="inputName" class="form-label">Mother Tounge</label>
             
                
                <select id="partner_mother_tongue"  class="form-control custom-select" name="partner_mother_tongue[]" multiple="multiple" style="padding-bottom: 21px;">        
                <option value="">--Select--</option>
               
                <?php foreach ($mothertongue as $value) { ?>
                <option value="<?php echo $value->mothertongue_id; ?>" <?= (isset($ProfileDetails['partner_mother_tongue']) && !empty($ProfileDetails['partner_mother_tongue'])) ? (in_array($value->mothertongue_id,$datas) ? 'selected' : '') : '' ?>>
                    <?php echo $value->mothertongue; ?>
                    </option>
                <?php } ?>
                
                
                </select>  
                
                 </div>
           
             
              <div class="mb-3">
                <label for="inputName" class="form-label">Language Spoken</label>
             
                  
                <select id="partner_language_spoken"  class="form-control custom-select" name="partner_language_spoken[]" multiple="multiple">        
                <option value="">--Select--</option>
              
                <?php foreach ($mothertongue as $value) { ?>
                <option value="<?php echo $value->mothertongue_id; ?>" <?= (isset($ProfileDetails['partner_languagespoken']) && !empty($ProfileDetails['partner_languagespoken'])) ? (in_array($value->mothertongue_id,$datas) ? 'selected' : '') : '' ?>>
                    <?php echo $value->mothertongue; ?>
                    </option>
                <?php } ?>
                </select>  
                
                                       
                  </div>
                   
                <div class="mb-3">
                <label for="inputName" class="form-label">Skin Color</label>
                                 
                 <select id="partner_skin_color"  class="form-control custom-select" name="partner_skin_color[]" multiple="multiple">        
                <option value="">--Select--</option>
               
                <?php foreach ($skin_color as $value) { ?>
                <option value="<?php echo $value->id; ?>" <?= (isset($ProfileDetails['partner_skincolor']) && !empty($ProfileDetails['partner_skincolor'])) ? (in_array($value->id,$datas) ? 'selected' : '') : '' ?>>
                    <?php echo $value->skincolor; ?>
                    </option>
                <?php } ?>
                
                
                </select>  
                </div>
             
      
        <div class="mb-3" style="margin-bottom: 30px !important;">
                <label for="inputName" class="form-label">Appearance</label>
              
                <select id="partner_appearance"  class="form-control custom-select" name="partner_appearance[]" multiple="multiple">        
                <option value="">--Select--</option>
               
                <?php foreach ($appearance as $value) { ?>

                
             <option value="<?php echo $value->id ?>" <?= (isset($ProfileDetails['partner_appearance']) && !empty($ProfileDetails['partner_appearance'])) ? ($ProfileDetails['partner_appearance'] == $value->id ? 'selected' : '') : '' ?>><?php echo $value->appearance; ?></option>

                
                <?php } ?>
                </select>  
                  </div>
           
        <div class="row">
          <div class="col-sm-6">
            <div class="mb-3">
              <label for="inputClientCompany">Education<font color="blue">*</font> </label>
                <select id="partner_education" class="form-control custom-select" name="partner_education[]" multiple="multiple">
                  <option value="">--Select--</option>
                  <?php foreach ($highest_education as $value) { ?>
                              <option value="<?php echo $value->id ?>" <?= (isset($ProfileDetails['partner_education']) && !empty($ProfileDetails['partner_education'])) ? ($ProfileDetails['partner_education'] == $value->high_education ? 'selected' : '') : '' ?>><?php echo $value->high_education; ?></option>
                            <?php } ?>
             
                </select>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="mb-3">
                   <label for="setting-input-8" class="form-label">Physically Challenged <font color="blue">*</font></label>
                      <select id="partner_physically_challenged" class="form-control custom-select" name="partner_physically_challenged" style="padding-bottom: 5px;">
                         <option value="">--Select--</option>
                          <option value="Normal" <?= (isset($ProfileDetails['partner_physicalstatus']) && !empty($ProfileDetails['partner_physicalstatus'])) ? (($ProfileDetails['partner_physicalstatus'] == 'Normal') ? 'selected' : '') : '' ?>>Normal</option>
                        
                <option value="Physically Challenged" <?= (isset($ProfileDetails['partner_physicalstatus']) && !empty($ProfileDetails['partner_physicalstatus'])) ? (($ProfileDetails['partner_physicalstatus'] == 'Physically Challenged') ? 'selected' : '') : '' ?>>Physically Challenged</option>

                        </select>
                      </div>
                  </div>
 
                      </div>
                   <div id="for_partner_physically_challenged" style="display:none">
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
      <label for="inputName">Financial Status<font color="blue">*</font> </label>
       
        
        
         <select id="partnerfinancialstatus" class="form-control custom-select" name="partnerfinancialstatus" style="padding-bottom: 5px;">
                                <option value="">Select</option>
                        <?php foreach ($financialstatus as $value) { ?>
                        <option value="<?php echo $value->financialstatus ?>" <?= (isset($ProfileDetails['partner_financial']) && !empty($ProfileDetails['partner_financial'])) ? ($ProfileDetails['partner_financial'] == $value->financialstatus ? 'selected' : '') : '' ?>><?php echo $value->financialstatus; ?></option>  
                        <?php } ?>
                        </select>        
                        
    </div>
  </div>
  
  
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
 
</div>
 
 <div class="row">
  <div class="col-sm-6">
    <div class="mb-3">
      <label for="inputName">Belief<font color="blue">*</font> </label>
        <select id="inputStatus" class="form-control custom-select" name="partner_caste" style="padding-bottom: 5px;">
          <option value="">--Select--</option>
          <?php foreach ($belief as $value) { ?>
                      <option value="<?php echo $value->cid ?>" <?= (isset($ProfileDetails['caste']) && !empty($ProfileDetails['caste'])) ? ($ProfileDetails['caste'] == $value->cid ? 'selected' : '') : '' ?>><?php echo $value->caste; ?></option>
                    <?php } ?>
        </select>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="mb-3">
      <label for="inputName">Profession <font color="blue">*</font> </label>
        <select id="partner_occupation" class="form-control custom-select" name="partner_occupation[]" multiple="multiple">
          <option value="">--Select--</option>
          <?php foreach ($profession as $value) { ?>
                      <option value="<?php echo $value->profession_id ?>" <?= (isset($ProfileDetails['partner_occupation']) && !empty($ProfileDetails['partner_occupation'])) ? ($ProfileDetails['partner_occupation'] == $value->profession_id ? 'selected' : '') : '' ?>><?php echo $value->profession_name; ?></option>
                    <?php } ?>
                   </select>
                  </div>
                 </div>
               </div>
             </div>

             <div class="row">
              <div class="col-sm-6">
                <div class="mb-3">
 
                <label for="inputName" class="form-label">Partner Country<font color="red">*</font></label>
                <select id="partner_country" class="form-control custom-select" name="partner_country" required>
                  <option value="">--Select--</option>
                  <?php foreach ($country as $value) { ?>
                    <option value="<?php echo $value->id; ?>" <?= (isset($ProfileDetails['partner_country']) && !empty($ProfileDetails['partner_country'])) ? ($ProfileDetails['partner_country'] == $id ? 'selected' : '') : '' ?>><?php echo $value->name; ?></option>
                  <?php } ?>
                </select>
              </div>
              </div>
              <div class="col-sm-6">
              <div class="mb-3">
                <label for="inputName" class="form-label">Partner State<font color="red">*</font></label>
                <select id="partner_state" class="form-control custom-select" name="partner_state" required>
                  <option value="">--Select--</option>

                </select>
              </div>
              </div>
              </div>
              <div class="row">
              <div class="col-sm-6">
              <div class="mb-3">
                <label for="inputName" class="form-label">Partner District<font color="red">*</font></label>
                <select id="partner_district" class="form-control custom-select" name="partner_district[]" multiple="multiple" required>
                  <option value="">--Select--</option>

                </select>
              </div>
             </div>
             
             
                <div class="col-sm-6">
              <div class="mb-3">
                <label for="inputName" class="form-label">Annual Income</label>
              
                <select id="partner_annualincome" class="form-control custom-select" name="partner_annualincome">
                  <option value="">--Select--</option>
                  <?php foreach ($income as $value) { ?>
                  <option value="<?php echo $value->income ?>" <?= (isset($OtherDetails['partner_annualincome']) && !empty($OtherDetails['partner_annualincome'])) ? ($OtherDetails['partner_annualincome'] == $value->income ? 'selected' : '') : '' ?> ><?php echo $value->income; ?></option>  

                    <?php } ?> 
                </select> 
                </div>
                </div>
                
              <!-- <div class="col-sm-6">
              <div class="mb-3">
                <label for="inputName" class="form-label">Home City<font color="blue">*</font></label>
                <select id="city_preference" class="form-control custom-select" name="city_preference">
                  <option value="">--Select--</option>

                </select>
                   </div>
                  </div> -->
            </div>
            
            
              <div class="row">
                   
                    
                    </div>
                    
                    
            <!---//app-card-body-->          
            <div class="app-card-header p-3 pt-5 border-bottom-0">
              <div class="row align-items-center gx-3">
                <div class="col-auto">
                  <div class="app-icon-holder">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-text" viewBox="0 0 16 16">
                      <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                      <path d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8zm0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z" />
                    </svg>
                  </div>
                  <!--//icon-holder-->

                </div>
                <!--//col-->
                <div class="col-auto">
                  <h4 class="app-card-title">Profile Description 
                  
                  </h4>

                </div>
                <!--//col-->
              </div>
              <!--//row-->
            </div>
            <!--//app-card-header-->
            <div class="app-card-body w-100">
              <div class="mb-3">
                <label for="inputName" class="form-label">Description<font color="blue">*</font></label>
                <textarea id="description" class="form-control"  name="description" value="<?= !empty($ProfileDetails['aboutme']) && $ProfileDetails['aboutme'] != 'NULL' ? $ProfileDetails['aboutme'] : '' ?>" style="height: 150px;"></textarea>
              </div>
            </div>
              <?php $emp_id=$this->session->userdata('user_id');
                    //print_r($emp_id);
                    $username=$this->session->userdata('username');
                    
                    $empid=$this->db->select('*')->from('tbl_employees1')->where('username',$username)->get()->result_array();
                    
                    foreach($empid as $value)
                    {
                      ?>
                      <?php
                        $employee_id=$value['emp_id'];?>
                  
         
           Employee Name<input type="text" name="username" value="<?php echo $username;?>" style="margin-left: 20px;margin-bottom: 15px;"><br/>
           Employee Id <input type="text" name="emp_id" value="<?php echo $employee_id;?>" style="margin-left: 45px;">
            <!---//app-card-body-->
                   <?php  }?>
                 
            <div class="app-card-footer p-4 mt-auto">
              <input type="submit" class="btn app-btn-primary" value="Save User Details" name="submit" id="submit"> 
            </div>
            <!--//app-card-footer-->

          </div>
          <!--//app-card-->
          </form>
        </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-success" id="exampleModalLabel" >Successfully Registered</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                <?php $this->db->select("*");
                $this->db->from("tbl_registration");
                $this->db->limit(1);
                $this->db->order_by('id',"DESC");
                $query = $this->db->get();
                $resultr = $query->result_array();?>
                
                <?php foreach($resultr as $value_register)
                {?>
            <h5>Happy Nikah ID : <?php echo $value_register['happynikah_id'];?></h5>
            <?php }?>
            
            <?php $this->db->select("*");
                $this->db->from("tbl_userlogin");
                $this->db->limit(1);
                $this->db->order_by('id',"DESC");
                $query2 = $this->db->get();
                $resultrdata = $query2->result_array();?>
                
                <?php foreach($resultrdata as $value_register2)
                {?>
            <h5>Password : <?php echo $value_register2['originalpass'];?></h5>
            <?php }?>
           </div>
           <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
        <!--//col-->
        <!--security and payment section -->
        <!-- <div class="col-12 col-lg-6">
          <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
            <div class="app-card-header p-3 border-bottom-0">
              <div class="row align-items-center gx-3">
                <div class="col-auto">
                  <div class="app-icon-holder">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-shield-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M5.443 1.991a60.17 60.17 0 0 0-2.725.802.454.454 0 0 0-.315.366C1.87 7.056 3.1 9.9 4.567 11.773c.736.94 1.533 1.636 2.197 2.093.333.228.626.394.857.5.116.053.21.089.282.11A.73.73 0 0 0 8 14.5c.007-.001.038-.005.097-.023.072-.022.166-.058.282-.111.23-.106.525-.272.857-.5a10.197 10.197 0 0 0 2.197-2.093C12.9 9.9 14.13 7.056 13.597 3.159a.454.454 0 0 0-.315-.366c-.626-.2-1.682-.526-2.725-.802C9.491 1.71 8.51 1.5 8 1.5c-.51 0-1.49.21-2.557.491zm-.256-.966C6.23.749 7.337.5 8 .5c.662 0 1.77.249 2.813.525a61.09 61.09 0 0 1 2.772.815c.528.168.926.623 1.003 1.184.573 4.197-.756 7.307-2.367 9.365a11.191 11.191 0 0 1-2.418 2.3 6.942 6.942 0 0 1-1.007.586c-.27.124-.558.225-.796.225s-.526-.101-.796-.225a6.908 6.908 0 0 1-1.007-.586 11.192 11.192 0 0 1-2.417-2.3C2.167 10.331.839 7.221 1.412 3.024A1.454 1.454 0 0 1 2.415 1.84a61.11 61.11 0 0 1 2.772-.815z" />
                      <path fill-rule="evenodd" d="M10.854 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                    </svg>
                  </div> -->
        <!--//icon-holder-->

        <!-- </div> -->
        <!--//col-->
        <!-- <div class="col-auto">
                  <h4 class="app-card-title">Security</h4>
                </div> -->
        <!--//col-->
        <!-- </div> -->
        <!--//row-->
        <!-- </div> -->
        <!--//app-card-header-->
        <!-- <div class="app-card-body px-4 w-100">

              <div class="item border-bottom py-3">
                <div class="row justify-content-between align-items-center">
                  <div class="col-auto">
                    <div class="item-label"><strong>Password</strong></div>
                    <div class="item-data">••••••••</div>
                  </div> -->
        <!--//col-->
        <!-- <div class="col text-end">
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
        <!-- <div class="col text-end">
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
        <!-- </div> -->
        <!--//col-->
        <!-- <div class="col-12 col-lg-6">
          <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
            <div class="app-card-header p-3 border-bottom-0">
              <div class="row align-items-center gx-3">
                <div class="col-auto">
                  <div class="app-icon-holder">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-shield-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M5.443 1.991a60.17 60.17 0 0 0-2.725.802.454.454 0 0 0-.315.366C1.87 7.056 3.1 9.9 4.567 11.773c.736.94 1.533 1.636 2.197 2.093.333.228.626.394.857.5.116.053.21.089.282.11A.73.73 0 0 0 8 14.5c.007-.001.038-.005.097-.023.072-.022.166-.058.282-.111.23-.106.525-.272.857-.5a10.197 10.197 0 0 0 2.197-2.093C12.9 9.9 14.13 7.056 13.597 3.159a.454.454 0 0 0-.315-.366c-.626-.2-1.682-.526-2.725-.802C9.491 1.71 8.51 1.5 8 1.5c-.51 0-1.49.21-2.557.491zm-.256-.966C6.23.749 7.337.5 8 .5c.662 0 1.77.249 2.813.525a61.09 61.09 0 0 1 2.772.815c.528.168.926.623 1.003 1.184.573 4.197-.756 7.307-2.367 9.365a11.191 11.191 0 0 1-2.418 2.3 6.942 6.942 0 0 1-1.007.586c-.27.124-.558.225-.796.225s-.526-.101-.796-.225a6.908 6.908 0 0 1-1.007-.586 11.192 11.192 0 0 1-2.417-2.3C2.167 10.331.839 7.221 1.412 3.024A1.454 1.454 0 0 1 2.415 1.84a61.11 61.11 0 0 1 2.772-.815z" />
                      <path fill-rule="evenodd" d="M10.854 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                    </svg>
                  </div> -->
        <!--//icon-holder-->

        <!-- </div> -->
        <!--//col-->
        <!-- <div class="col-auto">
                  <h4 class="app-card-title">Security</h4>
                </div> -->
        <!--//col-->
        <!-- </div> -->
        <!--//row-->
        <!-- </div> -->
        <!--//app-card-header-->
        <!-- <div class="app-card-body px-4 w-100">

              <div class="item border-bottom py-3">
                <div class="row justify-content-between align-items-center">
                  <div class="col-auto">
                    <div class="item-label"><strong>Password</strong></div>
                    <div class="item-data">••••••••</div>
                  </div> -->
        <!--//col-->
        <!-- <div class="col text-end">
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
        <!-- <div class="col text-end">
                    <a class="btn-sm app-btn-secondary" href="#">Set up</a>
                  </div> -->
        <!--//col-->
        <!-- </div> -->
        <!--//row-->
        <!-- </div> -->
        <!--//item-->
        <!-- </div> -->
        <!--//app-card-body-->

        <!-- <div class="app-card-footer p-4 mt-auto">
              <a class="btn app-btn-secondary" href="#">Manage Security</a> -->
        <!-- </div> -->
        <!--//app-card-footer-->

        <!-- </div> -->
        <!--//app-card-->
        <!-- </div> -->
        <!-- <div class="col-12 col-lg-6">
          <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
            <div class="app-card-header p-3 border-bottom-0">
              <div class="row align-items-center gx-3">
                <div class="col-auto">
                  <div class="app-icon-holder">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-credit-card" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7z" />
                      <path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1z" />
                    </svg>
                  </div> -->
        <!--//icon-holder-->

        <!-- </div> -->
        <!--//col-->
        <!-- <div class="col-auto">
                  <h4 class="app-card-title">Payment methods</h4>
                </div> -->
        <!--//col-->
        <!-- </div> -->
        <!--//row-->
        <!-- </div> -->
        <!--//app-card-header-->
        <!-- <div class="app-card-body px-4 w-100">

              <div class="item border-bottom py-3">
                <div class="row justify-content-between align-items-center">
                  <div class="col-auto">
                    <div class="item-label"><i class="fab fa-cc-visa me-2"></i><strong>Credit/Debit Card </strong></div>
                    <div class="item-data">1234*******5678</div>
                  </div> -->
        <!--//col-->
        <!-- <div class="col text-end">
                    <a class="btn-sm app-btn-secondary" href="#">Edit</a>
                  </div> -->
        <!--//col-->
        <!-- </div> -->
        <!--//row-->
        <!-- </div> -->
        <!--//item-->
        <!-- <div class="item border-bottom py-3">
                <div class="row justify-content-between align-items-center">
                  <div class="col-auto">
                    <div class="item-label"><i class="fab fa-paypal me-2"></i><strong>PayPal</strong></div>
                    <div class="item-data">Not connected</div>
                  </div> -->
        <!--//col-->
        <!-- <div class="col text-end">
                    <a class="btn-sm app-btn-secondary" href="#">Connect</a>
                  </div> -->
        <!--//col-->
        <!-- </div> -->
        <!--//row-->
        <!-- </div> -->
        <!--//item-->
        <!-- </div> -->
        <!--//app-card-body-->
        <!-- <div class="app-card-footer p-4 mt-auto">
              <a class="btn app-btn-secondary" href="#">Manage Payment</a>
            </div> -->
        <!--//app-card-footer-->

      </div>
      <!--//app-card-->
    </div>
  </div>
  <!--//row-->

</div>
<!--//container-fluid-->
</div>
<!--//app-content-->

<?php include('footer.php'); ?>

        <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script> 
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />-
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
        
        
        <script src="<?php echo base_url() ?>assets/dist/js/croppie.min.js"></script>
        <script src="<?php echo base_url() ?>assets/dist/js/jquery.bpopup.min.js"></script>
        
        

        <script type="text/javascript">   
        setTimeout(function() {
        $('.alert-danger').hide('fast');
        }, 1000);
        
        setTimeout(function() {
        $('.alert-success').hide('fast');
        }, 1000); 
        
        $(document).ready(function() {
        
        
        //  $('#partner_physical_status').selectpicker();
        // $('#partner_marital_status').selectpicker();
        // $('#partner_mother_tongue').selectpicker();
        // $('#partner_language_spoken').selectpicker();
        // $('#partner_skin_color').selectpicker();
        //   $('#partner_appearance').selectpicker();
        
        
        $("#name").keypress(function() {
        var name = $(this).val(); 
        console.log(name);
        var placeholdername= "Iam "+name+", looking for a suitable partner from a good family background, well educated and well settled in his profession.";
        $("#description").attr('placeholder',placeholdername);
        });        
        });
        </script>
        <script type="text/javascript">
        $(document).ready(function() {
        $('#partner_education').select2({
        placeholder: "Select an Education",
        allowClear: true
        
        });
        
        $('#partner_appearance').select2({
        placeholder: "Select an Apperance",
        allowClear: true
        
        });
        
        
        $('#partner_skin_color').select2({
        placeholder: "Select Skin Color",
        allowClear: true
        
        });
        
        $('#partner_language_spoken').select2({
        placeholder: "Select Language",
        allowClear: true
        
        });
        
        $('#partner_mother_tongue').select2({
        placeholder: "Select Mothertongue",
        allowClear: true
        
        });
        
        $('#partner_marital_status').select2({
        placeholder: "Select Marital Status",
        allowClear: true
        
        });
        
        $('#partner_physical_statusnew').select2({
        placeholder: "Select Physical Status",
        allowClear: true
        
        });
        
        
        
        $('#partner_occupation').select2({
        placeholder: "Select a Profession",
        allowClear: true
        
        });
        $('#partner_district').select2({
        placeholder: "Select a District",
        allowClear: true
        
        });
        
        //$('#district_preference').multiselect();
        photo_protection_onload();
        
        // $("#dob").datepicker({dateFormat:'dd-mm-yy',minDate: '01-01-1980',
        //   maxDate: '31-12-2000', changeMonth: true,
        //   changeYear: true });
        
        $("#dob").datepicker({   
        dateFormat: 'yy-mm-dd',
        minDate: '1960-01-01',
        maxDate: '2005-12-31',
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
        
        
        
        $(".partner_age_from").change(function() {
        var partner_age_from = $('.partner_age_from').val();
        console.log(partner_age_from);
        if (partner_age_from != '') {
        $(".partner_age_to").empty();
        $(".partner_age_to").append('<option value="">-Select-</option>');
        for (var i = (partner_age_from); i <= 80; i++) {
        $(".partner_age_to").append('<option value="' + i + '">' + i + '</option>');
        }
        }
        });
        
        $(".partner_height").change(function() {
        var partner_height = $('.partner_height').val();
        if (partner_height != '') {
        
        $.ajax({
        url: "<?= base_url() ?>admin/GetHeight",
        data: {
        Height: partner_height
        },
        type: "POST",
        success: function(data) {
        $(".partner_height_to").html(data);
        $('.partner_height_to').change();
        }
        });
        }
        });
        
        });
        
        $('input[name=photo_visibility]').on('change', function() {
        var protect = $(this).val();
        if (protect == 1) {
        $('#password-protection').show();
        }
        if (protect == 0) {
        $('#password-protection').hide();
        }
        });
        
        function photo_protection_onload() {
        var protect = $('input[name=photo_visibility]:checked').val();
        if (protect == 1) {
        $('#password-protection').show();
        }
        if (protect == 0) {
        $('#password-protection').hide();
        }
        }
        
        $('#togglePassword').on('click', function() {
        
        var type = $('#photopassword').attr('type');
        
        if (type == "password") {
        $('#photopassword').attr('type', 'text')
        $(this).attr('class', 'fa fa-eye-slash')
        }
        if (type == "text") {
        $('#photopassword').attr('type', 'password')
        $(this).attr('class', 'fa fa-eye')
        }
        
        })
        $("#highest_education").change(function() {
        var high_education = $('#highest_education').val();
        if (high_education != '') {
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
        
        
         $("#religion").change(function() {
        var religion = $('#religion').val();
        if (religion != '') 
        {
        $("#belief").empty();
        $("#belief").append('<option value="">-Select-</option>');
        $.ajax({
        url: "<?= base_url() ?>admin/GetCast",
        data: {
        religion: religion
        },
        type: "POST",
        success: function(data) {
        $("#belief").html(data);
        $('#belief').change();
        }
        });
        
        }
        });
        
        
        $(document).ready(function() 
        {
        $('#religion').on('change', function() 
        {
        if ($(this).val() === '2') 
        {
        $('#madrasaEducation').show();
        } 
        else
        {
        $('#madrasaEducation').hide();
        }
        });
        });
        
        
        
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
        
        
        
        $("#partner_country").change(function() {
        
        var country = $('#partner_country').val();
        // console.log(country);
        if (country != '') {
        $("#partner_state").empty();
        $("#partner_state").append('<option value="">-Select-</option>');
        $.ajax({
        url: "<?= base_url() ?>admin/GetStates2",
        data: {
        partner_country: country
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
        var states = $('#partner_state').val();
        //console.log(states);
        if (states != '') {
        $("#partner_district").empty();
        $("#partner_district").append('<option value="">-Select-</option>');
        $.ajax({
        url: "<?= base_url() ?>admin/GetDistrict2",
        data: {
        partner_state: states
        },
        type: "POST",
        success: function(data) {
        $("#partner_district").html(data);
        $('#partner_district').change();
        }
        
        });
        
        
        
        $("#partner_district").change(function() {
        var districts = $('#partner_district').val();
        console.log(districts);
        $("#city_preference").empty();
        $("#city_preference").append('<option value="">-Select-</option>');
        $.ajax({
        url: "<?= base_url() ?>admin/GetPartnerCity",
        data: {
        district_id: districts
        },
        type: "POST",
        success: function(data) {
        // $("#city_preference").html(data);
        //$('#city_preference').change();
        }
        });
        });      
        }
        });
        
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
        
        $('input[type="checkbox"]').click(function() {
        if ($(this).is(":checked")) {
        var home_country = $("#country").val();
        var home_state = $("#states").val();
        var home_district = $("#districts").val();
        //   var home_city = $("#city").val();
        //console.log(home_district);
        var home_city = $("#city").val();
        console.log(home_city);
        $("#present_country").val(home_country); 
        states(home_country,home_state);
        district(home_state,home_district);   
        city(home_district,home_city);         
        }
        });
        function states(home_country,home_state) {
        if(home_country!='' && home_state==''){
        $("#present_states").empty();
        $("#present_district").empty();
        $("#present_city").empty();
        $("#present_states").append('<option textvalue="">-Select-</option>');
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
        $("#marital_status").change(function() {
        var mstatus = $('#marital_status').val();
        if (mstatus == "Unmarried") {
        $("#for_marital_status").hide();
        $('#no_of_children').val("");
        
        } else {
        $("#for_marital_status").show();
        }
        });
        
        $("#physically_challenged").change(function() {
        var pchallenged = $('#physically_challenged').val();
        
        if(pchallenged == "Physically Challenged") {
        $("#for_physically_challenged").show();   
        }
        else {
        $("#for_physically_challenged").hide();
        $('#physical_status').val("");
        $('#disability').val("");
        
        }
        });
        $("#physical_status").change(function () {
        var physical_status = $('#physical_status').val();
        console.log(physical_status);
        if(physical_status == "Blind") {  
        $("#disabilities").show();
        }
        else if(physical_status == "Deaf / Dumb") {  
        $("#disabilities").show();
        }
        else if(physical_status == "Physically Challanged") {  
        $("#disabilities").show();
        }
        else
        {
        $("#disabilities").hide();
        $('#disability').val("");
        } 
        });
        
        $("#partner_physically_challenged").change(function() {
        var partner_chanllenge = $('#partner_physically_challenged').val();
        console.log(partner_chanllenge);
        if(partner_chanllenge == "Physically Challenged") {
        $("#for_partner_physically_challenged").show();   
        }
        else {
        $("#for_partner_physically_challenged").hide();
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
        
        </script>
        
        <script type="text/javascript">
        $(document).ready(function() {
        $('#phone').keypress(function (e) {
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
        </script>
        
        <script type="text/javascript">
        $(document).ready(function() {
        $('#secondary_number').keypress(function (e) {
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
        
        <script>  
        $(document).ready(function(){  
        $(document).on('input','#phone',function(e){
        var phone = $('#phone').val();  
        if(phone != '')  
        {  
        $.ajax({  
        url:"<?php echo base_url(); ?>admin/check_phone_avalibility",  
        method:"POST",  
        data:{phone:phone},  
        success:function(data){  
        $('#phone_result').html(data);  
        }  
        });  
        }  
        });  
        });  
        </script> 
        
        <script type="text/javascript">
        
        $(document).ready(function()
        {
        $('.keyup-email').keyup(function()
        {
        $('span.error-keyup-7').remove();
        var inputVal = $(this).val();
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        if(!emailReg.test(inputVal)) {
        $(this).after('<span class="error error-keyup-7">Invalid Email Format.</span>');
        }
        });
        });
        
        $(document).ready(function() 
        {
        $('#phone').keyup(function(e){
        var url = '<?php echo base_url() ?>'  
        var phone = $('#phone').val();
        console.log(phone);
        if(phone.length=='10'){
        $.ajax({
        dataType: 'text',
        type: 'POST',
        url: url + 'admin/checkstatus',
        data: {
        phone:phone
        },
        
        success: function(result) {
        //alert(result);
        if(result.checkstatus=='4') {
        alert(result.checkstatus);
        //console.log(checkstatus.checkstatus); 
        console.log(result.checkstatus);
        }
        },
        })
        }
        });
        });
        
        </script>
    </html>