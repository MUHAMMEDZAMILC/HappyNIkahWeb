    <!DOCTYPE html>
    <?php include('header.php'); ?>
     
	<?php
	header("Cache-Control: no cache");
	session_cache_limiter("private_no_expire");
	?>
	
    <?php if($_SESSION['user_type']==='0' && $_SESSION['nikah_type']=='happynikah') 
    {
    include('menu.php');
    }
    
    if($_SESSION['user_type']==='0' && $_SESSION['nikah_type']=='gotonikah') 
    {
    include('gotonikah_sales_super.php');
    }
        
    if($_SESSION['user_type']==='18') 
    {
    include('gotonikah_sales_super.php');
    }
    
    
    if($_SESSION['user_type']==='0' && $_SESSION['nikah_type']=='happymangalyam') 
    {
    include('happymangalyam_sales_super.php');
    }

     if($_SESSION['user_type']==='6' && $_SESSION['nikah_type']=='happymangalyam')
    {
    include('menusupport_mangalyam.php');	
    }

     if($_SESSION['user_type']==='7' && $_SESSION['nikah_type']=='happymangalyam')
    {
    include('menuchatsupport_mangalyam.php');	
    }

    if($_SESSION['user_type']==='3' && $_SESSION['nikah_type']=='happymangalyam')
    {
    include('menusales_mangalyam.php');
    }
    
    if($_SESSION['user_type']==='4' && $_SESSION['nikah_type']=='happymangalyam')
    {
    include('menucreation_happymangalyam.php');	
    }
    
    
    if($_SESSION['user_type']==='3' && $_SESSION['nikah_type']=='happynikah')
    {
    include('menusales.php');
    }
    
    if($_SESSION['user_type']==='3' && $_SESSION['nikah_type']=='gotonikah')
    {
    include('menusales_gotonikah.php');
    }
    
    if($_SESSION['user_type']==='4' && $_SESSION['nikah_type']=='happynikah')
    {
    include('menucreation.php');	
    }
    
    if($_SESSION['user_type']==='4' && $_SESSION['nikah_type']=='gotonikah')
    {
    include('menucreation_gotonikah.php');	
    }
       
    $user_id=$this->session->userdata('user_id_admin');
    if($user_id=='10' && $_SESSION['nikah_type']=='happynikah')
    {
    include('menusupport.php');	
    }
    
    if($_SESSION['user_type']==='6' && $_SESSION['nikah_type']=='gotonikah')
    {
    include('menusupport_gotonikah.php');	
    }
        
    if($user_id=='12')
    {
    include('menuservice.php');	
    }
       
    if($_SESSION['user_type']==='7' && $_SESSION['nikah_type']=='happynikah')
    {
    include('menuchatsupport.php');	
    }
    
     if($_SESSION['user_type']==='7' && $_SESSION['nikah_type']=='gotonikah')
    {
    include('menuchatsupport_gotonikah.php');	
    }
        
    if($_SESSION['user_type']==='13')
    {
    include('menusuperadmin.php');	
    }
    
    if($_SESSION['user_type']==='14')
    {
    include('menuaccountsadmin.php');	
    }
    
    $user_id=$this->session->userdata('user_id_admin');
    
    if($user_id=='8')
    {
    include('menusales.php');     
    }
    
    if($user_id=='26')
    {
    include('menusales.php');     
    }
    
    ?>

<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/custom.css">

    <style>
    .msginput
    {
    height:500px;
    width:500px;
    word-break: break-word;
    }
    </style>

