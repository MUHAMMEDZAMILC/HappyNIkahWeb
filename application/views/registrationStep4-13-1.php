<!DOCTYPE html>
<html>
<?php include('include/register-header.php'); ?>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/cropimage/croppie.css">
<style type="text/css">
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
  .closeimgbtn{
    position: absolute;
    width: 23px;
    height: 23px;
    background: white;
    /* top: 110px; */
    z-index: 99;
    color: black;
    border-radius: 39px;
    top: 3px;
    left: 3px;
    border: 0;
  }

  .dpimgbtn{
    position: absolute;
    width: 23px;
    height: 23px;
    background: white;
    /* top: 110px; */
    z-index: 99;
    color: black;
    border-radius: 39px;
    top: 3px;
    right: 3px;
    border: 0;
  }
  .proPhotoUpload .proUpldedImg {
 
    z-index: 9;
}
</style>
    <section id="registerPage">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div id="ERtabV" class="resp-vtabs hor_1">
                        <ul class="resp-tabs-list hor_1">
                        <li class="resp-tab-item hor_1" onclick="window.location.href='<?php echo site_url('user/registration_step1?currentpage=1'); ?>'">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="circleNo">
                                            <span>1</span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                       <p class="menuHead">Basic Information</p>
                                       <p class="menuPara">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
                                    </div>
                                </div>
                            </li>
                            <li class="resp-tab-item hor_1" onclick="window.location.href='<?php echo site_url('user/registration_steptwo?currentpage=1'); ?>'">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="circleNo">
                                            <span>2</span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                       <p class="menuHead">Educational & Physical Attributes</p>
                                       <p class="menuPara">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
                                    </div>
                                </div>
                            </li>
                            <li class="resp-tab-item hor_1" onclick="window.location.href='<?php echo site_url('user/registration_stepthree?currentpage=1'); ?>'">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="circleNo">
                                            <span>3</span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                       <p class="menuHead">Location & Contact details</p>
                                       <p class="menuPara">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
                                    </div>
                                </div>
                            </li>
                            <li class="resp-tab-item hor_1 resp-tab-active" onclick="window.location.href='<?php echo site_url('user/registration_stepfour?currentpage=1'); ?>'">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="circleNo">
                                            <span>4</span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                       <p class="menuHead">Profile Description</p>
                                       <p class="menuPara">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
                                    </div>
                                </div>
                            </li>
                        </ul> 
                        <div class="resp-tabs-container hor_1">
                            <h2 class="resp-accordion hor_1" onclick="window.location.href='registrationStep1.html'">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="circleNo">
                                            <span>1</span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                       <p class="menuHead">Basic Information</p>
                                       <p class="menuPara">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
                                    </div>
                                </div>
                            </h2>
                            <h2 class="resp-accordion hor_1"  onclick="window.location.href='registrationStep2.html'">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="circleNo">
                                            <span>2</span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                       <p class="menuHead">Educational & Physical Attributes</p>
                                       <p class="menuPara">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
                                    </div>
                                </div>
                            </h2>
                            <h2 class="resp-accordion hor_1"  onclick="window.location.href='registrationStep3.html'">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="circleNo">
                                            <span>3</span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                       <p class="menuHead">Location & Contact details</p>
                                       <p class="menuPara">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
                                    </div>
                                </div>
                            </h2>
                            <h2 class="resp-accordion hor_1 resp-tab-active" onclick="window.location.href='registrationStep4.html'">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="circleNo">
                                            <span>4</span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                       <p class="menuHead">Profile Description</p>
                                       <p class="menuPara">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
                                    </div>
                                </div>
                            </h2>
                            <!-- Family Information -->
                            <div class="resp-tab-content hor_1 resp-tab-content-active">
                                <div class="row">
                                    <div class="col-12 col-lg-10 mx-auto">
                                    <form action="<?php echo site_url('user/register_profiledescription'); ?>?currentpage=1" method="post" autocomplete="off" class="customForm" enctype="multipart/form-data" id="profile">
                                            <div class="row">
                                                <div class="col-12 col-xl-4 mb-3">
                                                    <div class="mb-3">
                                                        <label class="form-label">Upload Photo</label>
                                                        <div class="upload-btn-wrapper">
                                                            <button class="btn">
                                                                <img src="<?php echo base_url();?>assets/images/photoUpload.png">
                                                                Upload Photo:
                                                            </button>
                                                            <input type="file" name="image" id="upload">
                                                        </div>
                                                        <?php if(!empty($ProfileDetails->photo) && $ProfileDetails->photo != 'NULL'){ ?>
                                                        <img id="imgview" style="width: 100%;  margin-bottom: 10px;"  src="<?php echo base_url('/assets/photo_storage/'.$ProfileDetails->photo) ?>">

                                                    <?php } 
                                                    else{ ?>
                                                        <img id="imgview" style="width: 100%;  margin-bottom: 10px;" > 
                                                    <?php }   
                                                    ?>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-xl-8">
                                                    <div class="mb-3">
                                                        <p class="mb-0">
                                                            <label class="form-label">Photo Visibility</label>
                                                        </p>
                                                        <div class="form-check form-check-inline custom_radio ps-0">
                                                            <input class="form-check-input" type="radio" name="picVisibltySelct" id="regUsr" value="0" checked="true" <?= (isset($ProfileDetails->photo_visibility) && !empty($ProfileDetails->photo_visibility)) ? (($ProfileDetails->photo_visibility == '0') ? 'checked' : '') : 'checked' ?>>
                                                            <label class="form-check-label" for="regUsr">Visible to all</label>
                                                        </div>
                                                        <div class="form-check form-check-inline custom_radio ps-0">
                                                            <input class="form-check-input" type="radio" name="picVisibltySelct" id="public" value="1" <?= (isset($ProfileDetails->photo_visibility) && !empty($ProfileDetails->photo_visibility)) ? (($ProfileDetails->photo_visibility == '1') ? 'checked' : '') : '' ?>>
                                                            <label class="form-check-label" for="public">Protect with password</label>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 pwBox d-none">
                                                        <input type="text" class="form-control" placeholder="Enter Password" name="photopassword" <?php if($photo_settings->photopassword != '0'){ echo 'value="'.$photo_settings->photopassword.'"';}?>>
                                                        <div class="form-check mt-2 mb-1">
                                                            <input class="form-check-input" type="checkbox" value="1" id="show1" name="showtoexpress" <?php if($photo_settings->showtoexpress != '0'){ echo 'checked';}?>>
                                                            <label class="form-check-label" for="show1">Show my photo to express interest accepted member</label>
                                                        </div>
                                                        <div class="form-check mb-3">
                                                            <input class="form-check-input" type="checkbox" value="1" id="show2" name="showtopremium"<?php if($photo_settings->showtopremium != '0'){ echo 'checked';}?>>
                                                            <label class="form-check-label" for="show2">Show my photo to Premium member</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-12 mb-3">
                                                    <label class="form-label">Profile Description</label>
                                                    <textarea class="form-control" rows="3" name="about"></textarea>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-md-6 mb-3 mb-md-0">
                                                    <button type="button" class="btn backBtn w-100" onclick="window.location.href='<?php echo site_url('user/registration_stepthree?currentpage=1'); ?>'">Back</button>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <button type="button" class="btn cstmBtnColr w-100" onclick="checkvalidation()">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="clk-popup" style="display:none;">
  
        <div  id="CommonDatadiv" >
           
        <input type="hidden" id="imagecatno" value=""/>
        <input type="hidden" id="imagetitleen" value=""/>
        <input type="hidden" id="imagetitlear" value=""/>
        <input type="hiddden" id="userid" value="<?php echo $_SESSION['user_id']; ?>" style="display:none;">
        <input type="hiddden" id="picnum" value="0" style="display:none;">

        <div id="vanilla-demo"></div>
        <div class="divphotobottom">
        <!-- <button class="vanilla-rotate rotateleft" data-deg="90"><i class="fa fa-undo" aria-hidden="true"></i> Rotate Left</button> -->
            <button class="basic-result" id="saveimages">Save Image</button>
        <!-- <button class="vanilla-rotate rotateright" data-deg="-90"><i class="fa fa-repeat" aria-hidden="true"></i> Rotate Right</button> -->
        </div>   
        </div>
        </div>
    <?php include('include/register-footer.php'); ?>
    <script src="<?php echo base_url() ?>assets/cropimage/croppie.min.js"></script>
  <script src="<?php echo base_url() ?>assets/cropimage/jquery.bpopup.min.js"></script>

    <script type="text/javascript">
         function onclickin(){
            
            $('.clk-popup').bPopup({
      escClose: true,
      modal: true,
      modalClose: true,
    });
            
    }
        $(document).ready(function () {
            // password for profile photo
            $('input[name="picVisibltySelct"]').change(function() {
                var radioVal = $('input[name="picVisibltySelct"]:checked').val();
                if (radioVal == '1') {
                    $(".pwBox").removeClass("d-none");
                }
                else {
                    $(".pwBox").addClass("d-none");
                }
            });
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


 $('#upload').on('change', function(){
     
     
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
 


   $('#saveimages').click(function(event){
       
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
                                  url: '<?php echo site_url('user/uploadphoto?currentpage=1')?>',
                                  type: 'post',
                                  data: "imagevalue="+response+"&picnum="+picnum+"&type=1",
                                  dataType: 'html',
                                  success: function (data) { 
 
if(data != 0){

$('#imgview').attr('src', data);
}
$('.upload-btn-wrapper').hide();
$('.clk-popup').bPopup().close();
$('#saveimages').html('Upload');  
                                     

                                      
                                   } 




                               });
                 
                 
             });

   





     
 });
 
 
 function checkvalidation(){

var about = $('#about').val();

if(about == ''){ 
    $('#about_val').html('<font color="red" >Field Required</font>'); 
}
else{ $( "#profile" ).submit();}
       }
    


    </script>
</body>
</html>