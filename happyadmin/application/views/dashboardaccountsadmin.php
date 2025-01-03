                <?php include('header.php'); ?>
                <?php include('menuaccountsadmin.php'); ?>
                
                <div class="app-wrapper">
                
                <div class="app-content pt-3 p-md-3 p-lg-4">
                <div class="container-xl">
                
                <h1 class="app-page-title">Overview</h1>
                
                <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
                <div class="inner">
                <div class="app-card-body p-3 p-lg-4">
                <h3 class="mb-3">Happy Nikah Accounts Admin Dashboard!</h3>
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
                <div class="app-card app-card-stat shadow-sm h-100 " style="border-left: 3px solid #fc6f90;height: 260px !important;">
                <div class="app-card-body p-3 p-lg-4">
                <h4 class="stats-type mb-1" style="font-size: 24px;">Sale Amount</h4>
                <div class="stats-figure" style="margin-top: 35px;">
                
                 <?php $cdate=date('Y-m-d');?>
                             
                                                
                
                <?php $data4 = $this->db->query("SELECT SUM(tp.final_amount) as total FROM tbl_payement tp JOIN tbl_registration tr ON tp.user_id = tr.id WHERE tp.status = '1' 
                               AND tp.date = '$cdate' AND tp.payment_status = 'Paid'  AND tr.goto_nikah = 0")->row();?>
     

                <h3> 
                <i class="fa-sharp fa-solid fa-indian-rupee-sign"></i> <?php echo $data4->total;?> 
                </h3>
                
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
                <div class="app-card app-card-stat shadow-sm h-100" style="border-left: 3px solid orange;height: 260px !important;">
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
              
                
                <p style="color: #000;font-size: 17px;margin-left: 48px;text-align: justify;margin-top: 35px;">Bronze Plan:<?php echo $bronze;?></p>
                <p style="color: #000;font-size: 17px;margin-left: 48px;text-align: justify;">Diamond Plan:<?php echo $diamond;?></p>
                <p style="color: #000;font-size: 17px;margin-left: 48px;text-align: justify;">Crown Plan:<?php echo $crown;?></p>
                <p style="color: #000;font-size: 17px;margin-left: 48px;text-align: justify;margin-top: -123px;margin-left: 295px;">Master Plan:<?php echo $master;?></p>
                <p style="color: #000;font-size: 17px;margin-left: 48px;text-align: justify; margin-left: 295px;">Assisted Plan:<?php echo $assisted;?></p>
                <p style="color: #000;font-size: 17px;margin-left: 48px;text-align: justify; margin-left: 295px;">Assisted Pro Plan:<?php echo $assisted_pro;?></p>
                
                
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
                <div class="app-card app-card-stat shadow-sm h-100" style="border-left: 3px solid #15a362;height: 260px !important;">
                <div class="app-card-body p-3 p-lg-4">
                <h4 class="stats-type mb-1" style="font-size: 24px;">Balance</h4>
                <div class="stats-figure">
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
                <div class="stats-meta" style="margin-top: 140px;"> 
                <a href="#">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
                </div>
                <!--//app-card-body-->
                <!-- <a class="app-card-link-mask" href="#"></a> -->
                </div>
                <!--//app-card-->
                </div>
                
                
                
                <p>Total</p>
                <div class="row g-4 mb-4">
                <div class="col-6 col-lg-3">
                <div class="app-card app-card-stat shadow-sm h-100 " style="border-left: 3px solid #fc6f90;height: 260px !important;">
                <div class="app-card-body p-3 p-lg-4">
                <h4 class="stats-type mb-1" style="font-size: 24px;">Sale Amount</h4>
                <div class="stats-figure">
                
                <?php $cdate=date('Y-m-d');?>
                
                <?php $data4 =  $this->db->query("SELECT SUM(tp.final_amount) as total FROM tbl_payement tp JOIN tbl_registration tr ON tp.user_id = tr.id WHERE tp.status = '1' 
                                AND  tp.payment_status = 'Paid'  AND tr.goto_nikah = 0")->row();?>
                
                
                <h3> <i class="fa-sharp fa-solid fa-indian-rupee-sign"></i> <?php echo $data4->total;?> </h3>
                
                </div>
                <div class="stats-meta text-success"  style="margin-top:124px;">
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
                <div class="app-card app-card-stat shadow-sm h-100" style="border-left: 3px solid orange;    height: 260px !important;">
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
                
                
                <p style="color: #000;font-size: 17px;margin-left: 48px;text-align: justify;margin-top: 35px;">Bronze Plan:<?php echo $bronze;?></p>
                <p style="color: #000;font-size: 17px;margin-left: 48px;text-align: justify;">Diamond Plan:<?php echo $diamond;?></p>
                <p style="color: #000;font-size: 17px;margin-left: 48px;text-align: justify;">Crown Plan:<?php echo $crown;?></p>
                <p style="color: #000;font-size: 17px;margin-left: 48px;text-align: justify;margin-top: -123px;margin-left: 295px;">Master Plan:<?php echo $master;?></p>
                <p style="color: #000;font-size: 17px;margin-left: 48px;text-align: justify; margin-left: 295px;">Assisted Plan:<?php echo $assisted;?></p>
                <p style="color: #000;font-size: 17px;margin-left: 48px;text-align: justify; margin-left: 295px;">Assisted Pro Plan:<?php echo $assisted_pro;?></p>
                
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
                <div class="app-card app-card-stat shadow-sm h-100" style="border-left: 3px solid #15a362;    height: 260px !important;">
                <div class="app-card-body p-3 p-lg-4">
                <h4 class="stats-type mb-1" style="font-size: 24px;">Balance</h4>
                <div class="stats-figure">
                <h3> <i class="fa-sharp fa-solid fa-indian-rupee-sign"></i>
                
                <!--336858-->
                
                <?php $countbalanceall = "470000";?> 
                
                <?php $this->db->select_sum('final_amount');
                $query = $this->db->get('tbl_payement');
                
                $result = $query->row();?>
                
                <?php $todayamountall= $result->final_amount;?>
                
                <?php $totalbalance=$countbalanceall-$todayamountall;?>
                <!--336858-->
                <?php echo  $totalbalance;?>     
                          
                
                </h3>
                </div>
                <div class="stats-meta"  style="margin-top: 135px;">
                <a href="#">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
                </div>
                <!--//app-card-body-->
                <!-- <a class="app-card-link-mask" href="#"></a> -->
                </div>
                <!--//app-card-->
                </div>
                
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