<!DOCTYPE html>
<?php include('header.php'); ?>
<?php include('menu.php'); ?>

<div class="app-wrapper">

	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">

			<div class="row g-3 mb-4 align-items-center justify-content-between">
				<div class="col-auto">
					<h1 class="app-page-title mb-0">Photo Approvel</h1>
				</div>
				<div class="">
					<select class="col-md-auto">
						<option value="">Photo 1</option>
						<option value="">photo 2</option>
						<option value="">photo 3</option>
					</select>
				</div>
				<div class="col-auto">
					<div class="page-utilities">
						<div class="row g-2 justify-content-start justify-content-md-end align-items-center">
							<div class="col-auto">
								<form class="table-search-form row gx-1 align-items-center">
									<div class="col-auto">
										<input type="text" id="search-orders" name="searchorders" class="form-control search-orders" placeholder="Search">
									</div>
									<div class="col-auto">
										<button type="submit" class="btn app-btn-secondary">Search</button>
									</div>
								</form>

							</div>
							<div class="col-auto">

								<select class="form-select w-auto">
									<option selected value="option-1">All</option>
									<option value="option-2">This week</option>
									<option value="option-3">This month</option>
									<option value="option-4">Last 3 months</option>

								</select>
							</div>
							<div class="col-auto">
								<a class="btn app-btn-secondary" href="#">
									<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
										<path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
									</svg>
									Download CSV
								</a>
							</div>
						</div>

					</div>
					
				</div>
				
			</div>
 		<!--//row-->


			<!-- <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
				    <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-bs-toggle="tab" href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true">All</a>
				    <a class="flex-sm-fill text-sm-center nav-link"  id="orders-paid-tab" data-bs-toggle="tab" href="#orders-paid" role="tab" aria-controls="orders-paid" aria-selected="false">Paid</a>
				    <a class="flex-sm-fill text-sm-center nav-link" id="orders-pending-tab" data-bs-toggle="tab" href="#orders-pending" role="tab" aria-controls="orders-pending" aria-selected="false">Pending</a>
				    <a class="flex-sm-fill text-sm-center nav-link" id="orders-cancelled-tab" data-bs-toggle="tab" href="#orders-cancelled" role="tab" aria-controls="orders-cancelled" aria-selected="false">Cancelled</a>
				</nav> -->


                            <div class="tab-content" id="orders-table-tab-content">
                            <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                            <div class="app-card app-card-orders-table shadow-sm mb-5">
                            <div class="app-card-body">
                            <div class="table-responsive">
                            <table id="example" class="table app-table-hover mb-0 text-left">
                            <thead>
                            <tr>
                            <th class="cell">Sl No.</th>
                            <th class="cell">Image</th>
                            <th class="cell">Profile ID</th>
                            <th class="cell">Name</th>
                            <th class="cell">View</th>
                            <th class="cell">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                
                                
                            <?php
                            $i = 1;
                            
                            for($j=0; $j< count($photo); $j++) 
                            
                            { 
                            
                            foreach ($photo as $key => $value)
                            {
                            
                            $profile = $this->db->select('happynikah_id,name')->from('tbl_registration1')->where('id', $value->user_id)->get()->row_array();
                            
                            ?>
                            <tr>
                            <td class="cell"><?php echo $i; ?>
                            </td>
                            
                            <td class="cell"> 
                            
                            <img src="https://happynikah.azurewebsites.net/api/Files/photo_storage/?filePath=<?php echo $val->user_image; ?>" style="width:50px;">
                            
                            
                            </td>
                            
                            <td class="cell"> <?php echo $profile['happynikah_id']; ?> </td>
                            <td class="cell"><span> <?php echo $profile['name']; ?> </span>
                            
                            </td>
                            
                            <td class="cell">
                                
                            <a target="_blank" href="https://happynikah.azurewebsites.net/api/Files/photo_storage/?filePath=<?php echo $val->user_image; ?>" class="btn btn-warning btn-sm" 
                            
                            
                            style="color:white;">View Large Photo
                            </a>
                            
                            </td>
                            
                            <td class="cell">
                            <button type="button" class="btn btn-danger btn-sm preimage" style="color:white;" data-id="<?php echo $val->user_image_id; ?>">Approve Photo</button>
                            <button type="button" class="btn btn-danger btn-sm delete" style="color:white;" data-id="<?php echo $val->user_image_id; ?>">Delete Photo</button></td>
                            </tr>
                            <?php
                            /*if ($i == 20) {
                            break;
                            }*/
                            $i++;
                            }
                            } 
                            ?>
                            
                            
                            
                            </tbody>
                            </table>
                            </div>
                            <!--//table-responsive-->
                            
                            </div>
                            <!--//app-card-body-->
                            </div>
                            
                            
					<!--//app-card-->
					<!-- <nav class="app-pagination">
						<ul class="pagination justify-content-center">
							<li class="page-item disabled">
								<a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
							</li>
							<li class="page-item active"><a class="page-link" href="#">1</a></li>
							<li class="page-item"><a class="page-link" href="#">2</a></li>
							<li class="page-item"><a class="page-link" href="#">3</a></li>
							<li class="page-item">
								<a class="page-link" href="#">Next</a>
							</li>
						</ul>
					</nav> -->
					<!--//app-pagination-->

				</div>
				<!--//tab-pane-->





			</div>
			<!--//tab-content-->



		</div>
		<!--//container-fluid-->
	</div>
	<!--//app-content-->
  <!-- modals start -->
  <?php
  
  foreach($photo as $val){
  	 //echo $photo; 
  	?>
  <div class="modal fade" id="<?php echo $val->user_image_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
           <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" action="<?= base_url()?>admin/delete_photo">
          <div class="form-group">
            
            <div class="col-lg-3"><label for="inputName">Comment: <font color="red">*</font></label></div>
            
            <div class="col-lg-6">
              <textarea name="delete_comment" id="delete_comment" rows="4" cols="50" class="form-control"style="padding-top:unset;" required></textarea>
            </div>
            
          </div>
          
        </div>
        <div class="modal-footer">
         
          <input type="hidden" name="user_image_id" value="">
          <button type="submit" name="delete_photo" class="btn btn-danger">Delete</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Bootstrap modal -->
<div class="modal fade" id="modal_form_<?php echo $val->user_image_id; ?>" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">PREVIEW</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="user_image_id"/> 
                    <div class="form-body">
                        <div class="form-group" id="photo-preview">
                            <div class="col-md-9">
                                
                             
                                
                                <img src="https://happynikah.azurewebsites.net/api/Files/photo_storage/?filePath=<?php echo $val->user_image; ?>" style="width:150px;height:150px;">
                                
                             
                                
                                <span class="help-block"></span>
                            </div>
                        </div>
                  </div>
                </form>
            </div>
            <div class="modal-footer">
               <a onclick="approve_photo('<?= $val->user_image_id?>')"><button class="btn btn-success btn-sm" style="color:white;">Approve Photo</button></a> 
                <button type="button" id="btncrop" class="btn btn-danger btn-sm" style="color:white;">Crop</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
<?php }?>
 
