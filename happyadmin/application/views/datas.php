<!DOCTYPE html>
<?php include('header.php');

include('menucreation.php');

?>


<!-- DataTables -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.css">

<div class="app-wrapper">

    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">

            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Datas</h1>
                </div>
                <div class="col-lg-2">
                    <button class="btn btn-danger">Get Data</button>
                </div>





                <div class="tab-content" id="orders-table-tab-content">
                    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                        <div class="app-card app-card-orders-table shadow-sm mb-5">
                            <div class="app-card-body">

                                <div class="table-responsive">

                                    <table id="example" class="table app-table-hover mb-0 text-left">
                                        <button class="btn btn-secondary" style="margin-left:10px;margin-top:10px;" >Back</button>
                                        <thead>
                                            <tr>
                                                <th class="cell">Name</th>

                                                <th class="cell">Phone Number</th>

                                                <th class="cell">Action</th>


                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td>adnan</td>

                                                <td>98478410396</td>

                                                <td>
                <a  class="asm" style="color: #fff;background-color: #28a745;border-color: #28a745;
            cursor:pointer;display: inline-block;text-decoration:none;
    font-weight: 400;text-align: center;font-size: 1rem;
    vertical-align: middle;border: 1px solid transparent;line-height: 1.5;
    border-radius: 0.25rem; padding: 0.375rem 0.75rem;
    transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, 
    border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;">Enter a Message</a>
                                        <button class="btn btn-primary">Create</button>
                                                </td>

                                            </tr>


                                        </tbody>
                                    </table>

                                </div>
                                <!--//app-card-body-->
                            </div>
                            <!--//app-card-->


                        </div>
                        <!--//tab-pane-->


                    </div>
                    <!--//tab-content-->

                </div>
                <!--//container-fluid-->
            </div>
            <!--//app-content-->
        </div>
    </div>





</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->




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
                
                <form id="contact" method="post" action="<?php echo base_url(); ?>admin/followup_register">
                
                <input type="hidden" name="update_id" id="update_id"  
                value="<?php echo $get_search_profiles->id;?>">
                
                
                
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
                <textarea id="message" class="form-control"
                required="" name="message"
                style="height: 160px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->session->userdata('username');?>
                </textarea>
                
                <!--<?php echo $this->session->userdata('user_id_admin');?>-->
                
                </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit"  id="save-project-btn3"  name="register" class="btn btn-primary">Save changes</button>
                
                </div>
                </div>
                </div>
                </form>
                </div>


<?php include('footer.php'); ?>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable({
            pagingType: 'simple_numbers',
            lengthChange: false,
            ordering: false,
        });

    });
    
    $(function() {
				$("a[class='asm']").click(function() {
					$("#enterMessage").modal("show");
					return false;
				});
			});
			
</script>


</html>