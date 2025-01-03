<!DOCTYPE html>
<?php include('header.php'); 

if($_SESSION['user_type']==='8')
{
include('menuservice.php'); 
 }
?> 
<style type="text/css">

#searchProfile-tab
{
  
    /*background-color: #238dff;*/
    color: grey;
}

#searchProfile-tab.active
{
  color: #fff !important;
}

#advancedSearch-tab
{
  color: grey;  
}
#idSearch-tab{
 color: grey;   
}
button#advancedSearch-tab.active
{
     color: #fff;   
}

button#idSearch-tab.active
{
     color: #fff !important;   
}

</style>	
<br>
    <section id="userContent">
    <div class="container" style="margin-left: 300px;background-color: #fff;">
            <ul class="nav nav-pills nav-fill searchTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="searchProfile-tab" data-bs-toggle="tab" data-bs-target="#searchProfile" type="button" role="tab" aria-controls="searchProfile" aria-selected="true">Search Profile</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="advancedSearch-tab" data-bs-toggle="tab" data-bs-target="#advancedSearch" type="button" role="tab" aria-controls="advancedSearch" aria-selected="false">Advanced Search</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="idSearch-tab" data-bs-toggle="tab" data-bs-target="#idSearch" type="button" role="tab" aria-controls="idSearch" aria-selected="false">ID Search</button>
                </li>
            </ul>
            <div class="tab-content searchTabContent" style="margin-top:50px;padding-bottom:50px;">
                <div class="tab-pane fade show active" id="searchProfile" role="tabpanel" aria-labelledby="searchProfile-tab">
                    <form class="customForm"  action="<?php echo site_url('admin/search_profile_common'); ?>"
                     method="post" autocomplete="off">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4 mb-4 px-4">
                                <label for="gender" class="form-label">Gender</label>
                                    <select class="form-select form-control" aria-label="" id="gender" name="gender">
                                        <option value="">Please select one…</option>
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>                                       
                                      </select>
                                    </div>
                            <div class="col-12 col-md-6 col-lg-4 mb-4 px-4">
                                <label for="ageSlider-1" class="form-label">Age</label>
                                <div class="wrapper mb-4">
                                    <div class="values">
                                        <span id="ageRange1">18</span>
                                        <span id="ageRange2" style="margin-left:220px;">60</span>
                                    </div>
                                    <div class="container1">
                                        <div class="sliderTrack age-slider-track"></div>
                                        <input type="range" min="18" max="60" value="18" id="ageSlider-1" oninput="ageSlideOne()" name="age_from">
                                        <input type="range" min="18" max="60" value="60" id="ageSlider-2" oninput="ageSlideTwo()"name="age_to">
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span>18</span>
                                        <span style="margin-right:70px;">60</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4 mb-4 px-4">
                                <label for="hightSlider-1" class="form-label">Height</label>
                                <div class="wrapper mb-4">
                                    <div class="values">
                                        <span id="hightRange1">125</span>
                                        <span id="hightRange2" style="margin-left:206px;">212</span>
                                    </div>
                                    <div class="container1">
                                        <div class="sliderTrack hight-slider-track"></div>
                                        <input type="range" min="125" max="212" value="125" id="hightSlider-1" oninput="hightSlideOne()" name="height_from">
                                        <input type="range" min="125" max="212" value="212" id="hightSlider-2" oninput="hightSlideTwo()" name="height_to">
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span>125</span>
                                        <span style="margin-right:70px;">212</span>
                                    </div>
                                </div>
                            </div>
                            <?php $maritalstatus= $this->db->select('*')->from('tbl_maritalstatus')->get()->result_array(); ?>
                            <div class="col-12 col-md-6 col-lg-4 mb-4 px-4">
                                <label class="form-label">Marital Status</label>
                                <select class="form-select form-control" aria-label="" id="marital_status" name="marital_status[]"  multiple >
                                 <option value="Doesn't Matter">--Doesn't Matter--</option>
                    <?php foreach ($maritalstatus as $value) { ?>
                        <option value="<?php echo $value['maritalstatus'] ?>" ><?php echo $value['maritalstatus']; ?></option>
                                        <?php } ?>
                              </select>
                            </div>
                             <?php $belief= $this->db->select('*')->from('tbl_caste')->get()->result_array();?>
                            <div class="col-12 col-md-6 col-lg-4 mb-4 px-4">
                                <label class="form-label">Belief</label>
                                 <select id="belief" class="form-control custom-select" name="belief[]"  multiple>
                                    <option value="Doesn't Matter">--Doesn't Matter--</option>
                                    <?php foreach ($belief as $value) { ?>
                                    <option value="<?php echo $value['cid'] ?>" ><?php echo $value['caste']; ?></option>  
                                    <?php } ?>  
                                   </select>  
                                 </div>
                            <?php $highest_education= $this->db->select('*')->from('tbl_highest_education')->get()->result_array();?>
                            <div class="col-12 col-md-6 col-lg-4 mb-4 px-4">
                                <label class="form-label">Highest Education</label>
                                <select id="highest_education" class="form-control form-select" name="highest_education[]"  multiple>
                    <option value="Doesn't Matter">--Doesn't Matter--</option>
                    <?php foreach ($highest_education as $value) { ?>
                    <option value="<?php echo $value['id'] ?>" ><?php echo $value['high_education']; ?></option>  
                    <?php } ?>  
                   </select>
                  </div>
                           <?php $country= $this->db->select('*')->from('tbl_country')->get()->result_array();?>
                            <div class="col-12 col-md-6 col-lg-4 mb-4 px-4">
                                <label class="form-label">Country</label>
                                <select class="form-select form-control" aria-label="" name="country" id="country">
                                    <option value="">--Select--</option>
                                     <?php foreach ($country as $value){  
                                        ?>
                                    <option value="<?php echo $value['id'] ?>" ><?php echo $value['name']; ?></option>  
                                    <?php } ?>  
                                         </select>
                                            </div>

                              <div class="col-12 col-md-6 col-lg-4 mb-4 px-4">
                                <label class="form-label">State</label>
                                <select class="form-select form-control" aria-label="" name="state" id="state">
                                    <option value="">--Select--</option>
                    
                                </select>
                            </div>  
                            <div class="col-12 col-md-6 col-lg-4 mb-4 px-4">
                                <label class="form-label">District</label>
                                <select class="form-select form-control" aria-label="" name="district[]" id="district" multiple style="height:40px;" >
                                    <option value="">--Select--</option>
                                </select>
                            </div>
                             <div class="col-12 col-md-6 col-lg-4 mb-4 px-4">
                                <input type="hidden" value="common" name="searchtype">
                                 <button class="btn searchBtn" type="submit" style="color: #fff;font-size: 14px;background: #ff5b85;border-radius: 5px;width: 100%;margin-top: 32px;">

                                    <img src="<?php echo base_url();?>../assets/images/search.png" style="height: 25px;margin-right: 10px;">
                                    Search
                                </button>
                            </div>
                             <div class="col-12 col-md-6 col-lg-4 mb-4 px-4">
                                <label class="form-label">Show Profile</label>
                                <select class="form-select form-control" aria-label="" name="profile_with_photo">
                                    <option value="1">Show with Photos</option>
                                    <option value="2">All</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="advancedSearch" role="tabpanel" aria-labelledby="advancedSearch-tab">
                    <form class="customForm" action="<?php echo site_url('admin/search_profile_advance'); ?>" method="post" autocomplete="off">
                        <div class="row">
                          <div class="col-12 col-md-6 col-lg-4 mb-4 px-4">
                             <label for="gender" class="form-label">Gender</label>
                                <select class="form-select form-control" aria-label="" id="adv_gender" name="adv_gender">
                                  <option value="">Please select one…</option>
                                     <option value="1">Male</option>
                                      <option value="2">Female</option>                                       
                                      </select>
                                    </div>
                              <div class="col-12 col-md-6 col-lg-4 mb-4 px-4">
                                <label for="age1Slider-1" class="form-label">Age</label>
                                <div class="wrapper mb-4">
                                    <div class="values">
                                        <span id="age1Range1">18</span>
                                        <span id="age1Range2" style="margin-left:220px;">60</span>
                                    </div>
                                    <div class="container1">
                                        <div class="sliderTrack age1-slider-track"></div>
                                        <input type="range" min="18" max="60" value="10" id="age1Slider-1" oninput="age1SlideOne()" name="adv_age_from">
                                        <input type="range" min="18" max="60" value="60" id="age1Slider-2" oninput="age1SlideTwo()" name="adv_age_to">
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span>18</span>
                                        <span style="margin-right:70px;">60</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4 mb-4 px-4">
                                <label for="hight1Slider-1" class="form-label">Hight</label>
                                <div class="wrapper mb-4">
                                    <div class="values">
                                        <span id="hight1Range1">125</span>
                                        <span id="hight1Range2" style="margin-left:206px;">212</span>
                                    </div>
                                    <div class="container1">
                                        <div class="sliderTrack hight1-slider-track"></div>
                                        <input type="range" min="125" max="212" value="125" id="hight1Slider-1" oninput="hight1SlideOne()" name="adv_height_from">
                                        <input type="range" min="125" max="212" value="212" id="hight1Slider-2" oninput="hight1SlideTwo()" name="adv_height_to">
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span>125</span>
                                        <span style="margin-right:70px;">212</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4 mb-4 px-4">
                                <label for="weightSlider-1" class="form-label">Weight</label>
                                <div class="wrapper mb-4">
                                    <div class="values">
                                        <span id="weightRange1">40</span>
                                        <span id="weightRange2" style="margin-left:220px;">150</span>
                                    </div>
                                    <div class="container1">
                                        <div class="sliderTrack weight-slider-track"></div>
                                        <input type="range" min="40" max="100" value="40" id="weightSlider-1" oninput="weightSlideOne()" name="adv_weight_from">
                                        <input type="range" min="40" max="100" value="100" id="weightSlider-2" oninput="weightSlideTwo()" name="adv_weight_to">
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span>40</span>
                                        <span style="margin-right:70px;">100</span>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="col-12 col-md-6 col-lg-4 mb-4 px-4">
                                <label class="form-label">Marital Status</label>
                                <select class="form-select form-control" aria-label="" id="marital_status1" name="marital_status1[]" multiple>
                                <option value="Doesn't Matter">--Doesn't Matter--</option>
                                 <?php foreach ($maritalstatus as $value) { ?>
                                    <option value="<?php echo $value['maritalstatus'] ?>" ><?php echo $value['maritalstatus']; ?></option>
                                    <?php } ?>
                              </select>
                            </div>
                            <?php $bodytype= $this->db->select('*')->from('tbl_bodytype')->get()->result_array();?>
                            <div class="col-12 col-md-6 col-lg-4 mb-4 px-4">
                                <label class="form-label">Body Type</label>
                                <select id="bodytype" class="form-control form-select" name="bodytype[]" multiple>
                                  <option value="Doesn't Matter">--Doesn't Matter--</option>
                                  <?php foreach ($bodytype as $value){ ?>
                                        <option value="<?php echo $value['bodytype'] ?>" ><?php echo $value['bodytype']; ?></option>
                                  <?php } ?>
                                 </select>
                                </div>
                                    <?php $skin_color= $this->db->select('*')->from('tbl_skincolor')->get()->result_array();?>
                                    <div class="col-12 col-md-6 col-lg-4 mb-4 px-4">
                                        <label class="form-label">Skin Colour</label>
                                        <select id="skin_color" class="form-control form-select" name="skin_color[]" multiple>
                                      <option value="Doesn't Matter">--Doesn't Matter--</option>
                                      <?php foreach ($skin_color as $value) { ?>
                                        <option value="<?php echo $value['skincolor']; ?>" ><?php echo $value['skincolor']; ?></option>
                                      <?php } ?>
                                    </select>  
                            </div>
                            <?php $financialstatus= $this->db->select('*')->from('tbl_financialstatus')->get()->result_array();?>
                            <div class="col-12 col-md-6 col-lg-4 mb-4 px-4">
                                <label class="form-label">Financial Status</label>
                                <select id="financialstatus" class="form-control form-select" name="financialstatus[]" multiple>
                             <option value="Doesn't Matter">--Doesn't Matter--</option>
                    <?php foreach ($financialstatus as $value) { ?>
                    <option value="<?php echo $value['id'] ?>" ><?php echo $value['financialstatus']; ?></option>  
                    <?php } ?>
                </select>       
                </div>
                  <?php $belief= $this->db->select('*')->from('tbl_caste')->get()->result_array();?>
                            <div class="col-12 col-md-6 col-lg-4 mb-4 px-4">
                                <label class="form-label">Belief</label>
                                 <select id="adv_belief" class="form-control custom-select" name="adv_belief[]"  multiple>
                                    <option value="Doesn't Matter">--Doesn't Matter--</option>
                                    <?php foreach ($belief as $value) { ?>
                                    <option value="<?php echo $value['cid'] ?>" ><?php echo $value['caste']; ?></option>  
                                    <?php } ?>  
                                   </select>  
                                 </div>
                                <?php $physicalstatus= $this->db->select('*')->from('tbl_physicalstatus')->get()->result_array();?>
                                <div class="col-12 col-md-6 col-lg-4 mb-4 px-4">
                                <label class="form-label">Physical Status</label>
                                <select id="physical_status" class="form-control form-select" name="physical_status[]" multiple>
                                <option value="Doesn't Matter">--Doesn't Matter--</option>
                                <?php foreach ($physicalstatus as $value) { ?>
                                <option value="<?php echo $value['physicalstatus'] ?>" ><?php echo $value['physicalstatus']; ?></option>  
                                <?php } ?>
                              
                            </select>
                            </div>
                             <?php $highest_education= $this->db->select('*')->from('tbl_highest_education')->get()->result_array();?>
                            <div class="col-12 col-md-6 col-lg-4 mb-4 px-4">
                                <label class="form-label">Highest Education</label>
                                <select id="adv_highest_education" class="form-control form-select" name="adv_highest_education[]" multiple>
                                    <option value="Doesn't Matter">--Doesn't Matter--</option>
                                    <?php foreach ($highest_education as $value) { ?>
                                    <option value="<?php echo $value['id'] ?>" ><?php echo $value['high_education']; ?></option>  
                                        <?php } ?> 
                                </select> 
                            </div>
                                <?php $country= $this->db->select('*')->from('tbl_country')->get()->result_array();?>
                                <div class="col-12 col-md-6 col-lg-4 mb-4 px-4">
                                    <label class="form-label">Country</label>
                                    <select class="form-select form-control" aria-label="" name="adv_country" id="adv_country" >
                                        <option value="">--Select--</option>
                                    <?php foreach ($country as $value) { ?>
                                    <option value="<?php echo $value['id'] ?>" ><?php echo $value['name']; ?></option>  
                                    <?php } ?>  
                                    </select>
                                </div>
                              <div class="col-12 col-md-6 col-lg-4 mb-4 px-4">
                                <label class="form-label">State</label>
                                <select class="form-select form-control" aria-label="" name="adv_state" id="adv_state" >
                                    <option value="">--Select--</option>
                    
                                </select>
                            </div>  
                            <div class="col-12 col-md-6 col-lg-4 mb-4 px-4">
                                <label class="form-label">District</label>
                                <select class="form-select form-control" aria-label="" name="adv_district[]" id="adv_district" multiple style="height:40px;">
