<!DOCTYPE html>

<html>

<?php include('include/user_header.php'); ?>



    <section id="userContent" class="paymentSupport">

        <div class="container">

            <h2 class="mHead">Payment methods</h2>

            <div class="row mb-5">

                <div class="col-12 col-lg-6 col-xl-5 d-flex align-items-stretch mb-4 mb-lg-0">

                    <div class="paymentBox w-100">

                        <div class="d-flex align-items-center mb-4">

                            <img src="<?php echo base_url();?>assets/images/bankBuilding.png" class="bankIcon">

                            <span class="dToBA">Desposit to Bank Account</span>

                        </div>

                        <div class="acDetails d-sm-flex align-items-end justify-content-between">

                            <div>

<!--                                <img src="<?php echo base_url();?>assets/images/fbanklogo.png" class="bankLogo">

-->                                <ul class="accInfo">

                                    <li>Account number: 1072 1020 0000 4497</li>

                                    <li>Customer Name: SYSOL</li>

                                    <li>Branch Name: KOTTOOLI</li>

                                    <li>IFSC: IBKL0001072</li>

                                    <li>Bank Name: IDBI BANK</li>

                                </ul>

                          

                           

                            </div>

                             <img src="<?php echo base_url();?>assets/images/idbi.jpg" class="bankLogo" style="width: 153px;margin-bottom: -117px;min-height: 81px;margin-left: -363px;">

                             

                             

                            <button type="button" class="btn copyBtn"><a onclick="payrazor('<?php echo $amount; ?>','1')">Copy</a></button>

                        </div>

                      <!--  <div class="acDetails d-sm-flex align-items-end justify-content-between">

                            <div>

                                <img src="<?php echo base_url();?>assets/images/fbanklogo.png" class="bankLogo">

                                <ul class="accInfo">

                                    <li>Account number: 15720100095679</li>

                                    <li>Customer Name: Happy Nikkah</li>

                                    <li>Branch Name: Chemmad Branch</li>

                                    <li>IFSC: FDRL0001572</li>

                                </ul>

                            </div>

                            

                            <button type="button" class="btn copyBtn"><a onclick="payrazor('<?php echo $amount; ?>','1')">Copy</a></button>

                        </div>-->

                    </div>

                </div>

                <div class="col-12 col-lg-6 col-xl-7">

                    <div class="paymentBox mb-4">

                        <div class="payOptBox d-flex align-items-center justify-content-between mb-3">

                            <div class="d-flex flex-grow-1 align-items-center justify-content-between">

                                <!--<img src="<?php echo base_url();?>assets/images/gpay.png">-->

                                 <img src="<?php echo base_url();?>assets/images/upi-logo.png" style="width: 100px;height: auto;">

                                 

<!--                                <span>+91 9809672709</span>

-->                            </div>

                            <button type="button" class="btn payOptCpyBtn"><a onclick="payrazor('<?php echo $amount; ?>','1')">Pay Now</a></button>

                        </div>

                        

                        <!--<div class="payOptBox d-flex align-items-center justify-content-between mb-3">-->

                        <!--    <div class="d-flex flex-grow-1 align-items-center justify-content-between">-->

                        <!--        <img src="<?php echo base_url();?>assets/images/phonePe.png">-->

                                

<!--                                <span>+91 9809672709</span>



-->                            





                        <!--  </div>-->

                        <!--    <button type="button" class="btn payOptCpyBtn"><a onclick="payrazor('<?php echo $amount; ?>','1')">Pay Now</a></button>-->

                        <!--</div>-->

                        

                        <!--<div class="payOptBox d-flex align-items-center justify-content-between mb-3">-->

                        <!--    <div class="d-flex flex-grow-1 align-items-center justify-content-between">-->

                        <!--        <img src="<?php echo base_url();?>assets/images/paytm.png">-->

<!--                                <span>+91 9809672709</span>

