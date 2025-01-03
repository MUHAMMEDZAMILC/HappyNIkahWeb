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
    <link id="theme-style" type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/portal.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/style.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/lightbox.min.css">

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
                            <div class="app-utilities col-auto" style="padding-right: 0px;">
                                <div class="app-utility-item app-notifications-dropdown dropdown">
                                    <a class="dropdown-toggle no-toggle-arrow" id="notifications-dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false" title="Notifications">
                                        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bell icon" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2z" />
                                            <path fill-rule="evenodd" d="M8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z" />
                                        </svg>
                                        <span class="icon-badge">3</span>
                                    </a>
                                    <div class="dropdown-menu p-0" aria-labelledby="notifications-dropdown-toggle">
                                        <div class="dropdown-menu-header p-3">
                                            <h5 class="dropdown-menu-title mb-0">Notifications</h5>
                                        </div>
                                        <!--//dropdown-menu-title-->
                                        <div class="dropdown-menu-content">
                                            <div class="item p-3">
                                                <div class="row gx-2 justify-content-between align-items-center">
                                                    <div class="col-auto">
                                                        <img class="profile-image" src="<?php echo base_url(); ?>assets/images/profiles/profile-1.png" alt="">
                                                    </div>
                                                    <!--//col-->
                                                    <div class="col">
                                                        <div class="info">
                                                            <div class="desc">Amy shared a file with you. Lorem ipsum dolor sit amet, consectetur adipiscing elit. </div>
                                                            <div class="meta"> 2 hrs ago</div>
                                                            <div class="meta" style="padding-top: 25px;padding-right:2px;">
                                                                <svg style="color: green;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                                    <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                                                </svg>
                                                                <svg style="color: red;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--//col-->
                                                </div>
                                                <!--//row-->
                                                <a class="link-mask" href="#"></a>
                                            </div>
                                            <!--//item-->
                                            <div class="item p-3">
                                                <div class="row gx-2 justify-content-between align-items-center">
                                                    <div class="col-auto">
                                                        <div class="app-icon-holder">
                                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-receipt" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z" />
                                                                <path fill-rule="evenodd" d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    <!--//col-->
                                                    <div class="col">
                                                        <div class="info">
                                                            <div class="desc">You have a new invoice. Proin venenatis interdum est.</div>
                                                            <div class="meta"> 1 day ago</div>
                                                        </div>
                                                    </div>
                                                    <!--//col-->
                                                </div>
                                                <!--//row-->
                                                <a class="link-mask" href="#"></a>
                                            </div>
                                            <!--//item-->
                                            <div class="item p-3">
                                                <div class="row gx-2 justify-content-between align-items-center">
                                                    <div class="col-auto">
                                                        <div class="app-icon-holder icon-holder-mono">
                                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bar-chart-line" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1V2zm1 12h2V2h-2v12zm-3 0V7H7v7h2zm-5 0v-3H2v3h2z" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    <!--//col-->
                                                    <div class="col">
                                                        <div class="info">
                                                            <div class="desc">Your report is ready. Proin venenatis interdum est.</div>
                                                            <div class="meta"> 3 days ago</div>
                                                        </div>
                                                    </div>
                                                    <!--//col-->
                                                </div>
                                                <!--//row-->
                                                <a class="link-mask" href="#"></a>
                                            </div>
                                            <!--//item-->
                                            <div class="item p-3">
                                                <div class="row gx-2 justify-content-between align-items-center">
                                                    <div class="col-auto">
                                                        <img class="profile-image" src="<?php echo base_url(); ?>assets/images/profiles/profile-2.png" alt="">
                                                    </div>
                                                    <!--//col-->
                                                    <div class="col">
                                                        <div class="info">
                                                            <div class="desc">James sent you a new message.</div>
                                                            <div class="meta"> 7 days ago</div>
                                                        </div>
                                                    </div>
                                                    <!--//col-->
                                                </div>
                                                <!--//row-->
                                                <a class="link-mask" href="#"></a>
                                            </div>
                                            <!--//item-->
                                        </div>
                                        <div class="dropdown-menu-footer p-2 text-center">
                                            <a href="#">View all</a>
                                        </div>

                                    </div>
                                </div>
                        </li>
                        <li>
                            <div style="padding-right:175px">
                            <a href="chat.html" class="chatBox">
                                <img src="<?php echo base_url() ?>/assets/images/comment.png" alt="chat" width="auto" height="auto">
                                <span>
                                    <label>5</label>
                                </span>
                            </a>
                            </div>
                        </li>
                        <li>

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