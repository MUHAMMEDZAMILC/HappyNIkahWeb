<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta charset="UTF-8">
    <title>Happy Nikah | Kerala Muslim Matrimony Site | Nikah Matrimony in Kerala
    </title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="Happynikah.com is an emerging muslim matrimony site in Kerala that helps Muslim bachelors to find and matchmake with the perfect partner. Nikah matrimony in Kerala">

    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url() ?>assets/images/hnicon.png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@300;400;500;600;700;900&family=Noto+Sans+Malayalam:wght@400;500;600&family=Poppins:wght@300;400;500;600;700;800;900&family=Roboto:wght@400;500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/owl.theme.default.min.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-X44BV75LEC"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-X44BV75LEC');
    </script>
    <!-- Meta Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '435890978249652');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=435890978249652&ev=PageView&noscript=1" /></noscript>
    <!-- End Meta Pixel Code -->
    <style type="text/css">
        .validationclass {
            color: red;
            font-size: 12px;
            padding: 5px 2px;
        }

        .otpInputs {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            align-content: space-around;
            justify-content: space-evenly;
        }

        .errorotp {
            text-align: center;
            color: red;
            background: #ff00000f;
            padding: 5px;
        }

        .already-member {
            float: left;
            width: 89px;
            font-size: 10px;
            color: white;
            padding-top: 7px;
        }

        .loginbtn {
            background: #fdfdfdad;
            width: 90px;
            margin-left: 8px;
            padding: 2px 0px;

        }

        #banner .overlay {
            background-color: rgb(253 232 232 / 0%);
        }

        #more {
            display: none;
        }

        #banner .bannerPara {
            background: #ffffff38;
            padding: 15px 4px;
        }

        @media only screen and (max-width: 600px) {
            .already-member {
                float: left;
                width: 89px;
                font-size: 10px;
                color: white;
            }

            .loginbtn {
                background: #fdfdfdad;
                width: 60px;
                margin-left: 8px;
                padding: 2px 0px;
                font-size: 12px;
            }

        }
    </style>
</head>
<body>
<section id="header">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="<?php echo site_url(); ?>">
                    <img src="<?php echo base_url() ?>assets/images/HappyNikkahwhite.png" alt="Happy Nikah" width="auto" height="auto" class="gotoNikahlogo">
                </a>
                <div class="mob-login">
                    <n class="already-member">Already a member?</n>
                    <button type="button" class="btn loginbtn" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                </div>
                <!--<n class="already-member">Already a member?</n><button type="button" class="btn loginbtn" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>-->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarGoToNikah" aria-controls="navbarGoToNikah" aria-expanded="false" aria-label="Toggle navigation">
                    <div class="hamburger" id="hamburger-1">
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                    </div>
                </button>
                <div class="collapse navbar-collapse" id="navbarGoToNikah">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0 mt-3 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?php echo site_url(); ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('user/about'); ?>">About us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('user/download'); ?>">Download</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('user/contactus'); ?>">Contact</a>
                        </li>
                    </ul>
                    <div class="web-login">
                        <n class="already-member">Already a member?</n>
                        <button type="button" class="btn loginbtn" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                    </div>
                    <!--<ul class="d-flex logList align-items-center mb-3 mb-lg-0">-->
                    <!--    <li>Already Member</li>-->
                    <!--    <li>-->
                    <!--        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>-->
                    <!--    </li>-->
                    <!--</ul>-->

                </div>
            </div>
        </nav>
    </section>
