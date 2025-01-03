<!DOCTYPE html>
<?php include('header.php');
if($_SESSION['user_type']==='6'){
include('menusupport_gotonikah.php');	
}

$user_id=$this->session->userdata('user_id_admin');
    
    if($user_id=='2')
    {
    include('gotonikah_sales_super.php');     
    }
?>

  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
     
            <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
            <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
            <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
            <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.min.css">
</head>
<body>
    <div class="container">
        <div class="tab-content" id="orders-table-tab-content">
            <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                <!--<div class="app-card app-card-orders-table shadow-sm mb-5" style="margin-right: -170px;margin-left: 95px;">-->
                    
                <div class="app-card app-card-orders-table shadow-sm mb-5" style="margin-right: -170px;margin-left: 95px; 
                margin-top: 26px !important;padding-top: 70px;">
                
                <h4 style="margin-left: 10px;">Profile Verification</h4>
            
                    <div class="app-card-body">
                        <div class="table-responsive">
                            <table id="example" class="table app-table-hover mb-0 text-left">
                                <thead>
                                    <tr>
                                        <th class="cell">Profile</th>
                                        <th class="cell">Details</th>
                                        <th class="cell">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    
                                <?php 
                                
                                $update_logs = array();
                                
                                
                                $registration_query = $this->db->select('id,happynikah_id, name,photo,status,edit_date,edit_through,update_data,goto_nikah')
                                ->from('tbl_registration')
                                // ->where('edit_through', 1)
                                ->where_in('edit_through',array('1','2'))
                                ->where('update_data', 1)
                                ->where('goto_nikah', '1')
                                ->where_in('status',array('0','1'))
                                ->get()
                                ->result_array();
            
           
                                foreach ($registration_query as $registration_data)
                                {
                                $user_id = $registration_data['id'];
                                
                                // Retrieve all data from tbl_updatelogs for the current user
                                $updatelogs_query = $this->db
                                ->select('*')
                                ->from('tbl_updatelogs')
                                ->where('user_id', $user_id)
                                ->where('new_value<>','NULL')
                                ->get()
                                ->result_array();
                                
                                
                                $user_data = $registration_data;
                                $user_data['updatelogs'] = $updatelogs_query;
                                
                                // Add the user's data to the update_logs array
                                $update_logs[] = $user_data;
                                }
                                ?>




    
    
              
               <?php foreach ($update_logs as $value) 
               
               { 
               
               ?>
        
                        <tr>
                          <!--<td class="cell"><?php echo $i; ?></td>-->
                          <td class="cell"> 
                         <!--<img class="profile-image" src="<?php echo base_url();?>'assets/photo_storage/'. $value['photo'];?>" alt="" style="width: 80px;">-->
                         
                    <img  class="profile-image" src="https://happynikah.azurewebsites.net/api/Files/photo_storage/?filePath=<?php echo $value['photo']; ?>" alt="Photo" style="width: 80px;">
                         
                            <br/> <br/>
                          
                         <b style="font-size:18px;"><?php echo $value['happynikah_id']; ?></b><br/>
                         
                            <b style="font-size:18px;"><?php echo $value['name']; ?></b><br/>
                         
                         
                        <?php if($value['status']=='0')
                        {?>
                           <b style="font-size:18px;"><?php echo "Pending";?></b>
                        <?php }?>
                        
                         <?php if($value['status']=='1')
                        {?>
                           <b style="font-size:18px;"><?php echo "Approved";?></b>
                        <?php }?>
                        
                        <br/>
                       
                           <?php $date_time_current= $value['edit_date']; ?> 
                         <?php $formatted_date = date('d-m-Y H:i:s', strtotime($date_time_current));?>
                           <b style="font-size:18px;"><?php echo $formatted_date;?>  </b> 
                         
                         </td>
                         
                         
                         
                          <td class="cell">
                              
                            
                              
                <?php foreach ($value['updatelogs'] as $updatelog) 
                { ?>
                
                
                <?php if ($updatelog['column_name'] != 'partner_mother_tongue') { ?>
                
                <?php if ($updatelog['column_name'] != 'partner_marital_status') { ?>
                
                <?php if ($updatelog['column_name'] != 'partner_languagespoken') { ?>
                
                <?php if ($updatelog['column_name'] != 'religion') { ?>
                
                
                <?php if ($updatelog['column_name'] != 'partner_skincolor') { ?>
                <?php if ($updatelog['column_name'] != 'partner_appearance') { ?>
                <?php if ($updatelog['column_name'] != 'partner_caste') { ?>
                
                <?php if ($updatelog['column_name'] != 'partner_education') { ?>
                <?php if ($updatelog['column_name'] != 'partner_occupation') { ?>
                <?php if ($updatelog['column_name'] != 'caste') { ?>
                
                <?php if ($updatelog['column_name'] != 'madrassa_education') { ?>
                <?php if ($updatelog['column_name'] != 'highest_education') { ?>
                
                <?php if ($updatelog['column_name'] != 'education') { ?>   
                <?php if ($updatelog['column_name'] != 'occupation') { ?> 
                <?php if ($updatelog['column_name'] != 'height') { ?>
                <?php if ($updatelog['column_name'] != 'weight') { ?>
                
                <?php if ($updatelog['column_name'] != 'mother_tongue') { ?>
                
                <?php if ($updatelog['column_name'] != 'native_place') { ?>
                
                <?php if ($updatelog['column_name'] != 'native_district') { ?>
                
                
                <?php if ($updatelog['column_name'] != 'home_district') { ?>  
                
                <?php if ($updatelog['column_name'] != 'home_city') { ?> 
                <?php if ($updatelog['column_name'] != 'partner_height') { ?>  
                
                <?php if ($updatelog['column_name'] != 'partner_height_to') { ?> 
                
                <?php if ($updatelog['column_name'] != 'partner_district') { ?> 
                
                <?php if ($updatelog['column_name'] != 'partner_maritalstatus') { ?> 
                <label style="font-size:15px;"><?php echo $updatelog['new_value']; ?>
         
                <?php echo "/";?>
                </label>
                    
                <?php } ?>
                <?php } ?>
                <?php } ?>
                <?php } ?>
                <?php } ?>
                <?php } ?>
                <?php } ?>
                <?php } ?>
                <?php } ?> 
                <?php } ?>
                <?php } ?>
                <?php } ?>
                <?php } ?>
                <?php } ?>
                <?php } ?>
                <?php } ?>
                <?php } ?>
                <?php } ?>
                <?php } ?>
                <?php } ?>
                <?php } ?>
                <?php } ?>
                <?php } ?>
                <?php } ?>
                <?php } ?>
                     
                <?php if ($updatelog['column_name'] == 'partner_mother_tongue')
                { ?>
                
                <?php $mothertongue_id=$updatelog['new_value'];?>  
                
                <?php 
                $query = $this->db
                ->select('mothertongue')
                ->from('tbl_mothertongue')
                ->where('mothertongue_id', $mothertongue_id)
                ->get();
                $result = $query->row(); ?>
                
                
                
                <label style="font-size:15px;">
                <?php echo $result->mothertongue;?>
                </label>
                <?php echo "/";?>
                
                <?php } ?>
                
                
                
                <?php if ($updatelog['column_name'] == 'partner_marital_status')
                { ?>
                
                
                <?php $mothertongue_id=$updatelog['new_value'];?>  
                
                
                <?php 
                $query2 = $this->db
                ->select('maritalstatus')
                ->from('tbl_maritalstatus')
                ->where('id', $mothertongue_id)
                ->get();
                $result2 = $query2->row(); ?>
                
                
                <label style="font-size:15px;"> <?php echo $result2->maritalstatus;?>
                </label>   
                
                <?php echo "/";?>
                
                <!--<br/>-->
                
                
                
                <?php } ?>
                
                <?php if ($updatelog['column_name'] == 'partner_languagespoken')
                { ?>
                
                
                <?php $mothertongue_id=$updatelog['new_value'];?>  
                
                
                <?php 
                $query = $this->db
                ->select('mothertongue')
                ->from('tbl_mothertongue')
                ->where('mothertongue_id', $mothertongue_id)
                ->get();
                $result = $query->row(); ?>
                
                
                <label style="font-size:15px;">
                <?php echo $result->mothertongue;?>
                </label>  
                <?php echo "/";?>
                
                <!--<br/>-->
                
                
                <?php } ?>
                
                
                
                <?php if ($updatelog['column_name'] == 'religion')
                { ?>
                
                <?php $mothertongue_id=$updatelog['new_value'];?>  
                
                <?php 
                $query = $this->db
                ->select('religion')
                ->from('tbl_religion')
                ->where('rid', $mothertongue_id)
                ->get();
                $result = $query->row(); ?>
                
                <label style="font-size:15px;">
                <?php echo $result->religion;?>
                </label> 
                <?php echo "/";?>
                <!--<br/>-->
                
                <?php } ?>
                
                
                <?php if ($updatelog['column_name'] == 'partner_skincolor')
                { ?>
                
                <?php $mothertongue_id=$updatelog['new_value'];?>  
                
                <?php 
                $query = $this->db
                ->select('skincolor')
                ->from('tbl_skincolor')
                ->where('id', $mothertongue_id)
                ->get();
                $result = $query->row(); ?>
                
                <label style="font-size:15px;">
                <?php echo $result->skincolor;?>
                </label> 
                <?php echo "/";?>
                <!--<br/>-->
                
                <?php } ?>
                
                
                
                <?php if ($updatelog['column_name'] == 'partner_appearance')
                { ?>
                
                <?php $mothertongue_id=$updatelog['new_value'];?>  
                
                <?php 
                $query = $this->db
                ->select('appearance')
                ->from('tbl_appearance')
                ->where('id', $mothertongue_id)
                ->get();
                $result = $query->row(); ?>
                
                <label style="font-size:15px;">
                <?php echo $result->appearance;?> 
                </label> 
                <?php echo "/";?>
                <!--<br/>-->
                
                <?php } ?>
                
                <?php if ($updatelog['column_name'] == 'partner_caste')
                { ?>
                
                <?php $mothertongue_id=$updatelog['new_value'];?>  
                
                <?php 
                $query = $this->db
                ->select('caste')
                ->from('tbl_caste')
                ->where('cid', $mothertongue_id)
                ->get();
                $result = $query->row(); ?>
                <label style="font-size:15px;">
                <?php echo $result->caste;?>
                </label>
                <?php echo "/";?>
                <!--<br/>-->
                
                <?php } ?>
                
                <?php if ($updatelog['column_name'] == 'partner_education')
                { ?>
                
                <?php $mothertongue_id=$updatelog['new_value'];?>  
                
                <?php 
                $query = $this->db
                ->select('education')
                ->from('tbl_education')
                ->where('edu_id', $mothertongue_id)
                ->get();
                $result = $query->row(); ?>
                
                <label style="font-size:15px;">
                <?php echo $result->education;?>
                </label>
                <?php echo "/";?>
                <!--<br/>-->
                
                <?php } ?>
                
                <?php if ($updatelog['column_name'] == 'partner_occupation')
                { ?>
                
                <?php $mothertongue_id=$updatelog['new_value'];?>  
                
                <?php 
                $query = $this->db
                ->select('profession_name')
                ->from('tbl_profession')
                ->where('profession_id', $mothertongue_id)
                ->get();
                $result = $query->row(); ?>
                <label style="font-size:15px;">
                <?php echo $result->profession_name;?>
                </label>
                <?php echo "/";?>
                <!--<br/>-->
                
                <?php } ?>
                
                
                <?php if ($updatelog['column_name'] == 'caste')
                { ?>
                
                <?php $mothertongue_id=$updatelog['new_value'];?>  
                
                <?php 
                $query = $this->db
                ->select('caste')
                ->from('tbl_caste')
                ->where('cid', $mothertongue_id)
                ->get();
                $result = $query->row(); ?>
                <label style="font-size:15px;">
                <?php echo $result->caste;?>
                </label>
                <?php echo "/";?>
                <!--<br/>-->
                
                <?php } ?>
                
                
                <?php if ($updatelog['column_name'] == 'madrassa_education')
                { ?>
                
                <?php $mothertongue_id=$updatelog['new_value'];?>  
                
                <?php 
                $query = $this->db
                ->select('madr_education')
                ->from('tbl_madrassa_education')
                ->where('id', $mothertongue_id)
                ->get();
                $result = $query->row(); ?>
                <label style="font-size:15px;">
                <?php echo $result->madr_education;?>
                </label>
                <?php echo "/";?>
                <!--<br/>-->
                
                <?php } ?>
                
                
                <?php if ($updatelog['column_name'] == 'highest_education')
                { ?>
                
                <?php $mothertongue_id=$updatelog['new_value'];?>  
                
                <?php 
                $query = $this->db
                ->select('high_education')
                ->from('tbl_highest_education')
                ->where('id', $mothertongue_id)
                ->get();
                $result = $query->row(); ?>
                <label style="font-size:15px;">
                <?php echo $result->high_education;?>
                </label>
                <?php echo "/";?>
                <!--<br/>-->
                
                <?php } ?>
                
                
                <?php if ($updatelog['column_name'] == 'education')
                { ?>
                
                <?php $mothertongue_id=$updatelog['new_value'];?>  
                
                <?php 
                $query = $this->db
                ->select('education')
                ->from('tbl_education')
                ->where('edu_id', $mothertongue_id)
                ->get();
                $result = $query->row(); ?>
                <label style="font-size:15px;">
                <?php echo $result->education;?>
                </label>
                <?php echo "/";?>
                <!--<br/>-->
                
                <?php } ?>
                
                <?php if ($updatelog['column_name'] == 'occupation')
                { ?>
                
                <?php $mothertongue_id=$updatelog['new_value'];?>  
                
                <?php 
                $query = $this->db
                ->select('profession_name')
                ->from('tbl_profession')
                ->where('profession_id', $mothertongue_id)
                ->get();
                $result = $query->row(); ?>
                <label style="font-size:15px;">
                <?php echo $result->profession_name;?>
                </label>
                <?php echo "/";?>
                <!--<br/>-->
                
                <?php } ?>
                
                <?php if ($updatelog['column_name'] == 'height')
                { ?>
                
                <?php $mothertongue_id=$updatelog['new_value'];?>  
                
                <?php 
                $query = $this->db
                ->select('height')
                ->from('tbl_height')
                ->where('height_id', $mothertongue_id)
                ->get();
                $result = $query->row(); ?>
                
                <label style="font-size:15px;">
                <?php echo $result->height;?>
                
                </label>
                <?php echo "/";?>
                
                <!--<br/>-->
                
                <?php } ?>
                
                <?php if ($updatelog['column_name'] == 'weight')
                { ?>
                
                <?php $mothertongue_id=$updatelog['new_value'];?>  
                
                <?php 
                $query = $this->db
                ->select('weight')
                ->from('tbl_weight')
                ->where('weight_id', $mothertongue_id)
                ->get();
                $result = $query->row(); ?>
                <label style="font-size:15px;">
                <?php echo $result->weight;?>
                </label>
                <?php echo "/";?>
                <!--<br/>-->
                
                <?php } ?>
                
                
                <?php if ($updatelog['column_name'] == 'mother_tongue')
                { ?>
                
                <?php $mothertongue_id=$updatelog['new_value'];?>  
                
                <?php 
                $query = $this->db
                ->select('mothertongue')
                ->from('tbl_mothertongue')
                ->where('mothertongue_id', $mothertongue_id)
                ->get();
                $result = $query->row(); ?>
                <label style="font-size:15px;">
                <?php echo $result->mothertongue;?>
                </label>
                <?php echo "/";?>
                <!--<br/>-->
                
                <?php } ?>
                
                <?php if ($updatelog['column_name'] == 'native_place')
                { ?>
                
                <?php $mothertongue_id=$updatelog['new_value'];?>  
                
                <?php 
                $query = $this->db
                ->select('name')
                ->from('tbl_city')
                ->where('id', $mothertongue_id)
                ->get();
                $result = $query->row(); ?>
                
                <label style="font-size:15px;">
                <?php echo $result->name;?>
                </label>
                <?php echo "/";?>
                <!--<br/>-->
                
                <?php } ?>
                
                
                <?php if ($updatelog['column_name'] == 'native_district')
                { ?>
                
                <?php $mothertongue_id=$updatelog['new_value'];?>  
                
                <?php 
                $query = $this->db
                ->select('district')
                ->from('tbl_district')
                ->where('district_id', $mothertongue_id)
                ->get();
                $result = $query->row(); ?>
                <label style="font-size:15px;">
                <?php echo $result->district;?>
                </label>
                <?php echo "/";?>
                <!--<br/>-->
                
                <?php } ?>
                
                <?php if ($updatelog['column_name'] == 'home_district')
                { ?>
                
                <?php $mothertongue_id=$updatelog['new_value'];?>  
                
                <?php 
                $query = $this->db
                ->select('district')
                ->from('tbl_district')
                ->where('district_id', $mothertongue_id)
                ->get();
                $result = $query->row(); ?>
                <label style="font-size:15px;">
                <?php echo $result->district;?>
                </label>
                <?php echo "/";?>
                <!--<br/>-->
                
                <?php } ?>
                
                <?php if ($updatelog['column_name'] == 'home_city')
                { ?>
                
                <?php $mothertongue_id=$updatelog['new_value'];?>  
                
                <?php 
                $query = $this->db
                ->select('name')
                ->from('tbl_city')
                ->where('id', $mothertongue_id)
                ->get();
                $result = $query->row(); ?>
                <label style="font-size:15px;">
                <?php echo $result->name;?>
                </label>
                <?php echo "/";?>
                <!--<br/>-->
                
                <?php } ?>
                
                <?php if ($updatelog['column_name'] == 'partner_height')
                { ?>
                
                <?php $mothertongue_id=$updatelog['new_value'];?>  
                
                <?php 
                $query = $this->db
                ->select('height')
                ->from('tbl_height')
                ->where('height_id', $mothertongue_id)
                ->get();
                $result = $query->row(); ?>
                
                <label style="font-size:15px;">
                <?php echo $result->height;?>
                </label>
                <?php echo "/";?>
                <!--<br/>-->
                
                <?php } ?>
                
                <?php if ($updatelog['column_name'] == 'partner_height_to')
                { ?>
                
                <?php $mothertongue_id=$updatelog['new_value'];?>  
                
                <?php 
                $query = $this->db
                ->select('height')
                ->from('tbl_height')
                ->where('height_id', $mothertongue_id)
                ->get();
                $result = $query->row(); ?>
                <label style="font-size:15px;">
                <?php echo $result->height;?>
                </label>
                <?php echo "/";?>
                <!--<br/>-->
                
                <?php } ?>
                
                <?php if ($updatelog['column_name'] == 'partner_district')
                { ?>
                
                <?php $mothertongue_id=$updatelog['new_value'];?>  
                
                <?php 
                $query = $this->db
                ->select('district')
                ->from('tbl_district')
                ->where('district_id', $mothertongue_id)
                ->get();
                $result = $query->row(); ?>
                <label style="font-size:15px;">
                <?php echo $result->district;?>
                <!--<br/>-->
                </label>
                <?php echo "/";?>
                <?php } ?>
                
                <?php if ($updatelog['column_name'] == 'partner_maritalstatus')
                { ?>
                
                <?php $mothertongue_id=$updatelog['new_value'];?>  
                
                <?php 
                $query = $this->db
                ->select('maritalstatus')
                ->from('tbl_maritalstatus')
                ->where('id',$mothertongue_id)
                ->get();
                $result = $query->row(); ?>
                <label style="font-size:15px;">
                <?php echo $result->maritalstatus;?>
                <!--<br/>-->
                </label>
                <?php } ?>
                <?php } ?>
                </td>
                         
                         
                
                <!--<td class="cell"><?php echo $value->phone; ?></td>-->
                
                <td class="cell" style="width: 20%;"> 
                <!--<form method="post" action="<?= base_url() ?>admin/search_profiles">-->
                <div class="form-group">
                
                <input type="hidden" id="inputName" class="form-control" name="search_profile"  value="<?php echo $value->happynikah_id ?>">
                </div>
                </div>
                <div class="col-lg-6">
                
                <label for="inputName">&nbsp;</label>
                
                <a href="<?php echo base_url();?>admin/profile/view/<?php echo $value['id'];?>">
                <button type="submit" name="search_profile_btn" class="btn btn-success" id="search_button"
                
                style="background: transparent;width: 114px;margin-left: -15px;color: #378fd3;">
                <!--<i class="fa-sharp fa-solid fa-share"></i>-->
                Edit
                </button>
                </a>
                <!--</form>-->
                
                
                
                <div class="form-group">
                
                
                </div>
                </div>
                <div class="col-lg-6">
                <form method="post" action="<?= base_url() ?>admin/update_logs_gotonikah">
                <input type="hidden"  class="form-control" name="update_id"  id="update_id" value="<?php echo $value['id'] ?>">
                <label for="inputName">&nbsp;</label>
                <input type="hidden"  class="form-control" name="update_by" id="update_by" value="<?php echo $this->session->userdata('user_id_admin'); ?>">
                <!-- <button onclick="search_profiles()" name="search_profile_btn" class="btn btn-success" style="margin-top: 32px;"> -->
                <button type="submit" name="search_profile_btn" class="btn btn-danger" id="search_button"
                
                style="background: transparent;width: 114px;margin-left: -15px;color: #378fd3;margin-top: -47px;">
                <!--<i class="fa-sharp fa-solid fa-share"></i>-->
                Approve
                </button>
                </form>
                
                <form method="post" action="<?= base_url() ?>admin/update_logs_delete_gotonikah">
                <div class="form-group">
                
                <input type="hidden"  class="form-control" name="update_id"  id="update_id" value="<?php echo $value['id'] ?>">
                </div>
                </div>
                <div class="col-lg-6">
                
                <label for="inputName">&nbsp;</label>
                <!-- <button onclick="search_profiles()" name="search_profile_btn" class="btn btn-success" style="margin-top: 32px;"> -->
                <button type="submit" name="search_profile_btn" class="btn btn-danger" id="search_button"
                
                style="background: transparent;width: 114px;margin-left: -15px;margin-top: -71px;color: #378fd3;">
                <!--<i class="fa-sharp fa-solid fa-share"></i>-->
                Disapprove
                </button>
                </form>
                
                </td>  
                
                </tr>
                <?php
                }?>
                </tbody>
                </table>
                </div>
                </div>
                </div>
                </div>
                </div>
                </div>

    <?php include('footer.php'); ?>


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

        <script type="text/javascript">
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

        <script type="text/javascript">
        
        $(function() 
        {
        $("a[id='asms']").click(function()
        {
        $("#delete").modal("show");
        const deleteId = $(this).attr('data-id');
        const field = $('#deleteId');
        field.val(deleteId);
        console.log(field[0]);
        return false;
        });
        });
        
        </script>

</body>
</html>

