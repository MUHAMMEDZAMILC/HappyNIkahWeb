<!DOCTYPE html>
<html>
    
<?php include('include/user_header_gotonikah.php'); ?>
<style>


 @media (min-width: 280px) and (max-width: 991px)
    {
      .profileListBox {
    margin-top: -670px;
}  
    
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
  
  
  #userContent .appAdvBox 
  {
    width: 100%;
    background: transparent linear-gradient(91deg, #6fc95ea3 0%, #5aba47 100%) 0% 0% no-repeat padding-box;
    padding: 50px 70px 0;
    border-radius: 10px;
  }
</style>
  <section id="userContent">
        <div class="container">
            <div class="row">
            <div class="col-12 col-md-5 col-lg-4">
            <?php include('include/user_info_gotonikah.php'); ?>
            <?php include('include/side_menu_gotonikah.php'); ?>

            </div>          
            
       <?php $user_id= $this->General_Model->GetProfileDetails($this->session->userdata('user_id'))['id'];?>         
    
        <?php $pic= $this->General_Model->GetProfileDetails($this->session->userdata('user_id'))['photo'];?>
        
        <?php if($pic=='')
        {?>
                
        <div id="myModal" class="modal"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
        <div class="modal-content" style="margin-left: 140px;margin-top: 118px;">
         <div class="modal-header" style="background-color: #80d86f;">
         		        <h5 class="modal-title text-success" id="exampleModalLabel" ></h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           <p style="font-size: 22px;text-align: center;color: #282121;margin-left: -8px;font-weight: 600;">You have a photo request from many profile id,Please upload your profile photo</p>
        </div>
        
        <input type="file" id="uploadimage" style="margin-left: 110px;">
        <div class="modal-footer" style="background-color: #80d86f;">
    
         
        </div>
      </div>
    </div>
  </div>
  
        <?php }?>

   <div class="clk-popup" style="display:none;padding-top:10px;margin-top:-110px;">
  
        <div  id="CommonDatadiv" >
           
        <input type="hidden" id="imagecatno" value=""/>
        <input type="hidden" id="imagetitleen" value=""/>
        <input type="hidden" id="imagetitlear" value=""/>
        <input type="hiddden" id="userid" value="<?php echo $user_id ?>" style="display:none;">
        <input type="hiddden" id="picnum" value="<?php echo count($images); ?>" style="display:none;">

        <div id="vanilla-demo"></div>
        <div class="divphotobottom">
        
            <button class="basic-result" id="saveimages">Save Image</button>
        
        </div>   
        </div>
        </div>
        


                <div class="col-12 col-md-7 col-lg-8">
                    <!-- profile listing -->
                    <div class="profileListBox">
                        <div class="row">
                            <div class="col-12 d-flex align-items-center">
                                <h5 class="listTypeHead">Matching Profile
                                
                                
                                </h5>
                            </div>
                        </div>
                        <div class="row">
                        <?php foreach ($MatchingProfiles as $key) { ?>

                            <div class="col-12 col-sm-6 col-md-12 col-lg-6 col-xl-4">
                                <div class="profileSingleBox">
                                    <div id="carouselProfile1" class="carousel slide" data-bs-ride="carousel">
                                       
                                        <a href="<?php echo site_url('user/singleprofile/'.$key->id); ?>">
                                        <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                            <div class="proLstBox">
                                                    <?php 
                                                    //echo $key->user_image;
                                                    if(empty($key->user_image)){ 
                                            if($key->gender== 1){ ?>
                                           
                                                                <img src="<?php echo base_url('/assets/photo_storage/maleweb.png'); ?>" alt="profile image" class="proImg" style="height:100%;">
                                                               <div class="overlay"></div>
                                            <?php }
                                            else if($key->gender== 2){ ?>
                                                                  <img src="<?php echo base_url('/assets/photo_storage/femaleweb.png'); ?>" alt="profile image" class="proImg" style="height:100%;">
                                                              <div class="overlay"></div>
                                            <?php }
                                     } else{ 
                                        $photo_status = $this->General_Model->check_photoStatus($key->user_image);//check if approved or not
                                        //echo $photo_status->status;
                                      
                                        if(isset($photo_status->status) && $photo_status->status != 0 && $photo_status->status != 1){//if approved
                                        $sender_id = $this->session->userdata('user_id');
                                               $receiver_id = $key->id;
                                               $photo_privacy = $this->General_Model->photoprivacy($sender_id,$receiver_id);//check if protected
                                               if($photo_privacy !=1)
                                               {// if public
                          
                          $file_pointer = 'assets/photo_storage_thumb/'.$key->user_image;
    if(file_exists($file_pointer)){?>
                                     <img src="<?php echo base_url('/assets/photo_storage_thumb/'.$key->user_image); ?>" alt="profile image" class="proImg" style="height:100%;">
                               <?php } else{
                               $file_pointer = 'assets/photo_storage/'.$key->user_image;
    if(file_exists($file_pointer)){?>
                                    <img src="<?php echo base_url('/assets/photo_storage/'.$key->user_image); ?>" alt="profile image" class="proImg" style="height:100%;">

                               <?php }else{
                               if($key->gender== 1){ ?>
       <img src="<?php echo base_url('/assets/photo_storage/maleweb.png'); ?>" alt="profile image" class="proImg">
   <?php }
   else{ ?>
       <img src="<?php echo base_url('/assets/photo_storage/femaleweb.png'); ?>" alt="profile image" class="proImg">
                               <?php }?>
                               <div class="overlay"></div>
                                     <?php
                                     }//end file exists
                                                   
                                               }}//end public
                                     else{//private
                                        $sender_id = $this->session->userdata('user_id');
                                        $receiver_id = $key->id;
                                        $photo_requeststatus = $this->General_Model->check_photo_requested($sender_id,$receiver_id);//check if protected
if($photo_requeststatus==0)//not requested for photo
{
    $file_pointer = 'assets/photo_storage_blur/'.$key->user_image;
    if(file_exists($file_pointer)){?>

<img src="<?php echo base_url('/assets/photo_storage_blur/'.$key->user_image); ?>" alt="profile image" class="proImg" style="height:100%;">
<div class="overlay"></div>
                                                                <div class="lockOverlay">
                                                                    <img src="<?php echo base_url();?>assets/images/lockProfile.svg">
                                                                </div>
<?php }
else{//file missing
if($key->gender== 1){ ?>

       <img src="<?php echo base_url('/assets/photo_storage/maleweb.png'); ?>" alt="profile image" class="proImg">
       <div class="overlay"></div>
                                                                <div class="lockOverlay">
                                                                    <img src="<?php echo base_url();?>assets/images/lockProfile.svg">
                                                                </div>
   <?php }
   else if($key->gender== 2){ ?>

       <img src="<?php echo base_url('/assets/photo_storage/femaleweb.png'); ?>" alt="profile image" class="proImg">
       <div class="overlay"></div>
                                                                <div class="lockOverlay">
                                                                    <img src="<?php echo base_url();?>assets/images/lockProfile.svg">
                                                                </div>
   <?php }
}
}
else//requested for photo
{
    $photo_requeststatus = $this->General_Model->photo_requeststatus($sender_id,$receiver_id);//check for status of the request
    if($photo_requeststatus==1)
    {
 $file_pointer = 'assets/photo_storage_thumb/'.$key->user_image;
    if(file_exists($file_pointer)){?>
                                     <img src="<?php echo base_url('/assets/photo_storage_thumb/'.$key->user_image); ?>" alt="profile image" class="proImg" style="height:100%;">
                               <?php } else{?>
                                    <img src="<?php echo base_url('/assets/photo_storage/'.$key->user_image); ?>" alt="profile image" class="proImg" style="height:100%;">

                               <?php }?>                 <div class="overlay"></div>
               
         <?php 
    }
    else{
        $file_pointer = 'assets/photo_storage_blur/'.$key->user_image;
        if(file_exists($file_pointer)){?>
    
    <img src="<?php echo base_url('/assets/photo_storage_blur/'.$key->user_image); ?>" alt="profile image" class="proImg">
    <div class="overlay"></div>
                                                                <div class="lockOverlay">
                                                                    <img src="<?php echo base_url();?>assets/images/lockProfile.svg">
                                                                </div>
    <?php }
    else{
    if($key->gender== 1){ ?>
    
           <img src="<?php echo base_url('/assets/photo_storage/maleweb.png'); ?>" alt="profile image" class="proImg">
          <div class="overlay"></div> <div class="lockOverlay">
                                                                    <img src="<?php echo base_url();?>assets/images/lockProfile.svg">
                                                                </div>
       <?php }
       else if($key->gender== 2){ ?>
    
           <img src="<?php echo base_url('/assets/photo_storage/femaleweb.png'); ?>" alt="profile image" class="proImg">
         <div class="overlay"></div>  <div class="lockOverlay">
                                                                    <img src="<?php echo base_url();?>assets/images/lockProfile.svg">
                                                                </div>
       <?php }
    }
    }
}
                                    
                                     }}
                                     else { //not approved 
                                     
                                             if($key->gender== 1){ ?>
                             
                                                        <img src="<?php echo base_url('/assets/photo_storage/maleweb.png'); ?>" alt="profile image" class="proImg" style="height:100%;">
                                                       <div class="overlay"></div>
                                                    <?php }
                                                    else if($key->gender== 2){ ?>
                                                        <img src="<?php echo base_url('/assets/photo_storage/femaleweb.png'); ?>" alt="profile image" class="proImg" style="height:100%;">
                                                        <div class="overlay"></div>
                                                    <?php }
                                                    
                                             }?>
                                     <?php  }?>
                                                            </div>
                                                        </div>
                                                       
                                                    </div>
                                        </a>
                                        <div class="carouselCount">
                                          
                                           <?php   $checkalreadysend = $this->General_Model->checkShortlisted($key->id);  
?><button type="button" class="bookmarkBtn" title="Shortlist profile" onclick="shortlist_profile(<?php echo $key->id;?>)" id="shortlist" <?php if(!empty($checkalreadysend['shortlist_id'])){?> style="display:none;"<?php }?>>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15.182 20.279" class="slideBkmark">
    <g transform="translate(0.5 0.5)">
        <path d="M0,18.909V1.773A1.773,1.773,0,0,1,1.773,0H12.409a1.773,1.773,0,0,1,1.773,1.773V18.909L7.091,14.773Z" stroke-width="1"/>
    </g>
</svg>
</button>
<button type="button" class="bookmarkBtn marked" title="Undo shortlisted profile" onclick="shortlist_profile(<?php echo $key->id;?>)"id="shortlist_done"<?php if(empty($checkalreadysend['shortlist_id'])){?>style="display:none;"<?php }?>>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15.182 20.279" class="slideBkmark">
    <g transform="translate(0.5 0.5)">
        <path d="M0,18.909V1.773A1.773,1.773,0,0,1,1.773,0H12.409a1.773,1.773,0,0,1,1.773,1.773V18.909L7.091,14.773Z" stroke-width="1"/>
    </g>
</svg>
</button>
                                        </div>
                                    </div>
                                    <div class="contentBox" style="position:absolute;
    left: 0;
    right: 0;
    bottom: 38px;
    padding: 10px 50px 10px 10px;
    line-height: 12px;
    background-color: #403f3fab;">
                                        <?php if(!empty($key->is_online) && $key->is_online==1) {?><p class="status"><span class="online"></span>Online</p><?php }?>
                                        <div class="d-flex align-item-center mb-2">
                                            <img src="<?php echo base_url();?>assets/images/linkGreen.svg" alt="link Green" class="linkGreen me-1" width="auto" height="auto">
                                            <span class="proDtls"><?php echo $key->name;?></span>
                                            <img src="<?php echo base_url();?>assets/images/nameCrownIcon.svg" alt="Crown Icon" class="profileico" width="auto" height="auto">
                                        </div>
                                        <ul class="proDtlList">
                                            <?php if(!empty($key->happynikah_id)) { ?><li><?php echo $key->happynikah_id;?></li><?php }?>
                                           <li><?php if(!empty($key->dob)) {echo date_diff(date_create($key->dob), date_create('today'))->y; } else echo $key->age;?> Yrs, <?php if(!empty($key->height)) { echo $key->height; }?></li>
                                            <?php if(!empty($key->marital_status)) { ?><li><?php echo $key->marital_status;?></li><?php }?>
                                            <?php if(!empty($key->education)) { ?><li><?php echo $key->education;?></li><?php }?>
                                           
                                            <?php if(!empty($key->user_caste)) { ?><li><?php echo $key->user_caste;?></li><?php }?>
                                            <?php if(!empty($key->district)) { ?><li><?php echo $key->district;?></li><?php }?>
                                       
                                        </ul>
                                    </div>
                                    <ul class="d-flex justify-content-between profOptnsList">
                         <?php $checkalreadysend = $this->General_Model->checkinterestsend($key->id);  ?>

                                    <li id="express_<?php echo $key->id;?>"<?php if(!empty($checkalreadysend['interest_id'])){ ?>style="display:none;"<?php }?>>

<a href="javascript:void(0)" class="d-flex align-items-center">

<span  id="express_<?php echo $key->id;?>" onclick="expressinterest('<?php echo $key->id; ?>')"><img src="<?php echo base_url();?>assets/images/Interest_goto.png" class="icon">Interest</span></a>
</li>
<li id="express_done_<?php echo $key->id;?>" <?php if(empty($checkalreadysend['interest_id'])){ ?>style="display:none;"<?php }?>>

<a href="javascript:void(0)" class="d-flex align-items-center">

<span   onclick="expressinterest('<?php echo $key->id; ?>')"><img src="<?php echo base_url();?>assets/images/checkedG.png" class="icon">Interested</span></a>
</li>
                                        <li>
                                            <a href="<?php echo base_url('user/userchat/'.$key->id);?>" class="d-flex align-items-center">
                                                <img src="<?php echo base_url();?>assets/images/Chat1.svg" class="icon">
                                                <span>Chat</span>
                                            </a>
                                        </li>
                                       
                                        <?php $checkalreadysend = $this->General_Model->checkignoresend($key->id);  ?>
<li id="ignore_<?php echo $key->id;?>"<?php if(!empty($checkalreadysend['id'])){ ?>style="display:none;"<?php }?>>

 <a href="javascript:void(0)" class="d-flex align-items-center">

<span  onclick="ignore_profile('<?php echo $key->id; ?>')"><img src="<?php echo base_url();?>assets/images/Ignore_gotonikah.png" class="icon">Ignore</span></a>
</li>
<li id="ignore_done_<?php echo $key->id;?>" <?php if(empty($checkalreadysend['id'])){ ?>style="display:none;"<?php }?>>

 <a href="javascript:void(0)" class="d-flex align-items-center">

<span   onclick="ignore_profile('<?php echo $key->id; ?>')"><img src="<?php echo base_url();?>assets/images/Ignore_gotonikah.png" class="icon">Ignored</span></a>
</li>
                                    </ul>
                                </div>
                            </div>
                        <?php } ?>    
                        </div>
                        <div class="d-lg-flex justify-content-end">
                            <div class="paginationPBox d-lg-flex align-items-center mb-5">
                                <nav data-pagination="" class="navPagntn me-3 mb-4 mb-lg-0">
                                 <ul> <li><?php echo $links; ?></li></ul>
                                </nav>
                              
                            </div>
                        </div>
                    </div>
                    <!-- mobile app advrtisment -->
                    <div class="appAdvBox">
                        <div class="row">
                            <div class="col-12 col-xl-6">
                                <h2 class="subHead mb-4">Search Profiles<br><span>Anytime! Anywhere!!</span></h2>
                                <p class="pOne">Finding your perfect match has never been easier with the Goto nikah application</p>
                                <p class="pTwo">Download now and communicate with muslim matches on-the-go!</p>
                                <div class="d-flex mb-5 mb-xl-0">
                                    <a href="javascript:void(0)">
                                        <img src="<?php echo base_url();?>assets/images/appleStore.png" alt="appleStore" class="storeIcon me-3" width="auto" height="auto">
                                    </a>
                                    <a href="https://play.google.com/store/apps/details?id=com.sysol.goto_nikah">
                                        <img src="<?php echo base_url();?>assets/images/playStore.png" alt="playStore" class="storeIcon" width="auto" height="auto">
                                    </a>
                                </div>
                            </div>
                            <div class="col-12 col-xl-6  text-center">
                                <img src="<?php echo base_url();?>assets/images/mic.png" class="mobAppIcon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    
    <?php include('include/footer_gotonikah.php'); ?>
    
  
    <script type="text/javascript">
        $(document).ready(function () {
            // burger menu
            $(".hamburger").click(function(){
                $(this).toggleClass("is-active");
                $('body').toggleClass("is-scroll-disabled");
            });
            // burger menu end

            // send request btn
            $(".sndrqst").click(function(){
                $(this).toggleClass("clicked");
            });

          
            var totalItems = $('#carouselProfile1 .carousel-item').length;
            var currentIndex = $('#carouselProfile1 .carousel-item.active').index() + 1;
            $('#num1').html('' + currentIndex + '/' + totalItems + '');


            $('#carouselProfile1').bind('slid.bs.carousel', function() {
              currentIndex = $('#carouselProfile1 .carousel-item.active').index() + 1;
              $('#num1').html('' + currentIndex + '/' + totalItems + '');
            });

            // bookmark profile 
            $(".bookmarkBtn").click(function(){
                $(this).toggleClass("marked");
            });
            
        });
        
        function expressinterest(receiver_id){

$('#sendinterest'+receiver_id).toggleClass("clicked");
url_address='<?php echo site_url() ?>/user/send_interest';
       data = { receiver_id : receiver_id};
       $.ajax({
           type: "post",
           url: url_address,
           data: data,
           success: function(response){ 
            $('#express_done_'+receiver_id).toggle();
              $('#express_'+receiver_id).toggle();
             
         },
           error: function(XMLHttpRequest, textStatus, errorThrown){
              alert(textStatus);
         }



});

}
function ignore_profile(receiver_id)
{
    url_address='<?php echo site_url() ?>/user/ignore_profile';
       data = { receiver_id : receiver_id};
       $.ajax({
           type: "post",
           url: url_address,
           data: data,
           success: function(response){ 
            $('#ignore_done_'+receiver_id).toggle();
              $('#ignore_'+receiver_id).toggle();    
         },
           error: function(XMLHttpRequest, textStatus, errorThrown){
              alert(textStatus);
         }



});

}
function shortlist_profile(receiver_id)
{
    url_address='<?php echo site_url() ?>/user/shortlist';
       data = { receiver_id : receiver_id};
       $.ajax({
           type: "post",
           url: url_address,
           data: data,
           success: function(response){ 
            if(response==1)
            {
alert("The Profile has been Shortlisted..");
            }
            else{
alert("The Profile has been removed from Shortlisted..");

            }
            
             
         },
           error: function(XMLHttpRequest, textStatus, errorThrown){
              alert(textStatus);
         }



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
        url: '<?php echo site_url('user/uploadphoto')?>',
        type: 'post',
        data: "imagevalue="+response+"&picnum="+picnum,
        dataType: 'html',
        success: function (data) { 
        
        if(picnum == 0){ location.reload(); } location.reload();                                      
        
        
        if(data != 0){
        $('#ajaxappendimage').prepend(data);
        }else{
        alert('Limit Exeded');
        }
        $('.clk-popup').bPopup().close();
        $('#saveimages').html('Upload');  
        
        } 
        
        });
        
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
        </script>
        
    
    
    
   
           <?php $pic= $this->General_Model->GetProfileDetails($this->session->userdata('user_id'))['photo'];?>
 
    
    <script>
var modal = document.getElementById("myModal");
var span = document.getElementsByClassName("close")[0];

<?php $pic= $this->General_Model->GetProfileDetails($this->session->userdata('user_id'))['photo'];?>
 
<?php if ($pic==''): ?>
    modal.style.display = "block";
<?php endif; ?>
span.onclick = function() {
    modal.style.display = "none";
}
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

    <script src="https://happynikah.com/happyadmin/assets/dist/js/croppie.min.js"></script>
     <script src="https://happynikah.com/happyadmin/assets/dist/js/jquery.bpopup.min.js"></script>
     
     <!--<link rel="stylesheet" href="https://www.waytonikah.com/assets/common/css/croppie.css">-->
     
     <link rel="stylesheet" href="<?php echo base_url() ?>assets/cropimage/croppie.css">
     

</body>
</html>