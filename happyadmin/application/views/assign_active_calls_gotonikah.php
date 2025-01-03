<!DOCTYPE html>
<?php include('header.php');
if($_SESSION['user_type']==='0' &&  $_SESSION['nikah_type']=='gotonikah')
{
include('gotonikah_sales_super.php');	
}

?>

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
<!-- DataTables -->


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
          
          
          <form action="<?php echo base_url();?>admin/assign_active_calls_form_gotonikah"  method="post">
                    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                        <div class="app-card app-card-orders-table shadow-sm mb-5">
                             <div class="row">
                                 
                                  <div class="col-md-6">
                            
                          

                      
                        <br/>
                        <br/>
                        
                           <label style="margin-left: 280px;margin-bottom: -20px;">Assign to</label>
                           
                        <?php $allstaff= $this->db->select('*')->from('tbl_users1')->where('user_id !=', 9)->where('user_type', 3)->get()->result_array();?>
                               
                        <select class="form-control" id="assign_id" name="assign_id" required  style="padding-bottom: 4px;margin-left: 360px;margin-top: -22px;width: 50%;">
                   
                        <option value="" selected disabled>Please Select Staff</option> 
                        
                                         
                        <?php foreach ($allstaff as $row_staff) { ?>
                        <option value="<?= $row_staff['user_id'] ?>"><?= $row_staff['user_name'] ?></option>
                        <?php } ?>
                        
                        </select>
								
                      
              <!--<label> Amount</label>-->
          
        <input type="submit" id="save-project-btn3" name="submit" class="btn btn-primary" style="margin-left: 670px;margin-top:-66px;">   
        
        
            <?php $todaydate=date('Y-m-d');?> 
            <?php $todayassigned = $this->db->select('*')->from('tbl_assign_active_calls')->where('goto_status',1)->where('date',$todaydate)->get()->num_rows();?>
            <button type="button" class="btn btn-danger" style="margin-top: -114px;margin-left: 849px;width: 35%;">Today Assigned &nbsp;<?php echo $todayassigned;?></button>    
                
           
          </div>
        </div>
                             
                    
                    <br/><br/>
                    
                    
        
            <div class="row" style="margin-left: 20px;margin-bottom: 20px;">
            <?php
            $staffList = $this->db->select('*')->from('tbl_users1')->where('user_id !=', 9)->where('user_type', 3)->get()->result_array();
            
            $count = 0; 
            
            foreach ($staffList as $staff) 
            {
            $assignId = $staff['user_id'];
            
            $total = $this->db->select('*')
            ->from('tbl_assign_active_calls')
            ->where('active_status!=', 'Inactive')
            ->where('goto_status', '1')
            ->where('assign_id', $assignId)
            ->get()->num_rows();
            ?>
            
            <div class="col-12 col-sm-6 col-md-3">
            <button type="button" class="btn btn-secondary">
            <?php echo $staff['user_name']; ?>
            <?php echo $total; ?>
            </button>
            </div>
            
            <?php
            $count++;
            if($count % 4 == 0) 
            {
            echo '</div><div class="row" style="margin-left: 20px;margin-bottom: 20px;">';
            }
            ?>
            <?php } ?>
            
            
            <br/> 
            
            <div class="app-card-body" style="margin-top: 50px;">
            <div class="table-responsive">
                
            <table id="example" class="display dataTable">
            <thead>
            <tr>
            
            <th class="">Sl No</th>
            <th class="">GN ID</th>
            <th class="">Name</th>
            <th class="">Reg Date</th>
            <th class="">Place</th>
            <th class="">Action </th>
            </tr>
            </thead>
            <tbody>
                
            </tbody>
            </table>
            
             </div>

            
            <script>
            $(document).ready(function() {
            var userDataTable = $('#example').DataTable({
            'processing': true,
            'serverSide': true,
            'serverMethod': 'post',
            'ajax': {
            'url': '<?= base_url() ?>admin/getFilter_assign_activecallsData_gotonikah',
            'data': function(data) {
            data.searchCity = $('#user_id').val();
            // data.searchName = $('#searchName').val();
            
            }
            },
            'columns': [
            
            { // Add a new column for auto-increment ID
            data: null,
            render: function(data, type, row, meta) {
            var currentPage = userDataTable.page.info().page;
            var index = meta.row + 1 + currentPage * userDataTable.page.info().length;
            return index;
            }
            },
            
            { data: 'happynikah_id' },
            { data: 'name' },
            { data: 'reg_date',
            
            render: function(data, type, row) 
            {
         
            var date = new Date(data);
            var day = date.getDate();
            var month = date.getMonth() + 1; 
            var year = date.getFullYear();
            return day + '-' + month + '-' + year;
            }
            },
        
        
            { data: 'native_place' },
            
            { // Add a new column for checkboxes
            data: 'cid',
            render: function(data, type, row) {
            return '<input type="checkbox" name="action_check[]"  id="action_check" value="' + row.cid + '">';
            }
            }
            ]
            });
            
            $('#user_id').change(function() {
            userDataTable.draw();
            });
            
            });
            
            </script>

            </form>
                
                
        
        <!-- /.card-body -->
        </div>
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
        
        <link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
        
        <!-- jQuery Library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        
        <!-- Datatable JS -->
        <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        
        
        
        
        <!-- AdminLTE App -->
        
        <!-- AdminLTE for demo purposes -->
        
        <!-- Page specific script -->
        
        </body>
        
        </html>