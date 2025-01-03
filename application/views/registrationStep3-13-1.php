<!DOCTYPE html>
<html>
<?php include('include/register-header.php'); ?>

    <section id="registerPage">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div id="ERtabV" class="resp-vtabs hor_1">
                        <ul class="resp-tabs-list hor_1">
                            <li class="resp-tab-item hor_1" onclick="window.location.href='registrationStep1.html'">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="circleNo">
                                            <span>1</span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                       <p class="menuHead">Basic Information</p>
                                       <p class="menuPara">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
                                    </div>
                                </div>
                            </li>
                            <li class="resp-tab-item hor_1" onclick="window.location.href='registrationStep2.html'">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="circleNo">
                                            <span>2</span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                       <p class="menuHead">Educational & Physical Attributes</p>
                                       <p class="menuPara">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
                                    </div>
                                </div>
                            </li>
                            <li class="resp-tab-item hor_1 resp-tab-active" onclick="window.location.href='<?php echo site_url('user/registration_stepthree?currentpage=1'); ?>'">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="circleNo">
                                            <span>3</span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                       <p class="menuHead">Location & Contact details</p>
                                       <p class="menuPara">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
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
                                       <p class="menuPara">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
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
                                       <p class="menuPara">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
                                    </div>
                                </div>
                            </h2>
                            <h2 class="resp-accordion hor_1"  >
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="circleNo">
                                            <span>2</span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                       <p class="menuHead">Educational & Physical Attributes</p>
                                       <p class="menuPara">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
                                    </div>
                                </div>
                            </h2>
                            <h2 class="resp-accordion hor_1 resp-tab-active"  onclick="window.location.href='<?php echo site_url('user/registration_steptwo?currentpage=1'); ?>'">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="circleNo">
                                            <span>3</span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                       <p class="menuHead">Location & Contact details</p>
                                       <p class="menuPara">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
                                    </div>
                                </div>
                            </h2>
                            <!-- Family Information -->
                            <div class="resp-tab-content hor_1 resp-tab-content-active">
                                <div class="row">
                                    <div class="col-12 col-lg-10 mx-auto">
                                        <form action="<?php echo site_url('user/register_location_info'); ?>?currentpage=1" method="post" autocomplete="off" class="customForm" id="locationdetails">
                                            <div class="row">
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Home Country</label>
                                                    <select id="country" class="form-control form-select" name="country">
                  <option value="">--Select--</option>
                  <?php foreach ($country as $value) { ?>
                    <option value="<?php echo $value->id."-".$ProfileDetails->home_country; ?>" <?= (isset($ProfileDetails->home_country) && !empty($ProfileDetails->home_country)) ? ($ProfileDetails->home_country == $value->id ? 'selected' : '') : '' ?>><?php echo $value->name; ?></option>
                  <?php } ?>
                </select>     
                <p id="country_val" ></p>

                                                </div>
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Home State</label>
                                                    <select id="states" class="form-control form-select" name="states" >
                  <option value="">--Select--</option>
                  <?php foreach ($homestates as $value) { ?>
                    <option value="<?php echo $value->id; ?>" <?= (isset($ProfileDetails->home_state) && !empty($ProfileDetails->home_state)) ? ($ProfileDetails->home_state == $value->id ? 'selected' : '') : '' ?>><?php echo $value->name; ?></option>
                  <?php } ?>
                  </select>
                  <p id="states_val" ></p>

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Home District</label>
                                                    <select id="districts" class="form-control form-select" name="districts">
                  <option value="">--Select--</option>
                  <?php foreach ($homedistricts as $value) { ?>
                    <option value="<?php echo $value->district_id; ?>" <?= (isset($ProfileDetails->home_district) && !empty($ProfileDetails->home_district)) ? ($ProfileDetails->home_district == $value->district_id ? 'selected' : '') : '' ?>><?php echo $value->district; ?></option>
                  <?php } ?>   
                </select>  
                <p id="districts_val" ></p>

                                                </div>
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Home City</label>
                                                    <select id="city" class="form-control form-select" name="city">
                  <option value="">--Select--</option>
                  <?php foreach ($homecity as $value) { ?>
                    <option value="<?php echo $value->id; ?>" <?= (isset($ProfileDetails->home_city) && !empty($ProfileDetails->home_city)) ? ($ProfileDetails->home_city == $value->id ? 'selected' : '') : '' ?>><?php echo $value->name; ?></option>
                  <?php } ?>  
                </select>  
                <p id="city_val" ></p>

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Present Country</label>
                                                    <select id="present_country"  class="form-control form-select" name="present_country">
                  <option value="">--Select--</option>
                  <?php foreach ($country as $value) { ?>
                    <option value="<?php echo $value->id; ?>" <?= (isset($ProfileDetails->country) && !empty($ProfileDetails->country)) ? ($ProfileDetails->country == $id ? 'selected' : '') : '' ?>><?php echo $value->name; ?></option>
                  <?php } ?>
                </select> 
                                                </div>
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Present State</label>
                                                    <select id="present_states" class="form-control form-select" name="present_states">
                  <option value="">--Select--</option>
                  <?php foreach ($states as $value) { ?>
                    <option value="<?php echo $value->id; ?>" <?= (isset($ProfileDetails->state) && !empty($ProfileDetails->state)) ? ($ProfileDetails->state == $value->id ? 'selected' : '') : '' ?>><?php echo $value->name; ?></option>
                  <?php } ?>
                </select>  
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Present District</label>
                                                    <select id="present_district"  class="form-control form-select" name="present_district">
                  <option value="">--Select--</option>
                  <?php foreach ($districts as $value) { ?>
                    <option value="<?php echo $value->district_id; ?>" <?= (isset($ProfileDetails->native_district) && !empty($ProfileDetails->native_place)) ? ($ProfileDetails->home_district== $value->district_id ? 'selected' : '') : '' ?>><?php echo $value->district; ?></option>
                  <?php } ?> 
                </select> 
                                                </div>
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Present City</label>
                                                    <select id="present_city"  class="form-control form-select" name="present_city">
                  <option value="">--Select--</option>
                  <?php foreach ($city as $value) { ?>
                    <option value="<?php echo $value->id; ?>" <?= (isset($ProfileDetails->native_place) && !empty($ProfileDetails->native_place)) ? ($ProfileDetails->native_place == $value->id ? 'selected' : '') : '' ?>><?php echo $value->name; ?></option>
                  <?php } ?> 
                </select> 
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Secondary Number</label>
                                                    <div class="row">
                                                    <div class="col-md-4">
                                                    <select id="secondary_code" class="form-control form-select" name="secondary_code">
                  <option value="">ISD</option>
                  <?php
                                        foreach($countryCode as $val){
                                            if($val['country_order'] != '0'){?>
                                            <option value="<?= $val['country_code'];?>"><?= "+".$val['country_code'];?></option>
                                        <?php }}?>
                </select> </div>
                                                <div class="col-md-8">    <input type="text" class="form-control" placeholder="" name="secondary_number">
                                                </div></div></div>
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Email</label>
                                                    <input type="email" class="form-control" placeholder=""  value="<?= !empty($ProfileDetails->mail) && $ProfileDetails->mail != 'NULL'? $ProfileDetails->mail : '' ?>">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-12 mb-3">
                                                    <label class="form-label">Address</label>
                                                    <textarea class="form-control" rows="3"><?= !empty($ProfileDetails->address) && $ProfileDetails->address!= 'NULL'? $ProfileDetails->address : '' ?></textarea>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-md-6 mb-3 mb-md-0">
                                                    <button type="button" class="btn backBtn w-100" onclick="window.location.href='<?php echo site_url('user/registration_steptwo?currentpage=1'); ?>'">Back</button>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <button type="button" class="btn cstmBtnColr w-100" onclick="checkvalidation()">Next</button>
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
                                            <span>4</span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                       <p class="menuHead">Profile Description</p>
                                       <p class="menuPara">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
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
    $( "#country" ).change(function() {
        var country = $('#country').val();
        if(country !='' ) 
        {
            $("#states").empty();
            $("#states").append('<option value="">-Select-</option>');
            $.ajax({
                    url: "<?= site_url() ?>/user/GetStates",
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
                    url: "<?= site_url() ?>/user/GetDistrict",
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
                    url: "<?= site_url() ?>/user/GetCity",
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
                    url: "<?= site_url() ?>/user/GetStates",
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
                    url: "<?= site_url() ?>/user/GetDistrict",
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
                    url: "<?= site_url() ?>/user/GetCity",
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
    function checkvalidation(){

var country = $('#country').val();

var states = $('#states').val();
var districts = $('#districts').val();
var city = $('#city').val();


if(country == ''){ 
    $('#country_val').html('<font color="red" >Field Required</font>'); 
}
else if(states == '')
{
    $('#states_val').html('<font color="red" >Field Required</font>');
}else if(districts == '')
{ 
    $('#districts_val').html('<font color="red" >Field Required</font>');
}else if(city == '')
{ 
    $('#city_val').html('<font color="red" >Field Required</font>');
}
    else{ $( "#locationdetails" ).submit();}
}
</script>
</body>
</html>