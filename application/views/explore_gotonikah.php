<!DOCTYPE html>
<html>
<?php include('include/user_header_gotonikah.php'); ?>
    <section id="userContent">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-5 col-lg-4">
                <?php include('include/user_info_gotonikah.php'); ?>
            <?php include('include/side_menu_gotonikah.php'); ?>
                  
                </div>
                <div class="col-12 col-md-7 col-lg-8">
                    
                    <!-- explore tabs -->
                    <div class="nav nav-pills mb-5 exploreTabs nav-fill"  role="tablist">
                        <button class="nav-link active" id="v-pills-intrests-tab" data-bs-toggle="pill" data-bs-target="#v-pills-intrests" type="button" role="tab" aria-controls="v-pills-intrests" aria-selected="true">
                            <img src="<?php echo base_url() ?>assets/images/Interest_goto.png" class="colorImg">
                            <span>INTERESTS</span>
                        </button>
                        <button class="nav-link" id="v-pills-profileVisit-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profileVisit" type="button" role="tab" aria-controls="v-pills-profileVisit" aria-selected="false">
                            <img src="<?php echo base_url() ?>assets/images/Profilevisit_goto.png" class="colorImg">
                            <span>PROFILE VISITS</span>
                        </button>
                        <button class="nav-link" id="v-pills-contacts-tab" data-bs-toggle="pill" data-bs-target="#v-pills-contacts" type="button" role="tab" aria-controls="v-pills-contacts" aria-selected="false">
                            <img src="<?php echo base_url() ?>assets/images/Contacts_gotonikah.png" class="colorImg">
                            <span>CONTACTS</span>
                        </button>
                        <button class="nav-link" id="v-pills-shortlist-tab" data-bs-toggle="pill" data-bs-target="#v-pills-shortlist" type="button" role="tab" aria-controls="v-pills-shortlist" aria-selected="false">
                            <img src="<?php echo base_url() ?>assets/images/Shortlist_gotonikah.png" class="colorImg">
                            <span>SHORTLIST</span>
                        </button>
                        <button class="nav-link" id="v-pills-blocked-tab" data-bs-toggle="pill" data-bs-target="#v-pills-blocked" type="button" role="tab" aria-controls="v-pills-blocked" aria-selected="false">
                            <img src="<?php echo base_url() ?>assets/images/Ignore_gotonikah.png" class="colorImg">
                            <span>IGNORED</span>
                        </button>
                    </div>

                    
                    
                    <!-- explore content -->
                    <div class="tab-content exploreContents" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-intrests" role="tabpanel" aria-labelledby="v-pills-intrests-tab">
                            <ul class="nav nav-pills nav-fill" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-intrestRecvd-tab" data-bs-toggle="pill" data-bs-target="#pills-intrestRecvd" type="button" role="tab" aria-controls="pills-intrestRecvd" aria-selected="true">Recieved</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-intrestSent-tab" data-bs-toggle="pill" data-bs-target="#pills-intrestSent" type="button" role="tab" aria-controls="pills-intrestSent" aria-selected="false">Sent</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-intrestAccptd-tab" data-bs-toggle="pill" data-bs-target="#pills-intrestAccptd" type="button" role="tab" aria-controls="pills-intrestAccptd" aria-selected="false">Accepted</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-intrestIgnord-tab" data-bs-toggle="pill" data-bs-target="#pills-intrestIgnord" type="button" role="tab" aria-controls="pills-intrestIgnord" aria-selected="false">Declined</button>
                                </li>
                            </ul>
                            <div class="tab-content profileListBox ">
                                <div class="tab-pane fade show active" id="pills-intrestRecvd" role="tabpanel" aria-labelledby="pills-recvd-tab">
                                    <div class="profileListBox">
                                        <div class="row">
                                         <!--start  of  intrestRecvd-->

                                         <?php
                                         if(!empty($ExpressedByOthers))
                                         { foreach($ExpressedByOthers as $key)
                                         {
                                            $ProfileDetails = $this->General_Model->GetProfileDetails($key->sender_id);
                                            ?>
                                           <div class="col-12 col-sm-6 col-md-12 col-lg-6 col-xl-4">
                                                <div class="profileSingleBox">
                                                    <div id="carouselProfile1" class="carousel slide" data-bs-ride="carousel">
                                                        <div class="carousel-indicators">
                                                            <button type="button" data-bs-target="#carouselProfile1" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                                            <button type="button" data-bs-target="#carouselProfile1" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                            <button type="button" data-bs-target="#carouselProfile1" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                                        </div>
                                                        <a href="<?php echo site_url('user/singleprofile/'.$key->sender_id); ?>">
                                                             <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                            <div class="proLstBox">
<?php if(empty($ProfileDetails['photo']))//photo empty
{ 
                         if($ProfileDetails['gender']== 1){ ?>
                                                       
                                        <img src="<?php echo base_url('/assets/photo_storage/maleweb.png'); ?>" alt="profile image" class="proImg" style="height:100%;">
                                                                           
                                                     <?php }
                    else if($ProfileDetails['gender']== 2){ ?>
                                        <img src="<?php echo base_url('/assets/photo_storage/femaleweb.png'); ?>" alt="profile image" class="proImg" style="height:100%;">
                                                                          
                                                     <?php }
} 
else
{//photo not empty 

                                        $photo_status = $this->General_Model->check_photoStatus($ProfileDetails['photo']);//check if approved or not
                                     
                                        if(isset($photo_status->status) && $photo_status->status != 0 && $photo_status->status != 1)
                                        {//if approved
                                        
                                               $sender_id = $this->session->userdata('user_id');
                                               $receiver_id = $key->sender_id;
                                               $photo_privacy = $this->General_Model->photoprivacy($sender_id,$receiver_id);//check if protected
                                              
                                               if($photo_privacy !=1)
                                               {// if public
                          ?>
                                     <img src="<?php echo base_url('/assets/photo_storage_thumb/'.$ProfileDetails['photo']); ?>" alt="profile image" class="proImg" style="height:100%;">
                                
                                                 <?php
                                               }
                                              else
                                               {//private
                                                $sender_id = $this->session->userdata('user_id');
                                                $receiver_id = $key->sender_id;
                                                $photo_requeststatus = $this->General_Model->check_photo_requested($sender_id,$receiver_id);//check if protected
                                                    if($photo_requeststatus==0)//not requested for photo
                                                    {
           
                                                            $file_pointer = 'assets/photo_storage_blur/'.$ProfileDetails['photo'];
                                                            if(file_exists($file_pointer)){
                                                                ?>
                        
                                                                     <img src="<?php echo base_url('/assets/photo_storage_blur/'.$ProfileDetails['photo']); ?>" alt="profile image" class="proImg" style="height:100%;">
                                       
                                                                       <div class="overlay"></div>
                                                                                                    <div class="lockOverlay">
                                                                                                        <img src="<?php echo base_url();?>assets/images/lockProfile.svg">
                                                                                                    </div>
                                         
                                                             <?php }
                                                            else{
                                                            if($ProfileDetails['gender']== 1){ ?>
                                            
                                                                       <img src="<?php echo base_url('/assets/photo_storage/maleweb.png'); ?>" alt="profile image" class="proImg" style="height:100%;">
                                
                                                                   <?php }
                                                                   else if($ProfileDetails['gender']== 2){ ?>
                                                       <img src="<?php echo base_url('/assets/photo_storage/femaleweb.png'); ?>" alt="profile image" class="proImg" style="height:100%;">
                                                                      
                                                                   <?php }}
           
                                                     }
                                                     else//requested for photo
                                                    {
                                                                $photo_requeststatus = $this->General_Model->photo_requeststatus($sender_id,$receiver_id);//check for status of the request
                                                                if($photo_requeststatus==1)
                                                                {
                                                                    ?>
                                                                   
                                                                             <img src="<?php echo base_url('/assets/photo_storage_thumb/'.$ProfileDetails['photo']); ?>" alt="profile image" class="proImg" style="height:100%;">
                                                            
                                                                     <?php 
                                                                }
                                                                else{
                                                                    $file_pointer = 'assets/photo_storage_blur/'.$ProfileDetails['photo'];
                                                                    if(file_exists($file_pointer)){?>
                                                                
                                                                <img src="<?php echo base_url('/assets/photo_storage_blur/'.$ProfileDetails['photo']); ?>" alt="profile image" class="proImg" style="height:100%;">
                                                                <div class="overlay"></div>
                                                                                                                            <div class="lockOverlay">
                                                                                                                                <img src="<?php echo base_url();?>assets/images/lockProfile.svg">
                                                                                                                            </div>
                                                                <?php }
                                                                else{
                                                                if($ProfileDetails['gender']== 1){ ?>
                                                                
                                                                       <img src="<?php echo base_url('/assets/photo_storage/maleweb.png'); ?>" alt="profile image" class="proImg">
                                                                       <div class="lockOverlay">
                                                                                                                                <img src="<?php echo base_url();?>assets/images/lockProfile.svg">
                                                                                                                            </div>
                                                                   <?php }
                                                                   else if($ProfileDetails['gender']== 2){ ?>
                                                                
                                                                       <img src="<?php echo base_url('/assets/photo_storage/femaleweb.png'); ?>" alt="profile image" class="proImg">
                                                                       <div class="lockOverlay">
                                                                                                                                <img src="<?php echo base_url();?>assets/images/lockProfile.svg">
                                                                                                                            </div>
                                                                   <?php }
                                                                }
                                                                }
                                                            }
                                    
                                                    }//end of private
                                            
                                        }//end of approved
                                         else//not approved
                                         {//
                                        
                                              if($ProfileDetails['gender']== 1){ ?>
        
                                                       <img src="<?php echo base_url('/assets/photo_storage/maleweb.png'); ?>" alt="profile image" class="proImg" style="height:100%;">
                                                       
                                                       <?php }
                                                       else if($ProfileDetails['gender']== 2){ ?>
                                                    
                                                           <img src="<?php echo base_url('/assets/photo_storage/femaleweb.png'); ?>" alt="profile image" class="proImg" style="height:100%;">
                                                           
                                                       <?php }
                                         }//end of not approved
}//end of photo not empty
                                 ?>
                                     <div class="overlay"></div>
                                                            </div>
                                                        </div>
                                                       
                                                    </div>
                                                        </a>
                                                        <div class="carouselCount">
                                                            <div class="d-flex align-items-center mb-2">
                                                                <img src="<?php echo base_url();?>assets/images/slideCIcon.svg" class="slideCIcon">
                                                                <p class="num"  id="num1"></p>
                                                            </div>
                                                            <button type="button" class="bookmarkBtn">
                                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15.182 20.279" class="slideBkmark">
                                                                    <g transform="translate(0.5 0.5)">
                                                                        <path d="M0,18.909V1.773A1.773,1.773,0,0,1,1.773,0H12.409a1.773,1.773,0,0,1,1.773,1.773V18.909L7.091,14.773Z" stroke-width="1"/>
                                                                    </g>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="contentBox">
                                                        <p class="status"><span class="online"></span>Online</p>
                                                        <div class="d-flex align-item-center mb-2">
                                                            <img src="<?php echo base_url();?>assets/images/linkGreen.svg" alt="link Green" class="linkGreen me-1" width="auto" height="auto">
                                                            <span class="proDtls"><?php echo $ProfileDetails['name'];?></span>
                                                            <img src="<?php echo base_url();?>assets/images/nameCrownIcon.svg" alt="Crown Icon" class="profileico" width="auto" height="auto">
                                                        </div>
                                                        <ul class="proDtlList">
                                                            <li><?php echo $ProfileDetails['age'];?> Yrs, <?php echo $ProfileDetails['user_height'];?></li>
                                                            <li><?php echo $ProfileDetails['profession_name'];?></li>
                                                            <li><?php echo $ProfileDetails['caste'];?></li>
                                                            <li><?php echo $ProfileDetails['address'];?></li>
                                                        </ul>
                                                    </div>
                                                    
                                                    <div id="accept_<?php echo $key->sender_id; ?>">

                                                        <?php if($key->status==1)
                                                        {?>
                                                        <ul class="d-flex justify-content-between profOptnsList" >
                                                            <li >
                                                            <a  class="d-flex align-items-center" >
                                                                <img src="<?php echo base_url();?>assets/images/checkedG.png" class="icon">
                                                                <span>Accepted</span></a></li>
                                                            <li >
                                                                <a href="javascript:void(0)" class="d-flex align-items-center">
                                                                <img src="<?php echo base_url();?>assets/images/Chat1.svg" class="icon">
                                                                <span>Chat</span></a>
                                                            </li>
                                                          
                                                        </ul>
                                                            <?php }
                                                            else if($key->status==2){
                                                                ?>
                                                        <ul  class="d-flex justify-content-between profOptnsList">
                                                          
                                                            <li> 
                                                                <a href="javascript:void(0)" class="d-flex align-items-center">
                                                                <img src="<?php echo base_url();?>assets/images/Chat1.svg" class="icon">
                                                                <span>Chat</span></a>
                                                            </li>
                                                            <li >
                                                               <a  class="d-flex align-items-center">
                                                                <img src="<?php echo base_url();?>assets/images/Ignore_gotonikah.png" class="icon">
                                                                <span>Declined</span></a>
                                                            </li>
                                                              
                                                        </ul>
                                                                <?php
                                                            }
                                                           
                                                            else{?>
                                                        <ul class="d-flex justify-content-between profOptnsList" >
                                                        <li><a   onclick="interestaction('<?php echo $_SESSION['user_id']; ?>','<?php echo $key->sender_id; ?>','1','accept')" class="d-flex align-items-center">
                                                                <img src="<?php echo base_url();?>assets/images/Intrest.svg" class="icon">
                                                                <span>Accept</span>
                                                            </a>
                                                        </li>
                                                            <li>
                                                            <a href="javascript:void(0)" class="d-flex align-items-center">
                                                                <img src="<?php echo base_url();?>assets/images/Chat1.svg" class="icon">
                                                                <span>Chat</span>
                                                            </a>
                                                            </li>
                                                            <li>
                                                            <a  onclick="interestaction('<?php echo $_SESSION['user_id']; ?>','<?php echo $key->sender_id; ?>','2','accept')" class="d-flex align-items-center">
                                                                <img src="<?php echo base_url();?>assets/images/Ignore.svg" class="icon">
                                                                <span>Decline</span>
                                                            </a>
                                                        </li>
                                                            </ul>
                                                            
                                                            <?php }?>
                                                   
                                                </div>
                                            </div>
                                           
                                        </div>
                                        <?php }}
                                        else{
                                            ?>
<div class="profileBox">
<a><button type="button" class="upgrdPrmBtn">
<img src="<?php echo base_url() ?>assets/images/crown.png">
No profiles found.
</button></a></div>
                                    <?php }?>
                                         <!--end -->
                                         </div>
                                </div>
                                                            </div>
                                <div class="tab-pane fade" id="pills-intrestSent" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <div class="profileListBox">
                                        <div class="row">
                            <!--start  of  intrestSent-->
                            <?php if(!empty($Expressedbyme))
                            {
                                 foreach($Expressedbyme as $key)
                                         {
                                            $ProfileDetails = $this->General_Model->GetProfileDetails($key->receiver_id);
                                            ?>
                                            <div class="col-12 col-sm-6 col-md-12 col-lg-6 col-xl-4">
                                                <div class="profileSingleBox">
                                                    <div id="carouselProfile1" class="carousel slide" data-bs-ride="carousel">
                                                        <div class="carousel-indicators">
                                                            <button type="button" data-bs-target="#carouselProfile1" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                                            <button type="button" data-bs-target="#carouselProfile1" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                            <button type="button" data-bs-target="#carouselProfile1" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                                        </div>
                                                        <a href="<?php echo site_url('user/singleprofile/'.$key->receiver_id); ?>">
                                                            <div class="carousel-inner">
                                                                <div class="carousel-item active">
<div class="proLstBox">
<?php if(empty($ProfileDetails['photo']))//photo empty
{ 
                         if($ProfileDetails['gender']== 1){ ?>
                                                       
                                        <img src="<?php echo base_url('/assets/photo_storage/maleweb.png'); ?>" alt="profile image" class="proImg" style="height:100%;">
                                                                           
                                                     <?php }
                    else if($ProfileDetails['gender']== 2){ ?>
                                        <img src="<?php echo base_url('/assets/photo_storage/femaleweb.png'); ?>" alt="profile image" class="proImg" style="height:100%;">
                                                                          
                                                     <?php }
} 
else
{//photo not empty 
                                        $photo_status = $this->General_Model->check_photoStatus($ProfileDetails['photo']);//check if approved or not
                                       if(isset($photo_status->status) && $photo_status->status != 0 && $photo_status->status != 1)
                                        {//if approved
                                               $sender_id = $this->session->userdata('user_id');
                                               $receiver_id = $key->receiver_id;
                                               $photo_privacy = $this->General_Model->photoprivacy($sender_id,$receiver_id);//check if protected
                                               if($photo_privacy !=1)
                                               {// if public
                          ?>
                                     <img src="<?php echo base_url('/assets/photo_storage_thumb/'.$ProfileDetails['photo']); ?>" alt="profile image" class="proImg" style="height:100%;">
                                
                                                 <?php
                                               }
                                              else
                                               {//private
                                                $sender_id = $this->session->userdata('user_id');
                                                $receiver_id = $key->receiver_id;
                                                $photo_requeststatus = $this->General_Model->check_photo_requested($sender_id,$receiver_id);//check if protected
                                                    if($photo_requeststatus==0)//not requested for photo
                                                    {
           
                                                            $file_pointer = 'assets/photo_storage_blur/'.$ProfileDetails['photo'];
                                                            if(file_exists($file_pointer)){
                                                                ?>
                        
                                                                     <img src="<?php echo base_url('/assets/photo_storage_blur/'.$ProfileDetails['photo']); ?>" alt="profile image" class="proImg" style="height:100%;">
                                       
                                                                       <div class="overlay"></div>
                                                                                                    <div class="lockOverlay">
                                                                                                        <img src="<?php echo base_url();?>assets/images/lockProfile.svg">
                                                                                                    </div>
                                         
                                                             <?php }
                                                            else{
                                                            if($ProfileDetails['gender']== 1){ ?>
                                            
                                                                       <img src="<?php echo base_url('/assets/photo_storage/maleweb.png'); ?>" alt="profile image" class="proImg" style="height:100%;">
                                
                                                                   <?php }
                                                                   else if($ProfileDetails['gender']== 2){ ?>
                                                       <img src="<?php echo base_url('/assets/photo_storage/femaleweb.png'); ?>" alt="profile image" class="proImg" style="height:100%;">
                                                                      
                                                                   <?php }}
           
                                                     }
                                                     else//requested for photo
                                                    {
                                                                $photo_requeststatus = $this->General_Model->photo_requeststatus($sender_id,$receiver_id);//check for status of the request
                                                                if($photo_requeststatus==1)
                                                                {
                                                                    ?>
                                                                   
                                                                             <img src="<?php echo base_url('/assets/photo_storage_thumb/'.$ProfileDetails['photo']); ?>" alt="profile image" class="proImg" style="height:100%;">
                                                            
                                                                     <?php 
                                                                }
                                                                else{
                                                                    $file_pointer = 'assets/photo_storage_blur/'.$ProfileDetails['photo'];
                                                                    if(file_exists($file_pointer)){?>
                                                                
                                                                <img src="<?php echo base_url('/assets/photo_storage_blur/'.$ProfileDetails['photo']); ?>" alt="profile image" class="proImg" style="height:100%;">
                                                                <div class="overlay"></div>
                                                                                                                            <div class="lockOverlay">
                                                                                                                                <img src="<?php echo base_url();?>assets/images/lockProfile.svg">
                                                                                                                            </div>
                                                                <?php }
                                                                else{
                                                                if($ProfileDetails['gender']== 1){ ?>
                                                                
                                                                       <img src="<?php echo base_url('/assets/photo_storage/maleweb.png'); ?>" alt="profile image" class="proImg">
                                                                       <div class="lockOverlay">
                                                                                                                                <img src="<?php echo base_url();?>assets/images/lockProfile.svg">
                                                                                                                            </div>
                                                                   <?php }
                                                                   else if($ProfileDetails['gender']== 2){ ?>
                                                                
                                                                       <img src="<?php echo base_url('/assets/photo_storage/femaleweb.png'); ?>" alt="profile image" class="proImg">
                                                                       <div class="lockOverlay">
                                                                                                                                <img src="<?php echo base_url();?>assets/images/lockProfile.svg">
                                                                                                                            </div>
                                                                   <?php }
                                                                }
                                                                }
                                                            }
                                    
                                                    }//end of private
                                            
                                        }//end of approved
                                         else//not approved
                                         {
                                              if($ProfileDetails['gender']== 1){ ?>
        
                                                       <img src="<?php echo base_url('/assets/photo_storage/maleweb.png'); ?>" alt="profile image" class="proImg" style="height:100%;">
                                                       
                                                       <?php }
                                                       else if($ProfileDetails['gender']== 2){ ?>
                                                    
                                                           <img src="<?php echo base_url('/assets/photo_storage/femaleweb.png'); ?>" alt="profile image" class="proImg" style="height:100%;">
                                                           
                                                       <?php }
                                         }//end of not approved
}//end of photo not empty
                                 ?>
                                     <div class="overlay"></div>
                                                            </div>

                                                                </div>
                                                             <!--   <div class="carousel-item">
                                                                    <div class="proLstBox">
                                                                        <img src="images/mProfile2.png" alt="profile image" class="proImg">
                                                                        <div class="overlay"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="carousel-item">
                                                                    <div class="proLstBox">
                                                                        <img src="images/mProfile3.png" alt="profile image" class="proImg">
                                                                        <div class="overlay"></div>
                                                                    </div>
                                                                </div>
                                                            -->
                                                            </div>
                                                        </a>
                                                        <div class="carouselCount">
                                                            <div class="d-flex align-items-center mb-2">
                                                                <img src="<?php echo base_url();?>assets/images/slideCIcon.svg" class="slideCIcon">
                                                                <p class="num"  id="num1"></p>
                                                            </div>
                                                            <button type="button" class="bookmarkBtn">
                                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15.182 20.279" class="slideBkmark">
                                                                    <g transform="translate(0.5 0.5)">
                                                                        <path d="M0,18.909V1.773A1.773,1.773,0,0,1,1.773,0H12.409a1.773,1.773,0,0,1,1.773,1.773V18.909L7.091,14.773Z" stroke-width="1"/>
                                                                    </g>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="contentBox">
                                                        <p class="status"><span class="online"></span>Online</p>
                                                        <div class="d-flex align-item-center mb-2">
                                                            <img src="<?php echo base_url();?>assets/images/linkGreen.svg" alt="link Green" class="linkGreen me-1" width="auto" height="auto">
                                                            <span class="proDtls"><?php echo $ProfileDetails['name'];?></span>
                                                            <img src="<?php echo base_url();?>assets/images/nameCrownIcon.svg" alt="Crown Icon" class="profileico" width="auto" height="auto">
                                                        </div>
                                                        <ul class="proDtlList">
                                                        <ul class="proDtlList">
                                                            <li><?php echo $ProfileDetails['age'];?> Yrs, <?php echo $ProfileDetails['user_height'];?></li>
                                                            <li><?php echo $ProfileDetails['profession_name'];?></li>
                                                            <li><?php echo $ProfileDetails['caste'];?></li>
                                                            <li><?php echo $ProfileDetails['address'];?></li>
                                                        </ul>
                                                        </ul>
                                                    </div>
                                                    <div id="sent_<?php echo $key->sender_id;?>">
                                                    <?php if($key->status==1)
                                                    {?>
                                                     <ul class="d-flex justify-content-between profOptnsList">
                                                        <li>
                                                            <a href="javascript:void(0)" class="d-flex align-items-center">
                                                                <img src="<?php echo base_url();?>assets/images/Chat1.svg" class="icon">
                                                                <span>Chat</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0)" class="d-flex align-items-center">
                                                                <img src="<?php echo base_url();?>assets/images/checkedG.png" class="icon">
                                                                <span>Accepted</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <?php } else if($key->status==2)
                                                    {?>
                                                    <ul class="d-flex justify-content-between profOptnsList">
                                                        <li>
                                                            <a href="javascript:void(0)" class="d-flex align-items-center">
                                                                <img src="<?php echo base_url();?>assets/images/Chat1.svg" class="icon">
                                                                <span>Chat</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0)" class="d-flex align-items-center">
                                                                <img src="<?php echo base_url();?>assets/images/Ignore.svg" class="icon">
                                                                <span>Declined</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <?php }else{?>
                                                        <ul class="d-flex justify-content-between profOptnsList">
                                                        <li>
                                                            <a href="javascript:void(0)" class="d-flex align-items-center">
                                                                <img src="<?php echo base_url();?>assets/images/Chat1.svg" class="icon">
                                                                <span>Chat</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0)" class="d-flex align-items-center">
                                                                <img src="<?php echo base_url();?>assets/images/intrestSend.svg" class="icon">
                                                                <span>Interest Sent</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                        <?php }?>
                                                </div>
                                                </div>
                                            </div>
                                            <?php }}else
                                            {?>
                                            <div class="profileBox">
<a><button type="button" class="upgrdPrmBtn">
<img src="<?php echo base_url() ?>assets/images/crown.png">
No profiles found.
</button></a></div>
                                            <?php }?>
                            <!--end  of  intrestSent-->
              
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-intrestAccptd" role="tabpanel" aria-labelledby="pills-contact-tab">
                                    <!-- <div class="cmpltProfileBox">
                                        <img src="images/heart.png">
                                        <h3>Profile Visits</h3>
                                        <p>People who have interested you, will appear here. Complete your Profile to increase your chances.</p>
                                    </div> -->
                                    <div class="profileListBox">
                                        <div class="row">
                            <!--start  of  intrestAccptd-->
                            
                            <?php 
                            //print_r($accepted_list);
                            if(!empty($accepted_list))
                            {
                                foreach($accepted_list as $key)
                                         {
                                            if($key->receiver_id == $_SESSION['user_id']){

                                                $prefix = 'You';
                                              
                                                $ProfileDetails = $this->General_Model->GetProfileDetails($key->sender_id);
                                              
                                              }else{
                                              
                                                  if($ProfileDetails['gender'] == 1){ $prefix = 'He'; }else{ $prefix = 'She'; }
                                              
                                                  $ProfileDetails = $this->General_Model->GetProfileDetails($key->receiver_id);
                                              }
                                                                                          ?>
                                            <div class="col-12 col-sm-6 col-md-12 col-lg-6 col-xl-4">
                                                <div class="profileSingleBox">
                                                    <div id="carouselProfile1" class="carousel slide" data-bs-ride="carousel">
                                                        <div class="carousel-indicators">
                                                            <button type="button" data-bs-target="#carouselProfile1" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                                            <button type="button" data-bs-target="#carouselProfile1" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                            <button type="button" data-bs-target="#carouselProfile1" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                                        </div>
                                                        <a href="<?php echo site_url('user/singleprofile/'.$ProfileDetails['regid']); ?>">
                                                            <div class="carousel-inner">
                                                                <div class="carousel-item active">
                                                                    <div class="proLstBox">
<?php if(empty($ProfileDetails['photo']))//photo empty
{ 
                         if($ProfileDetails['gender']== 1){ ?>
                                                       
                                        <img src="<?php echo base_url('/assets/photo_storage/maleweb.png'); ?>" alt="profile image" class="proImg" style="height:100%;">
                                                                           
                                                     <?php }
                    else if($ProfileDetails['gender']== 2){ ?>
                                        <img src="<?php echo base_url('/assets/photo_storage/femaleweb.png'); ?>" alt="profile image" class="proImg" style="height:100%;">
                                                                          
                                                     <?php }
} 
else
{//photo not empty 
                                        $photo_status = $this->General_Model->check_photoStatus($ProfileDetails['photo']);//check if approved or not
                                        if(isset($photo_status->status) && $photo_status->status != 0 && $photo_status->status != 1)
                                        {//if approved
                                               $sender_id = $this->session->userdata('user_id');
                                               $receiver_id = $ProfileDetails['regid'];
                                               $photo_privacy = $this->General_Model->photoprivacy($sender_id,$receiver_id);//check if protected
                                               if($photo_privacy !=1)
                                               {// if public
                          ?>
                                     <img src="<?php echo base_url('/assets/photo_storage_thumb/'.$ProfileDetails['photo']); ?>" alt="profile image" class="proImg" style="height:100%;">
                                
                                                 <?php
                                               }
                                              else
                                               {//private
                                                $sender_id = $this->session->userdata('user_id');
                                                $receiver_id = $ProfileDetails['regid'];
                                                $photo_requeststatus = $this->General_Model->check_photo_requested($sender_id,$receiver_id);//check if protected
                                                    if($photo_requeststatus==0)//not requested for photo
                                                    {
           
                                                            $file_pointer = 'assets/photo_storage_blur/'.$ProfileDetails['photo'];
                                                            if(file_exists($file_pointer)){
                                                                ?>
                        
                                                                     <img src="<?php echo base_url('/assets/photo_storage_blur/'.$ProfileDetails['photo']); ?>" alt="profile image" class="proImg" style="height:100%;">
                                       
                                                                       <div class="overlay"></div>
                                                                                                    <div class="lockOverlay">
                                                                                                        <img src="<?php echo base_url();?>assets/images/lockProfile.svg">
                                                                                                    </div>
                                         
                                                             <?php }
                                                            else{
                                                            if($ProfileDetails['gender']== 1){ ?>
                                            
                                                                       <img src="<?php echo base_url('/assets/photo_storage/maleweb.png'); ?>" alt="profile image" class="proImg" style="height:100%;">
                                
                                                                   <?php }
                                                                   else if($ProfileDetails['gender']== 2){ ?>
                                                       <img src="<?php echo base_url('/assets/photo_storage/femaleweb.png'); ?>" alt="profile image" class="proImg" style="height:100%;">
                                                                      
                                                                   <?php }}
           
                                                     }
                                                     else//requested for photo
                                                    {
                                                                $photo_requeststatus = $this->General_Model->photo_requeststatus($sender_id,$receiver_id);//check for status of the request
                                                                if($photo_requeststatus==1)
                                                                {
                                                                    ?>
                                                                   
                                                                             <img src="<?php echo base_url('/assets/photo_storage_thumb/'.$ProfileDetails['photo']); ?>" alt="profile image" class="proImg" style="height:100%;">
                                                            
                                                                     <?php 
                                                                }
                                                                else{
                                                                    $file_pointer = 'assets/photo_storage_blur/'.$ProfileDetails['photo'];
                                                                    if(file_exists($file_pointer)){?>
                                                                
                                                                <img src="<?php echo base_url('/assets/photo_storage_blur/'.$ProfileDetails['photo']); ?>" alt="profile image" class="proImg" style="height:100%;">
                                                                <div class="overlay"></div>
                                                                                                                            <div class="lockOverlay">
                                                                                                                                <img src="<?php echo base_url();?>assets/images/lockProfile.svg">
                                                                                                                            </div>
                                                                <?php }
                                                                else{
                                                                if($ProfileDetails['gender']== 1){ ?>
                                                                
                                                                       <img src="<?php echo base_url('/assets/photo_storage/maleweb.png'); ?>" alt="profile image" class="proImg">
                                                                       <div class="lockOverlay">
                                                                                                                                <img src="<?php echo base_url();?>assets/images/lockProfile.svg">
                                                                                                                            </div>
                                                                   <?php }
                                                                   else if($ProfileDetails['gender']== 2){ ?>
                                                                
                                                                       <img src="<?php echo base_url('/assets/photo_storage/femaleweb.png'); ?>" alt="profile image" class="proImg">
                                                                       <div class="lockOverlay">
                                                                                                                                <img src="<?php echo base_url();?>assets/images/lockProfile.svg">
                                                                                                                            </div>
                                                                   <?php }
                                                                }
                                                                }
                                                            }
                                    
                                                    }//end of private
                                            
                                        }//end of approved
                                         else//not approved
                                         {
                                              if($ProfileDetails['gender']== 1){ ?>
        
                                                       <img src="<?php echo base_url('/assets/photo_storage/maleweb.png'); ?>" alt="profile image" class="proImg" style="height:100%;">
                                                       
                                                       <?php }
                                                       else if($ProfileDetails['gender']== 2){ ?>
                                                    
                                                           <img src="<?php echo base_url('/assets/photo_storage/femaleweb.png'); ?>" alt="profile image" class="proImg" style="height:100%;">
                                                           
                                                       <?php }
                                         }//end of not approved
}//end of photo not empty
                                 ?>
                                     <div class="overlay"></div>
                                                            </div>
                                                                </div>
                                                              <!--  <div class="carousel-item">
                                                                    <div class="proLstBox">
                                                                        <img src="images/mProfile2.png" alt="profile image" class="proImg">
                                                                        <div class="overlay"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="carousel-item">
                                                                    <div class="proLstBox">
                                                                        <img src="images/mProfile3.png" alt="profile image" class="proImg">
                                                                        <div class="overlay"></div>
                                                                    </div>
                                                                </div>
                                                                -->
                                                            </div>
                                                        </a>
                                                        <div class="carouselCount">
                                                            <div class="d-flex align-items-center mb-2">
                                                                <img src="<?php echo base_url();?>assets/images/slideCIcon.svg" class="slideCIcon">
                                                                <p class="num"  id="num1"></p>
                                                            </div>
                                                            <button type="button" class="bookmarkBtn">
                                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15.182 20.279" class="slideBkmark">
                                                                    <g transform="translate(0.5 0.5)">
                                                                        <path d="M0,18.909V1.773A1.773,1.773,0,0,1,1.773,0H12.409a1.773,1.773,0,0,1,1.773,1.773V18.909L7.091,14.773Z" stroke-width="1"/>
                                                                    </g>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="contentBox">
                                                        <p class="status"><span class="online"></span>Online</p>
                                                        <div class="d-flex align-item-center mb-2">
                                                            <img src="<?php echo base_url();?>assets/images/linkGreen.svg" alt="link Green" class="linkGreen me-1" width="auto" height="auto">
                                                            <span class="proDtls"><?php  echo $ProfileDetails['name'];?></span>
                                                            <img src="<?php echo base_url();?>assets/images/nameCrownIcon.svg" alt="Crown Icon" class="profileico" width="auto" height="auto">
                                                        </div>
                                                        <ul class="proDtlList">
                                                        <li><?php echo $ProfileDetails['age'];?> Yrs, <?php echo $ProfileDetails['user_height'];?></li>
                                                            <li><?php echo $ProfileDetails['profession_name'];?></li>
                                                            <li><?php echo $ProfileDetails['caste'];?></li>
                                                            <li><?php echo $ProfileDetails['address'];?></li>
                                                        </ul>
                                                    </div>
                                                   
                                                    <ul class="d-flex justify-content-between profOptnsList">
                                                        <li>
                                                            <a href="javascript:void(0)" class="d-flex align-items-center">
                                                                <img src="<?php echo base_url();?>assets/images/Chat1.svg" class="icon">
                                                                <span>Chat</span>
                                                            </a>
                                                        </li>
                                                        <li class="d-flex align-items-center">
                                                            <img src="<?php echo base_url();?>assets/images/checkedG.png" class="icon">
                                                            <span><?php echo $prefix;?> Accepted</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <?php }}else{?>
                                                <div class="profileBox">
<a><button type="button" class="upgrdPrmBtn">
<img src="<?php echo base_url() ?>assets/images/crown.png">
No profiles found.
</button></a></div>
                                                <?php }?>
                              <!--end  of  intrestAccptd-->

                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-intrestIgnord" role="tabpanel" aria-labelledby="pills-contact-tab">
                                    <div class="profileListBox">
                                        <div class="row">
                              <!--start  of  intrestIgnord-->
                              <?php 
                              if(!empty($rejected_list))
                              {
                                foreach($rejected_list as $key)
                                         {
                                            if($key->receiver_id == $_SESSION['user_id']){

                                                $prefix = 'You';
                                              
                                                $ProfileDetails = $this->General_Model->GetProfileDetails($key->sender_id);
                                              
                                              }else{
                                              
                                                  if($_SESSION['gender'] == 1){ $prefix = 'He'; }else{ $prefix = 'She'; }
                                              
                                                  $ProfileDetails = $this->General_Model->GetProfileDetails($key->receiver_id);
                                              }                                            ?>
                              <div class="col-12 col-sm-6 col-md-12 col-lg-6 col-xl-4">
                                                <div class="profileSingleBox">
                                                    <div id="carouselProfile1" class="carousel slide" data-bs-ride="carousel">
                                                        <div class="carousel-indicators">
                                                            <button type="button" data-bs-target="#carouselProfile1" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                                            <button type="button" data-bs-target="#carouselProfile1" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                            <button type="button" data-bs-target="#carouselProfile1" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                                        </div>
                                                        <a href="<?php echo site_url('user/singleprofile/'.$ProfileDetails['id']); ?>">
                                                            <div class="carousel-inner">
                                                                <div class="carousel-item active">
                                                                     <div class="proLstBox">
<?php if(empty($ProfileDetails['photo']))//photo empty
{ 
                         if($ProfileDetails['gender']== 1){ ?>
                                                       
                                        <img src="<?php echo base_url('/assets/photo_storage/maleweb.png'); ?>" alt="profile image" class="proImg" style="height:100%;">
                                                                           
                                                     <?php }
                    else if($ProfileDetails['gender']== 2){ ?>
                                        <img src="<?php echo base_url('/assets/photo_storage/femaleweb.png'); ?>" alt="profile image" class="proImg" style="height:100%;">
                                                                          
                                                     <?php }
} 
else
{//photo not empty 
                                        $photo_status = $this->General_Model->check_photoStatus($ProfileDetails['photo']);//check if approved or not
                                        if(isset($photo_status->status) && $photo_status->status != 0 && $photo_status->status != 1)
                                        {//if approved
                                               $sender_id = $this->session->userdata('user_id');
                                               $receiver_id = $ProfileDetails['regid'];
                                               $photo_privacy = $this->General_Model->photoprivacy($sender_id,$receiver_id);//check if protected
                                               if($photo_privacy !=1)
                                               {// if public
                          ?>
                                     <img src="<?php echo base_url('/assets/photo_storage_thumb/'.$ProfileDetails['photo']); ?>" alt="profile image" class="proImg" style="height:100%;">
                                
                                                 <?php
                                               }
                                              else
                                               {//private
                                                $sender_id = $this->session->userdata('user_id');
                                                $receiver_id = $ProfileDetails['regid'];
                                                $photo_requeststatus = $this->General_Model->check_photo_requested($sender_id,$receiver_id);//check if protected
                                                    if($photo_requeststatus==0)//not requested for photo
                                                    {
           
                                                            $file_pointer = 'assets/photo_storage_blur/'.$ProfileDetails['photo'];
                                                            if(file_exists($file_pointer)){
                                                                ?>
                        
                                                                     <img src="<?php echo base_url('/assets/photo_storage_blur/'.$ProfileDetails['photo']); ?>" alt="profile image" class="proImg" style="height:100%;">
                                       
                                                                       <div class="overlay"></div>
                                                                                                    <div class="lockOverlay">
                                                                                                        <img src="<?php echo base_url();?>assets/images/lockProfile.svg">
                                                                                                    </div>
                                         
                                                             <?php }
                                                            else{
                                                            if($ProfileDetails['gender']== 1){ ?>
                                            
                                                                       <img src="<?php echo base_url('/assets/photo_storage/maleweb.png'); ?>" alt="profile image" class="proImg" style="height:100%;">
                                
                                                                   <?php }
                                                                   else if($ProfileDetails['gender']== 2){ ?>
                                                       <img src="<?php echo base_url('/assets/photo_storage/femaleweb.png'); ?>" alt="profile image" class="proImg" style="height:100%;">
                                                                      
                                                                   <?php }}
           
                                                     }
                                                     else//requested for photo
                                                    {
                                                                $photo_requeststatus = $this->General_Model->photo_requeststatus($sender_id,$receiver_id);//check for status of the request
                                                                if($photo_requeststatus==1)
                                                                {
                                                                    ?>
                                                                   
                                                                             <img src="<?php echo base_url('/assets/photo_storage_thumb/'.$ProfileDetails['photo']); ?>" alt="profile image" class="proImg" style="height:100%;">
                                                            
                                                                     <?php 
                                                                }
                                                                else{
                                                                    $file_pointer = 'assets/photo_storage_blur/'.$ProfileDetails['photo'];
                                                                    if(file_exists($file_pointer)){?>
                                                                
                                                                <img src="<?php echo base_url('/assets/photo_storage_blur/'.$ProfileDetails['photo']); ?>" alt="profile image" class="proImg" style="height:100%;">
                                                                <div class="overlay"></div>
                                                                                                                            <div class="lockOverlay">
                                                                                                                                <img src="<?php echo base_url();?>assets/images/lockProfile.svg">
                                                                                                                            </div>
                                                                <?php }
                                                                else{
                                                                if($ProfileDetails['gender']== 1){ ?>
                                                                
                                                                       <img src="<?php echo base_url('/assets/photo_storage/maleweb.png'); ?>" alt="profile image" class="proImg">
                                                                       <div class="lockOverlay">
                                                                                                                                <img src="<?php echo base_url();?>assets/images/lockProfile.svg">
                                                                                                                            </div>
                                                                   <?php }
                                                                   else if($ProfileDetails['gender']== 2){ ?>
                                                                
                                                                       <img src="<?php echo base_url('/assets/photo_storage/femaleweb.png'); ?>" alt="profile image" class="proImg">
                                                                       <div class="lockOverlay">
                                                                                                                                <img src="<?php echo base_url();?>assets/images/lockProfile.svg">
                                                                                                                            </div>
                                                                   <?php }
                                                                }
                                                                }
                                                            }
                                    
                                                    }//end of private
                                            
                                        }//end of approved
                                         else//not approved
                                         {
                                              if($ProfileDetails['gender']== 1){ ?>
        
                                                       <img src="<?php echo base_url('/assets/photo_storage/maleweb.png'); ?>" alt="profile image" class="proImg" style="height:100%;">
                                                       
                                                       <?php }
                                                       else if($ProfileDetails['gender']== 2){ ?>
                                                    
                                                           <img src="<?php echo base_url('/assets/photo_storage/femaleweb.png'); ?>" alt="profile image" class="proImg" style="height:100%;">
                                                           
                                                       <?php }
                                         }//end of not approved
}//end of photo not empty
                                 ?>
                                     <div class="overlay"></div>
                                                            </div>
                                                                </div>
                                                            
                                                            </div>
                                                        </a>
                                                        <div class="carouselCount">
                                                            <div class="d-flex align-items-center mb-2">
                                                                <img src="<?php echo base_url();?>assets/images/slideCIcon.svg" class="slideCIcon">
                                                                <p class="num"  id="num1"></p>
                                                            </div>
                                                            <button type="button" class="bookmarkBtn">
                                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15.182 20.279" class="slideBkmark">
                                                                    <g transform="translate(0.5 0.5)">
                                                                        <path d="M0,18.909V1.773A1.773,1.773,0,0,1,1.773,0H12.409a1.773,1.773,0,0,1,1.773,1.773V18.909L7.091,14.773Z" stroke-width="1"/>
                                                                    </g>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="contentBox">
                                                        <p class="status"><span class="online"></span>Online</p>
                                                        <div class="d-flex align-item-center mb-2">
                                                            <img src="<?php echo base_url();?>assets/images/linkGreen.svg" alt="link Green" class="linkGreen me-1" width="auto" height="auto">
                                                            <span class="proDtls"><?php echo $ProfileDetails['name'];?></span>
                                                            <img src="<?php echo base_url();?>assets/images/nameCrownIcon.svg" alt="Crown Icon" class="profileico" width="auto" height="auto">
                                                        </div>
                                                        <ul class="proDtlList">
                                                        <li><?php echo $ProfileDetails['age'];?> Yrs, <?php echo $ProfileDetails['user_height'];?></li>
                                                            <li><?php echo $ProfileDetails['profession_name'];?></li>
                                                            <li><?php echo $ProfileDetails['caste'];?></li>
                                                            <li><?php echo $ProfileDetails['address'];?></li>
                                                        </ul>
                                                    </div>
                                                    <ul class="d-flex justify-content-between profOptnsList">
                                                        <li>
                                                            <a href="javascript:void(0)" class="d-flex align-items-center">
                                                                <img src="<?php echo base_url();?>assets/images/Chat1.svg" class="icon">
                                                                <span>Chat</span>
                                                            </a>
                                                        </li>
                                                        <li class="d-flex align-items-center">
                                                            <img src="<?php echo base_url();?>assets/images/Ignore.svg" class="icon">
                                                            <span><?php echo $prefix;?> Declined</span>
                                                        </li>
                                                    </ul>
                                       
                                </div>
                            </div>
                            <?php }}
                            else{?>
                                   <div class="profileBox">
<a><button type="button" class="upgrdPrmBtn">
<img src="<?php echo base_url() ?>assets/images/crown.png">
No profiles found.
</button></a></div>
                            <?php }?>
                            <!--end  of  intrestIgnord-->
                                     </div>
                        </div>
                                     </div>
                                     </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-profileVisit" role="tabpanel" aria-labelledby="v-pills-profileVisit-tab">
                            <ul class="nav nav-pills nav-fill" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-pvRecvd-tab" data-bs-toggle="pill" data-bs-target="#pills-pvRecvd" type="button" role="tab" aria-controls="pills-pvRecvd" aria-selected="true">Profile Visited</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-pvSent-tab" data-bs-toggle="pill" data-bs-target="#pills-pvSent" type="button" role="tab" aria-controls="pills-pvSent" aria-selected="false">My Profile Visitors</button>
                                </li>
                            </ul>
                            <div class="tab-content profileListBox ">
                                <div class="tab-pane fade show active" id="pills-pvRecvd" role="tabpanel" aria-labelledby="pills-recvd-tab">
                                    <div class="profileListBox">
                                        <div class="row">
                            <!--start  of  pvRecvd-->

                            <?php 
                            if(isset($Myviewedlist))
                            {
                            foreach($Myviewedlist as $key)
                            {
                                $ProfileDetails = $this->General_Model->GetProfileDetails($key->receiver_id);
                                
                                ?>
                                            <div class="col-12 col-sm-6 col-md-12 col-lg-6 col-xl-4">
                                                <div class="profileSingleBox">
                                                    <div id="carouselProfile1" class="carousel slide" data-bs-ride="carousel">
                                                        <div class="carousel-indicators">
                                                            <button type="button" data-bs-target="#carouselProfile1" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                                            <button type="button" data-bs-target="#carouselProfile1" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                            <button type="button" data-bs-target="#carouselProfile1" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                                        </div>
                                                        <a href="<?php echo site_url('user/singleprofile/'.$key->receiver_id); ?>">
                                                            <div class="carousel-inner">
                                                                <div class="carousel-item active">
                                                                    <div class="proLstBox">
<?php if(empty($ProfileDetails['photo']))//photo empty
{ 
                         if($ProfileDetails['gender']== 1){ ?>
                                                       
                                        <img src="<?php echo base_url('/assets/photo_storage/maleweb.png'); ?>" alt="profile image" class="proImg" style="height:100%;">
                                                                           
                                                     <?php }
                    else if($ProfileDetails['gender']== 2){ ?>
                                        <img src="<?php echo base_url('/assets/photo_storage/femaleweb.png'); ?>" alt="profile image" class="proImg" style="height:100%;">
                                                                          
                                                     <?php }
} 
else
{//photo not empty 
                                        $photo_status = $this->General_Model->check_photoStatus($ProfileDetails['photo']);//check if approved or not
                                        if(isset($photo_status->status) && $photo_status->status != 0 && $photo_status->status != 1)
                                        {//if approved
                                               $sender_id = $this->session->userdata('user_id');
                                               $receiver_id = $ProfileDetails['regid'];
                                               $photo_privacy = $this->General_Model->photoprivacy($sender_id,$receiver_id);//check if protected
                                               if($photo_privacy !=1)
                                               {// if public
                          ?>
                                     <img src="<?php echo base_url('/assets/photo_storage_thumb/'.$ProfileDetails['photo']); ?>" alt="profile image" class="proImg" style="height:100%;">
                                
                                                 <?php
                                               }
                                              else
                                               {//private
                                                $sender_id = $this->session->userdata('user_id');
                                                $receiver_id = $ProfileDetails['regid'];
                                                $photo_requeststatus = $this->General_Model->check_photo_requested($sender_id,$receiver_id);//check if protected
                                                    if($photo_requeststatus==0)//not requested for photo
                                                    {
           
                                                            $file_pointer = 'assets/photo_storage_blur/'.$ProfileDetails['photo'];
                                                            if(file_exists($file_pointer)){
                                                                ?>
                        
                                                                     <img src="<?php echo base_url('/assets/photo_storage_blur/'.$ProfileDetails['photo']); ?>" alt="profile image" class="proImg" style="height:100%;">
                                       
                                                                       <div class="overlay"></div>
                                                                                                    <div class="lockOverlay">
                                                                                                        <img src="<?php echo base_url();?>assets/images/lockProfile.svg">
                                                                                                    </div>
                                         
                                                             <?php }
                                                            else{
                                                            if($ProfileDetails['gender']== 1){ ?>
                                            
                                                                       <img src="<?php echo base_url('/assets/photo_storage/maleweb.png'); ?>" alt="profile image" class="proImg" style="height:100%;">
                                
                                                                   <?php }
                                                                   else if($ProfileDetails['gender']== 2){ ?>
                                                       <img src="<?php echo base_url('/assets/photo_storage/femaleweb.png'); ?>" alt="profile image" class="proImg" style="height:100%;">
                                                                      
                                                                   <?php }}
           
                                                     }
                                                     else//requested for photo
                                                    {
                                                                $photo_requeststatus = $this->General_Model->photo_requeststatus($sender_id,$receiver_id);//check for status of the request
                                                                if($photo_requeststatus==1)
                                                                {
                                                                    ?>
                                                                   
                                                                             <img src="<?php echo base_url('/assets/photo_storage_thumb/'.$ProfileDetails['photo']); ?>" alt="profile image" class="proImg" style="height:100%;">
                                                            
                                                                     <?php 
                                                                }
                                                                else{
                                                                    $file_pointer = 'assets/photo_storage_blur/'.$ProfileDetails['photo'];
                                                                    if(file_exists($file_pointer)){?>
                                                                
                                                                <img src="<?php echo base_url('/assets/photo_storage_blur/'.$ProfileDetails['photo']); ?>" alt="profile image" class="proImg" style="height:100%;">
                                                                <div class="overlay"></div>
                                                                                                                            <div class="lockOverlay">
                                                                                                                                <img src="<?php echo base_url();?>assets/images/lockProfile.svg">
                                                                                                                            </div>
                                                                <?php }
                                                                else{
                                                                if($ProfileDetails['gender']== 1){ ?>
                                                                
                                                                       <img src="<?php echo base_url('/assets/photo_storage/maleweb.png'); ?>" alt="profile image" class="proImg">
                                                                       <div class="lockOverlay">
                                                                                                                                <img src="<?php echo base_url();?>assets/images/lockProfile.svg">
                                                                                                                            </div>
                                                                   <?php }
                                                                   else if($ProfileDetails['gender']== 2){ ?>
                                                                
                                                                       <img src="<?php echo base_url('/assets/photo_storage/femaleweb.png'); ?>" alt="profile image" class="proImg">
                                                                       <div class="lockOverlay">
                                                                                                                                <img src="<?php echo base_url();?>assets/images/lockProfile.svg">
                                                                                                                            </div>
                                                                   <?php }
                                                                }
                                                                }
                                                            }
                                    
                                                    }//end of private
                                            
                                        }//end of approved
                                         else//not approved
                                         {
                                              if($ProfileDetails['gender']== 1){ ?>
        
                                                       <img src="<?php echo base_url('/assets/photo_storage/maleweb.png'); ?>" alt="profile image" class="proImg" style="height:100%;">
                                                       
                                                       <?php }
                                                       else if($ProfileDetails['gender']== 2){ ?>
                                                    
                                                           <img src="<?php echo base_url('/assets/photo_storage/femaleweb.png'); ?>" alt="profile image" class="proImg" style="height:100%;">
                                                           
                                                       <?php }
                                         }//end of not approved
}//end of photo not empty
                                 ?>
                                     <div class="overlay"></div>
                                                            </div>
                                                                </div>
                                                              
                                                            </div>
                                                        </a>
                                                        <div class="carouselCount">
                                                            <div class="d-flex align-items-center mb-2">
                                                                <img src="<?php echo base_url();?>assets/images/slideCIcon.svg" class="slideCIcon">
                                                                <p class="num"  id="num1"></p>
                                                            </div>
                                                            <button type="button" class="bookmarkBtn">
                                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15.182 20.279" class="slideBkmark">
                                                                    <g transform="translate(0.5 0.5)">
                                                                        <path d="M0,18.909V1.773A1.773,1.773,0,0,1,1.773,0H12.409a1.773,1.773,0,0,1,1.773,1.773V18.909L7.091,14.773Z" stroke-width="1"/>
                                                                    </g>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="contentBox">
                                                        <p class="status"><span class="online"></span>Online</p>
                                                        <div class="d-flex align-item-center mb-2">
                                                            <img src="<?php echo base_url();?>assets/images/linkGreen.svg" alt="link Green" class="linkGreen me-1" width="auto" height="auto">
                                                            <span class="proDtls"><?php echo $ProfileDetails['name'];?></span>
                                                            <img src="<?php echo base_url();?>assets/images/nameCrownIcon.svg" alt="Crown Icon" class="profileico" width="auto" height="auto">
                                                        </div>
                                                        <ul class="proDtlList">
                                                            <li><?php echo $ProfileDetails['age'];?> Yrs, <?php echo $ProfileDetails['user_height'];?></li>
                                                            <li><?php echo $ProfileDetails['profession_name'];?></li>
                                                            <li><?php echo $ProfileDetails['caste'];?></li>
                                                            <li><?php echo $ProfileDetails['address'];?></li>
                                                        
                                                        </ul>
                                                    </div>
                                                    <div >

<ul class="d-flex justify-content-between profOptnsList" >
<?php $checkalreadysend = $this->General_Model->checkinterestsend($ProfileDetails['id']);  ?>
<li id="visited_<?php echo $ProfileDetails['id'];?>"<?php if(!empty($checkalreadysend['interest_id'])){ ?>style="display:none;"<?php }?>>

 <ahref="javascript:void(0)" class="d-flex align-items-center"><img src="<?php echo base_url();?>assets/images/Intrest.svg" class="icon">

<span   onclick="sendinterest('<?php echo $key->receiver_id; ?>','visited')">Interest</span></a>
</li>
<li id="visited_done_<?php echo $ProfileDetails['id'];?>" <?php if(empty($checkalreadysend['interest_id'])){ ?>style="display:none;"<?php }?>>

 <ahref="javascript:void(0)" class="d-flex align-items-center"><img src="<?php echo base_url();?>assets/images/checkedG.png" class="icon">

<span   onclick="sendinterest('<?php echo $key->receiver_id; ?>','visited')">Interested</span></a>
</li>
    <li>
    <a href="javascript:void(0)" class="d-flex align-items-center">
        <img src="<?php echo base_url();?>assets/images/Chat1.svg" class="icon">
        <span>Chat</span>
    </a>
    </li>
    <?php $checkalreadysend = $this->General_Model->checkignoresend($ProfileDetails['id']);  ?>
<li id="visited_ignore_<?php echo $key->receiver_id;?>"<?php if(!empty($checkalreadysend['id'])){ ?>style="display:none;"<?php }?>>

 <a href="javascript:void(0)" class="d-flex align-items-center"><img src="<?php echo base_url();?>assets/images/Ignore.svg" class="icon">

<span  onclick="ignore_profile('<?php echo $key->receiver_id; ?>','visited_ignore')">Ignore</span></a>
</li>
<li id="visited_ignore_done_<?php echo $key->receiver_id;?>" <?php if(empty($checkalreadysend['id'])){ ?>style="display:none;"<?php }?>>

 <a href="javascript:void(0)" class="d-flex align-items-center"><img src="<?php echo base_url();?>assets/images/Ignore.svg" class="icon">

<span   onclick="ignore_profile('<?php echo $key->receiver_id; ?>','visited_ignore')">Ignored</span></a>
</li>

    </ul>
    

</div>
                                                </div>
                                            </div>
                            <?php }}
                            else{
                                ?><div class="profileBox">

                                  <a><button type="button" class="upgrdPrmBtn">
                            <img src="<?php echo base_url() ?>assets/images/crown.png">
                           The people who visited your profile will appear here. Upgrade to Premium to view this page.
                        </button></a></div><?php
                            }?>
                            <!--end  of  pvRecvd-->
               
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-pvSent" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <div class="profileListBox">
                                        <div class="row">
                            <!--start  of  pvSent-->
                            <?php
                             if(isset($Myvisitors))
                             {
                                 foreach($Myvisitors as $key)
                            {
                                $ProfileDetails = $this->General_Model->GetProfileDetails($key->sender_id);
                                
                                ?>
                                            <div class="col-12 col-sm-6 col-md-12 col-lg-6 col-xl-4">
                                                <div class="profileSingleBox">
                                                    <div id="carouselProfile1" class="carousel slide" data-bs-ride="carousel">
                                                        <div class="carousel-indicators">
                                                            <button type="button" data-bs-target="#carouselProfile1" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                                            <button type="button" data-bs-target="#carouselProfile1" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                            <button type="button" data-bs-target="#carouselProfile1" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                                        </div>
                                                        <a href="<?php echo site_url('user/singleprofile/'.$key->sender_id); ?>">
                                                            <div class="carousel-inner">
                                                                <div class="carousel-item active">
                                                                    <div class="proLstBox">
<?php if(empty($ProfileDetails['photo']))//photo empty
{ 
                         if($ProfileDetails['gender']== 1){ ?>
                                                       
                                        <img src="<?php echo base_url('/assets/photo_storage/maleweb.png'); ?>" alt="profile image" class="proImg" style="height:100%;">
                                                                           
                                                     <?php }
                    else if($ProfileDetails['gender']== 2){ ?>
                                        <img src="<?php echo base_url('/assets/photo_storage/femaleweb.png'); ?>" alt="profile image" class="proImg" style="height:100%;">
                                                                          
                                                     <?php }
} 
else
{//photo not empty 
                                        $photo_status = $this->General_Model->check_photoStatus($ProfileDetails['photo']);//check if approved or not
                                        if(isset($photo_status->status) && $photo_status->status != 0 && $photo_status->status != 1)
                                        {//if approved
                                               $sender_id = $this->session->userdata('user_id');
                                               $receiver_id = $ProfileDetails['regid'];
                                               $photo_privacy = $this->General_Model->photoprivacy($sender_id,$receiver_id);//check if protected
                                               if($photo_privacy !=1)
                                               {// if public
                          ?>
                                     <img src="<?php echo base_url('/assets/photo_storage_thumb/'.$ProfileDetails['photo']); ?>" alt="profile image" class="proImg" style="height:100%;">
                                
                                                 <?php
                                               }
                                              else
                                               {//private
                                                $sender_id = $this->session->userdata('user_id');
                                                $receiver_id = $ProfileDetails['regid'];
                                                $photo_requeststatus = $this->General_Model->check_photo_requested($sender_id,$receiver_id);//check if protected
                                                    if($photo_requeststatus==0)//not requested for photo
                                                    {
           
                                                            $file_pointer = 'assets/photo_storage_blur/'.$ProfileDetails['photo'];
                                                            if(file_exists($file_pointer)){
                                                                ?>
                        
                                                                     <img src="<?php echo base_url('/assets/photo_storage_blur/'.$ProfileDetails['photo']); ?>" alt="profile image" class="proImg" style="height:100%;">
                                       
                                                                       <div class="overlay"></div>
                                                                                                    <div class="lockOverlay">
                                                                                                        <img src="<?php echo base_url();?>assets/images/lockProfile.svg">
                                                                                                    </div>
                                         
                                                             <?php }
                                                            else{
                                                            if($ProfileDetails['gender']== 1){ ?>
                                            
                                                                       <img src="<?php echo base_url('/assets/photo_storage/maleweb.png'); ?>" alt="profile image" class="proImg" style="height:100%;">
                                
                                                                   <?php }
                                                                   else if($ProfileDetails['gender']== 2){ ?>
                                                       <img src="<?php echo base_url('/assets/photo_storage/femaleweb.png'); ?>" alt="profile image" class="proImg" style="height:100%;">
                                                                      
                                                                   <?php }}
           
                                                     }
                                                     else//requested for photo
                                                    {
                                                                $photo_requeststatus = $this->General_Model->photo_requeststatus($sender_id,$receiver_id);//check for status of the request
                                                                if($photo_requeststatus==1)
                                                                {
                                                                    ?>
                                                                   
                                                                             <img src="<?php echo base_url('/assets/photo_storage_thumb/'.$ProfileDetails['photo']); ?>" alt="profile image" class="proImg" style="height:100%;">
                                                            
                                                                     <?php 
                                                                }
                                                                else{
                                                                    $file_pointer = 'assets/photo_storage_blur/'.$ProfileDetails['photo'];
                                                                    if(file_exists($file_pointer)){?>
                                                                
                                                                <img src="<?php echo base_url('/assets/photo_storage_blur/'.$ProfileDetails['photo']); ?>" alt="profile image" class="proImg" style="height:100%;">
                                                                <div class="overlay"></div>
                                                                                                                            <div class="lockOverlay">
                                                                                                                                <img src="<?php echo base_url();?>assets/images/lockProfile.svg">
                                                                                                                            </div>
                                                                <?php }
                                                                else{
                                                                if($ProfileDetails['gender']== 1){ ?>
                                                                
                                                                       <img src="<?php echo base_url('/assets/photo_storage/maleweb.png'); ?>" alt="profile image" class="proImg">
                                                                       <div class="lockOverlay">
                                                                                                                                <img src="<?php echo base_url();?>assets/images/lockProfile.svg">
                                                                                                                            </div>
                                                                   <?php }
                                                                   else if($ProfileDetails['gender']== 2){ ?>
                                                                
                                                                       <img src="<?php echo base_url('/assets/photo_storage/femaleweb.png'); ?>" alt="profile image" class="proImg">
                                                                       <div class="lockOverlay">
                                                                                                                                <img src="<?php echo base_url();?>assets/images/lockProfile.svg">
                                                                                                                            </div>
                                                                   <?php }
                                                                }
                                                                }
                                                            }
                                    
                                                    }//end of private
                                            
                                        }//end of approved
                                         else//not approved
                                         {
                                              if($ProfileDetails['gender']== 1){ ?>
        
                                                       <img src="<?php echo base_url('/assets/photo_storage/maleweb.png'); ?>" alt="profile image" class="proImg" style="height:100%;">
                                                       
                                                       <?php }
                                                       else if($ProfileDetails['gender']== 2){ ?>
                                                    
                                                           <img src="<?php echo base_url('/assets/photo_storage/femaleweb.png'); ?>" alt="profile image" class="proImg" style="height:100%;">
                                                           
                                                       <?php }
                                         }//end of not approved
}//end of photo not empty
                                 ?>
                                     <div class="overlay"></div>
                                                            </div>
                                                                </div>
                                                               
                                                            </div>
                                                        </a>
                                                        <div class="carouselCount">
                                                            <div class="d-flex align-items-center mb-2">
                                                                <img src="<?php echo base_url();?>assets/images/slideCIcon.svg" class="slideCIcon">
                                                                <p class="num"  id="num1"></p>
                                                            </div>
                                                            <button type="button" class="bookmarkBtn">
                                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15.182 20.279" class="slideBkmark">
                                                                    <g transform="translate(0.5 0.5)">
                                                                        <path d="M0,18.909V1.773A1.773,1.773,0,0,1,1.773,0H12.409a1.773,1.773,0,0,1,1.773,1.773V18.909L7.091,14.773Z" stroke-width="1"/>
                                                                    </g>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="contentBox">
                                                        <p class="status"><span class="online"></span>Online</p>
                                                        <div class="d-flex align-item-center mb-2">
                                                            <img src="<?php echo base_url();?>assets/images/linkGreen.svg" alt="link Green" class="linkGreen me-1" width="auto" height="auto">
                                                            <span class="proDtls"><?php echo $ProfileDetails['name'];?></span>
                                                            <img src="<?php echo base_url();?>assets/images/nameCrownIcon.svg" alt="Crown Icon" class="profileico" width="auto" height="auto">
                                                        </div>
                                                        <ul class="proDtlList">
                                                        <li><?php echo $ProfileDetails['age'];?> Yrs, <?php echo $ProfileDetails['user_height'];?></li>
                                                            <li><?php echo $ProfileDetails['profession_name'];?></li>
                                                            <li><?php echo $ProfileDetails['caste'];?></li>
                                                            <li><?php echo $ProfileDetails['address'];?></li>
                                                        </ul>
                                                    </div>
                                                    <ul class="d-flex justify-content-between profOptnsList" >
                                                    <?php $checkalreadysend = $this->General_Model->checkinterestsend($ProfileDetails['id']);  ?>
<li id="visitor_<?php echo $key->sender_id;?>"<?php if(!empty($checkalreadysend['interest_id'])){ ?>style="display:none;"<?php }?>>

 <ahref="javascript:void(0)" class="d-flex align-items-center"><img src="<?php echo base_url();?>assets/images/Intrest.svg" class="icon">

<span   onclick="sendinterest('<?php echo $key->sender_id; ?>','visitor')">Interest</span></a>
</li>
<li id="visitor_done_<?php echo $key->sender_id;?>" <?php if(empty($checkalreadysend['interest_id'])){ ?>style="display:none;"<?php }?>>

 <ahref="javascript:void(0)" class="d-flex align-items-center"><img src="<?php echo base_url();?>assets/images/Intrest.svg" class="icon">

<span   onclick="sendinterest('<?php echo $key->sender_id; ?>','visitor')">Interested</span></a>
</li>


    <li>
    <a href="javascript:void(0)" class="d-flex align-items-center">
        <img src="<?php echo base_url();?>assets/images/Chat1.svg" class="icon">
        <span>Chat</span>
    </a>
    </li>
    <?php $checkalreadysend = $this->General_Model->checkignoresend($ProfileDetails['id']);  ?>
<li id="visitor_ignore_<?php echo $key->sender_id;?>"<?php if(!empty($checkalreadysend['id'])){ ?>style="display:none;"<?php }?>>

 <a href="javascript:void(0)" class="d-flex align-items-center"><img src="<?php echo base_url();?>assets/images/Ignore.svg" class="icon">

<span  onclick="ignore_profile('<?php echo $key->sender_id; ?>','visitor_ignore')">Ignore</span></a>
</li>
<li id="visitor_ignore_done_<?php echo $key->sender_id;?>" <?php if(empty($checkalreadysend['id'])){ ?>style="display:none;"<?php }?>>

 <a href="javascript:void(0)" class="d-flex align-items-center"><img src="<?php echo base_url();?>assets/images/Ignore.svg" class="icon">

<span   onclick="ignore_profile('<?php echo $key->sender_id; ?>','visitor_ignore')">Ignored</span></a>
</li>
   
    </ul>
    

                                                </div>
                                            </div>
                            <!--end  of  pvSent-->
                              <?php }}
                            else{?> <div class="profileBox">

                                <a><button type="button" class="upgrdPrmBtn">
                          <img src="<?php echo base_url() ?>assets/images/crown.png">
                         The people who visited your profile will appear here. Upgrade to Premium to view this page.
                      </button></a></div><?php
                          }?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-contacts" role="tabpanel" aria-labelledby="v-pills-contacts-tab">
                            <ul class="nav nav-pills nav-fill" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-contactRecvd-tab" data-bs-toggle="pill" data-bs-target="#pills-contactRecvd" type="button" role="tab" aria-controls="pills-contactRecvd" aria-selected="true">Contacts Viewed</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-contactSent-tab" data-bs-toggle="pill" data-bs-target="#pills-contactSent" type="button" role="tab" aria-controls="pills-contactSent" aria-selected="false">My Contact Views</button>
                                </li>
                            </ul>
                            <div class="tab-content profileListBox ">
                                <div class="tab-pane fade show active" id="pills-contactRecvd" role="tabpanel" aria-labelledby="pills-recvd-tab">
                                    <div class="profileListBox">
                                        <div class="row">
                             <!--start  of  my contactlist-->
                             <?php
                             if(isset($Mycontactviewedlist))
                             {
                                 foreach($Mycontactviewedlist as $key)
                            {
                                $ProfileDetails = $this->General_Model->GetProfileDetails($key->receiver_id);
                                
                                ?>
                                            <div class="col-12 col-sm-6 col-md-12 col-lg-6 col-xl-4">
                                                <div class="profileSingleBox">
                                                    <div id="carouselProfile1" class="carousel slide" data-bs-ride="carousel">
                                                        <div class="carousel-indicators">
                                                            <button type="button" data-bs-target="#carouselProfile1" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                                            <button type="button" data-bs-target="#carouselProfile1" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                            <button type="button" data-bs-target="#carouselProfile1" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                                        </div>
                                                        <a href="<?php echo site_url('user/singleprofile/'.$key->receiver_id); ?>">
                                                            <div class="carousel-inner">
                                                                <div class="carousel-item active">
                                                                    <div class="proLstBox">
<?php if(empty($ProfileDetails['photo']))//photo empty
{ 
                         if($ProfileDetails['gender']== 1){ ?>
                                                       
                                        <img src="<?php echo base_url('/assets/photo_storage/maleweb.png'); ?>" alt="profile image" class="proImg" style="height:100%;">
                                                                           
                                                     <?php }
                    else if($ProfileDetails['gender']== 2){ ?>
                                        <img src="<?php echo base_url('/assets/photo_storage/femaleweb.png'); ?>" alt="profile image" class="proImg" style="height:100%;">
                                                                          
                                                     <?php }
} 
else
{//photo not empty 
                                        $photo_status = $this->General_Model->check_photoStatus($ProfileDetails['photo']);//check if approved or not
                                        if(isset($photo_status->status) && $photo_status->status != 0 && $photo_status->status != 1)
                                        {//if approved
                                               $sender_id = $this->session->userdata('user_id');
                                               $receiver_id = $ProfileDetails['regid'];
                                               $photo_privacy = $this->General_Model->photoprivacy($sender_id,$receiver_id);//check if protected
                                               if($photo_privacy !=1)
                                               {// if public
                          ?>
                                     <img src="<?php echo base_url('/assets/photo_storage_thumb/'.$ProfileDetails['photo']); ?>" alt="profile image" class="proImg" style="height:100%;">
                                
                                                 <?php
                                               }
                                              else
                                               {//private
                                                $sender_id = $this->session->userdata('user_id');
                                                $receiver_id = $ProfileDetails['regid'];
                                                $photo_requeststatus = $this->General_Model->check_photo_requested($sender_id,$receiver_id);//check if protected
                                                    if($photo_requeststatus==0)//not requested for photo
                                                    {
           
                                                            $file_pointer = 'assets/photo_storage_blur/'.$ProfileDetails['photo'];
                                                            if(file_exists($file_pointer)){
                                                                ?>
                        
                                                                     <img src="<?php echo base_url('/assets/photo_storage_blur/'.$ProfileDetails['photo']); ?>" alt="profile image" class="proImg" style="height:100%;">
                                       
                                                                       <div class="overlay"></div>
                                                                                                    <div class="lockOverlay">
                                                                                                        <img src="<?php echo base_url();?>assets/images/lockProfile.svg">
                                                                                                    </div>
                                         
                                                             <?php }
                                                            else{
                                                            if($ProfileDetails['gender']== 1){ ?>
                                            
                                                                       <img src="<?php echo base_url('/assets/photo_storage/maleweb.png'); ?>" alt="profile image" class="proImg" style="height:100%;">
                                
                                                                   <?php }
                                                                   else if($ProfileDetails['gender']== 2){ ?>
                                                       <img src="<?php echo base_url('/assets/photo_storage/femaleweb.png'); ?>" alt="profile image" class="proImg" style="height:100%;">
                                                                      
                                                                   <?php }}
           
                                                     }
                                                     else//requested for photo
                                                    {
                                                                $photo_requeststatus = $this->General_Model->photo_requeststatus($sender_id,$receiver_id);//check for status of the request
                                                                if($photo_requeststatus==1)
                                                                {
                                                                    ?>
                                                                   
                                                                             <img src="<?php echo base_url('/assets/photo_storage_thumb/'.$ProfileDetails['photo']); ?>" alt="profile image" class="proImg" style="height:100%;">
                                                            
                                                                     <?php 
                                                                }
                                                                else{
                                                                    $file_pointer = 'assets/photo_storage_blur/'.$ProfileDetails['photo'];
                                                                    if(file_exists($file_pointer)){?>
                                                                
                                                                <img src="<?php echo base_url('/assets/photo_storage_blur/'.$ProfileDetails['photo']); ?>" alt="profile image" class="proImg" style="height:100%;">
                                                                <div class="overlay"></div>
                                                                                                                            <div class="lockOverlay">
                                                                                                                                <img src="<?php echo base_url();?>assets/images/lockProfile.svg">
                                                                                                                            </div>
                                                                <?php }
                                                                else{
                                                                if($ProfileDetails['gender']== 1){ ?>
                                                                
                                                                       <img src="<?php echo base_url('/assets/photo_storage/maleweb.png'); ?>" alt="profile image" class="proImg">
                                                                       <div class="lockOverlay">
                                                                                                                                <img src="<?php echo base_url();?>assets/images/lockProfile.svg">
                                                                                                                            </div>
                                                                   <?php }
                                                                   else if($ProfileDetails['gender']== 2){ ?>
                                                                
                                                                       <img src="<?php echo base_url('/assets/photo_storage/femaleweb.png'); ?>" alt="profile image" class="proImg">
                                                                       <div class="lockOverlay">
                                                                                                                                <img src="<?php echo base_url();?>assets/images/lockProfile.svg">
                                                                                                                            </div>
                                                                   <?php }
                                                                }
                                                                }
                                                            }
                                    
                                                    }//end of private
                                            
                                        }//end of approved
                                         else//not approved
                                         {
                                              if($ProfileDetails['gender']== 1){ ?>
        
                                                       <img src="<?php echo base_url('/assets/photo_storage/maleweb.png'); ?>" alt="profile image" class="proImg" style="height:100%;">
                                                       
                                                       <?php }
                                                       else if($ProfileDetails['gender']== 2){ ?>
                                                    
                                                           <img src="<?php echo base_url('/assets/photo_storage/femaleweb.png'); ?>" alt="profile image" class="proImg" style="height:100%;">
                                                           
                                                       <?php }
                                         }//end of not approved
}//end of photo not empty
                                 ?>
                                     <div class="overlay"></div>
                                                            </div>
                                                                </div>
                                                             
                                                            </div>
                                                        </a>
                                                        <div class="carouselCount">
                                                            <div class="d-flex align-items-center mb-2">
                                                                <img src="<?php echo base_url();?>assets/images/slideCIcon.svg" class="slideCIcon">
                                                                <p class="num"  id="num1"></p>
                                                            </div>
                                                            <button type="button" class="bookmarkBtn">
                                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15.182 20.279" class="slideBkmark">
                                                                    <g transform="translate(0.5 0.5)">
                                                                        <path d="M0,18.909V1.773A1.773,1.773,0,0,1,1.773,0H12.409a1.773,1.773,0,0,1,1.773,1.773V18.909L7.091,14.773Z" stroke-width="1"/>
                                                                    </g>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="contentBox">
                                                        <p class="status"><span class="online"></span>Online</p>
                                                        <div class="d-flex align-item-center mb-2">
                                                            <img src="<?php echo base_url();?>assets/images/linkGreen.svg" alt="link Green" class="linkGreen me-1" width="auto" height="auto">
                                                            <span class="proDtls"><?php echo $ProfileDetails['name'];?></span>
                                                            <img src="<?php echo base_url();?>assets/images/nameCrownIcon.svg" alt="Crown Icon" class="profileico" width="auto" height="auto">
                                                        </div>
                                                        <ul class="proDtlList">
                                                        <li><?php echo $ProfileDetails['age'];?> Yrs, <?php echo $ProfileDetails['user_height'];?></li>
                                                            <li><?php echo $ProfileDetails['profession_name'];?></li>
                                                            <li><?php echo $ProfileDetails['caste'];?></li>
                                                            <li><?php echo $ProfileDetails['address'];?></li>
                                                        </ul>
                                                    </div>
                                                    <ul class="d-flex justify-content-between profOptnsList" >
                                                    <ul class="d-flex justify-content-between profOptnsList" >
                                                    <?php $checkalreadysend = $this->General_Model->checkinterestsend($ProfileDetails['id']);  ?>
<li id="contact_visited_<?php echo $key->receiver_id;?>"<?php if(!empty($checkalreadysend['interest_id'])){ ?>style="display:none;"<?php }?>>

 <a href="javascript:void(0)" class="d-flex align-items-center"><img src="<?php echo base_url();?>assets/images/Intrest.svg" class="icon">

<span   onclick="sendinterest('<?php echo $key->receiver_id; ?>','contact_visited')">Interest</span></a>
</li>
<li id="contact_visited_done_<?php echo $key->receiver_id;?>" <?php if(empty($checkalreadysend['interest_id'])){ ?>style="display:none;"<?php }?>>

 <a href="javascript:void(0)" class="d-flex align-items-center"><img src="<?php echo base_url();?>assets/images/Intrest.svg" class="icon">

<span   onclick="sendinterest('<?php echo $key->receiver_id; ?>','contact_visited')">Interested</span></a>
</li>


    <li>
    <a href="javascript:void(0)" class="d-flex align-items-center">
        <img src="<?php echo base_url();?>assets/images/Chat1.svg" class="icon">
        <span>Chat</span>
    </a>
    </li>
    <?php $checkalreadysend = $this->General_Model->checkignoresend($ProfileDetails['id']);  ?>
<li id="contact_visited_ignore_<?php echo $key->receiver_id;?>"<?php if(!empty($checkalreadysend['id'])){ ?>style="display:none;"<?php }?>>

 <a href="javascript:void(0)" class="d-flex align-items-center"><img src="<?php echo base_url();?>assets/images/Ignore.svg" class="icon">

<span  onclick="ignore_profile('<?php echo $key->receiver_id; ?>','contact_visited_ignore')">Ignore</span></a>
</li>
<li id="contact_visited_ignore_done_<?php echo $key->receiver_id;?>" <?php if(empty($checkalreadysend['id'])){ ?>style="display:none;"<?php }?>>

 <a href="javascript:void(0)" class="d-flex align-items-center"><img src="<?php echo base_url();?>assets/images/Ignore.svg" class="icon">

<span   onclick="ignore_profile('<?php echo $key->receiver_id; ?>','contact_visited_ignore')">Ignored</span></a>
</li>

    </ul>
                                                </div>
                                            </div>
                             <!--end  of  contactlist-->
                               <?php }}
                            else{?> <div class="profileBox">

                                <a><button type="button" class="upgrdPrmBtn">
                          <img src="<?php echo base_url() ?>assets/images/crown.png">
                         The people who visited your profile will appear here. Upgrade to Premium to view this page.
                      </button></a></div><?php
                          }?>
                             </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-contactSent" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <div class="profileListBox">
                                        <div class="row">
                            <!--start  of  contactviewed by others-->
                            <?php
                             if(isset($Mycontactvisitors))
                             {
                                 foreach($Mycontactvisitors as $key)
                            {
                                $ProfileDetails = $this->General_Model->GetProfileDetails($key->sender_id);
                                
                                ?>
                                            <div class="col-12 col-sm-6 col-md-12 col-lg-6 col-xl-4">
                                                <div class="profileSingleBox">
                                                    <div id="carouselProfile1" class="carousel slide" data-bs-ride="carousel">
                                                        <div class="carousel-indicators">
                                                            <button type="button" data-bs-target="#carouselProfile1" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                                            <button type="button" data-bs-target="#carouselProfile1" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                            <button type="button" data-bs-target="#carouselProfile1" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                                        </div>
                                                        <a href="<?php echo site_url('user/singleprofile/'.$key->sender_id); ?>">
                                                            <div class="carousel-inner">
                                                                <div class="carousel-item active">
                                                                   <div class="proLstBox">
<?php if(empty($ProfileDetails['photo']))//photo empty
{ 
                         if($ProfileDetails['gender']== 1){ ?>
                                                       
                                        <img src="<?php echo base_url('/assets/photo_storage/maleweb.png'); ?>" alt="profile image" class="proImg" style="height:100%;">
                                                                           
                                                     <?php }
                    else if($ProfileDetails['gender']== 2){ ?>
                                        <img src="<?php echo base_url('/assets/photo_storage/femaleweb.png'); ?>" alt="profile image" class="proImg" style="height:100%;">
                                                                          
                                                     <?php }
} 
else
{//photo not empty 

                                        $photo_status = $this->General_Model->check_photoStatus($ProfileDetails['photo']);//check if approved or not
                                        if(isset($photo_status->status) && $photo_status->status != 0 && $photo_status->status != 1)
                                        {//if approved
                                       
                                               $sender_id = $this->session->userdata('user_id');
                                               $receiver_id = $ProfileDetails['regid'];
                                               $photo_privacy = $this->General_Model->photoprivacy($sender_id,$receiver_id);//check if protected
                                               if($photo_privacy !=1)
                                               {// if public
                          ?>
                                     <img src="<?php echo base_url('/assets/photo_storage_thumb/'.$ProfileDetails['photo']); ?>" alt="profile image" class="proImg" style="height:100%;">
                                
                                                 <?php
                                               }
                                              else
                                               {//private
                                                $sender_id = $this->session->userdata('user_id');
                                                $receiver_id = $ProfileDetails['regid'];
                                                $photo_requeststatus = $this->General_Model->check_photo_requested($sender_id,$receiver_id);//check if protected
                                                    if($photo_requeststatus==0)//not requested for photo
                                                    {
           
                                                            $file_pointer = 'assets/photo_storage_blur/'.$ProfileDetails['photo'];
                                                            if(file_exists($file_pointer)){
                                                                ?>
                        
                                                                     <img src="<?php echo base_url('/assets/photo_storage_blur/'.$ProfileDetails['photo']); ?>" alt="profile image" class="proImg" style="height:100%;">
                                       
                                                                       <div class="overlay"></div>
                                                                                                    <div class="lockOverlay">
                                                                                                        <img src="<?php echo base_url();?>assets/images/lockProfile.svg">
                                                                                                    </div>
                                         
                                                             <?php }
                                                            else{
                                                            if($ProfileDetails['gender']== 1){ ?>
                                            
                                                                       <img src="<?php echo base_url('/assets/photo_storage/maleweb.png'); ?>" alt="profile image" class="proImg" style="height:100%;">
                                
                                                                   <?php }
                                                                   else if($ProfileDetails['gender']== 2){ ?>
                                                       <img src="<?php echo base_url('/assets/photo_storage/femaleweb.png'); ?>" alt="profile image" class="proImg" style="height:100%;">
                                                                      
                                                                   <?php }}
           
                                                     }
                                                     else//requested for photo
                                                    {
                                                                $photo_requeststatus = $this->General_Model->photo_requeststatus($sender_id,$receiver_id);//check for status of the request
                                                                if($photo_requeststatus==1)
                                                                {
                                                                    ?>
                                                                   
                                                                             <img src="<?php echo base_url('/assets/photo_storage_thumb/'.$ProfileDetails['photo']); ?>" alt="profile image" class="proImg" style="height:100%;">
                                                            
                                                                     <?php 
                                                                }
                                                                else{
                                                                    $file_pointer = 'assets/photo_storage_blur/'.$ProfileDetails['photo'];
                                                                    if(file_exists($file_pointer)){?>
                                                                
                                                                <img src="<?php echo base_url('/assets/photo_storage_blur/'.$ProfileDetails['photo']); ?>" alt="profile image" class="proImg" style="height:100%;">
                                                                <div class="overlay"></div>
                                                                                                                            <div class="lockOverlay">
                                                                                                                                <img src="<?php echo base_url();?>assets/images/lockProfile.svg">
                                                                                                                            </div>
                                                                <?php }
                                                                else{
                                                                if($ProfileDetails['gender']== 1){ ?>
                                                                
                                                                       <img src="<?php echo base_url('/assets/photo_storage/maleweb.png'); ?>" alt="profile image" class="proImg">
                                                                       <div class="lockOverlay">
                                                                                                                                <img src="<?php echo base_url();?>assets/images/lockProfile.svg">
                                                                                                                            </div>
                                                                   <?php }
                                                                   else if($ProfileDetails['gender']== 2){ ?>
                                                                
                                                                       <img src="<?php echo base_url('/assets/photo_storage/femaleweb.png'); ?>" alt="profile image" class="proImg">
                                                                       <div class="lockOverlay">
                                                                                                                                <img src="<?php echo base_url();?>assets/images/lockProfile.svg">
                                                                                                                            </div>
                                                                   <?php }
                                                                }
                                                                }
                                                            }
                                    
                                                    }//end of private
                                            
                                        }//end of approved
                                         else//not approved
                                         {
                                              if($ProfileDetails['gender']== 1){ ?>
        
                                                       <img src="<?php echo base_url('/assets/photo_storage/maleweb.png'); ?>" alt="profile image" class="proImg" style="height:100%;">
                                                       
                                                       <?php }
                                                       else if($ProfileDetails['gender']== 2){ ?>
                                                    
                                                           <img src="<?php echo base_url('/assets/photo_storage/femaleweb.png'); ?>" alt="profile image" class="proImg" style="height:100%;">
                                                           
                                                       <?php }
                                         }//end of not approved
}//end of photo not empty
                                 ?>
                                     <div class="overlay"></div>
                                                            </div>
                                                                </div>
                                                              
                                                            </div>
                                                        </a>
                                                        <div class="carouselCount">
                                                            <div class="d-flex align-items-center mb-2">
                                                                <img src="<?php echo base_url();?>assets/images/slideCIcon.svg" class="slideCIcon">
                                                                <p class="num"  id="num1"></p>
                                                            </div>
                                                            <button type="button" class="bookmarkBtn">
                                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15.182 20.279" class="slideBkmark">
                                                                    <g transform="translate(0.5 0.5)">
                                                                        <path d="M0,18.909V1.773A1.773,1.773,0,0,1,1.773,0H12.409a1.773,1.773,0,0,1,1.773,1.773V18.909L7.091,14.773Z" stroke-width="1"/>
                                                                    </g>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="contentBox">
                                                        <p class="status"><span class="online"></span>Online</p>
                                                        <div class="d-flex align-item-center mb-2">
                                                            <img src="<?php echo base_url();?>assets/images/linkGreen.svg" alt="link Green" class="linkGreen me-1" width="auto" height="auto">
                                                            <span class="proDtls"><?php echo $ProfileDetails['name'];?></span>
                                                            <img src="<?php echo base_url();?>assets/images/nameCrownIcon.svg" alt="Crown Icon" class="profileico" width="auto" height="auto">
                                                        </div>
                                                        <ul class="proDtlList">
                                                        <li><?php echo $ProfileDetails['age'];?> Yrs, <?php echo $ProfileDetails['user_height'];?></li>
                                                            <li><?php echo $ProfileDetails['profession_name'];?></li>
                                                            <li><?php echo $ProfileDetails['caste'];?></li>
                                                            <li><?php echo $ProfileDetails['address'];?></li>
                                                        </ul>
                                                    </div>
                                                    <ul class="d-flex justify-content-between profOptnsList" >
                                                    <?php $checkalreadysend = $this->General_Model->checkinterestsend($ProfileDetails['id']);  ?>
<li id="contact_visitor_<?php echo $key->sender_id;?>"<?php if(!empty($checkalreadysend['interest_id'])){ ?>style="display:none;"<?php }?>>

 <a href="javascript:void(0)" class="d-flex align-items-center"><img src="<?php echo base_url();?>assets/images/Intrest.svg" class="icon">

<span   onclick="sendinterest('<?php echo $key->sender_id; ?>','contact_visitor')">Interest</span></a>
</li>
<li id="contact_visitor_done_<?php echo $key->sender_id;?>" <?php if(empty($checkalreadysend['interest_id'])){ ?>style="display:none;"<?php }?>>

 <a href="javascript:void(0)" class="d-flex align-items-center"><img src="<?php echo base_url();?>assets/images/Intrest.svg" class="icon">

<span   onclick="sendinterest('<?php echo $key->sender_id; ?>','contact_visitor')">Interested</span></a>
</li>


    <li>
    <a href="javascript:void(0)" class="d-flex align-items-center">
        <img src="<?php echo base_url();?>assets/images/Chat1.svg" class="icon">
        <span>Chat</span>
    </a>
    </li>
    <?php $checkalreadysend = $this->General_Model->checkignoresend($ProfileDetails['id']);  ?>
<li id="contact_visitor_ignore_<?php echo $key->sender_id;?>"<?php if(!empty($checkalreadysend['id'])){ ?>style="display:none;"<?php }?>>

 <a href="javascript:void(0)" class="d-flex align-items-center"><img src="<?php echo base_url();?>assets/images/Ignore.svg" class="icon">

<span  onclick="ignore_profile('<?php echo $key->sender_id; ?>','contact_visitor_ignore')">Ignore</span></a>
</li>
<li id="contact_visitor_ignore_done_<?php echo $key->sender_id;?>" <?php if(empty($checkalreadysend['id'])){ ?>style="display:none;"<?php }?>>

 <a href="javascript:void(0)" class="d-flex align-items-center"><img src="<?php echo base_url();?>assets/images/Ignore.svg" class="icon">

<span   onclick="ignore_profile('<?php echo $key->sender_id; ?>','contact_visitor_ignore')">Ignored</span></a>
</li>

    </ul>
                                                </div>
                                            </div>
                              <!--end  of  contactSent-->
                              <?php }}
                            else{?> <div class="profileBox">

                                <a><button type="button" class="upgrdPrmBtn">
                          <img src="<?php echo base_url() ?>assets/images/crown.png">
                         The people who visited your profile will appear here. Upgrade to Premium to view this page.
                      </button></a></div><?php
                          }?>    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-shortlist" role="tabpanel" aria-labelledby="v-pills-shortlist-tab">
                            <div class="profileListBox mt-4">
                                <div class="row">
                            <!--start  of  shortlist-->
                            <?php
                            if(!empty($Shortlist))
                            {
                                 foreach($Shortlist as $key)
                            {
                                $ProfileDetails = $this->General_Model->GetProfileDetails($key->receiver_id);
                                
                                ?>
                                    <div class="col-12 col-sm-6 col-md-12 col-lg-6 col-xl-4">
                                        <div class="profileSingleBox">
                                            <div id="carouselProfile1" class="carousel slide" data-bs-ride="carousel">
                                                <div class="carousel-indicators">
                                                    <button type="button" data-bs-target="#carouselProfile1" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                                    <button type="button" data-bs-target="#carouselProfile1" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                    <button type="button" data-bs-target="#carouselProfile1" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                                </div>
                                                <a href="<?php echo site_url('user/singleprofile/'.$ProfileDetails['id']); ?>">
                                                    <div class="carousel-inner">
                                                        <div class="carousel-item active">
                                                            <div class="proLstBox">
                                                            <?php if(empty($ProfileDetails['photo'])){ 
                                            if($ProfileDetails['gender']== 1){ ?>
                                                <img src="<?php echo base_url('/assets/photo_storage/maleweb.png'); ?>" alt="profile image" class="proImg" style="height:100%;">
                                            <?php }
                                            else if($ProfileDetails['gender']== 2){ ?>
                                                <img src="<?php echo base_url('/assets/photo_storage/femaleweb.png'); ?>" alt="profile image" class="proImg" style="height:100%;">
                                            <?php }
                                     } 
                                     else{ ?>
                                            <img src="<?php echo base_url('/assets/photo_storage/'.$ProfileDetails['photo']); ?>" alt="profile image" class="proImg" style="height:100%;">

                                     <?php } ?>                                                                      <div class="overlay"></div>
                                                            </div>
                                                        </div>
                                                      
                                                    </div>
                                                </a>
                                                <div class="carouselCount">
                                                    <div class="d-flex align-items-center mb-2">
                                                        <img src="<?php echo base_url();?>assets/images/slideCIcon.svg" class="slideCIcon">
                                                        <p class="num"  id="num1"></p>
                                                    </div>
                                                    <button type="button" class="bookmarkBtn">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15.182 20.279" class="slideBkmark">
                                                            <g transform="translate(0.5 0.5)">
                                                                <path d="M0,18.909V1.773A1.773,1.773,0,0,1,1.773,0H12.409a1.773,1.773,0,0,1,1.773,1.773V18.909L7.091,14.773Z" stroke-width="1"/>
                                                            </g>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="contentBox">
                                                <p class="status"><span class="online"></span>Online</p>
                                                <div class="d-flex align-item-center mb-2">
                                                            <img src="<?php echo base_url();?>assets/images/linkGreen.svg" alt="link Green" class="linkGreen me-1" width="auto" height="auto">
                                                            <span class="proDtls"><?php echo $ProfileDetails['name'];?></span>
                                                            <img src="<?php echo base_url();?>assets/images/nameCrownIcon.svg" alt="Crown Icon" class="profileico" width="auto" height="auto">
                                                        </div>
                                                        <ul class="proDtlList">
                                                        <li><?php echo $ProfileDetails['age'];?> Yrs, <?php echo $ProfileDetails['user_height'];?></li>
                                                            <li><?php echo $ProfileDetails['profession_name'];?></li>
                                                            <li><?php echo $ProfileDetails['caste'];?></li>
                                                            <li><?php echo $ProfileDetails['address'];?></li>
                                                        </ul>
                                            </div>
                                            <ul class="d-flex justify-content-between profOptnsList" >
                                            <?php $checkalreadysend = $this->General_Model->checkinterestsend($ProfileDetails['id']);  ?>
<li id="shortlist_<?php echo $ProfileDetails['id'];?>"<?php if(!empty($checkalreadysend['interest_id'])){ ?>style="display:none;"<?php }?>>

 <ahref="javascript:void(0)" class="d-flex align-items-center"><img src="<?php echo base_url();?>assets/images/Intrest.svg" class="icon">

<span   onclick="sendinterest('<?php echo $ProfileDetails['id']; ?>','shortlist')">Interest</span></a>
</li>
<li id="shortlist_done_<?php echo $ProfileDetails['id'];?>" <?php if(empty($checkalreadysend['interest_id'])){ ?>style="display:none;"<?php }?>>

 <ahref="javascript:void(0)" class="d-flex align-items-center"><img src="<?php echo base_url();?>assets/images/Intrest.svg" class="icon">

<span   onclick="sendinterest('<?php echo $ProfileDetails['id']; ?>','shortlist')">Interested</span></a>
</li>
 <li>
    <a href="javascript:void(0)" class="d-flex align-items-center">
        <img src="<?php echo base_url();?>assets/images/Chat1.svg" class="icon">
        <span>Chat</span>
    </a>
    </li>
    <?php $checkalreadysend = $this->General_Model->checkignoresend($ProfileDetails['id']);  ?>
<li id="shortlist_ignore_<?php echo $key->receiver_id;?>"<?php if(!empty($checkalreadysend['id'])){ ?>style="display:none;"<?php }?>>

 <a href="javascript:void(0)" class="d-flex align-items-center"><img src="<?php echo base_url();?>assets/images/Ignore.svg" class="icon">

<span  onclick="ignore_profile('<?php echo $key->receiver_id; ?>','shortlist_ignore')">Ignore</span></a>
</li>
<li id="shortlist_ignore_done_<?php echo $key->receiver_id;?>" <?php if(empty($checkalreadysend['id'])){ ?>style="display:none;"<?php }?>>

 <a href="javascript:void(0)" class="d-flex align-items-center"><img src="<?php echo base_url();?>assets/images/Ignore.svg" class="icon">

<span   onclick="ignore_profile('<?php echo $key->receiver_id; ?>','shortlist_ignore')">Ignored</span></a>
</li>
   
    </ul>
                                        </div>
                                    </div>
                                    <?php }}
                                    else{?>
                                    <div class="profileBox">

<a><button type="button" class="upgrdPrmBtn">
<img src="<?php echo base_url() ?>assets/images/crown.png">
No profiles found.</button></a></div>
                                    <?php }?>
                            <!--end  of  shortlist-->
                                   
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-blocked" role="tabpanel" aria-labelledby="v-pills-blocked-tab">
                            <div class="profileListBox mt-4">
                                <div class="row">
                            <!--start  of  blocked-->
                            <?php
                            if(!empty($Ignorelist))
                            {
                                 foreach($Ignorelist as $key)
                            {
                                $ProfileDetails = $this->General_Model->GetProfileDetails($key->receiver_id);
                                
                                ?>
                            <div class="col-12 col-sm-6 col-md-12 col-lg-6 col-xl-4">
                                        <div class="profileSingleBox">
                                            <div id="carouselProfile1" class="carousel slide" data-bs-ride="carousel">
                                                <div class="carousel-indicators">
                                                    <button type="button" data-bs-target="#carouselProfile1" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                                    <button type="button" data-bs-target="#carouselProfile1" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                    <button type="button" data-bs-target="#carouselProfile1" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                                </div>
                                                <a href="<?php echo site_url('user/singleprofile/'.$key->id); ?>">
                                                    <div class="carousel-inner">
                                                        <div class="carousel-item active">
                                                            <div class="proLstBox">
                                                            <?php if(empty($ProfileDetails['photo'])){ 
                                            if($ProfileDetails['gender']== 1){ ?>
                                                <img src="<?php echo base_url('/assets/photo_storage/maleweb.png'); ?>" alt="profile image" class="proImg" style="height:100%;">
                                            <?php }
                                            else if($ProfileDetails['gender']== 2){ ?>
                                                <img src="<?php echo base_url('/assets/photo_storage/femaleweb.png'); ?>" alt="profile image" class="proImg" style="height:100%;">
                                            <?php }
                                     } 
                                     else{ ?>
                                            <img src="<?php echo base_url('/assets/photo_storage/'.$ProfileDetails['photo']); ?>" alt="profile image" class="proImg" style="height:100%;">

                                     <?php } ?>                                                                   <div class="overlay"></div>
                                                            </div>
                                                        </div>
                                                      
                                                    </div>
                                                </a>
                                                <div class="carouselCount">
                                                    <div class="d-flex align-items-center mb-2">
                                                        <img src="<?php echo base_url();?>assets/images/slideCIcon.svg" class="slideCIcon">
                                                        <p class="num"  id="num1"></p>
                                                    </div>
                                                    <button type="button" class="bookmarkBtn">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15.182 20.279" class="slideBkmark">
                                                            <g transform="translate(0.5 0.5)">
                                                                <path d="M0,18.909V1.773A1.773,1.773,0,0,1,1.773,0H12.409a1.773,1.773,0,0,1,1.773,1.773V18.909L7.091,14.773Z" stroke-width="1"/>
                                                            </g>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="contentBox">
                                                <p class="status"><span class="online"></span>Online</p>
                                                <div class="d-flex align-item-center mb-2">
                                                            <img src="<?php echo base_url();?>assets/images/linkGreen.svg" alt="link Green" class="linkGreen me-1" width="auto" height="auto">
                                                            <span class="proDtls"><?php echo $ProfileDetails['name'];?></span>
                                                            <img src="<?php echo base_url();?>assets/images/nameCrownIcon.svg" alt="Crown Icon" class="profileico" width="auto" height="auto">
                                                        </div>
                                                        <ul class="proDtlList">
                                                        <li><?php echo $ProfileDetails['age'];?> Yrs, <?php echo $ProfileDetails['user_height'];?></li>
                                                            <li><?php echo $ProfileDetails['profession_name'];?></li>
                                                            <li><?php echo $ProfileDetails['caste'];?></li>
                                                            <li><?php echo $ProfileDetails['address'];?></li>
                                                        </ul>
                                            </div>
                                            <ul class="d-flex justify-content-between profOptnsList">
                                               <!-- <li>
                                                    <a href="javascript:void(0)" class="d-flex align-items-center">
                                                        <img src="images/Intrest.svg" class="icon">
                                                        <span>Interest</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)" class="d-flex align-items-center">
                                                        <img src="images/Chat1.svg" class="icon">
                                                        <span>Chat</span>
                                                    </a>
                                                </li>-->
                                                <li id="undoignore_<?php echo $key->receiver_id; ?>">
                                                    <a onclick="undo_ignored_profile('<?php echo $key->receiver_id; ?>','undoignore')" class="d-flex align-items-center">
                                                        <img src="<?php echo base_url('/assets/images/chevron-l.png');?>" class="icon">
                                                        <span>Undo</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <?php }}else{?>
                                        <div class="profileBox">
<a><button type="button" class="upgrdPrmBtn">
<img src="<?php echo base_url() ?>assets/images/crown.png">
No profiles found..</button></a></div>
                                        <?php }?>
                                     <!--end  of  blocked-->
                                </div>
                            </div>
                           
                       
                        </div>
                    </div>
                    
                   
                </div>
            </div>
        </div>
    </section>
    
    <style>
    #userContent .exploreTabs .nav-link.active 
    {
    border: 1px solid #5aba47;
    }
    
    #userContent .exploreContents .nav-link.active 
    {
    background-color: #c3f8b8b5;
    }
    
    #userContent .exploreContents .nav-link.active::after
    {
        background-color: #5aba47;
    }
    
    #userContent .exploreContents .nav-pills 
    {
    border-bottom: 1px solid #5aba47;
   }
    </style>
    
    
    <?php include('include/footer_gotonikah.php'); ?>

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

            // bookmark profile 
            $(".bookmarkBtn").click(function(){
                $(this).toggleClass("marked");
            });


            
        });
        function interestaction(receiverid,senderid,type,tabvl){

$.ajax({
    type: "post",
    url: '<?php echo site_url('user/interestaction'); ?>',
    data: {'type':type,'receiverid':receiverid,'senderid':senderid},
    success: function(response){ 


 if(type == 1){
    $('#'+tabvl+'_'+senderid).html("<ul class='d-flex justify-content-between profOptnsList' >  <li ><a  class='d-flex align-items-center' ><img src='<?php echo base_url();?>assets/images/Intrest.svg' class='icon'><span>Accepted</span></a></li><li ><a href='javascript:void(0)'' class='d-flex align-items-center'><img src='<?php echo base_url();?>assets/images/Chat1.svg' class='icon'><span>Chat</span></a></li></ul>");
    
}
else if(type == 2 ){  
    $('#'+tabvl+'_'+senderid).html("<ul class='d-flex justify-content-between profOptnsList' > <li ><a href='javascript:void(0)'' class='d-flex align-items-center'><img src='<?php echo base_url();?>assets/images/Chat1.svg' class='icon'><span>Chat</span></a></li><li ><a  class='d-flex align-items-center' ><img src='<?php echo base_url();?>assets/images/Ignore.svg' class='icon'><span>Declined</span></img></li></ul>");
}

else if(type == 3 ){  
    $('#'+tabvl+'_'+senderid).html("<ul class='d-flex justify-content-between profOptnsList' ><li ><a href='javascript:void(0)'' class='d-flex align-items-center'><img src='<?php echo base_url();?>assets/images/Chat1.svg' class='icon'><span>Chat</span></a></li></ul>");
}     


      
  } 
});

}
function sendinterest(receiver_id,tabvl){

url_address='<?php echo site_url() ?>/user/send_interest';
       data = { receiver_id : receiver_id};
       $.ajax({
           type: "post",
           url: url_address,
           data: data,
           success: function(response){ 
            $('#'+tabvl+'_'+receiver_id).toggle();
            $('#'+tabvl+'_done_'+receiver_id).toggle();
            
        },
           error: function(XMLHttpRequest, textStatus, errorThrown){
              alert(textStatus);
         }



});

}   
function ignore_profile(receiver_id,tabvl)
{
    url_address='<?php echo site_url() ?>/user/ignore_profile';
       data = { receiver_id : receiver_id};
       $.ajax({
           type: "post",
           url: url_address,
           data: data,
           success: function(response){ 
            $('#'+tabvl+'_'+receiver_id).toggle();
            $('#'+tabvl+'_done_'+receiver_id).toggle();
                  },
           error: function(XMLHttpRequest, textStatus, errorThrown){
              alert(textStatus);
         }



});

} 
function undo_ignored_profile(receiver_id,tabvl)
{
    url_address='<?php echo site_url() ?>/user/undo_ignored_profile';
       data = { receiver_id : receiver_id};
       $.ajax({
           type: "post",
           url: url_address,
           data: data,
           success: function(response){ 
            alert("Undo Successfully..");
            $('#'+tabvl+'_'+receiver_id).html("<a href='javascript:void(0)'' class='d-flex align-items-center'><img src='<?php echo base_url();?>assets/images/seen.png' class='icon'><span>View Profile</span></a>");
         },
           error: function(XMLHttpRequest, textStatus, errorThrown){
              alert(textStatus);
         }



});

}
</script>

</body>
</html>