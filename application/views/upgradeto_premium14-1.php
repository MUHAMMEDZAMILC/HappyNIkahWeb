<!DOCTYPE html>
<html>
<?php include('include/header.php'); ?>

    <section id="userContent">
        <div class="container">
            <div class="row">
                <div class="col-12 col-xl-3 pe-xl-0">
                </div>
                <div class="col-12 col-xl-9 ps-xl-0 d-none d-xl-block">
                    <div class="packageContainer">
                        <?php foreach ($plan as $key) {  ?>
                        <div class="packageBox">
                            <div class="priceBox">
                                <h3><img src="<?php echo base_url() ?>assets/images/rupee.png"><?php echo $key->plan_strick_amount; ?>/-</h3>
                                <h4><img src="<?php echo base_url() ?>assets/images/rupee.png"><?php echo $key->plan_amount; ?>/-</h4>
                            </div>
                            <div class="validity <?php echo $key->color_code; ?>">
                                <?php echo $key->plan_name; ?> - <?php echo $key->duration; ?>
                            </div>
                        </div>
                        <?php } ?>
                        
                        <!--<div class="packageBox">-->
                        <!--    <div class="priceBox">-->
                        <!--        <h3><img src="<?php echo base_url() ?>assets/images/rupee.png">4600/-</h3>-->
                        <!--        <h4><img src="<?php echo base_url() ?>assets/images/rupee.png">4200/-</h4>-->
                        <!--    </div>-->
                        <!--    <div class="validity silver">-->
                        <!--        Silver - 4 Months-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!--<div class="packageBox">-->
                        <!--    <div class="priceBox">-->
                        <!--        <h3><img src="<?php echo base_url() ?>assets/images/rupee.png">4600/-</h3>-->
                        <!--        <h4><img src="<?php echo base_url() ?>assets/images/rupee.png">4200/-</h4>-->
                        <!--    </div>-->
                        <!--    <div class="validity gold">-->
                        <!--        Gold - 6 Months-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!--<div class="packageBox">-->
                        <!--    <div class="priceBox">-->
                        <!--        <h3><img src="<?php echo base_url() ?>assets/images/rupee.png">4600/-</h3>-->
                        <!--        <h4><img src="<?php echo base_url() ?>assets/images/rupee.png">4200/-</h4>-->
                        <!--    </div>-->
                        <!--    <div class="validity platinum">-->
                        <!--        Platinum - 2 Months-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!--<div class="packageBox">-->
                        <!--    <div class="priceBox">-->
                        <!--        <h3><img src="<?php echo base_url() ?>assets/images/rupee.png">4600/-</h3>-->
                        <!--        <h4><img src="<?php echo base_url() ?>assets/images/rupee.png">4200/-</h4>-->
                        <!--    </div>-->
                        <!--    <div class="validity assisted">-->
                        <!--        Assisted - 2 Months-->
                        <!--    </div>-->
                        <!--</div>-->
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-12 col-xl-3 pe-xl-0">
                    <div class="packageOptnAvil d-none d-xl-block">
                       <ul class="packageOptnAvilList">
                           <li>View Contact Details</li>
                           <li>Send Personalised Messages</li>
                           <li>View Your Profile Viewers</li>
                           <li>View Your Contact Viewers</li>
                       </ul> 
                    </div>
                </div>
                <div class="col-12 col-xl-9 ps-xl-0">
                    <div class="packageContainer">
                        <?php $i = 0; foreach ($plan as $key) { $i++; ?>
                        <div class="packageBox">
                            <div class="priceBox d-xl-none">
                                <h3><img src="<?php echo base_url() ?>assets/images/rupee.png"><?php echo $key->plan_strick_amount; ?>/-</h3>
                                <h4><img src="<?php echo base_url() ?>assets/images/rupee.png"><?php echo $key->plan_amount; ?>/-</h4>
                            </div>
                            <div class="validity basic d-xl-none">
                                <?php echo $key->plan_name; ?> - <?php echo $key->duration; ?>
                            </div>
                            <div class="optnAvil">
                                <ul class="optnAvilList">
                                    <li>
                                        <p class="note d-xl-none">View Contact Details</p>
                                        <?php echo $key->contacts; ?> Verified
                                    </li>
                                    <li>
                                        <p class="note d-xl-none">Send Personalised Messages</p>
                                        <?php echo $key->messages; ?> Persons
                                    </li>
                                    <li>
                                        <p class="note d-xl-none">View Your Profile Viewers</p>
                                        <img src="<?php echo base_url() ?>assets/images/tickGreen.png">
                                    </li>
                                    <li>
                                        <p class="note d-xl-none">View Your Profile Viewers</p>
                                        <img src="<?php echo base_url() ?>assets/images/tickGreen.png">
                                    </li>
                                </ul>
                            </div>
                            <div class="btnBox">
                                <?php if($i == 1){ ?>
                                
                                 <button type="button" class="btn cstmBtnColr w-100" style="background: #10ad96;">Activated</button>
                                 
                                <?php }else{ ?>
                                
                                <button type="button" class="btn cstmBtnColr w-100" onclick="payrazor('<?php echo $key->plan_amount; ?>','1')">Select</button>
                                
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                        <!--<div class="packageBox">-->
                        <!--    <div class="priceBox d-xl-none">-->
                        <!--        <h3><img src="<?php echo base_url() ?>assets/images/rupee.png">4600/-</h3>-->
                        <!--        <h4><img src="<?php echo base_url() ?>assets/images/rupee.png">4200/-</h4>-->
                        <!--    </div>-->
                        <!--    <div class="validity silver d-xl-none">-->
                        <!--        Silver - 4 Months-->
                        <!--    </div>-->
                        <!--    <div class="optnAvil">-->
                        <!--        <ul class="optnAvilList">-->
                        <!--            <li>-->
                        <!--                <p class="note d-xl-none">View Contact Details</p>-->
                        <!--                80 Verified-->
                        <!--            </li>-->
                        <!--            <li>-->
                        <!--                <p class="note d-xl-none">Send Personalised Messages</p>-->
                        <!--                20 Persons-->
                        <!--            </li>-->
                        <!--            <li>-->
                        <!--                <p class="note d-xl-none">View Your Profile Viewers</p>-->
                        <!--                <img src="<?php echo base_url() ?>assets/images/tickGreen.png">-->
                        <!--            </li>-->
                        <!--            <li>-->
                        <!--                <p class="note d-xl-none">View Your Profile Viewers</p>-->
                        <!--                <img src="<?php echo base_url() ?>assets/images/tickGreen.png">-->
                        <!--            </li>-->
                        <!--        </ul>-->
                        <!--    </div>-->
                        <!--    <div class="btnBox">-->
                        <!--        <button type="button" class="btn cstmBtnColr w-100">Select</button>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!--<div class="packageBox">-->
                        <!--    <div class="priceBox d-xl-none">-->
                        <!--        <h3><img src="<?php echo base_url() ?>assets/images/rupee.png">4600/-</h3>-->
                        <!--        <h4><img src="<?php echo base_url() ?>assets/images/rupee.png">4200/-</h4>-->
                        <!--    </div>-->
                        <!--    <div class="validity gold d-xl-none">-->
                        <!--        Gold - 6 Months-->
                        <!--    </div>-->
                        <!--    <div class="optnAvil">-->
                        <!--        <ul class="optnAvilList">-->
                        <!--            <li>-->
                        <!--                <p class="note d-xl-none">View Contact Details</p>-->
                        <!--                120 Verified-->
                        <!--            </li>-->
                        <!--            <li>-->
                        <!--                <p class="note d-xl-none">Send Personalised Messages</p>-->
                        <!--                50 Persons-->
                        <!--            </li>-->
                        <!--            <li>-->
                        <!--                <p class="note d-xl-none">View Your Profile Viewers</p>-->
                        <!--                <img src="<?php echo base_url() ?>assets/images/tickGreen.png">-->
                        <!--            </li>-->
                        <!--            <li>-->
                        <!--                <p class="note d-xl-none">View Your Profile Viewers</p>-->
                        <!--                <img src="<?php echo base_url() ?>assets/images/tickGreen.png">-->
                        <!--            </li>-->
                        <!--        </ul>-->
                        <!--    </div>-->
                        <!--    <div class="btnBox">-->
                        <!--        <button type="button" class="btn cstmBtnColr w-100">Select</button>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!--<div class="packageBox">-->
                        <!--    <div class="priceBox d-xl-none">-->
                        <!--        <h3><img src="<?php echo base_url() ?>assets/images/rupee.png">4600/-</h3>-->
                        <!--        <h4><img src="<?php echo base_url() ?>assets/images/rupee.png">4200/-</h4>-->
                        <!--    </div>-->
                        <!--    <div class="validity platinum d-xl-none">-->
                        <!--        Platinum - 2 Months-->
                        <!--    </div>-->
                        <!--    <div class="optnAvil">-->
                        <!--        <ul class="optnAvilList">-->
                        <!--            <li>-->
                        <!--                <p class="note d-xl-none">View Contact Details</p>-->
                        <!--                150 Verified-->
                        <!--            </li>-->
                        <!--            <li>-->
                        <!--                <p class="note d-xl-none">Send Personalised Messages</p>-->
                        <!--                100 Persons-->
                        <!--            </li>-->
                        <!--            <li>-->
                        <!--                <p class="note d-xl-none">View Your Profile Viewers</p>-->
                        <!--                <img src="<?php echo base_url() ?>assets/images/tickGreen.png">-->
                        <!--            </li>-->
                        <!--            <li>-->
                        <!--                <p class="note d-xl-none">View Your Profile Viewers</p>-->
                        <!--                <img src="<?php echo base_url() ?>assets/images/tickGreen.png">-->
                        <!--            </li>-->
                        <!--        </ul>-->
                        <!--    </div>-->
                        <!--    <div class="btnBox">-->
                        <!--        <button type="button" class="btn cstmBtnColr w-100">Select</button>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!--<div class="packageBox">-->
                        <!--    <div class="priceBox d-xl-none">-->
                        <!--        <h3><img src="<?php echo base_url() ?>assets/images/rupee.png">4600/-</h3>-->
                        <!--        <h4><img src="<?php echo base_url() ?>assets/images/rupee.png">4200/-</h4>-->
                        <!--    </div>-->
                        <!--    <div class="validity assisted d-xl-none">-->
                        <!--        Assisted - 2 Months-->
                        <!--    </div>-->
                        <!--    <div class="optnAvil">-->
                        <!--        <ul class="optnAvilList">-->
                        <!--            <li>-->
                        <!--                <p class="note d-xl-none">View Contact Details</p>-->
                        <!--                250 Verified-->
                        <!--            </li>-->
                        <!--            <li>-->
                        <!--                <p class="note d-xl-none">Send Personalised Messages</p>-->
                        <!--                200 Persons-->
                        <!--            </li>-->
                        <!--            <li>-->
                        <!--                <p class="note d-xl-none">View Your Profile Viewers</p>-->
                        <!--                <img src="<?php echo base_url() ?>assets/images/tickGreen.png">-->
                        <!--            </li>-->
                        <!--            <li>-->
                        <!--                <p class="note d-xl-none">View Your Profile Viewers</p>-->
                        <!--                <img src="<?php echo base_url() ?>assets/images/tickGreen.png">-->
                        <!--            </li>-->
                        <!--        </ul>-->
                        <!--    </div>-->
                        <!--    <div class="btnBox">-->
                        <!--        <button type="button" class="btn cstmBtnColr w-100">Select</button>-->
                        <!--    </div>-->
                        <!--</div>-->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- enroll button -->
                    <div class="enrollBox2 d-sm-flex d-md-block d-lg-flex align-items-stretch">
                        <div class="contentBox">
                            <p class="enrollPara">Enroll for the assisted services &amp; enjoy personalized matchmaking</p>
                            <button type="button" class="enrollBtn">Enroll Now</button>
                        </div>
                        <div class="imgBox">
                            <img src="<?php echo base_url() ?>assets/images/enrollImg.png" class="enrollImg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section id="userFooter">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <p class="at">© 2022 happynikah All Rights Reserved</p>
                </div>
            </div>
        </div>
    </section>


    

    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/bootstrap.bundle.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
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
        
    </script>
<?php include('razerpay.php'); ?>
</body>
</html>