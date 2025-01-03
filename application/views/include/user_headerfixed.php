<?php $photo_status = $this->General_Model->check_photorequest($this->session->userdata('user_id'));
        $notification_count = $this->General_Model->get_unread_notifications($this->session->userdata('user_id'));
        $chat_count = $this->General_Model->get_unread_receivedmessages($this->session->userdata('user_id'));
        $notifications = $this->General_Model->get_notifications($this->session->userdata('user_id'));

?>
<head>
	<meta charset="UTF-8">
    <title>Happy Nikah</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" sizes="32x32" href="favicon.ico">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@300;400;500;600;700;900&family=Poppins:wght@300;400;500;600;700;800;900&family=Roboto:wght@400;@500&display=swap" rel="stylesheet">
    <script defer src="<?php echo base_url(); ?>assets/plugins/fontawesome/js/all.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/owl.theme.default.min.css">
<!--    <link id="theme-style" type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/portal.css">
-->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/style.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/lightbox.min.css">
</head>
<body class="user">
    <section id="userHeader">
        <div class="topbar">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-6 mb-4 mb-sm-0 d-none d-lg-flex align-items-center justify-content-center justify-content-sm-start">
                        <a class="" href="<?php echo site_url('user'); ?>">
                            <img src="<?php echo base_url() ?>/assets/images/logo.png" alt="Go to Nikah" width="auto" height="auto" class="gotoNikahlogo">
                        </a>
                    </div>
                    <div class="col-12 col-lg-6 d-flex justify-content-end align-items-center">
                        <ul class="dwnIcon d-flex">
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="<?php echo base_url() ?>/assets/images/appleStore.png" alt="appleStore" class="storeIcon me-3" width="auto" height="auto">
                                </a>
                            </li>
                            <li>
                                <a href="https://play.google.com/store/apps/details?id=com.sysol.happy_nikah">
                                    <img src="<?php echo base_url() ?>/assets/images/playStore.png" alt="playStore" class="storeIcon" width="auto" height="auto">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand d-lg-none" href="home.html"><img src="<?php echo base_url() ?>/assets/images/logoW.png" alt="Go to Nikah" width="auto" height="auto" class="gotoNikahlogo"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarGoToNikah" aria-controls="navbarGoToNikah" aria-expanded="false" aria-label="Toggle navigation">
                    <div class="hamburger" id="hamburger-1">
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                    </div>
                </button>
                <div class="collapse navbar-collapse" id="navbarGoToNikah">
                    <ul class="navbar-nav mb-4 mb-lg-0 mt-3 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?php echo site_url('user/home'); ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('user/featured_profiles'); ?>">Featured Profiles</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('user/upgradeto_premium'); ?>">Upgrade To Premium</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('user/help_support'); ?>">Help</a>
                        </li>
                    </ul>
                    <ul class="d-flex notMenu align-items-center mb-3 mb-lg-0 ms-auto">
                         <li>
                           
                            <div class="app-utilities col-auto" style="padding-right: 100px;">
                                <div class="app-utility-item app-notifications-dropdown dropdown">
                                    <a class="dropdown-toggle no-toggle-arrow" id="notifications-dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false" title="Notifications" onclick="change_notificationreadstatus(<?php echo $this->session->userdata('user_id');?>)">
                                        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bell icon" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2z" />
                                            <path fill-rule="evenodd" d="M8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z" />
                                        </svg>
                                        <?php if($notification_count->num_rows()!=0){
                                    ?>
                                        <span class="icon-badge"><?php echo $notification_count->num_rows();?></span>
                                        <?php }?>
                                    </a>
                                    <div class="dropdown-menu p-0" aria-labelledby="notifications-dropdown-toggle">
                                        <div class="dropdown-menu-header p-3">
                                            <h5 class="dropdown-menu-title mb-0">Notifications</h5>
                                        </div>
                                        <!--//dropdown-menu-title-->
                                        <div class="dropdown-menu-content" id="noti_list">
                                  <?php foreach($notifications->result() as $vals){?>

                                            <div class="item p-3">
                                                <div class="row gx-2 justify-content-between align-items-center">
                                                    <div class="col-auto">
<!--                                                        <img class="profile-image" src="<?php echo base_url(); ?>assets/images/profiles/profile-1.png" alt="">
-->                                                        <?php if(empty($vals->photo))//photo empty
{ 
                         if($vals->gender== 1){ ?>
                                                       
                                        <img src="<?php echo base_url('/assets/photo_storage/male.jpeg'); ?>" alt="profile image" class="profile-image" style="height:100%;">
                                                                           
                                                     <?php }
                    else if($vals->gender== 2){ ?>
                                        <img src="<?php echo base_url('/assets/photo_storage/female.jpeg'); ?>" alt="profile image" class="profile-image" style="height:100%;">
                                                                          
                                                     <?php }
} 
else
{//photo not empty 

                                        $photo_status = $this->General_Model->check_photoStatus($vals->photo);//check if approved or not
                                     
                                        if($photo_status->status != 0 && $photo_status->status != 1)
                                        {//if approved
                                        
                                               $sender_id = $this->session->userdata('user_id');
                                               $receiver_id = $vals->rid;
                                               $photo_privacy = $this->General_Model->photoprivacy($sender_id,$receiver_id);//check if protected
                                              
                                               if($photo_privacy !=1)
                                               {// if public
                          ?>
                                     <img src="<?php echo base_url('/assets/photo_storage_thumb/'.$vals->photo); ?>" alt="profile image" class="profile-image" style="height:100%;">
                                
                                                 <?php
                                               }
                                              else
                                               {//private
                                                $sender_id = $this->session->userdata('user_id');
                                                $receiver_id = $vals->rid;
                                                $photo_requeststatus = $this->General_Model->check_photo_requested($sender_id,$receiver_id);//check if protected
                                                    if($photo_requeststatus==0)//not requested for photo
                                                    {
           
                                                            $file_pointer = 'assets/photo_storage_blur/'.$vals->photo;
                                                            if(file_exists($file_pointer)){
                                                                ?>
                        
                                                                     <img src="<?php echo base_url('/assets/photo_storage_blur/'.$vals->photo); ?>" alt="profile image" class="profile-image" style="height:100%;">
                                       
                                                                       <div class="overlay"></div>
                                                                                                    <div class="lockOverlay">
                                                                                                        <img src="<?php echo base_url();?>assets/images/lockProfile.svg">
                                                                                                    </div>
                                         
                                                             <?php }
                                                            else{
                                                            if($vals->gender== 1){ ?>
                                            
                                                                       <img src="<?php echo base_url('/assets/photo_storage/male.jpeg'); ?>" alt="profile image" class="profile-image" style="height:100%;">
                                
                                                                   <?php }
                                                                   else if($vals->gender== 2){ ?>
                                                       <img src="<?php echo base_url('/assets/photo_storage/female.jpeg'); ?>" alt="profile image" class="profile-image" style="height:100%;">
                                                                      
                                                                   <?php }}
           
                                                     }
                                                     else//requested for photo
                                                    {
                                                                $photo_requeststatus = $this->General_Model->photo_requeststatus($sender_id,$receiver_id);//check for status of the request
                                                                if($photo_requeststatus==1)
                                                                {
                                                                    ?>
                                                                   
                                                                             <img src="<?php echo base_url('/assets/photo_storage_thumb/'.$vals->photo); ?>" alt="profile image" class="profile-image" style="height:100%;">
                                                            
                                                                     <?php 
                                                                }
                                                                else{
                                                                    $file_pointer = 'assets/photo_storage_blur/'.$vals->photo;
                                                                    if(file_exists($file_pointer)){?>
                                                                
                                                                <img src="<?php echo base_url('/assets/photo_storage_blur/'.$vals->photo); ?>" alt="profile image" class="profile-image" style="height:100%;">
                                                                <div class="overlay"></div>
                                                                                                                            <div class="lockOverlay">
                                                                                                                                <img src="<?php echo base_url();?>assets/images/lockProfile.svg">
                                                                                                                            </div>
                                                                <?php }
                                                                else{
                                                                if($vals->gender== 1){ ?>
                                                                
                                                                       <img src="<?php echo base_url('/assets/photo_storage/male.jpeg'); ?>" alt="profile image" class="profile-image">
                                                                       <div class="lockOverlay">
                                                                                                                                <img src="<?php echo base_url();?>assets/images/lockProfile.svg">
                                                                                                                            </div>
                                                                   <?php }
                                                                   else if($vals->gender== 2){ ?>
                                                                
                                                                       <img src="<?php echo base_url('/assets/photo_storage/female.jpeg'); ?>" alt="profile image" class="profile-image">
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
                                        
                                              if($vals->gender== 1){ ?>
        
                                                       <img src="<?php echo base_url('/assets/photo_storage/male.jpeg'); ?>" alt="profile image" class="profile-image" style="height:100%;">
                                                       
                                                       <?php }
                                                       else if($vals->gender== 2){ ?>
                                                    
                                                           <img src="<?php echo base_url('/assets/photo_storage/female.jpeg'); ?>" alt="profile image" class="profile-image" style="height:100%;">
                                                           
                                                       <?php }
                                         }//end of not approved
}//end of photo not empty
                                 ?>

                                                    </div>
                                                    <!--//col-->
                                                    <div class="col">
                                                        <div class="info">
                                                            
                                        <div class="desc"> 
                                        <?php echo $vals->name."&nbsp;";?>
                                        <?php if($vals->notification_type=="1")
                                         echo "Expresed Interest on your Profile";
                                         elseif($vals->notification_type=="2")
                                         {
                                            echo "Accepted your Request";
                                         }elseif($vals->notification_type=="3")
                                         {
                                            echo "Rejected your Request";
                                         }elseif($vals->notification_type=="4")
                                         {
                                            echo "requested your photo";
                                         }elseif($vals->notification_type=="5")
                                         {
                                            echo "Accepted Your PhotoRequest";
                                         }elseif($vals->notification_type=="6")
                                         {
                                            echo "rejected your photorequest";
                                         }
                                            $now = time(); // or your date as well
                                            $your_date = strtotime($vals->date);
                                            $datediff = $now - $your_date;
                                            
                                            $days= round($datediff / (60 * 60 * 24));
                                            if($days==0)
                                            {
   // $time_in_12_hour_format  = date("g:i a", strtotime(date('H:i', strtotime($vals->date))));
   // $days=$time_in_12_hour_format;
   $days="Today";
                                            }
                                            elseif($days==1)
                                            {
    $days="Yesterday";
                                            }
    elseif($days<7 && $days>1)
    {
      $days=date('l', strtotime($vals->date));
    }
    else
    {
        $days=abs($days)."days ago."; 
    }
                                        ?> 
                                         </div>
                                                            <div class="meta"><?php echo $days;?></div>
                                                            <div class="meta" style="padding-top: 16px;padding-right:2px;">
                                             <?php if($vals->notification_type==4)
                                            {
                                                $requeststatus = $this->General_Model->requeststatus($vals->sender_id,$vals->receiver_id);
                                                $sts=$requeststatus->row();
                                               
                                                if($sts->status==0)
                                            {
                                                ?>
                                                                <svg style="color: green;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16" onclick="accept_photorequest(<?php echo $vals->sender_id;?>)">
                                                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                                    <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                                                </svg>
                                                                <svg style="color: red;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16" onclick="reject_photorequest(<?php echo $vals->sender_id;?>)">
                                                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                                                </svg>
                                            <?php }else if($sts->status==1){?>
                                                                <svg style="color: red;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                                                </svg>
                                            <?php }}?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--//col-->
                                                </div>
                                                <!--//row-->
<!--                                                <a class="link-mask" href="#"></a>
-->                                            </div>
                                        <?php }?>
                                            <!--//item-->
                                          
                                            <!--//item-->
                                        </div>
                                        <div class="dropdown-menu-footer p-2 text-center">
                                            <a href="#">View all</a>
                                        </div>

                                    </div>
                                </div>
                       
                        </li>
                        <li>
                            <a href="<?php echo site_url('user/user_chat'); ?>" class="chatBox" style="padding-right: 50px;">
                                <img src="<?php echo base_url() ?>/assets/images/comment.png" alt="chat" width="auto" height="auto">
                                <div id="uchat_count"> <?php if($notification_count->num_rows()!=0){
                                    ?><span >
                                    <label id="uchat_count"><?php echo $chat_count->num_rows();?></label>
                                </span>
                                <?php }?>
                                </div>
                            </a>
                        </li>
                       
                        <li>
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" id="myAccountDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="<?php echo base_url() ?>/assets/images/user.png" class="userIcon" alt="user">
                                    My Account
                                </button>
                                <ul class="dropdown-menu  dropdown-menu-lg-end" aria-labelledby="myAccountDropdown">
                                    <li class="accntDropList">
                                        <a class="dropdown-item" href="<?php echo site_url('user/profile') ?>">
                                            <div class="d-flex">
                                                <div class="profImgBox">
                                                <img src="<?php echo base_url('/assets/photo_storage/'.$this->session->userdata('photo')); ?>">                                                </div>
                                                <div class="nameTitle">
                                                <p><?php echo $this->session->userdata('name'); ?></p>
                                                    <?php if($this->session->userdata('status') ==1 || $this->session->userdata('status') ==2 || $this->session->userdata('status')){ ?>
                                                        <span class="verified">
                                                            <img src="<?php echo base_url() ?>assets/images/verify.png">
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
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="accntDropList">
                                        <a class="dropdown-item" href="<?php echo site_url('user/profile') ?>">
                                            <img src="<?php echo base_url() ?>/assets/images/userEdit.png">
                                            Edit Profile
                                        </a>
                                    </li>
                                    <li class="accntDropList">
                                        <a class="dropdown-item" href="<?php echo site_url('user/change_password') ?>">
                                            <img src="<?php echo base_url() ?>/assets/images/padlock.png">
                                            Change Password
                                        </a>
                                    </li>
                                    <li class="accntDropList">
                                        <a class="dropdown-item" href="<?php echo site_url('user/logout') ?>">
                                            <img src="<?php echo base_url() ?>/assets/images/logout.png">
                                            Logout
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>
    <script>
        function change_notificationreadstatus(uid)
        {
            $.ajax({
        url: "<?php echo site_url('user/change_notificationreadstatus'); ?>",
        type: "post",
        data: { uid:uid,},
        success: function (response) {
         //   alert(response);
            $("#noti_count").html('<span class="notificationCount><label id="uchat_count">'+response+'</label></span>');
           

        }
    });
        }
        function reject_photorequest(sender_id)
        {
            $.ajax({
        url: "<?php echo site_url('user/reject_photorequest'); ?>",
        type: "post",
        data: { sender_id:sender_id,},
        success: function (response) {
         //   alert(response);
            $("#request_val").html('<a title="rejected"><img src="<?php echo base_url(); ?>/assets/images/cancel.png" alt="cancel" class="me-2" ></a>');


        }
    });        }
        function accept_photorequest(sender_id)
        {
            $.ajax({
        url: "<?php echo site_url('user/accept_photorequest'); ?>",
        type: "post",
        data: { sender_id:sender_id,},
        success: function (response) {
         //   alert(response);
            $("#request_val").html('<a title="accepted"><img src="<?php echo base_url();?>/assets/images/accept.png"  class="me-2" ></a>');
           
        }
       });        
}
        </script>