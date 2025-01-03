<!DOCTYPE html>

<html>

  

<?php 

$locked=0;

if(!empty($ProfileDetails['user_image'])){ 

$photo_status = $this->General_Model->check_photoStatus($ProfileDetails['user_image']);//check if approved or not

              

if(isset($photo_status->status) && $photo_status->status != 0 && $photo_status->status != 1){//if photo approved

           

        $sender_id = $this->session->userdata('user_id');

               $receiver_id = $ProfileDetails['id'];

               $photo_privacy = $this->General_Model->photoprivacy($sender_id,$receiver_id);//check if protected

               if($photo_privacy ==1)//protected

               {

                   $sender_id = $this->session->userdata('user_id');

                   $receiver_id = $ProfileDetails['id'];

                   $photo_requeststatus = $this->General_Model->check_photo_requested($sender_id,$receiver_id);//check if protected

                        if($photo_requeststatus==0)//not requested for photo

                        {

                        $locked=1;

                        }

                  else

                  {

                      $photo_requeststatus = $this->General_Model->photo_requeststatus($sender_id,$receiver_id);//check for status of the request

                        if($photo_requeststatus==1)

                        {

                            $locked=0;

                

                        }

                        else

                        {

                           $locked=1;

                 

                        }

                  }

                }

                else//public

                {

                 $locked=0;

                   

                }

}//end of photo approved by admin



} 

include('include/user_header.php'); ?>

<input type="hidden" name="baseurl" value="<?php echo base_url();?>" id="baseurl">

    <section id="userContent">

        <div class="container">

            <div class="row">

                <div class="col-12 col-md-5 col-lg-4">

                    <div class="profileBox">

                        <div class="bgStrip">

                            <img src="<?php echo base_url();?>assets/images/abstractBg1.png" alt="border image">

                        </div>

                        <div class="profileImgBox <?php if(isset($locked) && $locked==1){?>lockedImg <?php }?>text-center overflow-hidden">

                            <div id="carouselMyProfile" class="carousel slide carousel-fade text-center" data-bs-ride="carousel">

                                <div class="carousel-indicators">



                                    <?php $i=0;

                                    foreach($singleProfileImages as $vals)

                                    { ?>

                                    <button type="button" data-bs-target="#carouselMyProfile" data-bs-slide-to="<?php echo $i;?>" class="active" aria-current="true" aria-label="Slide 1"></button>

                                    <?php $i++;}?></div>

                                <div class="carousel-inner">

                                <?php if(empty($ProfileDetails['user_image'])){                                           

    if($ProfileDetails['gender']== 1){ ?>

   <div class="carousel-item active">

<div class="proLstBox">

                        <img src="<?php echo base_url('/assets/photo_storage/male.png'); ?>" alt="profile image" class="proImg1">

                       <div class="overlay"></div> </div>

</div>                      

    <?php }

    else if($ProfileDetails['gender']== 2){ ?>

      <div class="carousel-item active">

<div class="proLstBox">

                          <img class="proImg1" src="<?php echo base_url('/assets/photo_storage/female.png'); ?>" alt="profile image">

                         <div class="overlay"></div> </div>

</div>                

    <?php }

} else{ //profile photo exists

    $sender_id = $this->session->userdata('user_id');

    $receiver_id = $ProfileDetails['id'];

    $photo_privacy = $this->General_Model->photoprivacy($sender_id,$receiver_id);//check if protected

    if($photo_privacy !=1)

    {// if public

     $j=0;             

foreach ($singleProfileImages as $uphotos) {

    $photo_status = $this->General_Model->check_photoStatus($uphotos->user_image);//check if approved or not

                      

    if(isset($photo_status->status) && $photo_status->status != 0 && $photo_status->status != 1){//if approved

    ?>

     <div class="carousel-item <?php if($j==0){?>active<?php }?>">

                                        <div class="proLstBox">

                                            <?php $file_pointer = 'assets/photo_storage/'.$uphotos->user_image;

    if(file_exists($file_pointer)){?>

                                        <a class="example-image-link" href="<?php echo base_url('assets/photo_storage/'.$uphotos->user_image); ?>" data-lightbox="example-2" data-title="<?php echo ++$j." of ".$i." images." ;?>">

                              

                              

                                <img src="<?php echo base_url('assets/photo_storage/'.$uphotos->user_image); ?>" alt="profile image" class="proImg1">

                                <div class="overlay"></div> </a>

                                <?php }else{

                                $file_pointer = 'assets/photo_storage/'.$uphotos->user_image;

                                if(file_exists($file_pointer)){?>

                                <a class="example-image-link" href="<?php echo base_url('assets/photo_storage/'.$uphotos->user_image); ?>" data-lightbox="example-2" data-title="<?php echo ++$j." of ".$i." images." ;?>">

                                <img src="<?php echo base_url('assets/photo_storage/');?><?php echo $uphotos->user_image; ?>" alt="profile image" class="proImg1" style="height:100%;">

                                <div class="overlay"></div> </a>

                               <?php 

                                    

                                }

                               

                               else{

                               if($key->gender== 1){ ?>

       <img src="<?php echo base_url('/assets/photo_storage/male.png'); ?>" alt="profile image" class="proImg1">

       <div class="overlay"></div>

   <?php }

   else{ ?>

       <img src="<?php echo base_url('/assets/photo_storage/female.png'); ?>" alt="profile image" class="proImg1">

       <div class="overlay"></div>

                               <?php }?>

                               

                                     <?php

                                     }//end file exists

                                                   

                                               }?>

                                    </div>

                                    </div>

    <?php }//end of approved

    else{//if not apprved

        if($ProfileDetails['gender']== 1){ 

                                      

            ?>

<div class="carousel-item <?php if($j==0){?>active<?php }?>">

     <div class="proLstBox">

                     <a href="<?php echo site_url('singleprofile/'.$ProfileDetails['id']); ?>">

                         <img src="<?php echo base_url('/assets/photo_storage/male.png'); ?>" alt="profile image" class="proImg1">

                    <div class="overlay"></div> </a>

                     </div>

 </div> 

                 <?php }

                 else if($ProfileDetails['gender']== 2){ 

                    

                    ?>

     <div class="carousel-item <?php if($j==0){?>active<?php }?>">

     <div class="proLstBox">  

         

           <a href="<?php echo site_url('singleprofile/'.$ProfileDetails['id']); ?>">

                     <img src="<?php echo base_url('/assets/photo_storage/female.png'); ?>" alt="profile image" class="proImg1">

          <div class="overlay"></div> </a>

     </div>

 </div> 

                 <?php }

    }

$j++;}//ends for loop

    }//end of public

else{//private

    $sender_id = $this->session->userdata('user_id');

    $receiver_id = $ProfileDetails['id'];

    $photo_requeststatus = $this->General_Model->check_photo_requested($sender_id,$receiver_id);//check if requested or not

    if($photo_requeststatus==0)//not requested for photo

    {

    $i=0; 

    foreach ($singleProfileImages as $uphotos) {

         $photo_status = $this->General_Model->check_photoStatus($uphotos->user_image);//check if approved or not

                      

            if(isset($photo_status->status) && $photo_status->status != 0 && $photo_status->status != 1){//if approved

        $file_pointer = 'assets/photo_storage_blur/'.$uphotos->user_image;

                        if(file_exists($file_pointer)){

                            ?>

                         <div class="carousel-item <?php if($i==0){?>active<?php }?>">

                                   <div class="proLstBox">

                                        <img src="<?php echo base_url('/assets/photo_storage_blur/'.$uphotos->user_image); ?>" alt="profile image" class="proImg1">

                                     <div class="overlay"></div>  

                                                                                       

                                    </div>

                               </div>

                                         

                           <?php }

                            else{

                            if($ProfileDetails['gender']== 1){ ?>

             <div class="carousel-item <?php if($i==0){?>active<?php }?>">

                       <div class="proLstBox">

                                    <a href="<?php echo site_url('singleprofile/'.$ProfileDetails['id']); ?>">

                                       <img src="<?php echo base_url('/assets/photo_storage/male.png'); ?>" alt="profile image" class="proImg1">

                                     <div class="overlay"></div>  </a>

                                       </div>

                   </div>      

                                   <?php }

                                   else if($ProfileDetails['gender']== 2){ ?>

             <div class="carousel-item <?php if($i==0){?>active<?php }?>">

                       <div class="proLstBox">

                                    <a href="<?php echo site_url('singleprofile/'.$ProfileDetails['id']); ?>">

                                       <img src="<?php echo base_url('/assets/photo_storage/female.png'); ?>" alt="profile image" class="proImg1">

                                      <div class="overlay"></div> </a>

                                       </div>

                   </div>    

                                   <?php }}

            }

            else

            {

                  if($ProfileDetails['gender']== 1){ ?>

 <div class="carousel-item <?php if($i==0){?>active<?php }?>">

           <div class="proLstBox">

                        <a href="<?php echo site_url('singleprofile/'.$ProfileDetails['id']); ?>">

                           <img src="<?php echo base_url('/assets/photo_storage/male.png'); ?>" alt="profile image" class="proImg1">

                          <div class="overlay"></div> </a>

                           </div>

       </div>      

                       <?php }

                       else if($ProfileDetails['gender']== 2){ ?>

 <div class="carousel-item <?php if($i==0){?>active<?php }?>">

           <div class="proLstBox">

                        <a href="<?php echo site_url('singleprofile/'.$ProfileDetails['id']); ?>">

                           <img src="<?php echo base_url('/assets/photo_storage/female.png'); ?>" alt="profile image" class="proImg1">

                           <div class="overlay"></div></a>

                           </div>

       </div>    

                       <?php }

            }

                $i++;}

    }//end of not requested for photo

    else{//request photo

    

        $photo_requeststatus = $this->General_Model->photo_requeststatus($sender_id,$receiver_id);//check for status of the request

        if($photo_requeststatus==1)

        {

            $i=0;

            foreach ($singleProfileImages as $uphotos) { 

    

    ?>                           

    <div class="carousel-item <?php if($i==0){?>active<?php }?>">

               <div class="proLstBox">

                   <?php $file_pointer = 'assets/photo_storage/'.$uphotos->user_image;

    if(file_exists($file_pointer)){?>

    

    

                <a class="example-image-link" href="<?php echo base_url('assets/photo_storage/'.$uphotos->user_image); ?>" data-lightbox="example-2" data-title="<?php echo ++$j." of ".$i." images." ;?>">

          

                     <img src="<?php echo base_url('/assets/photo_storage/'.$uphotos->user_image); ?>" alt="profile image" class="proImg1">

            <div class="overlay"></div></a>  

            <?php }else

            { $file_pointer = 'assets/photo_storage/'.$uphotos->user_image;

    if(file_exists($file_pointer)){?>

                                <a class="example-image-link" href="<?php echo base_url('assets/photo_storage/'.$uphotos->user_image); ?>" data-lightbox="example-2" data-title="<?php echo ++$j." of ".$i." images." ;?>">

                        <img src="<?php echo base_url('assets/photo_storage/');?><?php echo $uphotos->user_image; ?>" alt="profile image" class="proImg1" style="height:100%;">

 <div class="overlay"></div> </a>

                               <?php }else{

                               if($key->gender== 1){ ?>

       <img src="<?php echo base_url('/assets/photo_storage/male.png'); ?>" alt="profile image" class="proImg1">

       <div class="overlay"></div>

   <?php }

   else{ ?>

       <img src="<?php echo base_url('/assets/photo_storage/female.png'); ?>" alt="profile image" class="proImg1">

       <div class="overlay"></div>

                               <?php }?>

                               

                                     <?php

                                     }//end file exists

                                     }?>

            </div></div>     

             <?php $i++;} 

        }

        else{

           

            $i=0;

            foreach ($singleProfileImages as $uphotos) { 

                 $photo_status = $this->General_Model->check_photoStatus($uphotos->user_image);//check if approved or not

                      

            if(isset($photo_status->status) && $photo_status->status != 0 && $photo_status->status != 1){//if approved

            $file_pointer = 'assets/photo_storage/'.$uphotos->user_image;

            

            if(file_exists($file_pointer)){?>

        

        <div class="carousel-item <?php if($i==0){?>active<?php }?>">

               <div class="proLstBox">

        <img src="<?php echo base_url('/assets/photo_storage_blur/'.$uphotos->user_image); ?>" alt="profile image" class="proImg1">

        <div class="overlay"></div>

                                                                    <div class="lockOverlay">

                                                                        <img src="<?php echo base_url();?>assets/images/lockProfile.svg">

                                                                    </div>

            </div></div>

        <?php }

        else{

        if($ProfileDetails['gender']== 1){ ?>

         <div class="carousel-item <?php if($i==0){?>active<?php }?>">

               <div class="proLstBox">

               <img src="<?php echo base_url('/assets/photo_storage/male.png'); ?>" alt="profile image" class="proImg1">

               <div class="overlay"></div>

               <div class="lockOverlay">

                                                                        <img src="<?php echo base_url();?>assets/images/lockProfile.svg">

                                                                    </div>

                                                                    </div></div>

           <?php }

           else if($ProfileDetails['gender']== 2){ ?>

         <div class="carousel-item <?php if($i==0){?>active<?php }?>">

               <div class="proLstBox">

            <a href="<?php echo site_url('singleprofile/'.$key->id); ?>">

               <img src="<?php echo base_url('/assets/photo_storage/female.png'); ?>" alt="profile image" class="proImg1">

               </a>

               <div class="overlay"></div>

               <div class="lockOverlay">

                                                                        <img src="<?php echo base_url();?>assets/images/lockProfile.svg">

                                                                    </div>

                                                                     </div></div>

           <?php }

        }}

        else

        {

         

           if($ProfileDetails['gender']== 1){ ?>

         <div class="carousel-item <?php if($i==0){?>active<?php }?>">

               <div class="proLstBox">

               <img src="<?php echo base_url('/assets/photo_storage/male.png'); ?>" alt="profile image" class="proImg1">

                <div class="overlay"></div></div></div>

           <?php }

           else if($ProfileDetails['gender']== 2){   ?>

        <div class="carousel-item <?php if($i==0){?>active<?php }?>">

               <div class="proLstBox">

               <img src="<?php echo base_url('/assets/photo_storage/female.png'); ?>" alt="profile image" class="proImg1">

                <div class="overlay"></div>

 </div></div>

           <?php }  

        }$i++;}

        }

    } //end of request photo



}}



