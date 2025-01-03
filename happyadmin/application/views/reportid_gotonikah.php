<!DOCTYPE html>
<?php include('header.php'); ?>

<?php 
if($_SESSION['user_type']==='6')
{
include('menusupport_gotonikah.php');	   
}

if($_SESSION['user_type']==='0')
{
include('gotonikah_sales_super.php');   
}
?>

<style type="text/css">
    #ss{
    width: 100px;
    margin-bottom: 8px;
    color: white;
    background-color: #767e88;
}
</style>

<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/custom.css">

        <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
        
        <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            
         <h6 style="color:darkgrey;">Report's ID</h1>
        
        </div>
        
          <div class="tab-content" id="orders-table-tab-content">
              <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
              <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body">
                 <div class="table-responsive">
                     
                     <h3 style="margin-left: 30px;margin-bottom: 35px;margin-top: 20px;">Report Id's</h3>
                     
                      <table id="example" class="table app-table-hover mb-0 text-left" style="width:100%">
                          <thead>
                              <tr>
                                  <th>S.No</th>
                                  <th style="width:45px;">GN ID</th>
                                  <th>Name</th>
                                  <th>Blocked User ID</th>
                                  <th>Reason</th>
                                  <th style="width:50px;">Complaint</th>
                                  <th>DateTime</th>
                                  <th>Actions</th>
                              </tr>
                          </thead>
                     
                        <?php
                        $this->db->select('tr_sender.happynikah_id as sender_happynikah_id, tr_sender.name as sender_name, tr_receiver.happynikah_id as receiver_happynikah_id, 
                        tr_receiver.name as receiver_name,tr_sender.goto_nikah,tr_sender.hmangalyam,tr_receiver.goto_nikah,tr_receiver.hmangalyam, tb.sender_id, tb.receiver_id, 
                        tb.reason, tb.complaint, tb.date,tb.interest_id');
                        $this->db->from('tbl_block as tb');
                        $this->db->join('tbl_registration as tr_sender', 'tr_sender.id = tb.sender_id', 'inner');
                        $this->db->join('tbl_registration as tr_receiver', 'tr_receiver.id = tb.receiver_id', 'inner');
                        $this->db->where('tr_sender.status!=', '3');
                        $this->db->where('tr_receiver.status!=', '3');
                        $this->db->where('tr_sender.goto_nikah', '1');
                        $this->db->where('tr_sender.hmangalyam', '0');
                        $this->db->where('tr_receiver.goto_nikah', '1');
                        $this->db->where('tr_receiver.hmangalyam', '0');
                        
                        $this->db->where('tb.delete_status !=', 'Inactive');
                        
                        $this->db->order_by('tb.date', 'DESC');
                        $block_profile = $this->db->get()->result_array();
                        ?>

                    <tbody>    
                    
                        <?php
                        $i = 1;
                        foreach ($block_profile as $value){
                        ?> 
                        <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $value['sender_happynikah_id'];?></td>
                        <td><?php echo $value['sender_name'];?></td>
                        <td><?php echo $value['receiver_happynikah_id'];?></td>
                        <td><?php echo $value['reason'];?></td>
                        <td><?php echo $value['complaint'];?></td> 
                        <td>
                        <?php $convertedDateTime= $value['date']; ?>
                        
                        <?php $convertedDateTime2 = date('d-m-Y H:i:s', strtotime($convertedDateTime));?>
                        <?php  echo $convertedDateTime2;?>

                                          </td>
                                      <td colspan="2">                                    
                                       <a class="btn btn-warning" id="ss" data-interest-id="<?php echo $value['interest_id']; ?>" data-sender-id="<?php echo $value['sender_happynikah_id']; ?>"  
                                       data-replace="Solved">Solved</a>
                                        <br>
                     <form method="post" action="<?= base_url() ?>admin/search_profiles">
                      <input type="hidden" id="inputName" class="form-control" name="search_profile"  value="<?php echo $value['sender_happynikah_id'] ?>"  required>    
                        <button type="submit" name="search_profile_btn" class="badge bg-success" id="search_button" 
                        style="color:white;border: 0px transparent;width: 100px;padding: 13px;">View Profile
                         </button>
                         </form>
                         <!-- <form method="post" action="<?= base_url() ?>admin/block_delete">
                         <input type="hidden" id="inputName" class="form-control" name="search_profile"  value="<?php echo $value['sender_happynikah_id'] ?>"  required>    
                          <button type="submit" name="delete_btn" class="badge bg-danger" id="delete_btn" 
                          style="color:white;border: 0px transparent;width: 100px;padding: 10px;margin-top: 10px;">Delete
                         </button>
                         </form>  -->

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

                  <div class="modal fade" id="solve_profile" tabindex="-1" role="dialog" aria-labelledby="solvedprofile ModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="solvedprofileModalLabel">Success!</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p>Resovled the problem..........!</p>
                            <input type="hidden" name="interest_id" id="interest_id" value="">
                            <input type="hidden" value="" id="user_id" name="user_id">
                            <input type="hidden" value="<?php echo $this->session->userdata('user_id_admin');?>" id="session" name="session"> 
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="solvedbtn">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
       
                </div>
        <!-- /.content-wrapper -->
        
        </div>
        </div>
        </div>
        
        
        <?php include('footer.php'); ?>
        
    <link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css' rel='stylesheet'>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" >
    </script>
      
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" >
    </script>	   
    <script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js">
			
	</script>
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
		
		
        <script type="text/javascript">
        
        $(document).ready(function () 
        {
        $('.btn-warning').click(function () 
        {
        var interestId = $(this).data('interest-id');
        var senderId = $(this).data('sender-id');
        $('#user_id').val(senderId);
        $('#interest_id').val(interestId);
        $('#user_id').val(senderId);
        $('#solve_profile').modal('show');
        solved_profiles();
        });
        });
        </script>

        <script type="text/javascript">
        $(document).ready(function() 
        {
        $('#example').DataTable();
        });

        function solved_profiles()
        {
        var url = '<?php echo base_url() ?>'  
        var interest_id=$('#interest_id').val();
        console.log(interest_id);
        var sender_id = $('#user_id').val();
        console.log(sender_id);
        var emp_id= $('#session').val();
        console.log(emp_id);
        $('#solvedbtn').click(function() 
        {
        
        $('#solve_profile').modal('hide');
        setTimeout(function(){
        location.reload(); 
        }, 1000);
        $.ajax({
        dataType: 'json',
        type: 'POST',
        url: url + 'admin/solved_profile',
        data: {
        sender_id: sender_id,
        emp_id: emp_id,
        interest_id:interest_id 
        },
        
        success: function(result6) 
        {
        
        },
        
        });
        });
        }
        </script>

</html>