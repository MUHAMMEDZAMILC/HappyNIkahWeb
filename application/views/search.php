<!DOCTYPE html>

<html>

<?php include('include/user_header.php'); ?>





    <section id="userContent">

        <div class="container">

            <div class="row">

            <div class="col-12 col-md-5 col-lg-4">

            <?php include('include/user_info.php'); ?>

            <?php include('include/side_menu.php'); ?>



            </div>

                <div class="col-12 col-md-7 col-lg-8">

                    <!-- profile listing -->

                    <div class="profileListBox">

                        <div class="row">

                            <div class="col-12 d-flex align-items-center">

                                <h5 class="listTypeHead">Matching Profiles</h5>

                            </div>

                        </div>



                        <div class="row">

                        <?php foreach ($MatchingProfiles as $key) { ?>



                            <div class="col-12 col-sm-6 col-md-12 col-lg-6 col-xl-4">

                                <div class="profileSingleBox">

                                    <div id="carouselProfile1" class="carousel slide" data-bs-ride="carousel">

                                        <div class="carousel-indicators">

                                            <button type="button" data-bs-target="#carouselProfile1" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>

                                            <!--<button type="button" data-bs-target="#carouselProfile1" data-bs-slide-to="1" aria-label="Slide 2"></button>

                                            <button type="button" data-bs-target="#carouselProfile1" data-bs-slide-to="2" aria-label="Slide 3"></button>-->

                                        </div>

                                        <a href="<?php echo site_url('singleprofile/'.$key->id); ?>">

                                        <div class="carousel-inner">

                                                    <div class="carousel-item active">

                                                            <div class="proLstBox">

                                                    <?php 

                                                    //echo $key->user_image;

                                                    if(empty($key->user_image)){ 

                                            if($key->gender== 1){ ?>

                                           

                                                                <img src="<?php echo base_url('/assets/photo_storage/maleweb.png'); ?>" alt="profile image" class="proImg" style="height:100%;">

                                                               <div class="overlay"></div>

                                            <?php }

                                            else if($key->gender== 2){ ?>

                                                                  <img src="<?php echo base_url('/assets/photo_storage/femaleweb.png'); ?>" alt="profile image" class="proImg" style="height:100%;">

                                                              <div class="overlay"></div>

                                            <?php }

                                     } else{ 

                                        $photo_status = $this->General_Model->check_photoStatus($key->user_image);//check if approved or not

                                        //echo $photo_status->status;

                                      

                                        if(isset($photo_status->status) && $photo_status->status != 0 && $photo_status->status != 1){//if approved

                                        $sender_id = $this->session->userdata('user_id');

                                               $receiver_id = $key->id;

                                               $photo_privacy = $this->General_Model->photoprivacy($sender_id,$receiver_id);//check if protected

                                               if($photo_privacy !=1)

                                               {// if public

                          

                          $file_pointer = 'assets/photo_storage_thumb/'.$key->user_image;

    if(file_exists($file_pointer)){?>

                                     <img src="<?php echo base_url('/assets/photo_storage_thumb/'.$key->user_image); ?>" alt="profile image" class="proImg" style="height:100%;">

                               <?php } else{

                               $file_pointer = 'assets/photo_storage/'.$key->user_image;

    if(file_exists($file_pointer)){?>

                                    <img src="<?php echo base_url('/assets/photo_storage/') . $key->user_image; ?>" alt="profile image" class="proImg" style="height:100%;">



                               <?php }else{

                               if($key->gender== 1){ ?>

       <img src="<?php echo base_url('/assets/photo_storage/maleweb.png'); ?>" alt="profile image" class="proImg">

   <?php }

   else{ ?>

       <img src="<?php echo base_url('/assets/photo_storage/femaleweb.png'); ?>" alt="profile image" class="proImg">

                               <?php }?>

                               <div class="overlay"></div>

                                     <?php

                                     }//end file exists

                                                   

                                               }}//end public

                                     else{//private

                                        $sender_id = $this->session->userdata('user_id');

                                        $receiver_id = $key->id;

                                        $photo_requeststatus = $this->General_Model->check_photo_requested($sender_id,$receiver_id);//check if protected

if($photo_requeststatus==0)//not requested for photo

{

    $file_pointer = 'assets/photo_storage_blur/'.$key->user_image;

    if(file_exists($file_pointer)){?>



<img src="<?php echo base_url('/assets/photo_storage_blur/'.$key->user_image); ?>" alt="profile image" class="proImg" style="height:100%;">

<div class="overlay"></div>

                                                                <div class="lockOverlay">

                                                                    <img src="<?php echo base_url();?>assets/images/lockProfile.svg">

                                                                </div>

<?php }

else{//file missing

if($key->gender== 1){ ?>



       <img src="<?php echo base_url('/assets/photo_storage/maleweb.png'); ?>" alt="profile image" class="proImg">

       <div class="overlay"></div>

                                                                <div class="lockOverlay">

                                                                    <img src="<?php echo base_url();?>assets/images/lockProfile.svg">

                                                                </div>

   <?php }

   else if($key->gender== 2){ ?>



       <img src="<?php echo base_url('/assets/photo_storage/femaleweb.png'); ?>" alt="profile image" class="proImg">

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

 $file_pointer = 'assets/photo_storage_thumb/'.$key->user_image;

    if(file_exists($file_pointer)){?>

                                     <img src="<?php echo base_url('/assets/photo_storage_thumb/'.$key->user_image); ?>" alt="profile image" class="proImg" style="height:100%;">

                               <?php } else{?>

                                    <img src="<?php echo base_url('/assets/photo_storage/'.$key->user_image); ?>" alt="profile image" class="proImg" style="height:100%;">



                               <?php }?>                 <div class="overlay"></div>

               

         <?php 

    }

    else{

        $file_pointer = 'assets/photo_storage_blur/'.$key->user_image;

        if(file_exists($file_pointer)){?>

    

    <img src="<?php echo base_url('/assets/photo_storage_blur/'.$key->user_image); ?>" alt="profile image" class="proImg">

    <div class="overlay"></div>

                                                                <div class="lockOverlay">

                                                                    <img src="<?php echo base_url();?>assets/images/lockProfile.svg">

                                                                </div>

    <?php }

    else{

    if($key->gender== 1){ ?>

    

           <img src="<?php echo base_url('/assets/photo_storage/maleweb.png'); ?>" alt="profile image" class="proImg">

          <div class="overlay"></div> <div class="lockOverlay">

                                                                    <img src="<?php echo base_url();?>assets/images/lockProfile.svg">

                                                                </div>

       <?php }

       else if($key->gender== 2){ ?>

    

           <img src="<?php echo base_url('/assets/photo_storage/femaleweb.png'); ?>" alt="profile image" class="proImg">

         <div class="overlay"></div>  <div class="lockOverlay">

                                                                    <img src="<?php echo base_url();?>assets/images/lockProfile.svg">

                                                                </div>

       <?php }

    }

    }

}

                                    

                                     }}

                                     else { //not approved 

                                     

                                             if($key->gender== 1){ ?>

                             

                                                        <img src="<?php echo base_url('/assets/photo_storage/maleweb.png'); ?>" alt="profile image" class="proImg" style="height:100%;">

                                                       <div class="overlay"></div>

                                                    <?php }

                                                    else if($key->gender== 2){ ?>

                                                        <img src="<?php echo base_url('/assets/photo_storage/femaleweb.png'); ?>" alt="profile image" class="proImg" style="height:100%;">

                                                        <div class="overlay"></div>

                                                    <?php }

                                             }?>

                                     <?php  }?>

                                                            </div>

                                                        </div>

                                                       

                                                    </div>

                                        </a>

                                        <div class="carouselCount">

                                            <div class="d-flex align-items-center mb-2">

                                                <img src="<?php echo base_url();?>assets/images/slideCIcon.svg" class="slideCIcon">

                                                <p class="num"  id="num1"></p>

                                            </div>

                                            <?php

                                                     $checkalreadysend = $this->General_Model->checkShortlisted($key->id);  

?>

                                                    <button type="button" title="Shortlist profile" class="bookmarkBtn" onclick="shortlist_profile(<?php echo $key->id;?>)" id="shortlist" <?php if(!empty($checkalreadysend['shortlist_id'])){?> style="display:none;"<?php }?>>

                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15.182 20.279" class="slideBkmark">

                                                            <g transform="translate(0.5 0.5)">

                                                                <path d="M0,18.909V1.773A1.773,1.773,0,0,1,1.773,0H12.409a1.773,1.773,0,0,1,1.773,1.773V18.909L7.091,14.773Z" stroke-width="1"/>

                                                            </g>

                                                        </svg>

                                                    </button>

                                                    <button type="button" class="bookmarkBtn marked" title="Undo shortlisted profile" onclick="shortlist_profile(<?php echo $key->id;?>)"id="shortlist_done"<?php if(empty($checkalreadysend['shortlist_id'])){?>style="display:none;"<?php }?>>

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

                                        <div class="d-flex align-item-center mb-2">

                                            <img src="<?php echo base_url();?>assets/images/linkGreen.svg" alt="link Green" class="linkGreen me-1" width="auto" height="auto">

                                            <span class="proDtls"><?php echo $key->name;?></span>

                                            <img src="<?php echo base_url();?>assets/images/nameCrownIcon.svg" alt="Crown Icon" class="profileico" width="auto" height="auto">

                                        </div>

                                        <ul class="proDtlList">

                                            <?php if(!empty($key->happynikah_id)) { ?><li><?php echo $key->happynikah_id;?></li><?php }?>

                                           <li><?php if(!empty($key->dob)) {echo date_diff(date_create($key->dob), date_create('today'))->y; } else echo $key->age;?> Yrs, <?php if(!empty($key->height)) { echo $key->height; }?></li>

                                            <?php if(!empty($key->marital_status)) { ?><li><?php echo $key->marital_status;?></li><?php }?>

                                            <?php if(!empty($key->education)) { ?><li><?php echo $key->education;?></li><?php }?>

                                            <?php if(!empty($key->profession_name)) { ?><li><?php echo $key->profession_name;?></li><?php }?>

                                            <?php if(!empty($key->user_caste)) { ?><li><?php echo $key->user_caste;?></li><?php }?>

                                            <?php if(!empty($key->district)) { ?><li><?php echo $key->district;?></li><?php }?>

                                            <?php if(!empty($key->userstate)) { ?><li><?php echo $key->userstate;?></li><?php }?>

                                        </ul>

                                    </div>

                                     <?php $checkalreadysend = $this->General_Model->checkinterestsend($key->id);  ?>



                                    <ul class="d-flex justify-content-between profOptnsList">

                                    <li id="express_<?php echo $key->id;?>"<?php if(!empty($checkalreadysend['interest_id'])){ ?>style="display:none;"<?php }?>>



<a href="javascript:void(0)" class="d-flex align-items-center



<span  id="express_<?php echo $key->id;?>" onclick="expressinterest('<?php echo $key->id; ?>')"><img src="<?php echo base_url();?>assets/images/Intrest.svg" class="icon">Interest</span></a>

</li>

<li id="express_done_<?php echo $key->id;?>" <?php if(empty($checkalreadysend['interest_id'])){ ?>style="display:none;"<?php }?>>



<a href="javascript:void(0)" class="d-flex align-items-center">



<span   onclick="expressinterest('<?php echo $key->id; ?>')"><img src="<?php echo base_url();?>assets/images/checkedG.png" class="icon">Interested</span></a>

</li>

                                        <li>

                                        <li>

                                            <a href="<?php echo base_url('userchat/'.$key->id);?>" class="d-flex align-items-center">

                                                <img src="<?php echo base_url();?>assets/images/Chat1.svg" class="icon">

                                                <span>Chat</span>

                                            </a>

                                        </li>

                                        <?php $checkalreadysend = $this->General_Model->checkignoresend($key->id);  ?>

<li id="ignore_<?php echo $key->id;?>"<?php if(!empty($checkalreadysend['id'])){ ?>style="display:none;"<?php }?>>



 <a href="javascript:void(0)" class="d-flex align-items-center">



<span  onclick="ignore_profile('<?php echo $key->id; ?>')"><img src="<?php echo base_url();?>assets/images/Ignore.svg" class="icon">Ignore</span></a>

</li>

<li id="ignore_done_<?php echo $key->id;?>" <?php if(empty($checkalreadysend['id'])){ ?>style="display:none;"<?php }?>>



 <a href="javascript:void(0)" class="d-flex align-items-center">



<span   onclick="ignore_profile('<?php echo $key->id; ?>')"><img src="<?php echo base_url();?>assets/images/Ignore.svg" class="icon">Ignored</span></a>

</li>

                                    </ul>

                                </div>

                            </div>

                        <?php } ?>    

                        </div>

                        <div class="d-lg-flex justify-content-end">

                            <div class="paginationPBox d-lg-flex align-items-center mb-5">

                                <nav data-pagination="" class="navPagntn me-3 mb-4 mb-lg-0">

                                 <ul> <li><?php echo $links; ?></li></ul>

                                </nav>

                              

                            </div>

                        </div>

                    </div>

                    <!-- mobile app advrtisment -->

                    <div class="appAdvBox">

                        <div class="row">

                            <div class="col-12 col-xl-6">

                                <h2 class="subHead mb-4">Search Profiles<br><span>Anytime! Anywhere!!</span></h2>

                                <p class="pOne">Finding your perfect match has never been easier with the Happy nikah application</p>

                                <p class="pTwo">Download now and communicate with muslim matches on-the-go!</p>

                                <div class="d-flex mb-5 mb-xl-0">

                                    <a href="javascript:void(0)">

                                        <img src="<?php echo base_url();?>assets/images/appleStore.png" alt="appleStore" class="storeIcon me-3" width="auto" height="auto">

                                    </a>

                                    <a href="javascript:void(0)">

                                        <img src="<?php echo base_url();?>assets/images/playStore.png" alt="playStore" class="storeIcon" width="auto" height="auto">

                                    </a>

                                </div>

                            </div>

                            <div class="col-12 col-xl-6  text-center">

                                <img src="<?php echo base_url();?>assets/images/mobApp.png" class="mobAppIcon">

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    

    <?php include('include/footer.php'); ?>



    





    





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



            // profile slider count



            // var totalCarousel = $(".carousel").length;



            // for(var i = 1; i <= totalCarousel; ++i) {

            //     var carouselSelected = "#carouselProfile" + i;

            //     var totalItems = $(carouselSelected).find(".carousel-item").length;

            //     var currentIndex = $(carouselSelected).find(".carousel-item.active").index() + 1;

            //     $("#num" + i).html('' + currentIndex + '/' + totalItems + '');



            //     changeCount(carouselSelected);

            // }



            // function changeCount(carouselSelected) {

            //     console.log(carouselSelected);

            //     $('#carouselProfile1').bind('slid.bs.carousel', function() {

            //         var currentIndex = $(carouselSelected).find(".carousel-item.active").index() + 1;

            //         $('#num1').html('' + currentIndex + '/' + totalItems + '');

            //     });

            // }

           



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







});}

    </script>


<script type="text/javascript">
    document.addEventListener('contextmenu', function(e) 
    {
    if (e.target.tagName === 'IMG') 
    {
    e.preventDefault();
    }
    });


    // Disable text and image selection
    document.addEventListener('selectstart', function(e) 
    {
    e.preventDefault();
    });

    // Disable image dragging
    document.addEventListener('dragstart', function(e) 
    {
    if (e.target.tagName === 'IMG') {
    e.preventDefault();
    }
    });

</script>


</body>

</html>