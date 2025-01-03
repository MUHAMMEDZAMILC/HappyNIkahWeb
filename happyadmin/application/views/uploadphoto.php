<!DOCTYPE html>
<html lang="en">

<?php include('header.php'); 
if($_SESSION['user_type']==='7'){
include('menuchatsupport.php');
}
if($_SESSION['user_type']==='4'){
include('menucreation.php');
}

if($_SESSION['user_type']==='13'){
include('menusuperadmin.php');
}

if($_SESSION['user_type']==='3'){
include('menusales.php');
}

$user_id5=$this->session->userdata('user_id_admin');

  if($user_id5=='8' || $user_id5=='26')
    {
     include('menusales.php');     
    }
    

 include('menu.php'); ?>


 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
 
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/summernote/summernote-bs4.min.css">

  <!-- <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/croppie.css"> -->
<link rel="stylesheet" href="https://www.waytonikah.com/assets/common/css/croppie.css">
<style type="text/css">
.img-circle{
   border-radius: unset !important;
   margin-bottom:4px !important;
}

  .content-wrapper>.content {
    padding: 46px 2.5rem;
    }
    
  .clk-popup{
    background: white;
    width: 414px;
    padding: 5px 10px;
    padding-bottom: 21px;
  }
 
  .divphotobottom button{
    background: #1aab97;
    color: white;
    border: 0;
    padding: 11px 12px;
    border-radius: 11px;
    width: 100%;
  }
  
  .divphotobottom{
    display: flex;
    justify-content: space-between;
  }
  
  #uploadimage{
    padding: 12px;
  }
  footer{
    float: left;
    width: 100%;
    margin-left: unset !important;
  }
  .row {
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-flex-wrap: wrap;
    -ms-flex-wrap: wrap;
    flex-wrap: nowrap;
    margin-right: -7.5px;
    margin-left: -7.5px;
    align-content: stretch;
    flex-direction: row;
    justify-content: space-evenly;

  }
  
  .row>*
  {
      width: 17% !important; 
  }
  
  .app-utilities.col-auto
  {
    width: unset !important;   
  }
  
  /*#imgpicall*/
  /*{*/
  /*  width: 17% !important;   */
  /*}*/
</style>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Upload Photo</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Upload Photo</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
       
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Profile Images</h3>

              
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">

              <input type="file" id="uploadimage">

      <section class="content">
          <div class="container-fluid">
              
           
  

            <div class="row" id="imgpicall">
          <?php
           $i =0;
           
           $userimg_all=$this->db->select('*')->from('tbl_userimages')->where('status!=','1')->where('user_id',$ProfileDetails['id'])->get()->result();
           
           
           foreach ($userimg_all as $value) 
           
           { ?>
            <center>
                
                
              <img class="profile-user-img img-fluid img-circle" src="https://happynikah.azurewebsites.net/api/Files/photo_storage/?filePath=<?php echo $value->user_image; ?>"
                   alt="User profile picture">
                   
                   
              <?php if($profilepic[0]->photo != $value->user_image){?>

              <button type="button" class="btn btn-primary btn-block"  onclick="changeprpick('<?php echo $value->user_image ?>')">
              Set as Profile picture
              </button>
              <?php } ?>
              <button type="button" class="btn btn-danger btn-block"    onclick="deleteprpick('<?php echo $value->user_image_id ?>')">
              
               Delete Image
              </button>
              
              <!--<button type="button" class="btn btn-danger btn-block"  id="delete_ph">-->
                  
    <!--                 <a class="btn btn-danger btn-sm" data-replace="Delete Photo" style="color:#fff;" id="delete_ph">-->
    <!--              Delete Photo-->
				<!--</a>-->
                  
             
            </center>
          <?php 
          $i++;
          } ?>
              </div>
          </div>
      </section>

        <div class="clk-popup" style="display:none;">
  
        <div  id="CommonDatadiv" >
           
        <input type="hidden" id="imagecatno" value=""/>
        <input type="hidden" id="imagetitleen" value=""/>
        <input type="hidden" id="imagetitlear" value=""/>
        <input type="hiddden" id="userid" value="<?php echo $ProfileDetails['id'];?>" style="display:none;">
        <input type="hiddden" id="picnum" value="<?php echo $i ?>" style="display:none;">

        <div id="vanilla-demo"></div>
        <div class="divphotobottom">
            <!--<button class="vanilla-rotate rotateleft" data-deg="90"><i class="fa fa-undo" aria-hidden="true"></i> Rotate Left</button>-->
            <button class="basic-result" id="saveimages" >Save Image</button>
        <!--<button class="vanilla-rotate rotateright" data-deg="-90"><i class="fa fa-repeat" aria-hidden="true"></i> Rotate Right</button>-->
        </div>   
        </div>
        </div>
 
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
        
        
      
  
        
        
      </div><!-- /.container-fluid -->
    </section>




  <!-- /.content-wrapper -->
 <?php include('footer.php'); ?>
  



  <script src="<?php echo base_url() ?>assets/dist/js/croppie.min.js"></script>
  <script src="<?php echo base_url() ?>assets/dist/js/jquery.bpopup.min.js"></script>
  
  
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />-
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

   
     
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    

