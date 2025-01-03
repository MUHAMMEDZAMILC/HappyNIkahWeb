<!DOCTYPE html>
<?php 
session_start();
include('header.php');
if($_SESSION['user_type']==='8')
{
include('menuservice.php');    
}

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
</head>
<body>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

        <br>
        <div class="tab-content" id="orders-table-tab-content">
              <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
              <div class="app-card app-card-orders-table shadow-sm mb-5" style="margin-left: 280px;margin-right: 20px;">
                <div class="app-card-body">
                 <div class="table-responsive">
                     
                      <h3 style="margin-left: 30px;margin-bottom: 35px;margin-top: 20px;">Advanced Search Profile</h3>
                                           
                       <table id="example" class="table app-table-hover mb-0 text-left" style="width:100%">
                          <thead>
                              <tr>
                                  <th>SL</th>
                                  <th>HN ID</th>
                                  <th>Name</th>
                                  <th>Phone</th>
                                  <th>Age</th>
                                   <th>Caste</th>
                                  <th>Martial Status</th>
                                  <th>District</th>
                                 <th>Actions</th> 
                              </tr>
                          </thead>
                          <?php

          $gender= $_SESSION['adv_gender'];  
          $age_from = $_SESSION['adv_age_from'];
          $age_to = $_SESSION['adv_age_to'];
          $height_from=$_SESSION['adv_height_from'];
          $height_to=$_SESSION['adv_height_to'];
          $weight_from=$_SESSION['adv_weight_from'];
          $weight_to=$_SESSION['adv_weight_to'];
          $district = $_SESSION['adv_district'];
          $country  = $_SESSION['adv_country'];
          $state    = $_SESSION['adv_state'];
          $city     = $_SESSION['adv_city'];
          $marital_status = $_SESSION['marital_status1'];
          $bodytype=$_SESSION['bodytype'];
          $skin_color=$_SESSION['skin_color'];
          $financialstatus=$_SESSION['financialstatus'];
          $physical_status=$_SESSION['physical_status'];
          $profession_type=$_SESSION['profession_type'];
          $caste=$_SESSION['adv_belief'];
          $highest_education = $_SESSION['adv_highest_education'];
          $photo=$_SESSION['adv_profile_with_photo'];

          $value1 = array(); 
          for ($i = 0; $i < count($city); $i++){
          $value1[] = $city[$i];

         }
            $this->db->select('R.id, R.happynikah_id, R.gender, R.phone, R.age, R.name as rname,R.marital_status,D.district,h.high_education,hi.height_value,c.name as user_city,w.weight_value,s.caste as user_caste,R.bodytype,R.color,R.job_category,u.user_image');
            $this->db->from('tbl_registration R');
            $this->db->join('tbl_religion TR','TR.rid = R.religion', 'left');
            $this->db->join('tbl_district D', 'D.district_id = R.native_district', 'left');
            $this->db->join('tbl_city c', 'c.name = R.native_place', 'left');
            $this->db->join('tbl_states st', 'st.id = R.home_state', 'left');
            $this->db->join('tbl_height hi', 'hi.height_id = R.height', 'left');
            $this->db->join('tbl_weight w', 'w.weight_id = R.weight', 'left');           
            $this->db->join('tbl_caste s', 's.cid = R.caste', 'left');
            $this->db->join("tbl_userimages u",'u.user_id = R.id AND u.profile_pic=1',"left");
            $this->db->join('tbl_highest_education h', 'h.id = R.highest_education', 'left');
            $this->db->where('gender', $gender); 
            $this->db->where('(R.age BETWEEN "' . $age_from . '" and "' . $age_to . '")');
            $this->db->where('(hi.height_value BETWEEN "' . $height_from . '" and "' . $height_to . '")');
            $this->db->where('(w.weight_value BETWEEN "' . $weight_from . '" and "' . $weight_to . '")');
            $this->db->where('country', $country);
            $this->db->where_in('R.marital_status', $marital_status);
            $this->db->where_in('R.caste', $caste);
            $this->db->where('state', $state);     
            $this->db->where_in('R.native_district', $district);
            $this->db->where_in('R.native_place', $value1);
            $this->db->where('R.status', '1');
            $this->db->where_in('R.highest_education', $highest_education);
            $this->db->where_in('R.bodytype', $bodytype);
            $this->db->where_in('R.color', $skin_color);
            $this->db->where_in('R.physical_status',$physical_status);
            $this->db->where_in('R.job_category', $profession_type);
             if($photo==1) {
               $this->db->where('u.profile_pic',1);
            } 
            $query =$this->db->get();    
            $detail2 =$query->result_array();
         
 ?>

    <tbody>            
       <?php
           $i = 1;
           
            foreach ($detail2 as $value){?> 
              <tr>
                 <td><?php echo $i;?></td>
                 <td><?php echo $value['happynikah_id'];?></td>
                  <td><?php echo $value['rname'];?></td>
                    <td><?php echo $value['phone'];?></td>
                     <td><?php echo $value['age'];?></td>
                     <td><?php echo $value['user_caste'];?></td>
                      <td><?php echo $value['marital_status'];?></td>
                      <td><?php echo $value['district'];?></td> 
                        
                       <td colspan="2">
                                     
                      <form method="post" action="<?= base_url() ?>admin/search_profiles">
                      <input type="hidden" id="inputName" class="form-control" name="search_profile"  value="<?php echo $value['happynikah_id'] ?>"  required>    
                        <button type="submit" name="search_profile_btn" class="badge bg-success" id="search_button" 
                        style="color:white;border: 0px transparent;width: 100px;padding: 10px;">View Profile
                         </button>
                         </form>
                        <form method="post" action="<?= base_url() ?>admin/pdfcreation">
                         <input type="hidden" id="inputName" class="form-control" name="search_profile"  value="<?php echo $value['happynikah_id'] ?>"  required >    
                          <button type="submit" name="pdf_creation_btn" class="badge bg-danger" id="pdf_button" 
                          style="color:white;border: 0px transparent;width: 100px;padding: 10px;margin-top: 10px;">Pdf Creation
                         </button>
                         </form> 
                        </td>                     
                        </tr>  
                    <?php
                      $i++;
                     } 
                   ?>            
                      </tbody>

                     </table>

                    </div>
                  </div>
                  </div>
                  </div>
                  </div>

                  <?php include('footer.php'); ?>

    <script src="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>


    <script type="text/javascript">
        $(document).ready(function(){
            $('#example').DataTable();
        });
    </script>

</body>
</html>