?>                                

                                </div>

                                <div class="carouselCount">

                                    <div class="d-flex align-items-center justify-content-center mb-2">

                                        <img src="<?php echo base_url();?>assets/images/slideCIcon.svg" class="slideCIcon">

                                        <p class="profImgCount"  id="profImgCount"></p>

                                    </div>

                                </div>

                            </div>

                            <?php if($ProfileDetails['photo_visibility']==1)

                            {

       ?>

                            <button type="button" class="btn btn-primary proImgLock" data-bs-toggle="modal" data-bs-target="#proLockModal">

                                <img src="<?php echo base_url();?>assets/images/padlockW.png">

                            </button>

                           <?php } ?>

                        </div>

                        <div class="nameTitle text-center mb-4">

                            <p class="proName"><?= !empty($ProfileDetails['name'])? $ProfileDetails['name'] : '' ?></p>

                            <p class="d-flex align-items-center justify-content-center mb-1">

                                <span class="proId"><?= !empty($ProfileDetails['name'])? $ProfileDetails['happynikah_id'] : '' ?></span>

                                <img src="<?php echo base_url();?>assets/images/verify.png">

                                <span class="verify">Verified</span>

                            </p>

                            <p class="lastSeen">Last Online: Yesterday</p>

                        </div>

                        <div class="row m-0">

                            <div class="col-3 ps-0 pe-1">

                                <button class="profBtnGrp w-100" type="button" data-bs-toggle="modal" data-bs-target="#proCallModal" >

                                    <img src="<?php echo base_url();?>assets/images/phone.png">

                                    call

                                </button>

                            </div>

                            <div class="col-3 px-1">

                                <button class="profBtnGrp w-100" type="button" onclick="window.location.href='<?php echo base_url('userchat/'.$ProfileDetails['id']);?>'">

                                    <img src="<?php echo base_url();?>assets/images/Chat1.svg">

                                    Chat

                                </button>

                            </div>

                            <div class="col-3 px-1" id="interest_done" style="    <?php if($interest == 0){ echo 'display: none;';   } ?>">

                                <button class="profBtnGrp w-100" type="button" onclick="sendinterest('<?php echo $ProfileDetails['id']; ?>')">

                                    

                                    <img src="<?php echo base_url();?>assets/images/checkedG.png">

                                    Interested

                                </button>

                            </div>

                            <div class="col-3 px-1" id="interest" style="    <?php if($interest != 0){ echo 'display: none;';   } ?>">

                                <button class="profBtnGrp w-100" type="button" onclick="sendinterest('<?php echo $ProfileDetails['id']; ?>')">

                                    

                                    <img src="<?php echo base_url();?>assets/images/Intrest.svg">

                                     Interest

                                </button>

                            </div>

                            <div class="col-3 ps-1 pe-0">

                                <button  id="report_done" class="profBtnGrp w-100" type="button" data-bs-toggle="modal" <?php if($report_status->num_rows()==0){?>style="display:none;"<?php }?>>

                                    <img src="<?php echo base_url();?>assets/images/Ignore.svg">

                                Reported

                                </button>

                                <button  id="report" class="profBtnGrp w-100" type="button" data-bs-toggle="modal" data-bs-target="#proreportModal" <?php if($report_status->num_rows()!=0){?>style="display:none;"<?php }?>>

                                    <img src="<?php echo base_url();?>assets/images/Ignore.svg">

                          Report

                            </div>

                        </div>

                    </div>

                    <div class="likeDislikeBox">

                        <div class="headBox">

                            <div class="row">

                                <div class="col-8 col-md-12 col-xl-8 d-flex align-items-center">

                                    <div class="w-100">

                                        <div class="d-flex align-items-center mb-2">

                                            <div class="me-4 position-relative">

                                                <div class="lSLprof">

                                                    <img src="<?php echo base_url();?>assets/images/myProfile1.png">

                                                </div>

                                                <div class="overProf">

                                                    <div class="lSLprof">

                                                        <img src="<?php echo base_url();?>assets/images/mProfile10.png">

                                                    </div>

                                                </div>

                                            </div>

                                            <div>

                                                <div class="youHim">

                                                    <img src="<?php echo base_url();?>assets/images/people.png">

                                                    You & Him

                                                </div>

                                                <h3>Likes & Dislikes</h3>

                                            </div>

                                        </div>

                                        <?php

                                        $match = 0;

                                        if($LoggedUserProfileDetails['age']>=$partner_preference_data['partner_age_from'] && $LoggedUserProfileDetails['age']<=$partner_preference_data['partner_age_to']){

                                            $match++;

                                        }

                                        if($LoggedUserProfileDetails['height']>=$partner_preference_data['partner_height'] && $LoggedUserProfileDetails['height']<=$partner_preference_data['partner_height_to']){

                                            $match++;

                                        }

                                        if($LoggedUserProfileDetails['education'] == $partner_preference_data['edu_id']){

                                            $match++;

                                        }

                                        if($LoggedUserProfileDetails['financial_status'] == $partner_preference_data['partner_familytype']){

                                            $match++;

                                        }



                                        ?>

                                        <p>Your profile matches with <span><?php echo $match; ?> / 4</span>  of <?= !empty($ProfileDetails['name'])? $ProfileDetails['name'] : '' ?>'s preferences!</p>

                                    </div>

                                </div>

                                <div class="col-4 col-md-12 col-xl-4 d-flex justify-content-between align-items-center">

                                    <button type="button" class="btnLikeUnlike">

                                        <img src="<?php echo base_url();?>assets/images/like1.png" class="likeDislikeIcon" alt="like icon">

                                    </button>

                                    <button type="button" class="btnLikeUnlike">

                                        <img src="<?php echo base_url();?>assets/images/dislike.png" class="likeDislikeIcon" alt="dislike icon">

                                    </button>

                                </div>

                            </div>

                        </div>

                        <div class="px-3 pt-3">

                            <div class="row mb-2">

                                <div class="col-5 d-flex align-items-center">

                                    <p class="dtls">Marital Status</p>

                                </div>

                                <div class="col-5 d-flex align-items-center">

                                    <p class="dtls"><?= (isset($ProfileDetails['marital_status']) && !empty($ProfileDetails['marital_status'])) ? $ProfileDetails['marital_status'] : ''?></p>

                                </div>

                                <div class="col-2 d-flex align-items-center justify-content-end">

                                <?php if($LoggedUserProfileDetails['marital_status']==$partner_preference_data['partner_maritalstatus']){ ?>

                                    <img src="<?php echo base_url() ?>assets/images/checkedG.png" class="chk">

                                    

                                    <?php } 

                                    else{ ?>

                                    <img src="<?php echo base_url() ?>assets/images/blocked.png" class="chk" >

                                    <?php } ?>

                                </div>

                            </div>

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

                                    <?php } ?>                                </div>

                            </div>

                            <div class="row mb-2">

                                <div class="col-5 d-flex align-items-center">

                                    <p class="dtls">Height</p>

                                </div>

                                <div class="col-5 d-flex align-items-center">

                                    <p class="dtls"><?php echo $partner_preference_data['height_from']; ?> -  <?php echo $partner_preference_data['height_to']; ?></p>

                                </div>

                                <div class="col-2 d-flex align-items-center justify-content-end">

                                <?php if($LoggedUserProfileDetails['height']>=$partner_preference_data['ht'] && $LoggedUserProfileDetails['height']<=$partner_preference_data['ht_to']){ ?>

                                    <img src="<?php echo base_url() ?>assets/images/checkedG.png" class="chk">

                                    <?php } 

                                    else{ ?>

                                    <img src="<?php echo base_url() ?>assets/images/blocked.png" class="chk" >

                                    <?php } ?>                                </div>

                            </div>

                            <div class="row mb-2">

                                <div class="col-5 d-flex align-items-center">

                                    <p class="dtls">Qualification</p>

                                </div>

                                <div class="col-5 d-flex align-items-center">

                                    <p class="dtls"><?php echo $partner_preference_data['education']; ?></p>

                                </div>

                                <div class="col-2 d-flex align-items-center justify-content-end">

                                <?php if($LoggedUserProfileDetails['education'] == $partner_preference_data['edu_id']){ ?>

                                    <img src="<?php echo base_url() ?>assets/images/checkedG.png" class="chk">

                                    <?php } 

                                    else{ ?>

                                    <img src="<?php echo base_url() ?>assets/images/blocked.png" class="chk" >

                                    <?php } ?>                                </div>

                            </div>

                            <div class="row mb-2">

                                <div class="col-5 d-flex align-items-center">

                                    <p class="dtls">Partner Weight</p>

                                </div>

                                <div class="col-5 d-flex align-items-center">

                                    <p class="dtls"><?php echo $partner_preference_data['partner_weight']; ?></p>

                                </div>

                                <div class="col-2 d-flex align-items-center justify-content-end">

                                <?php if($LoggedUserProfileDetails['weight']==$partner_preference_data['partner_weight']){ ?>

                                    <img src="<?php echo base_url() ?>assets/images/checkedG.png" class="chk">

                                    <?php } 

                                    else{ ?>

                                    <img src="<?php echo base_url() ?>assets/images/blocked.png" class="chk" >

                                    <?php } ?> 

                                </div>

                            </div>

                          

                        </div>

                    </div>

                    

                    <!-- mobile app advrtisment -->

                    <div class="appAdvBox2">

                        <h2 class="subHead mb-4">Search Profiles<br><span>Anytime! Anywhere!!</span></h2>

                        <p class="pOne">Finding your perfect match has never been easier with the Happy nikah application</p>

                        <p class="pTwo">Download now and communicate with muslim matches on-the-go!</p>

                        <img src="<?php echo base_url();?>assets/images/appMob1.png" class="mobAppIcon">

                        <div class="row">

                            <div class="col-6 col-sm-6 d-flex align-items-center justify-content-center">

                                <a href="javascript:void(0)">

                                    <img src="<?php echo base_url();?>assets/images/appleStore.png" alt="appleStore" class="storeIcon" width="auto" height="auto">

                                </a>

                            </div>

                            <div class="col-6 col-sm-6 d-flex align-items-center justify-content-center">

                                <a href="https://play.google.com/store/apps/details?id=com.sysol.happy_nikah">

                                    <img src="<?php echo base_url();?>assets/images/playStore.png" alt="playStore" class="storeIcon" width="auto" height="auto">

                                </a>

                            </div>

                        </div>

                    </div>



                    <!-- diamond profile -->

                    <div class="diamondProBox">

                        <div class="topCurve"></div>

                        <p>Want better responses from your matches ?</p>

                        <img src="<?php echo base_url();?>assets/images/diamondIcon.png">

                        <a href="<?php echo site_url('upgradeto_premium/1'); ?>">

                        <button type="button" class="diamndProBtn">

                            <img src="<?php echo base_url();?>assets/images/crownW.png">

                            Personalised Service

                        </button>

                        </a>

                    </div>

                </div>

                <div class="col-12 col-md-7 col-lg-8">

                   

                    <!-- single profile -->

                    

                    <div class="customCard">

                        <div class="customCardHeader">

                            <h2 class="cardHead mb-sm-0">About</h2>

                        </div>

