<!DOCTYPE html>
<?php include('header.php'); 
if($_SESSION['user_type']==='6'){
include('menusupport.php');	
}

if($_SESSION['user_type']==='13')
{
 include('menusuperadmin.php');	   
}


if($_SESSION['user_type']==='0'){
 include('menu.php');
 }
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
          <h1 class="app-page-title mb-0">Photo Approve</h1>
        </div>
        <div>

        </div>

        <div class="col-md-3" style="margin-left:410px;">
          <select class="form-control" id="test_redirect">
            <option value="" selected="selected">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Choose Photo</option>

            <option value="photo1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Photo 1</option>
            <option value="photo2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;photo 2</option>
            <option value="photo3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;photo 3</option>
            <option value="photo4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;photo 4</option>
          </select>
        </div>
        
       <script>
        $("#test_redirect").change(function(){

    var val = $(this).val();
    if(val=='photo2')
    {
    window.location.href = "<?php echo base_url();?>admin/photoapprove_2";

}

 if(val=='photo1')
    {
    window.location.href = "<?php echo base_url();?>admin/photoapprove";

}

 if(val=='photo3')
    {
    window.location.href = "<?php echo base_url();?>admin/photoapprove_3";

}

if(val=='photo4')
    {
    window.location.href = "<?php echo base_url();?>admin/photoapprove_4";

}

 });
        
     </script>    
        
        
        
        
        
        
        
        
        
        <div class="col-auto">
          <div class="page-utilities">
            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
              <!-- <div class="col-auto">
                    <form class="table-search-form row gx-1 align-items-center">
                              <div class="col-auto">
                                  <input type="text" id="search-orders" name="searchorders" class="form-control search-orders" placeholder="Search">
                              </div>
                              <div class="col-auto">
                                  <button type="submit" class="btn app-btn-secondary">Search</button>
                              </div>
                          </form>
                          
                  </div>  -->
              <!--  <div class="col-auto">
                    
                    <select class="form-select w-auto" >
                      <option selected value="option-1">All</option>
                      <option value="option-2">This week</option>
                      <option value="option-3">This month</option>
                      <option value="option-4">Last 3 months</option>
                      
                  </select>
                  </div> -->
              <!--  <div class="col-auto">                
                    <a class="btn app-btn-secondary" href="#">
                      <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
      <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
    </svg>
                      Download CSV
                  </a>
                  </div> -->
            </div>
            <!--//row-->
          </div>
          <!--//table-utilities-->
        </div>
        <!--//col-auto-->
      </div>
      <!--//row-->


      <!--  <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
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
                   $i=1;
                    foreach($photo as $val) {
                    
                      $profile = $this->db->select('happynikah_id,name')->from('tbl_registration')->where('id', $val->user_id)->get()->row_array();
                    
                    ?>
                        <tr>
                          <td class="cell">
                        <?php echo $i++; ?>
                          
                          </td>
                       
                          
                          <td class="cell">
                              
                         <img src="https://happynikah.azurewebsites.net/api/Files/photo_storage/?filePath=<?php echo $val->user_image; ?>" style="width:50px;">
                         
                         </td>
                          <td class="cell"> 
                          
                          <?php echo $profile['happynikah_id']; ?>
                          
                          </td>
                          <td class="cell">
                          <span> 
                          <?php echo $profile['name']; ?> 
                          </span>
                          </td>
                          
                          <td class="cell">
                              
                            <a target="_blank" href="https://happynikah.azurewebsites.net/api/Files/photo_storage/?filePath=<?php echo $val->user_image; ?>" class="btn btn-warning btn-sm" 
                            
                            style="color:white;">View Large Photo</a>
                            </td>
                            
                            
                            <td class="cell">
                            <button type="button" class="btn btn-success btn-sm preimage" style="color:white;" data-id="<?php echo $val->user_image_id; ?>">Approve Photo</button>
                            <button type="button" class="btn btn-danger btn-sm delete" style="color:white;" data-id="<?php echo $val->user_image_id; ?>">Delete Photo</button>
                            </td>
                            </tr>
                            <?php
                            
                            } ?>
                            
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


<!-- modals start -->
<?php

