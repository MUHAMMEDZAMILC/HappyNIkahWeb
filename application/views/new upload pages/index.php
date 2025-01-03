<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <title>Happy Nikah</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url()?>assets/images/hnicon.png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@300;400;500;600;700;900&family=Noto+Sans+Malayalam:wght@400;500;600&family=Poppins:wght@300;400;500;600;700;800;900&family=Roboto:wght@400;500&display=swap" rel="stylesheet"> 

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css?v=<?= rand(10,100);?>">
    <!-- Global site tag (gtag.js) - Google Analytics -->
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
    <style type="text/css">
        .validationclass{
                color: red;
                font-size: 12px;
                padding: 5px 2px;
        }
        .otpInputs{
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            align-content: space-around;
            justify-content: space-evenly;
        }
        .errorotp{
             text-align: center;
             color: red;
             background: #ff00000f;
             padding: 5px;
        }
 .already-member{
    float: left;
    width: 89px;
    font-size: 10px;
    color: white;
        }
        .loginbtn{
    background: #fdfdfdad;
    width: 90px;
    margin-left: 8px;
    padding: 2px 0px;
     
        }
        
   #banner .overlay{
       background-color: rgb(253 232 232 / 0%);
   }    
   #more 
{
	display: none;
}
   
   #banner .bannerPara {
    background: #ffffff38;
    padding: 15px 4px;
   }
