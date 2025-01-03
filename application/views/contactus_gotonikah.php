        <!DOCTYPE html>
        <html>
        <?php include('include/contactheader_gotonikah.php'); ?>
        <section id="utilityPage" class="pb-0">
        <div class="container">
        <div class="row">
        <div class="col-12">
        <div class="headBox mb-0" style="background: transparent linear-gradient(90deg, #1B3F1C 0%, #5ABA47 100%) 0% 0% no-repeat padding-box;">
        <h2>Contact Us</h2>
        </div>
        </div>
        </div>
        </div>
        </section>
        
       
    <!-- <style>
     #homeContact .form-control {
    border: none;
    }
        #moblogin 
        {
        margin-left: -105px;
        visibility: hidden;
        }
        
        @media (min-width: 280px) and (max-width: 991px)
        {
        input#name {
        margin-top: 0px !important;
        }
        p.contact 
        {
        margin-right: 20px;
        margin-left: 20px;
        }
        
        }
        </style> -->   
        
        <style>
           orm {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}

.col {
    width: 400px;
    min-width: 300px;
}

form .minput {
    position: relative;
    margin: 26px 10px;
    width: 90%;
    max-width: 400px;
}

.minput input {
    font-size: 20px;
    padding: 1px 4px;
    display: block;
    width: 100%;
    border: none;
    font-family: 'Yanone Kaffeesatz', sans-serif;
    letter-spacing: 1px;
    color: #3E4651;
    -webkit-border-radius: 2px 0 0 2px;
    -moz-border-radius: 2px 0 0 2px;
    border-radius: 2px 0 0 2px;
    border-bottom: 1px solid #dadada;
}

.minput input[type="number"] {
    width: 60px;
    padding-right: 0;
}

input[type="number"] ~ .bar {
    width: 60px;
}

input[type="number"] ~ label {
    margin: 0;
}

.minput input:focus {
    outline: none;
}

.minput label {
    color: #afafaf;
    font-size: 20px;
    font-weight: normal;
    position: absolute;
    pointer-events: none;
    left: 5px;
    top: -2px;
    transition: 0.2s ease all;
    -moz-transition: 0.2s ease all;
    -webkit-transition: 0.2s ease all;
}

textarea:focus ~ label,
textarea:valid ~ label,
input:focus ~ label,
input:valid ~ label,
.up ~ label {
    top: -19px;
    font-size: 18px;
}

.bar {
    position: relative;
    display: block;
    width: 100%;
}

.bar:before,
.bar:after {
    content: '';
    height: 2px;
    width: 0;
    bottom: 0;
    background-color: #afafaf;
    position: absolute;
    transition: 0.2s ease all;
    -moz-transition: 0.2s ease all;
    -webkit-transition: 0.2s ease all;
}

.bar:before {
    left: 50%;
}

.bar:after {
    right: 50%;
}

input:focus ~ .bar:before,
input:focus ~ .bar:after {
    width: 50%;
}

input[type=submit] {
    cursor: pointer;
    background-color:#5ABA47;
    color: white;
    border-radius: 3px;
    border: none;
    max-width: 125px;
}

input:disabled {
    background: #3B7E87;
    cursor: not-allowed;
}


/* Button radio/checkbox/select */

.control {
    display: block;
    position: relative;
    padding-left: 30px;
    margin-bottom: 10px;
    cursor: pointer;
    font-size: 20px;
    color: #afafaf;
    margin: 6px 10px;
}

.control input {
    position: absolute;
    z-index: -1;
    opacity: 0;
}

.control__indicator {
    position: absolute;
    top: -2px;
    left: 0;
    height: 20px;
    width: 20px;
    background: #afafaf;
}

.control:hover input ~ .control__indicator,
.control input:focus ~ .control__indicator {
    background: #ccc;
}
.control:hover input:not([disabled]):checked ~ .control__indicator,
.control input:disabled ~ .control__indicator {
    background: #e6e6e6;
    opacity: 0.6;
    pointer-events: none;
}

