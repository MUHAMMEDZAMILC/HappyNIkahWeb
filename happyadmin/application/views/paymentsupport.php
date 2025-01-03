<!DOCTYPE html>
<?php include('header.php'); 

if($_SESSION['user_type']==='7'){
include('menuchatsupport.php'); 
}
?>

  <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@300;400;500;600;700;900&family=Poppins:wght@300;400;500;600;700;800;900&family=Roboto:wght@400;@500&display=swap" rel="stylesheet">

   <script defer src="https://happynikah.com/assets/plugins/fontawesome/js/all.min.js"></script>

   <link rel="stylesheet" href="https://happynikah.com/assets/css/bootstrap.min.css">

   <link rel="stylesheet" href="https://happynikah.com/assets/css/owl.carousel.min.css">

   <link rel="stylesheet" href="https://happynikah.com/assets/css/owl.theme.default.min.css">

   <link rel="stylesheet" href="https://happynikah.com/assets/css/style.css">

   <link rel="stylesheet" href="https://happynikah.com/assets/css/lightbox.min.css">  

<section id="userContent" class="py-4">
        <div class="container">
             <div class="row" style="margin-left: 148px;">
                <div class="col-12 col-md-5 col-lg-3 mb-4 mb-lg-0">
                    <div class="chatList">
                        <div class="chtrDtlsBox d-flex justify-content-between mb-0">
                            <div class="d-flex align-items-center">
                                <div class="profImgBoxParent">
                                    <div class="profImgBox">
                             
                                    <img src="https://happynikah.com/happyadmin/assets/images/support.jpg">
                           
                                    </div>
                                    <span class="statusIndictn"></span>
                                </div>
                                
                                <div class="nameTitle">
                                    <p>Support Admin </p>
                                   <!-- <span>
                                        <img src="https://happynikah.com/assets/images/verify.png">
                                        Verified
                                    </span>-->

                                </div>
                            </div>
                            <!--<a href="javascript:void(0)"><img src="https://happynikah.com/assets/images/setting.png"></a>-->
                        </div>
                        <!--<div class="chatType">
                            <div class="dropdown">
                              <button class="btn btn-secondary" type="button" id="chatType" data-bs-toggle="dropdown" aria-expanded="false">
                                Active Chats
                              </button>

                            </div>
                        </div>
                        <form class="customForm">
                            <div class="input-group">
                              <!--  <input type="text" class="form-control border-end-0" placeholder="Search people" aria-label="Recipient's username" aria-describedby="search" id="usersearch">-->
                                <!--<button class="btn btn-outline-secondary border-start-0" type="button"><img src="https://happynikah.com/assets/images/searchG.png" style="width:10px;height:10px;"></button>-->
                          <!--  </div>
                        </form>-->
                       <div class="peopleList chtrDtlsBox scrollBox" id="ulist">
                           <a href="#" onclick="if (!window.__cfRLUnblockHandlers) return false; get_userchatdata(116)"><div class="d-flex justify-content-between align-items-center singleChat active"><div class="d-flex align-items-center"><div class="profImgBoxParent"><div class="profImgBox"><img src="https://happynikah.com//assets/photo_storage/femaleweb.png" alt="profile image" style="width:50px;height:50px;"></div><span class="statusIndictn"></span></div><div class="nameTitle"><p class="name">Fardheena</p></div></div><div class="totMsg"> <span>0</span></div></div></a>                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-7 col-lg-5 mb-4 mb-lg-0">
   <div class="mainChatBox" id="userchatbox">
                        <div class="chatSection scrollBox" id="chatsection">
                            <div class="d-flex mb-3">

                                 <div class="flex-grow-1 me-3 d-flex flex-column align-items-end">
                                    <ul class="chatlist chatlistSender">
                                        <li>hi</li>

                                    </ul>
                                    <span class="chatTime">11:17 PM</span>
                                </div>

                          </div>
                           
                        </div>
                       
                      
                        <div class="urText d-flex align-items-center">
                            <div class="input-group customForm">
                            <input type="text" class="form-control" name="usermessage" id="usermessage" placeholder="Enter your message here" aria-label="chat text box">
                            <input type="hidden" class="form-control" name="uid" id="uid" value="116">
                               
                                <button class="btn sendBtn" type="button" onclick="if (!window.__cfRLUnblockHandlers) return false; send_usermessage()">
                                    <img src="https://happynikah.com/assets/images/send.png">
                                </button>
                            </div>
                        </div>
                       
                    </div>
                </div>
              
                <div class="col-12 col-lg-4">
                   <!-- <p class="sndrDetailsHead">Chat details</p>-->
                    <!--<div class="chtrDtlsBox d-flex align-items-center justify-content-between" id="chatuser_profile">
                        <div class="d-flex align-items-center">
                            <div class="profImgBox">
                              <img src="https://happynikah.com//assets/photo_storage/femaleweb.png" alt="profile image">
                                                           
                             </div>
                            <div class="nameTitle">
                                <p>Fardheena</p>
                                <p class="dsgntn"></p>
                                <span>
                                    <img src="https://happynikah.com/assets/images/verify.png">
                                    Verified
                                </span>
                            </div>
                        </div>
                        <a href="https://happynikah.com/user/singleprofile/116">View Profile</a>
                    </div>-->
                    <!--<div class="likeDislikeBox mb-0" id="likesdislikes">
                    
                        <div class="headBox">
                            <div class="row">
                                <div class="col-12 col-sm-7 d-flex align-items-center mb-3 mb-sm-0">
                                    <div class="w-100">
                                        <div class="youHim">
                                            <img src="https://happynikah.com/assets/images/people.png">
                                            You &amp; Him
                                        </div>
                                        <h3>Likes &amp; Dislikes</h3>
                                                                                <p>Your profile matches with <span>0 / 4</span>  of Fardheena's preferences!</p>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-5 d-flex justify-content-between align-items-center">
                                    <button type="button" class="btnLikeUnlike me-3">
                                        <img src="https://happynikah.com/assets/images/like1.png" class="likeDislikeIcon" alt="like icon">
                                    </button>
                                    <button type="button" class="btnLikeUnlike">
                                        <img src="https://happynikah.com/assets/images/dislike.png" class="likeDislikeIcon" alt="dislike icon">
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="px-3 pt-3 scrollBox">
                        
                            <div class="row mb-2">
                                <div class="col-5 d-flex align-items-center">
                                    <p class="dtls">Age</p>
                                </div>
                                <div class="col-5 d-flex align-items-center">
                                    <p class="dtls">25 -  29 Yrs</p>
                                </div>
                                <div class="col-2 d-flex align-items-center justify-content-end">
                                    <img src="https://happynikah.com/assets/images/checkedG.png" class="chk">
                                    
                                 </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 d-flex align-items-center">
                                    <p class="dtls">Height</p>
                                </div>
                                <div class="col-5 d-flex align-items-center">
                                    <p class="dtls">26 -  33</p>
                                </div>
                                <div class="col-2 d-flex align-items-center justify-content-end">
                                  <img src="https://happynikah.com/assets/images/blocked.png" class="chk">
                                    </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 d-flex align-items-center">
                                    <p class="dtls">Qualification</p>
                                </div>
                                <div class="col-5 d-flex align-items-center">
                                    <p class="dtls">ME/M Tech</p>
                                </div>
                                <div class="col-2 d-flex align-items-center justify-content-end">
                                 <img src="https://happynikah.com/assets/images/blocked.png" class="chk">
                                    </div>
                            </div>

                        </div> 
                    </div>-->
                  
                </div>
               
            </div>
            </div>
    </section>
    
    <style>
        
    #userContent 
    {
    margin-top: 45px !important;
    padding: 50px 0 120px;
     }
    </style>

            <?php include('footer.php') ?>

            
            </html>