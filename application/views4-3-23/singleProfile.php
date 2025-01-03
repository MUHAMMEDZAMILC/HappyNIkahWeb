<!DOCTYPE html>
<html>
<?php  include('include/header.php');  ?>  
<style type="text/css">
    
   .interestbtn {
    border-radius: 3px;
    color: #5D5C72;
    font-size: 12px;
    font-family: 'Roboto', sans-serif;
    font-weight: 400;
    border: 1px solid #5D5C72;
    padding: 6px 6px;
    background: linear-gradient(90deg, rgba(255,108,136,0.0) 0%, rgba(255,108,136,0.0) 100%);
}
.proImg{
    overflow: hidden;
    width: 100%;
}
.viewcontactbtn{
    margin-top: 23px;
    border: 0;
    padding: 8px 11px;
    width: 59% !important;
    float: left;
    color: white;
    background: #15cbba;
    margin-left: 19%;
    border-radius: 35px;
    font-size: 12px;
}
</style>

    <section id="userContent">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-5 col-lg-4">
                    <div class="profileBox">
                        <div class="bgStrip">
                            <img src="<?php echo base_url() ?>assets/images/abstractBg1.png" alt="border image">
                        </div>
                        <div class="profileImgBox  text-center">  <!-- lockedImg   class for blur img -->
                            <?php if(empty($ProfileDetails['photo'])){ ;
                            if($ProfileDetails['gender']== 1){ ?>
                                <img src="<?php echo base_url('/assets/photo_storage/male.jpg'); ?>" alt="profile image" class="proImg">
                            <?php }
                            else if($ProfileDetails['gender']== 2){ ?>
                                <img src="<?php echo base_url('/assets/photo_storage/female.jpg'); ?>" alt="profile image" class="proImg">
                            <?php }
                             } 
                             else{ 
                             $photo_status = $this->General_Model->check_photoStatus($ProfileDetails['photo']);
                             if($photo_status->status != 0 && $photo_status->status != 1){
                             $sender_id = $this->session->userdata('user_id');
                                $receiver_id = $ProfileDetails['id'];
                                $photo_privacy = $this->General_Model->photoprivacy($sender_id,$receiver_id);
                                if($photo_privacy !=1){?>
                                    <img src="<?php echo base_url('/assets/photo_storage/'.$ProfileDetails['photo']); ?>" alt="profile image" class="proImg">
                           

                             <?php }else{?>
                                 <a href="" data-bs-toggle="modal" data-bs-target="#photorequestModal" >
                                <img src="<?php echo base_url('/assets/photo_storage_blur/'.$ProfileDetails['photo']); ?>" alt="profile image" class="proImg">
                                </a>
                             <?php }}
                                 else{
                                     if($ProfileDetails['gender']== 1){ ?>
                                        <img src="<?php echo base_url('/assets/photo_storage/male.jpg'); ?>" alt="profile image" class="proImg">
                                    <?php }
                                    else if($ProfileDetails['gender']== 2){ ?>
                                        <img src="<?php echo base_url('/assets/photo_storage/female.jpg'); ?>" alt="profile image" class="proImg">
                                    <?php }
                                 }
                             } ?> 
                          
                        </div>
                        <div class="nameTitle text-center mb-4">
                            <a data-bs-toggle="modal" data-bs-target="#proLockModal" <?php 
                            if(!empty($payment_done))
                            { 
                            $expiry_date = strtotime($payment_done[0]->expiry_date); 
                            $today_date = strtotime(date('Y-m-d')); 
                            $datediff = $today_date - $expiry_date; 
                            $round_diff = round($datediff/(60*60*24)); 
                            if($round_diff < '0'){ $uri_profileID = $this->uri->segment(3); 
                            $check_profileID = $this->General_Model->check_profileID_contactview($this->session->userdata('user_id'),$uri_profileID); 
                            if(!empty($check_profileID)){ 
                            echo 'onclick="contact('.$ProfileDetails['id'].')"';
                            } 
                            if(count($contact_viewed) != $payment_done[0]->contacts) 
                            { echo 'onclick="contact('.$ProfileDetails['id'].')"';}}}?> style="
    position: absolute;
    top: 104px;
    right: 10;
    right: 28px; ">
                                    <img src="https://i.pinimg.com/originals/20/b6/86/20b6860e2f5560e6fae086a51051bdbc.gif" style="
    width: 104px;
    height: unset; ">
                                </a>
                            <p><?= !empty($ProfileDetails['name'])? $ProfileDetails['name'] : '' ?> <span style="font-size: 14px;">(<?= $ProfileDetails['happynikah_id'];?>)</span></p>
                            
                            <p class="dsgntn"><?= (isset($ProfileDetails['job_name']) && !empty($ProfileDetails['job_name'])) ? $ProfileDetails['job_name'] : ''?></p>
                            <?php if($ProfileDetails['status'] ==1 || $ProfileDetails['status'] ==2 || $ProfileDetails['status'] ==3){ ?>
                            <?php if($this->session->userdata('status') ==1 || $this->session->userdata('status') ==2 || $this->session->userdata('status')==3){ ?>
                            <!--<span class="verified">-->
                            <!--    <img src="<?php echo base_url() ?>assets/images/verify.png">-->
                            <!--    Verified-->
                            <!--</span>-->
                            <?php } 
                            else{ ?>
                            <!--<span>-->
                            <!--    <img src="<?php echo base_url() ?>assets/images/blocked.png">-->
                            <!--    Verification Pending-->
                            <!--</span>-->
                            <?php }
                            ?>
                            <?php } 
                            else{ ?>
                            <!--<span>-->
                            <!--    <img src="<?php echo base_url() ?>assets/images/blocked.png">-->
                            <!--    Verification Pending-->
                            <!--</span>-->
                            
                            <?php }
                            ?>
                            
                         
                        </div>
                        
                     
                                
                                
                        <div class="row">
                            <div class="col-12 col-sm-4 col-md-12 col-xl-4 mb-4 mb-sm-0 mb-md-4 mb-xl-0" style="    width: 50%; <?php if($block != 0){ echo 'display: none;';   } ?>" id="block">
                                <button class="callBtn w-100" type="button" onclick="blockuser('<?php echo $ProfileDetails['id']; ?>')">
                                    <img src="<?php echo base_url() ?>assets/images/blocked.png">
                                    Block
                                </button>
                            </div>

                           <div class="col-12 col-sm-4 col-md-12 col-xl-4 mb-4 mb-sm-0 mb-md-4 mb-xl-0"  style="    width: 50%; <?php if($block == 0){ echo 'display: none;';   } ?>"  id="block_done">
                                <button class="callBtn w-100" type="button" onclick="blockuser('<?php echo $ProfileDetails['id']; ?>')">
                                    <img src="<?php echo base_url() ?>assets/images/blocked.png">
                                    Blocked
                                </button>
                            </div> 

                            
                             <div class="col-12 col-sm-5 col-md-12 col-xl-5 mb-4 mb-sm-0 mb-md-4 mb-xl-0" id="interest_done" style="    width: 50%; <?php if($interest == 0){ echo 'display: none;';   } ?>">
                                <button class="sndrqst w-100 clicked" type="button" onclick="sendinterest('<?php echo $ProfileDetails['id']; ?>')">
                                     
                                    <img src="<?php echo base_url(); ?>assets/images/checked.png" class="wImg">
                                    Interest Expressed
                                </button>
                            </div>
                            
                            <div class="col-12 col-sm-5 col-md-12 col-xl-5 mb-4 mb-sm-0 mb-md-4 mb-xl-0" id="interest" style="width: 50%; <?php if($interest != 0){ echo 'display: none;';  } ?>">
                                <button class="sndrqst w-100" type="button" onclick="sendinterest('<?php echo $ProfileDetails['id']; ?>')">
                                     
                                    <img src="<?php echo base_url(); ?>assets/images/checked.png" class="wImg">
                                    Express Interest
                                </button>
                            </div>
                             </div>
                             <div class="row" style="margin-top: 10px;">

                            <div class="col-12 col-sm-5 col-md-12 col-xl-5 mb-4 mb-sm-0 mb-md-4 mb-xl-0" id="shortlist_done" style="    width: 50%; <?php if($shortlist == 0){ echo 'display: none;';   } ?>">
                                <button class="sndrqst w-100 clicked" type="button" onclick="shortlist('<?php echo $ProfileDetails['id']; ?>')">
                                     
                                    <img src="<?php echo base_url(); ?>assets/images/checked.png" class="wImg">
                                    Shortlisted
                                </button>
                            </div>
                            
                            <div  class="col-12 col-sm-5 col-md-12 col-xl-5 mb-4 mb-sm-0 mb-md-4 mb-xl-0" id="shortlist" style=" width: 50%; <?php if($shortlist != 0){ echo 'display: none;';  } ?>">
                                <button class="sndrqst w-100" type="button" onclick="shortlist('<?php echo $ProfileDetails['id']; ?>')">
                                     
                                    <img src="<?php echo base_url(); ?>assets/images/checked.png" class="wImg">
                                    Shortlist
                                </button>
                            </div>

                            <div class="col-12 col-sm-5 col-md-12 col-xl-5 mb-4 mb-sm-0 mb-md-4 mb-xl-0" id="liked" style="    width: 50%; <?php if($like == 0){ echo 'display: none;';   } ?>">
                                <button class="callBtn w-100 clicked" type="button" onclick="like('<?php echo $ProfileDetails['id']; ?>')">
                                     
                                    <img src="<?php echo base_url(); ?>assets/images/checked.png" class="wImg">
                                    liked
                                </button>
                            </div>
                            
                            <div   class="col-12 col-sm-5 col-md-12 col-xl-5 mb-4 mb-sm-0 mb-md-4 mb-xl-0" id="like" style="width: 50%; <?php if($like != 0){ echo 'display: none;';  } ?>">
                                <button class="sndrqst w-100" type="button" onclick="like('<?php echo $ProfileDetails['id']; ?>')">
                                     
                                    <img src="<?php echo base_url(); ?>assets/images/checked.png" class="wImg">
                                    like
                                </button>
                            </div>
                            

                        </div>
                    </div>
                    <div class="likeDislikeBox">
                        <div class="headBox">
                            <div class="row">
                                <div class="col-12 col-sm-7 d-flex align-items-center mb-3 mb-sm-0">
                                    <div class="w-100">
                                        <div class="youHim">
                                            <img src="<?php echo base_url() ?>assets/images/people.png">
                                            You & Him
                                        </div>
                                        <h3>Likes & Dislikes</h3>
                                        <?php
                                        $match = 0;
                                        if($LoggedUserProfileDetails['age']>=$partner_preference_data['partner_age_from'] && $LoggedUserProfileDetails['age']<=$partner_preference_data['partner_age_to']){
                                            $match++;
                                        }
                                        if($LoggedUserProfileDetails['height']>=$partner_preference_data['partner_height'] && $LoggedUserProfileDetails['height']<=$partner_preference_data['partner_height_to']){
                                            $match++;
                                        }
                                        if($LoggedUserProfileDetails['qualification'] == $partner_preference_data['qualification']){
                                            $match++;
                                        }
                                        if($LoggedUserProfileDetails['financial_status'] == $partner_preference_data['partner_familytype']){
                                            $match++;
                                        }

                                        ?>
                                        <p>Your profile matches with <span><?php echo $match; ?> / 4</span>  of <?= !empty($ProfileDetails['name'])? $ProfileDetails['name'] : '' ?>'s preferences!</p>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-5 d-flex justify-content-between align-items-center">
                                    <button type="button" class="btnLikeUnlike me-3">
                                        <img src="<?php echo base_url() ?>assets/images/like1.png" class="likeDislikeIcon" alt="like icon">
                                    </button>
                                    <button type="button" class="btnLikeUnlike">
                                        <img src="<?php echo base_url() ?>assets/images/dislike.png" class="likeDislikeIcon" alt="dislike icon">
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="px-3 pt-3">
                            <div class="row mb-2">
                                <div class="col-5 d-flex align-items-center">
                                    <p class="dtls">Age</p>
                                </div>
                                <div class="col-5 d-flex align-items-center">
                                    <p class="dtls"><?php echo $partner_preference_data['partner_age_from']; ?> -  <?php echo $partner_preference_data['partner_age_to']; ?> Yrs</p>
                                </div>
                                <div class="col-2 d-flex align-items-center justify-content-end">
                                    <?php if($LoggedUserProfileDetails['age']>=$partner_preference_data['partner_age_from'] && $LoggedUserProfileDetails['age']<=$partner_preference_data['partner_age_to']){ ?>
                                    <img src="<?php echo base_url() ?>assets/images/checkedG.png" class="chk">
                                    
                                    <?php } 
                                    else{ ?>
                                    <img src="<?php echo base_url() ?>assets/images/blocked.png" class="chk" >
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 d-flex align-items-center">
                                    <p class="dtls">Height</p>
                                </div>
                                <div class="col-5 d-flex align-items-center">
                                    <p class="dtls"><?php echo $partner_preference_data['height_from']; ?> -  <?php echo $partner_preference_data['height_to']; ?></p>
                                </div>
                                <div class="col-2 d-flex align-items-center justify-content-end">
                                    <?php if($LoggedUserProfileDetails['height']>=$partner_preference_data['partner_height'] && $LoggedUserProfileDetails['height']<=$partner_preference_data['partner_height_to']){ ?>
                                    <img src="<?php echo base_url() ?>assets/images/checkedG.png" class="chk">
                                    <?php } 
                                    else{ ?>
                                    <img src="<?php echo base_url() ?>assets/images/blocked.png" class="chk" >
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 d-flex align-items-center">
                                    <p class="dtls">Qualification</p>
                                </div>
                                <div class="col-5 d-flex align-items-center">
                                   
                                    <p class="dtls"><?php echo $partner_preference_data['qualification']; ?></p>

                                </div>
                                <div class="col-2 d-flex align-items-center justify-content-end">
                                    <?php if($LoggedUserProfileDetails['qualification'] == $partner_preference_data['qualification']){ ?>
                                    <img src="<?php echo base_url() ?>assets/images/checkedG.png" class="chk">
                                    <?php } 
                                    else{ ?>
                                    <img src="<?php echo base_url() ?>assets/images/blocked.png" class="chk" >
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 d-flex align-items-center">
                                    <p class="dtls">Family Type</p>
                                </div>
                                <div class="col-5 d-flex align-items-center">
                                    <p class="dtls"><?php echo $partner_preference_data['partner_familytype']; ?></p>
                                </div>
                                <div class="col-2 d-flex align-items-center justify-content-end">
                                    <?php if($LoggedUserProfileDetails['financial_status'] == $partner_preference_data['partner_familytype']){ ?>
                                    <img src="<?php echo base_url() ?>assets/images/checkedG.png" class="chk">
                                    <?php } 
                                    else{ ?>
                                    <img src="<?php echo base_url() ?>assets/images/blocked.png" class="chk" >
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 d-flex align-items-center">
                                    <p class="dtls">Expectation</p>
                                </div>
                                <div class="col-5 d-flex align-items-center">
                                    <p class="dtls"><?php echo $partner_preference_data['partner_expectation']; ?></p>
                                </div>
                                <div class="col-2 d-flex align-items-center justify-content-end">
                                    <!-- <img src="<?php echo base_url() ?>assets/images/checkedG.png" class="chk"> -->
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
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
                                <a href="javascript:void(0)">
                                    <img src="<?php echo base_url() ?>assets/images/playStore.png" alt="playStore" class="storeIcon" width="auto" height="auto">
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- diamond profile -->
                    <div class="diamondProBox">
                        <div class="topCurve"></div>
                        <p>Want better responses from your matches ?</p>
                        <img src="<?php echo base_url() ?>assets/images/diamondIcon.png">
                        <button type="button" class="diamndProBtn">
                            <img src="<?php echo base_url() ?>assets/images/crownW.png">
                            Get Diamond Profile
                        </button>
                    </div>
                </div>
                <div class="col-12 col-md-7 col-lg-8">
                   
                    <!-- single profile -->
                    
                    
                    <div class="row">
                        <div class="col-12 col-lg-6 d-flex align-items-stretch">
                            <div class="customCard">
                                <div class="customCardHeader">
                                    <h2 class="cardHead mb-md-0">Basic Information</h2>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6 d-flex justify-content-between align-items-center">
                                        <label class="form-label mb-0">Name</label>
                                        <span>:</span>
                                    </div>
                                    <div class="col-6 d-flex align-items-center">
                                        <p class="mb-0"><?= !empty($ProfileDetails['name'])? $ProfileDetails['name'] : '' ?></p>
                                    </div>
                                </div>
                                
                                
                                <div class="row mb-3">
                                    <div class="col-6 d-flex justify-content-between align-items-center">
                                        <label class="form-label mb-0">Gender</label>
                                        <span>:</span>
                                    </div>
                                    <div class="col-6 d-flex align-items-center">
                                        <p class="mb-0"><?= (isset($ProfileDetails['gender']) && !empty($ProfileDetails['gender'])) ? (($ProfileDetails['gender'] == '1') ? 'Male' : 'Female') : '' ?></p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6 d-flex justify-content-between align-items-center">
                                        <label class="form-label mb-0">Age</label>
                                        <span>:</span>
                                    </div>
                                    <div class="col-6 d-flex align-items-center">
                                        <p class="mb-0"><?= (isset($ProfileDetails['age']) && !empty($ProfileDetails['age'])) ? $ProfileDetails['age'] :'' ?></p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6 d-flex justify-content-between align-items-center">
                                        <label class="form-label mb-0">Marital Status</label>
                                        <span>:</span>
                                    </div>
                                    <div class="col-6 d-flex align-items-center">
                                        <p class="mb-0"><?= (isset($ProfileDetails['marital_status']) && !empty($ProfileDetails['marital_status'])) ? $ProfileDetails['marital_status'] : ''?></p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6 d-flex justify-content-between align-items-center">
                                        <label class="form-label mb-0">Mother Tongue</label>
                                        <span>:</span>
                                    </div>
                                    <div class="col-6 d-flex align-items-center">
                                        <p class="mb-0"><?= (isset($ProfileDetails['mothertongue']) && !empty($ProfileDetails['mothertongue'])) ? $ProfileDetails['mothertongue']  : ''?></p>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <div class="col-6 d-flex justify-content-between align-items-center">
                                        <label class="form-label mb-0">Hobbies</label>
                                        <span>:</span>
                                    </div>
                                    <div class="col-6 d-flex align-items-center">
                                        <p class="mb-0"><?= !empty($ProfileDetails['registration_hobbies']) && $ProfileDetails['registration_hobbies'] != 'NULL'? $ProfileDetails['registration_hobbies'] : '' ?></p>
                                    </div>

                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 d-flex align-items-stretch">
                            <div class="customCard">
                                <div class="customCardHeader">
                                    <h2 class="cardHead mb-md-0">Religious Information</h2>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6 d-flex justify-content-between align-items-center">
                                        <label class="form-label mb-0">Religion</label>
                                        <span>:</span>
                                    </div>
                                    <div class="col-6 d-flex align-items-center">
                                        <p class="mb-0">Muslim</p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6 d-flex justify-content-between align-items-center">
                                        <label class="form-label mb-0">Belief</label>
                                        <span>:</span>
                                    </div>
                                    <div class="col-6 d-flex align-items-center">
                                        <p class="mb-0"><?= (isset($ProfileDetails['user_caste']) && !empty($ProfileDetails['user_caste'])) ? $ProfileDetails['user_caste'] : '' ?></p>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-6 d-flex align-items-stretch">
                            <div class="customCard">
                                <div class="customCardHeader">
                                    <h2 class="cardHead mb-md-0">Professional</h2>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6 d-flex justify-content-between align-items-center">
                                        <label class="form-label mb-0">Highest Education</label>
                                        <span>:</span>
                                    </div>
                                    <div class="col-6 d-flex align-items-center">
                                        <p class="mb-0"><?= (isset($ProfileDetails['qualification']) && !empty($ProfileDetails['qualification'])) ? $ProfileDetails['qualification'] : '' ?></p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6 d-flex justify-content-between align-items-center">
                                        <label class="form-label mb-0">Job</label>
                                        <span>:</span>
                                    </div>
                                    <div class="col-6 d-flex align-items-center">
                                        <p class="mb-0"><?= (isset($ProfileDetails['job_name']) && !empty($ProfileDetails['job_name'])) ? $ProfileDetails['job_name'] : ''?></p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6 d-flex justify-content-between align-items-center">
                                        <label class="form-label mb-0">Profession</label>
                                        <span>:</span>
                                    </div>
                                    <div class="col-6 d-flex align-items-center">
                                        <p class="mb-0"><?= (isset($ProfileDetails['profession_name']) && !empty($ProfileDetails['profession_name'])) ? $ProfileDetails['profession_name'] : ''?></p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6 d-flex justify-content-between align-items-center">
                                        <label class="form-label mb-0">Job status</label>
                                        <span>:</span>
                                    </div>
                                    <div class="col-6 d-flex align-items-center">
                                        <p class="mb-0"><?= (isset($ProfileDetails['job_category']) && !empty($ProfileDetails['job_category'])) ? $ProfileDetails['job_category'] : '' ?></p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6 d-flex justify-content-between align-items-center">
                                        <label class="form-label mb-0">Annual Income</label>
                                        <span>:</span>
                                    </div>
                                    <div class="col-6 d-flex align-items-center">
                                        <p class="mb-0"><?= !empty($ProfileDetails['annual_income']) && $ProfileDetails['annual_income'] != 'NULL'? $ProfileDetails['annual_income'] : '' ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 d-flex align-items-stretch">
                            <div class="customCard">
                                <div class="customCardHeader">
                                    <h2 class="cardHead mb-md-0">Physical Attributes</h2>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6 d-flex justify-content-between align-items-center">
                                        <label class="form-label mb-0">Height</label>
                                        <span>:</span>
                                    </div>
                                    <div class="col-6 d-flex align-items-center">
                                        <p class="mb-0"><?= (isset($ProfileDetails['user_height']) && !empty($ProfileDetails['user_height'])) ? $ProfileDetails['user_height'] : '' ?></p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6 d-flex justify-content-between align-items-center">
                                        <label class="form-label mb-0">Weight</label>
                                        <span>:</span>
                                    </div>
                                    <div class="col-6 d-flex align-items-center">
                                        <p class="mb-0"><?= (isset($ProfileDetails['weight']) && !empty($ProfileDetails['weight'])) ? $ProfileDetails['weight'] : '' ?></p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6 d-flex justify-content-between align-items-center">
                                        <label class="form-label mb-0">Color</label>
                                        <span>:</span>
                                    </div>
                                    <div class="col-6 d-flex align-items-center">
                                        <p class="mb-0"><?= (isset($ProfileDetails['color']) && !empty($ProfileDetails['color'])) ? $ProfileDetails['color'] : '' ?></p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6 d-flex justify-content-between align-items-center">
                                        <label class="form-label mb-0">Physical status</label>
                                        <span>:</span>
                                    </div>
                                    <div class="col-6 d-flex align-items-center">
                                        <p class="mb-0"><?= (isset($ProfileDetails['physical_status']) && !empty($ProfileDetails['physical_status'])) ? $ProfileDetails['physical_status'] : '' ?></p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6 d-flex justify-content-between align-items-center">
                                        <label class="form-label mb-0">Blood Group</label>
                                        <span>:</span>
                                    </div>
                                    <div class="col-6 d-flex align-items-center">
                                        <p class="mb-0"><?= (isset($ProfileDetails['blood_group']) && !empty($ProfileDetails['blood_group'])) ? $ProfileDetails['blood_group'] : '' ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-6 d-flex align-items-stretch">
                            <div class="customCard">
                                <div class="customCardHeader">
                                    <h2 class="cardHead mb-md-0">Location</h2>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6 d-flex justify-content-between align-items-center">
                                        <label class="form-label mb-0">City/Street</label>
                                        <span>:</span>
                                    </div>
                                    <div class="col-6 d-flex align-items-center">
                                        <p class="mb-0"><?= !empty($ProfileDetails['native_place']) && $ProfileDetails['native_place'] != 'NULL' ? $ProfileDetails['native_place'] : '' ?></p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6 d-flex justify-content-between align-items-center">
                                        <label class="form-label mb-0">Pincode</label>
                                        <span>:</span>
                                    </div>
                                    <div class="col-6 d-flex align-items-center">
                                        <p class="mb-0"><?= !empty($ProfileDetails['pincode']) && $ProfileDetails['pincode'] != 'NULL' ? $ProfileDetails['pincode'] : '' ?></p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6 d-flex justify-content-between align-items-center">
                                        <label class="form-label mb-0">District</label>
                                        <span>:</span>
                                    </div>
                                    <div class="col-6 d-flex align-items-center">
                                        <p class="mb-0"><?= (isset($ProfileDetails['district']) && !empty($ProfileDetails['district'])) ? $ProfileDetails['district'] : '' ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 d-flex align-items-stretch">
                            <div class="customCard">
                                <div class="customCardHeader">
                                    <h2 class="cardHead mb-md-0">Family</h2>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6 d-flex justify-content-between align-items-center">
                                        <label class="form-label mb-0">Father's Name</label>
                                        <span>:</span>
                                    </div>
                                    <div class="col-6 d-flex align-items-center">
                                        <p class="mb-0"><?= !empty($ProfileDetails['fathers_name']) && $ProfileDetails['fathers_name'] != 'NULL'? $ProfileDetails['fathers_name'] : '' ?></p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6 d-flex justify-content-between align-items-center">
                                        <label class="form-label mb-0">Occupation of Father</label>
                                        <span>:</span>
                                    </div>
                                    <div class="col-6 d-flex align-items-center">
                                        <p class="mb-0"><?= !empty($ProfileDetails['fathers_occupation']) && $ProfileDetails['fathers_occupation'] != 'NULL'? $ProfileDetails['fathers_occupation'] : '' ?></p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6 d-flex justify-content-between align-items-center">
                                        <label class="form-label mb-0">Mother's Name</label>
                                        <span>:</span>
                                    </div>
                                    <div class="col-6 d-flex align-items-center">
                                        <p class="mb-0"><?= !empty($ProfileDetails['mothers_name']) && $ProfileDetails['mothers_name'] != 'NULL'? $ProfileDetails['mothers_name'] : '' ?></p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6 d-flex justify-content-between align-items-center">
                                        <label class="form-label mb-0">Occupation of Mother</label>
                                        <span>:</span>
                                    </div>
                                    <div class="col-6 d-flex align-items-center">
                                        <p class="mb-0"><?= !empty($ProfileDetails['mothers_occupation']) && $ProfileDetails['mothers_occupation'] != 'NULL'? $ProfileDetails['mothers_occupation'] : '' ?></p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6 d-flex justify-content-between align-items-center">
                                        <label class="form-label mb-0">Number of family members</label>
                                        <span>:</span>
                                    </div>
                                    <div class="col-6 d-flex align-items-center">
                                        <p class="mb-0"><?= (isset($ProfileDetails['total_members']) && !empty($ProfileDetails['total_members'])) ? $ProfileDetails['total_members']: '' ?></p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6 d-flex justify-content-between align-items-center">
                                        <label class="form-label mb-0">Financial Status</label>
                                        <span>:</span>
                                    </div>
                                    <div class="col-6 d-flex align-items-center">
                                        <p class="mb-0"><?= (isset($ProfileDetails['financial_status']) && !empty($ProfileDetails['financial_status'])) ? $ProfileDetails['financial_status']  : '' ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="profileListBox">
                        <div class="row">
                            <div class="col-12 col-sm-6 d-flex align-items-center">
                                <h5 class="listTypeHead">Similar profiles</h5>
                            </div>
                            <div class="col-12 col-sm-6 d-flex align-items-center justify-content-sm-end">
                                <a href="<?php echo site_url('user/featured_profiles'); ?>">View All</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="owl-similerProfile owl-carousel owl-theme">
                                    <?php 
                         if(empty($MatchingProfiles)){ ?>
                                <center><h6 style="color:red"><b>No Matching Profiles Found</b></h6></center>
                         <?php } 
                         else{

                            foreach ($MatchingProfiles as $key) { ?>
                                    <div class="item">
                                        <a href="<?php echo site_url('user/singleprofile/'.$key->id); ?>">
                                            <div class="proLstBox">
                                               <?php 
                                               if(empty($key->user_image)){ 
                                                if($key->gender== 1){ ?>
                                                    <img src="<?php echo base_url('/assets/photo_storage/male.jpg'); ?>" alt="profile image" class="proImg">
                                                <?php }
                                                else if($key->gender== 2){ ?>
                                                    <img src="<?php echo base_url('/assets/photo_storage/female.jpg'); ?>" alt="profile image" class="proImg">
                                                <?php }
                                                 } 
                                                 else{ 
                                                     $photo_status = $this->General_Model->check_photoStatus($key->user_image);
                                                     if($photo_status->status != 0 && $photo_status->status != 1){
                                                     $sender_id = $this->session->userdata('user_id');
                                                        $receiver_id = $key->id;
                                                        $photo_privacy = $this->General_Model->photoprivacy($sender_id,$receiver_id);
                                                        if($photo_privacy !=1){?>
                                                            <img src="<?php echo base_url('/assets/photo_storage/'.$key->user_image); ?>" alt="profile image" class="proImg">
    
                                                     <?php }
                                                         else{?>
                                                         <?php $file_pointer = 'assets/photo_storage_blur/'.$key->user_image;
                                                         if(file_exists($file_pointer)){?>
                                                         <img src="<?php echo base_url('/assets/photo_storage_blur/'.$key->user_image); ?>" alt="profile image" class="proImg">
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
                                                        <?php }
                                                         }?>
                                                         <?php }
                                                     }
                                                    else{
                                                        if($key->gender== 1){ ?>
                                                        <img src="<?php echo base_url('/assets/photo_storage/male.jpg'); ?>" alt="profile image" class="proImg">
                                                        <?php }
                                                        else if($key->gender== 2){ ?>
                                                            <img src="<?php echo base_url('/assets/photo_storage/female.jpg'); ?>" alt="profile image" class="proImg">
                                                        <?php }
                                                    }
                                                 } ?>
                                                <div class="overlay"></div>
                                                <div class="contentBox">
                                                    <div class="d-flex mb-2">
                                                        <div class="flex-shrink-0">
                                                            <img src="<?php echo base_url() ?>assets/images/name.png" alt="name" class="profileico" width="auto" height="auto">
                                                        </div>
                                                        <div class="flex-grow-1 ms-2">
                                                            <span class="proDtls"><?php echo $key->name;?></span>
                                                            <span class="proDtls"><?php echo $key->age;?> Yrs, <?php echo $key->height;?> </span>
                                                            <span class="proDtls"><?php echo $key->job_name;?></span>
                                                            <span class="proDtls">Muslim
                                                            <?php 
                                                            if(!empty($key->user_caste) && $key->user_caste !='NULL'){ 
                                                                        echo ',';
                                                                        echo $key->user_caste; 
                                                            }  ?>
                                                            </span>
                                                            <span class="proDtls">
                                                            <?php 
                                                            if(!empty($key->native_place) && $key->native_place !='NULL' && !empty($key->native_place) && $key->native_place !='NULL'){ 

                                                                        echo $key->native_place; 
                                                                        echo ',';
                                                                        echo $key->district; 
                                                            }
                                                            else if(!empty($key->native_place) && $key->native_place !='NULL'){ 
                                                                        echo ',';
                                                                        echo $key->native_place; 
                                                            } 
                                                            else if(!empty($key->district) && $key->district !='NULL'){        echo ',';
                                                                        echo $key->district; 
                                                            }?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php }  
                                }?>     
                                </div>
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

    <div class="modal fade" id="proLockModal" tabindex="-1" aria-labelledby="proLockModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body p-5">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="d-flex align-items-center">
                        <?php 
                        if(empty($payment_done))
                        {?>
                            <img class="logo" src="<?= base_url()?>assets/images/HappyNikah.png">
                            <h3 class="h3_message">To view the contact details, <br>Please contact: <br><a href="tel:+918593999888"><i class="fa fa-phone fa-spin" aria-hidden="true"></i> 8593999888</a></h3>
                        <?php }
                        else
                        {
                            $expiry_date = strtotime($payment_done[0]->expiry_date);
                            $today_date = strtotime(date('Y-m-d'));
                            $datediff = $today_date - $expiry_date;
                            $round_diff = round($datediff/(60*60*24));
                            if($round_diff < '0')
                            {
                                $uri_profileID = $this->uri->segment(3);
                                $check_profileID = $this->General_Model->check_profileID_contactview($this->session->userdata('user_id'),$uri_profileID);
                                if(!empty($check_profileID))
                                {   ?>
                                        
                                        <div class="flex-grow-1 ms-3">
                                            <h3>Contact Information</h3>
                                           <div class="row mb-3">
                                                    <div class="col-6 d-flex justify-content-between align-items-center">
                                                        <label class="form-label mb-0">Name</label>
                                                        <span>:</span>
                                                    </div>
                                                    <div class="col-6 d-flex align-items-center">
                                                        <p class="mb-0"><?= !empty($ProfileDetails['name'])? $ProfileDetails['name'] : '____________' ?></p>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-6 d-flex justify-content-between align-items-center">
                                                        <label class="form-label mb-0">Contact Number</label>
                                                        <span>:</span>
                                                    </div>
                                                    <div class="col-6 d-flex align-items-center">
                                                        <p class="mb-0"><?= !empty($ProfileDetails['phone']) && $ProfileDetails['phone'] != 'NULL' ? $ProfileDetails['phone'] : '____________' ?></p>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-6 d-flex justify-content-between align-items-center">
                                                        <label class="form-label mb-0">Email</label>
                                                        <span>:</span>
                                                    </div>
                                                    <div class="col-6 d-flex align-items-center">
                                                        <p class="mb-0"><?= !empty($ProfileDetails['mail']) && $ProfileDetails['mail'] != 'NULL' ? $ProfileDetails['mail'] : '____________' ?></p>
                                                    </div>
                                                </div>
                                                
                                                
                                                
                                                
                                                <div class="row mb-3">
                                                    <div class="col-6 d-flex justify-content-between align-items-center">
                                                        <label class="form-label mb-0">Other Contact Number</label>
                                                        <span>:</span>
                                                    </div>
                                                    <div class="col-6 d-flex align-items-center">
                                                        <p class="mb-0"><?= !empty($ProfileDetails['other_contact_number']) && $ProfileDetails['other_contact_number'] != 'NULL'? $ProfileDetails['other_contact_number'] : '____________' ?></p>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-6 d-flex justify-content-between align-items-center">
                                                        <label class="form-label mb-0">Father's Name</label>
                                                        <span>:</span>
                                                    </div>
                                                    <div class="col-6 d-flex align-items-center">
                                                        <p class="mb-0"><?= !empty($ProfileDetails['fathers_name']) && $ProfileDetails['fathers_name'] != 'NULL'? $ProfileDetails['fathers_name'] : '____________' ?></p>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-6 d-flex justify-content-between align-items-center">
                                                        <label class="form-label mb-0">City/Street</label>
                                                        <span>:</span>
                                                    </div>
                                                    <div class="col-6 d-flex align-items-center">
                                                        <p class="mb-0"><?= !empty($ProfileDetails['native_place']) && $ProfileDetails['native_place'] != 'NULL' ? $ProfileDetails['native_place'] : '' ?></p>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-6 d-flex justify-content-between align-items-center">
                                                        <label class="form-label mb-0">District</label>
                                                        <span>:</span>
                                                    </div>
                                                    <div class="col-6 d-flex align-items-center">
                                                        <p class="mb-0"><?= (isset($ProfileDetails['district']) && !empty($ProfileDetails['district'])) ? $ProfileDetails['district'] : '' ?></p>
                                                    </div>
                                                </div>
                                        </div>
                                    <?php
                                }
                                else{
                                    if(count($contact_viewed) == $payment_done[0]->contacts)
                                    {
                                        echo "<img class='logo' src='".base_url()."assets/images/HappyNikah.png'><h3 class='h3_message'>You have viewed ".$payment_done[0]->contacts." contacts. <br><a href='".base_url()."index.php/user/upgradeto_premium'>Upgrade to premium</a>.</h3>";
                                    }
                                    else{
                                        ?>
                                       
                                        <div class="flex-grow-1 ms-3">
                                            <h3>Contact Information</h3>
                                           <div class="row mb-3">
                                                    <div class="col-6 d-flex justify-content-between align-items-center">
                                                        <label class="form-label mb-0">Name</label>
                                                        <span>:</span>
                                                    </div>
                                                    <div class="col-6 d-flex align-items-center">
                                                        <p class="mb-0"><?= !empty($ProfileDetails['name'])? $ProfileDetails['name'] : '____________' ?></p>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-6 d-flex justify-content-between align-items-center">
                                                        <label class="form-label mb-0">Contact Number</label>
                                                        <span>:</span>
                                                    </div>
                                                    <div class="col-6 d-flex align-items-center">
                                                        <p class="mb-0"><?= !empty($ProfileDetails['phone']) && $ProfileDetails['phone'] != 'NULL' ? $ProfileDetails['phone'] : '____________' ?></p>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-6 d-flex justify-content-between align-items-center">
                                                        <label class="form-label mb-0">Email</label>
                                                        <span>:</span>
                                                    </div>
                                                    <div class="col-6 d-flex align-items-center">
                                                        <p class="mb-0"><?= !empty($ProfileDetails['mail']) && $ProfileDetails['mail'] != 'NULL' ? $ProfileDetails['mail'] : '____________' ?></p>
                                                    </div>
                                                </div>
                                                
                                                
                                                
                                                
                                                <div class="row mb-3">
                                                    <div class="col-6 d-flex justify-content-between align-items-center">
                                                        <label class="form-label mb-0">Other Contact Number</label>
                                                        <span>:</span>
                                                    </div>
                                                    <div class="col-6 d-flex align-items-center">
                                                        <p class="mb-0"><?= !empty($ProfileDetails['other_contact_number']) && $ProfileDetails['other_contact_number'] != 'NULL'? $ProfileDetails['other_contact_number'] : '____________' ?></p>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-6 d-flex justify-content-between align-items-center">
                                                        <label class="form-label mb-0">Father's Name</label>
                                                        <span>:</span>
                                                    </div>
                                                    <div class="col-6 d-flex align-items-center">
                                                        <p class="mb-0"><?= !empty($ProfileDetails['fathers_name']) && $ProfileDetails['fathers_name'] != 'NULL'? $ProfileDetails['fathers_name'] : '____________' ?></p>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-6 d-flex justify-content-between align-items-center">
                                                        <label class="form-label mb-0">City/Street</label>
                                                        <span>:</span>
                                                    </div>
                                                    <div class="col-6 d-flex align-items-center">
                                                        <p class="mb-0"><?= !empty($ProfileDetails['native_place']) && $ProfileDetails['native_place'] != 'NULL' ? $ProfileDetails['native_place'] : '' ?></p>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-6 d-flex justify-content-between align-items-center">
                                                        <label class="form-label mb-0">District</label>
                                                        <span>:</span>
                                                    </div>
                                                    <div class="col-6 d-flex align-items-center">
                                                        <p class="mb-0"><?= (isset($ProfileDetails['district']) && !empty($ProfileDetails['district'])) ? $ProfileDetails['district'] : '' ?></p>
                                                    </div>
                                                </div>
                                        </div>
                                    <?php
                                    }
                                }

                                
                            }
                            else
                            {
                                 echo "<img class='logo' src='".base_url()."assets/images/HappyNikah.png'><h3 class='h3_message'>Your Plan has been Expired. <br><a href='".base_url()."index.php/user/upgradeto_premium'>Upgrade to premium</a>.</h3>";
                            }   
                        }?>
                    </div>
                </div>
            </div>
        </div>
    </div>


    
<div class="modal fade" id="photorequestModal" tabindex="-1" aria-labelledby="photorequestModalLabel" aria-hidden="true">
        
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-body p-5 bgbody">
                    <h3 class="">Request Photo<br></h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="d-flex align-items-center">
                        
                        <!-- <img class="logo" src="<?= base_url()?>assets/images/HappyNikah.png"> -->
                            
                            <p>The Photo has been protected by the owner of this profile. Please click on the below button to request for photo.</p>

                        
                    </div>
                </div>
                <?php
                $check_requested = $this->General_Model->check_photo_requested($this->session->userdata('user_id'),$ProfileDetails['id']);
                if($check_requested == '1')
                {?>
                    <button class="btn btn-requestphoto">Requested for photo</button>
                <?php }
                else{?>
                    <button onclick="requestphoto('<?= $ProfileDetails['id']?>')" class="btn btn-requestphoto">Request photo</button>
                <?php }
                ?>
                
            </div>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/owl.carousel.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            // burger menu
            $(".hamburger").click(function(){
                $(this).toggleClass("is-active");
                $('body').toggleClass("is-scroll-disabled");
            });
            // burger menu end

            // send request btn
            // $(".sndrqst").click(function(){
            //     $(this).toggleClass("clicked");
            // });

            // similer Profile slider
            $(".owl-similerProfile").owlCarousel({
                margin: 25,
                responsiveClass: true,
                nav: true,
                dots: false,
                autoplay: true,
                autoplayHoverPause: false,
                loop:false,
                responsive: {
                    0: {
                        items: 1,
                    },
                    576: {
                        items: 2,
                    },
                    768: {
                        items: 2,
                    },
                    992: {
                        items: 3,
                    },
                    1200: {
                        items: 3,
                    },
                    1400: {
                        items: 4,
                    }
                },
            });
            // similer Profile end
            
        });





         function sendinterest(receiver_id){

         
         url_address='<?php echo site_url('user/send_interest'); ?>';
                data = { receiver_id : receiver_id};
                $.ajax({
                    type: "post",
                    url: url_address,
                    data: data,
                    success: function(response){ 
                       $('#interest_done').toggle();
                       $('#interest').toggle();
                  },
                     


        });

    }

    function shortlist(receiver_id){

         
         url_address='<?php echo site_url('user/shortlist'); ?>';
                data = { receiver_id : receiver_id};
                $.ajax({
                    type: "post",
                    url: url_address,
                    data: data,
                    success: function(response){ 
                       $('#shortlist_done').toggle();
                       $('#shortlist').toggle();
                  },
                     


        });

    }

    function like(receiver_id){

         
         url_address='<?php echo site_url('user/like'); ?>';
                data = { receiver_id : receiver_id};
                $.ajax({
                    type: "post",
                    url: url_address,
                    data: data,
                    success: function(response){ 
                       $('#liked').toggle();
                       $('#like').toggle();
                  },
                     


        });

    }




    function blockuser(receiver_id){


         url_address='<?php echo site_url('user/block'); ?>';
                data = { receiver_id : receiver_id};
                $.ajax({
                    type: "post",
                    url: url_address,
                    data: data,
                    success: function(response){ 
                       $('#block_done').toggle();
                       $('#block').toggle();
                  },
                     


        });





    }

     function contact(receiver_id){


         url_address='<?php echo site_url('user/contact'); ?>';
                data = { receiver_id : receiver_id};
                $.ajax({
                    type: "post",
                    url: url_address,
                    data: data,
                    success: function(response){ 
                       // $('#block_done').toggle();
                       // $('#block').toggle();
                  },
                     


        });





    }
    
    $('#proLockModal').on('hidden.bs.modal', function () {
     location.reload();
    })

    function requestphoto(receiver_id)
    {
        url_address='<?php echo site_url('user/photorequest'); ?>';
        
        $.ajax({
            type: "post",
            url: url_address,
            data: { receiver_id : receiver_id},
            success: function(response){ 
               // $('#block_done').toggle();
               // $('#block').toggle();
               $('.btn-requestphoto').html('Requesting for photo')
               
               setTimeout(function(){ 
                   location.reload();
                }, 1300);
            },
        });
    }

        
    </script>
    

</body>
</html>

