<div class="profileBox">
                        <div class="bgStrip">
                            <img src="<?php echo base_url() ?>assets/images/abstractBg1.png" alt="border image">
                        </div>
                        <div class="profileImgBox text-center">
                            <?php if(empty($this->session->userdata('photo'))){ 
                            if($this->session->userdata('gender')== 1){ ?>
                                <img src="<?php echo base_url('/assets/photo_storage/male.jpg'); ?>" alt="profile image" class="proImg">
                            <?php }
                            else if($this->session->userdata('gender')== 2){ ?>
                                <img src="<?php echo base_url('/assets/photo_storage/female.jpg'); ?>" alt="profile image" class="proImg">
                            <?php }
                             } 
                             else{ 
                             $photo_status = $this->General_Model->check_photoStatus($this->session->userdata('photo'));
                             if($photo_status->status != 1)
                                {?>
                                    <img src="<?php echo base_url('/assets/photo_storage/'.$this->session->userdata('photo')); ?>" alt="profile image" class="proImg1">
                           

                             <?php }
                             else{
                                 if($this->session->userdata('gender')== 1){ ?>
                                <img src="<?php echo base_url('/assets/photo_storage/male.jpg'); ?>" alt="profile image" class="proImg">
                            <?php }
                            else if($this->session->userdata('gender')== 2){ ?>
                                <img src="<?php echo base_url('/assets/photo_storage/female.jpg'); ?>" alt="profile image" class="proImg">
                            <?php }
                             
                             } }?>
                             <!-- <div class="proChangeWrapper">
                                <button class="btn">
                                    <img src="<?php echo base_url() ?>assets/images/prCngIco.png" alt="profile image">
                                </button>
                                <input type="file" name="myfile" />
                            </div> -->
                        </div>
                        <div class="nameTitle text-center mb-4">
                            <p><?php echo $this->session->userdata('name'); ?> <span style="font-size: 14px;">(<?= $this->General_Model->GetProfileDetails($this->session->userdata('user_id'))['happynikah_id'];?>)</span></p>
                            <?php if($this->session->userdata('status') ==1 || $this->session->userdata('status') ==2 || $this->session->userdata('status')){ ?>
                            <span class="verified">
                                <img src="<?php echo base_url() ?>assets/images/verify.png">
                                Verified
                            </span>
                            <?php } 
                            else{ ?>
                            <span>
                                <img src="<?php echo base_url() ?>assets/images/blocked.png">
                                Verification Pending
                            </span>
                            <?php }
                            ?>
                        </div>
                        <a href="<?php echo site_url('user/upgradeto_premium'); ?>">
                        <button type="button" class="upgrdPrmBtn">
                            <img src="<?php echo base_url() ?>assets/images/crown.png">
                            Upgrade to Premium
                        </button>
                        </a>
                    </div>