foreach ($photo as $val) {

?>

  <style type="text/css">
    label.cabinet {
      display: block;
      cursor: pointer;
    }

    label.cabinet input.file {
      position: relative;
      height: 100%;
      width: auto;
      opacity: 0;
      -moz-opacity: 0;
      filter: progid:DXImageTransform.Microsoft.Alpha(opacity=0);
      margin-top: -30px;
    }

    .img {
      width: 350px;
      height: 350px;
      padding-bottom: 25px;
    }
  </style>

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
          <form method="post" action="<?= base_url() ?>admin/delete_photo">
            <div class="form-group">

              <div class="col-lg-3"><label for="inputName">Comment: <font color="red">*</font></label></div>

              <div class="col-lg-6">
                <textarea name="delete_comment" id="delete_comment" class="form-control" style="padding-top:unset;" required></textarea>
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
      <div class="modal-content" style="width: 500px;margin: auto;height: 670px;">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="margin-right:104px;"></button>
          <h3 class="modal-title" style="padding-right:107px;">PHOTO APPROVE</h3>
        </div>
        <div class="modal-body form">
          <form action="#" id="form" class="form-horizontal">
            <input type="hidden" value="" name="user_image_id" id="user_image_id" />
            
            
            <input type="hidden" name="url" id="url_<?php echo $val->user_image_id ?>"  
            
            value="<?php echo base_url() ?>../assets/photo_storage/<?php echo $val->user_image; ?>">
            
            
            <div class="form-body">
              <div class="form-group" id="photo-preview" style="margin-top:5px;padding-left:100px;">
                <div class="col-md-9 center-block img" id="img<?php echo $val->user_image_id; ?>" data-id="<?php echo $val->user_image_id; ?>">
                  <img src="" id="photo_<?php echo $val->user_image_id; ?>" style="margin-top:20px;" />
                  <span class="help-block"></span>
                </div>
              </div>
            </div>
            
            <br>
            
            <div style="margin-top:30px;padding-left:187px;">
               <a onclick="approve_photo('<?= $val->user_image_id ?>')"><button class="btn btn-success btn-sm approvebtn" style="color:white; display: none;" >Approve Photo</button></a> 
              <button type="button" class="btn btn-success btn-sm btncrop" style="color:white;margin-left:33px;" data-id="<?php echo $val->user_image_id; ?>" id="btncrop_<?php echo $val->user_image_id ?>">Crop</button>
            </div>
            <div style="margin-top:20px;padding-left:187px;" class="watermark_">
              <input type="checkbox" id="watermark_<?php echo $val->user_image_id; ?>" value="">
              <label for="watermark"> Water Mark</label><br>
            </div>

          </form>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  <!-- End Bootstrap modal -->

<?php } ?>


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
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('.delete').on('click', function() {
      var id = $(this).data('id');
      $('[name=user_image_id]').val(id);
      $('#' + id).modal('show');
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function() {
    var $uploadCrop, tempFilename, rawImg, imageId;
    $('.preimage').on('click', function() {
      var id = $(this).data('id');
      $('[name=user_image_id]').val(id);
      $('.img').addClass('ready');
      $('#modal_form_' + id).modal('show');
      rawImg = $('#url_' + id).val();
      //console.log(rawImg);
      $uploadCrop = $('#img' + id).croppie({
        viewport: {
          width: 150,
          height: 200,
        },
        enforceBoundary: false,
        enableExif: true
      });
      $('#modal_form_' + id).on('shown.bs.modal', function() {
        $uploadCrop.croppie('bind', {
          url: rawImg
        }).then(function() {
          console.log('jQuery bind complete');
        });
      });
      $('#img' + id).on('change', function() {
        var imageId = $(this).data('id');

        tempFilename = $(this).val();
      });
      $('#btncrop_' + id).on('click', function(ev) {

        $uploadCrop.croppie('result', {
          type: 'base64',
          format: 'jpeg',
          size: {
            width: 250,
            height: 300
          }

        }).then(function(resp) {
          $('#photo_' + id).attr('src', resp);
          $('.cr-boundary').hide();
          $('.cr-slider').hide();
          $('#btncrop_' + id).hide();

        });
        $('input[type="checkbox"]').click(function() {
          if ($(this).is(":checked")) {
            var photo = $('#photo_' + id).attr('src');
            // console.log(photo);
            $.ajax({
              dataType: 'text',
              type: 'POST',
              url: url + 'admin/watermark_image',
              data: {
                photo: photo,
                user_image_id: id
              },
              success: function(result) {
                $('#photo_' + id).attr('src',result);
                $('.approvebtn').show();
                $('.watermark_').hide();
                //location.reload();
              },
            })
            
          }
        });
      });

    });

  });
</script>
<script type="text/javascript">
  var url = '<?php echo base_url() ?>'

 function approve_photo(user_image_id) {
  var id = $('#user_image_id').val(); 
  var watermarkimg= $('#photo_' + id).attr('src');
  var tarr = watermarkimg.split('/'); 
  var file = tarr[tarr.length-1];
    var approve = confirm('Confirm Photo Approval');
    if (approve) {
      $.ajax({
        dataType: 'json',
        type: 'POST',
        url: url + 'admin/approve_photo',
        data: {
          user_image_id: id,
          user_image: file
        },

        success: function(result1) {
          window.location.reload(true);
        },
      })
    }

  }
</script>

</html>