<section id="banner">
    <!-- <div class="overlay"></div>-->
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-5 col-md-12 d-flex align-items-center quran-verse">
                <p class="bannerPara mb-4 mb-md-0 pe-md-4" align="center">നിങ്ങള്‍ക്ക് സമാധാനപൂര്‍വ്വം ഒത്തുചേരേണ്ടതിനായി നിങ്ങളില്‍ നിന്ന് തന്നെ നിങ്ങള്‍ക്ക് ഇണകളെ സൃഷ്ടിക്കുകയും, നിങ്ങള്‍ക്കിടയില്‍ സ്നേഹവും കാരുണ്യവും ഉണ്ടാക്കുകയും ചെയ്തതും അവന്റെ ദൃഷ്ടാന്തങ്ങളില്‍ പെട്ടതത്രെ. തീര്‍ച്ചയായും അതില്‍ ചിന്തിക്കുന്ന ജനങ്ങള്‍ക്ക് ദൃഷ്ടാന്തങ്ങളുണ്ട് <br><span class="verse-number"> (വിശുദ്ധ ഖുര്‍ആന്‍ 30:21)</span></p>

            </div>
            <div class="col-12 col-lg-6 col-md-12 d-flex align-items-center">
                <div class="regBox">
                    <span id="error-mob" style="color:red;font-size:17px;"></span>

                    <div class="regHeadBar mb-4">
                        <div class="regHeadBox borderRight d-flex align-items-center">
                            <div class="w-100 register-heading-desk">
                                <h2 class="pOne" style="color: #fff;font-size:20px;">Register Now </h2>
                                <span class="hOne" style="color: #f5d310;font-size:40px;">its free!</span>
                            </div>

                        </div>
                        <div class="regHeadBox borderRight d-flex align-items-center">
                            <h3 class="hTwo" align="center">സന്തോഷകരമായ ജീവിതത്തിനു അനുയോജ്യമായ പങ്കാളിയെ കണ്ടെത്തൂ......</h3>
                        </div>
                        <!--<div class="regHeadBox d-flex align-items-center">-->
                        <!--    <div class="">-->
                        <!--        <p class="pTwo">Register using</p>-->
                        <!--        <div class="d-flex justify-content-lg-between">-->
                        <!--            <a href="javascript:void(0);" class="regalterIcon me-4">-->
                        <!--                <img src="<?php echo base_url() ?>assets/images/google.png" class="regalterIcon" width="auto" height="auto" alt="google">-->
                        <!--            </a>-->
                        <!--            <a href="javascript:void(0);" class="regalterIcon">-->
                        <!--                <img src="<?php echo base_url() ?>assets/images/facebook.png" width="auto" height="auto" alt="facebook">-->
                        <!--            </a>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                    </div>
                    <form>
                        <div class="row">
                            <div class="col-12 col-md-10" style="margin-left: 40px;">
                                <label class="form-label me-4 mb-0 reg_label"></label>
                                <input type="text" style="width:95%;" class="form-control" placeholder="Bride / Groom Name *" id="name" name="name" onkeypress="return lettersOnly(event)">
                                <span id="name_val" class="validationclass" style="color: red;font-size: 15px;"></span>
                            </div>

                        </div>
                        <div class="col-12 col-md-10" style="margin-left: 39px;">
                            <div class="form-control" style="width:95%;">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="1">
                                <label class="form-check-label" for="male">Male </label>
                                <img style="margin-left:5px;margin-bottom:2px;" src="<?php echo base_url() ?>assets/images/male.svg" alt="male" width="24px" height="24px">
                                <!-- <img style="margin-left: px;" src="<?php echo base_url() ?>assets/images/vertical.svg" alt="vertical"  width="24px" height="24px"> -->
                                <span style=" border-left: 2px solid #ff5b85;height: 24px;margin-left:10px;padding-top:10px;padding-bottom:12px;"></span>
                                <span style="margin-left: 25px;">
                                    <input class="form-check-input" type="radio" name="gender" id="female" value="2">
                                    <label class="form-check-label" for="female">Female</label>
                                    <img style="margin-left:5px;" src="<?php echo base_url() ?>assets/images/female.svg" alt="male" width="24px" height="24px">
                                    <span style=" border-left: 2px solid #ff5b85;height: 24px;margin-left:10px;padding-top:10px;padding-bottom:12px;"></span>
                                </span>
                                <span>
                                    <select style="width: auto;margin-left:30px;border:none;background-color:white;" name="user_age" id="user_age" class="">
                                        <option value="">Age</option>

                                    </select>
                                    
                                    <img style="margin-left: 5px; color:#0892FD;" src="<?php echo base_url() ?>assets/images/calendar.svg" alt="calendar" width="24px" height="24px;">

                                </span>
                            </div>
                        <span id="age_val" class="validationclass" style="color: red;font-size: 15px;"></span>

                        </div>
                        <div class="col-xs-2">
                            <div class="col-md-2 col-sm-4 co2">

                            </div>

                        </div>

                        <!-- <div class="row">
                                <div class="col-12 mb-3">
                                    <label class="form-label me-4 mb-0">Gender</label>
                                    <div class="form-check form-check-inline custom_radio">
                                        <input class="form-check-input" type="radio" name="gender" id="male" value="1">
                                        <label class="form-check-label" for="male">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline custom_radio">
                                        <input class="form-check-input" type="radio" name="gender" id="female" value="2">
                                        <label class="form-check-label" for="female">Female</label>
                                    </div>
                                    <br><span id="gender_val" class="validationclass" style="color: red;font-size: 15px;"></span>
                                </div>
                            </div>-->
                        <div class="row" style="margin-left: 26px;">


                            <div>


                                <select style="width: 107px;" name="countryCode" id="countryCode" class="form-control code-country" required>
                                    <!-- <img src="<?php echo base_url() ?>assets/images/in.svg" width="24px" height="24px"> -->
                                    <option value="0">&nbsp;&nbsp;&nbsp; ISD (+91) </option>




                                    <?php
                                    foreach ($countryCode as $val) {
                                        if ($val['country_order'] != '0') { ?>
                                            <option value="<?= $val['country_code']; ?>"><?= "+" . $val['country_code']; ?></option>
                                    <?php }
                                    } ?>

                                </select>
                            </div>


                            <div class="col-lg-8 col-md-10s">
                                <!-- <label class="form-label me-4 mb-0 reg_label">Phone:</label> -->
                                <input style="margin-left:114px;margin-top:21px;width:96%;" type="text" class="form-control" placeholder="Phone Number" id="phone" name="phone" maxlength="10" onkeypress="return event.charCode > 47 && event.charCode < 58;">
                               

                            </div>

 <span id="countrycode_val" style="color: red;font-size: 15px;"></span>
<!--                                 <span id="phone_val" class="validationclass" style="color: red;font-size: 15px;"></span>
-->

                            <!-- <div class="col-lg-6 col-md-6">
                            <label class="form-label me-4 mb-0 reg_label">Email:</label>
                            <input type="email" class="form-control" placeholder="abc@mail.com" name="email" id="email">
                            <p id="email_val" class="validationclass"></p>
                        </div> -->

                        </div>
                        <div class="d-sm-flex justify-content-between align-items-center">
                            <div class="form-check mb-4 mb-sm-01">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                                <label class="form-check-label" for="flexCheckDefault">I have read and agree to the <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal">Terms and Condition</a></label>
                                <p class="validationclass" id="terms_val"></p>
                            </div>
                        </div>
                        <div class="regsub">
                            <button type="button" onclick="checkvalidation()" class="btn cstmBtnColr registernow">Register Now</button>

                            <button type="submit" id="submitbtn" class="btn cstmBtnColr" style="display:none;">REG</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="homeAbout">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-10 mx-auto text-center">
                <h2 class="subHead">Get ready <span>with us</span></h2>
                <p class="para1 mb-5">Happy Nikah is India’s most trusted and user friendly online matrimony portal for Muslims.
                    Happy Nikah has helped thousands of Muslim singles to find their perfect soul mate.</p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12 col-sm-6 col-lg-3 text-center mb-4 mb-lg-0">
                <img src="<?php echo base_url() ?>assets/images/Trusted.png" alt="Trusted Matrimonial Service" width="auto" height="auto" class="readyIcon">
                <h3>No.1 & Trusted</br>Matrimonial Service</h3>
                <p>Our largest number of profiles<br>increases your chances.</p>
            </div>
            <div class="col-12 col-sm-6 col-lg-3 text-center mb-4 mb-lg-0">
                <img src="<?php echo base_url() ?>assets/images/Charge.png" alt="No Charge for Registration" width="auto" height="auto" class="readyIcon">
                <h3>No Charge for</br>Registration</h3>
                <p>Registering with us is completely<br>free and simple.</p>
            </div>
            <div class="col-12 col-sm-6 col-lg-3 text-center mb-4 mb-sm-0">
                <img src="<?php echo base_url() ?>assets/images/Validation.png" alt="Manual Screening and Validation" width="auto" height="auto" class="readyIcon">
                <h3>Manual Screening</br>and Validation</h3>
                <p>Our experts manually screen<br>and validate each profile.</p>
            </div>
            <div class="col-12 col-sm-6 col-lg-3 text-center">
                <img src="<?php echo base_url() ?>assets/images/Security.png" alt="Best Data Security and Privacy" width="auto" height="auto" class="readyIcon">
                <h3>Best Data Security</br>and Privacy</h3>
                <p>We follow best practices to<br>keep your data safe.</p>
            </div>
        </div>
    </div>