<!--                                    <option value="">--Select--</option>
-->                                </select>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4 mb-4 px-4">
                                <label class="form-label">City</label>
                                <select class="form-select form-control" aria-label="" name="adv_city[]" id="adv_city" multiple style="height:40px;">
                               <option value="Doesn't Matter">--Doesn't Matter--</option>
                 
                                </select>
                            </div>
                             <?php $professiontype= $this->db->select('*')->from('tbl_professiontype')->get()->result_array();?>
                            <div class="col-12 col-md-6 col-lg-4 mb-4 px-4">
                                <label class="form-label">Job Category</label>
                                <select id="profession_type" class="form-control custom-select" name="profession_type[]" multiple >
                                <option value="">--Select--</option>
                                <?php foreach ($professiontype as $value){ ?>
                                <option value="<?php echo $value['professiontype'] ?>"><?php echo $value['professiontype']; ?></option>  
                                <?php } ?>  
                            </select>  
                            </div>
                            <div class="col-12 col-md-6 col-lg-4 mb-4 px-4">
                                <label class="form-label">Show Profile</label>
                                <select class="form-select form-control" aria-label="" name="adv_profile_with_photo">
                                    <option value="1">Show with Photos</option>
                                    <option value="2">All</option>
                                </select>
                            </div>

                            <div class="col-12 col-md-6 col-lg-4 mb-4 px-4">
                             <input type="hidden" value="advanced" name="searchtype">

                        <button class="btn searchBtn" type="submit" style="color: #fff;font-size: 14px;background: #ff5b85;border-radius: 5px;width: 100%;margin-top: 32px;">

                                    <img src="<?php echo base_url();?>../assets/images/search.png" style="height: 25px;margin-right: 10px;">
                                    Search
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="idSearch" role="tabpanel" aria-labelledby="idSearch-tab">
                    <form class="customForm searchByIdOnly" action="<?php echo site_url('admin/search_profile_id');?>" method="post" autocomplete="off">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4 mb-0 mx-auto text-center">
                                <label class="form-label">Search by ID</label>
                                <input type="text" class="form-control" name="happy_id" placeholder="Enter profile ID">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-8 mb-4 mx-auto">
                            <input type="hidden" value="byid" name="searchtype">

                                <button class="btn searchBtn" type="submit" style="color: #fff;font-size: 14px;background: #ff5b85;border-radius: 5px;
    margin-left: 192px;width:48%;margin-top: 32px;">
                                    <img src="<?php echo base_url();?>../assets/images/search.png"  style="height: 25px;margin-right: 10px;">
                                    Search
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    
     <?php include('footer.php'); ?>
    
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script> 