<p><?= !empty($ProfileDetails['about'])? $ProfileDetails['about'] : '' ?></p>                    

                    </div>

                    <div class="row">

                        <div class="col-12 col-lg-6 d-flex align-items-stretch">

                            <div class="customCard">

                                <div class="customCardHeader">

                                    <h2 class="cardHead mb-md-0">Basic Information</h2>

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

                                <?php if($ProfileDetails['marital_status']!="Unmarried")

                                    {?>

                                     <div class="row mb-3">

                                    <div class="col-6 d-flex justify-content-between align-items-center">

                                        <label class="form-label mb-0">Number of Chidren</label>

                                        <span>:</span>

                                    </div>

                                    <div class="col-6 d-flex align-items-center">

                                        <p class="mb-0"><?= !empty($ProfileDetails['no_of_children']) && $ProfileDetails['no_of_children'] != 'NULL'? $ProfileDetails['no_of_children'] : '' ?></p>

                                    </div>

                                </div>

                                    <?php }?>

                                <div class="row mb-3">

                                    <div class="col-6 d-flex justify-content-between align-items-center">

                                        <label class="form-label mb-0">Age</label>

                                        <span>:</span>

                                    </div>

                                    <div class="col-6 d-flex align-items-center">

                                        <p class="mb-0"><?= (isset($ProfileDetails['age']) && !empty($ProfileDetails['age'])) ? $ProfileDetails['age'] :'' ?> Yrs</p>

                                    </div>

                                </div>

                                <div class="row mb-3">

                                    <div class="col-6 d-flex justify-content-between align-items-center">

                                        <label class="form-label mb-0">Height</label>

                                        <span>:</span>

                                    </div>

                                    <div class="col-6 d-flex align-items-center">

                                        <p class="mb-0">5 ft - 6 ft</p>

                                    </div>

                                </div>

                                <div class="row mb-3">

                                    <div class="col-6 d-flex justify-content-between align-items-center">

                                        <label class="form-label mb-0">Mother Tangue</label>

                                        <span>:</span>

                                    </div>

                                    <div class="col-6 d-flex align-items-center">

                                        <p class="mb-0">Malayalam</p>

                                    </div>

                                </div>

                                <div class="row mb-3">

                                    <div class="col-6 d-flex justify-content-between align-items-center">

                                        <label class="form-label mb-0">Physical Status</label>

                                        <span>:</span>

                                    </div>

                                    <div class="col-6 d-flex align-items-center">

                                        <p class="mb-0"><?php echo $ProfileDetails['physical_status']; ?></p>

                                    </div>

                                </div>

                                <?php if($ProfileDetails['physical_status']!="Normal")

              {?>

                <div class="row mb-3">

                                    <div class="col-6 d-flex justify-content-between align-items-center">

                                        <label class="form-label mb-0">Disability</label>

                                        <span>:</span>

                                    </div>

                                    <div class="col-6 d-flex align-items-center">

                                        <p class="mb-0"><?php echo $ProfileDetails['phy_status']; ?></p>

                                    </div>

                                </div> 

                                <div class="row mb-3">

                                    <div class="col-6 d-flex justify-content-between align-items-center">

                                        <label class="form-label mb-0">Disability</label>

                                        <span>:</span>

                                    </div>

                                    <div class="col-6 d-flex align-items-center">

                                        <p class="mb-0"><?php echo $ProfileDetails['registration_phychallenge']; ?></p>

                                    </div>

                                </div>

              <?php }?>

                                <div class="row mb-3">

                                    <div class="col-6 d-flex justify-content-between align-items-center">

                                        <label class="form-label mb-0">Nationality</label>

                                        <span>:</span>

                                    </div>

                                    <div class="col-6 d-flex align-items-center">

                                        <p class="mb-0"><?php echo $ProfileDetails['unationality']; ?></p>

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

                                        <p class="mb-0"><?= (isset($ProfileDetails['caste']) && !empty($ProfileDetails['caste'])) ? $ProfileDetails['caste'] : '' ?></p>

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

                                        <p class="mb-0"><?= (isset($ProfileDetails['high_edu']) && !empty($ProfileDetails['high_edu'])) ? $ProfileDetails['high_edu'] : '' ?> </p>

                                    </div>

                                </div>

                                <div class="row mb-3">

                                    <div class="col-6 d-flex justify-content-between align-items-center">

                                        <label class="form-label mb-0">Education</label>

                                        <span>:</span>

                                    </div>

                                    <div class="col-6 d-flex align-items-center">

                                        <p class="mb-0"><?= (isset($ProfileDetails['ueducation']) && !empty($ProfileDetails['ueducation'])) ? $ProfileDetails['ueducation'] : '' ?></p>

                                    </div>

                                </div>

                                <div class="row mb-3">

                                    <div class="col-6 d-flex justify-content-between align-items-center">

                                        <label class="form-label mb-0">Profession Type</label>

                                        <span>:</span>

                                    </div>

                                    <div class="col-6 d-flex align-items-center">

                                        <p class="mb-0"><?= (isset($ProfileDetails['job_category']) && !empty($ProfileDetails['job_category'])) ?  $ProfileDetails['job_category'] : '' ?></p>

                                    </div>

                                </div>

                                <div class="row mb-3">

                                    <div class="col-6 d-flex justify-content-between align-items-center">

                                        <label class="form-label mb-0">Profession</label>

                                        <span>:</span>

                                    </div>

                                    <div class="col-6 d-flex align-items-center">

                                        <p class="mb-0"><?= (isset($ProfileDetails['profession_name']) && !empty($ProfileDetails['profession_name'])) ?  $ProfileDetails['profession_name'] : '' ?> </p>

                                    </div>

                                </div>

                                <div class="row mb-3">

                                    <div class="col-6 d-flex justify-content-between align-items-center">

                                        <label class="form-label mb-0">Job Details</label>

                                        <span>:</span>

                                    </div>

                                    <div class="col-6 d-flex align-items-center">

                                        <p class="mb-0"><?= !empty($ProfileDetails['job_details']) && $ProfileDetails['job_details'] != 'NULL'? $ProfileDetails['job_details'] : '' ?></p>

                                    </div>

                                </div>

                                <div class="row mb-3">

                                    <div class="col-6 d-flex justify-content-between align-items-center">

                                        <label class="form-label mb-0">Annual Income</label>

                                        <span>:</span>

                                    </div>

                                    <div class="col-6 d-flex align-items-center">

                                        <p class="mb-0"><?php echo $ProfileDetails['uincome'];?></p>

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

                                        <p class="mb-0"><?= !empty($ProfileDetails['user_height']) && $ProfileDetails['user_height'] != 'NULL'? $ProfileDetails['user_height'] : '' ?></p>

                                    </div>

                                </div>

                                <div class="row mb-3">

                                    <div class="col-6 d-flex justify-content-between align-items-center">

                                        <label class="form-label mb-0">Weight</label>

                                        <span>:</span>

                                    </div>

                                    <div class="col-6 d-flex align-items-center">

                                    <p class="mb-0"><?= !empty($ProfileDetails['user_weight']) && $ProfileDetails['user_weight'] != 'NULL'? $ProfileDetails['user_weight'] : '' ?></p>

                                    </div>

                                </div>

                                <div class="row mb-3">

                                    <div class="col-6 d-flex justify-content-between align-items-center">

                                        <label class="form-label mb-0">Mother Tongue</label>

                                        <span>:</span>

                                    </div>

                                    <div class="col-6 d-flex align-items-center">

                                        <p class="mb-0"><?= (isset($ProfileDetails['mothertongue']) && !empty($ProfileDetails['mothertongue'])) ? ($ProfileDetails['mothertongue']) : '' ?></p>

                                    </div>

                                </div>

                                <div class="row mb-3">

                                    <div class="col-6 d-flex justify-content-between align-items-center">

                                        <label class="form-label mb-0">Blood Group</label>

                                        <span>:</span>

                                    </div>

                                    <div class="col-6 d-flex align-items-center">

                                    <p class="mb-0"><?= (isset($ProfileDetails['bloodgroup']) && !empty($ProfileDetails['bloodgroup'])) ? ($ProfileDetails['bloodgroup']) : '' ?></p>

                                    </div>

                                </div>

                                <div class="row mb-3">

                                    <div class="col-6 d-flex justify-content-between align-items-center">

                                        <label class="form-label mb-0">Body Type</label>

                                        <span>:</span>

                                    </div>

                                    <div class="col-6 d-flex align-items-center">

                                        <p class="mb-0"><?= (isset($ProfileDetails['bodytype']) && !empty($ProfileDetails['bodytype'])) ? $ProfileDetails['bodytype'] : '' ?></p>

                                    </div>

                                </div>

                                <div class="row mb-3">

                                    <div class="col-6 d-flex justify-content-between align-items-center">

                                        <label class="form-label mb-0">Appearance</label>

                                        <span>:</span>

                                    </div>

                                    <div class="col-6 d-flex align-items-center">

                                        <p class="mb-0"><?= (isset($ProfileDetails['appearance']) && !empty($ProfileDetails['appearance'])) ? $ProfileDetails['appearance']  : '' ?></p>

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

                                        <label class="form-label mb-0">Home Country</label>

                                        <span>:</span>

                                    </div>

                                    <div class="col-6 d-flex align-items-center">

                                        <p class="mb-0"><?php echo $ProfileDetails['hmcity'].",".$ProfileDetails['hmdistrict']."<br>".$ProfileDetails['hmstate'].",".$ProfileDetails['hmcountry'];?> </p>

                                    </div>

                                </div>

                                <div class="row mb-3">

                                    <div class="col-6 d-flex justify-content-between align-items-center">

                                        <label class="form-label mb-0">Present Country</label>

                                        <span>:</span>

                                    </div>

                                    <div class="col-6 d-flex align-items-center">

                                    <p class="mb-0"><?php echo $ProfileDetails['pcity'].",".$ProfileDetails['pdistrict']."<br>".$ProfileDetails['pstate'].",".$ProfileDetails['pcountry'];?> </p>

                                    </div>

                                </div>

                                <div class="customCardHeader">

                                    <h2 class="cardHead mb-md-0">Hobbies</h2>

                                </div>

                                <div class="row mb-3">

                                    <div class="col-6 d-flex justify-content-between align-items-center">

                                        <label class="form-label mb-0">Favourite Sports</label>

                                        <span>:</span>

                                    </div>

                                    <div class="col-6 d-flex align-items-center">

                                        <p class="mb-0"><?= !empty($ProfileDetails['fav_sports']) && $ProfileDetails['fav_sports'] != 'NULL'? $ProfileDetails['fav_sports'] : '' ?></p>

                                    </div>

                                </div>

                                <div class="row mb-3">

                                    <div class="col-6 d-flex justify-content-between align-items-center">

                                        <label class="form-label mb-0">Favourite Food</label>

                                        <span>:</span>

                                    </div>

                                    <div class="col-6 d-flex align-items-center">

                                        <p class="mb-0"><?= !empty($ProfileDetails['fav_food']) && $ProfileDetails['fav_food'] != 'NULL'? $ProfileDetails['fav_food'] : '' ?></p>

                                    </div>

                                </div>

                                <div class="row mb-3">

                                    <div class="col-6 d-flex justify-content-between align-items-center">

                                        <label class="form-label mb-0">Eating Habits</label>

                                        <span>:</span>

                                    </div>

                                    <div class="col-6 d-flex align-items-center">

                                        <p class="mb-0"><?= !empty($ProfileDetails['eating_habits']) && $ProfileDetails['eating_habits'] != 'NULL'? $ProfileDetails['eating_habits'] : '' ?></p>

                                    </div>

                                </div> <div class="row mb-3">

                                    <div class="col-6 d-flex justify-content-between align-items-center">

                                        <label class="form-label mb-0">Favourite Places</label>

                                        <span>:</span>

                                    </div>

                                    <div class="col-6 d-flex align-items-center">

                                        <p class="mb-0"><?= !empty($ProfileDetails['fav_places']) && $ProfileDetails['fav_places'] != 'NULL'? $ProfileDetails['fav_places'] : '' ?></p>

                                    </div>

                                </div> 

                                <div class="row mb-3">

                                    <div class="col-6 d-flex justify-content-between align-items-center">

                                        <label class="form-label mb-0">Movies and Musics</label>

                                        <span>:</span>

                                    </div>

                                    <div class="col-6 d-flex align-items-center">

                                        <p class="mb-0"><?= !empty($ProfileDetails['hobbies']) && $ProfileDetails['hobbies'] != 'NULL'? $ProfileDetails['hobbies'] : '' ?></p>

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

                                        <label class="form-label mb-0">Family Type</label>

                                        <span>:</span>

                                    </div>

                                    <div class="col-6 d-flex align-items-center">

                                        <p class="mb-0"><?= (isset($ProfileDetails['familytype']) && !empty($ProfileDetails['familytype'])) ? $ProfileDetails['familytype'] : '' ?></p>

                                    </div>

                                </div>

                                <div class="row mb-3">

                                    <div class="col-6 d-flex justify-content-between align-items-center">

                                        <label class="form-label mb-0">Financial Status</label>

                                        <span>:</span>

                                    </div>

                                    <div class="col-6 d-flex align-items-center">

                                        <p class="mb-0"><?= (isset($ProfileDetails['financial_status']) && !empty($ProfileDetails['financial_status'])) ? $ProfileDetails['financial_status'] : ''; ?></p>

                                    </div>

                                </div>

                                <div class="row mb-3">

                                    <div class="col-6 d-flex justify-content-between align-items-center">

                                        <label class="form-label mb-0">Home Type</label>

                                        <span>:</span>

                                    </div>

                                    <div class="col-6 d-flex align-items-center">

                                        <p class="mb-0"><?= (isset($ProfileDetails['hometype']) && !empty($ProfileDetails['hometype'])) ? $ProfileDetails['hometype'] == $value->hometype : ''; ?></p>

                                    </div>

                                </div>

                                <div class="row mb-3">

                                    <div class="col-6 d-flex justify-content-between align-items-center">

                                        <label class="form-label mb-0">Number of Family Members</label>

                                        <span>:</span>

                                    </div>

                                    <div class="col-6 d-flex align-items-center">

                                        <p class="mb-0"><?= (isset($ProfileDetails['total_members']) && !empty($ProfileDetails['total_members'])) ? $ProfileDetails['total_members'] : ''; ?></p>

                                    </div>

                                </div>

                                <div class="row mb-3">

                                    <div class="col-6 d-flex justify-content-between align-items-center">

                                        <label class="form-label mb-0">Father Details</label>

                                        <span>:</span>

                                    </div>

                                    <div class="col-6 d-flex align-items-center">

                                        <p class="mb-0"> <?= (isset($ProfileDetails['fatherdetails']) && !empty($ProfileDetails['fatherdetails'])) ? $ProfileDetails['fatherdetails'] : '' ?></p>

                                    </div>

                                </div>

                                <div class="row mb-3">

                                    <div class="col-6 d-flex justify-content-between align-items-center">

                                        <label class="form-label mb-0">Father Occupation</label>

                                        <span>:</span>

                                    </div>

                                    <div class="col-6 d-flex align-items-center">

                                        <p class="mb-0"><?= !empty($ProfileDetails['fathers_occupation']) && $ProfileDetails['fathers_occupation'] != 'NULL'? $ProfileDetails['fathers_occupation'] : '' ?></p>

                                    </div>

                                </div>

                                <div class="row mb-3">

                                    <div class="col-6 d-flex justify-content-between align-items-center">

                                        <label class="form-label mb-0">Mother Details</label>

                                        <span>:</span>

                                    </div>

                                    <div class="col-6 d-flex align-items-center">

                                        <p class="mb-0"><?= (isset($ProfileDetails['motherdetails']) && !empty($ProfileDetails['motherdetails'])) ? $ProfileDetails['motherdetails'] : '' ?></p>

                                    </div>

                                </div>

                                <div class="row mb-3">

                                    <div class="col-6 d-flex justify-content-between align-items-center">

                                        <label class="form-label mb-0">Mother Occupation</label>

                                        <span>:</span>

                                    </div>

                                    <div class="col-6 d-flex align-items-center">

                                        <p class="mb-0"><?= (isset($ProfileDetails['mothers_occupation']) && !empty($ProfileDetails['mothers_occupation'])) ? $ProfileDetails['mothers_occupation'] : '' ?></p>

                                    </div>

                                </div>



                            </div>

                        </div>

                        

                        <div class="col-12 ">

                        <div class="customCard">

                        <div class="customCardHeader">

                            <h2 class="cardHead mb-sm-0">Block Profile</h2>

                        </div>

                        <div class="diamondProBox">

                        <button id="block" class="diamndProBtn" type="button" data-bs-toggle="modal" data-bs-target="#problockModal" <?php if($block!=0){?>style="display:none;"<?php }?> >

                                    Block

                                </button>      

                                <button id="block_done" class="diamndProBtn" type="button" data-bs-toggle="modal"  <?php if($block==0){?>style="display:none;"<?php }?> >

                                    Blocked

                                </button>       

                        </div>

                        </div>

                           

                    </div>



                    <div class="profileListBox">

                        <div class="row">

                            <div class="col-12 col-sm-6 d-flex align-items-center">

                                <h5 class="listTypeHead">Similar profiles</h5>

                            </div>

                            <div class="col-12 col-sm-6 d-flex align-items-center justify-content-sm-end">

                            <?php   if(!empty($MatchingProfiles)){ ?>  <a class="viewAllBtn" href="<?php echo site_url('featured_profiles'); ?>">View All</a><?php }?>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-12">

                                <div class="owl-similerProfile owl-carousel owl-theme">

                                <?php 

                         if(empty($MatchingProfiles)){ ?>

                                <font style="color:red"><b>No Matching Profiles Found</b></font>

                         <?php } 

                         else{           

                                             foreach ($MatchingProfiles as $key) { ?>



                                    <div class="item">

                                        <div class="profileSingleBox">

                                            <div id="carouselProfile1" class="carousel slide" data-bs-ride="carousel">

                                                <div class="carousel-indicators">

                                            

                                                    <button type="button" data-bs-target="#carouselProfile1" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>

                                                </div>

                                                <a href="<?php echo site_url('singleprofile/'.$key->id); ?>">

                                                    <div class="carousel-inner">

                                                    <div class="carousel-item active">

                                                            <div class="proLstBox">

                                                    <?php if(empty($key->user_image)){ //photo empty

                                            if($key->gender== 1){ ?>

                                           

                                                                <img src="<?php echo base_url('/assets/photo_storage/male.png'); ?>" alt="profile image" class="proImg" style="height:100%;" >

                                                               <div class="overlay"></div>

                                            <?php }

                                            else if($key->gender== 2){ ?>

                                                                  <img src="<?php echo base_url('/assets/photo_storage/female.png'); ?>" alt="profile image" class="proImg" style="height:100%;">

                                                              <div class="overlay"></div>

                                            <?php }

                                     } else{ //photo exists

                                        $photo_status = $this->General_Model->check_photoStatus($key->user_image);//check if approved or not

                                        if(isset($photo_status->status) && $photo_status->status != 0 && $photo_status->status != 1){//if approved

                                        $sender_id = $this->session->userdata('user_id');

                                               $receiver_id = $key->id;

                                               $photo_privacy = $this->General_Model->photoprivacy($sender_id,$receiver_id);//check if protected

                                               if($photo_privacy !=1)

                                               {// if public

                             ?>

                                     <img src="<?php echo base_url('/assets/photo_storage/'.$key->user_image); ?>" alt="profile image" class="proImg" style="height:100%;">

                                <div class="overlay"></div>

                            

                                     <?php

                                     }

                                     else{//private

                                        $sender_id = $this->session->userdata('user_id');

                                        $receiver_id = $key->id;

                                        $photo_requeststatus = $this->General_Model->check_photo_requested($sender_id,$receiver_id);//check if protected

if($photo_requeststatus==0)//not requested for photo

{

    $file_pointer = 'assets/photo_storage_blur/'.$key->user_image;

    if(file_exists($file_pointer)){?>



<img src="<?php echo base_url('/assets/photo_storage_blur/'.$key->user_image); ?>" alt="profile image" class="proImg">

<div class="overlay"></div>

                                                                <div class="lockOverlay">

                                                                    <img src="<?php echo base_url();?>assets/images/lockProfile.svg">

                                                                </div>

<?php }

else{//file missing

if($key->gender== 1){ ?>



    <a href="<?php echo site_url('singleprofile/'.$key->id); ?>">

       <img src="<?php echo base_url('/assets/photo_storage/male.png'); ?>" alt="profile image" class="proImg" style="height:100%;">

       </a>

       <div class="overlay"></div>

                                                                <div class="lockOverlay">

                                                                    <img src="<?php echo base_url();?>assets/images/lockProfile.svg">

                                                                </div>

   <?php }

   else if($key->gender== 2){ ?>



    <a href="<?php echo site_url('singleprofile/'.$key->id); ?>">

       <img src="<?php echo base_url('/assets/photo_storage/female.png'); ?>" alt="profile image" class="proImg" style="height:100%;">

       </a>

       <div class="overlay"></div>

                                                                <div class="lockOverlay">

                                                                    <img src="<?php echo base_url();?>assets/images/lockProfile.svg">

                                                                </div>

   <?php }

}

}

else//requested for photo

{

    $photo_requeststatus = $this->General_Model->photo_requeststatus($sender_id,$receiver_id);//check for status of the request

    if($photo_requeststatus==1)

    {

      ?>

       

                 <img src="<?php echo base_url('/assets/photo_storage/'.$key->user_image); ?>" alt="profile image" class="proImg" style="height:100%;">

   <div class="overlay"></div>

   <?php            

       

    }

    else{

        $file_pointer = 'assets/photo_storage_blur/'.$key->user_image;

        if(file_exists($file_pointer)){?>

    

    <img src="<?php echo base_url('/assets/photo_storage_blur/'.$key->user_image); ?>" alt="profile image" class="proImg" style="height:100%;">

    <div class="overlay"></div>

                                                                <div class="lockOverlay">

                                                                    <img src="<?php echo base_url();?>assets/images/lockProfile.svg">

                                                                </div>

    <?php }

    else{

    if($key->gender== 1){ ?>

    

        <a href="<?php echo site_url('singleprofile/'.$key->id); ?>">

           <img src="<?php echo base_url('/assets/photo_storage/male.png'); ?>" alt="profile image" class="proImg" style="height:100%;">

           </a>

           <div class="overlay"></div>

           <div class="lockOverlay">

                                                                    <img src="<?php echo base_url();?>assets/images/lockProfile.svg">

                                                                </div>

       <?php }

       else if($key->gender== 2){ ?>

    

        <a href="<?php echo site_url('singleprofile/'.$key->id); ?>">

           <img src="<?php echo base_url('/assets/photo_storage/female.png'); ?>" alt="profile image" class="proImg" style="height:100%;">

           </a>

           <div class="overlay"></div>

           <div class="lockOverlay">

                                                                    <img src="<?php echo base_url();?>assets/images/lockProfile.svg">

                                                                </div>

       <?php }

    }

    }

}

                                    

                                     }}

                                     else { //not approved 

                                     

                                             if($key->gender== 1){ ?>

                             

                                                     <a href="<?php echo site_url('singleprofile/'.$key->id); ?>">

                                                        <img src="<?php echo base_url('/assets/photo_storage/male.png'); ?>" alt="profile image" class="proImg" style="height:100%;">

                                                        <div class="overlay"></div></a>

                                                       

                                                    <?php }

                                                    else if($key->gender== 2){ ?>

                                                     <a href="<?php echo site_url('singleprofile/'.$key->id); ?>">

                                                        <img src="<?php echo base_url('/assets/photo_storage/female.png'); ?>" alt="profile image" class="proImg" style="height:100%;">

                                                       <div class="overlay"></div> </a>

                                                        

                                                    <?php }

                                             }?>

                                     <?php  }?>

                                                            </div>

                                                        </div>

                                                       

                                                    </div>

                                                </a>

                                                <div class="carouselCount">

                                                    <div class="d-flex align-items-center mb-2">

                                                        <img src="<?php echo base_url()?>assets/images/slideCIcon.svg" class="slideCIcon">

                                                        <p class="num"  id="num1"></p>

                                                    </div>

                                                    <?php

                                                     $checkalreadysend = $this->General_Model->checkShortlisted($key->id);  

?>

                                                    <button type="button" class="bookmarkBtn" onclick="shortlist_profile(<?php echo $key->id;?>)" id="shortlist" <?php if(!empty($checkalreadysend['shortlist_id'])){?> style="display:none;"<?php }?>>

                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15.182 20.279" class="slideBkmark">

                                                            <g transform="translate(0.5 0.5)">

                                                                <path d="M0,18.909V1.773A1.773,1.773,0,0,1,1.773,0H12.409a1.773,1.773,0,0,1,1.773,1.773V18.909L7.091,14.773Z" stroke-width="1"/>

                                                            </g>

                                                        </svg>

                                                    </button>

                                                    <button type="button" class="bookmarkBtn marked" onclick="shortlist_profile(<?php echo $key->id;?>)"id="shortlist_done"<?php if(empty($checkalreadysend['shortlist_id'])){?>style="display:none;"<?php }?>>

                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15.182 20.279" class="slideBkmark">

                                                            <g transform="translate(0.5 0.5)">

                                                                <path d="M0,18.909V1.773A1.773,1.773,0,0,1,1.773,0H12.409a1.773,1.773,0,0,1,1.773,1.773V18.909L7.091,14.773Z" stroke-width="1"/>

                                                            </g>

                                                        </svg>

                                                    </button>

                                                </div>

                                            </div>

                                          

                                            <div class="contentBox">

                                        <?php if(!empty($key->is_online) && $key->is_online==1) {?><p class="status"><span class="online"></span>Online</p><?php }?>

                                                <div class="d-flex align-item-center mb-2  justify-content-start">

                                                    <img src="<?php echo base_url();?>assets/images/linkGreen.svg" alt="link Green" class="linkGreen me-1" width="auto" height="auto">

                                                    <span class="proDtls"><?php echo $key->name;?></span>

                                                    <img src="<?php echo base_url();?>assets/images/nameCrownIcon.svg" alt="Crown Icon" class="profileico" width="auto" height="auto">

                                                </div>

                                                <ul class="proDtlList">

                                    <?php if(!empty($key->happynikah_id)) { ?><li><?php echo $key->happynikah_id;?></li><?php }?>

                                           <li><?php echo $key->age;?> Yrs  <?php if(!empty($key->height)) { echo ','.$key->height; }?></li>

                                            <?php if(!empty($key->marital_status)) { ?><li><?php echo $key->marital_status;?></li><?php }?>

                                            <?php if(!empty($key->education)) { ?><li><?php echo $key->education;?></li><?php }?>

                                            <?php if(!empty($key->profession_name)) { ?><li><?php echo $key->profession_name;?></li><?php }?>

                                            <?php if(!empty($key->user_caste)) { ?><li><?php echo $key->user_caste;?></li><?php }?>

                                            <?php if(!empty($key->district)) { ?><li><?php echo $key->district;?></li><?php }?>

                                            <?php if(!empty($key->userstate)) { ?><li><?php echo $key->userstate;?></li><?php }?>



                                                </ul>

                                            </div>

                                            <ul class="d-flex justify-content-between profOptnsList">

                                          

                            <?php $checkalreadysend = $this->General_Model->checkinterestsend($key->id);  ?>

<li id="express_<?php echo $key->id;?>"<?php if(!empty($checkalreadysend['interest_id'])){ ?>style="display:none;"<?php }?>>



 <ahref="javascript:void(0)" class="d-flex align-items-center"><img src="<?php echo base_url();?>assets/images/Intrest.svg" class="icon">



<span  id="express_<?php echo $key->id;?>" onclick="expressinterest('<?php echo $key->id; ?>')">Interest</span></a>

</li>

<li id="express_done_<?php echo $key->id;?>" <?php if(empty($checkalreadysend['interest_id'])){ ?>style="display:none;"<?php }?>>



 <ahref="javascript:void(0)" class="d-flex align-items-center"><img src="<?php echo base_url();?>assets/images/checkedG.png" class="icon">



<span   onclick="expressinterest('<?php echo $key->id; ?>')">Interested</span></a>

</li>



                                                

                                                <li>

                                                    <a href="<?php echo base_url('userchat/'.$key->id);?>" class="d-flex align-items-center">

                                                        <img src="<?php echo base_url();?>assets/images/Chat1.svg" class="icon">

                                                        <span>Chat</span>

                                                    </a>

                                                </li>

                                               

<?php $checkalreadysend = $this->General_Model->checkignoresend($key->id);  ?>

<li id="ignore_<?php echo $key->id;?>"<?php if(!empty($checkalreadysend['id'])){ ?>style="display:none;"<?php }?>>



 <a href="javascript:void(0)" class="d-flex align-items-center"><img src="<?php echo base_url();?>assets/images/Ignore.svg" class="icon">



<span  onclick="ignore_profile('<?php echo $key->id; ?>')">Ignore</span></a>

</li>

<li id="ignore_done_<?php echo $key->id;?>" <?php if(empty($checkalreadysend['id'])){ ?>style="display:none;"<?php }?>>



 <a href="javascript:void(0)" class="d-flex align-items-center"><img src="<?php echo base_url();?>assets/images/Ignore.svg" class="icon">



<span   onclick="ignore_profile('<?php echo $key->id; ?>')">Ignored</span></a>

</li>

                                            </ul>

                                        </div>

                                    </div>

                                    <?php }}

                                   ?>

                                </div>

                               

                            </div>

                        </div>

                    </div>

                   



                    <!-- enroll button -->

                    <div class="enrollBox2 mb-5 d-sm-flex d-md-block d-lg-flex align-items-stretch">

                        <div class="contentBox">

                            <p class="enrollPara">Enroll for the assisted services &amp; enjoy personalized matchmaking</p>

                            <a href="<?php echo site_url('upgradeto_premium'); ?>">



                            <button type="button" class="enrollBtn">Enroll Now</button>

                            </a>

                        </div>

                        <div class="imgBox">

                            <img src="<?php echo base_url();?>assets/images/enrollImg.jpg" class="enrollImg d-sm-none d-md-block d-lg-none">

                            <img src="<?php echo base_url();?>assets/images/enrollImg.png" class="enrollImg d-none d-sm-block d-md-none d-lg-block">

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



    <!-- lock Modal -->

    <div class="modal fade" id="proLockModal" tabindex="-1" aria-labelledby="proLockModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered modal-lg">

        <div class="modal-content">