</section>
<section id="findPartner">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12 col-md-10 mx-auto text-center">
                <h2 class="subHead"><svg style="margin-bottom: 45px;color:#FF5B85;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-hearts" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M4.931.481c1.627-1.671 5.692 1.254 0 5.015-5.692-3.76-1.626-6.686 0-5.015Zm6.84 1.794c1.084-1.114 3.795.836 0 3.343-3.795-2.507-1.084-4.457 0-3.343ZM7.84 7.642c2.71-2.786 9.486 2.09 0 8.358-9.487-6.268-2.71-11.144 0-8.358Z" />
                    </svg>Find Your <span>Life Partner</span><svg style="margin-bottom: 45px;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-hearts" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M4.931.481c1.627-1.671 5.692 1.254 0 5.015-5.692-3.76-1.626-6.686 0-5.015Zm6.84 1.794c1.084-1.114 3.795.836 0 3.343-3.795-2.507-1.084-4.457 0-3.343ZM7.84 7.642c2.71-2.786 9.486 2.09 0 8.358-9.487-6.268-2.71-11.144 0-8.358Z" />
                    </svg></h2>
                <p class="para1 mb-5">Happynikah.com Meet your perfect partner from sites to "tie up together",<br>
                    All Muslim community can find their suitable brides and grooms with thousands of profiles.<a style="color: #FF5B85;cursor: pointer;" onclick="myFunctionread()" id="myBtn">Read more</a><span id="dots"></span><br><span id="more" style="text-align: justify;">Happy Nikah is an emerging Muslim matrimony site in Kerala for Malayalee Muslims across the world. This muslim matrimony site will help every Muslim bachelor who seeks life partners in a truly Islamic way. Registration on this <b>best</b> <a href="https://happynikah.com/user/about"> Muslim marriage bureau </a> is free; once completed, the team behind this Muslim community matrimony will screen the profile to validate and confirm its authenticity. After the completion of registration on this marriage bureau, the members can contact each other.
                        The user interface of this nikah matrimonial Happy Nikah, is very easy to use and simple. This <a href="https://happynikah.com/user/about"> matchmaking website </a> provides a free search facility to every Malayalee Muslim bachelor out there. Unlike all other matrimony websites, this Muslim marriage bureau in Kerala will promise you that they are highly committed to the culture and creed of the Islamic religion.
                        Happy Nikah, muslim matrimony site gives special consideration to orphans and differently-abled Muslims. Apart from the safety, security, and credibility of this marriage agency, Happy Nikkah is more focused on charity activities too. Search for your partner through Happy Nikah, an ideal Muslim community matrimony website, and make your marital life even more awesome.</span></p>
            </div>
        </div>
    </div>
    <div class="lPull">

        <div class="owl-partner owl-carousel owl-theme">
            <?php

            foreach ($homeprofiles as $vals) { ?>
                <div class="item">
                    <div class="profCard">
                        <div class="d-flex justify-content-between mb-3">
                            <div class="pe-3">
                                <div class="name d-flex align-items-center">
                                    <img src="<?php echo base_url() ?>assets/images/name.png" alt="name" width="auto" height="auto" class="profileico">
                                    <span><?php echo $vals->name; ?></span>
                                </div>
                                <div class="detls d-flex align-items-center">
                                    <img src="<?php echo base_url() ?>assets/images/physic.png" alt="name" width="auto" height="auto" class="profileico">
                                    <span><?php echo $vals->age; ?> Yrs, <?php echo $vals->height; ?></span>
                                </div>
                                <div class="detls d-flex align-items-center">
                                    <img src="<?php echo base_url() ?>assets/images/suitcase.png" alt="name" width="auto" height="auto" class="profileico">
                                    <span><?php echo $vals->profession_name; ?></span>
                                </div>
                                <div class="detls d-flex align-items-center">
                                    <img src="<?php echo base_url() ?>assets/images/star.png" alt="name" width="auto" height="auto" class="profileico">
                                    <span><?php echo $vals->user_religion; ?>, <?php echo $vals->user_caste; ?></span>
                                </div>
                                <div class="detls d-flex align-items-center">
                                    <img src="<?php echo base_url() ?>assets/images/loctn.png" alt="name" width="auto" height="auto" class="profileico">
                                    <span>Lake Halieville</span>
                                </div>
                            </div>
                            <div class="imgBox">

                                <img src="<?php echo base_url('/assets/photo_storage_thumb/' . $vals->photo); ?>" alt="profile image" class="proImg" style="height:100%;">


                            </div>
                        </div>
                        <button class="btn connectBtn">
                            <img src="<?php echo base_url() ?>assets/images/payment.png" alt="tick" width="auto" height="auto">
                            <span>Connect Now</span>
                        </button>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<br><br><br><br><br>


<section id="homeDownload">
    <div class="container">
        <div class="row">
            <div class="col-12 col-xxl-10 mx-auto">
                <div class="row">
                    <div class="col-12 col-md-7 col-xl-6">
                        <h2 class="subHead1 mb-4">Search Profiles<br><span>Anytime! Anywhere!!</span></h2>
                        <p class="pOne">Finding your perfect match has never been easier without the Happynikah application</p>
                        <p class="pTwo">Download now and communicate with muslim matches on-the-go!</p>
                        <div class="downico">
                            <a href="javascript:void(0)">
                                <img style="height:30px;" src="<?php echo base_url() ?>assets/images/appleStore.png" draggable="false" alt="appleStore" width="auto" height="auto" class="storeIcon me-3">
                            </a>
                            <a target="_blank" href="https://play.google.com/store/apps/details?id=com.sysol.happy_nikah">
                                <img style="height:30px;" src="<?php echo base_url() ?>assets/images/playStore.png" alt="playStore" draggable="false" width="auto" height="auto" class="storeIcon">
                            </a>

                        </div>

                    </div>
                    <div class="col-12 col-md-5 col-xl-6 text-center position-relative">
                        <img src="<?php echo base_url() ?>assets/images/appMob1.png" alt="playStore" draggable="false" width="auto" height="auto" class="appIcon">
                        <img class="pdown" src="<?php echo base_url() ?>assets/images/downloadg.png" draggable="false" alt="download" width="auto" height="auto">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="homeVid" style="background-color: white;">
    <br><br><br><br><br><br><br><br><br>
    <div class="container">
        <div class="row mb-4">
            <div class="col-12 col-md-8 mx-auto text-center">
                <h2 class="subHead">Our Youtube <span>Exclusives</span></h2>
                <p class="para1 mb-5"> -- Watch our Youtube Videos . Get to know about us faster --</p>
            </div>
        </div>
        <div class="owl-carousel owl-theme">

            <div class="item-video"><iframe width="560" height="315" src="https://www.youtube.com/embed/9Sg-st6_C_I" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></div>

            <div class="item-video"><iframe width="560" height="315" src="https://www.youtube.com/embed/WIu328N60ss" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></div>

            <div class="item-video"><iframe width="560" height="315" src="https://www.youtube.com/embed/k-ef5JqofcA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></div>

            <div class="item-video"><iframe width="560" height="315" src="https://www.youtube.com/embed/YbFY6_c4IE4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></div>

            <div class="item-video"><iframe width="560" height="315" src="https://www.youtube.com/embed/kwwM-ZOUs4w" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></div>

            <div class="item-video"><iframe width="560" height="315" src="https://www.youtube.com/embed/HTYDeRKw8es" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></div>

            <div class="item-video"><iframe width="560" height="315" src="https://www.youtube.com/embed/9q4WP8X121Y" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></div>


        </div>
    </div>
    </div>
    <br><br>
</section>
<section id="homeContact">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-5 d-flex align-items-center mb-5 mb-md-0">
                <div class="w-100">
                    <h2 class="subHead">Begin your <span>journey with us.</span></h2>
                    <p class="addText mb-4">We are ready to help your nikah dream come true..!</p>
                    <div class="d-flex align-items-center mb-4">
                        <div class="flex-shrink-0">
                            <img src="<?php echo base_url() ?>assets/images/address.png" alt="address" class="icon">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <p class="addText mb-0">IV th Floor, Neospace,Kinfra Techno Industrial Park Calicut University(PO),Malappuram, India.</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-4">
                        <div class="flex-shrink-0">
                            <img src="<?php echo base_url() ?>assets/images/telephone.png" alt="telephone" class="icon">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <p class="mobText mb-0">+91-8593999888</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <img src="<?php echo base_url() ?>assets/images/mail.png" alt="mail" class="icon">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <p class="addText mb-0">info@happynikah.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--mobile verify otp Modal-->

<div class="modal fade" id="otpModal" data-backdrop="static" tabindex="-1" aria-labelledby="otpModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="row">
                    <div class="col-12 col-lg-6 d-none d-lg-flex align-items-stretch">
                        <div class="leftBox w-100">
                            <h2 class="modalHead mb-4" id="otpModalLabel">Search Profiles<br><span>Anytime! Anywhere!!</span></h2>
                            <p class="lpone">Finding your perfect match has never been easier without the Happynikah application</p>
                            <p class="lptwo">Download now and communicate with muslim matches on-the-go!</p>
                            <div class="d-flex justify-content-center">
                                <a href="javascript:void(0)">
                                    <img src="<?php echo base_url() ?>assets/images/appleStore.png" alt="appleStore" class="storeIcon me-3" width="auto" height="auto">
                                </a>
                                <a href="https://play.google.com/store/apps/details?id=com.sysol.happy_nikah">
                                    <img src="<?php echo base_url() ?>assets/images/playStore.png" alt="playStore" class="storeIcon" width="auto" height="auto">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 d-flex align-items-stretch">
                        <div class="rbox w-100">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <div class="d-flex justify-content-between mb-5">
                                <h3 class="welcomeHead">Mobile Number<br> Verification</h3>
                                <img src="<?php echo base_url() ?>assets/images/HappyNikah.png" alt="go to Nikah" class="llogo" width="auto" height="auto">
                            </div>
                            <div class="otpverifyBox">
                                <!--<form class="customForm">-->
                                <div class="mb-3">
                                    <label class="form-label">Enter Your OTP</label>
                                    <div class="otpInputs">
                                        <input id="verify1" type="text" class="form-control" maxlength="1" onkeyup="tabChange(this,'verify2')" />
                                        <input id="verify2" type="text" class="form-control" maxlength="1" onkeyup="tabChange(this,'verify3')" />
                                        <input id="verify3" type="text" class="form-control" maxlength="1" onkeyup="tabChange(this,'verify4')" />
                                        <input id="verify4" type="text" class="form-control" maxlength="1" onkeyup="tabChange(this,'verify5')" />
                                        <input id="verify5" type="text" class="form-control" maxlength="1" onkeyup="tabChange(this,'verify6')" />
                                        <input id="verify6" type="text" class="form-control" maxlength="1" />
                                    </div>
                                </div>
                                <p class="errorotp"></p>
                                <button type="button" class="btn cstmBtnColr w-100" onclick="verify_mobile()">SUBMIT</button>
                                <p>NOTE: If you have not received OTP by sms, you can check your email for OTP.</p>
                                <!--</form>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- terms Modal -->
<div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="row">



                    <div class="col-12" style="padding:50px;">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="float:right"></button>
                        <div style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri","sans-serif";border:none;border-bottom:dashed #666666 1.0pt;padding:0in 0in 0in 0in;'>
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";text-align:center;'><strong><span style='font-size:16px;font-family:"Times New Roman","serif";color:#C00000;'>TERMS AND CONDITIONS</span></strong></p>
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><strong><span style='font-size:16px;font-family:"Times New Roman","serif";'>&nbsp;</span></strong></p>
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><strong><span style='font-size:16px;font-family:"Times New Roman","serif";'>Welcome to happynikah.com</span></strong></p>
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>Please read the terms of use for this website carefully. In accordance with this terms and conditions, the users of happynikah.com are provided with limited license to use the service and content of this website. By signing up the service, you give your acceptance to be bound by the Terms and conditions (herein referred to as &ldquo;Agreement&rdquo;). To become a member of this website and to be able to communicate with fellow members, you must register as a member and follow the instructions given during the Registration process. This Agreement outlines the terms that you are subjected to as a member of this website. The Agreement may be revised from time to time at the sole discretion of happynikah.com and will be intimated to you. Pursuant to such changes, if you continue to use the site then it will be constituted as your acceptance for the changes.</span></p>
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><strong><span style='font-size:16px;font-family:"Times New Roman","serif";'>Criteria of Use</span></strong></p>
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>You are at least 18 or 18+ years of age. The membership of those users will be declined whose eligibility does not match the criteria. Using this site will determine that you possess the right, authority and competence to sign this Agreement and to be bound by the terms of use of this Agreement.&nbsp;</span></p>
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>This site does not encourage and/or promote illegitimate sexual relations or affairs outside marriage. If any member is found to be using this site as a means of promoting or indulging or engaging in any illegitimate sexual relations or affairs outside marriage or if happynikah.com becomes aware of such activities then the membership of the particular user will be terminated without any refund. happynikah.comis not bound by any liability towards such individual. The binding and final termination will be the sole discretion of happynikah.com.com.</span></p>
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><strong><span style='font-size:16px;font-family:"Times New Roman","serif";'>Terms of Use</span></strong></p>
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>This Agreement will come into effect once you have registered as a member and will remain in full force as and when you continue to use the Site. If you wish to terminate your membership for any reason and at any time, you may do so by informing happynikah.com in writing. In the event of happynikah.com terminating your membership or you terminate your membership, you will not be entitled any refund irrespective of whether you have any unutilized subscription fees. happynikah.comreserves the sole right to terminate your access to the Site and/or your membership for any reason. You will be intimated of the same via email at the email address (or any other email address that you may later provide) you provided in your application for membership to happynikah.com.com. In the event of happynikah.com terminating your membership for breaching the Agreement, you will not be entitled to any refund. Even after the termination of the Agreement, provisions including sections 4,5,7,9 -12 of this Agreement will remain in effect.</span></p>
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><strong><span style='font-size:16px;font-family:"Times New Roman","serif";'>Non-Commercial Use by Members</span></strong></p>
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>The service of this website is for the personal use of individual members only. Members of happynikah.com will not use the services of the website for any commercial purpose including link building of any kind irrespective of whether it may be deemed competitive to happynikah.com or otherwise. The membership of this website is restricted to individuals only therefore, non-individual entity may not become members of happynikah.com.com. Appropriate legal action will be taken against illegitimate and/or unauthorized use of the Site, which may include unauthorized framing of or linking to the Site.</span></p>
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><strong><span style='font-size:16px;font-family:"Times New Roman","serif";'>Other Terms of Use</span></strong></p>
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>1. Members of the website will not engage in any advertising or solicitation of selling or buying any services or products through this website.&nbsp;</span></p>
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>2. You will not send any chain letters or spam the email of happynikah.com members.</span></p>
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>3. Using any information obtained from this service for the purpose of harassing, abusing or harming a fellow member will be considered as the violation of this agreement.</span></p>
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>4. Happynikah.com has the sole right to restrict the number of communications, emails, of all the members in order to protect its members from any sort of abuse or misuse.</span></p>
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>5. Sending obscene, lewd, licentious, defamatory messages that promote hatred and/or are racial or abusive in any manner will be deemed as a breach of this agreement and shall be entitled to termination of your membership.&nbsp;</span></p>
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>6. Happynikah.com at its own discretion reserves the right to screen messages that are sent to other Member(s). We also regulate the number of your chat sessions.</span></p>
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>7. Use of Bots, EXE&apos;s, CGI or any other programs/scripts to view content on or communicate/contact/respond/interact with happynikah.com and/or its Members is restricted.</span></p>
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><strong><span style='font-size:16px;font-family:"Times New Roman","serif";'>Propriety Rights</span></strong></p>
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>The propriety rights of this website are owned by happynikah.com and retain all intellectual property without any limitation. The proprietary information shall not be copied, modified, published, transmitted, distributes, displayed, sold or performs in any form. Happynikah.com website possesses copyrighted material, trademarks, and other proprietary information Ownership of content posted on the Site</span></p>
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><strong><span style='font-size:16px;font-family:"Times New Roman","serif";'>You agree that</span></strong></p>
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>1) Happynikah.com owns all the lawful, legal and non-objectionable messages, content and/or other information, content or material that are posted on the forum boards.</span></p>
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>2) All such information, content and/or material posted on the forum boards may be scrutinized by happynikah.com and have the sole right at its own discretion to remove, edit and/or display such information, material and/or content, messages, photos or profiles which might be deemed as offensive, illegitimate, derogatory, obscene, libellous, or that might violate the rights, harm, or intimidate the safety of other members. It will be considered as a breach of this agreement and may be liable to termination.</span></p>
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>3) The Content that are published or displayed on the Site by you will be at your sole discretion.</span></p>
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>4) Happynikah.com reserves the right to verify the authenticity of Content posted on the Site and may ask you to provide any documentary or other form of evidence supporting the Content you post on the Site.&nbsp;</span></p>
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>5) In the event of your failure to produce such evidence, or if the evidence is not sufficient to support and justify your claim then happynikah.com may, in its sole discretion, terminate your Membership without any refund.&nbsp;</span></p>
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>6) You understand that by posting content to any public forum, you automatically grant happynikah.com and other members the license to utilize, reproduce, exhibit, distribute and perform the information and content in any manner.</span></p>
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><strong><span style='font-size:16px;font-family:"Times New Roman","serif";'>Content prohibited on the Site&nbsp;</span></strong></p>
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>Any member violating the following provision will be subjected to appropriate legal action in the sole discretion of happynikah.com.com. The violator will be removed and membership will be terminated from the website without refund. It includes (but is not limited to) Content that:</span></p>
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>1) New profiles will be verified for its authenticity by way of happynikah.com and will be immediately activated after receiving quality declaration.</span></p>
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>2) In the event of unacceptable profile contents or if the profile contains violent language or unsolicited material then happynikah.com reserves the sole right to discontinue, deactivate, or terminate the concerned profile.</span></p>
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>3) Only paid customer will have access to contact information of other members.</span></p>
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>4) The liability of your connections with other members through this Service solely lies with you. Happynikah.com does not have any obligation to supervise the disputes between its members.</span></p>
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>5) Free membership may be discontinued by happynikah.com as and when it is deemed to be of no more relevance.&nbsp;</span></p>
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>6) Happynikah.com does not claim any responsibility for the misuse of this service.&nbsp;</span></p>
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>7) All the members are required to submit their profile with the necessary facts required for establishing a matrimonial alliance. Happynikah.com will not be responsible for any loss or damage caused for concealing facts relevant to marriage.</span></p>
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>8) Happynikah.com does not guarantee the legitimacy and validity of the information provided by the members. This may include information related religion, caste or creed or any other personal information.</span></p>
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>9) Happynikah.com will not be responsible for any delays caused in posting information due to technical faults.</span></p>
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>10) For loss or damage due to the discontinuation of the service or for any damage caused due to accessing other member&rsquo;s profile, happynikah.com is not responsible.</span></p>
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>11) Happynikah.com does not provide any guarantee that you as an applicant will receive responses and is not liable to any refunds or credits.</span></p>
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>12) The users will not promote any an illegal or unauthorized copy of another person&apos;s copyrighted work which may include pirated computer programs, providing information to circumvent manufacture-installed copy-protect devices, or pirated music.</span></p>
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>13) The users will not send any information with restricted contents or password only access pages, or hidden pages or images.</span></p>
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>14) The users will not encourage extra marital affairs, exploitation of people under 18 years of age in a sexual or violent manner, other illegal activities such as making or buying illegal weapons, violating someone&apos;s privacy, or providing or creating computer viruses.</span></p>
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>The service of happynikah.com must be used in accordance to all local, state, and federal laws and regulations. Creation of more than one profile is not permitted in any case. Doing so may subject your membership to terminate without any refunds.</span></p>
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><strong><span style='font-size:16px;font-family:"Times New Roman","serif";'>Copyright Policy</span></strong></p>
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>The copyrighted material, trademarks, or other proprietary information may not be copied, reproduced or distributed in any form without the prior written consent of the owner. In the event of your copyright materials being copied and posted, you may get in touch with our copyright Agents for copyright infringement with an electronic or physical signature authorizing the person to act on behalf of the owner and a description of the copyrighted material that you believe has been infringed. You must also include the source of the material, your address, telephone number, and email address along with a written statement. If applicable then you may also produce a certificate of the registration or any other intellectual property right. You can contact happynikah.com&apos;s Copyright Agent for Notice of claims of copyright infringement by writing to the Mumbai address located under the Help/Contact section.</span></p>
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><strong><span style='font-size:16px;font-family:"Times New Roman","serif";'>Privacy</span></strong></p>
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>The use of this service is governed by the happynikah.com Privacy Policy.</span></p>
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><strong><span style='font-size:16px;font-family:"Times New Roman","serif";'>Disclaimers</span></strong></p>
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>Happynikah.com does not claim any responsibility for the authenticity of the Content posted on the Site, whether caused by users visiting the Site, Members or by any equipment or programming associated with or utilized in the Service. Furthermore, happynikah.com does not claim any responsibility for the conduct of any user and/or Member whether online or offline. Happynikah.com assumes no responsibility for any error, omission, interruption, deletion, defect, delay in operation or transmission, communications line failure, theft or destruction or unauthorized access to, or alteration of, user and/or Member communications. The exchange of profile(s) through or by happynikah.com should not in any way be construed as any offer and/or recommendation from/by happynikah.com. The Site and the Service are provided &quot;AS-IS AVALAIBLE BASIS&quot; and happynikah.com expressly disclaims any warranty of fitness for a particular purpose or non-infringement. Happynikah.com cannot guarantee and does not promise any specific results from use of the Site and/or the happynikah.com Service.</span></p>
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><strong><span style='font-size:16px;font-family:"Times New Roman","serif";'>Limitation on Liability</span></strong></p>
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>Except in jurisdictions where such provisions are limited, in any event, happynikah.com will not be liable to you or any third person for any indirect, consequential, exemplary, incidental, special or punitive damages, including also lost profits arising from your use of the Site. Notwithstanding anything to the contrary contained herein, happynikah.com, liability to you for any cause whatsoever, and regardless of the form of the action, will at all times be limited to the amount paid, if any, by you to happynikah.com, for the Service during the term of membership.</span></p>
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><strong><span style='font-size:16px;font-family:"Times New Roman","serif";'>Disputes</span></strong></p>
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>If any dispute involving the Site and/or the Service arises, you agree that the dispute will be governed by the laws of India under the exclusive jurisdiction to the courts of Mumbai, India.</span></p>
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><strong><span style='font-size:16px;font-family:"Times New Roman","serif";'>Indemnity</span></strong></p>
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>You agree to indemnify and hold happynikah.com, its subsidiaries, directors, affiliates, officers, agents, and other partners and employees, harmless from any loss, liability, claim, or demand, including reasonable attorney&apos;s fees, made by any third party due to or arising out of your use of the Service in violation of this Agreement and/or arising from a breach of these Terms of Use and/or any breach of your representations and warranties set forth above.</span></p>
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><strong><span style='font-size:16px;font-family:"Times New Roman","serif";'>Other</span></strong></p>
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>By becoming a Member of happynikah.com Service, you agree to receive specific emails from happynikah.com. This Agreement, accepted upon use of the Site and further affirmed by becoming a Member of the happynikah.com Service, contains the entire agreement between you and happynikah.com regarding the use of the Site and/or the Service. If any provision of this Agreement is held invalid, the remainder of this Agreement shall continue in full force and effect. You are under an obligation to report any misuse or abuse of the Site to happynikah.com by writing to Customer Care. On receiving such complaint, happynikah.com may, if necessary, terminate the membership of the Member responsible for such violation abuse or misuse. If the complainant is at fault then they will be liable for termination of his / her membership without any refund of the subscription fee.</span></p>
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>For queries related to this agreement, please contact us</span></p>
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri","sans-serif";'>&nbsp;</p>
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri","sans-serif";'>&nbsp;</p>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<a href="javascript:" id="return-to-top"><i class="icon-chevron-up"></i></a>
<?php include('include/footer.php'); ?>

