
  
                
       <script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>      

<style>

 .topnav
        {
            visibility:hidden;
        }
        

 @media (min-width: 280px) and (max-width: 991px)
    {
        .topnav
        {
            visibility:visible !important;
            margin-top: -20px !important;
        }
        
        .profMenu.mb-4
        {
        visibility: hidden;
        }

    }
    
.topnav {
  overflow: hidden;
  /*background-color: #333;*/
  background-color: #ffffff;
  visibility:hidden;
      margin-top: -355px;
}

.topnav a {
  float: left;
  display: block;
  /*color: #f2f2f2;*/
  color:#000000;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #ff5b85;
  color: white;
}

.topnav .icon {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
    
    margin-bottom:10px;
  }
}
</style>




  <div class="topnav" id="myTopnav">
  <a href="#home" class="active">Menus</a>
  
    <a href="<?php echo site_url();?>profile">
    <img src="<?php echo base_url() ?>assets/images/editProfile.svg">
    <span>Edit My Profile</span>
    </a>
    
    <a href="<?php echo site_url();?>profile">
    <img src="<?php echo base_url() ?>assets/images/ManagePhotos.svg">
    <span>Manage Photos</span>
    </a>
    
    <a href="<?php echo site_url();?>searchprofiles">
    <img src="<?php echo base_url() ?>assets/images/SearchProfile.svg">
    <span>Search Profile</span>
    </a>
    
    <a href="<?php echo site_url();?>explore">
    <img src="<?php echo base_url() ?>assets/images/Explore.svg">
    <span>Explore</span>
    </a>
    
    <a href="<?php echo site_url();?>user_chat">
    <img src="<?php echo base_url() ?>assets/images/Chat.svg">
    <span>Chat</span>
    </a>
    
    <a href="<?php echo site_url();?>settings">
    <img src="<?php echo base_url() ?>assets/images/AccountSettings.svg">
    <span>Account Settings</span>
    </a>
    
    <a href="<?php echo site_url();?>disabilityprofiles">
    <img src="<?php echo base_url() ?>assets/images/Disabilityprofiles.svg">
    <span>Disability profiles</span>
    </a>
    
    <a href="<?php echo site_url();?>orphan_or_poor_profiles">
    <img src="<?php echo base_url() ?>assets/images/OrphanPoorGirls.svg">
    <span>Orphan/Poor girls</span>
    </a>
     
    <a href="<?php echo site_url();?>help_support">
    <img src="<?php echo base_url() ?>assets/images/HelpSupport.svg">
    <span>Help/Support</span>
    </a>
    
    <a href="<?php echo site_url();?>feedback">
    <img src="<?php echo base_url() ?>assets/images/Feedback.svg">
    <span>Feedback</span>
    </a>
    
                                

  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>  








                    <div class="profMenu mb-4">
                        <div class="row">
                            <div class="col-12 col-sm-6 mb-3">
                                <a href="<?php echo site_url();?>profile">
                                    <div class="d-flex align-items-center profMenuBox">
                                        <img src="<?php echo base_url() ?>assets/images/editProfile.svg">
                                        <span>Edit My Profile</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-12 col-sm-6 mb-3">
                                <a href="<?php echo site_url();?>profile">
                                    <div class="d-flex align-items-center profMenuBox">
                                        <img src="<?php echo base_url() ?>assets/images/ManagePhotos.svg">
                                        <span>Manage Photos</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6 mb-3">
                                <a href="<?php echo site_url();?>searchprofiles">
                                    <div class="d-flex align-items-center profMenuBox">
                                        <img src="<?php echo base_url() ?>assets/images/SearchProfile.svg">
                                        <span>Search Profile</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-12 col-sm-6 mb-3">
                                <a href="<?php echo site_url();?>explore">
                                    <div class="d-flex align-items-center profMenuBox">
                                        <img src="<?php echo base_url() ?>assets/images/Explore.svg">
                                        <span>Explore</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6 mb-3">
                                <a href="<?php echo site_url();?>user_chat">
                                    <div class="d-flex align-items-center profMenuBox">
                                        <img src="<?php echo base_url() ?>assets/images/Chat.svg">
                                        <span>Chat</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-12 col-sm-6 mb-3">
                                <a href="<?php echo site_url();?>settings">
                                    <div class="d-flex align-items-center profMenuBox">
                                        <img src="<?php echo base_url() ?>assets/images/AccountSettings.svg">
                                        <span>Account Settings</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6 mb-3">
                                <a href="<?php echo site_url();?>disabilityprofiles">
                                    <div class="d-flex align-items-center profMenuBox">
                                        <img src="<?php echo base_url() ?>assets/images/Disabilityprofiles.svg">
                                        <span>Disability profiles</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-12 col-sm-6 mb-3">
                                <a href="<?php echo site_url();?>orphan_or_poor_profiles">
                                    <div class="d-flex align-items-center profMenuBox">
                                        <img src="<?php echo base_url() ?>assets/images/OrphanPoorGirls.svg">
                                        <span>Orphan/Poor girls</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6 mb-3">
                                <a href="<?php echo site_url();?>help_support">
                                    <div class="d-flex align-items-center profMenuBox">
                                        <img src="<?php echo base_url() ?>assets/images/HelpSupport.svg">
                                        <span>Help/Support</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-12 col-sm-6 mb-3">
                                <a href="<?php echo site_url();?>feedback">
                                    <div class="d-flex align-items-center profMenuBox">
                                        <img src="<?php echo base_url() ?>assets/images/Feedback.svg">
                                        <span>Feedback</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!--<div class="enrollBox mb-5">
                        <img src="<?php echo base_url() ?>assets/images/enrollImg.jpg" class="enrollImg">
                        
                        <div class="contentBox">
                            <p class="enrollPara">Enroll for the assisted services &amp; enjoy personalized matchmaking</p>
                            <button type="button" class="enrollBtn">Enroll Now</button>
                        </div>
                    </div>-->
              