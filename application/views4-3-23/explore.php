<!DOCTYPE html>
<html>
<?php include('include/header.php'); ?>
<style type="text/css">
    .acceptbtn{
        background: #1ebb88;
        color: white;
        padding: 5px 9px;
        border: 0;
        border-radius: 18px;
        width:49%;
        float: left;
    }
    .declinebtn{
        background: #c71744;
        color: white;
        padding: 5px 9px;
        border: 0;
        border-radius: 18px;
        width:49%;
        float: right;
    }
    .actionbtn{
        widows: 100%;
        margin-top: 10px;
    }
    .acceptedbtn{

        background: #1ebb88;
        color: white;
        padding: 5px 9px;
        border: 0;
        border-radius: 18px;
        width:100%;
        float: left;

    }
    .declinedbtn{
        background: #c71744;
        color: white;
        padding: 5px 9px;
        border: 0;
        border-radius: 18px;
        width:100%;
        float: right;
    }
    .pendingbtn{

        background: #1295c7;
        color: white;
        padding: 5px 9px;
        border: 0;
        border-radius: 18px;
        width:100%;
        float: right;

    }
</style>
    <section id="userContent">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-5 col-lg-4">
                    <?php include('include/user_info.php') ?>

                    <!-- explore tabs -->
                    <div class="nav flex-column nav-pills mb-5 exploreTabs d-none d-md-flex" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <button class="nav-link active" id="v-pills-intrests-tab" data-bs-toggle="pill" data-bs-target="#v-pills-intrests" type="button" role="tab" aria-controls="v-pills-intrests" aria-selected="true">
                            <div class="iconBox">
                                <img src="<?php echo base_url() ?>assets/images/intrestsW.png" class="whiteImg">
                                <img src="<?php echo base_url() ?>assets/images/intrestsC.png" class="colorImg">
                            </div>
                            INTERESTS
                        </button>
                        <!-- <button class="nav-link" id="v-pills-profileVisit-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profileVisit" type="button" role="tab" aria-controls="v-pills-profileVisit" aria-selected="false">
                            <div class="iconBox">
                                <img src="<?php echo base_url() ?>assets/images/profileVisitW.png" class="whiteImg">
                                <img src="<?php echo base_url() ?>assets/images/profileVisit.png" class="colorImg">
                            </div>
                            PROFILE VISITS
                        </button> -->
                        <!-- <button class="nav-link" id="v-pills-contacts-tab" data-bs-toggle="pill" data-bs-target="#v-pills-contacts" type="button" role="tab" aria-controls="v-pills-contacts" aria-selected="false">
                            <div class="iconBox">
                                <img src="<?php echo base_url() ?>assets/images/contactW.png" class="whiteImg">
                                <img src="<?php echo base_url() ?>assets/images/contact.png" class="colorImg">
                            </div>
                            CONTACTS
                        </button> -->
                     <!--    <button class="nav-link" id="v-pills-shortlist-tab" data-bs-toggle="pill" data-bs-target="#v-pills-shortlist" type="button" role="tab" aria-controls="v-pills-shortlist" aria-selected="false">
                            <div class="iconBox">
                                <img src="<?php echo base_url() ?>assets/images/shortlistW.png" class="whiteImg">
                                <img src="<?php echo base_url() ?>assets/images/shortlist.png" class="colorImg">
                            </div>
                            SHORTLIST
                        </button>
                        <button class="nav-link" id="v-pills-blocked-tab" data-bs-toggle="pill" data-bs-target="#v-pills-blocked" type="button" role="tab" aria-controls="v-pills-blocked" aria-selected="false">
                            <div class="iconBox">
                                <img src="<?php echo base_url() ?>assets/images/blockedW.png" class="whiteImg">
                                <img src="<?php echo base_url() ?>assets/images/blocked.png" class="colorImg">
                            </div>
                            BLOCKED
                        </button> -->
                       <!--  <button class="nav-link" id="v-pills-skipped-tab" data-bs-toggle="pill" data-bs-target="#v-pills-skipped" type="button" role="tab" aria-controls="v-pills-skipped" aria-selected="false">
                            <div class="iconBox">
                                <img src="<?php echo base_url() ?>assets/images/skippedW.png" class="whiteImg">
                                <img src="<?php echo base_url() ?>assets/images/skipped.png" class="colorImg">
                            </div>
                            SKIPPED
                        </button> -->
                    </div>
                    <?php include('include/side_menu.php'); ?>
                </div>
                <div class="col-12 col-md-7 col-lg-8">
                    <!-- search -->
                    <?php include('include/search.php') ?>
                    <!-- explore tabs -->
                    <div class="nav flex-column nav-pills mb-5 exploreTabs d-md-none" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <button class="nav-link active" id="v-pills-intrests-tab" data-bs-toggle="pill" data-bs-target="#v-pills-intrests" type="button" role="tab" aria-controls="v-pills-intrests" aria-selected="true">
                            <div class="iconBox">
                                <img src="<?php echo base_url() ?>assets/images/intrestsW.png" class="whiteImg">
                                <img src="<?php echo base_url() ?>assets/images/intrestsC.png" class="colorImg">
                            </div>
                            INTRESTS
                        </button>
                        <button class="nav-link" id="v-pills-profileVisit-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profileVisit" type="button" role="tab" aria-controls="v-pills-profileVisit" aria-selected="false">
                            <div class="iconBox">
                                <img src="<?php echo base_url() ?>assets/images/profileVisitW.png" class="whiteImg">
                                <img src="<?php echo base_url() ?>assets/images/profileVisit.png" class="colorImg">
                            </div>
                            PROFILE VISITS
                        </button>
                        <button class="nav-link" id="v-pills-contacts-tab" data-bs-toggle="pill" data-bs-target="#v-pills-contacts" type="button" role="tab" aria-controls="v-pills-contacts" aria-selected="false">
                            <div class="iconBox">
                                <img src="<?php echo base_url() ?>assets/images/contactW.png" class="whiteImg">
                                <img src="<?php echo base_url() ?>assets/images/contact.png" class="colorImg">
                            </div>
                            CONTACTS
                        </button>
                        <button class="nav-link" id="v-pills-shortlist-tab" data-bs-toggle="pill" data-bs-target="#v-pills-shortlist" type="button" role="tab" aria-controls="v-pills-shortlist" aria-selected="false">
                            <div class="iconBox">
                                <img src="<?php echo base_url() ?>assets/images/shortlistW.png" class="whiteImg">
                                <img src="<?php echo base_url() ?>assets/images/shortlist.png" class="colorImg">
                            </div>
                            SHORTLIST
                        </button>
                        <button class="nav-link" id="v-pills-blocked-tab" data-bs-toggle="pill" data-bs-target="#v-pills-blocked" type="button" role="tab" aria-controls="v-pills-blocked" aria-selected="false">
                            <div class="iconBox">
                                <img src="<?php echo base_url() ?>assets/images/blockedW.png" class="whiteImg">
                                <img src="<?php echo base_url() ?>assets/images/blocked.png" class="colorImg">
                            </div>
                            BLOCKED
                        </button>
                        <button class="nav-link" id="v-pills-skipped-tab" data-bs-toggle="pill" data-bs-target="#v-pills-skipped" type="button" role="tab" aria-controls="v-pills-skipped" aria-selected="false">
                            <div class="iconBox">
                                <img src="<?php echo base_url() ?>assets/images/skippedW.png" class="whiteImg">
                                <img src="<?php echo base_url() ?>assets/images/skipped.png" class="colorImg">
                            </div>
                            SKIPPED
                        </button>
                    </div>
                    
                    <!-- explore content -->
                    <div class="tab-content exploreContents" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-intrests" role="tabpanel" aria-labelledby="v-pills-intrests-tab">
                            <ul class="nav nav-pills nav-fill" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-intrestRecvd-tab" data-bs-toggle="pill" data-bs-target="#pills-intrestRecvd" type="button" role="tab" aria-controls="pills-intrestRecvd" aria-selected="true">Received</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-intrestSent-tab" data-bs-toggle="pill" data-bs-target="#pills-intrestSent" type="button" role="tab" aria-controls="pills-intrestSent" aria-selected="false">Sent</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-intrestAccptd-tab" data-bs-toggle="pill" data-bs-target="#pills-intrestAccptd" type="button" role="tab" aria-controls="pills-intrestAccptd" aria-selected="false">Accepted</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-intrestIgnord-tab" data-bs-toggle="pill" data-bs-target="#pills-intrestIgnord" type="button" role="tab" aria-controls="pills-intrestIgnord" aria-selected="false">Ignored</button>
                                </li>
                            </ul>
                            <div class="tab-content profileListBox ">
                                <div class="tab-pane fade show active" id="pills-intrestRecvd" role="tabpanel" aria-labelledby="pills-recvd-tab">

                                <?php
 $InterestExpressed =     $this->db->select('*')->from('tbl_interest')->where('receiver_id',$_SESSION['user_id'] )->get()->result(); 

  if(!empty($InterestExpressed)){ ?>
  <div class="owl-similerProfile owl-carousel owl-theme" id="datasappend">

<?php  foreach($InterestExpressed as $key){ 


 $ProfileDetails = $this->General_Model->GetProfileDetails($key->sender_id);  ?>
                                        <div class="item">
                                            <a href="#">
                                                <div class="proLstBox">
                                                    
 <?php if(empty($ProfileDetails['photo'])){ 
                                            if($ProfileDetails['gender']== 1){ ?>
                                                <img src="<?php echo base_url('/assets/photo_storage/male.jpg'); ?>" alt="profile image" class="proImg">
                                            <?php }
                                            else if($ProfileDetails['gender']== 2){ ?>
                                                <img src="<?php echo base_url('/assets/photo_storage/female.jpg'); ?>" alt="profile image" class="proImg">
                                            <?php }
                                     } 
                                     else{ ?>
                                            <img src="<?php echo base_url('/assets/photo_storage/'.$ProfileDetails['photo']); ?>" alt="profile image" class="proImg">

                                     <?php } ?>


                                                    <div class="overlay"></div>
                                                    <div class="contentBox">
                                                        <div class="d-flex mb-2">
                                                           
                                                            <div class="flex-grow-1 ms-2">
                                                                <span class="proDtls"><?php echo $ProfileDetails['name'];?></span>
                                                                <span class="proDtls"><?php echo $ProfileDetails['age'];?> Yrs, <?php echo $key->height;?></span>
                                                                <span class="proDtls">Accounting Professional</span>
                                                                <span class="proDtls">Muslim, <?php 
                                                if(!empty($ProfileDetails['user_caste']) && $ProfileDetails['user_caste'] !='NULL'){ 
                                                            echo ',';
                                                            echo $ProfileDetails['user_caste']; 
                                        }  ?></span>
                                                                <span class="proDtls">
                                                                    
                                                                     <?php 
                                                    if(!empty($ProfileDetails['native_place']) && $ProfileDetails['native_place'] !='NULL' && !empty($ProfileDetails['district']) && $ProfileDetails['district'] !='NULL'){ 

                                                                echo $ProfileDetails['native_place']; 
                                                                echo ',';
                                                                echo $ProfileDetails['district']; 
                                                    }
                                                    else if(!empty($ProfileDetails['native_place']) && $ProfileDetails['native_place'] !='NULL'){ 
                                                                echo ',';
                                                                echo $ProfileDetails['native_place']; 
                                                    } 
                                                    else if(!empty($ProfileDetails['district']) && $ProfileDetails['district'] !='NULL'){        echo ',';
                                                                echo $ProfileDetails['district']; 
                                                    }?>
                                                                </span>
                                                              
                                                            </div>


                                                        </div>


<div class="actionbtn">

 <?php if($key->status == 1){ ?>
 
 <button class="acceptedbtn">You Accepted</button>

 <?php }else  if($key->status == 2){ ?>
 
 <button class="declinedbtn">You Declined</button>

 <?php }else{ ?>

 <button class="acceptbtn" onclick="interestaction('<?php echo $_SESSION['user_id']; ?>','<?php echo $key->sender_id; ?>','1')">Accept</button>
 <button class="declinebtn" onclick="interestaction('<?php echo $_SESSION['user_id']; ?>','<?php echo $key->sender_id; ?>','2')">Decline</button>
<?php } ?>

</div> 




                                                    </div>
                                                </div>
                                            </a>
                                        </div>


                                        <?php }  ?>

                                       </div> 
                                       <?php }  if(empty($InterestExpressed)){ ?>
 
 
                                    <div class="cmpltProfileBox">
                                        <img src="<?php echo base_url() ?>assets/images/heart.png">
                                        <h3>Interest Received</h3>
                                        <p>People who have interested you, will appear here. Complete your Profile to increase your chances.</p>
                                    </div>

                                   <?php } ?>
                               
                                    
                                </div>
                                <div class="tab-pane fade" id="pills-intrestSent" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    
     <?php
 $InterestExpressed =     $this->db->select('*')->from('tbl_interest')->where('sender_id',$_SESSION['user_id'] )->get()->result(); 



                                 if(!empty($InterestExpressed)){ ?>
                                    <div class="owl-similerProfile owl-carousel owl-theme" id="datasappend">

    <?php  foreach($InterestExpressed as $key){ 


$ProfileDetails = $this->General_Model->GetProfileDetails($key->receiver_id);

        ?>
                                        <div class="item">
                                            <a href="#">
                                                <div class="proLstBox">
                                                    
 <?php if(empty($ProfileDetails['photo'])){ 
                                            if($ProfileDetails['gender']== 1){ ?>
                                                <img src="<?php echo base_url('/assets/photo_storage/male.jpg'); ?>" alt="profile image" class="proImg">
                                            <?php }
                                            else if($ProfileDetails['gender']== 2){ ?>
                                                <img src="<?php echo base_url('/assets/photo_storage/female.jpg'); ?>" alt="profile image" class="proImg">
                                            <?php }
                                     } 
                                     else{ ?>
                                            <img src="<?php echo base_url('/assets/photo_storage/'.$ProfileDetails['photo']); ?>" alt="profile image" class="proImg">

                                     <?php } ?>


                                                    <div class="overlay"></div>
                                                    <div class="contentBox">
                                                        <div class="d-flex mb-2">
                                                            <div class="flex-shrink-0">
                                                                <img src="http://[::1]/nikah/assets/images/name.png" alt="name" class="profileico" width="auto" height="auto">
                                                            </div>
                                                            <div class="flex-grow-1 ms-2">
                                                                <span class="proDtls"><?php echo $ProfileDetails['name'];?></span>
                                                                <span class="proDtls"><?php echo $ProfileDetails['age'];?> Yrs, <?php echo $key->height;?> </span>
                                                                <span class="proDtls">Accounting Professional</span>
                                                                <span class="proDtls">Muslim, <?php 
                                                if(!empty($ProfileDetails['user_caste']) && $ProfileDetails['user_caste'] !='NULL'){ 
                                                            echo ',';
                                                            echo $ProfileDetails['user_caste']; 
                                        }  ?></span>
                                                                <span class="proDtls">
                                                                    
                                                                     <?php 
                                                    if(!empty($ProfileDetails['native_place']) && $ProfileDetails['native_place'] !='NULL' && !empty($ProfileDetails['district']) && $ProfileDetails['district'] !='NULL'){ 

                                                                echo $ProfileDetails['native_place']; 
                                                                echo ',';
                                                                echo $ProfileDetails['district']; 
                                                    }
                                                    else if(!empty($ProfileDetails['native_place']) && $ProfileDetails['native_place'] !='NULL'){ 
                                                                echo ',';
                                                                echo $ProfileDetails['native_place']; 
                                                    } 
                                                    else if(!empty($ProfileDetails['district']) && $ProfileDetails['district'] !='NULL'){        echo ',';
                                                                echo $ProfileDetails['district']; 
                                                    }?>
                                                                </span>
                                                            </div>
                                                        </div>
<div class="actionbtn">

 <?php if($key->status == 1){ ?>
 
 <button class="acceptedbtn"> Accepted</button>

 <?php }else  if($key->status == 2){ ?>
 
 <button class="declinedbtn"> Declined</button>

 <?php }else{ ?>

 <button class="pendingbtn"> Pending</button>
<?php } ?>

</div> 




                                                    </div>
                                                </div>
                                            </a>
                                        </div>


                                        <?php }  ?>

                                       </div> 
                                       <?php }  if(empty($InterestExpressed)){ ?>
 
 
                                    <div class="cmpltProfileBox">
                                        <img src="<?php echo base_url() ?>assets/images/heart.png">
                                        <h3>Interest Sent</h3>
                                        <p>People who have interested you, will appear here. Complete your Profile to increase your chances.</p>
                                    </div>
                                    
                                   <?php } ?>







                                </div>
                                <div class="tab-pane fade" id="pills-intrestAccptd" role="tabpanel" aria-labelledby="pills-contact-tab">

 <?php
 $where = ' (sender_id = '.$_SESSION['user_id'].' or receiver_id = '.$_SESSION['user_id'].') AND status = 1';
 $InterestExpressed =     $this->db->select('*')->from('tbl_interest')->where($where)->get()->result(); 



                                 if(!empty($InterestExpressed)){ ?>
                                    <div class="owl-similerProfile owl-carousel owl-theme" id="datasappend">

    <?php  foreach($InterestExpressed as $key){ 

if($key->receiver_id == $_SESSION['user_id']){

  $prefix = 'You';

  $ProfileDetails = $this->General_Model->GetProfileDetails($key->sender_id);

}else{

    if($_SESSION['gender'] == 1){ $prefix = 'He'; }else{ $prefix = 'She'; }

    $ProfileDetails = $this->General_Model->GetProfileDetails($key->receiver_id);
}

        ?>
                                        <div class="item">
                                            <a href="#">
                                                <div class="proLstBox">
                                                    
 <?php if(empty($ProfileDetails['photo'])){ 
                                            if($ProfileDetails['gender']== 1){ ?>
                                                <img src="<?php echo base_url('/assets/photo_storage/male.jpg'); ?>" alt="profile image" class="proImg">
                                            <?php }
                                            else if($ProfileDetails['gender']== 2){ ?>
                                                <img src="<?php echo base_url('/assets/photo_storage/female.jpg'); ?>" alt="profile image" class="proImg">
                                            <?php }
                                     } 
                                     else{ ?>
                                            <img src="<?php echo base_url('/assets/photo_storage/'.$ProfileDetails['photo']); ?>" alt="profile image" class="proImg">

                                     <?php } ?>


                                                    <div class="overlay"></div>
                                                    <div class="contentBox">
                                                        <div class="d-flex mb-2">
                                                            <div class="flex-shrink-0">
                                                                <img src="http://[::1]/nikah/assets/images/name.png" alt="name" class="profileico" width="auto" height="auto">
                                                            </div>
                                                            <div class="flex-grow-1 ms-2">
                                                                <span class="proDtls"><?php echo $ProfileDetails['name'];?></span>
                                                                <span class="proDtls"><?php echo $ProfileDetails['age'];?> Yrs, <?php echo $key->height;?></span>
                                                                <span class="proDtls">Accounting Professional</span>
                                                                <span class="proDtls">Muslim, <?php 
                                                if(!empty($ProfileDetails['user_caste']) && $ProfileDetails['user_caste'] !='NULL'){ 
                                                            echo ',';
                                                            echo $ProfileDetails['user_caste']; 
                                        }  ?></span>
                                                                <span class="proDtls">
                                                                    
                                                                     <?php 
                                                    if(!empty($ProfileDetails['native_place']) && $ProfileDetails['native_place'] !='NULL' && !empty($ProfileDetails['district']) && $ProfileDetails['district'] !='NULL'){ 

                                                                echo $ProfileDetails['native_place']; 
                                                                echo ',';
                                                                echo $ProfileDetails['district']; 
                                                    }
                                                    else if(!empty($ProfileDetails['native_place']) && $ProfileDetails['native_place'] !='NULL'){ 
                                                                echo ',';
                                                                echo $ProfileDetails['native_place']; 
                                                    } 
                                                    else if(!empty($ProfileDetails['district']) && $ProfileDetails['district'] !='NULL'){        echo ',';
                                                                echo $ProfileDetails['district']; 
                                                    }?>
                                                                </span>
                                                            </div>
                                                        </div>
<div class="actionbtn">

  
 
 <button class="acceptedbtn"> <?php echo $prefix; ?> Accepted</button>

  

</div> 




                                                    </div>
                                                </div>
                                            </a>
                                        </div>


                                        <?php }  ?>

                                       </div> 
                                       <?php }  if(empty($InterestExpressed)){ ?>
 
 
                                    <div class="cmpltProfileBox">
                                        <img src="<?php echo base_url() ?>assets/images/heart.png">
                                        <h3>Interest Accepted</h3>
                                        <p> You have no Interest Declined Yet!.</p>
                                    </div>
                                    
                                   <?php } ?>






                                </div>
                                <div class="tab-pane fade" id="pills-intrestIgnord" role="tabpanel" aria-labelledby="pills-contact-tab">
                                    