<?php include('footer.php'); ?>
<!-- jQuery -->
<script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="<?php echo base_url() ?>assets/dist/js/jquery.bpopup.min.js"></script>
<script src="<?php echo base_url() ?>assets/cropimage/croppie.min.js"></script>
<script src="<?php echo base_url() ?>assets/cropimage/jquery.bpopup.min.js"></script>

<script type="text/javascript">
$(document).ready(function () {
    $('#example').DataTable({
        pagingType: 'simple_numbers',
        lengthChange: false,
        ordering: false,
    });

});	
</script>
<script type="text/javascript">
  $(document).ready(function () { 
   $('.delete').on('click', function() {
        var id = $(this).data('id');
        console.log(id);
        $('[name=user_image_id]').val(id);

      $('#'+id).modal('show');
    });
   $('.preimage').on('click', function() {
        var id = $(this).data('id');
        console.log(id);
        $('[name=user_image_id]').val(id);

      $('#modal_form_'+id).modal('show');
    });

 });

  var url = '<?php echo base_url()?>'
  function approve_photo(img_id)
  {
    var approve = confirm('Confirm Photo Approval');
    if(approve)
    {
      $.ajax({
        dataType: 'json',
        type: 'POST',
        url: url+'admin/approve_photo',
        data: {img_id:img_id},
        success: function (data) { 
            location.reload();
        },
      })
    }
    
  }

</script>

</html>