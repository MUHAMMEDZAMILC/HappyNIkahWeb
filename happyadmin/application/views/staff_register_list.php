<!DOCTYPE html>
<?php include('header.php');
if($_SESSION['user_type']==='17')
{
include('menustaff.php');  
}

if($_SESSION['user_type']==='0')
{
include('menudirect.php');	
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
                            

                                     
                          <!--<label> Amount</label>-->
                  
                            </div>
                               </div>
          
                            <div class="app-card-body" style="margin-top: 45px;">
                                <div class="table-responsive">
                                    <table id="example" class="table app-table-hover mb-0 text-left">
                                        <!--<button class="btn btn-secondary" style="margin-left:10px;margin-top:10px;" >Back</button>-->
                    <thead>
                      <tr>
                        <th class="cell">Sl No</th>
                        <th class="cell">HN ID</th>
                        <th class="cell">Name</th>
                         <th class="cell">Place</th>
                         <th class="cell">Date</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $i = 1;
                      $ydate=date('2023-07-26');
                      $where=array('status!='=>'3','reg_through='=>'1');
                      $targetdata=$this->db->select('*')->from('tbl_registration')->where('direct','32')->where('assign_status!=','Inactive')->where('status!=','3')
                                 ->get()->result_array();
                      foreach ($targetdata as $value){ ?>
                        <tr>
                          <td class="cell"><?php echo $i; ?></td>
                          <td class="cell"><?php echo $value['happynikah_id']; ?></td>
                          <td class="cell"><?php echo $value['name'];?></td>
                          <td class="cell"><?php echo $value['native_place'];?></td>
                          <td class="cell"><?php echo $value['reg_date'];?></td>
                        </tr>
                      <?php
                        $i++;
                      } ?>
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

   <link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css' rel='stylesheet'>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" >
    </script>
      
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" >
    </script>

     <script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
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