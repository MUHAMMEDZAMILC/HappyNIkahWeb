<!DOCTYPE html>
<html lang="en">

<?php include('includes/header.php'); ?> 


  <!-- <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/croppie.css"> -->
<link rel="stylesheet" href="https://www.waytonikah.com/assets/common/css/croppie.css">
<style type="text/css">
.img-circle{
   border-radius: unset !important;
   margin-bottom:4px !important;
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
    padding: 5px 12px;
    border-radius: 11px;
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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Project Add</li>
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

            <div class="row" >
          <?php
           $i =0;
           foreach ($userimages as $value) { ?>
            <center>
              <img class="profile-user-img img-fluid img-circle" src="<?php echo site_url('../assets/photo_storage/'.$value->user_image); ?>"
                   alt="User profile picture">
              <?php if($profilepic[0]->photo != $value->user_image){?>

              <button type="button" class="btn btn-primary btn-block"  onclick="changeprpick('<?php echo $value->user_image ?>')">
              Set as Profile picture
              </button>
              <?php } ?>
              <button type="button" class="btn btn-danger btn-block" onclick="deleteprpick('<?php echo $value->user_image_id ?>')">
              Delete Image
              </button>
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
        <input type="hiddden" id="userid" value="<?php echo $user_id ?>" style="display:none;">
        <input type="hiddden" id="picnum" value="<?php echo $i ?>" style="display:none;">

        <div id="vanilla-demo"></div>
        <div class="divphotobottom"><button class="vanilla-rotate rotateleft" data-deg="90"><i class="fa fa-undo" aria-hidden="true"></i> Rotate Left</button>
            <button class="basic-result" id="saveimages" >Save Image</button>
        <button class="vanilla-rotate rotateright" data-deg="-90"><i class="fa fa-repeat" aria-hidden="true"></i> Rotate Right</button>
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
 <?php include('includes/footer.php'); ?>
  



  <script src="<?php echo base_url() ?>assets/dist/js/croppie.min.js"></script>
  <script src="<?php echo base_url() ?>assets/dist/js/jquery.bpopup.min.js"></script>


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


    function deleteprpick(image_id){
      if (confirm("Are you sure you want to delete?")){
      
            $.ajax({
                       url: '<?php echo base_url()?>admin/deleteprofilepic',
                       type: 'post',
                       data: "image_id="+image_id,
                       dataType: 'json',
                       success: function (data) { 

                              window.location.reload();
                          
                           
                        } 

                    });
            }
      }

 </script>

</body>
</html>