<!---the core firebasejs sdk is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.8.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.20.0/firebase-messaging.js"></script>
<!--- Your web app's Firebase configuration

   For Firebase JS SDK v7.20.0 and later, measurementId is optional-->
<script>
    var firebaseConfig = {

        apiKey: "AIzaSyBYEHcvLRpAvLSfDpFwmwc1PDHVILlbN1Y",

        authDomain: "happy-nikah-18138.firebaseapp.com",

        projectId: "happy-nikah-18138",

        storageBucket: "happy-nikah-18138.appspot.com",

        messagingSenderId: "599897650989",

        appId: "1:599897650989:web:810928920232e8185605a4",

        measurementId: "G-VDDTM8J4QH"

    };
</script>
<script type="text/javascript">
    $(document).ready(function() {

        $('#otpModal').modal({
            backdrop: 'static',
        })

    })

    function checkvalidation() {

        var created_by = $('#created_by').val();

        var name = $('#name').val();

        var phone = $('#phone').val();

        var countryCode = $('#countryCode option:selected').val();

        //var dob = $('#dob').val();

        var flexCheckDefault = $('#flexCheckDefault:checked').val();

        if (created_by == '') {

            $("#created_by").addClass("error-warning");
            $('#created_by_val').html('Field Required');
        } else {
            $("#created_by").removeClass("error-warning");
            $('#created_by_val').html('');
        }

        if (name == '') {
            $("#name").addClass("error-warning");
            $('#name_val').html('Field Required');
        } else {
            $("#name").removeClass("error-warning");
            $('#name_val').html('');
        }

        if (phone == '') {
            $("#phone").addClass("error-warning");
            $('#countrycode_val').html('Field Required');
        } else {
            $("#phone").removeClass("error-warning");
        }

        if (countryCode == '0') {
            $("#countryCode").addClass("error-warning");
            $('#countrycode_val').html('Field Required');
        } else {
            $("#countryCode").removeClass("error-warning");
        }

        // if(dob == '')
        // { 
        //   $("#dob").addClass("error-warning");
        // $('#dob_val').html('Field Required'); 
        // }
        //else
        //{
        //  $("#dob").removeClass("error-warning");
        //$('#dob_val').html(''); 
        // }

        if (flexCheckDefault == undefined) {
            $('#flexCheckDefault').addClass("error-warning");
            $('#terms_val').html('Please agree to our terms and conditions');
        } else {
            $('#flexCheckDefault').removeClass("error-warning");
            $('#terms_val').html('');
        }

        var checked_gender = document.querySelector('input[name = "gender"]:checked');

        var gender = $(checked_gender).val();
        var age = $("#user_age").val();
        if (age == "") {
            $('#age_val').html('Field Required');
        } else {
            $('#age_val').html('');
        }
        if (checked_gender == null) {
            $('#gender_val').html('Field Required');
        } else {
            $('#gender_val').html('');
        }

        if (created_by != '' && name != '' && phone != '' && checked_gender != null && flexCheckDefault != undefined && countryCode != '0' && age != '') {

            // $('#submitbtn').click();
            $.ajax({
                url: "<?php echo site_url('user/register_user'); ?>",
                type: "post",
                dataType: 'json',
                data: {
                    created_by: created_by,
                    name: name,
                    phone: phone,
                    countryCode: countryCode,
                    gender: gender,
                    age: age,
                },
                success: function(response) {
                    // alert(response);
                    if (response != 1) {
                        //   $('#reg_error').css('display','block');
                        $('#error-mob').html("Already Registered..");

                    } else {
                        $('#reg_error').css('display', 'none');
                        //$('.registernow').html('Registering...');
                        $('#otpModal').modal('show');
                        $('#verify1').focus();
                    }
                },
            });
        }

    }

    function verify_mobile() {

        var otpdigit1 = $('#verify1').val();
        var otpdigit2 = $('#verify2').val();
        var otpdigit3 = $('#verify3').val();
        var otpdigit4 = $('#verify4').val();
        var otpdigit5 = $('#verify5').val();
        var otpdigit6 = $('#verify6').val();

        $.ajax({
            url: "<?php echo site_url('user/verify_mobile'); ?>",
            type: "post",
            data: {
                otpdigit1: otpdigit1,
                otpdigit2: otpdigit2,
                otpdigit3: otpdigit3,
                otpdigit4: otpdigit4,
                otpdigit5: otpdigit5,
                otpdigit6: otpdigit6
            },
            success: function(response) {
                console.log(response)
                if (response == 1) {
                    // Initialize Firebase

                    if (!firebase.apps.length) {
                        firebase.initializeApp(firebaseConfig);
                    }
                    //we have to call the get token function of firebase. 
                    //before this we have to get the instance of fiebase messaging which is coming from this library.
                    const fcm = firebase.messaging();
                    //now we can call get token function
                    //this requires a key pair
                    fcm.getToken({
                        vapidkey: 'BO6Tz1E3kqQhIjg-_37RtC2GdPDjMcOqRwN9SiDDHZ1fj9l35oLKW4kL5WP1jDI9YV94HLVrSbnwYqZ5_3mzDHk'
                    }).then((token) => {
                        //alert(token);
                        $.ajax({
                            url: "<?php echo site_url('user/update_usertoken'); ?>",
                            type: "post",
                            data: {
                                user_token: token,
                            },
                            success: function(response) {
                                //   alert(response);
                                console.log(response);

                            },
                        });
                    });
                    $('.errorotp').html('OTP Verified')
                    $('.errorotp').css('color', 'green')
                    // window.location.href = "<?php echo base_url(); ?>index.php/user/registration_steptwo?currentpage=1";
                    setTimeout(function() {
                        window.location.href = "<?php echo base_url(); ?>index.php/user/congratulations";
                    }, 1500);
                } else {
                    $('.errorotp').html('Invalid OTP')
                }

            },
        });

    }

    function lettersOnly() {
        var inputValue = event.keyCode;
        if (!(inputValue >= 65 && inputValue <= 122) && (inputValue != 32 && inputValue != 0)) {
            event.preventDefault();
        }
    }

    function tabChange(first, last) {
        if (first.value.length) {
            document.getElementById(last).focus();
        }
    }
    $('input[name="gender"]').change(function() {
        var radioVal = $('input[name="gender"]:checked').val();
        if (radioVal == '1') {
            $('#user_age').children().remove();
            for (var index = 21; index <= 59; index++) {
                $('#user_age').append('<option value="' + index + '">' + index + '</option>');
            }

        } else {
            $('#user_age').children().remove();
            for (var index = 18; index <= 55; index++) {
                $('#user_age').append('<option value="' + index + '">' + index + '</option>');
            }
        }
    });

    function myFunctionread() {
        var dots = document.getElementById("dots");
        var moreText = document.getElementById("more");
        var btnText = document.getElementById("myBtn");

        if (dots.style.display === "none") {
            dots.style.display = "inline";
            btnText.innerHTML = "Read more";
            moreText.style.display = "none";
        } else {
            dots.style.display = "none";
            btnText.innerHTML = "Read less";
            moreText.style.display = "inline";
        }

    }
    $(window).scroll(function() {
        if ($(this).scrollTop() >= 50) { // If page is scrolled more than 50px
            $('#return-to-top').fadeIn(200); // Fade in the arrow
        } else {
            $('#return-to-top').fadeOut(200); // Else fade out the arrow
        }
    });
    $('#return-to-top').click(function() { // When arrow is clicked
        $('body,html').animate({
            scrollTop: 0 // Scroll to top of body
        }, 500);
    });

    $(document).ready(function() {
        $('.owl-carousel').owlCarousel({
            items: 1,
            merge: true,
            loop: true,
            margin: 10,
            video: true,
            autoplay: true,
            autoplayHoverPause: true,
            lazyLoad: true,
            center: true,
            videoWidth: false, // Default false; Type: Boolean/Number
            videoHeight: false, // Default false; Type: Boolean/Number
            responsive: {
                900: {
                    items: 1.20,
                },
                1000: {
                    items: 2,
                }
            }
        })
    });


    // partner slider
    $(".owl-partner").owlCarousel({
        margin: 25,
        responsiveClass: true,
        nav: false,
        dots: false,
        autoplay: true,
        autoplayHoverPause: false,
        loop: true,
        responsive: {
            0: {
                items: 1.2,
            },
            576: {
                items: 1.5,
            },
            768: {
                items: 2.2,
            },
            992: {
                items: 2.5,
            },
            1200: {
                items: 3.2,
            },
            1400: {
                items: 3.5,
            }
        },
    });

    function myFunctionread() {
        var dots = document.getElementById("dots");
        var moreText = document.getElementById("more");
        var btnText = document.getElementById("myBtn");

        if (dots.style.display === "none") {
            dots.style.display = "inline";
            btnText.innerHTML = "Read more";
            moreText.style.display = "none";
        } else {
            dots.style.display = "none";
            btnText.innerHTML = "Read less";
            moreText.style.display = "inline";
        }
    }
</script>
</body>

</html>