<div class="modal-body p-5 bgbody">

  <a class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>

    

    <div class="d-md-flex align-items-center">

    <div class="flex-shrink-0">

                                

                                <?php if(empty($ProfileDetails['user_image'])){ 

                                                

                                                if($ProfileDetails['gender']== 1){ ?>

                                         

    

             <img src="<?php echo base_url('/assets/photo_storage/male.png'); ?>" alt="profile image" class="proImgMain">

                                                                   

                                                <?php }

                                                else if($ProfileDetails['gender']== 2){ ?>

                                                

             <img src="<?php echo base_url('/assets/photo_storage/female.png'); ?>" alt="profile image" class="proImgMain">

                                                                             

                                                <?php }

                                         } else {

                                            $photo_status = $this->General_Model->check_photoStatus($ProfileDetails['user_image']);//check if approved or not

                                           

                                            if(isset($photo_status->status) && $photo_status->status != 0 && $photo_status->status != 1){//if approved

                                               

                                            $sender_id = $this->session->userdata('user_id');

                                                   $receiver_id = $ProfileDetails['id'];

                                                   $photo_privacy = $this->General_Model->photoprivacy($sender_id,$receiver_id);//check if protected

                                                   if($photo_privacy !=1)

                                                   {// if public

                                           ?>

                    <a class="example-image-link" href="<?php echo base_url('/assets/photo_storage/'.$ProfileDetails['user_image']); ?>" data-lightbox="example-1">

                                         <img src="<?php echo base_url('assets/photo_storage/');?><?php echo $ProfileDetails['user_image']; ?>" alt="profile image"class="proImgMain" >

    

                                           <?php

                                         }//end of public

                                         else{//private

                                            $i=0; 

                                            $sender_id = $this->session->userdata('user_id');

                                            $receiver_id = $ProfileDetails['id'];

                                            $photo_requeststatus = $this->General_Model->check_photo_requested($sender_id,$receiver_id);//check if protected

    if($photo_requeststatus==0)//not requested for photo

    {

        

            $file_pointer = 'assets/photo_storage_blur/'.$ProfileDetails['user_image'];

                            if(file_exists($file_pointer)){?>

    

                    <img src="<?php echo base_url('/assets/photo_storage_blur/'.$ProfileDetails['user_image']); ?>" alt="profile image" class="proImgMain">

                    <div class="overlay"></div>

                                                                <div class="lockOverlay">

                                                                    <img src="<?php echo base_url();?>assets/images/lockProfile.svg">

                                                                </div>          

                            

       <?php }

       else{

        if($ProfileDetails['gender']== 1){ ?>

    

                <a href="<?php echo site_url('singleprofile/'.$ProfileDetails['id']); ?>">

                   <img src="<?php echo base_url('/assets/photo_storage/male.png'); ?>" alt="profile image" class="proImgMain">

                   </a>

                  

               <?php }

               else if($ProfileDetails['gender']== 2){ ?>

    

                <a href="<?php echo site_url('singleprofile/'.$ProfileDetails['id']); ?>">

                   <img src="<?php echo base_url('/assets/photo_storage/female.png'); ?>" alt="profile image" class="proImgMain">

                   </a>

                  

               <?php }}

       }//end of not requessted

       else{

        $photo_requeststatus = $this->General_Model->photo_requeststatus($sender_id,$receiver_id);//check for status of the request

        if($photo_requeststatus==1)

        {

    ?>       

                     <img src="<?php echo base_url('assets/photo_storage/');?><?php echo $ProfileDetails['user_image']; ?>" alt="profile image" class="proImgMain">

          <?php         

        }

        else{

            $file_pointer = 'assets/photo_storage_blur/'.$ProfileDetails['user_image'];

            if(file_exists($file_pointer)){?>

        

        <img src="<?php echo base_url('/assets/photo_storage_blur/'.$ProfileDetails['user_image']); ?>" alt="profile image" class="proImgMain">

        <div class="overlay"></div>                                                       <div class="lockOverlay">

                                                                        <img src="<?php echo base_url();?>assets/images/lockProfile.svg">

                                                                    </div>

        <?php }

        else{

        if($ProfileDetails['gender']== 1){ ?>

        

            <a href="<?php echo site_url('singleprofile/'.$ProfileDetails['id']); ?>">

               <img src="<?php echo base_url('/assets/photo_storage/male.png'); ?>" alt="profile image" class="proImgMain">

               </a>

               <div class="overlay"></div>

               <div class="lockOverlay">

                                                                        <img src="<?php echo base_url();?>assets/images/lockProfile.svg">

                                                                    </div>

           <?php }

           else if($ProfileDetails['gender']== 2){ ?>

        

            <a href="<?php echo site_url('singleprofile/'.$ProfileDetails['id']); ?>">

               <img src="<?php echo base_url('/assets/photo_storage/female.png'); ?>" alt="profile image" class="proImgMain">

               </a>

               <div class="overlay"></div>

               <div class="lockOverlay">

                                                                        <img src="<?php echo base_url();?>assets/images/lockProfile.svg">

                                                                    </div>

           <?php }

        }

        }

    }  //end of not requested

    }//end of private

                                         }//end of approved

                                         else { //not approved 

                                         

                                            if($ProfileDetails['gender']== 1){ ?>

                          

                                                    <a href="<?php echo site_url('singleprofile/'.$ProfileDetails['id']); ?>">

                                                       <img src="<?php echo base_url('/assets/photo_storage/male.png'); ?>" alt="profile image" class="proImgMain">

                                                       </a>

                                                      

                                                   <?php }

                                                   else if($ProfileDetails['gender']== 2){ ?>

                                                  <a href="<?php echo site_url('singleprofile/'.$ProfileDetails['id']); ?>">

                                                       <img src="<?php echo base_url('/assets/photo_storage/female.png'); ?>" alt="profile image" class="proImgMain">

                                                       </a>

                                                       

                                                   <?php $i++;}

                                            }

                                         }//end of not empty

                                         ?>

                                </div>

    <div class="flex-grow-1 ms-md-3">

        <!-- <img class="logo" src="<?= base_url()?>assets/images/HappyNikah.png"> -->

        <h3>Request to view Protected Photo</h3>  

            <p>The Photo has been protected by the owner of this profile. Please click on the below button to request for photo.</p>



            <div class="d-flex align-items-center justify-content-between">

    