<script type="text/javascript">
 $(function() {
 		$("a[id='delete_ph']").click(function() {
        $("#delete_photo").modal("show");
        return false;
        });
        });
</script>


<script type="text/javascript">

function onclickin(){
            
            $('.clk-popup').bPopup({
      escClose: true,
      modal: true,
      modalClose: true,
    });
            
    }


$(document).ready(function(){

 

$image_crop = $('#vanilla-demo').croppie({
         enableExif: true,
                viewport: {
                  width:169,
                  height:200,
                  type:'square' //circle
                },
                boundary: {
        width: 100+'%',
        height: 300,
      },
                 
  });
  

  
 
  
    });  


function uploadphoto(){

 var reader = new FileReader();
    reader.onload = function (event) {
      $image_crop.croppie('bind', {
        url: event.target.result
      }).then(function(){
       
      });
    }
    reader.readAsDataURL(this.files[0]);


    onclickin().click();

}


  $('#uploadimage').on('change', function(){
      
      
    var reader = new FileReader();
    reader.onload = function (event) {
      $image_crop.croppie('bind', {
        url: event.target.result
      }).then(function(){
         $image_crop.croppie('setZoom', 0)
      });
    }
    reader.readAsDataURL(this.files[0]);
    
           

     onclickin().click();
    
  });
  
    
    $(function() {
    $("button[class='basic-result']").click(function() {
        
// //   setTimeout(function(){
// // 	location.reload(); 
// // 	}, 8000);
  
                    
//                   setTimeout(function(){
// 	location.reload(); 
// 	}, 1000);


    });
    });
    
    
       
			   


    $('#saveimages').click(function(event)
    {
     
    $('#saveimages').html('<i class="fa fa-circle-o-notch fa-spin" style="font-size:24px"></i> Uploading...');   
     $path = 'fileupload_fashion';

      var size = { width: 1080, height: 1200 }; 
      var userid = $('#userid').val();
      var picnum = $('#picnum').val();
     
      
       $image_crop.croppie('result', {
                type: 'canvas',
                size: size,
                format:'jpeg'
              }).then(function(response){
                  
         
                 
                  
                  $.ajax({
                                   url: '<?php echo base_url()?>admin/uploadphoto',
                                   type: 'post',
                                   data: "imagevalue="+response+"&userid="+userid+"&picnum="+picnum,
                                   dataType: 'json',
                                   success: function (data) { 
                           
                                 window.location.reload();
         
                      
                            
                            
                                      if(data == true)
                                      {
                                    //   alert('You Have already uploaded 4 Images...')
                                          
                                        //       $('.clk-popup').bPopup().close();
                                        //   window.location.reload();
                                        
                                 
                              
                                      }
                                      else{
                                          $('.clk-popup').bPopup().close();
                                          window.location.reload();
                                      }
                                      
                                    } 

                                });
                  
              });

  });


    function changeprpick(image)
    {

      var userid = $('#userid').val();
      
      $.ajax({
                       url: '<?php echo base_url()?>admin/setprofilepic',
                       type: 'post',
                       data: "image="+image+"&userid="+userid,
                       dataType: 'json',
                       success: function (data) { 

                              window.location.reload();
                          

                           
                        } 




                    });
      
      }


        // function deleteprpick(image_id)
        // {
        
        // var customConfirmMessage = "Are you sure you want to delete?";
        
        // if (confirm(customConfirmMessage))
        // {
        
        
        
        // $.ajax({
        // url: '<?php echo base_url()?>admin/deleteprofilepic',
        // type: 'post',
        // data: "image_id="+image_id,
        // dataType: 'json',
        // success: function (data) { 
        
        // window.location.reload();
        
        
        // } 
        
        // });
        // }
        // }


function deleteprpick(image_id) {
  Swal.fire({
    title: '<span style="font-weight: bold; font-size: 24px;">Confirm Deletion</span>',
    html: '<p style="font-size: 18px;">Are you sure you want to delete?</p>',
    icon: 'question',
    showCancelButton: true,
    confirmButtonText: 'Yes',
    cancelButtonText: 'No',
  }).then((result) => {
    if (result.isConfirmed) {
      // User clicked Yes, perform the delete action here
      $.ajax({
        url: '<?php echo base_url()?>admin/deleteprofilepic',
        type: 'post',
        data: "image_id=" + image_id,
        dataType: 'json',
        success: function (data) {
          window.location.reload();
        }
      });
    }
  });
}

 </script>

</body>
</html>