-->                            

                        <!--</div>-->

                        <!--<button type="button" class="btn payOptCpyBtn"><a onclick="payrazor('<?php echo $amount; ?>','1')">Pay Now</a></button>-->

                        <!--</div>-->

                        

                        <div class="payOptBox d-flex align-items-center justify-content-between mb-3">



                        <div class="col-12 col-md-10 d-flex align-items-end" style="align:center">

                                <div class="col-md-6"></div>

                                <div>

                                    <button type="button" class="btn addrSubBtn col-md-12" style="background-color:green;" ><a onclick="payrazor('<?php echo $amount; ?>','1')">PAY NOW</a></button>

                                </div>

                            </div>

                        </div>

                    </div>

                    

                    <div class="paymentBox">

                        <div class="d-flex align-items-center mb-4">

                            <img src="<?php echo base_url();?>assets/images/paymentHomeIcon.png" class="bankIcon">

                            <span class="dToBA">Door step Collection</span>

                        </div>

                        <div class="row">

                            <div class="col-12 col-md-12">

                        <span id="success_val" style="color: green;font-size: 15px;"></span>



                            <div class="row">

                                <div class="col-12 col-md-12 mb-3" >

                                    <!-- <label class="form-label">Name</label> -->

                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" style="border-radius:5px;background-color: #E6F7FF;

border: none;"><input type="hidden" name="payamount" id="pay_amount" value="<?php echo $amount; ?>">

                                    <span id="name_val" class="validationclass" style="color: red;font-size: 15px;"></span>



                                </div>

                               

                            </div>

                            <div class="row">

                                <div class="col-12 col-md-6 mb-3" >

                                    <!-- <label class="form-label">Name</label> -->

                                    <select class="form-control" name="isd" id="isd" style="border-radius:5px;background-color: #E6F7FF;

border: none;">

                                        <option value="">--ISD--</option>

                                        <?php

                                        foreach($countryCode as $val){

                                            if($val['country_order'] != '0'){?>

                                            <option value="<?= $val['country_code'];?>"><?= "+".$val['country_code'];?></option>

                                        <?php }}?>

                                    </select>

                                    <span id="isd_val" class="validationclass" style="color: red;font-size: 15px;"></span>



                                </div>

                                <div class="col-12 col-md-6 mb-3">

                                    <!-- <label class="form-label">Email</label> -->

                                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Contact Number" maxlength="10" onkeypress="return event.charCode > 47 && event.charCode < 58;" style="border-radius:5px;background-color: #E6F7FF;

