<?php include('header.php'); ?>

  <?php 
    include('menusupport_gotonikah.php');    
?>
<div class="app-wrapper">
    
    <style>
        
        .app-card-orders-table .table .cell {
    font-size: 19px;
    border-color: #e7e9ed;
    color: #5d6778;
    text-align: center;
    vertical-align: middle;
        }
    </style>

	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">

        <h1 class="app-page-title">Overview</h1>
        <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
        <div class="inner">
        <div class="app-card-body p-3 p-lg-4">
        <h3 class="mb-3">Goto Nikah Support Admin Dashboard!</h3>
        <div class="row gx-5 gy-3">
        <div class="col-12 col-lg-8">
        
        <div>Gotonikah.com Meet your perfect partner from sites to "tie up together",<br>
        All Muslim community can find their suitable brides and grooms with thousands of profiles.</div>
        </div>
        <!--//col-->
        <div class="col-12 col-lg-3">
        <a class="btn app-btn-primary" href="https://happynikah.com/"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-arrow-down me-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
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
        
    
               <?php $user_id=$this->session->userdata('user_id_admin');?>
               
               <?php if($user_id==26)
               {?>
                
                <p>Daily</p>
                <div class="row g-4 mb-4">
                <div class="col-6 col-lg-3">
                <div class="app-card app-card-stat shadow-sm h-100 " style="border-left: 3px solid #fc6f90">
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
                <div class="app-card app-card-stat shadow-sm h-100" style="border-left: 3px solid orange">
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
                <div class="app-card app-card-stat shadow-sm h-100" style="border-left: 3px solid #15a362;">
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
                <div class="app-card app-card-stat shadow-sm h-100" style="border-left: 3px solid black">
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
                <div class="app-card app-card-stat shadow-sm h-100" style="border-left: 3px solid red;height: 185px !important;">
                <div class="app-card-body p-3 p-lg-4">
                <h4 class="stats-type mb-1">Deleted Users</h4><br>
                <div class="stats-figure">
                <h3><?php echo $daily_deleted;; ?></h3>
                </div>
                
                <!--<div class="stats-meta" style="padding-top: 25px;">-->
                <!--	<a href="#">More info <i class="fas fa-arrow-circle-right"></i></a>-->
                <!--</div>-->
                
                </div>
                <!--//app-card-body-->
                <!-- <a class="app-card-link-mask" href="#"></a> -->
                </div>
                <!--//app-card-->
                </div>
                <!--//col-->
                <div class="col-6 col-lg-6">
                <div class="app-card app-card-stat shadow-sm h-100" style="border-left: 3px solid grey;height:186px !important;">
                <div class="app-card-body p-3 p-lg-4">
                <h4 class="stats-type mb-1">Source </h4><br>
                
                <p style="color:#000000">Website: <?= $daily_website ?></p>
                <p style="color:#000000">Admin: 
                
                <?php echo $daily_admin2->num_rows(); ?>
                
                
                </p>
                <p style="color:#000000">Mobile: <?= $daily_mobile ?></p>
                
                <!--<div class="stats-meta" style="padding-top: 59px;">-->
                <!--	<a href="#">More info <i class="fas fa-arrow-circle-right"></i></a>-->
                <!--</div>-->
                
                
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
                <div class="app-card app-card-stat shadow-sm h-100" style="border-left: 3px solid Blue;height: 185px !important;">
                <div class="app-card-body p-3 p-lg-4">
                <h4 class="stats-type mb-1">Gender count </h4><br>
                <p style="color: #000000">Male: <?= $daily_male ?></p>
                <p style="color: #000000">Female:<?= $daily_female ?></p>
                
                </div>
                <div class="stats-meta" style="padding-top: 74px;">
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
                
                
                <?php $photounavail = $this->db->query("SELECT COUNT(*) AS total_count FROM tbl_registration R WHERE NOT EXISTS (SELECT * FROM tbl_userimages U WHERE R.id = U.user_id) AND R.status = '1' AND R.goto_nikah = '1' AND R.photo = ''");?>
                <?php $photounavail_count = $photounavail->row()->total_count;?>
                <?php $photo_unavailbale = $this->db->select('*')->from('tbl_registration')->where('status','1')->where('photo','')->get()->num_rows();?>
                
                <?php $photo_unavailbale_male = $this->db->query("SELECT COUNT(*) AS total_count FROM tbl_registration R WHERE NOT EXISTS (SELECT * FROM tbl_userimages U WHERE R.id = U.user_id) AND R.status = '1' AND R.goto_nikah = '1'  AND R.gender='1' AND R.photo = ''");?>
                <?php $photounavailmale_count = $photo_unavailbale_male->row()->total_count;?>
                
                <?php $photo_unavailbale_female = $this->db->query("SELECT COUNT(*) AS total_count FROM tbl_registration R WHERE NOT EXISTS (SELECT * FROM tbl_userimages U WHERE R.id = U.user_id) AND R.status = '1'  AND R.goto_nikah = '1'  AND R.gender='2' AND R.photo = ''");?>
                <?php $photounavailfemale_count = $photo_unavailbale_female->row()->total_count;?>
                <h3>  <?php echo $photounavail_count; ?> </h3>
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
                
                
                <?php $photoavail = $this->db->query("SELECT count(*) AS total_count FROM `tbl_userimages` LEFT JOIN tbl_registration ON tbl_userimages.user_id=tbl_registration.id WHERE tbl_userimages.status!='1' AND tbl_registration.status!='3'  AND tbl_registration.goto_nikah='1'  AND tbl_registration.photo!=''");?>
                <?php $photoavail_count = $photoavail->row()->total_count;?>
                
                <?php $photo_availbale_male =  $this->db->query("SELECT count(*) AS total_count FROM `tbl_userimages` LEFT JOIN tbl_registration ON tbl_userimages.user_id=tbl_registration.id WHERE tbl_userimages.status!='1' AND tbl_registration.status!='3' AND tbl_registration.gender='1'  AND tbl_registration.goto_nikah='1' AND tbl_registration.photo!=''");?>
                <?php $photoavailmale_count = $photo_availbale_male->row()->total_count;?>
                
                <?php $photo_availbale_female =  $this->db->query("SELECT count(*) AS total_count FROM `tbl_userimages` LEFT JOIN tbl_registration ON tbl_userimages.user_id=tbl_registration.id WHERE tbl_userimages.status!='1' AND tbl_registration.status!='3' AND tbl_registration.gender='2'  AND tbl_registration.goto_nikah='1'  AND tbl_registration.photo!=''");?>
                <?php $photoavailfemale_count = $photo_availbale_female->row()->total_count;?>
                
                
                <h3> 
                <?php echo $photoavail_count; ?> 
                </h3>
                </div>
                
                <p style="color: #000000;margin-left: -90px;margin-top: 36px;font-size: 19px;">Male:<?php echo $photoavailmale_count; ?> </p>
                
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
                
                
                
        <?php $photoavail = $this->db->query("SELECT COUNT(*) AS total_count FROM tbl_registration R WHERE  EXISTS (SELECT * FROM tbl_userimages U WHERE R.id = U.user_id) AND R.status = '1'  AND R.goto_nikah = '1'  AND R.photo!= ''");?>
        <?php $photoavail_count = $photoavail->row()->total_count;?>
        
        <?php $photo_availbale_male = $this->db->query("SELECT COUNT(*) AS total_count FROM tbl_registration R WHERE EXISTS (SELECT * FROM tbl_userimages U WHERE R.id = U.user_id) AND R.status = '1' AND R.goto_nikah = '1'  AND R.gender='1' AND R.photo!= ''");?>
        <?php $photoavailmale_count = $photo_availbale_male->row()->total_count;?>
        
        <?php $photo_availbale_female = $this->db->query("SELECT COUNT(*) AS total_count FROM tbl_registration R WHERE EXISTS (SELECT * FROM tbl_userimages U WHERE R.id = U.user_id) AND R.status = '1'  AND R.goto_nikah = '1'  AND R.gender='2' AND R.photo!= ''");?>
        <?php $photoavailfemale_count = $photo_availbale_female->row()->total_count;?>
        
        
        <?php $daily_reg_date=date('Y-m-d');?>
        <?php $daily_photo = $this->db->select('*')->from('tbl_registration')->where('photo!=','')->where('status','1')->where('goto_nikah','1')->where('reg_date',$daily_reg_date)->get()->num_rows();?>
        <?php $daily_photo_male = $this->db->select('*')->from('tbl_registration')->where('photo!=','')->where('status','1')->where('goto_nikah','1')->where('reg_date',$daily_reg_date)->where('gender','1')->get()->num_rows();?>
        <?php $daily_photo_female = $this->db->select('*')->from('tbl_registration')->where('photo!=','')->where('status','1')->where('goto_nikah','1')->where('reg_date',$daily_reg_date)->where('gender','2')->get()->num_rows();?>
        
        
        <?php $daily_photo_unavailable = $this->db->select('*')->from('tbl_registration')->where('photo','')->where('status','1')->where('goto_nikah','1')->where('reg_date',$daily_reg_date)->get()->num_rows();?>
        <?php $daily_photo_unavailable_male = $this->db->select('*')->from('tbl_registration')->where('photo','')->where('status','1')->where('goto_nikah','1')->where('gender','1')->where('reg_date',$daily_reg_date)->get()->num_rows();?>
        <?php $daily_photo_unavailable_female = $this->db->select('*')->from('tbl_registration')->where('photo','')->where('status','1')->where('goto_nikah','1')->where('gender','2')->where('reg_date',$daily_reg_date)->get()->num_rows();?>

                
                </div>
               
                <p style="color: #000000;margin-left: 0px;margin-top: 36px;font-size: 19px;">Daily Approved Profile: <?php echo $daily_approved; ?> </p>
                
                <p style="color: #000000;margin-left: -66px;margin-top: 36px;font-size: 19px;">Photo Available:&nbsp;<?php echo $daily_photo; ?> 
                
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
                
                <h4>Today Creation</h4>
                <div class="tab-content" id="orders-table-tab-content">
                <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body">
                <div class="table-responsive">
                
                
                <table id="example" class="table app-table-hover mb-0 text-left">
                <!--<button class="btn btn-secondary" style="margin-left:10px;margin-top:10px;" >Back</button>-->
                <thead style="background-color:#d7c9c9;">
                <tr>
                <th class="cell" style="font-size: 18px;">Sl No</th>
                
                <th class="cell" style="font-size: 18px;">Name</th>
                
                <th class="cell" style="font-size: 18px;">Male</th>
                <th class="cell" style="font-size: 18px;">Female</th>
                <th class="cell" style="font-size: 18px;">Total</th>
                
                
                </tr>
                
                </thead>
                <tbody>
                    
                <?php
                $i = 1;
                $todaycreation = $this->db->select('*')->from('tbl_users1')->where('user_id !=', 33)->where('user_type', 4)->get()->result_array();
                
                $tdydate=date('Y-m-d');?>
                
                <?php foreach ($todaycreation as $value) { ?>
                
                <?php $assignId = $value['user_id'];?>
                
                <?php
                
                $todaycount =  $this->db->select('*')->from('tbl_registration')
                ->where('staff_id',$assignId)->where('goto_nikah','1')->where('gender','1')->where('reg_date',$tdydate)->get();
                $todaycount2 =  $this->db->select('*')->from('tbl_registration')
                ->where('staff_id',$assignId)->where('goto_nikah','1')->where('gender','2')->where('reg_date',$tdydate)->get();
                
                $totalRowCount += $todaycount->num_rows();
                $totalRowCount += $todaycount2->num_rows();
                
                
                $totalMaleCount += $todaycount->num_rows();
                $totalFemaleCount += $todaycount2->num_rows();
                
                
                ?>
                
                <tr>
                <td class="cell"><?php echo $i; ?></td>
                <td class="cell"><?php echo $value['user_name']; ?></td>
                <td class="cell"><?php echo $todaycount->num_rows(); ?></td>
                <td class="cell"><?php echo $todaycount2->num_rows(); ?></td>
                <td class="cell">
                <?php $tody_total= $todaycount->num_rows()+$todaycount2->num_rows(); ?>
                <?php echo $tody_total;?>
                </td>
                </tr>
                <?php
                $i++;
                }
                ?>
                
                
                <tr>
                <td colspan="2" class="cell" style="font-size: 19px;border-color: #e7e9ed;color: #5d6778;text-align: center;vertical-align: middle;font-weight:600;">Grand Total</td>
                
                
                <td style="text-align: center;font-weight: 700;font-size: 22;">
                <?php echo $totalMaleCount; ?>
                
                </td>
                
                <td style="text-align: center;font-weight: 700;font-size: 22;">
                <?php echo $totalFemaleCount; ?>
                
                </td>
                
                <td style="text-align: center;font-weight: 700;font-size: 30;">
                <?php echo $totalRowCount;?>
                
                </td>
                </tr>
                
                <!--<tr colspan="3">Total</tr>-->
                </tbody>
                </table>
                </div>
                <!-- /.card-body -->
                </div>
                <!-- /.card -->
                </div>
                <!-- /.col -->
                </div>
                <!-- /.row -->
                </div>


                <h4> District Vise Today Creation</h4>
                <div class="tab-content" id="orders-table-tab-content">
                <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body">
                <div class="table-responsive">
                
                
                <table id="example" class="table app-table-hover mb-0 text-left">
                <!--<button class="btn btn-secondary" style="margin-left:10px;margin-top:10px;" >Back</button>-->
                <thead style="background-color:#d7c9c9;">
                <tr>
                <th class="cell" style="font-size: 18px;">Sl No</th>
                
                <th class="cell" style="font-size: 18px;">District</th>
                
                <th class="cell" style="font-size: 18px;">Male</th>
                <th class="cell" style="font-size: 18px;">Female</th>
                <th class="cell" style="font-size: 18px;">Total</th>
                
                
                </tr>
                
                </thead>
                <tbody>
                <?php
                $i = 1;
                $todaycreation = $this->db->select('*')->from('tbl_district')->where('state_id', 18)->where_not_in('district', 'All Kerala')->get()->result_array();
                
                $todaycreation_all = $this->db->select('*')->from('tbl_registration')->get()->result_array();
                
                
                $tdydate=date('Y-m-d');
                
                $todaycount =  $this->db->select('*')->from('tbl_registration')
                ->where('home_district','1')->where('gender','1')->where('goto_nikah','1')->where('reg_date',$tdydate)->get();
                $todaycount2 =  $this->db->select('*')->from('tbl_registration')
                ->where('home_district','1')->where('gender','2')->where('goto_nikah','1')->where('reg_date',$tdydate)->get();
                
                $todaycount3 =  $this->db->select('*')->from('tbl_registration')
                ->where('home_district','2')->where('gender','1')->where('goto_nikah','1')->where('reg_date',$tdydate)->get();
                $todaycount4 =  $this->db->select('*')->from('tbl_registration')
                ->where('home_district','2')->where('gender','2')->where('goto_nikah','1')->where('reg_date',$tdydate)->get();
                
                $todaycount5 =  $this->db->select('*')->from('tbl_registration')
                ->where('home_district','3')->where('gender','1')->where('goto_nikah','1')->where('reg_date',$tdydate)->get();
                $todaycount6=  $this->db->select('*')->from('tbl_registration')
                ->where('home_district','3')->where('gender','2')->where('goto_nikah','1')->where('reg_date',$tdydate)->get();  
                
                $todaycount7 =  $this->db->select('*')->from('tbl_registration')
                ->where('home_district','4')->where('gender','1')->where('goto_nikah','1')->where('reg_date',$tdydate)->get();
                $todaycount8=  $this->db->select('*')->from('tbl_registration')
                ->where('home_district','4')->where('gender','2')->where('goto_nikah','1')->where('reg_date',$tdydate)->get(); 
                
                $todaycount9 =  $this->db->select('*')->from('tbl_registration')
                ->where('home_district','5')->where('gender','1')->where('goto_nikah','1')->where('reg_date',$tdydate)->get();
                $todaycount10=  $this->db->select('*')->from('tbl_registration')
                ->where('home_district','5')->where('gender','2')->where('goto_nikah','1')->where('reg_date',$tdydate)->get();  
                
                $todaycount11 =  $this->db->select('*')->from('tbl_registration')
                ->where('home_district','6')->where('gender','1')->where('goto_nikah','1')->where('reg_date',$tdydate)->get();
                $todaycount12=  $this->db->select('*')->from('tbl_registration')
                ->where('home_district','6')->where('gender','2')->where('goto_nikah','1')->where('reg_date',$tdydate)->get();  
                
                
                $todaycount13 =  $this->db->select('*')->from('tbl_registration')
                ->where('home_district','7')->where('gender','1')->where('goto_nikah','1')->where('reg_date',$tdydate)->get();
                $todaycount14=  $this->db->select('*')->from('tbl_registration')
                ->where('home_district','7')->where('gender','2')->where('goto_nikah','1')->where('reg_date',$tdydate)->get();  
                
                $todaycount15 =  $this->db->select('*')->from('tbl_registration')
                ->where('home_district','8')->where('gender','1')->where('goto_nikah','1')->where('reg_date',$tdydate)->get();
                $todaycount16=  $this->db->select('*')->from('tbl_registration')
                ->where('home_district','8')->where('gender','2')->where('goto_nikah','1')->where('reg_date',$tdydate)->get();  
                
                
                $todaycount17 =  $this->db->select('*')->from('tbl_registration')
                ->where('home_district','9')->where('gender','1')->where('goto_nikah','1')->where('reg_date',$tdydate)->get();
                $todaycount18=  $this->db->select('*')->from('tbl_registration')
                ->where('home_district','9')->where('gender','2')->where('goto_nikah','1')->where('reg_date',$tdydate)->get();  
                
                
                $todaycount19 =  $this->db->select('*')->from('tbl_registration')
                ->where('home_district','10')->where('gender','1')->where('goto_nikah','1')->where('reg_date',$tdydate)->get();
                $todaycount20=  $this->db->select('*')->from('tbl_registration')
                ->where('home_district','10')->where('gender','2')->where('goto_nikah','1')->where('reg_date',$tdydate)->get();  
                
                $todaycount21 =  $this->db->select('*')->from('tbl_registration')
                ->where('home_district','11')->where('gender','1')->where('goto_nikah','1')->where('reg_date',$tdydate)->get();
                $todaycount22=  $this->db->select('*')->from('tbl_registration')
                ->where('home_district','11')->where('gender','2')->where('goto_nikah','1')->where('reg_date',$tdydate)->get();  
                
                
                $todaycount23 =  $this->db->select('*')->from('tbl_registration')
                ->where('home_district','12')->where('gender','1')->where('goto_nikah','1')->where('reg_date',$tdydate)->get();
                $todaycount24=  $this->db->select('*')->from('tbl_registration')
                ->where('home_district','12')->where('gender','2')->where('goto_nikah','1')->where('reg_date',$tdydate)->get(); 
                
                $todaycount25 =  $this->db->select('*')->from('tbl_registration')
                ->where('home_district','13')->where('gender','1')->where('goto_nikah','1')->where('reg_date',$tdydate)->get();
                $todaycount26=  $this->db->select('*')->from('tbl_registration')
                ->where('home_district','13')->where('gender','2')->where('goto_nikah','1')->where('reg_date',$tdydate)->get(); 
                
                
                $todaycount27 =  $this->db->select('*')->from('tbl_registration')
                ->where('home_district','14')->where('gender','1')->where('goto_nikah','1')->where('reg_date',$tdydate)->get();
                $todaycount28=  $this->db->select('*')->from('tbl_registration')
                ->where('home_district','14')->where('gender','2')->where('goto_nikah','1')->where('reg_date',$tdydate)->get(); 
                
                
                foreach ($todaycreation as $value) 
                { 
                ?>
                <tr>
                <td class="cell"><?php echo $i; ?></td>
                
                <td class="cell">
                <?php echo $value['district'];?>
                
                
                </td>
                
                <td class="cell">
                
                <?php if($value['district_id']=='1')
                {?>
                <?php echo $todaycount->num_rows(); ?>
                
                <?php }?>
                <?php if($value['district_id']=='2')
                {?>
                <?php echo $todaycount3->num_rows(); ?>
                
                <?php }?>
                <?php if($value['district_id']=='3')
                {?>
                <?php echo $todaycount5->num_rows(); ?>
                
                <?php }?>
                <?php if($value['district_id']=='4')
                {?>
                <?php echo $todaycount7->num_rows(); ?>
                
                <?php }?>
                <?php if($value['district_id']=='5')
                {?>
                <?php echo $todaycount9->num_rows(); ?>
                
                <?php }?>
                
                <?php if($value['district_id']=='6')
                {?>
                <?php echo $todaycount11->num_rows(); ?>
                
                <?php }?>
                
                <?php if($value['district_id']=='7')
                {?>
                <?php echo $todaycount13->num_rows(); ?>
                
                <?php }?>
                
                <?php if($value['district_id']=='8')
                {?>
                <?php echo $todaycount15->num_rows(); ?>
                
                <?php }?>
                
                <?php if($value['district_id']=='9')
                {?>
                <?php echo $todaycount17->num_rows(); ?>
                
                <?php }?>
                
                
                <?php if($value['district_id']=='10')
                {?>
                <?php echo $todaycount19->num_rows(); ?>
                
                <?php }?>
                
                <?php if($value['district_id']=='11')
                {?>
                <?php echo $todaycount21->num_rows(); ?>
                
                <?php }?>
                
                <?php if($value['district_id']=='12')
                {?>
                <?php echo $todaycount23->num_rows(); ?>
                
                <?php }?>
                
                
                <?php if($value['district_id']=='13')
                {?>
                <?php echo $todaycount25->num_rows(); ?>
                
                <?php }?>
                
                <?php if($value['district_id']=='14')
                {?>
                <?php echo $todaycount27->num_rows(); ?>
                
                <?php }?>
                
                
                </td>
                
                
                
                <td class="cell">
                
                
                <?php if($value['district_id']=='1')
                {?>
                <?php echo $todaycount2->num_rows(); ?>
                <?php }?>
                
                <?php if($value['district_id']=='2')
                {?>
                <?php echo $todaycount4->num_rows(); ?>
                <?php }?>
                
                <?php if($value['district_id']=='3')
                {?>
                <?php echo $todaycount6->num_rows(); ?>
                
                <?php }?>
                
                <?php if($value['district_id']=='4')
                {?>
                <?php echo $todaycount8->num_rows(); ?>
                
                <?php }?>
                
                <?php if($value['district_id']=='5')
                {?>
                <?php echo $todaycount10->num_rows(); ?>
                
                <?php }?>
                <?php if($value['district_id']=='6')
                {?>
                <?php echo $todaycount12->num_rows(); ?>
                
                <?php }?>
                
                
                <?php if($value['district_id']=='7')
                {?>
                <?php echo $todaycount14->num_rows(); ?>
                
                <?php }?>
                
                <?php if($value['district_id']=='8')
                {?>
                <?php echo $todaycount16->num_rows(); ?>
                
                <?php }?>
                
                <?php if($value['district_id']=='9')
                {?>
                <?php echo $todaycount18->num_rows(); ?>
                <?php }?>
                
                <?php if($value['district_id']=='10')
                {?>
                <?php echo $todaycount20->num_rows(); ?>
                <?php }?>
                
                <?php if($value['district_id']=='11')
                {?>
                <?php echo $todaycount22->num_rows(); ?>
                <?php }?>
                
                <?php if($value['district_id']=='12')
                {?>
                <?php echo $todaycount24->num_rows(); ?>
                <?php }?>
                
                
                <?php if($value['district_id']=='13')
                {?>
                <?php echo $todaycount26->num_rows(); ?>
                <?php }?>
                
                <?php if($value['district_id']=='14')
                {?>
                <?php echo $todaycount28->num_rows(); ?>
                <?php }?>
                
                
                </td>
                
                
                
                <td class="cell">
                
                
                <?php if($value['district_id']=='1')
                {?>
                <?php $a= $todaycount->num_rows()+$todaycount2->num_rows();?>
                <?php echo $a;?>
                <?php }?>
                
                <?php if($value['district_id']=='2')
                {?>
                <?php $b= $todaycount3->num_rows()+$todaycount4->num_rows();?>
                <?php echo $b;?>
                <?php }?>
                
                <?php if($value['district_id']=='3')
                {?>
                <?php $c= $todaycount5->num_rows()+$todaycount6->num_rows();?>
                <?php echo $c;?>
                <?php }?>
                
                
                <?php if($value['district_id']=='4')
                {?>
                <?php $d= $todaycount7->num_rows()+$todaycount8->num_rows();?>
                <?php echo $d;?>
                <?php }?>
                
                
                <?php if($value['district_id']=='5')
                {?>
                <?php $e= $todaycount9->num_rows()+$todaycount10->num_rows();?>
                <?php echo $e;?>
                <?php }?>
                
                
                <?php if($value['district_id']=='6')
                {?>
                <?php $f= $todaycount11->num_rows()+$todaycount12->num_rows();?>
                <?php echo $f;?>
                <?php }?>
                
                
                <?php if($value['district_id']=='7')
                {?>
                <?php $g= $todaycount13->num_rows()+$todaycount14->num_rows();?>
                <?php echo $g;?>
                <?php }?>
                
                
                <?php if($value['district_id']=='8')
                {?>
                <?php $h= $todaycount15->num_rows()+$todaycount16->num_rows();?>
                <?php echo $h;?>
                <?php }?>
                
                <?php if($value['district_id']=='9')
                {?>
                <?php $i2= $todaycount17->num_rows()+$todaycount18->num_rows();?>
                <?php echo $i2;?>
                <?php }?>
                
                <?php if($value['district_id']=='10')
                {?>
                <?php $j= $todaycount19->num_rows()+$todaycount20->num_rows();?>
                <?php echo $j;?>
                <?php }?>
                
                
                <?php if($value['district_id']=='11')
                {?>
                <?php $k= $todaycount21->num_rows()+$todaycount22->num_rows();?>
                <?php echo $k;?>
                <?php }?>
                
                <?php if($value['district_id']=='12')
                {?>
                <?php $l= $todaycount23->num_rows()+$todaycount24->num_rows();?>
                <?php echo $l;?>
                <?php }?>
                
                
                <?php if($value['district_id']=='13')
                {?>
                <?php $m= $todaycount25->num_rows()+$todaycount26->num_rows();?>
                <?php echo $m;?>
                <?php }?>
                
                <?php if($value['district_id']=='14')
                {?>
                <?php $n= $todaycount27->num_rows()+$todaycount28->num_rows();?>
                <?php echo $n;?>
                <?php }?>
                
                
                
                </td>
                
                
                </tr>
                
                <?php
                $i++;
                }
                ?>
                
                
                
                <tr>
                <td colspan="2" class="cell" style="font-size: 19px;border-color: #e7e9ed;color: #5d6778;text-align: center;vertical-align: middle;font-weight:600;">Grand Total</td>
                
                
                <td style="font-weight: 700;font-size: 22;text-align: center;">
                
                <?php $tdytotalmale=$todaycount->num_rows()+$todaycount3->num_rows()+$todaycount5->num_rows()+$todaycount7->num_rows()
                +$todaycount9->num_rows()+$todaycount11->num_rows()+$todaycount13->num_rows()+$todaycount15->num_rows()+$todaycount17->num_rows()+$todaycount19->num_rows()+
                $todaycount21->num_rows()+$todaycount23->num_rows()+$todaycount25->num_rows()+$todaycount27->num_rows();?>
                
                <?php echo $tdytotalmale;?>
                
                </td>
                
                <td style="font-weight: 700;font-size: 22;text-align: center;">
                
                <?php $tdytotalfemale=$todaycount2->num_rows()+$todaycount4->num_rows()+$todaycount6->num_rows()+$todaycount8->num_rows()+$todaycount10->num_rows()+$todaycount12->num_rows()
                +$todaycount14->num_rows()+$todaycount16->num_rows()+$todaycount18->num_rows()+$todaycount20->num_rows()+$todaycount22->num_rows()+$todaycount24->num_rows()+
                $todaycount26->num_rows()+$todaycount28->num_rows();?>
                
                <?php echo $tdytotalfemale;?>
                
                </td>
                
                <td style="font-weight: 700;font-size: 30;text-align: center;">
                <?php $tdytotal=$a+$b+$c+$d+$e+$f+$g+$h+$i2+$j+$k+$l+$m+$n;?>
                <?php echo $tdytotal;?>
                
                </td>
                </tr>
                
                
                
                <!--<tr colspan="3">Total</tr>-->
                </tbody>
                </table>
                </div>
                <!-- /.card-body -->
                </div>
                <!-- /.card -->
                </div>
                <!-- /.col -->
                </div>
                <!-- /.row -->
                </div>
                <?php }?>
        
        
        
        
        
            <?php if($user_id==26)
            {?>
            <p>Total</p>
            
            <div class="col-6 col-lg-3">
            <div class="app-card app-card-stat shadow-sm h-10" style="border-left: 3px solid #fc6f90">
            <div class="app-card-body p-3 p-lg-4">
            <h4 class="stats-type mb-1">All Users</h4>
            <div class="stats-figure"><?php echo $all; ?></div>
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
            <div class="app-card app-card-stat shadow-sm h-10" style="border-left: 3px solid orange">
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
            <div class="app-card app-card-stat shadow-sm h-10" style="border-left: 3px solid #15a362;">
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
            <div class="app-card app-card-stat shadow-sm h-10" style="border-left: 3px solid black">
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
            <div class="app-card app-card-stat shadow-sm h-10" style="border-left: 3px solid red;height: 185px !important;">
            <div class="app-card-body p-3 p-lg-4">
            <h4 class="stats-type mb-1">Deleted Users</h4><br>
            <div class="stats-figure">
            <h3><?php echo $deleted;; ?></h3>
            </div>
            
            <!--<div class="stats-meta" style="padding-top: 138px;">-->
            <!--	<a href="#">More info <i class="fas fa-arrow-circle-right"></i></a>-->
            <!--</div>-->
            
            </div>
            <!--//app-card-body-->
            <!-- <a class="app-card-link-mask" href="#"></a> -->
            </div>
            <!--//app-card-->
            </div>
            <!--//col-->
            <div class="col-6 col-lg-6">
            <div class="app-card app-card-stat shadow-sm h-10" style="border-left: 3px solid grey;height: 186px !important;">
            <div class="app-card-body p-3 p-lg-4">
            <h4 class="stats-type mb-1">Source </h4><br>
            
            <p style="color:#000000">Website: <?= $website ?></p>
            <p style="color:#000000">Admin: <?= $admin ?></p>
            <p style="color:#000000">Mobile: <?= $mobile ?></p>
            
            <!--<div class="stats-meta" style="padding-top: 56px;">-->
            <!--	<a href="#">More info <i class="fas fa-arrow-circle-right"></i></a>-->
            <!--</div>-->
            
            
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
            <div class="app-card app-card-stat shadow-sm h-10" style="border-left: 3px solid Blue;height: 185px !important;">
            <div class="app-card-body p-3 p-lg-4">
            <h4 class="stats-type mb-1">Gender count </h4><br>
            <p style="color: #000000">Male: <?= $male ?></p>
            <p style="color: #000000">Female:<?= $female ?></p>
            
            </div>
            <!--<div class="stats-meta" style="padding-top: 72px;">-->
            <!--	<a href="#">More info <i class="fas fa-arrow-circle-right"></i></a>-->
            <!--</div>-->
            <div style="padding-top: 24px;">
            
            </div>
            <!--//app-card-body-->
            <!-- <a class="app-card-link-mask" href="#"></a> -->
            </div>
            <!--//app-card-->
            </div>
            <!--//col-->
      
            
                 
            <h4>Monthly Creation</h4>
            <div class="tab-content" id="orders-table-tab-content">
            <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
            <div class="app-card app-card-orders-table shadow-sm mb-5">
            <div class="app-card-body">
            <div class="table-responsive">
            
            
            <table id="example" class="table app-table-hover mb-0 text-left">
            <!--<button class="btn btn-secondary" style="margin-left:10px;margin-top:10px;" >Back</button>-->
            <thead style="background: #c2baba;">
            <tr>
            <th class="cell" style="font-size: 18px;">Sl No</th>
            
            <th class="cell" style="font-size: 18px;">Name</th>
            
            <th class="cell" style="font-size: 18px;">Male</th>
            <th class="cell" style="font-size: 18px;">Female</th>
            <th class="cell" style="font-size: 18px;">Total</th>
            
            
            </tr>
            
            </thead>
            <tbody>
                
                
            <?php
            $i = 1;
            $totalcreation = $this->db->select('*')->from('tbl_users1')->where('user_id !=', 33)->where('user_type', 4)->get()->result_array();
            
            
            $tdydate=date('Y-m-d');?>
            
            <?php foreach ($totalcreation as $value) { ?>
            
            <?php $assignId = $value['user_id'];?>
            
            
            <?php
            
            $totalcount =  $this->db->select('*')->from('tbl_registration')
            ->where('staff_id',$assignId)->where('goto_nikah','1')->where('gender','1')->where('MONTH(reg_date)', date('m'))->where('YEAR(reg_date)', date('Y'))->get();
            $totalcount2 =  $this->db->select('*')->from('tbl_registration')
            ->where('staff_id',$assignId)->where('goto_nikah','1')->where('gender','2')->where('MONTH(reg_date)', date('m'))->where('YEAR(reg_date)', date('Y'))->get();
            
            $totalmonthlyRowCount += $totalcount->num_rows();
            $totalmonthlyRowCount += $totalcount2->num_rows();
            
            
            $totalmonthlyMaleCount += $totalcount->num_rows();
            $totalmonthlyFemaleCount += $totalcount2->num_rows();
            
            
            ?>
            
            <tr>
            <td class="cell"><?php echo $i; ?></td>
            <td class="cell"><?php echo $value['user_name']; ?></td>
            <td class="cell"><?php echo $totalcount->num_rows(); ?></td>
            <td class="cell"><?php echo $totalcount2->num_rows(); ?></td>
            <td class="cell">
            <?php $monthly_total= $totalcount->num_rows()+$totalcount2->num_rows(); ?>
            <?php echo $monthly_total;?>
            </td>
            </tr>
            <?php
            $i++;
            }
            ?>
            
            
            <tr>
            <td colspan="2" class="cell" style="font-size: 19px;border-color: #e7e9ed;color: #5d6778;text-align: center;vertical-align: middle;font-weight:600;">Grand Total</td>
            
            
            <td style="text-align: center;font-weight: 700;font-size: 22;">
            <?php echo $totalmonthlyMaleCount; ?>
            
            </td>
            
            <td style="text-align: center;font-weight: 700;font-size: 22;">
            <?php echo $totalmonthlyFemaleCount; ?>
            
            </td>
            
            <td style="text-align: center;font-weight: 700;font-size: 30;">
            <?php echo $totalmonthlyRowCount;?>
            
            </td>
            </tr>

            
            <!--<tr colspan="3">Total</tr>-->
            </tbody>
            </table>
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
            <!-- /.col -->
            </div>
            <!-- /.row -->
            </div>
            
            
            
            		
            <h4>Total District Vise Creation</h4>
            <div class="tab-content" id="orders-table-tab-content">
            <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
            <div class="app-card app-card-orders-table shadow-sm mb-5">
            <div class="app-card-body">
            <div class="table-responsive">
            
            
            <table id="example" class="table app-table-hover mb-0 text-left">
            <!--<button class="btn btn-secondary" style="margin-left:10px;margin-top:10px;" >Back</button>-->
            <thead style="background-color:#d7c9c9;">
            <tr>
            <th class="cell" style="font-size: 18px;">Sl No</th>
            
            <th class="cell" style="font-size: 18px;">District</th>
            
            <th class="cell" style="font-size: 18px;">Male</th>
            <th class="cell" style="font-size: 18px;">Female</th>
            <th class="cell" style="font-size: 18px;">Total</th>
            
            
            </tr>
            
            </thead>
            <tbody>
            <?php
            $i = 1;
            $totalcreation = $this->db->select('*')->from('tbl_district')->where('state_id', 18)->where_not_in('district', 'All Kerala')->get()->result_array();
            
            
            $totalcount =  $this->db->select('*')->from('tbl_registration')
            ->where('home_district','1')->where('goto_nikah','1')->where('gender','1')->get();
            $totalcount2 =  $this->db->select('*')->from('tbl_registration')
            ->where('home_district','1')->where('goto_nikah','1')->where('gender','2')->get();
            
            $totalcount3 =  $this->db->select('*')->from('tbl_registration')
            ->where('home_district','2')->where('goto_nikah','1')->where('gender','1')->get();
            $totalcount4 =  $this->db->select('*')->from('tbl_registration')
            ->where('home_district','2')->where('goto_nikah','1')->where('gender','2')->get();
            
            $totalcount5 =  $this->db->select('*')->from('tbl_registration')
            ->where('home_district','3')->where('goto_nikah','1')->where('gender','1')->get();
            $totalcount6=  $this->db->select('*')->from('tbl_registration')
            ->where('home_district','3')->where('goto_nikah','1')->where('gender','2')->get();  
            
            $totalcount7 =  $this->db->select('*')->from('tbl_registration')
            ->where('home_district','4')->where('goto_nikah','1')->where('gender','1')->get();
            $totalcount8=  $this->db->select('*')->from('tbl_registration')
            ->where('home_district','4')->where('goto_nikah','1')->where('gender','2')->get(); 
            
            $totalcount9 =  $this->db->select('*')->from('tbl_registration')
            ->where('home_district','5')->where('goto_nikah','1')->where('gender','1')->get();
            $totalcount10=  $this->db->select('*')->from('tbl_registration')
            ->where('home_district','5')->where('goto_nikah','1')->where('gender','2')->get();  
            
            $totalcount11 =  $this->db->select('*')->from('tbl_registration')
            ->where('home_district','6')->where('goto_nikah','1')->where('gender','1')->get();
            $totalcount12=  $this->db->select('*')->from('tbl_registration')
            ->where('home_district','6')->where('goto_nikah','1')->where('gender','2')->get();  
            
            
            $totalcount13 =  $this->db->select('*')->from('tbl_registration')
            ->where('home_district','7')->where('goto_nikah','1')->where('gender','1')->get();
            $totalcount14=  $this->db->select('*')->from('tbl_registration')
            ->where('home_district','7')->where('goto_nikah','1')->where('gender','2')->get();  
            
            $totalcount15 =  $this->db->select('*')->from('tbl_registration')
            ->where('home_district','8')->where('goto_nikah','1')->where('gender','1')->get();
            $totalcount16=  $this->db->select('*')->from('tbl_registration')
            ->where('home_district','8')->where('goto_nikah','1')->where('gender','2')->get();  
            
            
            $totalcount17 =  $this->db->select('*')->from('tbl_registration')
            ->where('home_district','9')->where('goto_nikah','1')->where('gender','1')->get();
            $totalcount18=  $this->db->select('*')->from('tbl_registration')
            ->where('home_district','9')->where('goto_nikah','1')->where('gender','2')->get();  
            
            
            $totalcount19 =  $this->db->select('*')->from('tbl_registration')
            ->where('home_district','10')->where('goto_nikah','1')->where('gender','1')->get();
            $totalcount20=  $this->db->select('*')->from('tbl_registration')
            ->where('home_district','10')->where('goto_nikah','1')->where('gender','2')->get();  
            
            $totalcount21 =  $this->db->select('*')->from('tbl_registration')
            ->where('home_district','11')->where('goto_nikah','1')->where('gender','1')->get();
            $totalcount22=  $this->db->select('*')->from('tbl_registration')
            ->where('home_district','11')->where('goto_nikah','1')->where('gender','2')->get();  
            
            
            $totalcount23 =  $this->db->select('*')->from('tbl_registration')
            ->where('home_district','12')->where('goto_nikah','1')->where('gender','1')->get();
            $totalcount24=  $this->db->select('*')->from('tbl_registration')
            ->where('home_district','12')->where('goto_nikah','1')->where('gender','2')->get(); 
            
            $totalcount25 =  $this->db->select('*')->from('tbl_registration')
            ->where('home_district','13')->where('goto_nikah','1')->where('gender','1')->get();
            $totalcount26=  $this->db->select('*')->from('tbl_registration')
            ->where('home_district','13')->where('goto_nikah','1')->where('gender','2')->get(); 
            
            
            $totalcount27 =  $this->db->select('*')->from('tbl_registration')
            ->where('home_district','14')->where('goto_nikah','1')->where('gender','1')->get();
            $totalcount28=  $this->db->select('*')->from('tbl_registration')
            ->where('home_district','14')->where('goto_nikah','1')->where('gender','2')->get(); 
            
            
            foreach ($totalcreation as $value) 
            { 
            ?>
            <tr>
            <td class="cell"><?php echo $i; ?></td>
            
            <td class="cell">
            <?php echo $value['district'];?>
            
            
            </td>
            
            <td class="cell">
            
            <?php if($value['district_id']=='1')
            {?>
            <?php echo  $totalcount->num_rows(); ?>
            
            <?php }?>
            <?php if($value['district_id']=='2')
            {?>
            <?php echo  $totalcount3->num_rows(); ?>
            
            <?php }?>
            <?php if($value['district_id']=='3')
            {?>
            <?php echo  $totalcount5->num_rows(); ?>
            
            <?php }?>
            <?php if($value['district_id']=='4')
            {?>
            <?php echo  $totalcount7->num_rows(); ?>
            
            <?php }?>
            <?php if($value['district_id']=='5')
            {?>
            <?php echo  $totalcount9->num_rows(); ?>
            
            <?php }?>
            
            <?php if($value['district_id']=='6')
            {?>
            <?php echo  $totalcount11->num_rows(); ?>
            
            <?php }?>
            
            <?php if($value['district_id']=='7')
            {?>
            <?php echo  $totalcount13->num_rows(); ?>
            
            <?php }?>
            
            <?php if($value['district_id']=='8')
            {?>
            <?php echo  $totalcount15->num_rows(); ?>
            
            <?php }?>
            
            <?php if($value['district_id']=='9')
            {?>
            <?php echo  $totalcount17->num_rows(); ?>
            
            <?php }?>
            
            
            <?php if($value['district_id']=='10')
            {?>
            <?php echo  $totalcount19->num_rows(); ?>
            
            <?php }?>
            
            <?php if($value['district_id']=='11')
            {?>
            <?php echo  $totalcount21->num_rows(); ?>
            
            <?php }?>
            
            <?php if($value['district_id']=='12')
            {?>
            <?php echo  $totalcount23->num_rows(); ?>
            
            <?php }?>
            
            
            <?php if($value['district_id']=='13')
            {?>
            <?php echo  $totalcount25->num_rows(); ?>
            
            <?php }?>
            
            <?php if($value['district_id']=='14')
            {?>
            <?php echo  $totalcount27->num_rows(); ?>
            
            <?php }?>
            
            
            </td>
            
            
            
            <td class="cell">
            
            
            <?php if($value['district_id']=='1')
            {?>
            <?php echo  $totalcount2->num_rows(); ?>
            <?php }?>
            
            <?php if($value['district_id']=='2')
            {?>
            <?php echo  $totalcount4->num_rows(); ?>
            <?php }?>
            
            <?php if($value['district_id']=='3')
            {?>
            <?php echo  $totalcount6->num_rows(); ?>
            
            <?php }?>
            
            <?php if($value['district_id']=='4')
            {?>
            <?php echo  $totalcount8->num_rows(); ?>
            
            <?php }?>
            
            <?php if($value['district_id']=='5')
            {?>
            <?php echo  $totalcount10->num_rows(); ?>
            
            <?php }?>
            <?php if($value['district_id']=='6')
            {?>
            <?php echo  $totalcount12->num_rows(); ?>
            
            <?php }?>
            
            
            <?php if($value['district_id']=='7')
            {?>
            <?php echo  $totalcount14->num_rows(); ?>
            
            <?php }?>
            
            <?php if($value['district_id']=='8')
            {?>
            <?php echo  $totalcount16->num_rows(); ?>
            
            <?php }?>
            
            <?php if($value['district_id']=='9')
            {?>
            <?php echo  $totalcount18->num_rows(); ?>
            <?php }?>
            
            <?php if($value['district_id']=='10')
            {?>
            <?php echo  $totalcount20->num_rows(); ?>
            <?php }?>
            
            <?php if($value['district_id']=='11')
            {?>
            <?php echo  $totalcount22->num_rows(); ?>
            <?php }?>
            
            <?php if($value['district_id']=='12')
            {?>
            <?php echo  $totalcount24->num_rows(); ?>
            <?php }?>
            
            
            <?php if($value['district_id']=='13')
            {?>
            <?php echo  $totalcount26->num_rows(); ?>
            <?php }?>
            
            <?php if($value['district_id']=='14')
            {?>
            <?php echo  $totalcount28->num_rows(); ?>
            <?php }?>
            
            
            </td>
            
            
            
            <td class="cell">
            
            
            <?php if($value['district_id']=='1')
            {?>
            <?php $a11=  $totalcount->num_rows()+ $totalcount2->num_rows();?>
            <?php echo $a11;?>
            <?php }?>
            
            <?php if($value['district_id']=='2')
            {?>
            <?php $b11=  $totalcount3->num_rows()+ $totalcount4->num_rows();?>
            <?php echo $b11;?>
            <?php }?>
            
            <?php if($value['district_id']=='3')
            {?>
            <?php $c11=  $totalcount5->num_rows()+ $totalcount6->num_rows();?>
            <?php echo $c11;?>
            <?php }?>
            
            
            <?php if($value['district_id']=='4')
            {?>
            <?php $d11=  $totalcount7->num_rows()+ $totalcount8->num_rows();?>
            <?php echo $d11;?>
            <?php }?>
            
            
            <?php if($value['district_id']=='5')
            {?>
            <?php $e11=  $totalcount9->num_rows()+ $totalcount10->num_rows();?>
            <?php echo $e11;?>
            <?php }?>
            
            
            <?php if($value['district_id']=='6')
            {?>
            <?php $f11=  $totalcount11->num_rows()+ $totalcount12->num_rows();?>
            <?php echo $f11;?>
            <?php }?>
            
            
            <?php if($value['district_id']=='7')
            {?>
            <?php $g11=  $totalcount13->num_rows()+ $totalcount14->num_rows();?>
            <?php echo $g11;?>
            <?php }?>
            
            
            <?php if($value['district_id']=='8')
            {?>
            <?php $h11=  $totalcount15->num_rows()+ $totalcount16->num_rows();?>
            <?php echo $h11;?>
            <?php }?>
            
            <?php if($value['district_id']=='9')
            {?>
            <?php $i11=  $totalcount17->num_rows()+ $totalcount18->num_rows();?>
            <?php echo $i11;?>
            <?php }?>
            
            <?php if($value['district_id']=='10')
            {?>
            <?php $j11=  $totalcount19->num_rows()+ $totalcount20->num_rows();?>
            <?php echo $j11;?>
            <?php }?>
            
            
            <?php if($value['district_id']=='11')
            {?>
            <?php $k11=  $totalcount21->num_rows()+ $totalcount22->num_rows();?>
            <?php echo $k11;?>
            <?php }?>
            
            <?php if($value['district_id']=='12')
            {?>
            <?php $l11=  $totalcount23->num_rows()+ $totalcount24->num_rows();?>
            <?php echo $l11;?>
            <?php }?>
            
            
            <?php if($value['district_id']=='13')
            {?>
            <?php $m11=  $totalcount25->num_rows()+ $totalcount26->num_rows();?>
            <?php echo $m11;?>
            <?php }?>
            
            <?php if($value['district_id']=='14')
            {?>
            <?php $n11=  $totalcount27->num_rows()+ $totalcount28->num_rows();?>
            <?php echo $n11;?>
            <?php }?>
            
            
            
            </td>
            
            
            </tr>
            
            <?php
            $i++;
            }
            ?>
            
            
            <tr>
            <td colspan="2" class="cell" style="font-size: 19px;border-color: #e7e9ed;color: #5d6778;text-align: center;vertical-align: middle;font-weight:600;">Grand Total</td>
            
            
            <td style="font-weight: 700;font-size: 22;text-align: center;">
            
            <?php $totalmale=$totalcount->num_rows()+$totalcount3->num_rows()+$totalcount5->num_rows()+$totalcount7->num_rows()
            +$totalcount9->num_rows()+$totalcount11->num_rows()+$totalcount13->num_rows()+
            $totalcount15->num_rows()+$totalcount17->num_rows()+$totalcount19->num_rows()+
            $totalcount21->num_rows()+$totalcount23->num_rows()+$totalcount25->num_rows()+
            $totalcount27->num_rows();?>
            
            <?php echo $totalmale;?>
            
            </td>
            
            <td style="font-weight: 700;font-size: 22;text-align: center;">
            
            <?php $totalfemale=$totalcount2->num_rows()+$totalcount4->num_rows()+
            $totalcount6->num_rows()+$totalcount8->num_rows()+$totalcount10->num_rows()+
            $totalcount12->num_rows()
            +$totalcount14->num_rows()+$totalcount16->num_rows()+$totalcount18->num_rows()+
            $totalcount20->num_rows()+$totalcount22->num_rows()+$totalcount24->num_rows()+
            $totalcount26->num_rows()+$totalcount28->num_rows();?>
            
            <?php echo $totalfemale;?>
            
            </td>
            
            <td style="font-weight: 700;font-size: 30;text-align: center;">
            <?php $total=$a11+$b11+$c11+$d11+$e11+$f11+$g11+$h11+$i11+$j11+$k11+$l11+$m11
            +$n11;?>
            <?php echo $total;?>
            
            </td>
            </tr>
            
            
            
            <!--<tr colspan="3">Total</tr>-->
            </tbody>
            </table>
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
            <!-- /.col -->
            </div>
            <!-- /.row -->
            </div>
            
            <?php }?>
            
        
        
        
        
    
		
        </div>
        <!--//row-->
        <!--//col-->
        </div>
        <!--//row-->
        </div>
        <!--//container-fluid-->
        </div>
        <!--//app-content-->
        
        <?php include('footer.php'); ?>
        
        
        <script>
        $(function() {
        $("#example").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        });
        });
        </script>

	<!-- Charts JS -->
	<script src="<?php echo base_url(); ?>assets/plugins/chart.js/chart.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/index-charts.js"></script>

	</html>