.control__indicator:after {
    content: '';
    position: absolute;
    display: none;
}
textarea::placeholder {
  color: #fff; 
}

        </style>
        
     <section id="homeContact">
        <div class="container">
            <div class="row">
                <div class="col-12 col-xl-10 mx-auto">
                    <div class="row">
                        <div class="col-12 col-md-6 col-xxl-6 d-flex align-items-center mb-5 mb-md-0">
                         <form class="customForm w-100" method="post" action="<?php echo base_url('user/contact_submit'); ?>">
                              <span id="success" style="color:green"></span>
                            <span id="error" style="color:red"></span>
                        
                                    <div id="success-message" class="popup">
                            <p><b><?php echo $this->session->flashdata('success'); ?></b></p>
                             </div>
                             
                                 <div id="failure-message" class="popup">
                            <p><b><?php echo $this->session->flashdata('failure'); ?></b></p>
                             </div>
                                <br>
                                
                            <div class="col">
                                <div class="minput">
                                    <input type="text" id="name" name="name" dir="auto" required>
                                    <span class="bar"></span>
                                    <label>Name</label>
                                </div>
                                <div class="minput">
                                    <input type="text" id="phone" name="phone" dir="auto" onkeypress="if (!window.__cfRLUnblockHandlers) return false; if (!window.__cfRLUnblockHandlers) return false; if (!window.__cfRLUnblockHandlers) return false; return event.charCode > 47 &amp;&amp; event.charCode < 58;" required>
                                    <span class="bar"></span>
                                    <label>Phone</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="minput">
                                    <input type="email" id="email" dir="ltr" class="" required>
                                    <span class="bar"></span>
                                    <label>Email</label>
                                </div>
                                 <div class="minput">
                                    <textarea class="form-control" rows="5" id="message">Message Here....</textarea>
                                </div>
                                <div class="minput">
                                    <input type="submit" id="submit" value="Submit" disabled="true" style="padding:5px;padding-top:7px;background-color:#5ABA47;">
                                </div>
                               
                            </div>
                        </form>
                        </div>
                        <!--<div class="col-12 col-md-6 col-xxl-6 d-flex align-items-center mb-5 mb-md-0">
                          <form class="customForm w-100" method="post" action="<?php echo base_url('user/contact_submit'); ?>">
                            <span id="success" style="color:green"></span>
                            <span id="error" style="color:red"></span>
                            
                            
                            <div id="success-message" class="popup">
                    <p><b><?php echo $this->session->flashdata('success'); ?></b></p>
                     </div>
                     
                         <div id="failure-message" class="popup">
                    <p><b><?php echo $this->session->flashdata('failure'); ?></b></p>
                     </div>
                                <br>
                                    <div class="col-12 col-md-6 mb-3">
                                        <input type="text" name="name" id="name" placeholder="Name" class="form-control" required>
                                    </div>
                                     <div class="col-12 col-md-6 mb-3">
                                      <input type="text" name="phone" id="phone" placeholder="Phone" class="form-control" required>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <input type="email" name="email" id="email" placeholder="Email" class="form-control" required>
                                    </div>

                                <div class="mb-4">
                                    <textarea class="form-control" rows="5" id="message">Message Here....</textarea>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <input type="submit" class="btn cstmBtnColr" value="Submit">
                                </div>
                            </form>
                        </div>-->
                      
       <div class="col-12 col-md-6 col-xxl-5 d-flex align-items-center ms-auto">
        <div class="w-100">
        <h2 class="subHead" style="font-size:31px;">Begin your <span style="color:#5ABA47;">journey with us</span></h2>
        <p class="addText mb-4">We are ready to help your nikah dream come true..!</p>
        <div class="d-flex align-items-center mb-4">
        <div class="flex-shrink-0" style="margin-top: -140px;">
        <img src="<?php echo base_url();?>assets/images/address_new.jpg" alt="address" class="icon">
        </div>
        
        <div class="flex-grow-1 ms-3">
        <p class="addText mb-0">IV th Floor, 
        Neospace,
        Kinfra Techno Industrial Park, 
        Calicut University(PO),
        Malappuram, India</p>
        
        <p class="addText mb-0">
        <h6 style="font-size: 20px;margin-top: 25px;">Head Office</h6>
        <!--<b>HAPPY NIKAH</b><br/>-->
        
        CD TOWER,4TH FLOOR,<br/>
        Mini Bypass Road,Arayidathupalam,<br/>
        Kozhikode,Kerala-673004<br/>
        </p>
        
        </div>
        
        </div>
        <div class="d-flex align-items-center mb-4">
        <div class="flex-shrink-0">
        <a href="tel:+918943777666">
        <img src="<?php echo base_url();?>assets/images/telephone_new.jpg" alt="telephone" class="icon">
        </a>
        </div>
        <div class="flex-grow-1 ms-3">
        <p class="mobText mb-0"> <a href="tel:+918943777666" style="color:#000;">+91 8943 777 666 </a>, <br/>
        <a href="tel:+917594979772" style="color:#000;">+91 7594 979 772</a></p>
        </div>
        </div>
        
        <div class="d-flex align-items-center">
        <div class="flex-shrink-0">
        <a href="mailto:info@gotonikah.com">
        <img src="<?php echo base_url();?>assets/images/mail_new.jpg" alt="mail" class="icon">
        </a>
        </div>
        <div class="flex-grow-1 ms-3">
        <a href="mailto:info@gotonikah.com" style="color:#000;text-decoration:none;">
        <p class="addText mb-0">info@gotonikah.com</p>
        </a>
        </div>
        </div>
        </div>
        </div>
        
                    </div>
                </div>
            </div>
        </div>
    </section>
        
          <div class="container-fluid">
        <div class="row">
        
        <div class="col-12 col-md-10 mx-auto">
        
        
        
        <!--<p class="termPrivPara">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>-->
        
        <!-- <p class="termPrivPara"> qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam,</p>-->
        
        
        
        <p class="termPrivPara" style="font-size: 15px;font-weight: 400;margin-bottom: 30px;margin-top: 45px;">
        <p style="text-align:justify" class="contact">Goto Nikah is a trustworthy Muslim community matrimony site for Malayalee
        Muslims around the world. We are here for every Muslim bachelor to help them find
        their better half. This Muslim marriage bureau Kerala is not meant for dating but to
        provide a way to find life partners for mature Muslim women and men.</p></p>
        
        <p class="termPrivPara" style="font-size: 15px;font-weight: 400;margin-bottom: 30px;margin-top: 35px;"> 
          <p style="text-align:justify" class="contact">You can undoubtedly trust Goto Nikah, one of the best Muslim marriage bureaus in
        Kerala. Contact Goto Nikah to register and search for your better half.</p></p>
        
        <p class="termPrivPara" style="font-size: 15px;font-weight: 400;margin-bottom: 30px;margin-top: 35px;">
         <p style="text-align:justify" class="contact">Finding your partner through Goto Nikah Muslim community matrimony makes your
        life feel like happily ever after. We assure you that we can provide you with an
        awesome experience in matchmaking through this marriage agency. We provide
        every Muslim bachelor out there the opportunity to register on the 'Goto Nikkah'
        Muslim community matrimony site for absolutely free. <br/>We are here to understand
        your concerns and help you find your true love. Contact us now!.</p></p>
        
        
        
        </div>
        </div>
        </div>
        
        <?php include('include/footer_gotonikah.php'); ?>
        
        <script>
        
        $(document).ready(function() {
        // Show the success message popup
        $('#success-message').fadeIn('fast');
        
        // Hide the success message after a few seconds
        setTimeout(function() {
        $('#success-message').fadeOut('fast');
        }, 6000); // Adjust the duration as needed
        
        $('#failure-message').fadeIn('fast');
        
        // Hide the success message after a few seconds
        setTimeout(function() {
        $('#failure-message').fadeOut('fast');
        }, 6000); // Adjust the duration as needed
        });
        
        function SendMessage() {
        if($("#email").val()=="" || $("#name").val()=="" || $("#message").val()=="" || $("$phone").val()=="")
        {
        $("#error").html("All Fields are Required.");
        }
        else{
        
        
        $.ajax({
        url: '<?php echo site_url('Home/ContactNow_gotonikah'); ?>',
        type: "post",
        data: {mail: $("#email").val(), name: $("#name").val(), phone:("#phone").val(), message: $("#message").val()},
        success: function (response) {
        if(response==1){
        $("#success").html("Mail has been sent successfully.");
        }
        else{
        $("#error").html("Couldnt sent mail.");
        }
        
        
        
        // You will get response from your PHP page (what you echo or print)
        },
        // error: function(jqXHR, textStatus, errorThrown) {
        //   console.log(textStatus, errorThrown);
        // }
        });
        }
        }
        </script>
        
        </body>
        </html>