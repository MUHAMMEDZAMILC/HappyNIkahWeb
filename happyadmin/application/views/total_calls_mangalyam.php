<!DOCTYPE html>
<?php include('header.php');
if($_SESSION['user_type']==='0' &&  $_SESSION['nikah_type']=='happymangalyam')
{
include('happymangalyam_sales_super.php'); 
}

?>

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
<!-- DataTables -->

<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

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
                             </div>
          
                            <div class="app-card-body" style="padding-bottom: 50px;">
                             
                                  <div class="row" style="margin-left:20px;margin-top:31px;">

                                      <form id="filterForm">
                   
                
                                 Start Date<input type="date" id="fromDate" name="from_date" required style="margin-left:10px;width:20%;">
                                 &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                                 End Date <input type="date" name="to_date"  id="toDate" required style="margin-left:10px;width:20%;">
                    
                    
                        
                        <div class="row">  
                        
                        <div class="col-md-6">  
                        <br/>    
                        
                        <br/>   
                        
                        <label style="margin-left: 3px;margin-bottom: 10px;">Staff List</label>
                        
                        <?php $targetdata2 =  $this->db->select('*')->from('tbl_users1')->where('user_id !=', 9)->where('user_type', 3)->get()->result_array();?>
                        
                        <select class="form-control"  id="customerSelect" name="customer_id" 
                        style="padding-bottom: 4px;margin-left: 77px;width: 35%;margin-top: -40px;" required>
                        
                        
                        <option value="" selected disabled>Please Select Staff</option> 
                        <?php foreach($targetdata2 as $value){ ?>
                        <option value="<?php echo $value['user_id']; ?>"><?php echo $value['user_name']; ?></option>
                        <?php } ?>
                        </select>
                        
                        
                        
                        <div class="row" style="width:0px;margin-top:-31px;">  
                        <div class="col-md-6">
                        
                        <input type="submit" value="Submit"style="margin-top: -28px;width: 80px;margin-left: 300px;height: 30px;">
                        </div>
                        
                        </div>
                        </div>   
                        </div>
                        
                        </div>
                        
                        </form>
                        
                        <div id="customerData">
                        <!-- The filtered customer data will be appended here -->
                        </div>
                        
                        
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
            
            
            <script>
            $(document).ready(function() {
            $('#filterForm').submit(function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
            url: '<?php echo base_url('admin/getCustomerData_mangalyam'); ?>',
            method: 'post',
            data: formData,
            dataType: 'html',
            success: function(data) 
            {
            $('#customerData').html(data);
            }
            });
            });
            });
            </script>
            
            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
            <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js" defer></script>
            
            </body>
            
            </html>