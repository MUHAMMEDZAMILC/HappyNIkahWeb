<!DOCTYPE html>
<html>
<?php include('include/header.php'); ?>

    <section id="userContent">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-5 col-lg-4">
                    <?php include('include/user_info.php') ?>
                    <?php include('include/side_menu.php'); ?>
                </div>
                <div class="col-12 col-md-7 col-lg-8">  
                    <!-- search -->
                    <?php include('include/search.php') ?>
                    <!-- animated menu -->
                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <a href="<?php echo site_url('user/featured_profiles'); ?>">
                                <div class="animatedLinks">
                                    <h4 class="count"><?php echo count($MatchingProfiles); ?></h4>
                                    <img src="<?php echo base_url() ?>assets/images/match.png" alt="Matching Profiles" class="animImg">
                                    <p class="animHead">Matching Profiles</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-lg-4">
                            <a href="<?php echo site_url('user/interest_expressed') ?>">
                                <div class="animatedLinks">
                                    <h4 class="count"><?php echo $InterestExpressedCount ?></h4>
                                    <img src="<?php echo base_url() ?>assets/images/interest.png" alt="Interest Expressed" class="animImg">
                                    <p class="animHead">Interest Expressed</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-lg-4">
                            <a href="<?php echo site_url('user/likes'); ?>">
                                <div class="animatedLinks">
                                    <h4 class="count"><?php echo $liked_profilesCount; ?></h4>
                                    <img src="<?php echo base_url() ?>assets/images/likes.png" alt="Likes" class="animImg">
                                    <p class="animHead">Likes</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- profile listing -->
                    <div class="profileListBox">
                        <div class="row">
                            <div class="col-6 d-flex align-items-center">
                                <h5 class="listTypeHead">Matching Profile</h5>
                            </div>
                            <div class="col-6 d-flex align-items-center justify-content-end">
                                <!-- <a class="viewAllBtn" href="javascript:void(0)">View All</a> -->
                            </div>
                        </div>
                        <div class="row">
                         <?php 
                         if(empty($MatchingProfiles)){ ?>
                                <center><h6 style="color:red"><b>No Matching Profiles Found</b></h6></center>
                         <?php } 
                         else{

                            foreach ($MatchingProfiles as $key) { ?>
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
                                         <?php
                                                     $file_pointer = 'assets/photo_storage_blur/'.$key->user_image;
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
                                         if($key->gender == 1){ ?>
                                            <img src="<?php echo base_url('/assets/photo_storage/male.jpg'); ?>" alt="profile image" class="proImg">
                                            <?php }
                                            else if($key->gender == 2){ ?>
                                                <img src="<?php echo base_url('/assets/photo_storage/female.jpg'); ?>" alt="profile image" class="proImg">
                                            <?php }
                                     }} ?>
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
                                        <img src="<?php echo base_url() ?>assets/images/checked.png">Express Interest </button>



                                        <?php }else{ ?>

                                        <button class="clicked sndrqst" type="button">
                                        <img  src="<?php echo base_url() ?>assets/images/checked.png">Expressed Interest</button>


                                        <?php } ?>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                            <?php }  
                            }?> 
                         
                        </div>
                         <div>
                        <p class="pagination"><?php echo $links; ?></p>
                        </div>
                    </div>
                    <!-- mobile app advrtisment -->
                    <div class="appAdvBox">
                        <div class="row">
                            <div class="col-12 col-xl-6">
                                <h2 class="subHead mb-4">Search Profiles<br><span>Anytime! Anywhere!!</span></h2>
                                <p class="pOne">Finding your perfect match has never been easier without the Happynikah application</p>
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

    <script type="text/javascript">
        $(document).ready(function () {
            // burger menu
            $(".hamburger").click(function(){
                $(this).toggleClass("is-active");
                $('body').toggleClass("is-scroll-disabled");
            });
            // burger menu end

            // send request btn
            // $(".interest").click(function(){
            //     $(this).toggleClass("clicked");
            //     var sender_id = $(".sender_id").val();
            //     var receiver_id = $(".receiver_id").val();
            //     url_address='<?php echo site_url() ?>/user/send_interest';
            //     data = { sender_id : sender_id, receiver_id : receiver_id};
            //     $.ajax({
            //         type: "post",
            //         url: url_address,
            //         data: data,
            //         success: function(response){ 
            //           $('.'+receiver_id).show();
            //       },
            //         error: function(XMLHttpRequest, textStatus, errorThrown){
            //            alert(textStatus);
            //       }
            //   });
            // });
            
        });





        function sendinterest(receiver_id){

         $('#sendinterest'+receiver_id).toggleClass("clicked");
         url_address='<?php echo site_url() ?>/user/send_interest';
                data = { receiver_id : receiver_id};
                $.ajax({
                    type: "post",
                    url: url_address,
                    data: data,
                    success: function(response){ 
                      $('.'+receiver_id).show();
                  },
                    error: function(XMLHttpRequest, textStatus, errorThrown){
                       alert(textStatus);
                  }



        });

    }
        
    </script>

</body>
</html>