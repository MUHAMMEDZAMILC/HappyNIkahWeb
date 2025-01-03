<!DOCTYPE html>
<?php include('header.php');
if($_SESSION['user_type']==='0')
{
include('menu.php');	
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
                             </div>
          
                            <div class="app-card-body">
                              <div class="row">  
                               <div class="col-md-6">  
                              <br/>     
                              <br/> 
                              <form action="<?php echo base_url('admin/total_postponeall'); ?>" method="post" style="margin-bottom: -29px;margin-left: 140px;">  
                             <label style="margin-left: 3px;margin-bottom: 10px;">Staff List</label>
                             
                            
                              
                    <?php $targetdata2 = $this->db->select('*')->from('tbl_users1')->where('user_id !=', 9)->where('user_type', 3)->get()->result_array();?>
                        
                        <select class="form-control"  id="emp_id" name="emp_id" style="padding-bottom: 4px;margin-left: 77px;width: 40%;margin-top: -40px;" required>
                        <option value="" selected disabled>Please Select Staff</option> 
                        <?php foreach($targetdata2 as $value){ ?>
                        <option value="<?php echo $value['user_id']; ?>"><?php echo $value['user_name']; ?></option>
                        <?php } ?>
                        </select>
								
								
                        
                        
                               <div class="row" style="width:0px;margin-top: -31px;">  
                                  <div class="col-md-6">
                                 <input type="submit" value="Submit" name="submit" id="submit" style="margin-top: -28px;width: 80px;margin-left: 300px;height: 30px;">
                                </div>
                                 </div>
                              </form>
                                </div>   
                              </div><br><br>
                              <div class="table-responsive">
                             <table id="example" class="table app-table-hover mb-0 text-left">
                              <thead>
                               <tr>
                                <th class="cell">Sl No</th>
                                <th class="cell">HN ID</th>
                                <th class="cell">Name</th>
                                <th class="cell">Postpone Date</th>
                                <th class="cell">Message</th>
                                <th class="cell">Staff Name </th>
                               </tr>
                              </thead>
                           
                            <tbody>
                            <?php
                            $i = 1;
                            foreach ($que as $value)
                            { ?>
                            <tr>
                            <td class="cell"><?php echo $i; ?></td>
                            <td class="cell"><?php echo $value['happynikah_id']; ?></td>
                            <td class="cell"><?php echo $value['name']; ?></td>
                            <td class="cell"><?php echo $value['postpone_date'];?></td>
                            <td class="cell"><?php echo $value['message'];?></td>
                            <td class="cell"><?php echo $value['user_name'];?></td>
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
  <script type="text/javascript">
   
   function totalpostpone(){
    var url = '<?php echo base_url() ?>'
     $("#submit").click(function(){
     var emp_id= $('#emp_id').val();
     console.log(emp_id);
     $.ajax({
    dataType: 'text',
    type: 'POST',
    url: url + 'admin/total_postponeall',
    data: {
    emp_id: emp_id    
    },
    success: function(result2) {
    },
    })
    });
   }
</script>

  </body>

  </html>