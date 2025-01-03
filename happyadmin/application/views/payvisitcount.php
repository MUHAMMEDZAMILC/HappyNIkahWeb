        <!DOCTYPE html>
        <?php include('header.php'); 
        
        if($_SESSION['user_type'] === '7')
        {
        include('menuchatsupport.php');
        }
        
        if($_SESSION['user_type']==='0')
        {
        include('menu.php');	
        }
        
        if($_SESSION['user_type'] === '13')
        {
        include('menusuperadmin.php');
        }
        
        
        ?>


        <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        
        <!-- <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css"> -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/custom.css">
        
        <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
        
        <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
        
        <h6 style="color:darkgrey;">Pay Page Visit</h1>
        
        </div>
        
        <!-- Main content -->
        <section class="content">
        <div class="container-fluid">
        <div class="row">
        <div class="col-12">
        
        <div class="card">
        
        <div class="card-body">
            
            
            <?php 
            $this->db->select('tbl_registration.*,tbl_payment_viewed.contact_viewed_id,tbl_payment_viewed.sender_id,tbl_payment_viewed.date,
            tbl_payment_viewed.planid,tbl_payment_viewed.visit_count');
            $this->db->from('tbl_payment_viewed');
            $this->db->join('tbl_registration','tbl_registration.id=tbl_payment_viewed.sender_id');
            $this->db->where('tbl_registration.status!=','3');  
            $this->db->where('tbl_registration.goto_nikah','0'); 
            $this->db->where('tbl_registration.hmangalyam','0'); 
            $this->db->where('tbl_payment_viewed.delete_status!=','Inactive');
            $this->db->where('tbl_payment_viewed.from','happy');
            
            $total_count = $this->db->get()->num_rows();?>
        
        <h1 class="app-page-title mb-0">Pay Page Visit &nbsp;&nbsp;&nbsp;(Count:<?php echo $total_count;?>) </h1>
        <div>
        
        <div class="row" style="margin-top: 22px;">
        <div class="col-lg-12">
        
        <table  id="example" class="table table-bordered table-striped">
        <thead>
        </thead>
        <tbody>
        
        <?php 
        
        $this->db->select('tbl_registration.*,tbl_payment_viewed.contact_viewed_id,tbl_payment_viewed.sender_id,tbl_payment_viewed.date,
        tbl_payment_viewed.planid,tbl_payment_viewed.visit_count');
        $this->db->from('tbl_payment_viewed');
        $this->db->join('tbl_registration','tbl_registration.id=tbl_payment_viewed.sender_id');
        
        //   $this->db->join('tbl_payement','tbl_payement.user_id=tbl_payment_viewed.sender_id');
        
        $this->db->where('tbl_registration.status!=','3');  
        $this->db->where('tbl_registration.goto_nikah','0'); 
         $this->db->where('tbl_registration.hmangalyam','0'); 
        $this->db->where('tbl_payment_viewed.delete_status!=','Inactive');
        $this->db->where('tbl_payment_viewed.from','happy');
        $this->db->order_by('tbl_payment_viewed.date','DESC');
        $paymentvisit= $this->db->get()->result_array();
        
        foreach ($paymentvisit as $value) {?>
        
        <tr id="<?php echo $value['contact_viewed_id']; ?>">
        <div class="">
        
        <span>
        <svg style="color:#19bd04;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16">
        <circle cx="8" cy="8" r="8" />
        </svg>
        </span>

       
       
        <label for="inputName" name="name"><?php echo $value['name']; ?> <span style="color:black;"><b>(<?php echo $value['happynikah_id']; ?>)</b></span></label><br>
        
        <label for="contact_number" name="contact_number" style="margin-top: 5px;">
        <span id="" style="color:#8f0606;"><b>Contact Number : <span><?php echo $value['phone'];?></span></b></span>
        
        <?php
        $sender_id = $value['sender_id'];
        $paidstatus = $this->db->select('user_id, status, expiry_date')->from('tbl_payement')->where('status', '1')->where('user_id', $sender_id)->get()->row_array();
        $userpaid = $paidstatus['user_id'];
        $today_current_date = date('Y-m-d');
        
        if ($userpaid == $sender_id && $paidstatus['expiry_date'] >= $today_current_date)
        {
        echo '<span class="countcircle" style="background: #ff3bff;">Paid</span>';
        } 
        elseif ($userpaid == $sender_id && $paidstatus['expiry_date'] < $today_current_date) 
        {
        echo '<span class="countcircle" style="background: #ff3bff;">Expired</span>';
        }
        ?>
        
        </label><br>
        
        
        <label for="otherinfo" name="" style="margin-top: 5px;">
        <span id="" style=""><span><?php echo $value['age'];?>,<?php echo $value['marital_status'];?>,
        <?php echo $value['address']; ?></span></span></label>
        <div>
        <span style="margin-left: 550px;">
        
        
        <?php $dateString =$value['date'];?>
        
        <?php $date = new DateTime($dateString);
        
        // Format the date as per the desired format
        $formattedDate = $date->format('d-m-Y H:i:s');
        
        echo $formattedDate;?>
        
        </span>
        
        </div>
        <span class="countcircle">
        <?php echo $value['visit_count']; ?>
        </span>
        
        
        </div>
        <div class="payvisitbtn">
        <span>
        
        
        <!--<a class="btn btn-success" href="<?= base_url() ?>admin/profile/view/<?=$value['id'] ?>">View Details</a>-->
        
        
        <form method="post" action="<?= base_url() ?>admin/search_profiles">
        <input type="hidden" id="inputName" class="form-control" 
        name="search_profile" 
        value="<?php echo $value['happynikah_id'];?>"  required >
        
        
        <label for="inputName">&nbsp;</label>
        
        <button type="submit" name="search_profile_btn" class="btn btn-success" id="search_button" style="color:#fff;">
        View Details
        </button>
        
        </form>
        
        <form method="post" action="<?= base_url() ?>admin/paymentvisit_delete">
        <input type="hidden" id="delete_id" class="form-control" 
        name="delete_id" 
        value="<?php echo $value['sender_id'];?>"  required>
        <label for="inputName">&nbsp;</label>
        
        <button type="submit" name="delete_btn" class="btn btn-danger" id="delete_btn" style="color: #fff;margin-top: 10px;width: 110px;">Delete</button>
        
        </form>
        
        </span>
        </div>
        <div>
        
        </div>
        </tr>
        <hr style="width: 98%;position:absolute"><br>
        <?php } ?>
        
        </tbody>  
        </table>
        </div>
        
        </div>
        
        
        <br>
        <?php
        
        if(empty($get_search_profiles)){
        echo "";
        } else {
        
        $r_id = $get_search_profiles->id;
        $happynikah_id = $get_search_profiles->happynikah_id;
        $name = $get_search_profiles->name;
        $age = $get_search_profiles->age;
        $phone = $get_search_profiles->phone;
        $marital_status = $get_search_profiles->marital_status;
        
        if ($get_search_profiles->gender == '1') {
        $gender = "Male";
        } else {
        $gender = "Female";
        }
        $address = $get_search_profiles->address;
        $reg_date = $get_search_profiles->reg_date;
        
        if (
        $get_search_profiles->reg_through == '0' ||
        $get_search_profiles->reg_through == '2'
        ) {
        $reg_through = "Customer Registered";
        } else {
        $reg_through = "Staff Registered";
        }
        
        if ($get_search_profiles->status == '0') {
        $status = "Pending";
        } elseif ($get_search_profiles->status == '1') {
        $status = "Approved";
        } elseif ($get_search_profiles->status == '2') {
        $status = "Rejected";
        } elseif ($get_search_profiles->status == '3') {
        $status = "Deleted";
        } elseif ($get_search_profiles->status == '4') {
        $status = "Block";
        } elseif ($get_search_profiles->status == '5') {
        $status = "UnBlock";
        }
        
        ?>
        
        <?php
        }
        ?>
        
        
        <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        
        </div>
        </div>
        </div>
        
        
        <?php include('footer.php'); ?>
        
        <link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css' rel='stylesheet'>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" >
        </script>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" >
        </script>
        <!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>-->
        
        
        <!-- jQuery -->
        <!-- 		<script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
        -->		<!-- Bootstrap 4 -->
        <!-- <script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
        <!-- DataTables  & Plugins -->
        <script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js">
        
        </script>
        <script src="<?php echo base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js">
        
        </script>
        <script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js">
        
        </script>
        <script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js">
        
        </script>
        
        <!-- <script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script> -->
        <script src="<?php echo base_url() ?>assets/plugins/jszip/jszip.min.js">
        
        </script>
        <script src="<?php echo base_url() ?>assets/plugins/pdfmake/pdfmake.min.js">
        
        </script>
        <script src="<?php echo base_url() ?>assets/plugins/pdfmake/vfs_fonts.js">
        
        </script>
        
        <script>
        
        $(function() 
        {
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
        
        </html>