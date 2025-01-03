    <!DOCTYPE html>
    <html>
    <?php include('include/user_header.php'); ?>
    
    
    <section id="userContent" class="py-4">
    <div class="container">
    <?php if($chatstatus==2)
    {
    ?>
    <div class="row">
    <div class="col-12 col-md-5 col-lg-3 mb-4 mb-lg-0">
    <div class="chatList">
    <div class="chtrDtlsBox d-flex justify-content-between mb-0">
    <div class="d-flex align-items-center">
    <div class="profImgBoxParent">
    <div class="profImgBox">
    <?php if(empty($this->session->userdata('photo'))){ 
    if($this->session->userdata('gender')== 1){ ?>
    <img src="<?php echo base_url('/assets/photo_storage/male.jpg'); ?>" alt="profile image">
    <?php }
    else if($this->session->userdata('gender')== 2){ ?>
    <img src="<?php echo base_url('/assets/photo_storage/female.jpg'); ?>" alt="profile image" >
    <?php }
    } 
    else{ ?>
    
    <img src="<?php echo base_url('assets/photo_storage/');?><?php echo $this->session->userdata('photo'); ?>" >
    
    <?php
    }?>                                    </div>
    <span class="statusIndictn"></span>
    </div>
    
    <div class="nameTitle">
    <p><?php echo $this->session->userdata('name'); ?></p>
    <span>
    <img src="<?php echo base_url() ?>assets/images/verify.png">
    Verified
    </span>
    <!--- <select class="form-select statusSlct" aria-label="available status">
    <option selected>Online</option>
    <option value="1">Offline</option>
    <option value="2">Away</option>
    </select>-->
    </div>
    </div>
    <a href="javascript:void(0)"><img src="<?php echo base_url() ?>assets/images/setting.png"></a>
    </div>
    <div class="chatType">
    <div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="chatType" data-bs-toggle="dropdown" aria-expanded="false">
    Active Chats
    </button>
    <!-- <ul class="dropdown-menu" aria-labelledby="chatType">
    <li><a class="dropdown-item" href="#">Action</a></li>
    <li><a class="dropdown-item" href="#">Another action</a></li>
    <li><a class="dropdown-item" href="#">Something else here</a></li>
    </ul>-->
    </div>
    </div>
    <form class="customForm">
    <div class="input-group">
    <input type="text" class="form-control border-end-0" placeholder="Search people" aria-label="Recipient's username" aria-describedby="search" id="usersearch">
    <button class="btn btn-outline-secondary border-start-0" type="button"><img src="<?php echo base_url() ?>assets/images/searchG.png"></button>
    </div>
    </form>
    <div class="peopleList chtrDtlsBox scrollBox" id="ulist">
    <?php echo $userlist;?>
    </div>
    </div>
    </div>
    <div class="col-12 col-md-7 col-lg-5 mb-4 mb-lg-0">
    <!--                      <div class="chtrDtlsBox d-flex align-items-center justify-content-between" id="chatuser_profile1">
    <div class="d-flex align-items-center">
    <div class="profImgBox">
    <?php    
    if($photo==""){ 
    if($gender== 1){ 
    ?>
    <img src="<?php echo base_url();?>/assets/photo_storage/maleweb.png" alt="profile image" >
    <?php                        
    }
    else if($gender== 2){ 
    ?>
    <img src="<?php echo base_url();?>/assets/photo_storage/femaleweb.png" alt="profile image">
    
    <?php      }
    }
    else
    {
    $photo_status = $this->General_Model->check_photoStatus($photo);//check if approved or not
    if(isset($photo_status->status) && $photo_status->status != 0 && $photo_status->status != 1){//if approved
    $sender_id = $this->session->userdata('user_id');
    $receiver_id = $id;
    $photo_privacy = $this->General_Model->photoprivacy($sender_id,$receiver_id);//check if protected
    if($photo_privacy !=1)
    {// if public
    $file_pointer = 'assets/photo_storage_thumb/'.$photo;
    if(file_exists($file_pointer)){
    ?>
    <img src="<?php echo base_url();?>/assets/photo_storage_thumb/'.$photo.'" >
    <?php } else{
    $file_pointer = 'assets/photo_storage/'.$photo;
    if(file_exists($file_pointer)){
    ?>
    <img src="<?php echo base_url();?>/assets/photo_storage/'.$photo.'" >
    
    <?php      }else{
    if($gender== 1){ ?>
    <img src="<?php echo base_url();?>/assets/photo_storage/maleweb.png" alt="profile image">
    <?php
    }
    else{ ?>
    <img src="<?php echo base_url();?>/assets/photo_storage/femaleweb.png" alt="profile image">
    <?php       }
    
    
    }//end file exists
    
    }
    }
    else
    {//private
    $sender_id = $this->session->userdata('user_id');
    $receiver_id = $id;
    $photo_requeststatus = $this->General_Model->check_photo_requested($sender_id,$receiver_id);//check if protected
    if($photo_requeststatus==0)//not requested for photo
    {
    $file_pointer = 'assets/photo_storage_blur/'.$photo;
    if(file_exists($file_pointer)){
    
    ?>
    <img src="<?php echo base_url();?>/assets/photo_storage_blur/'.$photo.'" >
    <div class="lockOverlay">
    <img src="<?php echo base_url();?>/assets/images/lockProfile.svg">
    </div>
    <?php  
    }
    else{//file missing
    if($gender== 1){
    
    ?>
    <img src="<?php echo base_url();?>/assets/photo_storage/maleweb.png" alt="profile image">
    <div class="overlay"></div>
    <div class="lockOverlay">
    <img src="<?php echo base_url();?>/assets/images/lockProfile.svg">
    </div>
    <?php  
    }
    else if($gender== 2){ 
    
    ?>
    <img src="<?php echo base_url();?>/assets/photo_storage/femaleweb.png" alt="profile image" class="proImg">
    <div class="overlay"></div>
    <div class="lockOverlay">
    <img src="<?php echo base_url();?>/assets/images/lockProfile.svg">
    </div>
    <?php  
    }
    }
    }
    else//requested for photo
    {
    $photo_requeststatus = $this->General_Model->photo_requeststatus($sender_id,$receiver_id);//check for status of the request
    if($photo_requeststatus==1)
    {
    $file_pointer = 'assets/photo_storage_thumb/'.$photo;
    if(file_exists($file_pointer)){
    ?>
    <img src="<?php echo base_url();?>/assets/photo_storage_thumb/'.$photo.'" alt="profile image">
    <?php  
    } else{
    ?>
    <img src="<?php echo base_url();?>/assets/photo_storage/'.$photo.'" alt="profile image">
    
    <?php     }              ?><div class="overlay"></div>
    
    
    <?php   }
    else{
    $file_pointer = 'assets/photo_storage_blur/'.$photo;
    if(file_exists($file_pointer)){
    
    ?>
    <img src="<?php echo base_url();?>/assets/photo_storage_blur/'.$photo.'" alt="profile image" class="proImg">
    <div class="overlay"></div>
    <div class="lockOverlay">
    <img src="<?php echo base_url();?>assets/images/lockProfile.svg">
    </div>
    <?php  
    }
    else{
    if($gender== 1){ 
    ?>
    <img src="<?php echo base_url();?>/assets/photo_storage/maleweb.png" alt="profile image" class="proImg">
    <div class="overlay"></div> <div class="lockOverlay">
    <img src="<?php echo base_url();?>assets/images/lockProfile.svg">
    </div>
    <?php  }
    else if($gender== 2){ 
    
    ?>
    <img src="<?php echo base_url();?>/assets/photo_storage/femaleweb.png" alt="profile image" class="proImg">
    <div class="overlay"></div>  <div class="lockOverlay">
    <img src="<?php echo base_url();?>assets/images/lockProfile.svg">
    </div>
    <?php  
    }
    }
    }
    }//end of requested for photo
    }//end of private
    
    }//end of approved
    
    
    else { //not approved 
    
    if($gender== 1){ 
    
    ?>
    <img src="<?php echo base_url();?>/assets/photo_storage/maleweb.png"alt="profile image" class="proImg" style="height:100%;">
    <div class="overlay"></div>
    <?php  
    }
    else if($gender== 2){ 
    ?>
    <img src="<?php echo base_url();?>/assets/photo_storage/femaleweb.png" alt="profile image" class="proImg" style="height:100%;">
    <div class="overlay"></div>
    <?php  
    }
    
    }//end of not approved
    }//not empty
    ?>
    </div>
    <div class="nameTitle">
    <p><?php echo $name;?></p>
    
    </div>
    </div>
    </div>
    -->                    <div class="mainChatBox" id="userchatbox">
    <div class="chatSection scrollBox" id="chatsection">
    <?php 
    if(isset($last_chatlist))
    {
    foreach($last_chatlist->result() as $vals)
    {
    ?>
    <div class="d-flex mb-3">
    <?php //if($user!=$vals->id){?>
    <!--- <div class="flex-shrink-0 profImgBox">
    <img src="<?php echo base_url() ?>assets/images/profDummy.png">
    </div>-->
    <?php //}?>
    <div class="flex-grow-1 <?php if($user==$vals->id){?>me-3 d-flex flex-column align-items-end<?php }else{?>ms-3<?php }?>">
    <ul class="chatlist <?php if($user==$vals->id){?>chatlistSender<?php }?>">
    <li><?php echo $vals->messages;?></li>
    <!---  <li>I’m fine, thank you! And what about you? Is everything ok?</li>-->
    </ul>
    <span class="chatTime"><?php echo $vals->time;?></span>
    </div>
    <?php //if($user==$vals->id){?>
    <!---<div class="flex-shrink-0 profImgBox">
    <img src="<?php //echo base_url() ?>assets/images/profDummy.png">
    </div>-->
    <?php //}?>
    </div>
    <?php }}?> 
    </div>
    
    
    <div class="urText d-flex align-items-center">
    <div class="input-group customForm">
    <input type="text" class="form-control" name="usermessage" id="usermessage" placeholder="Enter your message here" aria-label="chat text box">
    <input type="hidden" class="form-control" name="uid" id="uid" value=<?php echo $id;?>>
    <!--- <button class="btn" type="button">
    <img src="<?php echo base_url() ?>assets/images/smile.png">
    </button>
    <button class="btn" type="button">
    <img src="<?php echo base_url() ?>assets/images/paper-clip.png">
    </button>-->
    <button class="btn sendBtn" type="button" onclick="send_usermessage()">
    <img src="<?php echo base_url() ?>assets/images/send.png">
    </button>
    </div>
    </div>
    
    </div>
    </div>
    
    <div class="col-12 col-lg-4">
    <p class="sndrDetailsHead">Chat details</p>
    <div class="chtrDtlsBox d-flex align-items-center justify-content-between" id="chatuser_profile">
    <div class="d-flex align-items-center">
    <div class="profImgBox">
    <?php    
    if($photo==""){ 
    if($gender== 1){ 
    ?>
    <img src="<?php echo base_url();?>/assets/photo_storage/maleweb.png" alt="profile image" >
    <?php                        
    }
    else if($gender== 2){ 
    ?>
    <img src="<?php echo base_url();?>/assets/photo_storage/femaleweb.png" alt="profile image">
    
    <?php      }
    }
    else
    {
    $photo_status = $this->General_Model->check_photoStatus($photo);//check if approved or not
    if(isset($photo_status->status) && $photo_status->status != 0 && $photo_status->status != 1){//if approved
    $sender_id = $this->session->userdata('user_id');
    $receiver_id = $id;
    $photo_privacy = $this->General_Model->photoprivacy($sender_id,$receiver_id);//check if protected
    if($photo_privacy !=1)
    {// if public
    $file_pointer = 'assets/photo_storage_thumb/'.$photo;
    if(file_exists($file_pointer)){
    ?>
    <img src="'.base_url().'/assets/photo_storage_thumb/'.$photo.'" alt="profile image" class="proImg" style="height:100%;">
    <?php } else{
    $file_pointer = 'assets/photo_storage/'.$photo;
    if(file_exists($file_pointer)){
    ?>
    <img src="<?php echo base_url('assets/photo_storage/');?><?php echo $photo;?>" alt="profile image" class="proImgd" style="height:100%;">
    
    <?php      }else{
    if($gender== 1){ ?>
    <img src="'.base_url().'/assets/photo_storage/maleweb.png" alt="profile image">
    <?php
    }
    else{ ?>
    <img src="'.base_url().'/assets/photo_storage/femaleweb.png" alt="profile image">
    <?php       }
    
    
    }//end file exists
    
    }
    }
    else
    {//private
    $sender_id = $this->session->userdata('user_id');
    $receiver_id = $id;
    $photo_requeststatus = $this->General_Model->check_photo_requested($sender_id,$receiver_id);//check if protected
    if($photo_requeststatus==0)//not requested for photo
    {
    $file_pointer = 'assets/photo_storage_blur/'.$photo;
    if(file_exists($file_pointer)){
    
    ?>
    <img src="'.base_url().'/assets/photo_storage_blur/'.$photo.'" alt="profile image" class="proImg" style="height:100%;">
    <div class="lockOverlay">
    <img src="'.base_url().'assets/images/lockProfile.svg">
    </div>
    <?php  
    }
    else{//file missing
    if($gender== 1){
    
    ?>
    <img src="'.base_url().'/assets/photo_storage/maleweb.png" alt="profile image">
    <div class="overlay"></div>
    <div class="lockOverlay">
    <img src="'.base_url().'assets/images/lockProfile.svg">
    </div>
    <?php  
    }
    else if($gender== 2){ 
    
    ?>
    <img src="'.base_url().'/assets/photo_storage/femaleweb.png" alt="profile image" class="proImg">
    <div class="overlay"></div>
    <div class="lockOverlay">
    <img src="'.base_url().'assets/images/lockProfile.svg">
    </div>
    <?php  
    }
    }
    }
    else//requested for photo
    {
    $photo_requeststatus = $this->General_Model->photo_requeststatus($sender_id,$receiver_id);//check for status of the request
    if($photo_requeststatus==1)
    {
    $file_pointer = 'assets/photo_storage_thumb/'.$photo;
    if(file_exists($file_pointer)){
    ?>
    <img src="'.base_url().'/assets/photo_storage_thumb/'.$photo.'" alt="profile image">
    <?php  
    } else{
    ?>
    <img src="<?php echo base_url('assets/photo_storage/');?><?php echo $photo;?>" alt="profile image">
    
    <?php     }              ?><div class="overlay"></div>
    
    
    <?php   }
    else{
    $file_pointer = 'assets/photo_storage_blur/'.$photo;
    if(file_exists($file_pointer)){
    
    ?>
    <img src="'.base_url().'/assets/photo_storage_blur/'.$photo.'" alt="profile image" class="proImg">
    <div class="overlay"></div>
    <div class="lockOverlay">
    <img src="<?php echo base_url();?>assets/images/lockProfile.svg">
    </div>
    <?php  
    }
    else{
    if($gender== 1){ 
    ?>
    <img src="'.base_url().'/assets/photo_storage/maleweb.png" alt="profile image" class="proImg">
    <div class="overlay"></div> <div class="lockOverlay">
    <img src="<?php echo base_url();?>assets/images/lockProfile.svg">
    </div>
    <?php  }
    else if($gender== 2){ 
    
    ?>
    <img src="'.base_url().'/assets/photo_storage/femaleweb.png" alt="profile image" class="proImg">
    <div class="overlay"></div>  <div class="lockOverlay">
    <img src="<?php echo base_url();?>assets/images/lockProfile.svg">
    </div>
    <?php  
    }
    }
    }
    }//end of requested for photo
    }//end of private
    
    }//end of approved
    
    
    else { //not approved 
    
    if($gender== 1){ 
    
    ?>
    <img src="'.base_url().'/assets/photo_storage/maleweb.png"alt="profile image" class="proImg" style="height:100%;">
    <div class="overlay"></div>
    <?php  
    }
    else if($gender== 2){ 
    ?>
    <img src="'.base_url().'/assets/photo_storage/femaleweb.png" alt="profile image" class="proImg" style="height:100%;">
    <div class="overlay"></div>
    <?php  
    }
    
    }//end of not approved
    }//not empty
    ?>
    </div>
    <div class="nameTitle">
    <p><?php echo $name;?></p>
    <p class="dsgntn"><?php echo $job;?></p>
    <span>
    <img src="<?php echo base_url() ?>assets/images/verify.png">
    Verified
    </span>
    </div>
    </div>
    <a href="<?php echo site_url('singleprofile/'.$id); ?>">View Profile</a>
    </div>
    <div class="likeDislikeBox mb-0" id="likesdislikes">
    <?php if($page!=""){?>
    
    <div class="headBox">
    <div class="row">
    <div class="col-12 col-sm-7 d-flex align-items-center mb-3 mb-sm-0">
    <div class="w-100">
    <div class="youHim">
    <img src="<?php echo base_url() ?>assets/images/people.png">
    You &amp; Him
    </div>
    <h3>Likes &amp; Dislikes</h3>
    <?php
    $match = 0;
    if($uage>=$page && $uage<=$page){
    $match++;
    }
    if($uheight>=$pheight && $uheight<=$pheight){
    $match++;
    }
    if($uquali == $pquali){
    $match++;
    }
    //    if($ufamily == $pfamily){
    //      $match++;
    //  }
    
    ?>
    <p>Your profile matches with <span><?php echo $match; ?> / 4</span>  of <?= !empty($name)? $name : '' ?>'s preferences!</p>
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
    <div class="px-3 pt-3 scrollBox">
    
    <div class="row mb-2">
    <div class="col-5 d-flex align-items-center">
    <p class="dtls">Age</p>
    </div>
    <div class="col-5 d-flex align-items-center">
    <p class="dtls"><?php echo $page; ?> -  <?php echo $pageto; ?> Yrs</p>
    </div>
    <div class="col-2 d-flex align-items-center justify-content-end">
    <?php if($uage>=$page && $uage<=$pageto){ ?>
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
    <p class="dtls"><?php echo $pheight; ?> -  <?php echo $pheight_to; ?></p>
    </div>
    <div class="col-2 d-flex align-items-center justify-content-end">
    <?php if($uheight>=$pheight && $uheight<=$pheight_to){ ?>
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
    <p class="dtls"><?php echo $pquali; ?></p>
    </div>
    <div class="col-2 d-flex align-items-center justify-content-end">
    <?php if($uquali == $pquali){ ?>
    <img src="<?php echo base_url() ?>assets/images/checkedG.png" class="chk">
    <?php } 
    else{ ?>
    <img src="<?php echo base_url() ?>assets/images/blocked.png" class="chk" >
    <?php } ?>                                </div>
    </div>
    <!--  <div class="row mb-2">
    <div class="col-5 d-flex align-items-center">
    <p class="dtls">Family Status</p>
    </div>
    <div class="col-5 d-flex align-items-center">
    <p class="dtls"><?php //echo $pfamily; ?></p>
    </div>
    <div class="col-2 d-flex align-items-center justify-content-end">
    <?php //if($pfamily == $ufamily){ ?>
    <img src="<?php //echo base_url() ?>assets/images/checkedG.png" class="chk">
    <?php //} 
    // else{ ?>
    <img src="<?php //echo base_url() ?>assets/images/blocked.png" class="chk" >
    <?php //} ?>                               
    </div>
    </div>
    -->
    </div>  <?php }?>
    </div>
    
    </div>
    
    </div>
    <?php }
    elseif($chatstatus==0){?>
    <div class="row">
    <div class="col-12 col-md-5 col-lg-3 mb-4 mb-lg-0">
    </div>   
    <div class="col-12 col-md-7 col-lg-5 mb-4 mb-lg-0">
    <a href="<?php echo base_url();?>user/upgradeto_premium" > <p style="text-align:center">To avail the chat facility you must be a premium member. For Support, Please Reach our customer care.<br>Customer care : +918593999888</p><br><button class="btn addrSubBtn col-md-12" style="background-color:green;">Upgrade to Premium</button></a>
    </div>
    <div class="col-12 col-lg-4"></div></div>
    <?php
    } elseif($chatstatus==1){?>
    <div class="row">
    <div class="col-12 col-md-5 col-lg-3 mb-4 mb-lg-0">
    </div>   
    <div class="col-12 col-md-7 col-lg-5 mb-4 mb-lg-0">
    <a href="<?php echo base_url();?>user/upgradeto_premium" > <p style="text-align:center">You have reached your limit.For Support, Please Reach our customer care.<br>Customer care : +918593999888</p><br><button class="btn addrSubBtn col-md-12" style="background-color:green;">Upgrade to Premium</button></a>
    </div>
    <div class="col-12 col-lg-4"></div></div>
    <?php
    }?>
    </div>
    </section>
    
    
    <?php include('include/footer.php'); ?>
    <script src="https://www.gstatic.com/firebasejs/8.8.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.20.0/firebase-messaging.js"></script>
    
    <script type="text/javascript">
    $(document).ready(function () {
    var messageBody = document.querySelector('#chatsection');
    messageBody.scrollTop = messageBody.scrollHeight - messageBody.clientHeight;
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
    function get_userchatdata(userid)
    {
    $.ajax({
    url: "<?php echo site_url('user/get_userchatdata_div'); ?>",
    type: "post",
    data: { userid:userid,},
    success: function (response) {
    
    const datas=response.split("###");
    $("#userchatbox").html(datas[0]);
    
    $("#chatuser_profile").html(datas[1]);
    $("#likesdislikes").html(datas[2]);
    //   $("#chatuser_profile1").html(datas[3]);
    
    var messageBody = document.querySelector('#chatsection');
    messageBody.scrollTop = messageBody.scrollHeight - messageBody.clientHeight;
    }
    });
    
    }
    function send_usermessage()
    {
    var usermessage=$("#usermessage").val();
    var uid=$("#uid").val();
    $.ajax({
    url: "<?php echo site_url('user/add_usermessage'); ?>",
    type: "post",
    data: { usermessage:usermessage,uid:uid,},
    success: function (response) {
    // alert(response);
    $("#chatsection").append(response);
    $("#usermessage").val("");
    var messageBody = document.querySelector('#chatsection');
    messageBody.scrollTop = messageBody.scrollHeight - messageBody.clientHeight;
    
    }
    });
    }
    var config = {
    
    apiKey: "AIzaSyBYEHcvLRpAvLSfDpFwmwc1PDHVILlbN1Y",
    
    authDomain: "happy-nikah-18138.firebaseapp.com",
    
    projectId: "happy-nikah-18138",
    
    storageBucket: "happy-nikah-18138.appspot.com",
    
    messagingSenderId: "599897650989",
    
    appId: "1:599897650989:web:810928920232e8185605a4",
    
    measurementId: "G-VDDTM8J4QH"
    
    };
    firebase.initializeApp(config);
    
    const messaging = firebase.messaging();
    
    messaging.requestPermission()
    .then(function() {
    console.log('Notification permission granted.');
    return messaging.getToken();
    })
    .then(function(token) {
    console.log(token); // Display user token
    })
    .catch(function(err) { // Happen if user deney permission
    console.log('Unable to get permission to notify.', err);
    });
    
    messaging.onMessage(function(payload){
    console.log('onMessage',payload);
    var uid=payload['data']['gcm.notification.user_id'];
    var senderid=payload['data']['gcm.notification.sender_id'];
    var noti_type=payload['data']['gcm.notification.noti_type1'];
    
    var message=payload['notification']['body'];
    // alert(noti_type);
    
    if(noti_type=="chat")
    {
    // alert(noti_type);
    $.ajax({
    url: "<?php echo site_url('user/get_userlist'); ?>",
    type: "post",
    data: { uid:uid,},
    success: function (response) {
    //   alert(response);
    $("#ulist").html(response);
    
    
    }
    });
    $.ajax({
    url: "<?php echo site_url('user/get_total_usermessages'); ?>",
    type: "post",
    data: { uid:uid,},
    success: function (response) {
    // alert(response);
    if(response!=0)
    $("#uchat_count").html('<span ><label id="uchat_count">'+response+'</label></span>');
    
    
    }
    });
    $.ajax({
    url: "<?php echo site_url('user/get_usermessage'); ?>",
    type: "post",
    data: { uid:uid,sender_id:senderid,message:message,},
    success: function (response) {
    // alert(response);
    
    $("#chatsection").append(response);
    var messageBody = document.querySelector('#chatsection');
    messageBody.scrollTop = messageBody.scrollHeight - messageBody.clientHeight;
    
    }
    });
    }
    else if(noti_type=="notification")
    {
    $.ajax({
    url: "<?php echo site_url('user/get_total_usernotifications'); ?>",
    type: "post",
    data: { uid:uid,},
    success: function (response) {
    //   alert(response);
    if(response!=0)
    $("#noti_count").html('<span ><label id="uchat_count">'+response+'</label></span>');
    }
    }); 
    $.ajax({
    url: "<?php echo site_url('user/get_latestnotifications'); ?>",
    type: "post",
    data: { uid:uid,},
    success: function (response) {
    //   alert(response);
    $("#noti_list").html(response);
    }
    });
    }
    
    
    });
    $("#usersearch").keyup(function () {
    var that = this,
    value = $(this).val();
    // alert(value);
    $.ajax({
    url: "<?php echo site_url('user/ajax_chatuserlist'); ?>",
    type: "post",
    data: { username:value,},
    success: function (response) {
    //  alert(response);
    $("#ulist").html(response);
    
    //  if(response!=0)
    //  $("#noti_count").html('<span ><label id="uchat_count">'+response+'</label></span>');
    }
    }); 
    });
    </script>
    
    </body>
    </html>