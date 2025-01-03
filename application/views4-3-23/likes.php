<!DOCTYPE html>
<html>
<?php include('include/header.php'); ?>
    <section id="userContent">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-5 col-lg-4">
                    <?php include('include/user_info.php') ?>
                    <?php include('include/side_menu.php'); ?>
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
                                <a href="javascript:void(0)">
                                    <img src="<?php echo base_url() ?>assets/images/playStore.png" alt="playStore" class="storeIcon" width="auto" height="auto">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-7 col-lg-8">
                    <!-- search -->
                    <?php include('include/search.php') ?>
                   
                    <!-- profile listing -->
                    <div class="profileListBox plbTrasprnt">
                        <div class="row">
                            <div class="col-12 d-flex align-items-center mb-4">
                                <h5 class="listTypeHead">Liked your profile <span></span><?php echo $liked_profilesCount; ?></h5>
                            </div>
                        </div>
                        <div class="row">
                            <?php 
                         if(empty($liked_profiles)){ ?>
                                <center><h6 style="color:red"><b>No Matching Profiles Found</b></h6></center>
                         <?php } 
                         else{

                            foreach ($liked_profiles as $key) { ?>
                                <div class="col-12 col-sm-6 col-md-12 col-lg-6 col-xl-4">
                                <div class="proLstBox">
                                    <?php if(empty($key->user_image)){ 
                                            if($key->gender== 1){ ?>
                                                <img src="<?php echo base_url('/assets/photo_storage/male.jpg'); ?>" alt="profile image" class="proImg">
                                            <?php }
                                            else if($key->gender== 2){ ?>
                                                <img src="<?php echo base_url('/assets/photo_storage/female.jpg'); ?>" alt="profile image" class="proImg">
                                            <?php }
                                     } 
                                     else{ ?>
                                            <img src="<?php echo base_url('/assets/photo_storage/'.$key->user_image); ?>" alt="profile image" class="proImg">

                                     <?php } ?>
                                    <div class="overlay"></div>
                                    <div class="contentBox">
                                        <a href="<?php echo site_url('user/singleprofile/'.$key->id); ?>">
                                            <!--<p class="status"><span class=""></span>Offline</p>-->
                                            <div class="d-flex mb-2">
                                                <div class="flex-shrink-0">
                                                    <img src="<?php echo base_url() ?>assets/images/name.png" alt="name" class="profileico" width="auto" height="auto">
                                                </div>
                                                <div class="flex-grow-1 ms-2">
                                                    <input type="hidden" value="<?php echo $this->session->userdata('user_id'); ?>" class="sender_id">

                                                    <input type="hidden" value="<?php echo $key->id; ?>" class="receiver_id">

                                                    <span class="proDtls"><?php echo $key->name;?></span>
                                                    <span class="proDtls"><?php echo $key->age;?> Yrs, <?php echo $key->height;?></span>
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
                                                    }?></span>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="d-flex justify-content-between">
                                            <!--<button class="chatBtn me-2" type="button" onclick="window.location.href='chat.html'">
                                                <img src="chatimglink">-->
                                                <!--Chat
                                            </button>-->
                                        <a href="<?php echo site_url('user/singleprofile/'.$key->id); ?>">
                                        <button class="chatBtn me-2" type="button" >
                                        View Profile
                                        </button>
                                        </a>

                                        <?php $checkalreadysend = $this->General_Model->checkinterestsend($key->id);  

    
                                        if(empty($checkalreadysend['interest_id'])){ ?>

                                        <button class="interest sndrqst" type="button" id="sendinterest<?php echo $key->id; ?>" onclick="sendinterest('<?php echo $key->id; ?>')">
                                        <img src="<?php echo base_url() ?>assets/images/checked.png">Send Request </button>



                                        <?php }else{ ?>

                                        <button class="clicked sndrqst" type="button">
                                        <img  src="<?php echo base_url() ?>assets/images/checked.png"> Requested </button>


                                        <?php } ?>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                            <?php }  
                            }?> 
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
            
        });
        
    </script>

</body>
</html>