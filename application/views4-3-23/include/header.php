<head>
	<meta charset="UTF-8">
    <title>Happy Nikah</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url()?>assets/images/hnicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@300;400;500;600;700;900&family=Poppins:wght@300;400;500;600;700;800;900&family=Roboto:wght@400;@500&display=swap" rel="stylesheet"> 

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css?v=<?= rand(1,1000);?>">  
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-X44BV75LEC"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-X44BV75LEC');
</script>
<!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '435890978249652');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=435890978249652&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->
    
</head>

<style type="text/css">
    .pagination strong{
    width: auto;
    margin: 7px;
    border: 1px solid #c7afaf;
    padding: 2px 7px;
    border-radius: 3px;
    background: #ff5b85;
    color: white;
    }
    .pagination a{
    width: auto;
    margin: 7px;
    border: 1px solid #323148;
    padding: 2px 7px;
    border-radius: 3px;
    color: #323148;
    }
</style>
<body class="user">
    <section id="userHeader">
        <div class="topbar">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-6 mb-4 mb-sm-0 d-none d-lg-flex align-items-center justify-content-center justify-content-sm-start">
                        <a class="" href="<?php echo site_url('user/home'); ?>">
                            <img src="<?php echo base_url() ?>assets/images/HappyNikah.png" alt="Happy Nikah" width="auto" height="auto" class="gotoNikahlogo">
                        </a>
                    </div>
                    <div class="col-12 col-lg-6 d-flex justify-content-end align-items-center">
                        <ul class="dwnIcon d-flex">
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="<?php echo base_url() ?>assets/images/appleStore.png" alt="appleStore" class="storeIcon me-3" width="auto" height="auto">
                                </a>
                            </li>
                            <li>
                                <a target="_blank" href="https://play.google.com/store/apps/details?id=com.sysol.happy_nikah">
                                    <img src="<?php echo base_url() ?>assets/images/playStore.png" alt="playStore" class="storeIcon" width="auto" height="auto">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand d-lg-none" href="<?php echo site_url(); ?>"><img src="<?php echo base_url() ?>assets/images/HappyNikkahwhite.png" alt="Happy Nikah" width="auto" height="auto" class="gotoNikahlogo"></a>
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
                            <a class="nav-link active" aria-current="page" href="<?php echo site_url('user/home'); ?>"><i class="fa fa-home menu-icons" style="font-size: 20px;"></i>Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('user/featured_profiles'); ?>"><i class="fa fa-star-o menu-icons" style="font-size:20px"></i>Featured Profiles</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('user/upgradeto_premium'); ?>"><i class="fa fa-diamond menu-icons" style="font-size:16px"></i>Upgrade To Premium</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="help.html">Help</a>
                        </li> -->
                    </ul>
                    <ul class="d-flex notMenu align-items-center mb-3 mb-lg-0 ms-auto">
                        <!-- <li>
                            <a href="chat.html" class="chatBox">
                                <img src="<?php echo base_url() ?>assets/images/comment.png" alt="chat" width="auto" height="auto">
                                <span>
                                    <label>5</label>
                                </span>
                            </a>
                        </li>
                        <li>
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" id="notifctnDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="<?php echo base_url() ?>assets/images/notification.png" alt="notification" width="auto" height="auto" class="notificationIcon">
                                    <span class="notificationCount">
                                        <label>4</label>
                                    </span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="notifctnDropdown">
                                    <li class="d-flex justify-content-between notfctnItems">
                                        <span class="me-3">Lorem ipsum dolor </span>
                                        <span class="d-flex justify-content-between">
                                            <a href="javascript:void(0);"><img src="<?php echo base_url() ?>assets/images/cancel.png" alt="cancel" class="me-2"></a>
                                            <a href="javascript:void(0);"><img src="images/checked.png" alt="checked"></a>
                                        </span>
                                    </li>
                                    <li class="d-flex justify-content-between notfctnItems">
                                        <span class="me-3">Lorem ipsum dolor </span>
                                        <span class="d-flex justify-content-between">
                                            <a href="javascript:void(0);"><img src="<?php echo base_url() ?>assets/images/cancel.png" alt="cancel" class="me-2"></a>
                                            <a href="javascript:void(0);"><img src="<?php echo base_url() ?>assets/images/checked.png" alt="checked"></a>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </li> -->
                        <li>
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" id="myAccountDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 14px;">
                                    <!--<img src="<?php echo base_url() ?>assets/images/user.png" class="userIcon" alt="user">-->
                                    <i class="fa fa-user-o menu-icons" style="font-size:20px"></i>
                                    MY ACCOUNT
                                </button>
                                <ul class="dropdown-menu  dropdown-menu-lg-end" aria-labelledby="myAccountDropdown">
                                    <li class="accntDropList">
                                        <a class="dropdown-item" href="<?php echo site_url('user/profile'); ?>">
                                            <div class="d-flex">
                                                <div class="profImgBox">

                                                    <img src="<?php echo base_url('/assets/photo_storage/'.$this->session->userdata('photo')); ?>">
                                                </div>
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
                                        <a class="dropdown-item" href="<?php echo site_url('user/profile'); ?>">
                                            <img src="<?php echo base_url() ?>assets/images/userEdit.png">
                                            Edit Profile
                                        </a>
                                    </li>
                                    <li class="accntDropList">
                                        <a class="dropdown-item" href="<?php echo site_url('user/change_password'); ?>">
                                            <img src="<?php echo base_url() ?>assets/images/padlock.png">
                                            Change Password
                                        </a>
                                    </li>
                                    <li class="accntDropList">
                                        <a class="dropdown-item" href="<?php echo site_url('user/logout'); ?>">
                                            <img src="<?php echo base_url() ?>assets/images/logout.png">
                                            Logout
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown">
                                <a class="dropdown-item logout-mob" href="<?php echo site_url('user/logout'); ?>">
                                <!-- <img src="<?php echo base_url() ?>assets/images/logout.png"> -->
                                <i class="fa fa-sign-out"></i>
                                Logout
                            </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section> 

    <!-- Modal -->
    <!-- <div class="modal fade" id="proLockModal" tabindex="-1" aria-labelledby="proLockModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body p-5">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <img src="<?php echo base_url() ?>assets/images/myProfile1.png" alt="...">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h3>Request to view Protected Photo</h3>
                            <p>The Photo has been protected by the owner of this profile. Please click on the below button to get photo protected password.</p>
                            <button type="button" class="btn cstmBtnColr">Request Photo</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->




    <style type="text/css">
        
        #userContent .profileBox .profileImgBox{
            overflow: hidden;
        }
    </style>

    <input type="hidden" value="<?php echo base_url(); ?>" id="baseurl">