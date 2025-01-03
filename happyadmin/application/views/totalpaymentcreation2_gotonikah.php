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
                  <li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/dashboard">Home</a></li>
                  <li class="breadcrumb-item active"><?= $page ?></li>
                </ol>
                
                 <h4 style="margin-top: 63px;
              float: right;">Filtered Amount: ₹<?php echo isset($filteredtotal->famount) ? 
              $filteredtotal->famount : 0; ?></h4>
              
              
              </div>
            </div>
          </div><!-- /.container-fluid -->
          
                <!--<h2 style="margin-left: 807px;font-size: 25px;">Total Sales Amount: <?php echo $total_amount; ?></h2>-->
        </section>



 
        <!-- Main content -->
      <div class="tab-content" id="orders-table-tab-content">
                    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                        <div class="app-card app-card-orders-table shadow-sm mb-5">
                            <div class="app-card-body">
                                <div class="table-responsive">
                                
                             <h5 style="margin-left: 880px;margin-top: 30px;"></h5>
                                    <table id="example" class="table app-table-hover mb-0 text-left">
                                        
                                        
                                        <!--<button class="btn btn-secondary" style="margin-left:10px;margin-top:10px;" >Back</button>-->
                                        
                        <div class="container">
                        <div class="row" style="margin-top: 36px;margin-left: 5px;">
                        <div class="col-md-6">
                        
                     
                   
                   
                     <a href="<?php echo base_url();?>admin/totalpaymentcreation_gotonikah" class="btn btn-primary" style="margin-left: 690px;margin-top: -49px;width: 135px;;">Total Sale</a> 
                        </div>
                        </div>
                        </div>   
                  
                    <thead>
                    <tr>
                    <!--<th class="cell">Sl No</th>-->
                    <th class="cell">GN ID</th>
                    <th class="cell">Name</th>
                    
                    <th class="cell">Mobile</th>
                    <th class="cell">Payment Date</th>
                    <th class="cell">Plan</th>
                    <th class="cell">Amount</th>
                    <th class="cell">Add Contact</th>
                    <th class="cell">Status</th>
                    </tr>
                    </thead>
                    
                    
                    <tbody>
                    <?php
                    $i = 1;
                    foreach ($result as $value) 
                    { ?>
                    <tr>
                    <!--<td class="cell"><?php echo $i; ?></td>-->
                    <td class="cell"><?php echo $value->happynikah_id; ?></td>
                    <td class="cell"><?php echo $value->name; ?></td>
                    <td class="cell"><?php echo $value->phone; ?></td>
                    <td class="cell">
                    
                  <?php if (!empty($value->ctime)): ?>
                    <?php $dateString =$value->ctime;?>
                    
                    <?php $date = new DateTime($dateString);
                    $formattedDate = $date->format('d-m-Y H:i:s');
                    
                    echo $formattedDate;?>
                    
                    <?php endif; ?>
                    
                    </td>
                    <td class="cell"><?php echo $value->dt; ?></td>
                    <td class="cell">
                    
                    <?php if($value->paystatus=='Add Contacts')
                    {?>
                    <?php echo "0";?>
                    <?php }?>
                    
                    <?php if($value->paystatus!='Add Contacts')
                    {?>
                    <?php echo $value->final_amount;?>
                    <?php }?>
                    
                    </td>
                    
                    <td class="cell">
                    <?php echo $value->addoncontact;?>    
                    </td>
                    
                    <td class="cell">
                    
                    
                    <?php echo $value->paystatus; ?>
                    
                    </td>
                    
                    </tr>
                    <?php
                    $i++;
                    } 
                    ?>
                    </tbody>
                    </table>
                    
                    
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

        <!-- /.content -->
      </div>
    </div>
  </div>
  <?php include('footer.php'); ?>
  <!-- jQuery -->

  <!-- Bootstrap 4 -->
  <script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables  & Plugins -->
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
  <!-- AdminLTE App -->

  <!-- AdminLTE for demo purposes -->

  <!-- Page specific script -->
  <script>
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
  </body>

  </html>