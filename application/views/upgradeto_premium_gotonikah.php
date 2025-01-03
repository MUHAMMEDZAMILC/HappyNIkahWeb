<!DOCTYPE html>
<html>
<?php include('include/user_header_gotonikah.php'); ?>


    <section id="userContent">
        <div class="container">
            <ul class="nav nav-pills nav-fill utpTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link <?php if(isset($assisted) && $assisted==0){?>active<?php }?>" id="premiumPlans-tab" data-bs-toggle="tab" data-bs-target="#premiumPlans" type="button" role="tab" aria-controls="premiumPlans" aria-selected="true">Premium Plans</button>
                </li>
                <li class="nav-item" role="presentation" >
                    <button class="nav-link <?php if(isset($assisted) && $assisted==1){?>active<?php }?>" id="assistedServ-tab" data-bs-toggle="tab" data-bs-target="#assistedServ" type="button" role="tab" aria-controls="assistedServ" aria-selected="false">Assisted Service</button>
                </li>
            </ul>
            <div class="tab-content utpTabContent">
                <div class="tab-pane fade  <?php if(isset($assisted) && $assisted==0){?>show active<?php }?>" id="premiumPlans" role="tabpanel" aria-labelledby="premiumPlans-tab">
                    <div class="row">
                    <?php $i = 0; foreach ($plan as $key) { $i++; ?>
                      
                        <div class="col-12 col-md-6 col-xxl-3 mb-4 mb-xxl-0 d-flex align-items-stretch">
                        <form class="w-100" method="post" action="<?php echo site_url('user/payment_methods'); ?>" id="planpayment<?php echo $i;?>">
                        
                        <a onclick="payamount(<?php echo $i;?>)" style="cursor: pointer;">
                                            <!--  <a  <?php if($i != 1){ ?> onclick="payrazor('<?php echo $key->plan_amount; ?>','1')" <?php }?>class="w-100">-->
                              <input type="hidden" name="planamount" value="<?php echo $key->plan_amount; ?>"> 
                               
                                <input type="hidden" name="plan_id" value="<?php echo $key->plan_id; ?>"> 
                                
                          <div class="planBox PB<?php echo $i;?> d-flex align-items-center">
                                    <div class="icoBox">
                                        <h4><?php echo $key->plan_name; ?></h4>
                                        <img src="<?php echo base_url();?>assets/images/<?php echo $key->icon;?>">
                                        <p class="durtn"><?php echo $key->duration; ?></p>
                                       <p class="amount"> <strike><?php echo $key->plan_strick_amount;?> </strike></p>
                                        <p class="amount">₹<?php echo $key->plan_amount; ?>/-</p>
                                    </div>
                                    <div class="detBox">
                                        <ul>
                                            
                                        <li>
                                                <span>View Contact Details</span>
                                                <span><?php echo $key->contacts; ?> Verified</span>
                                            </li>
                                           
                                            <li>
                                                <span>Send Personalised Messages</span>
                                                <span><?php echo $key->messages; ?> Persons</span>
                                            </li>
                                            <li>
                                                <span>View Your Profile Viewers</span>
                                                <img src="<?php echo base_url();?>assets/images/checked.png">
                                            </li>
                                            <li>
                                                <span>View Your Contact Viewers</span>
                                                <img src="<?php echo base_url();?>assets/images/checked.png">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                    
                                </a>
                                
                                </form>
                                
                                
                        </div>
                        
                        <?php } ?>
    
                    </div>
                </div>
                <div class="tab-pane fade <?php if(isset($assisted) && $assisted==1){?>show active<?php }?>" id="assistedServ" role="tabpanel" aria-labelledby="assistedServ-tab">
                <div class="row">
                    <?php  foreach ($assisted_plan as $key) { $i++; ?>
                      
                        <div class="col-12 col-md-6 col-xxl-3 mb-4 mb-xxl-0 d-flex align-items-stretch">
                        <form class="w-100" method="post" action="<?php echo site_url('user/payment_methods'); ?>" id="planpayment<?php echo $i;?>">
                        <a onclick="payamount(<?php echo $i;?>)">
                              <input type="hidden" name="planamount" value="<?php echo $key->plan_amount; ?>"> 
                               
                          <div class="planBox PB1 d-flex align-items-center">
                                    <div class="icoBox">
                                        <img src="<?php echo base_url();?>assets/images/<?php echo $key->icon;?>">
                                        <p class="durtn"><?php echo $key->duration; ?></p>
                                        <p class="amount">₹<?php echo $key->plan_amount; ?>/-</p>
                                    </div>
                                    <div class="detBox">
                                        <ul>
                                        <li>
                                                <span>View Contact Details</span>
                                                <span><?php echo $key->contacts; ?> Verified</span>
                                            </li>
                                           
                                            <li>
                                                <span>Send Personalised Messages</span>
                                                <span><?php echo $key->messages; ?> Persons</span>
                                            </li>
                                            <li>
                                                <span>View Your Profile Viewers</span>
                                                <img src="<?php echo base_url();?>assets/images/checked.png">
                                            </li>
                                            <li>
                                                <span>View Your Contact Viewers</span>
                                                <img src="<?php echo base_url();?>assets/images/checked.png">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                    
                                </a>
                                
                                </form>
                        </div>
                        
                        <?php } ?>
    
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


<style>
    #userContent .utpTabs .nav-link.active, #userContent .searchTabs .nav-link.active {
    background-color: #c3f8b8b5;
}

#userContent .utpTabs .nav-link.active::after, #userContent .searchTabs .nav-link.active::after
{
    background-color: #5aba47;
}

#userContent .utpTabs.nav-pills, #userContent .searchTabs.nav-pills {
    border-bottom: 1px solid #5aba47;
    background-color: #fff;
}
</style>

  <?php include('include/footer_gotonikah.php'); ?>

    

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

            // send request btn
            $(".sndrqst").click(function(){
                $(this).toggleClass("clicked");
            });
            
        });
        function payamount(vals)
        {
          //  alert("nbnb");
        
         $("#planpayment"+vals).submit();
        
        
        // url_address='<?php echo site_url() ?>/user/update_contact_viewed2';
        // data = { planid : vals};
        // $.ajax({
        // type: "post",
        // url: url_address,
        // data: data,
        // success: function(response){ 
        // $("#contact_div").show();
        // $("#show_contact_div").hide();
        
        // },
        // error: function(XMLHttpRequest, textStatus, errorThrown){
        // alert(textStatus);
        // }
        // });
    
        }
    </script>

</body>
</html>