<head>
	<meta charset="UTF-8">
    <title>Happy Nikah</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" sizes="32x32" href="favicon.ico">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@300;400;500;600;700;900&family=Poppins:wght@300;400;500;600;700;800;900&family=Roboto:wght@400;@500&display=swap" rel="stylesheet"> 

    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/style.css">
</head>
<body class="user">
    <section id="userHeader">
        <div class="topbar">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-6 mb-4 mb-sm-0 d-none d-lg-flex align-items-center justify-content-center justify-content-sm-start">
                        <a class="" href="home.html">
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
                                <a href="javascript:void(0)">
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
                            <a class="nav-link" href="help-support.html">Help</a>
                        </li>
                    </ul>
                    <ul class="d-flex notMenu align-items-center mb-3 mb-lg-0 ms-auto">
                        <li>
                            <a href="chat.html" class="chatBox">
                                <img src="<?php echo base_url() ?>/assets/images/comment.png" alt="chat" width="auto" height="auto">
                                <span>
                                    <label>5</label>
                                </span>
                            </a>
                        </li>
                        <li>
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" id="notifctnDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="<?php echo base_url() ?>/assets/images/notification.png" alt="notification" width="auto" height="auto" class="notificationIcon">
                                    <span class="notificationCount">
                                        <label>4</label>
                                    </span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="notifctnDropdown">
                                    <li class="d-flex justify-content-between notfctnItems">
                                        <span class="me-3">Lorem ipsum dolor </span>
                                        <span class="d-flex justify-content-between">
                                            <a href="javascript:void(0);"><img src="<?php echo base_url() ?>/assets/images/cancel.png" alt="cancel" class="me-2"></a>
                                            <a href="javascript:void(0);"><img src="<?php echo base_url() ?>/assets/images/checked.png" alt="checked"></a>
                                        </span>
                                    </li>
                                    <li class="d-flex justify-content-between notfctnItems">
                                        <span class="me-3">Lorem ipsum dolor </span>
                                        <span class="d-flex justify-content-between">
                                            <a href="javascript:void(0);"><img src="<?php echo base_url() ?>/assets/images/cancel.png" alt="cancel" class="me-2"></a>
                                            <a href="javascript:void(0);"><img src="<?php echo base_url() ?>/assets/images/checked.png" alt="checked"></a>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" id="myAccountDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="<?php echo base_url() ?>/assets/images/user.png" class="userIcon" alt="user">
                                    My Account
                                </button>
                                <ul class="dropdown-menu  dropdown-menu-lg-end" aria-labelledby="myAccountDropdown">
                                    <li class="accntDropList">
                                        <a class="dropdown-item" href="editProfile.html">
                                            <div class="d-flex">
                                                <div class="profImgBox">
                                                    <img src="<?php echo base_url() ?>/assets/images/profDummy.png">
                                                </div>
                                                <div class="nameTitle">
                                                    <p>Ayisha Nilopher</p>
                                                    <span>
                                                        <img src="<?php echo base_url() ?>/assets/images/verify.png">
                                                        Verified
                                                    </span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="accntDropList">
                                        <a class="dropdown-item" href="editProfile.html">
                                            <img src="<?php echo base_url() ?>/assets/images/userEdit.png">
                                            Edit Profile
                                        </a>
                                    </li>
                                    <li class="accntDropList">
                                        <a class="dropdown-item" href="changePassword.html">
                                            <img src="<?php echo base_url() ?>/assets/images/padlock.png">
                                            Change Password
                                        </a>
                                    </li>
                                    <li class="accntDropList">
                                        <a class="dropdown-item" href="index.html">
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