<?php

$where = ' (sender_id = '.$_SESSION['user_id'].' or receiver_id = '.$_SESSION['user_id'].') AND status = 2';
 $InterestExpressed =     $this->db->select('*')->from('tbl_interest')->where($where)->get()->result(); 



                                 if(!empty($InterestExpressed)){ ?>
                                    <div class="owl-similerProfile owl-carousel owl-theme" id="datasappend">

    <?php  foreach($InterestExpressed as $key){ 

if($key->receiver_id == $_SESSION['user_id']){

  $prefix = 'You';

  $ProfileDetails = $this->General_Model->GetProfileDetails($key->sender_id);

}else{

    if($_SESSION['gender'] == 1){ $prefix = 'He'; }else{ $prefix = 'She'; }

    $ProfileDetails = $this->General_Model->GetProfileDetails($key->receiver_id);
}

        ?>
                                        <div class="item">
                                            <a href="#">
                                                <div class="proLstBox">
                                                    
 <?php if(empty($ProfileDetails['photo'])){ 
                                            if($ProfileDetails['gender']== 1){ ?>
                                                <img src="<?php echo base_url('/assets/photo_storage/male.jpg'); ?>" alt="profile image" class="proImg">
                                            <?php }
                                            else if($ProfileDetails['gender']== 2){ ?>
                                                <img src="<?php echo base_url('/assets/photo_storage/female.jpg'); ?>" alt="profile image" class="proImg">
                                            <?php }
                                     } 
                                     else{ ?>
                                            <img src="<?php echo base_url('/assets/photo_storage/'.$ProfileDetails['photo']); ?>" alt="profile image" class="proImg">

                                     <?php } ?>


                                                    <div class="overlay"></div>
                                                    <div class="contentBox">
                                                        <div class="d-flex mb-2">
                                                            <div class="flex-shrink-0">
                                                                <img src="http://[::1]/nikah/assets/images/name.png" alt="name" class="profileico" width="auto" height="auto">
                                                            </div>
                                                            <div class="flex-grow-1 ms-2">
                                                                <span class="proDtls"><?php echo $ProfileDetails['name'];?></span>
                                                                <span class="proDtls"><?php echo $ProfileDetails['age'];?> Yrs, <?php echo $key->height;?> </span>
                                                                <span class="proDtls">Accounting Professional</span>
                                                                <span class="proDtls">Muslim, <?php 
                                                if(!empty($ProfileDetails['user_caste']) && $ProfileDetails['user_caste'] !='NULL'){ 
                                                            echo ',';
                                                            echo $ProfileDetails['user_caste']; 
                                        }  ?></span>
                                                                <span class="proDtls">
                                                                    
                                                                     <?php 
                                                    if(!empty($ProfileDetails['native_place']) && $ProfileDetails['native_place'] !='NULL' && !empty($ProfileDetails['district']) && $ProfileDetails['district'] !='NULL'){ 

                                                                echo $ProfileDetails['native_place']; 
                                                                echo ',';
                                                                echo $ProfileDetails['district']; 
                                                    }
                                                    else if(!empty($ProfileDetails['native_place']) && $ProfileDetails['native_place'] !='NULL'){ 
                                                                echo ',';
                                                                echo $ProfileDetails['native_place']; 
                                                    } 
                                                    else if(!empty($ProfileDetails['district']) && $ProfileDetails['district'] !='NULL'){        echo ',';
                                                                echo $ProfileDetails['district']; 
                                                    }?>
                                                                </span>
                                                            </div>
                                                        </div>
<div class="actionbtn">

  
 
 <button class="declinedbtn"> <?php echo $prefix; ?> Declined</button>

  

</div> 




                                                    </div>
                                                </div>
                                            </a>
                                        </div>


                                        <?php }  ?>

                                       </div> 
                                       <?php }  if(empty($InterestExpressed)){ ?>
 
 
                                    <div class="cmpltProfileBox">
                                        <img src="<?php echo base_url() ?>assets/images/heart.png">
                                        <h3>Interest Declined</h3>
                                        <p>You have no declined Interest Yet!.</p>
                                    </div>
                                    
                                   <?php } ?>









                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-profileVisit" role="tabpanel" aria-labelledby="v-pills-profileVisit-tab">
                            <ul class="nav nav-pills nav-fill" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-pvRecvd-tab" data-bs-toggle="pill" data-bs-target="#pills-pvRecvd" type="button" role="tab" aria-controls="pills-pvRecvd" aria-selected="true">Recieved</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-pvSent-tab" data-bs-toggle="pill" data-bs-target="#pills-pvSent" type="button" role="tab" aria-controls="pills-pvSent" aria-selected="false">Sent</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-pvAccptd-tab" data-bs-toggle="pill" data-bs-target="#pills-pvAccptd" type="button" role="tab" aria-controls="pills-pvAccptd" aria-selected="false">Accepted</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-pvIgnord-tab" data-bs-toggle="pill" data-bs-target="#pills-pvIgnord" type="button" role="tab" aria-controls="pills-pvIgnord" aria-selected="false">Ignored</button>
                                </li>
                            </ul>
                            <div class="tab-content profileListBox ">
                                <div class="tab-pane fade show active" id="pills-pvRecvd" role="tabpanel" aria-labelledby="pills-recvd-tab">
                                    <div class="owl-similerProfile owl-carousel owl-theme">
                                        <div class="item">
                                            <a href="singleProfile.html">
                                                <div class="proLstBox">
                                                    <img src="<?php echo base_url() ?>assets/images/mProfile1.png" alt="profile image" class="proImg">
                                                    <div class="overlay"></div>
                                                    <div class="contentBox">
                                                        <div class="d-flex mb-2">
                                                            <div class="flex-shrink-0">
                                                                <img src="<?php echo base_url() ?>assets/images/name.png" alt="name" class="profileico" width="auto" height="auto">
                                                            </div>
                                                            <div class="flex-grow-1 ms-2">
                                                                <span class="proDtls">Aneesa N</span>
                                                                <span class="proDtls">25 Yrs, 5' 0"</span>
                                                                <span class="proDtls">Accounting Professional</span>
                                                                <span class="proDtls">Other, Sunni</span>
                                                                <span class="proDtls">Tirur, Malappuram</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="item">
                                            <a href="singleProfile.html">
                                                <div class="proLstBox">
                                                    <img src="<?php echo base_url() ?>assets/images/mProfile2.png" alt="profile image" class="proImg">
                                                    <div class="overlay"></div>
                                                    <div class="contentBox">
                                                        <div class="d-flex mb-2">
                                                            <div class="flex-shrink-0">
                                                                <img src="<?php echo base_url() ?>assets/images/name.png" alt="name" class="profileico" width="auto" height="auto">
                                                            </div>
                                                            <div class="flex-grow-1 ms-2">
                                                                <span class="proDtls">Aneesa N</span>
                                                                <span class="proDtls">25 Yrs, 5' 0"</span>
                                                                <span class="proDtls">Accounting Professional</span>
                                                                <span class="proDtls">Other, Sunni</span>
                                                                <span class="proDtls">Tirur, Malappuram</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="item">
                                            <a href="singleProfile.html">
                                                <div class="proLstBox">
                                                    <img src="<?php echo base_url() ?>assets/images/mProfile3.png" alt="profile image" class="proImg">
                                                    <div class="overlay"></div>
                                                    <div class="contentBox">
                                                        <div class="d-flex mb-2">
                                                            <div class="flex-shrink-0">
                                                                <img src="<?php echo base_url() ?>assets/images/name.png" alt="name" class="profileico" width="auto" height="auto">
                                                            </div>
                                                            <div class="flex-grow-1 ms-2">
                                                                <span class="proDtls">Aneesa N</span>
                                                                <span class="proDtls">25 Yrs, 5' 0"</span>
                                                                <span class="proDtls">Accounting Professional</span>
                                                                <span class="proDtls">Other, Sunni</span>
                                                                <span class="proDtls">Tirur, Malappuram</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="item">
                                            <a href="singleProfile.html">
                                                <div class="proLstBox">
                                                    <img src="<?php echo base_url() ?>assets/images/mProfile4.png" alt="profile image" class="proImg">
                                                    <div class="overlay"></div>
                                                    <div class="contentBox">
                                                        <div class="d-flex mb-2">
                                                            <div class="flex-shrink-0">
                                                                <img src="<?php echo base_url() ?>assets/images/name.png" alt="name" class="profileico" width="auto" height="auto">
                                                            </div>
                                                            <div class="flex-grow-1 ms-2">
                                                                <span class="proDtls">Aneesa N</span>
                                                                <span class="proDtls">25 Yrs, 5' 0"</span>
                                                                <span class="proDtls">Accounting Professional</span>
                                                                <span class="proDtls">Other, Sunni</span>
                                                                <span class="proDtls">Tirur, Malappuram</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="item">
                                            <a href="singleProfile.html">
                                                <div class="proLstBox">
                                                    <img src="<?php echo base_url() ?>assets/images/mProfile5.png" alt="profile image" class="proImg">
                                                    <div class="overlay"></div>
                                                    <div class="contentBox">
                                                        <div class="d-flex mb-2">
                                                            <div class="flex-shrink-0">
                                                                <img src="<?php echo base_url() ?>assets/images/name.png" alt="name" class="profileico" width="auto" height="auto">
                                                            </div>
                                                            <div class="flex-grow-1 ms-2">
                                                                <span class="proDtls">Aneesa N</span>
                                                                <span class="proDtls">25 Yrs, 5' 0"</span>
                                                                <span class="proDtls">Accounting Professional</span>
                                                                <span class="proDtls">Other, Sunni</span>
                                                                <span class="proDtls">Tirur, Malappuram</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="item">
                                            <a href="singleProfile.html">
                                                <div class="proLstBox">
                                                    <img src="<?php echo base_url() ?>assets/images/mProfile6.png" alt="profile image" class="proImg">
                                                    <div class="overlay"></div>
                                                    <div class="contentBox">
                                                        <div class="d-flex mb-2">
                                                            <div class="flex-shrink-0">
                                                                <img src="<?php echo base_url() ?>assets/images/name.png" alt="name" class="profileico" width="auto" height="auto">
                                                            </div>
                                                            <div class="flex-grow-1 ms-2">
                                                                <span class="proDtls">Aneesa N</span>
                                                                <span class="proDtls">25 Yrs, 5' 0"</span>
                                                                <span class="proDtls">Accounting Professional</span>
                                                                <span class="proDtls">Other, Sunni</span>
                                                                <span class="proDtls">Tirur, Malappuram</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-pvSent" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <div class="cmpltProfileBox">
                                        <img src="<?php echo base_url() ?>assets/images/heart.png">
                                        <h3>Profile Visits</h3>
                                        <p>People who have interested you, will appear here. Complete your Profile to increase your chances.</p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-pvAccptd" role="tabpanel" aria-labelledby="pills-contact-tab">
                                    <div class="cmpltProfileBox">
                                        <img src="<?php echo base_url() ?>assets/images/heart.png">
                                        <h3>Profile Visits</h3>
                                        <p>People who have interested you, will appear here. Complete your Profile to increase your chances.</p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-pvIgnord" role="tabpanel" aria-labelledby="pills-contact-tab">
                                    <div class="cmpltProfileBox">
                                        <img src="<?php echo base_url() ?>assets/images/heart.png">
                                        <h3>Profile Visits</h3>
                                        <p>People who have interested you, will appear here. Complete your Profile to increase your chances.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-contacts" role="tabpanel" aria-labelledby="v-pills-contacts-tab">
                            <ul class="nav nav-pills nav-fill" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-contactRecvd-tab" data-bs-toggle="pill" data-bs-target="#pills-contactRecvd" type="button" role="tab" aria-controls="pills-contactRecvd" aria-selected="true">Recieved</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-contactSent-tab" data-bs-toggle="pill" data-bs-target="#pills-contactSent" type="button" role="tab" aria-controls="pills-contactSent" aria-selected="false">Sent</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-contactAccptd-tab" data-bs-toggle="pill" data-bs-target="#pills-contactAccptd" type="button" role="tab" aria-controls="pills-contactAccptd" aria-selected="false">Accepted</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-contactIgnord-tab" data-bs-toggle="pill" data-bs-target="#pills-contactIgnord" type="button" role="tab" aria-controls="pills-contactIgnord" aria-selected="false">Ignored</button>
                                </li>
                            </ul>
                            <div class="tab-content profileListBox ">
                                <div class="tab-pane fade show active" id="pills-contactRecvd" role="tabpanel" aria-labelledby="pills-recvd-tab">
                                    <div class="cmpltProfileBox">
                                        <img src="<?php echo base_url() ?>assets/images/heart.png">
                                        <h3>Profile Visits</h3>
                                        <p>People who have interested you, will appear here. Complete your Profile to increase your chances.</p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-contactSent" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <div class="cmpltProfileBox">
                                        <img src="<?php echo base_url() ?>assets/images/heart.png">
                                        <h3>Profile Visits</h3>
                                        <p>People who have interested you, will appear here. Complete your Profile to increase your chances.</p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-contactAccptd" role="tabpanel" aria-labelledby="pills-contact-tab">
                                    <div class="cmpltProfileBox">
                                        <img src="<?php echo base_url() ?>assets/images/heart.png">
                                        <h3>Profile Visits</h3>
                                        <p>People who have interested you, will appear here. Complete your Profile to increase your chances.</p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-contactIgnord" role="tabpanel" aria-labelledby="pills-contact-tab">
                                    <div class="cmpltProfileBox">
                                        <img src="<?php echo base_url() ?>assets/images/heart.png">
                                        <h3>Profile Visits</h3>
                                        <p>People who have interested you, will appear here. Complete your Profile to increase your chances.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-shortlist" role="tabpanel" aria-labelledby="v-pills-shortlist-tab">
                            <ul class="nav nav-pills nav-fill" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-slRecvd-tab" data-bs-toggle="pill" data-bs-target="#pills-slRecvd" type="button" role="tab" aria-controls="pills-slRecvd" aria-selected="true">Recieved</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-slSent-tab" data-bs-toggle="pill" data-bs-target="#pills-slSent" type="button" role="tab" aria-controls="pills-slSent" aria-selected="false">Sent</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-slAccptd-tab" data-bs-toggle="pill" data-bs-target="#pills-slAccptd" type="button" role="tab" aria-controls="pills-slAccptd" aria-selected="false">Accepted</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-slIgnord-tab" data-bs-toggle="pill" data-bs-target="#pills-slIgnord" type="button" role="tab" aria-controls="pills-slIgnord" aria-selected="false">Ignored</button>
                                </li>
                            </ul>
                            <div class="tab-content profileListBox ">
                                <div class="tab-pane fade show active" id="pills-slRecvd" role="tabpanel" aria-labelledby="pills-recvd-tab">
                                    <div class="cmpltProfileBox">
                                        <img src="<?php echo base_url() ?>assets/images/heart.png">
                                        <h3>Profile Visits</h3>
                                        <p>People who have interested you, will appear here. Complete your Profile to increase your chances.</p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-slSent" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <div class="cmpltProfileBox">
                                        <img src="<?php echo base_url() ?>assets/images/heart.png">
                                        <h3>Profile Visits</h3>
                                        <p>People who have interested you, will appear here. Complete your Profile to increase your chances.</p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-slAccptd" role="tabpanel" aria-labelledby="pills-sl-tab">
                                    <div class="cmpltProfileBox">
                                        <img src="<?php echo base_url() ?>assets/images/heart.png">
                                        <h3>Profile Visits</h3>
                                        <p>People who have interested you, will appear here. Complete your Profile to increase your chances.</p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-slIgnord" role="tabpanel" aria-labelledby="pills-sl-tab">
                                    <div class="cmpltProfileBox">
                                        <img src="<?php echo base_url() ?>assets/images/heart.png">
                                        <h3>Profile Visits</h3>
                                        <p>People who have interested you, will appear here. Complete your Profile to increase your chances.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-blocked" role="tabpanel" aria-labelledby="v-pills-blocked-tab">
                            <ul class="nav nav-pills nav-fill" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-blockedRecvd-tab" data-bs-toggle="pill" data-bs-target="#pills-blockedRecvd" type="button" role="tab" aria-controls="pills-blockedRecvd" aria-selected="true">Recieved</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-blockedSent-tab" data-bs-toggle="pill" data-bs-target="#pills-blockedSent" type="button" role="tab" aria-controls="pills-blockedSent" aria-selected="false">Sent</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-blockedAccptd-tab" data-bs-toggle="pill" data-bs-target="#pills-blockedAccptd" type="button" role="tab" aria-controls="pills-blockedAccptd" aria-selected="false">Accepted</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-blockedIgnord-tab" data-bs-toggle="pill" data-bs-target="#pills-blockedIgnord" type="button" role="tab" aria-controls="pills-blockedIgnord" aria-selected="false">Ignored</button>
                                </li>
                            </ul>
                            <div class="tab-content profileListBox ">
                                <div class="tab-pane fade show active" id="pills-blockedRecvd" role="tabpanel" aria-labelledby="pills-recvd-tab">
                                    <div class="cmpltProfileBox">
                                        <img src="<?php echo base_url() ?>assets/images/heart.png">
                                        <h3>Profile Visits</h3>
                                        <p>People who have interested you, will appear here. Complete your Profile to increase your chances.</p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-blockedSent" role="tabpanel" aria-labelledby="pills-blocked-tab">
                                    <div class="cmpltProfileBox">
                                        <img src="<?php echo base_url() ?>assets/images/heart.png">
                                        <h3>Profile Visits</h3>
                                        <p>People who have interested you, will appear here. Complete your Profile to increase your chances.</p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-blockedAccptd" role="tabpanel" aria-labelledby="pills-blocked-tab">
                                    <div class="cmpltProfileBox">
                                        <img src="<?php echo base_url() ?>assets/images/heart.png">
                                        <h3>Profile Visits</h3>
                                        <p>People who have interested you, will appear here. Complete your Profile to increase your chances.</p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-blockedIgnord" role="tabpanel" aria-labelledby="pills-blocked-tab">
                                    <div class="cmpltProfileBox">
                                        <img src="<?php echo base_url() ?>assets/images/heart.png">
                                        <h3>Profile Visits</h3>
                                        <p>People who have interested you, will appear here. Complete your Profile to increase your chances.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-skipped" role="tabpanel" aria-labelledby="v-pills-skipped-tab">
                            <ul class="nav nav-pills nav-fill" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-skippedRecvd-tab" data-bs-toggle="pill" data-bs-target="#pills-skippedRecvd" type="button" role="tab" aria-controls="pills-skippedRecvd" aria-selected="true">Recieved</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-skippedSent-tab" data-bs-toggle="pill" data-bs-target="#pills-skippedSent" type="button" role="tab" aria-controls="pills-skippedSent" aria-selected="false">Sent</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-skippedAccptd-tab" data-bs-toggle="pill" data-bs-target="#pills-skippedAccptd" type="button" role="tab" aria-controls="pills-skippedAccptd" aria-selected="false">Accepted</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-skippedIgnord-tab" data-bs-toggle="pill" data-bs-target="#pills-skippedIgnord" type="button" role="tab" aria-controls="pills-skippedIgnord" aria-selected="false">Ignored</button>
                                </li>
                            </ul>
                            <div class="tab-content profileListBox ">
                                <div class="tab-pane fade show active" id="pills-skippedRecvd" role="tabpanel" aria-labelledby="pills-skipped-tab">
                                    <div class="cmpltProfileBox">
                                        <img src="<?php echo base_url() ?>assets/images/heart.png">
                                        <h3>Profile Visits</h3>
                                        <p>People who have interested you, will appear here. Complete your Profile to increase your chances.</p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-skippedSent" role="tabpanel" aria-labelledby="pills-skipped-tab">
                                    <div class="cmpltProfileBox">
                                        <img src="<?php echo base_url() ?>assets/images/heart.png">
                                        <h3>Profile Visits</h3>
                                        <p>People who have interested you, will appear here. Complete your Profile to increase your chances.</p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-skippedAccptd" role="tabpanel" aria-labelledby="pills-skipped-tab">
                                    <div class="cmpltProfileBox">
                                        <img src="<?php echo base_url() ?>assets/images/heart.png">
                                        <h3>Profile Visits</h3>
                                        <p>People who have interested you, will appear here. Complete your Profile to increase your chances.</p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-skippedIgnord" role="tabpanel" aria-labelledby="pills-skipped-tab">
                                    <div class="cmpltProfileBox">
                                        <img src="<?php echo base_url() ?>assets/images/heart.png">
                                        <h3>Profile Visits</h3>
                                        <p>People who have interested you, will appear here. Complete your Profile to increase your chances.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- mobile app advrtisment -->
                    <div class="appAdvBox">
                        <div class="row">
                            <div class="col-12 col-xl-6">
                                <h2 class="subHead mb-4">Search Profiles<br><span>Anytime! Anywhere!!</span></h2>
                                <p class="pOne">Finding your perfect match has never been easier with the Gotonikah application</p>
                                <p class="pTwo">Download now and communicate with muslim matches on-the-go!</p>
                                <div class="d-flex mb-5 mb-xl-0">
                                    <a href="javascript:void(0)">
                                        <img src="<?php echo base_url() ?>assets/images/appleStore.png" alt="appleStore" class="storeIcon me-3" width="auto" height="auto">
                                    </a>
                                    <a target="_blank" href="https://play.google.com/store/apps/details?id=com.sysol.happy_nikah">
                                        <img src="<?php echo base_url() ?>assets/images/playStore.png" alt="playStore" class="storeIcon" width="auto" height="auto">
                                    </a>
                                </div>
                            </div>
                            <div class="col-12 col-xl-6  text-center">
                                <img src="<?php echo base_url() ?>assets/images/mobApp.png" class="mobAppIcon">
                            </div>
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
    <script src="<?php echo base_url() ?>assets/js/owl.carousel.js"></script>

    <script type="text/javascript">


     function explore(type,option){
        $.ajax({
                    type: "post",
                    url: '<?php echo site_url('user/exploredatas'); ?>',
                    data: {'type':type,'option':option},
                    success: function(response){ 


 if(type == 1 && option == 1){  $('#datasappend').html(response); }

 else if(type == 2 && option == 1){  $('#pills-intrestSent').html(response); }

                       


                      
                  } 
              });
     }


     function interestaction(receiverid,senderid,type){



                $.ajax({
                    type: "post",
                    url: '<?php echo site_url('user/interestaction'); ?>',
                    data: {'type':type,'receiverid':receiverid,'senderid':senderid},
                    success: function(response){ 


 // if(type == 1 && option == 1){  $('#datasappend').html(response); }

 // else if(type == 2 && option == 1){  $('#pills-intrestSent').html(response); }

                       


                      
                  } 
              });

     }


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
        
    </script>

</body>
</html>