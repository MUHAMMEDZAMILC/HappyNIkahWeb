<!DOCTYPE html>
<?php include('header.php');
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
                     <h3 style="margin-left: 30px;margin-bottom: 35px;margin-top: 20px;">Searched Profile ID</h3>
                  <table id="example" class="table app-table-hover mb-0 text-left" style="width:100%">
                          <thead>
                              <tr>
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
                         $happynikah_id = $_SESSION['adv_nikah_id'];
                         $detail2 = $this->db->select('R.id,R.happynikah_id,R.phone,R.age,R.name as rname,R.marital_status,D.district')
                        ->from('tbl_registration R')
                        ->join('tbl_district D','D.district_id = R.native_district','left')
                        ->where('happynikah_id',$happynikah_id)
                        ->limit(1)
                        ->get()
                        ->row(); ?>

                         <tbody>
                            <tr>
                                <td><?php echo $detail2->happynikah_id;?></td>
                                <td><?php echo $detail2->rname;?></td>
                                <td><?php echo $detail2->phone;?></td>
                                <td><?php echo $detail2->age;?></td>
                                <td><?php echo $detail2->marital_status;?></td>
                                 <td><?php echo $detail2->district;?></td> 
                            
                        
                                  <td colspan="2">
                                                 
                                  <form method="post" action="<?= base_url() ?>admin/search_profiles">
                                  <input type="hidden" id="inputName" class="form-control" name="search_profile" value="<?php echo $detail2->happynikah_id ?>" required>    
                                    <button type="submit" name="search_profile_btn" class="badge bg-success" id="search_button" 
                                    style="color:white;border: 0px transparent;width: 100px;padding: 10px;">View Profile
                                     </button>
                                     </form>
                                     <form method="post" action="<?= base_url() ?>admin/pdfcreation">
                                     <input type="hidden" id="inputName" class="form-control" name="search_profile"  value="<?php echo $detail2->happynikah_id ?>"  required >    
                                      <button type="submit" name="pdf_creation_btn" class="badge bg-danger" id="pdf_button" 
                                      style="color:white;border: 0px transparent;width: 100px;padding: 10px;margin-top: 10px;">Pdf Creation
                                     </button>
                                     </form>

                                    </td>                              
                                    </tr>              
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
