<!DOCTYPE html>
<html>
<?php include('include/register-header-gotonikah.php'); ?>

    <section id="registerPage">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div id="ERtabV" class="resp-vtabs hor_1">
                        <ul class="resp-tabs-list hor_1">
                            <li class="resp-tab-item hor_1" onclick="window.location.href='<?php echo site_url('user/registration_step1_gotonikah?currentpage=1'); ?>'">
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
                            <li class="resp-tab-item hor_1" onclick="window.location.href='<?php echo site_url('user/registration_steptwo_gotonikah?currentpage=1'); ?>'">
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
                            <li class="resp-tab-item hor_1 resp-tab-active" onclick="window.location.href='<?php echo site_url('user/registration_stepthree_gotonikah?currentpage=1'); ?>'">
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
                            <h2 class="resp-accordion hor_1"  >
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
                            <h2 class="resp-accordion hor_1 resp-tab-active"  onclick="window.location.href='<?php echo site_url('user/registration_steptwo_gotonikah?currentpage=1'); ?>'">
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
                            <!-- Family Information -->
                            <div class="resp-tab-content hor_1 resp-tab-content-active">
                                <div class="row">
                                    <div class="col-12 col-lg-10 mx-auto">
                                        <form action="<?php echo site_url('user/register_location_info_gotonikah'); ?>?currentpage=1" method="post" autocomplete="off" class="customForm" id="locationdetails">
                                            <div class="row">
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Home Country</label>
                                                    <select id="country" class="form-control form-select" name="country">
                                                    <?php $country_id=$this->session->userdata('country'); 
                                                          $country=$this->db->select('id,name')->from('tbl_country')->where('id',$country_id)->get()->result_array();
                                                          foreach ($country as $value){ ?>
                                                         <option value="<?php echo $value['id'];?>"><?php echo $value['name']; ?></option> 
                                                         <?php } ?>
                                                    </select> 
                                                                                                        
                                                    <p id="country_val"></p>
                                                    </div>
                                                 <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Home State</label>
                                                    <select id="states" class="form-control form-select" name="states">
                                                         <?php $state_id=$this->session->userdata('state'); 
                                                          $state=$this->db->select('id,name')->from('tbl_states')->where('id',$state_id)->get()->result_array();
                                                          foreach ($state as $value){ ?>
                                                         <option value="<?php echo $value['id'];?>"><?php echo $value['name']; ?></option> 
                                                       <?php } ?>  
                                                      </select>
                                                     
                                                      <p id="states_val" ></p>

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Home District</label>
                                                        <select id="districts" class="form-control form-select" name="districts">
                                                         <?php 
                                                            $user_id = $this->session->userdata('user_id');
                                                            $this->db->select('R.id, R.home_district,D.district_id,D.district');
                                                            $this->db->from('tbl_registration R');
                                                            $this->db->join('tbl_district D', 'D.district_id = R.home_district', 'left');
                                                            $this->db->where('id', $user_id);
                                                            $query =$this->db->get();    
                                                            $home_district =$query->result_array();
                                                          foreach ($home_district as $value){ ?>
                                                        <option value="<?php echo $value['district_id']; ?>"><?php echo $value['district']; ?></option>
                                                       <?php } ?> 
                                                      </select>
                                                      
                                                    <p id="districts_val" ></p>
                                        
                                                </div>
                                                
                                               <!-- <div class="col-12 col-md-6 mb-3">
                                                  <label class="form-label">Home City</label>
                                                    <select id="city" class="form-control form-select" name="city">
                                                      <option value="">--Select--</option>
                                                      <?php if(isset($ProfileDetails->native_district)&& !empty($ProfileDetails->native_district))
                                                      {foreach ($city as $value) { ?>
                                                        <option value="<?php echo $value->id; ?>" <?= (isset($ProfileDetails->native_place) && !empty($ProfileDetails->native_place)) ? ($ProfileDetails->native_place == $value->id ? 'selected' : '') : '' ?>><?php echo $value->name; ?></option>
                                                      <?php } }?>  
                                                    </select>  
                                                    <p id="city_val" ></p>

                                                </div>-->
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Home City</label>
                                                      <select id="city" class="form-control form-select" name="city">
                                                          <option value="">--Select--</option>
                                                         <?php 
                                                          
                                                            $user_id = $this->session->userdata('user_id');
                                                            $this->db->select('R.id, R.home_district,D.district_id,D.district');
                                                            $this->db->from('tbl_registration R');
                                                            $this->db->join('tbl_district D', 'D.district_id = R.home_district', 'left');
                                                            
                                                            $this->db->where('R.id', $user_id);
                                                            $query =$this->db->get(); 
                                                            $home_dist=$query->row_array();
                                                            if(!empty($home_dist))
                                                            {
                                                                $dist_id=$home_dist['district_id'];
                                                            }
                                                            $this->db->select('*');
                                                            $this->db->from('tbl_city');
                                                            $this->db->where('district_id',$dist_id);
                                                            $query1 =$this->db->get();
                                                            $city=$query1->result_array();
                                                            foreach ($city as $value){ ?>
                                                            <option value="<?php echo $value['name']; ?>"><?php echo $value['name']; ?></option>
                                                             <?php } ?>
                                                        </select>
                                                       
                                                        <p id="city_val" ></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-md-12 mb-12">
                                                    <div class="">
                                                        <input type="checkbox" class="form-check-input" id="select_same" name="select_same" value="1" >
                                                        
                                                        <label class="form-check-label"> Tick here to select the same for the present address.</label><br><br>
                                                    </div></div>
                                                    </div>
                                                    <div id="present_address_details">
                                            <div class="row">
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Present Country</label>
                                                    <select id="present_country"  class="form-control form-select"  name="present_country">
                                                      <option value="">--Select--</option>
                                                      <?php $country_id=$this->session->userdata('country'); 
                                                          $country=$this->db->select('id,name')->from('tbl_country')->get()->result_array();
                                                          foreach ($country as $value){ ?>
                                                         <option value="<?php echo $value['id'];?>"><?php echo $value['name']; ?></option> 
                                                         <?php } ?>
                                                    </select> 
                                                  <p id="present_country_val" ></p>
                                                </div>
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Present State</label>
                                                    <select id="present_states" class="form-control form-select" name="present_states">
                                                  <option value="">--Select--</option>
                                                   <?php 
                                                          $country=$this->session->userdata('country'); 
                                                          $state=$this->db->select('id,name')->from('tbl_states')->where('country_id',$country)->get()->result_array();
                                                          foreach ($state as $value){ ?>
                                                         <option value="<?php echo $value['id'];?>"><?php echo $value['name']; ?></option> 
                                                       <?php } ?> 
                                                </select>  <p id="present_states_val" ></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Present District</label>
                                                    <select id="present_district"  class="form-control form-select" name="present_district">
                                                      <option value="">--Select--</option>
                                                      <?php if(isset($ProfileDetails->home_state)&& !empty($ProfileDetails->home_state))
                                                      {foreach ($homedistricts as $value) { ?>
                                                        <option value="<?php echo $value->district_id; ?>" <?= (isset($ProfileDetails->home_district) && !empty($ProfileDetails->home_district)) ? ($ProfileDetails->home_district== $value->district_id ? 'selected' : '') : '' ?>><?php echo $value->district; ?></option>
                                                      <?php }} ?> 
                                                    </select> <p id="present_district_val" ></p>
                                                </div>
                                                 <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Present City</label>
                                                    <select id="present_city"  class="form-control form-select" name="present_city">
                                                        <option value="">--Select--</option>
                                                          <?php if(isset($ProfileDetails->home_state)&& !empty($ProfileDetails->home_state))
                                                          {foreach ($homecity as $value) { ?>
                                                            <option value="<?php echo $value->id; ?>" <?= (isset($ProfileDetails->home_city) && !empty($ProfileDetails->home_city)) ? ($ProfileDetails->home_city == $value->id ? 'selected' : '') : '' ?>><?php echo $value->name; ?></option>
                                                          <?php }} ?> 
                                                        </select> <p id="present_city_val" ></p>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Secondary Number</label>
                                                    <div class="row">
                                                    <div class="col-md-4">
                                                    <select id="secondary_code" class="form-control form-select" name="secondary_code">
                  <option value="">--Select--</option>
                  <?php foreach ($countryCode as $value) { ?>
                    <option value="<?php echo $value['id']; ?>" <?= (isset($ProfileDetails->secondary_code) && !empty($ProfileDetails->secondary_code)) ? ($ProfileDetails->secondary_code == $value['id'] ? 'selected' : '') : '' ?>><?php echo "+".$value['country_code']; ?></option>
                  <?php } ?>
                </select> </div>
                                                <div class="col-md-8">   
                                                <input type="text" name="secondary_number" id="secondary_number" class="form-control" placeholder="" maxlength="10" onkeypress="return event.charCode > 47 && event.charCode < 58;" value="<?= !empty($ProfileDetails->other_contact_number) && $ProfileDetails->other_contact_number != 'NULL'? $ProfileDetails->other_contact_number : '' ?>">
                                                </div></div></div>
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Email</label>
                                                    <input name="email" type="email" class="form-control" placeholder=""  value="<?= !empty($ProfileDetails->mail) && $ProfileDetails->mail != 'NULL'? $ProfileDetails->mail : '' ?>">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-12 mb-3">
                                                    <label class="form-label">Address</label>
                                                    <textarea class="form-control" rows="3" name="address" id="address"><?= !empty($ProfileDetails->address) && $ProfileDetails->address!= 'NULL'? $ProfileDetails->address : '' ?></textarea>
                                                <p id="address_val" ></p></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-md-6 mb-3 mb-md-0">
                                                    <button type="button" class="btn backBtn w-100" onclick="window.location.href='<?php echo site_url('user/registration_steptwo_gotonikah?gotoback=2'); ?>'">Back</button>
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
    
    .backBtn
    {
        color: #5aba47;
    border: 1px solid #5aba47;
    }
    </style>
    
