<!DOCTYPE html>
<html>
<?php include('include/header.php'); ?>
<style>
    .flex-shrink-0{
        display: flex;
        flex-direction: column;
    }
    .verificationplist{
    background: #ffdada;
    /* border: 1px solid #efefef; */
    padding: 10px;
    text-align: center;
    margin-top: 14px;
    border-radius: 7px;
    }
</style>
<style type="text/css">
    .blur{
        filter: blur(4px);
        -webkit-filter: blur(4px);
    }
    .lockedImg{
        position: relative;
    }
    
    
    @media screen and (max-width: 767px) {
        
        .mobiledispaly{
            display:none;
        }
        
    }
</style>
    <section id="userContent">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-5 col-lg-4 mobiledispaly">
                    <div class="profileBox d-flex searchProfileBox align-items-center">
                        <div class="flex-shrink-0 profileImgBox">
                            <?php if(empty($this->session->userdata('photo'))){
                                if($this->session->userdata('gender')== 1){ ?>
                                <img src="<?php echo base_url('/assets/photo_storage/male.jpg'); ?>" alt="profile image" class="proImg1">
                            <?php }
                            else if($this->session->userdata('gender')== 2){ ?>
                                <img src="<?php echo base_url('/assets/photo_storage/female.jpg'); ?>" alt="profile image" class="proImg1">
                            <?php }
                            }
                            else{
                                $photo_status = $this->General_Model->check_photoStatus($this->session->userdata('photo'));
                                if($photo_status->status != 0 && $photo_status->status != 1)
                                {?>
                                <img src="<?php echo base_url('/assets/photo_storage/'.$this->session->userdata('photo')); ?>" alt="profile image" class="proImg1">
                                <?php }
                                else{
                                    if($this->session->userdata('gender')== 1){ ?>
                                        <img src="<?php echo base_url('/assets/photo_storage/male.jpg'); ?>" alt="profile image" class="proImg1">
                                    <?php }
                                    else if($this->session->userdata('gender')== 2){ ?>
                                        <img src="<?php echo base_url('/assets/photo_storage/female.jpg'); ?>" alt="profile image" class="proImg1">
                                    <?php }
                                }
                            }?>
                        </div>
                        <div class="flex-grow-1 ms-3 nameTitle">
                            <p class="mt-0"><?php echo $this->session->userdata('name'); ?></p>
                            <?php if($this->session->userdata('status') ==1 || $this->session->userdata('status') ==2 || $this->session->userdata('status')==3){ ?>
                            <span class="verified">
                                <img src="<?php echo base_url() ?>assets/imagegotos/verify.png">
                                Verified
                            </span>
                            <?php } 
                            else{ ?>
                            <span>
                                <img src="<?php echo base_url() ?>assets/images/blocked.png">
                                Verification Pending
                            </span>
                            <?php }
                            ?>
                            <div class="mt-2">
                                <a href="<?php echo site_url('user/profile'); ?>">Edit Profile</a>
                            </div>
                        </div>
                    </div>
                    <div class="filterOptnBox">
                        <form class="customForm">
                            <h3 class="fltrHead">Display</h3>
                            <div class="mb-4 ps-3">
                                <div class="form-check custom_radio ps-0 mb-2">
                                    <input class="form-check-input display_all search" type="radio" name="displayoptn" id="displayoptn1" value="" checked>
                                    <label class="form-check-label" for="displayoptn1">All Profiles</label>
                                </div>
                                <div class="form-check custom_radio ps-0">
                                    <input class="form-check-input search status" type="radio" name="displayoptn" id="displayoptn2" value="1">
                                    <label class="form-check-label" for="displayoptn2">Verified Profiles</label>
                                </div>
                            </div>
                            <h3 class="fltrHead">Age</h3>
                            <div class="wrapper mb-4">
                                <div class="values">
                                    <span id="ageRange1">21</span>
                                    <span id="ageRange2">60</span>
                                </div>
                                <div class="container1">
                                    <div class="age-slider-track"></div>
                                    <input type="range" min="18" max="80" value="18" id="ageSlider-1" oninput="ageSlideOne()" class="search">
                                    <input type="range" min="18" max="80" value="80" id="ageSlider-2" oninput="ageSlideTwo()" class="search">
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span>18</span>
                                    <span>80</span>
                                </div>
                            </div>
                            <h3 class="fltrHead">Marital Status</h3>
                            <div class="mb-4 ps-3">
                                <div class="form-check custom_radio ps-0 mb-2">
                                    <input class="form-check-input search" type="radio" name="martlStatus" id="martlStatus1" value="">
                                    <label class="form-check-label" for="martlStatus1">All</label>
                                </div>
                                <div class="form-check custom_radio ps-0 mb-2">
                                    <input class="form-check-input search" type="radio" name="martlStatus" id="martlStatus2" value="Unmarried">
                                    <label class="form-check-label" for="martlStatus2">Single</label>
                                </div>
                                <div class="form-check custom_radio ps-0 mb-2">
                                    <input class="form-check-input search" type="radio" name="martlStatus" id="martlStatus3" value="Divorced">
                                    <label class="form-check-label" for="martlStatus3">Divorced</label>
                                </div>
                                <div class="form-check custom_radio ps-0">
                                    <input class="form-check-input search" type="radio" name="martlStatus" id="martlStatus4" value="Widow/Widower">
                                    <label class="form-check-label" for="martlStatus4">Widow/Widower</label>
                                </div>
                                <div class="form-check custom_radio ps-0">
                                    <input class="form-check-input search" type="radio" name="martlStatus" id="martlStatus5" value="Separated">
                                    <label class="form-check-label" for="martlStatus5">Separated</label>
                                </div>
                            </div>
                            <h3 class="fltrHead">Belief</h3>
                            <div class="mb-4 ps-3">
                                <div class="form-check custom_radio ps-0 mb-2">
                                    <input class="form-check-input search" type="radio" name="belief" id="belief1" value="">
                                    <label class="form-check-label" for="belief1">All</label>
                                </div>
                                <?php
                                $i = 2;
                                foreach ($belief as $value) { ?>
                                <div class="form-check custom_radio ps-0 mb-2">
                                    <input class="form-check-input search" type="radio" name="belief" id="belief<?php echo $i ?>" value="<?php echo $value->sid ?>">
                                    <label class="form-check-label" for="belief<?php echo $i; ?>"><?php echo $value->sub_caste; ?></label>
                                </div>
                                <?php
                                $i++;
                                } ?>
                                
                            </div>
                            <h3 class="fltrHead">Highest Education</h3>
                            <div class="mb-4 ps-3">
                                <select class="form-select form-control change qualification" aria-label="" name="qualification">
                                    <option value="">Select</option>
                                    <?php foreach ($qualification as $value) { ?>
                                    <option value="<?php echo $value->qualification_id ?>" ><?php echo $value->qualification; ?></option>  
                                    <?php } ?>
                                                  
                                </select>
                            </div>
                            <!-- <h3 class="fltrHead">State</h3>
                            <div class="mb-4 ps-3">
                                <select class="form-select form-control" aria-label="">
                                    <option >Kerala</option>
                                    <option value="1">Tamilnadu</option>
                                    <option value="2">Karnataka</option>
                                </select>
                            </div> -->
                            <h3 class="fltrHead">District</h3>
                            <div class="mb-4 ps-3">
                                <select class="form-select form-control change district" aria-label="" name="district" onchange="search()">
                                    <option value="">Select</option>
                                    <?php foreach ($district as $value) { ?>
                                    <option value="<?php echo $value->district_id ?>" ><?php echo $value->district; ?></option>  
                                    <?php } ?> 
                                </select>
                            </div>
                            <!-- <h3 class="fltrHead">City</h3>
                            <div class="mb-4 ps-3">
                                <select class="form-select form-control" aria-label="">
                                    <option >Tirur</option>
                                    <option value="1">Tanur</option>
                                    <option value="2">Manjeri</option>
                                </select>
                            </div> -->
                            <!-- <h3 class="fltrHead" >Distance</h3> -->
                            <div class="wrapper" style="display:none;">
                                <div class="values">
                                    <span id="range1">0</span>
                                    <span id="range2">60</span>
                                </div>
                                <div class="container1">
                                    <div class="slider-track"></div>
                                    <input type="range" min="0" max="60" value="30" id="slider-1" oninput="slideOne()">
                                    <input type="range" min="0" max="60" value="50" id="slider-2" oninput="slideTwo()">
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span>0 KM</span>
                                    <span>60 KM</span>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- mobile app advrtisment -->
                    <div class="appAdvBox2">
                        <h2 class="subHead mb-4">Search Profiles<br><span>Anytime! Anywhere!!</span></h2>
                        <p class="pOne">Finding your perfect match has never been easier with the Happynikah application</p>
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
                    <!-- search -->
                    <div class="searchBox">
                        <form class="customForm" action="<?php echo site_url('user/search_profile'); ?>" method="post" autocomplete="off">
                            <div class="row">
                                <!--<div class="col-12 col-sm-6 col-lg-3 mb-3 mb-lg-0">-->
                                <!--    <label class="form-label">I'm looking for</label>-->
                                <!--    <select class="form-select form-control" aria-label="" name="gender">-->
                                <!--        <option value="">Select</option>-->
                                <!--        <option value="2">Women</option>-->
                                <!--        <option value="1">Man</option>-->
                                <!--    </select>-->
                                <!--</div>-->
                                <div class="col-12 col-sm-6 col-lg-3 mb-3 mb-lg-0">
                                    <label class="form-label">Aged</label>
                                    <select class="form-select form-control" aria-label="" name="age">
                                        <option value="">Select</option>
                                        <option value="18-25">18-25</option>
                                        <option value="25-30">25-30</option>
                                        <option value="30-35">30-35</option>
                                        <option value="35-40">35-40</option>
                                        <option value="40-45">40-45</option>
                                        <option value="45-50">45-50</option>
                                        <option value="50-55">50-55</option>
                                        <option value="55-60">55-60</option>
                                        <option value="60-65">60-65</option>
                                        <option value="65-70">65-70</option>
                                        <option value="70-75">70-75</option>
                                        <option value="75-80">75-80</option>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-6 col-lg-3 mb-3 mb-lg-0">
                                    <label class="form-label">Belief</label>
                                    <select class="form-select form-control" aria-label="" name="caste">
                                        <option value="">Select</option>
                                        <?php foreach ($belief as $value) { ?>
                                        <option value="<?php echo $value->sid ?>"><?php echo $value->sub_caste; ?></option>  
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-6 col-lg-3 mb-3 mb-lg-0">
                                    <label class="form-label" style="opacity:0;">I'm looking for</label>
                                    <button type="submit" class="btn cstmBtnColr w-100" ><img src="<?php echo base_url() ?>assets/images/search.png"><span>Search</span></button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="searchResBox" id="searchBox1">
                    <?php
                    if(!empty($Profiles)){
                    foreach ($Profiles as $key => $value) {
                        $match = 0;
                        if($LoggedUserProfileDetails['age']>=$value->partner_age_from && $LoggedUserProfileDetails['age']<=$value->partner_age_to){
                            $match++;
                        }
                        if($LoggedUserProfileDetails['height']>=$value->partner_height && $LoggedUserProfileDetails['height']<=$value->partner_height_to){
                            $match++;
                        }
                        if($LoggedUserProfileDetails['qualification'] == $value->qualification){
                            $match++;
                        }
                        if($LoggedUserProfileDetails['financial_status'] == $value->partner_familytype){
                            $match++;
                        }
                         ?>
                        
                        <div class="d-lg-flex SRSbox">
                            
                            <div class="flex-shrink-0">
                                
                                <?php if(empty($value->photo)){ 
                                            if($value->gender== 1){ ?>
                                             <a href="<?php echo site_url('user/singleprofile/'.$value->id); ?>">
                                                <img src="<?php echo base_url('/assets/photo_storage/male.jpg'); ?>" alt="profile image" class="proImg">
                                                </a>
                                            <?php }
                                            else if($value->gender== 2){ ?>
                                             <a href="<?php echo site_url('user/singleprofile/'.$value->id); ?>">
                                                <img src="<?php echo base_url('/assets/photo_storage/female.jpg'); ?>" alt="profile image" class="proImg">
                                                </a>
                                            <?php }
                                     } 
                                     else{ 
                                         $photo_status = $this->General_Model->check_photoStatus($value->photo);
                                         if($photo_status->status != 0 && $photo_status->status != 1){
                                        $sender_id = $this->session->userdata('user_id');
                                        $receiver_id = $value->id;
                                        $photo_privacy = $this->General_Model->photoprivacy($sender_id,$receiver_id);
                                        if($photo_privacy !=1){ ?>
                                        <a href="<?php echo site_url('user/singleprofile/'.$value->id); ?>">
                                                <img src="<?php echo base_url('/assets/photo_storage/'.$value->photo); ?>" alt="..." class="srProPic">
                                                </a>
                                        <?php }
                                        else{
                                            ?>
                                            <div class="profileImgBox text-center">
                                                 <a href="<?php echo site_url('user/singleprofile/'.$value->id); ?>">
                                                     <?php
                                                     $file_pointer = 'assets/photo_storage_blur/'.$value->photo;
                                                     if(file_exists($file_pointer)){?>
                                                <img src="<?php echo base_url('/assets/photo_storage_blur/'.$value->photo); ?>" alt="..." class="srProPic">
                                                <?php }
                                                else{
                                                    if($value->gender== 1){ ?>
                                                     <a href="<?php echo site_url('user/singleprofile/'.$value->id); ?>">
                                                        <img src="<?php echo base_url('/assets/photo_storage/male.jpg'); ?>" alt="profile image" class="proImg">
                                                        </a>
                                                    <?php }
                                                    else if($value->gender== 2){ ?>
                                                     <a href="<?php echo site_url('user/singleprofile/'.$value->id); ?>">
                                                        <img src="<?php echo base_url('/assets/photo_storage/female.jpg'); ?>" alt="profile image" class="proImg">
                                                        </a>
                                                    <?php } }?>
                                                </a>

                                                <!-- <button type="button" class="btn btn-primary proImgLock" data-bs-toggle="modal" data-bs-target="#proLockModal">
                                                 <img src="<?= base_url()?>assets/images/padlockW.png">
                                                </button> -->
                                            </div>
                                            

                                     <?php }}
                                     else{
                                         if($value->gender== 1){ ?>
                                             <a href="<?php echo site_url('user/singleprofile/'.$value->id); ?>">
                                                <img src="<?php echo base_url('/assets/photo_storage/male.jpg'); ?>" alt="profile image" class="proImg">
                                                </a>
                                            <?php }
                                            else if($value->gender== 2){ ?>
                                             <a href="<?php echo site_url('user/singleprofile/'.$value->id); ?>">
                                                <img src="<?php echo base_url('/assets/photo_storage/female.jpg'); ?>" alt="profile image" class="proImg">
                                                </a>
                                            <?php }
                                     }
                                     } ?>
                                
                            </div>
                            <div class="flex-grow-1 ms-lg-3 p-4 p-lg-2 p-xxl-4 d-flex flex-column justify-content-between">
                                <div>
                                    <div class="headName d-flex align-items-center justify-content-between">
                                        <a href="<?php echo site_url('user/singleprofile/'. $value->id) ?>">
                                            <div class="d-flex align-items-center">
                                                <label class="nme"><?php echo $value->name;?></label>
                                                <!--<p class="status"><span class="online"></span>Online</p>-->
                                            </div>
                                        </a>
                                        <div class="youHim">
                                            <img src="<?php echo base_url() ?>assets/images/people.png">
                                            You & Him
                                            <span><?php echo $match; ?> / 4</span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center verificationplist">
                                        <!--<label class="dsgntn"><?php echo $value->job_name;?></label>-->
                                        <?php if($value->status ==1 || $value->status ==2 || $value->status ==3){ ?>
                                        <span class="verified">
                                            <img src="<?php echo base_url() ?>assets/images/verify.png">
                                            &nbsp; Verified
                                        </span>
                                        <?php } 
                                        else{ ?>
                                        <span class="verified">
                                          <img src="<?php echo base_url() ?>assets/images/blocked.png">
                                            &nbsp; Verification Pending
                                        </span>
                                <?php }
                                ?>
                                    </div>
                                </div>
                                <div class="dBox d-flex justify-content-between align-items-center">
                                    <div>
                                        <span>


                                            <?php
                                                if(!empty($value->age) && $value->age !='NULL'){
                                                    echo $value->age; 
                                                    echo 'Yrs,';
                                                }
                                                if(!empty($value->height) && $value->height !='NULL'){
                                                    echo $value->height;
                                                    echo ',';
                                                }
                                                ?> 
                                        </span>
                                        <span>Muslim
                                        <?php 
                                                if(!empty($value->user_caste) && $value->user_caste !='NULL'){ 
                                                            echo ',';
                                                            echo $value->user_caste; 
                                        }  ?>
                                        </span>
                                        <span>
                                            <?php 
                                                    if(!empty($value->native_place) && $value->native_place !='NULL' && !empty($value->district) && $value->district !='NULL'){ 

                                                                echo $value->native_place; 
                                                                echo ',';
                                                                echo $value->district; 
                                                    }
                                                    else if(!empty($value->native_place) && $value->native_place !='NULL'){ 
                                                                echo ',';
                                                                echo $value->native_place; 
                                                    } 
                                                    else if(!empty($value->district) && $value->district !='NULL'){        echo ',';
                                                                echo $value->district; 
                                                    }?>
                                        </span>
                                    </div>
                                    <a href="<?php echo site_url('user/singleprofile/'.$value->id); ?>">
                                    <button class="sndrqst1" type="button">
                                        <img src="<?php echo base_url() ?>assets/images/checked.png" class="wImg">
                                        View Profile
                                    </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                      
                     <?php }  


                    }
                    else{ ?>
                        <div class="d-lg-flex SRSbox">
                            <div class="flex-grow-1 ms-lg-3 p-4 p-lg-2 p-xxl-4 d-flex flex-column justify-content-between">
                            <center><h6 style="color:red"><b>No Profiles Found</b></h6></center>
                            </div>
                        </div>
                    <?php } ?>

                           
                    </div>
<p class="pagination"><?php echo $links; ?></p>
                     <div class="searchResBox" id="searchBox2">

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


    

    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/bootstrap.bundle.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            
            
            $(".change").keyup(function(){
              search();
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
            slideOne();
            slideTwo();
            ageSlideOne();
            ageSlideTwo();
        };

        //distence slider
        let sliderOne = document.getElementById("slider-1");
        let sliderTwo = document.getElementById("slider-2");
        let displayValOne = document.getElementById("range1");
        let displayValTwo = document.getElementById("range2");
        let minGap = 0;
        let sliderTrack = document.querySelector(".slider-track");
        let sliderMaxValue = document.getElementById("slider-1").max;

        function slideOne() {
          if (parseInt(sliderTwo.value) - parseInt(sliderOne.value) <= minGap) {
            sliderOne.value = parseInt(sliderTwo.value) - minGap;
          }
          displayValOne.textContent = sliderOne.value;

          newValue1 = Number( (sliderOne.value - sliderOne.min) * 100 / (sliderOne.max - sliderOne.min) );
            newPosition1 = 8 - (newValue1 * 0.32);
            displayValOne.style.left = `calc(${newValue1}% + (${newPosition1}px))`;

          fillColor();
        }
        function slideTwo() {
            if (parseInt(sliderTwo.value) - parseInt(sliderOne.value) <= minGap) {
                sliderTwo.value = parseInt(sliderOne.value) + minGap;
            }
            displayValTwo.textContent = sliderTwo.value;

            newValue2 = Number( (sliderTwo.value - sliderTwo.min) * 100 / (sliderTwo.max - sliderTwo.min) );
            newPosition2 = 8 - (newValue2 * 0.32);
            displayValTwo.style.left = `calc(${newValue2}% + (${newPosition2}px))`;

          fillColor();
        }
        function fillColor() {
          percent1 = (sliderOne.value / sliderMaxValue) * 100;
          percent2 = (sliderTwo.value / sliderMaxValue) * 100;
          sliderTrack.style.background = `linear-gradient(to right, #dadae5 ${percent1}% , #FF5B85 ${percent1}% , #FF5B85 ${percent2}%, #dadae5 ${percent2}%)`;
        }


        // age slider
        let ageSliderOne = document.getElementById("ageSlider-1");
        let ageSliderTwo = document.getElementById("ageSlider-2");
        let ageDisplayValOne = document.getElementById("ageRange1");
        let ageDisplayValTwo = document.getElementById("ageRange2");
        let ageMinGap = 0;
        let ageSliderTrack = document.querySelector(".age-slider-track");
        let ageSliderMaxValue = document.getElementById("ageSlider-1").max;

        function ageSlideOne() {
          if (parseInt(ageSliderTwo.value) - parseInt(ageSliderOne.value) <= minGap) {
            ageSliderOne.value = parseInt(ageSliderTwo.value) - minGap;
          }
          ageDisplayValOne.textContent = ageSliderOne.value;

          ageNewValue1 = Number( (ageSliderOne.value - ageSliderOne.min) * 100 / (ageSliderOne.max - ageSliderOne.min) );
            ageNewPosition1 = 8 - (ageNewValue1 * 0.32);
            ageDisplayValOne.style.left = `calc(${ageNewValue1}% + (${ageNewPosition1}px))`;

          fillColorAge();
        }

        function ageSlideTwo() {
            if (parseInt(ageSliderTwo.value) - parseInt(ageSliderOne.value) <= minGap) {
                ageSliderTwo.value = parseInt(ageSliderOne.value) + minGap;
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

        $(".search").click(function(){
              search();
        });

        

        function search(){
              var status = $('input[name="displayoptn"]:checked').val();
              var marital_status = $('input[name="martlStatus"]:checked').val();
              var belief = $('input[name="belief"]:checked').val();
              var qualification = $(".qualification").val();
             
              var district = $(".district").val();
             
              var agefrom = $("#ageSlider-1").val();
             
              var ageto = $("#ageSlider-2").val();
              url_address='<?php echo site_url() ?>/user/search';
              data = { status : status, marital_status : marital_status, belief : belief,qualification : qualification, district : district,agefrom : agefrom, ageto : ageto};
              $.ajax({
                type: "post",
                url: url_address,
                data: data,
                success: function(response){ 
                  $('#searchBox1').html(response);
                   
                },
                error: function(XMLHttpRequest, textStatus, errorThrown){
                   alert(textStatus);
                }
              });
        }
        
    </script>

</body>
</html>