<?php

$check_requested = $this->General_Model->check_photo_requested($this->session->userdata('user_id'),$ProfileDetails['id']);

if($check_requested == '1')

{?>

    <button class="btn cstmBtnColr rqustProfileBtn">Requested for photo</button>

<?php }

else{?>

    <button onclick="requestphoto('<?= $ProfileDetails['id']?>')" class="btn cstmBtnColr rqustProfileBtn">Request photo</button>

<?php }

?></div></div>

 </div>

</div>

        </div>

    </div>

    </div>

    <!-- report Modal -->

    <div class="modal fade" id="proreportModal" tabindex="-1" aria-labelledby="proreportModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered modal-lg">

            <div class="modal-content">

                 

                <div class="modal-body p-4 p-sm-5">



                

                    <a class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="float:right;"></a>



                        <div id="message_box" style="display:none;">

                        <h5><font color="green"> Report has been sent successfully..</font><h5>

                                            </div>

                                             <div id="message_errorbox" style="display:none;">

                        <h5><font color="red"> All fields are required..</font><h5>

                                            </div>

                        <form class="customForm"id="report_form">

                        <div class="row">

                               <div class="col-12 col-md-6">

                                    

                                <label class="form-label">Reason :</label>

                                

                                    <select class="form-control" name="reason" required="required" id="report_reason">

                                    <option value="">---Select Reason---</option>

                                    <option value="Inappropriate Profile">Inappropriate Profile</option>

                                    <option value="Inappropriate Messages">Inappropriate Messages</option>

                                    <option value="Misusing HappyNikah">Misusing HappyNikah</option>

                                    <option value="Already Married">Already Married</option>

                                    <option value="Wrong Contact Details">Wrong Contact Details</option>

                                    <option value="Scam or Spam">Scam or Spam</option>

                                    </select>

                                </div>

                                <br/>

                                 <div class="col-12 col-md-12">

                                 <label class="form-label" style="margin-top:15px;">Comments :</label>

                                <textarea name="comments" class="form-control" id="report_comments" ></textarea>

                                            </div>

                                <div class="col-12 col-md-12 mb-4">

                                    </br>

                                   <input class="btn cstmBtnColr"  type="button" value="Submit" onclick="sendreport('<?php echo $ProfileDetails['id']; ?>')">

                                   </div> 

                                           

                            </div>

                        </form>



                </div>

            </div>

        </div>

    </div>

    <!-- block Modal -->

    

    <div class="modal fade" id="problockModal" tabindex="-1" aria-labelledby="proLockModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered modal-lg">

            <div class="modal-content">

                

                <div class="modal-body p-4 p-sm-5">

                    <a style="align:right"  class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>

                 

                    <div class="d-md-flex align-items-center">

                   

                    <div class="flex-grow-1 ms-md-3">

                            <div class="enterPW">

                    <div id="message_box1" style="display:none;">

                        <h5><font color="green"> Blocked Profile Successfully..</font><h5>

                                            </div>

                                             <div id="message_box2" style="display:none;">

                        <h5><font color="red"> All fields are required..</font><h5>

                                            </div>

                        <form class="customForm" method="post" id="block_form">

                            <div class="row">

                            <div class="enterPW">

                               

                                    

                                <h5 class="mb-3">Reason :</h5>

                                <div class="mb-4">

                                    <select class="form-control" name="blockreason" required="required">

                                    <option value="">---Select Reason---</option>

                                    <option value="Inappropriate Profile">Inappropriate Profile</option>

                                    <option value="Inappropriate Messages">Inappropriate Messages</option>

                                    <option value="Misusing HappyNikah">Misusing HappyNikah</option>

                                    <option value="Already Married">Already Married</option>

                                    <option value="Wrong Contact Details">Wrong Contact Details</option>

                                    <option value="Scam or Spam">Scam or Spam</option>

                                    </select>

                                </div>

                           

                                <h5 class="mb-3">Comments :</h5>

                                <div class="mb-4"> <textarea name="comments" class="form-control" id="blockcomments" ></textarea>

                                            </div>

                                <div class="mb-4">

                                   <input type="button" class="btn cstmBtnColr upgradeProModal" value="Submit" onclick="blockprofile('<?php echo $ProfileDetails['id']; ?>')">

                                </div> 

                                            </div> 

                            </div>

                        </form>

                    </div>

                                            </div>                        </div>              

                </div>

            </div>

        </div>

    </div>

    <!-- call Modal -->



    <div class="modal fade" id="proCallModal" tabindex="-1" aria-labelledby="proLockModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered modal-lg">

            <div class="modal-content" style="width:80%;background: url(https://happynikah.com/assets/images/Splashbg.png);background-size: contain;

                  background-position: center center;">

                <div class="modal-body p-4 p-sm-5">

                    <a class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>

                    <div class="normalUser">

                        <div class="d-flex align-items-center mb-3">

                            <div class="flex-shrink-0">

                                

                            <?php

                            

                            if(empty($ProfileDetails['user_image'])){ 

                                            

                                            if($ProfileDetails['gender']== 1){ ?>

                                     



         <img src="<?php echo base_url('/assets/photo_storage/male.png'); ?>" alt="profile image" class="proImgMain">

                                                               

                                            <?php }

                                            else if($ProfileDetails['gender']== 2){ ?>

                                            

         <img src="<?php echo base_url('/assets/photo_storage/female.png'); ?>" alt="profile image" class="proImgMain">

                                                                         

                                            <?php }

                                     } else {

                                       

                                        $photo_status = $this->General_Model->check_photoStatus($ProfileDetails['user_image']);//check if approved or not

                                     

                                        if(isset($photo_status->status) && $photo_status->status != 0 && $photo_status->status != 1){//if approved

                                           

                                        $sender_id = $this->session->userdata('user_id');

                                               $receiver_id = $ProfileDetails['id'];

                                               $photo_privacy = $this->General_Model->photoprivacy($sender_id,$receiver_id);//check if protected

                                               if($photo_privacy !=1)

                                               {// if public

                                       ?>

                        <a class="example-image-link" href="<?php echo base_url('/assets/photo_storage/'.$ProfileDetails['user_image']); ?>" data-lightbox="example-1">

                                   

                                     <img src="<?php echo base_url('assets/photo_storage/');?><?php echo $ProfileDetails['user_image']; ?>" alt="profile image"class="proImgMain" >

                                               </a>

                                       <?php

                                     }//end of public

                                     else{//private

                                        $i=0; 

                                        $sender_id = $this->session->userdata('user_id');

                                        $receiver_id = $ProfileDetails['id'];

                                        $photo_requeststatus = $this->General_Model->check_photo_requested($sender_id,$receiver_id);//check if protected

if($photo_requeststatus==0)//not requested for photo

{

    

        $file_pointer = 'assets/photo_storage_blur/'.$ProfileDetails['user_image'];

                        if(file_exists($file_pointer)){?>



                <img src="<?php echo base_url('/assets/photo_storage_blur/'.$ProfileDetails['user_image']); ?>" alt="profile image" class="proImgMain">

                <div class="overlay"></div>

                                                                <div class="lockOverlay">

                                                                    <img src="<?php echo base_url();?>assets/images/lockProfile.svg">

                                                                </div>       

                        

   <?php }

   else{

    if($ProfileDetails['gender']== 1){ ?>



            <a href="<?php echo site_url('singleprofile/'.$ProfileDetails['id']); ?>">

               <img src="<?php echo base_url('/assets/photo_storage/male.png'); ?>" alt="profile image" class="proImgMain">

               </a>

              

           <?php }

           else if($ProfileDetails['gender']== 2){ ?>



            <a href="<?php echo site_url('singleprofile/'.$ProfileDetails['id']); ?>">

               <img src="<?php echo base_url('/assets/photo_storage/female.png'); ?>" alt="profile image" class="proImgMain">

               </a>

              

           <?php }}

   }//end of not requessted

   else{

    $photo_requeststatus = $this->General_Model->photo_requeststatus($sender_id,$receiver_id);//check for status of the request

    if($photo_requeststatus==1)

    {

?>       

                 <img src="<?php echo base_url('assets/photo_storage/');?><?php echo $ProfileDetails['user_image']; ?>" alt="profile image" class="proImgMain">

      <?php         

    }

    else{

        $file_pointer = 'assets/photo_storage_blur/'.$ProfileDetails['user_image'];

        if(file_exists($file_pointer)){?>

    

    <img src="<?php echo base_url('/assets/photo_storage_blur/'.$ProfileDetails['user_image']); ?>" alt="profile image" class="proImgMain">

    <div class="overlay"></div>                                            <div class="lockOverlay">

                                                                    <img src="<?php echo base_url();?>assets/images/lockProfile.svg">

                                                                </div>

    <?php }

    else{

    if($ProfileDetails['gender']== 1){ ?>

    

        <a href="<?php echo site_url('singleprofile/'.$ProfileDetails['id']); ?>">

           <img src="<?php echo base_url('/assets/photo_storage/male.png'); ?>" alt="profile image" class="proImgMain">

           </a>

           <div class="overlay"></div>

           <div class="lockOverlay">

                                                                    <img src="<?php echo base_url();?>assets/images/lockProfile.svg">

                                                                </div>

       <?php }

       else if($ProfileDetails['gender']== 2){ ?>

    

        <a href="<?php echo site_url('singleprofile/'.$ProfileDetails['id']); ?>">

           <img src="<?php echo base_url('/assets/photo_storage/female.png'); ?>" alt="profile image" class="proImgMain">

           </a>

           <div class="overlay"></div>

           <div class="lockOverlay">

                                                                    <img src="<?php echo base_url();?>assets/images/lockProfile.svg">

                                                                </div>

       <?php }

    }

    }

}  //end of not requested

}//end of private

                                     }//end of approved

                                     else { //not approved 

                                    

                                        if($ProfileDetails['gender']== 1){ ?>

                      

                                                <a href="<?php echo site_url('singleprofile/'.$ProfileDetails['id']); ?>">

                                                   <img src="<?php echo base_url('/assets/photo_storage/male.png'); ?>" alt="profile image" class="proImgMain">

                                                   </a>

                                                  

                                               <?php }

                                               else if($ProfileDetails['gender']== 2){ ?>

                                              <a href="<?php echo site_url('singleprofile/'.$ProfileDetails['id']); ?>">

                                                   <img src="<?php echo base_url('/assets/photo_storage/female.png'); ?>" alt="profile image" class="proImgMain">

                                                   </a>

                                                   

                                               <?php $i++;}

                                        }

                                     }//end of not empty

                                     ?>

                            </div>

                            <div class="flex-grow-1 ms-3">

                                <div class="enterPW">

                                    <h3 class="mb-1"><?= !empty($ProfileDetails['name'])? $ProfileDetails['name'] : '' ?></h3>

                                    <p class="proId"><?= !empty($ProfileDetails['happynikah_id'])? $ProfileDetails['happynikah_id'] : '' ?></p>

                                </div>

                            </div>

                        </div>

                        <?php

                        if(empty($payment_done))

                        {?>

                        <p>To view the contact details you must be a premium member. For Support, Please Reach our customer care.</p>

                        <div class="d-sm-flex align-items-center justify-content-between">

                         <a href="<?php echo site_url()?>upgradeto_premium">   

                         

                         <button type="button" class="btn cstmBtnColr upgradeProModal"><img src="<?php echo base_url();?>assets/images/crownW.png">Upgrade Now</button></a>

                            <p class="cutmrCare">Customer care : +918593999888</p>

                        </div>

                        <?php }?>

                    </div>

                    <?php

                        if(!empty($payment_done))

                        {

                          

                            

                            $expiry_date = strtotime($payment_done[0]->expiry_date);

                            $today_date = strtotime(date('Y-m-d'));

                            $datediff = $today_date - $expiry_date;

                            $round_diff = round($datediff/(60*60*24));

                            if($round_diff < '0')

                            {

                                $uri_profileID = $this->uri->segment(3);

                                $check_profileID = $this->General_Model->check_profileID_contactview($this->session->userdata('user_id'),$uri_profileID);

                               

//$updatestatus = $this->General_Model->update_contactview($this->session->userdata('user_id'),$uri_profileID);

if(!empty($check_profileID))

                                {  ?>

                    <div class="proUser">

                       

                        <form class="customForm">

                            <div class="row">

                                <div class="col-12 col-md-6 mb-3">

                                    <label class="form-label">Phone :</label>

                                    <input type="text" class="form-control" value="<?= !empty($ProfileDetails['countryCode'])? $ProfileDetails['countryCode'] : '' ."-".!empty($ProfileDetails['phone'])? $ProfileDetails['phone'] : ''?>" disabled="">

                                </div>

                                <div class="col-12 col-md-6 mb-3">

                                    <label class="form-label">Secondary Phone :</label>

                                    <input type="text" class="form-control" value="<?= !empty($ProfileDetails['secondary_code'])? $ProfileDetails['secondary_code'] : '' ."-".!empty($ProfileDetails['other_contact_number'])? $ProfileDetails['other_contact_number'] : '' ?>" disabled="">

                                </div>

                                <div class="mb-3">

                                    <label class="form-label">Address :</label>

                                    <div class="form-control textArea">

                                    <?= !empty($ProfileDetails['address'])? $ProfileDetails['address'] : '' ?>                                    </div>

                                </div> 

                                <div class="mb-3">

                                    <label class="form-label">Mail :</label>

                                    <div class="form-control textArea">

                                    <?= !empty($ProfileDetails['mail'])? $ProfileDetails['mail'] : '' ?>                                    </div>

                                </div>

                               

                            </div>

                        </form>

                    </div>

                    <?php } else{

                                    if(count($contact_viewed) == (($payment_done[0]->contactbalance)+($payment_done[0]->addoncontact)))

                                    {

                                    

                                    ?>

                                    <p> You have viewed <?php echo $payment_done[0]->contacts;?> contacts. </p>

                        <div class="d-sm-flex align-items-center justify-content-between">

                           <a href="<?php echo site_url()?>upgradeto_premium">

                                <button type="button" class="btn cstmBtnColr upgradeProModal"><img src="<?php echo base_url();?>assets/images/crownW.png">Upgrade Now</button></a>

                            <p class="cutmrCare">Customer care : +918593999888</p>

                        </div>

                                    <?php }

                                    else{

                                          ?> 

                                          

                        <div class="d-sm-flex align-items-center justify-content-between" id="show_contact_div">

                         

                         <a onclick="update_contact_viewed(<?php echo $this->uri->segment(2);?>)">   <button type="button" class="btn cstmBtnColr upgradeProModal">

                        

                        <img src="<?php echo base_url();?>assets/images/crownW.png">Click here to view the contact details</button></a>

                        </div>

                        

                       <br>

                       <br>

                                    <div class="proUser" style="display:none;" id="contact_div">

                                       

                                        <form class="customForm">

                                            <div class="row">

                                                <div class="col-12 col-md-6 mb-3">

                                                    <label class="form-label">Phone :</label>

                                                    <input type="text" class="form-control" value="<?= !empty($ProfileDetails['countryCode'])? $ProfileDetails['countryCode'] : '' ."-".!empty($ProfileDetails['phone'])? $ProfileDetails['phone'] : ''?>" disabled="">

                                                </div>

                                                <div class="col-12 col-md-6 mb-3">

                                                    <label class="form-label">Secondary Phone :</label>

                                                    <input type="text" class="form-control" value="<?= !empty($ProfileDetails['secondary_code'])? $ProfileDetails['secondary_code'] : '' ."-".!empty($ProfileDetails['other_contact_number'])? $ProfileDetails['other_contact_number'] : '' ?>" disabled="">

                                                </div>

                                                <div class="mb-3">

                                                    <label class="form-label">Address :</label>

                                                    <div class="form-control textArea">

                                                    <?= !empty($ProfileDetails['address'])? $ProfileDetails['address'] : '' ?>                                    </div>

                                                </div> 

                                                <div class="mb-3">

                                                    <label class="form-label">Mail :</label>

                                                    <div class="form-control textArea">

                                                    <?= !empty($ProfileDetails['mail'])? $ProfileDetails['mail'] : '' ?>                                    </div>

                                                </div>

                                               

                                            </div>

                                        </form>

                                    </div>

                                    <?php

                                    }

                                }



                                

                            }

                            else

                            { 

                                ?>

                                 Your Plan has been Expired. For Support, Please Reach our customer care.</p>

                        <div class="d-sm-flex align-items-center justify-content-between">

                           <a href="<?php echo site_url()?>upgradeto_premium"> 

                           <button type="button" class="btn cstmBtnColr upgradeProModal"><img src="<?php echo base_url();?>assets/images/crownW.png">

                           Upgrade Now</button></a>

                            <p class="cutmrCare">Customer care : +918593999888</p>

                        </div>

                                <?php

                            }   

                        }?>

                </div>

            </div>

        </div>

    </div>



    



    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-3.6.0.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.bundle.min.js"></script>

    <script src="<?php echo base_url();?>assets/js/owl.carousel.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/lightbox.min.js"></script>



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



            // profile slider count

            var totalItems = $('#carouselProfile1 .carousel-item').length;

            var currentIndex = $('#carouselProfile1 .carousel-item.active').index() + 1;

            $('#num1').html('' + currentIndex + '/' + totalItems + '');





            $('#carouselProfile1').bind('slid.bs.carousel', function() {

              currentIndex = $('#carouselProfile1 .carousel-item.active').index() + 1;

              $('#num1').html('' + currentIndex + '/' + totalItems + '');

            });



            // my profile slider count

            var tProImg = $('#carouselMyProfile .carousel-item').length;

            var currentIndexPro = $('#carouselMyProfile .carousel-item.active').index() + 1;

            $('#profImgCount').html('' + currentIndexPro + '/' + tProImg + '');

            $('#carouselMyProfile').bind('slid.bs.carousel', function() {

              currentIndexPro = $('#carouselMyProfile .carousel-item.active').index() + 1;

              $('#profImgCount').html('' + currentIndexPro + '/' + tProImg + '');

            });





            // profile password modal

            $(".submitProfPw").click(function(){

                $(".profileImgBox").removeClass("lockedImg");

            }); 

            $(".requstPwProf").click(function(){

                $(".enterPW").addClass("d-none");

                $(".rqustPW").removeClass("d-none");

            }); 

            $(".alreadyPwProf").click(function(){

                $(".rqustPW").addClass("d-none");

                $(".enterPW").removeClass("d-none");

            }); 



            $(".rqustProfileBtn").click(function(){

                $(this).toggleClass("clicked");

            });



            // profile call modal

            $(".upgradeProModal").click(function(){

                $(".normalUser").addClass("d-none");

                $(".proUser").removeClass("d-none");

            }); 



            // bookmark profile 

            $(".bookmarkBtn").click(function(){

                $(this).toggleClass("marked");

            });





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

