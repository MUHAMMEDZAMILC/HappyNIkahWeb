<?php include('header.php'); ?>

 <?php include('menusales_gotonikah.php'); ?>
 


<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/custom.css">

<div class="app-wrapper">

    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">

            <h1 class="app-page-title">Overview</h1>

            <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
                <div class="inner">
                    <div class="app-card-body p-3 p-lg-4">

                        <h3 class="mb-3">Goto Nikah Sales Admin Dashboard</h3>
                        <div class="row gx-5 gy-3">
                            <div class="col-12 col-lg-8">

                                <div style="font-family: Bradley Hand, cursive;">Gotonikah.com Meet your perfect partner from sites to "tie up together",<br>
                                    All Muslim community can find their suitable brides and grooms with thousands of profiles.</div>
                            </div>
                            <!--//col-->
                            <div class="col-12 col-lg-3" style="margin-left: 9px;">
                                <a class="btn app-btn-primary" href="https://happynikah.com/">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-globe2" viewBox="0 0 16 16">
                                        <path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855-.143.268-.276.56-.395.872.705.157 1.472.257 2.282.287V1.077zM4.249 3.539c.142-.384.304-.744.481-1.078a6.7 6.7 0 0 1 .597-.933A7.01 7.01 0 0 0 3.051 3.05c.362.184.763.349 1.198.49zM3.509 7.5c.036-1.07.188-2.087.436-3.008a9.124 9.124 0 0 1-1.565-.667A6.964 6.964 0 0 0 1.018 7.5h2.49zm1.4-2.741a12.344 12.344 0 0 0-.4 2.741H7.5V5.091c-.91-.03-1.783-.145-2.591-.332zM8.5 5.09V7.5h2.99a12.342 12.342 0 0 0-.399-2.741c-.808.187-1.681.301-2.591.332zM4.51 8.5c.035.987.176 1.914.399 2.741A13.612 13.612 0 0 1 7.5 10.91V8.5H4.51zm3.99 0v2.409c.91.03 1.783.145 2.591.332.223-.827.364-1.754.4-2.741H8.5zm-3.282 3.696c.12.312.252.604.395.872.552 1.035 1.218 1.65 1.887 1.855V11.91c-.81.03-1.577.13-2.282.287zm.11 2.276a6.696 6.696 0 0 1-.598-.933 8.853 8.853 0 0 1-.481-1.079 8.38 8.38 0 0 0-1.198.49 7.01 7.01 0 0 0 2.276 1.522zm-1.383-2.964A13.36 13.36 0 0 1 3.508 8.5h-2.49a6.963 6.963 0 0 0 1.362 3.675c.47-.258.995-.482 1.565-.667zm6.728 2.964a7.009 7.009 0 0 0 2.275-1.521 8.376 8.376 0 0 0-1.197-.49 8.853 8.853 0 0 1-.481 1.078 6.688 6.688 0 0 1-.597.933zM8.5 11.909v3.014c.67-.204 1.335-.82 1.887-1.855.143-.268.276-.56.395-.872A12.63 12.63 0 0 0 8.5 11.91zm3.555-.401c.57.185 1.095.409 1.565.667A6.963 6.963 0 0 0 14.982 8.5h-2.49a13.36 13.36 0 0 1-.437 3.008zM14.982 7.5a6.963 6.963 0 0 0-1.362-3.675c-.47.258-.995.482-1.565.667.248.92.4 1.938.437 3.008h2.49zM11.27 2.461c.177.334.339.694.482 1.078a8.368 8.368 0 0 0 1.196-.49 7.01 7.01 0 0 0-2.275-1.52c.218.283.418.597.597.932zm-.488 1.343a7.765 7.765 0 0 0-.395-.872C9.835 1.897 9.17 1.282 8.5 1.077V4.09c.81-.03 1.577-.13 2.282-.287z" />
                                    </svg> Website </a>

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
            <!--//app-card-->
            
            
              <p>Total</p>
            <div class="row g-4 mb-4">
                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100 " style="border-left: 3px solid #fc6f90">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">Target</h4>
                            <div class="stats-figure">
                                <h3> <i class="fa-sharp fa-solid fa-indian-rupee-sign"></i>
                                <?php $user_id=$this->session->userdata('user_id_admin');?>
                                <?php $target_total=$this->db->select('*')->from('tbl_target')->where('user_id',$user_id)->get()->row();?>
                                 <?php  echo $target_total->target_amount;?>
                                </h3>
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
                            <h4 class="stats-type mb-1">Toatal Acheived</h4>
                            <div class="stats-figure">
                                <h3> <i class="fa-sharp fa-solid fa-indian-rupee-sign"></i> 
                                
                        <?php $total_acheive = $this->db->query("SELECT SUM(tbl_payement.final_amount) as total FROM tbl_payement INNER JOIN tbl_registration ON tbl_registration.id = tbl_payement.user_id 
                                               WHERE tbl_payement.status='1'  AND tbl_payement.payment_staff_id='$user_id'  AND tbl_payement.payment_status='Paid'  AND tbl_registration.goto_nikah = 1")->row();?>
                        <?php echo $total_acheive->total;?>
                               
                                </h3>
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
                            <h4 class="stats-type mb-1">Balance</h4>
                            <div class="stats-figure">
                                <h3> <i class="fa-sharp fa-solid fa-indian-rupee-sign"></i> 
                                
                                     <?php  $total_balance= $target_total->target_amount-$total_acheive->total;?>
                                     <?php echo  $total_balance;?>
                                
                                </h3>
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
                            <h4 class="stats-type mb-1">Achievement</h4>
                            <div class="stats-figure">
                                <h3>92 %</h3>
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
                    <div class="app-card app-card-stat shadow-sm h-100" style="border-left: 3px solid red;">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">Days Left</h4><br>
                            <div class="stats-figure">
                                <h3>3 Days</h3>
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
                    <div class="app-card app-card-stat shadow-sm h-100" style="border-left: 3px solid red;">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">Total Postpone</h4><br>
                            <div class="stats-figure">
                                <h3> 
                                <!--<i class="fa-sharp fa-solid fa-indian-rupee-sign"></i>-->
                                
                            <?php $total_postpone=$this->db->select('*')
                            ->from('tbl_paymentrequest')
                            ->join('tbl_registration', 'tbl_registration.id = tbl_paymentrequest.payment_id')
                            ->where('tbl_paymentrequest.login_id', $user_id)
                            ->where('tbl_registration.goto_nikah', 1)
                            ->get()
                            ->num_rows();?>
                                <!--11354.77-->
                                <?php echo $total_postpone;?>
                                </h3>
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
            </div>
            <!--//row-->


        </div>
        <!--//container-fluid-->
    </div>
    <!--//app-content-->

    <?php include('footer.php'); ?>


    <!-- Charts JS -->
    <script src="<?php echo base_url(); ?>assets/plugins/chart.js/chart.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/index-charts.js"></script>

    </html>