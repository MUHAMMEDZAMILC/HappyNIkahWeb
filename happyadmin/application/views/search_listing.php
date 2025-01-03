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
                     
                     <h3 style="margin-left: 30px;margin-bottom: 35px;margin-top: 20px;">Search Profile Common</h3>
                     
                      <table id="example" class="table app-table-hover mb-0 text-left" style="width:100%">
                          <thead>
                              <tr>
                                  <th>SL</th>
                                  <th>HN ID</th>
                                  <th>Name</th>
                                  <th>Phone</th>
                                  <th>Age</th>
                                  <th>Martial Status</th>
                                  <th>District</th>                                  
                                  <th>Actions</th>
                              </tr>
                          </thead>
                          <?php
                          
                          $gender=$_SESSION['gender'];
                          $age_from = $_SESSION['age_from'];
                          $age_to = $_SESSION['age_to'];
                          $height_from=$_SESSION['height_from'];
                          $height_to=$_SESSION['height_to'];
                          $district = $_SESSION['district'];
                          $country = $_SESSION['country'];
                          $state = $_SESSION['state'];
                          $marital_status = $_SESSION['marital_status'];
                          $caste = $_SESSION['caste'];
                          $photo = $_SESSION['profile_with_photo'];
                          $highest_education = $_SESSION['highest_education'];
 
                  
            $this->db->select('R.id, R.happynikah_id, R.gender, R.phone, R.age, R.name as rname,R.marital_status,D.district,s.caste as user_caste,h.high_education,hi.height_value,u.user_image');
            $this->db->from('tbl_registration R');
           $this->db->join('tbl_religion TR','TR.rid = R.religion', 'left');
           $this->db->join('tbl_district D', 'D.district_id = R.native_district', 'left');
           $this->db->join('tbl_states st', 'st.id = R.home_state', 'left');
           $this->db->join('tbl_height hi', 'hi.height_id = R.height', 'left');
           $this->db->join("tbl_userimages u",'u.user_id = R.id AND u.profile_pic=1',"left");
            $this->db->join('tbl_caste s', 's.cid = R.caste', 'left');
            $this->db->join('tbl_highest_education h', 'h.id = R.highest_education', 'left');
            $this->db->where('gender', $gender);
            $this->db->where('(R.age BETWEEN "' . $age_from . '" and "' . $age_to . '")');
            $this->db->where('(hi.height_value BETWEEN "' . $height_from . '" and "' . $height_to . '")');
            $this->db->where('country', $country);
            $this->db->where_in('R.marital_status', $marital_status);
            $this->db->where_in('R.caste', $caste);
            $this->db->where('state', $state);
            if($photo ==1) {
               $this->db->where('u.profile_pic',1);
            }           
            $this->db->where_in('R.native_district', $district);
            $this->db->where('R.status', '1');
            $this->db->where_in('R.highest_education', $highest_education);
            $query = $this->db->get();    
           $detail2 = $query->result_array();

         ?>
           
         ?>

    <tbody>            
       <?php
           $i = 1;
            foreach ($detail2 as $value){
            
 ?> 
              <tr>
                 <td><?php echo $i;?></td>
                 <td><?php echo $value['happynikah_id'];?></td>
                  <td><?php echo $value['rname'];?></td>
                    <td><?php echo $value['phone'];?></td>
                     <td><?php echo $value['age'];?></td>
                       <td><?php echo $value['marital_status'];?></td> 
                        <td><?php echo $value['district'];?></td>
                    
                       <td colspan="2">
                                     
                      <form method="post" action="<?= base_url() ?>admin/search_profiles">
                      <input type="hidden" id="inputName" class="form-control" name="search_profile"  value="<?php echo $value['happynikah_id'] ?>"  required >    
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
                     } ?>            
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
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>

</body>
</html>