function sendreport(receiver_id){



    var reason=$("#report_reason").val();

    var comments=$("#report_comments").val();

     if(reason=="" || comments=="")

    {

         $("#message_errorbox").show();

         return false;

    }

url_address='<?php echo site_url('user/report_profile'); ?>';

       data = { receiver_id : receiver_id,reason:reason,comments:comments,};

       $.ajax({

           type: "post",

           url: url_address,

           data: data,

           success: function(response){ 

                $("#message_errorbox").hide();

            $("#message_box").show();

            $("#report_form").hide();

              $('#report_done').toggle();

              $('#report').toggle();

         },

            





});



}

function blockprofile(receiver_id)

{ 

   

    var reason=$("#blockreason").val();

    var comments=$("#blockcomments").val();

     if(reason=="" || comments=="")

    {

         $("#message_box2").show();

         return false;

    }

url_address='<?php echo site_url('user/block'); ?>';

       data = { receiver_id : receiver_id,reason:reason,comments:comments,};

       $.ajax({

           type: "post",

           url: url_address,

           data: data,

           success: function(response){ 

            $("#message_box2").hide();

            $("#message_box1").show();

            $("#block_form").hide();

            $('#block_done').toggle();

            $('#block').toggle();

         },

            





});

}

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

    function expressinterest(receiver_id){



$('#sendinterest'+receiver_id).toggleClass("clicked");

url_address='<?php echo site_url() ?>/user/send_interest';

       data = { receiver_id : receiver_id};

       $.ajax({

           type: "post",

           url: url_address,

           data: data,

           success: function(response){ 

            $('#express_done_'+receiver_id).toggle();

              $('#express_'+receiver_id).toggle();

             

         },

           error: function(XMLHttpRequest, textStatus, errorThrown){

              alert(textStatus);

         }







});



}

        function ignore_profile(receiver_id)

        {

        url_address='<?php echo site_url() ?>/user/ignore_profile';

        data = { receiver_id : receiver_id};

        $.ajax({

        type: "post",

        url: url_address,

        data: data,

        success: function(response){ 

        $('#ignore_done_'+receiver_id).toggle();

        $('#ignore_'+receiver_id).toggle();    

        },

        error: function(XMLHttpRequest, textStatus, errorThrown){

        alert(textStatus);

        }

        

        

        

        });

        

        }

        function shortlist_profile(receiver_id)

        {

        url_address='<?php echo site_url() ?>/user/shortlist';

        data = { receiver_id : receiver_id};

        $.ajax({

        type: "post",

        url: url_address,

        data: data,

        success: function(response){ 

        if(response==1)

        {

        alert("The Profile has been Shortlisted..");

        }

        else{

        alert("The Profile has been removed from Shortlisted..");

        

        }

        

        

        },

        error: function(XMLHttpRequest, textStatus, errorThrown){

        alert(textStatus);

        }

        

        

        

        });

        }



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