@media only screen and (max-width: 600px) {
    .already-member{
        float: left;
        width: 89px;
        font-size: 10px;
        color: white;
    }
    .loginbtn{
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
                            <a class="nav-link" href="<?php echo site_url('user/about'); ?>" >About us</a>
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
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-5 col-md-12 d-flex align-items-center quran-verse">
                    <p class="bannerPara mb-4 mb-md-0 pe-md-4" align="center">നിങ്ങള്‍ക്ക് സമാധാനപൂര്‍വ്വം ഒത്തുചേരേണ്ടതിനായി നിങ്ങളില്‍ നിന്ന് തന്നെ നിങ്ങള്‍ക്ക് ഇണകളെ സൃഷ്ടിക്കുകയും, നിങ്ങള്‍ക്കിടയില്‍ സ്നേഹവും കാരുണ്യവും ഉണ്ടാക്കുകയും ചെയ്തതും അവന്റെ ദൃഷ്ടാന്തങ്ങളില്‍ പെട്ടതത്രെ. തീര്‍ച്ചയായും അതില്‍ ചിന്തിക്കുന്ന ജനങ്ങള്‍ക്ക് ദൃഷ്ടാന്തങ്ങളുണ്ട് <br><span class="verse-number"> (വിശുദ്ധ ഖുര്‍ആന്‍ 30:21)</span></p>
                    
                </div>
                <div class="col-12 col-lg-7 col-md-12 d-flex align-items-center">
                    <div class="regBox">
                        <div class="regHeadBar mb-4">
                            <div class="regHeadBox borderRight d-flex align-items-center">
                                <div class="w-100 register-heading-desk">
                                    <h2 class="pOne" style="color: #fff;">Register Now</h2>
                                    <span class="hOne" style="color: #f5d310;">its free!</span>
                                </div>
                                <div class="w-100 register-heading-mob">
                                    <h2 class="pOne" style="color: #fff;">Register Now, <span class="hOne" style="color: #ef9781;">its free!</span></h2>
                                    
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
                        <!--<form action="<?php //echo site_url('user/register'); ?>" method="post" autocomplete="off" class="customForm">-->
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <label class="form-label me-4 mb-0 reg_label">Created By:</label>
                                    <select class="form-select form-control" aria-label="" id="created_by" name="created_by">
                                        <option value="">Select</option>
                                        <option value="self">Myself</option>
                                        <option value="Parents">Parents</option>
                                        <option value="Brother">Brother</option>
                                        <option value="Sister">Sister</option>
                                        <option value="Relatives">Relatives</option>
                                    </select>
                                    <p id="created_by_val" class="validationclass"></p>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label me-4 mb-0 reg_label">Name:</label>
                                    <input type="text" class="form-control" placeholder="Full Name" id="name" name="name" onkeypress="return lettersOnly(event)">
                                    <p id="name_val" class="validationclass"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div>
                                    <select name="countryCode" id="countryCode" class="form-control code-country" required>
                                        <option value="0"><?= "ISD";?></option>
                                        <?php
                                        foreach($countryCode as $val){
                                            if($val['country_order'] != '0'){?>
                                            <option value="<?= $val['country_code'];?>"><?= "+".$val['country_code'];?></option>
                                        <?php }}?>
                                    </select>
                                </div>
                                
                                <div class="col-lg-6 col-md-6">
                                    <label class="form-label me-4 mb-0 reg_label">Phone:</label>
                                    <input type="text" class="form-control" placeholder="Phone Number" id="phone" name="phone" maxlength="10" onkeypress="return event.charCode > 47 && event.charCode < 58;" style="padding-left: 70px;">
                                    <span id="countrycode_val" style="color: red;font-size: 12px;"></span>
                                    <p id="phone_val" class="validationclass"></p>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <label class="form-label me-4 mb-0 reg_label">Email:</label>
                                    <input type="email" class="form-control" placeholder="abc@mail.com" name="email" id="email">
                                    <p id="email_val" class="validationclass"></p>
                                </div>
                                
                            </div>
                            <div class="row">
                                
                                 <div class="col-12 col-md-6 col-sm-6">
                                    <div class="row">
                                        <label class="form-label me-4 mb-0 reg_label">Date of birth:</label>
                                        <div class="col-md-4 col-sm-4 co1">
                                            <select class="form-control" name="day" id="txtday">
                                                <option value="">Day</option>
                                                <?php for($i=1;$i<=31;$i++)
                                                {
                                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                                }?>
                                                
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-sm-4 co2">
                                            <select class="form-control" name="month" id="txtmonth">
                                                <option value="">Month</option>
                                                <option value="1">Jan</option>
                                                <option value="2">Feb</option>
                                                <option value="3">Mar</option>
                                                <option value="4">Apr</option>
                                                <option value="5">May</option>
                                                <option value="6">Jun</option>
                                                <option value="7">Jul</option>
                                                <option value="8">Aug</option>
                                                <option value="9">Sep</option>
                                                <option value="10">Oct</option>
                                                <option value="11">Nov</option>
                                                <option value="12">Dec</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-sm-4 co2
                                        ">
                                            <select class="form-control" name="year" id="txtyear">
                                                <option value=""> Year</option>
                                                <option value="1962">1962</option>
                                                <option value="1963">1963</option>
                                                <option value="1964">1964</option>
                                                <option value="1965">1965</option>
                                                <option value="1966">1966</option>
                                                <option value="1967">1967</option>
                                                <option value="1968">1968</option>
                                                <option value="1969">1969</option>
                                                <option value="1970">1970</option>
                                                <option value="1971">1971</option>
                                                <option value="1972">1972</option>
                                                <option value="1973">1973</option>
                                                <option value="1974">1974</option>
                                                <option value="1975">1975</option>
                                                <option value="1976">1976</option>
                                                <option value="1977">1977</option>
                                                <option value="1978">1978</option>
                                                <option value="1979">1979</option>
                                                <option value="1980">1980</option>
                                                <option value="1981">1981</option>
                                                <option value="1982">1982</option>
                                                <option value="1983">1983</option>
                                                <option value="1984">1984</option>
                                                <option value="1985">1985</option>
                                                <option value="1986">1986</option>
                                                <option value="1987">1987</option>
                                                <option value="1988">1988</option>
                                                <option value="1989">1989</option>
                                                <option value="1990">1990</option>
                                                <option value="1991">1991</option>
                                                <option value="1992">1992</option>
                                                <option value="1993">1993</option>
                                                <option value="1994">1994</option>
                                                <option value="1995">1995</option>
                                                <option value="1996">1996</option>
                                                <option value="1997">1997</option>
                                                <option value="1998">1998</option>
                                                <option value="1999">1999</option>
                                                <option value="2000">2000</option>
                                                <option value="2001">2001</option>
                                                <option value="2002">2002</option>
                                                <option value="2003">2003</option>
                                                <option value="2004">2004</option>
                                            </select>
                                        </div>
                                    </div>
                                    <p id="dob_val" class="validationclass"></p>
                                </div>
                                
                                 <div class="col-12 col-md-6 col-sm-6">
                                    <div class="col-md-6">
                                        <label class="form-label me-4 mb-0 reg_label" style="padding-bottom: 8px;">Gender:</label>
                                    </div>
                                    <!--<div class="col-md-6">-->
                                        <div class="form-check-inline custom_radio">
                                            <input class="form-check-input" type="radio" name="gender" id="male" value="1">
                                            <label class="form-check-label" for="male">Male</label>
                                        </div>
                                        <div class="form-check-inline custom_radio">
                                            <input class="form-check-input" type="radio" name="gender" id="female" value="2">
                                            <label class="form-check-label" for="female">Female</label>
                                        </div>
                                    <!--</div>-->
                                    <p id="gender_val" class="validationclass"></p>
                                </div>
                            </div>
                            <div class="row">
                               
                            </div>
                            
                            <?php 
                            // if($_GET['status'])
                            { ?>
                             
                            <!--<a id="notidiv" data-bs-toggle="modal" style="color: red; width: 100%; text-align: center;  float: left;" data-bs-target="#loginModal" style="margin-bottom:20px;"><?php //echo $_GET['status']; ?>  <b style="background: #FF5B85; color: white; padding: 3px 11px; border-radius: 4px; float: right; margin-bottom: 25px; margin-right: 36px;">Login Now</b></a>-->
                            
                            <div class="error_bg" id="reg_error" style="margin-left: auto;margin-right: auto;width: 70%;display: none;">
                                 <a id="notidiv" data-bs-toggle="modal" style="color: #ee0808;font-size:19px;width: 100%;text-align: center;float: left;/*background: #ab3030a3;*/font-weight: 700;" data-bs-target="#loginModal" style="margin-bottom:20px;"><span id="error-mob"></span>  is already registered<b style="background: #FF5B85; color: white; padding: 3px 11px; border-radius: 4px; float: right; margin-bottom: 25px; margin-right: 36px;">Login Now</b></a>
                             </div>
                            
                            <?php } ?>
   <script>
   
   function closenoti(){
        $("#notidiv").hide();
   }
    
    function forgotpassword(){
        
        $('#emailLogBox').hide();
        $('#otpLogBox').show();
        
    } 
    
    
  </script> 
                            <div class="d-sm-flex justify-content-between align-items-center" style="float: left;  width: 100%;">
                                <div class="form-check mb-4 mb-sm-0">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                                    <label class="form-check-label" for="flexCheckDefault">I have read and agree to the <a href="#" data-bs-toggle="modal"  data-bs-target="#termsModal">Terms and Condition</a></label>
                                    <p class="validationclass" id="terms_val"></p>
                                </div>
                                <button type="button" onclick="checkvalidation()" class="btn cstmBtnColr registernow" >Register Now</button>

                                <button type="submit"  id="submitbtn" class="btn cstmBtnColr" style="display:none;">REG</button>
                            </div>
                        <!--</form>-->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        
        function checkvalidation(){

            var created_by = $('#created_by').val();

            var name = $('#name').val();

            var email = $('#email').val();

            var phone= $('#phone').val();

            var countryCode= $('#countryCode option:selected').val();

            var txtday = $('#txtday').val();
            var txtmonth = $('#txtmonth').val();
            var txtyear = $('#txtyear').val();

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
                $('#countrycode_val').html('Please select ISD Code'); 
            }
            else{
                $("#countryCode").removeClass("error-warning");
                $('#countrycode_val').html(''); 
            }

            if(txtday == '')
            { 
                $("#txtday").addClass("error-warning");
                $('#dob_val').html('Field Required'); 
            }
            else
            {
                $("#txtday").removeClass("error-warning");
                $('#dob_val').html(''); 
            }
            if(txtmonth == '')
            { 
                $("#txtmonth").addClass("error-warning");
                $('#dob_val').html('Field Required'); 
            }
            else
            {
                $("#txtmonth").removeClass("error-warning");
                $('#dob_val').html(''); 
            }
            if(txtyear == '')
            { 
                $("#txtyear").addClass("error-warning");
                $('#dob_val').html('Field Required'); 
            }
            else
            {
                $("#txtyear").removeClass("error-warning");
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

            if(created_by !='' && name!='' && phone !='' && checked_gender != null && flexCheckDefault != undefined && countryCode!='0' && txtday != '' && txtmonth != '' && txtyear != '')
            { 
                // $('#submitbtn').click();
                $.ajax({
                    url: "<?php echo site_url('user/register'); ?>",
                    type: "post",
                    dataType: 'json',
                    data: { 
                        created_by:created_by,name:name,phone:phone,countryCode:countryCode,email:email,gender:gender,day:txtday,month:txtmonth,year:txtyear,
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
    </script>
    <section id="homeAbout">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-10 mx-auto text-center">
                    <h2 class="subHead">Get ready <span>with us</span></h2>
                    <p class="para1 mb-5">Happy Nikah is India’s most trusted and user friendly online matrimony portal for Muslims.<br>
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
                    <h2 class="subHead">Find Your <span>Life Partner</span></h2>
                    <p class="para1 mb-5">Happynikah.com Meet your perfect partner from sites to "tie up together",<br>
All Muslim community can find their suitable brides and grooms with thousands of profiles.<a  style="color: #FF5B85;cursor: pointer;"  onclick="myFunctionread()" id="myBtn">Read more</a><span id="dots"></span><br><span id="more" style="text-align: justify;">Happy Nikah is an emerging Muslim matrimony site in Kerala for Malayalee Muslims across the world. This muslim matrimony site will help every Muslim bachelor who seeks life partners in a truly Islamic way. Registration on this <b>best</b> <a href="https://happynikah.com/user/about"> Muslim marriage bureau </a> is free; once completed, the team behind this Muslim community matrimony will screen the profile to validate and confirm its authenticity. After the completion of registration on this marriage bureau, the members can contact each other.
                            The user interface of this nikah matrimonial Happy Nikah, is very easy to use and simple. This <a href="https://happynikah.com/user/about"> matchmaking website </a> provides a free search facility to every Malayalee Muslim bachelor out there. Unlike all other matrimony websites, this Muslim marriage bureau in Kerala will promise you that they are highly committed to the culture and creed of the Islamic religion.
                            Happy Nikah, muslim matrimony site gives special consideration to orphans and differently-abled Muslims. Apart from the safety, security, and credibility of this marriage agency, Happy Nikkah is more focused on charity activities too. Search for your partner through Happy Nikah, an ideal Muslim community matrimony website, and make your marital life even more awesome.</span></p>
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
                            <p class="pOne">Finding your perfect match has never been easier without the Happynikah application</p>
                            <p class="pTwo">Download now and communicate with muslim matches on-the-go!</p>
                            <div class="d-flex">
                                <a href="javascript:void(0)">
                                    <img src="<?php echo base_url() ?>assets/images/appleStore.png" alt="appleStore" width="auto" height="auto" class="storeIcon me-3">
                                </a>
                                <a target="_blank" href="https://play.google.com/store/apps/details?id=com.sysol.happy_nikah">
                                    <img src="<?php echo base_url() ?>assets/images/playStore.png" alt="playStore" width="auto" height="auto" class="storeIcon">
                                </a>
                            </div>
                        </div>
                        <div class="col-12 col-md-5 col-xl-6 text-center position-relative">
                            <img src="<?php echo base_url() ?>assets/images/appMob1.png" alt="playStore" width="auto" height="auto" class="appIcon">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="homeContact" style="display:none">
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
                        <!--<div class="d-flex align-items-center mb-4">-->
                        <!--    <div class="flex-shrink-0">-->
                        <!--        <img src="<?php echo base_url() ?>assets/images/address.png" alt="address" class="icon">-->
                        <!--    </div>-->
                        <!--    <div class="flex-grow-1 ms-3">-->
                        <!--        <p class="addText mb-0">IV th Floor, Neospace,Kinfra Techno Industrial Park Calicut University(PO),Malappuram, India.</p>-->
                        <!--    </div>-->
                        <!--</div>-->
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
    <section id="footer">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 mb-5 mb-md-0">
                    <img src="<?php echo base_url() ?>assets/images/HappyNikah.png" alt="go to Nikah" width="auto" height="auto" class="flogo">
                    <p class="para1" style="">Happy Nikah is an exclusive matrimonial website for Muslims to make happy lives.
We are ready to help Muslims to find their suitable life partner in an Islamic way.
<!--We do not support anything against Islamic law,-->
<!--Only matured Muslim men and women with an intention of marriage are allowed to register at-->
<!--Happynikah.com.-->
Happynikah.com will make your matrimonial searches and online-match making a simple, easy and
happy experience.</p>
                </div>
                <div class="col-12 col-md-1">
                </div>
                <div class="col-12 col-md-3 mb-5 mb-md-0">
                    <h2>Quick Links</h2>
                    <ul class="flinks"> 
                        <li>
                            <a href="https://www.happynikah.com">Register</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('user/about'); ?>"  >About Us</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('user/terms'); ?>" >Terms and Condition</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('user/privacy'); ?>">Privacy Policy</a>
                        </li>
                    </ul>
                </div>
                <div class="col-12 col-md-4">
                    <h2>Follow us</h2>
                    <ul class="socialIcons d-flex">
                        <li>
                            <a href="https://www.facebook.com/happynikahmatrimony">
                                <img src="<?php echo base_url() ?>assets/images/fb.png" alt="facebook" width="auto" height="auto" class="socialLoogo">
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/happynikahmatrimony/">
                                <img src="<?php echo base_url() ?>assets/images/instagram.png" alt="instagram" width="auto" height="auto" class="socialLoogo">
                            </a>
                        </li>
                        <!--<li>-->
                        <!--    <a href="javascript:void(0)">-->
                        <!--        <img src="<?php echo base_url() ?>assets/images/twitter.png" alt="twitter" width="auto" height="auto" class="socialLoogo">-->
                        <!--    </a>-->
                        <!--</li>-->
                        <li>
                            <a href="https://youtube.com/channel/UCbZ6wkcWuVxDBCDG5AGRvhQ">
                                <img src="<?php echo base_url() ?>assets/images/youtube.png" alt="youtube" width="auto" height="auto" class="socialLoogo">
                            </a>
                        </li>
                    </ul>
                    <!--<h3>Download App</h3>-->
                    <!--<div class="d-flex">-->
                    <!--    <a href="javascript:void(0)">-->
                    <!--        <img src="<?php echo base_url() ?>assets/images/appleStoreF.png" alt="appleStore" width="auto" height="auto" class="storeIcon me-3">-->
                    <!--    </a>-->
                    <!--    <a target="_blank" href="https://play.google.com/store/apps/details?id=com.sysol.happy_nikah">-->
                    <!--        <img src="<?php echo base_url() ?>assets/images/playStoreF.png" alt="playStore" width="auto" height="auto" class="storeIcon">-->
                    <!--    </a>-->
                    <!--</div>-->
                    
                    <h3>Contact Info</h3>
                    <div class="d-flex">
                        <ul class="flinks">
                            <li>
                                <div class="flex-grow-1">
                                    <img src="<?php echo base_url() ?>assets/images/telephone.png" alt="telephone" class="icon" style="width: 20px;margin-right: 10px;">
                                    <span class="mobText mb-0" style="font-family: 'Poppins', sans-serif;font-weight: 600;font-size: 16px;">+91-8593999888</span>
                                </div>
                            </li>
                            <li>
                                <div class="flex-grow-1">
                                    <img src="<?php echo base_url() ?>assets/images/mail.png" alt="mail" class="icon"  style="width: 20px;margin-right: 10px;">
                                    <span class="addText mb-0" style="font-family: 'Poppins', sans-serif;font-weight: 500;font-size: 15px;">
                                        <i class="fa fa-envelope"></i>
                                    info@happynikah.com</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <p class="at">© 2022 happynikah All Rights Reserved</p>
                </div>
            </div>
        </div>
    </section>


    <!-- login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true" <?php if($_GET['error'] == 1) { echo 'style="display:block; opacity:1;"'; }?>>
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="row">
                        <div class="col-12 col-lg-6 d-none d-lg-flex align-items-stretch">
                            <div class="leftBox w-100">
                                <h2 class="modalHead mb-4"id="loginModalLabel">Search Profiles<br><span>Anytime! Anywhere!!</span></h2>
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
                                    <h3 class="welcomeHead">Welcome Back!<br><span>Please Login</span></h3>
                                    <img src="<?php echo base_url() ?>assets/images/HappyNikah.png" alt="go to Nikah" class="llogo" width="auto" height="auto">
                                </div>
                                <div class="emailLogBox">
                                   
                                        <div class="mb-3">
                                            <input type="text" id="username_login" class="form-control" placeholder="User ID/Mobile Number">
                                        </div>
                                        <div class="mb-3">
                                            <input type="password" id="password_login" class="form-control" placeholder="Password">
                                        </div>
                                        
                                       
                                        <p id="loginerror" style="color: red; text-align: center; display:none;">Username or Password incorrect</p>

                                        
                                        <p class="text-right forgot"><a onclick="forgotpassword()" style="cursor: pointer; width:100%; float:right; text-align: right!important;">Forgot Password?</a></p>
                                        <p class="note">By continuing, you agree to Happynikah's <a data-bs-toggle="modal"  data-bs-target="#termsModal" href="#">Terms and Condition</a> and <a href="#" data-bs-toggle="modal"  data-bs-target="#termsModal">Privacy Policy.</a></p>
                                        <a href="#" class="btn cstmBtnColr w-100" onclick="login()" id="loginbtn">Login</a>
                                        <!-- <p class="orTxt">OR</p>
                                        <button type="button" class="btn w-100 mb-3 loginOtpBtn">OTP Login</button> -->
                                    
                                </div>
                                <div class="resetpwdLogBox" style="display:none;" >
                                    <p>Enter your registered Mobile Number here to get New Password</p>
                                    <!--<form class="customForm">-->
                                        <div>
                                            <select name="countryCode" id="countryCode1" class="form-control code-country" required="" style="margin-top: 0px;">
                                                <option value="91">+91</option>
                                                <option value="973">+973</option>
                                                <option value="965">+965</option>
                                                <option value="968">+968</option>
                                                <option value="974">+974</option>
                                                <option value="966">+966</option>
                                                <option value="971">+971</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <input type="number" id="resetmobilenumber" name="" class="form-control" placeholder="Mobile Number" style="padding-left: 70px;">
                                            
                                            
                                        </div>
                                        <p class="note">By continuing, you agree to Happynikah's <a href="#" data-bs-toggle="modal"  data-bs-target="#termsModal">Terms and Condition</a> and <a href="<?php echo site_url('user/privacy'); ?>">Privacy Policy.</a></p>
                                        <button type="button" class="btn cstmBtnColr sendOtp w-100" onclick="sendpassword()">Send OTP</button>
                                        <p class="orTxt">OR</p>
                                        <button type="button" class="btn w-100 mb-3 loginEmailBtn"> Login by Mobile and Password</button>
                                    <!--</form>-->
                                </div>
                                <div class="Resetpasswordtab" style="display:none;" >
                                    <p>Enter New Password</p>
                                    <!--<form class="customForm">-->
                                        <div class="mb-3">
                                            <input type="text" id="passwordreset" name="" class="form-control" placeholder="Password">
                                            <br>
                                            <input type="text" id="confirmpasswordreset" name="" class="form-control" placeholder="Confirm Password">
                                             
                                            
                                        </div>
                                        <p class="note">By continuing, you agree to Happynikah's <a href="#" data-bs-toggle="modal"  data-bs-target="#termsModal">Terms and Condition</a> and <a href="#">Privacy Policy.</a></p>
                                        <button type="button" class="btn cstmBtnColr sendOtp w-100" onclick="changepassword()">Change Password</button>
                                        <p class="orTxt">OR</p>
                                        <button type="button" class="btn w-100 mb-3 loginEmailBtn"> Login by Mobile and Password</button>
                                    <!--</form>-->
                                </div>
                                <div class="otpLogBox" style="display:none;" >
                                    <!--<form class="customForm">-->
                                        <div class="mb-3">
                                            <input type="text" name="" class="form-control" placeholder="Mobile Number/Email">
                                        </div>
                                        <p class="note">By continuing, you agree to Happynikah's <a href="#" data-bs-toggle="modal"  data-bs-target="#termsModal">Terms and Condition</a> and <a href="<?php echo site_url('user/privacy'); ?>">Privacy Policy.</a></p>
                                        <button type="button" class="btn cstmBtnColr sendOtp w-100">Send OTP</button>
                                        <p class="orTxt">OR</p>
                                        <button type="button" class="btn w-100 mb-3 loginEmailBtn">Email Login</button>
                                    <!--</form>-->
                                </div>
                                <div class="otpsendBox" style="display:none;" >
                                    <!--<form class="customForm">-->
                                        <div class="mb-3">
                                            <label class="form-label">Enter Your OTP</label>
                                            <div class="otpInputs">
                                                <input id="otpdigit1" type="number" class="form-control" maxlength="1" onkeyup="tabChange(this,'otpdigit2')" autofocus style="width: 40px;"/>
                                                <input id="otpdigit2" type="number" class="form-control" maxlength="1" onkeyup="tabChange(this,'otpdigit3')" style="width: 40px;"/>
                                                <input id="otpdigit3" type="number" class="form-control" maxlength="1" onkeyup="tabChange(this,'otpdigit4')" style="width: 40px;"/>
                                                <input id="otpdigit4" type="number" class="form-control" maxlength="1" onkeyup="tabChange(this,'otpdigit5')" style="width: 40px;"/>
                                                <input id="otpdigit5" type="number" class="form-control" maxlength="1" onkeyup="tabChange(this,'otpdigit6')" style="width: 40px;"/>
                                                <input id="otpdigit6" type="number" class="form-control" maxlength="1"  style="width: 40px;"/>
                                            </div>
                                        </div>
                                        <p class="errorotp"></p>
                                        <button type="button" class="btn cstmBtnColr w-100" onclick="verifyotp()">NEXT</button>
                                        <!--<p class="note text-center mb-1"><a href="javascript:void(0)">Send the Code Again</a></p>-->
                                        <!--<p class="note text-center mb-4"><a href="javascript:void(0)">Change Mobile Number/Emial</a></p>-->
                                        <button type="button" class="btn w-100 mb-3 loginEmailBtn">Login by Mobile and Password</button>
                                    <!--</form>-->
                                </div>
                                <!-- <div class="d-flex justify-content-between mb-3">
                                    <a href="javascript:void(0)" class="regWtFb">
                                        <img src="<?php echo base_url() ?>assets/images/fb2.png" alt="facebook" width="auto" height="auto">
                                        <span>Facebook</span>
                                    </a>
                                    <a href="javascript:void(0)" class="regWtgoogle">
                                        <img src="<?php echo base_url() ?>assets/images/google.png" alt="google" width="auto" height="auto">
                                        <span>Google</span>
                                    </a>
                                </div> -->
                                <p class="text-center newtoTxt">New to HappyNikah <a href="https://www.happynikah.com">Register Now</a></p>
                                
                              
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
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
    
    <!--about us modal-->
    <div class="modal fade" id="aboutModal" tabindex="-1" aria-labelledby="aboutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="row">
                        
                     
                        
 <div class="col-12" style="padding:50px;"> 
 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="float:right"></button>
                    <div style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri","sans-serif";border:none;border-bottom:dashed #666666 1.0pt;padding:0in 0in 0in 0in;'>
    
    <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><strong><span style='font-size:32px;font-family:"Times New Roman","serif";color:#C00000;'>About Us</span></strong></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>Happynikah.com is a premium matrimonial website for Muslims. Our aim is to help Muslims to find their suitable life partner in an Islamic way.</span></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>We are among the most trustworthy and technically suitable life partner in an Islamic way. We do not support anything that&apos;s not Halal in Islam so Happynikah.com is not a dating portal at all. Only matured Muslim men and women with an intention of marriage are allowed to register at Happynikah.com&rsquo;sadvanced matrimonial portals. Happynikah.com will make your matrimonial searches and online-match making a simple, easy and happy experience. No wonder as the number of memberships of Happynikah.com is greatly increasing day by day.</span></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><strong><span style='font-size:16px;font-family:"Times New Roman","serif";'>Highlights of Happynikah.com</span></strong></p>
    <ul style="margin-bottom:0in;" type="disc">
        <li style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>Global and wide set of profiles.</span></li>
        <li style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>Free and easy profile registration.</span></li>
        <li style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>Safe and secure site. 100% privacy guaranteed.</span></li>
        <li style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>Registered profiles are manually screened or validated to ensure that they meet the norms of our site.&nbsp;</span></li>
        <li style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>E-mail &amp; mobile alerts when members contact each other.</span></li>
    </ul>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><strong><span style='font-size:16px;font-family:"Times New Roman","serif";'>The aim of Happynikah.com is clear</span></strong></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>Understand the needs and concerns of singles Muslims through tireless research and analysis.<br>&nbsp;Provide a pleasant, satisfying, and superior matchmaking experience to our customers while ensuring their privacy and security.<br>&nbsp;Give our customers complete control through easy to use interfaces and features that can help them identify, filter and contact potential partners.</span></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>Happynikah.com is entirely committed to the creed of Islam. It is quite safe, secure and confidential. Our management team is highly Islamic and our employees are dedicated to make this online matrimonial channel the leader in the field of Muslim matrimony. Happynikah.com fulfils all needs of today&apos;s Muslim singles that are truly searching for suitable and valuable ways to meet with their prospective life partners.</span></p>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Times New Roman","serif";'>If you are urgently looking for life partner, we invite you to join Happynikah.com and experience the happiness and overwhelming results to lead a success in finding a suitable Muslim life partner, Insha&rsquo;Allah.</span></p>
</div>
   </div>                      
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/bootstrap.bundle.min.js"></script>

    <script src="<?php echo base_url() ?>assets/js/owl.carousel.js"></script>

    <script type="text/javascript">
    
    $(document).ready(function(){
        $('#otpModal').modal({
            backdrop:'static',
        })
        
    })
    
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
                        window.location.href = "<?php echo base_url();?>index.php/user/registration_steptwo?currentpage=1";
                    }, 1500);
                }
                else
                {
                    $('.errorotp').html('Invalid OTP')
                }
                
            },
        });
        
    }