<div class="app-wrapper">

				<div class="app-content pt-3 p-md-3 p-lg-4">
				<div class="container-xl">

				<div class="row g-3 mb-4 align-items-center justify-content-between">
				<div class="col-auto">
				<h1 class="app-page-title mb-0" style="margin-left:25px;">Search Profiles</h1>
				</div>

				<!-- Main content -->
				<section class="content">
				<div class="container-fluid">
				<div class="row">
				<div class="col-12">

				<div class="card">
				<div class="card-body">

				<div class="row">
				<div class="col-lg-4">
				<form method="post" action="<?= base_url() ?>admin/search_profiles">
				<div class="form-group">
				<label for="inputName">ID/Contact No <font color="red">*</font></label>
				<input type="text" id="inputName" class="form-control" name="search_profile" required>
				<span id="error" style="color:red;display:none;">Please insert Happynikah ID/Mobile No.</span>
				</div>
				</div>
				<div class="col-lg-6">

				<label for="inputName">&nbsp;</label>
				<button type="submit" name="search_profile_btn" class="btn btn-success" id="search_button" style="margin-top: 32px;">
				<i class="fas fa-search"></i>
				</button>
				</form>

				<button onclick="window.location.href='<?= base_url() ?>admin/search_profiles'" name="search_profile_btn" class="btn btn-danger" style="margin-top: 32px;">
				<i class="fa fa-undo" aria-hidden="true"></i>
				</button>
				
				</div>
				</div>
				<br>
				<?php
			if(empty($get_search_profiles)){
            echo "Please Enter Valid Phone Number / ID";
			} 
			else
			{  
			    $r_id = $get_search_profiles->id;
				$happynikah_id = $get_search_profiles->happynikah_id;
				$name = $get_search_profiles->name;
				$age = $get_search_profiles->age;
				$phone = $get_search_profiles->phone;
				$marital_status = $get_search_profiles->marital_status;
                $badge_status = $get_search_profiles->badge_status;

				if($get_search_profiles->gender == '1')
				{
				$gender = "Male";
				}
				else
				{
				$gender = "Female";
				}
				$address = $get_search_profiles->address;
				$reg_date = $get_search_profiles->reg_date;

				if($get_search_profiles->reg_through == '0' || 
				$get_search_profiles->reg_through == '2')
				{
				$reg_through = "Customer Registered";
				}
				else 
				{
				$reg_through = "Staff Registered";
				}

				if($get_search_profiles->status == '0')
				{
				$status = "Pending";
				} 
				elseif ($get_search_profiles->status == '1')
				{
				$status = "Approved";
				} 
				elseif ($get_search_profiles->status == '2') 
				{
				$status = "Rejected";
				} 
				elseif ($get_search_profiles->status == '3') 
				{
				$status = "Deleted";
				}
				elseif ($get_search_profiles->status == '4') 
				{
				$status = "Block";
				}
				elseif ($get_search_profiles->status == '5')
				{
				$status = "UnBlock";
				}
				elseif ($get_search_profiles->status == '6')
				{
				$status = "Approved";
				}

				?>
				<div class="table-scroll-y my-custom-scrollbar" style="height: 880px;">
				<div id="profile" style="background-color:#f2f2f2">
				<table id="example" class="table">
				<thead style="background-color: #FEEAEA;">
				<tr>
				<th style="padding-left: 48px;">HN ID</th>
				<th>Age</th>
				 <th>Gender</th> 
				<th>Last Login</th>
				<th>Name</th>
				<th>Payment Status</th>
			
				</tr>
				</thead>
				<tbody>


				<tr style="border:2px solid black;">
				<td>
				<span id="hn_id" style="padding-left: 39px;color:red;">
				
				
			<?php $nh10=$this->db->select('happynikah_id','status')->from('tbl_registration')
			->where('happynikah_id',$happynikah_id)->get()->num_rows();?>
			
			<?php $nh20=$this->db->select('*')->from('tbl_registration')
			->where('happynikah_id',$happynikah_id)->get()->result_array();?>
			
			<?php $nh25=$this->db->select('phone','status')->from('tbl_registration')
			->where('phone',$phone)->get()->num_rows();?>
			
			<?php $nh26=$this->db->select('*')->from('tbl_registration')
			->where('phone',$phone)->where('status','1')->get()->result_array();?>
			
		
			<?php $nh27=$this->db->select('*')->from('tbl_registration')
			->where('phone',$phone)->where('status','3')->get()->result_array();?>
		
		
			<?php $nh44=$this->db->select('*')->from('tbl_registration')
			->where('phone',$phone)->where('status','3')->where('status','1')->get()->result_array();?>
			
			<?php $nh35=$this->db->select('*')->from('tbl_registration')
			->where('phone',$phone)->where('status','3')->limit('1')->get()->result_array();?>
			
				<?php $nh38=$this->db->select('*')->from('tbl_registration')
			->where('phone',$phone)->get()->result_array();?>
			
		    
                <?php foreach($nh20 as $val)
                {?>
                <?php $iddata=$val['happynikah_id'];?>
                
                <?php if($get_search=='1')
                {?>
                
                <b>
                
                <?php echo $val['happynikah_id']; ?></b>
                
                <?php
                if($val['status'] == '0')
                {
                $statusid = "Pending";
                } 
                elseif($val['status'] == '1')
                {
                $statusid = "Approved";
                } 
                elseif($val['status'] == '2') 
                {
                $statusid = "Rejected";
                } 
                elseif($val['status'] == '3')
                {
                $statusid = "Deleted";
                }
                elseif($val['status'] == '4')
                {
                $statusid = "Block";
                }
                elseif($val['status'] == '5')
                {
                $statusid = "UnBlock";
                }
                elseif($val['status'] == '6')
                {
                $statusid = "Approved";
                }
                ?>
                (<?php echo $statusid;?>)
               
             
            <?php if($badge_status=='1')
            {?>
            <label style="color:#0004ff;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <?php echo "(Badge Approve)";?>
            </label>
            <?php }?> 
                
            
            <?php }?>	
            <?php }?>
              
         <?php if($get_search!=1)
         {?>
         <b>
             <?php foreach($nh26 as $test)
             {?>
            <?php $data_search=$test['happynikah_id'];?>
            
            <?php echo $data_search;?>
            
             </b>
             <?php echo "(Approved)";?> 
             <?php }?>
        
            
        <?php 
        if ($get_search_profiles->status == '2')
        {
        ?>
        <?php echo "(Rejected)";?>
        <?php }?>
               
        <?php if($get_search_profiles->status=='3')
        {?>
         <?php foreach($nh35 as $multiple_delete)
        {?>
        
        <b><?php echo $multiple_delete['happynikah_id'];?></b>
               
        <?php echo "(Deleted)";?>
        <?php }?>
         <?php }?>
        
        
        <?php 
        if ($get_search_profiles->status == '4')
        {
        ?>
        <?php echo "(Block)";?>
        <?php }?>
        
          <?php 
        if ($get_search_profiles->status == '5')
        {
        ?>
        <?php echo "(UnBlock)";?>
        <?php }?>
          
          <?php }?>
    
        
				
			<?php $phone2 = $get_search_profiles->phone;?> 
			
		<?php $nh=$this->db->select('*')->from('tbl_registration')
		->where('phone',$phone2)->get()->num_rows();?>
			
			
			
				<?php $nh5=$this->db->select('*')->from('tbl_registration')
			->where('phone',$phone)->get()->result_array();?>
			  
			 
			
			 
                 
				<br>
				<br>
			
			<?php $nh=$this->db->select('phone')->from('tbl_registration')
			->where('phone',$phone)->get()->num_rows();?>

          	<?php $nhhappy=$this->db->select('happynikah_id')->from('tbl_registration')
			->where('happynikah_id',$happynikah_id)->get()->num_rows();?>
			
			
			<?php if($nh=='1')
			{
			?>

			<button class="btn btn-danger dp" 
			style="margin-left: 35px;font-size: 9px;margin-top: -44px;display: none;">

			<b><span style="color:white">Duplicate profile<span>
			</b>
			</button>
			<?php }?>

			<?php if($nh>1)
			{
			?>
				<button class="btn btn-danger dp" 
				style="margin-left: 35px;font-size: 9px;margin-top: -44px;">

				<b><span style="color:white">Duplicate Profile<span>
				</b>
			    </button>
			    <?php }?>

				<br>
				<br>
				<div style="padding-left: 39px;color:green;margin-top:-40px;">
				<b>
				<?php echo $reg_through; ?>
				</b>
			    </div>
				</span>
				</td>
				
				
				
			    
			    
				<td>
				<span id="profile_age">
                <?php echo $age; ?>
			    </span>
			    </td>
			    
			    
			    <td>
				<span id="profile_gender">
                <?php echo $gender; ?>
			    </span>
			    </td>
			    
				<td>
				<?php 
				  $this->db->select('tbl_registration.id,tbl_userlogin.user_id,tbl_userlogin.last_login');
                  $this->db->from('tbl_userlogin');
                  $this->db->join('tbl_registration','tbl_registration.id = tbl_userlogin.user_id');
                  $this->db->where('tbl_userlogin.user_id',$r_id);
                  $this->db->where('tbl_userlogin.is_online','1'); 
                  $query = $this->db->get()->row_array();
                  $lastlogin= $query['last_login']; ?>
                  
                  
                  <?php if($lastlogin!=NULL)
                  {?>
                   <?php $convertedDateTime2 = date('d-m-Y H:i:s', strtotime($lastlogin));
                  echo $convertedDateTime2;
                  }
                  ?>
                 
               <?php if($lastlogin==NULL)
                  {?>
                  <?php echo "";?>
                  <?php }?>
                 
                
                  
               
                  
                  
                </td>
                  
				<td>
				<span id="profile_name">
				<?php echo $name; ?>
				
				</span>
				</td>
			
                <td>
                <span id="profile_status">
                    
                <?php                  
                $this->db->select('tbl_registration.id, tbl_payement.user_id,tbl_payement.status, tbl_payement.expiry_date');
                $this->db->from('tbl_payement');
                $this->db->join('tbl_registration', 'tbl_registration.id = tbl_payement.user_id');
                $this->db->where('tbl_payement.user_id', $r_id);
                $query55 = $this->db->get();
                
                if($query55->num_rows() > 1) 
                {
                $hasStatusZero = false;
                $hasStatusOne = false;
                $rowsWithStatusOne = array();
                
                foreach($query55->result_array() as $payment) 
                {
                if($payment['status'] == '0') 
                {
                $hasStatusZero = true;
                } 
                
                elseif($payment['status'] == '1') 
                {
                $hasStatusOne = true;
                $rowsWithStatusOne[] = $payment;
                }
                }
                
                if($hasStatusZero && $hasStatusOne) 
                {
                $today_current_date = date('Y-m-d');
                
                foreach($rowsWithStatusOne as $row) 
                {
                $expiryDate = date('Y-m-d',strtotime($row['expiry_date']));
                if($expiryDate >= $today_current_date) 
                {
                echo "Paid";
                break; 
                }
                
                else
                {
                echo "Expired";
                break; 
                }
                }
                
                } 
                elseif($hasStatusOne) 
                {
                echo "Paid";
                } 
                
                else 
                {
                echo "Unpaid";
                }
                } 
                
                elseif($query55->num_rows() == 1) 
                {
                $payment = $query55->row();
                
                if($payment->status == '0') 
                {
                echo "Unpaid";
                } 
                
                elseif($payment->status == '1') 
                {
                $expiryDate = date('Y-m-d', strtotime($payment->expiry_date));
                $today_current_date = date('Y-m-d');
                
                if($expiryDate >= $today_current_date) 
                {
                echo "Paid";
                } 
                else 
                {
                echo "Expired";
                }
                }
                }
                else 
                {
                echo "Unpaid";
                }
                ?>
                
                </span>
                </td>
				
				</tr>
				
				<tr>

				<td>

	 <div class="row">
		<div class="col-sm-10">
			<ul style="list-style-type:none;margin-left: -9px;margin-right:0px;">
				<li class="" style="background-color:#FFFFFF;margin-left: -31px;">
				<a class="as" href="<?= base_url() ?>admin/profile/view/<?= $r_id ?>" data-replace="Basic Details">
				<span style="padding-left: 10px;">
				Basic Details  <?php $this->session->userdata('user_id_admin');?>
				</span>
				</a>
				</li>
				<br>

				<?php if($_SESSION['nikah_type']=='happynikah' && $get_search_profiles->goto_nikah==0){?> 

				<?php if($this->session->userdata('user_type')!='0'){
									?>

			
								<li style="background-color:#FFFFFF;margin-left: -31px;">
									<a class="as" href="#" data-replace="Verify Email" style='display:none;'>
										<span style="padding-left: 10px;">
											Verify Email
										</span>
									</a>
								</li>

							<?php }else{?>
								<li style="background-color:#FFFFFF;margin-left: -31px;">
									<a class="as" href="#" data-replace="Verify Email">
										<span style="padding-left: 10px;">
											Verify Email
										</span>
									</a>
								</li>
							<?php }?>
							<?php }?>		
			


							<?php if($_SESSION['nikah_type']=='gotonikah' && $get_search_profiles->goto_nikah==1){?> 
				
				<?php if($this->session->userdata('user_type')!='0'){
									?>

			
								<li style="background-color:#FFFFFF;margin-left: -31px;">
									<a class="as" href="#" data-replace="Verify Email" style='display:none;'>
										<span style="padding-left: 10px;">
											Verify Email
										</span>
									</a>
								</li>

							<?php }else{?>
								<li style="background-color:#FFFFFF;margin-left: -31px;">
									<a class="as" href="#" data-replace="Verify Email">
										<span style="padding-left: 10px;">
											Verify Email
										</span>
									</a>
								</li>
							<?php }?>
							<?php }?>		
				<br>
				<?php if($_SESSION['nikah_type']=='happynikah' && $get_search_profiles->goto_nikah==0){?>
				<?php if($this->session->userdata('user_type')!=='14')
                {?>
				<li style="background-color:#FFFFFF;margin-left: -31px;">

				<?php
				$hide_id=$get_search_profiles->id; 
				$q= $this->db->select('*')->from('tbl_hideprofile')->where('user_id',$hide_id)->order_by('id',"DESC")->get()->row();
			

				if($q->hide_status=='0')
				{ ?>
				<a class="hello" onclick="unhideprofile();" data-replace="Unhide Profile">
				<span style="padding-left: 10px;color: #000;">
				Unhide Profile</span></a>
				<?php } ?>

				<?php if($q->hide_status=='1')
				{ ?>
				<a class="hi" onclick="hideprofile();" data-replace="Hide Profile">
				<span style="padding-left: 10px;">	
				Hide Profile
				<?php } ?>
				</span>
				</a>

				<?php if($q->hide_status=='')
				{?>
				<a class="hi" onclick="hideprofile();" data-replace="Hide Profile">
				<span style="padding-left: 10px;">	
				Hide Profile
				<?php } ?>
				</span>
				</a>
				</li>
					<?php }?>
                    <?php }?>

                 <?php if($_SESSION['nikah_type']=='gotonikah' && $get_search_profiles->goto_nikah==1){?>
				<?php if($this->session->userdata('user_type')!=='14')
                {?>
				<li style="background-color:#FFFFFF;margin-left: -31px;">

				<?php
				$hide_id=$get_search_profiles->id; 
				$q= $this->db->select('*')->from('tbl_hideprofile')->where('user_id',$hide_id)->order_by('id',"DESC")->get()->row();
			

				if($q->hide_status=='0')
				{ ?>
				<a class="hello" onclick="unhideprofile();" data-replace="Unhide Profile">
				<span style="padding-left: 10px;color: #000;">
				Unhide Profile</span></a>
				<?php } ?>

				<?php if($q->hide_status=='1')
				{ ?>
				<a class="hi" onclick="hideprofile();" data-replace="Hide Profile">
				<span style="padding-left: 10px;">	
				Hide Profile
				<?php } ?>
				</span>
				</a>

				<?php if($q->hide_status=='')
				{?>
				<a class="hi" onclick="hideprofile();" data-replace="Hide Profile">
				<span style="padding-left: 10px;">	
				Hide Profile
				<?php } ?>
				</span>
				</a>
				</li>
					<?php }?>
                    <?php }?>
				<br>
				<?php if($_SESSION['nikah_type']=='gotonikah' && $get_search_profiles->goto_nikah==1){?>
				  <?php if($this->session->userdata('user_type')!=='14')
                {?>
                
                 <?php if($_SESSION['user_type']!=='4')
                {?>
                
                <?php $last_followup_check = $this->db->order_by('id',"desc")->where('uid',$r_id)
				->where('delete_status','Active')->get('tbl_followup');?>
                
				<?php if ($last_followup_check->num_rows() == 0)

				{
				?>
				<li style="background-color:#FFFFFF;margin-left: -31px;">
				<a class="asm" href="" data-replace="Enter message">
				<span style="padding-left: 10px;">
				Enter Message
				</span>
				</a>
				</li>
				<?php } ?>
				<?php } ?>
			    <?php } ?>
			    <?php } ?>

			    <?php if($_SESSION['nikah_type']=='happynikah' && $get_search_profiles->goto_nikah==0){?>
				  <?php if($this->session->userdata('user_type')!=='14')
                {?>
                
               
                
                 <?php if($_SESSION['user_type']!=='4' ||  $_SESSION['user_type']!=='6')
                {?>
                
                <?php $last_followup_check = $this->db->order_by('id',"desc")->where('uid',$r_id)
				->where('delete_status','Active')->get('tbl_followup');?>
                
				<?php if ($last_followup_check->num_rows() == 0)

				{
				?>
				<li style="background-color:#FFFFFF;margin-left: -31px;">
				<a class="asm" href="" data-replace="Enter message">
				<span style="padding-left: 10px;">
				Enter Message
				</span>
				</a>
				</li>
				<?php } ?>
				<?php } ?>
			    <?php } ?>
			    <?php } ?>
				<br>
				
				
				<?php $last_followup_check = $this->db->order_by('id',"desc")->where('uid',$r_id)
				 ->where('delete_status','Active')->get('tbl_followup');?>

				<?php 
				if($_SESSION['nikah_type']=='gotonikah' && $get_search_profiles->goto_nikah==1){
				if($last_followup_check->num_rows() > 0)
				{
				?>
                <li style="background-color:#FFFFFF;margin-left: -31px;">
                <a class="enterpendingfollowup" data-id="<?php echo $get_search_profiles->id;?>"  href="#" data-replace="Postpone Payment">
                <span style="padding-left: 10px;color: #000;">
               	Enter Message
                </span>
                </a>
                </li>
                 <?php } ?>
                 <?php } ?>
                 <br>

                 <?php $last_followup_check = $this->db->order_by('id',"desc")->where('uid',$r_id)
				 ->where('delete_status','Active')->get('tbl_followup');?>
			    <?php 
			     if($_SESSION['nikah_type']=='happynikah' && $get_search_profiles->goto_nikah==0){
				if($last_followup_check->num_rows() > 0)
				{
				?>
                <li style="background-color:#FFFFFF;margin-left: -31px;">
                <a class="enterpendingfollowup" data-id="<?php echo $get_search_profiles->id;?>"  href="#" data-replace="Postpone Payment">
                <span style="padding-left: 10px;color: #000;">
               	Enter Message
                </span>
                </a>
                </li>
                 <?php } ?>
                 <?php } ?>
                 <br>
			     <?php $last_followup_check = $this->db->order_by('id',"desc")->where('uid',$r_id)
				 ->where('delete_status','Active')->get('tbl_followup');?>
			    <?php 

			     if($_SESSION['nikah_type']=='happynikah' && $get_search_profiles->goto_nikah==0){
			    if($_SESSION['user_type']!=='4'){	
				if($last_followup_check->num_rows() > 0)
				{
				?>
                <li style="background-color:#FFFFFF;margin-left: -31px;">
                <a class="addcmnts" data-id="<?php echo $get_search_profiles->id;?>"  href="#" data-replace="addcomments">
                <span style="padding-left: 10px;color: #000;">
               	Add Comments
                </span>
                </a>
                </li>
                 <?php } ?>
                 <?php } ?> 
                 <?php } ?> 
                 <br>
			    <?php 
                if($_SESSION['nikah_type']=='happynikah' && $get_search_profiles->goto_nikah==0){
			    if($this->session->userdata('user_type')!=='14')
                {?>
				<li style="background-color:#FFFFFF;margin-left: -31px;">
				<?php 
				$id=$get_search_profiles->id;         
				$bldata=$this->db->select('*')->from('tbl_registration')->where('id',$id)->get()->row();
				
				if($bldata->status=='4')
				{ ?>
				<a class="bbc" onclick="unblockprofile();"  data-replace="Unblock Profile">
				<span style="padding-left: 10px;color: #000;">	
				Unblock Profile</span></a>
				<?php } 
				if($bldata->status=='5' || $bldata->status=='0' || $bldata->status=='1')
				{ ?>
				<a class="bbb" onclick="blockprofile();" data-replace="Block Profile" style="color: #000;">
				<span style="padding-left: 10px;">	
				Block Profile</span></a>
				<?php } ?>

				</li>
				<?php }?>
				<?php }?>
				<?php 
                if($_SESSION['nikah_type']=='gotonikah' && $get_search_profiles->goto_nikah==1){
			    if($this->session->userdata('user_type')!=='14')
                {?>
				<li style="background-color:#FFFFFF;margin-left: -31px;">
				<?php 
				$id=$get_search_profiles->id;         
				$bldata=$this->db->select('*')->from('tbl_registration')->where('id',$id)->get()->row();
				
				if($bldata->status=='4')
				{ ?>
				<a class="bbc" onclick="unblockprofile();"  data-replace="Unblock Profile">
				<span style="padding-left: 10px;color: #000;">	
				Unblock Profile</span></a>
				<?php } 
				if($bldata->status=='5' || $bldata->status=='0' || $bldata->status=='1')
				{ ?>
				<a class="bbb" onclick="blockprofile();" data-replace="Block Profile" style="color: #000;">
				<span style="padding-left: 10px;">	
				Block Profile</span></a>
				<?php } ?>

				</li>
				<?php }?>
				<?php }?>
				<br>
				 <?php
				 $user_id=$this->session->userdata('user_id_admin');
                if($_SESSION['nikah_type']=='happynikah' && $get_search_profiles->goto_nikah==0)
                {
				?>
				<?php if($user_id!=='4' && $user_id!=='24' && $user_id!=='30' && $user_id!=='34' && $user_id!=='35' && $user_id!=='36' 
				&& $user_id!=='37' && $user_id!=='38' && $user_id!=='39' && $user_id!=='14'  && $user_id!=='54' && $user_id!=='55' && $user_id!=='56'
				&& $user_id!=='58' && $user_id!=='60' && $user_id!=='61' && $user_id!=='62' && $user_id!=='65')
				{?>
				<?php if($bldata->status!='3' && $this->session->userdata('user_type')=='3' && $this->session->userdata('user_type')=='13' && $user_id=='3' && $user_id=='5' 
				 && $user_id=='6' &&  $user_id=='7' && $user_id=='51' && $get_search_profiles->status!='3' ||  $get_search_profiles->status='0' || $get_search_profiles->status='1')
				{ ?>
				<li style="background-color:#FFFFFF;margin-left: -31px;">
				<a class="asms"  data-id="<?php echo $get_search_profiles->id;?>"
				data-replace="Delete Profile">
				<span style="padding-left: 10px;">
				Delete Profile
				</span>
				</a>
				</li>
			    <?php }?>
				<?php }?>
                <?php }?>

                 <?php 
                 if($_SESSION['nikah_type']=='gotonikah' && $get_search_profiles->goto_nikah==1){
				 if($this->session->userdata('user_type')!=='14' &&  $this->session->userdata('user_type')!=='4')
                {?>
				<?php if($bldata->status!='3' || $this->session->userdata('user_type')=='3' || $this->session->userdata('user_type')=='13'){ ?>
				<li style="background-color:#FFFFFF;margin-left: -31px;">
				<a class="asms"  data-id="<?php echo $get_search_profiles->id;?>"
				data-replace="Delete Profile">
				<span style="padding-left: 10px;">
				Delete Profile
				</span>
				</a>
				</li>
				<?php }?>
				<?php }?>
                <?php }?>
                <br>               
                <?php
                if($_SESSION['nikah_type']=='happynikah' && $get_search_profiles->goto_nikah==0){
                if($get_search_profiles->status == '3' &&  $user_id!=='4' && $user_id!=='24' && $user_id!=='30' && $user_id!=='34' && $user_id!=='35' && $user_id!=='36' 
				&& $user_id!=='37' && $user_id!=='38' && $user_id!=='39' && $user_id!=='14'  && $user_id!=='54' && $user_id!=='55' && $user_id!=='56'
				&& $user_id!=='58' && $user_id!=='60' && $user_id!=='61' && $user_id!=='62' && $user_id!=='65')
                { 
                ?>
                
                <?php if($get_search_profiles->status == '3' ||  $user_id=='3' || $user_id=='5' || $user_id=='6' ||  $user_id=='7' || $user_id=='51')
				
				{ ?>
				
                <li style="background-color:#FFFFFF;margin-left: -31px;">
				<a class="asms_undelete"  data-id="<?php echo $get_search_profiles->id;?>"
				data-replace="UnDelete Profile">
				<span style="padding-left: 10px;color:#000;">
				UnDelete Profile
				</span>
				</a>
				</li>
				<?php }?>
				<?php }?>
				<?php }?>

				<?php
                if($_SESSION['nikah_type']=='gotonikah' && $get_search_profiles->goto_nikah==1)
                {
                if($get_search_profiles->status == '3')
                { 
                ?>
                <li style="background-color:#FFFFFF;margin-left: -31px;">
				<a class="asms_undelete"  data-id="<?php echo $get_search_profiles->id;?>"
				data-replace="UnDelete Profile">
				<span style="padding-left: 10px;color:#000;">
				UnDelete Profile
				</span>
				</a>
				</li>
				<?php }?>
				<?php }?>
                <br>
                               
                <?php 
                if($_SESSION['nikah_type']=='happynikah' && $get_search_profiles->goto_nikah==0){
                if($this->session->userdata('user_type')=='0')
                {?>
			
                <li style="background-color:#FFFFFF;margin-left: -31px;">
                <a class="badge" href=""  data-id="<?php echo $get_search_profiles->id;?>"
                data-replace="Approve Badge">
                <span style="padding-left: 3px;color:#000;font-weight: 400;font-size: 15px;">
                Approve Badge
                </span>
                </a>
                </li>
                <?php }?>
                 <?php }?>

                 <?php 
                if($_SESSION['nikah_type']=='gotonikah' && $get_search_profiles->goto_nikah==1){
                if($this->session->userdata('user_type')=='0')
                {?>
			
                <li style="background-color:#FFFFFF;margin-left: -31px;">
                <a class="badge" href=""  data-id="<?php echo $get_search_profiles->id;?>"
                data-replace="Approve Badge">
                <span style="padding-left: 3px;color:#000;font-weight: 400;font-size: 15px;">
                Approve Badge
                </span>
                </a>
                </li>
                <?php }?>
                 <?php }?>
                <br>
                               
                 <?php $user_id=$this->session->userdata('user_id_admin');?>
                
                <?php 
                if($_SESSION['nikah_type']=='happynikah' && $get_search_profiles->goto_nikah==0){
                if($user_id=='2'  || $user_id=='13' || $user_id=='17' || $user_id=='26' || $user_id=='10' || $user_id=='3' || $user_id=='5' || $user_id=='6'|| $user_id=='7' || $user_id=='51')
                {?>
                <?php
                if($get_search_profiles->status == '3' || $get_search_profiles->status == '0' || $get_search_profiles->status == '4' || $get_search_profiles->status == '5')
                { 
                ?>
                
                <?php if($user_id!=='4' && $user_id!=='24' && $user_id!=='30' && $user_id!=='34' && $user_id!=='35' && $user_id!=='36' 
				&& $user_id!=='37' && $user_id!=='38' && $user_id!=='39' && $user_id!=='14'  && $user_id!=='54' && $user_id!=='55' && $user_id!=='56'
				&& $user_id!=='58' && $user_id!=='60' && $user_id!=='61' && $user_id!=='62' && $user_id!=='65')
                { 
                ?>
                
              
                <li style="background-color:#FFFFFF;margin-left: -31px;">
				<a class="asms5"  data-id="<?php echo $get_search_profiles->id;?>"
				data-replace="Approve Profile">
				<span style="padding-left: 10px;color:#000;">
				Approve Profile
				</span>
				</a>
				</li>
				<?php }?>
			
				<?php }?>
				<?php }?>
				<?php }?>
                
                <?php 
                if($_SESSION['nikah_type']=='gotonikah' && $get_search_profiles->goto_nikah==1){
                if($user_id=='2'  || $user_id=='13' || $user_id=='17' || $user_id=='26' || $user_id=='10')
                {?>
                <?php
                if($get_search_profiles->status == '3' || $get_search_profiles->status == '0' || $get_search_profiles->status == '4' || $get_search_profiles->status == '5')
                { 
                ?>
                <li style="background-color:#FFFFFF;margin-left: -31px;">
				<a class="asms5"  data-id="<?php echo $get_search_profiles->id;?>"
				data-replace="Approve Profile">
				<span style="padding-left: 10px;color:#000;">
				Approve Profile
				</span>
				</a>
				</li>
				<?php }?>
				<?php }?>
				<?php }?>

                 <br>
                 
                  <?php 
                if($_SESSION['nikah_type']=='happynikah' && $get_search_profiles->goto_nikah==0)
                {
                if($user_id=='2'  || $user_id=='14' || $user_id=='26')
                {?>
                <?php
                if($get_search_profiles->status!== '3')
                { 
                ?>
                
                <li style="background-color:#FFFFFF;margin-left: -31px;">
                
                <a class="ap" href="" data-replace="Approve to Paid" target="_blank" id="approve" data-toggle="modal" data-target="#approve_pay" onclick="approve_pay('<?= $r_id ?>')">
                <span style="padding-left: 10px;">
                Approved to Paid
                </span>
                </a>
               
                </li>
                <?php } ?>
                <?php } ?>
                <?php } ?>
               
               
                
                 <?php 
                 if($_SESSION['nikah_type']=='gotonikah' && $get_search_profiles->goto_nikah==1)
                 {
                 if($user_id=='2'  || $user_id=='14' || $user_id=='26')
                {?>
                <?php
                if($get_search_profiles->status!== '3')
                { 
                ?>
                 <li style="background-color:#FFFFFF;margin-left: -31px;">
                <a class="ap" href="" data-replace="Approve to Paid" target="_blank" id="approve" data-toggle="modal" data-target="#approve_pay" onclick="approve_pay('<?= $r_id ?>')">
                <span style="padding-left: 10px;">
                Approved to Paid
                </span>
                </a>
                
                </li>
                <?php } ?>
                <?php } ?>
                <?php } ?>
                
                <br>
               
               
               	<?php $sess_id=$this->session->userdata('user_id_admin');?>
               	
                <?php 
                 if($_SESSION['nikah_type']=='happynikah' && $get_search_profiles->goto_nikah==0)
                 {
                 if($user_id=='2'  || $user_id=='14' || $user_id=='26')
                {?>
                <?php
                if($get_search_profiles->status!== '3')
                { 
                ?>
                
                <li style="background-color:#FFFFFF;margin-left: -31px;">
             
                <a class="ac" href="" data-replace="Add Contacts" target="_blank" id="addcontacts"  style="color:#000;" data-toggle="modal" data-target="#addcontacts" onclick="addcontacts('<?= $r_id ?>')">
                <span style="padding-left: 10px;">
                Add Contacts
                </span>
                </a>
             
                </li>
                <?php } ?>
                <?php } ?>
                <?php } ?>

                 <?php 
                 if($_SESSION['nikah_type']=='gotonikah' && $get_search_profiles->goto_nikah==1)
                 {
                 if($user_id=='2'  || $user_id=='14' || $user_id=='26')
                {?>
                <?php
                if($get_search_profiles->status!== '3')
                { 
                ?>
                
                <li style="background-color:#FFFFFF;margin-left: -31px;">
             
                <a class="ac" href="" data-replace="Add Contacts" target="_blank" id="addcontacts"  style="color:#000;" data-toggle="modal" data-target="#addcontacts" onclick="addcontacts('<?= $r_id ?>')">
                <span style="padding-left: 10px;">
                Add Contacts
                </span>
                </a>
               
                </li>
                <?php } ?>
                <?php } ?>
                <?php } ?>
                <br>
                
                
                <?php 
                if($_SESSION['nikah_type']=='happynikah' && $get_search_profiles->goto_nikah==0)
                {
                if($user_id=='2'  || $user_id=='14' || $user_id=='26')
                {?>
                <?php
                if($get_search_profiles->status!== '3')
                { 
                ?>
                
                <li style="background-color:#FFFFFF;margin-left: -31px;">
                <a class="downgrade_payment" href="" data-replace="Downgrade Payment" target="_blank" id="downgrade" data-toggle="modal" data-target="#downgrade_payment" onclick="approve_pay('<?= $r_id ?>')">
                <span style="padding-left: 10px;color:#000;">
                Downgrade Payment
                </span>
                </a>
            
                </li>
                <?php } ?>
                <?php } ?>
                <?php } ?>

                 <?php 
                if($_SESSION['nikah_type']=='gotonikah' && $get_search_profiles->goto_nikah==1)
                {
                if($user_id=='2'  || $user_id=='14' || $user_id=='26')
                {?>
                <?php
                if($get_search_profiles->status!== '3')
                { 
                ?>
                <li style="background-color:#FFFFFF;margin-left: -31px;">
                <a class="downgrade_payment" href="" data-replace="Downgrade Payment" target="_blank" id="downgrade" data-toggle="modal" data-target="#downgrade_payment" onclick="approve_pay('<?= $r_id ?>')">
                <span style="padding-left: 10px;color:#000;">
                Downgrade Payment
                </span>
                </a>
               
                </li>
                <?php } ?>
                <?php } ?>
                <?php } ?>
                <br>
                
               
                <?php 
                if($_SESSION['nikah_type']=='gotonikah' && $get_search_profiles->goto_nikah==1)
                {
             
                if($user_id=='2'  || $user_id=='14' || $user_id=='26')
                {?>
                <?php
                if($get_search_profiles->status!== '3')
                { 
                ?>
                <li style="background-color:#FFFFFF;margin-left: -31px;">
                <a class="lc" href="" data-replace="Left Contacts" target="_blank" id="leftcontacts"  style="color:#000;" data-toggle="modal" data-target="#leftcontacts" onclick="leftcontacts('<?= $r_id ?>')">
                <span style="padding-left: 10px;">
                Less Contacts
                </span>
                </a>
            
                </li>
                <?php } ?>
                <?php } ?>
                <?php } ?>
                

                <?php 
                if($_SESSION['nikah_type']=='happynikah' && $get_search_profiles->goto_nikah==0)
                {
                if($user_id=='2'  || $user_id=='14' || $user_id=='26')
                {?>
                <?php
                if($get_search_profiles->status!== '3')
                { 
                ?>

                <li style="background-color:#FFFFFF;margin-left: -31px;">
                <a class="lc" href="" data-replace="Left Contacts" target="_blank" id="leftcontacts"  style="color:#000;" data-toggle="modal" data-target="#leftcontacts" onclick="leftcontacts('<?= $r_id ?>')">
                <span style="padding-left: 10px;">
                Less Contacts
                </span>
                </a>
                </li>
                <?php } ?>
                <?php } ?>
                <?php } ?>
                 <br>
                
                <?php 
                if($_SESSION['nikah_type']=='gotonikah' && $get_search_profiles->goto_nikah==1){
                if($this->session->userdata('user_type')=='0' || $this->session->userdata('user_type')=='3' || $this->session->userdata('user_type')=='13'){ ?>
                <li style="background-color:#FFFFFF;margin-left: -31px;">
                <?php
                if($get_search_profiles->status != '3') { ?>
                <a class="active_offer" href="" data-replace="Active Offer" target="_blank" id="approve" data-toggle="modal" data-target="#approve_pay" onclick="approve_pay('<?= $r_id ?>')">
                <span style="padding-left: 10px;color:#000;">
                Active Offer
                </span>
                </a>
                <?php } ?>
                </li>
                <?php } ?>
                <?php } ?>

                 <?php 
                if($_SESSION['nikah_type']=='happynikah' && $get_search_profiles->goto_nikah==0){
                if($this->session->userdata('user_type')=='0' || $this->session->userdata('user_type')=='3' || $this->session->userdata('user_type')=='13'){ ?>
                <li style="background-color:#FFFFFF;margin-left: -31px;">
                <?php
                if($get_search_profiles->status != '3') { ?>
                <a class="active_offer" href="" data-replace="Active Offer" target="_blank" id="approve" data-toggle="modal" data-target="#approve_pay" onclick="approve_pay('<?= $r_id ?>')">
                <span style="padding-left: 10px;color:#000;">
                Active Offer
                </span>
                </a>
                <?php } ?>
                </li>
                <?php } ?>
                <?php } ?>

				<br>
			   <?php 
                if($_SESSION['nikah_type']=='gotonikah' && $get_search_profiles->goto_nikah==1){
			   if($this->session->userdata('user_type')!=='14')
			   {?>
				<li style="background-color:#FFFFFF;margin-left: -31px;">
				<a class="ps" data-replace="Change Password" onclick="change_pass();">
				<span style="padding-left: 10px;">
				Change Password
				</span>
				</a>
				</li>
				<?php } ?>
				<?php } ?>

				<?php 
                if($_SESSION['nikah_type']=='happynikah' && $get_search_profiles->goto_nikah==0){
			   if($this->session->userdata('user_type')!=='14')
			   {?>
				<li style="background-color:#FFFFFF;margin-left: -31px;">
				<a class="ps" data-replace="Change Password" onclick="change_pass();">
				<span style="padding-left: 10px;">
				Change Password
				</span>
				</a>
				</li>
				<?php } ?>
				<?php } ?>
                <br>

               <!--<?php if($this->session->userdata('user_type')=='0' || $this->session->userdata('user_type')=='3' || $this->session->userdata('user_type')=='7'){
                ?>
                <li style="background-color:#FFFFFF;margin-left: -31px;">
                <a class="pp" href="" data-replace="Postpone Payment">
                <span style="padding-left: 10px;">
                Postpone Payment
                </span>
                </a>
                </li>
                <?php } ?>-->
                <br>
                <?php 
                if($_SESSION['nikah_type']=='gotonikah' && $get_search_profiles->goto_nikah==1){ 
                if($this->session->userdata('user_type')=='0' || $this->session->userdata('user_type')=='3' || $this->session->userdata('user_type')=='7')
                {
                ?>
                
                 <?php $last_name = $this->db->order_by('id',"desc")->where('user_id',$r_id)->limit(1)->get('tbl_bucket_change')->row();?>
                
                <?php $last_inserted_name= $last_name->staff_id;?>
                
              <?php  if($sess_id!=$last_inserted_name)
              {?>
                <li style="background-color:#FFFFFF;margin-left: -31px;">
                <a class="pp" href="" data-replace="Postpone Payment">
                <span style="padding-left: 10px;">
                Postpone Payment
                </span>
                </a>
                </li>
                <?php } ?>
                 <?php } ?>
                 <?php } ?>
                  <?php 
                if($_SESSION['nikah_type']=='happynikah' && $get_search_profiles->goto_nikah==0){ 
                if($this->session->userdata('user_type')=='0' || $this->session->userdata('user_type')=='3' || $this->session->userdata('user_type')=='7')
                {
                ?>
                
                 <?php $last_name = $this->db->order_by('id',"desc")->where('user_id',$r_id)->limit(1)->get('tbl_bucket_change')->row();?>
                
                <?php $last_inserted_name= $last_name->staff_id;?>
                
              <?php  if($sess_id!=$last_inserted_name)
              {?>
                <li style="background-color:#FFFFFF;margin-left: -31px;">
                <a class="pp" href="" data-replace="Postpone Payment">
                <span style="padding-left: 10px;">
                Postpone Payment
                </span>
                </a>
                </li>
                <?php } ?>
                 <?php } ?>
                 <?php } ?>
                <br>              
                <?php 
                 if($_SESSION['nikah_type']=='happynikah' && $get_search_profiles->goto_nikah==0){
                if($this->session->userdata('user_type')=='0' || $this->session->userdata('user_type')=='3'){
                ?>
                <li style="background-color:#FFFFFF;margin-left: -31px;">
                <a class="as" href="#" data-replace="Online Payment">
                <span style="padding-left: 10px;">
                Online Payment
                </span>
                </a>
                </li>
                <?php } ?>
                <?php } ?>

                <?php 
                 if($_SESSION['nikah_type']=='gotonikah' && $get_search_profiles->goto_nikah==1){
                if($this->session->userdata('user_type')=='0' || $this->session->userdata('user_type')=='3'){
                ?>
                <li style="background-color:#FFFFFF;margin-left: -31px;">
                <a class="as" href="#" data-replace="Online Payment">
                <span style="padding-left: 10px;">
                Online Payment
                </span>
                </a>
                </li>
                <?php } ?>
                <?php } ?>
                <br>
                <?php 
                 if($_SESSION['nikah_type']=='gotonikah' && $get_search_profiles->goto_nikah==1){
                if($this->session->userdata('user_type')=='0' || $this->session->userdata('user_type')=='3'){ ?>
                <li style="background-color:#FFFFFF;margin-left: -31px;">
                <a class="id" onclick="" data-replace="Intrest Details">
                <span style="padding-left: 10px;">
                Interest Details
                </span>
                </a>
                </li>
                <?php } ?>
                <?php } ?>
                <?php 
                 if($_SESSION['nikah_type']=='happynikah' && $get_search_profiles->goto_nikah==0){
                if($this->session->userdata('user_type')=='0' || $this->session->userdata('user_type')=='3'){ ?>
                <li style="background-color:#FFFFFF;margin-left: -31px;">
                <a class="id" onclick="" data-replace="Intrest Details">
                <span style="padding-left: 10px;">
                Interest Details
                </span>
                </a>
                </li>
                <?php } ?>
                <?php } ?>
                <br>
                <?php $user_id=$this->session->userdata('user_id_admin');
                 if($_SESSION['nikah_type']=='happynikah' && $get_search_profiles->goto_nikah==0){
                 if($user_id=='2'){ ?>
                <li style="background-color:#FFFFFF;margin-left: -31px;">
                <a class="idd"  data-replace="Bucket Change">
                <span style="padding-left: 10px;color: black;">
               Bucket Change
                </span>
                </a>
                </li>
                <?php } ?>
                <?php } ?>
                <?php $user_id=$this->session->userdata('user_id_admin');
                 if($_SESSION['nikah_type']=='gotonikah' && $get_search_profiles->goto_nikah==1){
                 if($user_id=='2'){ ?>
                <li style="background-color:#FFFFFF;margin-left: -31px;">
                <a class="idd"  data-replace="Bucket Change">
                <span style="padding-left: 10px;color: black;">
               Bucket Change
                </span>
                </a>
                </li>
                <?php } ?>
                <?php } ?>
				<!-- <li style="background-color:#FFFFFF;margin-left: -31px;">
				<a class="as" href="#" data-replace="Active calls">
				<span style="padding-left: 10px;">
				Active calls
				</span>
				</a>
				</li> -->
			</ul>

		</div>
		<div class="col-sm-10">
		 <input type="hidden" value="<?php echo $this->session->userdata('user_id_admin');?>" id="session">
		 
                <?php 
                $r_id=$get_search_profiles->id;
                
         $querypayment=$this->db->select('tbl_payement.*,tbl_plan.*')->from("tbl_payement")
       ->join('tbl_plan','tbl_plan.plan_id=tbl_payement.plan_id')
      ->where('user_id',$r_id)->where('tbl_payement.status','1')->order_by('tbl_payement.id','DESC')->get()->result();
        
                
                $this->db->select('tbl_registration.id,tbl_registration.happynikah_id,tbl_payement.*,tbl_plan.plan_name,tbl_plan.plan_id');
                $this->db->from('tbl_payement');
                $this->db->join('tbl_registration','tbl_registration.id = tbl_payement.user_id');
                $this->db->join('tbl_plan','tbl_plan.plan_id = tbl_payement.plan_id');

                $this->db->where('tbl_payement.user_id',$r_id);  
                $this->db->where('tbl_payement.status','1');   
                $query = $this->db->get()->result_array();
                
        
                foreach ($query as $profile_value) {
                
                if($profile_value['status']=='1') {?>
               
               <?php $planid=$profile_value['plan_id'];?>
                  
         <?php $where = array('sender_id'=>$r_id,'planid'=>$querypayment[0]->id);
        $contact_viewed = $this->General_Model->GetFullData1("tbl_contact_viewed",$where);?>
         <?php $chat_receivers = $this->General_Model->get_chatsenders($r_id,$querypayment[0]->id);?>
         
         
         <?php $count_rec=$this->db->select('*')->from('tbl_chating')->where('sender_id',$r_id)->where('planid',$querypayment[0]->id)->group_by('receiver_id')->get()->num_rows();?>
        
        
                <div class="div4 card" style="background-color: white;padding: 20px;padding-left: 110px;padding-right: 110px;position: absolute;left: 585px;top: 160px;">
                    
                    <span style="font-family: Serif;padding-left: 37px;font-size: 17px;font-weight: 600;margin-bottom: 4px;"><?php echo $profile_value['plan_name'];?></span>
                <span style="font-family:Serif;">
                    
                      <?php $total_contact=$profile_value['contactbalance']+$profile_value['addoncontact']-$profile_value['leftcontact'];?>
                      <b>No of Contacts</b> : <?php echo $total_contact;?> <br/>
                     <b>No of Contacts Viewed</b> : <?php echo count($contact_viewed);?> <br/>
                     <?php $total_message=$profile_value['messagebalance']+$profile_value['addonmessage']-$profile_value['leftmessage'];?>
                     
                   <b>No of Messages</b> : <?php echo $total_message;?> <br/>
                    <b>No of Message Sent</b> : <?php echo $count_rec;?> 
               
                <!--<?php echo count($contact_viewed)."/".$total_contact ."<b style='margin-left: 4px;'>Contacts</b> - &nbsp;&nbsp;"; ?>-->
               
               
             <!--<?php $total_message=$profile_value['messagebalance']+$profile_value['addonmessage']-$profile_value['leftmessage'];?>-->
             
            <!--<?php echo $count_rec."/".$total_message."<b style='margin-left: 2px;'>Messages</b>  &nbsp;&nbsp;"; ?>-->
            
            </span><br>

               <span style="font-family:Serif;padding-left:14px;"><b style="margin-left: -16px;">Activation Date</b> :
                
                <?php $expire=$profile_value['date'];?>
                <?php echo date('d-m-Y',strtotime($expire));?> </span>
                
                
                  <?php if($profile_value['payment_status']=='Add Contacts')
                  {?>
                <span style="font-family:Serif;padding-left:14px;"><b style="margin-left: -16px;">Add Contact</b> :
                
                <?php $add_contact=$profile_value['add_contact'];?>
                <?php echo date('d-m-Y',strtotime($add_contact));?> </span>
                 
                <?php }?>
                
               
                <span style="font-family:Serif;padding-left:14px;"><b style="margin-left: -16px;">Validity</b> :
                
                <?php $expire=$profile_value['expiry_date'];?>
                <?php echo date('d-m-Y',strtotime($expire. ' -1 day'));?> 
                
                
                </span>
                </div><br>
                <?php } }?>
				
				
	<div class="div4 card" style="margin-top: 275px;background-color: white;padding: 0px;width: 36%;height: 177px;position: absolute;left: 588px;margin-left: 0px;padding-left: 10px;top: 175px;">

				<span>
				🥉<b>BRONZE PLAN</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-currency-rupee" viewBox="0 0 16 16">
				<path d="M4 3.06h2.726c1.22 0 2.12.575 2.325 1.724H4v1.051h5.051C8.855 7.001 8 7.558 6.788 7.558H4v1.317L8.437 14h2.11L6.095 8.884h.855c2.316-.018 3.465-1.476 3.688-3.049H12V4.784h-1.345c-.08-.778-.357-1.335-.793-1.732H12V2H4v1.06Z" />
				</svg></i><b></b><b>
				<font style="color: green;"> 1800</font>
				</b><br><br>

				💎<b>DIAMOND PLAN</b> &nbsp;&nbsp;:<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-currency-rupee" viewBox="0 0 16 16">
				<path d="M4 3.06h2.726c1.22 0 2.12.575 2.325 1.724H4v1.051h5.051C8.855 7.001 8 7.558 6.788 7.558H4v1.317L8.437 14h2.11L6.095 8.884h.855c2.316-.018 3.465-1.476 3.688-3.049H12V4.784h-1.345c-.08-.778-.357-1.335-.793-1.732H12V2H4v1.06Z" />
				</svg><b></b><b>
				<font style="color: green;"> 3500</font>
				</b><br><br>

				👑<b>CROWN PLAN </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-currency-rupee" viewBox="0 0 16 16">
				<path d="M4 3.06h2.726c1.22 0 2.12.575 2.325 1.724H4v1.051h5.051C8.855 7.001 8 7.558 6.788 7.558H4v1.317L8.437 14h2.11L6.095 8.884h.855c2.316-.018 3.465-1.476 3.688-3.049H12V4.784h-1.345c-.08-.778-.357-1.335-.793-1.732H12V2H4v1.06Z" />
				</svg><b></b><b>
				<font style="color: green;"> 4900</font>
				</b><br><br>

				🔅<b>MASTER PLAN</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<svg style="margin-left:0px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-currency-rupee" viewBox="0 0 16 16">
				<path d="M4 3.06h2.726c1.22 0 2.12.575 2.325 1.724H4v1.051h5.051C8.855 7.001 8 7.558 6.788 7.558H4v1.317L8.437 14h2.11L6.095 8.884h.855c2.316-.018 3.465-1.476 3.688-3.049H12V4.784h-1.345c-.08-.778-.357-1.335-.793-1.732H12V2H4v1.06Z" />
				</svg> <b>
				<font style="color: green;">10000</font>
				</b>
				</span>

				<br>
				<br>
				</div>
            	<?php if($this->session->userdata('user_type')=='0' || $this->session->userdata('user_type')=='3') { ?> 	
				<div class="div4" style="left: 640px;margin-top: 470px;"> 
                 <span style="font-family:Serif;"><u>Pre Payment Details</u></span>
				<br>
				<br>
				<button id="paymentdetail" class="button-55" onclick="ShowPayment();" style="margin-top:0px;">Show Payment Details</button>
				<br>
				<br>
				<div id="prepaymentdetails" style="color: red;display:none;">
				<div class="table-wrapper-scroll-y my-custom-scrollbar">
				<table class="table table-striped">

				<tbody>
			  <tr>
			      
            <?php $paiddata2=$this->db->select('*')->from('tbl_payement')->join('tbl_plan','tbl_plan.plan_id=tbl_payement.plan_id')
            ->where('user_id',$r_id)->get()->result_array();?>
            <?php foreach($paiddata2 as $data2)
            {?>			    
          

            <td style="color: red;"><?php echo $data2['plan_name'];?> :</td>
            <td style="color: red;"><b><?php echo $data2['plan_strick_amount'];?></b></td>
            
            </tr>
            <tr>
            
            <td style="color: red;">Discount :</td>
           
            <?php $dis=$data2['plan_strick_amount']-$data2['plan_amount'];?>
            <td style="color: red;"><b><?php echo $dis;?></b></td>
            
            </tr>
            <?php }?>
            
            <tr>
                
            
            <td style="color: red;">Sale Amount :</td>
            <td style="color: red;"><b><?php echo $data2['plan_amount'];?></b></td>
            
            </tr>
            <tr>
                <?php $paiddata=$this->db->select('tbl_payement.user_id,tbl_payement.payment_staff_id,tbl_payement.session_id,tbl_users1.user_name,tbl_users1.emp_id,tbl_payement.date')->from('tbl_payement')
         ->join('tbl_users1','tbl_users1.user_id=tbl_payement.payment_staff_id')
        // ->join('tbl_users1','tbl_users1.emp_id=tbl_payement.session_id')
        ->where('tbl_payement.user_id',$r_id)
        ->get()->result_array();?>
            <?php foreach($paiddata as $data)
            {?>
            <td style="color: red;"><?php echo date('d-m-Y',strtotime($data['date']));?></td>
            
            </tr>
            <tr>
            
            <td style="color: red;">Payment Mode :</td>
            <td style="color: red;">Online</td>
            
            </tr>
            <tr>
           
            <td style="color: red;">Sale Closed By :</td>
            <td style="color: red;"> 
            
            
            
              <?php $dd55=$data['payment_staff_id'];?>
             
              
              <?php $sess_id=$this->session->userdata('user_id_admin');?>
            
                <?php if($dd55==$sess_id)
                {?>
                <?php echo $_SESSION['username'];?>
                
                <?php }?>
                
                <?php if($dd55!=$sess_id)
                {?>
                   <?php echo $data['user_name'];?>
                
                <?php }?>
            
          
            </td>
            
            </tr>
            <tr>
            
            <td style="color: red;"><b>Paid By :</b></td>
            <td style="color: red;">
            <!--<b>Harshan</b>-->
            <b>
                 <?php $ddd20=$data['session_id'];?>
                <?php if($ddd20==2)
                {?>
                <?php echo "Harshan";?>
                <?php }?> 


                <?php if($ddd20==8)
                {?>
                <?php echo "Fathimath Jasna KM";?>
                <?php }?> 
                
                  <?php if($ddd20==8)
                {?>
                <?php echo "Fathimath Jasna KM";?>
                <?php }?> 
                
                  <?php if($ddd20==14)
                {?>
                <?php echo "Accounts Admin";?>
                <?php }?> 
                
                </b>
            </td>
            
            </tr>
            <?php }?>
            
            </tbody>
            </table>
            </div>
            
            
            </div>
            
            
            </div>

                <?php } ?>


				</tr>
				</td>
				<tr>

				<td style="padding-top:0px;">
				    
				 
				 
				 
				 
				 <label>
				<?php $sess_id=$this->session->userdata('user_id_admin');?>
				
				
			<?php $last_follow_message = $this->db->order_by('id',"desc")->where('uid',$r_id)->limit(1)->get('tbl_followup')->row();?>
            
            <?php $last_inserted_follow_row = $last_follow_message->id;?>
            
			 
                <?php 
                $todayfollowmessage =    $this->db->select('tbl_users1.user_name,tbl_followup.login_id,
                                           tbl_followup.uid,tbl_followup.delete_status,tbl_followup.fdate')
                                         ->from('tbl_followup')
                                         ->join('tbl_users1','tbl_users1.user_id=tbl_followup.login_id')
                                         ->where('uid',$r_id)->where('delete_status','Active')
                                         ->where('id',$last_inserted_follow_row)->get();?>
                

                
           
                <?php 
                if ($todayfollowmessage->num_rows() > 0)
                {?>
                
                <?php 
                foreach($todayfollowmessage->result() as $row5) 
                {?>
                <?php $followup_date_last = $row5->fdate;
                $followup_login_id = $row5->login_id;
                $followup_user_name = $row5->user_name;
                
                ?>
                
                <?php }?>
                <?php }?>
                
             <?php $this->db->select("STR_TO_DATE('$followup_date_last', '%d-%m-%Y') AS converted_date_followup");
              $query_followup = $this->db->get();
        
              $result = $query_followup->row();
              $convertedDate_followup = $result->converted_date_followup;
              $todydate_followup = date('Y-m-d');
              
              ?>
        
            
                <?php if($followup_login_id==$sess_id  &&  $convertedDate_followup >= $todydate_followup)
                {?>
                 
                 
                <h4 style="margin-top: -43px;margin-left: 0px;"><?php echo $this->session->userdata('username');?></h4>
                
                <?php }?> 
                
                <?php if($followup_login_id!=$sess_id  &&  $convertedDate_followup >= $todydate_followup)
                {?>
                
                <h4 style="margin-top: -43px;margin-left: 0px;"><?php echo $followup_user_name;?></h4>
                
                
                
                <?php }?> 
              
                </label>
                <br/>
				    
				    
				<label>
           
            <?php $sess_id=$this->session->userdata('user_id_admin');?>
            
            <?php $last_insert_id=$this->db->insert_id;?>
            
            <?php $last = $this->db->order_by('id',"desc")->where('payment_id',$r_id)->limit(1)->get('tbl_paymentrequest')->row();?>
            
            <?php $last_inserted_row= $last->id;?>
           
     


        <?php 
        $todaypaymentmessage = $this->db->select('tbl_users1.user_name,tbl_paymentrequest.login_id,tbl_paymentrequest.postpone_date,tbl_paymentrequest.crnt_date,
        tbl_paymentrequest.payment_id,tbl_paymentrequest.delete_status,tbl_paymentrequest.id')
        ->from('tbl_paymentrequest')
        ->join('tbl_users1','tbl_users1.user_id=tbl_paymentrequest.login_id')
        ->where('payment_id',$r_id)->where('delete_status','Active')->where('id',$last_inserted_row)->get();?>
        
       
        
        <?php 
        if ($todaypaymentmessage->num_rows() > 0)
        {?>
        
        <?php 
        foreach ($todaypaymentmessage->result() as $row)
        {
        ?>
        
        <?php $postpone_date_last = $row->postpone_date;
        $postpone_login_id = $row->login_id;
        $postpone_user_name = $row->user_name;
        ?>
        
        <?php }?>
        <?php }?>
        
    

       <?php $this->db->select("STR_TO_DATE('$postpone_date_last', '%d-%m-%Y') AS converted_date");
        $query_postpone = $this->db->get();
        
        $result = $query_postpone->row();
        $convertedDate = $result->converted_date;?>
       
        <?php 
        $ptoday_date = date('Y-m-d');
        ?>
                
        <?php if($postpone_login_id==$sess_id && $convertedDate >= $ptoday_date)
        {?>
        
        <h4 style="margin-top: -43px;margin-left: 0px;" id="pst"><?php echo $this->session->userdata('username');?></h4>
        
        <?php }?> 
        
        
        <?php if($postpone_login_id!=$sess_id &&  $convertedDate >= $ptoday_date)
        {?>
        
        <h4 style="margin-top: -43px;margin-left: 0px;" id="pst"><?php echo $postpone_user_name;?> </h4>
        
        <?php }?> 
        
        </label>


<br/>
			<label>
           
            <?php $sess_id=$this->session->userdata('user_id_admin');?>
            
            <?php $last_insert_id=$this->db->insert_id;?>
            
            <?php $last = $this->db->order_by('id',"desc")->where('user_id',$r_id)->limit(1)->get('tbl_bucket_change')->row();?>
            
            <?php $last_inserted_row= $last->id;?>
           
     


        <?php $buckerchange = $this->db->select('tbl_users1.user_name,tbl_bucket_change.login_id,tbl_bucket_change.staff_id,tbl_bucket_change.user_id')
                             ->from('tbl_bucket_change')
                              ->join('tbl_users1','tbl_users1.user_id=tbl_bucket_change.staff_id')
                               ->where('id',$last_inserted_row)->get();?>
        
       
        
        <?php 
        if ($buckerchange->num_rows() > 0)
        {?>
        
        <?php 
        foreach ($buckerchange->result() as $rowbuket)
        {
        ?>
        
        <?php 
        $bucket_login_id = $rowbuket->login_id;
        $bucket_user_name = $rowbuket->user_name;
        ?>
        
        <?php }?>
        <?php }?>
        
    

                
        <?php if($bucket_login_id==$sess_id)
        {?>
        
        <style>
        #pst {
            display: none;
        }
    </style>
        
        <h4 style="margin-top: -43px;margin-left: 0px;"><?php echo $bucket_user_name;?></h4>
        
        <?php }?> 
        
        
        
        </label>
				
				 
				
				
				    <div class="d-flex">
				     
				<div class="tab">
				<button class="btn btn-primary" style="padding-right:50px;" onclick="openCity(event, 'Admincmnts')">Admin comments
   
				</button>
				</div>
				<div class="tab">
				<button class="btn btn-primary" onclick="openCity(event, 'Actioncmnts')">Action comments</button>
				
				
				   
				</div>

				</div>
				 
				<br><br><br>
           
				<div id="Admincmnts" class="tabcontent" style="margin-right: -480px;margin-top:0px;">
				<!--<h3><?php echo $this->session->userdata('username');?></h3>-->
			
				
				
				
				<div class="table-wrapper-scroll-y my-custom-scrollbar">

				<table class="table table-bordered table-striped mb-0">
				<thead>
				<!-- <tr>
				<th scope="col">SI</th>
				<th scope="col">First</th>
				<th scope="col">Last</th>
				<th scope="col">Age</th>
				</tr> -->
				</thead>
				<tbody>
			

           <?php $sess_id=$this->session->userdata('user_id_admin');?>
          
				<?php 
				 $todayfollow=$this->db->select('tbl_followup.status as fstatus,tbl_followup.message as fmessage,
				 	          tbl_followup.fdate as followdate,tbl_followup.cdate as currentdate,tbl_followup.login_id,tbl_followup.uid,
				 	          tbl_followup.id as fid,tbl_users1.user_name')
				             ->from('tbl_followup')
				             ->join('tbl_users1','tbl_users1.user_id=tbl_followup.login_id')
			     //   ->or_where('tbl_followup.login_id',$sess_id)
				            ->where('tbl_followup.uid',$r_id)->order_by('fid','desc')->get()->result_array();?>
				
				<?php $k=1;?>
				
				
				<?php foreach ($todayfollow as $tdfollow) {
				?>

				<tr>			
				<th scope="row">
				<?php echo $k++;?>
				</th>
				<td>

				
				
			<?php $followup_date_update= $tdfollow['followdate'];?>
			<?php $new_datepost_follow = date("d-m-Y", strtotime($followup_date_update));?>
			
               	 <?php
                if ($tdfollow['fstatus'] == 'Ring')
                {
                $tbl_status = "Ring Not Response(RNR)";
                ?>
                <?php echo $tbl_status;
                }?>
                <?php
                if ($tdfollow['fstatus'] == 'Add comments')
                {
                $tbl_status = "Add comments";
                ?>
                <?php echo $tbl_status;
                }?>

                <?php
                if ($tdfollow['fstatus'] == 'Interested')
                {
                $tbl_status = "Interested/Follow up";
                ?>
                <?php echo $tbl_status;
                }?>
                
                <?php
                if ($tdfollow['fstatus'] == 'busy')
                {
                $tbl_status = "Busy/call back";
                ?>
                <?php echo $tbl_status;
                }?>
                
                <?php
                if ($tdfollow['fstatus'] == 'Switched off')
                {
                $tbl_status = "Switched off";
                ?>
                <?php echo $tbl_status;
                }
                ?>
                
                 <?php
                if ($tdfollow['fstatus'] == 'Marriage Fixed')
                {
                $tbl_status = "Marriage Fixed";
                ?>
                <?php echo $tbl_status;
                }
                ?>
                
                   <?php
                if ($tdfollow['fstatus'] == 'Not Interested')
                {
                $tbl_status = "Not Interested";
                ?>
                <?php echo $tbl_status;
                }
                ?>
                
                    <?php
                if ($tdfollow['fstatus'] == 'Whatsapp connect')
                {
                $tbl_status = "Whatsapp Connect";
                ?>
                <?php echo $tbl_status;
                }
                ?>
				<?php echo "---$new_datepost_follow";?>		

					</td>
				<td>
					<!--Customer is not answering call-->
                  <?php echo $tdfollow['fmessage'];?> 
                 
                     
				</td>
				<td>
		
				<?php $dateString =$tdfollow['currentdate'];?>
                <?php $date = new DateTime($dateString);
                
                $formattedDate = $date->format('d-m-Y H:i:s');
                
                echo $formattedDate;?>
            
			    </td>
			    
				<td  style="width: 2px;">
				 <!--<?php echo $tdfollow['name'];?> -->
				 
				 <?php $loginid=$tdfollow['login_id'];?>
				 
				 
				 <?php if($loginid==$sess_id)
				 {?>
				<?php echo $this->session->userdata('username');?>
                <?php }?>
              
              
              	 <?php if($loginid!=$sess_id)
				 {?>
				<?php echo $tdfollow['user_name'];?>
                <?php }?>
            
               

				</td> 
				</tr>
                <?php }?>
                
                
                
                <?php $sess_id=$this->session->userdata('user_id_admin');?>
          
				<?php 
				 $blockdata=$this->db->select('tbl_registration.id,tbl_registration.block_id,tbl_registration.block_status,tbl_registration.block_description,
				 tbl_registration.block_date,tbl_registration.status,tbl_users1.user_name')
				->from('tbl_registration')
				->join('tbl_users1','tbl_users1.user_id=tbl_registration.block_id')
			 //   ->where('emp_id',$sess_id)
			     ->where('id',$r_id)
			    ->order_by('block_date','desc')->get()->result_array();?>
				
                <?php foreach ($blockdata as $blockdatanew) 
                {
                ?>
                
                <tr>			
                <th scope="row">
                <?php echo $k++;?>
                </th>
                <td>

				
               <?php echo $blockdatanew['block_status'];?> 
               
               
               
            <?php if($blockdatanew['status']=='4')
            {?>
            <?php echo "--Block Profile";?>
            <?php }?>
            
            <?php if($blockdatanew['status']=='5')
            {?>
            <?php echo "--UnBlock Profile";?>
            <?php }?>
					
						

					</td>
				<td>
					<!--Customer is not answering call-->
                  <?php echo $blockdatanew['block_description'];?> 
                 
				</td>
				<td>
		
				<?php $dateString =$blockdatanew['block_date'];?>
				
				<?php 
				if ($dateString!== null) 
		    	{
		    	?>
                <?php $date = new DateTime($dateString);
                
                $formattedDate = $date->format('d-m-Y H:i:s');
                
                echo $formattedDate;
                ?>
                <?php }?>
                
			    </td>
				<td style="width: 2px;">
			    <?php $loginid=$blockdatanew['block_id'];?>

                <?php if($loginid==$sess_id)
				 {?>
				<?php echo $this->session->userdata('username');?>
                <?php }?>
              
              
              	 <?php if($loginid!=$sess_id)
				 {?>
				<?php echo $blockdatanew['user_name'];?>
                <?php }?>
            

				</td> 
				</tr>
                <?php }?>
                
            
             
                
                
                
                
                
                <?php $sess_id = $this->session->userdata('user_id_admin');?>
          
		<?php  $buketdata  =  $this->db->select('*')->from('tbl_bucket_change')
				              ->where('user_id',$r_id)->order_by('id','desc')->get()->result_array();?>
				
				<?php foreach ($buketdata as $buketdatanew) 
				{
				?>

				<tr>			
				<th scope="row">
				<?php echo $k++;?>
				</th>
				<td>

				
               <?php echo "Bucket Data Updated";?> 
						

					</td>
				<td>
				
                  <?php echo $buketdatanew['message'];?> 
                 
                     
				</td>
				<td>
				    
			
		    	<?php $dateString =$buketdatanew['bdate'];?>
               <?php $date = new DateTime($dateString);
                
                $formattedDate = $date->format('d-m-Y H:i:s');
                
                echo $formattedDate;?>
                
			
			    </td>
				<td style="width: 2px;">
	            
	             <?php $loginid=$buketdatanew['login_id'];?>

                <?php if($loginid==$sess_id)
                {?>
                <?php echo $this->session->userdata('username');?>
                <?php }?>

                <?php if($loginid!=$sess_id)
                {?>
                <?php echo "Harshan";?>
                <?php }?>
               


				</td> 
				</tr>
                <?php }?>
                
                
                
                
                
                
                
                
                
                 <?php $sess_id=$this->session->userdata('user_id_admin');?>
          
				<?php $hidedata=$this->db->select('tbl_hideprofile.id as fid,tbl_hideprofile.hide_description,tbl_hideprofile.user_id,tbl_hideprofile.emp_id,
				tbl_hideprofile.hide_status,tbl_hideprofile.hide_date,tbl_users1.user_name')
				->from('tbl_hideprofile')
				->join('tbl_users1','tbl_users1.user_id=tbl_hideprofile.emp_id')
				// ->where('emp_id',$sess_id)
				->where('tbl_hideprofile.user_id',$r_id)
				->order_by('fid','desc')->get()->result_array();?>
				
				
				<?php foreach ($hidedata as $hidedatanew) 
				{
				?>

				<tr>			
				<th scope="row">
				<?php echo $k++;?>
				</th>
			
                <td>
                
                <?php $hidestatus=$hidedatanew['hide_status'];?>
                
                <?php if($hidedatanew['hide_status']=='0')
                {?>
                <?php echo "Hide Profile";?>
                <?php }?>
                
                <?php if($hidedatanew['hide_status']=='1')
                {?>
                <?php echo "UnHide Profile";?>
                <?php }?>
                
                
                </td>
                
                
                
                
                	<td>

                <?php echo $hidedatanew['hide_description'];?> 
                
                
                </td>
                
                  
				<td>
				    
	         	<?php $dateString =$hidedatanew['hide_date'];?>
               <?php $date = new DateTime($dateString);
                
                $formattedDate = $date->format('d-m-Y H:i:s');
                
                echo $formattedDate;?>
                
				
				
				
			    </td>
				<td style="width: 2px;">
			
			  <?php $loginid=$hidedatanew['emp_id'];?>

                <?php if($loginid==$sess_id)
                {?>
                <?php echo $this->session->userdata('username');?>
                <?php }?>


                <?php if($loginid!=$sess_id)
                {?>
                <?php echo $hidedatanew['user_name'];?>
                <?php }?>

				</td> 
				</tr>
                <?php }?>
                
                
                
                <?php $sess_id=$this->session->userdata('user_id_admin');?>
          
				<?php $payment_request=$this->db->select('tbl_registration.id,tbl_registration.happynikah_id,tbl_registration.name,tbl_paymentrequest.id as pid,tbl_paymentrequest.message,
				tbl_paymentrequest.cdate,tbl_paymentrequest.postpone_date,tbl_paymentrequest.login_id,tbl_paymentrequest.payment_id,tbl_users1.user_name')
				->from('tbl_registration')
				->join('tbl_paymentrequest','tbl_paymentrequest.payment_id=tbl_registration.id')
				->join('tbl_users1','tbl_users1.user_id=tbl_paymentrequest.login_id')
				// ->where('tbl_paymentrequest.login_id',$sess_id)
				->where('tbl_paymentrequest.payment_id',$r_id)
				->order_by('pid','desc')->get()->result_array();?>
				
				<?php foreach ($payment_request as $requestval) 
				{
				?>

				<tr>			
				<th scope="row">
				<?php echo $k++; ?>
				</th>
				<td>

            <?php $postpone_date= $requestval['postpone_date'];?>
			<?php $new_datepost = date("d-m-Y", strtotime($postpone_date));?> 


			
				Postpone Payment Requested--<?php echo $new_datepost;?>	

					</td>
				<td>
					<!--Customer is not answering call-->
                  <?php echo $requestval['message'];?> 
                 
                     
				</td>
				<td>
			<?php $cdatedata= $requestval['cdate'];?>
			   <?php $new_date5 = date("d-m-Y H:i:s", strtotime($cdatedata));?> 


				<?php echo $new_date5;?>
				
			    </td>
				<td style="width: 2px;">
	            <?php $loginid=$requestval['login_id'];?>

                <?php if($loginid==$sess_id)
                {?>
                <?php echo $this->session->userdata('username');?>
                <?php }?>


                <?php if($loginid!=$sess_id)
                {?>
                <?php echo $requestval['user_name'];?>
                <?php }?>


				</td> 
				</tr>
                <?php }?>
                
                
				</tbody>
				</table>

				</div>
				</div>
				

		<div id="Actioncmnts" class="tabcontent" style="margin-right: -480px;margin-top:0px;">
		    
				<!--<h3><?php echo $this->session->userdata('username');?></h3>-->
				
				<div class="table-wrapper-scroll-y my-custom-scrollbar">

				<table class="table table-bordered table-striped mb-0">
				<thead>
			
				</thead>
				<tbody>
			
				
				 <?php $sess_id=$this->session->userdata('user_id_admin');?>
          
				<?php 
				$action=$this->db->select('tbl_registration.id,tbl_registration.happynikah_id,tbl_registration.name,tbl_contactsview.id as cntid,tbl_contactsview.receiver_id,
				tbl_contactsview.cdate,tbl_contactsview.session_id,tbl_users1.user_name')
				->from('tbl_registration')
				->join('tbl_contactsview','tbl_contactsview.receiver_id=tbl_registration.id')
				->join('tbl_users1','tbl_users1.user_id=tbl_contactsview.session_id')
				// ->where('tbl_contactsview.session_id',$sess_id)
				->where('tbl_contactsview.receiver_id',$r_id)
				->order_by('cntid','desc')->get()->result_array();?>
				
				
				 
				 <?php $i=1;?>
				 
                <?php  $created_id = $this->db->select('tbl_registration.id,tbl_registration.happynikah_id,tbl_registration.name,tbl_registration.reg_date,
                                     tbl_registration.reg_through,tbl_registration.staff_id,tbl_users1.user_name')
                                    ->from('tbl_registration')
                                    ->join('tbl_users1','tbl_users1.user_id=tbl_registration.staff_id')
                                    ->where('tbl_registration.id',$r_id)
                                    ->where('tbl_registration.reg_through','1')->get()->result_array();?>
                
                
                
               <?php if (!empty($created_id)) : ?> 
                <?php foreach($created_id as $creatednew)
                {?>
                
                <tr>
				
				<th scope="row">
				<?php echo $i++; ?>
				</th>
				<td>Profile Created By</td>
				
				<td><?php echo $creatednew['user_name'];?></td>
				<td>
                <?php $profile_created_date= $creatednew['reg_date'];?>
                
                <?php $profile_created_date_new=date('d-m-Y',strtotime($profile_created_date));?>
               <?php echo $profile_created_date_new;?>
                </td>
                
			    <td>
			    </td>
				</tr>
				<?php }?>
			    <?php endif; ?>
			
				
				 <?php foreach($action as $actionnew)
				 {?>
				 
				<tr>
				
				<th scope="row">
				<?php echo $i++; ?></th>
				<td>Contact details viewed</td>
				
				<td><?php echo $actionnew['happynikah_id'];?>
				Contact details viewed</td>
				<td>
			  <!--<?php echo $actionnew['cdate'];?>-->
			  
				<?php $dateString =$actionnew['cdate'];?>
                <?php $date = new DateTime($dateString);
                
                $formattedDate = $date->format('d-m-Y H:i:s');
                
                echo $formattedDate;?>
                
                </td>
                
				<td>
				    
			    <?php $loginid=$actionnew['session_id'];?>

                <?php if($loginid==$sess_id)
                {?>
                <?php echo $this->session->userdata('username');?>
                <?php }?>


                <?php if($loginid!=$sess_id)
                {?>
                <?php echo $actionnew['user_name'];?>
                <?php }?>
                
				</td>
				</tr>
				<?php }?>
				
				
				
		    <?php  $photoapprovedata = $this->db->select('tbl_userimages.*,tbl_users1.user_name')
                                       ->from('tbl_userimages')
                                       ->join('tbl_users1','tbl_users1.user_id=tbl_userimages.staff_id')
                                       ->where('tbl_userimages.user_id',$r_id)
                                       ->where('tbl_userimages.status','2')
                                       ->group_by('tbl_userimages.user_id')
                                       ->get()->result_array();?>
				
			
			
			
				 <?php foreach($photoapprovedata as $photoapprovedata_list)
				 {?>
				 
				<tr>
				
				<th scope="row">
				<?php echo $i++; ?></th>
				<td>Photo Approved</td>
				
				<td>Photo Approved Successfully</td>
				<td>
				<?php $dateString_photo =$photoapprovedata_list['approve_datetime'];?>
                <?php $approve_datetime = new DateTime($dateString_photo);
                
                $approve_formattedDate = $approve_datetime->format('d-m-Y H:i:s');
                echo $approve_formattedDate;?>
                </td>
                
				<td>
				    
			    <?php $photo_login_id=$photoapprovedata_list['staff_id'];?>

                <?php if($photo_login_id==$sess_id)
                {?>
                <?php echo $this->session->userdata('username');?>
                <?php }?>


                <?php if($photo_login_id!=$sess_id)
                {?>
                <?php echo $photoapprovedata_list['user_name'];?>
                <?php }?>
				</td>
				</tr>
				<?php }?>	
				
				
				
				
				
				
		<?php  $delete_photoapprovedata = $this->db->select('tbl_userimages.*,tbl_users1.user_name')
                                        ->from('tbl_userimages')
                                        ->join('tbl_users1','tbl_users1.user_id=tbl_userimages.staff_id')
                                        ->where('tbl_userimages.user_id',$r_id)
                                        ->where('tbl_userimages.status','1')
                                         ->group_by('tbl_userimages.user_id')
                                        ->get()->result_array();?>
				
			
			
			
				 <?php foreach($delete_photoapprovedata as $delete_photoapprovedata_list)
				 {?>
				 
				<tr>
				
				<th scope="row">
				<?php echo $i++; ?></th>
				<td>Delete Photo Approved</td>
				
				<td><?php echo $delete_photoapprovedata_list['comment'];?></td>
				
				<td>
				<?php $dateString_photo_delete =$delete_photoapprovedata_list['delete_datetime'];?>
                <?php $delete_photo_datetime = new DateTime($dateString_photo_delete);
                
                $delete_formattedDate = $delete_photo_datetime->format('d-m-Y H:i:s');
                echo $delete_formattedDate;?>
                </td>
                
				<td>
				    
			    <?php $photo_delete_login_id=$delete_photoapprovedata_list['staff_id'];?>

                <?php if($photo_delete_login_id==$sess_id)
                {?>
                <?php echo $this->session->userdata('username');?>
                <?php }?>


                <?php if($photo_delete_login_id!=$sess_id)
                {?>
                <?php echo $delete_photoapprovedata_list['user_name'];?>
                <?php }?>
				</td>
				</tr>
				<?php }?>	
				
				
				
				
			<?php $sess_id=$this->session->userdata('user_id_admin');?>
				     
            <?php $deletedata = $this->db->select('r.id, r.approve_id, r.delete_id, r.reason_status, r.message, r.status, r.delete_date, 
                                 u1.user_name as approve_name, u2.user_name as delete_name')
                               ->from('tbl_registration r')
                                ->join('tbl_users1 u1', 'u1.user_id = r.approve_id', 'left')
                                ->join('tbl_users1 u2', 'u2.user_id = r.delete_id', 'left')
                                ->where('r.id', $r_id)
                                ->order_by('r.delete_date', 'desc')
                                ->get()
                                ->result_array();?>    
				     
	
				<?php foreach ($deletedata as $deletedatanew) 
				{
				?>
				
	            <?php if(!empty($deletedatanew['reason_status']))
				{?>
				<tr>			
				<th scope="row">
			
				<?php echo $i++;?>
		
				</th>
				<td>
         
				
               <?php echo $deletedatanew['reason_status'];?> 
				
				<?php if($deletedatanew['status']=='1')
				{?>
                <?php echo "--Approve Profile";?>
				<?php }?>		

                
                <?php if($deletedatanew['status']=='3')
				{?>
                <?php echo "--Delete Profile";?>
				<?php }?>

				</td>
				<td>
				
                  <?php echo $deletedatanew['message'];?> 
                 
				</td>
				<td>
				    
			
		    	<?php $dateString =$deletedatanew['delete_date'];?>
		    	<?php if ($dateString!== null) 
		    	{?>
		    	
               <?php $date = new DateTime($dateString);
                
                 $formattedDate = $date->format('d-m-Y H:i:s');
               
            //   $formattedDate = date("d-m-Y H:i:s", strtotime($dateString)); 
                echo $formattedDate;
                ?>
                <?php }?>
			
			    </td>
				<td style="width: 2px;">
	            
	            <?php if($deletedatanew['status']=='1')
				{?>
	             <?php $loginid=$deletedatanew['approve_id'];?>

                <?php if($loginid==$sess_id)
                {?>
                <?php echo $this->session->userdata('username');?>
                <?php }?>


                <?php if($loginid!=$sess_id)
                {?>
                <?php echo $deletedatanew['approve_name'];?>
                <?php }?>
                <?php }?>
                
                
                <?php if($deletedatanew['status']=='3' || $deletedatanew['status']=='6' )
				{?>
	            <?php $loginid11=$deletedatanew['delete_id'];?>
	            
                <?php if($loginid11==$sess_id)
                {?>
                <?php echo $this->session->userdata('username');?>
                <?php }?>
               
               
                 <?php if($loginid11=='999')
                {?>
                <?php echo "Customer";?>
                <?php }?>
                

                <?php if($loginid11!=$sess_id)
                {?>
                <?php echo $deletedatanew['delete_name'];?>
                <?php }?>
                <?php }?>

				</td> 
				</tr>
                <?php }?>
                <?php }?>
                
                
                
        <?php $sess_id_undelete = $this->session->userdata('user_id_admin');?>
				     
        <?php $undeletedata =   $this->db->select('r.id, r.undelete_id,r.undelete_reason, r.undelete_message, r.status, r.undelete_date,
                                 u1.user_name as undelete_name')
                                ->from('tbl_registration r')
                                ->join('tbl_users1 u1', 'u1.user_id = r.undelete_id')
                                ->where('r.id', $r_id)
                                ->order_by('r.undelete_date', 'desc')
                                ->get()
                                ->result_array();?>    
				     
	
				<?php foreach($undeletedata as $undeletedatanew) 
				{
				?>

				<tr>			
				<th scope="row">
				<?php echo $i++;?>
				</th>
				<td>
         
				
               <?php echo $undeletedatanew['undelete_reason'];?> 
				
			
                 <?php echo "--UnDelete Profile";?>
					

				</td>
				<td>
					<!--Customer is not answering call-->
                  <?php echo $undeletedatanew['undelete_message'];?> 
                 
				</td>
				<td>
				    
			
		    	<?php $dateString = $undeletedatanew['undelete_date'];?>
		    	<?php if($dateString!== null) 
		    	{?>
		    	
               <?php $date = new DateTime($dateString);
                
                 $formattedDate = $date->format('d-m-Y H:i:s');
               
            //   $formattedDate = date("d-m-Y H:i:s", strtotime($dateString)); 
                echo $formattedDate;
                ?>
                <?php }?>
			
			    </td>
				<td style="width: 2px;">
	            
	           <?php $loginid_undelete=$undeletedatanew['undelete_id'];?>

                <?php if($loginid_undelete==$sess_id_undelete)
                {?>
                <?php echo $this->session->userdata('username');?>
                <?php }?>

                <?php if($loginid_undelete!=$sess_id_undelete)
                {?>
                <?php echo $undeletedatanew['undelete_name'];?>
                <?php }?>

				</td> 
				</tr>
                <?php }?>
                
                
                
                
				
			 <?php $sess_id=$this->session->userdata('user_id_admin');?>
          
				<?php $changepassdata=$this->db->select('tbl_userlogin.changedate,tbl_userlogin.status,tbl_userlogin.message,tbl_userlogin.emp_id,tbl_userlogin.user_id,tbl_users1.user_name')
				->from('tbl_userlogin')
				->join('tbl_users1','tbl_users1.user_id=tbl_userlogin.emp_id')
				// ->where('emp_id',$sess_id)
				->where('tbl_userlogin.status','1')
				->where('tbl_userlogin.user_id',$r_id)
				->order_by('tbl_userlogin.changedate','desc')->get()->result_array();?>
				
				
				<?php foreach ($changepassdata as $datanew) 
				{
				?>

				<tr>			
				<th scope="row">
				<?php echo $i++;?>
				</th>
				<td>

                <?php echo $datanew['message'];?> 
                
                
                </td>
                <td>
                
              
                <?php echo "Password Changed Successfully";?>
               
                
                
                </td>
                
				<td>
				    
	         	<?php $dateString =$datanew['changedate'];?>
               <?php $date = new DateTime($dateString);
                
                $formattedDate = $date->format('d-m-Y H:i:s');
                
                echo $formattedDate;?>
                
			    </td>
				<td style="width: 2px;">
			
			  <?php $loginid=$datanew['emp_id'];?>

                <?php if($loginid==$sess_id)
                {?>
                <?php echo $this->session->userdata('username');?>
                <?php }?>


                <?php if($loginid!=$sess_id)
                {?>
                <?php echo $datanew['user_name'];?>
                <?php }?>

				</td> 
				</tr>
                <?php }?>
                <!-- verifiyed profile -->
			<?php $sess_id=$this->session->userdata('user_id_admin');?>
          
				<?php $verifydata=$this->db->select('tbl_registration.update_date,tbl_registration.update_data,tbl_registration.update_by,tbl_users1.user_name')
				->from('tbl_registration')
				->join('tbl_users1','tbl_users1.user_id=tbl_registration.update_by')
				->where('tbl_registration.update_data','2')
				->where('tbl_registration.id',$r_id)
				->order_by('tbl_registration.update_date','desc')->get()->result_array();
				?>
				<?php foreach ($verifydata as $data_verify) 
				{
				?>

				<tr>			
				<th scope="row">
				<?php echo $i++;?>
				</th>
				<td>

                <?php echo "Verified Profile Successfully..!"?>                 
                </td>
                <td>             
                <?php echo "Verified Profile";?>
                              
                </td>
                
				<td>
				    
	         	<?php $dateString =$data_verify['update_date'];?>
               <?php $date = new DateTime($dateString);
                
                $formattedDate = $date->format('d-m-Y H:i:s');
                
                echo $formattedDate;?>
                				
			    </td>
				<td style="width: 2px;">
			
			  <?php $loginid=$data_verify['update_by'];?>

                <?php if($loginid==$sess_id)
                {?>
                <?php echo $this->session->userdata('username');?>
                <?php }?>


                <?php if($loginid!=$sess_id)
                {?>
                <?php echo $data_verify['user_name'];?>
                <?php }?>

				</td> 
				</tr>
                <?php }?>
			
				</tbody>
				</table>

				</div>
				</div>
				</td>
				</tr>
				</tbody>
				</table>


				<!-- <a target="_blank" id="verifyemail" class="btn btn-success">verify email</a> -->
				<!-- <a target="_blank" id="hideprofile" class="btn btn-success">hide profile</a> -->
				<!-- <a target="_blank" id="message" class="btn btn-success">enter message</a> -->
				<!-- <a target="_blank" id="blockuser" class="btn btn-success">block</a> -->
				<!-- <a target="_blank" id="deleteuser" class="btn btn-success">delete</a> -->

				<!-- <a target="_blank" id="changepassword" class="btn btn-success">change password</a> -->
				<!-- <a target="_blank" id="interest" class="btn btn-success">interest details</a> -->

				</div>


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

				<!-- modals of search page  -->



                <!-- Modal for enter message -->
                
          
            <form id="contactfollowup" method="post" action="<?php echo base_url();?>admin/pending_followup_register">
             <div class="modal fade" id="enterpendingMessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">


                <h5 class="modal-title" id="exampleModalLongTitle">Enter Message

                <!--  <?php echo $this->session->userdata('user_id_admin');?>  -->
                
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>

              

                <input type="hidden" name="eventId" id="eventId"/>
                <!-- <span id="idHolder"></span> -->
                <div class="modal-body">
                <div class="mb-3">
                <label for="inputName" class="form-label">Status</label>
                <select id="status_pending" class="form-control custom-select" name="status" required  style="padding-bottom: 2px;">
                <option value="" selected disabled>--Please Select Status--</option>
                
                 <option value="Interested">Interested / Follow up</option>
                 <option value="Ring">Ring not respond (RNR) </option>
                <option value="busy">Busy / call back</option>
                <option value="Add comments">Add Comments</option>
                <option value="Switched off">Switched off</option>
                <option value="Whatsapp connect">Whatsapp connect</option>
                 <option value="Marriage Fixed">Marriage Fixed</option>
                 <option value="Not Interested">Not Interested</option>
                </select>
                </div>

                <div class="mb-3" id="follow">
                <label for="setting-input-3" class="form-label">Follow up date</label>          
                <input type="text" id="noSundaypending" name="fdate" required readonly>
                </div>

                <div class="mb-3">
                <label for="inputName" class="form-label">Message</label>
                <textarea id="message" class="form-control" required  name="message" style="height: 160px;"></textarea>
                  
        
                </div>
                </div>
                
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close
                </button>
                <button type="submit"  id="save-project-btn3"  name="register" class="btn btn-primary" 
                style="color: #fff;">Save changes</button>
                     
                </div>
                </div>
                </div>
                
                </div>
                </form>
          
    
                
                <form id="contactfollowup2"  method="post" action="<?php echo base_url(); ?>admin/followup_register">
                <div class="modal fade" id="enterMessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                
                <h5 class="modal-title" id="exampleModalLongTitle">Enter Message
                
                <!--  <?php echo $this->session->userdata('user_id_admin');?>  -->
                
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
                
     
                <!--   <input type="hidden" name="update_id" id="update_id"/> -->
                
                <div class="modal-body">
                <div class="mb-3">
                <label for="inputName" class="form-label">Status</label>
                <select id="status" class="form-control custom-select enter_status" name="status" required  style="padding-bottom: 2px;">
                <option value="" selected disabled>---Please Select Status---</option>
             
                 <option value="Interested">Interested / Follow up</option>
                 <option value="Ring">Ring not respond (RNR) </option>
                <option value="busy">Busy / call back</option>
                <option value="Switched off">Switched off</option>
                <option value="Whatsapp connect">Whatsapp connect</option>
                 <option value="Not Interested">Not Interested</option>
                      
                </select>
                </div>
                
                <div class="mb-3" id="follow">
                <label for="setting-input-3" class="form-label">Follow up date</label>			
                <input type="text" id="noSunday" name="fdate" required readonly>
                </div>
                
                
                <!--<div class="mb-3" id="follow2" style="display:none">-->
                <!--<label for="setting-input-3" class="form-label">Follow up date</label>		-->
                <!--<input type="text" id="noSunday2" name="fdate">-->
                <!--</div>-->
                
                <div class="mb-3">
                <label for="inputName" class="form-label">Message</label>
                <textarea id="message" class="form-control"  name="message" style="height: 160px;"  rows="4" cols="50" required></textarea>
                
                
                
                
                
                <!--<?php echo $this->session->userdata('user_id_admin');?>-->
                
                </div>
                </div>
                <div class="modal-footer">
                <input type="hidden" name="update_id" id="update_id"  
                value="<?php echo $get_search_profiles->id;?>">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit"  id="save-project-btn3"  name="register" class="btn btn-primary" style="color:#fff;">Save changes</button>
                
                </div>
                </div>
                </div>
            
                </div>
                </form>
                
                <form id="addcmments"  method="post" action="<?php echo base_url(); ?>admin/add_comments">
                <div class="modal fade" id="addcomments" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                
                <h5 class="modal-title" id="exampleModalLongTitle">Add Comments
                
                <!--  <?php echo $this->session->userdata('user_id_admin');?>  -->
                
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
                
                <div class="modal-body">
                
                <div class="mb-3">
                <label for="inputName" class="form-label">Message</label>
                <textarea id="message" class="form-control"  name="message" style="height: 160px;"  rows="4" cols="50" required></textarea>
               
                <input type="hidden" name="user_id" id="user_id"  
                value="<?php echo $get_search_profiles->id;?>">
                </div>
                </div>
                <div class="modal-footer">
                
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit"  id="save-project-btn3"  name="register" class="btn btn-primary" style="color:#fff;">Save changes</button>
                
                </div>
                </div>
                </div>
            
                </div>
                </form>
           
                    

		<script type="text/javascript">
		$(document).ready(function() {

		$(function() {
		$( "#my_date_picker" ).datepicker();
		});
		})
		
		
		
		
		$(document).ready(function() {
    $("#contactfollowup").submit(function(e) {
        e.preventDefault(); // Prevent the default form submission.

        // Serialize the form data.
        var formData = $(this).serialize();

        $.ajax({
            type: "POST",
            url: $(this).attr("action"),
            data: formData,
            success: function(response) 
            {
  
                console.log(response);

       
                location.reload();
            },
            error: function(xhr, textStatus, errorThrown) 
            {
           
                console.error(textStatus, errorThrown);
            }
        });


        return false;
    });
});



		$(document).ready(function() {
    $("#contactfollowup2").submit(function(e) {
        e.preventDefault(); // Prevent the default form submission.

        // Serialize the form data.
        var formData = $(this).serialize();

        $.ajax({
            type: "POST",
            url: $(this).attr("action"),
            data: formData,
            success: function(response) 
            {
  
                console.log(response);

       
                location.reload();
            },
            error: function(xhr, textStatus, errorThrown) 
            {
           
                console.error(textStatus, errorThrown);
            }
        });


        return false;
    });
});
		</script>

		<!-- end modal for enter message  -->
		
		<!-- modal for delete  -->
		<form id="contactdelete" method="post" action="<?php echo base_url(); ?>admin/profile_delete" onsubmit="setTimeout(function(){window.location.reload();},800);">
        <div class="modal fade" id="deletecnt" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">
          Profile Delete</h5>

        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body"> 
            
        <div class="mb-3">
        <label for="inputName" class="form-label">Status</label>
        <select id="reason_status" class="form-control custom-select" name="reason_status" required style="padding-bottom: 4px;">
        <option value="" selected disabled>--Please Select Status--</option>
        <option value="Profile Contains Abusive Contents(Vulgar or racist)">Profile Contains Abusive Contents(Vulgar or racist)</option>
        <option value="Vulgar/Invalid Photos">Vulgar/Invalid Photos</option>
        <option value="Invalid Data">Invalid Data</option>
        <option value="Invalid Contact Details">Invalid Contact Details</option>
        <option value="Contact number/link mentioned in restricted fields">Contact number/link mentioned in restricted fields</option>
        <option value="Multiple/Duplicate profiles">Multiple/Duplicate profiles</option>
        <option value="Fake Profiles">Fake Profiles</option>
        <option value="Abnormal Activity Found">Abnormal Activity Found</option>
        <option value="Marriage Fixed">Marriage Fixed</option>
        <option value="Minor Profiles">Minor Profiles</option>
        <option value="Others">Others</option>
        </select>
        </div>

        <div class="mb-3">
        <label for="inputName" class="form-label">Message</label>
        <textarea id="message" class="form-control" required name="message" style="height:100px;"></textarea>
    <!--&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->session->userdata('username');?>-->
   
        </div>
        </div>
        <div class="modal-footer">

        <input type="hidden" name="user_id" id="user_id" value="<?php echo $get_search_profiles->id;?>">
       <input type="hidden" name="session" 
       value="<?php echo $this->session->userdata('user_id_admin');?>" id="session">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close
        </button>
       <!--  <button type="submit" class="btn btn-primary">Save changes</button> -->

       <button type="submit" class="btn btn-primary"  id="btn_update<?php echo $get_search_profiles->id; ?>" style="color:#fff;">Save changes
       </button>

        </div>
       
        </div>
        </div>
        </div>
        </div>
        </form>
        
        
        
        
         <!-- Badge Modal -->

         <form id="contactdelete" method="post" action="<?php echo base_url(); ?>admin/approve_badge" 
         enctype="multipart/form-data" onsubmit="setTimeout(function(){window.location.reload();},800);">
        <div class="modal fade" id="badgedata" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">
          Approve Badge</h5>

        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body"> 
            
        <div class="mb-3">
        <label for="inputName" class="form-label">Documents</label>
        <select id="documents" class="form-control custom-select" 
        name="documents" required style="padding-bottom: 4px;">
        <option value="" selected disabled>--Please Select Documents--</option>
     
        <option value="Voter ID">Voter ID</option>
        <option value="Aadhar">Aadhar</option>
        <option value="PAN Card">PAN Card</option>
        <option value="Driving License">Driving License</option>
        <option value="Others">Others</option>
       
        </select>
        </div>

        <div class="mb-3">
        <label for="inputName" class="form-label">File</label>
        <input type="file" id="filedocs" class="form-control"  required name="filedocs" style="height:100px;">
    <!--&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->session->userdata('username');?>-->
   
        </div>
        </div>
        <div class="modal-footer">

        <input type="hidden" name="user_id" id="user_id" value="<?php echo $get_search_profiles->id;?>">
       <input type="hidden" name="session" 
       value="<?php echo $this->session->userdata('user_id_admin');?>" id="session">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close
        </button>
       <!--  <button type="submit" class="btn btn-primary">Save changes</button> -->

       <button type="submit" class="btn btn-primary"  id="btn_update<?php echo $get_search_profiles->id; ?>" style="color:#fff;">Save changes
       </button>

        </div>
       
        </div>
        </div>
        </div>
        </div>
        </form>
        
        <!--Modal for Approve profile-->
        <form id="approveprofiledata" method="post" action="<?php echo base_url(); ?>admin/profile_approvel" onsubmit="setTimeout(function(){window.location.reload();},800);">
        <div class="modal fade" id="approveprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">
          Approve Profile</h5>

        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body"> 
            
        <div class="mb-3">
       
        
        <label for="inputName" class="form-label">Status</label>
		<select id="reason_status" class="form-control custom-select reason_status" name="reason_status" style="padding-bottom: 5px;" required>
		<option value="" selected disabled>--Please Select Status--</option>
		<option value="Interested To Login">Interested To Login</option>
		<option value="Others">Others</option>
		</select>
		
        </div>

        <div class="mb-3">
        <label for="inputName" class="form-label">Message</label>
        <textarea id="message" class="form-control"  name="message" required style="height: 100px;"></textarea>
        </div>
        </div>
        
        <div class="modal-footer">

        <input type="hidden" name="user_id" id="user_id" value="<?php echo $get_search_profiles->id;?>">
       <input type="hidden" name="session" 
       value="<?php echo $this->session->userdata('user_id_admin');?>" id="session">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close
        </button>
       <!--  <button type="submit" class="btn btn-primary">Save changes</button> -->

       <button type="submit" class="btn btn-primary"  id="btn_update<?php echo $get_search_profiles->id; ?>" style="color:#fff;">Save changes
       </button>

        </div>
       
        </div>
        </div>
        </div>
        </div>
        </form>
        
        
        
        
         <!--Modal for UnDelete profile-->
        <form id="undeleteprofiledata" method="post" action="<?php echo base_url(); ?>admin/undelete_profile" onsubmit="setTimeout(function(){window.location.reload();},800);">
        <div class="modal fade" id="undeleteprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">
          UnDelete Profile</h5>

        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body"> 
            
        <div class="mb-3">
       
        
        <label for="inputName" class="form-label">Status</label>
		<select id="reason_status" class="form-control custom-select reason_status" name="reason_status" style="padding-bottom: 5px;" required>
		<option value="" selected disabled>--Please Select Status--</option>
		<option value="Interested To Login">Interested To Login</option>
		<option value="Others">Others</option>
		</select>
		
        </div>

        <div class="mb-3">
        <label for="inputName" class="form-label">Message</label>
        <textarea id="message" class="form-control"  name="message" required style="height: 100px;"></textarea>
        </div>
        </div>
        
        <div class="modal-footer">

        <input type="hidden" name="user_id" id="user_id" value="<?php echo $get_search_profiles->id;?>">
       <input type="hidden" name="session" 
       value="<?php echo $this->session->userdata('user_id_admin');?>" id="session">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close
        </button>
       <!--  <button type="submit" class="btn btn-primary">Save changes</button> -->

       <button type="submit" class="btn btn-primary"  id="btn_update<?php echo $get_search_profiles->id; ?>" style="color:#fff;">Save changes
       </button>

        </div>
       
        </div>
        </div>
        </div>
        </div>
        </form>

		<!-- modal for block -->
		
		 <form id="blockprofiledata" method="post" action="<?php echo base_url(); ?>admin/block_profile" onsubmit="setTimeout(function(){window.location.reload();},800);">
		<div class="modal fade" id="block_" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
		<div class="modal-header">
		<h5 class="modal-title" id="exampleModalLongTitle">Block Profile</h5>
		<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>
		<div class="modal-body">
		<div class="mb-3">

		<label for="inputName" class="form-label">Status</label>
		<select id="block_status" class="form-control custom-select" name="block_status" required style="padding-bottom: 5px;">
		<option value="" selected disabled>--- Please Select Status---</option>
		<option value="Profile Contains Abusive Contents ( Vulgar or racist )">Profile Contains Abusive Contents ( Vulgar or racist )</option>
		<option value="Vulgar / Invalid Photos">Vulgar / Invalid Photos </option>
		<option value="Invalid Data">Invalid Data </option>
		<option value="Invalid Contact Details">Invalid Contact Details</option>
		<option value="Contact number / link mentioned in restricted fields">Contact number / link mentioned in restricted fields </option>
		<option value="Multiple / Duplicate profiles">Multiple / Duplicate profiles </option>
		<option value="Fake Profiles">Fake Profiles</option>
		<option value="Abnormal Activity Found">Abnormal Activity Found </option>
		<option value="Marriage Fixed">Marriage Fixed</option>
		<option value="Minor Profiles">Minor Profiles</option>
		<option value="Others">Others</option>
		</select>

		</div>

		<div class="mb-3">
		<label for="inputName" class="form-label">Message</label>
		<textarea id="block_description" class="form-control"  name="block_description" style="height:100px;" required></textarea>
		    
	
		    <!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->session->userdata('username');?>-->
		    
		    
		</div>
		</div>
		<div class="modal-footer">
		     <input type="hidden" name="id" id="id" value="<?php echo $get_search_profiles->id;?>">
       <input type="hidden" name="emp_id"  value="<?php echo $this->session->userdata('user_id_admin');?>" id="emp_id">
       
		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-primary btnblk_<?php echo $get_search_profiles->id; ?>" id="btnblkdata_<?php echo $get_search_profiles->id; ?>" style="color:#fff;">Save changes</button>
		</div>
		</div>
		</div>
		</div>
		</form>
		
		<!-- end of block modal  -->
		<!-- modal for change password  -->


		<!-- modal for unblock -->
		<form id="unblockprofiledata" method="post" action="<?php echo base_url(); ?>admin/unblock_profile" onsubmit="setTimeout(function(){window.location.reload();},800);">
		<div class="modal fade" id="unblock_" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
		<div class="modal-header">
		<h5 class="modal-title" id="exampleModalLongTitle">Unblock Profile</h5>
		<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>
		<div class="modal-body">
		<div class="mb-3">
		<label for="inputName" class="form-label">Status</label>
		<select id="block_status" class="form-control custom-select block_status" name="block_status" required style="padding-bottom:2px;">
		<option value="" selected disabled>--Please Select Status--</option>
		<option value="Interested To Login">Interested To Login</option>
		<option value="Others">Others</option>
		</select>
		<input type="hidden" name="id" id="id" value="<?php echo $get_search_profiles->id;?>">
		<input type="hidden"  name="emp_id"  value="<?php echo $this->session->userdata('user_id_admin');?>" id="emp_id">
		<input type="hidden" name="phone" id="phone" value="<?php echo $get_search_profiles->phone; ?>">
		</div>

		<div class="mb-3">
		<label for="inputName" class="form-label">Message</label>
		<textarea id="block_description" class="form-control block_description"  name="block_description" style="height:100px;" required></textarea>
		
		</div>
		</div>
		<div class="modal-footer">
		<button type="button" class="btn btn-secondary"  data-bs-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-primary"  id="btnunblkdata_<?php echo $get_search_profiles->id; ?>" style="color: #fff;">Save changes</button>
		</div>
		</div>
		</div>
		</div>
		</form>

		<!-- end of unblock modal  -->
       
       
       <form id="hideprofiledata" method="post" action="<?php echo base_url(); ?>admin/hide_profile" onsubmit="setTimeout(function(){window.location.reload();},800);">
        <div class="modal fade" id="dispear" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLongTitle">Hide Profile 								

			</h5>
			<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>

			<div class="modal-body">
			<input type="hidden" name="user_id" id="user_id" value="<?php echo $get_search_profiles->id;?>">
			<input type="hidden" value="<?php echo $this->session->userdata('user_id_admin');?>" id="session" name="session"> 
			<div class="mb-3">
			<p>
			Are you sure to Hide this profile ..!
			</p>
			<label for="inputName" class="form-label">Message</label>	 
	          <textarea id="hide_description" class="form-control" name="hide_description" style="height:100px;" required></textarea>
	              <!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->session->userdata('username');?>		-->
		
			</div>

			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary" id="btnhidedata_<?php echo $get_search_profiles->id; ?>" style="color: #fff;">Hide</button>
			</div>
			</div>
			</div>
			</div>
			
			</form>
			
		<!-- end of hide modal  -->
		<!-- modal for unhide -->
		
		<form id="unhideprofiledata" method="post" action="<?php echo base_url(); ?>admin/unhide_profile" onsubmit="setTimeout(function(){window.location.reload();},800);">
		    
		<div class="modal fade" id="display" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Unhide Profile 								

						 </h5>
					<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

			<div class="modal-body">
			<input type="hidden" name="user_id" id="user_id" value="<?php echo $get_search_profiles->id;?>">
			<input type="hidden" value="<?php echo $this->session->userdata('user_id_admin');?>" id="session" name="session"> 
			<div class="mb-3">
			<p> Are you sure to Unhide this profile ..! </p>
			<label for="inputName" class="form-label">Message</label>
			<textarea id="hide_description" class="form-control hide_description"  name="hide_description" style="height:100px;" required></textarea>
			   
			</div>

			</div>

		<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-primary" id="btnunhidedata_<?php echo $get_search_profiles->id;?>"  style="color: #fff;">UnHide</button>
		</div>
		</div>
		</div>
		</div>
		</form>
        <!-- end modal for unhide -->
        
		<div class="modal fade" id="changepassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
		<div class="modal-header">
		   
		<h5 class="modal-title" id="exampleModalLongTitle">Change password</h5>
		<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>
		<div class="modal-body">

		<input type="hidden" name="user_id" id="user_id" value="<?php echo $get_search_profiles->id;?>">
		<input type="hidden" value="<?php echo $this->session->userdata('user_id_admin');?>" id="session"> 
		<div class="mb-3">
		<label for="inputName" class="form-label">Enter Password</label>
		<input id="password" class="form-control" required name="password"  type="text">
		</div>
		</div>
		<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		<button type="button" class="btn btn-primary"  style="color:#fff;" id="changepassbtn_<?php echo $get_search_profiles->id; ?>">Save changes</button>
		</div>
		</div>
		</div>

		</div>
		
	
        <div class="modal fade" id="changepass_success" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Success!</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>Password Updated Succesfully..........! </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>

		<?php $msg=$this->db->select('*')->from('tbl_payement')->where('user_id',$r_id)->where('status','1')->limit(1)->get()->result_array();?>

		<!-- end modal for change password -->
		<!-- modal for approved to pay  -->


			<form id="contactpaid" method="post" action="<?php echo base_url();?>admin/approvetopaid5" onsubmit="setTimeout(function(){window.location.reload();},800);">
			<div class="modal fade" id="approvetopaid" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLongTitle">Approve to Paid</h5>
			<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>
			<br>
			<div>

			<span style="margin-left: 14px;border:2px solid black;color:black;background-color:#FEEAEA;">
			&nbsp;

			<?php                  
			$this->db->select('tbl_registration.id, tbl_payement.user_id,tbl_payement.status, tbl_payement.expiry_date');
			$this->db->from('tbl_payement');
			$this->db->join('tbl_registration', 'tbl_registration.id = tbl_payement.user_id');
			$this->db->where('tbl_payement.user_id', $r_id);
			$query55 = $this->db->get();

			if($query55->num_rows() > 1) 
			{
			$hasStatusZero = false;
			$hasStatusOne = false;
			$rowsWithStatusOne = array();

			foreach($query55->result_array() as $payment) 
			{
			if($payment['status'] == '0') 
			{
			$hasStatusZero = true;
			} 

			elseif ($payment['status'] == '1') 
			{
			$hasStatusOne = true;
			$rowsWithStatusOne[] = $payment;
			}
			}

			if($hasStatusZero && $hasStatusOne) 
			{
			$today_current_date = date('Y-m-d');

			foreach ($rowsWithStatusOne as $row) 
			{
			$expiryDate = date('Y-m-d',strtotime($row['expiry_date']));
			if($expiryDate >= $today_current_date) 
			{
			echo "Paid";
			break; 
			}

			else
			{
			echo "Expired";
			break; 
			}
			}

			} 
			elseif($hasStatusOne) 
			{
			echo "Paid";
			} 

			else 
			{
			echo "Unpaid";
			}
			} 

			elseif($query55->num_rows() == 1) 
			{
			$payment = $query55->row();

			if($payment->status == '0') 
			{
			echo "Unpaid";
			} 

			elseif($payment->status == '1') 
			{
			$expiryDate = date('Y-m-d', strtotime($payment->expiry_date));
			$today_current_date = date('Y-m-d');

			if($expiryDate >= $today_current_date) 
			{
			echo "Paid";
			} 
			else 
			{
			echo "Expired";
			}
			}
			}
			else 
			{
			echo "Unpaid";
			}
			?>
			</span>


            <?php 
            $this->db->select('tbl_registration.id,tbl_registration.happynikah_id,tbl_payement.*,tbl_plan.plan_name,tbl_plan.plan_id');
            $this->db->from('tbl_payement');
            $this->db->join('tbl_registration','tbl_registration.id = tbl_payement.user_id');
            $this->db->join('tbl_plan','tbl_plan.plan_id = tbl_payement.plan_id');
            $this->db->where('tbl_payement.user_id',$r_id);  
            $this->db->where('tbl_payement.status','1');   
            $query = $this->db->get()->result_array();
            
            foreach ($query as $profile_value) 
            {
            
            if($profile_value['status']=='1') 
            {?>
            
            <span style="margin-left: 30px;border:2px solid black;color:black;background-color:#FEEAEA;">
            &nbsp;&nbsp; 
            
            
            <?php
            
            $contactBalance = intval($profile_value['contactbalance']);
            $addonContact = intval($profile_value['addoncontact']);
            $leftContact = intval($profile_value['leftcontact']);
            
            $total_contact=$contactBalance + $addonContact - $leftContact;?>
            <?php echo $total_contact;?>
            
            
            <?php 
            $messageBalance = intval($profile_value['messagebalance']);
            $addonmessage = intval($profile_value['addonmessage']);
            $leftmessage = intval($profile_value['leftmessage']);?>
            
            <?php $total_message=$messageBalance + $addonmessage - $leftmessage;?>
            
            
            &nbsp;&nbsp;
            </span>
            <span 
            style="margin-left:20px;border:2px solid black;color:black;
            background-color:#FEEAEA;">
            &nbsp;&nbsp;
            
            <?php echo $total_message;?>&nbsp;&nbsp;
            
            </span>
            <span style="margin-left: 30px;border:2px solid black;color:black;
            background-color:#FEEAEA;">
            
            &nbsp;    
            
            <!-- Expired on  -->
            <?php $expiry_date_value=$profile_value['expiry_date'];?>	
            <?php $regdateold=date('d-m-Y',strtotime($expiry_date_value. ' -1 day'));?>
            <?php echo $regdateold;?>
            &nbsp;&nbsp; 
            <?php }?>
            <?php }?>
            </span>
            </div>


			<br>
			<div style="border:2px solid black;color:white;margin-top:10px;background-color:grey;">
			&nbsp;&nbsp; <b>Paid Membership</b>
			</div>

			<div class="modal-body">
			<table class="table table-bordered">

			<tbody>
			<tr>
			<td><b>Order ID </b> </td>
			<td>
			<!-- AMIT 1635 -->
			<?php echo $r_id;?>
			</td>

			</tr>
			<tr>
			<td><b>HN ID </b></td>
			<td>

			<!-- HN10001 -->
			<?php echo	$happynikah_id;?>
			</td>

			</tr>
			<tr>
			<td><b>Activation Date </b></td>
			<td>
			<?php $tdate=date('d-m-Y');?>
			<?php echo $tdate;?>
			</td>

			</tr>
			<tr>
			<td><b>Plan </b></td>
			<td>

			<?php $plandata=$this->db->select('*')->from('tbl_plan')->get()->result_array();?>

			<select class="form-control" id="sel_plan" name="sel_plan" required style="padding-bottom: 6px;">
			<option selected disabled>-- Please Select Plan --</option>
			<?php
			foreach($plandata as $plan2){
			echo "<option value='".$plan2['plan_id']."'>".$plan2['plan_name'].'('.(($plan2['plan_strick_amount'])).')'."</option>";
			}
			?>
			</select>
			
			

					</td>

					</tr>
					<tr>
					<td><b>Duration </b></td>
					<td>

					<!-- 45 days -->

					<select class="form-control" id="sel_duration" name="sel_duration" style="padding-bottom: 6px;">
					<option hidden></option>

					</select>


					</td>

					</tr>
					<tr>
					<td><b>No of Contacts </b></td>
					<td>
					<!-- 20 -->
					<select class="form-control" id="sel_contact" name="sel_contact">
					<option hidden></option>
					</select>
					</td>

					</tr>
					<tr>
					<td><b>No of Messages </b></td>
					<td>
					<!-- 20 -->
					<select class="form-control" id="sel_message" name="sel_message">
					<option hidden></option>
					</select>
					</td>

					</tr>
					
					
				
					<select class="form-control" id="sel_amount" name="sel_amount" style="visibility:hidden;">
					<option hidden></option>
					</select>
					
				
					
					<tr id="discount">
					<td><b>Amount </b></td>
					<td>
					<input type="text" name="user_amount"   minlength="0" maxlength="9"   id="user_amount" class="form-control" required>
					</td>

					</tr>


					<!-- <tr>
					<td><b>Result :</b></td>
					<td>
					<input type="number" id="result">
					</td>

					</tr> -->


					<tr id="final">
					<td><b>Discount Amount </b></td>
					<td>

					<!-- 999 -->
					<input class="form-control" type="number" id="final_amount" 
					name="final_amount" readonly="readonly">
					<!-- <option hidden></option>
					</select> -->
					</td>

					</tr>
					
					<tr id="final2">
					<td><b>Sale Amount </b></td>
					<td>
					<!-- 999 -->

					<!-- <select class="form-control" id="final_amount2" name="final_amount2">
					<option hidden></option>
					</select> -->

				    <input class="form-control" type="text" id="final_amount2" 
					name="final_amount2" readonly="readonly">

					</td>

					</tr>
					
					
					<tr id="gst">
					<td><b>GST(18%) </b></td>
					<td>
				

				    <input class="form-control" type="text" id="gst_amount" 
					name="gst_amount" readonly="readonly">

					</td>

					</tr>
					
					
					<tr>
					<td><b>Sales Staff </b></td>
					<td>
					<!--<textarea class="form-control"  name="details" -->
					<!--id="details" style="height: 0px;">-->

					<!--</textarea>-->
					
				         
                <?php
                $sales_staff = $this->db->select('*')
                ->from('tbl_users1')
                ->where('user_id !=', 9)
                 ->where('user_type', 3)
                ->get()
                ->result_array();
                ?>

								<select class="form-control" id="staff_id" name="staff_id"  
								 style="padding-bottom: 4px;" required>
                                <option selected disabled>--Please Select Staff--</option> 
                            
                    
                    <?php foreach ($sales_staff as $row_staff) { ?>
                    <option value="<?= $row_staff['user_id'] ?>"><?= $row_staff['user_name'] ?></option>
                    <?php } ?>
                  
								
					</select>
								
					</td>

					</tr>
					<tr>
					<td><b>Payment Mode </b></td>
					<td>
					<select class="form-control" name="payment_mode" id="payment_mode" required style="padding-bottom: 6px;">
					<!--<option>-->
			  <!--     	....Select....-->
					<!--</option>-->
					
					<option selected disabled>--Please Select Payment Mode--</option>
					
					
					<option name="payment_mode" id="payment_mode" value="Office payment">
					Office payment
					</option>
					<option name="payment_mode" id="payment_mode" value="Bank Deposit">
					Bank Deposit
					</option>
					<option name="payment_mode" id="payment_mode" value="Online Payment">
					Online Payment
					</option>
					<option name="payment_mode" id="payment_mode" value="Door Step">
					Door Step
					</option>
					<option name="payment_mode" id="payment_mode" value="Money Exchange">
					Money Exchange
					</option>
					
					<option name="payment_mode" id="payment_mode" value="Free Activation">
					Free Activation
					</option>
					</select>
					</td>

					</tr>
					<tr  id="office">
					<td><b>Office Name </b></td>
					<td>
					<select class="form-control" style="padding-bottom: 6px;">
					<option>
					kakkanchery
					</option>
					</select>
					</td>

					</tr>
					<tr id="bank">
					<td><b>Bank Deposit </b></td>
					<td>
					<select class="form-control" >
					<option>
					Direct
					</option>
					</select>
					</td>

					</tr>
					<tr id="bank2">
					<td><b>Bank Name </b></td>
					<td>
					<select class="form-control">
					<option>
					Indian Bank
					</option>
					</select>
					</td>

					</tr>
					<tr id="bank3">
					<td><b>Online Payment </b></td>
					<td>
					<select class="form-control" style="padding-bottom:5px;">
					    <option value="Google Pay" name="">
					Google Pay
					</option>
					<option value="Razor Pay" name="">
					Razor Pay
					</option>
					<option value="Iphone Payment" name="">
					Iphone Payment
					</option>

					</select>
					</td>


					</tr>
					<tr id="bank4">
					<td><b>Staff Name </b></td>
					<td>
					<select class="form-control" name="staff_name">
					<option name="staff_name" value="asif">
					Asif - Vadakara
					</option>
					<option name="staff_name" value="other">
					others
					</option>
					</select>
					</td>

					</tr>
					<tr id="bank5">
					<td><b>Number </b></td>
					<td>
					<input class="form-control" type="text" name="number" placeholder="Enter number">
					</td>

					</tr>
					
					
					<tr id="bank6" style="display:none;">
					<td><b>Status </b></td>
					<td>
					<select class="form-control" name="physical_status" required style="padding-bottom:2px;">
					 <option selected disabled> ....Select....</option>
					<option value="Physically Challenged" name="physical_status">Physically Challenged </option>
					<option value="Orphans" name="physical_status">Orphans</option>
                    <option value="Financially Poor" name="physical_status">Financially Poor</option>
                    
                    <option value="Trial Pack" name="physical_status">Trial Pack</option>
					</select>
					</td>


					</tr>
					
					


					</tbody>
					</table>
					

					</div>
				<div class="modal-footer">
				<input type="hidden" name="user_id" id="user_id" value="<?php echo $get_search_profiles->id;?>">
				<input type="hidden" name="session" 
				value="<?php echo $this->session->userdata('user_id_admin');?>" id="session">

					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary" style="color:#fff;">Submit</button>
					</div>
					</div>
					</div>
					</div>
				    </form>
				    
			<form id="contactpaid" method="post" action="<?php echo base_url();?>admin/approvetocontacts"  onsubmit="setTimeout(function(){window.location.reload();},800);">
			<div class="modal fade" id="approvetocontacts" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLongTitle">Add Contacts</h5>
			<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>
			<br>
			<div>


		    <span style="margin-left: 14px;border:2px solid black;color:black;
			background-color:#FEEAEA;">
			&nbsp; 

			<?php                  
			$this->db->select('tbl_registration.id, tbl_payement.user_id,
			tbl_payement.status, tbl_payement.expiry_date');
			$this->db->from('tbl_payement');
			$this->db->join('tbl_registration', 'tbl_registration.id = tbl_payement.user_id');
			$this->db->where('tbl_payement.user_id', $r_id);
			$query55 = $this->db->get();

			if($query55->num_rows() > 1) 
			{
			$hasStatusZero = false;
			$hasStatusOne = false;
			$rowsWithStatusOne = array();

			foreach($query55->result_array() as $payment) 
			{
			if($payment['status'] == '0') 
			{
			$hasStatusZero = true;
			} 

			elseif ($payment['status'] == '1') 
			{
			$hasStatusOne = true;
			$rowsWithStatusOne[] = $payment;
			}
			}

			if($hasStatusZero && $hasStatusOne) 
			{
			$today_current_date = date('Y-m-d');

			foreach ($rowsWithStatusOne as $row) 
			{
			$expiryDate = date('Y-m-d',strtotime($row['expiry_date']));
			if($expiryDate >= $today_current_date) 
			{
			echo "Paid";
			break; 
			}

			else
			{
			echo "Expired";
			break; 
			}
			}

			} 
			elseif($hasStatusOne) 
			{
			echo "Paid";
			} 

			else 
			{
			echo "Unpaid";
			}
			} 

			elseif($query55->num_rows() == 1) 
			{
			$payment = $query55->row();

			if($payment->status == '0') 
			{
			echo "Unpaid";
			} 

			elseif($payment->status == '1') 
			{
			$expiryDate = date('Y-m-d', strtotime($payment->expiry_date));
			$today_current_date = date('Y-m-d');

			if($expiryDate >= $today_current_date) 
			{
			echo "Paid";
			} 
			else 
			{
			echo "Expired";
			}
			}
			}
			else 
			{
			echo "Unpaid";
			}
			?>
			</span>


	<?php 
	$this->db->select('tbl_registration.id,tbl_registration.happynikah_id,tbl_payement.*,tbl_plan.plan_name,tbl_plan.plan_id');
	$this->db->from('tbl_payement');
	$this->db->join('tbl_registration','tbl_registration.id = tbl_payement.user_id');
	$this->db->join('tbl_plan','tbl_plan.plan_id = tbl_payement.plan_id');

	$this->db->where('tbl_payement.user_id',$r_id);  
	$this->db->where('tbl_payement.status','1');   
	$query = $this->db->get()->result_array();


	foreach ($query as $profile_value) 
	{

	if($profile_value['status']=='1') 
	{?>

	<span style="margin-left: 30px;border:2px solid black;color:black;
	 background-color:#FEEAEA;">
	&nbsp;&nbsp; 

		<?php

        $contactBalance = intval($profile_value['contactbalance']);
		$addonContact = intval($profile_value['addoncontact']);
		$leftContact = intval($profile_value['leftcontact']);

		$total_contact=$contactBalance + $addonContact - $leftContact;?>
        <?php echo $total_contact;?>


        <?php 
		$messageBalance = intval($profile_value['messagebalance']);
		$addonmessage = intval($profile_value['addonmessage']);
		$leftmessage = intval($profile_value['leftmessage']);?>

		<?php $total_message=$messageBalance + $addonmessage - $leftmessage;?>
		
		&nbsp;&nbsp;
		</span>
		<span 
		style="margin-left:20px;border:2px solid black;color:black;
		background-color:#FEEAEA;">
		&nbsp;&nbsp;

		<?php echo $total_message;?>&nbsp;&nbsp;

		</span>
		<span style="margin-left: 30px;border:2px solid black;color:black;
		background-color:#FEEAEA;">

		&nbsp;    

		<!-- Expired on  -->
		<?php $expiry_date_value=$profile_value['expiry_date'];?>	
		<?php $regdateold=date('d-m-Y',strtotime($expiry_date_value. ' -1 day'));?>
		<?php echo $regdateold;?>
		&nbsp;&nbsp; 
		<?php }?>
		<?php }?>
		</span>
		</div>

	
			<br>
			<div style="border:2px solid black;color:white;margin-top:10px;background-color:grey;">
			&nbsp;&nbsp; <b>Paid Membership</b>
			</div>

			<div class="modal-body">
			<table class="table table-bordered">

			<tbody>
			<tr>
			<td><b>Order ID </b> </td>
			<td>
			<!-- AMIT 1635 -->
			<?php echo $r_id;?>
			</td>

			</tr>
			<tr>
			<td><b>HN ID </b></td>
			<td>

			<!-- HN10001 -->
			<?php echo	$happynikah_id;?>
			</td>

			</tr>
			<tr>
			<td><b>Activation Date </b></td>
			<td>
			<?php $tdate=date('d-m-Y');?>
			<?php echo $tdate;?>
			</td>

			</tr>
		

			
					<tr>
					<td><b>No of Contacts </b></td>
					<td>
					<!-- 20 -->
					<input class="form-control" id="sel_contact" name="sel_contact" type="number" required>
				
					</td>

					</tr>
					
						<tr>
					<td><b>No of Messages </b></td>
					<td>
					<!-- 20 -->
					<input class="form-control" id="sel_message" name="sel_message" type="number" required>
					</td>

					</tr>
				
			
				<tr>
					<td><b>Duration </b></td>
					<td>

					<!-- 45 days -->

					<!--<input class="form-control"  type="text" id="sel_duration"  name="sel_duration"  value="<?php echo $regdateold;?>" readonly>-->
				
            <input class="form-control"  type="date" id="sel_duration"  name="sel_duration" required>

					</td>

					</tr>


					</tbody>
					</table>
					

					</div>
				<div class="modal-footer">
				<input type="hidden" name="user_id" id="user_id" value="<?php echo $get_search_profiles->id;?>">
				<input type="hidden" name="session" 
				value="<?php echo $this->session->userdata('user_id_admin');?>" id="session">

					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary" style="color:#fff;">Submit</button>
					</div>
					</div>
					</div>
					</div>
				    </form>
				    
			
			
			
			<!--Remove to contacts-->
			
			
				<form id="contactpaid" method="post" action="<?php echo base_url();?>admin/removetocontacts"  onsubmit="setTimeout(function(){window.location.reload();},800);">
			<div class="modal fade" id="removetocontacts" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLongTitle">Less Contacts</h5>
			<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>
			<br>
			<div>


            <span style="margin-left: 14px;border:2px solid black;color:black;
            background-color:#FEEAEA;">
            &nbsp; 
            
            <?php                  
            $this->db->select('tbl_registration.id, tbl_payement.user_id,tbl_payement.status, tbl_payement.expiry_date');
            $this->db->from('tbl_payement');
            $this->db->join('tbl_registration', 'tbl_registration.id = tbl_payement.user_id');
            $this->db->where('tbl_payement.user_id', $r_id);
            $query55 = $this->db->get();
            
            if($query55->num_rows() > 1) 
            {
            $hasStatusZero = false;
            $hasStatusOne = false;
            $rowsWithStatusOne = array();
            
            foreach($query55->result_array() as $payment) 
            {
            if($payment['status'] == '0') 
            {
            $hasStatusZero = true;
            } 
            
            elseif ($payment['status'] == '1') 
            {
            $hasStatusOne = true;
            $rowsWithStatusOne[] = $payment;
            }
            }
            
            if($hasStatusZero && $hasStatusOne) 
            {
            $today_current_date = date('Y-m-d');
            
            foreach ($rowsWithStatusOne as $row) 
            {
            $expiryDate = date('Y-m-d',strtotime($row['expiry_date']));
            if($expiryDate >= $today_current_date) 
            {
            echo "Paid";
            break; 
            }
            
            else
            {
            echo "Expired";
            break; 
            }
            }
            
            } 
            elseif($hasStatusOne) 
            {
            echo "Paid";
            } 
            
            else 
            {
            echo "Unpaid";
            }
            } 
            
            elseif($query55->num_rows() == 1) 
            {
            $payment = $query55->row();
            
            if($payment->status == '0') 
            {
            echo "Unpaid";
            } 
            
            elseif($payment->status == '1') 
            {
            $expiryDate = date('Y-m-d', strtotime($payment->expiry_date));
            $today_current_date = date('Y-m-d');
            
            if($expiryDate >= $today_current_date) 
            {
            echo "Paid";
            } 
            else 
            {
            echo "Expired";
            }
            }
            }
            else 
            {
            echo "Unpaid";
            }
            ?>
            </span>
            
            
            <?php 
            $this->db->select('tbl_registration.id,tbl_registration.happynikah_id,tbl_payement.*,
            tbl_plan.plan_name,tbl_plan.plan_id');
            $this->db->from('tbl_payement');
            $this->db->join('tbl_registration','tbl_registration.id = tbl_payement.user_id');
            $this->db->join('tbl_plan','tbl_plan.plan_id = tbl_payement.plan_id');
            
            $this->db->where('tbl_payement.user_id',$r_id);  
            $this->db->where('tbl_payement.status','1');   
            $query = $this->db->get()->result_array();
            
            
            foreach ($query as $profile_value) 
            {
            
            if($profile_value['status']=='1') 
            {?>
            
            <span style="margin-left: 30px;border:2px solid black;color:black;
            background-color:#FEEAEA;">
            &nbsp;&nbsp; 
            
            <?php
            
            $contactBalance = intval($profile_value['contactbalance']);
            $addonContact = intval($profile_value['addoncontact']);
            $leftContact = intval($profile_value['leftcontact']);
            
            $total_contact=$contactBalance + $addonContact - $leftContact;?>
            <?php echo $total_contact;?>
            
            
            <?php 
            $messageBalance = intval($profile_value['messagebalance']);
            $addonmessage = intval($profile_value['addonmessage']);
            $leftmessage = intval($profile_value['leftmessage']);?>
            
            <?php $total_message=$messageBalance + $addonmessage - $leftmessage;?>
            
            &nbsp;&nbsp;
            </span>
            <span 
            style="margin-left:20px;border:2px solid black;color:black;
            background-color:#FEEAEA;">
            &nbsp;&nbsp;
            
            <?php echo $total_message;?>&nbsp;&nbsp;
            
            </span>
            <span style="margin-left: 30px;border:2px solid black;color:black;
            background-color:#FEEAEA;">
            
            &nbsp;    
            
            <!-- Expired on  -->
            <?php $expiry_date_value=$profile_value['expiry_date'];?>	
            <?php $regdateold=date('d-m-Y',strtotime($expiry_date_value. ' -1 day'));?>
            <?php echo $regdateold;?>
            &nbsp;&nbsp; 
            <?php }?>
            <?php }?>
            </span>
            </div>

		
			<br>
			<div style="border:2px solid black;color:white;margin-top:10px;background-color:grey;">
			&nbsp;&nbsp; <b>Paid Membership</b>
			</div>

			<div class="modal-body">
			<table class="table table-bordered">

			<tbody>
			<tr>
			<td><b>Order ID </b> </td>
			<td>
			<!-- AMIT 1635 -->
			<?php echo $r_id;?>
			</td>

			</tr>
			<tr>
			<td><b>HN ID </b></td>
			<td>

			<!-- HN10001 -->
			<?php echo	$happynikah_id;?>
			</td>

			</tr>
			<tr>
			<td><b>Activation Date </b></td>
			<td>
			<?php $tdate=date('d-m-Y');?>
			<?php echo $tdate;?>
			</td>

			</tr>
		

			
					<tr>
					<td><b>No of Contacts </b></td>
					<td>
					<!-- 20 -->
					<input class="form-control" id="sel_contact" name="sel_contact" type="number" required>
				
					</td>

					</tr>
					
						<tr>
					<td><b>No of Messages </b></td>
					<td>
					<!-- 20 -->
					<input class="form-control" id="sel_message" name="sel_message" type="number" required>
					</td>

					</tr>
				
			
				<tr>
					<td><b>Duration </b></td>
					<td>

					<!-- 45 days -->

					<input class="form-control"  type="date" id="sel_duration"  name="sel_duration" required>
				


					</td>

					</tr>


					</tbody>
					</table>
					

					</div>
				<div class="modal-footer">
				<input type="hidden" name="user_id" id="user_id" value="<?php echo $get_search_profiles->id;?>">
				<input type="hidden" name="session" 
				value="<?php echo $this->session->userdata('user_id_admin');?>" id="session">

					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary" style="color:#fff;">Submit</button>
					</div>
					</div>
					</div>
					</div>
				    </form>
				    
				    
			
		<!--Modal for active offer-->
		
		
			<form id="activeofferform" method="post" action="<?php echo base_url();?>admin/approvetopaidactive" onsubmit="setTimeout(function(){window.location.reload();},800);">
			<div class="modal fade" id="activeoffer" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLongTitle">Active Offer</h5>
			<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>
			<br>
			<div>


		

			</div>
			<br>
			<div style="border:2px solid black;color:white;margin-top:10px;background-color:grey;">
			&nbsp;&nbsp; <b>Paid Membership</b>
			</div>

			<div class="modal-body">
			<table class="table table-bordered">

			<tbody>
			
			<tr>
			<td><b>HN ID</b></td>
			<td>

		
			<?php echo	$happynikah_id;?>
			</td>

			</tr>
			<tr>
			<td><b>Activation Date </b></td>
			<td>
			<?php $tdate=date('d-m-Y');?>
			<?php echo $tdate;?>
			</td>

			</tr>
			<tr>
			<td><b>Plan</b></td>
			<td>

			<?php $plandata=$this->db->select('*')->from('tbl_plan as pl')->get()->result_array();?>

			<select class="form-control" id="sel_plan_active_offer" name="sel_plan" required>
			<option selected disabled>-- Select Plan --</option>
			<?php
			foreach($plandata as $plan2){
			echo "<option value='".$plan2['plan_id']."'>".$plan2['plan_name']."</option>";
			}
			?>
			</select>

					</td>

					</tr>
				
				
					
					<tr>
					<td><b>Amount </b></td>
					<td>
				
				<select class="form-control" id="sel_amount2" name="sel_amount2">
				
					<option selected disabled>-- Select Amount --</option>
					</select>
					</td>

					</tr>
			
					</tbody>
					</table>
					

					</div>
				<div class="modal-footer">
				<input type="hidden" name="user_id" id="user_id" value="<?php echo $get_search_profiles->id;?>">
				<input type="hidden" name="session" 
				value="<?php echo $this->session->userdata('user_id_admin');?>" id="session">

					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary" style="color:#fff;">Submit</button>
					</div>
					</div>
					</div>
					</div>
				    </form>
				    
				    <!--Modal Downgrade-->
				    
				    
				    
			<form id="downgradepaymentform" method="post" action="<?php echo base_url();?>admin/downgrade_payment" onsubmit="setTimeout(function(){window.location.reload();},800);">
			<div class="modal fade" id="downgradepayment" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLongTitle">Downgrade Payment</h5>
			<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>
			<br>
			<div>

			</div>
			<br>
			<div style="border:2px solid black;color:white;margin-top:10px;background-color:grey;">
			&nbsp;&nbsp; <b>Paid Membership</b>
			</div>

			<div class="modal-body">
			<table class="table table-bordered">

			<tbody>
			
			<tr>
			<td><b>HN ID </b></td>
			<td>

	
			<?php echo	$happynikah_id;?>
			</td>

			</tr>
	
			
			<tr>
			<td><b>Reason </b></td>
			<td>

			<!--<?php $plandata=$this->db->select('*')->from('tbl_plan as pl')->get()->result_array();?>-->

			<select class="form-control" id="downgrade_reason" name="downgrade_reason" required>
			<option value="" selected disabled>-- Please Select Reason --</option>
			<option value="ID Mistake">ID Mistake</option>
			<option value="Not Interested">Not Interested</option>
			</select>

					</td>
					</tr>
					
					<tr>
					<td><b>Comments</b></td>
					<td>
					<!-- 1800 -->
				<textarea name="comment" id="comment" style="width:300px;background:transparent;border:0px;height:88px;" required></textarea>
					</td>

					</tr>
					</tbody>
					</table>
					

					</div>
				<div class="modal-footer">
				<input type="hidden" name="user_id" id="user_id" value="<?php echo $get_search_profiles->id;?>">
				<input type="hidden" name="session" 
				value="<?php echo $this->session->userdata('user_id_admin');?>" id="session">

					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary" style="color:#fff;">Submit</button>
					</div>
					</div>
					</div>
					</div>
				    </form>
				    
				    
				    
				    
		<!-- end modal of approve to paid  -->
		<!-- modal for postpone  -->
		
				<form id="contact" method="post" action="<?php echo base_url(); ?>admin/payment_request" onsubmit="setTimeout(function(){window.location.reload();},800);">
				    
		<div class="modal fade" id="postpone" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Payment Request</h5>
						<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
				
				<?php if ($this->session->flashdata('warning')): ?>
                <div class="alert alert-warning">
                <?php echo $this->session->flashdata('warning'); ?>
                 </div>
               <?php endif; ?>
               
               
               <?php $login_id_postpone = $this->session->userdata('user_id_admin');?>
               
                   <?php $ptoday_date=date('Y-m-d');?>
                   
               	<?php $hpaymentrequest= $this->db->select('*')->from('tbl_paymentrequest')
                                        ->where('login_id',$login_id_postpone)->where('delete_status','Active')
                                        // ->where('postpone_date >=',$convertdate)
                                        ->where("STR_TO_DATE(postpone_date, '%d-%m-%Y') >=", $ptoday_date) 
                                        
                                        ->get()->num_rows();?>
                      
                      <?php  if($hpaymentrequest >= '30')
                      {?>
                      <b style="color: red;margin-left: 20px;margin-top: 20px;"> <?php echo "Postpone Limit can be  Exceeded...";?></b>
					 <?php }?>
	

               <input type="hidden" name="payment_id" id="payment_id"  value="<?php echo $get_search_profiles->id;?>">
               
					<div class="modal-body">
						<div class="mb-3">
							<label for="inputName" class="form-label" style="color:black;"><b>Plan Type</b></label>
							<select id="plantype" class="form-control custom-select" 
							name="plantype" style="padding-bottom:6px;">
								<option value="" selected disabled>--Please Select Plan Type--</option>
								<option value="normal">Normal</option>
								<option value="premium">Premium</option>

						</select>
						</div>
						<div class="mb-3">
						<label for="inputName" class="form-label" style="color: black;">
						<b>Membership Plan</b></label>
						<select id="membership_plan" class="form-control custom-select" name="membership_plan">
								<option value=""  selected disabled>--Please Select Plan--</option>
								<option value="1">Bronze</option>
								<option value="2">Diamond</option>
								<option value="3">Crown</option>
								<option value="4">Master</option>
								<option value="5">Assisted</option>
								<option value="6">Assited Pro</option>
								<!--<option value="">Elite</option>-->
							</select>
						</div>
						<div class="mb-3">
						    
						<label for="inputName" class="form-label" style="color: black;"><b>PostPone Date</b></label>
						
			        		<?php $hh=$this->db->select('*')->from('tbl_paymentrequest')->where('payment_id',$r_id)->where('delete_status','Active')->get()->result_array();?>
			        		
			        		<?php $alreadyDisplayed = false;?>
			        		
                            <?php foreach($hh as $samp)
                            {
                            ?>
                            <?php $tt=$samp['postpone_date'];?>
                            <?php $date_timestamp = strtotime($tt);?>
                       
                          
                           <?php $postponeDateTimestamp = strtotime($samp['postpone_date']);?>  
                           
                           
                            <?php if ($postponeDateTimestamp >= strtotime('today') && !$alreadyDisplayed) 
                            {?>
                            <b style="color:red;"> <?php echo "Already Postponed";?></b>
                            <?php $alreadyDisplayed = true;?>
                        
                            <?php }?>
                            <?php }?>	
                            
                            
                            
                            <?php $tbl_followup_request=$this->db->select('*')->from('tbl_followup')
			        		->where('uid',$r_id)->where('status','Interested')
			        		->where('delete_status','Active')->get()->result_array();?>
			        		
			        		<?php $alreadyDisplayed = false;?>
			        		
                            <?php foreach($tbl_followup_request as $samp_followup)
                            {
                            ?>

                            <?php $intrested_followup_id=$samp_followup['login_id'];?>
                            
                            <?php $followupDateTimestamp = strtotime($samp_followup['fdate']);?>  

                             <?php $login_id_followup = $this->session->userdata('user_id_admin');?>

                           
                            <?php if ($login_id_followup!=$intrested_followup_id  && $followupDateTimestamp >= strtotime('today') && !$alreadyDisplayed)
                            {?>
                            <b style="color:red;"> <?php echo "Not Possible to Postpone";?></b>
                            <?php $alreadyDisplayed = true;?>
                            
                            <style>
                            #postpone_date 
                            {
                            display: none;
                            }
                            </style> 
                             
                            <?php }?>
                            <?php }?>	
                            
                            
                    <?php $pdate=date('Y-m-d');?>
                    <?php $newpdate=date("d-m-Y", strtotime($pdate));?>
					
						<?php if($postponeDateTimestamp < strtotime('today'))
						{?>
						
                      
                        <!--//  if ($login_id_followup==$intrested_followup_id)-->
                        <!--//  {-->
                        
						 <input type="text" name="postpone_date"  id="postpone_date"  class="form-control" required readonly>
						 
					
						<?php }?>
						
						
						
						
						</div>

						<div class="mb-3">
						<label for="inputName" class="form-label" style="color: black;">
							<b>Message</b></label>
							<textarea id="message" class="form-control" name="message" required style="height:100px;"></textarea>
							 <!--&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->session->userdata('username');?>-->
								    
						
						</div>
					</div>
					<div class="modal-footer">

						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary" style="color:#fff;">Sumbit</button>
					</div>
				</div>
			</div>
		</div>
		</form>
		
		
		<!--Modal for postpone buket-->
		
		
		
				<form id="contact" method="post" action="<?php echo base_url(); ?>admin/payment_request" onsubmit="setTimeout(function(){window.location.reload();},800);">
				    
		<div class="modal fade" id="postponebucket" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Payment Request</h5>
						<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
				
				<?php if ($this->session->flashdata('warning')): ?>
                <div class="alert alert-warning">
                <?php echo $this->session->flashdata('warning'); ?>
                 </div>
               <?php endif; ?>
               
               
               <?php $login_id_postpone = $this->session->userdata('user_id_admin');?>
               
                   <?php $ptoday_date=date('Y-m-d');?>
                   
               	<?php $hpaymentrequest= $this->db->select('*')->from('tbl_paymentrequest')
                                        ->where('login_id',$login_id_postpone)->where('delete_status','Active')
                                        ->where("STR_TO_DATE(postpone_date, '%d-%m-%Y') >=", $ptoday_date) 
                                        
                                        ->get()->num_rows();?>
                                        
                                        
                      
                      <?php  if($hpaymentrequest >= '30')
                      {?>
                      <b style="color: red;margin-left: 20px;margin-top: 20px;"> <?php echo "Postpone Limit can   Exceeded...";?></b>
					 <?php }?>
	

               <input type="hidden" name="payment_id" id="payment_id"  value="<?php echo $get_search_profiles->id;?>">
               
					<div class="modal-body">
						<div class="mb-3">
							<label for="inputName" class="form-label" style="color:black;"><b>Plan Type</b></label>
							<select id="plantype" class="form-control custom-select" 
							name="plantype" style="padding-bottom:6px;">
								<option value="" selected disabled>--Please Select PlanType--</option>
								<option value="normal">Normal</option>
								<option value="premium">Premium</option>

						</select>
						</div>
						<div class="mb-3">
						<label for="inputName" class="form-label" style="color: black;">
						<b>Membership Plan</b></label>
						<select id="membership_plan" class="form-control custom-select" name="membership_plan">
								<option value="" selected disabled>--Please Select Plan--</option>
								<option value="1">Bronze</option>
								<option value="2">Diamond</option>
								<option value="3">Crown</option>
								<option value="4">Master</option>
								<option value="5">Assisted</option>
								<option value="6">Assited Pro</option>
								<!--<option value="">Elite</option>-->
							</select>
						</div>
						<div class="mb-3">
						    
						<label for="inputName" class="form-label" style="color: black;"><b>PostPone Date</b></label>
						
			        	
                            
                          
						 <input type="text" name="postpone_date"  id="postpone_date2"   class="form-control" required readonly>
						 
						
						</div>

						<div class="mb-3">
						<label for="inputName" class="form-label" style="color: black;">
							<b>Message</b></label>
							<textarea id="message" class="form-control" name="message" required style="height:100px;"></textarea>
							 <!--&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->session->userdata('username');?>-->
								    
						
						</div>
					</div>
					<div class="modal-footer">

						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary" style="color:#fff;">Sumbit</button>
					</div>
				</div>
			</div>
		</div>
		</form>
		
	
	<style>
    tbody:not(:last-child) {
       
       margin-bottom: 80px;
    border: 1.6px solid #76ff2e;
    
    }
</style>
		
		<!-- end of postpone modal  -->
		<!-- modal for Duplicate profile  -->
		<div class="modal fade" id="duplicate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Duplicate Profile
					</h5>
					<button type="button" class="close" data-bs-dismiss="modal" 
					aria-label="Close">
					
				<span aria-hidden="true">&times;</span>
				</button>
				</div>
				<div class="modal-body">
				<div class="table-wrapper-scroll-y my-custom-scrollbar" style="height: 375px;">
				<div>
				<table class="table table-bordered" id="duplicatetable">

    <?php if($get_search_profiles->status == '0' || $get_search_profiles->status == '1' || $get_search_profiles->status == '2' || 
             $get_search_profiles->status == '3' ||  $get_search_profiles->status == '4')
            
            {?> 
             
			<?php $nh=$this->db->select('*')->from('tbl_registration')->order_by('id','asc')->where('phone',$phone)
			->get()->result_array();?>
			<?php  foreach ($nh as  $value)
			 {

				$k=$value['phone'];?>
				<?php $k2=$value['status'];?>
				<?php $k3=$value['happynikah_id'];?>
				<?php $k4=$value['reg_date'];?>
				<?php $k5=$value['name'];?>
				<?php $k6=$value['gender'];?>
				<?php $k7=$value['age'];?>
				<?php $k8=$value['marital_status'];?>
				<?php $k9=$value['photo'];?>
				<?php $k10=$value['dob'];?>

	<!--  <?php echo $k;?> -->

  <?php 
                if ($k2 == '0')
				{
				$status = "Pending";
				} 
				elseif ($k2 == '1')
				{
				$status = "Approved";
				} 
				elseif ($k2 == '2') 
				{
				$status = "Rejected";
				} 
				elseif ($k2 == '3') 
				{
				$status = "Deleted";
				}
				elseif ($k2 == '4') 
				{
				$status = "Block";
				}
				elseif ($k2 == '5')
				{
				$status = "UnBlock";
				}

                elseif ($k2 == '6')
				{
				$status = "Approved";
				}
				?>
				<tbody id="tbd">
             
         

				<tr style="margin-bottom: 10px;">
				    
				<td>

		<?php $url="https://happynikah.com/";?>
         
         <img class="profile-image" src="<?php echo $url.'assets/photo_storage/'. $k9;?>" alt="" 
         width="150" height="auto" alt="Select Image">
			
				</td>
				<td style="color: red;">

				Status: <?php echo $status; ?> 
				</td>
				<td style="color: red;" colspan="2"> 

				Display Status :
				<?php echo $status; ?>
				</td>

				</tr>
				<tr>
				<td>
				<b>HN ID </b>
				</td>
				<td><?php echo $k3; ?></td>
				<td><b>Register Date</b></td>
				<td>
				<?php $kregdate=date('d-m-Y',strtotime($k4)); ?>   
				<?php echo $kregdate; ?>
				
				</td>
				</tr>
				
				<tr>
				<td><b>Name</b></td>
				<td><?php echo $k5; ?></td>
				<td><b>Gender</b></td>
				<td><?php echo $gender; ?></td>
				</tr>
				
				<tr>
				<td><b>Age </b></td>
				<td><?php echo $k7; ?></td>
				<td><b>Date of Birth</b></td>
				<td>
				  <?php $k11=date('d-m-Y',strtotime($k10)); ?>   
				<?php echo $k11; ?></td>

				</tr>
				<tr>
				<td><b>Mobile </b></td>
				<td><?php echo $k; ?></td>
				<td><b>Marital Status </b></td>
				<td><?php echo $k8; ?></td>

				</tr>
               

<!-- <?php $df="SELECT * FROM tbl_registration GROUP BY phone HAVING COUNT(*)>1";?>
<?php print_r($df);?> -->

           <?php }?>
            
            <?php }?>
           
			</tbody>
			</table>


            
			</div>

			</div>
			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
			Close
		    </button>
						<!-- <button type="button" class="btn btn-primary">Sumbit</button> -->
			</div>
			</div>
			</div>
			</div>
		<!-- end of Duplicate profile modal  -->
		<!-- modal for interest details  -->
		<div class="modal fade" id="interestdetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Interest Details 
					</h5>
				
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">

						<div class="table-wrapper-scroll-y my-custom-scrollbar">

							<table class="table table-bordered table-striped mb-0">
								<thead>
		<h3 style="height: 50px;background-color:#a0d9ff;padding-top:7px;">
		    
		 <?php $interest=$this->db->select('*')->from('tbl_interest')->where('sender_id',$r_id)->where('status',0)->get()->num_rows();?>
	    Pending Interest: <?php echo $interest;?></h3>
								</thead>

								<br>
								<tbody>
								    
					<?php $interest_details=$this->db->select('tbl_interest.*,tbl_registration.*')->from('tbl_interest')
					->join('tbl_registration','tbl_registration.id=tbl_interest.receiver_id')
					->where('tbl_interest.sender_id',$r_id)->where('tbl_interest.status',0)->get()->result_array();?>
					
					<?php foreach($interest_details as $interstdata)
					{?>
									<tr>
                   
                         <?php $intrdate = $interstdata['date'];?>
                         <?php $formattedintrest_Date = date('d-m-Y H:i:s', strtotime($intrdate));?>
										<td><?php echo $interstdata['happynikah_id'];?> - &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $formattedintrest_Date;?></td>
										<!--<td>HB100002- 21-01-2023 10:00 PM</td>-->

									</tr>
                                 <?php }?>
								</tbody>
							</table>

						</div>


					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
					</div>
				</div>
			</div>
		</div>
		
		<!-- end modal for Interest details  -->
		<!-- modal for Bucket Change -->
		
		<form id="bucketdata" method="post" action="<?php echo base_url(); ?>admin/bucket_list">
		    
		<div class="modal fade" id="bucket_change" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
		<div class="modal-header">
		   
		<h5 class="modal-title" id="exampleModalLongTitle">Bucket Change</h5>
		<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>
		<div class="modal-body">
         
		<input type="hidden" name="user_id" id="user_id" value="<?php echo $get_search_profiles->id;?>">
		<input type="hidden" name="session" value="<?php echo $this->session->userdata('user_id_admin');?>" id="session"> 
		<div class="mb-3">
		<label for="inputName" class="form-label">Assign to</label>
            <select class="form-control staff_id" id="staff_id" name="staff_id" style="padding-bottom: 4px;width: 100%;" required>
            <option value="" selected disabled>--Please Select Staff--</option> 
            

        
        <?php foreach ($sales_staff as $row_staff) { ?>
        <option value="<?= $row_staff['user_id'] ?>"><?= $row_staff['user_name'] ?></option>
        <?php } ?>
            
            </select>
		<label for="inputName" class="form-label">Reason</label>
         <textarea id="message" class="form-control message" name="message" required style="height:100px;"></textarea>		 
		</div>
		</div>
		<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-primary" style="color:#fff;" id="bucketchange_<?php echo $get_search_profiles->id; ?>">Save changes</button>
		</div>
		</div>
		</div>

		</div>
		</form>
        <!-- end modal for Bucket Change -->
		
		
		
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
		<!-- <script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
			<script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
			<script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script> -->


		<script>
		   function ShowPayment() {
			const targetDiv = document.getElementById("prepaymentdetails");
				if (targetDiv.style.display !== "none") 
			 	{
		 		 targetDiv.style.display = "none";
				} 
				else
				 {
					targetDiv.style.display = "block";
				}
			
			}	
			var url = '<?php echo base_url() ?>'

			function approve_pay(r_id) {
				$.ajax({
					type: 'POST',
					url: url + 'admin/approve_pay',
					data: {
						r_id: r_id
					},
					success: function(data) {
						$('#approveform').html(data)
					},
				})
			}
			
			
			
				function addcontacts(r_id) {
				$.ajax({
					type: 'POST',
					url: url + 'admin/addcontacts',
					data: {
						r_id: r_id
					},
					success: function(data) {
						$('#approveform').html(data)
					},
				})
			}
			
				function leftcontacts(r_id) {
				$.ajax({
					type: 'POST',
					url: url + 'admin/leftcontacts',
					data: {
						r_id: r_id
					},
					success: function(data) {
						$('#approveform').html(data)
					},
				})
			}
			


			//datatable for message
			function openCity(evt, cityName) {
				var i, tabcontent, tablinks;
				tabcontent = document.getElementsByClassName("tabcontent");
				for (i = 0; i < tabcontent.length; i++) {
					tabcontent[i].style.display = "none";
				}
				tablinks = document.getElementsByClassName("btn btn-primary");
				for (i = 0; i < tablinks.length; i++) {
					tablinks[i].className = tablinks[i].className.replace(" active", "");
				}
				document.getElementById(cityName).style.display = "block";
				evt.currentTarget.className += " active";
			}
			//entermessage modal jquery//

			$(function() 
			{
				$("a[class='asm']").click(function() {
					$("#enterMessage").modal("show");
					return false;
				});
			});
			
			$(function()
			{
			$("a[class='enterpendingfollowup']").click(function() 
			{
			$("#enterpendingMessage").modal("show");

			const eventId = $(this).attr('data-id');
            const field = $('#eventId');
            field.val(eventId);
            console.log(field[0]);          
            // $('#idHolder').html( eventId );
            return false;
			});
			});
			
			$(function()
			{
				$("a[class='asms']").click(function() {
				$("#deletecnt").modal("show");
				// const deleteId = $(this).attr('data-id');
				// const field = $('#deleteId');
				// field.val(deleteId);
				// console.log(field[0]); 

				return false;
				});
			});
			
            $(function() {
            $("a[class='asms5']").click(function() 
            {
            $("#approveprofile").modal("show");
            // const deleteId = $(this).attr('data-id');
            // const field = $('#deleteId');
            // field.val(deleteId);
            // console.log(field[0]); 
            
            return false;
            });
			});
			
			
				
            $(function() {
            $("a[class='asms_undelete']").click(function() 
            {
            $("#undeleteprofile").modal("show");
            // const deleteId = $(this).attr('data-id');
            // const field = $('#deleteId');
            // field.val(deleteId);
            // console.log(field[0]); 
            
            return false;
            });
			});
			
			
			$(function() {
				$("a[class='bl']").click(function() {
					$("#block").modal("show");
					return false;
				});
			});

			$(function() {
				$("a[class='ps']").click(function() {
					$("#changepassword").modal("show");
					return false;
				});
			});
			
	
        // document.getElementById('showModalButton').addEventListener('click', function()
        // {
        // $('#successModal').modal('show');
        // });

			
			$(function() {
				$("a[class='ap']").click(function() {
					$("#approvetopaid").modal("show");
					return false;
				});
			});
			
				$(function() {
				$("a[class='ac']").click(function() {
					$("#approvetocontacts").modal("show");
					return false;
				});
			});
			
			
				$(function() {
				$("a[class='lc']").click(function() {
					$("#removetocontacts").modal("show");
					return false;
				});
			});
			
			
				$(function() {
				$("a[class='active_offer']").click(function() {
					$("#activeoffer").modal("show");
					return false;
				});
			});
			
			$(function() {
				$("a[class='downgrade_payment']").click(function() {
					$("#downgradepayment").modal("show");
					return false;
				});
			});
			
			
			
			$(function() 
			{
				$("a[class='pp']").click(function() 
				{
					$("#postpone").modal("show");
					return false;
				});
			});
			
			
			$(function()
            {
                $("a[class='badge']").click(function() 
                {
                $("#badgedata").modal("show");
              
                return false;
                });
            });
            
			
				$(function() {
				$("a[class='ppbucket']").click(function() {
					$("#postponebucket").modal("show");
					return false;
				});
			});
			
			
			$(function() {
				$("button[class='btn btn-danger dp']").click(function() {
					$("#duplicate").modal("show");
					return false;
				});
			});
            
            $(function() {
		$("a[class='bbb']").click(function() {
		$("#block_").modal("show");
		return false;
		});
		});
		$(function() {
		$("a[class='bbc']").click(function() {
		$("#unblock_").modal("show");
		return false;
		});
		});

			$(function() {
			//var id = $("")
			$("a[class='hi']").click(function() {
			$("#dispear").modal('show');
			return false;
			});
			});
			$(function() {
			$("a[class='hello']").click(function() {
			$("#display").modal('show');
			return false;
			});
			});

			$(function() {
			$("a[class='id']").click(function() {
			$("#interestdetails").modal("show");
			return false;
			});

			});
			
			$(function() {
			$("a[class='idd']").click(function() {
			$("#bucket_change").modal("show");
			return false;
			});
		});
		
		$(function() {
			$("a[class='adds']").click(function() {
			$("#approve_profile").modal("show");
			return false;
			});
		});
		
		 $(function() {
			$("a[class='addcmnts']").click(function() {
			$("#addcomments").modal("show");
			return false;
			});
		});

  $(document).ready(function(){
	  // City change
    $('#sel_plan').change(function(){
      var plandata_id5 = $(this).val();

      // AJAX request
      $.ajax({
        url:'<?=base_url()?>admin/getplan',
        method: 'post',
        data: {plandata_id: plandata_id5},
        dataType: 'json',
        success: function(response){

          // Remove options 
          // $('#sel_user').find('option').not(':first').remove();
		$('#sel_duration').find('option').not(':first').remove();
		$('#sel_contact').find('option').not(':first').remove();
		$('#sel_message').find('option').not(':first').remove();
		$('#sel_amount').find('option').not(':first').remove();
		$('#final_amount').find('option').not(':first').remove();
		$('#final_amount2').find('option').not(':first').remove();
          // Add options
          $.each(response,function(index,data){
            // $('select>option:eq(1)').prop('selected', true);
           
            
            $('#sel_duration').append('<option selected value="'+data['plan_id']+'">'+data['duration']+'</option>');
            $('#sel_contact').append('<option selected value="'+data['plan_id']+'">'+data['contacts']+'</option>');
            
            $('#sel_message').append('<option selected value="'+data['plan_id']+'">'+data['messages']+'</option>');
            
            $('#sel_amount').append('<option selected value="'+data['plan_strick_amount']+'">'+data['plan_strick_amount']+'</option>');
            $('#final_amount').append('<option selected value="'+data['plan_id']+'">'+data['plan_amount']+'</option>');
            
            $('#final_amount2').append('<option selected value="'+data['plan_id']+'">'+data['plan_amount']+'</option>');

			});
			}
			});
			});
			});
			
			
		
		
		$(document).ready(function(){
	  // City change
    $('#sel_plan_active_offer').change(function(){
      var plandata_id7 = $(this).val();
    
    
      // AJAX request
      $.ajax({
        url:'<?=base_url()?>admin/getplanactiveoffer',
        method: 'post',
        data: {planid: plandata_id7},
        dataType: 'json',
        success: function(response){

          // Remove options 
          // $('#sel_user').find('option').not(':first').remove();
	
		$('#sel_amount2').find('option').not(':first').remove();
	
          // Add options
          $.each(response,function(index,data)
          {
            // $('select>option:eq(1)').prop('selected', true);
           
            $('#sel_amount2').append('<option value="'+data['amount']+'">'+data['amount']+'</option>');
          

			});
			}
			});
			});
			});	
			
			
    
		
		
			$(document).ready(function () 
			{   
		
			
			$("#postpone_date").datepicker({ 
			beforeShowDay: postpone_date,
			dateFormat: 'dd-mm-yy',
			maxDate: "+3d",
			minDate:0
			});

			function postpone_date(date)
			{ 
			var day = date.getDay(); 
			return [(day > 0), '']; 
			}; 
			
			
			$("#postpone_date2").datepicker({ 
			beforeShowDay: postpone_date,
			dateFormat: 'dd-mm-yy',
			maxDate: "+3d",
			minDate:0
			});


        $(document).ready(function() 
        {
        $("#status").change(function() 
        {
        var selectedOption = $(this).val();
        var maxDays = 2;
        
        if (selectedOption === "Interested")
        {
        maxDays = 3;
        }
        
        $("#noSunday").datepicker("destroy");
        
        $("#noSunday").datepicker({
        beforeShowDay: noSunday,
        dateFormat: 'dd-mm-yy',
        maxDate: "+" + maxDays + "d",
        minDate: 0
        });
        });
        
        function noSunday(date) 
        {
        var day = date.getDay();
        return [(day > 0), ''];
        }
        });
        
        
        $(document).ready(function() 
        {
        $("#status_pending").change(function() 
        {
        var selectedOption = $(this).val();
        var maxDays = 2; 
        
        if (selectedOption === "Interested") {
        maxDays = 3;
        }
        
        $("#noSundaypending").datepicker("destroy");
        
        
        $("#noSundaypending").datepicker({
        beforeShowDay: noSundaypending,
        dateFormat: 'dd-mm-yy',
        maxDate: "+" + maxDays + "d",
        minDate: 0
        });
        });
        
        function noSundaypending(date)
        {
        var day = date.getDay();
        return [(day > 0), ''];
        }
        });
        
        });
	
        $(document).ready(function () 
        {
        $('#contactpaid select[name="sel_plan"]').change(function() 
        {
        
        if ($('#contactpaid select[name="sel_plan"] option:selected').val() == '7')
        {
        // $('#office').hide();
        // $('#amount').hide();
        // $('#discount').hide();
        
        // $('#final').hide();
        // $('#final2').hide();
        $('#bank').hide();
        $('#bank2').hide();
        $('#bank3').hide();
        $('#bank4').hide();
        $('#bank5').hide();
        $('#bank6').hide();
        
        // $('#follow2').show();
        } 
        
        if ($('#contactpaid select[name="sel_plan"] option:selected').val() == '1')
        {
        $('#office').show();
        $('#amount').show();
        $('#discount').show();
        $('#final').show();
        $('#final2').show();
        $('#bank').show();
        $('#bank2').show();
        $('#bank3').show();
        $('#bank4').show();
        $('#bank5').show();
        $('#bank6').show();
        
        // $('#follow2').show();
        } 
        
        if ($('#contactpaid select[name="sel_plan"] option:selected').val() == '2')
        {
        $('#office').show();
        $('#amount').show();
        $('#discount').show();
        $('#final').show();
        $('#final2').show();
        $('#bank').show();
        $('#bank2').show();
        $('#bank3').show();
        $('#bank4').show();
        $('#bank5').show();
        // $('#follow2').show();
        $('#bank6').hide();
        
        } 
        
        if ($('#contactpaid select[name="sel_plan"] option:selected').val() == '3')
        {
        $('#office').show();
        $('#amount').show();
        $('#discount').show();
        $('#final').show();
        $('#final2').show();
        $('#bank').show();
        $('#bank2').show();
        $('#bank3').show();
        $('#bank4').show();
        $('#bank5').show();
        $('#bank6').hide();
        // $('#follow2').show();
        } 
        
        if ($('#contactpaid select[name="sel_plan"] option:selected').val() == '4')
        {
        $('#office').show();
        $('#amount').show();
        $('#discount').show();
        $('#final').show();
        $('#final2').show();
        $('#bank').show();
        $('#bank2').show();
        $('#bank3').show();
        $('#bank4').show();
        $('#bank5').show();
        $('#bank6').hide();
        // $('#follow2').show();
        } 
        
        if ($('#contactpaid select[name="sel_plan"] option:selected').val() == '5')
        {
        $('#office').show();
        $('#amount').show();
        $('#discount').show();
        $('#final').show();
        $('#final2').show();
        $('#bank').show();
        $('#bank2').show();
        $('#bank3').show();
        $('#bank4').show();
        $('#bank5').show();
        $('#bank6').hide();
        // $('#follow2').show();
        } 
        
        if ($('#contactpaid select[name="sel_plan"] option:selected').val() == '6')
        {
        $('#office').show();
        $('#amount').show();
        $('#discount').show();
        $('#final').show();
        $('#final2').show();
        $('#bank').show();
        $('#bank2').show();
        $('#bank3').show();
        $('#bank4').show();
        $('#bank5').show();
        $('#bank6').hide();
        // $('#follow2').show();
        } 
        
        
        
        });
        
        
        
        
        $('#contactpaid select[name="payment_mode"]').change(function () 
        {
        if ($('#contactpaid select[name="payment_mode"] option:selected').val() == 'Office payment')
        {
        $('#office').show();
        $('#bank').hide();
        $('#bank2').hide();
        $('#bank3').hide();
        $('#bank4').hide();
        $('#bank5').hide();
        $('#bank6').hide();
        // $('#follow2').show();
        } 
        
        if($('#contactpaid select[name="payment_mode"] option:selected').val() == 'Bank Deposit')
        {
        $('#office').hide();
        $('#bank').show();
        $('#bank2').show();
        $('#bank3').hide();
        $('#bank4').hide();
        $('#bank5').hide();
        // $('#follow2').show();
        $('#bank6').hide();
        
        } 
        
        
        if($('#contactpaid select[name="payment_mode"] option:selected').val() == 'Free Activation')
        {
        $('#office').hide();
        $('#bank').hide();
        $('#bank2').hide();
        $('#bank3').hide();
        $('#bank4').hide();
        $('#bank5').hide();
        $('#bank6').show();
        // $('#follow2').show();
        } 
        
        
        if ($('#contactpaid select[name="payment_mode"] option:selected').val() == 'Online Payment')
        {
        $('#office').hide();
        $('#bank').hide();
        $('#bank2').hide();
        $('#bank3').show();
        $('#bank6').hide();
        $('#bank4').hide();
        $('#bank5').hide();
        // $('#follow2').show();
        } 
        
        if ($('#contactpaid select[name="payment_mode"] option:selected').val() == 'Door Step')
        {
        $('#office').hide();
        $('#bank').hide();
        $('#bank2').hide();
        $('#bank3').hide();
        $('#bank4').show();
        $('#bank5').show();
        $('#bank6').hide();
        // $('#follow2').show();
        } 
        
        
        if ($('#contactpaid select[name="payment_mode"] option:selected').val() == 'Money Exchange')
        {
        $('#office').hide();
        $('#bank').hide();
        $('#bank2').hide();
        $('#bank3').hide();
        $('#bank4').hide();
        $('#bank5').show();
        $('#bank6').hide();
        // $('#follow2').show();
        } 
        });
        
        });



 
    var temp = "";
    
    $( "#user_amount" ).keyup(function() {
    if(temp !== ""){
    // If you want to use space after text2 value
    //$('.text2').val($('.text2').val().slice(0, -(temp.length+1)));
    $('#final_amount2').val($('#final_amount2').val().slice(0, -temp.length));
    }
    var $text1= $(this).val();
    temp = $text1;
    // If you want to use space after text2 value
    //$('.text2').val($('.text2').val() + " " + $text1);
    $('#final_amount2').val($('#final_amount2').val() + $text1);
    });
    $("#final_amount2").keyup(function(){
    temp = "";
    });




		$(document).on("change keyup blur", "#user_amount", function() 
		{
		var amd = $('#sel_amount').val();
		var disc = $('#user_amount').val();
		
	   var famount = $('#final_amount2').val();
	  
	   var calculatedAmount = famount * 18 / 100;
		
// 		var useramnt = $('#user_amount').val();
			

		if (disc != '' && amd != '')
		{
		$('#final_amount').val((parseInt(amd)) - (parseInt(disc)));
		
		$('#gst_amount').val((parseInt(calculatedAmount)));
// 		$('#final_amount2').val((parseInt(amd)) - (parseInt(disc)));

		}
		else
		{
		$('#final_amount').val(parseInt(amd));
// 		$('#final_amount2').val(parseInt(amd));

		}
		});

   </script>
   
   
   <script type="text/javascript">
  $(document).ready(function() {
    $('#user_amount').keypress(function (e) {
    var regex = new RegExp("^[0-9-]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    //console.log(str);
    if (regex.test(str)) {
        return true;
    }

    e.preventDefault();
    return false;
});
   });
</script>


   <script type="text/javascript">
	function hideprofile(){
		var url = '<?php echo base_url() ?>'
		var user_id = $('#user_id').val();
		var emp_id= $('#session').val();
		
	 $("#btnhide_"+user_id).click(function(){
		var hide_description= $('#hide_description').val();
	//	console.log(hide_description);
		$("#dispear").modal('hide');
		setTimeout(function(){
		location.reload(); 
		}, 1000);

		$.ajax({
		dataType: 'text',
		type: 'POST',
		url: url + 'admin/hide_profile',
		data: {
		user_id: user_id,
		emp_id: emp_id,
		hide_description:hide_description	
		},
		success: function(result2) {
		},
		})
		});				
		}

	</script>
	<script type="text/javascript">
		function unhideprofile(){
		var url = '<?php echo base_url() ?>'
		var user_id = $('#user_id').val();
		var emp_id= $('#session').val();
		
		$("#btnunhide_"+user_id).click(function()
		{
		
		var hide_description = $('.hide_description').val();
		console.log(hide_description);

		$("#display").modal('hide');
		setTimeout(function(){
		location.reload(); 
		}, 1000);

		$.ajax({
		dataType: 'text',
		type: 'POST',
		url: url + 'admin/unhide_profile',
		data: {
		user_id: user_id,
		emp_id: emp_id,
		hide_description:hide_description
		},

		success: function(result3) {

		},
		})
		});				
		}
		</script>

	<script type="text/javascript">
	function unblockprofile(){
	var url = '<?php echo base_url() ?>'
	var id = $('#user_id').val();
	var emp_id= $('#session').val();
	var phone=$('#phone').val();
//	console.log(phone);
	$("#btnunblk_" + id).click(function(){
	var block_description= $('.block_description').val();
	var block_status=$('.block_status').val();
	//console.log(block_status);
	//console.log(block_description);
	$("#unblock_").modal('hide');
	setTimeout(function(){
	location.reload(); 
	}, 1000);
	$.ajax({
	dataType: 'json',
	type: 'POST',
	url: url + 'admin/unblock_profile',
	data: {
	id: id,
	emp_id: emp_id,
	phone:phone,
	block_description:block_description,
	block_status:block_status
	},

	success: function(result5) {

	},
	})
	});
	}
	</script>

	<script type="text/javascript">
	function blockprofile(){
	var url = '<?php echo base_url() ?>'
	var id = $('#user_id').val();
	var emp_id= $('#session').val();
	var phone=$('#phone').val();

	$('#btnblk_' + id).click(function()
	{
	var block_description=$('#block_description').val();
	var block_status=$('#block_status').val();
	$("#block_").modal('hide');
	setTimeout(function(){
	location.reload(); 
	}, 1000);
	$.ajax({
	dataType: 'json',
	type: 'POST',
	url: url + 'admin/block_profile',
	data: {
	id: id,
	emp_id: emp_id,
	phone:phone,
	block_description:block_description,
	block_status:block_status
	},

	success: function(result4) 
	{

	},
	})
	});
	}
	</script>

	<script type="text/javascript">
	
	function change_pass()
	{
	var url = '<?php echo base_url() ?>'  
	var id = $('#user_id').val();
	console.log(id);
	var emp_id= $('#session').val();
	console.log(emp_id);
	$('#changepassbtn_' + id).click(function() 
	{
	var password = $('#password').val();
	console.log(password);
	$('#changepassword').modal('hide');
	$('#changepass_success').modal('show');
	setTimeout(function(){
	location.reload(); 
	}, 1000);
	$.ajax({
	dataType: 'json',
	type: 'POST',
	url: url + 'admin/changepassword',
	data: {
	id: id,
	emp_id: emp_id,
	password:password
	},

	success: function(result6) 
	{

	},

	});
	});
	}
	
    </script>
    
    <script type="text/javascript">
    
$(document).ready(function()
 {
    $("#bucketdata").submit(function(e) 
    {
        e.preventDefault(); // Prevent the default form submission.

        // Serialize the form data.
        var formData = $(this).serialize();

        $.ajax({
            type: "POST",
            url: $(this).attr("action"),
            data: formData,
            success: function(response) {
                // Handle the response, update the search results or show a message.
                // You may need to customize this based on your application.
                console.log(response);

                // Reload the page after a successful submission.
                location.reload();
            },
            error: function(xhr, textStatus, errorThrown) {
           
                console.error(textStatus, errorThrown);
            }
        });


        return false;
    });
});
 </script>
   
   </html>