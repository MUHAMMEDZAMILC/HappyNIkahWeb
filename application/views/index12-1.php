<!DOCTYPE html>
<html>
<?php include('include/header.php'); ?>
    <section id="banner">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-5 d-flex align-items-center">
                    <p class="bannerPara mb-4 mb-md-0 pe-md-4">നിങ്ങള്‍ക്ക് സമാധാനപൂര്‍വ്വം ഒത്തുചേരേണ്ടതിനായി നിങ്ങളില്‍ നിന്ന് തന്നെ നിങ്ങള്‍ക്ക് ഇണകളെ സൃഷ്ടിക്കുകയും, നിങ്ങള്‍ക്കിടയില്‍ സ്നേഹവും കാരുണ്യവും ഉണ്ടാക്കുകയും ചെയ്തതും അവന്റെ ദൃഷ്ടാന്തങ്ങളില്‍ പെട്ടതത്രെ. തീര്‍ച്ചയായും അതില്‍ ചിന്തിക്കുന്ന ജനങ്ങള്‍ക്ക് ദൃഷ്ടാന്തങ്ങളുണ്ട്  (വിശുദ്ധ ഖുര്‍ആന്‍ 30:21)</p>
                    
                </div>
                <div class="col-12 col-md-7 d-flex align-items-center">
                    <div class="regBox">
                        <div class="regHeadBar mb-4">
                            <div class="regHeadBox borderRight d-flex align-items-center">
                                <div class="w-100">
                                    <h2 class="hOne">Register Now</h2>
                                    <p class="pOne">its free!</p>
                                </div>
                            </div>
                            <div class="regHeadBox borderRight d-flex align-items-center">
                                <h3 class="hTwo">ഇരുലോക വിജയത്തിന് അനുയോജ്യരായ ജീവിത പങ്കാളിയെ കണ്ടെത്തൂ..</h3>
                            </div>
                            <div class="regHeadBox d-flex align-items-center">
                                <div class="">
                                    <p class="pTwo">Register using</p>
                                    <div class="d-flex justify-content-lg-between">
                                        <a href="javascript:void(0);" class="regalterIcon me-4">
                                            <img src="<?php echo base_url() ?>assets/images/google.png" class="regalterIcon" width="auto" height="auto" alt="google">
                                        </a>
                                        <a href="javascript:void(0);" class="regalterIcon">
                                            <img src="<?php echo base_url() ?>assets/images/facebook.png" width="auto" height="auto" alt="facebook">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form class="customForm">
                            <div class="row">
                                <div class="col-12 col-md-6 mb-3">
                                    <select class="form-select form-control" aria-label=""  name="created_by" id="created_by">
                                        <option value="">Select</option>
                                        <option value="self">Myself</option>
                                        <option value="Parents">Parents</option>
                                        <option value="Brother">Brother</option>
                                        <option value="Sister">Sister</option>
                                        <option value="Relatives">Relatives</option>
                                    </select>
                                    <span id="created_by_val" class="validationclass" style="color: red;font-size: 15px;"></span>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <input type="text" class="form-control" placeholder="Name" name="name" id="name" onkeypress="return lettersOnly(event)">
                                    <span id="name_val" class="validationclass" style="color: red;font-size: 15px;"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6 mb-3">
                                    <div class="d-flex">
                                        <select name="countryCode" id="countryCode" class="form-select phoneSelect" required>
                                        <option value="0"><?= "ISD";?></option>
                                        <?php
                                        foreach($countryCode as $val){
                                            if($val['country_order'] != '0'){?>
                                            <option value="<?= $val['country_code'];?>"><?= "+".$val['country_code'];?></option>
                                        <?php }}?>
                                    </select>
                                        <input type="text" class="form-control" placeholder="Phone" id="phone" name="phone" maxlength="10" onkeypress="return event.charCode > 47 && event.charCode < 58;" >
                                        
                                    </div>
                                    <span id="countrycode_val" style="color: red;font-size: 15px;"></span>
                                    <span id="phone_val" class="validationclass" style="color: red;font-size: 15px;"></span>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <input type="date" class="form-control" placeholder="Date of Birth" id="dob" name="dob" title="Date of Birth" min="1962-01-01" max="2004-12-30">
                                    <span id="dob_val" class="validationclass" style="color: red;font-size: 15px;"></span>

                                </div>
                            </div>
                            <div class="row">
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
                            </div>
                            <div class="d-sm-flex justify-content-between align-items-center">
                                <div class="form-check mb-4 mb-sm-0">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">I have read and agree to the <a href="terms.html">Terms of Use</a></label>
                                    <br><span class="validationclass" id="terms_val" style="color: red;font-size: 15px;"></span>

                                </div>
                                <button type="button" class="btn cstmBtnColr" onclick="checkvalidation()">Register Now</button>
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
                    <p class="para1 mb-5">Donec id auctor elit. Donec tristique purus non enim tristique, at rhoncus dolor blandit. Vestibulum blandit orci felis, ac mollis tortor consequat ac. Curabitur maximus ex eu hendrerit placerat.</p>
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
                    <h2 class="subHead">Find Your <span>Life Partner</span></h2>
                    <p class="para1 mb-5">Donec id auctor elit. Donec tristique purus non enim tristique, at rhoncus dolor blandit. Vestibulum blandit orci felis, ac mollis tortor consequat ac. Curabitur maximus ex eu hendrerit placerat.</p>
                </div>
            </div>
        </div>
        <div class="lPull">
            
            <div class="owl-partner owl-carousel owl-theme">
                <div class="item">
                    <div class="profCard">
                        <div class="d-flex justify-content-between mb-3">
                            <div class="pe-3">
                                <div class="name d-flex align-items-center">
                                    <img src="<?php echo base_url() ?>assets/images/name.png" alt="name" width="auto" height="auto" class="profileico">
                                    <span>Talon Dooley</span>
                                </div>
                                <div class="detls d-flex align-items-center">
                                    <img src="<?php echo base_url() ?>assets/images/physic.png" alt="name" width="auto" height="auto" class="profileico">
                                    <span>25 Yrs, 5' 0"</span>
                                </div>
                                <div class="detls d-flex align-items-center">
                                    <img src="<?php echo base_url() ?>assets/images/suitcase.png" alt="name" width="auto" height="auto" class="profileico">
                                    <span>Chief Program Liaison</span>
                                </div>
                                <div class="detls d-flex align-items-center">
                                    <img src="<?php echo base_url() ?>assets/images/star.png" alt="name" width="auto" height="auto" class="profileico">
                                    <span>Other, Sunni</span>
                                </div>
                                <div class="detls d-flex align-items-center">
                                    <img src="<?php echo base_url() ?>assets/images/loctn.png" alt="name" width="auto" height="auto" class="profileico">
                                    <span>Lake Halieville</span>
                                </div>
                            </div>
                            <div class="imgBox">
                                <img src="<?php echo base_url() ?>assets/images/profile.png" alt="profile image" width="auto" height="auto" class="profileImg">
                            </div>
                        </div>
                        <button class="btn connectBtn">
                            <img src="<?php echo base_url() ?>assets/images/payment.png" alt="tick" width="auto" height="auto">
                            <span>Connect Now</span>
                        </button>
                    </div>
                </div>
                <div class="item">
                    <div class="profCard">
                        <div class="d-flex justify-content-between mb-3">
                            <div class="pe-3">
                                <div class="name d-flex align-items-center">
                                    <img src="<?php echo base_url() ?>assets/images/name.png" alt="name" width="auto" height="auto" class="profileico">
                                    <span>Talon Dooley</span>
                                </div>
                                <div class="detls d-flex align-items-center">
                                    <img src="<?php echo base_url() ?>assets/images/physic.png" alt="name" width="auto" height="auto" class="profileico">
                                    <span>25 Yrs, 5' 0"</span>
                                </div>
                                <div class="detls d-flex align-items-center">
                                    <img src="<?php echo base_url() ?>assets/images/suitcase.png" alt="name" width="auto" height="auto" class="profileico">
                                    <span>Chief Program Liaison</span>
                                </div>
                                <div class="detls d-flex align-items-center">
                                    <img src="<?php echo base_url() ?>assets/images/star.png" alt="name" width="auto" height="auto" class="profileico">
                                    <span>Other, Sunni</span>
                                </div>
                                <div class="detls d-flex align-items-center">
                                    <img src="<?php echo base_url() ?>assets/images/loctn.png" alt="name" width="auto" height="auto" class="profileico">
                                    <span>Lake Halieville</span>
                                </div>
                            </div>
                            <div class="imgBox">
                                <img src="<?php echo base_url() ?>assets/images/myProfile1.png" alt="profile image" width="auto" height="auto" class="profileImg">
                            </div>
                        </div>
                        <button class="btn connectBtn">
                            <img src="<?php echo base_url() ?>assets/images/payment.png" alt="tick" width="auto" height="auto">
                            <span>Connect Now</span>
                        </button>
                    </div>
                </div>
                <div class="item">
                    <div class="profCard">
                        <div class="d-flex justify-content-between mb-3">
                            <div class="pe-3">
                                <div class="name d-flex align-items-center">
                                    <img src="<?php echo base_url() ?>assets/images/name.png" alt="name" width="auto" height="auto" class="profileico">
                                    <span>Talon Dooley</span>
                                </div>
                                <div class="detls d-flex align-items-center">
                                    <img src="<?php echo base_url() ?>assets/images/physic.png" alt="name" width="auto" height="auto" class="profileico">
                                    <span>25 Yrs, 5' 0"</span>
                                </div>
                                <div class="detls d-flex align-items-center">
                                    <img src="<?php echo base_url() ?>assets/images/suitcase.png" alt="name" width="auto" height="auto" class="profileico">
                                    <span>Chief Program Liaison</span>
                                </div>
                                <div class="detls d-flex align-items-center">
                                    <img src="<?php echo base_url() ?>assets/images/star.png" alt="name" width="auto" height="auto" class="profileico">
                                    <span>Other, Sunni</span>
                                </div>
                                <div class="detls d-flex align-items-center">
                                    <img src="<?php echo base_url() ?>assets/images/loctn.png" alt="name" width="auto" height="auto" class="profileico">
                                    <span>Lake Halieville</span>
                                </div>
                            </div>
                            <div class="imgBox">
                                <img src="<?php echo base_url() ?>assets/images/myProfile3.png" alt="profile image" width="auto" height="auto" class="profileImg">
                            </div>
                        </div>
                        <button class="btn connectBtn">
                            <img src="<?php echo base_url() ?>assets/images/payment.png" alt="tick" width="auto" height="auto">
                            <span>Connect Now</span>
                        </button>
                    </div>
                </div>
                <div class="item">
                    <div class="profCard">
                        <div class="d-flex justify-content-between mb-3">
                            <div class="pe-3">
                                <div class="name d-flex align-items-center">
                                    <img src="<?php echo base_url() ?>assets/images/name.png" alt="name" width="auto" height="auto" class="profileico">
                                    <span>Talon Dooley</span>
                                </div>
                                <div class="detls d-flex align-items-center">
                                    <img src="<?php echo base_url() ?>assets/images/physic.png" alt="name" width="auto" height="auto" class="profileico">
                                    <span>25 Yrs, 5' 0"</span>
                                </div>
                                <div class="detls d-flex align-items-center">
                                    <img src="<?php echo base_url() ?>assets/images/suitcase.png" alt="name" width="auto" height="auto" class="profileico">
                                    <span>Chief Program Liaison</span>
                                </div>
                                <div class="detls d-flex align-items-center">
                                    <img src="<?php echo base_url() ?>assets/images/star.png" alt="name" width="auto" height="auto" class="profileico">
                                    <span>Other, Sunni</span>
                                </div>
                                <div class="detls d-flex align-items-center">
                                    <img src="<?php echo base_url() ?>assets/images/loctn.png" alt="name" width="auto" height="auto" class="profileico">
                                    <span>Lake Halieville</span>
                                </div>
                            </div>
                            <div class="imgBox">
                                <img src="<?php echo base_url() ?>assets/images/myProfile4.png" alt="profile image" width="auto" height="auto" class="profileImg">
                            </div>
                        </div>
                        <button class="btn connectBtn">
                            <img src="<?php echo base_url() ?>assets/images/payment.png" alt="tick" width="auto" height="auto">
                            <span>Connect Now</span>
                        </button>
                    </div>
                </div>
                <div class="item">
                    <div class="profCard">
                        <div class="d-flex justify-content-between mb-3">
                            <div class="pe-3">
                                <div class="name d-flex align-items-center">
                                    <img src="<?php echo base_url() ?>assets/images/name.png" alt="name" width="auto" height="auto" class="profileico">
                                    <span>Talon Dooley</span>
                                </div>
                                <div class="detls d-flex align-items-center">
                                    <img src="<?php echo base_url() ?>assets/images/physic.png" alt="name" width="auto" height="auto" class="profileico">
                                    <span>25 Yrs, 5' 0"</span>
                                </div>
                                <div class="detls d-flex align-items-center">
                                    <img src="<?php echo base_url() ?>assets/images/suitcase.png" alt="name" width="auto" height="auto" class="profileico">
                                    <span>Chief Program Liaison</span>
                                </div>
                                <div class="detls d-flex align-items-center">
                                    <img src="<?php echo base_url() ?>assets/images/star.png" alt="name" width="auto" height="auto" class="profileico">
                                    <span>Other, Sunni</span>
                                </div>
                                <div class="detls d-flex align-items-center">
                                    <img src="<?php echo base_url() ?>assets/images/loctn.png" alt="name" width="auto" height="auto" class="profileico">
                                    <span>Lake Halieville</span>
                                </div>
                            </div>
                            <div class="imgBox">
                                <img src="<?php echo base_url() ?>assets/images/mProfile10.png" alt="profile image" width="auto" height="auto" class="profileImg">
                            </div>
                        </div>
                        <button class="btn connectBtn">
                            <img src="<?php echo base_url() ?>assets/images/payment.png" alt="tick" width="auto" height="auto">
                            <span>Connect Now</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="homeDownload">
        <div class="container">
            <div class="row">
                <div class="col-12 col-xxl-10 mx-auto">
                    <div class="row">
                        <div class="col-12 col-md-7 col-xl-6">
                            <h2 class="subHead mb-4">Search Profiles<br><span>Anytime! Anywhere!!</span></h2>
                            <p class="pOne">Finding your perfect match has never been easier with the Happy nikah application</p>
                            <p class="pTwo">Download now and communicate with muslim matches on-the-go!</p>
                            <div class="d-flex">
                                <a href="javascript:void(0)">
                                    <img src="<?php echo base_url() ?>assets/images/appleStore.png" alt="appleStore" width="auto" height="auto" class="storeIcon me-3">
                                </a>
                                <a href="javascript:void(0)">
                                    <img src="<?php echo base_url() ?>assets/images/playStore.png" alt="playStore" width="auto" height="auto" class="storeIcon">
                                </a>
                            </div>
                        </div>
                        <div class="col-12 col-md-5 col-xl-6 text-center position-relative">
                            <img src="<?php echo base_url() ?>assets/images/appMob.png" alt="playStore" width="auto" height="auto" class="appIcon">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="homeVid">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12 col-md-8 mx-auto text-center">
                    <h2 class="subHead">Sed ut perspiciatis unde <span>omnis iste natus</span></h2>
                    <p class="para1 mb-5">Donec id auctor elit. Donec tristique purus non enim tristique, at rhoncus dolor blandit. Vestibulum blandit orci felis, ac mollis tortor consequat ac. Curabitur maximus ex eu hendrerit placerat.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-4 mb-4 mb-md-0">
                    <div class="ratio ratio-16x9">
                        <iframe src="https://www.youtube.com/embed/E6hauEqYy7I" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4 mb-md-0">
                    <div class="ratio ratio-16x9">
                        <iframe src="https://www.youtube.com/embed/E6hauEqYy7I" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4 mb-md-0">
                    <div class="ratio ratio-16x9">
                        <iframe src="https://www.youtube.com/embed/E6hauEqYy7I" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="homeContact">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-5 d-flex align-items-center mb-5 mb-md-0">
                    <form class="customForm w-100">
                        <div class="row">
                            <div class="col-12 col-md-6 mb-3">
                                <input type="text" name="" placeholder="Name" class="form-control">
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <input type="email" name="" placeholder="Email" class="form-control">
                            </div>
                        </div>
                        <div class="mb-4">
                            <textarea class="form-control" rows="5"></textarea>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn cstmBtnColr">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="col-12 col-md-6 d-flex align-items-center ms-auto">
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
                                <p class="mobText mb-0">+91-9895-217939</p>
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
                                                <input id="verify1" type="text" class="form-control" maxlength="1" onkeyup="tabChange(this,'verify2')"/>
                                                <input id="verify2" type="text" class="form-control" maxlength="1" onkeyup="tabChange(this,'verify3')"/>
                                                <input id="verify3" type="text" class="form-control" maxlength="1" onkeyup="tabChange(this,'verify4')"/>
                                                <input id="verify4" type="text" class="form-control" maxlength="1" onkeyup="tabChange(this,'verify5')"/>
                                                <input id="verify5" type="text" class="form-control" maxlength="1" onkeyup="tabChange(this,'verify6')"/>
                                                <input id="verify6" type="text" class="form-control" maxlength="1"/>
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
    <?php include('include/footer.php'); ?>

    <script type="text/javascript">
         $(document).ready(function(){
        $('#otpModal').modal({
            backdrop:'static',
        })
        
    })
        function checkvalidation(){

            var created_by = $('#created_by').val();

            var name = $('#name').val();

            var phone= $('#phone').val();

            var countryCode= $('#countryCode option:selected').val();

            var dob = $('#dob').val();
           
            var flexCheckDefault = $('#flexCheckDefault:checked').val();
            
            if(created_by == '')
            { 
               
               $("#created_by").addClass("error-warning");
                $('#created_by_val').html('Field Required'); 
            }
            else
            {
                $("#created_by").removeClass("error-warning");
                $('#created_by_val').html(''); 
            }

            if(name == '')
            { 
                $("#name").addClass("error-warning");
                $('#name_val').html('Field Required'); 
            }
            else
            {
                $("#name").removeClass("error-warning");
                $('#name_val').html(''); 
            }

            if(phone == '')
            { 
                $("#phone").addClass("error-warning");
                $('#phone_val').html('Field Required'); 
            }
            else{
                $("#phone").removeClass("error-warning");
                $('#phone_val').html(''); 
            }
            
            if(countryCode == '0')
            {
                $("#countryCode").addClass("error-warning");
                $('#countrycode_val').html('Field Required'); 
            }
            else{
                $("#countryCode").removeClass("error-warning");
                $('#countrycode_val').html(''); 
            }

            if(dob == '')
            { 
                $("#dob").addClass("error-warning");
                $('#dob_val').html('Field Required'); 
            }
            else
            {
                $("#dob").removeClass("error-warning");
                $('#dob_val').html(''); 
            }
          
            if(flexCheckDefault == undefined)
            {
                $('#flexCheckDefault').addClass("error-warning");
                $('#terms_val').html('Please agree to our terms and conditions');
            }
            else
            {
                $('#flexCheckDefault').removeClass("error-warning");
                $('#terms_val').html('');
            }

            var checked_gender = document.querySelector('input[name = "gender"]:checked');

            var gender = $(checked_gender).val();

            if(checked_gender == null)
            { 
                $('#gender_val').html('Field Required');  
            }
            else
            { 
                $('#gender_val').html('');  
            }

            if(created_by !='' && name!='' && phone !='' && checked_gender != null && flexCheckDefault != undefined && countryCode!='0' && dob != '')
            { 
                
                // $('#submitbtn').click();
                $.ajax({
                    url: "<?php echo site_url('user/register'); ?>",
                    type: "post",
                    dataType: 'json',
                    data: { 
                        created_by:created_by,name:name,phone:phone,countryCode:countryCode,gender:gender,dob:dob,
                    },
                    success: function (response) {
                        if(response != 1)
                        {
                            $('#reg_error').css('display','block');
                            $('#error-mob').html(response);
                            
                        }
                        else
                        {
                            $('#reg_error').css('display','none');
                            //$('.registernow').html('Registering...');
                            $('#otpModal').modal('show');
                        }
                    },
                });
            }

        }
        function verify_mobile(){
        
        var otpdigit1 = $('#verify1').val();
        var otpdigit2 = $('#verify2').val();
        var otpdigit3 = $('#verify3').val();
        var otpdigit4 = $('#verify4').val();
        var otpdigit5 = $('#verify5').val();
        var otpdigit6 = $('#verify6').val();
        
        $.ajax({
            url: "<?php echo base_url();?>index.php/user/verify_mobile?currentpage=1",
            type: "post",
            data: { otpdigit1:otpdigit1,otpdigit2:otpdigit2,otpdigit3:otpdigit3,otpdigit4:otpdigit4,otpdigit5:otpdigit5,otpdigit6:otpdigit6},
            success: function (response) {
                console.log(response)
                if(response == 1)
                {
                    $('.errorotp').html('OTP Verified')
                    $('.errorotp').css('color','green')
                    // window.location.href = "<?php echo base_url();?>index.php/user/registration_steptwo?currentpage=1";
                    setTimeout(function() {
                        window.location.href = "<?php echo base_url();?>index.php/user/congratulations";
                    }, 1500);
                }
                else
                {
                    $('.errorotp').html('Invalid OTP')
                }
                
            },
        });
        
    }
    function lettersOnly() 
        {
            var inputValue = event.keyCode;
            if(!(inputValue >= 65 && inputValue <= 122) && (inputValue != 32 && inputValue != 0)){
                event.preventDefault();
            }
        }
        function tabChange(first,last)
         {
            if(first.value.length){
                document.getElementById(last).focus();
            }
         }
    </script>
</body>
</html> 