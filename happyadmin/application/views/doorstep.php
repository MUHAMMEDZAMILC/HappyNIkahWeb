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
    
    if($_SESSION['user_type']==='14')
    {
    include('menuaccountsadmin.php');
    }

    
    if($_SESSION['user_type'] === '13') 
    {
    include('menusuperadmin.php');
    }
    
    ?>

<div class="app-wrapper">

    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            
        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
               <h6 style="color:darkgrey;">DoorStep Collection</h1>
            </div>
            
            <!-- Main content -->
            <section class="content">
            <div class="container-fluid">
            <div class="row">
            <div class="col-12">
            
            <div class="card">
            
            <div class="card-body">
                 
                     
                     
                     
             <?php $this->db->select('tbl_registration.happynikah_id,tbl_registration.age,tbl_registration.goto_nikah,tbl_registration.hmangalyam,tbl_registration.marital_status,
            tbl_doorsteppayment.id as did,tbl_doorsteppayment.cdate,tbl_doorsteppayment.user_id,tbl_doorsteppayment.name,tbl_doorsteppayment.address,tbl_doorsteppayment.isd,
            tbl_doorsteppayment.phone');
            $this->db->from('tbl_doorsteppayment');
            $this->db->join('tbl_registration','tbl_registration.id=tbl_doorsteppayment.user_id');
            $this->db->where('tbl_doorsteppayment.delete_status!=','Inactive');
            $this->db->where('tbl_registration.goto_nikah','0');
            $this->db->where('tbl_registration.hmangalyam','0');
            $this->db->where('tbl_registration.status!=','3');
            
            $total_count = $this->db->get()->num_rows();?>
        
        <h1 class="app-page-title mb-0">DoorStep Collection &nbsp;&nbsp;&nbsp;(Count:<?php echo $total_count;?>) </h1>
        
            <div class="row" style="margin-top:35px;">
            <div class="col-lg-12">
            
            <table>
            <tbody>
            
            <?php 
            
            $doorstep=$this->db->select('tbl_registration.happynikah_id,tbl_registration.age,tbl_registration.goto_nikah,tbl_registration.hmangalyam,tbl_registration.marital_status,
            tbl_doorsteppayment.id as did,tbl_doorsteppayment.cdate,tbl_doorsteppayment.user_id,tbl_doorsteppayment.name,tbl_doorsteppayment.address,tbl_doorsteppayment.isd,
            tbl_doorsteppayment.phone');
            $this->db->from('tbl_doorsteppayment');
            $this->db->join('tbl_registration','tbl_registration.id=tbl_doorsteppayment.user_id');
            $this->db->where('tbl_doorsteppayment.delete_status!=','Inactive');
            $this->db->where('tbl_registration.goto_nikah','0');
            $this->db->where('tbl_registration.hmangalyam','0');
            $this->db->where('tbl_registration.status!=','3');
            
            $this->db->order_by('tbl_doorsteppayment.cdate','DESC');
            
            $doorstep= $this->db->get()->result_array();
      
            foreach($doorstep as $value)
            { ?>
            <tr id="<?php echo $value['did']; ?>">
            
            <div class="">
            
            <div class="">
            <span>
            <svg style="color:#19bd04;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16">
            <circle cx="8" cy="8" r="8" />
            </svg>
            </span>
            
            <label for="inputName" name="name"><?php echo $value['name']; ?> <span style="color:black;"><b>(<?php echo $value['happynikah_id']; ?>)</b></span></label><br>
            
            <label for="contact_number" name="contact_number" style="margin-top: 5px;">
            <span id="" style="color:#8f0606;"><b>Contact Number : <span><?php echo $value['phone'];?></span></b></span>
            </label><br>
            
            <label for="otherinfo" name="" style="margin-top: 5px;">
            <span id="" style=""><span><?php echo $value['age'];?>,<?php echo $value['marital_status'];?>,
            <?php echo $value['address']; ?></span></span></label>
            <div>
            <span style="margin-left: 550px;">
                <?php $dateString =$value['cdate'];?>
                
                <?php $date = new DateTime($dateString);
                
                // Format the date as per the desired format
                $formattedDate = $date->format('d-m-Y H:i:s');
                
                echo $formattedDate;?>
                
                </span>
            
            </div>                                                                
            </div>
            
            <div class="payvisitbtn">
            <span>
              
        
        
        <form method="post" action="<?= base_url() ?>admin/search_profiles">
          
                
                <input type="hidden" id="inputName" class="form-control" 
    name="search_profile" 
            value="<?php echo $value['happynikah_id'];?>"  required >
                <!--<span id="error" style="color:red;display:none;">Please insert Happynikah ID/Mobile No.</span>-->
           

                <label for="inputName">&nbsp;</label>
                <!-- <button onclick="search_profiles()" name="search_profile_btn" class="btn btn-success" style="margin-top: 32px;"> -->
                
        <button type="submit" name="search_profile_btn" class="btn btn-success" id="search_button" style="color:#fff;">
      View Details
        </button>
           
              <!--<a class="btn btn-success">View Details</a>-->
              
                </form>
                
                
            <!--<a class="btn btn-success" href="<?= base_url() ?>admin/profile/view/<?=$value['did'] ?>">View Details</a>-->
            
            
            <a class="asm2"  data-id="<?php echo $value['did'];?>"  style="font-weight: 600;padding: 0.5rem 1rem;
            font-size: .875rem;border: none;background-color:#d26d69;border-color:#d26d69;
            padding-bottom: 10px;color: #fff;margin-right: 6px;border-radius:5px;">
            Delete
            </a>
            <!--                                                                   <a class="btn btn-danger" href="">Delete</a>-->
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
            
            <form id="contact" method="post" action="<?php echo base_url();?>admin/doorstep_delete" onsubmit="setTimeout(function(){window.location.reload();},10);">                             
            <div class="modal fade" id="deletepostpone" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
            
            <h5 class="modal-title" id="exampleModalLongTitle">
            Are You Sure You Want to Close ?
            
            </h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            
            <input type="hidden" name="user_id2" id="user_id2">
            
            <input type="hidden" name="login_id" 
            value="<?php echo $this->session->userdata('user_id_admin');?>" id="login_id">
            <!-- <div class="mb-3">
            <label for="inputName" class="form-label" style="color: black;margin-left:23px;">
            <b>Message</b></label>
            <textarea id="message" class="form-control" required="" name="message">
            &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->session->userdata('username');?>
            </textarea>
            </div>-->
            <div class="modal-footer">
            
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" style="color:#fff;">Sumbit</button>
            
            </div>
            </div>
            </div>
            </div>
            </form>
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
            <div class="table-scroll-y my-custom-scrollbar" style="height: 880px;">
            <div id="profile" style="background-color:#f2f2f2">
            <table id="example" class="table">
            
            <tbody>
            
            <tr>
            
            <td>
            
            <div class="row">
            <div class="col-sm-10">                                                                                                                                                   
            <tr>
            
            <td style="padding-top: 50px;">
            
            <br><br><br>
            
            <div id="Actioncmnts" class="tabcontent" style="margin-right: -480px;margin-top:60px;">
            <?php
            }
            ?>
            
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
            <!-- /.col -->
            </div>
            <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            
            
            </div>
            </div>
            </div>
            
            <?php include('footer.php'); ?>
            
            <script>
            $(function() 
            {
            $("a[class='asm2']").click(function() 
            {
            $("#deletepostpone").modal("show");
            const user_id2 = $(this).attr('data-id');
            const field = $('#user_id2');
            field.val(user_id2);
            console.log(field[0]);          
            return false;
            });
            });
            </script>
            
            </html>