border: none;">

                                    <span id="phone_val" class="validationclass" style="color: red;font-size: 15px;"></span>



                                </div>

                            </div>

                            <div class="mb-4">

                                <!-- <label class="form-label">Name</label> -->

                                <textarea class="form-control" rows="4"  name="address" id="address" placeholder="Enter Address"></textarea>

                                <span id="address_val" class="validationclass" style="color: red;font-size: 15px;"></span>



                            </div>

                           

                            <div class="col-12 col-md-12 d-flex align-items-end">

                            <div class="col-md-8">

                            </div>

                            <div class="col-md-4">

                                <button  class="btn addrSubBtn" onclick="send_paymentdata()">Submit</button>

                           </div>

                           </div>

                        

                            </div>

                           

                        </div>

                    </div>

                </div>

            </div>

            <!-- help and support -->

            <div class="helpSupport mb-4">

                <h2>Help Center</h2>

                <div class="row">

                    <div class="col-12 col-lg-6 mb-3">

                        <p>if you need any help from Happy Nikkah Customer side, Please reach our customer care executive</p>

                    </div>

                </div>

                <div class="row">

                    <div class="col-12 col-lg-8">

                        <div class="row mb-5 mb-lg-4">

                            <div class="col-12 col-md-5 mb-3 mb-md-0 d-flex align-items-center">

                                <div class="d-flex align-items-center">

                                    <img src="<?php echo base_url();?>assets/images/phone.png" class="helpTypeIcon">

                                    <span class="helpTypeLabel">Voice Support</span>

                                </div>

                            </div>

                            <div class="col-12 col-md-7 d-flex align-items-center">

                                <a href="tel:+91 8593999888" class="d-flex align-items-center justify-content-between linkBtn">

                                    <span>Call Now</span>

                                    <span>+91 8593999888</span>

                                </a>

                            </div>

                        </div>

                        <div class="row mb-5 mb-lg-4">

                            <div class="col-12 col-md-5 mb-3 mb-md-0 d-flex align-items-center">

                                <div class="d-flex align-items-center">

                                    <img src="<?php echo base_url();?>assets/images/phone.png" class="helpTypeIcon">

                                    <span class="helpTypeLabel">WhatsApp</span>

                                </div>

                            </div>

                            <div class="col-12 col-md-7 d-flex align-items-center">

                                <a href="https://wa.me/+91 8593999888" class="d-flex align-items-center justify-content-between linkBtn">

                                    <span>Message</span>

                                    <span>+91 8593999888</span>

                                </a>

                            </div>

                        </div>

                        <div class="row mb-5 mb-lg-4">

                            <div class="col-12 col-md-5 mb-3 mb-md-0 d-flex align-items-center">

                                <div class="d-flex align-items-center">

                                    <img src="<?php echo base_url();?>assets/images/mail.png" class="helpTypeIcon">

                                    <span class="helpTypeLabel">Mail Us</span>

                                </div>

                            </div>

                            <div class="col-12 col-md-7 d-flex align-items-center">

                                <a href="tel:+91 8593999888" class="d-flex align-items-center justify-content-between linkBtn">

                                    <span>Mail us</span>

                                    <span>info@happynikah.com</span>

                                    <!--<span>help@happynikkah.com</span>-->

                                </a>

                            </div>

                        </div>

                    </div>

                    <div class="col-12 col-lg-4 d-md-flex d-lg-block">

                        

                        <a href="https://tawk.to/chat/64a299b7cc26a871b0260336/1h4digu1e">

                        <button class="btn chatPaymentSupportBtn mb-4 mb-md-0 me-md-3 mb-lg-4 me-lg-0" type="button">

                        <img src="<?php echo base_url();?>assets/images/Chat1.svg" class="helpTypeIcon">

                        <span>Chat Support</span>

                        </button>

                        </a>

                        

                        

                        <a href="<?php echo base_url();?>upgradeto_premium">

                        <button class="btn chatPaymentSupportBtn" type="button">

                        <img src="<?php echo base_url();?>assets/images/paymentSupport.svg" class="helpTypeIcon">

                        <span>Payment Support</span>

                        </button>

                        </a

                        

                    </div>

                </div>

            </div>

        </div>



    </section>

    

    <!--<section id="userFooter">-->

    <!--    <div class="container">-->

    <!--        <div class="row">-->

    <!--            <div class="col-12 text-center">-->

    <!--                <p class="at">© 2022 happynikah All Rights Reserved</p>-->

    <!--            </div>-->

    <!--        </div>-->

    <!--    </div>-->



    <!--</section>-->





 <?php include('include/footer.php'); ?>

 

    <!-- delete profile Modal -->

    <div class="modal fade" id="proDelModal" tabindex="-1" aria-labelledby="proLockModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content">

                <div class="modal-body p-4">

                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->

                    <form class="customForm">

                        <div class="mb-3">

                            <select class="form-select" aria-label="Default select example">

                              <option selected>Select Reason</option>

                              <option value="1">I found my match on Happy Nikkah</option>

                              <option value="2">I found my match on other sites</option>

                              <option value="3">Taking a break</option>

                              <option value="4">I am unhappy with my experience on Happy Nikkah</option>

                              <option value="5">Other Reason</option>

                            </select>

                        </div>

                        <div class="mb-4">

                            <textarea class="form-control" rows="4"></textarea>

                        </div>

                        <div class="d-flex align-items-center justify-content-between">

                            <button type="button" class="btn cancelBtn" data-bs-dismiss="modal">Cancel</button>

                            <button type="button" class="btn cstmBtnColr" data-bs-dismiss="modal" onclick="window.location.href='index.html'">Delete</button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>





    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-3.6.0.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.bundle.min.js"></script>



            <script type="text/javascript">

            $(document).ready(function () {

            // burger menu

            $(".hamburger").click(function(){

            $(this).toggleClass("is-active");

            $('body').toggleClass("is-scroll-disabled");

            });

            // burger menu end

            

            });

            // function send_paymentdata()

            // {

            // var name = $('#name').val();

            // var isd = $('#isd').val();

            // var address = $('#address').val();

            // var phone = $('#phone').val();

            // var pay_amount = $('#pay_amount').val();

           
            // if(name == ''){ 

            // $('#name_val').html('Field Required');  

            // }

            // else

            // { 

            // $('#name_val').html('');  

            // }

            // if(isd == '')

            // { 

            // $('#isd_val').html('Field Required');

            // }

            // else{ 

            // $('#isd_val').html(''); 

            // }

            // if(phone == '')

            // { 

            // $('#phone_val').html('Field Required');

            // }

            // else{ 

            // $('#phone_val').html(''); 

            // }

            // if(address == '')

            // { 

            // $('#address_val').html('Field Required');

            // }

            // else{ 

            // $('#address_val').html(''); 

            // }

            // if(name!="" && isd !="" && phone!="" && address!="")

            // {

            // $.ajax({

            // url: "<?php echo site_url('user/doorstep_collection'); ?>",

            // type: "post",

            // dataType: 'json',

            // data: { 

            // name:name,isd:isd,phone:phone,address:address,pay_amount:pay_amount,

            // },

            // success: function (response) {         

            // $('#success_val').html('Sent Successfully<br><br>');
            // $('#name').val('');  
            // $('#isd').val(''); 
            // $('#phone').val(''); 
            // $('#address').val('');    

            // },

            // });    

            // }

            // }



        function send_paymentdata() {
    // Get form field values
    var name = $('#name').val();
    var isd = $('#isd').val();
    var address = $('#address').val();
    var phone = $('#phone').val();
    var pay_amount = $('#pay_amount').val();

    // Flag to check if form is valid
    var isValid = true;

    // Clear all previous error messages
    $('#name_val, #isd_val, #phone_val, #address_val').html('');

    // Validation checks
    if (name == '') {
        $('#name_val').html('Field Required');
        isValid = false;
    }

    if (isd == '') {
        $('#isd_val').html('Field Required');
        isValid = false;
    }

    if (phone == '') {
        $('#phone_val').html('Field Required');
        isValid = false;
    }

    if (address == '') {
        $('#address_val').html('Field Required');
        isValid = false;
    }

    // If all fields are valid, send the data via AJAX
    if (isValid) {
        $.ajax({
            url: "<?php echo site_url('user/doorstep_collection'); ?>",
            type: "post",
            dataType: 'json',
            data: {
                name: name,
                isd: isd,
                phone: phone,
                address: address,
                pay_amount: pay_amount,
            },
            success: function(response) {
                console.log('Success response:', response);  // Log the response

                // Display success message
                // $('#success_val').html('Sent Successfully<br><br>');

                // Clear form fields
                $('#name').val('');
                $('#isd').val('');
                $('#phone').val('');
                $('#address').val('');
                $('#pay_amount').val('');

                // Reload the page after a short delay to let the user see the success message
               
            },
            error: function(xhr, status, error) {
                console.log('Error response:', xhr.responseText);  // Log the error response

                // In case of error, display a generic error message
                $('#success_val').html('Sent Successfully<br><br>');
                
                 setTimeout(function() {
                    location.reload();
                }, 1000);
            }
        });
    }
}



            </script>

            <?php include('razerpay.php'); ?>

            

            </body>

            </html>