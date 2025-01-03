<!DOCTYPE html>
<?php include('header.php');
if($_SESSION['user_type']==='4')
{
include('menucreation.php');	
}

if($_SESSION['user_type']==='13')
{
include('menusuperadmin.php');
}

$user_id=$this->session->userdata('user_id_admin');
if($user_id=='26')
{
include('menusales.php');     
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
                            <div class="app-card-body">
                                <div class="table-responsive">
                                

                                
                                <table id="example" class="table app-table-hover mb-0 text-left">
                        <!--<button class="btn btn-secondary" style="margin-left:10px;margin-top:10px;" >Back</button>-->
                        <thead>
                        <tr>
                        <th class="cell">Sl No</th>
                        <th class="cell">Staff Name</th>
                        <th class="cell">Target Amount</th>
                        <th class="cell">Acheived Amount</th>
                        <!--    <th class="cell">Acheived </th>-->
                        <th class="cell">Balance </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 1;
                        
                        $targetdata=$this->db->select('tbl_target.user_id,tbl_target.sale_amount,tbl_target.target_amount,tbl_users1.emp_id,tbl_users1.user_name')->from('tbl_target')->join('tbl_users1','tbl_users1.emp_id=tbl_target.user_id')->get()->result_array();
                        foreach ($targetdata as $value) { ?>
                        <tr>
                        <td class="cell"><?php echo $i; ?></td>
                        <td class="cell"><?php echo $value['user_name']; ?></td>
                        <td class="cell"><?php echo $value['target_amount'];?></td>
                        <td class="cell">
                        
                        
                        <?php $this->db->select('SUM(final_amount) as famount');
                        $this->db->from('tbl_payement');
                        $this->db->where('tbl_payement.status',1);
                        $this->db->where('tbl_payement.payment_staff_id','23');
                        $query3 = $this->db->get();
                        $final = $query3->row();
                        $totalAmount3 = $final->famount; ?> 
                        
                        <?php if($value['user_id']=='5029')
                        {?>
                        <?php echo $totalAmount3;?>
                        <?php }?> 
                        
                        
                        <?php $this->db->select('SUM(final_amount) as famount');
                        $this->db->from('tbl_payement');
                        $this->db->where('tbl_payement.status',1);
                        $this->db->where('tbl_payement.payment_staff_id','16');
                        $query4 = $this->db->get();
                        $final = $query4->row();
                        $totalAmount4 = $final->famount; ?> 
                        
                        <?php if($value['user_id']=='5021')
                        {?>
                        <?php echo $totalAmount4;?>
                        <?php }?> 
                        
                        
                        <?php $this->db->select('SUM(final_amount) as famount');
                        $this->db->from('tbl_payement');
                        $this->db->where('tbl_payement.status',1);
                        $this->db->where('tbl_payement.payment_staff_id','27');
                        $query5 = $this->db->get();
                        $final = $query5->row();
                        $totalAmount5 = $final->famount; ?> 
                        
                        <?php if($value['user_id']=='5028')
                        {?>
                        <?php echo $totalAmount5;?>
                        <?php }?> 
                        
                        
                        <?php $this->db->select('SUM(final_amount) as famount');
                        $this->db->from('tbl_payement');
                        $this->db->where('tbl_payement.status',1);
                        $this->db->where('tbl_payement.payment_staff_id','8');
                        $query6 = $this->db->get();
                        $final = $query6->row();
                        $totalAmount6 = $final->famount; ?> 
                        
                        <?php if($value['user_id']=='5011')
                        {?>
                        <?php echo $totalAmount6;?>
                        <?php }?> 
                        
                        
                        <?php $this->db->select('SUM(final_amount) as famount');
                        $this->db->from('tbl_payement');
                        $this->db->where('tbl_payement.status',1);
                        $this->db->where('tbl_payement.payment_staff_id','19');
                        $query7 = $this->db->get();
                        $final = $query7->row();
                        $totalAmount7 = $final->famount; ?> 
                        
                        <?php if($value['user_id']=='5031')
                        {?>
                        <?php echo $totalAmount7;?>
                        <?php }?> 
                        
                        
                        <?php $this->db->select('SUM(final_amount) as famount');
                        $this->db->from('tbl_payement');
                        $this->db->where('tbl_payement.status',1);
                        $this->db->where('tbl_payement.payment_staff_id','15');
                        $query8 = $this->db->get();
                        $final = $query8->row();
                        $totalAmount8 = $final->famount; ?> 
                        
                        <?php if($value['user_id']=='5026')
                        {?>
                        <?php echo $totalAmount8;?>
                        <?php }?> 
                        
                        
                        <?php $this->db->select('SUM(final_amount) as famount');
                        $this->db->from('tbl_payement');
                        $this->db->where('tbl_payement.status',1);
                        $this->db->where('tbl_payement.payment_staff_id','18');
                        $query9 = $this->db->get();
                        $final = $query9->row();
                        $totalAmount9 = $final->famount; ?> 
                        
                        <?php if($value['user_id']=='5022')
                        {?>
                        <?php echo $totalAmount9;?>
                        <?php }?> 
                        
                        <?php $this->db->select('SUM(final_amount) as famount');
                        $this->db->from('tbl_payement');
                        $this->db->where('tbl_payement.status',1);
                        $this->db->where('tbl_payement.payment_staff_id','17');
                        $query10 = $this->db->get();
                        $final = $query10->row();
                        $totalAmount10 = $final->famount; ?> 
                        
                        <?php if($value['user_id']=='5023')
                        {?>
                        <?php echo $totalAmount10;?>
                        <?php }?> 
                        
                        <?php $this->db->select('SUM(final_amount) as famount');
                        $this->db->from('tbl_payement');
                        $this->db->where('tbl_payement.status',1);
                        $this->db->where('tbl_payement.payment_staff_id','21');
                        $query11 = $this->db->get();
                        $final = $query11->row();
                        $totalAmount11 = $final->famount; ?> 
                        
                        <?php if($value['user_id']=='5030')
                        {?>
                        <?php echo $totalAmount11;?>
                        <?php }?> 
                        
                        <?php $this->db->select('SUM(final_amount) as famount');
                        $this->db->from('tbl_payement');
                        $this->db->where('tbl_payement.status',1);
                        $this->db->where('tbl_payement.payment_staff_id','22');
                        $query12 = $this->db->get();
                        $final = $query12->row();
                        $totalAmount12 = $final->famount; ?> 
                        
                        <?php if($value['user_id']=='5032')
                        {?>
                        <?php echo $totalAmount12;?>
                        <?php }?> 
                        
                        <?php $this->db->select('SUM(final_amount) as famount');
                        $this->db->from('tbl_payement');
                        $this->db->where('tbl_payement.status',1);
                        $this->db->where('tbl_payement.payment_staff_id','20');
                        $query13 = $this->db->get();
                        $final = $query13->row();
                        $totalAmount13 = $final->famount; ?> 
                        
                        <?php if($value['user_id']=='5033')
                        {?>
                        <?php echo $totalAmount13;?>
                        <?php }?> 
                        
                        <?php $this->db->select('SUM(final_amount) as famount');
                        $this->db->from('tbl_payement');
                        $this->db->where('tbl_payement.status',1);
                        $this->db->where('tbl_payement.payment_staff_id','28');
                        $query14 = $this->db->get();
                        $final = $query14->row();
                        $totalAmount14 = $final->famount; ?> 
                        
                        <?php if($value['user_id']=='8883')
                        {?>
                        <?php echo $totalAmount14;?>
                        <?php }?>
                        
                        <?php $this->db->select('SUM(final_amount) as famount');
                        $this->db->from('tbl_payement');
                        $this->db->where('tbl_payement.status',1);
                        $this->db->where('tbl_payement.payment_staff_id','29');
                        $query15 = $this->db->get();
                        $final = $query15->row();
                        $totalAmount15 = $final->famount; ?> 
                        
                        <?php if($value['user_id']=='5034')
                        {?>
                        <?php echo $totalAmount15;?>
                        <?php }?> 
                        
                        
                        <?php $this->db->select('SUM(final_amount) as famount');
                        $this->db->from('tbl_payement');
                        $this->db->where('tbl_payement.status',1);
                        $this->db->where('tbl_payement.payment_staff_id','30');
                        $query16 = $this->db->get();
                        $final = $query16->row();
                        $totalAmount16 = $final->famount; ?> 
                        
                        <?php if($value['user_id']=='5035')
                        {?>
                        <?php echo $totalAmount16;?>
                        <?php }?> 
                        
                        </td>
                        
                        <td class="cell">
                            
                            
                        <?php if($value['user_id']=='5029')
                        {?>
                        
                        <?php $amnt60=$value['target_amount'];?>
                        <?php $result11=$amnt60-$totalAmount3;?>
                        <?php echo $result11;?>
                        <?php }?> 
                        
                        <?php if($value['user_id']=='5021')
                        {?>
                         <?php $amnt62=$value['target_amount'];?>
                        <?php $result12=$amnt62-$totalAmount4;?>
                        <?php echo $result12;?>
                        <?php }?> 
                        
                         <?php if($value['user_id']=='5028')
                        {?>
                         <?php $amnt63=$value['target_amount'];?>
                        <?php $result13=$amnt63-$totalAmount5;?>
                        <?php echo $result13;?>
                        <?php }?> 
                         
                         
                         
                          <?php if($value['user_id']=='5011')
                        {?>
                         <?php $amnt65=$value['target_amount'];?>
                        <?php $result14=$amnt65-$totalAmount6;?>
                        <?php echo $result14;?>
                        <?php }?> 
                        
                          <?php if($value['user_id']=='5031')
                        {?>
                       <?php $amnt66=$value['target_amount'];?>
                        <?php $result15=$amnt66-$totalAmount7;?>
                        <?php echo $result15;?>
                        <?php }?> 
                        
                          <?php if($value['user_id']=='5026')
                        {?>
                        <?php $amnt67=$value['target_amount'];?>
                        <?php $result16=$amnt67-$totalAmount8;?>
                        <?php echo $result16;?>
                        <?php }?> 
                        
                         <?php if($value['user_id']=='5022')
                        {?>
                        <?php $amnt68=$value['target_amount'];?>
                        <?php $result17=$amnt68-$totalAmount9;?>
                        <?php echo $result17;?>
                        <?php }?>
                        
                        <?php if($value['user_id']=='5023')
                        {?>
                        <?php $amnt69=$value['target_amount'];?>
                        <?php $result18=$amnt69-$totalAmount10;?>
                        <?php echo $result18;?>
                        <?php }?>
                        
                        <?php if($value['user_id']=='5030')
                        {?>
                        <?php $amnt70=$value['target_amount'];?>
                        <?php $result19=$amnt70-$totalAmount11;?>
                        <?php echo $result19;?>
                        <?php }?>
                        
                         <?php if($value['user_id']=='5032')
                        {?>
                       <?php $amnt71=$value['target_amount'];?>
                        <?php $result20=$amnt71-$totalAmount12;?>
                        <?php echo $result20;?>
                        <?php }?>
                        
                        <?php if($value['user_id']=='5033')
                        {?>
                        <?php $amnt72=$value['target_amount'];?>
                        <?php $result21=$amnt72-$totalAmount13;?>
                        <?php echo $result21;?>
                        <?php }?>
                        
                        
                        <?php if($value['user_id']=='8883')
                        {?>
                        <?php $amnt73=$value['target_amount'];?>
                        <?php $result22=$amnt73-$totalAmount14;?>
                        <?php echo $result22;?>
                        <?php }?>
                        
                         <?php if($value['user_id']=='5034')
                        {?>
                       <?php $amnt74=$value['target_amount'];?>
                        <?php $result23=$amnt74-$totalAmount15;?>
                        <?php echo $result23;?>
                        <?php }?>
                          
                          
                        <?php if($value['user_id']=='5035')
                        {?>
                        <?php $amnt75=$value['target_amount'];?>
                        <?php $result24=$amnt75-$totalAmount16;?>
                        <?php echo $result24;?>
                        <?php }?>  
                            
                            </td>
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