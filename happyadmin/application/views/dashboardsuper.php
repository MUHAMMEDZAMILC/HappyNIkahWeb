<?php include('header.php'); ?>
<?php include('menu.php'); ?>

<div class="app-wrapper">

	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">

			<h1 class="app-page-title">Overview</h1>

			  <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
				<div class="inner">
					<div class="app-card-body p-3 p-lg-4">
						<h3 class="mb-3">Happy Nikah Sales Super Admin Dashboard!</h3>
						 <div class="row gx-5 gy-3">
							<div class="col-12 col-lg-8">

								<div>Happynikah.com Meet your perfect partner from sites to "tie up together",<br>
									All Muslim community can find their suitable brides and grooms with thousands of profiles.</div>
							</div>
							<!--//col-->
							<div class="col-12 col-lg-3">
								<a class="btn app-btn-primary" href="<?php echo base_url() ?>../"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-arrow-down me-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path d="M4 0h5.5v1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h1V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z" />
										<path d="M9.5 3V0L14 4.5h-3A1.5 1.5 0 0 1 9.5 3z" />
										<path fill-rule="evenodd" d="M8 6a.5.5 0 0 1 .5.5v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 10.293V6.5A.5.5 0 0 1 8 6z" />
									</svg>Website</a>
							</div>
							<!--//col-->
						</div>
						<!--//row-->
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
					<!--//app-card-body-->

				</div>
				<!--//inner-->
			 </div>
			
			 
			 <p>Daily</p>
            <div class="row g-4 mb-4">
                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100 " style="border-left: 3px solid #fc6f90;margin-right: 20px;height: 288px !important;">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1" style="font-size: 24px;">Sale Amount</h4>
                            <div class="stats-figure" style="margin-top: 35px;">
                                
                                <?php $cdate=date('Y-m-d');?>
                    
                
                <?php $data4 = $this->db->query("SELECT SUM(tp.final_amount) as total FROM tbl_payement tp JOIN tbl_registration tr ON tp.user_id = tr.id WHERE tp.status = '1' 
                               AND tp.date = '$cdate' AND tp.payment_status = 'Paid'  AND tr.goto_nikah = 0")->row();?>
     

                                <h3> <i class="fa-sharp fa-solid fa-indian-rupee-sign"></i> <?php echo $data4->total;?> </h3>
                            </div>
                            <div class="stats-meta" style="margin-top: 96px;"> 
                                <a href="#">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!--//app-card-body-->
                        <!-- 						<a class="app-card-link-mask" href="#"></a> -->
                    </div>
                    <!--//app-card-->
                </div>
                <!--//col-->

                <div class="col-6 col-lg-6">
                    <div class="app-card app-card-stat shadow-sm h-100" style="border-left: 3px solid orange;height: 289px !important;">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1" style="font-size: 24px;">Plans</h4>
                            <div class="stats-figure">
                                
                        <?php $bronze=$this->db->select('*')->from('tbl_payement tp')->join('tbl_registration tr', 'tp.user_id = tr.id')->where('tp.status', '1')->where('tp.plan_id', '1')
                        ->where('tp.date', $cdate)->where('tr.goto_nikah', 0)->get()->num_rows();?>
                        
                        <?php $diamond=$this->db->select('*')->from('tbl_payement tp')->join('tbl_registration tr', 'tp.user_id = tr.id')->where('tp.status', '1')->where('tp.plan_id', '2')
                        ->where('tp.date', $cdate)->where('tr.goto_nikah', 0)->get()->num_rows();?>
                        <?php $crown=$this->db->select('*')->from('tbl_payement tp')->join('tbl_registration tr', 'tp.user_id = tr.id')->where('tp.status', '1')->where('tp.plan_id', '3')
                        ->where('tp.date', $cdate)->where('tr.goto_nikah', 0)->get()->num_rows();?>
                        <?php $master=$this->db->select('*')->from('tbl_payement tp')->join('tbl_registration tr', 'tp.user_id = tr.id')->where('tp.status', '1')->where('tp.plan_id', '4')
                        ->where('tp.date', $cdate)->where('tr.goto_nikah', 0)->get()->num_rows();?>
                        <?php $assisted=$this->db->select('*')->from('tbl_payement tp')->join('tbl_registration tr', 'tp.user_id = tr.id')->where('tp.status', '1')->where('tp.plan_id', '5')
                        ->where('tp.date', $cdate)->where('tr.goto_nikah', 0)->get()->num_rows();?>
                        
                        <?php $assisted_pro=$this->db->select('*')->from('tbl_payement tp')->join('tbl_registration tr', 'tp.user_id = tr.id')->where('tp.status', '1')->where('tp.plan_id', '6')
                        ->where('tp.date', $cdate)->where('tr.goto_nikah', 0)->get()->num_rows();?>
                        <?php $zero=$this->db->select('*')->from('tbl_payement tp')->join('tbl_registration tr', 'tp.user_id = tr.id')->where('tp.status', '1')->where('tp.plan_id', '7')
                        ->where('tp.date', $cdate)->where('tr.goto_nikah', 0)->get()->num_rows();?>
                   
                    
                             
                        <p style="color: #000;font-size: 17px;margin-left: 48px;text-align: justify;margin-top: 35px;">Zero Plan:<?php echo $zero;?></p>
                        <p style="color: #000;font-size: 17px;margin-left: 48px;text-align: justify;margin-top: 0px;">Bronze Plan:<?php echo $bronze;?></p>
                        <p style="color: #000;font-size: 17px;margin-left: 48px;text-align: justify;">Diamond Plan:<?php echo $diamond;?></p>
                        <p style="color: #000;font-size: 17px;margin-left: 48px;text-align: justify;">Crown Plan:<?php echo $crown;?></p>
                        <p style="color: #000;font-size: 17px;margin-left: 48px;text-align: justify;margin-top: -169px;margin-left: 295px;">Master Plan:<?php echo $master;?></p>
                        <p style="color: #000;font-size: 17px;margin-left: 48px;text-align: justify; margin-left: 295px;">Assisted Plan:<?php echo $assisted;?></p>
                        <p style="color: #000;font-size: 17px;margin-left: 48px;text-align: justify; margin-left: 295px;">Assisted Pro Plan:<?php echo $assisted_pro;?></p>
                            
                            
                            </div>
                            <div class="stats-meta text-success" style="margin-top:54px;">
                                <a href="#">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!--//app-card-body-->
                        <!-- 						<a class="app-card-link-mask" href="#"></a> -->
                    </div>
                    <!--//app-card-->
                </div>
                <!--//col-->
                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100" style="border-left: 3px solid #15a362;margin-left: -14px;margin-right: 23px;height: 289px !important;">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1" style="font-size: 24px;">Balance</h4>
                            <div class="stats-figure" style="margin-top: 35px;">
                                <h3> <i class="fa-sharp fa-solid fa-indian-rupee-sign"></i> 
                                
                                <?php $countbalance = "540000";?> 
                                
                                <?php 
                                $this->db->select_sum('tp.final_amount');
                                $this->db->from('tbl_payement tp');
                                $this->db->join('tbl_registration tr', 'tp.user_id = tr.id');
                                $this->db->where('tp.date', date('Y-m-d'));
                                $this->db->where('tr.goto_nikah', 0);
                                
                                $query = $this->db->get();
                                $result = $query->row();
                                
                                $todayamount = $result->final_amount; 
                                ?>
                                
                                <?php $todaybalance=$countbalance-$todayamount;?>
                                <!--336858-->
                                <?php echo  $todaybalance;?>     
                                
                                </h3>
                            </div>
                            <div class="stats-meta" style="margin-top: 120px;"> 
                                <a href="#">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!--//app-card-body-->
                        <!-- <a class="app-card-link-mask" href="#"></a> -->
                    </div>
                    <!--//app-card-->
                </div>
                
                
                
                
                
                	<div class="row g-4 mb-4">
				<div class="col-6 col-lg-3">
					<div class="app-card app-card-stat shadow-sm h-100 " style="border-left: 3px solid #fc6f90;height: 130px !important;">
						<div class="app-card-body p-3 p-lg-4">
							<h4 class="stats-type mb-1">All Users</h4>
							<div class="stats-figure">
								<h3><?php echo $daily_all; ?></h3>
							</div>
							<div class="stats-meta text-success">
								<a href="#">More info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<!--//app-card-body-->
						<!-- 						<a class="app-card-link-mask" href="#"></a> -->
					</div>
					<!--//app-card-->
				</div>
				<!--//col-->

				<div class="col-6 col-lg-3">
					<div class="app-card app-card-stat shadow-sm h-100" style="border-left: 3px solid orange;height: 130px !important;">
						<div class="app-card-body p-3 p-lg-4">
							<h4 class="stats-type mb-1">Pending Users</h4>
							<div class="stats-figure">
								<h3><?php echo $daily_pending; ?></h3>
							</div>
							<div class="stats-meta text-success">
								<a href="#">More info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<!--//app-card-body-->
						<!-- 						<a class="app-card-link-mask" href="#"></a> -->
					</div>
					<!--//app-card-->
				</div>
				<!--//col-->
				<div class="col-6 col-lg-3">
					<div class="app-card app-card-stat shadow-sm h-100" style="border-left: 3px solid #15a362;    height: 130px !important;">
						<div class="app-card-body p-3 p-lg-4">
							<h4 class="stats-type mb-1">Approved Users</h4>
							<div class="stats-figure">
								<h3><?php echo $daily_approved; ?></h3>
							</div>
							<div class="stats-meta">
								<a href="#">More info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<!--//app-card-body-->
						<!-- <a class="app-card-link-mask" href="#"></a> -->
					</div>
					<!--//app-card-->
				</div>
				<!--//col-->
				<div class="col-6 col-lg-3">
					<div class="app-card app-card-stat shadow-sm h-100" style="border-left: 3px solid black;    height: 130px !important;">
						<div class="app-card-body p-3 p-lg-4">
							<h4 class="stats-type mb-1">Rejected Users</h4>
							<div class="stats-figure">
								<h3><?php echo $daily_rejected; ?></h3>
							</div>
							<div class="stats-meta">
								<a href="#">More info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<!--//app-card-body-->
						<!-- <a class="app-card-link-mask" href="#"></a> -->
					</div>
					<!--//app-card-->
				</div>
				<!--//col-->
                
                
                
                	<div class="col-6 col-lg-3">
					<div class="app-card app-card-stat shadow-sm h-100" style="border-left: 3px solid red;height: 240px !important;">
						<div class="app-card-body p-3 p-lg-4">
							<h4 class="stats-type mb-1">Deleted Users</h4><br>
							<div class="stats-figure">
								<h3><?php echo $daily_deleted;; ?></h3>
							</div>
							<div class="stats-meta" style="padding-top: 82px;">
								<a href="#">More info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<!--//app-card-body-->
						<!-- <a class="app-card-link-mask" href="#"></a> -->
					</div>
					<!--//app-card-->
				</div>
				<!--//col-->
				<div class="col-6 col-lg-6">
					<div class="app-card app-card-stat shadow-sm h-100" style="border-left: 3px solid grey;height: 240px !important;">
						<div class="app-card-body p-3 p-lg-4">
							<h4 class="stats-type mb-1">Source </h4><br>

							<p style="color:#000000">Website: <?= $daily_website ?></p>
							<p style="color:#000000">Admin: <?= $daily_admin ?></p>
							<p style="color:#000000">Mobile: <?= $daily_mobile ?></p>

							<div class="stats-meta" style="padding-top: 0px;">
								<a href="#">More info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
							<!-- <h4 class="stats-type mb-1">Deleted Users</h4>
							<div class="stats-figure"><h3><?php echo $deleted;; ?></h3></div>
							<div class="stats-meta">
								<a href="#">More info <i class="fas fa-arrow-circle-right"></i></a>
							</div> -->
						</div>
						<!--//app-card-body-->
						<!-- <a class="app-card-link-mask" href="#"></a> -->
					</div>
					<!--//app-card-->
				</div>
				<!-- gender count -->
				<div class="col-6 col-lg-3">
					<div class="app-card app-card-stat shadow-sm h-100" style="border-left: 3px solid Blue;height: 240px !important;">
						<div class="app-card-body p-3 p-lg-4">
							<h4 class="stats-type mb-1">Gender count </h4><br>
							<p style="color: #000000">Male: <?= $daily_male ?></p>
							<p style="color: #000000">Female:<?= $daily_female ?></p>

						</div>
						<div class="stats-meta" style="padding-top: 20px;">
							<a href="#">More info <i class="fas fa-arrow-circle-right"></i></a>
						</div>
						<!--//app-card-body-->
						<!-- <a class="app-card-link-mask" href="#"></a> -->
					</div>
					<!--//app-card-->
				</div>
				<!--//col-->
                
                
                
                
                    <div class="row g-4 mb-4">
                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100 " style="border-left: 3px solid #fc6f90;height: 260px !important;">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1" style="font-size: 20px;">Unavailable Profile Photos</h4>
                            <div class="stats-figure">
                                
                        <?php $cdate=date('Y-m-d');?>
                        
                        
                        <?php $photounavail = $this->db->query("SELECT COUNT(*) AS total_count FROM tbl_registration R WHERE NOT EXISTS (SELECT * FROM tbl_userimages U WHERE R.id = U.user_id) AND R.status = '1' AND R.goto_nikah = '0' AND R.photo = ''");?>
                        <?php $photounavail_count = $photounavail->row()->total_count;?>
                        <?php $photo_unavailbale = $this->db->select('*')->from('tbl_registration')->where('status','1')->where('photo','')->get()->num_rows();?>
                        
                        <?php $photo_unavailbale_male = $this->db->query("SELECT COUNT(*) AS total_count FROM tbl_registration R WHERE NOT EXISTS (SELECT * FROM tbl_userimages U WHERE R.id = U.user_id) AND R.status = '1'  AND R.goto_nikah = '0'  AND R.gender='1' AND R.photo = ''");?>
                        <?php $photounavailmale_count = $photo_unavailbale_male->row()->total_count;?>
                        
                        <?php $photo_unavailbale_female = $this->db->query("SELECT COUNT(*) AS total_count FROM tbl_registration R WHERE NOT EXISTS (SELECT * FROM tbl_userimages U WHERE R.id = U.user_id) AND R.status = '1'  AND R.goto_nikah = '0'  AND R.gender='2' AND R.photo = ''");?>
                        <?php $photounavailfemale_count = $photo_unavailbale_female->row()->total_count;?>
                        <h3>
                        <?php echo $photounavail_count; ?> 
                        </h3>
                        
                            </div>
                            
                            	<p style="color: #000000;margin-left: -81px;margin-top: 36px;font-size: 19px;">Male:<?php echo $photounavailmale_count; ?> </p>
                            	
                            <p style="color: #000000;margin-left: -72px;margin-top: 0px;font-size: 19px;">Female:<?php echo $photounavailfemale_count; ?> </p>
                            <div class="stats-meta text-success"  style="margin-top:90px;">
                                <!--<a href="#">More info <i class="fas fa-arrow-circle-right"></i></a>-->
                            </div>
                        </div>
                        <!--//app-card-body-->
                        <!-- 						<a class="app-card-link-mask" href="#"></a> -->
                    </div>
                    <!--//app-card-->
                </div>
                <!--//col-->
                
                
                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100 " style="border-left: 3px solid #fc6f90;height: 260px !important;">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1" style="font-size: 20px;">Available Profile Photos</h4>
                            <div class="stats-figure">
                            
                       
        <?php $photoavail = $this->db->query("SELECT count(*) AS total_count FROM `tbl_userimages` LEFT JOIN tbl_registration ON tbl_userimages.user_id=tbl_registration.id WHERE tbl_userimages.status!='1' AND tbl_registration.status!='3' AND tbl_registration.goto_nikah='0'  AND tbl_registration.photo!=''");?>
        <?php $photoavail_count = $photoavail->row()->total_count;?>
        
        <?php $photo_availbale_male =  $this->db->query("SELECT count(*) AS total_count FROM `tbl_userimages` LEFT JOIN tbl_registration ON tbl_userimages.user_id=tbl_registration.id WHERE tbl_userimages.status!='1' AND tbl_registration.status!='3' AND tbl_registration.gender='1' AND tbl_registration.goto_nikah='0'  AND tbl_registration.photo!=''");?>
        <?php $photoavailmale_count = $photo_availbale_male->row()->total_count;?>
        
        <?php $photo_availbale_female =  $this->db->query("SELECT count(*) AS total_count FROM `tbl_userimages` LEFT JOIN tbl_registration ON tbl_userimages.user_id=tbl_registration.id WHERE tbl_userimages.status!='1' AND tbl_registration.status!='3' AND tbl_registration.gender='2'  AND tbl_registration.goto_nikah='0'  AND tbl_registration.photo!=''");?>
        <?php $photoavailfemale_count = $photo_availbale_female->row()->total_count;?>
                
                
                                <h3>  
                                <?php echo $photoavail_count; ?> 
                                </h3>
                            </div>
                            
                            	<p style="color: #000000;margin-left: -81px;margin-top: 36px;font-size: 19px;">Male:<?php echo $photoavailmale_count; ?> </p>
                            	
                            <p style="color: #000000;margin-left: -72px;margin-top: 0px;font-size: 19px;">Female:<?php echo $photoavailfemale_count; ?> </p>
                            <div class="stats-meta text-success"  style="margin-top:90px;">
                     
                            </div>
                        </div>
                       
                    </div>
              
                </div>
                
                
                
                
                
                
                <div class="col-6 col-lg-6">
                <div class="app-card app-card-stat shadow-sm h-100 " style="border-left: 3px solid #fc6f90;height: 260px !important;">
                <div class="app-card-body p-3 p-lg-4">
                <h4 class="stats-type mb-1" style="font-size: 20px;">Daily Profile</h4>
                <div class="stats-figure">
                
                
                
                <?php $photoavail = $this->db->query("SELECT COUNT(*) AS total_count FROM tbl_registration R WHERE  EXISTS (SELECT * FROM tbl_userimages U WHERE R.id = U.user_id) AND R.status = '1' AND R.goto_nikah='0' AND R.photo!= ''");?>
                <?php $photoavail_count = $photoavail->row()->total_count;?>
                
                <?php $photo_availbale_male = $this->db->query("SELECT COUNT(*) AS total_count FROM tbl_registration R WHERE EXISTS (SELECT * FROM tbl_userimages U WHERE R.id = U.user_id) AND R.status = '1'  AND R.goto_nikah='0'  AND R.gender='1' AND R.photo!= ''");?>
                <?php $photoavailmale_count = $photo_availbale_male->row()->total_count;?>
                
                <?php $photo_availbale_female = $this->db->query("SELECT COUNT(*) AS total_count FROM tbl_registration R WHERE EXISTS (SELECT * FROM tbl_userimages U WHERE R.id = U.user_id) AND R.status = '1'  AND R.goto_nikah='0' AND R.photo!= ''");?>
                <?php $photoavailfemale_count = $photo_availbale_female->row()->total_count;?>
                
                
                <?php $daily_reg_date=date('Y-m-d');?>
                <?php $daily_photo = $this->db->select('*')->from('tbl_registration')->where('photo!=','')->where('status','1')->where('goto_nikah','0')->where('reg_date',$daily_reg_date)->get()->num_rows();?>
                <?php $daily_photo_male = $this->db->select('*')->from('tbl_registration')->where('photo!=','')->where('status','1')->where('goto_nikah','0')->where('reg_date',$daily_reg_date)->where('gender','1')->get()->num_rows();?>
                <?php $daily_photo_female = $this->db->select('*')->from('tbl_registration')->where('photo!=','')->where('status','1')->where('goto_nikah','0')->where('reg_date',$daily_reg_date)->where('gender','2')->get()->num_rows();?>


             <?php $daily_photo_unavailable = $this->db->select('*')->from('tbl_registration')->where('photo','')->where('status','1')->where('goto_nikah','0')->where('reg_date',$daily_reg_date)->get()->num_rows();?>
             <?php $daily_photo_unavailable_male = $this->db->select('*')->from('tbl_registration')->where('photo','')->where('status','1')->where('goto_nikah','0')->where('gender','1')->where('reg_date',$daily_reg_date)->get()->num_rows();?>
             <?php $daily_photo_unavailable_female = $this->db->select('*')->from('tbl_registration')->where('photo','')->where('status','1')->where('goto_nikah','0')->where('gender','2')->where('reg_date',$daily_reg_date)->get()->num_rows();?>

                
                </div>
               
                <p style="color: #000000;margin-left: 0px;margin-top: 36px;font-size: 19px;">Daily Approved Profile: <?php echo $daily_approved; ?> </p>
                
                <p style="color: #000000;margin-left: -55px;margin-top: 36px;font-size: 19px;">Photo Available:&nbsp;<?php echo $daily_photo; ?> 
                
               <?php echo "(Male: $daily_photo_male &nbsp;&nbsp;&nbsp;&nbsp;Female: $daily_photo_female)";?>
                
                </p>
                
                <p style="color: #000000;margin-left: -33px;margin-top: 0px;font-size: 19px;">Photo Unavailable:&nbsp;<?php echo $daily_photo_unavailable; ?> 
                
                <?php echo "(Male: $daily_photo_unavailable_male &nbsp;&nbsp;&nbsp;&nbsp;Female: $daily_photo_unavailable_female)";?>
                
                </p>
                <div class="stats-meta text-success"  style="margin-top:90px;">
                
                </div>
                </div>
                
                </div>
                
                </div>
                
        
                
                </div>
                
                </div>
                
                  </div>
                
                
                        <p>Total</p>
            <div class="row g-4 mb-4">
                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100 " style="border-left: 3px solid #fc6f90;height: 260px !important;">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1" style="font-size: 24px;">Sale Amount</h4>
                            <div class="stats-figure" style="margin-top: 35px;">
                                
                                <?php $cdate=date('Y-m-d');?>
                             
                                                
                
                <?php $data4 =  $this->db->query("SELECT SUM(tp.final_amount) as total FROM tbl_payement tp JOIN tbl_registration tr ON tp.user_id = tr.id WHERE tp.status = '1' 
                                AND tp.payment_status = 'Paid'  AND tr.goto_nikah = 0")->row();?>
     

                                <h3> <i class="fa-sharp fa-solid fa-indian-rupee-sign"></i> <?php echo $data4->total;?> </h3>
                            </div>
                            <div class="stats-meta text-success"  style="margin-top:90px;">
                                <a href="#">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!--//app-card-body-->
                        <!-- 						<a class="app-card-link-mask" href="#"></a> -->
                    </div>
                    <!--//app-card-->
                </div>
                <!--//col-->

                <div class="col-6 col-lg-6">
                    <div class="app-card app-card-stat shadow-sm h-100" style="border-left: 3px solid orange;    height: 260px !important;  margin-right: 17px;">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1" style="font-size: 24px;">Plans</h4>
                            <div class="stats-figure">
                                
                        <?php $bronze=$this->db->select('*')->from('tbl_payement tp')->join('tbl_registration tr', 'tp.user_id = tr.id')->where('tp.status', '1')->where('tp.plan_id', '1')
                        ->where('tr.goto_nikah', 0)->get()->num_rows();?>
                        
                        <?php $diamond=$this->db->select('*')->from('tbl_payement tp')->join('tbl_registration tr', 'tp.user_id = tr.id')->where('tp.status', '1')->where('tp.plan_id', '2')
                        ->get()->num_rows();?>
                        <?php $crown=$this->db->select('*')->from('tbl_payement tp')->join('tbl_registration tr', 'tp.user_id = tr.id')->where('tp.status', '1')->where('tp.plan_id', '3')
                        ->where('tr.goto_nikah', 0)->get()->num_rows();?>
                        <?php $master=$this->db->select('*')->from('tbl_payement tp')->join('tbl_registration tr', 'tp.user_id = tr.id')->where('tp.status', '1')->where('tp.plan_id', '4')
                        ->where('tr.goto_nikah', 0)->get()->num_rows();?>
                        <?php $assisted=$this->db->select('*')->from('tbl_payement tp')->join('tbl_registration tr', 'tp.user_id = tr.id')->where('tp.status', '1')->where('tp.plan_id', '5')
                        ->where('tr.goto_nikah', 0)->get()->num_rows();?>
                        
                        <?php $assisted_pro=$this->db->select('*')->from('tbl_payement tp')->join('tbl_registration tr', 'tp.user_id = tr.id')->where('tp.status', '1')->where('tp.plan_id', '6')
                        ->where('tr.goto_nikah', 0)->get()->num_rows();?>
                        <?php $zero=$this->db->select('*')->from('tbl_payement tp')->join('tbl_registration tr', 'tp.user_id = tr.id')->where('tp.status', '1')->where('tp.plan_id', '7')
                        ->where('tr.goto_nikah', 0)->get()->num_rows();?>
                              
                                
                        <p style="color: #000;font-size: 17px;margin-left: 48px;text-align: justify;margin-top: 35px;">Zero Plan:<?php echo $zero;?></p>  
                        <p style="color: #000;font-size: 17px;margin-left: 48px;text-align: justify;margin-top: 0px;">Bronze Plan:<?php echo $bronze;?></p>
                        <p style="color: #000;font-size: 17px;margin-left: 48px;text-align: justify;">Diamond Plan:<?php echo $diamond;?></p>
                        <p style="color: #000;font-size: 17px;margin-left: 48px;text-align: justify;">Crown Plan:<?php echo $crown;?></p>
                        <p style="color: #000;font-size: 17px;margin-left: 48px;text-align: justify;margin-top: -167px;margin-left: 253px;">Master Plan:<?php echo $master;?></p>
                        <p style="color: #000;font-size: 17px;margin-left: 253px;text-align:justify; ">Assisted Plan:<?php echo $assisted;?></p>
                        <p style="color: #000;font-size: 17px;margin-left: 253px;text-align: justify;">Assisted Pro Plan:<?php echo $assisted_pro;?></p>
                            
                            </div>
                            <div class="stats-meta text-success" style="margin-top: 34px;margin-left: 23px;">
                                <a href="#">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!--//app-card-body-->
                        <!-- 						<a class="app-card-link-mask" href="#"></a> -->
                    </div>
                    <!--//app-card-->
                </div>
                <!--//col-->
                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100" style="border-left: 3px solid #15a362;margin-right: 23px;
                        margin-left: -13px;height: 260px !important;">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1" style="font-size: 24px;">Balance</h4>
                            <div class="stats-figure" style="margin-top: 35px;">
                                <h3> <i class="fa-sharp fa-solid fa-indian-rupee-sign"></i> 
                                
                                
                            <?php $countbalanceall = "540000";?> 
                            
                            <?php 
                            $this->db->select_sum('tp.final_amount');
                            $this->db->from('tbl_payement tp');
                            $this->db->join('tbl_registration tr', 'tp.user_id = tr.id');
                            $this->db->where('tr.goto_nikah', 0);
                            
                            $query = $this->db->get();
                            $result = $query->row();?>
                            
                            <?php $todayamountall= $result->final_amount;?>
                            
                            <?php $totalbalance=$countbalanceall-$todayamountall;?>
                            <!--336858-->
                            <?php echo  $totalbalance;?>     
                                
                                
                                
                                </h3>
                            </div>
                            <div class="stats-meta"  style="margin-top: 90px;">
                                <a href="#">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!--//app-card-body-->
                        <!-- <a class="app-card-link-mask" href="#"></a> -->
                    </div>
                    <!--//app-card-->
                </div>
                
        
                
                	<div class="row g-4 mb-4">
				<div class="col-6 col-lg-3">
					<div class="app-card app-card-stat shadow-sm h-100 " style="border-left: 3px solid #fc6f90;height: 130px !important;">
						<div class="app-card-body p-3 p-lg-4">
							<h4 class="stats-type mb-1">All Users</h4>
							<div class="stats-figure">
								<h3><?php echo $all; ?></h3>
							</div>
							<div class="stats-meta text-success">
								<a href="#">More info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<!--//app-card-body-->
						<!-- 						<a class="app-card-link-mask" href="#"></a> -->
					</div>
					<!--//app-card-->
				</div>
				<!--//col-->

				<div class="col-6 col-lg-3">
					<div class="app-card app-card-stat shadow-sm h-100" style="border-left: 3px solid orange;height: 130px !important;">
						<div class="app-card-body p-3 p-lg-4">
							<h4 class="stats-type mb-1">Pending Users</h4>
							<div class="stats-figure">
								<h3><?php echo $pending; ?></h3>
							</div>
							<div class="stats-meta text-success">
								<a href="#">More info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<!--//app-card-body-->
						<!-- 						<a class="app-card-link-mask" href="#"></a> -->
					</div>
					<!--//app-card-->
				</div>
				<!--//col-->
				<div class="col-6 col-lg-3">
					<div class="app-card app-card-stat shadow-sm h-100" style="border-left: 3px solid #15a362;height: 130px !important;">
						<div class="app-card-body p-3 p-lg-4">
							<h4 class="stats-type mb-1">Approved Users</h4>
							<div class="stats-figure">
								<h3><?php echo $approved; ?></h3>
							</div>
							<div class="stats-meta">
								<a href="#">More info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<!--//app-card-body-->
						<!-- <a class="app-card-link-mask" href="#"></a> -->
					</div>
					<!--//app-card-->
				</div>
				<!--//col-->
				<div class="col-6 col-lg-3">
					<div class="app-card app-card-stat shadow-sm h-100" style="border-left: 3px solid black;height: 130px !important;">
						<div class="app-card-body p-3 p-lg-4">
							<h4 class="stats-type mb-1">Rejected Users</h4>
							<div class="stats-figure">
								<h3><?php echo $rejected; ?></h3>
							</div>
							<div class="stats-meta">
								<a href="#">More info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<!--//app-card-body-->
						<!-- <a class="app-card-link-mask" href="#"></a> -->
					</div>
					<!--//app-card-->
				</div>
				<!--//col-->
                
                
                
                	<div class="col-6 col-lg-3">
					<div class="app-card app-card-stat shadow-sm h-100" style="border-left: 3px solid red;    height: 240px !important;">
						<div class="app-card-body p-3 p-lg-4">
							<h4 class="stats-type mb-1">Deleted Users</h4><br>
							<div class="stats-figure">
								<h3><?php echo $deleted; ?></h3>
							</div>
							<div class="stats-meta" style="padding-top: 85px;">
								<a href="#">More info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<!--//app-card-body-->
						<!-- <a class="app-card-link-mask" href="#"></a> -->
					</div>
					<!--//app-card-->
				</div>
				<!--//col-->
				<div class="col-6 col-lg-6">
					<div class="app-card app-card-stat shadow-sm h-100" style="border-left: 3px solid grey;    height: 240px !important;">
						<div class="app-card-body p-3 p-lg-4">
							<h4 class="stats-type mb-1">Source </h4><br>

							<p style="color:#000000">Website: <?= $website ?></p>
							<p style="color:#000000">Admin: <?= $admin ?></p>
							<p style="color:#000000">Mobile: <?= $mobile ?></p>

							<div class="stats-meta" style="padding-top: 10px;">
								<a href="#">More info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
							<!-- <h4 class="stats-type mb-1">Deleted Users</h4>
							<div class="stats-figure"><h3><?php echo $deleted;; ?></h3></div>
							<div class="stats-meta">
								<a href="#">More info <i class="fas fa-arrow-circle-right"></i></a>
							</div> -->
						</div>
						<!--//app-card-body-->
						<!-- <a class="app-card-link-mask" href="#"></a> -->
					</div>
					<!--//app-card-->
				</div>
				<!-- gender count -->
				<div class="col-6 col-lg-3">
					<div class="app-card app-card-stat shadow-sm h-100" style="border-left: 3px solid Blue;    height: 240px !important;">
						<div class="app-card-body p-3 p-lg-4">
							<h4 class="stats-type mb-1">Gender count </h4><br>
							<p style="color: #000000">Male: <?= $male ?></p>
							<p style="color: #000000">Female:<?= $female ?></p>

						</div>
						<div class="stats-meta" style="padding-top: 25px;">
							<a href="#">More info <i class="fas fa-arrow-circle-right"></i></a>
						</div>
						<!--//app-card-body-->
						<!-- <a class="app-card-link-mask" href="#"></a> -->
					</div>
					<!--//app-card-->
				</div>
				<!--//col-->
                <!--//col-->
            </div>
            <!--//row-->
                <!--//col-->
            </div>
            <!--//row-->
            
        </div>
        

		</div>
		<!--//container-fluid-->
	</div>
	<!--//app-content-->

	<?php include('footer.php'); ?>

	<!-- Charts JS -->
	<script src="<?php echo base_url(); ?>assets/plugins/chart.js/chart.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/index-charts.js"></script>

	</html>