function login(){
        
        var username = $('#username_login').val();
        var password = $('#password_login').val();
        
        $('#loginbtn').html('<i class="fa fa-circle-o-notch fa-spin" style="font-size:24px"></i>  Please wait....');
        
        $.ajax({
        url: "<?php echo site_url('user/login'); ?>",
        type: "post",
        data: { username:username,password:password},
        success: function (response) {
            
            if(response == 2){ 
                
                 
                
                $('#loginerror').show();
                
                $('#loginbtn').html('Login');
            
            }else{
                
                window.location.href = "<?php echo site_url('user/home'); ?>";
            }
            
           // You will get response from your PHP page (what you echo or print)
        },
        // error: function(jqXHR, textStatus, errorThrown) {
        //   console.log(textStatus, errorThrown);
        // }
        });
        
    
    }
    
    function forgotpassword(){
        
        $('.emailLogBox').hide();
        $('.resetpwdLogBox').show();
        
    }
    
    function sendpassword(){
        
        
        var mobile = $('#resetmobilenumber').val();
        var code = $('#countryCode1').val();
        
        $('.otpsendBox').show();
        $('.resetpwdLogBox').hide();
        
        $.ajax({
        url: "<?php echo base_url('home/resetpassword');?>",
        type: "post",
        data: { mobile:mobile,code:code},
        success: function (response) {
            
            if(response == 2){ 
                
                $('.otpsendBox').hide();
                $('.resetpwdLogBox').show();
                
                alert('Mobile Number not registered');
            
            }
            
           // You will get response from your PHP page (what you echo or print)
        },
        // error: function(jqXHR, textStatus, errorThrown) {
        //   console.log(textStatus, errorThrown);
        // }
     });
        
    }
    
    function verifyotp(){
        
        var otpdigit1 = $('#otpdigit1').val();
        var otpdigit2 = $('#otpdigit2').val();
        var otpdigit3 = $('#otpdigit3').val();
        var otpdigit4 = $('#otpdigit4').val();
        var otpdigit5 = $('#otpdigit5').val();
        var otpdigit6 = $('#otpdigit6').val();
        
        $.ajax({
        url: "<?php echo base_url('home/verifyotp');?>",
        type: "post",
        data: { otpdigit1:otpdigit1,otpdigit2:otpdigit2,otpdigit3:otpdigit3,otpdigit4:otpdigit4,otpdigit5:otpdigit5,otpdigit6:otpdigit6},
        success: function (response) {
            
            
            
            if(response == 1){
                
                $('.Resetpasswordtab').show();
                $('.otpsendBox').hide();
                
                
            }else{ 
                
                $('.errorotp').html('Invalid OTP');
                
                
            } 
            
            
            

           // You will get response from your PHP page (what you echo or print)
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }
     });
        
    }
    
    
    function changepassword(){
        
        
        var confirmpasswordreset = $('#confirmpasswordreset').val();
        
        var passwordreset = $('#passwordreset').val();
        
        
        if(confirmpasswordreset == passwordreset){
            
        $.ajax({
        url: "<?php echo base_url('home/changepassword');?>",
        type: "post",
        data: { confirmpasswordreset:confirmpasswordreset,passwordreset:passwordreset},
        success: function (response) {
            
            
            
            if(response == 1){
                
            alert('Sucessfully changed your password. Please login to continue !');    
            $('.emailLogBox').show();
            $('.otpsendBox').hide();
            $('.Resetpasswordtab').hide();
                
                // $('.Resetpasswordtab').show();
                // $('.otpsendBox').hide();
                
                
            }else{ 
                
                // $('.errorotp').html('Invalid OTP');
                
                
            } 
            
            
            

           // You will get response from your PHP page (what you echo or print)
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }
     });
            
            
        }else{
            alert('Password and Confirm Password Miss-match');
        }
        
        
        
    }
        $(document).ready(function () {
            // partner slider
            $(".owl-partner").owlCarousel({
                margin: 25,
                responsiveClass: true,
                nav: false,
                dots: false,
                autoplay: true,
                autoplayHoverPause: false,
                loop:true,
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
            // partner slider end

            // burger menu
            $(".hamburger").click(function(){
                $(this).toggleClass("is-active");
                $('body').toggleClass("is-scroll-disabled");
            });
            // burger menu end

            // login with otp and email switch
            $(".loginOtpBtn").click(function(){
                $(".emailLogBox").hide();
                $(".otpLogBox").show();
            }); 
            $(".loginEmailBtn").click(function(){
                $(".otpLogBox").hide();
                $(".emailLogBox").show();
                $('.resetpwdLogBox').hide();
                $('.otpsendBox').hide();
            });
            $(".sendOtp").click(function(){
                $(".otpLogBox").hide();
                // $(".otpsendBox").show();
            });
        });
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