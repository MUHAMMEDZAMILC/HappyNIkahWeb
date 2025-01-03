<!DOCTYPE html>
<?php include('header.php');

include('menucreation.php');

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
                        <button class="btn btn-secondary" style="margin-left: 18px;margin-top: 15px;" onclick="location.href='<?php echo base_url();?>admin/search_profiles'">Back</button><br>

                    <thead>
                      <tr>
                        <th class="cell">Sl No</th>
                        <th class="cell">HN ID</th>
                        <th class="cell">Name</th>
                     
                    <th class="cell">Mobile</th>
                    <th class="cell">Reg Date</th>
                    <th class="cell">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $i = 1;
                      foreach ($todayfollowup as $value) 
                      { ?>
                        <tr>
                          <td class="cell"><?php echo $i; ?></td>
                          <td class="cell"><?php echo $value->happynikah_id; ?></td>
                          <td class="cell"><?php echo $value->name; ?></td>
                          <td class="cell"><?php echo $value->phone; ?></td>
                          <td class="cell"><?php echo $value->reg_date; ?></td>
                          
                        
                        <td>
                        <a  class="asm"  data-id="<?php echo $value->id;?>" style="color: #fff;background-color: #28a745;border-color: #28a745;
                        cursor:pointer;display: inline-block;
                        font-weight: 400;text-align: center;
                        vertical-align: middle;border: 1px solid transparent;
                        padding: 0.375rem 0.75rem;
                        font-size: 1rem;
                        line-height: 1.5;
                        border-radius: 0.25rem;text-decoration:none;
                        transition: color 0.15s ease-in-out, 
                        background-color 0.15s ease-in-out, 
                        border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;">Enter a Message</a>
                        <button class="btn btn-primary" onclick="location.href='<?php echo base_url();?>admin/register'">Create</button>
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
  
  
               <!-- Modal for enter message -->
                <div class="modal fade" id="enterMessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                
                <h5 class="modal-title" id="exampleModalLongTitle">Enter Message
                
                <!--  <?php echo $this->session->userdata('user_id_admin');?>  -->
                
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
                
                <form id="contact" method="post" action="<?php echo base_url(); ?>admin/todayfollowup_creation_update" 
                onsubmit="setTimeout(function(){window.location.reload();},600);">
                
           
                
                   
                   
                   
        <input type="hidden" name="user_id" id="user_id">
       <input type="hidden" name="session" 
       value="<?php echo $this->session->userdata('user_id_admin');?>" id="session">
       
                
                <!--   <input type="hidden" name="update_id" id="update_id"/> -->
                
                <div class="modal-body">
                <div class="mb-3">
                <label for="inputName" class="form-label">Status</label>
                <select id="status" class="form-control custom-select" name="status">
                <option value="Interested" name="status">Interested / Follow up</option>
                <option value="Ring" name="status">Ring not respond (RNR) </option>
                <option value="busy" name="status">Busy / call back</option>
                <option value="Add comments" name="status">Add Comments</option>
                <option value="Switched" name="status">Switched off</option>
                </select>
                </div>
                
                <div class="mb-3" id="follow">
                <label for="setting-input-3" class="form-label">Follow up date</label>			
                <input type="text" id="noSunday" name="fdate">
                </div>
                
                
                <div class="mb-3" id="follow2" style="display:none">
                <label for="setting-input-3" class="form-label">Follow up date</label>		
                <input type="text" id="noSunday2" name="fdate">
                </div>
                
                <div class="mb-3">
                <label for="inputName" class="form-label">Message</label>
                <textarea id="message" class="form-control" required name="message" style="height: 160px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->session->userdata('username');?></textarea>
                
                <!--<?php echo $this->session->userdata('user_id_admin');?>-->
                
                </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit"  id="save-project-btn3"  name="register" class="btn btn-primary" style="color:#fff;">Save changes</button>
                
                </div>
                </div>
                </div>
                </form>
                </div>
                
                
                
  <?php include('footer.php'); ?>
  <!-- jQuery -->

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
        $(function()
        {
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
        
        
           $(function() 
            {
            $("a[class='asm']").click(function() 
            {
            $("#enterMessage").modal("show");
            // var eventId = $(this).data('id');
            const user_id = $(this).attr('data-id');
            const field = $('#user_id');
            field.val(user_id);
            console.log(field[0]);          
            // $('#idHolder').html( eventId );
            return false;
            });
            });
        
        	$(document).ready(function () 
			{   
			// $('body').on('change','#status', function() 
			// $('#status').change(function() {
			// {
			// $('#show_only').val(this.value==);


			// var status=$("#status").val();
			// $( "#noSunday" ).datepicker({ 
			// beforeShowDay: noSunday,
			// maxDate: "+2d",
			// minDate:0
			// });

			// function noSunday(date)
			// { 
			// var day = date.getDay(); 
			// return [(day > 0), '']; 
			// }; 

			$("#noSunday").datepicker({ 
			beforeShowDay: noSunday,
			dateFormat: 'dd-mm-yy',
			maxDate: "+2d",
			minDate:0
			});

			function noSunday(date)
			{ 
			var day = date.getDay(); 
			return [(day > 0), '']; 
			}; 

			$("#noSunday2").datepicker({ 
			beforeShowDay: noSunday2,
			 dateFormat: 'dd-mm-yy',
			 
			maxDate: "+1d",
			minDate:0
			});

			function noSunday2(date)
			{ 
			var day = date.getDay(); 
			return [(day > 0), '']; 
			}; 

			});
			
  </script>
  </body>

  </html>