<script type="text/javascript">
       
        $(document).ready(function () {
            $('#gender').selectpicker();
            $('#bodytype').selectpicker();
            $('#skin_color').selectpicker();
            $('#financialstatus').selectpicker();
            $('#adv_belief').selectpicker();
            $('#belief').selectpicker();
            $('#profession_type').selectpicker();
            $('#physical_status').selectpicker();
            $('#adv_highest_education').selectpicker();
            $('#highest_education').selectpicker();
            $('#marital_status').selectpicker();
            $('#marital_status1').selectpicker();

  $("#bodytype").change(function() {
     if($("#bodytype").val()=="Doesn't Matter"){
        $('#bodytype option').prop('selected', true);
   } 
});
  $("#skin_color").change(function() { 
     if($("#skin_color").val()=="Doesn't Matter"){
            
     $('#skin_color option').prop('selected', true);
  } 
           
});
$("#financialstatus").change(function() {  
     if($("#financialstatus").val()=="Doesn't Matter")    
        {          
$('#financialstatus option').prop('selected', true);
  } 
});
$("#belief").change(function(){  
 if($("#belief").val()=="Doesn't Matter"){
    $('#belief option').prop('selected', true);
} 
           
});
$("#adv_belief").change(function(){  
 if($("#adv_belief").val()=="Doesn't Matter"){
    $('#adv_belief option').prop('selected', true);
} 
           
});
$("#profession_type").change(function() {
 if($("#profession_type").val()=="Doesn't Matter") {            
$('#profession_type option').prop('selected', true);
} 
});
$("#physical_status").change(function() {
        if($("#physical_status").val()=="Doesn't Matter")    
        {
$('#physical_status option').prop('selected', true);
} 
 });
   $("#marital_status1").change(function() {
        if($("#marital_status1").val()=="Doesn't Matter")    
        {
$('#marital_status1 option').prop('selected', true);
} 
 });
    
$("#marital_status").change(function(){
 if($("#marital_status").val()=="Doesn't Matter"){
    $('#marital_status option').prop('selected', true);
} 
});
$("#highest_education").change(function(){
 if($("#highest_education").val()=="Doesn't Matter"){
  $('#highest_education option').prop('selected', true);
} 
});
$("#adv_highest_education").change(function() {
if($("#adv_highest_education").val()=="Doesn't Matter"){
$('#adv_highest_education option').prop('selected', true);
} 
});

$("#country").change(function() {
        var country = $('#country').val();
        console.log(country);
        if(country !='' ) 
        {
            $("#state").empty();
            $("#country").append('<option value="">-Select-</option>');
            $.ajax({
                    url: "<?= base_url() ?>admin/Get_States",
                    data: {
                      country: country
                    },
                    type: "POST",
                    success: function(data) {
                        $("#state").html(data);
                        $('#state').change();
                    }
                });
              
           
        }  
    });
    $("#state").change(function() {
        var state = $('#state').val();
        if(state !='' ) 
        { $("#city").empty();
            $("#city").append('<option value="">-Select-</option>');
            $.ajax({
                    url: "<?= base_url() ?>admin/Get_District",
                    data: {
                      states: state
                    },
                    type: "POST",
                    success: function(data) {
                     // alert(data);
                        $("#district").html(data);
                        $('#district').selectpicker();

                    }
                });

                $("#city").empty();
            $("#city").append('<option value="">-Select-</option>');
            $.ajax({
                    url: "<?= base_url() ?>admin/Get_City",
                    data: {
                      states: state
                    },
                    type: "POST",
                    success: function(data) {
                        $("#city").html(data);
                        $('#city').selectpicker();

                      //  $('#adv_city').change();
                    }
                });
                       
        }  
    });
     $("#adv_country").change(function() {
        var adv_country = $('#adv_country').val();
        if(adv_country !='' ) 
        {
            $("#adv_state").empty();
            $("#adv_country").append('<option value="">-Select-</option>');
            $.ajax({
                    url: "<?= base_url() ?>admin/Get_States",
                    data: {
                      country: adv_country
                    },
                    type: "POST",
                    success: function(data) {
                        $("#adv_state").html(data);
                        $('#advstate').change();
                    }
                });
              
           
        }  
    });
    
    $("#adv_state").change(function() {
        var adv_state = $('#adv_state').val();
        if(adv_state !='' ) 
        {
            $.ajax({
                    url: "<?= base_url() ?>admin/Get_District",
                    data: {
                      states: adv_state
                    },
                    type: "POST",
                    success: function(data) {
                     // alert(data);
                        $("#adv_district").append(data);
                        $('#adv_district').selectpicker();

                    }
                });
                
                $("#adv_city").empty();
            $("#adv_city").append('<option value="">-Select-</option>');
            $.ajax({
                    url: "<?= base_url() ?>admin/Get_City",
                    data: {
                      states: adv_state
                    },
                    type: "POST",
                    success: function(data) {
                        $("#adv_city").html(data);
                        $('#adv_city').selectpicker();

                      //  $('#adv_city').change();
                    }
                });
                       
        }  
    });
            // burger menu
            $(".hamburger").click(function(){
                $(this).toggleClass("is-active");
                $('body').toggleClass("is-scroll-disabled");
            });
            // burger menu end

            // send request btn
            $(".sndrqst1").click(function(){
                $(this).toggleClass("clicked");
            });
            
        });

        // range slider
        window.onload = function () {
            ageSlideOne();
            ageSlideTwo();

            hightSlideOne();
            hightSlideTwo();

            age1SlideOne();
            age1SlideTwo();

            hight1SlideOne();
            hight1SlideTwo();

            weightSlideOne();
            weightSlideTwo();
            
        };
       
        // age slider
        let ageSliderOne = document.getElementById("ageSlider-1");
        let ageSliderTwo = document.getElementById("ageSlider-2");
        let ageDisplayValOne = document.getElementById("ageRange1");
        let ageDisplayValTwo = document.getElementById("ageRange2");
        let ageMinGap = 0;
        let ageSliderTrack = document.querySelector(".age-slider-track");
        let ageSliderMaxValue = document.getElementById("ageSlider-1").max;
        function ageSlideOne() {
          if (parseInt(ageSliderTwo.value) - parseInt(ageSliderOne.value) <= ageMinGap) {
            ageSliderOne.value = parseInt(ageSliderTwo.value) - ageMinGap;
          }
          ageDisplayValOne.textContent = ageSliderOne.value;

          ageNewValue1 = Number( (ageSliderOne.value - ageSliderOne.min) * 100 / (ageSliderOne.max - ageSliderOne.min) );
            ageNewPosition1 = 8 - (ageNewValue1 * 0.32);
            ageDisplayValOne.style.left = `calc(${ageNewValue1}% + (${ageNewPosition1}px))`;

          fillColorAge();
        }
        function ageSlideTwo() {
            if (parseInt(ageSliderTwo.value) - parseInt(ageSliderOne.value) <= ageMinGap) {
                ageSliderTwo.value = parseInt(ageSliderOne.value) + ageMinGap;
            }
            ageDisplayValTwo.textContent = ageSliderTwo.value;

            ageNewValue2 = Number( (ageSliderTwo.value - ageSliderTwo.min) * 100 / (ageSliderTwo.max - ageSliderTwo.min) );
            ageNewPosition2 = 8 - (ageNewValue2 * 0.32);
            ageDisplayValTwo.style.left = `calc(${ageNewValue2}% + (${ageNewPosition2}px))`;

          fillColorAge();
        }
        function fillColorAge() {
          agePercent1 = Number( (ageSliderOne.value - ageSliderOne.min) * 100 / (ageSliderOne.max - ageSliderOne.min) );
          agePercent2 = Number( (ageSliderTwo.value - ageSliderTwo.min) * 100 / (ageSliderTwo.max - ageSliderTwo.min) );

          ageSliderTrack.style.background = `linear-gradient(to right, #dadae5 ${agePercent1}% , #FF5B85 ${agePercent1}% , #FF5B85 ${agePercent2}%, #dadae5 ${agePercent2}%)`;
        }

        // age1 slider
        let age1SliderOne = document.getElementById("age1Slider-1");
        let age1SliderTwo = document.getElementById("age1Slider-2");
        let age1DisplayValOne = document.getElementById("age1Range1");
        let age1DisplayValTwo = document.getElementById("age1Range2");
        let age1MinGap = 0;
        let age1SliderTrack = document.querySelector(".age1-slider-track");
        let age1SliderMaxValue = document.getElementById("age1Slider-1").max;
        function age1SlideOne() {
          if (parseInt(age1SliderTwo.value) - parseInt(age1SliderOne.value) <= age1MinGap) {
            age1SliderOne.value = parseInt(age1SliderTwo.value) - age1MinGap;
          }
          age1DisplayValOne.textContent = age1SliderOne.value;

          age1NewValue1 = Number( (age1SliderOne.value - age1SliderOne.min) * 100 / (age1SliderOne.max - age1SliderOne.min) );
            age1NewPosition1 = 8 - (age1NewValue1 * 0.32);
            age1DisplayValOne.style.left = `calc(${age1NewValue1}% + (${age1NewPosition1}px))`;

          fillColorAge1();
        }
        function age1SlideTwo() {
            if (parseInt(age1SliderTwo.value) - parseInt(age1SliderOne.value) <= age1MinGap) {
                age1SliderTwo.value = parseInt(age1SliderOne.value) + age1MinGap;
            }
            age1DisplayValTwo.textContent = age1SliderTwo.value;

            age1NewValue2 = Number( (age1SliderTwo.value - age1SliderTwo.min) * 100 / (age1SliderTwo.max - age1SliderTwo.min) );
            age1NewPosition2 = 8 - (age1NewValue2 * 0.32);
            age1DisplayValTwo.style.left = `calc(${age1NewValue2}% + (${age1NewPosition2}px))`;

          fillColorAge1();
        }
        function fillColorAge1() {
          age1Percent1 = Number( (age1SliderOne.value - age1SliderOne.min) * 100 / (age1SliderOne.max - age1SliderOne.min) );
          age1Percent2 = Number( (age1SliderTwo.value - age1SliderTwo.min) * 100 / (age1SliderTwo.max - age1SliderTwo.min) );

          age1SliderTrack.style.background = `linear-gradient(to right, #dadae5 ${age1Percent1}% , #FF5B85 ${age1Percent1}% , #FF5B85 ${age1Percent2}%, #dadae5 ${age1Percent2}%)`;
        }

        // hight slider
        let hightSliderOne = document.getElementById("hightSlider-1");
        let hightSliderTwo = document.getElementById("hightSlider-2");
        let hightDisplayValOne = document.getElementById("hightRange1");
        let hightDisplayValTwo = document.getElementById("hightRange2");
        let hightMinGap = 0;
        let hightSliderTrack = document.querySelector(".hight-slider-track");
        let hightSliderMaxValue = document.getElementById("hightSlider-1").max;
        function hightSlideOne() {
          if (parseInt(hightSliderTwo.value) - parseInt(hightSliderOne.value) <= hightMinGap) {
            hightSliderOne.value = parseInt(hightSliderTwo.value) - hightMinGap;
          }
          hightDisplayValOne.textContent = hightSliderOne.value;

          hightNewValue1 = Number( (hightSliderOne.value - hightSliderOne.min) * 100 / (hightSliderOne.max - hightSliderOne.min) );
            hightNewPosition1 = 8 - (hightNewValue1 * 0.32);
            hightDisplayValOne.style.left = `calc(${hightNewValue1}% + (${hightNewPosition1}px))`;

          fillColorhight();
        }
        function hightSlideTwo() {
            if (parseInt(hightSliderTwo.value) - parseInt(hightSliderOne.value) <= hightMinGap) {
                hightSliderTwo.value = parseInt(hightSliderOne.value) + hightMinGap;
            }
            hightDisplayValTwo.textContent = hightSliderTwo.value;

            hightNewValue2 = Number( (hightSliderTwo.value - hightSliderTwo.min) * 100 / (hightSliderTwo.max - hightSliderTwo.min) );
            hightNewPosition2 = 8 - (hightNewValue2 * 0.32);
            hightDisplayValTwo.style.left = `calc(${hightNewValue2}% + (${hightNewPosition2}px))`;

          fillColorhight();
        }
        function fillColorhight() {
          hightPercent1 = Number( (hightSliderOne.value - hightSliderOne.min) * 100 / (hightSliderOne.max - hightSliderOne.min) );
          hightPercent2 = Number( (hightSliderTwo.value - hightSliderTwo.min) * 100 / (hightSliderTwo.max - hightSliderTwo.min) );

          hightSliderTrack.style.background = `linear-gradient(to right, #dadae5 ${hightPercent1}% , #FF5B85 ${hightPercent1}% , #FF5B85 ${hightPercent2}%, #dadae5 ${hightPercent2}%)`;
        }

        // hight1 slider
        let hight1SliderOne = document.getElementById("hight1Slider-1");
        let hight1SliderTwo = document.getElementById("hight1Slider-2");
        let hight1DisplayValOne = document.getElementById("hight1Range1");
        let hight1DisplayValTwo = document.getElementById("hight1Range2");
        let hight1MinGap = 0;
        let hight1SliderTrack = document.querySelector(".hight1-slider-track");
        let hight1SliderMaxValue = document.getElementById("hight1Slider-1").max;
        function hight1SlideOne() {
          if (parseInt(hight1SliderTwo.value) - parseInt(hight1SliderOne.value) <= hight1MinGap) {
            hight1SliderOne.value = parseInt(hight1SliderTwo.value) - hight1MinGap;
          }
          hight1DisplayValOne.textContent = hight1SliderOne.value;

          hight1NewValue1 = Number( (hight1SliderOne.value - hight1SliderOne.min) * 100 / (hight1SliderOne.max - hight1SliderOne.min) );
            hight1NewPosition1 = 8 - (hight1NewValue1 * 0.32);
            hight1DisplayValOne.style.left = `calc(${hight1NewValue1}% + (${hight1NewPosition1}px))`;

          fillColorhight1();
        }
        function hight1SlideTwo() {
            if (parseInt(hight1SliderTwo.value) - parseInt(hight1SliderOne.value) <= hight1MinGap) {
                hight1SliderTwo.value = parseInt(hight1SliderOne.value) + hight1MinGap;
            }
            hight1DisplayValTwo.textContent = hight1SliderTwo.value;

            hight1NewValue2 = Number( (hight1SliderTwo.value - hight1SliderTwo.min) * 100 / (hight1SliderTwo.max - hight1SliderTwo.min) );
            hight1NewPosition2 = 8 - (hight1NewValue2 * 0.32);
            hight1DisplayValTwo.style.left = `calc(${hight1NewValue2}% + (${hight1NewPosition2}px))`;

          fillColorhight1();
        }
        function fillColorhight1() {
          hight1Percent1 = Number( (hight1SliderOne.value - hight1SliderOne.min) * 100 / (hight1SliderOne.max - hight1SliderOne.min) );
          hight1Percent2 = Number( (hight1SliderTwo.value - hight1SliderTwo.min) * 100 / (hight1SliderTwo.max - hight1SliderTwo.min) );

          hight1SliderTrack.style.background = `linear-gradient(to right, #dadae5 ${hight1Percent1}% , #FF5B85 ${hight1Percent1}% , #FF5B85 ${hight1Percent2}%, #dadae5 ${hight1Percent2}%)`;
        }

        // weight slider
        let weightSliderOne = document.getElementById("weightSlider-1");
        let weightSliderTwo = document.getElementById("weightSlider-2");
        let weightDisplayValOne = document.getElementById("weightRange1");
        let weightDisplayValTwo = document.getElementById("weightRange2");
        let weightMinGap = 0;
        let weightSliderTrack = document.querySelector(".weight-slider-track");
        let weightSliderMaxValue = document.getElementById("weightSlider-1").max;
        function weightSlideOne() {
          if (parseInt(weightSliderTwo.value) - parseInt(weightSliderOne.value) <= weightMinGap) {
            weightSliderOne.value = parseInt(weightSliderTwo.value) - weightMinGap;
          }
          weightDisplayValOne.textContent = weightSliderOne.value;

          weightNewValue1 = Number( (weightSliderOne.value - weightSliderOne.min) * 100 / (weightSliderOne.max - weightSliderOne.min) );
            weightNewPosition1 = 8 - (weightNewValue1 * 0.32);
            weightDisplayValOne.style.left = `calc(${weightNewValue1}% + (${weightNewPosition1}px))`;

          fillColorweight();
        }
        function weightSlideTwo() {
            if (parseInt(weightSliderTwo.value) - parseInt(weightSliderOne.value) <= weightMinGap) {
                weightSliderTwo.value = parseInt(weightSliderOne.value) + weightMinGap;
            }
            weightDisplayValTwo.textContent = weightSliderTwo.value;

            weightNewValue2 = Number( (weightSliderTwo.value - weightSliderTwo.min) * 100 / (weightSliderTwo.max - weightSliderTwo.min) );
            weightNewPosition2 = 8 - (weightNewValue2 * 0.32);
            weightDisplayValTwo.style.left = `calc(${weightNewValue2}% + (${weightNewPosition2}px))`;

          fillColorweight();
        }
        function fillColorweight() {
          weightPercent1 = Number( (weightSliderOne.value - weightSliderOne.min) * 100 / (weightSliderOne.max - weightSliderOne.min) );
          weightPercent2 = Number( (weightSliderTwo.value - weightSliderTwo.min) * 100 / (weightSliderTwo.max - weightSliderTwo.min) );

          weightSliderTrack.style.background = `linear-gradient(to right, #dadae5 ${weightPercent1}% , #FF5B85 ${weightPercent1}% , #FF5B85 ${weightPercent2}%, #dadae5 ${weightPercent2}%)`;
        }
        
 
    </script>  
    
    <script>
    // Add a click event listener to the tabs to handle tab switching
    document.getElementById("advancedSearch-tab").addEventListener("click", function () {
        // Remove the 'active' class from the Search Profile tab
        document.getElementById("searchProfile-tab").classList.remove("active");
    });

    document.getElementById("idSearch-tab").addEventListener("click", function () {
        // Remove the 'active' class from the Search Profile tab
        document.getElementById("searchProfile-tab").classList.remove("active");
    });
</script>
</body>
</html>