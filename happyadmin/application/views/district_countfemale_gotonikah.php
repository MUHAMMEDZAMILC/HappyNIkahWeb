<!DOCTYPE html>
<?php include('header.php');
if($_SESSION['user_type']==='0')
{
include('gotonikah_sales_super.php'); 
}

?>

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
<!-- DataTables -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">

<!-- Theme style -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.min.css">
</head>

<!-- Content Wrapper. Contains page content -->
<div class="app-wrapper">
  <div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container">
      <div class="row g-3 mb-4 align-items-center justify-content-between">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1><?= $page ?></h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active"><?= $page ?></li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
      <div class="tab-content" id="orders-table-tab-content">
          
                    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                        <div class="app-card app-card-orders-table shadow-sm mb-5">
                             <div class="row">
                                 
                                 <div class="col-md-6">
                            
                        
                                </div>
                             </div><br>
          
                            <div class="app-card-body" style="padding-bottom: 40px;">
                             
                                  <div class="row" style="margin-left:20px;margin-top:31px;">

                                      <form id="filterForm">
                    
                              <label style="margin-left: 3px;margin-bottom: 10px;">District  List:</label><br> 
                             
                              <?php $districts = $this->db->select('*')->from('tbl_district')->where('district_id !=', 898)->where('status',1)->where('state_id',18)->get()->result_array();?>
                               <select class="form-control"  id="districts" name="districts" 
                                style="padding-bottom: 4px;margin-left: 100px;width: 25%;margin-top: -40px;" required>
                                                             
                              <option value="" selected disabled>Please Select District</option> 
                              <?php foreach($districts as $value){ ?>
                              <option value="<?php echo $value['district']; ?>"><?php echo $value['district']; ?></option>
                              <?php } ?>
                              </select>
                                                    
                               
                                 <div class="row" style="width:0px;margin-top: -31px;">  
                                  <div class="col-md-6">

                      <input type="submit" value="Submit"style="margin-top: -28px;width: 80px;margin-left: 420px;height: 30px;">
                                </div>

                    </div><br> 


                    <div id="customerData">
        <!-- The filtered customer data will be appended here -->
       </div>
           <button type="button" class="btn btn-success" id="exportto_goto" style="display: none;">Export to Excel</button> 
                     </div>   </div>


           </div>
                    
                     </form>

   
                  
                 
                </div>
                <!-- /.card-body -->
        
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->

        <!-- /.content -->
      </div>
    </div>
  </div>
 
  <?php include('footer.php'); ?>
  <!-- jQuery -->

        <script>
        var districts;
        $(document).ready(function() {
        $('#filterForm').submit(function(e) {
        e.preventDefault();
        districts = $('#districts').val();
        var formData = $(this).serialize();
        $.ajax({
        url: '<?php echo base_url('admin/get_femalecount_gotonikah'); ?>',
        method: 'post',
        data: formData,
        dataType: 'html',
        success: function(data) {
        $('#customerData').html(data);
        $("#exportto_goto").show();
        }
        });
        });
        
        $('#exportto_goto').click(function() {
        districts = $('#districts').val();
        $.ajax({
        type: 'POST',
        url: '<?= base_url() ?>admin/exportToExcel_gotonikah', // Check this URL path
        data: {
        districts:districts
        },
        success: function(response) 
        {
        if (response.success) 
        {         
        
        var cacheBuster = new Date().getTime();
        var downloadUrl = '<?= base_url() ?>upload/female_list_goto.xlsx?cb=' + cacheBuster;
        window.location.href = downloadUrl;
        
        } 
        else 
        {
        
        var cacheBuster = new Date().getTime();
        var downloadUrl = '<?= base_url() ?>upload/female_list_goto.xlsx?cb=' + cacheBuster;
        window.location.href = downloadUrl;
        
        }
        },
        error: function(error)
        {
        alert('Error exporting Excel file');
        }
        });
        });
        
        });
        
        </script>
        
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/script.js/2.0.2/script.min.js"></script>
    
  </body>

  </html>