<div class="profileBox">
                        <div class="bgStrip" style="background: transparent linear-gradient( 334deg , #1b3f1ccc 0%, #5ABA47 100%) 0% 0% no-repeat padding-box;">
                            <!--<img src="<?php echo base_url() ?>assets/images/abstractBg1.png" alt="border image">-->
                        </div>
                        <div class="profileImgBox text-center">
                            <?php if(empty($this->session->userdata('photo'))){ 
                            if($this->session->userdata('gender')== 1){ ?>
                                <img src="<?php echo base_url('/assets/photo_storage/male.jpg'); ?>" alt="profile image" class="proImg1" style="border-radius: 50%;height:120px;width:120px;">
                            <?php }
                            else if($this->session->userdata('gender')== 2){ ?>
                                <img src="<?php echo base_url('/assets/photo_storage/female.jpg'); ?>" alt="profile image" class="proImg1" style="border-radius: 50%;height:120px;width:120px;">
                            <?php }
                             } 
                             else{ ?>
                            
                                    <img src="<?php echo base_url('/assets/photo_storage/'.$this->General_Model->GetProfileDetails($this->session->userdata('user_id'))['photo']); ?>" alt="profile image" class="proImg1" style="border-radius: 50%;height:120px;width:120px;">
                           
<?php
                              }?>
                             <!-- <div class="proChangeWrapper">
                                <button class="btn">
                                    <img src="<?php echo base_url() ?>assets/images/prCngIco.png" alt="profile image">
                                </button>
                                <input type="file" name="myfile" />
                            </div> -->
                        </div>
                        <div class="nameTitle text-center mb-4">
                            <p class="proName">
                            
                            <?php echo $this->session->userdata('name'); ?>
                          <!--<?php echo $ProfileDetails['name']; ?>  -->
                      
                              
                            </p>
                            <span class="proId"><?= $this->General_Model->GetProfileDetails($this->session->userdata('user_id'))['happynikah_id'];?></span>
                            <?php if($this->session->userdata('status') ==1 || $this->session->userdata('status') ==2 || $this->session->userdata('status')){ ?>
                            <span class="verify">
                                <img src="<?php echo base_url() ?>assets/images/Verified_goto.png">
                                Verified
                            </span>
                            <?php } 
                            else{ ?>
                            <span class="verify">
                                <img src="<?php echo base_url() ?>assets/images/Ignore_gotonikah.png">
                                Verification Pending
                            </span>
                            <?php }
                            ?>
                        </div>
                        <ul class="profDetailsList d-flex">
                            <?php 
                            foreach($payment_done as $key){
                               // echo $payment_done[0]->id;
                                  $where = array('sender_id'=>$this->session->userdata('user_id'),'planid'=>$payment_done[0]->id);
        $contact_viewed = $this->General_Model->GetFullData1("tbl_contact_viewed",$where);
       // echo count($contact_viewed);
        $chat_receivers = $this->General_Model->get_chatsenders($this->session->userdata('user_id'),$payment_done[0]->id);

                                $expiry_date = strtotime($payment_done[0]->expiry_date);
                                $today_date = strtotime(date('Y-m-d'));
                                $datediff = $expiry_date - $today_date;
                                $round_diff = round($datediff/(60*60*24));
                                
                                ?>
                             <li><?php echo (($key->contactbalance+$key->addoncontact-$key->leftcontact)-count($contact_viewed));?> Contacts</li>
                            <li><?php echo (($key->messagebalance+$key->addonmessage-$key->leftmessage)-$chat_receivers);?> Messages</li>
                            <?php if($datediff > 0)
                            {?>
                            <li><?php echo $round_diff;?> Days Left</li>
                            <?php }else{
                                ?>
                                <li>Plan Expired</li>
                                <?php
                                }}?>
                        </ul>
                        <a href="<?php echo site_url('user/upgradeto_premium_gotonikah'); ?>">
                        <button type="button" class="upgrdPrmBtn">
                            <img src="<?php echo base_url() ?>assets/images/crown.png">
                            Upgrade to Premium
                        </button>
                        </a>
            </div>