<?php include('include/footer_gotonikah.php'); ?>

<script type="text/javascript">
    $( "#country" ).change(function() {
        var country = $('#country').val();
        if(country !='' ) 
        {
            $("#states").empty();
            $("#states").append('<option value="">-Select-</option>');
            $.ajax({
                    url: "<?= site_url() ?>/user/GetStates_gotonikah",
                    data: {
                      country: country
                    },
                    type: "POST",
                    success: function(data) {
                        $("#states").html(data);
                       // $("#present_states").html(data);
                       // $('#states').change();
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
                      //  $("#present_district").html(data);
                       // $('#districts').change();
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
                    url: "<?= site_url() ?>/user/GetStates_gotonikah",
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
               
        }  
    });
    $( "#present_district" ).change(function() {
        var present_districts = $('#present_district').val();
        if(present_districts !='' ) 
        {
         
           $("#present_city").empty();
            $("#present_city").append('<option value="">-Select-</option>');
            $.ajax({
                    url: "<?= site_url() ?>/user/GetCity",
                    data: {
                      districts: present_districts
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
 var present_country=$('#present_country').val();
                            var present_states=$('#present_states').val();
                            var present_district=$('#present_district').val();
                            var present_city=$('#present_city').val();
                            var address=$('#address').val();

checkBox = document.getElementById('select_same');
// Check if the element is selected/checked
if(checkBox.checked) {
    // Respond to the result
   
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
}else if(address == '')
{ 
    $('#address_val').html('<font color="red" >Field Required</font>');
}
else{ $( "#locationdetails" ).submit();
}
    }
    else//not checked
    {
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
} else if(present_country == '')
{ 
    $('#present_country_val').html('<font color="red" >Field Required</font>');
}else if(present_states == '')
{ 
    $('#present_states_val').html('<font color="red" >Field Required</font>');
}else if(present_district == '')
{ 
    $('#present_district_val').html('<font color="red" >Field Required</font>');
}else if(present_city == '')
{ 
    $('#present_city_val').html('<font color="red" >Field Required</font>');
}else if(address == '')
{ 
    $('#address_val').html('<font color="red" >Field Required</font>');
}else{ $( "#locationdetails" ).submit();
}
    }//end of not checked
}
$('#select_same').change(function() {
    
        if(this.checked) {
             var selectedcountry = $("#country option:selected").val();
            var selectedstate = $("#states option:selected").val();
            var selecteddistrict = $("#districts option:selected").val();
            var selectedcity = $("#city option:selected").val();
            if(selectedcountry!="" && selectedstate!="" && selecteddistrict!="" && selectedcity!="")
            {
                var returnVal = confirm("Are you sure?");
                    if(returnVal)
                    {
                           /* $(this).prop("checked", returnVal);
                            $('#present_country').val(selectedcountry);
                            $('#present_states').val(selectedstate);
                            $('#present_district').val(selecteddistrict);
                            $('#present_city').val(selectedcity);*/
                            $("#present_address_details").hide();

                    }
                    else
                    {
                        $("#present_address_details").show();
                        $("#select_same").prop("checked", false);

                    }
            }
            else
            {
                alert("Please select all the fields.");
                $("#select_same").prop("checked", false);
            }
        }
        else
        {
                        var returnVal = confirm("Are you sure?");
            if(returnVal)
            {
        
                     $("#present_address_details").show();

        }
        else
        {
            $(this).prop("checked", true);
        }
        }
    });
</script>
</body>
</html>